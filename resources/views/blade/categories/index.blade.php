@extends('layouts.main')
@section('title')
    @parent :: Categories list
@endsection
@section('content')

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">News categories</h1>

            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">


                @foreach($categories as $item)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{$item->image}}">
                            <div class="card-body">
                                <h3 style = "text-transform: uppercase; margin:12px 0px"><?=$item->name?></h3>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="<?=route('news.category.show', ['slug' => $item->slug])?>"
                                           class="btn btn-sm btn-outline-secondary">News
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

{{--                Before DB--}}

                {{--@foreach($categories as $item)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{$item['image']}}">
                            <div class="card-body">
                                <h3 style = "text-transform: uppercase; margin:12px 0px"><?=$item['name']?></h3>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="<?=route('news.category.show', ['slug' => $item['slug']])?>"
                                           class="btn btn-sm btn-outline-secondary">News
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach--}}

            </div>
        </div>
    </div>


@endsection

