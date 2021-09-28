@extends('layout')
@section('content')

    <div class="container">
        <div class="row justify-content-center align-items-center mt-5">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <form method="post" action="{{route('login.store')}}">
                    @csrf
                    <div class="mb-4 input-material">
                        <label>Email</label>
                        <input class="form-control" name="email">
                    </div>
                    <div class="mb-4 input-material">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password">
                    </div>
                    <button class="btn btn-success form-control">Login</button>
                </form>
            </div>
        </div>
    </div>


@endsection
