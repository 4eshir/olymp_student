<?php

use Illuminate\Support\Facades\Route;

Route::get('admin/entry-list', [\App\Http\Controllers\Admin\EntryListController::class, 'create'])
    ->name('admin.entryList');
