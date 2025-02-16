<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
        ]);

        Contact::create($validated);

        return redirect()->route('contacts.index')->with('success', 'Contact created successfully');
    }

    public function read()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        // dd(public_path('uploads\niswey.xml'));

        if ($request->hasFile('xml')) {
            $filename = $request->xml->getClientOriginalExtension();
            $request->xml->move(public_path('uploads'), $filename);
        }

        $xmlString = file_get_contents(public_path('uploads/' . $filename));

        $xmlObject = simplexml_load_string($xmlString);

        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true);

        // dd($phpArray);

        foreach ($phpArray['contact'] as $contact) {
            Contact::create($contact);
        }
        return redirect()->route('contacts.index')->with('success', 'XML File imported successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
        ]);

        $contact->update($validated);

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully');
    }
}
