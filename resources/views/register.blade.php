@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="mb-lg-5 pb-5">
                    <div class="login-content">
                        <div class="login-form">
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                @error('terms')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="name"
                                        placeholder="Username" value="{{old('name')}}">
                                </div>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email"
                                        placeholder="Email" value="{{old('email')}}">
                                </div>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="au-input au-input--full" type="number" name="phone"
                                        placeholder="09xxxxxxxxx" value="{{old('phone')}}">
                                </div>
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="gender" id="" class="form-control" value="{{old('gender')}}">
                                        <option value="">Choose Gender...</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                @error('gender')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="au-input au-input--full" type="text" name="address"
                                        placeholder="Address" value="{{old('address')}}">
                                </div>
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password"
                                        placeholder="Password">
                                </div>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password_confirmation"
                                        placeholder="Confirm Password">
                                </div>
                                @error('password_confirmation')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>

                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="{{ route('admin#loginPage') }}">Sign In</a>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
