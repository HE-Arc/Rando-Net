@extends('layout.app')

@section('content')

    <img src="rando-net\storage\app\public\pictures\placeholder.jpg" alt="Hike map">

    <div class="jumbotron">
        <h1 class="display-4">{{$hike->name}}</h1>
        @for ($i = 0; $i < $hike->difficulty; $i++)
                <span class = "fa fa-star checked"></span>
        @endfor
        @for ($i = $hike->difficulty; $i < 5 ; $i++)
                <span class = "fa fa-star unchecked"></span>
        @endfor

        <p class="lead">{{$hike->description}}</p>
        <hr class="my-4">
        <p>{{$hike->coordinates}}</p>
        </p>
    </div>

@endsection
