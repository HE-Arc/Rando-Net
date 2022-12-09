@extends('layout.app')

@section('content')

    <form action="{{ route('hikes.store') }}" method="POST">
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
                                <input type="text" name="name" class="form-control" id="inputName"
                                    value="{{ old('name') }}">
                            </div>

                            <script>
                                // Check name
                                function addDefault(tag, event) {
                                    console.log(event.keyCode);

                                    if (event.keyCode != 8) //everything other than backspace correct the input
                                    {
                                        //don't want more than 15 chars
                                        if (tag.value.length >= 15) {
                                            event.preventDefault();
                                            return false;
                                        }

                                        //number between 48 and 57
                                        if (event.keyCode < 48 || event.keyCode > 57) {
                                            console.log("NOT NUMBER");
                                            event.preventDefault();
                                            return false;
                                        }

                                        //add for the place holder
                                        if (tag.value.length == 3 || tag.value.length == 11)
                                            tag.value += '\'';
                                        if (tag.value.length == 7)
                                            tag.value += '/';
                                    }


                                }
                            </script>

                            <div class="row mt-3">
                                <div class="form-group col-6">
                                    <label for="inputRegion">Region</label>
                                    <input type="text" name="region" class="form-control" id="inputRegion"
                                        value="{{ old('region') }}">
                                </div>

                                <div class="form-group col-6">
                                    <label for="inputCoordinates">Coordinates</label>
                                    <input type="text" name="coordinates" class="form-control" id="inputCoordinates"
                                        value="{{ old('coordinates') }}" onkeydown="addDefault(this, event);"
                                        pattern="\d{3}'\d{3}\/\d{3}'\d{3}" placeholder="999'999/999'999" max=15>
                                </div>

                                <div class="form-group col-6">
                                    <label for="inputDifficulty">Difficulty</label>
                                    <input type="text" name="difficulty" class="form-control" id="inputDifficulty"
                                        value="{{ old('difficulty') }}">
                                </div>

                                <div class="form-group col-6">
                                    <label for="inputMap">Map</label>
                                    <!-- il faut faire que le user puisse ajouter une image-->
                                    <input type="text" name="map" class="form-control" id="inputMap"
                                        value="{{ old('map') }}">
                                </div>

                                <div class="form-group col-6">
                                    <label for="inputDescription">Description</label>
                                    <input type="text" name="description" class="form-control" id="inputDescription"
                                        value="{{ old('description') }}">
                                </div>

                                <div class="form-group col-6">
                                    <label for="inputDescription">Tags</label>
                                    <select class="form-select" name="tags" aria-label="Default select example"
                                        id="inputTags">
                                        <option selected>Tag</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option> <!--  value="{{ old('tags') }}" !-->
                                    </select>
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
    </form>

    <script>
        function addDefault(tag, event) {
            console.log(event.keyCode);

            if (event.keyCode != 8) //everything other than backspace correct the input
            {
                //don't want more than 15 chars
                if (tag.value.length >= 15) {
                    event.preventDefault();
                    return false;
                }

                //number between 48 and 57
                if (event.keyCode < 48 || event.keyCode > 57) {
                    console.log("NOT NUMBER");
                    event.preventDefault();
                    return false;
                }

                //add for the place holder
                if (tag.value.length == 3 || tag.value.length == 11)
                    tag.value += '\'';
                if (tag.value.length == 7)
                    tag.value += '/';
            }


        }
    </script>
@endsection
