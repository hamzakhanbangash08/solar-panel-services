<?php

namespace App\Http\Controllers;

use App\Models\Panel;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $panels = Panel::all();
        } else {
            $panels = auth()->user()->panels;
        }

        return view('panels.index', compact('panels'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'serial_number' => 'required|unique:panels',
            'price' => 'nullable|numeric',
            'contact' => 'nullable|integer',
            'company' => 'nullable|string',
            'location' => 'required',
            'capacity_kw' => 'required|numeric|min:0',
            'image' => 'required',
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/panels', 'public');
        } else {
            $imagePath = null; // or set a default image path
        }



        Panel::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'serial_number' => $request->serial_number,
            'price' => $request->price,
            'contact' => $request->contact,
            'company' => $request->company,
            'location' => $request->location,
            'capacity_kw' => $request->capacity_kw,
            'image' => $imagePath,

        ]);

        return redirect()->route('panels.index')->with('success', 'Panel added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $panel = Panel::findOrFail($id);
        return view('panels.edit', compact('panel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'serial_number' => 'required|string',
            'price' => 'nullable|string|max:255',
            'contact' => 'nullable',
            'company' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'capacity_kw' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8000',
        ]);


        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/panels', 'public');
        } else {
            $imagePath = null; // or keep the existing image
        }
        $panel = Panel::findOrFail($id);
        $panel->name = $request->input('name');
        $panel->serial_number = $request->input('serial_number');
        $panel->company = $request->input('company');
        $panel->location = $request->input('location');
        $panel->capacity_kw = $request->input('capacity_kw');
        $panel->image = $imagePath ?? $panel->image; // Use existing image if no new image is uploaded
        $panel->save();



        return redirect()->route('panels.index')->with('success', 'Panel updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $panel = Panel::findOrFail($id);
        $panel->delete();

        return redirect()->route('panels.index')->with('success', 'Panel deleted successfully.');
    }
}
