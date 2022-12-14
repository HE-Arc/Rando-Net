@extends('layout.app')

@section('content')



    <div class="jumbotron">
        <h1 class="display-4">{{$hike->name}}</h1>
        @for ($i = 0; $i < $hike->difficulty; $i++)
                <span class = "fa fa-star checked"></span>
        @endfor
        @for ($i = $hike->difficulty; $i < 5 ; $i++)
                <span class = "fa fa-star unchecked"></span>
        @endfor
        <div class="m-5 d-flex justify-content-between">
            <!--{{$hike->map}}-->
            <img id="hikeimg" src="/assets/images/placeholder.jpg" class="float-left" alt="hike img">
            <div class="float-right">
                <h5 class="display-4">Comments</h5>
                <hr class="my-4">
                <p class="lead">WORK IN PROGRESS</p>
            </div>
        </div>

        <p> DISPLAY LIST OF TAGS</p>
        <hr class="my-4">

        <p class="lead">{{$hike->description}}</p>
    </div>

@endsection
