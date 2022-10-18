@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron jumbotron-fluid">

            @if($userBgPic)
            <img src="{{Storage::url($userBgPic)}}" alt="" width="100%">
{{--            <b class="lead">Share Your Photos with Peple</b>--}}
            @else
                <img src="{{url('https://images.unsplash.com/photo-1665281004415-ab3dc9648269?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHx0b3BpYy1mZWVkfDYyfHhqUFI0aGxrQkdBfHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=60')}}" alt="" width="100%" height="50%">
            @endif
        </div>
        @if(Auth::check() && auth()->user()->id!=$userId)
            <follow-component user-id="{{$userId}}" follows-="{{$follows}}"></follow-component>
        @endif
        <div class="row">
            @foreach($albums as $album)
                <div class="col-lg-3">

                    <div class="card">
                        <img src="{{asset('album')}}/{{$album->image}}" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{$album->name}}
                            </h5>
                            <center>

                                <a href="{{url('albums',[$album->slug,$album->id])}}" class="btn btn-outline-secondary">View Album</a>
                            </center>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
@endsection
