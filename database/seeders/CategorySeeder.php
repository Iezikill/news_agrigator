<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert($this->getData());
    }

    public function getData(): array
    {
        $quantityCategories = 5;
        $categories = [];

        for ($i = 0; $i < $quantityCategories; $i++) {

            $nameAndSlug = fake()->text(10);

            $categories [] = [
                'name' => $nameAndSlug,
                'description' => fake()->text(100),
                'slug' => $nameAndSlug,
                'image' => fake()->imageUrl(200, 150),
                'created_at' => now()
            ];
        }
        return $categories;
    }
}
