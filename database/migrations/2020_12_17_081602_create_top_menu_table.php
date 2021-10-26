<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('group', 100)->index();
            $table->unsignedInteger('index')->nullable();
            $table->string('route_name', 100)->nullable();
            $table->string('url')->nullable();
            $table->string('lang');
            $table->string('description', 500);
            $table->boolean('is_no_left_menu');
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
        Schema::dropIfExists('top_menu');
    }
}
