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
        <table class="table table-success table-striped table-hover table-bordered text-center">
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
                    <tr class="offerRow{{$offer -> id}}">
                        <th scope="row">{{ $offer->id }}</th>
                        <td>{{ $offer->name }}</td>
                        <td>{{ $offer->price }}</td>
                        <td>{{ $offer->details }}</td>
                        <td><img src="{{ asset('images/offers/' . $offer->photo) }} " style="  border-radius: 10% ;"
                                width="50" alt=""></td>
                        <td><a href="" offer-id="{{$offer->id}}" class="delete-btn btn btn-danger">delete Ajax</a></td>
                        <td><a href="{{ route('ajaxoffers.edit', $offer->id) }}"  class=" btn btn-danger">Edit Ajax</a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            var id = $(this).attr('offer-id');
            $.ajax({
                type: "get",
                url: "{{ route('ajaxoffers.delete') }}",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id':id
                },
                success: function(data) {
                    if (data.status == true)
                        // alert(data.message);
                        $('#success_msg').show()
                        $('.offerRow'+data.id).remove();
                },
                error: function(reject) {
                    if (reject.status == false)
                        alert(reject.message);
                }
            });
        })
    </script>
@endsection
