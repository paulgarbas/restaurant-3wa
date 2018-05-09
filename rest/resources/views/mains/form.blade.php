@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-10">

                @if(isset($main))
                    <form action="{{ route('main.update', $main) }}" method="POST">
                    @method('PUT')
                @else
                    <form action="{{ route('main.store') }}" method="POST">
                @endif
                @csrf

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Main title</label>
                        <input type="text" class="form-control" name="title" placeholder="Dish description" value="{{ isset($main) ? $main->title : old('title') }}">
                    </div>
                    @if ($errors->has('title'))
                        <div class="alert alert-danger mt-12 col-sm-12">
                            <b>{{$errors->first('title')}}</b>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-success mb-5">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
