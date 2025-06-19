<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HelpRequest;

class HelpController extends Controller
{
    public function showForm()
    {
        return view('help');  
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        HelpRequest::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return view('thankyou');

    }
}
