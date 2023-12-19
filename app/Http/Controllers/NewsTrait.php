<?php

declare(strict_types=1);

namespace App\Http\Controllers;

trait NewsTrait
{
    public function getNewsByName($name):array
    {
        $newsByName = [];
        $news = $this->getNews();

        foreach ($news as $el){
            if ($el['category_name'] === $name) {
                $newsByName [] = $el;
            }
        }
        return $newsByName;
    }

    public function getNewsByCategory($id):array
    {
        $newsByCategory = [];
        $news = $this->getNews();

        foreach ($news as $el){
            if ($el['category_id'] === $id) {
                $newsByCategory [] = $el;
            }
        }
        return $newsByCategory;
    }
    public function getCategory(int $id = null): array
    {
        $categories = [
            [   'id' => 1,
                'name' => 'sport'
            ],
            [   'id' => 2,
                'name' => 'business'
            ],
            [   'id' => 3,
                'name' => 'politic'
            ],
            [   'id' => 4,
                'name' => 'life'
            ],
            [   'id' => 5,
                'name' => 'science'
            ],
        ];

        if ($id === null) {
            return $categories;
        }
        return $categories[$id - 1];
    }
    public function getNews(int $id = null): array
    {
        $news = [];
        $quantityNews = 21;

        if ($id === null) {
            for($i = 1; $i < $quantityNews; $i++) {
                $category_id = rand(1,5);
                $news[$i] = [
                    'id' => $i,
                    'category_id' => $category_id,
                    'category_name' => $this->getCategory($category_id)['name'],
                    'title' => \fake()->jobTitle(),
                    'image' => \fake()->imageUrl(),
                    'description' => \fake()->text(100),
                    'author' => \fake()->userName(),
                    'created_at' => \now()->format('d-m-Y H:i'),
                    'status' => 'ACTIVE'
                ];
            }
            return $news;
        }

        else {
            $news [] = [
                'id' => $id,
                'title' => \fake()->jobTitle(),
                'image' => \fake()->imageUrl(),
                'full_text' => \fake()->text(1000),
                'author' => \fake()->userName(),
                'created_at' => \now()->format('d-m-Y H:i'),
                'status' => 'ACTIVE'
            ];
            return $news;
        }
    }


}
