@extends('layouts/app')
@section('content')

  <h1>新規作成ページ</h1>
  {!! Form::model($book, ['route' => 'books.store']) !!}
    {!! Form::label('book_title', '本のタイトル：') !!}
    {!! Form::text('book_title') !!}
    {!! Form::submit('登録') !!}
  {!! Form::close() !!}

  @if (count($errors) > 0)
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif

  {!! link_to_route('books.index', 'トップに戻る') !!}

@endsection