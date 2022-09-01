<?php 
$sesion =  $_SESSION['usuario'][0];
defined('BASEPATH') OR exit('No direct script access allowed');
//$rol = $_SESSION['usuario'][0]['ROLASISTENCIA'];
?>
<?php $this->load->view('header'); ?>
<?php $this->load->view('nav'); ?>
<!--<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="page-header">
            <div id="btnGroupInput-group" class="col-xl-12 col-lg-12 col-sm-12 layout-spacing" style="margin-bottom: -40px;" >
                <div class="widget-content text-center split-buttons">
                    <div class="btn-toolbar justify-content-between mr-2" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mb-2" role="group" aria-label="First group">
                            <div class="page-title">
                                <h3 class="page-title textocambio">Banco</h3>              
                            </div>                            
                        </div>
                        <div class="input-group mb-2" >
                            <div class="toolbar" id="boton_list">
                            <button type="button" class="btn btn-primary mb-2 mr-2" title="Registrar" data-toggle="modal" data-target="#ModalRegistro" ModalRegistro="<?= site_url('Kasnet/Modal_Banco') ?>" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                Registrar
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row layout-top-spacing" id="cancel-row">
        
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th class="no-content dt-no-sorting">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($list_tipo_vehiculo as $list){?> 
                            <tr>
                                <td><?php echo $list['cod_banco'] ?></td>
                                <td><?php echo $list['nom_banco'] ?></td>
                                <td>
                                    <a href="javascript:void(0);"  title="Editar Banco" data-toggle="modal" data-target="#ModalUpdate" ModalUpdate="<?= site_url('Kasnet/Modal_Update_Banco') ?>/<?php echo $list["id_banco"]; ?>" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                    </a> 

                                    <a title="Eliminar" onclick="Delete_Banco('<?php echo $list['id_banco']; ?>')" id="delete" role="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </a>
                                </td>
                            </tr>   
                            <?php }?>
                            
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>-->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="page-header">
            <div id="btnGroupInput-group" class="col-xl-12 col-lg-12 col-sm-12 layout-spacing" style="margin-bottom: -40px;" >
                <div class="widget-content text-center split-buttons">
                    <div class="btn-toolbar justify-content-between mr-2" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mb-2" role="group" aria-label="First group">
                            <div class="page-title">
                                <h3 class="page-title textocambio">Tipo de Vehículo</h3>              
                            </div>                            
                        </div>
                        <div class="input-group mb-2" >
                            <div class="toolbar" id="boton_list">
                                <button type="button" class="btn btn-primary mb-2 mr-2" title="Registrar" data-toggle="modal" data-target="#ModalRegistro" ModalRegistro="<?= site_url('Cochera/Modal_Tipo_Vehiculo') ?>" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="row layout-top-spacing" id="cancel-row">
        
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">
                        <table id="zero-config" class="table dt-table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th class="no-content dt-no-sorting">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($list_tipo_vehiculo as $list){?> 
                                <tr>
                                    <td><?php echo $list['cod_tipo'] ?></td>
                                    <td><?php echo $list['nom_tipo'] ?></td>
                                    <td>
                                        <a href="javascript:void(0);"  title="Editar Banco" data-toggle="modal" data-target="#ModalUpdate" ModalUpdate="<?= site_url('Kasnet/Modal_Update_Banco') ?>/<?php echo $list["id_tipo"]; ?>" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                        </a> 

                                        <a title="Eliminar" onclick="Delete_Banco('<?php echo $list['id_tipo']; ?>')" id="delete" role="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </a>
                                    </td>
                                </tr>   
                                <?php }?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
    
<script>
    $(document).ready(function() {
        $("#configuracion").addClass('active');
        $("#mconfiguracion").attr('aria-expanded','true');
        $("#banco").addClass('active');
    });
</script>
<?php $this->load->view('validaciones'); ?>
<?php $this->load->view('footer'); ?>