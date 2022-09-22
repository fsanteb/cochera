<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>.:: Cochera | Intranet ::.</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>template/assets/img/favicon.ico"/>
    <link href="<?= base_url() ?>template/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="<?= base_url() ?>template/assets/js/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="<?= base_url() ?>template/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>template/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>template/assets/css/structure.css" rel="stylesheet" type="text/css" class="structure" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="<?= base_url() ?>template/assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>template/plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="<?= base_url() ?>template/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>template/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" class="dashboard-analytics" />

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/plugins/dropify/dropify.min.css">
    <link href="<?= base_url() ?>template/assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/plugins/table/datatable/dt-global_style.css">
    <link href="<?= base_url() ?>template/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>template/assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />

    <script src="<?= base_url() ?>template/plugins/sweetalerts/promise-polyfill.js"></script>
    <link href="<?= base_url() ?>template/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>template/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>template/assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<body class="dashboard-analytics">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item theme-logo">
                    <a href="<?= site_url('Cochera') ?>">
                        <img src="<?php if($_SESSION['usuario'][0]['foto']!=""){echo $_SESSION['usuario'][0]['foto'];}else{echo base_url()."template/assets/img/90x90.jpg";}?>" class="navbar-logo" alt="logo">
                    </a>
                </li>
            </ul>

            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg></a>

            <ul class="navbar-item flex-row search-ul">
                <!--<li class="nav-item align-self-center search-animated">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <form class="form-inline search-full form-inline search" role="search">
                        <div class="search-bar">
                            <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                        </div>
                    </form>
                </li>-->
            </ul>
            <ul class="navbar-item flex-row navbar-dropdown">
                <!--<li class="nav-item dropdown language-dropdown more-dropdown">
                    <div class="dropdown  custom-dropdown-icon">
                        <a class="dropdown-toggle btn" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url() ?>template/assets/img/ca.png" class="flag-width" alt="flag"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>

                        <div class="dropdown-menu dropdown-menu-right animated fadeInUp" aria-labelledby="customDropdown">
                            <a class="dropdown-item" data-img-value="de" data-value="German" href="javascript:void(0);"><img src="<?= base_url() ?>template/assets/img/de.png" class="flag-width" alt="flag"> German</a>
                            <a class="dropdown-item" data-img-value="jp" data-value="Japanese" href="javascript:void(0);"><img src="<?= base_url() ?>template/assets/img/jp.png" class="flag-width" alt="flag"> Japanese</a>
                            <a class="dropdown-item" data-img-value="fr" data-value="French" href="javascript:void(0);"><img src="<?= base_url() ?>template/assets/img/fr.png" class="flag-width" alt="flag"> French</a>
                            <a class="dropdown-item" data-img-value="ca" data-value="English" href="javascript:void(0);"><img src="<?= base_url() ?>template/assets/img/ca.png" class="flag-width" alt="flag"> English</a>
                        </div>
                    </div>
                </li>-->
                
                <!--<li class="nav-item dropdown message-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="messageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg><span class="badge badge-primary"></span>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="messageDropdown">
                        <div class="">
                            <a class="dropdown-item">
                                <div class="">

                                    <div class="media">
                                        <div class="user-img">
                                            <div class="avatar avatar-xl">
                                                <span class="avatar-title rounded-circle">KY</span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="">
                                                <h5 class="usr-name">Kara Young</h5>
                                                <p class="msg-title">ACCOUNT UPDATE</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </a>
                            <a class="dropdown-item">
                                <div class="">
                                    <div class="media">
                                        <div class="user-img">
                                            <div class="avatar avatar-xl">
                                                <span class="avatar-title rounded-circle">DA</span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="">
                                                <h5 class="usr-name">Daisy Anderson</h5>
                                                <p class="msg-title">ACCOUNT UPDATE</p>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </a>
                            <a class="dropdown-item">
                                <div class="">

                                    <div class="media">
                                        <div class="user-img">
                                            <div class="avatar avatar-xl">
                                                <span class="avatar-title rounded-circle">OG</span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="">
                                                <h5 class="usr-name">Oscar Garner</h5>
                                                <p class="msg-title">ACCOUNT UPDATE</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </a>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown notification-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span class="badge badge-success"></span>
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="notificationDropdown">
                        <div class="notification-scroll">

                            <div class="dropdown-item">
                                <div class="media server-log">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg>
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Server Rebooted</h6>
                                            <p class="">45 min ago</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-item">
                                <div class="media ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Licence Expiring Soon</h6>
                                            <p class="">8 hrs ago</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-item">
                                <div class="media file-upload">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Kelly Portfolio.pdf</h6>
                                            <p class="">670 kb</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>-->

                <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php if($_SESSION['usuario'][0]['foto']!=""){echo $_SESSION['usuario'][0]['foto'];}else{echo base_url()."template/assets/img/90x90.jpg";}?>" alt="admin-profile" class="img-fluid">
                    </a>
                    <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="userProfileDropdown">
                        <div class="user-profile-section">
                            <div class="media mx-auto">
                                <img src="<?php if($_SESSION['usuario'][0]['foto']!=""){echo $_SESSION['usuario'][0]['foto'];}else{echo base_url()."template/assets/img/90x90.jpg";}?>" class="img-fluid mr-2" alt="avatar">
                                <div class="media-body">
                                    <h5><?php echo $_SESSION['usuario'][0]['usuario_nombres']; ?></h5>
                                    <p><?php echo $_SESSION['usuario'][0]['nom_nivel']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-item">
                            <a href="<?= site_url('Cochera/Perfil') ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <span>Mi Perfil</span>
                            </a>
                        </div>
                        <!--<div class="dropdown-item">
                            <a href="apps_mailbox.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> <span>My Inbox</span>
                            </a>
                        </div>-->
                        <div class="dropdown-item">
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> <span>Cambiar Contraseña</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="<?= site_url('login/logout') ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Cerrar Sesión</span>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
    </div>

    <div id="ModalRegistro" class="modal animated fadeInUp custo-fadeInUp bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="ModalRegistro" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                
            </div>
        </div>
    </div>

    <div id="ModalUpdate" class="modal animated fadeInRight custo-fadeInRight bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="ModalUpdate" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                
            </div>
        </div>
    </div>
    <div id="Modal_Full" class="modal fade bd-example-modal-xl" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                
            </div>
        </div>
    </div>
    <div id="Modal_UpdateFull" data-backdrop="static" data-keyboard="false" class="modal animated fadeInRight custo-fadeInRight bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="ModalUpdateSlide" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                
            </div>
        </div>
    </div>
    <div id="Modal_Update" data-backdrop="static" data-keyboard="false" class="modal animated fadeInRight custo-fadeInRight bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="ModalUpdateSlide" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="background-color: honeydew;">
                
            </div>
        </div>
    </div>
    <div id="Modal_IMG" class="modal animated zoomInUp custo-zoomInUp bd-example-modal-xl" data-backdrop="static" data-keyboard="false" role="dialog" tabindex="-1" role="dialog" aria-labelledby="ModalUpdate" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Vista Previa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 row">
                        <div class="form-group col-sm-12">
                            <div id="datos_ajax"></div>
                            <input type="hidden" name="rutadni" id="rutadni" value= '<?php echo base_url() ?>'>
                                <div align="center" id="dni"></div>        
                            </div>
                        </div>

                    </div>       
                    <div class="modal-footer">      
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url() ?>template/docs/js/jquery-3.2.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#ModalRegistro").on("show.bs.modal", function(e) {
                var link = $(e.relatedTarget);
                $(this).find(".modal-content").load(link.attr("ModalRegistro"));
            });
            $("#ModalUpdate").on("show.bs.modal", function(e) {
                var link = $(e.relatedTarget);
                $(this).find(".modal-content").load(link.attr("ModalUpdate"));
            });
            $("#Modal_Full").on("show.bs.modal", function(e) {
                var link = $(e.relatedTarget);
                $(this).find(".modal-content").load(link.attr("modal_full"));
            });
            $("#Modal_UpdateFull").on("show.bs.modal", function(e) {
                var link = $(e.relatedTarget);
                $(this).find(".modal-content").load(link.attr("modal_updatefull"));
            });
            $("#Modal_Update").on("show.bs.modal", function(e) {
                var link = $(e.relatedTarget);
                $(this).find(".modal-content").load(link.attr("modal_update"));
            });
        });

    </script>