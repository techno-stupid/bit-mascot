<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileSettingsController;
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

Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//require __DIR__.'/auth.php';


Route::group(['as' => 'auth.'],function () {

    Route::middleware('guest')->group(function () {
        Route::get('/register', [RegistrationController::class, 'register'])->name('register');
        Route::post('/register', [RegistrationController::class, 'registerStore'])->name('register.store');
        Route::get('/email/availability', [RegistrationController::class, 'emailAvailability'])->name('email.availability');
        Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
        Route::post('/login', [AuthenticationController::class, 'loginSubmit'])->name('login.submit');
    });

    Route::middleware('auth')->group(function () {

        //profile
        Route::get('/profile', [ProfileSettingsController::class, 'profile'])->name('profile');

        Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
        //change password
        Route::get('/change-password', [ProfileSettingsController::class, 'changePassword'])->name('change.password');
        Route::post('/change-password', [ProfileSettingsController::class, 'updatePassword'])->name('update.password');
    });
});


