<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = [
            'name' => 'Learn to build websites in HTML5',
            'image' => 'uploads/products/book.jpg',
            'price' => '5000',
            'description' => 'some description here....'
        ];

        $p2 = [
            'name' => 'Learn to build websites in CSS',
            'image' => 'uploads/products/book.jpg',
            'price' => '2500',
            'description' => 'some description here....'
        ];

        Product::create($p1);
        Product::create($p2);
    }
}
