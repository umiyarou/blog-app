<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログトップ</title>
</head>
<body>
    <h1>ようこそ！</h1>

    @auth
        <p>こんにちは、{{ auth()->user()->name }} さん</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">ログアウト</button>
        </form>
    @else
        <a href="{{ route('login') }}">ログイン</a>
        <a href="{{ route('register') }}">新規登録</a>
    @endauth

    <h2>ブログ一覧</h2>
    <ul>
        @foreach($blogs as $blog)
            <li><a href="{{ route('blog.show', $blog->id) }}">{{ $blog->title }}</a></li>
        @endforeach
    </ul>
</body>
</html>
