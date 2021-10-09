@extends('layout')

@section('content')

    <div class="container py-3">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div>
                    @foreach($orders as $order)
                        <div class="card card-order mt-4">
                            <div class="card-header d-flex justify-content-between">
                                <div>
                                    Order #{{ $order->id }} ({{ count($order->items) }} product)
                                </div>
                                <div>
                                    {{ $order->created_at }}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach($order->items as $item)
                                        <div class="col-sm-12 col-md-3">
                                            <img class="img-fluid" src="{{ !empty($item->book->getFirstMediaUrl()) ? $item->book->getFirstMediaUrl() : 'images/book.png' }}">
                                            <div class="mt-2">{{ $item->book->name }}</div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
