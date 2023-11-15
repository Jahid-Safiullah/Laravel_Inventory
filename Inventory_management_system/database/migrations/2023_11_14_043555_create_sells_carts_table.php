<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

     // Run the migrations.

    public function up(): void
    {
        Schema::create('sells_carts', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->integer('purchase_p_id')->default(0);
            $table->string('quantity');
            $table->decimal('total',10,2);
            $table->decimal('sub_total',10,2)->default(0);

            $table->timestamps();
        });
    }


     // Reverse the migrations.

    public function down(): void
    {
        Schema::dropIfExists('sells_carts');
    }
};
