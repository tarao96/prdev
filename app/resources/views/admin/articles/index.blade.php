@extends('layouts.admin')
@section('title', '管理側記事一覧')
@section('style')
<style>
    .main {
        padding: 3rem 0;
        width: 90%;
        margin: 0 auto;
    }
    .card {
        display: flex;
    }
    .articles {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 50px;
    }
    table{
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
    button {
        cursor: pointer;
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
    }
    .keyword-form {
        width: 300px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .search-btn {
        width: 50px;
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
        cursor: pointer;
    }
</style>
@endsection
@section('content')
    <h1>記事一覧</h1>
    <p>現在のページ: {{ $articles->currentPage() }}</p>
    <form action="{{ route('admin.articles.index') }}">
        <input type="text" name="keyword" class="keyword-form" placeholder="検索ワードを入力">
        <input type="submit" class="search-btn" value="検索" />
    </form>
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
                            <a href="{{ route('admin.articles.edit', ['id' => $article->id]) }}">編集</a>
                        </div>
                    </td>
                    <td>
                        <div class="delete-btn">
                            <form action="{{ route('admin.articles.delete', ['id' => $article->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick='return confirm("本当に削除しますか？")'>削除</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            <a class="prev-btn" href="{{ $articles->previousPageUrl() }}"><</a>
            @if ($articles->currentPage() - 1 > 0)
            <a class="page" href="{{ $articles->url($articles->currentPage() - 1) }}" data-page="{{ $articles->currentPage() - 1 }}">{{ $articles->currentPage() - 1 }}</a>
            @endif
            <a class="page" href="{{ $articles->url($articles->currentPage()) }}" data-page="{{ $articles->currentPage() }}">{{ $articles->currentPage() }}</a>
            @if ($articles->currentPage() + 1 <= $articles->lastPage())
            <a class="page" href="{{ $articles->url($articles->currentPage() + 1) }}" data-page="{{ $articles->currentPage() + 1 }}">{{ $articles->currentPage() + 1 }}</a>
            @endif
            <a class="next-btn" href="{{ $articles->nextPageUrl() }}">></a>
        </div>
    </div>
@endsection
@section('script')
<script>
    const pageElements = document.querySelectorAll('.page');
    pageElements.forEach((elem) => {
        if (elem.dataset.page == {{ $articles->currentPage() }}) {
            elem.style.border = '1px solid #5271FF';
            elem.style.backgroundColor = '#5271FF';
            elem.style.color = 'white';
        }
    })
</script>
@endsection
