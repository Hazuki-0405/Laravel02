@extends('layouts/app')
@section('content')

  <h1>Book List</h1>
    @if(count($books) > 0)
    <ul class="book-list">
      @foreach ($books as $book)
      <li>
        {!! link_to_route('books.show', $book->id, ['id' => $book->id]) !!}
        <p>{{ $book->book_title }}</p>
      </li>
      @endforeach
    </ul>
    {!! $books->render() !!}
    @endif
    {!! link_to_route('books.create', '新規作成') !!}
    <a href="{{ url('/') }}">トップに戻る</a>

@endsection