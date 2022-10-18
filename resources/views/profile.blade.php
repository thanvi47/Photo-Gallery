@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">


                        <ul class="nav nav-tabs" role="tablist">

                            <li class="nav-item ">
                                <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Following</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#profilepic" role="tab" data-toggle="tab">Profile picture</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#bgpic" role="tab" data-toggle="tab">Background
                                    picture</a>
                            </li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane active" id="buzz">
{{--                                {{dd($followings)}}--}}


                                @foreach($followings as $follow)
                                    <p> {{$follow->userfollow->name}}
                                        <a href=""> <img src="{{Storage::url($follow->userfollow->profilePic)}}"
                                                         width="20"></a>
                                    </p>
                                    <p>  @if(auth()->user()->id!=$userId)

                                            <follow user-id="{{$userId}}" follows="{{$follows}}"></follow>
                                        @endif</p>
                                @endforeach

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="profilepic">

                                <avatar-component userid="{{auth()->user()->id }}"></avatar-component>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="bgpic">
                                          <bg-component userId="{{auth()->user()->id}}"></bg-component>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    {{--        <ul class="nav nav-tabs">--}}
    {{--            <li class="nav-item">--}}
    {{--                <a class="nav-link active" aria-current="page" href="#">Active</a>--}}
    {{--            </li>--}}
    {{--            <li class="nav-item">--}}
    {{--                <a class="nav-link active" href="#">Link</a>--}}
    {{--            </li>--}}
    {{--            <li class="nav-item">--}}
    {{--                <a class="nav-link" href="#">Link</a>--}}
    {{--            </li>--}}
    {{--            <li class="nav-item">--}}
    {{--                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>--}}
    {{--            </li>--}}
    {{--        </ul>--}}
@endsection
