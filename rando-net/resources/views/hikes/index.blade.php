@extends('layout.app')

@section('content')
    <div class="jumbotron">

        <h1>Hikes</h1>

        <!-- ajouter une randonnée-->
        <a href="{{ route('hikes.create') }}" class="btn btn-primary mb-2">Add a Hike</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Region</th>
                    <th scope="col">Difficulty</th>

                </tr>
            </thead>

            @foreach ($hikes as $hike)
                <tr id="hike" onclick="window.location='{{ route('hikes.show', ['hike' => $hike]) }}'">
                    <td>{{ $hike->name }}</td>
                    <td>{{ $hike->region }}</td>
                    <td>{{ $hike->difficulty }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
