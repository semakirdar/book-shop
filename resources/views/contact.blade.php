@extends('layout')
@section('content')

    <div class="container">
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-sm-12 col-md-12 col-lg-5">
                <img src="{{ asset('images/contact.jpeg') }}">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <h3 class="mb-4">Contact</h3>
                <div class="author-create">
                    <form method="post" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label>Name</label>
                            <input class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label>Message</label>
                            <input class="form-control" name="message">
                        </div>
                        <button class="form-control btn btn-success">SEND</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

