<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::view('/','welcome');
Route::get('tasks', 'TaskController@alternativeIndex')->name('all.tasks');
Route::resource('project/{project}/task', 'TaskController');
Route::resource('project', 'ProjectController');
