<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('admin.post_view', compact('posts'));
    }

    public function create()
    {
        return view('admin.post_add');
    }

    public function add()
    {
        return view('admin.post_add');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:10240', // Max 10MB
                'heading' => 'required',
                'short_content' => 'required',
                'content' => 'required'
            ]);

            if (!$request->hasFile('photo')) {
                return redirect()->back()->with('error', 'No photo file uploaded.')->withInput();
            }

            if (!$request->file('photo')->isValid()) {
                return redirect()->back()->with('error', 'Photo upload failed. Please try again.')->withInput();
            }

            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);

            // Generate slug from heading
            $slug = Str::slug($request->heading);
            // Ensure slug is unique
            $existing = Post::where('slug', $slug)->count();
            if ($existing > 0) {
                $slug .= '-' . time();
            }

            $obj = new Post();
            $obj->photo = $final_name;
            $obj->title = $request->title;
            $obj->heading = $request->heading;
            $obj->slug = $slug;
            $obj->short_content = $request->short_content;
            $obj->content = $request->content;
            $obj->total_view = 1;
            $obj->save();

            return redirect()->back()->with('success', 'Post is added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $post_data = Post::where('id', $id)->first();
        return view('admin.post_edit', compact('post_data'));
    }

    public function update(Request $request, $id)
    {
        $obj = Post::where('id', $id)->first();

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif|max:10240' // Max 10MB
            ]);

            if (file_exists(public_path('uploads/' . $obj->photo))) {
                unlink(public_path('uploads/' . $obj->photo));
            }

            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $obj->photo = $final_name;
        }

        $obj->heading = $request->heading;
        $obj->short_content = $request->short_content;
        $obj->content = $request->content;

        // Regenerate slug if heading changed
        $new_slug = Str::slug($request->heading);
        if ($new_slug !== $obj->slug) {
            $slug_check = Post::where('slug', $new_slug)->where('id', '!=', $id)->count();
            if ($slug_check > 0) {
                $new_slug .= '-' . time();
            }
            $obj->slug = $new_slug;
        }

        $obj->update();

        return redirect()->back()->with('success', 'Post is updated successfully.');
    }

    public function delete($id)
    {
        $single_data = Post::where('id', $id)->first();

        // Check if post exists
        if (!$single_data) {
            return redirect()->back()->with('error', 'Post not found.');
        }

        // Delete photo if it exists
        if ($single_data->photo && file_exists(public_path('uploads/' . $single_data->photo))) {
            unlink(public_path('uploads/' . $single_data->photo));
        }

        $single_data->delete();

        return redirect()->back()->with('success', 'Post is deleted successfully.');
    }

    public function destroy($id)
    {
        $single_data = Post::where('id', $id)->first();

        // Check if post exists
        if (!$single_data) {
            return redirect()->back()->with('error', 'Post not found.');
        }

        // Delete photo if it exists
        if ($single_data->photo && file_exists(public_path('uploads/' . $single_data->photo))) {
            unlink(public_path('uploads/' . $single_data->photo));
        }

        $single_data->delete();

        return redirect()->back()->with('success', 'Post is deleted successfully.');
    }
}
