@extends('layout.app')

@section('content')
    <h1>Create account</h1>

    <div class="d-flex justify-content-center">
        <img src="assets/images/iconeLogin.png" class="rounded mx-auto d-block" width="200" height="200" alt="image login">
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-8 mb-15" class="mb-15">
            <label for="exampleFormControlInput1" class="form-label">User name</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="My super pseudo">
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-8" class="mb-3" class="d-flex justify-content-center">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-8" class="mb-3" class="mt-3" class="d-flex justify-content-center">
            <label for="exampleFormControlInput1" class="form-label">Confirm password</label>
            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password again">
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
@endsection
