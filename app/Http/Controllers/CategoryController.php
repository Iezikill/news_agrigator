<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use NewsTrait;

    public function index()
    {
        return \view('categories.index', [
            'categories' => $this->getCategory(),
        ]);

        //return $this->getCategory();
    }

    public function show(int $id)
    {
        return \view('categories.show', [
            'categories' => $this->getNewsByCategory($id),
        ]);
//        return $this->getNewsByCategory($id);
    }

    public function showByName(string $name)
    {
        /*return \view('categories.show', [
            'categories' => $this->getNewsByName($name),
        ]);*/
       return $this->getNewsByName($name);
    }

}
