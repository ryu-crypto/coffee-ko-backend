<?php

// database/migrations/2025_01_01_000000_create_products_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category');
            $table->decimal('price', 8, 2);
            $table->string('image')->nullable();
            $table->json('ingredients')->nullable(); // list of ingredients
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('products');
    }
}

