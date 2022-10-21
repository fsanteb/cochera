<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>.:: Cochera | Intranet ::.</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>template/assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="<?= base_url() ?>template/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>template/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>template/assets/css/structure.css" rel="stylesheet" type="text/css" class="structure" />
    <link href="<?= base_url() ?>template/assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <script src="<?= base_url() ?>template/docs/js/jquery-3.2.1.min.js"></script>
        <script src="<?= base_url() ?>template/plugins/sweetalerts/promise-polyfill.js"></script>
    <link href="<?= base_url() ?>template/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>template/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>template/assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
</head>
<body class="form">
    

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Recuperar Contraseña</h1>
                        <p class=""></p>
                        
                        <form class="text-left" id="frm_login2" name="frm_login2">
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <label for="username">DNI</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="dni" name="dni" type="text" class="form-control" placeholder="Ingrese DNI">
                                </div>

                                <div id="username-field" class="field-wrapper input">
                                    <div class="d-flex justify-content-between">
                                        <label for="username">Correo</label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="correo" name="correo" type="text" class="form-control" placeholder="Ingrese Correo">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    
                                    <div class="field-wrapper">
                                      <center><span role="alert" id="resultado" style="color:red;"></span></center><br>
                                        <button type="button" class="btn btn-primary" value="Login" name="login" id="submit" onclick="Recupera()">Recuperar</button>
                                    </div>
                                </div>

                                <p class="signup-link"><a href="<?= site_url('login') ?>">Iniciar Sesión</a></p>

                            </div>
                        </form>

                    </div>                    
                </div>
            </div>
        </div>
    </div>
</body>


</html>
<script type="text/javascript">
  $(document).ready(function() {
    
  });
  function Recupera(){
        $(document)
        .ajaxStart(function () {
            $.blockUI({
                message: '<svg> ... </svg>',
                fadeIn: 800,
                overlayCSS: {
                    backgroundColor: '#1b2024',
                    opacity: 0.8,
                    zIndex: 1200,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    color: '#fff',
                    zIndex: 1201,
                    padding: 0,
                    backgroundColor: 'transparent'
                }
            });
        })
        .ajaxStop(function () {
            $.blockUI({
                message: '<svg> ... </svg>',
                fadeIn: 800,
                timeout: 100,
                overlayCSS: {
                    backgroundColor: '#1b2024',
                    opacity: 0.8,
                    zIndex: 1200,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    color: '#fff',
                    zIndex: 1201,
                    padding: 0,
                    backgroundColor: 'transparent'
                }
            });
        });
        var dataString = new FormData(document.getElementById('frm_login2'));
        var url="<?php echo site_url(); ?>Cochera/Recuperar_Contrasenia";
        if (Valida_Datos()) {
          $.ajax({
                url: url,
                data:dataString,
                type:"POST",
                processData: false,
                contentType: false,
                success:function (data) {
                  
                  if(data=="error"){
                    Swal(
                      'Error!',
                      'No se encontró un registro con los datos ingresados',
                      'error'
                  ).then(function() {
                      
                  });
                }else{
                  Swal(
                      'Recuperación Exitosa!',
                      'Se envió su nueva contraseña. Revise su correo',
                      'success'
                  ).then(function() {
                    window.location = "<?php echo site_url(); ?>Login";
                  });
                }
              }
            });
        }    
        
    }
    function Valida_Datos() {
        if($('#dni').val().trim() === "") {
          Swal(
              'Advertencia!',
              'Debe Ingresar el DNI.',
              'warning'
          ).then(function() {
              //window.location = "<?php echo site_url(); ?>Kasnet/Ventas";
          });

          return false;
        }

        if($('#correo').val().trim() === "") {
          Swal(
              'Advertencia!',
              'Debe Ingresar el Correo.',
              'warning'
          ).then(function() {
              //window.location = "<?php echo site_url(); ?>Kasnet/Ventas";
          });

            return false;
        }
        

        valor = document.getElementById("correo").value;
          if( !(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(valor)) ) {
            Swal(
              'Advertencia!',
              'Correo Inválido.',
              'warning'
          ).then(function() {
              //window.location = "<?php echo site_url(); ?>Kasnet/Ventas";
          });
          return false;
        }

        return true;
    }
</script>



<script src="<?= base_url() ?>template/plugins/sweetalerts/sweetalert2.min.js"></script>
<script src="<?= base_url() ?>template/plugins/sweetalerts/custom-sweetalert.js"></script>
<script src="<?= base_url() ?>template/plugins/blockui/jquery.blockUI.min.js"></script>
<script src="<?= base_url() ?>template/plugins/blockui/custom-blockui.js"></script>



