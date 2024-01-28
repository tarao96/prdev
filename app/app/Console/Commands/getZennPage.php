<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;
use App\Models\Article;

class getZennPage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getZennPage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Zennから記事をスクレイピングし、DBに保存する';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $client = new Client(HttpClient::create(['timeout' => 60]));
            $crawler = $client->request('GET', 'https://zenn.dev/topics/%E5%80%8B%E4%BA%BA%E9%96%8B%E7%99%BA?page=1');
            $crawler->filter('.ArticleList_itemContainer__UNI2Y')->each(function ($node) use ($crawler, $client) {
                $title = $node->filter('.ArticleList_title__mmSkv')->text(); // タイトル
                $relative_path = $node->filter('.ArticleList_link__4Igs4')->attr('href');
                $link = 'https://zenn.dev'.$relative_path; // リンク
                $author_name = $node->filter('.ArticleList_userName__MlDD5 a')->text(); // 著者名
                $author_profile_image_url = $node->filter('.AvatarImage_plain__Fgp4R')->attr('src'); // 著者プロフィール画像URL

                $title_link = $crawler->selectLink($title)->link();
                $crawler = $client->click($title_link);
                $article_created_at = $crawler->filter('.ArticleHeader_num__7Zpz0')->text(); // 公開日時
                // dump($article_created_at);

                // DBに保存
                $is_article_exist = Article::where('url', $link)->exists();
                if (!$is_article_exist) {
                    // データを標準出力
                    dump('新規記事');
                    $line = 'タイトル: '.$title.",".'リンク: '.$link.",".'著者名: '.$author_name.",".'著者プロフィール画像URL: '.$author_profile_image_url;
                    dump($line);
                }
                $article = $is_article_exist ? Article::where('url', $link)->first() : new Article();
                $article->title = $title;
                $article->url = $link;
                $article->source = 'Zenn';
                $article->author_name = $author_name;
                $article->author_profile_image_url = $author_profile_image_url;
                $article->article_created_at = $article_created_at;
                $article->article_updated_at = $article_created_at;
                $article->save();
            });
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
    }
}
