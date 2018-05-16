@extends('layout.master')

@section('content')
    <section class="ftco-cover" style="background-image: url({{asset('images/bg_3.jpg')}});" id="section-home">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center ftco-vh-100">
          <div class="col-md-12">
            <h1 class="ftco-heading ftco-animate mb-3">Jūsų užsakymai</h1>
          </div>
        </div>
      </div>
    </section>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <table class="table mt-5" id="user-orders">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Dish</th>
                        <th scope="col">Description</th>
                        <th></th>
                        <th scope="col">Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($orders[0]['cart']->products['9']['dish']) --}}
                    @foreach($orders as $order)
                        @foreach($order['cart']->products as $product)
                            <tr>
                                <th scope="row">{{ $order->created_at }}</th>
                                <td>{{ $product['dish']['title'] }}</td>
                                <td>{{ $product['dish']['description'] }}</td>
                                <td><img src="{{ $product['dish']['image'] }}" alt="{{ $product['dish']['title'] }}" title="{{ $product['dish']['title'] }}" width="100"></td>
                                <td>{{ $product['dish']['price'] }} &euro;</td>
                            </tr>
                        @endforeach
                        {{-- <tr>
                        <td>{{ $order->cart->totalPrice }}</td>
                    </tr> --}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
