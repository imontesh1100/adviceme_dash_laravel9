<!DOCTYPE html>
<html data-wf-page="643469f79aff21f41dff5728" data-wf-site="64345fa3491bcb5378e7a028">
<head>
    <meta charset="utf-8">
    <title>Personal data</title>
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
        <div class="a-title-wrap-center-2">
            <div class="container-5 w-container">
                <img src="{{'/custom/refered/images/user.svg'}}" loading="lazy" width="80" height="80" id="avatarImg" class="round-img"  onclick="document.getElementById('profileImage').click()">
            </div>
            <p class="a-paragraph-regular-6">Sube tu foto de perfil</p>
            <form id="profileImgForm" method="post" action="{{route('ajax.refered.profileImg')}}">
                <input type="file" name="profileImage" id="profileImage" accept="image/png, image/jpeg">
            </form>
        </div>
        <div class="a-account-form-block-large w-form">
            @if($errors->any())
                <p class="a-detail-small-3 text-white bg-danger mb-2">* {{$errors->first()}}</p>
            @endif
            <form id="personalDataForm" method="post" class="a-account-form-large" method="post" action="{{route('refered.update.personal_data')}}">
                <input type="hidden" name="token" id="token" value="{{$sessionToken}}" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div id="w-node-_8cb2875c-e0d8-d675-a0ed-f597aa27070e-1dff5728" class="w-layout-grid a-account-form-grid">
                    <div class="a-account-field-wrapper">
                        <label for="firstname" class="a-detail-small-3">NOMBRE</label>
                        <input type="text" class="a-account-text-field-2 w-input" maxlength="100" name="firstname" required value="{{$personalInfo['first_name'] ?? ''}}">
                    </div>
                    <div class="a-account-field-wrapper">
                        <label for="lastname" class="a-detail-small-3">APELLIDO</label>
                        <input type="text" class="a-account-text-field-2 w-input" maxlength="100" name="lastname" required value="{{$personalInfo['last_name'] ?? ''}}">
                    </div>
                    <div class="a-account-field-wrapper">
                        <label for="Email-5" class="a-detail-small-3">FECHA DE NACIMIENTO</label>
                        <input type="date" class="a-account-text-field-2 w-input" name="birthdate" min="1900-01-01" max="2005-12-31" required 
                        value="@php if($personalInfo['date_birth']!=null) echo date('Y-m-d',strtotime($personalInfo['date_birth'])) @endphp">
                    </div>
                    <div class="a-account-field-wrapper">
                        <label for="language" class="a-detail-small-3">IDIOMA</label>
                        <select id="language" name="language" required="" class="select-field w-select">
                        @php 
                            $langs = explode(",",$personalInfo['languages']);
                        @endphp
                        @foreach($languages as $lan)
                            <option value="{{$lan['id_language']}}" @if(in_array($lan['name_language'],$langs)) selected @endif>{{$lan['name_language']}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="a-account-field-wrapper">
                        <label for="rate" class="a-detail-small-3">TARIFA POR HORA</label>
                        <select id="rate" name="rate" required="" class="select-field w-select">
                            <option value="">Selecciona una opción...</option>
                        @foreach($rates as $rate)
                            <option value="{{$rate['id_rate']}}" @if($rate['id_rate']==$personalInfo['id_rate']) selected @endif>{{$rate['rate']}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="a-account-field-wrapper">
                        <label for="timezone" class="a-detail-small-3">ZONA HORARIA</label>
                        <select id="timezone" name="timezone" required="" class="select-field w-select">
                            <option value="">Selecciona una opción...</option>
                        @foreach($timezones as $time)
                            <option value="{{$time['id_time_zone']}}" @if($time['id_time_zone']==$personalInfo['id_time_zone']) selected @endif>{{$time['timezone']}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="a-account-button-wrapper"><input id="btnPersonal" type="submit" value="Continuar" class="a-button-primary-6 disabled w-button" disabled></div>
                <div class="back">
                    <div class="a-paragraph-small-7">Por seguridad estos campos son obligatorios en esta categoría.</div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('custom/refered/js/profileImage.js')}}"></script>
<script>
</script>
</body>
</html>