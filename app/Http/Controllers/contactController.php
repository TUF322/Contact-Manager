<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // Adjust the model namespace as per your application

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all(); // Retrieve all contacts

        return view('welcome', compact('contacts')); // Pass the data to the view
    }
}
