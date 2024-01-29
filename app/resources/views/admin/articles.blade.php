<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>個人開発 | 管理画面</title>
</head>
<body>
    <h1>Hello, World!</h1>
    <div class="logout-btn">
        <form action="{{ route('admin.auth.logout') }}" method="POST">
            @csrf
            <button type="submit">ログアウト</button>
        </form>
    </div>
</body>
</html>
