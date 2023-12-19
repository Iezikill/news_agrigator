@extends('layouts.admin')

@section('title')
    @parent :: Create category
@endsection
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add category</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

            {{--<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>--}}
        </div>
    </div>

    <form method="post" action="{{ route('admin.categories.store') }}">
        @csrf
        <div class="form-group">
            <label for="id" class="form-label">#ID</label>
            <input type="text" class="form-control" id="id" name="id" value = "{{old('id')}}">
        </div><br>

        <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value = "{{old('name')}}">
        </div><br>

        <div class="form-group">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value = "{{old('slug')}}">
        </div><br>

        <div class="form-group">
            <label for="image" class="form-label">Image</label>
            <input type="url" class="form-control" id="image" name="image" value = "{{old('image')}}">
        </div><br>


        {{--<div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>--}}
        <button type="submit" class="btn btn-primary">Save</button><br>
    </form>
@endsection
