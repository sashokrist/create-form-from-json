<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/forms/{form}', [FormController::class, 'show']);
Route::post('/forms/{form}', [FormController::class, 'submit']);

Route::prefix('admin/forms')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/{form}', [AdminController::class, 'view']);
});
