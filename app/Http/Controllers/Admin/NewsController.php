<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\News\Status;
use App\Http\Controllers\Controller;
//use App\Http\Controllers\NewsTrait;
//use App\Models\News;
use App\Http\Requests\Admin\News\CreateRequest;
use App\Http\Requests\Admin\News\EditRequest;
use App\Models\EloquentModels\Category;
use App\Models\EloquentModels\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;

class NewsController extends Controller
{

    public function storeImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }

        abort(404);
    }

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
                ->paginate(5)
                ->withQueryString()  //  or ->appends($request->query()
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
    public function store(CreateRequest $request): RedirectResponse
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

        $data = $request->only([
            'category_id',
            'title',
            'author',
            'status',
            'description',
            'text',
            'image'
            ]);

        $url = '';
        if($request->hasFile('image')) {
            $path = Storage::putFile('public/img/photo', $request->file('image'));
            $url = Storage::url($path);
        }

        $news = new News($data);
        $news->image = $url;
        $news->save();

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
    public function update(EditRequest $request, News $news)
    {
        //$request->flash();
        //return redirect()->route('admin.news.edit', ['news' => $news]);s

        $data = $request->only([
            'category_id',
            'title',
            'author',
            'status',
            'description',
            'text',
            'image']);

        //$url = $news->image;

        if($request->hasFile('image')) {

            $request->validate([
                'image' => ['sometimes', 'image', 'mimes:jpeg, bmp, png|max:1500']
            ]);

            $oldPath = str_replace('storage', 'public', $news->image);
            Storage::delete($oldPath);

            $path = Storage::putFile('public/img/photo', $request->file('image'));
            $url = Storage::url($path);
            $data['image'] = $url;

            /*Storage::delete($news->image);

            $path = $request->file('image')->store('public/img/photo');
            $data['image'] = $path;*/
        }

       //$news->image = $url;
        $news -> fill($data);

        if($news->save()) {
            return redirect()->route('admin.news.index')
                ->with('success', 'News is successfully edited');
        }

        return back()->with('error', 'Failed to edit news');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        {
            try {
                $news->delete();

                return response()->json('ok');

            } catch (\Exception $e) {
                Log::error($e->getMessage(), $e->getTrace());
                return response ()->json('error', 400);

            }
        }

        /*if($news->delete()){
            return redirect()->route('admin.news.index')
                ->with('success', 'News successfully removed');
        }
        return back()->with('error', 'Failed to remove news');*/
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
