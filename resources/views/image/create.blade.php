@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <ExampleComponent></ExampleComponent>
                    <div class="card-body">
<upload-component  :album_id="{{$album_id}}"></upload-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
