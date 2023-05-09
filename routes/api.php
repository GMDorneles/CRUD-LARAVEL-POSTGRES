<?php

use App\Http\Controllers\ClienteController;
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

Route::get('/index', [ClienteController::class, 'index'])->name('api.index');
Route::post('/store', [ClienteController::class, 'store'])->name('api.store');
Route::get('/edit/{id}', [ClienteController::class, 'edit'])->name('api.edit');
Route::delete('/destroy/{id}', [ClienteController::class, 'destroy'])->name('api.destroy');
Route::put('/update/{id}', [ClienteController::class, 'update'])->name('api.update');