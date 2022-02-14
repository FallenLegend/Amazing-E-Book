<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DatabaseController;
use Illuminate\Support\Facades\Route;

Route::middleware(['checkguest:en'])->group(function () {
    Route::get('/home/{lang}', [PageController::class, 'homePage'])->name("home");
    Route::get('/eBookDetail/{id}/{lang}', [PageController::class, 'eBookDetailPage'])->name('eBookDetailPage');
    Route::get('/cart/{lang}', [PageController::class, 'cartPage'])->name('Cart');
    Route::get('/profile/{lang}', [PageController::class, 'profilePage'])->name('Profile');
    Route::get('/saved/{lang}', [PageController::class, 'savedPage'])->name('saved');
    Route::post('/updateProfile/{id}/{lang}', [DatabaseController::class, 'updateProfile'])->name('Update Profile');
    Route::post('/addCartItem/{id}/{lang}', [DatabaseController::class, 'addCartItem'])->name('Add Cart Item');
    Route::post('/deleteCartItem/{id}/{lang}', [DatabaseController::class, 'deleteCartItem'])->name('Delete Cart Item');
    Route::post('/deleteAccount/{id}/{lang}', [DatabaseController::class, 'deleteAccount'])->name('Delete Account');
    Route::get('/logOut/{lang}', [AuthenticationController::class, 'logOut'])->name('logOut');
});

Route::get('/', [PageController::class, 'landingPage']);
Route::get('/{lang}', [PageController::class, 'indexPage'])->name('index');
Route::get('/signUp/{lang}', [PageController::class, 'signUpPage'])->name('signUp');
Route::get('/login/{lang}', [PageController::class, 'loginPage'])->name('login');
Route::get('/logOutSuccessPage/{lang}', [PageController::class, 'logOutSuccessPage'])->name('logOutSuccess');
Route::get('/success/{lang}', [PageController::class, 'successPage'])->name('Success');
Route::post('/registerAccount/{lang}', [DatabaseController::class, 'registerAccount'])->name('Register Account');
Route::post('/logAccount/{lang}', [AuthenticationController::class, 'authenticate'])->name('Authenticate');

Route::middleware(['guardadmin:en'])->group(function () {
    Route::get('/accountMaintenance/{lang}', [PageController::class, 'accountMaintenancePage'])->name('Account Maintenance');
    Route::get('/updateRole/{id}/{lang}', [PageController::class, 'updateRolePage'])->name('updateRole');
    Route::post('/updateRole/{id}/{lang}', [DatabaseController::class, 'updateRole'])->name('Edit Account');
});