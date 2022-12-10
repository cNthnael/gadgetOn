<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::query()->insert(

            [
                [
                    "id" => 1,
                    "name" => "Samsung Galaxy A42 5G",
                    "release" => "2020, November 11",
                    "desc" => "Best Mid-Range phone with 48MP main sensor, while the selfie shooter is 20MP.",
                    "price" => 3990000,
                    "image_path" => "https://fdn2.gsmarena.com/vv/pics/samsung/samsung-galaxy-a42-5g-1.jpg",
                    "created_at" => null,
                    "updated_at" => null
                ],
                [
                   "id" => 2,
                   "name" => "Samsung Galaxy A53",
                   "release" => "2022, March 24",
                   "desc" => "With 6.5-inch AMOLED display with 120Hz refresh rate and Exynos 1280 processor. Best for gaming.",
                   "price" => 5699000,
                    "image_path" => "https://fdn2.gsmarena.com/vv/pics/samsung/samsung-galaxy-a53-5g-1.jpg",
                    "created_at" => null,
                    "updated_at" => null
                ],
                [
                    "id" => 3,
                   "name" => "Samsung Galaxy A23 5G",
                   "release" => "2022, September 2",
                   "desc" => "Entry-Range phone with 5G connection.",
                   "price" => 3999000,
                   "image_path" => "https://fdn2.gsmarena.com/vv/pics/samsung/galaxy-a23-5g-2.jpg",
                    "created_at" => null,
                    "updated_at" => null
                ],
                [
                    "id" => 4,
                   "name" => "Samsung Galaxy A33 5G",
                   "release" => "2022, April 20",
                   "desc" => "Best Camera Performance.",
                   "price" => 4699000,
                   "image_path" => "https://fdn2.gsmarena.com/vv/pics/samsung/samsung-galaxy-a33-5g-1.jpg",
                    "created_at" => null,
                    "updated_at" => null
                ]
            ]

        );
    }
}
