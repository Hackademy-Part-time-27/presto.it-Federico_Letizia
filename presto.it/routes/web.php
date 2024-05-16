<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\advController;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/')->middleware('auth')->group(function() {

    Route::GET('/nuovo/annuncio', [advController::class, 'createAdv'])->name('adv.create');
    
});