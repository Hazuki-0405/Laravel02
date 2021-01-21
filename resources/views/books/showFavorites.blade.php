@extends('layouts.app')
@section('content')

<h1>{{ $user->name }}さんのお気に入り一覧</h1>
@if(count($books) > 0)
  <ul>
    @foreach ($books as $book)
      <li>
        {!! link_to_route('books.show', $book->id, ['id' => $book->id]) !!}
        {{ $book->book_title }}
      </li>
    @endforeach
  </ul>
  {!! $books->render() !!}
@else
  <p>お気に入りはまだありません</p>
@endif

<a href="{{ url('/') }}">戻る</a>


@endsection
