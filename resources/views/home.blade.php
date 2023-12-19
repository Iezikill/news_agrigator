@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        Welcome to News Aggregator
                        <div class="col-sm-12 col-md-10 py-4">
                            <h4 class="text-white">About</h4>
                            <p class="text-muted">"News Aggregator" project as part of the "Laravel. Deep Dive" course
                                from GeekBrains.<br><br>
                                Designed by Web-development student Malyshytskiy Maxim.</p>
                        </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
