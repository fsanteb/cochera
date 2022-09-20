<form id="formulario_tvehiculoe" method="POST" enctype="multipart/form-data" class="needs-validation">
    <div class="modal-header">
        <h5 class="modal-title">Editar Tipo Vehículo: </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
    </div> 

    <div class="modal-body" style="max-height:500px; overflow:auto;" >
        <div class="col-md-12 row">
            <div class="form-group col-md-2">
                <label class="col-sm-3 control-label text-bold">Nombre: </label>
            </div>
            <div class="form-group col-sm-10">
                <input type="text" class="form-control" id="nom_tipoe" name="nom_tipoe" value="<?php echo $get_id[0]['nom_tipo'] ?>" placeholder="Ingresar Nombre" autofocus>
            </div>
            <div class="form-group col-md-2">
                <label class="col-sm-3 control-label text-bold">Precio Abonado:</label>
            </div>
            <div class="form-group col-sm-4">
                <input type="text" class="form-control" id="precio_abonadoe" name="precio_abonadoe" value="<?php echo $get_id[0]['precio_abonado'] ?>" onkeypress="return soloNumeros(event)" placeholder="Ingresar Precio" autofocus>
            </div>
            <div class="form-group col-md-2">
                <label class="col-sm-3 control-label text-bold">Precio&nbsp;No Abonado:</label>
            </div>
            <div class="form-group col-sm-4">
                <input type="text" class="form-control" id="precio_noabonadoe" name="precio_noabonadoe" value="<?php echo $get_id[0]['precio_noabonado'] ?>" onkeypress="return soloNumeros(event)" placeholder="Ingresar Precio" autofocus>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <input name="id_tipo" type="hidden" class="form-control" id="id_tipo" value="<?php echo $get_id[0]['id_tipo']; ?>">
        <button class="btn btn-primary mt-3" id="createProductBtn" onclick="Update_Tipo_Vehiculo();" type="button">Guardar</button>
        <button class="btn mt-3" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
    </div>  
</form>
  

