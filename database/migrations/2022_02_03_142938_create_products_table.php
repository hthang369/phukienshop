<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code', 50);
            $table->string('product_name', 150);
            $table->string('product_link', 150);
            $table->dateTime('product_date');
            $table->unsignedInteger('uom_id');
            $table->decimal('product_price');
            $table->decimal('product_qty');
            $table->string('product_image');
            $table->decimal('product_warranty', 8, 1);
            $table->string('product_excerpt')->nullable();
            $table->text('product_content');
            $table->string('ob_title', 150)->nullable();
            $table->string('ob_desception', 250)->nullable();
            $table->string('ob_keyword', 100)->nullable();
            $table->unsignedTinyInteger('product_status')->default(1);
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
        Schema::dropIfExists('products');
    }
}
