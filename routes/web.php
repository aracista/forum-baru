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

Route::get('/', function () {
	$forum = App\Forum::orderBy('id','desc')->paginate(5);
    return view('welcome',compact('forum'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('forum', 'ForumController');
Route::resource('tag', 'TagController');
Route::resource('comment', 'CommentController');

Route::post('comment/create/{forum}', 'CommentController@buatKomentar')->name('buatKomentar.store');
