<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main;


Route::get('/', [Main::class, 'home'])->name('home');

Route::get('/new_task', [Main::class, 'new_task'])->name('new_task');

Route::post('/new_task_submit', [Main::class, 'new_task_submit'])->name('new_task_submit');

Route::get('/task_done/{id}', [Main::class, 'task_done'])->name('task_done');

Route::get('/task_not_done/{id}', [Main::class, 'task_not_done'])->name('task_not_done');

Route::get('/edit_task_frm/{id}', [Main::class, 'edit_task_frm'])->name('edit_task_frm');

Route::post('/edit_task_submit', [Main::class, 'edit_task_submit'])->name('edit_task_submit');

Route::get('/see_all_tasks_invisible', [Main::class, 'see_all_tasks_invisible'])->name('see_all_tasks_invisible');

Route::get('task_invisible/{id}', [Main::class, 'task_invisible'])->name('task_invisible');

Route::get('task_visible/{id}', [Main::class, 'task_visible'])->name('task_visible');
