<!DOCTYPE html>
<html data-wf-page="643469f79aff21f41dff5728" data-wf-site="64345fa3491bcb5378e7a028">
<head>
    <meta charset="utf-8">
    <title>Video</title>
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
            <h2 class="a-h3-heading-7 code">Video corto</h2>
          </div>
          <a href="#" class="navbar-brand w-nav-brand"><img src="/custom/refered/images/isotipe.svg" loading="lazy" width="29" alt="" class="image-10"></a>
        </div>
      </div>
    </div>
</div>
<div class="a-section-regular-6 data">
    <div class="a-account-container-regular">
      <div class="a-title-wrap-center-2">
        <div class="container-5 w-container" id="videoContainer">
          <img src="/custom/refered/images/Video.svg" id="videoImg" loading="lazy" width="380" height="400" class="image-9 video" onclick="document.getElementById('shortVideo').click()">
        </div>
        <p class="a-paragraph-regular-6">Da<a href="javascript:;" onclick="document.getElementById('shortVideo').click()" class="text-span-8"> click aquí </a>para subir video. Recomendamos sea formato vertical y pese menos de 10 MB.</p>
      </div>
      <div class="a-account-form-block-large adress w-form">
        <input type="hidden" value="{{route('ajax.refered.sendUrl')}}" id="ajaxSendUrl">
        <input type="hidden" value="{{$advisorID}}" id="advisorID">
        <input type="file" id="shortVideo" name="shortVideo" accept=".mp4">
        <form id="confirmForm" method="post" action="{{route('refered.confirm')}}">
          <input type="hidden" value="{{$sessionToken}}" name="token" id="token">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <div class="a-account-button-wrapper"><input type="submit" value="Continuar" id="btnSendUrl" class="a-button-primary-6 disabled w-button" disabled></div>
        </form>
      </div>
    </div>
  </div>
<script src="/assets/libs/jquery/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-analytics.js";
  import { getStorage,ref,uploadBytesResumable, getDownloadURL } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-storage.js";

  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyCBr0X1VspR6wCYzJ8iWfXpVj_8swTEkjA",
    authDomain: "adviceme-516e5.firebaseapp.com",
    projectId: "adviceme",
    storageBucket: "adviceme.appspot.com",
    messagingSenderId: "43983753749",
    appId: "1:43983753749:web:7f8e98b2226d644be7341c",
    measurementId: "G-E7GK9ND9QF"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const storage = getStorage();
  var advisorID=document.getElementById('advisorID').value;
  document.getElementById("shortVideo").onchange = function(e) {
    const file = e.target.files[0]
    let fileSize=file.size/1024/1024
    if(fileSize > 10){
      Swal.fire('Video should be smaller than 10MB','','error')
      return
    } 
    const metadata = {
         contentType: file.type
    };
    let filename=document.getElementById('token').value.substring(0,10);
    const storageRef = ref(storage,`Advisors/${advisorID}/videos/${filename}.mp4`);
    document.getElementById("loader").style.width = "100%";

    const uploadTask = uploadBytesResumable(storageRef, file, metadata);

    uploadTask.on('state_changed',
      (snapshot) => {
        // // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
        // const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
        // console.log('Upload is ' + progress + '% done');
        // switch (snapshot.state) {
        //   case 'paused':
        //     console.log('Upload is paused');
        //     break;
        //   case 'running':
        //     console.log('Upload is running');
        //     break;
        // }
      }, 
      (error) => {
        document.getElementById("loader").style.width = "0%";
      }, 
      () => {
        // Upload completed successfully, now we can get the download URL
        getDownloadURL(uploadTask.snapshot.ref).then((downloadURL) => {
          let data = new FormData();
          data.append('token',document.getElementById('token').value)
          data.append('videoUrl',downloadURL)
          fetch(document.getElementById('ajaxSendUrl').value,
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
                Swal.fire(data.msg,'','success').then(()=>{
                  document.getElementById('btnSendUrl').classList.remove('disabled')
                  document.getElementById('btnSendUrl').removeAttribute('disabled')
                  document.getElementById('videoContainer').innerHTML=`
                  <video width="380" height="400" class="image-9 video" controls>
                    <source src="${downloadURL}" type="video/mp4">
                    Your browser does not support the video.
                  </video>`
                })
              }else{
                  Swal.fire(data.msg,'','error');
              }
          }).catch(function(error) {
              document.getElementById("loader").style.width = "0%";
              Swal.fire('Something went wrong :(','','error')
          });
        });
      }
    );
  };
</script>
</body>
</html>