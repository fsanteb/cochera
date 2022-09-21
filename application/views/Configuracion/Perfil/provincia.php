<select class="form-control" name="id_provincianac" id="id_provincianac" onchange="distrito_dpersonal()">
<option  value="0">Seleccionar</option>
<?php foreach($list_provincia as $list){ ?>
    <option value="<?php echo $list['id_provincia']; ?>"><?php echo $list['nombre_provincia'];?></option>
<?php } ?>
</select>  