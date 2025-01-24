@extends('layouts.app')

@section('content')
    <h2>ダッシュボード</h2>

    <a href="{{ route('blogs.create') }}">新規投稿</a>
    <!-- 他のダッシュボードコンテンツ -->
@endsection