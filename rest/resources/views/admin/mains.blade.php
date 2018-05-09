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
                <a href="{{ route('main.create') }}" type="button" class="btn btn-warning btn-block">Add Dish</a>
            </div>
        </div>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Main ID</th>
          <th scope="col">Title</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
            @for($i = 0; $i < count($mains); $i++)
                <tr>
                  <th scope="row">{{ $i + 1 }}</th>
                  <td>{{ $mains[$i]->id }}</td>
                  <td>{{ $mains[$i]->title }}</td>
                  <td><a href="{{ route('main.edit', $mains[$i]) }}" class="btn btn-primary">Edit</a></td>
                  <td>
                      <form action="{{ route('main.destroy', $mains[$i]) }}" method="POST">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                  </td>
                </tr>
            @endfor
      </tbody>
    </table>
@endsection
