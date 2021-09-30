@extends('layout')
@section('content')

    <div class="container">

        <div class="row justify-content-center align-items-center mt-5 mb-4">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <div class="card p-3 shadow-lg">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <img class="img-fluid" src="{{ asset('images/book.png') }}">
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-8 border-bottom">
                            <p><strong>{{ $book->name }}</strong></p>
                            <p><strong>Description:</strong> {{$book->description }}</p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12 col-md-12 col-lg-4 ">
                            <div>
                                <div class="mb-3">
                                    <a href="#" class="text-decoration-none">
                                        <i class="fas fa-share-alt text-muted me-2"></i>
                                        Paylaş
                                    </a>
                                </div>
                                <div class="mb-3">
                                    <a href="#comment" class="text-decoration-none ">
                                        <i class="fas fa-comment text-muted me-2"></i>
                                        Yorumlar
                                    </a>
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('books', ['categoryId' => $book->category->id]) }}"
                                       class="text-decoration-none">
                                        <i class="fas fa-sort text-muted me-2"></i>
                                        Kategorideki Kiğer Kitaplar
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-8 border-bottom" style="font-size: 13px;">
                            <div>
                                <p class=" mt-3"><strong>Category:</strong> {{ $book->category->name }}</p>
                                <p><strong>Page:</strong> {{ $book->page_count}}</p>
                                <p><strong>Publisher Name:</strong> {{$book->publisher->name}}</p>
                                <p><strong>Publisher Description:</strong> {{$book->publisher->description}}</p>
                                <p><strong>Publisher Description:</strong> {{$book->publisher->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="comments" id="comment">
            <div class="row justify-content-center align-items-center mt-5 ">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header">
                            Comment add
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('comment.store')}}">
                                @csrf
                                <textarea rows="5" name="body" class="form-control "></textarea>
                                <input type="hidden" name="book_id" value="{{$book->id}}">
                                <select class="select-star mt-4" name="rating">
                                    <option>Rating</option>
                                    @for($i = 1;  $i < 6; $i++)
                                        <option value="{{ $i }}">
                                            @for($j = 1; $j <= $i; $j++)
                                                *
                                            @endfor
                                        </option>
                                    @endfor
                                </select>
                                <button class="btn btn-none">
                                    <i class="fas fa-location-arrow fs-4"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                @foreach($comments as $comment)
                    <div class="row justify-content-center align-items-center mt-1 mb-1">
                        <div class="col-sm-12 col-md-12 col-lg-8">
                            <div class="card p-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong>{{ $comment->user->name}}</strong>

                                        </div>
                                        <div>
                                            <h1>***</h1>
                                        </div>

                                    </div>
                                    <p class="mt-2">{{ $comment->body }}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
