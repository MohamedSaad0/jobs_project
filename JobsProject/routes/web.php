<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobListController;

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


//////////////////////////////////////////////////////////////////////////
//                          Dashboard                                   //
//////////////////////////////////////////////////////////////////////////
Route::resource('jobs', JobListController::class);

// Route::get('/jobs/all', [JobListController::class, 'index']);
// Route::get('/create/job', [JobListController::class, 'create']);
// Route::post('/jobs/all', [JobListController::class, 'store']);
