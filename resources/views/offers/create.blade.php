@extends('layouts.salim')

@section('content')
    <div class="container my-2 w-50  text-center">

        <h1 class="title text-center">{{ __('messages.Addd your Offer') }}</h1>
        <form method="POST" class="container card" action="{{ route('offers.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Offer Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="">

            </div>
            @error('name')
                <small class="  form-control alert   alert-danger  text-center ">{{ $message }}</small>
            @enderror
            <div class="mb-3">
                <label for="photo" class="form-label">Offer image</label>
                <input type="text" name="photo" class="form-control" id="photo">
            </div>
            <div class="mb-3">
                <label for="details" class="form-label">Offer details</label>
                <input type="text" name="details" class="form-control" id="details">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Offer price</label>
                <input type="number" name="price" class="form-control" id="price">
            </div>

            <button type="submit" class="btn btn-primary">{{ __('messages.Save Offer') }}</button>
        </form>
    </div>
@endsection
