<form id="formulario_asignacion_dueno" method="POST" enctype="multipart/form-data" class="needs-validation">
    <div class="modal-header">
        <h5 class="modal-title">Registrar Asignación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
    </div>    
    
    <div class="modal-body" style="max-height:450px; overflow:auto;">
        <div class="col-md-12 row">
            
            <div class="form-group col-md-12">
                <label class="col-sm-10 control-label text-bold">Vehículo - Dueño: <a class="text-muted" data-toggle="modal" data-target="#ModalUpdate" ModalUpdate="<?= site_url('Cochera/Modal_AsignacionD') ?>"><u>[Nuevo]</u></a></label>
                <div class="col">
                    <select class="form-control basic" name="id_dueno" id="id_dueno">
                            <option value="0">Seleccione</option>
                            <?php foreach($list_asignacion as $list){ ?>
                                <option value="<?php echo $list['id_asignacion'] ; ?>"><?php echo $list['dueno']." - ".$list['dueno'];?></option>
                            <?php } ?>
                    </select> 
                </div>
            </div>
            
            <div class="form-group col-md-2">
                <label class="col-sm-3 control-label text-bold">Vehículo:</label>
            </div>
            <div class="form-group col-md-4">
                  <select class="form-control" name="id_vehiculo" id="id_vehiculo">
	                		<option value="0"  >Seleccione</option>
                            <?php foreach($list_vehiculo as $list){ ?>
	                    		<option value="<?php echo $list['id_vehiculo'] ; ?>" >
	                        	<?php echo $list['placa'];?></option>
	                			<?php } ?>
	                </select> 
            </div>
            
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary mt-3" type="button" onclick="Insert_Asignacion_dueno();">Guardar</button>
        <button class="btn mt-3" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
    </div>
</form>
<script>
    var ss = $(".basic").select2({
        tags: true,
    });
    $('.basic').select2({
        dropdownParent: $('#ModalRegistro')
    });
</script>