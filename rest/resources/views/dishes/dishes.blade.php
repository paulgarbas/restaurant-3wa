@extends('layout.master')

@section('content')
    <section class="ftco-cover" style="background-image: url({{asset('images/bg_3.jpg')}});" id="section-home">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center ftco-vh-100">
          <div class="col-md-12">
            <h1 class="ftco-heading ftco-animate mb-3">Dishes</h1>
            <h2 class="h5 ftco-subheading mb-5 ftco-animate">A free template for Restaurant Websites Distributed by <a href="https://themewagon.com/" target="_blank">ThemeWagon</a></h2>

          </div>
        </div>
      </div>
    </section>

    <div class="container">
        <div class="row">
            @if (count($dishes) > 0)
                @foreach ($dishes as $dish)
                    <div class="col-sm-4 my-4">
                        <div class="card">
                            <img class="card-img-top" src="{{ $dish->image }}" alt="{{ $dish->title }}" title="{{ $dish->title }}">
                            <div class="card-body">
                                <h4 class="card-title">{{ $dish->title }}</h4>
                                <p class="card-text">{{ str_limit($dish->description, 100) }}</p>
                                <p class="card-text">{{ $dish->price }} &euro;</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('single.dish', $dish) }}" class="btn btn-primary">Find Out More!</a>
                                {{-- <a href="#"  data-id="{{$dish->id}}" class="cart btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</a> --}}
                                <a href="{{ route('addTo.cart', $dish->id) }}" class="cart btn btn-success btn-product">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h4>No dishes!</h4>
            @endif
        </div>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
    </script>

     <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('.cart').click(function () {
                let dish_id = $(this).data('id');
                let url = "/cart";
                console.log(dish_id);

                $.ajax({
                    type:'Post',
                    url: url,
                    data:{id:dish_id},
                    dataType:'json',
                    success: function (data) {
                        console.log(data);
                        $('#totalQty').html(data.totalQty);
                    },
                    error: function (data){
                        console.log('Error:', data);
                    }
                });
            });
        });
    </script>


@endsection
