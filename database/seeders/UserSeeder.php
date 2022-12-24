<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->insert([
            [
                'id' => 503,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin123'),
                'address' => 'Jakarta',
                'gender' => 'male',
                'is_admin' => true,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                'id' => 1,
                'name' => 'Carlo',
                'email' => 'carlo.djobo@binus.ac.id',
                'password' => Hash::make('user123'),
                'address' => 'Jln. Komplek BPK IIIC - Kebon Jeruk, Jakarta Barat',
                'gender' => 'male',
                'is_admin' => false,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                'id' => 2,
                'name' => 'Alvian Faiz',
                'email' => 'alvian.hidayanto@binus.ac.id',
                'password' => Hash::make('user123'),
                'address' => 'Jakarta Selatan',
                'gender' => 'male',
                'is_admin' => false,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]
        ]);
    }
}
