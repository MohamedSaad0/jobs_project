<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobListController;
use App\Http\Controllers\FlutterJobController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobApplicants;


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



//////////////////////////////////////////////////////////////////////////
//                               User                                   //
//////////////////////////////////////////////////////////////////////////
//register
Route::post('/register', [AuthController::class, 'register']);
//login
Route::post('/login', [AuthController::class, 'login']);


//////////////////////////////////////////////////////////////////////////
//                            Protected Routes                          //
//////////////////////////////////////////////////////////////////////////

Route::group(['middleware' => ['auth:sanctum']],function() {

    //list all jobs
    Route::get('/jobs', [FlutterJobController::class, 'index']);
    // Apply to a job
    //logout
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::post('/appliedJob', [JobApplicants::class, 'store']);



// Route::post('/job/create', [FlutterJobController::class, 'store']);
