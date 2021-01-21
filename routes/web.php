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

Route::get('/', function (){ //トップページ表示
    return view('welcome');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// login.blade.phpを返すというファンクションが既に設定されている
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get'); //新規ユーザー登録ページ表示
Route::post('/', 'Auth\RegisterController@register')->name('signup.post'); //新規ユーザー登録アクション

/** ログインしないと入れない処理 */
Route::group(['middleware' => ['auth']], function(){
    Route::get('books/create', 'BooksController@create')->name('books.create'); //新規作成ページ表示
    Route::get('books/{id}', 'BooksController@show')->name('books.show'); //詳細ページ表示
    Route::post('books', 'BooksController@store')->name('books.store'); //登録アクション →登録後トップページに飛ばす
    Route::put('books/{id}', 'BooksController@update')->name('books.update'); //更新アクション →更新後詳細ページに飛ばす
    Route::delete('books/{id}', 'BooksController@destroy')->name('books.destroy'); //削除アクション →削除後詳細ページに飛ばす
    
    Route::get('books', 'BooksController@index')->name('books.index'); //一覧ページ表示
    Route::get('books/{id}/edit', 'BooksController@edit')->name('books.edit'); //更新ページ表示
    
    Route::get('favorites', 'FavoritesController@showFavorites')->name('books.showFavorites');
});

// Route::get('books/create', 'BooksController@create')->name('books.create'); //新規作成ページ表示
// Route::get('books/{id}', 'BooksController@show')->name('books.show'); //詳細ページ表示
// Route::post('books', 'BooksController@store')->name('books.store'); //登録アクション →登録後トップページに飛ばす
// Route::put('books/{id}', 'BooksController@update')->name('books.update'); //更新アクション →更新後詳細ページに飛ばす
// Route::delete('books/{id}', 'BooksController@destroy')->name('books.destroy'); //削除アクション →削除後詳細ページに飛ばす

// Route::get('books', 'BooksController@index')->name('books.index'); //一覧ページ表示
// Route::get('books/{id}/edit', 'BooksController@edit')->name('books.edit'); //更新ページ表示

// 上の７つを略して Route::resource('books', 'BooksController'); でもいい
// 多分ファイルを指定してそこのアクション全部引用する感じかな