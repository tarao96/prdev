<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>個人開発集</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: whitesmoke;
                padding-top: 3rem;
                padding-bottom: 5rem;
            }
            .main {
                width: 80%;
                margin: 0 auto;
            }
            .fv {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            .card {
                width: 80%;
                background-color: white;
                border-radius: 10px;
                /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); */
                padding: 1rem 2rem;
            }
            .card img {
                border-radius: 50%;
                width: 3rem;
                height: 3rem;
            }
            .card h2.title {
                font-size: 1.2rem;
                margin-bottom: 0;
            }
            .contents {
                margin-top: 50px;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 1.2rem;
            }
            .author {
                display: flex;
                align-items: center;
                gap: 0.7rem;
            }
            .sub {
                display: flex;
                align-items: center;
                gap: 20px;
            }
            .source {
                font-size: 0.8rem;
                color: gray;
            }
            .published {
                font-size: 0.8rem;
                color: gray;
            }
            .strong {
                color: #5271FF;
            }
            .description {
                line-height: 1.8rem;
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
            }
        </style>
    </head>
    <body>
        <div class="main">
            <div class="fv">
                <h1>個人開発集</h1>
                <p class="description">
                    このサイトはさまざまなサイトから<span class="strong">個人開発</span>に関する記事を集めた、個人開発のポータルサイトです。<br />
                    コンテンツは毎日定期的に自動で収集され、当サイトは<span class="strong">半自動</span>で運営されております。<br />
                    データ収集元はQiita, Zenn, note, 個人ブログなど多岐に渡ります。
                </p>
            </div>
            <div class="contents">
                @foreach ($articles as $article)
                <a href="{{ $article['url'] }}" class="card">
                    <div class="author">
                        <img src="{{ $article['author_profile_image_url'] }}" alt="サンプル">
                        <p class="author-name">{{ $article['author_name'] }}</p>
                    </div>
                    <h2 class="title">{{ $article['title'] }}</h2>
                    <div class="sub">
                        <p class="published">公開日: {{ explode(" ", $article['article_updated_at'])[0] }}</p>
                        <p class="source">収集元: {{ $article['source'] }}</p>
                    </div>
                </a>
                @endforeach
                <div class="pagination">
                    <a class="first-btn" href="{{ $articles->url(1) }}"><<</a>
                    <a class="prev-btn" href="{{ $articles->previousPageUrl() }}"><</a>
                    @if ($articles->currentPage() - 1 <= 0)
                    <a class="page" href="{{ $articles->url($articles->currentPage()) }}" data-page="{{ $articles->currentPage() }}">{{ $articles->currentPage() }}</a>
                    <a class="page" href="{{ $articles->url($articles->currentPage() + 1) }}" data-page="{{ $articles->currentPage() + 1 }}">{{ $articles->currentPage() + 1 }}</a>
                    <a class="page" href="{{ $articles->url($articles->currentPage() + 2) }}" data-page="{{ $articles->currentPage() + 2 }}">{{ $articles->currentPage() + 2 }}</a>
                    @endif

                    @if ($articles->currentPage() - 1 > 0 && $articles->currentPage() + 1 <= $articles->lastPage())
                    <a class="page" href="{{ $articles->url($articles->currentPage() - 1) }}" data-page="{{ $articles->currentPage() - 1 }}">{{ $articles->currentPage() - 1 }}</a>
                    <a class="page" href="{{ $articles->url($articles->currentPage()) }}" data-page="{{ $articles->currentPage() }}">{{ $articles->currentPage() }}</a>
                    <a class="page" href="{{ $articles->url($articles->currentPage() + 1) }}" data-page="{{ $articles->currentPage() + 1 }}">{{ $articles->currentPage() + 1 }}</a>
                    @endif

                    @if ($articles->currentPage() + 1 > $articles->lastPage())
                    <a class="page" href="{{ $articles->url($articles->currentPage() - 2) }}" data-page="{{ $articles->currentPage() - 2 }}">{{ $articles->currentPage() - 2 }}</a>
                    <a class="page" href="{{ $articles->url($articles->currentPage() - 1) }}" data-page="{{ $articles->currentPage() - 1 }}">{{ $articles->currentPage() - 1 }}</a>
                    <a class="page" href="{{ $articles->url($articles->currentPage()) }}" data-page="{{ $articles->currentPage() }}">{{ $articles->currentPage() }}</a>
                    @endif
                    <a class="next-btn" href="{{ $articles->nextPageUrl() }}">></a>
                    <a class="last-btn" href="{{ $articles->url($articles->lastPage()) }}">>></a>
                </div>
            </div>
        </div>
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
    </body>
</html>
