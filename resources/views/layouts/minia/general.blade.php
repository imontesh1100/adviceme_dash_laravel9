<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	@include('includes.minia.general.head')
</head>
<body>
    <div id="layout-wrapper">
        @include('includes.minia.general.header')
    </div>
    @include('includes.minia.general.sidebar')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    @include('includes.minia.general.footer')
    </div>
</body>
@include('includes.minia.general.js')
</html>