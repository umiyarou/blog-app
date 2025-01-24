<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ブログアプリ')</title>
</head>
<body>
    <header>
        <h1>ブログアプリ</h1>
        <!-- <nav>
            <ul>
                <li><a href="{{ route('home') }}">ホーム</a></li>
                @auth
                    <li><a href="{{ route('blogs.create') }}">新規投稿</a></li>
                    <li><a href="{{ route('logout') }}">ログアウト</a></li>
                @endauth
                @guest
                    <li><a href="{{ route('login') }}">ログイン</a></li>
                    <li><a href="{{ route('register') }}">新規登録</a></li>
                @endguest
            </ul>
        </nav> -->
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">ホーム</a></li>
                @auth
                    <li><a href="{{ route('blogs.create') }}">新規投稿</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" style="background:none; border:none; color:blue; cursor:pointer;">ログアウト</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li><a href="{{ route('login') }}">ログイン</a></li>
                    <li><a href="{{ route('register') }}">新規登録</a></li>
                @endguest
            </ul>
        </nav>

    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; 2025 ブログアプリ</p>
    </footer>
</body>
</html>