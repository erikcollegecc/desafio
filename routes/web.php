<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OneToOneController;
use App\Http\Controllers\OneToManyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ManyToManyController;
use App\Http\Controllers\PolymorphicController;

//Rotas para Paises
Route::get('/countries', [OneToOneController::class, 'oneToOne'])->name('country.show');
Route::get('/inverse', [OneToOneController::class, 'oneToOneInverse'])->name('country.inverse');
Route::get('/inverse/{id}', [OneToOneController::class, 'oneToOneShow'])->name('country.show');
Route::get('/insert', [OneToOneController::class, 'oneToOneInsert'])->name('country.insert');

//Rotas para States e Cites
Route::get('/states', [OneToManyController::class, 'oneToMany'])->name('states.show');
Route::get('/states/inverse', [OneToManyController::class, 'ManyToOne'])->name('inverse.show');
Route::get('/cities', [OneToManyController::class, 'cities'])->name('inverse.show');

//Rota de cadastramento de País, Estado e Cites
Route::get('/add', [OneToManyController::class, 'add'])->name('insert.show');
Route::get('/addtwo', [OneToManyController::class, 'addtwo'])->name('insert.show');
Route::get('/hasthrough', [OneToManyController::class, 'HasThrough'])->name('insert.show');

//Rota das Empresas por Cidades
Route::get('/companies', [ManyToManyController::class, 'manyToMany'])->name('insert.show');
Route::get('/companies/inverse', [ManyToManyController::class, 'manyToManyInverse'])->name('inverse.show');
Route::get('/companies/insert', [ManyToManyController::class, 'manyToManyInsert'])->name('insert.show');

//Relação Polymorphic
Route::get('/polymorphic', [PolymorphicController::class, 'Polymorphic'])->name('morph.show');
Route::get('/polymorphic/insert', [PolymorphicController::class, 'PolymorphicInsert'])->name('insert.show');



//Rotas para produtos
Route::any('/produtos/search', [ProdutosController::class, 'search'])->name('produtos.search');
Route::get('/produtos', [ProdutosController::class, 'index'])->name('produtos.index');
Route::get('/produtos/create', [ProdutosController::class, 'create'])->name('produtos.create');
Route::post('/produtos', [ProdutosController::class, 'store'])->name('produtos.store');
Route::get('/produtos/{id}', [ProdutosController::class, 'show'])->name('produtos.show');
Route::delete('/produtos/{id}', [ProdutosController::class, 'destroy'])->name('produtos.destroy');
Route::get('/produtos/edit/{id}', [ProdutosController::class, 'edit'])->name('produtos.edit');
Route::put('/produtos/{id}', [ProdutosController::class, 'update'])->name('produtos.update');


//Rotas restrita para usuários cadastrados
Route::middleware(['auth'])->group(function(){
    //Rota de comentarios dos produtos
    Route::any('/posts/search', [PostController::class, 'search'])->name('posts.search');
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');


});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';