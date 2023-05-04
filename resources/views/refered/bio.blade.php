<!DOCTYPE html>
<html data-wf-page="643469f79aff21f41dff5728" data-wf-site="64345fa3491bcb5378e7a028">
<head>
    <meta charset="utf-8">
    <title>Bio</title>
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
            <h2 class="a-h3-heading-7 code">Biografía</h2>
          </div>
          <a href="#" class="navbar-brand w-nav-brand"><img src="/custom/refered/images/isotipe.svg" loading="lazy" width="29" alt="" class="image-10"></a>
        </div>
      </div>
    </div>
</div>
<div class="a-section-regular-6 data">
    <div class="a-account-container-regular">
        <div class="a-account-form-block-large other w-form">
            <form id="bioForm" method="post" class="a-account-form-large" action="{{route('ajax.refered.bio')}}">
            <input type="hidden" name="id_category" value="{{$idCategory}}">
            <input type="hidden" name="id_expertise" value="{{$idExpertise}}">
            <input type="hidden" name="token" id="token" value="{{$sessionToken}}" />
            <div id="w-node-_8cb2875c-e0d8-d675-a0ed-f597aa27070e-448ddec3" class="w-layout-grid a-account-form-grid">
                <div id="w-node-_33fce70e-bfb2-6196-02f3-c2adec21e8bc-448ddec3" class="a-account-field-wrapper">
                    <label for="Field-6" class="a-detail-small-3">BIOGRAFÍA</label>
                    <textarea required="" placeholder="Favor de escribir tu lio breve en máximo 250 palabras." maxlength="250" name="short_description" class="textarea bio w-node-_0a237d51-ef7c-814b-3916-176d714c552d-448ddec3 w-input">{{$bio['short_description'] ?? ''}}</textarea>
                </div>
                <div id="w-node-_64f8c4b9-1bec-6dad-a7b0-178a7e2059ae-448ddec3" class="a-account-field-wrapper">
                    <label for="Field-4" class="a-detail-small-3 secondary">3 COSAS QUE PUEDAS SOLUCIONAR PARA TUS CLIENTES</label>
                    <textarea required="" placeholder="Favor de escribir tu lio breve en máximo 100 palabras." maxlength="100" name="solution1" class="textarea secondary w-node-_64f8c4b9-1bec-6dad-a7b0-178a7e2059b1-448ddec3 w-input">{{$bio['solution1'] ?? ''}}</textarea>
                </div>
                <div id="w-node-c8111b62-3f88-ad2c-94e7-9c095517fa2b-448ddec3" class="a-account-field-wrapper">
                    <textarea required="" placeholder="Favor de escribir tu lio breve en máximo 100 palabras." maxlength="100" name="solution2" class="textarea secondary w-node-c8111b62-3f88-ad2c-94e7-9c095517fa2e-448ddec3 w-input">{{$bio['solution2'] ?? ''}}</textarea>
                </div>
                <div id="w-node-ece02993-5575-35c6-f6c9-e904cc5400a8-448ddec3" class="a-account-field-wrapper">
                    <textarea required="" placeholder="Favor de escribir tu lio breve en máximo 100 palabras." maxlength="100" name="solution3" class="textarea secondary w-node-ece02993-5575-35c6-f6c9-e904cc5400ab-448ddec3 w-input">{{$bio['solution3'] ?? ''}}</textarea>
                </div>
            </div>
            <div class="a-account-button-wrapper"><input type="submit" value="Continuar" data-wait="Please wait..." class="a-button-primary-6 w-button"></div>
            </form>
        </div>
    </div>
  </div>
<script src="/assets/libs/jquery/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('custom/refered/js/bio.js')}}"></script>
</body>
</html>