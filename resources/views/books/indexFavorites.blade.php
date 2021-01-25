@extends('layouts.app')
@section('content')

<h1>{{ $user->name }}さんのお気に入り一覧</h1>
@if(count($books) > 0)
  <ul class="book-list">
    @foreach ($books as $book)
      <li>
        {!! link_to_route('books.show', $book->id, ['id' => $book->id]) !!}
        <p>{{ $book->book_title }}</p>
        {!! Form::model($book, ['route' => ['books.unfavorite', $book->id], 'method' => 'patch']) !!}
          {!! Form::submit('お気に入り解除') !!}
        {!! Form::close() !!}
      </li>
    @endforeach
  </ul>
  {!! $books->render() !!}
@else
  <p>お気に入りはまだありません</p>
@endif

<a href="{{ url('/') }}">戻る</a>

@endsection
