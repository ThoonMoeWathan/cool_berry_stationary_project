@extends('user.layouts.master')

@section('content')
    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="bg0 m-t-23 p-b-140">
                <div class="container">
                    <div class="flex-w flex-sb-m p-b-52">
                        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                            <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1">
                                <a href="{{ route('user#home') }}" class="text-dark">
                                    <label class="" for="price-1">All</label>
                                </a>
                            </button>

                            @foreach ($category as $c)
                                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
                                    <a href="{{ route('user#filter', $c->id) }}" class="text-dark">
                                        <label class="" for="price-1">{{ $c->name }}</label>
                                    </a>
                                </button>
                            @endforeach
                        </div>
                        <!-- Shop Sidebar End -->

                        <div class="flex-w flex-c-m m-tb-10">
                            <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4">
                                <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                                <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                                <select name="sorting" id="sortingOption" class="form-control">
                                    <option value="">Options</option>
                                    <option value="asc">Ascending</option>
                                    <option value="desc">Descending</option>
                                </select>
                            </div>
                            <a href="{{ route('user#cartList') }}">
                                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4">
                                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart"
                                        data-notify="{{ count($cart) }}">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('user#history') }}">
                                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4">
                                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart"
                                        data-notify="{{ count($history) }}">
                                        <i class="zmdi zmdi-time-restore"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="row isotope-grid" id="dataList">
                        @if (count($pizza) != 0)
                            @foreach ($pizza as $p)
                                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                                    <!-- Block2 -->
                                    <div class="block2">
                                        <div class="block2-pic hov-img0 " >
                                            <img src="{{ asset('storage/' . $p->image) }}" alt="IMG-PRODUCT" />

                                            <a href="{{ route('user#pizzaDetails', $p->id) }}"
                                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                                View
                                            </a>
                                        </div>

                                        <div class="block2-txt flex-w flex-t p-t-14">
                                            <div class="block2-txt-child1 flex-col-l">
                                                <a href="{{ route('user#pizzaDetails', $p->id) }}"
                                                    class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                    {{ $p->name }}
                                                </a>

                                                <span class="stext-105 cl3"> {{ $p->price }} Kyats</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-center fs-3 py-5">
                                There is no products
                                <i class="fa-solid fa-pizza-slice ms-1"></i>
                            </p>
                        @endif


                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
@endsection

@section('scriptSource')
    <script>
        $(document).ready(function() {
            // type : 'get',
            // url : '/user/ajax/pizza/list',
            // dataType : 'json',
            // success : function(response){
            //     console.log(response);
            // }
            $('#sortingOption').change(function() {
                $eventOption = $('#sortingOption').val();

                if ($eventOption == 'asc') {
                    $.ajax({
                        type: 'get',
                        url: '/user/ajax/pizza/list',
                        data: {
                            'status': 'asc'
                        },
                        dataType: 'json',
                        success: function(response) {
                            $list = '';
                            for ($i = 0; $i < response.length; $i++) {
                                $list += `
                           <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
    <div class="block2">
        <div class="block2-pic hov-img0">
            <img src="{{ asset('storage/${response[$i].image}') }}" alt="IMG-PRODUCT" />

            <a href="{{ route('user#pizzaDetails', $p->id) }}"
                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                View
            </a>
        </div>

        <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l">
                <a href=""
                    class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                    ${response[$i].name }
                </a>

                <span class="stext-105 cl3">${response[$i].price} Kyats</span>
            </div>

        </div>
    </div>
</div>
                                    `;
                            }
                            // console.log('$list');
                            $('#dataList').html($list);
                        }
                    })
                } else if ($eventOption == 'desc') {
                    $.ajax({
                        type: 'get',
                        url: '/user/ajax/pizza/list',
                        data: {
                            'status': 'desc'
                        },
                        dataType: 'json',
                        success: function(response) {
                            // console.log(response);
                            $list = '';
                            for ($i = 0; $i < response.length; $i++) {
                                $list += `
                            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
    <div class="block2">
        <div class="block2-pic hov-img0">
            <img src="{{ asset('storage/${response[$i].image}') }}" alt="IMG-PRODUCT" />

            <a href="{{ route('user#pizzaDetails', $p->id) }}"
                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                View
            </a>
        </div>

        <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l">
                <a href=""
                    class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                    ${response[$i].name }
                </a>

                <span class="stext-105 cl3">${response[$i].price} Kyats</span>
            </div>

        </div>
    </div>
</div>
                                    `;
                            }
                            $('#dataList').html($list);
                        }
                    })
                }
            })
        });
    </script>
@endsection
