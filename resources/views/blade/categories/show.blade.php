@extends('layouts.main')
@section('title')
    @parent :: News list by category
@endsection
@section('content')

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">{{$news[0]->category->name}} news</h1>

            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

{{--@dd($news)--}}
                @forelse($news as $item)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{$item->image}}">
                            <div class="card-body">
                                <p><strong>{{$item->title}}</strong></p>
                                <p class="card-text">{{$item->description}}</p>
                                <div style = "margin-bottom:16px; font-weight: bold"> Category
                                    <a
                                        href="<?=route('news.category.show', ['slug' => $item->category->name])?>"
                                        style = "display: block; text-transform: uppercase; text-decoration: none;
                                    margin-top:4px; font-weight: bold">
                                            <?=$item->category->name?>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="<?=route('news.show', [$item->id, $item->title])?>"
                                           class="btn btn-sm btn-outline-secondary">Show
                                        </a>
                                    </div>
                                    <small class="text-muted">{{$item->author}} ({{$item->created_at}})</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2>No news</h2>
                @endforelse


{{--                Before DB--}}

               {{-- @forelse($categories as $item)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{$item['image']}}">
                            <div class="card-body">
                                <p><strong>{{$item['title']}}</strong></p>
                                <p class="card-text">{{$item['description']}}</p>
                                <div style = "margin-bottom:16px; font-weight: bold"> Category
                                    <a
                                        href="<?=route('news.category.show', ['slug' => $item['category_name']])?>"
                                        style = "display: block; text-transform: uppercase; text-decoration: none;
                                    margin-top:4px; font-weight: bold">
                                            <?=$item['category_name']?>
                                    </a>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="<?=route('news.show', ['id' => $item['id'], $item['title']])?>"
                                           class="btn btn-sm btn-outline-secondary">Show
                                        </a>
                                    </div>
                                    <small class="text-muted">{{$item['author']}} ({{$item['created_at']}})</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2>No news</h2>
                @endforelse--}}
            </div>
        </div>
    </div>
    </div>

@endsection
