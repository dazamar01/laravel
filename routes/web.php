<?php

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


// Login
Route::get('/', 'Auth\LoginController@showLoginForm'); //->middleware('guest');
Route::get('login', function () {
    return redirect('/');
});
Route::post('login', 'Auth\LoginController@login')->name('login');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('logout2', 'Auth\LoginController@logout')->name('logout2');
Route::get('home', 'HomeController@index')->name('home');

// Usuarios
Route::get('/usuarios/{page?}{name?}',
    ['uses' => 'UsuariosController@index']
);