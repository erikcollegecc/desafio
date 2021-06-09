<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiProdutosController;

Route::get('produtos', [ApiProdutosController::class, 'index']);
//Route::get('produtos', [ApiProdutosController::class, 'create']);
Route::post('produtos', [ApiProdutosController::class, 'store']);
Route::get('produtos/{id}', [ApiProdutosController::class, 'show']);
//Route::get('produtos', [ApiProdutosController::class, 'edit']);
Route::put('produtos/{id}', [ApiProdutosController::class, 'update']);
Route::delete('produtos/{id}', [ApiProdutosController::class, 'destroy']);

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