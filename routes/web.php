<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ContactController::class, 'show'])->name('contact.show');
Route::get('/contacts', [ContactController::class, 'index']);
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/edit', [ContactController::class, 'get'])->name('user.edit');
Route::get('/contacts/edit/{id}', [ContactController::class, 'edit']);
Route::put('/contacts/edit/{user}', [ContactController::class, 'update'])->name('user.update');
Route::get('/contacts/view/{id}', [ContactController::class, 'profile_get'])->name('user.view');
Route::delete('/contacts/delete/{id}', [ContactController::class, 'delete_user'])->name('contacts.delete');

Route::resource('/contacts', ContactController::class);
