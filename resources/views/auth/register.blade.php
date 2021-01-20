@extends('layouts.app')
@section('content')

{!! Form::open(['route' => 'signup.post']) !!}
  <div class="form-group">
    {!! Form::label('name', '名前') !!}
    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('email', 'メールアドレス') !!}
    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('password', 'パスワード') !!}
    {!! Form::password('password', old('password'), ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('password_confirmation', 'パスワード（確認）') !!}
    {!! Form::password('password_confirmation', old('password_confirmation'), ['class' => 'form-control']) !!}
  </div>
  @if (count($errors) > 0)
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
  @endif
  {!! Form::submit('登録') !!}
{!! Form::close() !!}


@endsection