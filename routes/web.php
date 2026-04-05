<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagementController;
Route::get('/user-management', [UserManagementController::class, 'index']);
Route::get('/detail-user/{nama}/{npm}/{jurusan}/{prodi}',[UserManagementController::class, 'viewData']);

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

Route::get('/', function () {
    return view('welcome');
});
