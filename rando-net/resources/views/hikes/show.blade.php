@extends('layout.app')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">{{ $hike->name }}</h1>
        @for ($i = 0; $i < $hike->difficulty; $i++)
            <span class="fa fa-star checked"></span>
        @endfor
        @for ($i = $hike->difficulty; $i < 5; $i++)
            <span class="fa fa-star unchecked"></span>
        @endfor
        <div class="m-5 d-flex justify-content-between">
            <img id="hikeimg" src="/assets/images/{{ $hike->map }}" class="float-left" alt="hike img">
            <div class="float-right">
                <h2 class="display-6">Comments</h2>
                <hr class="my-4">
                <p class="lead">WORK IN PROGRESS</p>
            </div>
        </div>

        <hr class="my-4">
        <div class="m-5">
            <h1 class="display-6">Tags</h1>
            <div class="d-flex justify-content-start">
                @foreach ($hike->tags as $tag)
                    <p class="lead">{{ $tag->name }}&emsp;</p>
                @endforeach
            </div>
        </div>

        <hr class="my-4">
        <div class="m-5">
            <h1 class="display-6">Description</h1>
            <p class="lead">{{ $hike->description }}</p>
        </div>
        <div class="d-flex justify-content-between">
            <div class="container">
                <p class="lead"><strong>Region : </strong>{{ $hike->region }}</p>
            </div>
            <div class="container">
                <p class="lead"><strong>Coordinates : </strong>{{ $hike->coordinates }}</p>
            </div>
        </div>
    </div>
@endsection
