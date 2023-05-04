<!DOCTYPE html>
<html data-wf-page="643469f79aff21f41dff5728" data-wf-site="64345fa3491bcb5378e7a028">
<head>
    <meta charset="utf-8">
    <title>Professional ID</title>
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
            <h2 class="a-h3-heading-7 code">Cédula profesional</h2>
          </div>
          <a href="#" class="navbar-brand w-nav-brand"><img src="/custom/refered/images/isotipe.svg" loading="lazy" width="29" alt="" class="image-10"></a>
        </div>
      </div>
    </div>
</div>
<div class="a-section-regular-6 data">
  <div class="a-account-container-regular">
    <div class="a-account-form-block-large ot w-form">
      <form id="professionalForm" method="post" class="a-account-form-large" action="{{route('ajax.refered.professional_id')}}">
          <input type="hidden" name="token" id="token" value="{{$sessionToken}}" />
          <input type="hidden" name="id_expertise" value="{{$idExpertise}}">
          <input type="hidden" name="id_category" value="{{$idCategory}}">
          <div id="w-node-_8cb2875c-e0d8-d675-a0ed-f597aa27070e-77e9b2ea" class="w-layout-grid a-account-form-grid">
            <div class="a-account-field-wrapper pro">
              <label for="professional_id" class="a-detail-small-3">CÉDULA PROFESIONAL</label>
              <input type="text" class="a-account-text-field-2 w-input" maxlength="256" name="professional_id" required value="{{$expertise['professional_id'] ?? ''}}">
            </div>
            <div class="a-account-field-wrapper pro">
              <label for="institute" class="a-detail-small-3">INSTITUCIÓN QUE EMITIÓ TÍTULO</label>
              <input type="text" class="a-account-text-field-2 w-input" maxlength="256" name="institute" required value="{{$expertise['institute'] ?? ''}}">
            </div>
            <div class="a-account-field-wrapper pro">
              <label for="datebirth" class="a-detail-small-3">FECHA DE EMISIÓN</label>
              <input type="date" class="a-account-text-field-2 w-input" maxlength="256" name="professional_id_date" required 
              value="@if(isset($expertise['professional_id_date']) && $expertise['professional_id_date']!=null){{$expertise['professional_id_date']}}@endif">
            </div>
            <div class="a-account-field-wrapper pro">
              <label for="professional_id_date" class="a-detail-small-3">TELÉFONO</label>
              <input type="number" class="a-account-text-field-2 w-input" name="phone_number" required value="{{$expertise['phone_number'] ?? ''}}">
            </div>
          </div>
          <div class="a-account-button-wrapper"><input type="submit" value="Continuar" class="a-button-primary-6 w-button"></div>
          <div class="back">
            <div class="a-paragraph-small-7">Por seguridad estos campos son obligatorios en esta categoría.</div>
          </div>
        </form>
      </div>
    </div>
</div>
<script src="/assets/libs/jquery/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('custom/refered/js/professional.js')}}"></script>
</body>
</html>