<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerdidoController;
use App\Http\Controllers\EncontradoController;
use App\Http\Controllers\DoacaoController;
use App\Http\Controllers\AtualizacaoController;
use App\Http\Controllers\CuidadoController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/perdido/search', [PerdidoController::class, "search"])->name('perdido.search');
    Route::get('/perdido/chart/',
        [PerdidoController::class, "chart"])->name('perdido.chart');
    Route::get('/perdido/report/',
        [PerdidoController::class, "report"])->name('perdido.report');
    Route::resource('perdido', PerdidoController::class);

    Route::post('/encontrado/search', [EncontradoController::class, "search"])->name('encontrado.search');
    Route::get('/encontrado/chart/',
        [EncontradoController::class, "chart"])->name('encontrado.chart');
    Route::get('/encontrado/report/',
        [EncontradoController::class, "report"])->name('encontrado.report');
    Route::resource('encontrado', EncontradoController::class);

    Route::post('/doacao/search', [DoacaoController::class, "search"])->name('doacao.search');
    Route::get('/doacao/chart/',
        [DoacaoController::class, "chart"])->name('doacao.chart');
    Route::get('/doacao/report/',
        [DoacaoController::class, "report"])->name('doacao.report');
    Route::resource('doacao', DoacaoController::class);


    Route::post('/atualizacao/search', [AtualizacaoController::class, "search"])->name('atualizacao.search');
    Route::get('/atualizacao/detail/{id}',
     [AtualizacaoController::class, "detail"])->name('atualizacao.detail');
    Route::get('/atualizacao/report/',
      [AtualizacaoController::class, "report"])->name('atualizacao.report');
    Route::get('/atualizacao/chart/',
      [AtualizacaoController::class, "chart"])->name('atualizacao.chart');
    Route::resource('atualizacao', AtualizacaoController::class);

    Route::post('/cuidado/search', [CuidadoController::class, "search"])->name('cuidado.search');
    Route::get('/cuidado/detail/{id}',
     [CuidadoController::class, "detail"])->name('cuidado.detail');
    Route::get('/cuidado/report/',
      [CuidadoController::class, "report"])->name('cuidado.report');
    Route::get('/cuidado/chart/',
      [CuidadoController::class, "chart"])->name('cuidado.chart');
    Route::resource('cuidado', CuidadoController::class);

});

require __DIR__.'/auth.php';
