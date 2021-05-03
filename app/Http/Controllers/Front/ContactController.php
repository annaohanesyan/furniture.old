<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function contact(){
        return view("mainPage.contact");
    }

    public function sendEmail(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
            
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ];
        

        Mail::to('furnitureohanesyans@gmail.com')->send(new ContactMail($details));
        return back()->with('message_sent', 'Your message has been sent successfully!');
    }


}
