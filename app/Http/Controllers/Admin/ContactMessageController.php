<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->get();

        return view('admin.contact-message.index', compact('messages'));
    }

    public function delete($id)
    {
        $message = ContactMessage::findOrFail($id);

        $message->delete();

        return redirect()->route('admin.contact-message.index');
    }
}
