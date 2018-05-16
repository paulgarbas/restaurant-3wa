@extends('layout.master')

@section('content')

    <section class="ftco-cover" style="background-image: url({{asset('images/bg_3.jpg')}});" id="section-home">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center ftco-vh-100">
          <div class="col-md-12">
            <h1 class="ftco-heading ftco-animate mb-3">Dish Edit</h1>

          </div>
        </div>
      </div>
    </section>

    <div class="col-sm-4 my-4">
        <div class="card">
            <img class="card-img-top" src="{{ $dish->image }}" alt="{{ $dish->title }}" title="{{ $dish->title }}">
            <div class="card-body">
                <h4 class="card-title">{{ $dish->title }}</h4>
                <p class="card-text">{{ str_limit($dish->description, 100) }}</p>
                <p class="card-text">{{ $dish->price }} &euro;</p>
            </div>
        </div>
    </div>

@endsection
