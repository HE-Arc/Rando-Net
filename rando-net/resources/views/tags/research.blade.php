@extends('layout.app')

@section('content')
    <form action="{{ route('tags.display') }}" enctype="multipart/form-data" method="GET">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-6 offset-0 offset-lg-3">
                <div class="card">
                    <div class="card-header">
                        Search a hike from a Tag
                    </div>
                    <div class="card-body">
                        <div class="form-row">

                            <div class="form-group col-6">
                                <label for="inputTag">Tags</label>
                                <select class="form-select" name="tag" aria-label="Default select example"
                                    id="inputTags">
                                    @foreach ($tags->all() as $tag)
                                        <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Search</button>


                            @if ($errors->any())
                                <div class="alert alert-danger mt-3 col-12">
                                    <strong>Whoops!</strong> Il y a un problème avec vos entrées.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    </form>
@endsection
