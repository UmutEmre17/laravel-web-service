<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
             [  
                "id" => "1",
                "name" => "category 1"
            ],
             [
                "id" => "2",
                "name" => "category 2"
            ],
             [
                "id" => "3",
                "name" => "category 3"
            ],
             [
                "id" => "4",
                "name" => "category 4"
            ],
             [
                "id" => "5",
                "name" => "category 5"
            ],
        ]; 
        foreach ($categories as $category) {
            Category::create($category);
        }    
    }
}
