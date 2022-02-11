<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\IndexController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
//
Route::group([
    'as' => 'auth.', // имя маршрута, например auth.index
    'prefix' => 'auth', // префикс маршрута, например auth/index
], function () {
    // форма регистрации
    Route::get('register', [RegisterController::class, 'register'])
        ->name('register');
    // создание пользователя
    Route::post('register', [RegisterController::class, 'create'])
        ->name('create');
    // форма входа
    Route::get('login', [LoginController::class, 'login'])
        ->name('login');
    // аутентификация
    Route::post('login', [LoginController::class, 'authenticate'])
        ->name('auth');
    // выход
    Route::get('logout', [LoginController::class, 'loguot'])
        ->name('logout');
    // форма ввода адреса почты
    Route::get('forgot-password', [ForgotPasswordController::class, 'form'])
        ->name('forgot-form');
    // письмо на почту
    Route::post('forgot-password', [ForgotPasswordController::class, 'mail'])
        ->name('forgot-mail');
});

Route::group([
    'as' => 'user.', // имя маршрута, например user.index
    'prefix' => 'user', // префикс маршрута, например user/index
    // 'namespace' => 'User', // пространство имен контроллеров
    'middleware' => ['auth'] // один или несколько посредников
], function () {
    // главная страница
    // Route::get('index', [IndexController::class, 'index'])->name('index');
    Route::get('index', 'App\Http\Controllers\User\IndexController')->name('index');
});
