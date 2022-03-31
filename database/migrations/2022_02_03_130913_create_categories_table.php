<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name', 150);
            $table->string('category_link');
            $table->string('category_image')->nullable();
            $table->string('category_excerpt')->nullable();
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedSmallInteger('category_lft');
            $table->unsignedSmallInteger('category_rgt');
            $table->string('ob_title', 150)->nullable();
            $table->string('ob_desception', 250)->nullable();
            $table->string('ob_keyword', 100)->nullable();
            $table->string('category_type', 50);
            $table->unsignedTinyInteger('category_status')->default(1);
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
        Schema::dropIfExists('categories');
    }
}
