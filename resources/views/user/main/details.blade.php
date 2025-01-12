@extends('user.layouts.master')

@section('content')
        <!-- Shop Detail Start -->
    <!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="{{ route('user#home') }}" class="text-decoration-none text-dark">
                    <i class="zmdi zmdi-long-arrow-left text-dark me-1"></i> Back
            </a>
		</div>
	</div>


	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="{{ asset('storage/' . $pizza->image) }}">


									<div class="wrap-pic-w pos-relative">
										<img src="{{ asset('storage/' . $pizza->image) }}" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04 text-decoration-none" href="{{ asset('storage/' . $pizza->image) }}">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
                            <input type="hidden" value="{{ Auth::user()->id }}" id="userId">
                            <input type="hidden" value="{{ $pizza->id }}" id="pizzaId">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							{{ $pizza->name }}
						</h4>
                        <small class="pt-1"><i class="zmdi zmdi-eye"></i> ({{ $pizza->view_count + 1}} viewed)</small>
						<span class="mtext-106 cl2">
							$ {{ $pizza->price }}
						</span>

						<p class="stext-102 cl3 p-t-23">
							{{ $pizza->description }}
						</p>

						<!--  -->
						<div class="p-t-33">

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" min="1" value="1" id="orderCount">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>

									<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" id="addCartBtn">
										Add to cart
									</button>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>

	</section>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
                    @foreach ($pizzaList as $pl)
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="{{ asset('storage/' . $pl->image) }} " alt="IMG-PRODUCT">

								<a href="{{ route('user#pizzaDetails', $pl->id) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
									View
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="{{ route('user#pizzaDetails', $pl->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										{{$pl->name}}
									</a>

									<span class="stext-105 cl3">
										$ {{$pl->price}}
									</span>
								</div>
							</div>
						</div>
					</div>
                    @endforeach

				</div>
			</div>
		</div>
	</section>
    <!-- Products End -->
@endsection

@section('scriptSource')

    <script src="{{ asset('user/vendor/jquery-3.2.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // increase view count
            $.ajax({
                type: 'get',
                url: '/user/ajax/increase/viewCount',
                data: {
                    'productId':$('#pizzaId').val()
                },
                dataType: 'json',
            })
            // click add to cart btn
            $('#addCartBtn').click(function(){
                $source ={
                    'userId' : $('#userId').val(),
                    'pizzaId' : $('#pizzaId').val(),
                    'count' : $('#orderCount').val()
                };
                $.ajax({
                    type: 'get',
                    url: '/user/ajax/addToCart',
                    data: $source,
                    dataType: 'json',
                    success: function(response) {
                        if(response.status == 'success'){
                            window.location.href= '/user/homePage';
                        }
                    }
                })
            })
        });
    </script>
@endsection
