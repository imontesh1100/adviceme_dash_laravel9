@extends('layouts.minia.general')
@section('title', 'Sales | Adviceme')
@push('css')
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Advisor Receipt</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Advisors</a></li>
                    <li class="breadcrumb-item active">@if($info['header']['with_cfdi'] == "1") With @else Without @endif CFDI</li>
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
                    <div class="d-flex mb-4">
                        <div class="col-6">
                            <img src="/assets/images/adviceme.svg" alt="" height="24">
                        </div>
                        <div class="col-6">
                            <p class="float-end font-size-16">
                                <strong>Status:</strong> 
                                <span class="text-success">{{$info['header']['status']}}</span>
                                <span class="cs-spacing">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <strong>Transaction:</strong> #{{$info['header']['id_request']}}
                            </p> 
                        </div>
                    </div>
                    <!-- <p class="mb-1">1874 County Line Road City, FL 33566</p> -->
                    <!-- <p class="mb-1"><i class="mdi mdi-email align-middle me-1"></i> abc@123.com</p> -->
                    <!-- <p><i class="mdi mdi-phone align-middle me-1"></i> 012-345-6789</p> -->
                </div>
                <hr class="my-4">
                <div class="row">
                    <div class="col-sm-3">
                        <div>
                            <h5 class="font-size-15 mb-3">Generals:</h5>
                            <p class="mb-1">{{$info['general']['date_call']}}</p>
                            <p class="mb-1">Schedule: {{$info['general']['hour_call']}}</p>
                            <p class="mb-1">Minutes: {{$info['general']['package']}}</p>
                            <p class="mb-1">Rate:${{$info['general']['rate_per_minute']}} per minute</p>

                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div>
                            <h5 class="font-size-15 mb-3">Customer:</h5>
                            <p class="mb-1">Mail: {{$info['customer']['email']}}</p>
                            <p class="mb-1">Usename: {{$info['customer']['username']}}</p>
                            <p class="mb-1">Payment method: {{$info['customer']['payment_method']}}</p>
                            <p class="mb-1">Status: @if($info['customer']['joined_call']=='1') Connected @else Disconnected @endif </p>
                        </div>
                    </div>
                     <div class="col-sm-3">
                        <div>
                            <h5 class="font-size-15 mb-3">Advisor:</h5>
                            <p class="mb-1">Mail: {{$info['advisor']['email']}}</p>
                            <p class="mb-1">Name: {{$info['advisor']['name']}}</p>
                            <p class="mb-1">Category: {{$info['advisor']['category']}}</p>
                            <p class="mb-1">Status: @if($info['advisor']['joined_call']=='1') Connected @else Disconnected @endif </p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div>
                            <div>
                                <h5 class="font-size-15">Interactions:</h5>
                                <p class="mb-1">Customer evaluation: <a href="#">{{$info['interactions']['rate_service']}}</a></p>
                                <!-- <p class="mb-1">Reported: <a href="#">True</a></p> -->
                                <p class="mb-1">Advisor CFDI: @if($info['interactions']['cfdi_pdf']=='NA') N/A @else <a href="{{$info['interactions']['cfdi_pdf']}}" target="_blank">View</a> @endif</p>
                                <p class="mb-1">Advisor XML: @if($info['interactions']['cfdi_xml']=='NA') N/A @else <a href="{{$info['interactions']['cfdi_xml']}}" target="_blank">View</a> @endif</p>
                            </div>
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
                                        <h5 class="font-size-15 mb-1">Consultation amount</h5>
                                        <p class="font-size-13 text-muted mb-0">Per {{$info['ticket']['package']}}</p>
                                    </td>
                                    <td class="text-end">${{$info['ticket']['advice_cost']}}</td>
                                </tr>
                                
                                <tr>
                                    <th scope="row">02</th>
                                    <td>
                                        <h5 class="font-size-15 mb-1">Rate service</h5>
                                        <p class="font-size-13 text-muted mb-0">{{$info['ticket']['porc_service_fee']}}</p>
                                    </td>
                                    <td class="text-end">${{$info['ticket']['service_fee']}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">03</th>
                                    <td>
                                        <h5 class="font-size-15 mb-1">Advisor total income</h5>
                                        <p class="font-size-13 text-muted mb-0">Amount with IVA</p>
                                    </td>
                                    <td class="text-end">${{$info['ticket']['gross_income']}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">04</th>
                                    <td>
                                        <h5 class="font-size-15 mb-1">Advisor income without tax</h5>
                                        <p class="font-size-13 text-muted mb-0">Amount without IVA</p>
                                    </td>
                                    <td class="text-end">${{$info['ticket']['income_without_tax']}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">05</th>
                                    <td>
                                        <h5 class="font-size-15 mb-1">Amount advisor tax</h5>
                                        <p class="font-size-13 text-muted mb-0">IVA {{$info['ticket']['porc_tax_income']}}</p>
                                    </td>
                                    <td class="text-end">${{$info['ticket']['tax_income']}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">06</th>
                                    <td>
                                        <h5 class="font-size-15 mb-1">IVA withholding</h5>
                                        <p class="font-size-13 text-muted mb-0">Of {{$info['ticket']['porc_iva_retention']}}</p>
                                    </td>
                                    <td class="text-end">${{$info['ticket']['iva_retention']}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">07</th>
                                    <td>
                                        <h5 class="font-size-15 mb-1">ISR withholding</h5>
                                        <p class="font-size-13 text-muted mb-0">Of {{$info['ticket']['porc_isr_retention']}}</p>
                                    </td>
                                    <td class="text-end">${{$info['ticket']['isr_retention']}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="2" class="border-0 text-end">Advisor Income</th>
                                    <td class="border-0 text-end"><h4 class="m-0">${{$info['ticket']['advisor_income']}}</h4></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-print-none mt-3">
                    <div class="float-end">
                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                        <a href="#" class="btn btn-primary w-md waves-effect waves-light blue-cs-bg">Pay</a>
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