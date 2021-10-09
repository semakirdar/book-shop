@extends('layout')
@section('content')

    @if(count($books)>0)
        @foreach($books as $book)
            <div class="row justify-content-center align-items-center mt-4 border-bottom" style="text-align: center">
                <div class="col-sm-12 col-md-12 col-lg-2 mb-4">
                    @if(!empty($book->getFirstMediaUrl()))
                        <img style="width: 100px; height: 100px;" class="img-fluid" src="{{$book->getFirstMediaUrl()}}">
                    @else
                        <img style="width: 100px; height: 100px;" class="img-fluid"
                             src="{{ asset('images/book.png') }}">
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
        <div class="order-btn float-end my-3 mx-5">
            @auth()
                <form method="post" action="{{route('order.store')}}">
                    @csrf
                    <button class="btn btn-success">
                        Create Order
                    </button>
                </form>
            @endauth
        </div>
    @else
        <h2 class="text-danger text-center mt-5">Not Found</h2>
    @endif


@endsection
