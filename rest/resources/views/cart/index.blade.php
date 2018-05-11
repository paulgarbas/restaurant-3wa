@extends('layout.master')

@section('content')
    <section class="ftco-cover" style="background-image: url({{asset('images/bg_3.jpg')}});" id="section-home">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center ftco-vh-100">
          <div class="col-md-12">
            <h1 class="ftco-heading ftco-animate mb-3">Dishes Cart</h1>
            <h2 class="h5 ftco-subheading mb-5 ftco-animate">A free template for Restaurant Websites Distributed by <a href="https://themewagon.com/" target="_blank">ThemeWagon</a></h2>

          </div>
        </div>
      </div>
    </section>

    <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-md-offset-1">
            @if(isset($cart) && $cart->totalQty > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Dish</th>
                            <th>Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @dd($cart) --}}
                            @foreach($cart->products as $dish)
                                <tr>
                                    <td class="col-sm-10 col-md-8">
                                    <div class="media">
                                        <a class="thumbnail pull-left" href="#"> <img class="media-object mr-5" src="{{ $dish['dish']['image'] }}" style="width: 72px; height: 72px;"> </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#">{{ $dish['dish']['title'] }}</a></h4>
                                        </div>
                                    </div></td>
                                    <td class="col-sm-1 col-md-1" style="text-align: center">
                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{ $dish['qty'] }}">
                                    </td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong>{{ $dish['dish']['price'] }} &euro;</strong></td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong>{{ $dish['price'] }} &euro;</strong></td>
                                    <td class="col-sm-1 col-md-1">
                                        <form action="{{ route('add.cart') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $dish['dish']['id'] }}">
                                            <input type="hidden" name="from" value="from">
                                            <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i></button>
                                        </form>
                                    </td>
                                    <td class="col-sm-1 col-md-1">
                                        <form action="{{ route('deleteByOne') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $dish['dish']['id'] }}">
                                            <button type="submit" class="btn btn-warning"><i class="fas fa-minus"></i></button>
                                        </form>
                                    </td>
                                    <td class="col-sm-1 col-md-1">
                                        <form action="{{ route('cart.dish.delete') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $dish['dish']['id'] }}">
                                            <button type="submit" class="btn btn-danger">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h5>Dishes Quantity</h5></td>
                                <td class="text-right"><h5><strong>{{ $cart->totalQty }}</strong></h5></td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h5>Subtotal</h5></td>
                                <td class="text-right"><h5><strong>{{ $cart->totalPrice }} &euro;</strong></h5></td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h5>Tax</h5></td>
                                <td class="text-right"><h5><strong>{{ round($cart->totalPrice * 0.21, 2) }} &euro;</strong></h5></td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h3>Total</h3></td>
                                <td class="text-right"><h3><strong>{{ $cart->totalPrice + round($cart->totalPrice * 0.21, 2) }} &euro;</strong></h3></td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>
                                    <button type="button" class="btn btn-default">
                                        Continue Shopping
                                    </button></td>
                                <td>
                                <a href="{{ route('checkout') }}" type="button" class="btn btn-success">
                                    Checkout
                                </a></td>
                            </tr>
                    </tbody>
                </table>
            @else
                <h3 class="mt-5 mb-5">Produktų nėra</h3>
            @endif
        </div>
    </div>
</div>
@endsection
