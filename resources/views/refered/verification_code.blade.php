<!DOCTYPE html>
<html data-wf-page="64345fa3491bcbb029e7a029" data-wf-site="64345fa3491bcb5378e7a028">
<head>
    <meta charset="utf-8">
    <title>Adviceme</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
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
    <div class="a-section-regular-6">
        <div class="a-account-wrapper">
            <div class="a-margin-bottom-73">
                <h2 class="a-h3-heading-7 code">Ingresa tu código de verificación</h2>
            </div>
            <div class="a-margin-bottom-70">
                <p class="a-paragraph-regular-4">Ingresa el código que te llego a este correo: </p>
                <span class="text-span-6">{{$email ?? '*******'}}</span>
            </div>
            <div class="a-account-form-block w-form">
                <form id="verificationForm" method="post" class="a-account-form" action="{{route('ajax.refered.verification')}}">
                    <div class="a-margin-bottom-72">
                        <div class="a-account-field-wrapper">
                            <label for="verificationCode" class="a-detail-small-3">CÓDIGO DE VERIFICACIÓN</label>
                            <input type="text" class="a-account-text-field-2 w-input" maxlength="50" name="verificationCode" required>
                            <input type="hidden" value="{{$email}}" name="email" id="email">
                        </div>
                    </div>
                    <input type="submit" value="Continuar" class="a-button-primary-6 w-button">
                </form>
            </div>
            <div class="a-account-forgot">
                <div class="a-paragraph-small-7">No recibiste código?</div>
                <a href="javascript:;" onclick="resendCode('{{$resendCodeUrl}}')" class="a-text-link-regular">Volver a enviar</a>
            </div>
        </div>
        <img src="/custom/refered/images/Ad.svg" loading="lazy" width="550" alt="" class="a-account-background-image-2">
    </div>
    <script src="/assets/libs/jquery/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('custom/refered/js/verification.js')}}"></script>
    <script src="{{asset('custom/refered/js/resendCode.js')}}"></script>
</body>
</html>