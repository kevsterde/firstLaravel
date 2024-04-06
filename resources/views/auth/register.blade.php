@extends('layout.layout')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6">
                <form class="form mt-5" action="{{ route('register') }}" method="post">
                    @csrf

                    <h3 class="text-center ">Register</h3>
                    <div class="form-group">
                        <label for="name" class="">Name:</label><br>
                        <input type="text" name="name" id="name" class="form-control">
                        @error('name')
                            <span class="fs-6 text-danger ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="">Email:</label><br>
                        <input type="email" name="email" id="email" class="form-control">
                        @error('email')
                            <span class="fs-6 text-danger ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="password" class="">Password:</label><br>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                            <span class="fs-6 text-danger ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="password_confirmation" class="">Confirm Password:</label><br>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        @error('password_confirmation')
                            <span class="fs-6 text-danger ">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="remember-me" class=""></label><br>
                        <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
                    </div>
                    <div class="text-right mt-2">
                        <a href="/login" class="">Login here</a>
                    </div>
                </form>
            </div>
        </div>
    @endsection
