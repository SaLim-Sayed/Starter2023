@extends('layout')

@section('content')
    <div class="container my-2 w-50  text-center">

        <h1 class="title text-center bg-info" style="font-family:monospace">Edit  offer| {{$offer->id}}</h1>
        <form method="POST" class="container card" action="{{ route('offer.update',$offer->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col">
                    <label>{{ __('messages.Offer Name en') }}</label>
                    <input type="text" name="name_en" class="form-control" value="{{ old('name_en')?? $offer->name_en }} ">
                    @error('name_en')
                        <small class="form-text text-danger  text-center">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>{{ __('messages.Offer Name ar') }}</label>
                    <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar')?? $offer->name_ar }} ">
                    @error('name_ar')
                        <small class="form-text text-danger  text-center">{{ $message }}</small>
                    @enderror
                </div>
            </div>
           <div class="row">
            <div class="form-group col">
                <label>{{ __('messages.Offer Price') }}</label>
                <input type="text" name="price" class="form-control" value="{{ old('price')?? $offer->price }} ">
                @error('price')
                    <small class="form-text text-danger  text-center">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group col">
                <label>{{__('messages.choose image')}}</label>
                <input type="file" name="photo" class="form-control"  >
                @error('photo')
                    <small class="form-text text-danger  text-center">{{ $message }}</small>
                @enderror
            </div>
           </div>
            <div class="form-group">
                <label>{{ __('messages.Offer details en') }}</label>
                <input type="text" name="details_en" class="form-control" value="{{ old('details_ar')?? $offer->details_ar }} ">
                @error('details_en')
                    <small class="form-text text-danger  text-center">{{ $message }}</small>
                @enderror

            </div>
            <div class="form-group">
                <label>{{ __('messages.Offer details ar') }}</label>
                <input type="text" name="details_ar" class="form-control" value="{{ old('details_ar')?? $offer->details_ar }} ">
                @error('details_ar')
                    <small class="form-text text-danger  text-center">{{ $message }}</small>
                @enderror
            </div>
           
            <button type="submit" class="btn btn-primary">{{ __('messages.Save Offer') }}</button>
        </form>
    </div>
@endsection
