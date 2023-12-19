<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use App\Models\Category;
use App\Http\Requests\Admin\Categories\CreateRequest;
use App\Http\Requests\Admin\Categories\EditRequest;
use App\Models\EloquentModels\Category;
use App\Models\EloquentModels\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(): View
    {
        /*$categoriesList = DB::table('categories')->get();

        return \view ('blade.admin.category.index', ['categories' => $categoriesList]);*/

        $categories = Category::query()->paginate(10);

        return view ('blade.admin.category.index')
            ->with(['categories' => $categories]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view ('blade.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        /*DB::table('categories')->insert([
            [
                'name' => request('name'),
                'description' => request('description'),
                'slug' => request('slug'),
                'image' => request('image'),
                'created_at' => request('created_at'),

            ],
        ]);*/

        $request->flash();

        //$categories = new Category($request->all());
        //dd($news->fill($request->all()));

        $data = $request->only(['name', 'description', 'slug', 'image']);
        $url = '';

        //$url = null;

        if($request->file('image')) {
            $path = Storage::putFile('public/img/photo', $request->file('image'));
            $url = Storage::url($path);
        }

        $categories = new Category($data);

        $categories->image = $url;
        $categories->created_at = now();
        //dd($categories);
        $categories->save();

        /*$categories->image = $url;

        $categories->fill($request->all())->save();*/

        if($categories->save()) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Category successfully added');
        }

        return back()->with('error', 'Failed to add category');


//        return redirect()->route('admin.categories.create');

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
    public function edit(Category $category): View
    {
        return view ('blade.admin.category.edit',
            ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Category $category)
    {
        /*$data = $request->all();
        $category -> fill($data);*/

        $request->flash();
        $data = $request->only(['name', 'description', 'slug', 'created_at']);

        $url = $category->image;

        if($request->hasFile('image')) {
            $path = Storage::putFile('public/img/photo', $request->file('image'));
            $url = Storage::url($path);
        }

        $category->image = $url;
        //dd($category);
        $category -> fill($data);

        if($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Category is successfully edited');
        }

        return back()->with('error', 'Failed to edit category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {

        if($category->delete()){
            return redirect()->route('admin.categories.index')->with('success', 'Category successfully removed');
        }
        return back()->with('error', 'Failed to remove category');
    }

    // -------------- Before DB -----------------------------

    /*public function index(Category $categories): View
    {
        $categoriesList = $categories->getCategories();
        return \view ('blade.admin.category.index', ['categories' => $categoriesList]);

    }


    public function create()
    {
        return \view ('blade.admin.category.create');
    }


    public function store(Request $request)
    {
        request()->flash();
        return redirect()->route('admin.categories.create');
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
