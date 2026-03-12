<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::latest()
            ->paginate(15);
            
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_email' => 'nullable|email|max:255',
            'client_position' => 'nullable|string|max:255',
            'client_company' => 'nullable|string|max:255',
            'content' => 'required|string|min:10',
            'rating' => 'nullable|numeric|min:1|max:5',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'status' => 'required|in:draft,published,archived',
            'order' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
        ]);

        $data = $request->except(['featured_image']);
        
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/testimonials'), $imageName);
            $data['featured_image'] = $imageName;
        }

        $data['order'] = $data['order'] ?? 0;
        $data['is_featured'] = $request->has('is_featured');

        Testimonial::create($data);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_email' => 'nullable|email|max:255',
            'client_position' => 'nullable|string|max:255',
            'client_company' => 'nullable|string|max:255',
            'content' => 'required|string|min:10',
            'rating' => 'nullable|numeric|min:1|max:5',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'status' => 'required|in:draft,published,archived',
            'order' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
        ]);

        $data = $request->except(['featured_image']);
        
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($testimonial->featured_image) {
                $oldImagePath = public_path('images/testimonials/' . $testimonial->featured_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('featured_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/testimonials'), $imageName);
            $data['featured_image'] = $imageName;
        }

        $data['order'] = $data['order'] ?? 0;
        $data['is_featured'] = $request->has('is_featured');

        $testimonial->update($data);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        // Delete image if exists
        if ($testimonial->featured_image) {
            $imagePath = public_path('images/testimonials/' . $testimonial->featured_image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $testimonial->delete();

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }

    /**
     * Toggle testimonial status.
     */
    public function toggleStatus(Testimonial $testimonial)
    {
        $newStatus = $testimonial->status === 'published' ? 'draft' : 'published';
        $testimonial->update(['status' => $newStatus]);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', "Testimonial status changed to {$newStatus}.");
    }

    /**
     * Toggle featured status.
     */
    public function toggleFeatured(Testimonial $testimonial)
    {
        $testimonial->update(['is_featured' => !$testimonial->is_featured]);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial featured status updated.');
    }
}
