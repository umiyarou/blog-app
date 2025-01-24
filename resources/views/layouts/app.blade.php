<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ブログアプリ')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} ブログアプリ</p>
    </footer>
</body>
</html>
