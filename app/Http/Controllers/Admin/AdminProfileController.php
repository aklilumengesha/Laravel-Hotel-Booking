<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Auth;
use Illuminate\Support\Facades\File;

class AdminProfileController extends Controller
{
    public function edit()
    {
        // return view('admin.profile');
        return view('admin.profile');
    }

    public function update(Request $request)
    {
        $admin_data = Admin::where('email',Auth::guard('admin')->user()->email)->first();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if($request->password!='') {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password'
            ]);
            $admin_data->password = Hash::make($request->password);
        }

        if($request->hasFile('photo')) {
    $request->validate([
        'photo' => 'image|mimes:jpg,jpeg,png,gif'
    ]);

    // FIX 1: Safely checks if the old photo exists before deleting
    if ($admin_data->photo && File::exists(public_path('uploads/'.$admin_data->photo))) {
        File::delete(public_path('uploads/'.$admin_data->photo));
    }

    $ext = $request->file('photo')->extension();
    // FIX 2: Creates a unique filename to prevent overwriting
    $final_name = 'admin_'.time().'.'.$ext;

    $request->file('photo')->move(public_path('uploads/'),$final_name);

    $admin_data->photo = $final_name;
}

        
        $admin_data->name = $request->name;
        $admin_data->email = $request->email;
        $admin_data->update();

        return redirect()->back()->with('success', 'Profile information is saved successfully.');
    }
}
