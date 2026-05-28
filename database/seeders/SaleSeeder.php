<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Sale;
use Carbon\Carbon;

class SaleSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();

        foreach (range(1, 200) as $i) {

            $product = $products->random();

            Sale::create([
                'product_id' => $product->id,
                'quantity' => rand(1, 5),
                'unit_price' => $product->sale_price,
                'sold_at' => Carbon::now()->subDays(rand(0, 180)),
            ]);
        }
    }
}