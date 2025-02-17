<?php
use App\Http\Controllers\{
    ClientController,
    BookController,
    LoanController
};
use Illuminate\Support\Facades\Route;

Route::apiResource('clients', ClientController::class);
Route::apiResource('books', BookController::class);
Route::apiResource('loans', LoanController::class);
