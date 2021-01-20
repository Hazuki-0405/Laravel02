@extends('layouts/app')
@section('content')

  <h1>Book List</h1>
    @if(count($books) > 0)
    <ul>
      @foreach ($books as $book)
      <li>
        {!! link_to_route('books.show', $book->id, ['id' => $book->id]) !!}
        {{ $book->book_title }}
      </li>
      @endforeach
    </ul>
    @endif
    {!! link_to_route('books.create', '新規作成') !!}


@endsection