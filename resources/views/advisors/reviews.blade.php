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
            <h4 class="mb-sm-0 font-size-18">Advisor reviews</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Advisors</a></li>
                    <li class="breadcrumb-item active">Reviews</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-9 col-lg-8">
        @foreach([1,2,3] as $x)
        <div class="card-body">
            <div class="d-flex align-items-center mb-2">
                <div class="flex-shrink-0 me-3">
                    <img class="rounded-circle avatar-sm" src="/assets/images/users/avatar-2.jpg" alt="Generic placeholder image">
                </div>
                <div class="flex-grow-1">
                    <h5 class="font-size-14 mb-0">Humberto D. Champion</h5>
                    <small class="text-muted">support@domain.com</small>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6 col-lg-2">12:00 to 14:00</div>
                <div class="col-6 col-lg-2">June 22,2021</div>
            </div>
            <p>Praesent dui ex, dapibus eget mauris ut, finibus vestibulum enim. Quisque arcu leo, facilisis in fringilla id, luctus in tortor. Nunc vestibulum est quis orci varius viverra. Curabitur dictum volutpat massa vulputate molestie. In at felis ac velit maximus convallis.
            </p>
            <div class="row">
                <div class="col-3"><h4 class="font-size-16">Quality: 10</h4></div>
                <div class="col-3"><h4 class="font-size-16">Attention: 10</h4></div>
                <div class="col-3"><h4 class="font-size-16">Reported: No</h4></div>
            </div>
            <hr/>
        </div>
        @endforeach
        <div class="container mb-3">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">1</button>
                <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">2</button>
                <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">3</button>
            </div>   
        </div>
    </div>
    <!-- end col -->

    <div class="col-xl-3 col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Keywords</h5>

                <div class="d-flex flex-wrap gap-2 font-size-16">
                    <a href="#" class="badge badge-soft-primary">Photoshop</a>
                    <a href="#" class="badge badge-soft-primary">illustrator</a>
                    <a href="#" class="badge badge-soft-primary">HTML</a>
                    <a href="#" class="badge badge-soft-primary">CSS</a>
                    <a href="#" class="badge badge-soft-primary">Javascript</a>
                    <a href="#" class="badge badge-soft-primary">Php</a>
                    <a href="#" class="badge badge-soft-primary">Python</a>
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
                            <a href="#" class="py-2 d-block text-muted"><i class="mdi mdi-web text-primary me-1"></i>Facebook</a>
                            <a href="#" class="py-2 d-block text-muted"><i class="mdi mdi-web text-primary me-1"></i>Tik Tok</a>
                            <a href="#" class="py-2 d-block text-muted"><i class="mdi mdi-web text-primary me-1"></i>Instagram</a>
                            <a href="#" class="py-2 d-block text-muted"><i class="mdi mdi-web text-primary me-1"></i>Linkedin</a>
                            <a href="#" class="py-2 d-block text-muted"><i class="mdi mdi-web text-primary me-1"></i>Twitter</a>
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