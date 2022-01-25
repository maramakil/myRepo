<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class articleTag extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ArticleTag::query()->insert([
            'article_id' => Article::first()->id,
            'tag_id' => Tag::first()->id,
        ]);
    }
}
