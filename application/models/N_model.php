<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class n_model extends CI_Model{
    function __construct(){
      parent::__construct();
      $this->load->database();
      $this->load->library('session');  
    }

    public function login($usuario){
      $sql = "SELECT 	u.id_usuario, u.usuario_nombres, u.usuario_apater, u.usuario_amater, u.usuario_codigo, u.id_nivel, u.usuario_email, 
              u.usuario_password,u.estado, n.nom_nivel, u.foto,u.id_puesto,u.id_gerencia FROM users u
              left join nivel n on n.id_nivel=u.id_nivel
              WHERE u.estado='1' and u.usuario_codigo = '".$usuario."'";
      $query = $this->db->query($sql)->result_array();
      return $query;
    }

    public function gettipoacceso($usuario){

      $sql="select us.CODUSER,t.Tipo_acceso, t.DescAcceso
                  from Usuario_Sistema us 
                  inner join tipoacceso t on t.codi_sistema=us.Codi_Sistema and t.Tipo_acceso=us.Tipo_Acceso
                  where us.Codi_Sistema='0030' and us.CODUSER='".$usuario."'";

        $query = $this->db->query($sql)->result_array();
      if(count($query) > 0){

      }
      return $query;
    }
    function insert_ingreso_sistema($usuario){
      // $id_usuario= $_SESSION['usuario'];
       $ip=$_SERVER['REMOTE_ADDR'];
       $navegador=$_SERVER['HTTP_USER_AGENT'];
       $sql="insert into ingreso_sistema (id_usuario, ip,navegador, fec_ingreso ) 
       values ('".$usuario."', '".$ip."','".$navegador."', NOW())";
       $this->db->query($sql);
    }
      
  }
?>
