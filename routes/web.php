<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelpController;
use Illuminate\Http\Request;
use App\Http\Controllers\HelpPortalController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminDashboardController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','check.active'])->name('dashboard');

Route::get('/help', [HelpController::class, 'showForm'])->name('help.form');
Route::post('/help', [HelpController::class, 'submitForm'])->name('help.submit');

Route::get('/helplogin', function () {
    return view('helplogin');
})->name('helplogin');


Route::post('/helplogin', function (Request $request) {
    $email = $request->input('email');
    $password = $request->input('password');

    if (Auth::attempt(['email' => $email, 'password' => $password])) {
        session(['help_logged_in' => true]);
        return redirect()->route('helpportal');
    } else {
        return redirect()->route('helplogin')->withErrors(['Invalid credentials.']);
    }
})->name('helplogin.submit');

Route::get('/helpportal', [App\Http\Controllers\HelpPortalController::class, 'index'])
    ->middleware(['auth', 'check.active'])
    ->name('helpportal');

Route::post('/helplogout', function () {
    session()->forget('help_logged_in'); 
    return redirect()->route('helplogin');
})->name('helplogout');

Route::view('/inactive', 'inactive')->name('inactive');

Route::get('/adminlogin', function () {
    return view('adminlogin');
})->name('adminlogin');

Route::post('/adminlogin', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            Auth::logout();
            return redirect()->route('adminlogin')->withErrors(['You are not authorized as an admin.']);
        }
    } else {
        return redirect()->route('adminlogin')->withErrors(['Invalid credentials.']);
    }
})->name('adminlogin.submit');

Route::get('/adminportal', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::patch('/admin/toggle-status/{id}', function ($id) {
    if (!Auth::check() || Auth::user()->role !== 'admin') {
        return redirect()->route('adminlogin')->withErrors(['Access denied.']);
    }

    return app(App\Http\Controllers\AdminDashboardController::class)->toggleStatus($id);
})->name('admin.toggleStatus');

Route::post('/admin/logout', [App\Http\Controllers\AdminDashboardController::class, 'logout'])->name('admin.logout');

require __DIR__.'/auth.php';

