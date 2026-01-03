<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Mail\ContactFormSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('public.contact.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        // 1) opslaan in DB
        ContactMessage::create($validated);

        // 2) mail naar admin
        $adminEmail = config('mail.admin_email', env('ADMIN_EMAIL', 'admin@ehb.be'));
        Mail::to($adminEmail)->send(new ContactFormSubmitted($validated));

        return redirect()->route('contact.create')->with('success', 'Je bericht is verstuurd!');
    }
}
