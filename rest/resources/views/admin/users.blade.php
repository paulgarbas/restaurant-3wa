@extends('layouts.master')

@section('content')

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Surname</th>
          <th scope="col">Email</th>
          <th scope="col">Password</th>
          <th scope="col">Birthday</th>
          <th scope="col">Phone</th>
          <th scope="col">Address</th>
          <th scope="col">City</th>
          <th scope="col">Zip Code</th>
          <th scope="col">Country</th>
        </tr>
      </thead>
      <tbody>
            @for($i = 0; $i < count($users); $i++)
                <tr>
                  <th scope="row">{{ $i + 1 }}</th>
                  <td>{{ $users[$i]->id }}</td>
                  <td>{{ $users[$i]->name }}</td>
                  <td>{{ $users[$i]->surname }}</td>
                  <td>{{ $users[$i]->email }}</td>
                  <td>{{ $users[$i]->password }}</td>
                  <td>{{ $users[$i]->birthday }}</td>
                  <td>{{ $users[$i]->phone }}</td>
                  <td>{{ $users[$i]->address }}</td>
                  <td>{{ $users[$i]->city }}</td>
                  <td>{{ $users[$i]->zip }}</td>
                  <td>{{ $users[$i]->country }}</td>
                </tr>
            @endfor
      </tbody>
    </table>
@endsection
