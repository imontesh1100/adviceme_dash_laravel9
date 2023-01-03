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
            <h5 class="card-title">Total users <span class="text-muted fw-normal ms-2">(***)</span></h5>
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
    <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
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
            @foreach([1,2,3,4,5] as $id)
            <tr>
                <th scope="row">
                    <div class="form-check font-size-16">
                        <input type="checkbox" class="form-check-input" id="contacusercheck{{$id}}">
                        <label class="form-check-label" for="contacusercheck{{$id}}"></label>
                    </div>
                </th>
                <td>
                    <div class="avatar-sm d-inline-block align-middle me-2">
                        <div class="avatar-title bg-soft-light text-light font-size-24 m-0 rounded-circle">
                            <i class="bx bxs-user-circle"></i>
                        </div>
                    </div>
                    <a href="#" class="text-body">William Swift</a>
                </td>
                <td>williamswift@minia.com</td>
                <td>UTC-5 <br> Mexico</td>
                <td>1990-12-22</td>
                <td><a href="#">$350.00 MXN</a></td>
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
    <!-- end table -->
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

    <script src="/assets/js/pages/datatable-pages.init.js"></script>

@endpush