<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::query()->insert([
            [
                'id' => 5,
                'user_id' => 1,
                'transaction_date' => Carbon::parse('2022-10-18'),
                'total_price' => 16499000,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'user_id' => 1,
                'transaction_date' => Carbon::parse('2022-12-20'),
                'total_price' => 17097000,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 7,
                'user_id' => 1,
                'transaction_date' => Carbon::parse('2022-12-21'),
                'total_price' => 14097000,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 8,
                'user_id' => 2,
                'transaction_date' => Carbon::parse('2022-11-11'),
                'total_price' => 45463000,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 9,
                'user_id' => 2,
                'transaction_date' => Carbon::parse('2022-12-12'),
                'total_price' => 32998000,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
