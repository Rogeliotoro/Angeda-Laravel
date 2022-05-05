<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function getAllContacts()
    {
        try {
            Log::info('init get all contacts');
            /*$contacts = DB::table('contacts')
        ->select('name','surname as apellido')
        ->where('id_user','=',1)
        ->get()
        ->toArray();*/
            $contacts = Contact::where('id_user', 7)->get()->toArray();
            if (empty($contacts)) {
                return response()->json(["sucess" => "contact no exits"], 404);
            }
            return response()->json($contacts, 200);
        } catch (\Throwable $th) {
            Log::error('ha ocurrido un error->' . $th->getMessage());
            return response()->json(["error" => "upps"], 500);
        }
    }

    public function getContactById($id)
    {
        $contacts = Contact::where('id', $id)->where('id_user', 1)->first();
        if (empty($contacts)) {
            return response()->json(["sucess" => "contact no exits"], 404);
        }
    }

    public function createContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:25',
            'surname' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $newContact = new Contact();
        $newContact->name = $request->name;
        $newContact->surname = $request->surname;
        $newContact->email = $request->email;
        $newContact->phone_number = $request->phone_number;
        $newContact->id_user = $request->id_user;

        $newContact->save();

        return response()->json(["success" => "contact created", 200]);
    }

    public function updateContact(Request $request, $id)
    {
        $contact = Contact::where('id', $id)->where('id_user', 4)->first();

        if (empty($contact)) {
            return response()->json(["error" => "contact not exists", 404]);
        }

        if (isset($request->name)) {
            $contact->name = $request->name;
        }
        if (isset($request->surname)) {
            $contact->surname = $request->surname;
        }
        if (isset($request->email)) {
            $contact->email = $request->email;
        }
        if (isset($request->phone_number)) {
            $contact->phone_number = $request->phone_number;
        }
        $contact->save();
        return response()->json(["data" => $contact, 200]);
    }

    public function deleteContact($id)
    {
        $contact = Contact::where('id', $id)->where('id_user', 1)->first();

        if (empty($contact)) {
            return response()->json(["error" => "contact not exists", 404]);
        }
        $contact->delete();
        return 'Delete by id: ' . $id;
    }
}
