<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>個人開発 | @yield('title')</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .main {
            padding: 3rem 0;
        }
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: lightblue;
            padding: 0 2rem;
        }
        .nav p {
            font-size: 1.5rem;
            margin-left: 1rem;
        }
        .nav ul {
            display: flex;
            gap: 1rem;
            list-style: none;
        }
        .nav ul li {
            display: flex;
            align-items: center;
            jusitfy-content: center;
        }
        .logout-btn {
            cursor: pointer;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            background-color: #5271FF;
            color: white;
        }
    </style>
    @yield('style')
</head>
<body>
    <nav class="nav">
        <p>管理画面</p>
        <ul>
            <li><a href="{{ route('admin.articles') }}">記事一覧</a></li>
            <li><a href="#">記事作成</a></li>
            <form action="{{ route('admin.auth.logout') }}" method="POST">
                @csrf
                <button class="logout-btn" type="submit">ログアウト</button>
            </form>
        </ul>
    </nav>
    <div class="main">
        @yield('content')
    </div>
    @yield('script')
</body>
