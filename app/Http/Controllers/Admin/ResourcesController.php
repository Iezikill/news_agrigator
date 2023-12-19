<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Resources\CreateRequest;
use App\Http\Requests\Admin\Resources\EditRequest;
use App\Models\EloquentModels\Resource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $resources = Resource::query()->paginate(10);

        return \view ('blade.admin.resources.index')
        ->with(['resources' => $resources]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view ('blade.admin.resources.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request): RedirectResponse
    {

        $request->flash();

        $data = $request->only(['resource_title', 'resource_url']);

        $resources = new Resource($data);

        $resources->save();


        if($resources->save()) {
            return redirect()->route('admin.resources.index')
                ->with('success', 'Resource successfully added');
        }

        return back()->with('error', 'Failed to add resource');

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
    public function edit(Resource $resource): View
    {
        return view ('blade.admin.resources.edit',
            ['resource' => $resource]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Resource $resource)
    {
        $request->flash();
        $data = $request->only(['resource_title', 'resource_url']);

        $resource -> fill($data);

        if($resource->save()) {
            return redirect()->route('admin.resources.index')
                ->with('success', 'Resource is successfully edited');
        }

        return back()->with('error', 'Failed to edit resource');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resource $resource)
    {
        if($resource->delete()){
            return redirect()->route('admin.resources.index')
                ->with('success', 'Resource successfully removed');
        }
        return back()->with('error', 'Failed to remove resource');
    }
}
