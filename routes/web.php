<?php

use App\Http\Controllers\UserinfoController;
use App\Http\Controllers\profileController;
use Illuminate\Support\Facades\Route;




Route::get('/', [UserinfoController::class, 'home'])->name('home');
// Routes for unauthenticated users

Route::get('/register', [UserinfoController::class, 'register'])->name('register');
Route::post('/register', [UserinfoController::class, 'registerPost'])->name('register');

Route::get('/login', [UserinfoController::class, 'login'])->name('login');
Route::post('/login', [UserinfoController::class, 'loginPost'])->name('login');


// Routes for authenticated users
Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [profileController::class, 'profile'])->name('profile');
    Route::post('/profile', [profileController::class, 'profilePost'])->name('profile');

    Route::delete('/logout', [UserinfoController::class, 'logout'])->name('logout');


    Route::get('/todo', [profileController::class, 'todo'])->name('todo');
    Route::post('/todo', [profileController::class, 'todoPost'])->name('todo');


    Route::get('/delete/{id}', [profileController::class, 'deleteTodo'])->name('deletetodo');
    Route::post('/update/{id}', [profileController::class, 'updateTodo'])->name('updateTodo');








    // Route::get('/user-form', [profileController::class, 'showForm'])->name('user.form');
    // Route::put('/update-user/{id}', [profileController::class, 'updateUser'])->name('update.user');
    // Route::delete('/delete-user/{id}', [profileController::class, 'deleteUser'])->name('delete.user');





});
