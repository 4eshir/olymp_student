<?php

use App\Http\Controllers\Api\EntryApiController;
use App\Http\Controllers\Api\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-entries/{token}/{municipality_id}/{subject_id}', [EntryApiController::class, 'getOlympiadEntry'])->name('getOlympiadEntry');

Route::get('/get-users/{token}/{role?}', [UserApiController::class, 'getUsers'])->name('getUsers');
Route::get('/get-schools/{token}/{municipality?}', [UserApiController::class, 'getSchools'])->name('getSchools');
Route::get('/get-schools-juri/{token}/{jurisdiction?}', [UserApiController::class, 'getSchoolsJuri'])->name('getSchoolsJuri');
Route::get('/get-municipalities/{token}', [UserApiController::class, 'getMunicipalities'])->name('getMunicipalities');
Route::get('/get-subject/{token}/{subject}', [EntryApiController::class, 'getSubject'])->name('getSubject');
Route::get('/get-municipality/{token}/{municipality}', [EntryApiController::class, 'getMunicipality'])->name('getMunicipality');


Route::post('/check-students', [EntryApiController::class, 'checkStudents'])->name('checkStudents');
