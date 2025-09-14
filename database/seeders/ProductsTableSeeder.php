<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Cappuccino',
                'category' => 'Hot Coffee',
                'price' => 120,
                'ingredients' => json_encode(['Espresso', 'Steamed Milk', 'Foam']),
                'stock' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Iced Latte',
                'category' => 'Iced Coffee',
                'price' => 140,
                'ingredients' => json_encode(['Espresso', 'Cold Milk', 'Ice']),
                'stock' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mocha',
                'category' => 'Hot Coffee',
                'price' => 150,
                'ingredients' => json_encode(['Espresso', 'Chocolate Syrup', 'Steamed Milk', 'Whipped Cream']),
                'stock' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
