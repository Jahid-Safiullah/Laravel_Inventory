<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->nullable();
            $table->integer('product_id');
            $table->integer('purchase_p_id');
            $table->integer('order_customer_table_id');
            $table->integer('cart_id');
            $table->integer('price')->nullable()->default(0);
            $table->integer('quantity');
            $table->decimal('total_price',10,2);
            $table->decimal('sub_total',10,2)->default('');
            $table->decimal('paid_amount',10,2)->default(0);
            $table->decimal('discount',10,2)->default(0);
            $table->string('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
