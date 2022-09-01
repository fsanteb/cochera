<?php
class Model_Postulante extends CI_Model {
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("America/Lima");

        $this->load->library("parser");
        $this->load->library('form_validation');
        $this->load->helper("url");
        $this->load->helper('form');
        $this->load->helper('text');
        $this->load->helper("Post_helper");
    }

        function get_list_t_documento(){
        $sql = "select * from tipodocumento where estado=1";
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }
    //----------------------------------------------------POSTULANTE---------------------------------------------------
    function get_list_postulante($parametro=null){
        if($parametro==0){
            $sql="select p.*, t.nom_tipodoc as cod_tipo_documento, u.usuario_nombres, u.usuario_apater, 
            u.usuario_amater, pu.nom_puesto, e.nom_estados_postulante
            from postulante p
            left join tipodocumento t on t.id_tipodoc=p.id_tipo_documento
            left join users u on u.id_usuario=p.user_reg
            left join puesto pu on pu.id_puesto=p.id_puesto
            left join estados_postulante e on e.id_estado_postulante=p.estado_postulacion
            where p.estado=1 and p.estado_postulacion not in (9,10)";
        }elseif($parametro==10){
            $sql="select p.*, t.nom_tipodoc as cod_tipo_documento, u.usuario_nombres, u.usuario_apater, 
            u.usuario_amater, pu.nom_puesto, e.nom_estados_postulante
            from postulante p
            left join tipodocumento t on t.id_tipodoc=p.id_tipo_documento
            left join users u on u.id_usuario=p.user_reg
            left join puesto pu on pu.id_puesto=p.id_puesto
            left join estados_postulante e on e.id_estado_postulante=p.estado_postulacion
            where p.estado=1 and p.estado_postulacion in (10)";
        }
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_list_postulanteb($parametro=null){
        if($parametro==0){
            $sql="select p.*, t.nom_tipodoc as cod_tipo_documento, u.usuario_nombres, u.usuario_apater, 
            u.usuario_amater, pu.nom_puesto, e.nom_estados_postulante,n.nom_nacionalidad
            from postulante p
            left join tipodocumento t on t.id_tipodoc=p.id_tipo_documento
            left join users u on u.id_usuario=p.user_reg
            left join puesto pu on pu.id_puesto=p.id_puesto
            left join estados_postulante e on e.id_estado_postulante=p.estado_postulacion
            left join nacionalidad n on p.id_nacionalidad=n.id_nacionalidad
            where p.estado=1";
        }elseif($parametro==1){
                $sql="select p.*, t.nom_tipodoc as cod_tipo_documento, u.usuario_nombres, u.usuario_apater, 
                u.usuario_amater, pu.nom_puesto, e.nom_estados_postulante,n.nom_nacionalidad
                from postulante p
                left join tipodocumento t on t.id_tipodoc=p.id_tipo_documento
                left join users u on u.id_usuario=p.user_reg
                left join puesto pu on pu.id_puesto=p.id_puesto
                left join estados_postulante e on e.id_estado_postulante=p.estado_postulacion
                left join nacionalidad n on p.id_nacionalidad=n.id_nacionalidad
                where p.estado=1 and p.estado_postulacion not in (9,10)";
        }else{
            $sql="select p.*, t.nom_tipodoc as cod_tipo_documento, u.usuario_nombres, u.usuario_apater, 
            u.usuario_amater, pu.nom_puesto, e.nom_estados_postulante,n.nom_nacionalidad
            from postulante p
            left join tipodocumento t on t.id_tipodoc=p.id_tipo_documento
            left join users u on u.id_usuario=p.user_reg
            left join puesto pu on pu.id_puesto=p.id_puesto
            left join estados_postulante e on e.id_estado_postulante=p.estado_postulacion
            left join nacionalidad n on p.id_nacionalidad=n.id_nacionalidad
            where p.estado=1 and p.estado_postulacion=$parametro";
        }
        //echo $sql;
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_list_postulantet(){
        $centro_labores=$_SESSION['usuario'][0]['centro_labores'];
        $sql="select p.*, t.cod_tipo_documento, u.usuario_nombres, u.usuario_apater, u.usuario_amater,
        pu.nom_puesto, e.nom_estados_postulante
        from postulante p
        left join tipo_documento t on t.id_tipo_documento=p.id_tipo_documento
        left join users u on u.id_usuario=p.user_reg
        left join puesto pu on pu.id_puesto=p.id_puesto
        left join estados_postulante e on e.id_estado_postulante=p.estado_postulacion
        where p.estado=1 and aprobado in (1,0) and p.id_area=14 and
        p.centro_labores='".$centro_labores."'";
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_list_evaluacion_postulante(){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];

        $sql="select p.*, t.cod_tipo_documento, u.usuario_nombres, u.usuario_apater, u.usuario_amater,
        pu.nom_puesto, e.nom_estados_postulante
        from postulante p
        left join tipo_documento t on t.id_tipo_documento=p.id_tipo_documento
        left join users u on u.id_usuario=p.user_reg
        left join puesto pu on pu.id_puesto=p.id_puesto
        left join estados_postulante e on e.id_estado_postulante=p.estado_postulacion
        where p.estado=1 and (u.id_nivel in (1,2) or p.id_evaluador=$id_usuario)";

        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_id_postulante($id_postulante){
        if(isset($id_postulante) && $id_postulante > 0){
            $sql = "select * from postulante where id_postulante=".$id_postulante;
        }
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function valida_reg_postulante($dato){
        $sql = "select * from postulante where num_doc ='".$dato['num_doc']."' and estado<>2 and id_gerencia='".$dato['id_gerencia']."' and id_area='".$dato['id_area']."' and id_puesto='".$dato['id_puesto']."'";
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }
    function valida_reg_postulante_corporacion($dato){
        $sql = "select * from users where num_doc ='".$dato['num_doc']."' and estado=1";
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function delete_cuenta_existente($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];

        $sql = "UPDATE postulante set estado=2, fec_eli=NOW(), user_eli=".$id_usuario." 
        where num_doc='".$dato['num_doc']."' and id_gerencia='".$dato['id_gerencia']."' and id_area='".$dato['id_area']."' and id_puesto='".$dato['id_puesto']."' ";
        $this->db->query($sql);
    }

    function insert_cuenta($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
        $id_puesto=$_SESSION['usuario'][0]['id_puesto'];
        $centro_labores=$_SESSION['usuario'][0]['centro_labores'];
        if($id_puesto==29 || $id_puesto==26 || $id_puesto==16){
            $sql = "insert into postulante (postulante_nombres, postulante_apater, postulante_amater, 
                postulante_codigo, postulante_password, id_tipo_documento, num_doc,
                id_gerencia, id_area, id_puesto, id_puesto_evaluador, id_evaluador,
                id_nivel, estado, estado_postulacion, fec_reg, user_reg, centro_labores,id_cargo) values 
                ('".$dato['postulante_nombres']."', '".$dato['postulante_apater']."', 
                '".$dato['postulante_amater']."', 
                '".$dato['postulante_codigo']."', '".$dato['postulante_password']."', 
                '".$dato['id_tipo_documento']."', '".$dato['num_doc']."',
                '".$dato['id_gerencia']."', '".$dato['id_area']."', '".$dato['id_puesto']."',
                '$id_puesto', '$id_usuario',
                6, 1, 1, NOW(), $id_usuario, '".$centro_labores."','".$dato['id_cargo']."')";
        }
        else{
            $sql = "INSERT INTO postulante (postulante_nombres, postulante_apater, postulante_amater, 
                    postulante_codigo, postulante_password, id_tipo_documento, num_doc,
                    id_gerencia, id_area, id_puesto, id_puesto_evaluador, id_evaluador,
                    id_nivel, estado, estado_postulacion, fec_reg, user_reg, centro_labores,id_cargo) values 
                    ('".$dato['postulante_nombres']."', '".$dato['postulante_apater']."', 
                    '".$dato['postulante_amater']."', 
                    '".$dato['postulante_codigo']."', '".$dato['postulante_password']."', 
                    '".$dato['id_tipo_documento']."', '".$dato['num_doc']."',
                    '".$dato['id_gerencia']."', '".$dato['id_area']."', '".$dato['id_puesto']."',
                    '".$dato['id_puesto_evaluador']."', '".$dato['id_evaluador']."',
                    6, 1, 1, NOW(), $id_usuario, (SELECT centro_labores FROM users where id_usuario=
                    '".$dato['id_evaluador']."' AND users.estado=1),'".$dato['id_cargo']."')";
        }
        //echo $sql;
        $this->db->query($sql);

        $sql2 = "insert into historico_postulante (id_postulante, estado, fec_reg, user_reg) values 
                ((select id_postulante from postulante where postulante_codigo='".$dato['postulante_codigo']."' and estado=1 and id_gerencia='".$dato['id_gerencia']."' and id_area='".$dato['id_area']."' and id_puesto='".$dato['id_puesto']."'), 
                1, NOW(), $id_usuario)";
        $this->db->query($sql2);
    }

    function update_cuenta($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];

        $sql = "update postulante set postulante_nombres='".$dato['postulante_nombres']."', postulante_apater='".$dato['postulante_apater']."',
        postulante_amater='".$dato['postulante_amater']."', id_tipo_documento='".$dato['id_tipo_documento']."',
        postulante_codigo='".$dato['postulante_codigo']."', postulante_password='".$dato['postulante_password']."',
        num_doc='".$dato['num_doc']."', fec_act=NOW(), user_act=".$id_usuario." 
        where id_postulante='".$dato['id_postulante']."' ";
        $this->db->query($sql);
    }

    function update_sin_cuenta($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];

        $sql = "update postulante set postulante_nombres='".$dato['postulante_nombres']."', postulante_apater='".$dato['postulante_apater']."',
        postulante_amater='".$dato['postulante_amater']."', id_tipo_documento='".$dato['id_tipo_documento']."',
        num_doc='".$dato['num_doc']."', fec_act=NOW(), user_act=".$id_usuario." 
        where id_postulante='".$dato['id_postulante']."' ";
        $this->db->query($sql);
    }

    function delete_cuenta($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
        $sql = "update postulante set estado=2, fec_eli=NOW(), user_eli=".$id_usuario."  where id_postulante=".$dato['id_postulante'];

        $this->db->query($sql);
    }

    function get_id_domicilio_usersp($id_postulante=null){
        if(isset($id_postulante) && $id_postulante > 0){
            $sql = "select * from domicilio_usersp where id_postulante =".$id_postulante;
        }
        else
        {
            $sql = "select * from domicilio_usersp";
        }
        //throw new Exception( $sql ) ;
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_list_estudiosgu($id_postulante=null){
        if(isset($id_postulante) && $id_postulante > 0){
            $sql = "SELECT rf.*, p.id_grado_instruccion, p.nom_grado_instruccion from estudios_generalesp rf
                    LEFT JOIN grado_instruccion p on p.id_grado_instruccion=rf.id_grado_instruccion
                    where rf.id_postulante =".$id_postulante." and rf.estado=1";
        }
        else
        {
            $sql = "SELECT rf.*, p.id_grado_instruccion, p.nom_grado_instruccion from estudios_generalesp rf
            LEFT JOIN grado_instruccion p on p.id_grado_instruccion=rf.id_grado_instruccion
            where rf.estado=1";
        }
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_id_conoci_office($id_postulante=null){
        if(isset($id_postulante) && $id_postulante > 0){
            $sql = "select * from conoci_officep where id_postulante =".$id_postulante;
        }
        else
        {
            $sql = "select * from conoci_officep";
        }
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_id_eval_rrhh($id_postulante=null){
        if(isset($id_postulante) && $id_postulante > 0){
            $sql = "select * from eval_rrhh_postulante where estado=1 and
                    id_postulante =".$id_postulante;
        }
        else{
            $sql = "select * from eval_rrhh_postulante";
        }
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_id_eval_jd($id_postulante=null){
        if(isset($id_postulante) && $id_postulante > 0){
            $sql = "select * from eval_jefe_directo where estado=1 and 
                    id_postulante =".$id_postulante;
        }
        else{
            $sql = "select * from eval_jefe_directo";
        }
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    
    function get_id_eval_vs($id_postulante=null){
        if(isset($id_postulante) && $id_postulante > 0){
            $sql = "select * from verificacion_social where id_postulante =".$id_postulante;
        }
        else{
            $sql = "select * from verificacion_social";
        }
        
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function insert_evaluacionvs($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
        $id_postulante=$dato['id_postulante'];
        $path = $_FILES['ver_social']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $mi_archivo = 'ver_social';
        $config['upload_path'] = './documentos/verificacion_social/'.$dato['id_postulante'].'/';/// ruta del fileserver para almacenar el documento
        $config['file_name'] = $dato['id_postulante']."_".rand(10,99).".".$ext;

        $ruta = 'documentos/verificacion_social/'.$dato['id_postulante'].'/'.$config['file_name'];

        if (!file_exists($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
            chmod($config['upload_path'], 0777, true);
            chmod('./documentos/', 0777);
            chmod('./documentos/verificacion_social/', 0777);
        }

        $config['allowed_types'] = "png|jpg|jpeg|pdf";
        $config['max_size'] = "0";
        $config['max_width'] = "0";
        $config['max_height'] = "0";
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($mi_archivo)) {
            $data['uploadError'] = $this->upload->display_errors();
        }       
        $data['uploadSuccess'] = $this->upload->data();

        $sqli = "UPDATE verificacion_social SET estado=2, fec_act=NOW(), user_act=".$id_usuario."
                where id_postulante='".$dato['id_postulante']."'";
        $this->db->query($sqli);

        $sql = "INSERT INTO verificacion_social (id_postulante,
                resultado, observaciones, ver_social,
                fec_reg, user_reg, estado) 
                values ('".$dato['id_postulante']."',
                        '".$dato['resultado']."',
                        '".$dato['observaciones']."',
                        '$ruta',
                        NOW(),".$id_usuario.", '1')";

        $this->db->query($sql);

        $sql2="INSERT INTO historico_postulante (id_postulante,observacion,fec_reg, user_reg, estado)
                values ('".$dato['id_postulante']."','".$dato['observaciones']."',NOW(),".$id_usuario.", '1')";
        $this->db->query($sql2);

        $sql3="UPDATE postulante SET estado_postulacion='".$dato['resultado']."' WHERE id_postulante='".$dato['id_postulante']."' ";
        $this->db->query($sql3);
    }

    function get_id_historico($id_postulante=null){
        if(isset($id_postulante) && $id_postulante > 0){
            $sql = "select * from historico_postulante where id_postulante =".$id_postulante;
        }
        else{
            $sql = "select * from historico_postulante";
        }
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_list_cursoscu($id_postulante=null){
        if(isset($id_postulante) && $id_postulante > 0){
            $sql = "SELECT * from curso_complementariop where id_postulante =".$id_postulante." and estado=1";
        }
        else{
            $sql = "SELECT * from curso_complementariop where estado=1";
        }

        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_list_experiencial($id_postulante=null){
        if(isset($id_postulante) && $id_postulante > 0){
            $sql = "SELECT * from experiencia_laboralp where id_postulante =".$id_postulante." and estado=1";
        }else{
            $sql = "SELECT * from experiencia_laboralp where estado=1";
        }
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_list_enfermedadu($id_postulante=null){
        if(isset($id_postulante) && $id_postulante > 0){
            $sql = "SELECT * from enfermedad_postulante where id_postulante =".$id_postulante." and estado=1";
        }
        else
        {
            $sql = "SELECT * from enfermedad_postulante where estado=1";
        }
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function insert_evaluacionrrhh($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];

        $path = $_FILES['eval_sicologica']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $mi_archivo = 'eval_sicologica';
        $config['upload_path'] = './documentos/evaluacion_psicologica/'.$dato['id_postulante'].'/';/// ruta del fileserver para almacenar el documento
        $config['file_name'] = $dato['id_postulante']."_".rand(10,99).".".$ext;
        
        if (!file_exists($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
            chmod($config['upload_path'], 0777, true);
            chmod('./documentos/', 0777);
            chmod('./documentos/evaluacion_psicologica/', 0777);
        }

        $ruta = 'documentos/evaluacion_psicologica/'.$dato['id_postulante'].'/'.$config['file_name'];

        $config['allowed_types'] = "png|jpg|jpeg|pdf";
        $config['max_size'] = "0";
        $config['max_width'] = "0";
        $config['max_height'] = "0";
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($mi_archivo)) {
            $data['uploadError'] = $this->upload->display_errors();
        }       
        $data['uploadSuccess'] = $this->upload->data();

        $sqli = "UPDATE eval_rrhh_postulante SET estado=2, fec_act=NOW(), user_act=".$id_usuario."
                where id_postulante='".$dato['id_postulante']."'";
        $this->db->query($sqli);

        $sql = "INSERT INTO eval_rrhh_postulante (id_postulante,
                resultado, observaciones, eval_sicologica,
                fec_reg, user_reg, estado) 
                values ('".$dato['id_postulante']."',
                        '".$dato['resultado']."',
                        '".$dato['observaciones']."',
                        '$ruta',
                        NOW(),".$id_usuario.", '1')";

        $this->db->query($sql);

        $sql2="INSERT INTO historico_postulante (id_postulante,observacion,fec_reg, user_reg, estado)
                values ('".$dato['id_postulante']."','".$dato['observaciones']."',NOW(),".$id_usuario.", '1')";
        $this->db->query($sql2);

        $sql3="UPDATE postulante SET estado_postulacion='".$dato['resultado']."' WHERE id_postulante='".$dato['id_postulante']."' ";
        $this->db->query($sql3);/* */
    }

    function insert_evaluacionrrhht($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];

        $sqli = "UPDATE eval_rrhh_postulante SET estado=2, fec_act=NOW(), user_act=".$id_usuario."
                where id_postulante='".$dato['id_postulante']."'";
        $this->db->query($sqli);

        $sql = "INSERT INTO eval_rrhh_postulante (id_postulante,
                resultado, observaciones,
                fec_reg, user_reg, estado) 
                values ('".$dato['id_postulante']."',
                        '".$dato['resultado']."',
                        '".$dato['observaciones']."',
                        NOW(),".$id_usuario.", '1')";

        $this->db->query($sql);

        $sql2="INSERT INTO historico_postulante (id_postulante,observacion,fec_reg, user_reg, estado)
                values ('".$dato['id_postulante']."','".$dato['observaciones']."',NOW(),".$id_usuario.", '1')";
        $this->db->query($sql2);

        $sql3="UPDATE postulante SET estado_postulacion='".$dato['resultado']."' WHERE id_postulante='".$dato['id_postulante']."' ";
        $this->db->query($sql3);/* */
    }

    function insert_evaluacionjd($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];

        $sqli = "UPDATE eval_jefe_directo SET estado=2, fec_act=NOW(), user_act=".$id_usuario."
                where id_postulante='".$dato['id_postulante']."'";
        $this->db->query($sqli);

        $sql = "insert into eval_jefe_directo (id_postulante, resultado, observaciones,
                estado, fec_reg, user_reg) values 
                ('".$dato['id_postulante']."', '".$dato['resultado']."', 
                '".$dato['observaciones']."', 1, NOW(), $id_usuario)";
        $this->db->query($sql);

        $sql2="INSERT INTO historico_postulante (id_postulante,observacion,fec_reg, user_reg, estado)
                values ('".$dato['id_postulante']."','".$dato['observaciones']."',NOW(),".$id_usuario.", '1')";
        $this->db->query($sql2);

        $sql3="UPDATE postulante SET estado_postulacion='".$dato['resultado']."' WHERE id_postulante='".$dato['id_postulante']."' ";
        $this->db->query($sql3);
    }

    function insert_evaluacionjdt($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];

        $path = $_FILES['eval_sicologica']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $mi_archivo = 'eval_sicologica';
        $config['upload_path'] = './documentos/evaluacion_psicologica/'.$dato['id_postulante'].'/';/// ruta del fileserver para almacenar el documento
        $config['file_name'] = $dato['id_postulante']."_".rand(10,99).".".$ext;
        
        if (!file_exists($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
            chmod($config['upload_path'], 0777, true);
            chmod('./documentos/', 0777);
            chmod('./documentos/evaluacion_psicologica/', 0777);
        }

        $ruta = 'documentos/evaluacion_psicologica/'.$dato['id_postulante'].'/'.$config['file_name'];

        $config['allowed_types'] = "png|jpg|jpeg|pdf";
        $config['max_size'] = "0";
        $config['max_width'] = "0";
        $config['max_height'] = "0";
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($mi_archivo)) {
            $data['uploadError'] = $this->upload->display_errors();
        }       
        $data['uploadSuccess'] = $this->upload->data();

        $sqli = "UPDATE eval_jefe_directo SET estado=2, fec_act=NOW(), user_act=".$id_usuario."
                where id_postulante='".$dato['id_postulante']."'";
        $this->db->query($sqli);

        $sql = "insert into eval_jefe_directo (id_postulante, resultado, observaciones,
                eval_sicologica, estado, fec_reg, user_reg) values 
                ('".$dato['id_postulante']."', '".$dato['resultado']."', 
                '".$dato['observaciones']."', '$ruta', 1, NOW(), $id_usuario)";
        $this->db->query($sql);

        $sql2="INSERT INTO historico_postulante (id_postulante,observacion,fec_reg, user_reg, estado)
                values ('".$dato['id_postulante']."','".$dato['observaciones']."',NOW(),".$id_usuario.", '1')";
        $this->db->query($sql2);

        $sql3="UPDATE postulante SET estado_postulacion='".$dato['resultado']."' WHERE id_postulante='".$dato['id_postulante']."' ";
        $this->db->query($sql3);
    }

    function insert_vs($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];

        $id_postulante=$dato['id_postulante'];
        $path = $_FILES['ver_social']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $mi_archivo = 'ver_social';
        $config['upload_path'] = './documentos/verificacion_social/'.$dato['id_postulante'].'/';/// ruta del fileserver para almacenar el documento
        $config['file_name'] = $dato['id_postulante']."_".rand(10,99).".".$ext;

        $ruta = 'documentos/verificacion_social/'.$dato['id_postulante'].'/'.$config['file_name'];

        if (!file_exists($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
            chmod($config['upload_path'], 0777, true);
            chmod('./documentos/', 0777);
            chmod('./documentos/verificacion_social/', 0777);
        }

        $config['allowed_types'] = "png|jpg|jpeg|pdf";
        $config['max_size'] = "0";
        $config['max_width'] = "0";
        $config['max_height'] = "0";
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($mi_archivo)) {
            $data['uploadError'] = $this->upload->display_errors();
        }       
        $data['uploadSuccess'] = $this->upload->data();

        $sqli = "UPDATE verificacion_social SET estado=2, fec_act=NOW(), user_act=".$id_usuario."
                where id_postulante='".$dato['id_postulante']."'";
        $this->db->query($sqli);

        $sql = "INSERT INTO verificacion_social (id_postulante,
                resultado, observaciones, ver_social,
                fec_reg, user_reg, estado) 
                values ('".$dato['id_postulante']."',
                        '".$dato['resultado']."',
                        '".$dato['observaciones']."',
                        '$ruta',
                        NOW(),".$id_usuario.", '1')";

        $this->db->query($sql);

        $sql2="INSERT INTO historico_postulante (id_postulante,observacion,fec_reg, user_reg, estado)
                values ('".$dato['id_postulante']."','".$dato['observaciones']."',NOW(),".$id_usuario.", '1')";
        $this->db->query($sql2);

        $sql3="UPDATE postulante SET estado_postulacion='".$dato['resultado']."' WHERE id_postulante='".$dato['id_postulante']."' ";
        $this->db->query($sql3);
    }

    function update_resultadofinal($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];

        $sql="INSERT INTO historico_postulante (id_postulante,fec_reg, user_reg, estado)
                values ('".$dato['id_postulante']."',NOW(),".$id_usuario.", '1')";

        $this->db->query($sql);

        $sql2="INSERT INTO users (usuario_nombres,usuario_apater,usuario_amater,id_gerencia,id_area,id_puesto,id_cargo,centro_labores,id_modalidad_laboral,usuario_codigo,usuario_password,
        password_desencriptado,id_nacionalidad,id_tipo_documento,num_doc,id_genero,dia_nac,mes_nac,anio_nac,fec_nac,id_estado_civil,
        usuario_email, emailp, num_celp, num_fijop,id_nivel,induccion,desvinculacion,acceso,foto,urladm,estado, fec_reg, user_reg)
        SELECT postulante_nombres, postulante_apater, postulante_amater,id_gerencia,id_area,id_puesto,id_cargo,centro_labores,1, postulante_codigo, 
        '".$dato['usuario_password']."','".$dato['pass']."', id_nacionalidad, id_tipo_documento, num_doc, id_genero, dia_nac, mes_nac, 
        anio_nac, fec_nac, id_estado_civil, postulante_email, postulante_email, num_celp, num_fijop,
        id_nivel,0,0,0,foto,1,1,NOW(),".$id_usuario." FROM postulante 
        WHERE id_postulante='".$dato['id_postulante']."'";
