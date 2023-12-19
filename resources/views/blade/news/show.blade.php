
@extends('layouts.main')
@section('title')
    @parent :: News One
@endsection
@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            @foreach($news as $item)
                <img src="{{ $item['image']}}">
                <h2>{{ $item['title'] }}</h2>
                <p>Author: {{ $item['author'] }}</p>
                <p>{{ $item['text'] }}</p>
                <a
                    href="<?=route('news.category.show', ['slug' => $item['category_name']])?>"
                    style = "display: block; text-transform: uppercase; text-decoration: none;
                                    margin-top:4px; font-weight: bold">
                        <?=$item['category_name']?>
                </a><br>
                <p>{{ $item['created_at'] }}</p>
                <p>{{ $item['status'] }}</p>
            @endforeach
        </div>
    </div>
@endsection
