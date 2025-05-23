@extends('user.layouts.master')

@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="row">
            <div class="col-4 offset-6 mb-2">
                @if (session('updateSuccess'))
                        <div class="">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa-solid fa-check"></i>  {{session('updateSuccess')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                {{-- <div class="row">
                    <div class="col-3 offset-8">
                        <a href="{{ route('category#list') }}"><button class="btn bg-dark text-white my-3">List</button></a>
                    </div>
                </div> --}}
                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Account Info</h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-3 offset-2">
                                    @if (Auth::user()->image == null)
                                        <img src="{{ asset('image/default_user.png') }}" class="img-thumbnail shadow-sm">
                                    @else
                                        <img src="{{ asset('storage/'.Auth::user()->image) }}" class="img-thumbnail shadow-sm"/>
                                    @endif
                                </div>
                                <div class="col-5 offset-1">
                                    <h4 class="my-3"><i class="zmdi zmdi-account"></i> {{Auth::user()->name}}</h4>
                                    <h4 class="my-3"><i class="zmdi zmdi-male-female"></i> {{Auth::user()->gender}}</h4>
                                    <h4 class="my-3"><i class="zmdi zmdi-email"></i> {{Auth::user()->email}}</h4>
                                    <h4 class="my-3"><i class="zmdi zmdi-phone"></i> {{Auth::user()->phone}}</h4>
                                    <h4 class="my-3"><i class="zmdi zmdi-navigation"></i> {{Auth::user()->address}}</h4>
                                    <h4 class="my-3"><i class="zmdi zmdi-time"></i> {{Auth::user()->created_at->format('j F Y')}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 offset-2 mt-3">
                                    <a href="{{ route('user#accountChangePage') }}">
                                        <button class="btn bg-dark text-white">
                                        <i class="fa-solid fa-pen-to-square me-2"></i> Edit Profile
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
