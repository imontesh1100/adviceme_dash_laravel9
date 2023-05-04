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
</head>
<body>
    <div id="loader" class="overlay">
        <div class="spinner-border text-primary"></div>
    </div>
    <div class="a-section-regular-6">
        <div class="a-account-wrapper">
        <div class="a-margin-bottom-73"><img src="/custom/refered/images/isotipe.svg" loading="lazy" alt="" class="symbol-small advisors">
            <h2 class="a-h3-heading-6">Bienvenido</h2>
        </div>
        <div class="a-margin-bottom-70">
            <p class="a-paragraph-regular-4">Crea una cuenta como advisor</p>
        </div>
        <div class="a-account-form-block w-form">
            <form method="post" class="a-account-form" action="{{route('refered.verification',['parentCode'=>$parentCode])}}">
                <div class="a-margin-bottom-72">
                    <div class="a-account-field-wrapper">
                        @if($errors->any())
                            <p class="a-detail-small-3 text-white bg-danger mb-2">* {{$errors->first()}}</p>
                        @endif
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
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="submit" value="Crear" class="a-button-primary-6 w-button">
            </form>
        </div>
        <div class="a-account-forgot">
            <div class="a-paragraph-small-7">Términos y condiciones de uso</div>
        </div>
        </div><img src="/custom/refered/images/Ad.svg" loading="lazy" width="700" alt="" class="a-account-background-image">
    </div>
    <script src="/assets/libs/jquery/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>