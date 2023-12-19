@extends('layouts.admin')

@section('title')
    @parent :: Edit user
@endsection
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit user</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    @include('inc.message')

    {{--@if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif--}}

    <form method="post" action="{{ route('admin.users.update', $users) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"
                   id="name" name="name" value = "{{ old('name') ?? $users->name }}">
            @error('name') <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}
            </div>@enderror
        </div><br>

        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                   id="password" name="password" value = "{{ old('password') }}">
            @error('password') <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}
            </div>@enderror
        </div><br>

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror"
                   id="email" name="email" value = "{{ old('email') ?? $users->email}}">
            @error('email') <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}
            </div>@enderror
        </div><br>



        <div class="form-group">
            <label for="is_admin" class="form-label">Is Admin</label>
            <select class="form-select" name="is_admin" id="is_admin">

                <option value=0 @selected(old('is_admin', $users->is_admin))>
                    No</option>
                <option value=1 @selected(old('is_admin', $users->is_admin))>
                    Yes</option>

            </select>

           {{-- <input type="text" class="form-control @error('is_admin') is-invalid @enderror"
                   id="is_admin" name="is_admin" value = "{{ old('is_admin') ?? $users->is_admin}}">
            @error('is_admin') <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}
            </div>@enderror--}}
        </div><br>


        <button type="submit" class="btn btn-primary">Update</button><br>
    </form>
@endsection
