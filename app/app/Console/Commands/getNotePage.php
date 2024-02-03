<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CommonController;
use App\Models\Article;

class getNotePage extends Command
{
    const PAGE_SIZE = 20;
    const START = 0;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getNotePage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'noteから記事をスクレイピングし、DBに保存する';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // 参考） https://note.com/ego_station/n/n85fcb635c0a9
        try {
            DB::beginTransaction();
            $headers = ['Content-Type: application/json'];
            $index_url = "https://note.com/api/v3/searches?q=個人開発&size=". self::PAGE_SIZE ."&start=". self::START;
            $pages = CommonController::execCurl($headers, $index_url);
            foreach ($pages['data']['notes']['contents'] as $page) {
                $show_url = "https://note.com/api/v3/notes/" . $page['key'];
                $show = CommonController::execCurl($headers, $show_url);
                $show_data = $show['data'];

                $article_with_trashed = Article::withTrashed()
                    ->where('url', $show_data['note_url'])
                    ->first();
                $article = $article_with_trashed ? $article_with_trashed : new Article();
                $article->title = $show_data['name'];
                $article->url = $show_data['note_url'];
                $article->source = 'note';
                $article->author_name = $show_data['user']['nickname'];
                $article->author_profile_image_url = $show_data['user']['user_profile_image_path'];
                $article->article_created_at = $show_data['created_at'];
                $article->article_updated_at = $show_data['created_at'];
                $article->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            logger()->critical('file: ' . $e->getFile() . ' line: ' . $e->getLine() . ' message: ' . $e->getMessage());
            DB::rollback();
        }
    }
}
