<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plants = \App\Models\Plant::with('uses')->latest()->paginate(10);
        return view('admin.plants.index', compact('plants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.plants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validator = \Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'local_name' => 'nullable|string|max:255',
        'scientific_name' => 'nullable|string|max:255',
        'region' => 'nullable|string|max:255',
        'image' => 'nullable|array|max:5',
        'image.*' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        'price' => 'nullable|numeric|min:0|max:999999.99',
        'description' => 'nullable|string',
        'safety_warning' => 'nullable|string',
        'uses' => 'nullable|array',
        'uses.*.disease' => 'required|string',
        'uses.*.preparation' => 'nullable|string',
        'uses.*.dosage' => 'nullable|string',
        'uses.*.warning' => 'nullable|string',
    ]);

    if ($validator->fails()) {
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
        $data = $request->except(['uses', 'image']);

        // Store images as JSON array
        $images = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $images[] = $image->store('plants','public');
            }
        }
        $data['image'] = !empty($images) ? json_encode($images) : null;
        $plant = \App\Models\Plant::create($data);

        // Save uses
        if ($request->has('uses')) {
            foreach ($request->uses as $use) {
                $plant->uses()->create($use);
            }
        }

        // Optional: generate plant_id
        $plant->plant_id = 'PLANT-' . str_pad($plant->id, 4, '0', STR_PAD_LEFT);
        $plant->save();

        return response()->json([
            'success' => true,
            'message' => 'Plant cataloged successfully!'
        ]);

    } catch (\Exception $e) {
        \Log::error($e); // Log error
        return response()->json([
            'success' => false,
            'message' => 'Server error: '.$e->getMessage()
        ], 500);
    }
}
    /**
     * Display the specified resource.
     */
    public function show(Plant $plant)
    {
        $plant->load('uses');
        return view('admin.plants.show', compact('plant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plant $plant)
    {
        $plant->load('uses');
        return view('admin.plants.edit', compact('plant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plant $plant)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'local_name' => 'nullable|string|max:255',
            'scientific_name' => 'nullable|string|max:255',
            'region' => 'nullable|string|max:255',
            'image' => 'nullable|array|max:5',
            'image.*' => 'nullable|image',
            'description' => 'nullable|string',
            'safety_warning' => 'nullable|string',
            'uses' => 'nullable|array',
            'uses.*.disease' => 'required|string',
            'uses.*.preparation' => 'nullable|string',
            'uses.*.dosage' => 'nullable|string',
            'uses.*.warning' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $data = $request->except(['uses', 'image']);
        
        // Handle multiple images like in store method
        $images = [];
        if ($request->hasFile('image')) {
            // Delete old images if they exist
            if ($plant->image) {
                $oldImages = json_decode($plant->image, true);
                if (is_array($oldImages)) {
                    foreach ($oldImages as $oldImage) {
                        \Illuminate\Support\Facades\Storage::disk('public')->delete($oldImage);
                    }
                } else {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($plant->image);
                }
            }
            
            foreach ($request->file('image') as $image) {
                $images[] = $image->store('plants', 'public');
            }
        }
        $data['image'] = !empty($images) ? json_encode($images) : $plant->image;

        $plant->update($data);

        // Simple nested update: delete old uses and create new ones
        $plant->uses()->delete();
        if ($request->has('uses')) {
            foreach ($request->uses as $useData) {
                $plant->uses()->create($useData);
            }
        }

        // Check if request is AJAX or expects JSON
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Plant record updated successfully!'
            ]);
        }

        return redirect()->route('admin.plants.index')
            ->with('success', 'Plant record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plant $plant)
    {
        if ($plant->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($plant->image);
        }
        $plant->delete();

        return redirect()->route('admin.plants.index')
            ->with('success', 'Plant removed from encyclopedia!');
    }
}
