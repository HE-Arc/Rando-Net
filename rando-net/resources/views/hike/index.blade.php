@extends("layout.app")

@section("content")
<h1>Hikes</h1>

<!-- ajouter une randonnée-->
<a href="{{route("hike.create")}}" class="btn btn-primary mb-2">Ajouter une randonnée</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Region</th>
            <th scope="col">Coordinates</th>
            <th scope="col">Difficulty</th>
            <th scope="col">Map</th>
            <th scope="col">Description</th>
        </tr>
    </thead>

    @foreach ($hikes as $hike)
                @if($hike->validated)
                    <tr>
                        <td>{{ $hike->name }}</td>
                        <td>{{ $hike->region }}</td>
                        <td>{{ $hike->coordinates }}</td>
                        <td>{{ $hike->difficulty}}</td>
                        <td>{{ $hike->map}}</td>
                        <td>{{ $hike->description}}</td>
                    </tr>
                @endif
            @endforeach
</table>
@endsection
