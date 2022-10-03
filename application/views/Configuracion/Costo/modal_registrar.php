<form id="formulario_costo" method="POST" enctype="multipart/form-data" class="needs-validation">
    <div class="modal-header">
        <h5 class="modal-title">Registrar Costo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
    </div>    
    
    <div class="modal-body" style="max-height:450px; overflow:auto;">
        <div class="col-md-12 row">
            
            <div class="form-group col-md-2">
                <label class="col-sm-3 control-label text-bold">Tipo Vehiculo: </label>
            </div>
            <div class="form-group col-md-4">
                  <select class="form-control" name="id_tipo" id="id_tipo">
	                		<option value="0"  >Seleccione</option>
                            <?php foreach($list_tipo_vehiculo as $list){ ?>
	                    		<option value="<?php echo $list['id_tipo'] ; ?>" >
	                        	<?php echo $list['nom_tipo'];?></option>
	                			<?php } ?>
	                </select> 
            </div>
            <div class="form-group col-md-2">
                <label class="col-sm-3 control-label text-bold">Costo Diario:</label>
            </div>
            <div class="form-group col-sm-4">
                <input type="text" class="form-control" id="costo_diario" name="costo_diario" placeholder="Ingresar Costo diario" onkeypress="return soloNumeros(event)" autofocus>
            </div>
            <div class="form-group col-md-2">
                <label class="col-sm-3 control-label text-bold">Costo Mensual:</label>
            </div>
            <div class="form-group col-sm-4">
                <input type="text" class="form-control" id="costo_mensual" name="costo_mensual" placeholder="Ingresar Costo mensual" onkeypress="return soloNumeros(event)" autofocus>
            </div>
            
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary mt-3" type="button" onclick="Insert_Costo();">Guardar</button>
        <button class="btn mt-3" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
    </div>
</form>