<?php

// comentario de prueba para la rama new_branch

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ContactsListMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\PDFMail;

class ContactController extends Controller
{
public function index()
{
$contacts = Contact::all();
return view('contacts.index', compact('contacts'));
}
public function create()
{
return view('contacts.create');
}
public function store(Request $request)
{
$request->validate([
'name' => 'required|string',
'phone' => 'required|string',
]);
Contact::create($request->only('name', 'phone'));
return redirect()->route('contacts.index')->with('success', 'Contact
added successfully!');
}

public function sendEmail()
{
    $contacts = \App\Models\Contact::all();

    Mail::to('marta.roiloa-garcis@stud.svako.lt')->send(new ContactsListMail($contacts));

    return back()->with('success', 'Contacts list sent by email!');
}
public function sendReportEmail()
{
    Mail::to('test@example.com')->send(new PDFMail());

    return back()->with('success', 'The PDF report has been sent by email!');
}
}
