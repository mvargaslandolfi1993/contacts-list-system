<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function createContact(Request $request){
    	//dd($request->all());
    	Contact::createContacts($request->firstName, $request->lastname, $request->email, $request->phone);
    	return \Redirect::back();
    }
    public function updateContact(Request $request){
    	Contact::updateContacts($request->id,$request->firstName, $request->lastname, $request->email, $request->phone);
    	return \Redirect::back();
    }
    public function deleteContact($id){
    	Contact::deleteContact($id);
    	return \Redirect::back();
    }
}
