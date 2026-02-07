<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutPage; // Make sure this model points to `about_sections`
use Illuminate\Support\Facades\Storage; // Import Storage facade

class AboutPageController extends Controller
{
    /**
     * Show the form for editing the About Us page.
     */
    public function edit()
    {
        // Use firstOrCreate to ensure there's always a record to edit.
        // This is a cleaner, more reliable way to handle an empty database table.


        $about = AboutPage::firstOrCreate(['id' => 1]);

        // Ensure this view name matches the location of your Blade file.
        return view('admin.page_about', compact('about'));
    }

    /**
     * Update the About Us page data in the database.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'description' => 'required|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|url',
            'counters' => 'nullable|array',
            'counters.*.icon' => 'required_with:counters.*.number,counters.*.label|string|max:255',
            'counters.*.number' => 'required_with:counters.*.icon,counters.*.label|numeric',
            'counters.*.label' => 'required_with:counters.*.icon,counters.*.number|string|max:255',
            'images' => 'nullable|array',
            'images.*.file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*.alt' => 'required|string|max:255',
            'images.*.path' => 'nullable|string', // For existing images
        ]);

        $about = AboutPage::findOrFail(1);

        $updateData = $request->only(['title', 'subtitle', 'description', 'button_text', 'button_link']);
        
        // Filter out any empty counter rows before saving.
        $updateData['counters'] = array_values(array_filter($validatedData['counters'] ?? [], function ($counter) {
            return !empty($counter['icon']) && !empty($counter['number']) && !empty($counter['label']);
        }));

        // === FIXED IMAGE LOGIC ===
        $newImages = [];
        if (isset($validatedData['images'])) {
            foreach ($validatedData['images'] as $index => $imageData) {
                // If a new file is uploaded, store it.
                if (isset($imageData['file'])) {
                    // Delete the old image if it exists
                    if (isset($imageData['path'])) {
                        Storage::disk('public')->delete($imageData['path']);
                    }
                    $path = $imageData['file']->store('about', 'public');
                    $newImages[] = ['path' => $path, 'alt' => $imageData['alt']];
                } 
                // Otherwise, keep the existing image path if it was submitted.
                elseif (isset($imageData['path'])) {
                    $newImages[] = ['path' => $imageData['path'], 'alt' => $imageData['alt']];
                }
            }
        }
        $updateData['images'] = $newImages;

        $about->update($updateData);

        return redirect()->route('admin.about.index')->with('success', 'About section updated successfully!');
    }
}


