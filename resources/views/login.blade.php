@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <!-- Logo desktop -->
                            <a href="#" class="logo">
                                <h1 class="text-dark"><b class="font-bold">COOL</b> BERRY</h1>
                            </a>
                        </div>
                        <div class="login-form">

                            @error('terms')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                @error('terms')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email"
                                        placeholder="Email">
                                </div>
                                @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password"
                                        placeholder="Password">
                                </div>
                                @error('password')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror

                                <button class="au-btn au-btn--block au-btn--blue m-b-20" type="submit">sign in</button>

                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="{{ route('admin#registerPage') }}">Sign Up Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
