<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\StoreRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(StoreRequest $request)
    {
        $contact = Contact::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);

        return redirect()->back();
    }
}
