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
                <a href="{{ route('admin.reservation.create') }}" type="button" class="btn btn-warning btn-block">Add Reservation</a>
            </div>
        </div>
    </div>

    <table class="table mt-5">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Reservation ID</th>
          <th scope="col">Name</th>
          <th scope="col">Surname</th>
          <th scope="col">Message</th>
          <th scope="col">Number of People</th>
          <th scope="col">Date</th>
          <th scope="col">Time</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
            @for($i = 0; $i < count($reservations); $i++)
                <tr>
                  <th scope="row">{{ $i + 1 }}</th>
                  <td>{{ $reservations[$i]->id }}</td>
                  <td>{{ $reservations[$i]->name }}</td>
                  <td>{{ $reservations[$i]->surname }}</td>
                  <td>{{ $reservations[$i]->message }}</td>
                  <td>{{ $reservations[$i]->numberOfPeople }}</td>
                  <td>{{ $reservations[$i]->date }}</td>
                  <td>{{ $reservations[$i]->time }}</td>
                  <td>{{ $reservations[$i]->email }}</td>
                  <td>{{ $reservations[$i]->phone }}</td>
                  <td><a href="{{ route('admin.reservation.edit', $reservations[$i]) }}" class="btn btn-primary">Edit</a></td>
                  <td>
                      <form action="{{ route('admin.reservation.delete', $reservations[$i]) }}" method="POST">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                  </td>
                </tr>
            @endfor
      </tbody>
    </table>

    {{-- <div>
        {{ $reservations->links() }}
    </div> --}}
@endsection
