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
        Schema::create('purchase_products', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_code')->nullabel();
            $table->integer('product_id');
            $table->string('buy_price');
            $table->string('sell_price')->nullabel();
            $table->string('quantity');
            $table->string('total_price');
            $table->string('dis_price')->nullabel();
            $table->string('paid_price')->nullabel();
            $table->string('date');
            $table->string('month');
            $table->string('year');
            $table->string('status')->default('1');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_products');
    }
};
