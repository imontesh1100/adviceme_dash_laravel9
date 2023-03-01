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
            <h4 class="mb-sm-0 font-size-18">Advisors Disabled</h4>
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
            <h5 class="card-title">Total users <span class="text-muted fw-normal ms-2">({{$totalAdvisors ?? 'N/A'}})</span></h5>
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
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Email</th>
            <th scope="col">Stage 1</th>
            <th scope="col">Stage 2</th>
            <th scope="col">More info</th>
            <th style="width: 80px; min-width: 80px;">Enable</th>
            </tr>
        </thead>
        <tbody>
            @foreach($advisorsDisabled as $a)
            <tr>
                <th scope="row">
                    <div class="form-check font-size-16">
                        <input type="checkbox" class="form-check-input" id="contacusercheck{{$a['id_user_advisor']}}">
                        <label class="form-check-label" for="contacusercheck{{$a['id_user_advisor']}}"></label>
                    </div>
                </th>
                <td>
                    <div class="avatar-sm d-inline-block align-middle me-2">
                        <img src="{{$a['photo_profile']}}" class="rounded-circle" style="width: 32px;"/>
                    </div>
                </td>
                <td><strong>{{$a['full_name']}}</strong></td>
                <td>{{$a['name_category']}}</td>
                <td>{{$a['email']}}</td>
                <td>
                    @if($a['stage1']=='Not verified')
                        <a class="pending" href="/advisors/users/verify/stage-1/{{$a['id_user_advisor']}}">Not verified</a>
                    @elseif($a['stage1']=='Verified')
                        <a href="/advisors/users/verify/stage-1/{{$a['id_user_advisor']}}" class="text-success">{{$a['stage1']}}</a>
                    @else
                        <a href="#">{{$a['stage1']}}</a>
                    @endif
                </td>
                <td>
                    @if($a['stage2']=='Not verified')
                        <a class="pending" href="/advisors/users/verify/stage-2/{{$a['id_user_advisor']}}">Not verified</a>
                    @elseif($a['stage2']=='Verified')
                        <a href="/advisors/users/verify/stage-2/{{$a['id_user_advisor']}}" class="text-success">{{$a['stage2']}}</a>
                    @else
                        <a href="#">{{$a['stage2']}}</a>
                    @endif
                    <br>
                </td>
                <td><a class="" href="/advisors/users/profile/{{$a['id_user_advisor']}}">Visit</a></td>
                <td>
                    <div class="d-flex gap-3">
                        <a class="text-success" href="#" data-bs-toggle="modal" data-bs-target="#modal_email"><i class="mdi mdi-pencil font-size-18" id="edittooltip"></i></a>
                        <!-- <a class="text-danger" href="#" data-bs-toggle="modal" data-bs-target="#modal_disable_user"><i class="mdi mdi-delete font-size-18" id="deletetooltip"></i></a> -->
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if(count($advisorsDisabled)>0)
    <div class="row float-end">
        <div class="dataTables_paginate paging_simple_numbers" id="datatable-custom_paginate">
            <ul class="pagination">
                <li class="paginate_button page-item previous @if($page<=1) disabled @endif" id="datatable-custom_previous">
                    <a href="{{route('advisors.disabled',['page'=>$page-1])}}" aria-controls="datatable-buttons" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                </li>
                <li class="paginate_button page-item active">
                    <a href="#" aria-controls="datatable-custom" data-dt-idx="1" tabindex="0" class="page-link">{{$page}}</a>
                </li>
                <li class="paginate_button page-item next @if($page==$lastPage) disabled @endif" id="datatable-custom_next">
                    <a href="{{route('advisors.disabled',['page'=>$page+1])}}" aria-controls="datatable-custom" data-dt-idx="2" tabindex="0" class="page-link">Next</a>
                </li>
            </ul>
        </div>
    </div>
    @endif
</div>
<div class="row d-block mb-3">
    <span><span class="bold">IMPORTANT: </span>If we verify that your State License is true,you will obtain the official status of verified advisor to give more confidence to your clients.</span>
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