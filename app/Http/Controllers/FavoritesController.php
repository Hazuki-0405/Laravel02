<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    //
    public function indexFavorites() {
        $user = Auth::user();
        $books = $user->favorites()->paginate(5);
        return view('books.indexFavorites', ['user' => $user, 'books' => $books,]);
    }

    public function is_favorite($book_id) { //お気に入りの中に入っているかのチェック
        $user = Auth::user();
        return $user->favorites()->where('book_id', $book_id)->exists(); 
    }

    public function favorite($book_id) { //単数形
        $user = Auth::user();
        $is_favorite = $this->is_favorite($book_id);
        $exist = $user->$is_favorite; //引数に入っている本がお気に入りに入っているかどうか
        if ($exist){
            return redirect('/favorites'); //すでにお気に入りに入ってたらfalseを返す
        } else {
            $user->favorites()->attach($book_id);  //お気に入りに入ってなかったらお気に入りに入れて、trueを返す
            return redirect('/');
        }
    }

    public function unfavorite($book_id) { //単数形
        $user = Auth::user();
        $is_favorite = $this->is_favorite($book_id);
        $exist = $user->$is_favorite; //引数に入っている本がお気に入りに入っているかどうか
        if($exist){
            $user->favorites()->detach($book_id);  //お気に入りに入ってたらお気に入りから消して、trueを返す
            return redirect('/favorites');
        } else {
            return redirect('/'); //お気に入りに入ってなかったらfalseを返す
        }
    }
}
