<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    //
    public function showFavorites() {
        $user = Auth::user();
        $books = $user->favorites()->paginate(5);
        return view('books.showFavorites', ['user' => $user, 'books' => $books,]);
    }
}
