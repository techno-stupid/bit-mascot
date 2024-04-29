<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//require __DIR__.'/auth.php';



//sign-up
Route::get('/register', [RegistrationController::class, 'register'])->name('auth.register');
Route::post('/register', [RegistrationController::class, 'registerStore'])->name('auth.register.store');

//Email availability
Route::get('/email/availability', [RegistrationController::class, 'emailAvailability'])->name('auth.email.availability');

//login
Route::get('/login', [AuthenticationController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthenticationController::class, 'loginSubmit'])->name('auth.login.submit');

//logout
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('auth.logout');
