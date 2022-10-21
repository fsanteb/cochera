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
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/assets/css/forms/switches.css">
    <script src="<?= base_url() ?>template/docs/js/jquery-3.2.1.min.js"></script>
</head>
<body class="form">
    

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Registrarse</h1>
                        <p class="">Inicie sesión en su cuenta para continuar.</p>
                        
                        <form class="text-left" id="frm_login" name="frm_login">
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <label for="username">USUARIO</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="Usuario" name="Usuario" type="text" class="form-control" placeholder="Usuario">
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">CONTRASEÑA</label>
                                        <!--<a href="#" class="forgot-pass-link">¿Has olvidado tu contraseña?</a>-->
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="Password" name="Password" type="password" class="form-control" placeholder="Contraseña">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    
                                    <div class="field-wrapper">
                                      <center><span role="alert" id="resultado" style="color:red;"></span></center><br>
                                        <button type="submit" class="btn btn-primary" value="Login" name="login" id="submit">Iniciar Sesión</button>
                                    </div>
                                </div>

                                <p class="signup-link"><a href="<?= site_url('login/Recuperar_Password') ?>">¿Olvidaste Tu Contraseña?</a></p>

                            </div>
                        </form>

                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
    
    <script type="text/javascript">
      $(document).ready(function() {
        document.getElementById("resultado").style.display = 'none';
        $('#frm_login').submit(function(event) {
            event.preventDefault();
            var Usuario = document.getElementById("Usuario").value;
            var Password = document.getElementById("Password").value;
            var url = "<?php echo site_url(); ?>" + "/login/ingresar";
            var urlsadministrador= "<?php echo site_url(); ?>" + "/Cochera";
            var urladministrador = "<?php echo site_url(); ?>" + "/Cochera";
            var urlusuario= "<?php echo site_url(); ?>" + "/Cochera";
            var urlcliente= "<?php echo site_url(); ?>" + "/Cochera";
            
            var urlteamleader= "<?php echo site_url(); ?>" + "/Cochera";
            $.ajax({
              url: url,
              data: {
                Usuario:Usuario,
                Password:Password
              },
              type: 'POST',
              success: function(resp){
                //console.log(resp);
                $('#resultado').html(resp);
                if(resp==="error"){
                  $('#resultado').html("Verifique datos de usuario y/o contraseña");
                  document.getElementById("resultado").style.display = 'block';
                }
                else{ 
                  if(resp == "1" || resp == "2" || resp == "3" || resp == "6" || resp == "7"){
                  document.getElementById("resultado").style.display = 'none';
                  location.href = urladministrador;
                  }
                  if(resp == "4")
                  {
                    document.getElementById("resultado").style.display = 'none';
                    location.href = urlcliente;
                  }
                }
              }
            });
          });
      });
    </script>
    <script src="<?= base_url() ?>template/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url() ?>template/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url() ?>template/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>template/assets/js/authentication/form-2.js"></script>

</body>
</html>