@extends('layout.app')

@section('content')
    <div class="jumbotron">
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
                    <td>
                        @foreach ($hike->tags as $tag)
                            {{ $tag->name }}
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
