@extends('layouts.app')

@section('content')
<div class="container">
    <h2>ログアウトしますか？</h2>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">ログアウト</button>
    </form>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary">キャンセル</a>
</div>
@endsection