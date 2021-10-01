@extends('layout')
@section('content')

    <div class="container">
        <div class="row justify-content-center align-items-center mt-5">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <form method="post" action="{{route('register.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input class="form-control" name="image" type="file">
                    </div>
                    <div class="mb-4 input-material">
                        <label>Name</label>
                        <input class="form-control" name="name">
                    </div>
                    <div class="mb-4 input-material">
                        <label>Email</label>
                        <input class="form-control" name="email">
                    </div>
                    <div class="mb-4 input-material">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password">
                    </div>
                    <button class="btn btn-success form-control">Register</button>
                </form>
            </div>
        </div>
    </div>

@endsection
