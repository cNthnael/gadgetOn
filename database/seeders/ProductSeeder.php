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
                    "desc" => "Samsung Galaxy A42 is 5G ready and available in November 2020. Specs-wise the phone will have a 6.6-inch Super AMOLED display, Snapdragon 750 processor, 4GB RAM, and 5000mAh battery. The upload is 128GB, expandable via a MicroSD card upto 1TB. A quad-camera setup adorns the back with a 48MP main sensor, while the selfie shooter is 20MP.",
                    "price" => 3990000,
                    "image_path" => "upload/samsung-galaxy-a42-5g-1.jpg",
                    "created_at" => null,
                    "updated_at" => null
                ],
                [
                   "id" => 2,
                   "name" => "Samsung Galaxy A53",
                   "release" => "2022, March 24",
                   "desc" => "The Samsung Galaxy A53 5G comes with 6.5-inch AMOLED display with 120Hz refresh rate and Exynos 1280 processor. Specs also include 5000mAh battery with 25W charging speed, Quad camera setup on the back with 64MP main sensor and 32MP front selfie camera.",
                   "price" => 5699000,
                    "image_path" => "upload/samsung-galaxy-a53-5g-1.jpg",
                    "created_at" => null,
                    "updated_at" => null
                ],
                [
                    "id" => 3,
                   "name" => "Samsung Galaxy A23 5G",
                   "release" => "2022, September 2",
                   "desc" => "The Samsung Galaxy A23 comes with 6.6-inch display and Qualcomm Snapdragon 695 5G processor. Specs also include 5000mAh battery with 15W charging speed, Quad camera setup on the back with 50MP main sensor and 8MP front selfie camera.",
                   "price" => 3999000,
                   "image_path" => "upload/samsung-galaxy-a23-1.jpg",
                    "created_at" => null,
                    "updated_at" => null
                ],
                [
                    "id" => 4,
                   "name" => "Samsung Galaxy A33 5G",
                   "release" => "2022, April 20",
                   "desc" => "The Samsung Galaxy A33 5G is a budget phone that comes with 6.4-inch AMOLED display with 90Hz refresh rate and Exynos 1280 processor. Specs also include Quad camera setup on the back with48MP main sensor and 13MP front selfie camera.",
                   "price" => 4699000,
                   "image_path" => "upload/samsung-galaxy-a33-5g-1.jpg",
                    "created_at" => null,
                    "updated_at" => null
                ],
                [
                    "id" => 5,
                    "name" => "Samsung S22 Ultra 5G",
                    "release" => "2022, February 9",
                    "desc" => "The Samsung Galaxy S22 Ultra is the headliner of the S22 series. It's the first S series phone to include Samsung's S Pen. Specifications are top-notch including 6.8-inch Dynamic AMOLED display with 120Hz refresh rate, Snapdragon 8 Gen 1 processor, 5000mAh battery, up to 12gigs of RAM, and 1TB of storage. In the camera department, a quad-camera setup is presented with two telephoto sensors.",
                    "price" => 16499000,
                    "image_path" => "upload/samsung-galaxy-s22-ultra-5g-3.jpg",
                    "created_at" => null,
                    "updated_at" => null
                ],
                [
                    "id" => 6,
                    "name" => "Samsung M53 5G",
                    "release" => "2022, April 22",
                    "desc" => "The Samsung Galaxy M53 5G comes with 6.7-inch AMOLED display with 120Hz refresh rate an MediaTek Dimensity 900 processor. Specs also include 5000mAH battery with 25W charging speed, Quad camera setup on the back with 108MO main sensor and 32MP front selfie camera.",
                    "price" => 5099000,
                    "image_path" => "upload/samsung-galaxy-m53-5g-1.jpg",
                    "created_at" => null,
                    "updated_at" => null
                ]
            ]

        );
    }
}
