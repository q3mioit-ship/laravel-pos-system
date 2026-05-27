<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [

            ['category' => 'パン', 'name' => 'あんぱん', 'stock' => 3, 'cost_price' => 100, 'sale_price' => 130],
            ['category' => 'パン', 'name' => '食パン', 'stock' => 3, 'cost_price' => 100, 'sale_price' => 130],

            ['category' => 'アイス', 'name' => '南国しろくま', 'stock' => 12, 'cost_price' => 100, 'sale_price' => 180],
            ['category' => 'アイス', 'name' => 'ジャイアントコーン', 'stock' => 6, 'cost_price' => 120, 'sale_price' => 198],
        

            ['category' => 'その他飲料', 'name' => '緑茶', 'stock' => 15, 'cost_price' => 90, 'sale_price' => 150],
            ['category' => 'その他飲料', 'name' => '牛乳', 'stock' => 7, 'cost_price' => 120, 'sale_price' => 198],
            ['category' => 'その他飲料', 'name' => 'オレンジジュース', 'stock' => 4, 'cost_price' => 130, 'sale_price' => 220],

            ['category' => '食品', 'name' => 'コロッケ', 'stock' => 8, 'cost_price' => 70, 'sale_price' => 120],
            ['category' => '食品', 'name' => 'ポテトサラダ', 'stock' => 5, 'cost_price' => 140, 'sale_price' => 250],
            ['category' => '食品', 'name' => 'きんぴらごぼう', 'stock' => 2, 'cost_price' => 160, 'sale_price' => 280],

            ['category' => '調味料', 'name' => '味噌', 'stock' => 10, 'cost_price' => 250, 'sale_price' => 420],
            ['category' => '調味料', 'name' => '醤油', 'stock' => 6, 'cost_price' => 220, 'sale_price' => 380],

            ['category' => '酒類', 'name' => '黒霧島 500mlパック', 'stock' => 5, 'cost_price' => 1500, 'sale_price' => 2280],

            ['category' => '菓子', 'name' => 'せんべい', 'stock' => 14, 'cost_price' => 100, 'sale_price' => 180],
            ['category' => '菓子', 'name' => '黒糖かりんとう', 'stock' => 9, 'cost_price' => 120, 'sale_price' => 220],
        ];

        foreach ($products as $item) {

            $category = Category::where(
                'name',
                $item['category']
            )->first();

            Product::firstOrCreate(
                ['name' => $item['name']],
                [
                    'category_id' => $category->id,
                    'stock' => $item['stock'],
                    'cost_price' => $item['cost_price'],
                    'sale_price' => $item['sale_price'],
                ]
            );
        }
    }
}