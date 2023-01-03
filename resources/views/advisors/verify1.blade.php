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
            <h4 class="mb-sm-0 font-size-18">Verify Stage 1</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Advisor users</a></li>
                    <li class="breadcrumb-item active">Stage One</li>
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
                <h5 class="card-title mb-0">Miguel Martinez Lopez</h5>
            </div>
            <div class="card-body">
                <div>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-15 text-truncate">Health:Medicine,Cardiology</h5>
                                    <p class="font-size-13 text-muted mb-0">05/12/2020</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">    
                            <div class="position-relative mt-3">
                                <img src="/assets/images/small/img-3.jpg" alt="" class="img-thumbnail">
                                <p>Photo ID</p>
                            </div>
                        </div>
                        <div class="col-xl-6">    
                            <p></p>
                            <div class="position-relative mt-3">
                                <img src="/assets/images/small/img-3.jpg" alt="" class="img-thumbnail">
                                <p>Photo Profile</p>
                            </div>
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
                <a href="/advisors/users/verify/stage-2/1" class="btn btn-success waves-effect waves-light">Accept</a>
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
                                    Request other photo ID
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios2" id="formRadios2">
                                <label class="form-check-label" for="formRadios2">
                                    Request other photo profile pic
                                </label>
                            </div>
                        </li>
                        <li>
                            <a href="#" class="btn btn-soft-primary waves-effect waves-light">SEND</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Disable user</h5>
                <div>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios3" id="formRadios3">
                                <label class="form-check-label" for="formRadios3">
                                   Data does not check
                                </label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="formRadios4" id="formRadios4">
                                <label class="form-check-label" for="formRadios4">
                                    Photo seems fake
                                </label>
                            </div>
                        </li>
                        
                        <li>
                            <a href="#" class="btn btn-danger waves-effect waves-light">Disable</a>
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