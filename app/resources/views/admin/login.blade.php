<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>個人開発集 | 管理画面</title>
    <style>
        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            padding: 50px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .card h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-form {
            display: flex;
            flex-direction: column;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 400px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .submit-btn {
            width: 100px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="card">
            <h1>ログイン</h1>
            {{ $errors }}
            <form action="/login" method="POST" class="login-form">
                @csrf
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input type="password" id="password" name="password">
                </div>
                <div class="btn-group">
                    <button class="submit-btn" type="submit">ログイン</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
