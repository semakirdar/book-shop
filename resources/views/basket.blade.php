@extends('layout')
@section('content')

    @foreach($books as $book)
        <div class="row justify-content-center align-items-center mt-4" style="text-align: center">
            <div class="col-sm-12 col-md-12 col-lg-2 mb-4">
                @if(!empty($book->getFirstMediaUrl()))
                    <img style="width: 100px; height: 100px;" class="img-fluid" src="{{$book->getFirstMediaUrl()}}">
                @else
                    <img style="width: 100px; height: 100px;" class="img-fluid" src="{{ asset('images/book.png') }}">
                @endif
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <p>{{ $book->name }}</p>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <p>{{ $book->page_count }}</p>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-1">
                <form action="{{ route('basket.delete', ['id' => $book->id ]) }}" method="POST">
                    @csrf
                    @method('POST')
                    <button class="btn">
                        <i class="fas fa-times text-danger"></i>
                    </button>
                </form>
            </div>
        </div>
    @endforeach
@endsection
