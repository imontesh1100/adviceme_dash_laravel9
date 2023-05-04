<!DOCTYPE html>
<html data-wf-page="643469f79aff21f41dff5728" data-wf-site="64345fa3491bcb5378e7a028">
<head>
    <meta charset="utf-8">
    <title>Ver health</title>
    <meta content="Personal data" property="og:title">
    <meta content="Personal data" property="twitter:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="/custom/refered/css/normalize.css" rel="stylesheet" type="text/css">
    <link href="/custom/refered/css/webflow.css" rel="stylesheet" type="text/css">
    <link href="/custom/refered/css/adviceme-referidos.webflow.css" rel="stylesheet" type="text/css">
    <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
    <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
    <link href="/custom/refered/images/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="/custom/refered/images/webclip.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="/assets/css/preloader.min.css" type="text/css" />
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="/assets/css/custom.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="/custom/refered/css/custom.css" rel="stylesheet" type="text/css" />
    <meta name="_token" content="{{csrf_token()}}" />
</head>
<body>
<div id="loader" class="overlay">
    <div class="spinner-border text-primary"></div>
</div>
<div class="navbar-logo-left wf-section">
    <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar-logo-left-container shadow-three w-nav">
        <div class="container-7">
            <div class="navbar-wrapper">
                <div class="menu-button w-nav-button">
                    <div class="icon w-icon-nav-menu"></div>
                </div>
                <nav role="navigation" class="nav-menu-wrapper w-nav-menu">
                    <ul role="list" class="nav-menu-two w-list-unstyled">
                        <li class="mobile-margin-top-10">
                            <a href="#" class="button-primary w-button">FAQ</a>
                        </li>
                    </ul>
                </nav>
                <div class="a-margin-bottom-73">
                    <h2 class="a-h3-heading-7 code">Datos personales </h2>
                </div>
                <a href="#" class="navbar-brand w-nav-brand"><img src="/custom/refered/images/isotipe.svg" loading="lazy" width="29" alt="" class="image-10"></a>
            </div>
        </div>
    </div>
</div>
<div class="a-section-regular-6 data">
    <div class="a-account-container-regular">
        <section class="features-table wf-section">
            <div class="container">
                <div class="comparison-table">
                    <div class="comparison-row">
                        <div id="w-node-_4c271340-f398-8821-2c49-2aa3e3993756-87683da3" class="@if($flags['personal']) comparison-positive @else comparison-negative @endif">
                            <span class="text-span-9">Datos personales</span>
                        </div>
                        <a id="w-node-_0fc4f53f-9606-6ae7-bf0f-f09957784058-87683da3" href="{{route('refered.personal_data',['sessionToken'=>$sessionToken])}}" class="link-2">Editar</a>
                    </div>
                    <div class="comparison-row">
                        <div id="w-node-_4c271340-f398-8821-2c49-2aa3e3993759-87683da3" class="@if($flags['documentation']) comparison-positive @else comparison-negative @endif">
                            <span class="text-span-9">Documentación</span>
                        </div>
                        <a id="w-node-_7b19e93d-c1d5-dcfa-bfef-ca3382c122cd-87683da3" href="{{route('refered.documentation',['sessionToken'=>$sessionToken])}}" class="link-2">Editar</a>
                    </div>
                    <div class="comparison-row">
                        <div id="w-node-_4c271340-f398-8821-2c49-2aa3e3993760-87683da3" class="@if($flags['category']) comparison-positive @else comparison-negative @endif">
                            <span class="text-span-9">Categoría, profesión y especialidad</span>
                        </div>
                        <a id="w-node-affd1e4a-7598-2ac5-9586-83ba994fa0ca-87683da3" href="{{route('refered.documentation',['sessionToken'=>$sessionToken])}}" class="link-2">Editar</a>
                    </div>
                    <div class="comparison-row">
                        <div id="w-node-_4c271340-f398-8821-2c49-2aa3e3993765-87683da3" class="@if($flags['description']) comparison-positive @else comparison-negative @endif">
                            <span class="text-span-9">Descripción</span>
                        </div>
                        <a id="w-node-affd1e4a-7598-2ac5-9586-83ba994fa0ca-87683da3" href="{{route('refered.bio',['sessionToken'=>$sessionToken,'idCategory'=>$idCategory])}}" class="link-2">Editar</a>
                    </div>
                    <div class="comparison-row">
                        <div id="w-node-_4c271340-f398-8821-2c49-2aa3e399376a-87683da3"  class="@if($flags['professional']) comparison-positive @else comparison-negative @endif" >
                            <span class="text-span-9">Cédula profesional</span>
                        </div>
                        <a id="w-node-_54fa71d4-4ec0-a736-5c9f-89b8c3a441e2-87683da3" href="{{route('refered.professional_id',['sessionToken'=>$sessionToken,'idExpertise'=>$idExpertise,'idCategory'=>$idCategory])}}" class="link-2">Editar</a>
                    </div>
                    <div class="comparison-row">
                        <div id="w-node-_4c271340-f398-8821-2c49-2aa3e399376f-87683da3" class="@if($flags['address']) comparison-positive @else comparison-negative @endif">
                            <span class="text-span-9">Domicilio laboral</span>
                        </div>
                        <a id="w-node-e0f44e7a-27f8-afed-def8-bfdc291c7a39-87683da3" href="{{route('refered.address',['sessionToken'=>$sessionToken])}}" class="link-2">Editar</a>
                    </div>
                </div>
            </div>
        </section>
        <div class="a-account-form-block-large ver w-form">
            <form method="post" class="a-account-form-large" action="{{route('refered.confirm')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="token" value="{{$sessionToken}}" />
                <div class="a-account-button-wrapper">
                    <input type="submit" value="Confirmar" @if($confirmAvailable) class="a-button-primary-6 w-button" @else class="a-button-primary-6 disabled w-button" disabled @endif>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="/assets/libs/jquery/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>