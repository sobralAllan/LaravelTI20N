<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\registrarAtividadeController;

Route::get('/', function () {
    return view('paginas/index');
});

Route::get('/index', function(){
    return view('paginas/index');
});

Route::get('/cadastrar', function(){
    return view('paginas/cadastrar');
});

Route::get('/cadastrar',[\App\Http\Controllers\registrarAtividadeController::class, 'index']);
Route::get('/cadastrar/salvar',[\App\Http\Controllers\registrarAtividadeController::class,'store']);
Route::get('/consultar',[\App\Http\Controllers\registrarAtividadeController::class, 'consultar']);