<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	@include('includes.minia.login.head')
</head>
<body>
@include('includes.minia.loader')
    <div class="auth-page">
        @yield('content')
    </div>
</body>
@include('includes.minia.login.js')
</html>