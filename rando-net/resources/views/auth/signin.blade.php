@extends('layout.app')

@section('content')
    <h1>Create account</h1>

    <div class="d-flex justify-content-center">
        <img src="assets/images/iconeLogin.png" class="rounded mx-auto d-block" width="200" height="200" alt="image login">
    </div>

<form action="{{route("validate_signin")}}" method="POST">
    @csrf
    <div class="d-flex justify-content-center">
        <div class="col-8 mb-15" class="mb-15">
            <label for="exampleFormControlInput1" class="form-label">User name</label>
            <input  type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="My super pseudo" value="{{old('name')}}">
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-8" class="mb-3" class="d-flex justify-content-center">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-8" class="mb-3" class="mt-3" class="d-flex justify-content-center">
            <label for="exampleFormControlInput1" class="form-label">Confirm password</label>
            <input type="password" name="confirmPassword" class="form-control" id="exampleFormControlInput1" placeholder="Password again">
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Sign in</button>
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
</form>
@endsection
