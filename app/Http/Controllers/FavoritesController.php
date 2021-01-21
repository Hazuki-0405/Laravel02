<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Book;
use Illuminate\Support\Facades\Auth;


class FavoritesController extends Controller
{
    //
    public function showFavorites() {
        $user = Auth::user();
        $books = $user->user.favorites()->get()->paginate(5);
        return view('books.showFavorites', ['books' => $books,]);
    }
}
