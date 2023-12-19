@extends('layouts.admin')

@section('title')
    @parent :: Edit news
@endsection
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit news</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

            {{--<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>--}}
        </div>
    </div>

    @include('inc.message')

   {{-- @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>

        @endforeach
    @endif--}}

    <form method="post" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{--<div class="form-group">
            <label for="id" class="form-label">#ID</label>
            <input type="text" class="form-control" id="id" name="id" value = "{{old('id')}}">
        </div><br>--}}

        {{-- <div class="form-group">
             <label for="category_id" class="form-label">Category_id</label>
             <input type="text" class="form-control" id="category_id" name="category_id" value = "{{old('category_id')}}">
         </div><br>--}}

        <div class="form-group">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" name="category_id" id="category_id">
                            {{--<option selected>Status</option>--}}
                @foreach($categories as $item)
                    <option value="{{$item->id}}" @selected(old('category_id', $news->category_id) == $item->id)>
                        {{$item->name}}</option>
                @endforeach
            </select>
        </div><br>

        {{--<div class="form-group">
            <label for="category_name" class="form-label">Category_name</label>
            <input type="text" class="form-control" id="category_name" name="category_name" value = "{{old('category_name')}}">
        </div><br>--}}

        <div class="form-group">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control  @error('title') is-invalid @enderror"
                   id="title" name="title" value = "{{old('title') ?? $news->title}}">
            @error('title') <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}
            </div>@enderror
        </div><br>

        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" name="description">{{old('description')
                ?? $news->description}}
        </textarea>

        </div><br>

        <div class="form-group">
            <label for="text" class="form-label">Text</label>
            <textarea type="text" class="form-control @error('text') is-invalid @enderror"
                      id="text" name="text">{{old('text') ?? $news->text}}</textarea>
            @error('text') <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}
            </div>@enderror

        </div><br>

       {{-- <div class="form-group">
            <label for="created_at" class="form-label">Created_at</label>
            <input type="datetime-local" class="form-control" id="created_at" name="created_at"
                   value = "{{old('created_at') ?? $news->created_at}}">

        </div><br>--}}

        <div class="form-group">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status" id="status">
                            {{--<option selected>Status</option>--}}
                <option @selected(old('status', \App\Enums\News\Status::DRAFT->value) == $news->status)>
                    {{\App\Enums\News\Status::DRAFT->value}} </option>
                <option @selected(old('status', \App\Enums\News\Status::ACTIVE->value) == $news->status)>
                    {{\App\Enums\News\Status::ACTIVE->value}} </option>
                <option @selected(old('status',\App\Enums\News\Status::BLOCKED->value) == $news->status)>
                    {{\App\Enums\News\Status::BLOCKED->value}} </option>


                {{--<option @selected(old('status', \App\Enums\News\Status::DRAFT->value) == $item->status)>
                    {{\App\Enums\News\Status::DRAFT->value}} </option>
                <option @if(old('status') === \App\Enums\News\Status::ACTIVE->value) selected @endif>
                    {{\App\Enums\News\Status::ACTIVE->value}} </option>
                <option @if(old('status') === \App\Enums\News\Status::BLOCKED->value) selected @endif>
                    {{\App\Enums\News\Status::BLOCKED->value}} </option>--}}
            </select>
        </div><br>

        {{--<div class="form-group">
            <label for="isPrivate" class="form-label">isPrivate</label>
            <select class="form-select" name="isPrivate" id="isPrivate">
                            <option selected>Status</option>
                <option @if(old('isPrivate') === 'True') selected @endif>True</option>
                <option @if(old('isPrivate') === 'False') selected @endif>False</option>
            </select>
        </div><br>--}}

        <div class="form-group">
            <label for="image" class="form-label">Image</label>
            <img src="{{$news->image}}" width = "100">
            <input type="file" class="form-control" id="image" name="image">
        </div><br>

        <div class="form-group">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror"
                   id="author" name="author" value = "{{old('author') ?? $news->author}}">
            @error('author') <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}
            </div>@enderror
        </div><br>


        {{--<div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>--}}
        <button type="submit" class="btn btn-primary">Update</button><br>
    </form>
@endsection

@push('js')
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ), {
                ckfinder: {
                    uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
                }
            })
            .catch( error => {
                console.error( error );
            });
    </script>
@endpush
