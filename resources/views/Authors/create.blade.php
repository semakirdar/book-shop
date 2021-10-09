@extends('layout')
@section('content')

    <div class="container">
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <h3 class="mb-4">Author Create</h3>
                <div class="author-create">
                    <form method="post" action="{{ route('author.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label>Name</label>
                            <input class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <input class="form-control" name="description">
                        </div>
                        <button class="form-control btn btn-success">CREATE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

