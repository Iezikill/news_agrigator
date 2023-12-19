<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\CreateRequest;
use App\Http\Requests\Admin\Categories\EditRequest;
use App\Models\EloquentModels\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(): View
    {
        /*$categoriesList = DB::table('categories')->get();

        return \view ('blade.admin.category.index', ['categories' => $categoriesList]);*/

        return \view ('blade.admin.users.index', [
            'users' => User::query()
                ->get()]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view ('blade.admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $request->flash();

        $data = $request->only(['name', 'password', 'email', 'is_admin']);
        $hashPass = Hash::make($data['password']);

        $users = new User($data);
        $users->password = $hashPass;
        $users->save();

        if($users->save()) {
            return redirect()->route('admin.users.index')
                ->with('success', 'User successfully added');
        }

        return back()->with('error', 'Failed to add new user');

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
    public function edit(User $user): View
    {
        return view ('blade.admin.users.edit',
            ['users' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $request->flash();
        $data = $request->only(['name', 'password', 'email', 'is_admin']);


        $user -> fill($data);

        if($user->save()) {
            return redirect()->route('admin.users.index')
                ->with('success', 'User is successfully edited');
        }

        return back()->with('error', 'Failed to edit user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {

        if($user->delete()){
            return redirect()->route('admin.users.index')
                ->with('success', 'User successfully removed');
        }
        return back()->with('error', 'Failed to remove user');
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

