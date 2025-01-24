@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>ブログ編集</h1>
        <form method="POST" action="{{ route('blog.update', $blog->id) }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $blog->title }}" required>
            </div>
            <div class="form-group">
                <label for="content">内容</label>
                <textarea name="content" id="content" class="form-control" rows="5" required>{{ $blog->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">更新する</button>
        </form>
    </div>
@endsection