<?php

declare(strict_types=1);

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    use NewsTrait;

    public function index(): View
    {
        return  \view('blade.categories.index', [
            'categories' => $this->getCategory()
        ]);

        /*return \view('categories.index', [
            'categories' => $this->getCategory(),
        ]);*/

        //return $this->getCategory();
    }

    public function show(int $id): View
    {
        return  \view('blade.categories.show', [
            'categories' => $this->getNewsByCategory($id)
        ]);

        /*return \view('categories.show', [
            'categories' => $this->getNewsByCategory($id),
        ]);*/
//        return $this->getNewsByCategory($id);
    }

}
