@extends('layouts.admin')

@section('title')
    @parent :: Create user
@endsection
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add user</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

            {{--<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>--}}
        </div>
    </div>

    @include('inc.message')

    {{--@if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif--}}

    <form method="post" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"
                   id="name" name="name" value = "{{old('name')}}">
            @error('name') <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}
            </div>@enderror
        </div><br>

        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                   id="password" name="password" value = "{{old('password')}}">
            @error('password') <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}
            </div>@enderror
        </div><br>

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror"
                   id="email" name="email" value = "{{old('email')}}">
            @error('email') <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}
            </div>@enderror
        </div><br>

        <div class="form-group">
            <label for="is_admin" class="form-label">Is Admin</label>
            <select class="form-select" name="is_admin" id="is_admin">

                    <option value="{{old('is_admin') ?? '1'}}">0</option>
                    <option value="{{old('is_admin') ?? '0'}}">1</option>

            </select>
        </div><br>


        <button type="submit" class="btn btn-primary">Save</button><br>
    </form>
@endsection
