@extends('layout')
@section('content')

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <strong>Favorite Book</strong>
                    </div>
                    <div class="card-body">
                        @foreach($favorites as $favorite)
                            <div class="card p-4 mb-4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-3">
                                        <a href="{{ route('book.detail', ['bookId' => $favorite->book->id]) }}">
                                            @if(!empty($favorite->book->getFirstMediaUrl()))
                                                <img class="img-fluid" src="{{$favorite->book->getFirstMediaUrl()}}">
                                            @else
                                                <img class="img-fluid" src="{{ asset('images/book.png') }}">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <a class="text-decoration-none" href="{{ route('book.detail', ['bookId' => $favorite->book->id]) }}">
                                            <strong>{{ $favorite->book->name }}</strong>
                                        </a>
                                        <a class="text-white text-decoration-none"
                                           href="{{ route('books', ['categoryId' => $favorite->book->category->id]) }}">
                                            <p class="bg-primary text-center  p-1 rounded-1 mt-3">
                                                {{ $favorite->book->category->name }}
                                            </p>
                                        </a>
                                        <p>{{$favorite->book->page_count}}</p>
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
