
@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="bg-white w mt-4 rounded">
            <form action="register" method="post">

                @csrf
                <div class="form-group m-4">
                    <label class="sr-only" for="name">Your name</label>
                    <input type="text" name="name" class=" @error('name') border border-danger  @enderror form-control p-3"
                           id="name" aria-describedby="emailHelp" placeholder="Your name" value="{{old('name')}}">
                    @error('name')
                    <div class="text-danger p-1">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group m-4">
                    <label class="sr-only" for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control p-3  @error('email') border border-danger  @enderror"
                           id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}">
                    @error('email')
                    <div class="text-danger p-1">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group m-4">
                    <label class="sr-only" for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control p-3  @error('password') border border-danger  @enderror"
                           id="exampleInputPassword1" placeholder="Password" value="">
                    @error('password')
                    <div class="text-danger p-1">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group m-4">
                    <label class="sr-only" for="confirm">Password again</label>
                    <input type="password" name="password_confir" class="form-control p-3  "
                           id="confirm" placeholder="Repeat password">

                </div>
                <div class="m-4">
                    <button type="submit" class="btn btn-primary w-100 ">Submit</button>
                </div>

            </form>
        </div>
    </div>
@endsection


