@extends('layouts.admin')

@section('title')
    @parent :: Create resource
@endsection
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add resource</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    @include('inc.message')

    {{--@if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif--}}

    <form method="post" action="{{ route('admin.resources.store') }}" enctype="multipart/form-data">
        @csrf
        {{--<div class="form-group">
            <label for="id" class="form-label">#ID</label>
            <input type="text" class="form-control" id="id" name="id" value = "{{old('id')}}">
        </div><br>--}}

        <div class="form-group">
            <label for="resource_title" class="form-label">Resource</label>
            <input type="text" class="form-control @error('resource_title') is-invalid @enderror"
                   id="resource_title" name="resource_title" value = "{{old('resource_title')}}">
            @error('resource_title') <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}
            </div>@enderror
        </div><br>

        <div class="form-group">
            <label for="resource_url" class="form-label">Resource Url</label>
            <input type="url" class="form-control @error('resource_url') is-invalid @enderror"
                   id="resource_url" name="resource_url" value = "{{old('resource_url')}}">
            @error('resource_url') <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}
            </div>@enderror
        </div><br>

        <button type="submit" class="btn btn-primary">Save</button><br>
    </form>
@endsection
