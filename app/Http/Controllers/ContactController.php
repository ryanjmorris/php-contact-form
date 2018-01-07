<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mail;

class ContactController extends Controller
{
    public function getContact()
    {
        return view('contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'email'     => 'required|email',
            'message'   => 'required',
            'phone'     => 'numeric|phone',
        ]);

        $contact = [
            'full_name'       => $request->full_name,
            'email'           => $request->email,
            'contactMessage'  => $request->message,
            'phone'           => $request->phone,
        ];

        Mail::send('email', $contact, function($message) use ($contact) {
            $message->from($contact['email']);
            $message->to('guy-smiley@example.com');
            $message->subject($contact['contactMessage']);
        });

        Contact::create($request->all());

        Session::flash('success', 'Your email has been sent!');

        return redirect('/#contact');
    }
}
