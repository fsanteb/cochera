<?php if($modal==1){?> 
    <select class="form-control" name="id_modelo" id="id_modelo">
        <option value="0">Seleccione</option>
        <?php foreach($list_modelo_vehiculo as $list){ ?>
            <option value="<?php echo $list['id_modelo']; ?>"><?php echo $list['nom_modelo'];?></option>
        <?php } ?>
    </select>
<?php }else{?> 
    <select class="form-control" name="id_modeloe" id="id_modeloe">
        <option value="0">Seleccione</option>
        <?php foreach($list_modelo_vehiculo as $list){ ?>
            <option value="<?php echo $list['id_modelo']; ?>"><?php echo $list['nom_modelo'];?></option>
        <?php } ?>
    </select>
<?php }?>

