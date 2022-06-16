<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationEmailController;
use App\Http\Controllers\UserNotificationController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/{user}/notifications', [UserNotificationController::class, 'store']);
    Route::get('/{user}/notifications', [UserNotificationController::class, 'index']);
    Route::get('/{user}/inbox', [UserController::class, 'inbox']);
});

Route::prefix('notifications')->group(function () {
    Route::get('/{notification}', [NotificationController::class, 'show']);
    Route::post('/{notification}/notify', [NotificationController::class, 'notify']);
    Route::post('/{notification}/emails', [NotificationEmailController::class, 'store']);
    Route::get('/{notification}/emails', [NotificationEmailController::class, 'index']);
});

Route::prefix('emails')->group(function () {
    Route::put('/{email}', [EmailController::class, 'update']);
    Route::get('/{email}', [EmailController::class, 'show']);
});

// Actions
Route::post('/sign', [PDFController::class, 'sign']);
//Route::post('/upload', [PDFController::class, 'upload']);