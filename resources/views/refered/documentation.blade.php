<!DOCTYPE html>
<html data-wf-page="643469f79aff21f41dff5728" data-wf-site="64345fa3491bcb5378e7a028">
<head>
    <meta charset="utf-8">
    <title>ID Photo</title>
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
          <div class="menu-button w-nav-button"><img src="/custom/refered/images/back.svg" loading="lazy" width="10" alt="" class="image-11"></div>
          <nav role="navigation" class="nav-menu-wrapper w-nav-menu">
            <ul role="list" class="nav-menu-two w-list-unstyled">
              <li class="mobile-margin-top-10">
                <a href="#" class="button-primary w-button">FAQ</a>
              </li>
            </ul>
          </nav>
          <div class="a-margin-bottom-73">
            <h2 class="a-h3-heading-7 code">Documentación</h2>
          </div>
          <a href="#" class="navbar-brand w-nav-brand"><img src="/custom/refered/images/isotipe.svg" loading="lazy" width="29" alt="" class="image-10"></a>
        </div>
      </div>
    </div>
</div>
<div class="a-section-regular-6 data">
    <div class="a-account-container-regular">
        <div class="a-title-wrap-center-2">
            <div class="container-5 w-container"><img id="idImage" src="/custom/refered/images/id.svg" loading="lazy" width="320" height="300" alt="" class="image-9" onclick="document.getElementById('idPhoto').click()"></div>
            <p class="a-paragraph-regular-6 mt-5">Da<a href="javascript:;" class="text-span-8" onclick="document.getElementById('idPhoto').click()"> click aquí </a>para subir una foto de tu INE o pasaporte.</p>
            <form id="idPhotoForm" method="post" action="{{route('ajax.refered.id_photo')}}">
                <input type="file" name="idPhoto" id="idPhoto" accept="image/png, image/jpeg">
            </form>
        </div>
        <div class="a-account-form-block-large other w-form">
            <form id="documentationForm" method="post" class="a-account-form-large" action="{{route('ajax.refered.documentation')}}">
                <input type="hidden" name="token" id="token" value="{{$sessionToken}}" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="w-layout-grid a-account-form-grid">
                    <div class="a-account-field-wrapper">
                        <label for="category" class="a-detail-small-3">CATEGORÍA</label>
                        <select id="category" name="category" required class="select-field w-select">
                            <option value="">Selecciona</option>
                            @foreach($categories as $cat)
                            <option value="{{$cat['id_category']}}">{{$cat['name_category']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="a-account-field-wrapper">
                        <label for="career" class="a-detail-small-3">PROFESIÓN</label>
                        <select id="career" name="career" required="" class="select-field w-select" disabled>
                            <option value="">Selecciona</option>
                        </select>
                    </div>
                    <div id="w-node-_8cb2875c-e0d8-d675-a0ed-f597aa270723-456229a2" class="a-account-field-wrapper">
                        <label for="expertise" class="a-detail-small-3">ESPECIALIDAD</label>
                        <select id="expertise" name="expertise" required="" class="select-field w-select" disabled>
                            <option value="">Selecciona</option>
                        </select>
                    </div>
                </div>
                <div class="a-account-button-wrapper">
                    <input type="submit" value="Continuar" class="a-button-primary-6 w-button">
                </div>
            </form>
        </div>
    </div>
</div>
<script src="/assets/libs/jquery/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('custom/refered/js/idPhoto.js')}}"></script>
<script src="{{asset('custom/refered/js/getCareers.js')}}"></script>
<script src="{{asset('custom/refered/js/getExpertises.js')}}"></script>
<script src="{{asset('custom/refered/js/documentation.js')}}"></script>
</body>
</html>