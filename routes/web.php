<?php

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/code','CodeController@showCodeForm')->name('code.input');
Route::post('/code','CodeController@codeCheck');

Route::get('/code/{id}/vote','VoteController@voteForm')->name('vote.liquor');
Route::post('/code/{id}/vote','VoteController@votePopularLiquor');

Route::get('/code/{id}/result','VoteController@aggregateResults')->name('vote.result');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
