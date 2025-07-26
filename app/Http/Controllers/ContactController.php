<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;


class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'uphone' => 'required',
            'message' => 'required|string',
        ]);

        Mail::to('developerapricorn1234@gmail.com')->send(new ContactMail($data));

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
