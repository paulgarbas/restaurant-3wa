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
                        <th scope="col">Total Price</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->created_at }}</th>
                            <th scope="row">{{ $order->total_paid }} &euro;</th>
                            <th scope="row"><a class="btn btn-primary" href="{{ route('user.profile.orderItems', $order) }}">Show Order</a></th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
