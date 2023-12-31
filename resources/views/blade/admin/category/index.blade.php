@extends('layouts.admin')
@section('title')
    @parent :: Categories list
@endsection
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Categories list</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.categories.create')}}" class="btn btn-sm btn-outline-secondary">Add category</a>
            </div>
            {{--<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>--}}
        </div>
    </div>

    {{--    <h2>Section title</h2>--}}
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>

                <th scope="col">Category ID</th>
                <th scope="col">Category name</th>
                <th scope="col">Slug</th>
                <th scope="col">Image</th>

            </tr>
            </thead>
            <tbody>
            @forelse($categories as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->slug}}</td>
                    <td>{{$item->image}}</td>
                    <td style="display: flex">
                        <a href="{{ route('admin.categories.edit', $item) }}" style="margin-top: 5px">
                            Edit
                        </a>
                        <form style="margin: 0 15px 5px;" method="POST" enctype="multipart/form-data"
                              action="{{route('admin.categories.destroy', $item)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm" style="color: red; text-decoration: underline", type="submit">
                                Remove
                            </button>
                            {{--                            <a href="#" style="color: red">Remove</a>--}}
                        </form>
{{--                        <a href="#" style="color: red">Remove</a>--}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No entries</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div style="padding-right: 65px">
            {{ $categories->links() }}
        </div>
    </div>


{{--    Before DB--}}
    {{--<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Categories list</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.categories.create')}}" class="btn btn-sm btn-outline-secondary">Add category</a>
            </div>--}}
            {{--<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>--}}
        {{--</div>
    </div>--}}

    {{--    <h2>Section title</h2>--}}
    {{--<div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>

                <th scope="col">Category ID</th>
                <th scope="col">Category name</th>
                <th scope="col">Slug</th>
                <th scope="col">Image</th>

            </tr>
            </thead>
            <tbody>
            @forelse($categories as $item)
                <tr>
                    <td>{{$item['id']}}</td>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['slug']}}</td>
                    <td>{{$item['image']}}</td>
                    <td><a href="#">Change</a> | <a href="#" style="color: red">Remove</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No entries</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>--}}
@endsection

