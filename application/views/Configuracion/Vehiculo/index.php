<?php 
$sesion =  $_SESSION['usuario'][0];
defined('BASEPATH') OR exit('No direct script access allowed');
//$rol = $_SESSION['usuario'][0]['ROLASISTENCIA'];
?>
<?php $this->load->view('header'); ?>
<?php $this->load->view('nav'); ?>
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="page-header">
            <div id="btnGroupInput-group" class="col-xl-12 col-lg-12 col-sm-12 layout-spacing" style="margin-bottom: -40px;" >
                <div class="widget-content text-center split-buttons">
                    <div class="btn-toolbar justify-content-between mr-2" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mb-2" role="group" aria-label="First group">
                            <div class="page-title">
                                <h3 class="page-title textocambio">Vehículo</h3>              
                            </div>                            
                        </div>
                        <div class="input-group mb-2" >
                            <div class="toolbar" id="boton_list">
                                <button type="button" class="btn btn-primary mb-2 mr-2" title="Registrar" data-toggle="modal" data-target="#ModalRegistro" ModalRegistro="<?= site_url('Cochera/Modal_Vehiculo') ?>" >
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
                                    <th>N°&nbsp;Placa</th>
                                    <th>P.&nbsp;Registral</th>
                                    <th>N°&nbsp;Serie</th>
                                    <th>Tipo</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Color</th>
                                    <th>Asientos</th>
                                    <th>Chasis</th>
                                    <th>Llantas
                                    <th>Ejes</th>
                                    <th>Tipo Uso</th>
                                    <th>Fabricación</th>
                                    <th>Adquisición</th>
                                    <th class="no-content">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($list_vehiculo as $list){?> 
                                    <tr class="text-center">
                                        <td><?php echo $list['placa'] ?></td>
                                        <td><?php echo $list['pregistro'] ?></td>
                                        <td><?php echo $list['serie'] ?></td>
                                        <td><?php echo $list['nom_tipo'] ?></td>
                                        <td><?php echo $list['nom_marca'] ?></td>
                                        <td><?php echo $list['nom_modelo'] ?></td>
                                        <td><?php echo $list['nom_color'] ?></td>
                                        <td><?php echo $list['nasiento'] ?></td>
                                        <td><?php echo $list['chasis'] ?></td>
                                        <td><?php echo $list['nllanta'] ?></td>
                                        <td><?php echo $list['neje'] ?></td>
                                        <td><?php echo $list['tuso'] ?></td>
                                        <td><?php echo $list['fecha_fabricacion'] ?></td>
                                        <td><?php echo $list['fecha_adquisicion'] ?></td>
                                        <td >
                                            <a href="" data-toggle="modal" data-target="#ModalUpdate" ModalUpdate="<?= site_url('Cochera/Modal_Update_Vehiculo') ?>/<?php echo $list['id_vehiculo'] ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                            </a>
                                            <a style="cursor:pointer;" onclick="Delete_Vehiculo('<?php echo $list['id_vehiculo']; ?>')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel text-danger"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <b><p class="terms-conditions">Copyright © 2022 LyF Proyectos Peru, Reservados todos los derechos.</p>
</div>
    
<script>
    $(document).ready(function() {
        $("#liconfiguracion").addClass('active');
        //$("#mconfiguracion").attr('aria-expanded','true');
        $("#vehiculo").addClass('active');
    });
</script>
<?php $this->load->view('validaciones'); ?>
<?php $this->load->view('footer'); ?>