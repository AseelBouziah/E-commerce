<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index(){
        return view('pages.contact');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            'message' => 'required',
        ]);

        $input = $request->all();
        Contact::create($input);
        return redirect()->back()->with(['success' => 'Contact Form Submit Successfully']);
        
    }

}
