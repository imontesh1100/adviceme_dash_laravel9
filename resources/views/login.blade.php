@extends('layouts.minia.login')
@section('title', 'Login | Adviceme')
@section('content')
<div class="container-fluid p-0">
    <div class="row g-0">
        <div class="col-xxl-3 col-lg-4 col-md-5">
            <div class="auth-full-page-content d-flex p-sm-5 p-4">
                <div class="w-100">
                    <div class="d-flex flex-column h-100">
                        <div class="mt-5 mt-md-0 text-center">
                            <a href="#" class="d-block auth-logo">
                                <img src="/assets/images/adviceme.svg" alt="" height="35">
                            </a>
                        </div>
                        <div class="auth-content my-auto">
                            <!-- <div class="text-center">
                                <h5 class="mb-0">Welcome Back !</h5>
                                <p class="text-muted mt-2">Sign in to continue to Adviceme</p>
                            </div> -->
                            <form class="mt-4 pt-2" action="{{route('ajax.login')}}" id="loginForm" method="post"> 
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <label class="form-label">Password</label>
                                        </div>
                                        <!-- <div class="flex-shrink-0">
                                            <div class="">
                                                <a href="#" class="text-muted">Forgot password?</a>
                                            </div>
                                        </div> -->
                                    </div>
                                    
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" name="passwd" required>
                                        <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-check">
                                            <label class="form-check-label" for="remember-check">
                                                Remember me
                                            </label>
                                        </div>  
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary w-100 waves-effect waves-light blue-cs-bg" type="submit">Log In</button>
                                </div>
                            </form>

                            <!-- <div class="mt-5 text-center">
                                <p class="text-muted mb-0">Don't have an account ? <a href="/register" class="text-primary fw-semibold"> Sign up now </a> </p>
                            </div> -->
                        </div>
                        <div class="mt-4 mt-md-5 text-center">
                            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> adviceme SAPI. Crafted in Mexico by Epic Story</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end auth full page content -->
        </div>
        <!-- end col -->
        <div class="col-xxl-9 col-lg-8 col-md-7">
            <div class="auth-bg pt-md-5 p-4 d-flex"></div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>
@endsection
@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('custom/js/login.js')}}"></script>
@endpush

