<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

//home do site
Route::get('/', function () {
    return view('welcome');
});


//mostrar meus clientes 
Route::get('/index-cliente', [ClienteController::class, 'index'])->name('cliente.index');

//cadastrar
Route::get('/criar-cliente', [ClienteController::class, 'criar'])->name('cliente.criar');

//receber dados do formulario 
Route::post('/store-cliente', [ClienteController::class, 'store'])->name('cliente.store');

//receber dados do formulario 
Route::get('/mostrar-cliente', [ClienteController::class, 'mostrar'])->name('cliente.mostrar');

//formulario editar 
Route::get('/editar-cliente/{cliente}', [ClienteController::class, 'editar'])->name('cliente.editar');

//receber o editar 
Route::put('/update-cliente/{cliente}', [ClienteController::class, 'update'])->name('cliente.update');

//excluir
Route::delete('/destroy-cliente', [ClienteController::class, 'destroy'])->name('cliente.destroy');

//ROTAS DE CATEGORIAS 

//listar CATEGORIAS
Route::get('/index-categoria', [CategoriaController::class, 'index'])->name('categoria.index');

//MOSTRAR 
Route::get('/mostrar-categoria', [CategoriaController::class, 'mostrar'])->name('categoria.mostrar');

//cadastrar
Route::get('/criar-categoria', [CategoriaController::class, 'criar'])->name('categoria.criar');

//receber dados do formulario 
Route::post('/store-categoria', [CategoriaController::class, 'store'])->name('categoria.store');