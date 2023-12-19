@extends('layouts.admin')

@section('title')
    @parent :: Edit resource
@endsection
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit resource</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    @include('inc.message')


    <form method="post" action="{{ route('admin.resources.update', $resource) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="resource_title" class="form-label">Name</label>
            <input type="text" class="form-control @error('resource_title') is-invalid @enderror"
                   id="resource_title" name="resource_title" value = "{{old('resource_title') ?? $resource->resource_title}}">
            @error('resource_title') <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}
            </div>@enderror
        </div><br>

        <div class="form-group">
            <label for="resource_url" class="form-label">Description</label>
            <input type="url" class="form-control @error('resource_url') is-invalid @enderror"
                   id="resource_url" name="resource_url" value = "{{old('resource_url') ?? $resource->resource_url}}">
            @error('resource_url') <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}
            </div>@enderror
        </div><br>

        <button type="submit" class="btn btn-primary">Update</button><br>
    </form>
@endsection
