@extends('layouts.minia.general')
@section('title', 'Customers | Adviceme')
@push('css')
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Customers Users</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Customers</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row align-items-center">
    <div class="col-md-6">
        <div class="mb-3">
            <h5 class="card-title">Total users <span class="text-muted fw-normal ms-2">({{$totalUsers ?? 'N/A'}})</span></h5>
        </div>
    </div>
    <div class="col-md-6">
        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
            <div>
                <a href="#" class="btn btn-light">Excel</a>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="table-responsive mb-4">
    <table id="datatable-custom" class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
        <thead>
            <tr>
            <th scope="col" style="width: 50px;">
                <div class="form-check font-size-16">
                    <input type="checkbox" class="form-check-input" id="checkAll">
                    <label class="form-check-label" for="checkAll"></label>
                </div>
            </th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Timezone</th>
            <th scope="col">Birth Date</th>
            <th scope="col">Purchases</th>
            <th style="width: 80px; min-width: 80px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customerSales as $c)
            <tr>
                <th scope="row">
                    <div class="form-check font-size-16">
                        <input type="checkbox" class="form-check-input" id="contacusercheck{{$c['id_user_customer']}}">
                        <label class="form-check-label" for="contacusercheck{{$c['id_user_customer']}}"></label>
                    </div>
                </th>
                <td>
                    <div class="avatar-sm d-inline-block align-middle me-2">
                        <img src="{{$c['photo_profile']}}" class="rounded-circle" style="width: 32px;"/>
                    </div>
                    <a href="#" class="text-body">{{$c['full_name']??'N/A'}}</a>
                </td>
                <td>{{$c['email']??'N/A'}}</td>
                <td>{{$c['name_time_zone']??'N/A'}} <br> {{$c['name_country']??'N/A'}}</td>
                <td>{{$c['date_birth']?? 'N/A'}}</td>
                <td><a href="#">${{$c['purchases']??'N/A'}}</a></td>
                <td>
                    <div class="d-flex gap-3">
                        <a class="text-success" href="#" data-bs-toggle="modal" data-bs-target="#modal_email"><i class="mdi mdi-pencil font-size-18" id="edittooltip"></i></a>
                        <a class="text-danger" href="#" data-bs-toggle="modal" data-bs-target="#modal_disable_user"><i class="mdi mdi-delete font-size-18" id="deletetooltip"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row float-end">
        <div class="dataTables_paginate paging_simple_numbers" id="datatable-custom_paginate">
            <ul class="pagination">
                <li class="paginate_button page-item previous @if($page<=1) disabled @endif" id="datatable-custom_previous">
                    <a href="{{route('customers.users',['page'=>$page-1])}}" aria-controls="datatable-buttons" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                </li>
                <li class="paginate_button page-item active">
                    <a href="#" aria-controls="datatable-custom" data-dt-idx="1" tabindex="0" class="page-link">{{$page}}</a>
                </li>
                <li class="paginate_button page-item next @if($page==$lastPage) disabled @endif" id="datatable-custom_next">
                    <a href="{{route('customers.users',['page'=>$page+1])}}" aria-controls="datatable-custom" data-dt-idx="2" tabindex="0" class="page-link">Next</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- end table responsive -->
@include('customers.modal_send_email')
@include('customers.modal_disable_user')
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
    <script>
        $(document).ready(function() {
            //Buttons examples
            var table = $('#datatable-custom').DataTable({
                lengthChange: false,
                searching: false,
                paginate:false
            });

            table.buttons().container()
                .appendTo('#datatable-custom_wrapper .col-md-6:eq(0)');
            $(".dataTables_length select").addClass('form-select form-select-sm');
            //hide msg "Showing * of * records"
            document.getElementById('datatable-custom_info').closest('div.row').remove();
        });
    </script>  

@endpush