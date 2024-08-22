<?php

use App\Http\Controllers\PartsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PartsController::class, 'readParts'])->name('main');
Route::post('/add-part', [PartsController::class, 'addPart'])->name('addPart');
Route::get('/scrap-parts', [PartsController::class, 'readScrapParts'])->name('scrapParts');
Route::get('/repaired-parts', [PartsController::class, 'readRepairedParts'])->name('repairedParts');
Route::post('/add-scrap', [PartsController::class, 'addToScrap'])->name('addScrap');
Route::post('/add-repaired', [PartsController::class, 'addToRepaired'])->name('addRepaired');

Route::get('/check-connection', function(){
    return view('checkDB');
});
