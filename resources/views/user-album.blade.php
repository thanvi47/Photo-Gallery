@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <h1 class="display-4">Share Your Photo</h1>
            <b class="lead">Share Your Photos with Peple</b>
        </div>
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
