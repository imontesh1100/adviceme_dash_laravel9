@extends('layouts.minia.general')
@section('title', 'Advisors | Adviceme')
@push('css')
<link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
@endpush
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Stage two Certify</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Advisor users</a></li>
                    <li class="breadcrumb-item active">Stage Two</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-9 col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Professional ID</h5>
            </div>
            <div class="card-body">
                <div>
                    <div class="row">
                        <div class="col-xl-8">
                            <table class="table-cs">
                                <tr> 
                                    <td style="padding-right:2em;"><strong>Number Code</strong></td>
                                    <td><a href="#">*******</a></td>
                                </tr>
                                <tr>
                                    <td style="padding-right:2em;"><strong>Name</strong></td>
                                    <td>*****</td>
                                </tr>
                                <tr>
                                    <td style="padding-right:2em;"><strong>Category</strong></td>
                                    <td>*****</td>
                                </tr>
                                <tr>
                                    <td style="padding-right:2em;"><strong>Prefession</strong></td>
                                    <td>*****</td>
                                </tr>
                                <tr>
                                    <td style="padding-right:2em;"><strong>Expertise</strong></td>
                                    <td>*****</td>
                                </tr>
                            </table>
                            <!-- end post -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- end card body -->
        </div>
    </div>
    <!-- end col -->
    <div class="col-xl-3 col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Positive verification</h5>
                <button type="button" class="btn btn-success waves-effect waves-light">Accept</button>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Still pending</h5>
                <div>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios1" id="formRadios1">
                                <label class="form-check-label" for="formRadios1">
                                    Category does not match
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios2" id="formRadios2">
                                <label class="form-check-label" for="formRadios2">
                                   Profession does not check
                                </label>
                            </div>
                        </li>
                        <li>
                            <button type="button" class="btn btn-soft-primary waves-effect waves-light">SEND</button>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Reject verification</h5>
                <div>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios3" id="formRadios3">
                                <label class="form-check-label" for="formRadios3">
                                   Prefession number does not exist
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios4" id="formRadios4">
                                <label class="form-check-label" for="formRadios4">
                                    Does not appear on national system
                                </label>
                            </div>
                        </li>
                        
                        <li>
                            <button type="button" class="btn btn-danger waves-effect waves-light">Reject</button>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end card body -->
        </div>

        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@endsection
@push('scripts')

@endpush