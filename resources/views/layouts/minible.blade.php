

<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>eRUTILAHU</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('favicon.ico')}}">

        
        <!-- DataTables -->
        <link href="{{asset('minible/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('minible/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{asset('minible/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />     
        <link href="{{asset('minible/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />     
        <link href="{{asset('minible/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}"  rel="stylesheet" type="text/css" />  
       
        
        <!-- Bootstrap Css -->
        <link href="{{asset('minible/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('minible/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('minible/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        
        
        <!--LEAFLET-->

	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>

        <link rel="stylesheet" href="{{asset('leaflet/plugins/leaflet.wmslegend.css')}}" type="text/css">
  <script src="{{asset('leaflet/plugins/leaflet.wmslegend.js')}}" type="text/javascript"></script>  

	<link rel="stylesheet" href="{{asset('leaflet/plugins/L.Control.Pan.css')}}" type="text/css">
  <script src="{{asset('leaflet/plugins/L.Control.Pan.js')}}" type="text/javascript"></script>  

	<link rel="stylesheet" href="{{asset('leaflet/plugins/L.Control.Zoomslider.css')}}" type="text/css">
  <script src="{{asset('leaflet/plugins/L.Control.Zoomslider.js')}}" type="text/javascript"></script> 

	<link rel="stylesheet" href="{{asset('leaflet/plugins/L.Control.BetterScale.css')}}" type="text/css">
  <script src="{{asset('leaflet/plugins/L.Control.BetterScale.js')}}" type="text/javascript"></script>

	<link rel="stylesheet" href="{{asset('leaflet/plugins/L.Control.MousePosition.css')}}" type="text/css">
  <script src="{{asset('leaflet/plugins/L.Control.MousePosition.js')}}" type="text/javascript"></script>  

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.3.2/leaflet.draw.css"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.3.2/leaflet.draw.js"></script>    
	<link rel="stylesheet" href="{{asset('leaflet/plugins/leaflet.measurecontrol.css')}}" type="text/css">
	<script src="{{asset('leaflet/plugins/leaflet.measurecontrol.js')}}" type="text/javascript"></script>

	<link rel="stylesheet" href="{{asset('leaflet/plugins/easy-button.css')}}" type="text/css">
	<script src="{{asset('leaflet/plugins/easy-button.js')}}" type="text/javascript"></script>

	<link rel="stylesheet" href="{{asset('leaflet/plugins/L.Control.Sidebar.css')}}" type="text/css">
	<script src="{{asset('leaflet/plugins/L.Control.Sidebar.js')}}" type="text/javascript"></script>

	<script src="{{asset('leaflet/plugins/leaflet.ajax.js')}}" type="text/javascript"></script>

        
        <script>
            var pubdir="{{asset('')}}";
        </script>

        <style>
            .gede {
            zoom: 1;
            transform: scale(2);
            -ms-transform: scale(2);
            -webkit-transform: scale(2);
            -o-transform: scale(2);
            -moz-transform: scale(2);
            transform-origin: 0 0;
            -ms-transform-origin: 0 0;
            -webkit-transform-origin: 0 0;
            -o-transform-origin: 0 0;
            -moz-transform-origin: 0 0;
            }

            .datepicker {
                z-index: 99999 !important;
            }
        </style>
    </head>

    
    <body>

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="/" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('minible/images/logo-dark.png')}}" alt="" height="40">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('minible/images/logo-dark.png')}}" alt="" height="40">
                                </span>
                            </a>

                            <a href="../index.php" class="logo logo-light">
                         
                                <span class="logo-lg">
                                    <img src="{{asset('minible/images/logo-dark.png')}}" alt="" height="40">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="uil-search"></span>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="uil-search"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                    
                                <form class="p-3">
                                    <div class="m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                       

                      

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{asset('minible/images/user.png')}}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">
                                {{Auth::user()->name}}
                                </span>
                                <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">Ubah Password</span></a>
                                <a class="dropdown-item" href="{{url('logout')}}"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Sign out</span></a>
                            </div>
                        </div>

                       
            
                    </div>
                </div>
            </header>
            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="/" class="logo logo-dark">
                    <span class="logo-sm">
                            <img src="{{asset('minible/images/logo-dark.png')}}" alt="" height="40">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('minible/images/logo-dark.png')}}" alt="" height="40">
                        </span>
                    </a>

                   
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
                @if(Auth::user()->user_level==1)
                @include("layouts.sidebar_kelurahan")
                @else
                @include("layouts.sidebar_dinas")
                @endif
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content" id="utama">
                    @yield('utama')
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-10">
                                <script>document.write(new Date().getFullYear())</script>
                                 © Dinas Perumahan Rakyat dan Kawasan Permukiman serta Pertanahan Surabaya  
                            </div>
                            
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        

        
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{asset('minible/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('minible/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('minible/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('minible/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('minible/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{asset('minible/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('minible/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>
        <!-- Required datatable js -->
        <script src="{{asset('minible/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('minible/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
         <!-- Responsive examples -->
         <script src="{{asset('minible/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('minible/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
      
        <script src="{{asset('minible/libs/select2/js/select2.min.js')}}"></script>
        <script src="{{asset('minible/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
        
        <!-- App js -->
        
        <script src="{{asset('minible/js/app.js')}}"></script>
        <script src="{{asset('js/action2.js')}}"></script>
        <script src="{{asset('js/ajaxfileupload.js')}}"></script>

    </body>
</html>
