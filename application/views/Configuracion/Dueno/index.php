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
                                <h3 class="page-title textocambio">Dueños</h3>              
                            </div>                            
                        </div>
                        <div class="input-group mb-2" >
                            <div class="toolbar" id="boton_list">
                                <button type="button" class="btn btn-primary mb-2 mr-2" title="Registrar" data-toggle="modal" data-target="#ModalRegistro" ModalRegistro="<?= site_url('Cochera/Modal_Dueno') ?>" >
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
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Nombres</th>
                                    <th>Tipo Documento</th>
                                    <th>N° Documento</th>
                                    <th>Teléfono Celular</th>
                                    <!--<th>Puesto</th>
                                    <th>Área</th>-->
                                    <th>Progreso</th>
                                    <th class="no-content"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($list_dueno as $list) {?>   
                                <tr>
                                    <td><?php echo $list['usuario_apater']; ?></td>
                                    <td><?php echo $list['usuario_amater']; ?></td>    
                                    <td><?php echo $list['usuario_nombres']; ?></td>
                                    <td><?php echo $list['cod_tipo_documento']; ?></td>
                                    <td><?php echo $list['num_doc']; ?></td>
                                    <td><a href="tel:+51<?php echo $list['num_celp'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone-outgoing"><polyline points="23 7 23 1 17 1"></polyline><line x1="16" y1="8" x2="23" y2="1"></line><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg></a>
                                    <a href="https://api.whatsapp.com/send?phone=51<?php echo $list['num_celp'] ?>&text=hola,%20<?php echo $list['usuario_nombres']; ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="24px" height="24px" fill-rule="evenodd" clip-rule="evenodd"><path fill="#fff" d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z"/><path fill="#fff" d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z"/><path fill="#cfd8dc" d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z"/><path fill="#40c351" d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z"/><path fill="#fff" fill-rule="evenodd" d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z" clip-rule="evenodd"/></svg></a>
                                    <?php echo $list['num_celp']; ?></td>
                                    <!--<td></td>
                                    <td></td>-->
                                    <td>
                                        <div class="progress br-30">
                                            <div class="progress-bar br-30 bg-primary" role="progressbar" style="width: <?php 
                                            $porcentaje=round((($list['nombres']+$list['apater']+$list['amater']+$list['nacionalidadp']+$list['tipo_documento']+$list['num_docp']+$list['fec_nac']+$list['estado_civil']+$list['emailpp']+$list['num_celpp']+$list['fotop'])/11)*100,2);;
                                            echo $porcentaje."%"; ?>" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <?php echo $porcentaje."%"; ?>
                                    </td>
                                    <td class="text-center" nowrap>
                                        <a title="Ver Perfil" href="<?= site_url('Cochera/Mi_Perfil') ?>/<?php echo $list['id_usuario']; ?>" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-success">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </a>
                                        <?php if($list['foto']!=""){?> 
                                        <a href="<?php echo base_url().$list['foto']; ?>" title="Descargar Imágen" download>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                        </a> 
                                        <?php }?>
                                        
                                        <a href="javascript:void(0);"  title="Editar" data-toggle="modal" data-target="#ModalUpdate" ModalUpdate="<?= site_url('Cochera/Modal_Update_Dueno') ?>/<?php echo $list["id_usuario"]; ?>" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg>
                                        </a>
                                        <a class="efectob" target="_blank" title="pdf" href="<?= site_url('Cochera/pdf_perfil_covert') ?>/<?php echo $list["id_usuario"]; ?>">
                                            <svg id="Capa_1" enable-background="new 0 0 512 512" height="20" viewBox="0 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg"><g><g><path d="m459.265 466.286c0 25.248-20.508 45.714-45.806 45.714h-314.918c-25.298 0-45.806-20.467-45.806-45.714v-420.572c0-25.247 20.508-45.714 45.806-45.714h196.047c9.124 0 17.874 3.622 24.318 10.068l130.323 130.34c6.427 6.427 10.036 15.137 10.036 24.217z" fill="#f9f8f9"/><path d="m129.442 512h-30.905c-25.291 0-45.802-20.47-45.802-45.719v-420.562c0-25.249 20.511-45.719 45.802-45.719h30.905c-25.291 0-45.802 20.47-45.802 45.719v420.561c0 25.25 20.511 45.72 45.802 45.72z" fill="#e3e0e4"/><path d="m459.265 164.623v16.73h-119.46c-34.12 0-61.873-27.763-61.873-61.883v-119.47h16.658c9.117 0 17.874 3.626 24.312 10.065l130.328 130.339c6.429 6.428 10.035 15.143 10.035 24.219z" fill="#e3e0e4"/><path d="m456.185 qu150.448h-116.38c-17.101 0-30.967-13.866-30.967-30.978v-116.369c3.719 1.679 7.129 4.028 10.065 6.964l130.328 130.339c2.936 2.935 5.275 6.335 6.954 10.044z" fill="#dc4955"/><path d="m440.402 444.008h-368.804c-22.758 0-41.207-18.45-41.207-41.207v-150.407c0-22.758 18.45-41.207 41.207-41.207h368.805c22.758 0 41.207 18.45 41.207 41.207v150.406c0 22.759-18.45 41.208-41.208 41.208z" fill="#dc4955"/><path d="m97.352 444.008h-25.754c-22.757 0-41.207-18.451-41.207-41.207v-150.407c0-22.757 18.451-41.207 41.207-41.207h25.755c-22.757 0-41.207 18.451-41.207 41.207v150.406c-.001 22.757 18.449 41.208 41.206 41.208z" fill="#c42430"/><g fill="#f9f8f9"><path d="m388.072 277.037c4.267 0 7.726-3.458 7.726-7.726s-3.459-7.726-7.726-7.726h-47.247c-4.267 0-7.726 3.458-7.726 7.726v116.573c0 4.268 3.459 7.726 7.726 7.726s7.726-3.458 7.726-7.726v-51.664h35.768c4.267 0 7.726-3.458 7.726-7.726s-3.459-7.726-7.726-7.726h-35.768v-41.731z"/><path d="m258.747 262.891h-32.276c-2.052 0-4.019.816-5.468 2.268s-2.262 3.42-2.258 5.472v.101.004 111.99c0 .637.085 1.252.231 1.844v.035c.007 2.049.829 4.012 2.283 5.456 1.447 1.437 3.405 2.243 5.443 2.243h.029c.974-.004 23.943-.093 33.096-.251 15.515-.272 29.33-7.303 38.904-19.798 8.875-11.583 13.763-27.443 13.763-44.657 0-38.703-21.599-64.707-53.747-64.707zm.811 113.71c-5.75.1-17.382.173-25.155.213-.043-12.743-.122-37.877-.122-49.343 0-9.584-.044-35.933-.068-49.127h24.535c28.234 0 38.294 25.442 38.294 49.254-.001 28.467-15.415 48.617-37.484 49.003z"/></g></g><path d="m146.336 261.444h-32.967c-6.746 0-7.102 2.938-7.102 7.099v118.397c0 3.921 3.178 7.099 7.099 7.099 3.92 0 7.099-3.177 7.099-7.099v-44.368c7.698-.044 19.916-.107 25.868-.107 22.698 0 41.165-18.173 41.165-40.511-.001-22.337-18.464-40.51-41.162-40.51zm0 66.824c-5.913 0-17.952.061-25.679.106-.044-7.914-.107-20.39-.107-26.419 0-5.066-.036-18.095-.061-26.313h25.846c14.618 0 26.967 12.049 26.967 26.313.001 14.264-12.349 26.313-26.966 26.313z" fill="#f9f8f9"/></g></svg>
                                        </a>
                                        <a class="#" title="Eliminar" onclick="Eliminar_Colaborador('<?php echo $list['id_usuario']; ?>')" id="delete" role="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
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
</div>
    
<script>
    $(document).ready(function() {
        $("#liconfiguracion").addClass('active');
        $("#dueno").addClass('active');
    });
</script>
<?php $this->load->view('validaciones'); ?>
<?php $this->load->view('footer'); ?>