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
                                <a href="{{ route('book.detail', ['bookId' => $book->id]) }}">
                                    @if(!empty($book->getFirstMediaUrl()))
                                        <img class="img-fluid" src="{{$book->getFirstMediaUrl()}}">
                                    @else
                                        <img class="img-fluid" src="{{ asset('images/book.png') }}">
                                    @endif
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <a href="{{ route('book.detail', ['bookId' => $book->id]) }}"
                                   class="text-decoration-none text-dark">
                                    <strong>{{ $book->name }}</strong>
                                </a>
                                <a class="text-white text-decoration-none"
                                   href="{{ route('books', ['categoryId' => $book->category->id]) }}">
                                    <p class="bg-primary text-center  p-1 rounded-1 mt-3">{{ $book->category->name }}
                                    </p>
                                </a>
                                <p><strong>Page Count:</strong> {{ $book->page_count }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $books->links() }}
    </div>
@endsection
