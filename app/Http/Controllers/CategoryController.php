<?php

declare(strict_types=1);

namespace App\Http\Controllers;



use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;


class CategoryController extends Controller
{
//    use NewsTrait;

    public function index(Category $category): View
    {
        return  \view('blade.categories.index')
                    -> with('categories', $category->getCategories());

        /*return \view('categories.index', [
            'categories' => $this->getCategory(),
        ]);*/

        //return $this->getCategory();
    }

    public function show($slug, Category $category, News $news): View
    {
        return  \view('blade.categories.show')
            ->with('categories', $category->getCategoryNewsBySlug($slug, $news));


        /*return \view('categories.show', [
            'categories' => $this->getNewsByCategory($id),
        ]);
//        return $this->getNewsByCategory($id);*/
    }

// Unused functions -----------------------------------------------------------

    /*public function showBySlug(News $news, Category $category, $slug): View
    {
        return view('blade.categories.show')
            ->with('category', $category->getNewsByCategorySlug($slug, $news))
            ->with('category', $category->getCategoryNameBySlug($slug));
    }*/

}
