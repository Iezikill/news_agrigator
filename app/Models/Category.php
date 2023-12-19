<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category
{
    private array $categories = [
        1 => [
            'id' => 1,
            'name' => 'sport',
            'slug' => 'sport',
            'image' => 'https://img.freepik.com/free-photo/athlete-starting-line-stadium_23-2149399599.jpg?size=626&ext=jpg&ga=GA1.1.154639367.1694618747&semt=sph'
        ],
        2 => [
            'id' => 2,
            'name' => 'business',
            'slug' => 'business',
            'image' => 'https://st.depositphotos.com/2726735/3242/i/450/depositphotos_32422439-stock-photo-abstract-modern-city-background.jpg'
        ],
        3 => [
            'id' => 3,
            'name' => 'politic',
            'slug' => 'politic',
            'image' => 'https://images.unsplash.com/photo-1589262804704-c5aa9e6def89?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fHBvbGl0aWNzfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60'
        ],
        4 => [
            'id' => 4,
            'name' => 'life',
            'slug' => 'life',
            'image' => 'https://images.unsplash.com/photo-1517960413843-0aee8e2b3285?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D&w=1000&q=80'
        ],
        5 => [
            'id' => 5,
            'name' => 'science',
            'slug' => 'science',
            'image' => 'https://images.unsplash.com/photo-1564325724739-bae0bd08762c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8c2NpZW5jZXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60'
        ],
    ];

    public function getCategoryNewsBySlug($slug, News $news):array
    {
        $id = $this->getCategoryIdBySlug($slug);
        $newsByCategory = [];
        $newsArr = $news->getNews();

        foreach ($newsArr as $el){
            if ($el['category_id'] === $id) {
                $newsByCategory [] = $el;
            }
        }
        return $newsByCategory;
    }

    public function getCategoryIdBySlug($slug)
    {
        $id = null;
        foreach ($this->getCategories() as $category) {
            if ($category['slug'] == $slug) {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }

    public function getCategories(): array
    {
        return $this->categories;
    }


// Unused functions -----------------------------------------------------------

    /*public function getCategoryById($id)
    {
        if (array_key_exists($id, $this->getCategories()))
            return $this->categories[$id];
        else
            return null;
    }*/

    /*public function getCategoryNameBySlug($slug)
    {
        $id = $this->getCategoryIdBySlug($slug);
        $category = $this->getCategoryById($id);
        if ($category != [])
            return $category['title'];
        else return null;
    }*/


}
