@extends('layouts.minia.login')
@section('title', 'Register | Adviceme')
@section('content')
<div class="container-fluid p-0">
    <div class="row g-0">
        <div class="col-xxl-3 col-lg-4 col-md-5">
            <div class="auth-full-page-content d-flex p-sm-5 p-4">
                <div class="w-100">
                    <div class="d-flex flex-column h-100">
                        <div class="mb-4 mb-md-5 text-center">
                            <a href="" class="d-block auth-logo">
                                <img src="/assets/images/adviceme.svg" alt="" height="28">
                            </a>
                        </div>
                        <div class="auth-content my-auto">
                            <div class="text-center">
                                <h5 class="mb-0">Register Account</h5>
                                <p class="text-muted mt-2">Sign up to continue to Adviceme</p>
                            </div>
                            <form class="mt-4 pt-2" action="/home">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" placeholder="Enter username">
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <label class="form-label">Password</label>
                                        </div>
                                    </div>
                                    
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                        <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <p class="mb-0 font-size-12">By registering you agree to the Adviceme <a href="#" class="text-primary">Terms of Use</a></p>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Sign Up</button>
                                </div>
                            </form>

                            <div class="mt-5 text-center">
                                <p class="text-muted mb-0">Already have an account ? <a href="/login" class="text-primary fw-semibold"> Login now </a> </p>
                            </div>
                        </div>
                        <div class="mt-4 mt-md-5 text-center">
                            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Developed by AMG ARTS</p>
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