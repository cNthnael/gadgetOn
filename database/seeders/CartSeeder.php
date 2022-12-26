<?php

namespace Database\Seeders;

use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cart::query()->insert([
            [
                'id' => 17,
                'product_id' => 5,
                'transaction_id' => 5,
                'quantity' => 1,
                'total_price' => 16499000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 18,
                'product_id' => 2,
                'transaction_id' => 6,
                'quantity' => 3,
                'total_price' => 17097000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 19,
                'product_id' => 4,
                'transaction_id' => 7,
                'quantity' => 3,
                'total_price' => 14097000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 20,
                'product_id' => 6,
                'transaction_id' => 8,
                'quantity' => 5,
                'total_price' => 25495000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 21,
                'product_id' => 1,
                'transaction_id' => 8,
                'quantity' => 3,
                'total_price' => 11970000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 22,
                'product_id' => 3,
                'transaction_id' => 8,
                'quantity' => 2,
                'total_price' => 7998000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 23,
                'product_id' => 5,
                'transaction_id' => 9,
                'quantity' => 2,
                'total_price' => 32998000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
