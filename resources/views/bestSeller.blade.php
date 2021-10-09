@extends('layout')
@section('content')

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <strong>Best Sellers</strong>
                    </div>
                    <div class="card-body">
                        <div class="card best-seller-card-book p-4 mb-4">
                            <table class="table">
                                <tr>
                                    <th>Book Name</th>
                                    <th>Order Count</th>
                                </tr>
                                @foreach($bestSellers as $bestSeller)
                                    <tr>
                                        <td>

                                                {{ $bestSeller->book->name}}

                                        </td>
                                        <td>

                                                {{ $bestSeller->count }}

                                        </td>
                                    </tr>
                            @endforeach
                        </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
