@extends("layout.app")

@section("content")

<form action="{{route("hike.store")}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12 col-lg-6 offset-0 offset-lg-3">
            <div class="card">
                <div class="card-header">
                Nouvelle randonnée
                </div>
                <div class="card-body">
                    <div class="form-row">

                        <div class="form-group col-12">
                            <label for="inputName">Name</label>
                            <input type="text" name="name" class="form-control" id="inputName">
                        </div>

                        <div class="row mt-3">
                            <div class="form-group col-6">
                                <label for="inputRegion">Region</label>
                                <input type="text" name="region" class="form-control" id="inputRegion">
                            </div>

                            <div class="form-group col-6">
                                <label for="inputCoordinates">Coordinates</label>
                                <input type="text" name="coordinates" class="form-control" id="inputCoordinates">
                            </div>

                            <div class="form-group col-6">
                                <label for="inputDifficulty">Difficulty</label>
                                <input type="text" name="difficulty" class="form-control" id="inputDifficulty">
                            </div>

                            <div class="form-group col-6">
                                <label for="inputMap">Map</label> <!-- il faut faire que le user puisse ajouter une image-->
                                <input type="text" name="map" class="form-control" id="inputMap">
                            </div>

                            <div class="form-group col-6">
                                <label for="inputDescription">Description</label>
                                <input type="text" name="description" class="form-control" id="inputDescription">
                            </div>

                        </div>
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
                        <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
