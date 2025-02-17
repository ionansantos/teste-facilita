<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BookController,
    ClientController,
    LoanController,
};

Route::get('/', function () {
    return redirect()->route('clients.index');
});

Route::resource('clients', ClientController::class);
Route::resource('books', BookController::class);
Route::resource('loans', LoanController::class);

