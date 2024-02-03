@extends('layouts.admin')
@section('title', '管理側記事編集')

@section('style')
<style>
    .main {
        padding: 3rem 0;
        width: 90%;
        margin: 0 auto;
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
@endsection

@section('content')
<div class="main">
    <h1>記事編集</h1>
    <form action="{{ route('admin.articles.update', ['id' => $id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" id="title" name="title" value="{{ $title }}">
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <input type="text" id="url" name="url" value="{{ $url }}">
        </div>
        <div class="form-group">
            <label for="author_name">著者名</label>
            <input type="text" id="author_name" name="author_name" value="{{ $author_name }}">
        </div>
        <div class="form-group">
            <label for="author_profile_image_url">著者プロフィール画像URL</label>
            <input type="text" id="author_profile_image_url" name="author_profile_image_url" value="{{ $author_profile_image_url }}">
        </div>
        <div class="form-group">
            <label for="source">データ元</label>
            <input type="text" id="source" name="source" value="{{ $source }}">
        </div>
        <div class="form-group">
            <label for="article_created_at">公開日時</label>
            <input type="datetime-local" id="article_created_at" name="article_created_at" value="{{ $article_created_at }}">
        </div>
        <div class="form-group">
            <label for="article_updated_at">更新日時</label>
            <input type="datetime-local" id="article_updated_at" name="article_updated_at" value="{{ $article_updated_at }}">
        </div>
        <div class="btn-group">
            <button class="submit-btn" type="submit" onclick='return confirm("更新してよろしいですか？")'>更新</button>
        </div>
    </form>
</div>
@endsection

@section('script')
<script></script>
@endsection
