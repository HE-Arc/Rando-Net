@extends('layout.app')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Region</th>
                <th scope="col">Difficulty</th>
                <th scope="col">Tag</th>


            </tr>
        </thead>

        @foreach ($hikes as $hike)
            <tr id="hike" onclick="window.location='{{ route('hikes.show', ['hike' => $hike]) }}'">
                <td>{{ $hike->name }}</td>
                <td>{{ $hike->region }}</td>
                <td>{{ $hike->difficulty }}</td>
                <td>{{ $tag }}</td>

            </tr>
        @endforeach
    </table>
@endsection
