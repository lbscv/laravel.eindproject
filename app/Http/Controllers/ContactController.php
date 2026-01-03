<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use App\Models\ContactMessage;
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
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $msg = ContactMessage::create($validated);

        $adminEmail = config('mail.admin_address', 'admin@ehb.be');

        Mail::to($adminEmail)->send(new ContactFormSubmitted($msg));

        return redirect()->route('contact.create')->with('success', 'Bericht verzonden!');
    }
}
