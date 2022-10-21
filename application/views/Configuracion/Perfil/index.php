
<?php $this->load->view('header'); ?>
<?php $this->load->view('nav'); ?>


<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Configuraciones de la cuenta</h3>
            </div>
        </div>
        <div class="account-settings-container layout-top-spacing">
            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">

                            <?php if($_SESSION['usuario'][0]['id_nivel']=="1" || $_SESSION['usuario'][0]['id_nivel']=="2"){ ?>
                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                <form id="edatos" enctype="multipart/form-data" class="section general-info">
                                    <input name="id_usuariodp" type="hidden" class="form-control" id="id_usuariodp" value="<?php echo $get_id[0]['id_usuario']; ?>">
                                    <input type="hidden" id="foto" name="foto" value="<?php echo $get_id[0]['foto'] ?>">
                                    <div class="info">
                                        <div class="chico">
                                            <div class="row">
                                                <div class="col">
                                                    <h6 class="">Datos Personales</h6>
                                                </div>
                                                <div class="col">                                                    
                                                    <div class="col-md-12 text-right mb-5">                                                    
                                                            <a type="button" class="btn btn-success" href="<?= site_url('Cochera/Mi_Perfil')?>/<?php echo $get_id[0]['id_usuario']; ?>">Regresar</a>
                                                        
                                                    <?php  if ($get_id[0]['flag']!=1){ ?>
                                                    <a onclick="GDatosP();" class="btn btn-primary" title="Actualizar Datos Personales">
                                                            Actualizar
                                                        </a> 
                                                    <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-11 mx-auto" >
                                                <div class="row">
                                                    <div class="col-xl-2 col-lg-12 col-md-4">
                                                        <div class="upload mt-4 pr-md-4">

                                                            <input type="file"   <?php if($get_id[0]['flag']==1){echo "disabled";}?>  id="foto" name="foto" class="dropify" data-allowed-file-extensions="png jpg jpeg"
                                                                data-default-file="<?php if($get_id[0]['foto']!=""){ echo base_url().$get_id[0]['foto'];} 
                                                                else {echo base_url()."template/assets/img/200x200.jpg";} ?>" 
                                                                data-max-file-size="2M" />
                                                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Actualizar Imagen</p>
                                                        </div>
                                                    </div>
                                                    <div id="mdatos" class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                        <div class="form">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="usuario_apater">Apellido Paterno</label>
                                                                        <input type="text" <?php if($get_id[0]['flag']==1){echo "disabled";}?> class="form-control mb-4" maxlength = "30" id="usuario_apater" name="usuario_apater" value="<?php echo $get_id['0']['usuario_apater'];?>">
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="usuario_amater">Apellido Materno</label>
                                                                        <input type="text" <?php if($get_id[0]['flag']==1){echo "disabled";}?> class="form-control mb-4"maxlength = "30" id="usuario_amater" name="usuario_amater" value="<?php echo $get_id['0']['usuario_amater'];?>">
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="usuario_nombres">Nombres</label>
                                                                        <input type="text"  <?php if($get_id[0]['flag']==1){echo "disabled";}?> class="form-control mb-4" maxlength = "30" id="usuario_nombres" name="usuario_nombres" value="<?php echo $get_id['0']['usuario_nombres'];?>">
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-3">
                                                                    <div class="form-group">
                                                                        <label for="id_nacionalidad">Nacionalidad</label>
                                                                        <select class="form-control"   <?php if($get_id[0]['flag']==1){echo "disabled";}?>   <?php if($get_id[0]['flag']==1){echo "disabled";}?>  name="id_nacionalidad" id="id_nacionalidad">
                                                                        <option value="0"  <?php if (!(strcmp(0, $get_id[0]['id_nacionalidad']))) {echo "selected=\"selected\"";} ?> >Seleccione</option>
                                                                        <?php foreach($list_nacionalidad_perfil as $list){ ?>
                                                                        <option value="<?php echo $list['id_nacionalidad']; ?>" <?php if (!(strcmp($list['id_nacionalidad'], $get_id[0]['id_nacionalidad']))) {echo "selected=\"selected\"";} ?> >
                                                                        <?php echo $list['nom_nacionalidad'];?></option>
                                                                        <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-3">
                                                                    <div class="form-group">
                                                                        <label for="genero">Genero</label>
                                                                        <select class="form-control"   <?php if($get_id[0]['flag']==1){echo "disabled";}?>  name="id_genero" id="id_genero">
                                                                        <option value="0" <?php if (!(strcmp(0, $get_id[0]['id_genero']))) {echo "selected=\"selected\"";} ?> >Seleccione</option>
                                                                        <?php foreach($list_genero as $list){ ?>
                                                                        <option value="<?php echo $list['id_genero'] ; ?>" <?php if (!(strcmp($list['id_genero'], $get_id[0]['id_genero']))) {echo "selected=\"selected\"";} ?> >
                                                                        <?php echo $list['nom_genero'];?></option>
                                                                        <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-3">
                                                                    <div class="form-group">
                                                                        <label for="fullName">Tipo de documento</label>
                                                                        <select class="form-control"   <?php if($get_id[0]['flag']==1){echo "disabled";}?>  name="id_tipo_documento" id="id_tipo_documento">
                                                                        <option value="0"  <?php if (!(strcmp(0, $get_id[0]['id_tipo_documento']))) {echo "selected=\"selected\"";} ?> >Seleccione</option>
                                                                        <?php foreach($list_tipo_documento as $list){ ?>
                                                                        <option value="<?php echo $list['id_tipo_documento'] ; ?>" <?php if (!(strcmp($list['id_tipo_documento'], $get_id[0]['id_tipo_documento']))) {echo "selected=\"selected\"";} ?> >
                                                                        <?php echo $list['nom_tipo_documento'];?></option>
                                                                        <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-3">
                                                                    <div class="form-group">
                                                                        <label for="dni">Número de documento</label>
                                                                        <input type="number"   <?php if($get_id[0]['flag']==1){echo "disabled";}?>  class="form-control mb-4" min="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                                                maxlength = "8" id="num_doc" name="num_doc" value="<?php echo $get_id[0]['num_doc']; ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-3">
                                                                    <div class="form-group">
                                                                        <label>Fecha Emisión:</label>
                                                                        <input type="date" class="form-control"   <?php if($get_id[0]['flag']==1){echo "disabled";}?>  id="fec_emision" name="fec_emision" value="<?php echo $get_id[0]['fec_emision_doc']; ?>" placeholder="Ingresar Fecha de Ingreso">
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-3">
                                                                    <div class="form-group">
                                                                        <label>Fecha Vencimiento:</label>
                                                                        <input type="date" class="form-control"   <?php if($get_id[0]['flag']==1){echo "disabled";}?>  id="fec_venci" name="fec_venci" value="<?php echo $get_id[0]['fec_vencimiento_doc']; ?>" placeholder="Ingresar Fecha de Ingreso">
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <label class="dob-input">Fecha de Nacimiento</label>
                                                                    <div class="d-sm-flex d-block">
                                                                        <div class="form-group mr-1">
                                                                            <select class="form-control"   <?php if($get_id[0]['flag']==1){echo "disabled";}?>  id="dia_nac" name="dia_nac" onchange="calcularEdad()">
                                                                            <option value="0" <?php if (!(strcmp(0, $get_id[0]['dia_nac']))) {echo "selected=\"selected\"";} ?> >Día</option>
                                                                            <?php foreach($list_dia as $list){ ?>
                                                                            <option value="<?php echo $list['cod_dia'] ; ?>" <?php if (!(strcmp($list['cod_dia'], $get_id[0]['dia_nac']))) {echo "selected=\"selected\"";} ?> >
                                                                            <?php echo $list['cod_dia'];?></option>
                                                                            <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group mr-1">
                                                                            <select class="form-control"   <?php if($get_id[0]['flag']==1){echo "disabled";}?>  id="mes_nac" name="mes_nac" onchange="calcularEdad()">
                                                                            <option value="0" <?php if (!(strcmp(0, $get_id[0]['mes_nac']))) {echo "selected=\"selected\"";} ?> >Mes</option>
                                                                            <?php foreach($list_mes as $list){ ?>
                                                                            <option value="<?php echo $list['cod_mes'] ; ?>" <?php if (!(strcmp($list['cod_mes'], $get_id[0]['mes_nac']))) {echo "selected=\"selected\"";} ?> >
                                                                            <?php echo $list['abr_mes'];?></option>
                                                                            <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group mr-1">
                                                                            <select class="form-control"   <?php if($get_id[0]['flag']==1){echo "disabled";}?>  id="anio_nac" name="anio_nac" onchange="calcularEdad()">
                                                                            <option value="0" <?php if (!(strcmp(0, $get_id[0]['anio_nac']))) {echo "selected=\"selected\"";} ?> >Año</option>
                                                                            <?php foreach($list_anio as $list){ ?>
                                                                            <option value="<?php echo $list['cod_anio'] ; ?>" <?php if (!(strcmp($list['cod_anio'], $get_id[0]['anio_nac']))) {echo "selected=\"selected\"";} ?> >
                                                                            <?php echo $list['cod_anio'];?></option>
                                                                            <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-2">
                                                                    <div class="form-group">
                                                                        <label for="usuario_email">Edad</label>
                                                                        <input type="text" class="form-control"   <?php if($get_id[0]['flag']==1){echo "disabled";}?>  readonly id="cedad" name="cedad" >
                                                                        
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-3">
                                                                    <div class="form-group">
                                                                        <label for="estado_civil">Estado Civil</label>
                                                                        <select class="form-control"   <?php if($get_id[0]['flag']==1){echo "disabled";}?>  id="id_estado_civil" name="id_estado_civil" onchange="Estado_Civil()">
                                                                            <option value="0" <?php if (!(strcmp(0, $get_id[0]['id_estado_civil']))) {echo "selected=\"selected\"";} ?> >Seleccione</option>
                                                                            <?php foreach($list_estado_civil as $list){ ?>
                                                                            <option value="<?php echo $list['id_estado_civil'] ; ?>" <?php if (!(strcmp($list['id_estado_civil'], $get_id[0]['id_estado_civil']))) {echo "selected=\"selected\"";} ?> >
                                                                            <?php echo $list['nom_estado_civil'];?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-sm-3">
                                                                    <div class="form-group">
                                                                        <label for="usuario_email">Especificar</label>
                                                                        <input type="text" <?php if($get_id[0]['id_estado_civil']!=7){echo "disabled";}?> class="form-control mb-4" maxlength = "100" id="otro_estado_civil" name="otro_estado_civil" value="<?php echo $get_id[0]['otro_estado_civil']; ?>" <?php //echo (($_SESSION['usuario'][0]['id_nivel']!="1" && $_SESSION['usuario'][0]['id_nivel']!="2" && $list_usuario[0]['verif_email']=="2") ? 'readonly' : ' '; ?>>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label for="emailp">Correo Electrónico</label>
                                                                        <input type="text" class="form-control mb-4"   <?php if($get_id[0]['flag']==1){echo "disabled";}?>  maxlength = "100" id="emailp" name="emailp" value="<?php echo $get_id[0]['emailp']; ?>" <?php //echo (($_SESSION['usuario'][0]['id_nivel']!="1" && $_SESSION['usuario'][0]['id_nivel']!="2" && $list_usuario[0]['verif_email']=="2") ? 'readonly' : ' '; ?>>
                                                                    </div>
                                                                </div>
                                                                

                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label for="num_celp">Número celular</label>
                                                                        <input type="text" class="form-control mb-4"   <?php if($get_id[0]['flag']==1){echo "disabled";}?>  min="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                                                maxlength = "9"  id="num_celp" name="num_celp" value="<?php echo $get_id[0]['num_celp']; ?>" onkeypress="return soloNumeros(event)">
                                                                    </div>
                                                                </div>                          
                                                                <div class="col-md-12">
                                                                    <label for="">Lugar de Nacimiento</label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="familiar_celular">Departamento</label>
                                                                        <select class="form-control"   <?php if($get_id[0]['flag']==1){echo "disabled";}?>  name="id_departamentonac" id="id_departamentonac" onchange="provincia_dpersonal()">
                                                                            <option value="0">Seleccion</option>
                                                                            <?php foreach($list_departamento as $list){?>
                                                                                <option value="<?php echo $list['id_departamento']; ?>" <?php if($get_id[0]['id_departamentonac']==$list['id_departamento']){echo "selected";} ?>><?php echo $list['nombre_departamento'];?></option>
                                                                            <?php } ?>
                                                                        </select> 
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label >Provincia</label>
                                                                        <div id="mprovinciadp">
                                                                            <select class="form-control"   <?php if($get_id[0]['flag']==1){echo "disabled";}?>  name="id_provincianac" id="id_provincianac" onchange="distrito_dpersonal()">
                                                                                <option  value="0"  >Seleccionar</option>
                                                                                <?php foreach($list_provincianac as $list){?>
                                                                                    <option value="<?php echo $list['id_provincia']; ?>" <?php if($get_id[0]['id_provincianac']==$list['id_provincia']){echo "selected";} ?>><?php echo $list['nombre_provincia'];?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label >Distrito</label>
                                                                        <div id="mdistritodp">
                                                                            <select class="form-control"   <?php if($get_id[0]['flag']==1){echo "disabled";}?>  name="id_distritonac" id="id_distritonac">
                                                                                <option  value="0" >Seleccionar</option>
                                                                                <?php foreach($list_distritonac as $list){?>
                                                                                    <option value="<?php echo $list['id_distrito']; ?>" <?php if($get_id[0]['id_distritonac']==$list['id_distrito']){echo "selected";} ?>><?php echo $list['nombre_distrito'];?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <b><p class="terms-conditions">Copyright © 2022 LyF Proyectos Peru, Reservados todos los derechos.</p>

    </div>             
<script>
    $(document).ready(function() {
        $("#liconfiguracion").addClass('active');
        $("#dueno").addClass('active');
    }); 
</script>
<?php $this->load->view('validaciones'); ?>   
<?php $this->load->view('footer'); ?>
<script>
    calcularEdad();

    function validar_Archivo(v){
        var archivoInput = document.getElementById(v);
        var archivoRuta = archivoInput.value;
        var extPermitidas = /(.jpg|.jpeg|.png|.pdf)$/i;
        if(!extPermitidas.exec(archivoRuta)){
                swal.fire(
                    '!Archivo no permitido!',
                    'El archivo debe ser JPG ,JPEG ,PNG o PDF',
                    'error'
                )
            archivoInput.value = '';
            return false;
        }
    }

    function provincia_dpersonal(){
        var url = "<?php echo site_url(); ?>Cochera/Provincia_DPersonal";
        $.ajax({
            url: url,
            type: 'POST',
            //data: frm,
            data: $("#edatos").serialize(),
            success: function(data)             
            {
                $('#mprovinciadp').html(data);
            }
        });
        console.log("1");
        distrito_dpersonal();
    }

    function distrito_dpersonal(){
        console.log("2");
        var url = "<?php echo site_url(); ?>Cochera/Distrito_DPersonal";
        $.ajax({
            url: url, 
            type: 'POST',
            //data: frm,
            data: $("#edatos").serialize(),
            success: function(data)             
            {
                $('#mdistritodp').html(data);               
            }
        });
    }

    function calcularEdad(){
        if($('#dia_nac').val() !=0 && $('#mes_nac').val()!=0 && $('#anio_nac').val()!=0){

            var fec_nac="'"+$('#anio_nac').val()+"-"+$('#mes_nac').val()+"-"+$('#dia_nac').val()+"'";
            
            var fecha = new Date(fec_nac);
            var hoy = new Date();
            var cumpleanos = new Date(fecha);
            var edad = hoy.getFullYear() - cumpleanos.getFullYear();
            var m = hoy.getMonth() - cumpleanos.getMonth();

            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                edad--;
            }

            $('#cedad').val(edad);

        }else{
            $('#cedad').val('');
        }
        
    }
    function actualidad(){

        if ($('#checkactualidad').is(":checked")) {
            $("#dia_finel").prop('disabled', true);
            $("#mes_finel").prop('disabled', true);
            $("#anio_finel").prop('disabled', true);
        }else{
            $("#dia_finel").prop('disabled', false);
            $("#mes_finel").prop('disabled', false);
            $("#anio_finel").prop('disabled', false);
        }
    }

   
           

    
</script>
