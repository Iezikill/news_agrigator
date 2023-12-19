<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(): View
    {
        $categoriesList = DB::table('categories')->get();

        return \view ('blade.admin.category.index', ['categories' => $categoriesList]);

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
    public function store()
    {
        DB::table('categories')->insert([
            [
                'name' => request('name'),
                'description' => request('description'),
                'slug' => request('slug'),
                'image' => request('image'),
                'created_at' => request('created_at'),

            ],
        ]);

        request()->flash();
        return redirect()->route('admin.categories.create');

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
