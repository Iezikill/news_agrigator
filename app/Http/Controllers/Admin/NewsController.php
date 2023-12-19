<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use App\Http\Controllers\NewsTrait;
//use App\Models\News;
use App\Models\EloquentModels\Category;
use App\Models\EloquentModels\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class NewsController extends Controller
{
    //use NewsTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        /*$news = News::query()
            ->join('categories', 'categories.id','=', 'news.category_id')
            ->select('news.*', 'categories.name as category_name')
            ->orderByDesc('id')
            ->paginate(5);*/
//        dump($news);
        /*$newsList = DB::table('news')
            ->join('categories', 'categories.id','=', 'news.category_id')
            ->select('news.*', 'categories.name as category_name')
            ->orderBy('id')
            ->get();*/


        return \view ('blade.admin.news.index', [
            'news' => News::query()
                ->status()
//                ->where('status', $request->query('f', 'draft')) - если без SCOPE, status() - закомментировать
                ->with('category')
                ->orderByDesc('id')
                ->paginate(5)->appends($request->query())
//                ->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categoriesList = Category::all();
//        $categoriesList = DB::table('categories')->get();

        return \view ('blade.admin.news.create', ['categories' => $categoriesList]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
       /* $categoryName = request('category');
        $categoryId = DB::table('categories')
            ->where('name', $categoryName)
            ->value('id');*/
        //dd(request()->all());

               /*$post = [
                   'category_id' => $request->input('category_id'),
                   'title' => $request->input('title'),
                   'author' => $request->input('author'),
                   'description' => $request->input('description'),
                   'text' => $request->input('text'),
                   'image' => $request->input('image'),
                   'status' => $request->input('status'),
                   'created_at' => $request->input('created_at'),

               ];*/

//               $postId = DB::table('news')->insertGetId($post);

        request()->flash();

        $news = new News($request->all());
        //dd($news->fill($request->all()));


        $url = null;
        if($request->hasFile('image')) {
            $path = Storage::putFile('public/img/photo', $request->file('image'));
            $url = Storage::url($path);
        }
        dd($request->all());
        $news->image = $url;

        $news->fill($request->all())->save();

        if($news->save()) {
            return redirect()->route('admin.news.index')
                ->with('success', 'News successfully added');
        }

        return back()->with('error', 'Failed to add news');
        //return response()->json($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news): view
    {
        $categories = Category::all();
        return view ('blade.admin.news.edit',
        ['categories' => $categories,
        'news' => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //$request->flash();
        //return redirect()->route('admin.news.edit', ['news' => $news]);

        $data = $request->all();
        $news -> fill($data);

        if($news->save()) {
            return redirect()->route('admin.news.index')
                ->with('success', 'News successfully added');
        }

        return back()->with('error', 'Failed to add news');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    //------------ Before DB ---------------------
    /*public function index(News $news): View
    {
        $newsList = $news->getNews();
        return \view ('blade.admin.news.index', ['news' => $newsList]);
    }


    public function create(): View
    {

        return \view ('blade.admin.news.create');
    }


    public function store(Request $request)
    {
//        dd($request->title2);
        request()->flash();
        return redirect()->route('admin.news.create');
        //return response()->json($request->all());
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }*/
}
