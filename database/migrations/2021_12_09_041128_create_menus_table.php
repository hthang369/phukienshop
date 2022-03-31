<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('menu_name', 150);
            $table->string('menu_title', 150);
            $table->string('menu_link');
            $table->unsignedInteger('parent_id')->nullable();
            $table->smallInteger('menu_lft');
            $table->smallInteger('menu_rgt');
            $table->string('menu_icon', 50)->nullable();
            $table->unsignedInteger('partial_id')->nullable();
            $table->string('partial_table')->nullable();
            $table->string('menu_type');
            $table->string('menu_view', 100)->nullable();
            $table->smallInteger('menu_depth')->nullable();
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
        Schema::dropIfExists('menus');
    }
}
