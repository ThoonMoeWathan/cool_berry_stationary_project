@extends('admin.layouts.master')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                {{-- <div class="row">
                    <div class="col-3 offset-8 bg-danger">
                        <a href="{{ route('category#list') }}"><button class="btn bg-dark text-white my-3">List</button></a>
                    </div>
                </div> --}}
                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            {{-- <div class="ms-5">
                                <a href="{{ route('product#list') }}">
                                    <i class="fa-solid fa-arrow-left text-dark"></i>
                                </a>
                            </div> --}}
                            <div class="ms-5">
                                <i class="fa-solid fa-arrow-left text-dark" onclick="history.back()"></i>
                            </div>
                            <div class="card-title">
                                <h3 class="text-center title-2">Update Product</h3>
                            </div>
                            <hr>
                            <form action="{{ route('product#update') }}"method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                <div class="col-4 offset-1">
                                    <input type="hidden" name="productId" value="{{$pizza->id}}">
                                        <img src="{{ asset('storage/'.$pizza->image) }}"
                                            class="img-thumbnail shadow-sm">
                                    <div class="mt-3">
                                        <input type="file" class="form-control @error('productImage') is-invalid @enderror" name="productImage" >
                                        @error('productImage')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn bg-dark text-white col-12" type="submit">
                                            <i class="fa-solid fa-check me-1"></i> Save
                                        </button>
                                    </div>
                                </div>
                                <div class="row col-6">

                                    <div class="form-group">
                                    <label class="control-label mb-1">Name</label>
                                    <input id="cc-pament" name="productName" type="text"
                                        class="form-control @error('productName') is-invalid @enderror"
                                        aria-required="true" aria-invalid="false" value="{{ old('productName',$pizza->name) }}" placeholder="Enter Product Name...">
                                    @error('productName')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>

                                    <div class="form-group">
                                    <label class="control-label mb-1">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="" cols="30" rows="10" placeholder="Enter Product Description...">{{ old('description',$pizza->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>

                                    <div class="form-group">
                                    <label class="control-label mb-1">Category</label>
                                    <select name="category" id="" class="form-control @error('category') is-invalid @enderror">
                                        <option value="">Choose Category...</option>
                                        @foreach ($category as $c)
                                            <option value="{{ $c->id }}" @if ($pizza->category_id == $c->id) selected @endif>{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>

                                    <div class="form-group">
                                    <label class="control-label mb-1">Price</label>
                                    <input id="cc-pament" name="price" type="number"
                                        class="form-control @error('price') is-invalid @enderror"
                                        aria-required="true" aria-invalid="false" value="{{ old('price',$pizza->price) }}" placeholder="Enter Product Price...">
                                    @error('price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>

                                    <div class="form-group">
                                    <label class="control-label mb-1">Waiting Time</label>
                                    <input id="cc-pament" name="waitingTime" type="number"
                                        class="form-control @error('waitingTime') is-invalid @enderror"
                                        aria-required="true" aria-invalid="false" value="{{ old('waitingTime',$pizza->waiting_time) }}" placeholder="Enter Waiting Time...">
                                    @error('waitingTime')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>

                                    <div class="form-group">
                                    <label class="control-label mb-1">View Count</label>
                                    <input id="cc-pament" name="viewCount" type="number"
                                        class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{ old('viewCount',$pizza->view_count) }}" disabled>
                                    </div>

                                    <div class="form-group">
                                    <label class="control-label mb-1">Created Date</label>
                                    <input id="cc-pament" name="createdAt" type="text"
                                        class="form-control"
                                        aria-required="true" aria-invalid="false" value="{{ $pizza->created_at->format('j F Y') }}" disabled>
                                    </div>
                                </div>
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
