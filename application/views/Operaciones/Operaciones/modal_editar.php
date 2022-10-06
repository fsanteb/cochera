<form id="formulario_operacione" method="POST" enctype="multipart/form-data" class="needs-validation">
    <div class="modal-header">
        <h5 class="modal-title">Editar Operación: </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
    </div> 

    <div class="modal-body" style="max-height:500px; overflow:auto;" >
        <div class="col-md-12 row">
            <div class="form-group col-md-2">
                <label class="col-sm-3 control-label text-bold">Dueño: </label>
            </div>
            <div class="form-group col-md-10">
                  <select class="form-control basice" name="id_asignacione" id="id_asignacione">
	                		<option value="0"  >Seleccione</option>
                            <?php foreach($list_asignacion as $list){ ?>
	                    		<option <?php if($list['id_asignacion']==$get_id[0]['id_asignacion']) 
                                {echo "selected";}?>
                                value="<?php echo $list['id_asignacion'] ; ?>" >
	                        	<?php echo $list['dueno']." ".$list['placa'];?></option>
	                			<?php } ?>
	                </select> 
            </div>

            <div class="form-group col-md-2">
                <label class="col-sm-3 control-label text-bold">Estado: </label>
            </div>
            <div class="form-group col-md-10">
                  <select class="form-control" name="estado_operacionese" id="estado_operacionese">
	                		<option value="0"  >Seleccione</option>
                            <option value="1" <?php if($get_id[0]['estado_operaciones']==1){echo "selected";} ?>>No Pagado</option>
                            <option value="2" <?php if($get_id[0]['estado_operaciones']==2){echo "selected";} ?>>Pagado</option>
	                </select> 
            </div>
            
        </div>
    </div>
    <div class="modal-footer">
        <input name="id_operaciones" type="hidden" class="form-control" id="id_operaciones" value="<?php echo $get_id[0]['id_operaciones']; ?>">
        <button class="btn btn-primary mt-3" id="createProductBtn" onclick="Update_Operaciones();" type="button">Guardar</button>
        <button class="btn mt-3" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
    </div>  
</form>

<script>
    var ss = $(".basice").select2({
        tags: true,
    });
    $('.basice').select2({
        dropdownParent: $('#ModalUpdate')
    });
</script>
  

