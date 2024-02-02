<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'source',
        'author_name',
        'author_profile_image_url',
        'article_created_at',
        'article_updated_at',
    ];
}
