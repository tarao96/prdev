<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article;
use App\Models\Author;

class getQiitaPage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getQiitaPage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'QiitaAPIから記事を取得し、DBに保存する';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $url = 'https://qiita.com/api/v2/items?page=1&query=title:個人開発';
            $data = $this->getQiitaPage($url);
            foreach ($data as $item) {
                $is_article_exist = Article::where('url', $item['url'])->exists();

                $article = $is_article_exist ? Article::where('url', $item['url'])->first() : new Article();
                $article->title = $item['title'];
                $article->url = $item['url'];
                $article->source = 'Qiita';
                $article->author_name = $item['user']['name'];
                $article->author_profile_image_url = $item['user']['profile_image_url'];
                $article->article_created_at = $item['created_at'];
                $article->article_updated_at = $item['updated_at'];
                $article->save();
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
    }

    public function getQiitaPage($url)
    {
        // curlのセッションを初期化
        $ch = curl_init();

        // ヘッダーを設定
        $headers = [
            'Authoriztion: Bearer ' . config('external_api.qiita.api_key'),
        ];

        // オプションを設定
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers
        ];
        curl_setopt_array($ch, $options);

        // 実行
        $response = curl_exec($ch);
        $json = json_decode($response, true); // 文字列からjsonへ変換

        curl_close($ch);

        return $json;
    }
}
