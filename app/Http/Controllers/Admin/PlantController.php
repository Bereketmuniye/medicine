<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plants = \App\Models\Plant::with('uses')->latest()->paginate(15);
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
        $request->validate([
            'name' => 'required|string|max:255',
            'local_name' => 'nullable|string|max:255',
            'scientific_name' => 'nullable|string|max:255',
            'region' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'safety_warning' => 'nullable|string',
            'uses' => 'nullable|array',
            'uses.*.disease' => 'required|string',
            'uses.*.preparation' => 'nullable|string',
            'uses.*.dosage' => 'nullable|string',
            'uses.*.warning' => 'nullable|string',
        ]);

        $data = $request->except(['uses', 'image']);
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('plants', 'public');
        }

        $plant = \App\Models\Plant::create($data);

        if ($request->has('uses')) {
            foreach ($request->uses as $useData) {
                $plant->uses()->create($useData);
            }
        }

        return redirect()->route('admin.plants.index')
            ->with('success', 'Plant cataloged successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plant $plant)
    {
        //
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
        $request->validate([
            'name' => 'required|string|max:255',
            'local_name' => 'nullable|string|max:255',
            'scientific_name' => 'nullable|string|max:255',
            'region' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'safety_warning' => 'nullable|string',
            'uses' => 'nullable|array',
            'uses.*.disease' => 'required|string',
            'uses.*.preparation' => 'nullable|string',
            'uses.*.dosage' => 'nullable|string',
            'uses.*.warning' => 'nullable|string',
        ]);

        $data = $request->except(['uses', 'image']);
        
        if ($request->hasFile('image')) {
            if ($plant->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($plant->image);
            }
            $data['image'] = $request->file('image')->store('plants', 'public');
        }

        $plant->update($data);

        // Simple nested update: delete old uses and create new ones
        $plant->uses()->delete();
        if ($request->has('uses')) {
            foreach ($request->uses as $useData) {
                $plant->uses()->create($useData);
            }
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
