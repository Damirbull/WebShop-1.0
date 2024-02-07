<?php
use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;
//Route::get('/', 'NameController@NameFunction');
// php artisan optimize
//php artisan config:cache консоль
// http://localhost/openserver/phpmyadmin/
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
Route::get('/', 'HomeController@home')->middleware('auth')->name('home');
// Регистрация
Route::get('/signup', 'SigninController@getsignin')->middleware('guest')->name('auth.signin');
Route::post('/signup', 'SigninController@postsignin')->middleware('guest')->name('auth.signup');

// Авторизация
Route::post('/login', 'SigninController@authenticate')->name('login');

//Добавление книг
Route::post('/', 'CartController@postcart')->name('cart');
//admin
Route::get('/admin', 'HomeController@admin')->middleware('admin')->name('admin');
//Активировать
Route::post('/admin/{id}', 'HomeController@activate');
//Удалить
Route::delete('/admin/{id}', 'HomeController@delete');
//Редактировать
Route::put('/edit/{id}', 'ProductController@update')->name('edit.update');
//Свои карточки
Route::get('/catalog', 'HomeController@catalog')->name('catalog');
