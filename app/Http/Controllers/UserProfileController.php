<?php

namespace App\Http\Controllers;

use App\Models\User;

public function show(User $user)
{
    return view('public.users.show', compact('user'));
}

