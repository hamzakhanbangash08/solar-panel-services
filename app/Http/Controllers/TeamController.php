<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $team = Team::all();
        return view('team.index', compact('team'));
    }



    ////
    public function showTeam(Request $request)
    {
        $team = Team::all();

        return view('pages.home', compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('image')->store('team_images', 'public');

        Team::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $path,
        ]);

        return redirect()->back()->with('success', 'Team member created successfully!');
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
    public function edit($id)
    {
        $team = Team::findOrFail($id); // Automatically throws 404 if not found
        return view('team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $team = Team::findOrFail($id);

        // If a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($team->image && Storage::disk('public')->exists($team->image)) {
                Storage::disk('public')->delete($team->image);
            }

            // Store new image
            $path = $request->file('image')->store('team_images', 'public');
            $team->image = $path;
        }

        // Update name & designation
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->save();

        // 🔁 Redirect to team list page
        return redirect()->route('teams.index')->with('success', 'Team member updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the team member by ID
        $member = Team::findOrFail($id);

        // Optional: Delete image from storage if exists
        if ($member->image && Storage::disk('public')->exists($member->image)) {
            Storage::disk('public')->delete($member->image);
        }

        // Delete the team member record
        $member->delete();

        // Redirect or return response
        return redirect()->back()->with('success', 'Team member deleted successfully.');
    }
}
