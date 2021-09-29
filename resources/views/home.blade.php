@extends('layout')
@section('content')

    <div class="container">
            <a href="{{route('book.create')}}" class="btn btn-primary mt-3">Create Book</a>
        <div class="row mt-5">
            @foreach($books as $book)

                    <div class="col-sm-12 col-md-12 col-lg-3 mb-4">
                        <div class="card p-3 shadow-lg" style="height: 200px">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-5">
                                    <img class="img-fluid" src="{{ asset('images/book.png') }}">
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <strong>{{ $book->name }}</strong>
                                    <p class="bg-primary text-center  p-1 rounded-1 mt-3">
                                        <a class="text-white text-decoration-none" href="#">{{ $book->category->name }}</a>
                                    </p>
                                    <p>{{$book->page_count}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>

@endsection
