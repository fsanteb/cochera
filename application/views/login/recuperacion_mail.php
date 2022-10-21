<!DOCTYPE html>
<html lang="en">
    <head >
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <?php $this->load->view('login/css_email'); ?>
    </head>
    <body class="body" style="padding:0; margin:0; display:flex; background:#ffffff; -webkit-text-size-adjust:none;align-content: center;align-items: center;">
        <table align="center" cellpadding="0" cellspacing="0" width="100%" height="50%">
            <tr>
            <td align="center" valign="top" bgcolor="#ffffff"  width="100%">
        
            <table cellspacing="0" cellpadding="0" width="100%">
        
                <tr>
                <td style="border-bottom:0px solid #e7e7e7;">
                    
                    <table cellpadding="0" cellspacing="0" width="600" class="w320">
                        <tr>
                        <td align="left" class="mobile-padding" style="padding-top: 20px; font-family: century gothic,sans-serif;">
        
                            <br class="mobile-hide" />
        
                            <h2 class="mediocuadrado" style="color: rgb(32,147,198);font-size: 20pt;font-family: bebas kai;">RECUPERACIÓN DE CONTRASEÑA</h2><br><br><br>
                            <span style="font-family: century gothic,sans-serif;color: rgb(111,111,110);font-size: 16px;">¡Hola estimado(a) <b><?php  echo $nombre." ".$apellidop; ?></b></span> <br>
                            <span style="font-family: century gothic,sans-serif;color: rgb(111,111,110);font-size: 16px;">Hemos detectado que has solicitado cambiar tu contraseña.</span>
                            
                            <br>
                            <span style="font-family: century gothic,sans-serif;color: rgb(111,111,110);font-size: 16px;">Tu contraseña provicional será: <b><?php echo $pass ?> </b></span>
                            <br>
                            <span style="font-family: century gothic,sans-serif;color: rgb(111,111,110);font-size: 16px;">Ingresando a <a href="https://sistemaslyf.com/lyfnet/">sistemaslyf.com/lyfnet/</a> podrás colocar tu nueva clave.</span>
                            <br>
                            <br>
                            <span style="font-family: century gothic,sans-serif;color: rgb(111,111,110);font-size: 16px;">Atte. Recursos Humanos.</span>
                            
        
                        </td>
                        </tr>
                    </table>
                </td>
                </tr>
                <tr>
                <td valign="top" style="background-color:#fff;border-bottom:0px solid #e7e7e7;">
                    <img src="<?= base_url() ?>template/img/firma.jpg" width="449px" height="147px"/>
                </td>
                </tr>
        
            </table>
        
            </td>
            </tr>
        </table>
    </body>
</html>