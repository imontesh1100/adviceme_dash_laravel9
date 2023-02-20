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
            <h4 class="mb-sm-0 font-size-18">Advisor profile</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Advisors</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-9 col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm order-2 order-sm-1">
                        <div class="d-flex align-items-start mt-3 mt-sm-0">
                            <div class="flex-shrink-0">
                                <div class="avatar-xl me-3">
                                    @if(count($profile['gallery'])>0)
                                    <img src="{{$profile['gallery'][0]}}" alt="" class="img-fluid rounded-circle d-block">
                                    @else
                                    <img src="/assets/images/users/profile.png" alt="" class="img-fluid rounded-circle d-block">
                                    @endif
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div>
                                    <h5 class="font-size-16 mb-1">{{$profile['generals']['full_name']}}</h5>
                                    <p class="text-muted font-size-13">Date birth: {{$profile['generals']['date_birth']}}</p>

                                    <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                        <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>{{$profile['generals']['country']}}</div>
                                        <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>{{$profile['generals']['email']}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-auto order-1 order-sm-2">
                        <div class="d-flex align-items-start justify-content-end gap-2">
                            <div>
                                <button type="button" class="btn btn-soft-light"><i class="me-1"></i> Message</button>
                            </div>
                            <div>
                                <div class="dropdown">
                                    <button class="btn btn-link font-size-16 shadow-none text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" data-bs-toggle="tab" href="#about" role="tab">Curriculum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" data-bs-toggle="tab" href="#post" role="tab">Payments</a>
                    </li>
                </ul>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->

        <div class="tab-content">
            <div class="tab-pane active" id="overview" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">About</h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="pb-3">
                                <div class="row">
                                    <div class="col-xl-2">
                                        <div>
                                            <h5 class="font-size-15">Timezone :</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl">
                                        <div class="text-muted">
                                            <p class="mb-2">{{$profile['overview']['timezone']}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-3">
                                <div class="row">
                                    <div class="col-xl-2">
                                        <div>
                                            <h5 class="font-size-15">Category :</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl">
                                        <div class="text-muted">
                                            <p>{{$profile['overview']['category']}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-3">
                                <div class="row">
                                    <div class="col-xl-2">
                                        <div>
                                            <h5 class="font-size-15">Profession & Expertise :</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl">
                                        <div class="text-muted">
                                            <p class="mb-2">{{$profile['overview']['career']}} , {{$profile['overview']['expertise']}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-3">
                                <div class="row">
                                    <div class="col-xl-2">
                                        <div>
                                            <h5 class="font-size-15">Work address :</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl">
                                        <div class="text-muted">
                                            <p class="mb-2">{{$profile['overview']['work_address']}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-3">
                                <div class="row">
                                    <div class="col-xl-2">
                                        <div>
                                            <h5 class="font-size-15">Description :</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl">
                                        <div class="text-muted">
                                            <p class="mb-2">{{$profile['overview']['description']}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-3">
                                <div class="row">
                                    <div class="col-xl-2">
                                        <div>
                                            <h5 class="font-size-15">Languages :</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl">
                                        <div class="text-muted">
                                            @foreach($profile['overview']['languages'] as $lang)
                                            <p class="mb-2">* {{$lang}}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-3">
                                <div class="row">
                                    <div class="col-xl-2">
                                        <div>
                                            <h5 class="font-size-15">Rate per hour :</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl">
                                        <div class="text-muted">
                                            <p class="mb-2">${{$profile['overview']['rate_per_hour']}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end tab pane -->

            <div class="tab-pane" id="about" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Education degrees</h5>
                    </div>
                    <div class="card-body">
                        <div>
                            @foreach($profile['curriculum']['education_degrees'] as $edu)
                            <div class="pb-3">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div>
                                            <h5 class="font-size-15">____ :</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl">
                                        <div class="text-muted">
                                            <p class="mb-2">*****</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Job experience</h5>
                    </div>
                    <div class="card-body">
                        <div>
                           @foreach($profile['curriculum']['jobs_experience'] as $edu)
                            <div class="pb-3">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div>
                                            <h5 class="font-size-15">____ :</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl">
                                        <div class="text-muted">
                                            <p class="mb-2">*****</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
            </div>
            <!-- end tab pane -->

            <div class="tab-pane" id="post" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Generals</h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="pb-3">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div>
                                            <h5 class="font-size-15">Bank :</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl">
                                        <div class="text-muted">
                                            <p class="mb-2">{{$profile['payments']['bank']}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-3">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div>
                                            <h5 class="font-size-15">SWIFT, ABA or CLABE :</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl">
                                        <div class="text-muted">
                                            <p class="mb-2">{{$profile['payments']['clabe']}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-3">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div>
                                            <h5 class="font-size-15">RFC :</h5>
                                        </div>
                                    </div>
                                    <div class="col-xl">
                                        <div class="text-muted">
                                            <p class="mb-2">{{$profile['payments']['rfc']}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
            </div>
            <!-- end tab pane -->
        </div>
        <!-- end tab content -->
    </div>
    <!-- end col -->

    <div class="col-xl-3 col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Keywords</h5>

                <div class="d-flex flex-wrap gap-2 font-size-16">
                    @foreach($profile['keywords'] as $key)
                    <a href="#" class="badge badge-soft-primary">{{$key}}</a>
                    @endforeach
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Social media</h5>

                <div>
                    <ul class="list-unstyled mb-0">
                        <li>
                            @foreach($profile['social_networks'] as $key)
                            <a href="#" class="py-2 d-block text-muted"><i class="mdi mdi-web text-primary me-1"></i>***</a>
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Shortcuts</h5>
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0 me-3">
                                <div class="avatar-title bg-soft-light text-light rounded-circle font-size-22">
                                    <i class="bx bxs-user-circle"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div>
                                    <h5 class="font-size-14 mb-1">Advisor sales</h5>
                                    <p class="font-size-13 text-muted mb-0">Visit now</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="/advisors/reviews/1" class="list-group-item list-group-item-action">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0 me-3">
                                <div class="avatar-title bg-soft-light text-light rounded-circle font-size-22">
                                    <i class="bx bxs-user-circle"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div>
                                    <h5 class="font-size-14 mb-1">Advisor reviews</h5>
                                    <p class="font-size-13 text-muted mb-0">Visit now</p>
                                </div>
                            </div>
                        </div>
                    </a>
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