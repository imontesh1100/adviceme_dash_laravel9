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
    <div class="a-section-regular-6 refered-section active" id="section1">
        <div class="a-account-wrapper">
        <div class="a-margin-bottom-73"><img src="/custom/refered/images/isotipe.svg" loading="lazy" alt="" class="symbol-small advisors">
            <h2 class="a-h3-heading-6">Bienvenido</h2>
        </div>
        <div class="a-margin-bottom-70">
            <p class="a-paragraph-regular-4">Crea una cuenta como advisor</p>
        </div>
        <div class="a-account-form-block w-form">
            <form id="referedStep1" method="post" class="a-account-form" action="{{route('ajax.refered.step1')}}">
                <div class="a-margin-bottom-72">
                    <div class="a-account-field-wrapper">
                        <label for="email" class="a-detail-small-3">Email</label>
                        <input type="email" class="a-account-text-field w-input" maxlength="256" name="email" id="email" required>
                    </div>
                </div>
                <div class="a-margin-bottom-71">
                    <div class="a-account-field-wrapper">
                        <label for="country" class="a-detail-small-3">PAÍS</label>
                        <select id="country" name="country" required class="select-field w-select">
                            <option value="">Selecciona</option>
                            @foreach($countries as $country)
                                <option value="{{$country['id_country']}}">{{$country['name_country']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="a-margin-bottom-70">
                    <div class="a-account-forgot">
                        <div class="a-paragraph-small-7">Ya tienes cuenta?</div>
                        <a href="#" class="a-text-link-regular">Da click aquí</a>
                    </div>
                </div>
                <input type="hidden" name="parent" value="{{$parentCode}}">
                <input type="submit" value="Crear" class="a-button-primary-6 w-button">
            </form>
        </div>
        <div class="a-account-forgot">
            <div class="a-paragraph-small-7">Términos y condiciones de uso</div>
        </div>
        </div><img src="/custom/refered/images/Ad.svg" loading="lazy" width="700" alt="" class="a-account-background-image">
    </div>
    <div class="a-section-regular-6 refered-section" id="section2">
        <div class="a-account-wrapper">
            <div class="a-margin-bottom-73">
                <h2 class="a-h3-heading-7 code">Ingresa tu código de verificación</h2>
            </div>
            <div class="a-margin-bottom-70">
                <p class="a-paragraph-regular-4">Ingresa el código que te llego a este correo: <span class="text-span-6" id="emailPlaceholder">-------</span></p>
            </div>
            <div class="a-account-form-block w-form">
                <form id="referedStep2" method="post" class="a-account-form" action="{{route('ajax.refered.step2')}}">
                    <div class="a-margin-bottom-72">
                        <div class="a-account-field-wrapper">
                            <label for="verificationCode" class="a-detail-small-3">CÓDIGO DE VERIFICACIÓN</label>
                            <input type="text" id="verificationCode" class="a-account-text-field-2 w-input" maxlength="50" name="verificationCode" required>
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
    <div class="a-section-regular-6 refered-section" id="section3">
        <div class="a-account-container-regular">
            <div class="a-title-wrap-center-2">
                <div class="a-margin-bottom-73">
                    <h2 class="a-h3-heading-7 code">Completa tus datos personales </h2>
                </div>
                <div class="container-5 w-container">
                    <img src="/custom/refered/images/avatar.png" id="avatarImg" class="round-img" width="80" height="80" 
                    onclick="document.getElementById('profileImage').click()">
                </div>
                <form id="profileImgForm" method="post" action="{{route('ajax.refered.profileImg')}}">
                    <input type="file" name="profileImage" id="profileImage" accept="image/png, image/jpeg">
                </form>
                <p class="a-paragraph-regular-6">Sube tu foto de perfil</p>
            </div>
            <div class="a-account-form-block-large w-form">
                <form id="referedStep3" method="post" class="a-account-form-large" method="post" action="{{route('ajax.refered.step3')}}">
                    <input type="hidden" name="token" id="token" />
                    <div id="w-node-_8cb2875c-e0d8-d675-a0ed-f597aa27070e-1dff5728" class="w-layout-grid a-account-form-grid">
                        <div class="a-account-field-wrapper">
                            <label for="firstname" class="a-detail-small-3">NOMBRE</label>
                            <input type="text" class="a-account-text-field-2 w-input" maxlength="100" name="firstname" required>
                        </div>
                        <div class="a-account-field-wrapper">
                            <label for="lastname" class="a-detail-small-3">APELLIDO</label>
                            <input type="text" class="a-account-text-field-2 w-input" maxlength="100" name="lastname" required>
                        </div>
                        <div class="a-account-field-wrapper">
                            <label for="Email-5" class="a-detail-small-3">FECHA DE NACIMIENTO</label>
                            <input type="date" class="a-account-text-field-2 w-input" name="birthdate" min="1900-01-01" max="2005-12-31" required>
                        </div>
                        <div class="a-account-field-wrapper">
                            <label for="language" class="a-detail-small-3">IDIOMAS</label>
                            <select id="language" name="language[]" required="" class="select-field w-select" multiple>
                            </select>
                        </div>
                        <div class="a-account-field-wrapper">
                            <label for="rate" class="a-detail-small-3">TARIFA POR HORA</label>
                            <select id="rate" name="rate" required="" class="select-field w-select">
                            </select>
                        </div>
                        <div class="a-account-field-wrapper">
                            <label for="timezone" class="a-detail-small-3">ZONA HORARIA</label>
                            <select id="timezone" name="timezone" required="" class="select-field w-select">
                            </select>
                        </div>
                    </div>
                    <div class="a-account-button-wrapper"><input type="submit" value="Continuar" class="a-button-primary-6 w-button"></div>
                </form>
            </div>
        </div>
    </div>
    <div class="a-section-regular-6 refered-section" id="section4">
        <div class="a-account-container-regular">
        <div class="a-title-wrap-center-2">
            <div class="a-margin-bottom-73"><img src="https://uploads-ssl.webflow.com/64094b705054f695f34b745a/641a06e9fe9ea35510a612ea_isotipe.svg" loading="lazy" alt="" class="symbol-small advisors">
            <h2 class="a-h3-heading-7 code">Favor de continuar tu proceso de registro desde nuestra app</h2>
            </div>
            <p class="a-paragraph-regular-6">Muchas gracias por tu tiempo, descarga nuestra app para continuar con tu proceso de creación de cuenta como advisor y disfrutar de todos los beneficios. Inicia sesión con el mismo correo que registraste.</p>
            <div class="container-5 w-container"><img src="/custom/refered/images/download-on-the-app-store-apple-logo-svgrepo-com.svg" loading="lazy" width="138" alt="" class="image-8"><img src="/custom/refered/images/android.svg" loading="lazy" width="138" alt="" class="image-8"></div>
            <!-- <div class="a-account-forgot">
            <div class="a-paragraph-small-8">Cerrar ventana</div>
            <a href="javascript:;" class="a-text-link-regular" onclick="window.close()">Da click aquí</a>
            </div> -->
        </div>
        </div>
    </div>
    <script src="/assets/libs/jquery/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('custom/refered/js/step1.js')}}"></script>
    <script src="{{asset('custom/refered/js/step2.js')}}"></script>
    <script src="{{asset('custom/refered/js/step3.js')}}"></script>
    <script src="{{asset('custom/refered/js/profileImage.js')}}"></script>
    <script src="{{asset('custom/refered/js/resendCode.js')}}"></script>
    <script>
        window.onbeforeunload = function() {
            return "Data will be lost if you leave the page, are you sure?";
        };
    </script>
</body>
</html>