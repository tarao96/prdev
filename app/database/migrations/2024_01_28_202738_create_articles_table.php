<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('タイトル');
            $table->string('url')->comment('URL');
            $table->string('comment')->comment('コメント')->nullable();
            $table->string('source')->comment('データ元')->nullable();
            $table->string('author_name')->comment('著者名')->nullable();
            $table->string('author_profile_image_url')->comment('著者プロフィール画像URL')->nullable();
            $table->dateTime('article_created_at')->comment('公開日時')->nullable();
            $table->datetime('article_updated_at')->comment('更新日時')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
