<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', [ContactController::class, 'index']);
Route::get('/create', function () {
    return view('CreateContact');
});

Route::post('/submit', [ContactController::class, 'store']); // Ensure this line exists

Route::get('/update', function () {
    return view('updateContact');
});

Route::get('/delete', function () {
    return view('deleteContact');
});

