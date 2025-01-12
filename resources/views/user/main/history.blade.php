@extends('user.layouts.master')

@section('content')
    <!-- Cart Start -->
    <div class="container-fluid" style="min-height: 400px overflow-y:scroll;">
        <div class="row px-xl-5 mt-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0" id="dataTable">
                    <thead class="thead-dark">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($order as $o)
                            <tr>
                                <td class="align-middle" id=""scope="col">{{ $o->created_at->format('j F Y') }}</td>
                                <td class="align-middle" id=""scope="col">{{ $o->order_code }}</td>
                                <td class="align-middle" id=""scope="col">{{ $o->total_price }}</td>
                                <td class="align-middle" id=""scope="col">
                                    @if ($o->status==0)
                                        <span class="btn btn-sm btn-warning shadow-sm"><i class="zmdi zmdi-time-restore"></i> Pending...</span>
                                    @elseif ($o->status==1)
                                        <span class="btn btn-sm btn-success shadow-sm"><i class="zmdi zmdi-check"></i> Success</span>
                                    @elseif ($o->status==2)
                                        <span class="btn btn-sm btn-danger shadow-sm"><i class="zmdi zmdi-alert-triangle"></i> Rejected</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4" >
                    {{$order->links()}}
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection
