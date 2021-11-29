<?php

use App\Events\WebSocketDemoEvent;
use Illuminate\Broadcasting\BroadcastEvent;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});


Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin3'])->name('admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['role']);

Route::get('/chats', [App\Http\Controllers\ChatsController::class, 'index'])->name('chats');

Route::get('/messages', [App\Http\Controllers\ChatsController::class, 'fetchMessages'])->name('messages');

Route::post('/messages', [App\Http\Controllers\ChatsController::class, 'sendMessages'])->name('messages');