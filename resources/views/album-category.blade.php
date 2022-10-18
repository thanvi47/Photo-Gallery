@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if($albums==null)
                <b>nothing found</b>
            @else
            @foreach($albums as $album)

            <div class="col-md-4">
                <div class="card">
             <div class="bg-white rounded shadow-sm">
                 <img src="/album/{{$album->image}}" width="100%" height="50%" alt="">
             </div>

                    <div class="card-body">
                        <b> {{$album->name}} </b>
                        <p>
                        {{$album->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
                @endif
        </div>
    </div>
@endsection

