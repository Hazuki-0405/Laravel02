@extends('layouts/app')
@section('content')

  <h1>id: {{ $book->id }} の詳細ページ</h1>
  title: {{ $book->book_title }}<br>
  {!! link_to_route('books.edit', '編集', ['id' => $book->id,]) !!}

    {!! Form::model($book, ['route' => ['books.favorite', $book->id], 'method' => 'patch']) !!}
      {!! Form::submit('お気に入り登録') !!}
    {!! Form::close() !!}
    
  {!! Form::model($book, ['route' => ['books.destroy', $book->id], 'method' => 'delete']) !!}
    {!! Form::submit('削除') !!}
  {!! Form::close() !!}

  {!! link_to_route('books.index', 'トップに戻る') !!}

@endsection