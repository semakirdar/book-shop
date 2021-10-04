@extends('layout')
@section('content')

    <div class="container">

        <div class="row justify-content-center align-items-center mt-5 mb-4">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <div class="card book-card p-3 shadow-lg">
                    <div class="fav-icon">
                        <form method="post" action="{{route('book.favorite', ['id' => $book->id ])}}">
                            @csrf
                            <button class="btn btn-none">
                                @if($book->is_favorited)
                                    <i class="fas fa-heart text-danger"></i>
                                @else
                                    <i class="far fa-heart text-danger"></i>
                                @endif
                            </button>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            @if(!empty($book->getFirstMediaUrl()))
                                <img class="img-fluid" src="{{$book->getFirstMediaUrl()}}">
                            @else
                                <img class="img-fluid" src="{{ asset('images/book.png') }}">
                            @endif
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

                            <div class="basket-button mt-5">
                                <form method="post" action="{{ route('basket.store', ['bookId' => $book->id]) }}">
                                    @csrf
                                    <button class="btn btn-success">
                                        SEPETE EKLE
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-8 border-bottom" style="font-size: 13px;">
                            <div>
                                <p class=" mt-3"><strong>Category:</strong> {{ $book->category->name }}</p>
                                <p><strong>Page:</strong> {{ $book->page_count}}</p>
                                <p><strong>Publisher Name:</strong> {{$book->publisher->name}}</p>
                                <p><strong>Publisher Description:</strong> {{$book->publisher->description}}</p>
                                <p><strong>Publisher Description:</strong> {{$book->publisher->description}}</p>
                                <p>This Book is on the favorite list of<strong> {{ $favoriteCount }}</strong> more
                                    people.</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-4 mt-3" style="font-size: 13px;">
                            <div>

                                @if(count($authors) > 0)
                                    <p><strong>Author:</strong></p>
                                    @foreach($authors as $item)
                                        <p>{{ $item->author->name }}</p>
                                    @endforeach
                                @else
                                    <p><strong>Author:</strong> {{ ' - '}}</p>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="comments" id="comment">
            <div class="row justify-content-center align-items-center mt-5 ">
                @auth()
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <div class="card mb-4">
                            <div class="card-header">
                                Comment add
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{route('comment.store')}}" style="padding-right: 86px;">
                                    @csrf
                                    <textarea rows="5" name="body" class="form-control "></textarea>
                                    <input type="hidden" name="book_id" value="{{$book->id}}">
                                    <select class="select-star mt-4" name="rating">
                                        <option value="">Rating</option>
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

                @endauth
                @foreach($comments as $comment)
                    <div class="row justify-content-center align-items-center mt-1 mb-1 mb-5">
                        <div class="col-sm-12 col-md-12 col-lg-8">
                            <div class="card p-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            @if($comment->user->getFirstMediaUrl())
                                                <img class="rounded-circle" style="height: 30px; height: 30px;"
                                                     src="{{ $comment->user->getFirstMediaUrl()}}">
                                            @else
                                                <img class="rounded-circle" style="height: 30px; height: 30px;"
                                                     src="{{ asset('/images/default-img.png') }}">
                                            @endif
                                            <strong>{{ $comment->user->name}}</strong>
                                        </div>
                                        <div class="fs-5">
                                            @for($j =1; $j <= $comment->rating; $j++)
                                                <i class="fas fa-star star-icon"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center p-4">
                                        <div>
                                            <p class="mt-2">{{ $comment->body }}</p>
                                        </div>
                                        <div>
                                            <p class="position-absolute bottom-0 end-0 text-muted me-3">{{ $comment->created_at }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
