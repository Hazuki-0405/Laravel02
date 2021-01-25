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
        $is_favorite = $this->is_favorite($book_id);
        $user = Auth::user();
        if ($is_favorite){
            return redirect('/favorites'); //すでにお気に入りに入ってたら何もしない
        } else {
            $user->favorites()->attach($book_id);  //お気に入りに入ってなかったらお気に入りに入れて、お気に入り一覧を表示
            return redirect('/favorites');
        }
    }

    public function unfavorite($book_id) { //単数形
        $is_favorite = $this->is_favorite($book_id); //お気に入りに入っているかどうか
        $user = Auth::user();
        if($is_favorite){
            $user->favorites()->detach($book_id);  //お気に入りに入ってたらお気に入りから消して、お気に入り一覧を表示
            return redirect('/favorites');
        } else {
            return redirect('/favorites'); //お気に入りに入ってなかったら何もしない
        }
    }
}
