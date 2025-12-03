<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    /**
     * Display a listing of conferences.
     */
    public function index()
    {
        $conferences = Conference::orderBy('conference_date', 'desc')->get();
        return view('conferences.index', compact('conferences'));
    }

    /**
     * Show the form for creating a new conference.
     */
    public function create()
    {
        return view('conferences.create');
    }

    /**
     * Store a newly created conference in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'conference_date' => 'required|date',
            'address' => 'required|string|max:255',
            'participants_count' => 'nullable|integer|min:0',
            'city' => 'nullable|string|max:255',
        ]);

        Conference::create($validated);

        return redirect()->route('conferences.index')
            ->with('success', __('messages.conference_created'));
    }

    /**
     * Display the specified conference.
     */
    public function show($id)
    {
        $conference = Conference::findOrFail($id);
        return view('conferences.show', compact('conference'));
    }

    /**
     * Show the form for editing the specified conference.
     */
    public function edit($id)
    {
        $conference = Conference::findOrFail($id);
        return view('conferences.edit', compact('conference'));
    }

    /**
     * Update the specified conference in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'conference_date' => 'required|date',
            'address' => 'required|string|max:255',
            'participants_count' => 'nullable|integer|min:0',
            'city' => 'nullable|string|max:255',
        ]);

        $conference = Conference::findOrFail($id);
        $conference->update($validated);

        return redirect()->route('conferences.index')
            ->with('success', __('messages.conference_updated'));
    }

    /**
     * Remove the specified conference from storage.
     */
    public function destroy($id)
    {
        $conference = Conference::findOrFail($id);
        $conference->delete();

        return redirect()->route('conferences.index')
            ->with('success', __('messages.conference_deleted'));
    }
}
