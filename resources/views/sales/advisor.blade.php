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
            <h4 class="mb-sm-0 font-size-18">{{$salesInfo['name_advisor']}}</h4>
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
    <div class="col-xl-4 col-md-6">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Week</span>
                        <h4 class="mb-3">
                            $<span class="counter-value" data-target="{{$salesInfo['sales_by_period']['week']}}">0</span>MXN
                        </h4>
                    </div>
                </div>
                <div class="text-nowrap">
                    <span class="ms-1 text-muted font-size-13">Period resume</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Month</span>
                        <h4 class="mb-3">
                            $<span class="counter-value" data-target="{{$salesInfo['sales_by_period']['month']}}">0</span>MXN
                        </h4>
                    </div>
                </div>
                <div class="text-nowrap">
                    <span class="ms-1 text-muted font-size-13">Period resume</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Year</span>
                        <h4 class="mb-3">
                            $<span class="counter-value" data-target="{{$salesInfo['sales_by_period']['year']}}">0</span>MXN
                        </h4>
                    </div>
                </div>
                <div class="text-nowrap">
                    <span class="ms-1 text-muted font-size-13">Period resume</span>
                </div>
            </div>
        </div>
    </div> 
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">({{$salesInfo['name_advisor']}}) Sales</h4>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>Client</th>
                        <th>ID request</th>
                        <th>Call Status</th>
                        <th>Package</th>
                        <th>Sale price</th>
                        <th>App Profit</th>
                        <th>Date</th>
                        <th>Schedule</th>
                        <th>More info</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($salesInfo['detail_calls'] as $el)
                    <tr>
                        <td>{{$el['customer_user_name']}}</td>
                        <td>{{$el['id_request']}}</td>
                        <td>{{$el['call_status']}}</td>
                        <td>{{$el['package']}}</td>
                        <td>${{$el['sale_price']}}</td>
                        <td>${{$el['app_profit']}}</td>
                        <td>${{$el['date_call']}}</td>
                        <td>${{$el['schedule']}}</td>
                        <td><a href="/sales/advisor/receipt/{{$el['id_request']}}">View</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row float-end">
                    <div class="dataTables_paginate paging_simple_numbers" id="datatable-buttons_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous @if($page<=1) disabled @endif" id="datatable-buttons_previous">
                                <a href="{{route('sales.advisor',['advisorID'=>$advisorID,'page'=>$page-1])}}" aria-controls="datatable-buttons" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                            </li>
                            <li class="paginate_button page-item active">
                                <a href="#" aria-controls="datatable-buttons" data-dt-idx="1" tabindex="0" class="page-link">{{$page}}</a>
                            </li>
                            <li class="paginate_button page-item next @if($page==$lastPage) disabled @endif" id="datatable-buttons_next">
                                <a href="{{route('sales.advisor',['advisorID'=>$advisorID,'page'=>$page+1])}}" aria-controls="datatable-buttons" data-dt-idx="2" tabindex="0" class="page-link">Next</a>
                            </li>
                        </ul>
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