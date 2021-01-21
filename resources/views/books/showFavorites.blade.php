@extends('layouts.app')
@section('content')

<?php
  $user = Auth::user();
  $books = $user->favorites()->get();
?>
<h1>{{ $user->name }}さんのお気に入り一覧</h1>
@if(count($books) > 0)
  <ul>
    @foreach ($books as $book)
      {!! link_to_route('books.show', $book->id, ['id' => $book->id]) !!}
      {{ $book->book_title }}
    @endforeach
  </ul>
@else
  <p>お気に入りはまだありません</p>
@endif

@endsection
