<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard | Consultores</title>
    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap" rel="stylesheet">

    <!-- Fix Footer CSS -->
    <link type="text/css" href="/old/assets/vendor/fix-footer.css" rel="stylesheet">
    <!-- Material Design Icons -->
    <link type="text/css" href="/old/assets/css/material-icons.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link type="text/css" href="/old/assets/css/fontawesome.css" rel="stylesheet">
    <!-- Preloader -->
    <link type="text/css" href="/old/assets/css/preloader.css" rel="stylesheet">
    <!-- App CSS -->
    <link type="text/css" href="/old/assets/css/app.css" rel="stylesheet">
	<link rel="stylesheet" href="/old/assets/css/preloader-pre.css" />
</head>
<body class="layout-sticky-subnav layout-default">
    <div class="preloader">
        <div class="sk-double-bounce">
            <div class="sk-child sk-double-bounce1"></div>
            <div class="sk-child sk-double-bounce2"></div>
        </div>
    </div>
    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">
        <!-- Header -->
        <div id="header" class="mdk-header js-mdk-header mb-0" data-fixed data-effects="">
            <div class="mdk-header__content">
                <div class="navbar navbar-expand bg-white" id="default-navbar" data-primary>
                    <!-- Navbar Brand -->
                    <a href="/" class="navbar-brand mr-16pt">
                        <img class="navbar-brand-icon" src="/old/assets/images/logo/large.png" width="100" alt="advice me">
                    </a>
                    <!-- Navbar toggler -->
                    <button class="navbar-toggler w-auto mr-16pt d-block rounded-0" type="button" data-toggle="sidebar">
                        <span class="material-icons">short_text</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- // END Header -->
        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page-content ">
            <div class="pt-24pt">
                <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
                    <div class="flex d-flex flex-column flex-sm-row align-items-center mb-16pt mb-md-0">
                        <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                            <h2 class="mb-0">Pre-Registro</h2>
                            <span>{{date("d/m/Y")}}</span>
                        </div>
                    </div>
                    <div class="flex d-flex flex-column flex-sm-row justify-content-end mb-16pt mb-md-0">
                        <button class="btn btn-primary" onclick="CSVDownload()">Descargar</button>
                    </div>
                </div>
            </div>
            <div class="mdk-drawer-layout__content">
                <div class="page-section">
                    <div class="container page__container">
                        <div class="page-separator">
                            <div class="page-separator__text">Consultores</div>
                        </div>
                        <div class="card mb-lg-32pt">
                            <div class="table-responsive" data-toggle="lists" data-lists-values='["js-lists-folio", "js-lists-nombre", "js-lists-edad","js-lists-correo","js-lists-categoria","js-lists-genero","js-lists-ocupacion","js-lists-escolaridad","js-lists-recomendado","js-lists-precio","js-lists-dias","js-lists-horas","js-lists-fecha"]'>
                                <table class="table mb-0 thead-border-top-0 table-nowrap">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px;">
                                                <a href="javascript:void(0)">Folio</a>
                                            </th>
                                            <th style="width: 120px;">
                                                <a href="javascript:void(0)">Nombre</a>
                                            </th>
                                            <th style="width: 20px;">
                                                <a href="javascript:void(0)">Edad</a>
                                            </th>
                                            <th style="width: 50px;">
                                                <a href="javascript:void(0)">Correo</a>
                                            </th>
                                            <th style="width: 50px;">
                                                <a href="javascript:void(0)">Categoria</a>
                                            </th>
                                            <th style="width: 30px;">
                                                <a href="javascript:void(0)">Género</a>
                                            </th>
                                            <th style="width: 30px;">
                                                <a href="javascript:void(0)">Pais</a>
                                            </th>
                                            <th style="width: 40px;">
                                                <a href="javascript:void(0)">Ocupación</a>
                                            </th>
                                            <th style="width: 40px;">
                                                <a href="javascript:void(0)">Escolaridad</a>
                                            </th>
                                            <th style="width: 30px;">
                                                <a href="javascript:void(0)">Recomendado por:</a>
                                            </th>
                                            <th style="width: 50px;">
                                                <a href="javascript:void(0)">Precio x hora</a>
                                            </th>
                                            <th style="width: 50px;">
                                                <a href="javascript:void(0)">Dias x semana</a>
                                            </th>
                                            <th style="width: 50px;">
                                                <a href="javascript:void(0)">Horas</a>
                                            </th>
                                            <th style="width: 50px;">
                                                <a href="javascript:void(0)">Fecha de registro</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach($response["data"] as $a)
                                        <tr>
                                            <td class="text-50 js-lists-values-activity small">{{$a["id"] ?? '--'}}</td>
                                            <td class="text-50 js-lists-values-activity small">{{$a["fullname"] ?? '--'}}</td>
                                            <td class="text-50 js-lists-values-activity small">{{$a["age"]?? '--'}}</td>
                                            <td class="text-50 js-lists-values-activity small">{{$a["email"] ?? '--'}}</td>                            
                                            <td class="text-50 js-lists-values-activity small">{{$a["categories"] ?? '--'}}</td>                            
                                            <td class="text-50 js-lists-values-activity small">{{$a["gender"] ?? '--'}}</td>                            
                                            <td class="text-50 js-lists-values-activity small">{{$a["country"] ?? '--'}}</td>                            
                                            <td class="text-50 js-lists-values-activity small">{{$a["job"] ?? '--'}}</td>                            
                                            <td class="text-50 js-lists-values-activity small">{{$a["degree"] ?? '--'}}</td>                            
                                            <td class="text-50 js-lists-values-activity small">{{$a["recommended_by"] ?? '*'}}</td>                            
                                            <td class="text-50 js-lists-values-activity small">{{$a["cost"] ?? '--'}}</td>                            
                                            <td class="text-50 js-lists-values-activity small">{{$a["days"] ?? '--'}}</td>                            
                                            <td class="text-50 js-lists-values-activity small">{{$a["hours"] ?? '--'}}</td>                            
                                            <td class="text-50 js-lists-values-activity small">{{$a["created_at"] ?? '--'}}</td>                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer p-8pt">
                                <ul class="pagination justify-content-start pagination-xsm m-0">
                                    <li class="page-item @if($response['current_page']==1) disabled @endif">
                                        <a class="page-link" href="/pre-registro/consultores?page=1">
                                            <span>First</span>
                                        </a>
                                    </li>
                                    <li class="page-item @if(is_null($response['prev_page_url'])) disabled @endif">
                                        <a class="page-link" href="/pre-registro/consultores?page={{$response['current_page']-1}}" aria-label="Previous">
                                            <span aria-hidden="true" class="material-icons">chevron_left</span>
                                            <span>Prev</span>
                                        </a>
                                    </li>
                                    @if($response['current_page'] > 1)
                                    <li class="page-item">
                                        <a class="page-link" href="/pre-registro/consultores?page={{$response['current_page']-1}}">
                                            <span>{{$response['current_page']-1}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    <li class="page-item active">
                                        <a class="page-link" href="/pre-registro/consultores?page=$response['current_page']">
                                            <span>{{$response['current_page']}}</span>
                                        </a>
                                    </li>
                                    @if(!is_null($response['next_page_url']))
                                    <li class="page-item">
                                        <a class="page-link" href="/pre-registro/consultores?page={{$response['current_page']+1}}">
                                            <span>{{$response['current_page']+1}}</span>
                                        </a>
                                    </li>
                                    @endif
                                    <li class="page-item @if(is_null($response['next_page_url'])) disabled @endif">
                                        <a class="page-link" href="/pre-registro/consultores?page={{$response['current_page']+1}}" aria-label="Next">
                                            <span>Next</span>
                                            <span aria-hidden="true" class="material-icons">chevron_right</span>
                                        </a>
                                    </li>
                                    <li class="page-item @if($response['last_page']==$response['current_page']) disabled @endif">
                                        <a class="page-link" href="/pre-registro/consultores?page={{$response['last_page']}}">
                                            <span>Last</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // END Header Layout Content -->
    </div>
    <!-- // END Header Layout -->
    <!-- drawer -->
    <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
        <div class="mdk-drawer__content">
            <div class="sidebar bg-white sidebar-left">
                <a href="#" class="sidebar-brand ">
                    <!-- <img class="sidebar-brand-icon" src="assets/images/illustration/student/128/white.svg" alt="Luma"> -->
                    <span>Advice Me</span>
                </a>
                <ul class="sidebar-menu">
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="/pre-registro/consultores">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">brightness_auto</span>
                            <span class="sidebar-menu-text">Consultores</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="/pre-registro/usuarios">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">person_outline</span>
                            <span class="sidebar-menu-text">Usuarios</span>
                        </a>
                    </li>
                    <!--<li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="/pre-registro/sign-out">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">close</span>
                            <span class="sidebar-menu-text">Sign out</span>
                        </a>
                    </li>-->
                </ul>
            </div>
        </div>
    </div>
    <!-- // END drawer -->
    <div id="preloader">
		<div id="loader"></div>
	</div>
    <!-- jQuery -->
    <script src="/old/assets/vendor/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="/old/assets/js/custom/pre-consultores.js"></script>

    <!-- Bootstrap -->
    <script src="/old/assets/vendor/popper.min.js"></script>
    <script src="/old/assets/vendor/bootstrap.min.js"></script>

    <!-- DOM Factory -->
    <script src="/old/assets/vendor/dom-factory.js"></script>

    <!-- MDK -->
    <script src="/old/assets/vendor/material-design-kit.js"></script>

    <!-- Fix Footer -->
    <script src="/old/assets/vendor/fix-footer.js"></script>

    <!-- App JS -->
    <script src="/old/assets/js/app.js"></script>


    <!-- Global Settings -->
    <script src="/old/assets/js/settings.js"></script>

    <!-- Moment.js -->
    <script src="/old/assets/vendor/moment.min.js"></script>
    <script src="/old/assets/vendor/moment-range.min.js"></script>

    <!-- Flatpickr -->
    <script src="/old/assets/vendor/flatpickr/flatpickr.min.js"></script>
    <script src="/old/assets/js/flatpickr.js"></script>

    <!-- Chart.js -->
    <script src="/old/assets/vendor/Chart.min.js"></script>
    <script src="/old/assets/js/chartjs.js"></script>
    <script src="/old/assets/js/chartjs-rounded-bar.js"></script>

    <!-- List.js -->
    <script src="/old/assets/vendor/list.min.js"></script>
    <script src="/old/assets/js/list.js"></script>
</body>
</html>