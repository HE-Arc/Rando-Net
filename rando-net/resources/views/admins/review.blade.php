@extends('layout.app')

@section('content')
    <form action="{{ route('hikes.update', $hike->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12 col-lg-6 offset-0 offset-lg-3">
                <div class="card">
                    <div class="card-header">
                        Hike correction
                    </div>
                    <div class="card-body">
                        <div class="form-row">

                            <div class="form-group col-12">
                                <label for="inputName">Name</label>
                                <input type="text" name="name" class="form-control" id="inputName"
                                    value="{{ $hike->name }}">
                            </div>

                            <div class="row mt-3">
                                <div class="form-group col-6">
                                    <label for="inputRegion">Region</label>
                                    <input type="text" name="region" class="form-control" id="inputRegion"
                                        value="{{ $hike->region }}">
                                </div>

                                <div class="form-group col-6">
                                    <label for="inputCoordinates">Coordinates</label>
                                    <input type="text" name="coordinates" class="form-control" id="inputCoordinates"
                                        value="{{ $hike->coordinates }}">
                                </div>

                                <div class="form-group col-6">
                                    <label for="inputDifficulty">Difficulty</label>
                                    <input type="number" name="difficulty" class="form-control" id="inputDifficulty"
                                        min="1" max="5" value="{{ $hike->difficulty }}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="inputSubmittedBy">Submitted By</label>
                                    <input type="text" name="difficulty" class="form-control" id="inputSubmittedBy"
                                        value="{{ $user->name }}" disabled>
                                </div>

                                <div class="form-group d-flex justify-content-center">
                                    <img src="/assets/images/{{ $hike->map }}" style="width:60%; height:auto;"
                                        alt="hike img">
                                </div>
                                <input name="map" class="form-control" id="inputMap" value="{{ $hike->map }}"
                                    type="hidden">

                                <div class="form-group col-6">
                                    <label for="inputTag">Tags</label>
                                    <select class="form-select" name="tags[]" multiple="multiple" id="inputTags">
                                        @foreach ($tags->all() as $tag)
                                            @if ($hike->tags->contains($tag))
                                                <option selected value="{{ $tag->id }}">
                                                    {{ $tag->name }}</option>
                                            @else
                                                <option value="{{ $tag->id }}">
                                                    {{ $tag->name }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label for="inputDescription">Description</label>
                                    <textarea name="description" class="form-control" id="inputDescription" style="overflow:auto;resize:none" cols="80"
                                        rows="5">{{ $hike->description }}</textarea>
                                </div>



                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger mt-3 col-12">
                                    <strong>Whoops!</strong> There is a problem with your entries.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- Both can submit the form but they'll each give a different value to know the action-->
                            <button type="submit" name="btnSubmit" class="btn btn-success m-2"
                                value="validate">Validate</button>
                            <button type="submit" name="btnSubmit" class="btn btn-danger m-2"
                                value="reject">Reject</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
