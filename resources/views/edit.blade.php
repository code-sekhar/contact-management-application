@extends('layout.layout')
@section('title','Edit Page')
@section('content')
    <div class="main_container_section mt-5">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6 col-xl-5 m-auto">
                    <div class="full_main_box card p-4 bg-light">
                        <form action="{{route('user.update',$user->id)}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="mb-3 mt-3 form-floating">
                                <input type="text" class="form-control" id="name" value="{{old('name', $user->name)}}" placeholder="Enter Name" name="name" required>
                                <label for="name">Name</label>
                                @if($errors->has('name'))
                                    <span  class="text-danger" style="font-size: 12px;">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="mb-3 mt-3 form-floating">
                                <input type="email" class="form-control" id="email" value="{{old('email',$user->email)}}" placeholder="Enter email" name="email" required>
                                <label for="email">Email</label>
                                @if($errors->has('email'))
                                    <span  class="text-danger" style="font-size: 12px;">
                                        {{$errors->first('email')}}
                                    </span>
                                @endif
                            </div>
                            <div class="mb-3 mt-3 form-floating">
                                <input type="text" class="form-control" id="phone" value="{{old('phone',$user->phone)}}" placeholder="Enter Phone" name="phone" required>
                                <label for="phone">Phone</label>
                                @if($errors->has('phone'))
                                    <span  class="text-danger" style="font-size: 12px;">{{$errors->first('phone')}}</span>
                                @endif
                            </div>
                            <div class="mb-3 form-floating">
                                <input type="text" class="form-control" id="address" value="{{old('address',$user->address)}}" placeholder="Enter Address" name="address" required>
                                <label for="address" >Address</label>
                                @if($errors->has('address'))
                                    <span class="text-danger" style="font-size: 12px;">{{$errors->first('address')}}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
