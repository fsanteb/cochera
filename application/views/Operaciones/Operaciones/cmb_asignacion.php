
<label class="col-sm-10 control-label text-bold">Vehículo - Dueño: <a class="text-muted" data-toggle="modal" data-target="#ModalUpdate" ModalUpdate="<?= site_url('Cochera/Modal_AsignacionD/2') ?>"><u>[Nuevo]</u></a></label>
<div class="col">
    <select class="form-control basiccom" name="id_asignacion" id="id_asignacion">
            <option value="0">Seleccione</option>
            <?php foreach($list_asignacion as $list){ ?>
                <option value="<?php echo $list['id_asignacion'] ; ?>"><?php echo $list['dueno']." - ".$list['placa'];?></option>
            <?php } ?>
    </select> 
</div>
<script>
    var ss = $(".basiccom").select2({
        tags: true,
    });
    $('.basiccom').select2({
        dropdownParent: $('#ModalRegistro')
    });
</script>

