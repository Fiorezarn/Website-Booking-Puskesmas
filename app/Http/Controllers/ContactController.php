<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Mail;
use Alert;

class ContactController extends Controller
{
    public function contact(){
        return view('home');
    }

    public function sendEmail(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $emailData = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'subject' => $validatedData['subject'],
            'message' => $validatedData['message']
        ];

        Mail::to('alpagaming005@gmail.com')->send(new ContactMail($emailData));

        Alert::success('Success', 'Your message has been sent successfully!');
        return redirect()->back()->with('message_sent', 'Pesan Anda Sudah Terkirim Kami Akan Segera Menghubungi Anda!');
    }
}
