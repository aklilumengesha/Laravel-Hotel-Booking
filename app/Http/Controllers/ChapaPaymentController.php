<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChapaService;
use Illuminate\Support\Str;
use App\Models\Room;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class ChapaPaymentController extends Controller
{
    /**
     * Initialize the payment with Chapa.
     */
    public function payWithChapa(Request $request, ChapaService $chapa)
    {
        

        // 1. Validate the incoming request data
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'email' => 'required|email',
            'first_name' => 'required|string',
        ]);

        // 2. Generate a unique transaction reference
        $txRef = 'TX-' . Str::uuid();
        
        // This is a simplified example. You should associate all rooms in the cart
        // with the payment record for a real-world application.
        $roomId = session('cart_room_id')[0] ?? null;

        // 3. Create a pending payment record in the database BEFORE redirecting.
        // This is the key to making the process reliable.
    
        $payment = Payment::create([
            'room_id' => $roomId, // Link the room to the payment
            'customer_id' => auth()->id(),
            'tx_ref' => $txRef,
            'status' => 'pending', // Set the initial status
            'amount' => $request->amount,
            'payment_method' => 'Chapa',
        ]);

        // 4. Prepare the data payload for the Chapa API
        $data = [
            'amount' => $request->amount,
            'currency' => 'ETB',
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name ?? '',
            'tx_ref' => $txRef,
            'callback_url' => route('chapa.callback'),
            'return_url' => route('chapa.return'),
            'customization' => [
                'title' => 'Hotel Booking Payment',
                'description' => 'Payment for your selected rooms.',
            ],
        ];

        // 5. Initialize the payment via the ChapaService
        $response = $chapa->initialize($data);

        // This will stop the code and show you the exact response from Chapa.
        dd($response);

        // 6. Redirect to Chapa's checkout page if successful
        if ($response['status'] === 'success') {
            return redirect($response['data']['checkout_url']);
        }

        // If initialization fails, update the payment status and redirect back.
        $payment->update(['status' => 'failed']);
            return redirect()->route('chapa.return')->with('error', 'Payment could not be initialized. Please try again.');
    }

    /**
     * Handle the callback from Chapa to verify the payment.
     */
    public function chapaCallback(Request $request, ChapaService $chapa)
    {
        // ... (The rest of your code is unchanged)
        $txRef = $request->get('tx_ref');
        $payment = Payment::where('tx_ref', $txRef)->where('status', 'pending')->first();

        if (!$payment) {
            return redirect()->route('chapa.return')->with('error', 'Invalid payment transaction.');
        }

        $verify = $chapa->verify($txRef);

        if ($verify['status'] === 'success') {
            DB::transaction(function () use ($payment, $verify) {
                $room = Room::where('id', $payment->room_id)->lockForUpdate()->first();

                if ($room && !$room->is_booked) {
                    $room->is_booked = true;
                    $room->save();
                    $payment->update(['status' => 'success']);
                    session()->forget([
                        'cart_room_id', 'cart_checkin_date', 'cart_checkout_date',
                        'cart_adult', 'cart_children'
                    ]);
                } else {
                    $payment->update(['status' => 'failed']);
                }
            });

            if ($payment->fresh()->status === 'success') {
                return redirect()->route('chapa.return')->with('success', 'Payment successful! Your room is booked.');
            } else {
                return redirect()->route('chapa.return')->with('error', 'The room was booked by another user while you were paying.');
            }
        }

        $payment->update(['status' => 'failed']);
        return redirect()->route('chapa.return')->with('error', 'Payment verification failed.');
    }
}
