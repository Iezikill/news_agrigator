@extends('layouts.admin')
@section('title')
    @parent :: Resources list
@endsection
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Resources list</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.resources.create')}}" class="btn btn-sm btn-outline-secondary">Add resource</a>
            </div>
        </div>
    </div>

    {{--    <h2>Section title</h2>--}}
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>

                <th scope="col">Resource ID</th>
                <th scope="col">Resource title</th>
                <th scope="col">Resource Url</th>

            </tr>
            </thead>
            <tbody>
            @forelse($resources as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->resource_title}}</td>
                    <td>{{$item->resource_url}}</td>
                    <td style="display: flex">
                        <a href="{{ route('admin.resources.edit', $item) }}" style="margin-top: 5px">
                            Edit
                        </a>
                        <form style="margin: 0 15px 5px;" method="POST" enctype="multipart/form-data"
                              action="{{route('admin.resources.destroy', $item)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm" style="color: red; text-decoration: underline", type="submit">
                                Remove
                            </button>
                        </form>
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
            {{ $resources->links() }}
        </div>

    </div>

@endsection

