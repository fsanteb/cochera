<?php
class Model_Cochera extends CI_Model {
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("America/Lima");
    }
//-------------------tipo vehiculo-------------------//
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


//-------------------marca-------------------//
    function get_list_marca($id_marca=null){
        if(isset($id_marca) && $id_marca > 0){
            $sql = "SELECT * from marca where id_marca =".$id_marca;
        }
        else
        {
            $sql = "SELECT * from marca where estado=1";
        }
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function valida_marca($dato){
        $v="";
        if($dato['mod']==2){
        $v=" and id_marca!='".$dato['id_marca']."'";
        }
        $sql = "SELECT * from marca where estado=1 and cod_marca='".$dato['cod_marca']."' and nom_marca='".$dato['nom_marca']."' $v";
        
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function insert_marca($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
    
        $sql="INSERT into marca (cod_marca,nom_marca, estado,fec_reg, user_reg ) 
        values ('".$dato['cod_marca']."','".$dato['nom_marca']."', 1,NOW(),".$id_usuario.")";
        $this->db->query($sql);
    }
    
    function update_marca($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
    
        $sql="UPDATE marca set cod_marca='".$dato['cod_marca']."',nom_marca='".$dato['nom_marca']."',fec_act=NOW(), user_act=".$id_usuario." where id_marca='".$dato['id_marca']."'";
        $this->db->query($sql);
    }

    function delete_marca($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
    
        $sql="UPDATE marca set estado='2',fec_eli=NOW(), user_eli=".$id_usuario." where id_marca='".$dato['id_marca']."'";
        $this->db->query($sql);
    }

    //-------------------modelo-------------------//
    function get_list_modelo($id_modelo=null){
        if(isset($id_modelo) && $id_modelo > 0){
            $sql = "SELECT * from modelo where id_modelo =".$id_modelo;
        }
        else
        {
            $sql = "SELECT mo.* , m.nom_marca 
            from modelo mo
            LEFT JOIN marca m ON mo.id_marca= m.id_marca
            where mo.estado=1";
        }
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function valida_modelo($dato){
        $v="";
        if($dato['mod']==2){
        $v=" and id_modelo!='".$dato['id_modelo']."'";
        }
        $sql = "SELECT * from modelo where estado=1 and id_marca='".$dato['id_marca']."' and nom_modelo='".$dato['nom_modelo']."' $v";
        
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function insert_modelo($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
    
        $sql="INSERT into modelo (id_marca,nom_modelo, estado,fec_reg, user_reg ) 
        values ('".$dato['id_marca']."','".$dato['nom_modelo']."', 1,NOW(),".$id_usuario.")";
        $this->db->query($sql);
    }
    
    function update_modelo($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
    
        $sql="UPDATE modelo set id_marca='".$dato['id_marca']."',nom_modelo='".$dato['nom_modelo']."',fec_act=NOW(), user_act=".$id_usuario." where id_modelo='".$dato['id_modelo']."'";
       
        $this->db->query($sql);
    }

    function delete_modelo($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
    
        $sql="UPDATE modelo set estado='2',fec_eli=NOW(), user_eli=".$id_usuario." where id_modelo='".$dato['id_modelo']."'";
        $this->db->query($sql);
    }

}