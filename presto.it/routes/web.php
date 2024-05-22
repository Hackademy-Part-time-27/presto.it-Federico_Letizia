<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\RevisorController;


Route::get('/', [ViewController::class, 'welcome'])->name('welcome');
Route::get('/categoria/{category}', [ViewController::class, 'categoryShow'])->name('categoryShow');
Route::get('/dettaglio/adv/{adv}', [AdvController::class, 'showAdv'])->name('adv.show');
Route::get('/tutti/adv', [AdvController::class, 'indexAdv'])->name('adv.index');



Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

Route::patch('/accetta/annuncio/{adv}', [RevisorController::class, 'acceptAdv'])->middleware('isRevisor')->name('revisor.accept_adv');

Route::patch('/rifiuta/annuncio/{adv}', [RevisorController::class, 'rejectAdv'])->middleware('isRevisor')->name('revisor.reject_adv');

Route::get('/rendi/utente/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

Route::get('/ricerca/annuncio', [ViewController::class, 'searchAdvs'])->name('adv.search');





Route::prefix('/')->middleware('auth')->group(function() {

    Route::GET('/nuovo/annuncio', [AdvController::class, 'createAdv'])->name('adv.create');
    
    Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->name('become.revisor');

});