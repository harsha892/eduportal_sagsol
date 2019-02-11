<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactPostRequest;

class ContactController extends Controller
{
    public function UserContactInfo(ContactPostRequest $request){
        $contact = new Contact();

        $contact->user_id = $request->get("user_id");
        $contact->country_code = $request->get("country_code");
        $contact->personal_phone = $request->get("personal_phone");
        $contact->emergency_phone = $request->get("emergency_phone");
        $contact->city = $request->get("city");
        $contact->state = $request->get("state");
        $contact->zipcode = $request->get("zipcode");
        $contact->full_address = $request->get("full_address");

        $contact->save();

        return $contact;
    }
    //
}
