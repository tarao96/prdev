<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Author;
use App\Http\Controllers\CommonController;

class getQiitaPage extends Command
{
    const PAGE = 1;
    const QUERY = 'title:個人開発';

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
            DB::beginTransaction();
            // ヘッダーを設定
            $headers = [
                'Content-Type: application/json',
                'Authoriztion: Bearer ' . config('external_api.qiita.api_key'),
            ];
            $url = 'https://qiita.com/api/v2/items?page='. self::PAGE .'&query='. self::QUERY;

            $data = CommonController::execCurl($headers, $url);
            foreach ($data as $item) {
                $article_with_trashed = Article::withTrashed()
                    ->where('url', $item['url'])
                    ->first();

                $article = $article_with_trashed ? $article_with_trashed : new Article();
                $article->title = $item['title'];
                $article->url = $item['url'];
                $article->source = 'Qiita';
                $article->author_name = $item['user']['name'];
                $article->author_profile_image_url = $item['user']['profile_image_url'];
                $article->article_created_at = $item['created_at'];
                $article->article_updated_at = $item['updated_at'];
                $article->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            logger()->critical('file: ' . $e->getFile() . ' line: ' . $e->getLine() . ' message: ' . $e->getMessage());
            DB::rollback();
        }
    }
}
