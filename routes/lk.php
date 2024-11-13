<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/


Route::middleware('auth')->group(function () {
    Route::get('profile', [\App\Http\Controllers\Lk\LkController::class, 'default'])->name('default');
    Route::get('profile/{id}', [\App\Http\Controllers\Lk\LkController::class, 'create'])->name('profile');

    Route::get('profile-edit-common', [\App\Http\Controllers\Lk\LkController::class, 'editCommon'])->name('profileEditCommon');
    Route::get('profile-edit-contact', [\App\Http\Controllers\Lk\LkController::class, 'editContact'])->name('profileEditContact');
    Route::get('profile-edit-special', [\App\Http\Controllers\Lk\LkController::class, 'editSpecial'])->name('profileEditSpecial');
    Route::get('profile-edit-special', [\App\Http\Controllers\Lk\LkController::class, 'editSpecial'])->name('profileEditSpecial');
    Route::get('profile-dropdown-educational-data', [\App\Http\Controllers\Lk\LkController::class, 'dropdownEducationalData'])->name('profileDropdownEducationalData');

    Route::post('profile-request-common', [\App\Http\Controllers\Lk\LkController::class, 'requestCommon'])->name('profileRequestCommon');
    Route::post('profile-request-contact', [\App\Http\Controllers\Lk\LkController::class, 'requestContact'])->name('profileRequestContact');
    Route::post('profile-request-special', [\App\Http\Controllers\Lk\LkController::class, 'requestSpecial'])->name('profileRequestSpecial');

    Route::get('phone-confirm/{phone}/{result}', [\App\Http\Controllers\Lk\LkController::class, 'showPhoneConfirm'])->name('showPhoneConfirm');

    Route::post('phone-confirm', [\App\Http\Controllers\Lk\LkController::class, 'phoneConfirm'])->name('phoneConfirm');
    Route::post('phone-confirm-process', [\App\Http\Controllers\Lk\LkController::class, 'phoneConfirmProcess'])->name('phoneConfirmProcess');

    Route::get('entry', [\App\Http\Controllers\Lk\EntryController::class, 'create'])->name('entry');
    Route::get('entry-dropdown-class-data', [\App\Http\Controllers\Lk\EntryController::class, 'dropdownClassData'])->name('entryDropdownClassData');

    Route::post('delete-entry', [\App\Http\Controllers\Lk\EntryController::class, 'delete'])->name('deleteEntry');
    Route::post('createEntry', [\App\Http\Controllers\Lk\EntryController::class, 'store'])->name('createEntry');
});
