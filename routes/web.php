<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BookController,
    ClientController,
    LoanController,
};

Route::get('/', function () {
    return view('welcome');
});

Route::resource('clients', ClientController::class);
Route::resource('books', BookController::class);
Route::resource('loans', LoanController::class);

