<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('promotion_code', 50);
            $table->string('promotion_name', 150);
            $table->unsignedTinyInteger('promotion_type');
            $table->decimal('promotion_number');
            $table->dateTime('promotion_start_date')->nullable();
            $table->dateTime('promotion_end_date')->nullable();
            $table->text('promotion_note')->nullable();
            $table->unsignedTinyInteger('promotion_status')->default(1);
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
        Schema::dropIfExists('promotions');
    }
}
