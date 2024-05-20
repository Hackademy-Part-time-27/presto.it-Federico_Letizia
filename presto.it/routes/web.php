<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvController;
use App\Http\Controllers\ViewController;


Route::get('/', [ViewController::class, 'welcome'])->name('welcome');
Route::get('/categoria/{category}', [ViewController::class, 'categoryShow'])->name('categoryShow');
Route::get('/dettaglio/adv/{adv}', [AdvController::class, 'showAdv'])->name('adv.show');
Route::get('/tutti/adv', [AdvController::class, 'indexAdv'])->name('adv.index');

Route::prefix('/')->middleware('auth')->group(function() {

    Route::GET('/nuovo/annuncio', [AdvController::class, 'createAdv'])->name('adv.create');
    
});