//echo $sql2;
        $this->db->query($sql2);

        $sql3 = "UPDATE postulante SET estado_postulacion='".$dato['resultado']."' 
        WHERE id_postulante='".$dato['id_postulante']."' ";
        $this->db->query($sql3);
        
/*
        $sql="INSERT INTO estudios_generales (id_usuario,id_grado_instruccion,carrera,centro,
        estado,fec_reg,user_reg)
        VALUES ((SELECT id_usuario FROM users WHERE usuario_codigo=(SELECT postulante_codigo FROM postulante WHERE id_postulante='".$dato['id_postulante']."')),
            (SELECT id_grado_instruccion FROM estudios_generalesp WHERE id_postulante='".$dato['id_postulante']."'),
            (SELECT carrera FROM estudios_generalesp WHERE id_postulante='".$dato['id_postulante']."'),
            (SELECT centro FROM estudios_generalesp WHERE id_postulante='".$dato['id_postulante']."'),
            1,NOW(),".$id_usuario.")";    

    

        //throw new Exception($sql);
        $this->db->query($sql); 


        $sql4="INSERT INTO estudios_generales (id_usuario,id_grado_institucion,carrera,centro,
        estado,fec_reg,user_reg)
        SELECT (SELECT id_usuario FROM users WHERE usuario_codigo=(SELECT postulante_codigo FROM postulante WHERE id_postulante='".$dato['id_postulante']."'),
        id_grado_institucion,carrera,centro,1,NOW(),$id_usuario 
        FROM estudios_generalesp WHERE id_postulante='".$dato['id_postulante']."' ";

        $this->db->query($sql4);

        $sql5="INSERT INTO conoci_office (id_usuario,nl_excel,nl_word,nl_ppoint,estado,fec_reg,user_reg)
        VALUES ((SELECT id_usuario FROM users WHERE usuario_codigo=(SELECT postulante_codigo FROM postulante WHERE id_postulante='".$dato['id_postulante']."'),
        (SELECT nl_excel FROM conoci_officep WHERE id_postulante='".$dato['id_postulante']."'),
        (SELECT nl_word FROM conoci_officep WHERE id_postulante='".$dato['id_postulante']."'),
        (SELECT nl_ppoint FROM conoci_officep WHERE id_postulante='".$dato['id_postulante']."'),
        1,NOW(),".$id_usuario.")";

        $this->db->query($sql5);

        $sql6="INSERT INTO curso_complementario (id_usuario,nom_curso_complementario,anio,estado,fec_reg,user_reg)
        SELECT (SELECT id_usuario FROM users WHERE usuario_codigo=(SELECT postulante_codigo FROM postulante WHERE id_postulante='".$dato['id_postulante']."'),
        nom_curso_complementario,anio,1,NOW(),$id_usuario 
        FROM curso_complementariop WHERE id_postulante='".$dato['id_postulante']."' ";

        $this->db->query($sql6);

        $sql7="INSERT INTO experiencia_laboral (id_usuario,empresa,cargo,dia_ini,mes_ini,anio_ini,fec_ini,
        motivo_salida,remuneracion,nom_referencia_laborales,num_contacto,estado,fec_reg,user_reg)
        SELECT (SELECT id_usuario FROM users WHERE usuario_codigo=(SELECT postulante_codigo FROM postulante WHERE id_postulante='".$dato['id_postulante']."'),
        empresa,cargo,dia_ini,mes_ini,anio_ini,fec_ini,motivo_salida,remuneracion,nom_referencia_laborales,
        num_contacto,1,NOW(),$id_usuario 
        FROM experiencia_laboralp WHERE id_postulante='".$dato['id_postulante']."' ";

        $this->db->query($sql7);

        $sql8="INSERT INTO gestacion_usuario (id_usuario,id_respuesta,dia_ges,mes_ges,anio_ges,fec_ges,estado,fec_reg,user_reg)
        VALUES ((SELECT id_usuario FROM users WHERE usuario_codigo=(SELECT postulante_codigo FROM postulante WHERE id_postulante='".$dato['id_postulante']."'),
        (SELECT id_respuesta FROM gestacion_postulante WHERE id_postulante='".$dato['id_postulante']."'),
        (SELECT dia_ges FROM gestacion_postulante WHERE id_postulante='".$dato['id_postulante']."'),
        (SELECT mes_ges FROM gestacion_postulante WHERE id_postulante='".$dato['id_postulante']."'),
        (SELECT anio_ges FROM gestacion_postulante WHERE id_postulante='".$dato['id_postulante']."'),
        (SELECT fec_ges FROM gestacion_postulante WHERE id_postulante='".$dato['id_postulante']."'),
        1,NOW(),".$id_usuario.")";

        $this->db->query($sql8);

        $sql8="INSERT INTO referencia_convocatoria (id_usuario,id_referencia_laboral,otros,estado,fec_reg,user_reg)
        VALUES ((SELECT id_usuario FROM users WHERE usuario_codigo=(SELECT postulante_codigo FROM postulante WHERE id_postulante='".$dato['id_postulante']."'),
        (SELECT id_referencia_laboral FROM referencia_convocatoriap WHERE id_postulante='".$dato['id_postulante']."'),
        (SELECT otros FROM referencia_convocatoriap WHERE id_postulante='".$dato['id_postulante']."'),
        1,NOW(),".$id_usuario.")";

        $this->db->query($sql8);
*/
      
    }

    function update_resultadofinal_mal($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];

        $sql="INSERT INTO historico_postulante (id_postulante,fec_reg, user_reg, estado)
                values ('".$dato['id_postulante']."',NOW(),".$id_usuario.", '1')";
        $this->db->query($sql);

        $sql2="UPDATE postulante SET estado_postulacion='".$dato['resultado']."' WHERE id_postulante='".$dato['id_postulante']."' ";
        $this->db->query($sql2);
    }

    function insert_domicilio_usersp($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];

        $sql="INSERT INTO domicilio_users (id_usuario,id_departamento,id_provincia,id_distrito,lat,lng,estado,fec_reg, user_reg)
        VALUES ((SELECT id_usuario FROM users WHERE usuario_codigo=(SELECT postulante_codigo FROM postulante WHERE id_postulante='".$dato['id_postulante']."')),
        (SELECT id_departamento FROM domicilio_usersp WHERE id_postulante='".$dato['id_postulante']."'),
        (SELECT id_provincia FROM domicilio_usersp WHERE id_postulante='".$dato['id_postulante']."'),
        (SELECT id_distrito FROM domicilio_usersp WHERE id_postulante='".$dato['id_postulante']."'),
        (SELECT lat FROM domicilio_usersp WHERE id_postulante='".$dato['id_postulante']."'),
        (SELECT lng FROM domicilio_usersp WHERE id_postulante='".$dato['id_postulante']."'),
        1,NOW(),".$id_usuario.")";

        //throw new Exception($sql);
        $this->db->query($sql);

    }
    
    function get_list_validarcolaboradordni($num_documento){

        $sql = "SELECT * from users where estado=1 and num_doc =".$num_documento;
        
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_list_evaluacion_induccion($cod_base=null){
        $parte="";
        if($cod_base!=""){
            $parte="AND u.centro_labores='$cod_base'";
        }

        $sql="SELECT u.*,p.nom_puesto,count(e.id_encuesta_examen) as cant,g.nom_gerencia,p.nom_puesto,a.nom_area,c.nom_cargo
            FROM users u
            LEFT JOIN puesto p on p.id_puesto=u.id_puesto
            LEFT JOIN encuesta_examen e on e.id_usuario=u.id_usuario
            LEFT JOIN gerencia g on g.id_gerencia=u.id_gerencia
            LEFT JOIN area a on a.id_area=u.id_area
            LEFT JOIN cargo c on c.id_cargo=u.id_cargo
            WHERE u.estado=1 $parte AND u.id_nivel<>8 GROUP by u.id_usuario";

        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_list_evaluacion_induccion_otro(){
        $cod_base= $_SESSION['usuario'][0]['centro_labores'];

        $sql="SELECT u.*,p.nom_puesto,count(e.id_encuesta_examen) as cant,g.nom_gerencia,
            p.nom_puesto,a.nom_area,c.nom_cargo
            FROM users u
            LEFT JOIN puesto p on p.id_puesto=u.id_puesto
            LEFT JOIN encuesta_examen e on e.id_usuario=u.id_usuario
            LEFT JOIN gerencia g on g.id_gerencia=u.id_gerencia
            LEFT JOIN area a on a.id_area=u.id_area
            LEFT JOIN cargo c on c.id_cargo=u.id_cargo
            WHERE u.estado=1 AND u.centro_labores='$cod_base' AND u.id_nivel<>8 
            GROUP BY u.id_usuario";

        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function get_list_evaluacion_competencia($dato){
        $array = explode("-",$dato['competencias']);
        $i = 0;
        $cadena = "";
        while($i<count($array)){
            $cadena = $cadena.",(SELECT capacidad FROM evaluacion_competencia WHERE id_competencia_puesto=".$array[$i]." AND id_asignacion_evaluador=ae.id_asignacion_evaluador) AS Competencia_".$array[$i];
            $i++;
        }

        $sql = "SELECT ae.id_asignacion_evaluador,CONCAT(us.usuario_nombres,' ',us.usuario_apater,' ',us.usuario_apater) AS nom_evaluador
                $cadena
                FROM `asignacion_evaluador` ae
                LEFT JOIN users us ON us.id_usuario=ae.evaluador
                WHERE ae.estado=1 AND ae.id_evaluado='".$dato['id_evaluado']."'";
        $query = $this->db->query($sql)->result_Array();
        return $query;
    }

    function update_gdatosp($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];
        $path = $_FILES['foto']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $mi_archivo = 'foto';
        //$config['upload_path'] = './fotos/';/// ruta del fileserver para almacenar el documento
        $config['upload_path'] = './documentos_postulante/foto/';
        $config['file_name'] = $dato['num_doc']."_".rand(10,99).".".$ext;
       // $ruta = "fotos/".$config['file_name'];
        $ruta = 'documentos_postulante/foto/'.$config['file_name'];
        if (!file_exists($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
            //chmod($config['upload_path'], 0777, true);
            chmod($config['upload_path'], 0777);
            chmod('./documentos_postulante/', 0777);
            chmod('./documentos_postulante/foto/', 0777);
        }
        $config['allowed_types'] = "png|jpg|jpeg";
        $config['max_size'] = "0";
        $config['max_width'] = "0";
        $config['max_height'] = "0";
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($mi_archivo)) {
            $data['uploadError'] = $this->upload->display_errors();
        }       
        $data['uploadSuccess'] = $this->upload->data();
        $datas = $this->upload->data();
        $this->redimenzionar_imagen($datas['full_path']);

        if ($path!=""){

            if(isset($dato['total'][0]['foto']) && $dato['total'][0]['foto']!=""){
                unlink($dato['total'][0]['foto']); 
            }
                            
            
            $sql = "UPDATE postulante SET postulante_apater='".addslashes($dato['usuario_apater'])."', 
                    postulante_amater='".addslashes($dato['usuario_amater'])."',
                    postulante_nombres='".addslashes($dato['usuario_nombres'])."',
                    id_nacionalidad='".$dato['id_nacionalidad']."', 
                    id_tipo_documento='".$dato['id_tipo_documento']."', 
                    num_doc='".$dato['num_doc']."',
                    id_genero='".$dato['id_genero']."', 
                    dia_nac='".$dato['dia_nac']."', 
                    mes_nac='".$dato['mes_nac']."', 
                    anio_nac='".$dato['anio_nac']."', 
                    id_estado_civil='".$dato['id_estado_civil']."', 
                    postulante_email='".$dato['usuario_email']."',
                    num_celp='".$dato['num_celp']."', 
                    num_fijop='".$dato['num_fijop']."', 
                    fec_nac='".$dato['fec_nac']."', 
                    foto='".$ruta."',
                    fec_act=NOW(), 
                    user_act=".$id_usuario." 
                    WHERE id_postulante = ".$dato['id_usuario']."";
        }else{
            $sql = "UPDATE postulante SET postulante_apater='".addslashes($dato['usuario_apater'])."', 
                    postulante_amater='".addslashes($dato['usuario_amater'])."',
                    postulante_nombres='".addslashes($dato['usuario_nombres'])."',
                    id_nacionalidad='".$dato['id_nacionalidad']."', 
                    id_tipo_documento='".$dato['id_tipo_documento']."', 
                    num_doc='".$dato['num_doc']."',
                    id_genero='".$dato['id_genero']."', 
                    dia_nac='".$dato['dia_nac']."', 
                    mes_nac='".$dato['mes_nac']."', 
                    anio_nac='".$dato['anio_nac']."', 
                    id_estado_civil='".$dato['id_estado_civil']."', 
                    postulante_email='".$dato['usuario_email']."',
                    num_celp='".$dato['num_celp']."', 
                    num_fijop='".$dato['num_fijop']."', 
                    fec_nac='".$dato['fec_nac']."',
                    fec_act=NOW(), user_act=".$id_usuario." 
                    WHERE id_postulante = ".$dato['id_usuario']."";
        }
        $this->db->query($sql);
    }

    function redimenzionar_imagen($path_image) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path_image;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 500;
        $config['height'] = 500;

        $this->load->library('image_lib', $config);

        $this->image_lib->resize();
    }

    function update_domiciliop($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];

            $sql = "UPDATE domicilio_usersp SET id_postulante='".$dato['id_usuario']."', 
                    id_departamento='".$dato['id_departamento']."',
                    id_provincia='".$dato['id_provincia']."', 
                    id_distrito='".$dato['id_distrito']."',
                    id_tipo_via='".$dato['id_tipo_via']."',
                    nom_via='".$dato['nom_via']."',
                    num_via='".$dato['num_via']."', 
                    id_zona='".$dato['id_zona']."', 
                    nom_zona='".$dato['nom_zona']."', 
                    referencia='".$dato['referencia']."',
                    kilometro='".$dato['kilometro']."',
                    manzana='".$dato['manzana']."',
                    lote='".$dato['lote']."', 
                    interior='".$dato['interior']."', 
                    departamento='".$dato['departamento']."', 
                    piso='".$dato['piso']."',
                    id_tipo_vivienda='".$dato['id_tipo_vivienda']."',
                    lat='".$dato['lat']."',
                    lng='".$dato['lng']."',
                    fec_act=NOW(), user_act=".$id_usuario." 
                    WHERE id_postulante = ".$dato['id_usuario']."";

        $this->db->query($sql);
    }

    function insert_domiciliop($dato){
        $id_usuario= $_SESSION['usuario'][0]['id_usuario'];

            $sql = "INSERT INTO domicilio_usersp (id_postulante,
                    id_departamento, id_provincia, id_distrito, 
                    id_tipo_via, nom_via, num_via, id_zona, nom_zona, referencia, id_tipo_vivienda,
                    kilometro, manzana, lote, interior, departamento, piso, lat, lng,
                    fec_reg, user_reg, estado) 
                    values 
                    ('".$dato['id_usuario']."',
                    '".$dato['id_departamento']."',
                    '".$dato['id_provincia']."',
                    '".$dato['id_distrito']."',
                    '".$dato['id_tipo_via']."',
                    '".$dato['nom_via']."',
                    '".$dato['num_via']."',
                    '".$dato['id_zona']."',
                    '".$dato['nom_zona']."',
                    '".$dato['referencia']."',
                    '".$dato['id_tipo_vivienda']."',
                    '".$dato['kilometro']."',
                    '".$dato['manzana']."',
                    '".$dato['lote']."',
                    '".$dato['interior']."',
                    '".$dato['departamento']."',
                    '".$dato['piso']."',
                    '".$dato['lat']."',
                    '".$dato['lng']."',
                    NOW(),".$id_usuario.", '1')";

        $this->db->query($sql);
    }

}