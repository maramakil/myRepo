<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class articles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::factory()->count(10)->create();
    }
}
