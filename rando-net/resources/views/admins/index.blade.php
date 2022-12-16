@extends('layout.app')

@section('content')
    <div class="jumbotron">

        <h1>Hikes to be reviewed</h1>

        @if (sizeof($hikes) == 0)
            No hikes need to be reviewed, go take a walk outside
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Region</th>
                        <th scope="col">Coordinates</th>
                        <th scope="col">Difficulty</th>

                    </tr>
                </thead>

                @foreach ($hikes as $hike)
                    <tr id="hike" onclick="window.location='{{ route('admins.show', $hike->id) }}'">
                        <td>{{ $hike->name }}</td>
                        <td>{{ $hike->region }}</td>
                        <td>{{ $hike->coordinates }}</td>
                        <td>{{ $hike->difficulty }}</td>

                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection
