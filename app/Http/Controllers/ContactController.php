<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\NotificateNewContact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function createContact(Request $request){
    	//dd($request->all());
    	Contact::createContacts($request->firstName, $request->lastname, $request->email, $request->phone);
    	Mail::to($request->email)->send(new NotificateNewContact());
    	return \Redirect::back();
    }
    public function getContactByName(Request $request){
    	$contacts = Contact::getContactByName($request->search);
    	return view("home", compact('contacts'));
    }
    public function showContactForUpdate($id){
    	$contacts = Contact::getContactById($id);
    	return view("contactUpdate", compact('contacts'));
    }
    public function updateContact(Request $request){
    	Contact::updateContacts($request->id,$request->firstName, $request->lastname, $request->email, $request->phone);
    	return \Redirect("home");
    }
    public function deleteContact($id){
    	Contact::deleteContact($id);
    	return \Redirect::back();
    }
}
