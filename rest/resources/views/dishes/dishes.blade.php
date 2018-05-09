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
                                <form action="{{ route('add.cart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $dish->id }}">
                                    <button type="submit" class="btn btn-primary">Add Dish</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h4>No dishes!</h4>
            @endif
        </div>
    </div>



@endsection
