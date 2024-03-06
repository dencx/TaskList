<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => \App\Models\Task::latest()->get()
    ]);
})->name('tasks.index');

Route::view('tasks/create', 'create')
    ->name('tasks.create');

Route::get('tasks/{id}', function ($id) {
    return view('show', ['task' => \App\Models\Task::findOrFail($id)]);
})->name('tasks.show');

Route::fallback(function () {
    return '404 error';
});

Route::post('/tasks', function (Request $request) {
    dd($request->all());
})->name('tasks.save');
