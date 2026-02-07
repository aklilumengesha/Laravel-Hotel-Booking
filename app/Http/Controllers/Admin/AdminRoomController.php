<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenity;
use App\Models\Room;
use App\Models\RoomPhoto;
use Illuminate\Support\Facades\File;
use App\Models\Payment;


class AdminRoomController extends Controller
{
    public function index()
    {
        $rooms = Room::get();
        return view('admin.room_view', compact('rooms'));
    }

    public function create()
    {
        $all_amenities = Amenity::get();
        return view('admin.room_add',compact('all_amenities'));
    }
    // Add this entire new method to AdminRoomController.php
public function show($id)
{
    return redirect()->route('admin.room.edit', $id);
}
    public function store(Request $request)
    {
        $amenities = '';
        $i=0;
        if(isset($request->arr_amenities)) {
            foreach($request->arr_amenities as $item) {
                if($i==0) {
                    $amenities .= $item;
                } else {
                    $amenities .= ','.$item;
                }            
                $i++;
            }
        }

        $request->validate([
            'featured_photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'total_rooms' => 'required'
        ]);

        $ext = $request->file('featured_photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('featured_photo')->move(public_path('uploads/'),$final_name);

        $obj = new Room();
        $obj->featured_photo = $final_name;
        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->price = $request->price;
        $obj->total_rooms = $request->total_rooms;
        $obj->amenities = $amenities;
        $obj->size = $request->size;
        $obj->total_beds = $request->total_beds;
        $obj->total_bathrooms = $request->total_bathrooms;
        $obj->total_balconies = $request->total_balconies;
        $obj->total_guests = $request->total_guests;
               $video_id = '';
        if($request->video_id) {
            $url = $request->video_id;
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
                $video_id = $match[1];
            } else {
                $video_id = $url; // Assume it's already an ID if no match
            }
        }
        $obj->video_id = $video_id;

        $obj->save();

        return redirect()->route('admin.room.index')->with('success', 'Room is added successfully.');

    }

    public function edit($id)
    {
        $all_amenities = Amenity::get();
        $room_data = Room::where('id',$id)->first();

        $existing_amenities = array();
        if($room_data->amenities != '') {
            $existing_amenities = explode(',',$room_data->amenities);
        }
        return view('admin.room_edit', compact('room_data','all_amenities','existing_amenities'));
    }

    public function update(Request $request,$id) 
    {        
        $obj = Room::where('id',$id)->first();

        $amenities = '';
        $i=0;
        if(isset($request->arr_amenities)) {
            foreach($request->arr_amenities as $item) {
                if($i==0) {
                    $amenities .= $item;
                } else {
                    $amenities .= ','.$item;
                }            
                $i++;
            }
        }

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'total_rooms' => 'required',
            'total_beds' => 'required|numeric',
            'total_bathrooms' => 'required|numeric',
        ]);

        if($request->hasFile('featured_photo')) {
            $request->validate([
                'featured_photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
                if ($obj->featured_photo && File::exists(public_path('uploads/'.$obj->featured_photo))) {
        File::delete(public_path('uploads/'.$obj->featured_photo));
    }
            $ext = $request->file('featured_photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('featured_photo')->move(public_path('uploads/'),$final_name);
            $obj->featured_photo = $final_name;
        }

        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->price = $request->price;
        $obj->total_rooms = $request->total_rooms;
        $obj->amenities = $amenities;
        $obj->size = $request->size;
        $obj->total_beds = $request->total_beds;
        $obj->total_bathrooms = $request->total_bathrooms;
        $obj->total_balconies = $request->total_balconies;
        $obj->total_guests = $request->total_guests;
                $video_id = '';
        if($request->video_id) {
            $url = $request->video_id;
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
                $video_id = $match[1];
            } else {
                $video_id = $url; // Assume it's already an ID if no match
            }
        }
        $obj->video_id = $video_id;
        // $obj->video_id = $request->video_id;
        $obj->update();

        return redirect()->route('admin.room.index')->with('success', 'Room is updated successfully.');
    }

   public function destroy($id)
{
    // Find the room data
    $single_data = Room::where('id', $id)->first();

    // Define the path to the featured photo
    $path = public_path('uploads/' . $single_data->featured_photo);

    // Check if the featured photo exists, then delete it
    if (File::exists($path)) {
        File::delete($path);
    }

    // Find and delete all associated gallery photos
    $room_photo_data = RoomPhoto::where('room_id', $id)->get();
    foreach ($room_photo_data as $item) {
        $photo_path = public_path('uploads/' . $item->photo);
        if (File::exists($photo_path)) {
            File::delete($photo_path);
        }
        $item->delete();
    }

    // NEW: Find and delete all associated payments
    \App\Models\Payment::where('room_id', $id)->delete();

    // FINALLY: Delete the database record for the room
    $single_data->delete();

    return redirect()->route('admin.room.index')->with('success', 'Room is deleted successfully.');
}

    public function gallery($id)
    {
        $room_data = Room::where('id',$id)->first();
        $room_photos = RoomPhoto::where('room_id',$id)->get();
        return view('admin.room_gallery', compact('room_data','room_photos'));
    }

    public function gallery_store(Request $request,$id)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);

        $obj = new RoomPhoto();
        $obj->photo = $final_name;
        $obj->room_id = $id;
        $obj->save();

        return redirect()->back()->with('success', 'Photo is added successfully.');
    }

    public function gallery_delete($id)
    {
        $single_data = RoomPhoto::where('id',$id)->first();
        unlink(public_path('uploads/'.$single_data->photo));
        $single_data->delete();

        return redirect()->back()->with('success', 'Photo is deleted successfully.');
    }
}
