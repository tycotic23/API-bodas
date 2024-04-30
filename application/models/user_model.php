<?php 
Class user_model extends CI_Model {
    
    
    function list_users (){
        $this->db->order_by("usuario");
        return $this->db->get("usuarios")->result_array();
    }

    function get_by_id($id=null){
        $this->db->where("usuario_id",$id);
        $this->db->limit(1);
        return $this->db->get("usuarios")->row_array();
    }

    public function get_password($usuario=""){
        $this->db->select("password");
        $this->db->where("usuario",$usuario);
        $this->db->limit(1);
        $res=$this->db->get("usuarios");
        $array=$res->row_array();
        return $array["password"];
}   
    
    function check_login($user=false,$password=false){
        $this->db->select("usuario_id");
        $this->db->where("usuario",$user);
        $this->db->where("password",$password);
        $this->db->limit(1);
        $res=$this->db->get("usuarios");
        if($res->num_rows()){
            $user=$res->row_array();
            return $user["usuario_id"];
        }else{
            return false;
        }
    }

    function check_user($user=""){
        $this->db->select("usuario_id");
        $this->db->where("usuario",$user);
        $this->db->limit(1);
        $res=$this->db->get("usuarios");
        if($res->num_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function create_user ($usuario="",$password=""){
        $this->db->set("usuario",$usuario);
        $this->db->set("password",$password);
        $this->db->insert("usuarios");
    }

    public function delete_user ($id=""){
        $this->db->where("usuario_id",$id);
        $this->db->limit(1);
        $this->db->delete("usuarios");
        return $this->db->affected_rows(); 
    }
        
    public function check_rol($usuario_id=""){
        $this->db->select("rol_id");
        $this->db->where("usuario_id",$usuario_id);
            $this->db->limit(1);
            $res=$this->db->get("usuarios")->row_array();
            if($res["usuario_id"]=="1"){
                return true;
            }else{
                return false;
            }
        }

    public function update_login ($id=""){
        $this->db->set("ult_login","now()",false);
        $this->db->where("usuario_id",$id);
        $this->db->limit(1);
        $this->db->update("usuarios");
        return $this->db->affected_rows();
        }

    public function change_password($usuario="",$passwordnew=""){
        $this->db->set("password",$passwordnew);
        $this->db->where("usuario",$usuario);
        $this->db->limit(1);
        $this->db->update("usuarios");
        return $this->db->affected_rows();    
    }

    public function update_user($user_id,$user){
        $this->db->set("usuario",$user);
        $this->db->where("usuario_id",$usuario_id);
        $this->db->update("usuarios");
        return $this->db->affected_rows();
    }

    public function update_client_user($client_id,$user_id){
        $this->db->set("cliente_id",$client_id);
        $this->db->where("usuario_id",$user_id);
        $this->db->update("usuarios");
        return $this->db->affected_rows();
    }

    
}

?>