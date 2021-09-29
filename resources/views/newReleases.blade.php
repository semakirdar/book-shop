@extends('layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <strong>New Releases</strong>
                    </div>
                    <div class="card-body">
                        @foreach($books as $book)
                            <div class="card p-4 mb-4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-3">
                                        <img style="width: 150px; height: 150px;" class="img-fluid"
                                             src="{{ asset('images/book.png') }}">
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <strong>{{ $book->name }}</strong>

                                        <a class="text-white text-decoration-none" href="{{ route('books', ['categoryId' => $book->category->id]) }}">
                                            <p class="bg-primary text-center  p-1 rounded-1 mt-3">
                                                {{ $book->category->name }}
                                            </p>
                                        </a>
                                        <p>{{$book->page_count}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
