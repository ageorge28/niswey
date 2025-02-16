<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('contacts/read', [ContactController::class, 'read'])->name('contacts.read');
Route::post('contacts/upload', [ContactController::class, 'upload'])->name('contacts.upload');

Route::resource('contacts', ContactController::class);
