<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function getAllContacts() 
    {
        $contacts = DB::table('contacts')->get();
        
        return $contacts;
    }

    public function getContactById($id)
    {
        return 'GET Contact by Id '.$id;
    }

    public function createContact(Request $request){
        $name = $request->input('name');
        return 'Contact name is '.$name;
    }

    public function updateContact(Request $request, $id){
        return 'This is supposed to be a patch by id: '.$id;
    }

    public function deleteContact($id){
        return 'This is supposed to be a delete by id: '.$id;
    }
}