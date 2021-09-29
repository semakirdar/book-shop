@extends('layout')
@section('content')

    <div class="container">

        <div class="row justify-content-center align-items-center mt-5">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <div class="card p-3 shadow-lg">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <a href="{{ route('book.detail', ['bookId' => $book->id]) }}">
                                <img class="img-fluid" src="{{ asset('images/book.png') }}">
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-8">
                            <a href="{{ route('book.detail', ['bookId' => $book->id]) }}"
                               class="text-decoration-none text-dark">
                                <strong>{{ $book->name }}</strong>
                            </a>
                            <a class="text-white text-decoration-none"
                               href="{{ route('books', ['categoryId' => $book->category->id]) }}">
                                <p class="bg-primary text-center  p-1 rounded-1 mt-3">{{ $book->category->name }}
                                </p>
                            </a>
                            <p>{{$book->page_count}}</p>
                            <p>{{ $book->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
