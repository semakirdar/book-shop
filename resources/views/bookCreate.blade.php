@extends('layout')
@section('content')

    <div class="container">
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <h3 class="mb-4">Book Create</h3>
                <div class="book-create">
                    <form method="post" action="{{route('book.store')}}">
                        @csrf
                        <div class="mb-3">
                            <label>Category</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option id="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Publisher</label>
                            <select class="form-control" name="publisher_id">
                                @foreach($publishers as $publisher)
                                <option id="{{ $category->id }}">{{ $publisher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Name</label>
                            <input class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label>Page Count</label>
                            <input class="form-control" name="page_count">
                        </div>
                        <div class="mb-3">
                            <label>Publish Date</label>
                            <input class="form-control" name="publish_date">
                        </div>
                        <button class="form-control btn btn-success">CREATE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
