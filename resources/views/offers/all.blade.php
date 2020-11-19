@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if(Session::has('success'))
                    <div class="alert alert-success text-center" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="alert alert-success text-center" role="alert">
                        {{Session::get('error')}}
                    </div>
                @endif
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('messages.Offer Name')}}</th>
                        <th scope="col">{{__('messages.Offer Price')}}</th>
                        <th scope="col">{{__('messages.Offer Details')}}</th>
                        <th scope="col">{{__('messages.Offer Image')}}</th>
                        <th scope="col">{{__('messages.Operation')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($offers as $offer)
                    <tr>
                        <th scope="row">{{$offer->id}}</th>
                        <th >{{$offer->name}}</th>
                        <th >{{$offer->price}}</th>
                        <th >{{$offer->details}}</th>
                        <th ><img src="../../uploads/offers/{{$offer->photo}}" style="width: 100px; height: 100px; float: left; border-radius: 5%;margin-right: 25px;"/></th>
                        <th ><a class="btn btn-primary" href="{{url('offers/edit/'.$offer->id)}}" >{{__('messages.Edit')}}</a></th>
                        <th ><a class="btn btn-danger" href="{{route('offers.delete',$offer->id)}}" >{{__('messages.Delete')}}</a></th>

                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
