@extends('layouts.app')

@section('content')
    <div class="container">
      <ol class="breadcrumb">
          <h3>Albums</h3>
          <span style="margin-left: 900px; "class="float-"><a href="{{url('albums/create')}}"><button class="btn btn-secondary"> Create New Album</button></a></span>
      </ol>
        <div class="row">
            <div class="col-md-12">
                <index-component></index-component>
            </div>
        </div>
    </div>
@endsection
