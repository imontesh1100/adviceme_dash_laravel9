@extends('layouts.minia.general')
@section('title', 'Advisors | Adviceme')
@push('css')
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Advisors Pending visible</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Advisors</a></li>
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
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Stage 1</th>
            <th scope="col">Stage 2</th>
            <th scope="col">More info</th>
            </tr>
        </thead>
        <tbody>
            @foreach([1,2,3,4] as $id)
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
                </td>
                <td><strong>@username</strong><br>Miguel Dominguez</td>
                <td>test@test.com</td>
                <td>
                    <a class="updated" href="/advisors/users/verify/stage-1/{{$id}}">Updated</a><br>
                    <span class="text-muted">Photo ID</span>
                </td>
                <td>
                    <a class="pending" href="/advisors/users/verify/stage-2/{{$id}}">Not verified</a><br>
                </td>
                <td><a class="" href="/advisors/users/profile/{{$id}}">Visit</a></td>
            </tr>
            @endforeach
            <tr>
                <th scope="row">
                    <div class="form-check font-size-16">
                        <input type="checkbox" class="form-check-input" id="contacusercheck1000">
                        <label class="form-check-label" for="contacusercheck1000"></label>
                    </div>
                </th>
                <td>
                    <div class="avatar-sm d-inline-block align-middle me-2">
                        <div class="avatar-title bg-soft-light text-light font-size-24 m-0 rounded-circle">
                            <i class="bx bxs-user-circle"></i>
                        </div>
                    </div>
                </td>
                <td><strong>@username</strong><br>**** Lopez</td>
                <td>test@test.com</td>
                <td>
                    <a class="verified" href="/advisors/users/verify/stage-1/1000">Verified</a><br>
                </td>
                <td>
                    <a class="text-danger" href="/advisors/users/certify/1000">Update request</a> <br>
                    <span class="text-muted">Wrong data</span>
                </td>
                <td><a class="" href="/advisors/users/profile/1000">Visit</a></td>
            </tr>
        </tbody>
    </table>
    <!-- end table -->
</div>
<!-- end table responsive -->
@include('advisors.modal_send_email')
@include('advisors.modal_disable_user')
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