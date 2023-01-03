<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	@include('includes.head')
</head>
<body class="layout-sticky-subnav layout-default ">
@include('includes.preloader')
    <div class="page-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card card-group-row__card o-hidden border-0">
                        <div class="card-body d-flex flex-column">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="form-group text-center">
                                        <img src="/assets/images/signup/logo.png" alt="Advice Me" height="100" width="100">
                                    </div>
					                @yield('content')
                                </div>
                            </div>
                        </div>
                        @yield('footer')
                    </div>

                </div>
            </div>
        </div>
    </div>
@include('includes.js')
</body>
</html>