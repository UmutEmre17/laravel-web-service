<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                "id" => "1",
                "category_ids"=> [5, 4],
                "name" => "Product 1",
                "image" => "https://img-lcwaikiki.mncdn.com/mnresize/1024/-/pim/productimages/20221/5593210/v1/l_20221-s26331z8-cvl_a.jpg",
                "price" => 10.99,
                "discounted_price" => 6.5
            ],
            [
                "id" => "2",
                "category_ids"=> [3, 4],
                "name" => "Product 2",
                "image" => "https://img-lcwaikiki.mncdn.com/mnresize/1024/-/pim/productimages/20221/5732790/l_20221-s2ee14z8-311_a.jpg",
                "price" => 20.99,
                "discounted_price" => 15.99
            ],
            [
                "id" => "3",
                "category_ids"=> [4, 1],
                "name" => "Product 3",
                "image" => "https://img-lcwaikiki.mncdn.com/mnresize/1024/-/pim/productimages/20211/4919203/v1/l_20211-s1ca24z8-lrk_a1.jpg",
                "price" => 30.99,
                "discounted_price" => 18.99
            ],
            [
                "id" => "4",
                "category_ids"=> [2, 4],
                "name" => "Product 4",
                "image" => "https://img-lcwaikiki.mncdn.com/mnresize/1024/-/pim/productimages/20212/5622474/l_20212-w1kd76z8-ffb_a.jpg",
                "price" => 40.99,
                "discounted_price" => 30
            ],
            [
                "id" => "5",
                "category_ids"=> [3, 1],
                "name" => "Product 5",
                "image" => "https://img-lcwaikiki.mncdn.com/mnresize/1024/-/pim/productimages/20211/5353958/v2/l_20211-s1lc50z8-cvl_a.jpg",
                "price" => 50.99,
                "discounted_price" => 35.99
            ],
            [
                "id" => "6",
                "category_ids"=> [2, 1],
                "name" => "Product 6",
                "image" => "https://img-lcwaikiki.mncdn.com/mnresize/1024/-/pim/productimages/20221/5593222/l_20221-s26332z8-lgs_a.jpg",
                "price" => 50.99,
                "discounted_price" => 35.99
            ],
            [
                "id" => "7",
                "category_ids"=> [3, 2],
                "name" => "Product 7",
                "image" => "https://img-lcwaikiki.mncdn.com/mnresize/1024/-/pim/productimages/20221/5771510/l_20221-s2fs71z8-cvl_a.jpg",
                "price" => 50.99,
                "discounted_price" => 35.99
            ],
            [
                "id" => "8",
                "category_ids"=> [1, 4],
                "name" => "Product 8",
                "image" => "https://img-lcwaikiki.mncdn.com/mnresize/1024/-/pim/productimages/20221/5697917/l_20221-s2ci85z8-h9g_a.jpg",
                "price" => 50.99,
                "discounted_price" => 35.99
            ],
            [
                "id" => "9",
                "category_ids"=> [5, 1],
                "name" => "Product 9",
                "image" => "https://img-lcwaikiki.mncdn.com/mnresize/1024/-/pim/productimages/20211/5377552/v3/l_20211-s1lk77z8-ufs_a.jpg",
                "price" => 50.99,
                "discounted_price" => 35.99
            ],
            [
                "id" => "10",
                "category_ids"=> [3, 4],
                "name" => "Product 10",
                "image" => "https://img-lcwaikiki.mncdn.com/mnresize/1024/-/pim/productimages/20211/5088825/l_20211-s1h145z8-hkd_a.jpg",
                "price" => 50.99,
                "discounted_price" => 35.99
            ]
        ];

        foreach ($products as $productData) {
            $categories = $productData['category_ids'];
            unset($productData['category_ids']);

            $product = Product::create($productData);
            $product->categories()->attach($categories);
        }
    }
}
