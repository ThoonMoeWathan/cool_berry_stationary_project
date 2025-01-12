@extends('admin.layouts.master')

@section('content')
    <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3 offset-8">
                                <a href="{{ route('product#list') }}"><button class="btn bg-dark text-white my-3">List</button></a>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Create New Product</h3>
                                    </div>
                                    <hr>
                                    <form action="{{ route('product#create') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label mb-1">Name</label>
                                            <input id="cc-pament" name="productName" type="text" value="{{old('productName')}}" class="form-control @error('productName') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Product Name...">
                                            @error('productName')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Category</label>
                                            <select name="category" id="" class="form-control @error('category') is-invalid @enderror">
                                                <option value="">Choose Your Category</option>
                                                @foreach ($categories as $c)
                                                    <option value="{{ $c->id }}"> {{ $c->name }} </option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Description</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" cols="30" rows="10" placeholder="Enter Description..."> {{old('description')}} </textarea>
                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Image</label>
                                            <input type="file" name="productImage" class="form-control @error('productImage') is-invalid @enderror">
                                            @error('productImage')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Waiting Time</label>
                                            <input id="cc-pament" name="waitingTime" type="number" value="{{old('waitingTime')}}" class="form-control @error('waitingTime') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="How many weeks......">
                                            @error('waitingTime')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Price</label>
                                            <input id="cc-pament" name="price" type="number" value="{{old('price')}}" class="form-control @error('price') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Product Price......">
                                            @error('price')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <span id="payment-button-amount">Create</span>
                                                {{-- <span id="payment-button-sending" style="display:none;">Sending…</span> --}}
                                                <i class="fa-solid fa-circle-right"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
@endsection
