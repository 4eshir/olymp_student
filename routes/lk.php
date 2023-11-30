<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/


Route::get('profile/{id}', [\App\Http\Controllers\Lk\LkController::class, 'create'])->name('profile');

Route::post('profileBase', [\App\Http\Controllers\Lk\LkController::class, 'storeBase'])->name('profileBase');
Route::post('profileContact', [\App\Http\Controllers\Lk\LkController::class, 'storeContact'])->name('profileContact');
Route::post('profileSpecial', [\App\Http\Controllers\Lk\LkController::class, 'storeSpecial'])->name('profileSpecial');


Route::get('entry', [\App\Http\Controllers\Lk\EntryController::class, 'create'])->name('entry');

Route::post('createEntry', [\App\Http\Controllers\Lk\EntryController::class, 'store'])->name('createEntry');
