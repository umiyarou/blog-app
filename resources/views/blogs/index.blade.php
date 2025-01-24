@extends('layouts.app')

@section('title', 'ブログ一覧')

@section('content')
    <h2>ブログ一覧</h2>

    @foreach($blogs as $blog)
        <div>
            <h3>{{ $blog->title }}</h3>
            <p>{{ $blog->content }}</p>
            <p><small>投稿者: {{ $blog->user->name }}</small></p>
        </div>
    @endforeach

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
@endsection