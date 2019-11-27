<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
 
         Mail::to('samuelamujo@gmail.com')->send(new ContactFormMail($data));
 
         return redirect('pages.contact');
     }
}
