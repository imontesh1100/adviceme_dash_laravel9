<!DOCTYPE html>
<html data-wf-page="643469f79aff21f41dff5728" data-wf-site="64345fa3491bcb5378e7a028">
<head>
    <meta charset="utf-8">
    <title>Domicilio</title>
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <meta name="_token" content="{{csrf_token()}}" />
    <style>
      .ui-autocomplete {
        border-radius: 10px !important;
      }
  </style>
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
            <h2 class="a-h3-heading-7 code">Domicilio laboral</h2>
          </div>
          <a href="#" class="navbar-brand w-nav-brand"><img src="/custom/refered/images/isotipe.svg" loading="lazy" width="29" alt="" class="image-10"></a>
        </div>
      </div>
    </div>
</div>
<div class="a-section-regular-6 data">
    <div class="a-account-container-regular">
      <div class="a-account-form-block-large adress w-form">
        <form id="addressForm" method="post" class="a-account-form-large" action="{{route('ajax.refered.update_address')}}">
          <div id="w-node-_8cb2875c-e0d8-d675-a0ed-f597aa27070e-8c481333" class="w-layout-grid a-account-form-grid">
            <input type="hidden" name="token" id="token" value="{{$sessionToken}}" />
            <input type="hidden" name="place_id" id="place_id" value="" />
            <div id="w-node-_8cb2875c-e0d8-d675-a0ed-f597aa27070f-8c481333" class="a-account-field-wrapper">
              <label for="address" class="a-detail-small-3">INGRESA TU DIRECCIÓN</label>
              <input type="text" id="address" class="a-account-text-field-2 w-input" maxlength="256" name="work_address" required>
            </div>
          </div>
          <div class="a-account-button-wrapper"><input type="submit" value="Continuar" data-wait="Please wait..." class="a-button-primary-6 w-button"></div>
          <div class="back">
            <div class="a-paragraph-small-7">Por seguridad este campo es obligatorio en esta categoría.</div>
          </div>
        </form>
      </div>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('custom/refered/js/address.js')}}"></script>
<script>
var addressesURL="{{$addressesURL}}"
$("#address").autocomplete({
  source: function(request, response) {
    let data = new FormData();
    data.append('token',document.getElementById('token').value)
    data.append('address',request.term)
    document.getElementById("loader").style.width = "100%";
    fetch(addressesURL,
    {
        method: 'POST',
        headers:{
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        body: data
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById("loader").style.width = "0%";
        if(data.status==true){
          response(data.addresses)
          // console.log(data.addresses)
        }
    }).catch(function(error) {
        document.getElementById("loader").style.width = "0%";
        Swal.fire('Something went wrong :(','','error')
    });
  },
  focus: function(event,ui){
    $("#address").val(ui.item.label);
    $("#place_id").val(ui.item.value);
    return false;
  },
  minLength: 2,
  select: function( event, ui ) {
    $("#address").val(ui.item.label);
    $("#place_id").val(ui.item.value);
    return false;
  }
});
</script>
</body>
</html>