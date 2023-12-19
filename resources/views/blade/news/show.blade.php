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
                <p>{{ $item['full_text'] }}</p>
                <p>{{ $item['created_at'] }}</p>
                <p>{{ $item['status'] }}</p>
            @endforeach
        </div>
    </div>
@endsection
