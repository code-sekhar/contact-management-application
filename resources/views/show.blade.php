@extends('layout.layout')
@section('title','Edit Page')
@section('content')
    <div class="main_container_section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-5 m-auto">
                    <div class="full_main_box profile-card card p-4 bg-light">
                            <div class="card p-4">

                                    <h4 class="name mt-3">{{$user->name}}</h4>
                                    <span class="idd"><i class="fa-regular fa-envelope"></i> {{$user->email}}</span>
                                    <span class="idd"><i class="fa-solid fa-mobile-screen"></i> {{$user->phone}}</span>
                                    <div class="text mt-3">
                                        <span>
                                            <i class="fa-solid fa-location-dot"></i>
                                            {{$user->address}}
                                        </span>
                                    </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
