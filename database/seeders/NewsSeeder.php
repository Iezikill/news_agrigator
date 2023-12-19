<?php

namespace Database\Seeders;

use App\Enums\News\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news')->insert($this->getData());
    }

    public function getData(): array
    {
        $quantityNews = 15;
        $news = [];

        for ($i = 0; $i < $quantityNews; $i++) {

            $news [] = [
                'category_id' => fake()->numberBetween(1,5),
                'title' => fake()->jobTitle(),
                'author' => fake()->userName(),
                'description' => fake()->text(50),
                'text' => fake()->text(200),
                'image' => fake()->imageUrl(200, 150),
                'status' => Status::ACTIVE->value,
                'created_at' => now()
            ];
        }
        return $news;
    }
}
