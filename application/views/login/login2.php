<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form login | Fazt</title>
	<link rel="stylesheet" href="<?= base_url() ?>template/login/estilos.css">
  <script src="<?= base_url() ?>template/docs/js/jquery-3.2.1.min.js"></script>
</head>
<body>

	<div class="login-box">
		<div>
			<img  class="avatar" src="<?= base_url() ?>template/login/img/logo.jpg" alt="logo de Fazt">
			<h1>INICIAR SESIÓN</h1>
			<form id="frm_login">
				<!--username-->
				<label for="username"></label>
				<input type="text" id="Usuario" name="Usuario" placeholder="Usuario">

				<!--password-->
				<label for="password"></label>
				<input type="password" id="Password" name="Password" placeholder="Contraseña">
        <center><span role="alert" id="resultado" style="color:red;"></span></center><br>
				<input type="submit" value="Ingresar" name="login" id="submit">
        <center>
				<a href="#">Olvidate tu contraseña?</a><br>
				<a href="#">¿No tienes cuenta?</a></center>

			</form>
		</div>
	</div>
</body>
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
</html>