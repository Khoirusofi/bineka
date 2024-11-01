<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactUsFormController extends Controller
{
    // Create Contact Form
    public function createForm(Request $request)
    {
        return view('welcome');
    }

    // Store Contact Form data
    public function contactUsForm(Request $request) {
        // Validasi form
        $validatedData = $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);
    
        // Simpan data ke database
        Contact::create($validatedData);
    
        // Kirim email
        Mail::send('email.contact', [
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'messageContent' => $request->get('message'),
        ], function($message) use ($request){
            $message->from($request->email);
            $message->to('bidannatural@gmail.com', 'Admin');
            $message->subject('Pesan baru dari Website Bidan Eka Muzaifa');
        });
    
    
        //return redirect()->route('welcome')->with('success', 'Pesan Anda telah berhasil dikirim. Terima kasih telah menghubungi kami.');
        return back()->with('success', 'Pesan Anda telah berhasil dikirim. Terima kasih telah menghubungi kami.');
    }
    
}
