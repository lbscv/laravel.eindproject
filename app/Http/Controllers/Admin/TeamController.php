<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::withCount('users')->orderBy('id')->get();
        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        $users = User::orderBy('name')->get();
        return view('admin.teams.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'season' => ['nullable', 'string', 'max:50'],
            'user_ids' => ['array'],
            'user_ids.*' => ['integer', 'exists:users,id'],
        ]);

        $team = Team::create([
            'name' => $validated['name'],
            'season' => $validated['season'] ?? null,
        ]);

        $team->users()->sync($validated['user_ids'] ?? []);

        return redirect()->route('teams.index')->with('success', 'Team aangemaakt.');
    }

    public function edit(Team $team)
    {
        $team->load('users');
        $users = User::orderBy('name')->get();
        $selected = $team->users->pluck('id')->toArray();

        return view('admin.teams.edit', compact('team', 'users', 'selected'));
    }

    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'season' => ['nullable', 'string', 'max:50'],
            'user_ids' => ['array'],
            'user_ids.*' => ['integer', 'exists:users,id'],
        ]);

        $team->update([
            'name' => $validated['name'],
            'season' => $validated['season'] ?? null,
        ]);

        $team->users()->sync($validated['user_ids'] ?? []);

        return redirect()->route('teams.index')->with('success', 'Team aangepast.');
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Team verwijderd.');
    }

    public function show(Team $team)
    {
        return redirect()->route('teams.edit', $team);
    }
}
