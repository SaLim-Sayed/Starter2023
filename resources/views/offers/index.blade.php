@extends('layouts.salim')

@section('content')
    <div class="container my-5  card">

        @include('includes.session')
        <h1 class="title text-center bg-info" style="font-family:monospace">{{ __('messages.All Offers') }}</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('messages.Offer Name') }}</th>
                    <th scope="col">{{ __('messages.Offer Price') }}</th>
                    <th scope="col">{{ __('messages.Offer details') }}</th>
                    <th scope="col">{{ __('messages.Offer photo') }} </th>

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
                        <td>
                       </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
