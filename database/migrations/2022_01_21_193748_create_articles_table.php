<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
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
//            $table->bigInteger('tag_id');
            $table->string("title");
            $table->string("author")->nullable();
            $table->longText("description")->nullable();
            $table->text("image")->nullable();
            $table->timestamps();

            $table->foreignId("tag_id")->constraint("tags")->onDelete("cascade");
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
}
