@extends('layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="card mt-5">
                    <div class="card-header">
                        <strong>{{$parentCategory->name}}</strong>
                    </div>
                    <div class="card-body">
                        @if(count($categories)>0)
                            @foreach($categories as $category)
                                <a href="{{ route('books', ['categoryId' => $category->id]) }}"
                                   class="text-decoration-none text-white">
                                    <p class="bg-primary text-center  p-1 rounded-1 mt-3">  {{$category->name }} ( {{ $category->books_count }} ) </p>
                                </a>
                            @endforeach
                        @else
                            <h5 class="text-danger">Not Found !</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
