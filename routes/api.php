<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiProdutosController;

// Rotas de API 
Route::get('produtos', [ApiProdutosController::class, 'index']);
Route::get('produto/{id}', [ApiProdutosController::class, 'show']);
Route::post('produto', [ApiProdutosController::class, 'store']);
Route::put('produto/{id}', [ApiProdutosController::class, 'update']);
Route::delete('produto/{id}', [ApiProdutosController::class, 'destroy']);

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});