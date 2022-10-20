<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>.:: Kasnet | Intranet ::.</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>template/assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="<?= base_url() ?>template/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>template/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>template/assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/assets/css/forms/switches.css">
    <script src="<?= base_url() ?>template/plugins/sweetalerts/promise-polyfill.js"></script>
    <link href="<?= base_url() ?>template/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>template/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>template/assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
</head>
<body class="form">
    

    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <div class="d-flex user-meta">
                            <img src="<?= base_url() ?>template/assets/img/90x90.jpg" class="usr-profile" alt="avatar">
                            <div class="">
                                <p class="">Cambio&nbsp;de&nbsp;Contraseña</p>
                            </div>
                        </div>

                        <form id="form-cambia" class="text-left">
                            <div class="form">

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña">
                                </div>
                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password2" name="password2" type="password" class="form-control" placeholder="Repetir Contraseña">
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper toggle-pass">
                                        <p class="d-inline-block">Mostrar Contraseña</p>
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="field-wrapper">
                                        <button type="button" onclick="CambiarPass()" class="btn btn-primary" value="Login" name="login" >Cambiar Clave</button>
                                    </div>
                                    
                                </div>

                            </div>
                        </form>                        
                        <p class="terms-conditions">© 2020 All Rights Reserved. <a href="index.html">CORK</a> is a product of Designreset. <a href="javascript:void(0);">Cookie Preferences</a>, <a href="javascript:void(0);">Privacy</a>, and <a href="javascript:void(0);">Terms</a>.</p>

                    </div>                    
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="l-image">
            </div>
        </div>
    </div>

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?= base_url() ?>template/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url() ?>template/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url() ?>template/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <!--<script src="<?= base_url() ?>template/assets/js/authentication/form-1.js"></script>-->
    <script>
        var togglePassword = document.getElementById("toggle-password");

        if (togglePassword) {
            togglePassword.addEventListener('click', function() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            });
        }

        function CambiarPass(){
        var dataString = new FormData(document.getElementById('form-cambia'));
        var url="<?php echo site_url(); ?>Cochera/CambiarPass";
        if (Valida_Datos()) {
            $.ajax({
                url: url,
                data:dataString,
                type:"POST",
                processData: false,
                contentType: false,
                success:function (data) {
                    //alert("hola");
                    Swal.fire(
                        'Contraseña Actualizada!',
                        '',
                        'success'
                    ).then(function() {
                        window.location = "<?php echo site_url(); ?>Login/logout";
                    });
                }
            });
        }    
        else{
            bootbox.alert(msgDate)
            var input = $(inputFocus).parent();
            $(input).addClass("has-error");
            $(input).on("change", function () {
                if ($(input).hasClass("has-error")) {
                    $(input).removeClass("has-error");
                }
            });
        }
    }
    function Valida_Datos() {
        if($('#password').val() === "") {
            msgDate = 'Las contraseñas no debe estar vacío';
            $('#password').val('');
            $('#password2').val('');
            inputFocus = '#password';
            return false;
        }

        if($('#password2').val() === "") {
            msgDate = 'Debe repetir contraseña';
            $('#password').val('');
            $('#password2').val('');
            inputFocus = '#password';
            return false;
        }

        if($('#password').val() != $('#password2').val()) {
            msgDate = 'Las contraseñas deben ser iguales';
            $('#password').val('');
            $('#password2').val('');
            inputFocus = '#password';
            return false;
        }

        return true;
    }

    </script>
    <script src="<?php echo base_url(); ?>template/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>template/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>template/docs/js/bootbox.min.js"></script>
    <!--<script src="<?php echo base_url(); ?>template/assets/libs/sweetalert2/dist/sweetalert2.js"></script>-->
    <script src="<?php echo base_url(); ?>template/plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="<?php echo base_url(); ?>template/plugins/blockui/custom-blockui.js"></script>
    <script src="<?= base_url() ?>template/plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="<?= base_url() ?>template/plugins/sweetalerts/custom-sweetalert.js"></script>
</body>
</html>