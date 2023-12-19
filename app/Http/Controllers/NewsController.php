<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
//use App\Models\News;
use App\Models\EloquentModels\News;



class NewsController extends Controller
{
   // use NewsTrait;

    public function index(): View
    {
        $news = News::query()
            ->with('category')
            ->paginate(3);
//        dump($news);
//        $news = DB::table('news')->get();
        /*$news = DB::table('news')
            ->join('categories', 'categories.id','=', 'news.category_id')
            ->select('news.*', 'categories.name as category_name')
            ->get();*/


        return view('blade.news.index')->with(['news' => $news]);
    }

    public function show(News $news): View
    {
        /*$news = DB::table('news')
            ->join('categories', 'categories.id','=', 'news.category_id')
            ->select('news.*', 'categories.name as category_name')
            ->where('news.id', '=', $id)
            ->get();*/

//           $news = News::query()->find($id);
        //dump($news);


        return \view('blade.news.show')->with(['news' => $news]);

    }


    //-------------- Before DB ----------------------


   /* public function index(News $news): View
    {
       $news = DB::table('news')->get();

        return view('blade.news.index')->with('news', $news->getNews());

// --------------------------------------------------------
        return  \view('blade.news.index', [
                'news' => $this->getNews()
        ]);

        return \view('news.index', [
            'news' => $this->getNews(),
        ]);
    }*/

   /* public function show(int $id, News $news ): View
    {

        return  \view('blade.news.show')->with ('news', $news->getNewsId($id));
// ----------------------------------------------------------------
        return \view('news.show', [
            'news' => $this->getNews($id),
        ]);
//        return $this->getNews($id);
    }*/
}
