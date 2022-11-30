@extends("layout.app")

@section("content")
<!-- hikes.control -->
<form action="{{route("hikes.update", $hike->id)}}" method="POST">
    @csrf
    @method("PUT")

    <div class="row">
        <div class="col-12 col-lg-6 offset-0 offset-lg-3">
            <div class="card">
                <div class="card-header">
                Corriger la randonnée
                </div>
                <div class="card-body">
                    <div class="form-row">

                        <div class="form-group col-12">
                            <label for="inputName">Name</label>
                            <input type="text" name="name" class="form-control" id="inputName" value="{{$hike->name}}">
                        </div>

                        <div class="row mt-3">
                            <div class="form-group col-6">
                                <label for="inputRegion">Region</label>
                                <input type="text" name="region" class="form-control" id="inputRegion"  value="{{$hike->region}}">
                            </div>

                            <div class="form-group col-6">
                                <label for="inputCoordinates">Coordinates</label>
                                <input type="text" name="coordinates" class="form-control" id="inputCoordinates"  value="{{$hike->coordinates}}">
                            </div>

                            <div class="form-group col-6">
                                <label for="inputDifficulty">Difficulty</label>
                                <input type="text" name="difficulty" class="form-control" id="inputDifficulty"  value="{{$hike->difficulty}}">
                            </div>

                            <div class="form-group col-6">
                                <label for="inputMap">Map</label> <!-- il faut faire que le user puisse ajouter une image-->
                                <input type="text" name="map" class="form-control" id="inputMap"  value="{{$hike->map}}">
                            </div>

                            <div class="form-group col-6">
                                <label for="inputDescription">Description</label>
                                <input type="text" name="description" class="form-control" id="inputDescription"  value="{{$hike->description}}">
                            </div>

                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3 col-12">
                                <strong>Whoops!</strong> Their is a problem with your entries.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <button type="submit" name="btnSubmit" class="btn btn-primary mt-3" value="validate">Validate</button>
                       <button type="submit" name="btnSubmit" class="btn btn-primary mt-3" value="reject">Reject</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
