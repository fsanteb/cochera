<!DOCTYPE html>
<html lang="es">
    <head>
        <meta name="author" content="leamug">
        <title>LyF Proyectos(Beta)</title>
        <link href="<?= base_url() ?>/template/css/pro_login_urbano2.css" rel="stylesheet" type="text/css" id="style">   
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
        <link href="https://file.myfontastic.com/JwhwQnQW7uohHW8bsm2kd3/icons.css" rel="stylesheet">-->
        <script src="<?= base_url() ?>/template/js/jquery-3.1.0.min.js"></script>
        <script src="<?= base_url() ?>/template/js/jquery.flexslider.js"></script>
        <script src="<?= base_url() ?>/template/js/main.js"></script>
        <link href="https://file.myfontastic.com/JwhwQnQW7uohHW8bsm2kd3/icons.css" rel="stylesheet">
        <link href="https://www.dafontfree.net/embed/YWxsZXItcmVndWxhciZkYXRhLzE2L2EvNzc3MzgvQWxsZXJfUmcudHRm" rel="stylesheet" type="text/css"/>
        <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    </head>
    <body  >

        <div class="contenedor-general" id="fondo">
            <div class="contenedor-central" > 
                <div class="contenedor-titulo">
                        <label>Don't have an account?</label>
                </div>
                <div class="contenedor-descripcion">
                        <label>Register to access all the features of our service.<br>Manage your bussiness in one place. It's free!</label>
                </div>
                <div class="contenedor-redes">
                    <a href="https://www.youtube.com/" class="social" id="fb" target="_blank"><span class="icon-youtube"></a>
                    <label  class="social" id="tfb">Youtube</label>
                    <a href="https://www.facebook.com/LyFProyectos/" class="social" id="fb" target="_blank"><span class="icon-facebook"></a>
                    <label  class="social" id="tfb">Facebook</label>	
                    <a href="https://www.instagram.com/LyFProyectos/" class="social" id="in" target="_blank"><span class="icon-instagram"></a>	
                    <label  class="social" id="tin">Instagram</label>
                    <a href="https://api.whatsapp.com/send?phone=51992561569&app=facebook&entry_point=page_cta&fbclid=IwAR0qt0UsgrmWidTu_1yx3rg12pSXSgHv5QpiXd5q_QG5gAciQN4eNQ919hQ" class="social" id="in" target="_blank"><span class="icon-whatsapp"></a>	
                    <label  class="social" id="tin">Whatsapp</label>
                </div>
            </div>
            <div class="contenedor-secundario">
                <div class="contenedor-logo-img" id="logo">
                    <img src="<?=base_url()?>template/img/logo2.png">
                </div>
                <!--
                <div class="contenedor-titulo-secundario">
                    <label>Ingresar</label>
                </div>
                -->
                <form>
                    <div class="group">
                        <input type="text"><span class="highlight"></span><span class="bar"></span>
                        <label class="user">Usuario</label>
                    </div>
                    <div class="group">
                        <input type="email"><span class="highlight"></span><span class="bar"></span>
                        <label class="user">Contraseña</label>
                    </div>
                </form>
                <div class="contenedor-buton">
                    <button class="btn">
                        <span>Ingresar</span>
                        <svg width="15px" height="10px" viewBox="0 0 13 10">
                            <path d="M1,5 L11,5"></path>
                            <polyline points="8 1 12 5 8 9"></polyline>
                        </svg>
                    </button>
                    
                    <button class="cta">
                        <span class="hover-underline-animation">¿Olvidaste tu contraseña?</span>
                        <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="30" height="10" viewBox="0 0 46 16">
                            <path id="Path_10" data-name="Path 10" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" transform="translate(30)"></path>
                        </svg>
                    </button>
			    </div>
              
            </div>
        </div>
    </body>
       
</html>
<style>
#fondo{
    /*linear-gradient(rgba(5,7,12,0.75),rgba(5,7,12,0.75)),*/
    /*background: url('<?=base_url()?>/template/img/fondo5.png');}*/
    background: linear-gradient(rgba(71, 86, 122, 0.548),rgba(71, 86, 122, 0.548)),url('<?=base_url()?>/template/img/fondo5.png');}
</style>
<script>
    $(window, document, undefined).ready(function() {
$('input').blur(function() {
  var $this = $(this);
  if ($this.val())
    $this.addClass('used');
  else
    $this.removeClass('used');
});

var $ripples = $('.ripples');

$ripples.on('click.Ripples', function(e) {

  var $this = $(this);
  var $offset = $this.parent().offset();
  var $circle = $this.find('.ripplesCircle');

  var x = e.pageX - $offset.left;
  var y = e.pageY - $offset.top;

  $circle.css({
    top: y + 'px',
    left: x + 'px'
  });

  $this.addClass('is-active');

});

$ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function(e) {
    $(this).removeClass('is-active');
});

});
</script>