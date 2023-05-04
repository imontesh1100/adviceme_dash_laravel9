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
            <h4 class="mb-sm-0 font-size-18">P. to pay with CFDI</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Sales</a></li>
                    <li class="breadcrumb-item active">Advisors</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Consultations</h4>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                     <tr>
                        <th>Advisor</th>
                        <th>Client</th>
                        <th>Package</th>
                        <th>Sale price</th>
                        <th>App Profit</th>
                        <th>Commission</th>
                        <th>Schedule</th>
                        <th>Date</th>
                        <th>More info</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sales as $el)
                    <tr>
                        <td>{{$el['advisor_name']}}</td>
                        <td>{{$el['customer_user_name']}}</td>
                        <td>{{$el['package']}}</td>
                        <td>${{$el['sale_price']}}</td>
                        <td>${{$el['app_profit']}}</td>
                        <td>${{$el['commission']}}</td>
                        <td>{{$el['schedule']}}</td>
                        <td>{{$el['date_call']}}</td>
                        <td><a href="/sales/advisor/receipt/{{$el['id_request']}}">View</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
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