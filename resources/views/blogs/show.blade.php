@extends('layouts.app')

@section('title', $blog->title)

@section('content')
    <div class="container">
        <h1>{{ $blog->title }}</h1>
        <p>{{ $blog->content }}</p>
        <p>投稿日時: {{ $blog->created_at->format('Y-m-d H:i') }}</p>
        <a href="{{ route('blogs.index') }}">戻る</a>
    </div>
@endsection