<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('home');

})->middleware('auth');


/* Registro */
Route::get('/register', [RegisterController::class, 'create'])
->middleware('guest')
->name ('register.index');

Route::post('/register', [RegisterController::class, 'store'])->name ('register.store');


/* Login */
Route::get('/login', [SessionsController::class, 'create'])
->middleware('guest')
->name ('login.index');

Route::post('/login', [SessionsController::class, 'store'])->name ('login.store');


/* Home para que el usuario agregue una foto de perfil*/
Route::post('/user/update-photo', [SessionsController::class, 'updatePhoto'])->name('user.updatePhoto');


/* Cerar sesión */
Route::get('/logout', [SessionsController::class, 'destroy'])
->middleware('auth')
->name ('login.destroy');


/* Admin */
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth.admin')->name('admin.index');

Route::group(['prefix' => 'admin/user'], function(){
    Route::get('/create', [AdminController::class, 'create'])->middleware('auth.admin')->name('admin.create');
    Route::post('/add', [AdminController::class, 'store'])->middleware('auth.admin')->name('admin.store');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->middleware('auth.admin')->name('admin.edit');
    Route::post('/update/{id}', [AdminController::class, 'update'])->middleware('auth.admin')->name('admin.update');
    Route::post('/delete', [AdminController::class, 'destroy'])->middleware('auth.admin')->name('admin.delete');

});
