@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table mt-5" id="user-orders">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Total Price</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{ ++$nr }}</th>
                                <th scope="row">{{ $order->id }}</th>
                                <th scope="row">{{ $order->created_at }}</th>
                                <th scope="row">{{ $order->total_paid }} &euro;</th>
                                <th scope="row"><a class="btn btn-primary" href="{{ route('admin.orderItems', $order) }}">Show Order</a></th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
