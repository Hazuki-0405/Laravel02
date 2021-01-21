@extends('layouts.app')
@section('content')

@if (Auth::check())
<?php $user = Auth::user() ?>
    <h1>{{ $user->name }}さんのマイページ</h1>
    <p>{!! link_to_route('books.index', '本の一覧を見る') !!}</p>
    <p>{!! link_to_route('logout.get', 'ログアウト') !!}</p>
@else
    <h1>ようこそ！</h1>
    {!! link_to_route('login', 'ログイン', null) !!}
    {!! link_to_route('signup.get', '新規ユーザー登録', null) !!}
@endif
@endsection