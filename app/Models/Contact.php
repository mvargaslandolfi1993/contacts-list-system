<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table      = "contacts";
    protected $primaryKey = "id";
    protected $guarded    = ["created_at", "updated_at"];

    public static function getContacts(){
    	return static::select(
    		\DB::raw("contacts.id as id"),
    		\DB::raw("contacts.firstname as firstname"),
    		\DB::raw("contacts.lastname as lastname"),
    		\DB::raw("contacts.email as email"),
    		\DB::raw("contacts.phonenumber as phonenumber"))
    		->paginate(5);
    }
    public static function createContacts($firstname, $lastname, $email, $phonenumber){

    	return static::insert([
    	 	'firstname' 				=> $firstname,
    	 	'lastname'   				=> $lastname,
    	 	'email' 					=> $email,
    	 	'phonenumber' 				=> $phonenumber
    	 ]);
    }
    public static function updateContacts($id, $firstname, $lastname, $email, $phonenumber){
        return static::update([
            'firstname'                 => $firstname,
            'lastname'                  => $lastname,
            'email'                     => $email,
            'phonenumber'               => $phonenumber
         ]);
    }
    public static function deleteContact($id){
        \DB::table('contacts')->where('id', '=', $id)->delete();
    }
}
