@extends('layouts.app')

@section('title', 'ブログ投稿')

@section('content')
    <h2>ブログを投稿する</h2>

    <form action="{{ route('blogs.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">タイトル</label>
            <input type="text" id="title" name="title" required value="{{ old('title') }}">
        </div>

        <div>
            <label for="content">内容</label>
            <textarea id="content" name="content" required>{{ old('content') }}</textarea>
        </div>

        <button type="submit">投稿する</button>
    </form>
@endsection