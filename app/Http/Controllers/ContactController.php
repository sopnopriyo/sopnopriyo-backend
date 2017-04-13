<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Contact;
use Validator; 

class ContactController extends Controller
{


    public function index(){

        $messages = Contact::orderBy('created_at', 'desc')->paginate(8);

        return view('message')->with('messages',$messages);
    }
  
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

    public function destroy(Request $request, $id){

        $contact = Contact::find($id);

        $contact->delete();
        
        $request->session()->flash('alert-success', 'Message has been deleted successfully !');
        return redirect('/message')->withInput();


    }

}
