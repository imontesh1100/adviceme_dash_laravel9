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
            <h4 class="mb-sm-0 font-size-18">Sales</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Sales</a></li>
                    <li class="breadcrumb-item active">Clients</li>
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
                            $<span class="counter-value" data-target="{{$byPeriod['week']}}">0</span>MXN
                        </h4>
                    </div>
                </div>
                <!-- <div class="text-nowrap">
                    <span class="badge bg-soft-success text-success">+$20.9k</span>
                    <span class="ms-1 text-muted font-size-13">Since last week</span>
                </div> -->
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
                            $<span class="counter-value" data-target="{{$byPeriod['month']}}"">0</span>MXN
                        </h4>
                    </div>
                </div>
                <!-- <div class="text-nowrap">
                    <span class="badge bg-soft-danger text-danger">-29 Trades</span>
                    <span class="ms-1 text-muted font-size-13">Since last week</span>
                </div> -->
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
                            $<span class="counter-value" data-target="{{$byPeriod['year']}}">0</span>MXN
                        </h4>
                    </div>
                </div>
                <!-- <div class="text-nowrap">
                    <span class="badge bg-soft-success text-success">+ $2.8k</span>
                    <span class="ms-1 text-muted font-size-13">Since last week</span>
                </div> -->
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Shortcut</span>
                        <h4 class="mb-3">
                            Refound requested
                        </h4>
                    </div>
                </div>
                <div class="text-nowrap">
                    <a class="ms-1 font-size-13" href="{{route('with-cfdi')}}">View more</a>
                </div>
            </div>
        </div>
    </div>  
    <div class="col-xl-4 col-md-6">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Shortcut</span>
                        <h4 class="mb-3">
                           Pending refounds
                        </h4>
                    </div>
                </div>
                <div class="text-nowrap">
                    <a class="ms-1 font-size-13" href="{{route('with-cfdi')}}">View more</a>
                </div>
            </div>
        </div>
    </div>   
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Sales per client</h4>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Purchases</th>
                        <th>Refounds</th>
                        <th>Total purchases</th>
                        <th>Net income</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $el)
                    <tr>
                        <td>{{$el['customer_user_name']}}</td>
                        <td>{{$el['country']}}</td>
                        <td><a href="/sales/client/{{$el['id_user_customer']}}">{{$el['total_calls']}}</a></td>
                        <td>{{$el['total_refunds'] ?? 0}}</td>
                        <td>{{$el['total_purchases']}}</td>
                        <td>{{$el['app_profit']}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row float-end">
                    <div class="dataTables_paginate paging_simple_numbers" id="datatable-buttons_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous @if($page<=1) disabled @endif" id="datatable-buttons_previous">
                                <a href="{{route('sales.clients',['page'=>$page-1])}}" aria-controls="datatable-buttons" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                            </li>
                            <li class="paginate_button page-item active">
                                <a href="#" aria-controls="datatable-buttons" data-dt-idx="1" tabindex="0" class="page-link">{{$page}}</a>
                            </li>
                            <li class="paginate_button page-item next @if($page==$lastPage) disabled @endif" id="datatable-buttons_next">
                                <a href="{{route('sales.clients',['page'=>$page+1])}}" aria-controls="datatable-buttons" data-dt-idx="2" tabindex="0" class="page-link">Next</a>
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