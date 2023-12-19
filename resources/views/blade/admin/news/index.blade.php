@extends('layouts.admin')
@section('title')
    @parent :: News list
@endsection
@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">News list</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.news.create')}}" class="btn btn-sm btn-outline-secondary">Add news</a>
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
        <select id="filter">
            <option>selected</option>
            <option>{{\App\Enums\News\Status::DRAFT->value}}</option>
            <option>{{\App\Enums\News\Status::ACTIVE->value}}</option>
            <option>{{\App\Enums\News\Status::BLOCKED->value}}</option>
        </select>
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Category ID</th>
                <th scope="col">Category name</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Status</th>
                <th scope="col">Created_at</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
{{--            {{dd($news)}}--}}
            @forelse($news as $item)

                <tr id="{{$item->id}}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->category_id}}</td>
                    <td>{{$item->category->name}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->author}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->created_at}}</td>
                    <td style="display: flex">
                        <a href="{{ route('admin.news.edit', $item) }}" style="margin-right: 5px;">
                            Edit</a>
                        {{--<form style="margin: 0 15px 5px;" method="POST" enctype="multipart/form-data"
                              action="{{route('admin.news.destroy', $item)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm" style="color: red; text-decoration: underline", type="submit">
                                Remove
                            </button>
                        </form>--}}

                        <a rel="{{$item->id}}" class="delete" href="javascript:" style="color: red">
                            Remove
                        </a>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No entries</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $news->links() }}
    </div>


    {{--Before DB--}}

    {{--<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">News list</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.news.create')}}" class="btn btn-sm btn-outline-secondary">Add news</a>
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
                <th scope="col">#ID</th>
                <th scope="col">Category ID</th>
                <th scope="col">Category name</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Status</th>
                <th scope="col">Created_at</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($news as $item)
                <tr>
                    <td>{{$item['id']}}</td>
                    <td>{{$item['category_id']}}</td>
                    <td>{{$item['category_name']}}</td>
                    <td>{{$item['title']}}</td>
                    <td>{{$item['author']}}</td>
                    <td>{{$item['status']}}</td>
                    <td>{{$item['created_at']}}</td>
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

@push('js')
    <script>
    document.addEventListener("DOMContentLoaded", function (){
        let filter = document.getElementById("filter");
        filter.addEventListener("change", function(event) {
            location.href = '?f=' + this.value;
        });
    });

    let elements = document.querySelectorAll(".delete");
    elements.forEach(function (element){
        element.addEventListener('click', function (){
            const id = this.getAttribute('rel');
            if(confirm(`Подтвердите удаление записи с #ID = ${id}`)){
                send(`/admin/news/${id}`).then( ()=> {
                    //location.reload;
                    console.log(id);
                    document.getElementById(id).remove();
                });
            } else {
                alert('Вы отменили удаление записи');
            }
        });
    });

    async function send(url){
        let response = await fetch(url, {
            method:'DELETE',
            headers:{
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });
        let result = await response.json();

        return result.ok;
    }
    </script>
@endpush
