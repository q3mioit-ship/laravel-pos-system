<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Purchase;
use Carbon\Carbon;

class PurchaseSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();

        foreach (range(1, 120) as $i) {

            $product = $products->random();

            Purchase::create([
                'product_id' => $product->id,
                'quantity' => rand(5, 20),
                'unit_price' => $product->cost_price,
                'purchased_at' => Carbon::now()->subDays(rand(0, 180)),
            ]);
        }
    }
}