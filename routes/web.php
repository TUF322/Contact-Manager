<?php
// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', [ContactController::class, 'index']);
Route::get('/create', function () {
    return view('CreateContact');
});
Route::post('/submit', [ContactController::class, 'store']);
Route::get('/update', [ContactController::class, 'getContacts']);
Route::get('/contacts/{id}', [ContactController::class, 'getContact']);
Route::put('/update/{id}', [ContactController::class, 'update']);
Route::get('/delete', [ContactController::class, 'getContactsForDelete']);
Route::delete('/delete/{id}', [ContactController::class, 'destroy']); // Route to handle delete request


