@extends('layouts.salim')

@section('content')
    <div class="container my-2 w-50  text-center">

        <h1 class="title text-center bg-info" style="font-family:monospace">Edit  offer| {{$offer->id}}</h1>
        <form method="POST" class="container card" action="" id="offerFormUpdate" enctype="multipart/form-data">
            @csrf
            <input type="text" name="offer_id" class="form-control" value="{{ $offer->id }} " style="display: none">

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

            <button type="" id="save" class="btn btn-primary">{{ __('messages.Save Offer') }}</button>
        </form>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).on('click', '#save', function(e) {
            e.preventDefault();
            var formData = new FormData($('#offerFormUpdate')[0]);
            $.ajax({
                type: "post",
                url: "{{ route('ajaxoffers.update') }}",
                enctype: "multipart/form-data",
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                /*  {
                    '_token': "{{ csrf_token() }}",
                    // 'photo': ,
                    'name_ar': $("input[name='name_ar']").val(),
                    'name_en':$("input[name='name_en']").val() ,
                    'details_ar': $("input[name='details_ar']").val(),
                    'details_en':$("input[name='details_en']").val() ,
                    'price': $("input[name='price']").val(),
                }, */
                success: function(data) {
                    if (data.status == true)
                        // alert(data.message);
                        $('#success_msg').show()
                },
                error: function(reject) {
                    if (reject.status == false)
                        alert(reject.message);
                }
            });
        })
    </script>
@endsection

