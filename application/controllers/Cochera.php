<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\RichText\RichText;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Protection;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Worksheet\ColumnDimension;
use PhpOffice\PhpSpreadsheet\Worksheet;

class Cochera extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Model_Cochera');
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        //$this->load->library('excel');
        $this->load->library('form_validation');
        date_default_timezone_set("America/Lima");
    }


    public function index(){
        $this->load->view('index');
    }

    //----------------------Tipo Vehiculo-----------------------//

    public function Tipo_Vehiculo() {
        if (!$this->session->userdata('usuario')) {
           redirect(base_url());
        }
        $dato['list_tipo_vehiculo'] = $this->Model_Cochera->get_list_tipovehiculo();
        $this->load->view('Configuracion/Tipo_Vehiculo/index', $dato);
    }

    public function Modal_Tipo_Vehiculo() {
        if (!$this->session->userdata('usuario')) {
           redirect(base_url());
        }
        $this->load->view('Configuracion/Tipo_Vehiculo/modal_registrar');
    }

    public function Insert_Tipo_Vehiculo(){
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $dato['nom_tipo']= $this->input->post("nom_tipo");
        $dato['precio_abonado']= $this->input->post("precio_abonado");
        $dato['precio_noabonado']= $this->input->post("precio_noabonado");
        $dato['mod']=1;
        $total=count($this->Model_Cochera->valida_tipovehiculo($dato));
        if($total>0){
            echo "error";
        }
        else{
            $this->Model_Cochera->insert_tipovehiculo($dato);
        }
    }
    public function Update_Tipo_Vehiculo(){
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $dato['id_tipo']= $this->input->post("id_tipo");
        $dato['nom_tipo']= $this->input->post("nom_tipoe");
        $dato['precio_abonado']= $this->input->post("precio_abonadoe");
        $dato['precio_noabonado']= $this->input->post("precio_noabonadoe");
        $dato['mod']=2;
        $total=count($this->Model_Cochera->valida_tipovehiculo($dato));
        if($total>0){
            echo "error";
        }else{
            $this->Model_Cochera->update_tipovehiculo($dato);
        }
    }

    public function Delete_Tipo_Vehiculo(){
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $dato['id_tipo']= $this->input->post("id_tipo");
        $this->Model_Cochera->delete_tipovehiculo($dato);
        
    }

    public function Modal_Update_Tipo_Vehiculo($id_tipo) {
        if (!$this->session->userdata('usuario')) {
           redirect(base_url());
        }
        $dato['get_id'] = $this->Model_Cochera->get_list_tipovehiculo($id_tipo);
        $this->load->view('Configuracion/Tipo_Vehiculo/modal_editar',$dato);
    }

    //----------------------marca--------------------//
    public function Marca() {
        if (!$this->session->userdata('usuario')) {
           redirect(base_url());
        }
        $dato['list_marca'] = $this->Model_Cochera->get_list_marca();
        $this->load->view('Configuracion/Marca/index', $dato);
    }

    public function Modal_Marca() {
        if (!$this->session->userdata('usuario')) {
           redirect(base_url());
        }
        $this->load->view('Configuracion/Marca/modal_registrar');
    }

    public function Insert_Marca(){
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $dato['cod_marca']= $this->input->post("cod_marca");
        $dato['nom_marca']= $this->input->post("nom_marca");
        $dato['mod']=1;
        $total=count($this->Model_Cochera->valida_marca($dato));
        if($total>0){
            echo "error";
        }
        else{
            $this->Model_Cochera->insert_marca($dato);
        }
    }
    public function Update_Marca(){
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $dato['id_marca']= $this->input->post("id_marca");
        $dato['cod_marca']= $this->input->post("cod_marcae");
        $dato['nom_marca']= $this->input->post("nom_marcae");
        $dato['mod']=2;
        $total=count($this->Model_Cochera->valida_marca($dato));
        if($total>0){
            echo "error";
        }else{
            $this->Model_Cochera->update_marca($dato);
        }
    }

    public function Delete_Marca(){
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $dato['id_marca']= $this->input->post("id_marca");
        $this->Model_Cochera->delete_marca($dato);
        
    }

    public function Modal_Update_Marca($id_marca) {
        if (!$this->session->userdata('usuario')) {
           redirect(base_url());
        }
        $dato['get_id'] = $this->Model_Cochera->get_list_marca($id_marca);
        $this->load->view('Configuracion/Marca/modal_editar',$dato);
    }


  //----------------------modelo--------------------//
    public function Modelo() {
            if (!$this->session->userdata('usuario')) {
               redirect(base_url());
            }
            $dato['list_modelo'] = $this->Model_Cochera->get_list_modelo();
            $this->load->view('Configuracion/Modelo/index', $dato);
    }
    
    public function Modal_Modelo() {
            if (!$this->session->userdata('usuario')) {
               redirect(base_url());
            }
            $dato['list_marcacombo'] = $this->Model_Cochera->get_list_marca();
            $this->load->view('Configuracion/Modelo/modal_registrar',$dato);
    }
    
    public function Insert_Modelo(){
            if (!$this->session->userdata('usuario')) {
                redirect(base_url());
            }
            $dato['id_marca']= $this->input->post("id_marca");
            $dato['nom_modelo']= $this->input->post("nom_modelo");
            $dato['mod']=1;
            $total=count($this->Model_Cochera->valida_modelo($dato));
            if($total>0){
                echo "error";
            }
            else{
                $this->Model_Cochera->insert_modelo($dato);
            }
    }

    public function Update_Modelo(){
            if (!$this->session->userdata('usuario')) {
                redirect(base_url());
            }
            $dato['id_modelo']= $this->input->post("id_modeloe");
            $dato['id_marca']= $this->input->post("id_marcae");
            $dato['nom_modelo']= $this->input->post("nom_modeloe");
            $dato['mod']=2;
            $total=count($this->Model_Cochera->valida_modelo($dato));
            if($total>0){
                echo "error";
            }else{
                $this->Model_Cochera->update_modelo($dato);
            }
    }
    
    public function Delete_Modelo(){
            if (!$this->session->userdata('usuario')) {
                redirect(base_url());
            }
            $dato['id_modelo']= $this->input->post("id_modelo");
            $this->Model_Cochera->delete_modelo($dato);
            
    }
    
    public function Modal_Update_Modelo($id_modelo) {
            if (!$this->session->userdata('usuario')) {
               redirect(base_url());
            }
            $dato['get_id'] = $this->Model_Cochera->get_list_modelo($id_modelo);
            $dato['list_marcacombo'] = $this->Model_Cochera->get_list_marca();
            $this->load->view('Configuracion/Modelo/modal_editar',$dato);
    }


    //----------------------Color-----------------------//

    public function Color() {
        if (!$this->session->userdata('usuario')) {
           redirect(base_url());
        }
        $dato['list_color'] = $this->Model_Cochera->get_list_color();
        $this->load->view('Configuracion/Color/index', $dato);
    }

    public function Modal_Color() {
        if (!$this->session->userdata('usuario')) {
           redirect(base_url());
        }
        $this->load->view('Configuracion/Color/modal_registrar');
    }

    public function Insert_Color(){
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $dato['nom_color']= $this->input->post("nom_color");
        $dato['mod']=1;
        $total=count($this->Model_Cochera->valida_color($dato));
        if($total>0){
            echo "error";
        }
        else{
            $this->Model_Cochera->insert_color($dato);
        }
    }

    public function Update_Color(){
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $dato['id_color']= $this->input->post("id_color");
        $dato['nom_color']= $this->input->post("nom_colore");
        $dato['mod']=2;
        $total=count($this->Model_Cochera->valida_color($dato));
        if($total>0){
            echo "error";
        }else{
            $this->Model_Cochera->update_color($dato);
        }
    }

    public function Delete_Color(){
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $dato['id_color']= $this->input->post("id_color");
        $this->Model_Cochera->delete_color($dato);
        
    }

    public function Modal_Update_Color($id_color) {
        if (!$this->session->userdata('usuario')) {
           redirect(base_url());
        }
        $dato['get_id'] = $this->Model_Cochera->get_list_color($id_color);
        $this->load->view('Configuracion/Color/modal_editar',$dato);
    }

    //--------DUEÑO------------//
    public function Dueno() {
        if (!$this->session->userdata('usuario')) {
           redirect(base_url());
        }
        $dato['list_dueno'] = $this->Model_Cochera->colaborador_porcentaje();
        $this->load->view('Configuracion/Dueno/index', $dato);
    }

    public function Modal_Dueno() {
        if (!$this->session->userdata('usuario')) {
           redirect(base_url());
        }
        $dato['list_nivel'] = $this->Model_Cochera->get_list_nivel_dueno();
        $this->load->view('Configuracion/Dueno/modal_registrar',$dato);
    }

    public function Insert_Dueno(){
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $dato['id_nivel']= $this->input->post("id_nivel");
        $dato['num_doc']= $this->input->post("num_doc");
        $dato['usuario_apater']= $this->input->post("usuario_apater");
        $dato['usuario_amater']= $this->input->post("usuario_amater");
        $dato['usuario_nombres']= $this->input->post("usuario_nombres");
        $dato['usuario_password']= password_hash($dato['num_doc'], PASSWORD_DEFAULT);
        $dato['mod']=1;
        $total=count($this->Model_Cochera->valida_dueno($dato));
        if($total>0){
            echo "error";
        }
        else{
            $this->Model_Cochera->insert_dueno($dato);
        }
    }

    public function Update_Dueno(){
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $dato['id_usuario']= $this->input->post("id_usuario");
        $dato['num_doc']= $this->input->post("num_doce");
        $dato['password']= $this->input->post("passworde");
        $dato['usuario_password']= password_hash($dato['password'], PASSWORD_DEFAULT);
        $dato['mod']=2;
        $total=count($this->Model_Cochera->valida_dueno($dato));
        if($total>0){
            echo "error";
        }else{
            $this->Model_Cochera->update_password_dueno($dato);
        }
    }

    public function Delete_Dueno(){
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $dato['id_usuario']= $this->input->post("id_usuario");
        $this->Model_Cochera->delete_dueno($dato);
        
    }

    public function Modal_Update_Dueno($id_usuario) {
        if (!$this->session->userdata('usuario')) {
           redirect(base_url());
        }
        $dato['get_id'] = $this->Model_Cochera->colaborador_porcentaje($id_usuario);
        $this->load->view('Configuracion/Dueno/modal_editar',$dato);
    }

    public function Mi_Perfil($id_usuario) {
        if (!$this->session->userdata('usuario')) {
           redirect(base_url());
        }
        $dato['get_id'] = $this->Model_Cochera->colaborador_porcentaje($id_usuario);
        $this->load->view('Configuracion/Perfil/miperfil',$dato);
    }

    public function Perfil($id_usuario=null){
        if ($this->session->userdata('usuario')) {
            if(isset($id_usuario) && $id_usuario > 0){
                $id_usuario=$id_usuario;
            }
            else{
                $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
            }
            
            $dato['id_usuario']=$id_usuario;
            $dato['get_id'] = $this->Model_Cochera->colaborador_porcentaje($id_usuario);

            $id_departamento = $dato['get_id'][0]['id_departamento'];
            $id_provincia = $dato['get_id'][0]['id_provincia'];
            
            
            $dato['list_genero'] = $this->Model_Cochera->get_list_genero();
            $dato['list_dia'] = $this->Model_Cochera->get_list_dia();
            $dato['list_mes'] = $this->Model_Cochera->get_list_mes();
            $dato['list_anio'] = $this->Model_Cochera->get_list_anio();
            $dato['list_tipo_documento'] = $this->Model_Cochera->get_list_tipo_documento();
            $dato['list_nacionalidad_perfil'] = $this->Model_Cochera->get_list_nacionalidad_perfil();
            $dato['list_estado_civil'] = $this->Model_Cochera->get_list_estado_civil();
            $dato['list_departamento'] = $this->Model_Cochera->get_list_departamento();
            $dato['list_provincia'] = $this->Model_Cochera->get_list_provincia($id_departamento);
            $dato['list_distrito'] = $this->Model_Cochera->get_list_distrito($id_departamento,$id_provincia);
            $dato['list_provincianac'] = $this->Model_Cochera->get_list_provincia($dato['get_id'][0]['id_departamentonac']);
            $dato['list_distritonac'] = $this->Model_Cochera->get_list_distrito($dato['get_id'][0]['id_departamentonac'],$dato['get_id'][0]['id_provincianac']);
            //$dato['list_categoria_brevete'] = $this->Model_Cochera->list_categoria_brevete();
            
            $this->load->view('Configuracion/Perfil/index',$dato);
        }
        else{
            redirect('');
        }
    }


    public function Update_GDatosP(){
        if($this->session->userdata('usuario')) {

            $dato['id_usuario'] = $this->input->post("id_usuariodp");

            $dato['foto']= $this->input->post("foto");
            
            $dato['usuario_apater']= strtoupper($this->input->post("usuario_apater"));
            $dato['usuario_amater']= strtoupper($this->input->post("usuario_amater"));
            $dato['usuario_nombres']= strtoupper($this->input->post("usuario_nombres"));
            $dato['id_nacionalidad']= $this->input->post("id_nacionalidad");
            $dato['id_tipo_documento']= $this->input->post("id_tipo_documento");
            $dato['num_doc']= $this->input->post("num_doc");
            $dato['id_genero']= $this->input->post("id_genero");
            $dato['dia_nac']= $this->input->post("dia_nac");
            $dato['mes_nac']= $this->input->post("mes_nac");
            $dato['anio_nac']= $this->input->post("anio_nac");
            $dato['id_estado_civil']= $this->input->post("id_estado_civil");
            $dato['emailp']= $this->input->post("emailp");
            $dato['num_celp']= $this->input->post("num_celp");
            $dato['fec_nac']=$this->input->post("anio_nac")."-".$this->input->post("mes_nac")."-".$this->input->post("dia_nac");
            $dato['fec_emision_doc']= $this->input->post("fec_emision");
            $dato['fec_vencimiento_doc']= $this->input->post("fec_venci");

            $dato['id_departamentonac']= $this->input->post("id_departamentonac");
            $dato['id_provincianac']= $this->input->post("id_provincianac");
            $dato['id_distritonac']= $this->input->post("id_distritonac");
            $dato['otro_estado_civil']= $this->input->post("otro_estado_civil");

            $dato['total'] = $this->Model_Cochera->colaborador_porcentaje($dato['id_usuario']);

            $this->Model_Cochera->update_gdatosp($dato);
        }else{
            redirect('');
        
        }
    }

    public function Lista_GDatosP(){
        if ($this->session->userdata('usuario')) {
            $id_usuario= $this->input->post("id_usuariodp");
        
            $dato['list_tipo_documento'] = $this->Model_Cochera->get_list_tipo_documento();
            $dato['list_nacionalidad_perfil'] = $this->Model_Cochera->get_list_nacionalidad_perfil();
            $dato['list_genero'] = $this->Model_Cochera->get_list_genero();
            $dato['list_dia'] = $this->Model_Cochera->get_list_dia();
            $dato['list_mes'] = $this->Model_Cochera->get_list_mes();
            $dato['list_anio'] = $this->Model_Cochera->get_list_anio();
            $dato['list_estado_civil'] = $this->Model_Cochera->get_list_estado_civil();
            $dato['get_id'] = $this->Model_Cochera->colaborador_porcentaje($id_usuario);
            $_SESSION['foto']=$dato['get_id'][0]['foto'];
            $dato['list_usuario'] = $this->Model_Cochera->colaborador_porcentaje($id_usuario);
            $dato['list_departamento'] = $this->Model_Cochera->get_list_departamento();
            $dato['list_provincianac'] = $this->Model_Cochera->get_list_provincia($dato['get_id'][0]['id_departamentonac']);
            $dato['list_distritonac'] = $this->Model_Cochera->get_list_distrito($dato['get_id'][0]['id_departamentonac'],$dato['get_id'][0]['id_provincianac']);
            
            $this->load->view('Configuracion/Perfil/datospersonales',$dato);
            
        }else{
            redirect('');
        }
    }

    public function Provincia_DPersonal() {
        if ($this->session->userdata('usuario')) {
            $id_departamento= $this->input->post("id_departamentonac");
            $dato['list_provincia'] = $this->Model_Cochera->get_list_provincia($id_departamento);
            $this->load->view('Configuracion/Perfil/provincia', $dato);
        }else{
            redirect('');
        }
    }
    
    public function Distrito_DPersonal() {
        if ($this->session->userdata('usuario')) {
            $id_departamento= $this->input->post("id_departamentonac");
            $id_provincia= $this->input->post("id_provincianac");
            $dato['list_distrito'] = $this->Model_Cochera->get_list_distrito($id_departamento,$id_provincia);
            $this->load->view('Configuracion/Perfil/distrito', $dato);
        }else{
            redirect('');
        }
    }

    public function Aprobar_Datos(){
        if($this->session->userdata('usuario')) {

            $dato['id_usuario'] = $this->input->post("id_usuario");
            $dato['t']= $this->input->post("t");
            $this->Model_Cochera->aprobar_datos($dato);
        }else{
            redirect('');
        
        }
    }

    //------------VEHICULO---------------------//
    public function Vehiculo(){
        if ($this->session->userdata('usuario')) {
            $dato['list_vehiculo'] = $this->Model_Cochera->get_list_vehiculo();
            $this->load->view('Configuracion/Vehiculo/index',$dato);
        }else{
            redirect('');
        }
    }

    public function Modal_Vehiculo(){
        if ($this->session->userdata('usuario')) {
            $dato['list_tipo_vehiculo'] = $this->Model_Cochera->get_list_tipovehiculo($id_tipo=null);
            $dato['list_color_vehiculo'] = $this->Model_Cochera->get_list_color($id_color=null);
            $dato['list_marca'] = $this->Model_Cochera->get_list_marca();
        $this->load->view('Configuracion/Vehiculo/modal_reg',$dato);  
        }
        else{
            redirect('');
        }
    }

    public function Insert_Vehiculo(){
        if ($this->session->userdata('usuario')) {
            $dato['placa'] =$this->input->post("placa");
            $dato['pregistro'] =$this->input->post("pregistro");
            $dato['serie'] =$this->input->post("serie");
            $dato['fec_fabricacion'] =$this->input->post("fec_fabricacion");
            $dato['fec_adquisicion'] =$this->input->post("fec_adquisicion");
            $dato['id_tipo'] =$this->input->post("id_tipo");
            $dato['id_marca'] =$this->input->post("id_marca");
            $dato['id_modelo'] =$this->input->post("id_modelo");
            $dato['id_color'] =$this->input->post("id_color");
            $dato['nasiento'] =$this->input->post("nasiento");
            $dato['chasis'] =$this->input->post("chasis");
            $dato['nllanta'] =$this->input->post("nllanta");
            $dato['neje'] =$this->input->post("neje");
            $dato['tuso'] =$this->input->post("tuso");
            $dato['id_empresa']= $_SESSION['usuario'][0]['id_empresa'];
            $dato['modal']= 1;
            $canti=count($this->Model_Cochera->valida_vehiculo($dato));

            if($canti>0){
                echo "error";
            }else{
                $num = count($this->Model_Cochera->get_cant_vehiculo($dato));
                $aniof=substr(date('Y'), 2,2);
                if($num<9){
                    $codigo="V"."0000".($num+1);
                }
                if($num>=9 && $num<99){
                    $codigo="V"."000".($num+1);
                }
                if($num>=99 && $num<999){
                    $codigo="V"."00".($num+1);
                }
                if($num>=999 && $num<9999){
                    $codigo="V"."0".($num+1);
                }
                if($num>9999){
                    $codigo="V".($num+1);
                }
                $dato['cod_vehiculo']= $codigo;
                $this->Model_Cochera->insert_vehiculo($dato);
            }
        }
        else{
            redirect('');
        }        
    }

    public function Modal_Update_Vehiculo($id_vehiculo){
        if ($this->session->userdata('usuario')) {
            $dato['get_id'] = $this->Model_Cochera->get_list_vehiculo($id_vehiculo);
            $dato['list_color_vehiculo'] = $this->Model_Cochera->get_list_color($id_color=null);
            $dato['list_tipo_vehiculo'] = $this->Model_Cochera->get_list_tipovehiculo($id_tipo=null);
            $dato['id_tipo'] =$dato['get_id'][0]['id_tipo'];
            $dato['list_marca_vehiculo'] = $this->Model_Cochera->get_list_marca($id_marca=null);
            $id_marca =$dato['get_id'][0]['id_marca'];
            $dato['list_modelo_vehiculo']=$this->Model_Cochera->busca_modelov($id_marca);
            $this->load->view('Configuracion/Vehiculo/modal_upd',$dato);   
        }
        else{
            redirect('');
        }
    }

    public function Update_Vehiculo(){
        if ($this->session->userdata('usuario')) {
            $dato['id_vehiculo'] =$this->input->post("id_vehiculo");
            $dato['placa'] =$this->input->post("placae");
            $dato['pregistro'] =$this->input->post("pregistroe");
            $dato['serie'] =$this->input->post("seriee");
            $dato['fec_fabricacion'] =$this->input->post("fec_fabricacione");
            $dato['fec_adquisicion'] =$this->input->post("fec_adquisicione");
            $dato['id_tipo'] =$this->input->post("id_tipoe");
            $dato['id_marca'] =$this->input->post("id_marcae");
            $dato['id_modelo'] =$this->input->post("id_modeloe");
            $dato['id_color'] =$this->input->post("id_colore");
            $dato['nasiento'] =$this->input->post("nasientoe");
            $dato['chasis'] =$this->input->post("chasise");
            $dato['nllanta'] =$this->input->post("nllantae");
            $dato['neje'] =$this->input->post("nejee");
            $dato['tuso'] =$this->input->post("tusoe");
            $dato['modal'] =2;
            $dato['id_empresa']= $_SESSION['usuario'][0]['id_empresa'];
            $canti=count($this->Model_Cochera->valida_vehiculo($dato));

            if($canti>0){
                echo "error";
            }else{
                $this->Model_Cochera->update_vehiculo($dato);
            }
        }
        else{
            redirect('');
        }        
    }

    public function Delete_Vehiculo(){
        if ($this->session->userdata('usuario')) {
            $dato['id_vehiculo'] =$this->input->post("id_vehiculo");
            $this->Model_Cochera->delete_vehiculo($dato);
        }
        else{
            redirect('');
        }        
    }

    //---------asignacion dueño---------------//
    public function AsignacionD(){
        if ($this->session->userdata('usuario')) {
            $dato['list_asignacion'] = $this->Model_Cochera->get_list_asignacion_dueno();
            $this->load->view('Configuracion/AsignacionD/index',$dato);
        }else{
            redirect('');
        }
    }

    public function Modal_AsignacionD(){
        if ($this->session->userdata('usuario')) {
            $dato['list_vehiculo'] = $this->Model_Cochera->get_list_vehiculo();
            $dato['list_dueno'] = $this->Model_Cochera->colaborador_porcentaje();
            $this->load->view('Configuracion/AsignacionD/modal_registrar',$dato);   
        }
        else{
            redirect('');
        }
    }

    public function Insert_AsignacionD(){
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $dato['id_dueno']= $this->input->post("id_dueno");
        //var_dump($dato['id_usuario']);
        $dato['id_vehiculo']= $this->input->post("id_vehiculo");
        $dato['mod']=1;
        $total=count($this->Model_Cochera->valida_asignacion_dueno($dato));
        if($total>0){
            echo "error";
        }
        else{
            $this->Model_Cochera->insert_asignacion_dueno($dato);
        }
    }

    public function Modal_Update_AsignacionD($id_asignacion){
        if ($this->session->userdata('usuario')) {

            $dato['get_id'] = $this->Model_Cochera->get_list_asignacion_dueno($id_asignacion);
            $dato['list_vehiculo'] = $this->Model_Cochera->get_list_vehiculo($id_vehiculo=null);
            $dato['list_dueno'] = $this->Model_Cochera->colaborador_porcentaje($id_usuario=null);
            //$dato['list_modelo_vehiculo']=$this->Model_Cochera->busca_modelov($dato);

            $this->load->view('Configuracion/AsignacionD/modal_editar',$dato);   
        }
        else{
            redirect('');
        }
    }

    public function Update_AsignacionD(){
        if ($this->session->userdata('usuario')) {
            $dato['id_asignacion'] =$this->input->post("id_asignacion");
            $dato['id_dueno'] =$this->input->post("id_duenoe");
            $dato['id_vehiculo'] =$this->input->post("id_vehiculoe");
            $dato['mod'] =2;
            $canti=count($this->Model_Cochera->valida_asignacion_dueno($dato));

            if($canti>0){
                echo "error";
            }else{
                $this->Model_Cochera->update_asignacion_dueno($dato);
            }
        }
        else{
            redirect('');
        }        
    }

    public function Delete_AsignacionD(){
        if ($this->session->userdata('usuario')) {
            $dato['id_asignacion'] =$this->input->post("id_asignacion");
            $this->Model_Cochera->delete_vehiculo($dato);
        }
        else{
            redirect('');
        }        
    }


    //----------------------Costo--------------------//
    public function Costo() {
        if (!$this->session->userdata('usuario')) {
           redirect(base_url());
        }
        $dato['list_costo'] = $this->Model_Cochera->get_list_costo();
        $this->load->view('Configuracion/Costo/index', $dato);
    }

    public function Modal_Costo() {
        if (!$this->session->userdata('usuario')) {
           redirect(base_url());
        }
        $dato['list_tipo_vehiculo'] = $this->Model_Cochera->get_list_tipovehiculo($id_tipo=null);
        $this->load->view('Configuracion/Costo/modal_registrar', $dato);
    }

    public function Insert_Costo(){
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $dato['id_tipo']= $this->input->post("id_tipo");
        $dato['costo_diario']= $this->input->post("costo_diario");
        $dato['costo_mensual']= $this->input->post("costo_mensual");
        $dato['mod']=1;
        $total=count($this->Model_Cochera->valida_costo($dato));
        if($total>0){
            echo "error";
        }
        else{
            $this->Model_Cochera->insert_costo($dato);
        }
    }
    public function Update_Costo(){
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $dato['id_costo']= $this->input->post("id_costo");
        $dato['id_tipo']= $this->input->post("id_tipoe");
        $dato['costo_diario']= $this->input->post("costo_diarioe");
        $dato['costo_mensual']= $this->input->post("costo_mensuale");
        $dato['mod']=2;
        $total=count($this->Model_Cochera->valida_costo($dato));
        //echo($total);
        if($total>0){
            echo "error";
        }else{
            $this->Model_Cochera->update_costo($dato);
        }
    }

    public function Delete_Costo(){
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $dato['id_costo']= $this->input->post("id_costo");
        $this->Model_Cochera->delete_costo($dato);
        
    }

    public function Modal_Update_Costo($id_costo) {
        if (!$this->session->userdata('usuario')) {
           redirect(base_url());
        }
        $dato['get_id'] = $this->Model_Cochera->get_list_costo($id_costo);
        $dato['list_tipo_vehiculo'] = $this->Model_Cochera->get_list_tipovehiculo();
        $this->load->view('Configuracion/Costo/modal_editar',$dato);
    }


    public function Busca_ModeloV($t){
        if ($this->session->userdata('usuario')) {
            $dato['modal']=$t;
            $v ='';
            if($t==2){
                $v ="e";
            }
            $id_marca=$this->input->post("id_marca".$v);
            //var_dump($dato['id_marca'] );
            $dato['list_modelo_vehiculo']=$this->Model_Cochera->busca_modelov($id_marca);
            $this->load->view('Configuracion/Vehiculo/cmb_modelo',$dato);
        }
        else{
            redirect('');
        }        
    }

    public function Operaciones(){
        if ($this->session->userdata('usuario')) {
            //$dato['list_asignacion'] = $this->Model_Cochera->get_list_asignacion_dueno();
            $this->load->view('Operaciones/Operaciones/index');
        }else{
            redirect('');
        }
    }

    public function Modal_Operaciones(){
        if ($this->session->userdata('usuario')) {
            $dato['list_asignacion'] = $this->Model_Cochera->get_list_asignacion_dueno();
            $this->load->view('Operaciones/Operaciones/modal_registrar',$dato);   
        }
        else{
            redirect('');
        }
    }
}
