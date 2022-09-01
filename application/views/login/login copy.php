<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
  <title>.:: Metalikas Intranet ::.</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon"  class="theme-logo" type="image/x-icon" href="<?= base_url() ?>template/assets/img/logo_mtk.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <!-- Main CSS-->
   <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/docs/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/font-awesome-4.7.0/css/font-awesome.min.css">
     
    
   <script src="<?= base_url() ?>template/docs/js/jquery-3.2.1.min.js"></script>



   <script type="text/javascript">
      $(document).ready(function() {
        document.getElementById("resultado").style.display = 'none';
        $('#frm_login').submit(function(event) {
            event.preventDefault();
            var Usuario = document.getElementById("Usuario").value;
            var Password = document.getElementById("Password").value;
            
            //var tipoacc = document.getElementById("tipoacc").value;

            var url = "<?php echo site_url(); ?>" + "/login/ingresar";
            var urlsadministrador= "<?php echo site_url(); ?>" + "/Metalikas";
            var urladministrador = "<?php echo site_url(); ?>" + "/Metalikas";
            var urlusuario= "<?php echo site_url(); ?>" + "/Metalikas";
            var urlcliente= "<?php echo site_url(); ?>" + "/Metalikas";
            
            var urlteamleader= "<?php echo site_url(); ?>" + "/Metalikas";
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


    <title>.:: METALIKAS ::.</title>
  </head>

  <body>

    <section class="login-content">
      
        <div class="login-box">

            <form class="login-form"  id="frm_login" name="frm_login">
                    <div class="logo" align="center">
                        <img id="profile-img" class="profile-img-card" src="template/img/logo3.png" />
                    </div>

                    <h2 align="center"><span style="color: white">METALI</span><span style="color: #a4aeb0">K</span><span style="color:white">A</span><span style="color: white">S</span></strong></h2>
                    <h2 class="titulo2">CONSTRUCTORA EN ACERO</h2>
                    <p id="profile-name" class="profile-name-card"></p>
                    
                    <div class="form-group">
                        <input class="textlogin" type="text" id="Usuario" name="Usuario" placeholder="Usuario" required="required" autofocus>
                    </div>

                    <div class="form-group">
                        <input class="textlogin" type="password" id="Password" name="Password" required="required" placeholder="Contraseña">
                    </div>
                    
                    <div class="form-group btn-container">
                        <button type="submit" class="btn btn-block btn-signin" value="Login" name="login" id="submit"><strong>Ingresar</strong></button>
                    </div>

                    <div class="form-group">
                        <div class="utility">
                     
                        </div>
                    </div>
                    <center><span role="alert" id="resultado" style="color:red;"></span></center>
                    <BR><BR><BR>
            </form>
        </div>

    </section>

     <script type="text/javascript">
        var user;                                                          
        $("#Password").focus();
        /*$("#Password").keyup(function(e){                  
              user = $("#Usuario").val();
              console.log(user);
               var per_url ="<?php echo site_url(); ?>" + "/login/tippoacceso/"+user;
                    var items = "";
                    $.getJSON(per_url, function(data) {
                       // items="<option value=''>Seleccione</option>";
                        $.each(data, function(key, val) {
                            items = items+"<option value='" + val.Tipo_acceso + "'>" + val.DescAcceso + "</option>"; 
                        });
                         console.log(items);
                         $('#tipoacc').children('option').remove();
                         $('#tipoacc').append(items);
                       

                    });                                                          
        });*/
                     
    </script>



    <!--  javascripts for application -->

    <script src="<?= base_url() ?>template/docs/js/popper.min.js"></script>
    <script src="<?= base_url() ?>template/docs/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>template/docs/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= base_url() ?>/template/docs/js/plugins/pace.min.js"></script>

    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
      });
    </script>
  </body>
  
</html>