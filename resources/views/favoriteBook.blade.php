@extends('layout')
@section('content')

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-6">

                <h4 class="mt-5"><strong>Total Favorite:</strong> {{ $totalFavorite }}</h4>
                <div class="card mt-5">
                    <div class="card-header">
                        <strong>Favorite Book</strong>
                    </div>
                    @if(count($favorites)>0)
                        <div class="card-body">
                            @foreach($favorites as $favorite)
                                <div class="card favorite-card-book p-4 mb-4">
                                    <div class="delete-favorite">
                                        <form method="post"
                                              action="{{ route('favorite.book.delete', ['bookId' => $favorite->book->id]) }}">
                                            @csrf
                                            <button class="btn btn-none">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-3">
                                            <a href="{{ route('book.detail', ['bookId' => $favorite->book->id]) }}">
                                                @if(!empty($favorite->book->getFirstMediaUrl()))
                                                    <img class="img-fluid"
                                                         src="{{$favorite->book->getFirstMediaUrl()}}">
                                                @else
                                                    <img class="img-fluid" src="{{ asset('images/book.png') }}">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6">
                                            <a class="text-decoration-none"
                                               href="{{ route('book.detail', ['bookId' => $favorite->book->id]) }}">
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
                    @else
                        <h4 class="text-danger p-3">Not Found !</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
