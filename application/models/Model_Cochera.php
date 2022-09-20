<?php
class Model_Cochera extends CI_Model {
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("America/Lima");
    }

    function get_list_tipovehiculo($id_tipo=null){
        if(isset($id_tipo) && $id_tipo > 0){
            $sql = "SELECT * from tipo_vehiculo where id_tipo =".$id_tipo;
        }
        else
        {
            $sql = "SELECT * from tipo_vehiculo where estado=1";
        }
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function valida_tipovehiculo($dato){
        $v="";
        if($dato['mod']==2){
        $v=" and id_tipo!='".$dato['id_tipo']."'";
        }
        $sql = "SELECT * from tipo_vehiculo where estado=1 and nom_tipo='".$dato['nom_tipo']."' and precio_abonado='".$dato['precio_abonado']."' and precio_noabonado='".$dato['precio_noabonado']."' $v";
        
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function insert_tipovehiculo($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
    
        $sql="INSERT into tipo_vehiculo (nom_tipo,precio_abonado,precio_noabonado, estado,fec_reg, user_reg ) 
        values ('".$dato['nom_tipo']."','".$dato['precio_abonado']."','".$dato['precio_noabonado']."', 1,NOW(),".$id_usuario.")";
        $this->db->query($sql);
    }
    
    function update_tipovehiculo($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
    
        $sql="UPDATE tipo_vehiculo set nom_tipo='".$dato['nom_tipo']."',precio_abonado='".$dato['precio_abonado']."',precio_noabonado='".$dato['precio_noabonado']."',fec_act=NOW(), user_act=".$id_usuario." where id_tipo='".$dato['id_tipo']."'";
        $this->db->query($sql);
    }

    function delete_tipovehiculo($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
    
        $sql="UPDATE tipo_vehiculo set estado='2',fec_eli=NOW(), user_eli=".$id_usuario." where id_tipo='".$dato['id_tipo']."'";
        $this->db->query($sql);
    }

}