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
            <h4 class="mb-sm-0 font-size-18">Verify Stage 2</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Advisor users</a></li>
                    <li class="breadcrumb-item active">Stage two</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<input type="hidden" value="{{url()->previous()}}" id="prevUrl">
@if($data['infoGralAdvisor']['status_stage2']!='Verified')
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
                            <p class="font-size-15">{{$data['infoGralAdvisor']['name_category']}}:{{$data['infoGralAdvisor']['name_career']}} , {{$data['infoGralAdvisor']['name_expertise']}}</p>
                            <p class="font-size-15">Number Code       {{$data['infoGralAdvisor']['number_code'] ?? 'N/A'}}</p>
                            <p class="font-size-15">Institution       {{$data['infoGralAdvisor']['institution'] ?? 'N/A'}}</p>
                            <p class="font-size-15">Expedition date   {{$data['infoGralAdvisor']['expedition_date'] ?? 'N/A'}}</p>
                            <p class="font-size-15">Phone number      {{$data['infoGralAdvisor']['phone_number'] ?? 'N/A'}}</p>
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
                <form id="stage2PositiveForm" method="post" action="{{route('advisors.stage2.positive')}}">
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
                        <form id="stageStillPendingForm" method="post" action="{{route('advisors.stage.stillPending')}}">
                            <input type="hidden" name="advisorID" value="{{$data['infoGralAdvisor']['id_user_advisor']}}">
                            <input type="hidden" name="stage" value="2">
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
                        <form id="disableForm" method="post" action="{{route('advisors.stage.disable')}}">
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
@else
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">{{$data['infoGralAdvisor']['full_name']}}</h5>
            </div>
            <div class="card-body">
                <div>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <p class="font-size-15">{{$data['infoGralAdvisor']['name_category']}}:{{$data['infoGralAdvisor']['name_career']}} , {{$data['infoGralAdvisor']['name_expertise']}}</p>
                            <p class="font-size-15">Number Code       {{$data['infoGralAdvisor']['number_code'] ?? 'N/A'}}</p>
                            <p class="font-size-15">Institution       {{$data['infoGralAdvisor']['institution'] ?? 'N/A'}}</p>
                            <p class="font-size-15">Expedition date   {{$data['infoGralAdvisor']['expedition_date'] ?? 'N/A'}}</p>
                            <p class="font-size-15">Phone number      {{$data['infoGralAdvisor']['phone_number'] ?? 'N/A'}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('custom/js/advisorsStage2.js')}}"></script>
@endpush