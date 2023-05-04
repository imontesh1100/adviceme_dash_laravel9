@extends('layouts.minia.general')
@section('title', 'Commissions | Adviceme')
@push('css')
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Commissions</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Advisor</a></li>
                    <li class="breadcrumb-item active">Commissions</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{$advisorName ?? '--'}} commissions</h4>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                     <tr>
                        <th>ID request</th>
                        <th>Refered</th>
                        <th>Package</th>
                        <th>Schedule</th>
                        <th>Date</th>
                        <th>Commission</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($commissions as $el)
                    <tr>
                        <td>{{$el['id_request'] ?? '--'}}</td>
                        <td>{{$el['advisor_referred'] ?? '--'}}</td>
                        <td>{{$el['package'] ?? '--'}}</td>
                        <td>{{$el['schedule'] ?? '--'}}</td>
                        <td>{{$el['date_request'] ?? '--'}}</td>
                        <td>${{$el['commission'] ?? '--'}}</td>
                        @if($el['id_status_commission']==2)
                            <td>
                                <a  href="javascript:;" class="pending" onclick="updateCommissionStatus({{$el['id_request']}})">{{$el['status_commission']}}</a>
                            </td>
                        @else
                            <td class="transfered">{{$el['status_commission']}}</td>
                        @endif
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    <script src="{{asset('custom/js/updateAdvisorCommissions.js')}}"></script>  
    
@endpush