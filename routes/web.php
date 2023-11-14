<?php

use App\Http\Controllers\ResepController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ResepController::class, 'index'])->name('welcome');


Route::get('/login', function () {
    return view('login');
})->name("login-view");

Route::resource('recipe' ,ResepController::class, ['only' => ['show']]);



Route::post('/login', function (Request $request) {
    $check = Auth::attempt([
        'username' => $request->username,
        'password' => $request->password,
    ]);

    if ($check) {
       return redirect()->route('welcome');
    }

    return redirect()->route('login-view')->with('message', 'Username atau Password salah');
})->name("form-login");


Route::middleware('auth')->group(function(){
    Route::get('/dashboard', function (){
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('recipe' ,ResepController::class, ['except' => ['index', 'show']]);
});

Route::get('/logout', function () {
    Auth::logout();

    return redirect()->route('welcome');
})->name('logout');
