<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlunosController;
use App\Http\Controllers\CidadesController;
use App\Http\Controllers\FuncionariosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/alunos', [AlunosController::class, 'index']);
    Route::get('/alunos/novo', [AlunosController::class, 'create']);
    Route::post('/alunos/novo', [AlunosController::class, 'store']);
    Route::get('/alunos/editar/{id}', [AlunosController::class, 'edit']);
    Route::post('/alunos/editar/', [AlunosController::class, 'update']);
    Route::get('/alunos/delete/{id}', [AlunosController::class, 'destroy']);

    Route::get('/cidades', [CidadesController::class, 'index']);
    Route::get('/cidades/novo', [CidadesController::class, 'create']);
    Route::post('/cidades/novo', [CidadesController::class, 'store']);
    Route::get('/cidades/editar/{id}', [CidadesController::class, 'edit']);
    Route::post('/cidades/editar/', [CidadesController::class, 'update']);
    Route::get('/cidades/delete/{id}', [CidadesController::class, 'destroy']);

    Route::get('/funcionarios', [FuncionariosController::class, 'index']);
    Route::get('/funcionarios/novo', [FuncionariosController::class, 'create']);
    Route::post('/funcionarios/novo', [FuncionariosController::class, 'store']);
    Route::get('/funcionarios/editar/{id}', [FuncionariosController::class, 'edit']);
    Route::post('/funcionarios/editar/', [FuncionariosController::class, 'update']);
    Route::get('/funcionarios/delete/{id}', [FuncionariosController::class, 'destroy']);
});
