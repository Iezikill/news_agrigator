<?php

declare(strict_types=1); //строгая типизация

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;

    public function index()
    {
        return \view('news.index', [
            'news' => $this->getNews(),
        ]); //хелпер
    }

    public function show(int $id)
    {
        return$this->getNews($id);
    }
}
