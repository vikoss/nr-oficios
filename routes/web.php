<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

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
Route::get('/probar-pdf', [PDFController::class, 'generate']);


Route::get('/descargar/reporte-de-notificacion/{notification}', [PDFController::class, 'validatedEmailsReport']);

Route::get('/{any}', function () {
    return view('index');
})->where('any', '.*');;

