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

    function valida_banco($dato){
        $v="";
        if($dato['mod']==2){
        $v=" and id_banco!='".$dato['id_banco']."'";
        }
        $sql = "SELECT * from banco where estado=1 and cod_banco='".$dato['cod_banco']."' and nom_banco='".$dato['nom_banco']."' $v";
        
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function insert_banco($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
    
        $sql="INSERT into banco (cod_banco,nom_banco, estado,fec_reg, user_reg ) 
        values ('".$dato['cod_banco']."','".$dato['nom_banco']."', 1,NOW(),".$id_usuario.")";
        $this->db->query($sql);
    }
    
    function update_banco($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
    
        $sql="UPDATE banco set cod_banco='".$dato['cod_banco']."',nom_banco='".$dato['nom_banco']."',fec_act=NOW(), user_act=".$id_usuario." where id_banco='".$dato['id_banco']."'";
        $this->db->query($sql);
    }

    function delete_banco($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
    
        $sql="UPDATE banco set estado='2',fec_eli=NOW(), user_eli=".$id_usuario." where id_banco='".$dato['id_banco']."'";
        $this->db->query($sql);
    }

}