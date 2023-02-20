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
                <h5 class="card-title mb-0">{{$data['infoGralAdvisor']['full_name']}}</h5>
            </div>
            <div class="card-body">
                <div>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-15 text-truncate">{{$data['infoGralAdvisor']['name_category']}}:{{$data['infoGralAdvisor']['name_career']}} , {{$data['infoGralAdvisor']['name_expertise']}}</h5>
                                    <p class="font-size-13 text-muted mb-0">{{$data['infoGralAdvisor']['date_creation']}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">    
                            <div class="position-relative mt-3">
                                <img src="{{$data['infoGralAdvisor']['photo_id']}}" alt="" class="img-thumbnail">
                                <p>Photo ID</p>
                            </div>
                        </div>
                        <div class="col-xl-6">    
                            <p></p>
                            <div class="position-relative mt-3">
                                <img src="{{$data['infoGralAdvisor']['photo_profile']}}" alt="" class="img-thumbnail">
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
                <form id="stage1PositiveForm" method="post" action="{{route('advisors.stage1.positive')}}">
                    <input type="hidden" name="advisorID" value="{{$data['infoGralAdvisor']['id_user_advisor']}}">
                    <button type="submit" class="btn btn-success waves-effect waves-light">Accept</button>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Still pending</h5>
                <div>
                    <ul class="list-unstyled mb-0">
                        <form id="stage1StillPendingForm" method="post" action="{{route('advisors.stage1.stillPending')}}">
                            <input type="hidden" name="advisorID" value="{{$data['infoGralAdvisor']['id_user_advisor']}}">
                            @foreach($data['stillPendingOptions'] as $opc)
                            <li>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="pendingOption" id="stillPending{{$opc['id_update_profile_request']}}" value="{{$opc['id_update_profile_request']}}" required>
                                    <label class="form-check-label" for="stillPending{{$opc['id_update_profile_request']}}">
                                        {{$opc['update_request_profile_name']}}
                                    </label>
                                </div>
                            </li>
                            @endforeach
                            <li>
                                <button type="submit" class="btn btn-soft-primary waves-effect waves-light">SEND</button>
                            </li>
                        </form>
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
                        <form id="disableForm" method="post" action="{{route('advisors.stage1.disable')}}">
                            <input type="hidden" name="advisorID" value="{{$data['infoGralAdvisor']['id_user_advisor']}}">
                            @foreach($data['disableOptions'] as $opc)
                            <li>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="disableOption" id="disableOption{{$opc['id_disable_reason']}}" required>
                                    <label class="form-check-label" for="disableOption{{$opc['id_disable_reason']}}">
                                        {{$opc['disable_reason_name']}}
                                    </label>
                                </div>
                            </li>
                            @endforeach
                            <li>
                                <button type="submit" class="btn btn-danger waves-effect waves-light">Disable</button>
                            </li>
                        </form>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('custom/js/advisorsStage1.js')}}"></script>
@endpush