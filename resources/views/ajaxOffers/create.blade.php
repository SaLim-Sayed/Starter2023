@extends('layouts.salim')

@section('content')
    <div class="container card my-2 w-50  text-center">
<div class="alert alert-success" id="success_msg"  style="display: none">
    تم الحفظ  بنجاح
</div>
        <h1 class="title text-center">{{ __('messages.Addd your Offer') }}</h1>
        <hr>
        <form method="POST" class="container " action="" id="offerForm" enctype="multipart/form-data">
            @csrf
            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <div class="row mb-3 pb-3">
                <div class="form-group col">
                    <label>{{ __('messages.Offer Name en') }}</label>
                    <input type="text" name="name_en" class="form-control" value="{{ old('name_en') }} ">
                    @error('name_en')
                        <small class="form-text text-danger  text-center">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>{{ __('messages.Offer Name ar') }}</label>
                    <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar') }} ">
                    @error('name_ar')
                        <small class="form-text text-danger  text-center">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-2">
                <div class="form-group col">
                    <label>{{ __('messages.Offer Price') }}</label>
                    <input type="number" name="price" class="form-control">
                    @error('price')
                        <small class="form-text text-danger  text-center">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>{{ __('messages.choose image') }}</label>
                    <input type="file" name="photo" class="form-control">
                    @error('photo')
                        <small class="form-text text-danger  text-center">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="card p-4">
                <div class="form-group">
                    <label>{{ __('messages.Offer details en') }}</label>
                    <input type="text" name="details_en" class="form-control" value="{{ old('details_en') }} ">
                    @error('details_en')
                        <small class="form-text text-danger  text-center">{{ $message }}</small>
                    @enderror

                </div>
                <div class="form-group">
                    <label>{{ __('messages.Offer details ar') }}</label>
                    <input type="text" name="details_ar" class="form-control" value="{{ old('details_ar') }} ">
                    @error('details_ar')
                        <small class="form-text text-danger  text-center">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <button id="save" class="btn btn-primary m-2">{{ __('messages.Save Offer') }}</button>
        </form>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).on('click', '#save', function(e) {
            e.preventDefault();
            var formData = new FormData($('#offerForm')[0]);
            $.ajax({
                type: "post",
                url: "{{ route('ajaxoffers.store') }}",
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
