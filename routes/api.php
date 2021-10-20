<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\ProposalController;


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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    

    Route::post('/project',[ProjectController::class,'store']);

    Route::get('/progress',[ProgressController::class,'index']);
    
});
Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    

    Route::get('/user/project',[ProjectController::class,'getProjectUser']);
    Route::post('/project',[ProjectController::class,'store']);

    Route::post('/progress',[ProgressController::class,'store']);

    Route::post('/join',[ProposalController::class,'store']);
    
});
Route::get('/project',[ProjectController::class,'index']);
Route::get('/project/{id}',[ProjectController::class,'getDetail']);
Route::get('/progress/{id}',[ProgressController::class,'index']);
Route::get('/find',[ProjectController::class,'find']);
