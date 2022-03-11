<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationEmailController;
use App\Http\Controllers\UserNotificationController;
use App\Http\Controllers\EmailController;

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

Route::post('/test', [PDFController::class, 'index']);
Route::get('/notified', [PDFController::class, 'notified']);

Route::post('/sign', [PDFController::class, 'sign']);
Route::post('/users/{user}/notifications', [UserNotificationController::class, 'store']);
Route::get('/users/{user}/notifications', [UserNotificationController::class, 'index']);
Route::post('/notifications/{notification}/notify', [NotificationController::class, 'notify']);
Route::get('/notifications/{notification}', [NotificationController::class, 'show']);
Route::post('/notifications/{notification}/emails', [NotificationEmailController::class, 'store']);
Route::get('/notifications/{notification}/emails', [NotificationEmailController::class, 'index']);
Route::put('/emails/{email}', [EmailController::class, 'update']);
Route::get('/emails/{email}', [EmailController::class, 'show']);
