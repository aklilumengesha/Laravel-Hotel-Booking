<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Mail\Websitemail;
use Hash;
use Auth;

class CustomerAuthController extends Controller
{
    public function login()
    {
        return view('front.login');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1
        ];

        if(Auth::guard('customer')->attempt($credential)) {
            return redirect()->route('home');
        } else {            
            return redirect()->route('customer_login')->with('error', 'Information is not correct!');
        }
    }

    public function signup()
    {
        return view('front.signup');
    }

    public function signup_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required',
            'retype_password' =>'required|same:password'
        ]);

        $password = Hash::make($request->password);

        $obj = new Customer();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->password = $password;
        $obj->token = '';
        $obj->status = 1;
        $obj->save();

        // Auto-login the customer
        Auth::guard('customer')->login($obj);

        return redirect()->route('home')->with('success', 'Your account has been created successfully!');
    }

    public function signup_verify($email, $token)
{
    $customer_data = Customer::where('email', $email)->where('token', $token)->first();

    if ($customer_data) {
        $customer_data->token = '';
        $customer_data->status = 1;
        $customer_data->update();

        // ✅ Auto-login the customer
        Auth::guard('customer')->login($customer_data);

        // ✅ Redirect to homepage or dashboard
        return redirect()->route('home')->with('success', 'Your account is verified and you are now logged in!');
    } else {
        return redirect()->route('customer_login')->with('error', 'Invalid verification link.');
    }
}


    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customer_login');
    }

    public function forget_password()
    {
        return view('front.forget_password');
    }

    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $customer_data = Customer::where('email',$request->email)->first();
        if(!$customer_data) {
            return redirect()->back()->with('error','Email address not found!');
        }

        $token = hash('sha256',time());

        $customer_data->token = $token;
        $customer_data->update();

        // Redirect directly to reset password page
        return redirect()->route('customer.reset_password', ['token' => $token, 'email' => $request->email])
            ->with('success', 'Please enter your new password below');
    }


    public function reset_password($token,$email)
    {
        $customer_data = Customer::where('token',$token)->where('email',$email)->first();
        if(!$customer_data) {
            return redirect()->route('customer_login');
        }

        return view('front.reset_password', compact('token','email'));

    }

    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $customer_data = Customer::where('token',$request->token)->where('email',$request->email)->first();

        $customer_data->password = Hash::make($request->password);
        $customer_data->token = '';
        $customer_data->update();

        return redirect()->route('customer_login')->with('success', 'Password is reset successfully');

    }

}
