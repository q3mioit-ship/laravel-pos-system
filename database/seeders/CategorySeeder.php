<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            '酒類',
            '菓子',
            'パン',
            'その他飲料',
            '調味料',
            '食品',
            'アイス',
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate([
                'name' => $name
            ]);
        }
    }
}