@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('messages.Add Your Offer') }}</div>

                    <div class="card-body">
                       @if(Session::has('success'))
                            <div class="alert alert-success text-center" role="alert">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <form method="post" action="{{ route('offers.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <div>
                                <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('messages.Offer Name in arabic') }}</label>

                                <div class="col-md-6">
                                    <input name="photo" type="file"  class="form-control" >
                                    @error('photo')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name_ar" class="col-md-4 col-form-label text-md-right">{{ __('messages.Offer Name in arabic') }}</label>

                                <div class="col-md-6">
                                    <input id="name_ar" type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{ old('name') }}"  autocomplete="name" autofocus>
                                    @error('name_ar')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name_en" class="col-md-4 col-form-label text-md-right">{{ __('messages.Offer Name in English') }}</label>

                                <div class="col-md-6">
                                    <input id="name_en" type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{ old('name') }}"  autocomplete="name" autofocus>
                                    @error('name_en')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('messages.Offer Price') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price"  autocomplete="current-password">
                                    @error('price')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="details_ar" class="col-md-4 col-form-label text-md-right">{{ __('messages.Offer Details in arabic') }}</label>

                                <div class="col-md-6">
                                    <textarea name="details_ar" class="text-body">
                                    </textarea>
                                    @error('details_ar')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="details_en" class="col-md-4 col-form-label text-md-right">{{ __('messages.Offer Details in English') }}</label>

                                <div class="col-md-6">
                                    <textarea name="details_en" class="text-body">
                                    </textarea>
                                    @error('details_en')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('messages.Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
