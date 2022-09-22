<form id="formulario_dueno" method="POST" enctype="multipart/form-data" class="needs-validation">
    <div class="modal-header">
        <h5 class="modal-title">Registrar Nuevo Dueño</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
    </div>    
    
    <div class="modal-body" style="max-height:450px; overflow:auto;">
        <div class="col-md-12 row">
            
            <div class="form-group col-md-2">
                <label class="col-sm-3 control-label text-bold">Nivel: </label>
            </div>
            <div class="form-group col-sm-4">
                <select name="id_nivel" id="id_nivel" class="form-control">
                    <option value="0">Seleccione</option>
                    <?php foreach($list_nivel as $list){?>
                    <option value="<?php echo $list['id_nivel'] ?>"><?php echo $list['nom_nivel'] ?></option>    
                    <?php }?>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label class="col-sm-3 control-label text-bold">N° Documento:</label>
            </div>
            <div class="form-group col-sm-4">
                <input type="text" class="form-control" id="num_doc" name="num_doc" maxlength="11" onkeypress="return soloNumeros(event)" placeholder="Ingresar Documento" autofocus>
            </div>
            <div class="form-group col-md-2">
                <label class="col-sm-3 control-label text-bold">Apellido Paterno:</label>
            </div>
            <div class="form-group col-sm-4">
                <input type="text" class="form-control" id="usuario_apater" name="usuario_apater" placeholder="Apellido Paterno" autofocus>
            </div>
            <div class="form-group col-md-2">
                <label class="col-sm-3 control-label text-bold">Apellido Materno:</label>
            </div>
            <div class="form-group col-sm-4">
                <input type="text" class="form-control" id="usuario_amater" name="usuario_amater" placeholder="Apellido Materno" autofocus>
            </div>
            <div class="form-group col-md-2">
                <label class="col-sm-3 control-label text-bold">Nombres:</label>
            </div>
            <div class="form-group col-sm-4">
                <input type="text" class="form-control" id="usuario_nombres" name="usuario_nombres" placeholder="Nombres" autofocus>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary mt-3" type="button" onclick="Insert_Dueno();">Guardar</button>
        <button class="btn mt-3" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
    </div>
</form>