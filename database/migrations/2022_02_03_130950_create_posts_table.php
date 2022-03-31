<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('author_id');
            $table->string('post_title', 150);
            $table->string('post_excerpt')->nullable();
            $table->datetime('post_date');
            $table->string('post_link');
            $table->text('post_content');
            $table->string('ob_title', 150)->nullable();
            $table->string('ob_desception', 250)->nullable();
            $table->string('ob_keyword', 100)->nullable();
            $table->string('post_type', 100);
            $table->unsignedTinyInteger('post_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
