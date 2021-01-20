@extends('layouts/app')
@section('content')

<h1>id: {{ $book->id }} の編集ページ</h1>
{!! Form::model($book, ['route' => ['books.update', $book->id], 'method' => 'put']) !!}
  {!! Form::label('book_title', '本のタイトル：') !!}
  {!! Form::text('book_title') !!}
  {!! Form::submit('更新') !!}
{!! Form::close() !!}

{!! link_to_route('books.index', 'トップに戻る') !!}

@endsection