<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminReplyToContact;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(20);
        return view('admin.contact.index', compact('messages'));
    }

    public function show(ContactMessage $contactMessage)
    {
        return view('admin.contact.show', compact('contactMessage'));
    }

    public function reply(Request $request, ContactMessage $contactMessage)
    {
        $validated = $request->validate([
            'reply' => ['required', 'string', 'max:5000'],
        ]);

        Mail::to($contactMessage->email)->send(
            new AdminReplyToContact($contactMessage, $validated['reply'])
        );

        $contactMessage->update(['answered_at' => now()]);

        return back()->with('success', 'Antwoord verstuurd.');
    }
}
