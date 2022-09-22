<form id="formulario_vehiculoe" method="POST" enctype="multipart/form-data" class="needs-validation" class="vertical">
    <div class="modal-header">
        <h5 class="modal-title">Actualizar Datos de Vehículo <b><?php echo $get_id[0]['cod_vehiculo']; ?></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
    </div> 
    
    <div class="modal-body" >
        <div class="col-md-12 row clearfix">
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>N°&nbsp;Placa: </label>
                        <input type="text" class="form-control" id="placae" name="placae" placeholder="Ingresar placa" autofocus value="<?php echo $get_id[0]['placa'] ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>Partida&nbsp;Registral: </label>
                        <input type="text" class="form-control" id="pregistroe" name="pregistroe" placeholder="Ingresar partida" autofocus value="<?php echo $get_id[0]['pregistro'] ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>N°&nbsp;serie: </label>
                        <input type="text" class="form-control" id="seriee" name="seriee" placeholder="Ingresar serie" autofocus value="<?php echo $get_id[0]['serie'] ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>Fecha&nbsp;fabricación: </label>
                        <input type="date" class="form-control" id="fec_fabricacione" name="fec_fabricacione" placeholder="Ingresar serie" autofocus value="<?php echo $get_id[0]['fec_fabricacion'] ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>Fecha&nbsp;adquisición: </label>
                        <input type="date" class="form-control" id="fec_adquisicione" name="fec_adquisicione" placeholder="Ingresar serie" autofocus value="<?php echo $get_id[0]['fec_adquisicion'] ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>Tipo Vehiculo: </label>
                        <select class="form-control" name="id_tipoe" id="id_tipoe" onchange="Busca_MarcaV_RV('2')">
                            <option value="0">Seleccione</option>
                            <?php foreach($list_tipo_vehiculo as $list){ ?>
                                <option <?php if($get_id[0]['id_tipo']==$list['id_tipo']){echo "selected"; }?> value="<?php echo $list['id_tipo']; ?>"><?php echo $list['nom_tipo'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>Marca: </label>
                        <div id="cmb_marcae">
                            <select class="form-control" name="id_marcae" id="id_marcae" onchange="Busca_ModeloV('2')">
                                <option value="0">Seleccione</option>
                                <?php foreach($list_marca_vehiculo as $list){ ?>
                                    <option <?php if($get_id[0]['id_marca']==$list['id_marca']){echo "selected"; }?> value="<?php echo $list['id_marca']; ?>"><?php echo $list['nom_marca'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line" >
                        <label>Modelo: </label>
                        <div id="cmb_modeloe">
                            <select class="form-control" name="id_modeloe" id="id_modeloe">
                                <option value="0">Seleccione</option>
                                <?php foreach($list_modelo_vehiculo as $list){ ?>
                                    <option <?php if($get_id[0]['id_modelo']==$list['id_modelo']){echo "selected"; }?> value="<?php echo $list['id_modelo']; ?>"><?php echo $list['nom_modelo'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>Color: </label>
                        <select class="form-control" name="id_colore" id="id_colore" >
                            <option value="0">Seleccione</option>
                            <?php foreach($list_color_vehiculo as $list){ ?>
                                <option <?php if($get_id[0]['id_color']==$list['id_color']){echo "selected"; }?> 
                                value="<?php echo $list['id_color']; ?>"><?php echo $list['nom_color'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>N°&nbsp;Asientos: </label>
                        <input type="text" class="form-control" id="nasientoe" name="nasientoe" placeholder="Ingresar N° de asientos" autofocus onkeypress="return soloNumeros(event)" value="<?php echo $get_id[0]['nasiento'] ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>N°&nbsp;Chasis: </label>
                        <input type="text" class="form-control" id="chasise" name="chasise" placeholder="Ingresar N° de chasis" autofocus value="<?php echo $get_id[0]['chasis'] ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>N°&nbsp;Llantas: </label>
                        <input type="text" class="form-control" id="nllantae" name="nllantae" placeholder="Ingresar N° de llantas" autofocus onkeypress="return soloNumeros(event)" value="<?php echo $get_id[0]['nllanta'] ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>N°&nbsp;Ejes: </label>
                        <input type="text" class="form-control" id="nejee" name="nejee" placeholder="Ingresar N° de ejes" autofocus onkeypress="return soloNumeros(event)" value="<?php echo $get_id[0]['neje'] ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="form-line">
                        <label>Tipo de Uso: </label>
                        <input type="text" class="form-control" id="tusoe" name="tusoe" placeholder="Ingresar uso" autofocus value="<?php echo $get_id[0]['tuso'] ?>">
                    </div>
                </div>
            </div>
        </div>  
    </div>

    <div class="modal-footer">
        <input type="hidden" name="id_vehiculo" id="id_vehiculo" value="<?php echo $get_id[0]['id_vehiculo']; ?>">
        <button class="btn btn-primary btn-sm mt-3" type="button" onclick="Update_Vehiculo();"> <i class="flaticon-cancel-12"></i>Guardar</button>
        <button class="btn mt-3" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
    </div>
</form> 
                            

