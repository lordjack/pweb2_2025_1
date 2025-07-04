<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\TurmaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
/*
Route::get(
    '/aluno',
    [AlunoController::class, 'index']
)->name('aluno.index');

Route::get(
    '/aluno/create',
    [AlunoController::class, 'create']
)->name('aluno.create');

Route::post(
    '/aluno/store',
    [AlunoController::class, 'store']
)->name('aluno.store');

Route::delete(
    'aluno/{id}',
    [AlunoController::class, 'destroy']
)
    ->name('aluno.destroy');

Route::get(
    '/aluno/edit/{id}',
    [AlunoController::class, 'edit']
)->name('aluno.edit');

Route::put(
    '/aluno/update/{id}',
    [AlunoController::class, 'update']
)->name('aluno.update');

Route::post(
    '/aluno/search',
    [TurmaController::class, 'search']
)->name('aluno.search');
*/
Route::get(
    '/aluno/report',
    [AlunoController::class, 'report']
)->name('aluno.report');

Route::get(
    '/aluno/chart',
    [AlunoController::class, 'chart']
)->name('aluno.chart');

Route::post(
    '/aluno/search',
    [TurmaController::class, 'search']
)->name('aluno.search');

//cria todas as rotas create,store, edit, update, index e delete
Route::resource('aluno', AlunoController::class);


Route::post(
    '/curso/search',
    [CursoController::class, 'search']
)->name('curso.search');
Route::get(
    '/curso/report',
    [CursoController::class, 'report']
)->name('curso.report');
Route::resource('curso', CursoController::class);

Route::post(
    '/turma/search',
    [TurmaController::class, 'search']
)->name('turma.search');
Route::resource('turma', TurmaController::class);

Route::get(
    '/curso/{curso}/turmas',
    [TurmaController::class, 'index']
)->name('curso.turmas');

Route::get(
    '/curso/{curso}/turmas/create',
    [TurmaController::class, 'create']
)->name('curso.turmas.create');
/*
Route::delete(
    '/turma/{id}',
    [TurmaController::class, 'destroy']
)->name('turma.destroy');
*/
