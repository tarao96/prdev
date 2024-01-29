<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>個人開発 | 管理画面</title>
    <style>
        .card {
            display: flex;
        }
        table{
            margin: 20px 10px;
            table-layout: fixed;
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
        }

        table tr{
            border-bottom: solid 1px #eee;
            cursor: pointer;
        }

        table tr:hover{
            background-color: #d4f0fd;
        }

        table th,table td{
            text-align: center;
            padding: 15px 0;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .pagination {
            display: flex;
            gap: 10px;
        }
        .pagination a {
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid gray;
            border-radius: 5px;
            background-color: white;
            width: 40px;
            height: 40px;
            font-size: 1.2rem;
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
    <div class="main">
        <h1>記事一覧</h1>
        <div class="logout-btn">
            <form action="{{ route('admin.auth.logout') }}" method="POST">
                @csrf
                <button type="submit">ログアウト</button>
            </form>
        </div>
        <p>現在のページ: {{ $articles->currentPage() }}</p>
        <div class="articles">
            <table>
                <thead>
                    <tr>
                        <th style="width: 20%;">タイトル</th>
                        <th style="width: 30%;">URL</th>
                        <th style="width: 15%;">著者名</th>
                        <th style="width: 15%;">公開日</th>
                        <th style="width: 10%;">データ元</th>
                        <th style="width: 5%;">編集</th>
                        <th style="width: 5%;">削除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article['title'] }}</td>
                        <td><a href="{{ $article['url'] }}" target="blank">{{ $article['url'] }}</a></td>
                        <td>{{ $article['author_name'] }}</td>
                        <td>{{ $article['article_updated_at'] }}</td>
                        <td>{{ $article['source'] }}</td>
                        <td>
                            <div class="edit-btn">
                                <a href="#">編集</a>
                            </div>
                        </td>
                        <td>
                            <div class="delete-btn">
                                <form action="#" method="POST">
                                    @csrf
                                    <button type="submit">削除</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                <a class="first-btn" href="{{ $articles->url(1) }}"><<</a>
                <a class="prev-btn" href="{{ $articles->previousPageUrl() }}"><</a>
                @if ($articles->currentPage() -1 > 0)
                <a class="page" href="{{ $articles->url($articles->currentPage() - 1) }}" data-page="{{ $articles->currentPage() - 1 }}">{{ $articles->currentPage() - 1 }}</a>
                @endif
                <a class="page" href="{{ $articles->url($articles->currentPage()) }}" data-page="{{ $articles->currentPage() }}">{{ $articles->currentPage() }}</a>
                @if ($articles->currentPage() + 1 <= $articles->lastPage())
                <a class="page" href="{{ $articles->url($articles->currentPage() + 1) }}" data-page="{{ $articles->currentPage() + 1 }}">{{ $articles->currentPage() + 1 }}</a>
                @endif
                <a class="next-btn" href="{{ $articles->nextPageUrl() }}">></a>
                <a class="last-btn" href="{{ $articles->url($articles->lastPage()) }}">>></a>
            </div>
        </div>
    </div>
</body>
</html>
