<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code', 50);
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('delivery_id');
            $table->unsignedInteger('promotion_id');
            $table->unsignedInteger('tax_id');
            $table->decimal('shipping_amount');
            $table->string('order_note');
            $table->decimal('order_amount');
            $table->unsignedTinyInteger('payment_method');
            $table->unsignedTinyInteger('order_status');
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
        Schema::dropIfExists('orders');
    }
}
