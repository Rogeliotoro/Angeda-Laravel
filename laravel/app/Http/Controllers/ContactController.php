<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function getAllContacts() 
    {
        /*$contacts = DB::table('contacts')
        ->select('name','surname as apellido')
        ->where('id_user','=',1)
        ->get()
        ->toArray();*/
        $contacts = Contact::where('id_user',1)->get();

        return response()->json($contacts,200) ;
    }

    public function getContactById($id)
    {
        $contacts = Contact::where('id', $id)->where('id_user', 1);
        if (empty($contacts)){
            return response()->json(["sucess"=>"contact no exits"], 404);
        }
    }

    public function createContact(Request $request)
    {

        $newContact = new Contact();
        $newContact->name = $request->name;
        $newContact->surname = $request->surname;
        $newContact->email = $request->email;
        $newContact->phone_number = $request->phone_number;
        $newContact->id_user = $request->id_user;

        $newContact->save();

        return response()->json(["success"=>"contact created",200]);
    }

    public function updateContact(Request $request, $id){
        return 'Patch by id: '.$id;
    }

    public function deleteContact($id){
        return 'Delete by id: '.$id;
    }
}