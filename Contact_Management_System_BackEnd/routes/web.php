<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserContactController;
use App\Http\Controllers\GroupController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//group routes
Route::get('/api/add-group', [GroupController::class, 'store']);
Route::get('/api/view-group/{id}', [GroupController::class, 'show']);
Route::get('/api/update-group/{id}', [GroupController::class, 'update']);
Route::get('/api/delete-group/{id}', [GroupController::class, 'destroy']);

//user contact routes
Route::get('/api/add-user-contact', [UserContactController::class, 'store']);
Route::get('/api/view-user-contact/{id}', [UserContactController::class, 'show']);
Route::get('/api/update-user-contact/{id}', [UserContactController::class, 'update']);
Route::get('/api/delete-user-contact/{id}', [UserContactController::class, 'destroy']);
Route::get('/api/search/{string}', [UserContactController::class, 'SearchUser']);
