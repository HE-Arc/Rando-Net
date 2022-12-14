@extends('layout.app')

@section('content')

    <form action="{{ route('hikes.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-8 offset-0 offset-lg-2">
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
                                    <input type="number" name="difficulty" class="form-control" id="inputDifficulty"
                                        min='1' max='5' value="{{ old('difficulty') }}">
                                </div>

                                <div class="form-group col-6">
                                    <label for="inputMap">Map</label>
                                    <input type="file" name="image" class="form-control" id="inputMap"
                                        class="align-center" onchange="new_image_validation()">
                                    <p>Size limit : 1'000 ko</p>
                                </div>

                                <div class="form-group col-6">
                                    <label for="inputTag">Tags</label>
                                    <select class="form-select" name="tags[]" multiple="multiple" id="inputTags">
                                        @foreach ($tags->all() as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <label for="inputDescription">Description</label>
                                <textarea style="overflow:auto;resize:none" name="description" class="form-control" id="inputDescription" cols="80"
                                    rows="5">{{ old('description') }}</textarea>
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
                            <button type="submit" class="btn btn-success mt-3">Envoyer</button>
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
                    console.log("Not a number");
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


        /**
         * The next two methods are here to prevent 413 error on file upload.
         * Nginx server modifications does not affect the 1M limitation.
         * Solution was to given by Cyrille Pollier
         */
        function upload_check(file) {
            var max_size = 1024 * 1000;
            return file.files[0].size > max_size;
        }

        function new_image_validation() {
            var file = document.getElementById("inputMap");
            if (upload_check(file)) {
                alert("Image must be smaller than 1'000 Ko! \n Selected image size is " + file.files[0].size +
                    " o.");
                file.value = "";
            }
        }
    </script>
@endsection
