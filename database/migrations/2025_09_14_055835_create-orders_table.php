<?php

// database/migrations/2025_01_01_000001_create_orders_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {
public function up(): void
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('customer_id'); 
        $table->unsignedBigInteger('product_id');  
        $table->integer('quantity');
        $table->decimal('total_price', 10, 2);
        $table->timestamps();

        // foreign keys (optional but recommended)
        $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
    });
}


    public function down() {
        Schema::dropIfExists('orders');
    }
}
