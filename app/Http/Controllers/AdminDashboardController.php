<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
{
    if (!Auth::check() || Auth::user()->role !== 'admin') {
        return redirect()->route('adminlogin')->withErrors(['Access denied. Please login as an admin.']);
    }

    $users = User::all();
    return view('adminportal', compact('users'));
}

    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);

        if ($user->id === Auth::id()) {
            return redirect()->route('admin.dashboard')->withErrors(['You cannot change your own status.']);
        }

        $user->status = $user->status === 'active' ? 'inactive' : 'active';
        $user->save();

        return redirect()->route('admin.dashboard')->with('status', 'User status updated successfully.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('adminlogin');
    }
}
