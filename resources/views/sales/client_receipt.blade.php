@extends('layouts.minia.general')
@section('title', 'Purchases | Adviceme')
@push('css')
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Ticket</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Voucher type</a></li>
                    <li class="breadcrumb-item active">Ticket</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="invoice-title">
                    <div class="d-flex align-items-start">
                        <div class="col-6 mb-4">
                            <img src="/assets/images/adviceme.svg" alt="" height="24">
                        </div>
                        <div class="col-6">
                            <p class="float-end font-size-16">
                                <strong>Status:</strong> <span class="@if($info['header']['status']=='ACCEPTED') text-success @else text-danger @endif">{{$info['header']['status']}}</span>
                                <span class="cs-spacing">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <strong>Transaction:</strong> #{{$info['header']['id_request']}}
                            </p> 
                        </div>
                    </div>
                    <p class="mb-1">1874 County Line Road City, FL 33566</p>
                    <p class="mb-1"><i class="mdi mdi-email align-middle me-1"></i> abc@123.com</p>
                    <p><i class="mdi mdi-phone align-middle me-1"></i> 012-345-6789</p>
                </div>
                <hr class="my-4">
                <div class="row">
                    <div class="col-sm-3">
                        <div>
                            <h5 class="font-size-15 mb-3">Generals</h5>
                            <p class="mb-1">Date: {{$info['general']['date_call']}}</p>
                            <p class="mb-1">Schedule: {{$info['general']['hour_call']}}</p>
                            <p class="mb-1">Minutes: {{$info['general']['package']}} </p>
                            <p class="mb-1">Rate per min: ${{$info['general']['rate_per_minute']}}</p>

                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div>
                            <h5 class="font-size-15 mb-3">Customer</h5>
                            <p class="mb-1">Mail: {{$info['customer']['email']}}</p>
                            <p class="mb-1">Username: {{$info['customer']['username']}}</p>
                            <p class="mb-1">Payment mehtod: {{$info['customer']['payment_method']}}</p>
                            <p class="mb-1">Status: @if($info['customer']['joined_call']== '1') Connected @else N/A @endif</p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div>
                            <h5 class="font-size-15 mb-3">Advisor</h5>
                            <p class="mb-1">Mail: {{$info['advisor']['email']}}</p>
                            <p class="mb-1">Name: {{$info['advisor']['name']}}</p>
                            <p class="mb-1">Category: {{$info['advisor']['category']}}</p>
                            <p class="mb-1">Status: @if($info['advisor']['joined_call']== '1') Connected @else N/A @endif</p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div>
                            <h5 class="font-size-15 mb-3">Interactions</h5>
                            <p class="mb-1">Customer evaluation: <a href="#">{{$info['interactions']['customer_evaluation'] ?? 'N/A'}}</a></p>
                            <p class="mb-1">Reported type: <a href="#">View</a></p>
                        </div>
                    </div>
                </div>

                <div class="py-2 mt-3">
                    <h5 class="font-size-15">Order summary</h5>
                </div>
                <div class="p-4 border rounded">
                    <div class="table-responsive">
                        <table class="table table-nowrap align-middle mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 70px;">No.</th>
                                    <th>Concept</th>
                                    <th class="text-end" style="width: 120px;">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">01</th>
                                    <td>
                                        <h5 class="font-size-15 mb-1">Net income</h5>
                                        <p class="font-size-13 text-muted mb-0">Videocall </p>
                                    </td>
                                    <td class="text-end">${{$info['ticket']['net_income']}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">01</th>
                                    <td>
                                        <h5 class="font-size-15 mb-1">Adviceme fee</h5>
                                        <p class="font-size-13 text-muted mb-0">15% fee </p>
                                    </td>
                                    <td class="text-end">${{$info['ticket']['adviceme_fee']}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="2" class="text-end">Sub Total</th>
                                    <td class="text-end">${{$info['ticket']['subtotal']}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="2" class="border-0 text-end">
                                        Tax</th>
                                    <td class="border-0 text-end">${{$info['ticket']['tax']}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="2" class="border-0 text-end">Total</th>
                                    <td class="border-0 text-end"><h4 class="m-0">${{$info['ticket']['total']}}</h4></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-print-none mt-3">
                    <div class="float-end">
                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                        <a href="#" class="btn btn-primary w-md waves-effect waves-light">Send</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <!-- Required datatable js -->
    <script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="/assets/libs/jszip/jszip.min.js"></script>
    <script src="/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>

    <!-- Responsive examples -->
    <script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script src="/assets/js/pages/datatables.init.js"></script>    
@endpush