<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Advisors</title>
    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap" rel="stylesheet">
    <!-- Perfect Scrollbar -->
    <link type="text/css" href="/assets/vendor/perfect-scrollbar.css" rel="stylesheet">
    <!-- Fix Footer CSS -->
    <link type="text/css" href="/assets/vendor/fix-footer.css" rel="stylesheet">
    <!-- Material Design Icons -->
    <link type="text/css" href="/assets/css/material-icons.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link type="text/css" href="/assets/css/fontawesome.css" rel="stylesheet">
    <!-- Preloader -->
    <link type="text/css" href="/assets/css/preloader.css" rel="stylesheet">
    <!-- App CSS -->
    <link type="text/css" href="/assets/css/app.css" rel="stylesheet">
    <!-- ion Range Slider -->
    <link type="text/css" href="/assets/css/ion-rangeslider.css" rel="stylesheet">

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
                        <img class="navbar-brand-icon" src="/assets/images/logo/large.png" width="100" alt="advice me">
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
                            <h2 class="mb-0">Requests</h2>
                            <span>23/12/2020</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mdk-drawer-layout__content">
                <div class="page-section">
                    <div class="container page__container">
                        <div class="page-separator">
                            <div class="page-separator__text">Advsors</div>
                        </div>
                        <div class="card mb-lg-32pt">
                            <div class="table-responsive" data-toggle="lists" data-lists-values='["js-lists-values-employee-name", "js-lists-values-employer-name", "js-lists-values-projects", "js-lists-values-activity", "js-lists-values-earnings"]'>
                                <table class="table mb-0 thead-border-top-0 table-nowrap">
                                    <thead>
                                        <tr>
                                            <th style="width: 18px;" class="pr-0">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input js-toggle-check-all" data-target="#users" id="customCheckAllusers">
                                                    <label class="custom-control-label" for="customCheckAllusers"><span class="text-hide">Toggle all</span></label>
                                                </div>
                                            </th>
                                            <th style="width: 120px;">
                                                <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-employee-name">NAME</a>
                                            </th>
                                            <th style="width: 50px;">
                                                <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-projects">PEN. REQUESTS</a>
                                            </th>
                                            <th style="width: 50px;">
                                                <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-projects">DEC. REQUESTS</a>
                                            </th>
                                            <th style="width: 50px;">
                                                <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-projects">ACC. REQUESTS</a>
                                            </th>
                                            <th style="width: 37px;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list" id="users">
                                        <tr>
                                            <td class="pr-0">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_users2">
                                                    <label class="custom-control-label" for="customCheck1_users2"><span class="text-hide">Check</span></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="media flex-nowrap align-items-center" style="white-space: nowrap;">
                                                    <div class="avatar avatar-sm mr-8pt">
                                                        <span class="avatar-title rounded-circle">CS</span>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="d-flex flex-column">
                                                            <p class="mb-0"><strong class="js-lists-values-employee-name">Connie Smith</strong></p>
                                                            <small class="js-lists-values-employee-email text-50"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-50 js-lists-values-activity small">10 pending</td>
                                            <td class="text-50 js-lists-values-activity small">30 declined</td>
                                            <td class="text-50 js-lists-values-activity small">50 acepted</td>
                                            <td>
                                                <a href="" class="chip chip-outline-primary">GO</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer p-8pt">
                                <ul class="pagination justify-content-start pagination-xsm m-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true" class="material-icons">chevron_left</span>
                                            <span>Prev</span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Page 1">
                                            <span>1</span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Page 2">
                                            <span>2</span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span>Next</span>
                                            <span aria-hidden="true" class="material-icons">chevron_right</span>
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
            <div class="sidebar bg-white sidebar-left" data-perfect-scrollbar>
                <a href="#" class="sidebar-brand ">
                    <!-- <img class="sidebar-brand-icon" src="assets/images/illustration/student/128/white.svg" alt="Luma"> -->
                    <span class="avatar avatar-xl sidebar-brand-icon h-auto">
                        <span class="avatar-title rounded bg-primary"><img src="/assets/images/illustration/student/128/white.svg" class="img-fluid" alt="logo" /></span>
                    </span>
                    <span>Adviceme</span>
                </a>
                <ul class="sidebar-menu">
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="#">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">home</span>
                            <span class="sidebar-menu-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="#">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">category</span>
                            <span class="sidebar-menu-text">Categories</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#components_menu1">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">brightness_auto</span>
                            Advisors
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse sm-indent" id="components_menu1">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="#">
                                    <span class="sidebar-menu-text">Request</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="#">
                                    <span class="sidebar-menu-text">Sales</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="#">
                                    <span class="sidebar-menu-text">Records</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#components_menu2">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">person_outline</span>
                            Clients
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse sm-indent" id="components_menu2">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="#">
                                    <span class="sidebar-menu-text">Request</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="#">
                                    <span class="sidebar-menu-text">Sales</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="#">
                                    <span class="sidebar-menu-text">Records</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" data-toggle="collapse" href="#components_menu3">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">book</span>
                            Brands
                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                        </a>
                        <ul class="sidebar-submenu collapse sm-indent" id="components_menu3">
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="#">
                                    <span class="sidebar-menu-text">Create brand</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="#">
                                    <span class="sidebar-menu-text">Brand advisors</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="#">
                                    <span class="sidebar-menu-text">Records</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button" href="#">
                                    <span class="sidebar-menu-text">Sales</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="#">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">face</span>
                            <span class="sidebar-menu-text">Create users</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="#">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">close</span>
                            <span class="sidebar-menu-text">Sign out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- // END drawer -->
    <!-- jQuery -->
    <script src="/assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="/assets/vendor/popper.min.js"></script>
    <script src="/assets/vendor/bootstrap.min.js"></script>

    <!-- Perfect Scrollbar -->
    <script src="/assets/vendor/perfect-scrollbar.min.js"></script>

    <!-- DOM Factory -->
    <script src="/assets/vendor/dom-factory.js"></script>

    <!-- MDK -->
    <script src="/assets/vendor/material-design-kit.js"></script>

    <!-- Fix Footer -->
    <script src="/assets/vendor/fix-footer.js"></script>

    <!-- App JS -->
    <script src="/assets/js/app.js"></script>


    <!-- Global Settings -->
    <script src="/assets/js/settings.js"></script>

    <!-- Moment.js -->
    <script src="/assets/vendor/moment.min.js"></script>
    <script src="/assets/vendor/moment-range.min.js"></script>

    <!-- Flatpickr -->
    <script src="/assets/vendor/flatpickr/flatpickr.min.js"></script>
    <script src="/assets/js/flatpickr.js"></script>

    <!-- Chart.js -->
    <script src="/assets/vendor/Chart.min.js"></script>
    <script src="/assets/js/chartjs.js"></script>
    <script src="/assets/js/chartjs-rounded-bar.js"></script>

    <!-- Chart.js Samples -->
    <script src="/assets/js/page.home-chart1.js"></script>
    <script src="/assets/js/page.home-chart2.js"></script>
    <script src="/assets/js/page.ecommerce.js"></script>


    <!-- List.js -->
    <script src="/assets/vendor/list.min.js"></script>
    <script src="/assets/js/list.js"></script>

    <!-- Tables -->
    <script src="/assets/js/toggle-check-all.js"></script>
    <script src="/assets/js/check-selected-row.js"></script>
</body>
</html>