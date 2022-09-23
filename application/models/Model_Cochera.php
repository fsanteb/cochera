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

    //------------dueño
    function get_list_nivel_dueno(){
        $sql = "SELECT * from nivel where estado=1 and id_nivel in (2)";
        
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function colaborador_porcentaje($id_usuario=null){
        if(isset($id_usuario) && $id_usuario > 0){
            $sql = "SELECT u.id_usuario, u.usuario_apater, td.cod_tipo_documento,u.id_departamento,u.id_provincia,u.id_distrito,u.fec_emision_doc,u.fec_vencimiento_doc,u.id_estado_civil,u.otro_estado_civil,
                u.num_celp,u.num_doc, u.usuario_amater, u.usuario_nombres, n.nom_nacionalidad,u.id_departamentonac,u.id_provincianac,u.id_distritonac,u.flag,
                u.foto, EXTRACT(DAY FROM u.fec_nac) AS dia,u.dia_nac,u.mes_nac,u.anio_nac,u.id_nacionalidad,u.id_genero,u.id_tipo_documento, u.emailp,case month(u.fec_nac) 
                WHEN 1 THEN 'Enero'
                WHEN 2 THEN 'Febrero'
                WHEN 3 THEN 'Marzo' 
                WHEN 4 THEN 'Abril' 
                WHEN 5 THEN 'Mayo'
                WHEN 6 THEN 'Junio'
                WHEN 7 THEN 'Julio'
                WHEN 8 THEN 'Agosto'
                WHEN 9 THEN 'Septiembre'
                WHEN 10 THEN 'Octubre'
                WHEN 11 THEN 'Noviembre'
                WHEN 12 THEN 'Diciembre'
                END mes,
                (case when u.usuario_nombres!='' then 1 else 0 end) as nombres,
                (case when u.usuario_apater!='' then 1 else 0 end) as apater,
                (case when u.usuario_amater!='' then 1 else 0 end) as amater,
                (case when u.id_nacionalidad is not null then 1 else 0 end) as nacionalidadp,
                (case when u.id_tipo_documento is not null then 1 else 0 end) as tipo_documento,
                (case when u.num_doc!='' then 1 else 0 end) as num_docp,
                (case when u.fec_nac!='' then 1 else 0 end) as fec_nac,
                (case when u.id_estado_civil is not null then 1 else 0 end) as estado_civil,
                (case when u.emailp!='' then 1 else 0 end) as emailpp,
                (case when u.num_celp!='' then 1 else 0 end) as num_celpp,
                (case when u.foto!='' then 1 else 0 end) as fotop,
                u.usuario_email
                
                from users u
                left join tipo_documento td on td.id_tipo_documento=u.id_tipo_documento
                LEFT JOIN nacionalidad n on n.id_nacionalidad=u.id_nacionalidad
                where u.estado=1 and u.id_usuario=".$id_usuario;
        }
        else{
            $sql = "SELECT u.id_usuario, u.usuario_apater, td.cod_tipo_documento,
                u.num_celp,u.num_doc, u.usuario_amater, u.usuario_nombres, n.nom_nacionalidad,u.flag,
                u.foto, EXTRACT(DAY FROM u.fec_nac) AS dia,case month(u.fec_nac) 
                WHEN 1 THEN 'Enero'
                WHEN 2 THEN 'Febrero'
                WHEN 3 THEN 'Marzo' 
                WHEN 4 THEN 'Abril' 
                WHEN 5 THEN 'Mayo'
                WHEN 6 THEN 'Junio'
                WHEN 7 THEN 'Julio'
                WHEN 8 THEN 'Agosto'
                WHEN 9 THEN 'Septiembre'
                WHEN 10 THEN 'Octubre'
                WHEN 11 THEN 'Noviembre'
                WHEN 12 THEN 'Diciembre'
                END mes,
                (case when u.usuario_nombres!='' then 1 else 0 end) as nombres,
                (case when u.usuario_apater!='' then 1 else 0 end) as apater,
                (case when u.usuario_amater!='' then 1 else 0 end) as amater,
                (case when u.id_nacionalidad is not null then 1 else 0 end) as nacionalidadp,
                (case when u.id_tipo_documento is not null then 1 else 0 end) as tipo_documento,
                (case when u.num_doc!='' then 1 else 0 end) as num_docp,
                (case when u.fec_nac!='' then 1 else 0 end) as fec_nac,
                (case when u.id_estado_civil is not null then 1 else 0 end) as estado_civil,
                (case when u.emailp!='' then 1 else 0 end) as emailpp,
                (case when u.num_celp!='' then 1 else 0 end) as num_celpp,
                (case when u.foto!='' then 1 else 0 end) as fotop,
                u.usuario_email,
                case when u.flag=1 then 'Aprobado'
                when u.flag=2 then 'Rechazado'
                else 'Pendiente Aprobación' end as estado_datos
                from users u
                left join tipo_documento td on td.id_tipo_documento=u.id_tipo_documento
                LEFT JOIN nacionalidad n on n.id_nacionalidad=u.id_nacionalidad
                where u.estado=1 and u.id_nivel=2";
        }
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function valida_dueno($dato){
        $v="";
        if($dato['mod']==2){
        $v=" and id_usuario!='".$dato['id_usuario']."'";
        }
        $sql = "SELECT * from users where estado=1 and num_doc='".$dato['num_doc']."' $v";
        
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function insert_dueno($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
        $sql="INSERT into users (id_nivel,num_doc,usuario_codigo,usuario_password,password_desencriptado,usuario_apater,usuario_amater,usuario_nombres, estado,fec_reg, user_reg ) 
        values ('".$dato['id_nivel']."','".$dato['num_doc']."','".$dato['num_doc']."','".$dato['usuario_password']."','".$dato['num_doc']."','".$dato['usuario_apater']."','".$dato['usuario_amater']."','".$dato['usuario_nombres']."', 1,NOW(),".$id_usuario.")";
        $this->db->query($sql);
    }
    
    function update_password_dueno($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
        $contra="";
        if($dato['password']!=""){
            $contra=" ,password_desencriptado='".$dato['password']."',usuario_password='".$dato['usuario_password']."'";
        }
        $sql="UPDATE users set num_doc='".$dato['num_doc']."',usuario_codigo='".$dato['num_doc']."',fec_act=NOW(), user_act=".$id_usuario." $contra where id_usuario='".$dato['id_usuario']."'";
        $this->db->query($sql);
    }

    function delete_dueno($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
        $sql="UPDATE users set estado='2',fec_eli=NOW(), user_eli=".$id_usuario." where id_usuario='".$dato['id_usuario']."'";
        $this->db->query($sql);
    }

    function get_list_genero($id_genero=null){
        if(isset($id_genero) && $id_genero > 0){
            $sql="SELECT * FROM genero where id_genero=$id_genero";
        }else{
            $sql = "SELECT * from genero where estado=1";   
        }
        
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_list_dia(){
        $sql = "SELECT * FROM dia WHERE estado='1' ";
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_list_mes(){
        $sql = "SELECT * FROM mes WHERE estado='1' ";
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_list_anio(){
        $sql = "SELECT * FROM anio WHERE estado='1' order by cod_anio DESC";
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_list_tipo_documento($id_tipo_documento=null){
        if(isset($id_tipo_documento) && $id_tipo_documento>0){
            $sql = "SELECT * FROM tipo_documento WHERE id_tipo_documento=$id_tipo_documento";
        }else{
            $sql = "SELECT id_tipo_documento,cod_tipo_documento,nom_tipo_documento               
                    FROM tipo_documento                
                    WHERE estado=1";
        }
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_list_nacionalidad_perfil($id_nacionalidad=null){
        if(isset($id_nacionalidad) && $id_nacionalidad > 0){
            $sql = "select * from nacionalidad where id_nacionalidad =".$id_nacionalidad;
        }
        else
        {
            $sql = "select * from nacionalidad";
        }
        $query = $this->db->query($sql)->result_Array();
        return $query;
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
        
    function get_list_estado_civil(){
        $sql = "SELECT * FROM estado_civil WHERE estado='1' ";
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_list_departamento(){
        $sql = "SELECT * from departamento where estado =1";
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_list_provincia($id_departamento=null){
        if(isset($id_departamento) && $id_departamento > 0){
            $sql = "SELECT * from provincia where id_departamento=$id_departamento and estado=1";
        }else{
            $sql = "SELECT * from provincia where estado =1";
        }        
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_list_distrito($id_departamento,$id_provincia){
        $sql = "SELECT * from distrito where id_departamento='$id_departamento' and id_provincia='$id_provincia' and estado=1";
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
        
    function update_gdatosp($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
        $path1 = $_FILES['foto']['name'];
        $ext1 = pathinfo($path1, PATHINFO_EXTENSION);
        $config['upload_path'] = './Documentos/Perfil/'.$dato['id_usuario'].'/';
        
        if (!file_exists($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
            chmod($config['upload_path'], 0777);
        }

        $nombre="foto_".$dato['id_usuario']."_".rand(10,199);

        if($path1!=""){
            $nombre1="Documentos/Perfil/".$dato['id_usuario']."/".$nombre.".".$ext1;
            if (!empty($_FILES['foto']['name'])){
                $config['upload_path'] = './Documentos/Perfil/'.$dato['id_usuario']."/";
                $config['allowed_types'] = 'png|jpg|jpeg';
                $config['file_name'] = $nombre.".".$ext1;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('foto')){
                    $foto = $this->upload->data();
                }else{
                    echo $this->upload->display_errors();
                }
                if(isset($dato['total'][0]['foto']) && $dato['total'][0]['foto']!=""){
                    if (file_exists($dato['total'][0]['foto'])) {
                        unlink($dato['total'][0]['foto']);
                    }
                }
            }
        }
      
        $var="";
        if ($path1!=""){
            $var="foto='".$nombre1."',";
        }
   
        $sql = "UPDATE users SET usuario_apater='".addslashes($dato['usuario_apater'])."', 
                usuario_amater='".addslashes($dato['usuario_amater'])."',
                usuario_nombres='".addslashes($dato['usuario_nombres'])."',
                id_nacionalidad='".$dato['id_nacionalidad']."', 
                id_tipo_documento='".$dato['id_tipo_documento']."', 
                num_doc='".$dato['num_doc']."',
                fec_emision_doc='".$dato['fec_emision_doc']."',
                fec_vencimiento_doc='".$dato['fec_vencimiento_doc']."',
                id_genero='".$dato['id_genero']."', 
                dia_nac='".$dato['dia_nac']."', 
                mes_nac='".$dato['mes_nac']."', 
                anio_nac='".$dato['anio_nac']."', 
                id_estado_civil='".$dato['id_estado_civil']."', 
                emailp='".$dato['emailp']."',
                num_celp='".$dato['num_celp']."',  
                fec_nac='".$dato['fec_nac']."',
                id_departamentonac='".$dato['id_departamentonac']."',
                id_provincianac='".$dato['id_provincianac']."',
                id_distritonac='".$dato['id_distritonac']."',
                otro_estado_civil='".$dato['otro_estado_civil']."',
                $var
                fec_act=NOW(), 
                user_act=".$id_usuario." 
                WHERE id_usuario = ".$dato['id_usuario']."";
        $this->db->query($sql);
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

    function aprobar_datos($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
    
        $sql="UPDATE users set flag='".$dato['t']."',fec_act=NOW(), user_act=".$id_usuario." where id_usuario='".$dato['id_usuario']."'";

        $this->db->query($sql);
    }


    //-------------vehiculo
    function get_list_vehiculo($id_vehiculo=null){
        if(isset($id_vehiculo) && $id_vehiculo > 0){
            $sql = "SELECT v.*,c.nom_color,m.nom_marca,md.nom_modelo FROM vehiculo v 
            left join color c on v.id_color=c.id_color
            left join marca m on v.id_marca=m.id_marca
            left join modelo md on v.id_modelo=md.id_modelo
            WHERE v.id_vehiculo=$id_vehiculo";
        }else{
            $sql = "SELECT v.*,c.nom_color,m.nom_marca,md.nom_modelo,DATE_FORMAT(v.fec_fabricacion,'%d/%m/%Y') as fecha_fabricacion,
            DATE_FORMAT(v.fec_adquisicion,'%d/%m/%Y') as fecha_adquisicion,t.nom_tipo
            FROM vehiculo v
            left join color c on v.id_color=c.id_color
            left join marca m on v.id_marca=m.id_marca
            left join modelo md on v.id_modelo=md.id_modelo
            left join tipo_vehiculo t on v.id_tipo=t.id_tipo
            WHERE v.estado=1";
            }
            $query = $this->db->query($sql)->result_Array();
            return $query;
    }

    //-------------------COLOR-------------------//
    function get_list_color($id_color=null){
        if(isset($id_color) && $id_color > 0){
            $sql = "SELECT * from color where id_color =".$id_color;
        }
        else
        {
            $sql = "SELECT * from color where estado=1";
        }
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }
    
    function valida_vehiculo($dato){
        $condicion="";
        if($dato['modal']==2){
            $condicion="AND id_vehiculo!='".$dato['id_vehiculo']."'";
        }
        $sql = "SELECT * FROM vehiculo WHERE id_tipo='".$dato['id_tipo']."' and id_empresa='".$dato['id_empresa']."' AND id_modelo='".$dato['id_modelo']."' AND 
                id_marca='".$dato['id_marca']."' and placa='".$dato['placa']."' AND estado=1 $condicion";
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_cant_vehiculo($dato){
        $sql = "SELECT * from vehiculo where id_empresa='".$dato['id_empresa']."'";
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function insert_vehiculo($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
        $sql = "INSERT INTO vehiculo (cod_vehiculo,id_tipo,id_modelo,id_empresa,id_marca,
        placa,pregistro,serie,fec_fabricacion,fec_adquisicion,
        id_color,nasiento,chasis,nllanta,neje,tuso,
        estado,fec_reg,user_reg)

                VALUES ('".$dato['cod_vehiculo']."','".$dato['id_tipo']."','".$dato['id_modelo']."','".$dato['id_empresa']."','".$dato['id_marca']."',
                '".$dato['placa']."','".$dato['pregistro']."','".$dato['serie']."','".$dato['fec_fabricacion']."','".$dato['fec_adquisicion']."',
                '".$dato['id_color']."','".$dato['nasiento']."','".$dato['chasis']."','".$dato['nllanta']."','".$dato['neje']."','".$dato['tuso']."',
                1,NOW(),
                $id_usuario)";
       $this->db->query($sql);
    }

    function update_vehiculo($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
        $sql = "UPDATE vehiculo SET 
        id_tipo='".$dato['id_tipo']."',id_modelo='".$dato['id_modelo']."',id_empresa='".$dato['id_empresa']."',id_marca='".$dato['id_marca']."',
        placa='".$dato['placa']."',pregistro='".$dato['pregistro']."',serie='".$dato['serie']."',fec_fabricacion='".$dato['fec_fabricacion']."',fec_adquisicion='".$dato['fec_adquisicion']."',
        id_color='".$dato['id_color']."',nasiento='".$dato['nasiento']."',chasis='".$dato['chasis']."',nllanta='".$dato['nllanta']."',neje='".$dato['neje']."',tuso='".$dato['tuso']."',
        fec_act=NOW(),
                user_act=$id_usuario
                WHERE id_vehiculo='".$dato['id_vehiculo']."'";
       $this->db->query($sql);
    }

    function delete_vehiculo($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
        $sql = "UPDATE vehiculo SET estado=2,fec_eli=NOW(),user_eli=$id_usuario
                WHERE id_vehiculo='".$dato['id_vehiculo']."'";
       $this->db->query($sql);
    }

    function valida_color($dato){
        $v="";
        if($dato['mod']==2){
        $v=" and id_color!='".$dato['id_color']."'";
        }
        $sql = "SELECT * from color where estado=1 and nom_color='".$dato['nom_color']."' $v";
        
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function insert_color($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
    
        $sql="INSERT into color (nom_color, estado,fec_reg, user_reg ) 
        values ('".$dato['nom_color']."', 1,NOW(),".$id_usuario.")";
        $this->db->query($sql);
    }
    
    function update_color($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
    
        $sql="UPDATE color set nom_color='".$dato['nom_color']."',fec_act=NOW(), user_act=".$id_usuario." where id_color='".$dato['id_color']."'";
       
        $this->db->query($sql);
    }

    function delete_color($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
    
        $sql="UPDATE color set estado='2',fec_eli=NOW(), user_eli=".$id_usuario." where id_color='".$dato['id_color']."'";

        $this->db->query($sql);
    }

    //--------asignacion dueño
    function get_list_asignacion_dueno($id_asignacion=null){
        if(isset($id_asignacion) && $id_asignacion > 0){
            $sql = "SELECT a.* FROM asignacion_dueno a
            WHERE a.id_asignacion=$id_asignacion";
        }else{
            $sql = "SELECT a.*,concat(u.usuario_nombres,' ',u.usuario_apater,' ',u.usuario_amater) as dueno,
            v.placa
            
            FROM asignacion_dueno a
            left join users u on a.id_usuario=u.id_usuario
            left join vehiculo v on a.id_vehiculo=v.id_vehiculo
            WHERE a.estado=1";
            }
            $query = $this->db->query($sql)->result_Array();
            return $query;
    }

}