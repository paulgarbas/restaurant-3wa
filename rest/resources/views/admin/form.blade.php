@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-10">

                @if(isset($dish))
                    <form action="{{ route('admin.dish.update', $dish) }}" method="POST">
                    @method('PUT')
                @else
                    <form action="{{ route('admin.dish.store') }}" method="POST">
                @endif
                @csrf

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Dish name</label>
                        <input type="text" class="form-control" name="title" placeholder="Dish description" value="{{ isset($dish) ? $dish->title : old('title') }}">
                    </div>
                    @if ($errors->has('title'))
                        <div class="alert alert-danger mt-12 col-sm-12">
                            <b>{{$errors->first('title')}}</b>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Dish price</label>
                        <input type="text" class="form-control" name="price" placeholder="Dish price" value="{{ isset($dish) ? $dish->price : old('price') }}">
                    </div>
                    @if ($errors->has('price'))
                        <div class="alert alert-danger mt-12 col-sm-12">
                            <b>{{$errors->first('price')}}</b>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Dish description</label>
                        <textarea class="form-control" name="description" rows="3">{{ isset($dish) ? $dish->description : old('description') }}</textarea>
                    </div>
                    @if ($errors->has('description'))
                        <div class="alert alert-danger mt-12 col-sm-12">
                            <b>{{$errors->first('description')}}</b>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Dish image</label>
                        <input type="text" class="form-control" name="image" placeholder="Dish image" value="{{ isset($dish) ? $dish->image : old('image') }}">
                    </div>
                    @if ($errors->has('image'))
                        <div class="alert alert-danger mt-12 col-sm-12">
                            <b>{{$errors->first('image')}}</b>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Dish category</label>
                        <select class="form-control" name="main_id">
                            @foreach($main as $mainCategory)

                                @if(isset($dish))

                                    @if ($dish->main_id == $mainCategory->id)
                                        <option selected value="{{ $mainCategory->id }}">{{ $mainCategory->title }}</option>
                                    @else
                                        <option value="{{ $mainCategory->id }}">{{ $mainCategory->title }}</option>
                                    @endif

                                @else

                                    @if (old('main_id') == $mainCategory->id)
                                        <option selected value="{{ $mainCategory->id }}">{{ $mainCategory->title }}</option>
                                    @else
                                        <option value="{{ $mainCategory->id }}">{{ $mainCategory->title }}</option>
                                    @endif

                                @endif

                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('main_id'))
                        <div class="alert alert-danger mt-4 col-sm-4">
                            <b>{{$errors->first('main_id')}}</b>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-success mb-5">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
