<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'min:8'],
            'is_admin' => ['nullable'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_admin' => $request->boolean('is_admin'),
        ]);

        return redirect()->route('users.index')->with('success', 'User aangemaakt.');
    }

    public function toggleAdmin(User $user)
    {
        // admin kan zichzelf geen adminrechten ontnemen
        if (auth()->id() === $user->id) {
            return back()->with('error', 'Je kan je eigen adminrechten niet aanpassen.');
        }

        $user->is_admin = ! $user->is_admin;
        $user->save();

        return back()->with('success', 'Adminrechten aangepast.');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Je kan je eigen account niet verwijderen.');
        }

        $user->delete();

        return back()->with('success', 'Gebruiker succesvol verwijderd.');
    }
}
