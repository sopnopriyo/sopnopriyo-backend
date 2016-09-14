<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Contact;
use Validator; 

class ContactController extends Controller
{

  
  	public function store(Request $request)
    {


    	$validator = Validator::make($request->all(), [
            'name' => 'required',
		    'email' => 'required|email',
		    'message' =>'required',
        ]);
    	if ($validator->fails()) {
            return redirect('/#contact')
                        ->withErrors($validator)
                        ->withInput();
        }

        $name = $request->input('name');
        $email = $request->input('email');
		$message = $request->input('message');
			
		$contact = new Contact;
		$contact->name = $name;
		$contact->email = $email;
		$contact->message = $message;

        $contact->save();


    	$request->session()->flash('alert-success', 'Your message has been sent successfully !');
        return redirect('/#contact')->withInput();
    }

}
