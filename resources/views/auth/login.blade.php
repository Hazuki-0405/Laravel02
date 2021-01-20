@extends('layouts.app')
@section('content')

{!! Form::open(['route' => 'login.post']) !!}
  <div class="form-group">
    {!! Form::label('email', 'メールアドレス') !!}
    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('password', 'パスワード') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
  </div>
  {!! Form::submit('Log in') !!}
{!! Form::close() !!}

<p>{!! link_to_route('signup.get', '新規ユーザー登録') !!}</p>

@endsection