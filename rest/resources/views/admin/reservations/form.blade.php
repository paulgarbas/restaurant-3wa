@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-10">

                @if(isset($reservation))
                    <form action="{{ route('admin.reservation.update', $reservation) }}" method="POST">
                    @method('PUT')
                @else
                    <form action="{{ route('admin.reservation.store') }}" method="POST">
                @endif
                @csrf

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ isset($reservation) ? $reservation->name : old('name') }}">
                    </div>
                    @if ($errors->has('name'))
                        <div class="alert alert-danger mt-12 col-sm-12">
                            <b>{{$errors->first('name')}}</b>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Surname</label>
                        <input type="text" class="form-control" name="surname" placeholder="Surname" value="{{ isset($reservation) ? $reservation->surname : old('surname') }}">
                    </div>
                    @if ($errors->has('surname'))
                        <div class="alert alert-danger mt-12 col-sm-12">
                            <b>{{$errors->first('surname')}}</b>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" rows="3" value="{{ isset($reservation) ? $reservation->email : old('email') }}">
                    </div>
                    @if ($errors->has('email'))
                        <div class="alert alert-danger mt-12 col-sm-12">
                            <b>{{$errors->first('email')}}</b>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="exampleFormControlInput1">How many people</label>
                        <input type="text" class="form-control" name="numberOfPeople" placeholder="How many people" value="{{ isset($reservation) ? $reservation->numberOfPeople : old('numberOfPeople') }}">
                    </div>
                    @if ($errors->has('numberOfPeople'))
                        <div class="alert alert-danger mt-12 col-sm-12">
                            <b>{{$errors->first('numberOfPeople')}}</b>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Phone number</label>
                        <input type="text" class="form-control" name="phone" placeholder="Phone number" value="{{ isset($reservation) ? $reservation->phone : old('phone') }}">
                    </div>
                    @if ($errors->has('phone'))
                        <div class="alert alert-danger mt-12 col-sm-12">
                            <b>{{$errors->first('phone')}}</b>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Date</label>
                        <input type="text" class="form-control" name="date" placeholder="Date" value="{{ isset($reservation) ? $reservation->date : old('date') }}">
                    </div>
                    @if ($errors->has('date'))
                        <div class="alert alert-danger mt-12 col-sm-12">
                            <b>{{$errors->first('date')}}</b>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Time</label>
                        <input type="text" class="form-control" name="time" placeholder="Time" value="{{ isset($reservation) ? $reservation->time : old('time') }}">
                    </div>
                    @if ($errors->has('time'))
                        <div class="alert alert-danger mt-12 col-sm-12">
                            <b>{{$errors->first('time')}}</b>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Message</label>
                        <input type="text" class="form-control" name="message" placeholder="Message" value="{{ isset($reservation) ? $reservation->message : old('message') }}">
                    </div>
                    @if ($errors->has('message'))
                        <div class="alert alert-danger mt-12 col-sm-12">
                            <b>{{$errors->first('message')}}</b>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-success mb-5">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
