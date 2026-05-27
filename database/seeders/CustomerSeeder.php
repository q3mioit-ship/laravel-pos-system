<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [

            [
                'name' => '田中 花子',
                'phone' => '090-1111-1111',
                'memo' => '毎週火曜日に来店。野菜をよく購入。',
            ],

            [
                'name' => '山本 恒一',
                'phone' => '090-2222-2222',
                'memo' => '牛乳と惣菜の購入が多い。',
            ],

            [
                'name' => '鈴木 和子',
                'phone' => '090-3333-3333',
                'memo' => '果物をよく購入。',
            ],

            [
                'name' => '中村 美代子',
                'phone' => '090-4444-4444',
                'memo' => '夕方に来店されることが多い。',
            ],

            [
                'name' => '高橋 恒一',
                'phone' => '090-5555-5555',
                'memo' => 'お米の購入が多い。',
            ],

        ];

        foreach ($customers as $customer) {

            Customer::firstOrCreate(
                ['name' => $customer['name']],
                $customer
            );
        }
    }
}