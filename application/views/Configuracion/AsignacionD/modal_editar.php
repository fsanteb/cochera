<form id="formulario_asignacion_duenoe" method="POST" enctype="multipart/form-data" class="needs-validation">
    <div class="modal-header">
        <h5 class="modal-title">Editar Asignación: </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
    </div> 

    <div class="modal-body" style="max-height:500px; overflow:auto;" >
        <div class="col-md-12 row">
            <div class="form-group col-md-2">
                <label class="col-sm-3 control-label text-bold">Dueño: </label>
            </div>
            <div class="form-group col-md-4">
                  <select class="form-control" name="id_duenoe" id="id_duenoe">
	                		<option value="0"  >Seleccione</option>
                            <?php foreach($list_dueno as $list){ ?>
	                    		<option <?php if($list['id_usuario']==$get_id[0]['id_usuario']) 
                                {echo "selected";}?>
                                value="<?php echo $list['id_usuario'] ; ?>" >
	                        	<?php echo $list['usuario_apater']." ".$list['usuario_amater']." ".$list['usuario_nombres'];?></option>
	                			<?php } ?>

	                </select> 
            </div>
            <div class="form-group col-md-2">
                <label class="col-sm-3 control-label text-bold">Vehículo: </label>
            </div>
            <div class="form-group col-md-4">
                  <select class="form-control" name="id_vehiculoe" id="id_vehiculoe">
	                		<option value="0"  >Seleccione</option>
                            <?php foreach($list_vehiculo as $list){ ?>
	                    		<option <?php if($list['id_vehiculo']==$get_id[0]['id_vehiculo'])
                                {echo "selected";}?>
                                value="<?php echo $list['id_vehiculo'] ; ?>" >
	                        	<?php echo $list['placa'];?></option>
	                			<?php } ?>
	                </select> 
            </div>
            
        </div>
    </div>
    <div class="modal-footer">
        <input name="id_asignacion" type="hidden" class="form-control" id="id_asignacion" value="<?php echo $get_id[0]['id_asignacion']; ?>">
        <button class="btn btn-primary mt-3" id="createProductBtn" onclick="Update_Asignacion_dueno();" type="button">Guardar</button>
        <button class="btn mt-3" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
    </div>  
</form>
  

