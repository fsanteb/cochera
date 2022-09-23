<form id="formulario_vehiculo" method="POST" enctype="multipart/form-data" class="needs-validation" >
    <div class="modal-header">
        <h5 class="modal-title">Registrar Nueva Vehículo</h5>
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
                        <input type="text" class="form-control" id="placa" name="placa" placeholder="Ingresar placa" autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>Partida&nbsp;Registral: </label>
                        <input type="text" class="form-control" id="pregistro" name="pregistro" placeholder="Ingresar partida" autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>N°&nbsp;serie: </label>
                        <input type="text" class="form-control" id="serie" name="serie" placeholder="Ingresar serie" autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>Fecha&nbsp;fabricación: </label>
                        <input type="date" class="form-control" id="fec_fabricacion" name="fec_fabricacion" placeholder="Ingresar serie" autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>Fecha&nbsp;adquisición: </label>
                        <input type="date" class="form-control" id="fec_adquisicion" name="fec_adquisicion" placeholder="Ingresar serie" autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>Tipo Vehiculo: </label>
                        <select class="form-control" name="id_tipo" id="id_tipo" onchange="Busca_MarcaV_RV('1')">
                            <option value="0">Seleccione</option>
                            <?php foreach($list_tipo_vehiculo as $list){ ?>
                                <option value="<?php echo $list['id_tipo']; ?>"><?php echo $list['nom_tipo'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>Marca: </label>
                        <div id="cmb_marca">
                            <select class="form-control" name="id_marca" id="id_marca" onchange="Busca_ModeloV('1')">
                                <option value="0">Seleccione</option>
                                    <?php foreach($list_marca as $list){ ?>
                                    <option value="<?php echo $list['id_marca']; ?>"><?php echo $list['nom_marca'];?></option>
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
                        <div id="cmb_modelo">
                            <select class="form-control" name="id_modelo" id="id_modelo">
                                <option value="0">Seleccione</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>Color: </label>
                        <select class="form-control" name="id_color" id="id_color" >
                            <option value="0">Seleccione</option>
                            <?php foreach($list_color_vehiculo as $list){ ?>
                                <option value="<?php echo $list['id_color']; ?>"><?php echo $list['nom_color'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>N°&nbsp;Asientos: </label>
                        <input type="text" class="form-control" id="nasiento" name="nasiento" placeholder="Ingresar N° de asientos" autofocus onkeypress="return soloNumeros(event)">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>N°&nbsp;Chasis: </label>
                        <input type="text" class="form-control" id="chasis" name="chasis" placeholder="Ingresar N° de chasis" autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>N°&nbsp;Llantas: </label>
                        <input type="text" class="form-control" id="nllanta" name="nllanta" placeholder="Ingresar N° de llantas" autofocus onkeypress="return soloNumeros(event)">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-line">
                        <label>N°&nbsp;Ejes: </label>
                        <input type="text" class="form-control" id="neje" name="neje" placeholder="Ingresar N° de ejes" autofocus onkeypress="return soloNumeros(event)">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="form-line">
                        <label>Tipo de Uso: </label>
                        <input type="text" class="form-control" id="tuso" name="tuso" placeholder="Ingresar uso" autofocus>
                    </div>
                </div>
            </div>
        </div>  
    </div>

    <div class="modal-footer">
        <button class="btn mt-3 btn-primary " type="button" onclick="Insert_Vehiculo();"><i class="flaticon-cancel-12"></i> Guardar</button>
        <button class="btn mt-3" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
    </div>
</form>
    


