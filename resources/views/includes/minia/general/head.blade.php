<meta charset="utf-8" />
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="/assets/images/favicon.ico">
<link href="/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/assets/css/preloader.min.css" type="text/css" />
<link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<link href="/assets/css/custom.css" id="app-style" rel="stylesheet" type="text/css" />
<meta name="_token" content="{{csrf_token()}}" />
@stack('css')
