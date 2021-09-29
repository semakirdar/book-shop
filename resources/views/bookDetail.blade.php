@extends('layout')
@section('content')

    <div class="container">

        <div class="row justify-content-center align-items-center mt-5">
            <div class="col-sm-12 col-md-12 col-lg-8">
                <div class="card p-3 shadow-lg">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <img class="img-fluid" src="{{ asset('images/book.png') }}">
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-8 border-bottom">
                            <p><strong>{{ $book->name }}</strong></p>
                            <p><strong>Page:</strong> {{ $book->page_count}}</p>
                            <p><strong>Description:</strong> {{$book->description }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4 ">
                            <div>
                                <div class="mb-3">
                                    <a href="#" class="text-decoration-none">
                                        <i class="fas fa-share-alt text-muted me-2"></i>
                                        Paylaş
                                    </a>
                                </div>
                                <div class="mb-3">
                                    <a href="#" class="text-decoration-none ">
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
                                <p><strong>Publisher Name:</strong> {{$book->publisher->name}}</p>
                                <p><strong>Publisher Description:</strong> {{$book->publisher->description}}</p>
                                <p><strong>Publisher Description:</strong> {{$book->publisher->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
