<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HelpRequest;
class HelpPortalController extends Controller
{
    public function index()
{
    $user = auth()->user(); 

    if ($user && $user->role === 'admin') {
        $helpRequests = HelpRequest::all();
    } else {
        $helpRequests = HelpRequest::where('email', $user->email)->get();
    }

    return view('helpportal', compact('helpRequests'));
}

}

