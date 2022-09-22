<?php if($modal==1){?> 
    <select class="form-control" name="id_marca" id="id_marca" onchange="Busca_ModeloV('1')">
        <option value="0">Seleccione</option>
        <?php foreach($list_marca_vehiculo as $list){ ?>
            <option value="<?php echo $list['id_marca']; ?>"><?php echo $list['nom_marca'];?></option>
        <?php } ?>
    </select>
<?php }else{?> 
    <select class="form-control" name="id_marcae" id="id_marcae" onchange="Busca_ModeloV('2')">
        <option value="0">Seleccione</option>
        <?php foreach($list_marca_vehiculo as $list){ ?>
            <option value="<?php echo $list['id_marca']; ?>"><?php echo $list['nom_marca'];?></option>
        <?php } ?>
    </select>
<?php }?>

