@extends('layout')
@section('content')


    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <h5>Authors</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                            </tr>
                            @foreach($authors as $author)
                                <tr>
                                    <td>{{ $author->id }}</td>
                                    <td>{{ $author->name }}</td>
                                    <td>{{ $author->description }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
