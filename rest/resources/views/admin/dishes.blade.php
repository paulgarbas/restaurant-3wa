@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            @if(session('message'))
                <div class="alert alert-success text-center mt-5">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('admin.dish.create') }}" type="button" class="btn btn-warning btn-block">Add Dish</a>
            </div>
        </div>
    </div>

    <table class="table mt-5">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Dish ID</th>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Image</th>
          <th scope="col">Image URL</th>
          <th scope="col">Price</th>
          <th scope="col">Main Category</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
            @for($i = 0; $i < count($dishes); $i++)
                <tr>
                  <th scope="row">{{ $i + 1 }}</th>
                  <td>{{ $dishes[$i]->id }}</td>
                  <td>{{ $dishes[$i]->title }}</td>
                  <td width="400">{{ $dishes[$i]->description }}</td>
                  <td><img class="card-img-top" src="{{ $dishes[$i]->image }}" alt="{{ $dishes[$i]->title }}" title="{{ $dishes[$i]->title }}" width="100"></td>
                  <td>{{ $dishes[$i]->image }}</td>
                  <td>{{ $dishes[$i]->price }} &euro;</td>
                  <td>{{ $dishes[$i]->menu->title }}</td>
                  <td><a href="{{ route('admin.dish.edit', $dishes[$i]) }}" class="btn btn-primary">Edit</a></td>
                  <td>
                      <form action="{{ route('admin.dish.delete', $dishes[$i]) }}" method="POST">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                  </td>
                </tr>
            @endfor
      </tbody>
    </table>

    <div>
        {{ $dishes->links() }}
    </div>
@endsection
