@extends('layouts.admin')
@section('title')
    @parent :: Users list
@endsection
@section('content')
{{--@dd($users);--}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users list</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.users.create')}}" class="btn btn-sm btn-outline-secondary">Add user</a>
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

                <th scope="col">#ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>

            </tr>
            </thead>
            <tbody>
            @forelse($users as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>
                        @if($item->is_admin)
                            Admin
                        @endif</td>
                    <td class="d-flex justify-content-center">
                        @if ($item->is_admin)
                            <a href="{{ route('admin.toggleAdmin', $item) }}" type="button"
                               class="btn btn-danger" style="padding-bottom: 8px">Remove Admin</a>
                        @else
                            <a href="{{ route('admin.toggleAdmin', $item) }}" type="button"
                               class="btn btn-success" style="padding-bottom: 9px">Make Admin</a>
                        @endif
                    </td>

                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td style="display: flex; padding-bottom: 3px;">
                        <a href="{{ route('admin.users.edit', $item) }}" style="margin-top: 3px">
                            Edit
                        </a>
                        <form style="margin: 0 15px 5px;" method="POST" enctype="multipart/form-data"
                              action="{{route('admin.users.destroy', $item)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm"
                                    style="color: red; text-decoration: underline; font-size: 14px;" type="submit">
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
    </div>


@endsection
