<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\app\TodoController;
use App\Http\Controllers\app\LoginController;
use App\Http\Controllers\app\LogoutController;
use App\Http\Controllers\app\RegisterController; 
    
Route::middleware(['guestchecker'])->group(function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']); 
    
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('authchecker'); 

Route::get('/', [TodoController::class, 'index'])->name('todo')->middleware('authchecker'); 
Route::post('/', [TodoController::class, 'create'])->middleware('authchecker');
Route::delete('/{todo}', [TodoController::class, 'destroy'])->name('todo.delete');
Route::get('/edit/{edit}', [TodoController::class, 'edit'])->name('edit');
Route::put('/{todo}', [TodoController::class, 'update'])->name('todo.update');





Route::fallback(function () {
    return redirect()->route('login')->withErrors([
        'accessError' => 'You cant do that',
    ]);
});