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

    //------------marca
    public function Marca() {
        if (!$this->session->userdata('usuario')) {
           redirect(base_url());
        }
        $dato['list_tipo_vehiculo'] = $this->Model_Cochera->get_list_tipovehiculo();
        $this->load->view('Configuracion/Tipo_Vehiculo/index', $dato);
    }

    public function Modal_Marca() {
        if (!$this->session->userdata('usuario')) {
           redirect(base_url());
        }
        $this->load->view('Configuracion/Tipo_Vehiculo/modal_registrar');
    }

    public function Insert_Marca(){
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
    public function Update_Marca(){
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

    public function Delete_Marca(){
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $dato['id_tipo']= $this->input->post("id_tipo");
        $this->Model_Cochera->delete_tipovehiculo($dato);
        
    }

    public function Modal_Update_Marca($id_tipo) {
        if (!$this->session->userdata('usuario')) {
           redirect(base_url());
        }
        $dato['get_id'] = $this->Model_Cochera->get_list_tipovehiculo($id_tipo);
        $this->load->view('Configuracion/Tipo_Vehiculo/modal_editar',$dato);
    }

        
}
