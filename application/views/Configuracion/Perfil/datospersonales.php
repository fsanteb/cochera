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

    function Estado_Civil(){
        
        if ($('#id_estado_civil').val() == '7') {
            $("#otro_estado_civil").prop('disabled', false);
        }else{
            $("#otro_estado_civil").prop('disabled', true);
            $("#otro_estado_civil").val('');
        }
    }
</script>