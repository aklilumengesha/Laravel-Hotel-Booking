<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Websitemail;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function send_email(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'email' => 'required|email'
        ]);

        if(!$validator->passes()) {
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        }

        // Check if email already exists with active status
        $existing_subscriber = Subscriber::where('email', $request->email)->where('status', 1)->first();
        
        if($existing_subscriber) {
            return response()->json(['code'=>0,'error_message'=>['email'=>['You are already subscribed with this email address.']]]);
        }

        $obj = new Subscriber();
        $obj->email = $request->email;
        $obj->token = '';
        $obj->status = 1;
        $obj->save();

        return response()->json(['code'=>1,'success_message'=>'You have been subscribed successfully!']);
    }

    public function verify($email,$token)
    {
        $subscriber_data = Subscriber::where('email',$email)->where('token',$token)->first();

        if($subscriber_data) {
            
            $subscriber_data->token = '';
            $subscriber_data->status = 1;
            $subscriber_data->update();

            return redirect()->route('home')->with('success', 'Your subscription is verified successfully!');

        } else {
            return redirect()->route('home');
        }

    }
}
