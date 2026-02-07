<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Facades\File;

class AdminSlideController extends Controller
{
    public function index()
    {
        $slides = Slide::get();
        return view('admin.slide_view', compact('slides'));
    }

    public function create()
    {
        return view('admin.slide_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);

        $obj = new Slide();
        $obj->photo = $final_name;
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->button_text = $request->button_text;
        $obj->button_url = $request->button_url;
        $obj->save();

        return redirect()->back()->with('success', 'Slide is added successfully.');

    }

    public function edit($id)
    {
        $slide_data = Slide::where('id',$id)->first();
        return view('admin.slide_edit', compact('slide_data'));
    }

    public function update(Request $request,$id) 
    {        
        $obj = Slide::where('id',$id)->first();
        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
                    if ($obj->photo && File::exists(public_path('uploads/'.$obj->photo))) {
            File::delete(public_path('uploads/'.$obj->photo));
        }
            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_name);
            $obj->photo = $final_name;
        }

        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->button_text = $request->button_text;
        $obj->button_url = $request->button_url;
        $obj->update();

        return redirect()->back()->with('success', 'Slide is updated successfully.');
    }
       public function destroy($id)
    {
        $slide_data = Slide::where('id', $id)->first();

        // Safely delete the photo file if it exists
        if (File::exists(public_path('uploads/' . $slide_data->photo))) {
            File::delete(public_path('uploads/' . $slide_data->photo));
        }

        // Delete the record from the database
        $slide_data->delete();

        return redirect()->route('admin.slide.index')->with('success', 'Slide is deleted successfully.');
    }

}
