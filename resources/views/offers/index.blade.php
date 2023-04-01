@extends('layouts.salim')

@section('content')
    <div class="container my-5  card " style="background-color: rgb(250, 255, 254)">

        @include('includes.session')
        <div class="card container mb-2 p-3">
            <div class="row ">
                <a href="{{ route('offers.create') }} " class="mx-5 col btn btn-info"> Create </a>

                <a href="{{ route('offers.truncate') }} " class="mx-5 col btn btn-danger"> Delete All </a>
            </div>
        </div>
        <h1 class="title text-center bg-dark text-light" style="font-family:monospace">{{ __('messages.All Offers') }}</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('messages.Offer Name') }}</th>
                    <th scope="col">{{ __('messages.Offer Price') }}</th>
                    <th scope="col">{{ __('messages.Offer details') }}</th>
                    <th scope="col">{{ __('messages.Offer photo') }} </th>
                    <th class="text-center" scope="col" colspan="2">{{ __('messages.Opreation') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($offers as $offer)
                    <tr>
                        <th scope="row">{{ $offer->id }}</th>
                        <td>{{ $offer->name }}</td>
                        <td>{{ $offer->price }}</td>
                        <td>{{ $offer->details }}</td>
                        <td><img src="{{ asset('images/offers/' . $offer->photo) }} " style="border-radius: 50%"
                                width="50" alt=""></td>
                        <td><a href="{{ route('offers.edit', $offer->id) }} "
                                class="btn btn-primary">{{ __('messages.Offer opreation') }}</a></td>
                        <td><a href="{{ route('offers.delete', $offer->id) }} " class="btn btn-danger">delete</a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
