<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\News;

class NewsController extends Controller
{
   // use NewsTrait;

    public function index(News $news): View
    {
       //dd($news->getNews());
        return view('blade.news.index')->with('news', $news->getNews());

        /*return  \view('blade.news.index', [
                'news' => $this->getNews()
        ]);*/

        /*return \view('news.index', [
            'news' => $this->getNews(),
        ]);*/
    }

    public function show(int $id, News $news ): View
    {
        //dd($news->getNewsId($id));
        return  \view('blade.news.show')->with ('news', $news->getNewsId($id));

        /*return \view('news.show', [
            'news' => $this->getNews($id),
        ]);*/
//        return $this->getNews($id);
    }
}
