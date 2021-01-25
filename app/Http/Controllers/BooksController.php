<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    // トップページ （一覧ページ）
    public function index() {
        $books = Book::paginate(5);
        return view('books.index', ['books' => $books,]);
    }

    // 新規登録ページ表示
    public function create() {
        $book = new Book;
        return view('books.create', ['book' => $book,]);
    }
    
    // 新規登録アクション
    public function store(Request $request) {
        $this->validate($request, ['book_title' => 'required|max:191',]);
        
        $book = new Book;
        $book->book_title = $request->book_title;
        $book->save();  
        return redirect('/books');
    }
    
    // 詳細ページ
    public function show($id) {
        $book = Book::find($id);
        return view('books.show', ['book' => $book,]);
    }

    // 編集ページ表示
    public function edit($id) {
        $book = Book::find($id);
        return view('books.edit', ['book' => $book,]);
    }
    
    // データ更新アクション
    public function update(Request $request, $id) {
        $book = Book::find($id);
        $book->book_title = $request->book_title;
        $book->save();
        return redirect('/books');
    }

    // データ削除アクション
    public function destroy($id) {
        $book = Book::find($id);
        $book->delete();

        return redirect('/books');
    }
}
