<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function create(){
        return view('pages.contact');
     }
 
     public function store(){
 
         $data = request()->validate([
             'name' => 'required',
             'email' => 'required|email',
             'message' => 'required',
         ]);
         // dd(request()->all());
 
         Mail::to('samuelamujo@gmail.com')->send(new ContactForm($data));
 
         return redirect('pages.contact');
     }
}
