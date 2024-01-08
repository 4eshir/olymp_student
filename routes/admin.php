<?php

use Illuminate\Support\Facades\Route;

Route::get('admin/entry-list', [\App\Http\Controllers\Admin\EntryListController::class, 'create'])
    ->name('admin.entryList');

Route::post('/download-excel', [\App\Http\Controllers\Admin\EntryListController::class, 'downloadExcel'])->name('downloadExcel');
Route::post('/gen-codes', [\App\Http\Controllers\Admin\EntryListController::class, 'genCodes'])->name('genCodes');
