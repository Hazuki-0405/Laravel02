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


Route::get('books/create', 'BooksController@create')->name('books.create'); //新規作成ページ表示
Route::get('books/{id}', 'BooksController@show')->name('books.show'); //詳細ページ表示
Route::post('books', 'BooksController@store')->name('books.store'); //登録アクション →登録後トップページに飛ばす
Route::put('books/{id}', 'BooksController@update')->name('books.update'); //更新アクション →更新後詳細ページに飛ばす
Route::delete('books/{id}', 'BooksController@destroy')->name('books.destroy'); //削除アクション →削除後詳細ページに飛ばす

Route::get('books', 'BooksController@index')->name('books.index'); //一覧ページ表示
Route::get('books/{id}/edit', 'BooksController@edit')->name('books.edit'); //更新ページ表示

// 上の７つを略して Route::resource('books', 'BooksController'); でもいい
// 多分ファイルを指定してそこのアクション全部引用する感じかな