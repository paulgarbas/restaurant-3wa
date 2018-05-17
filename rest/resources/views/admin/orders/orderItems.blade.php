@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table mt-5" id="user-orders">
                    <thead>
                        <tr>
                            <th scope="col">Dish</th>
                            <th scope="col">Description</th>
                            <th></th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderItems as $item)
                            <tr>
                                <td>{{ $item->dish->title }}</td>
                                <td>{{ $item->dish->description }}</td>
                                <td><img src="{{ $item->dish->image }}" alt="{{ $item->dish->title }}" title="{{ $item->dish->title }}" width="100"></td>
                                <td>{{ $item->dish->price }} &euro;</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td><b>Dishes Quantity</b></td>
                            <td>{{ $totalQuantity }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><b>Subtotal Price</b></td>
                            <td>{{ $totalPrice }} &euro;</td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td><b>Tax</b></td>
                            <td>{{ round($totalPrice * 0.21, 2) }} &euro;</td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td><b>Total Price<b></td>
                            <td>{{ round($totalPrice + ($totalPrice * 0.21), 2) }} &euro;</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
