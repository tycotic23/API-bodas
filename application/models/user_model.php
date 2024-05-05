<?php 
Class user_model extends CI_Model {
    
    protected $database="usuarios";
    protected $primary_key="usuario_id";

    public function default_select (){
        $this->db->select($this->table.".*");
    }
    
    function list_user (){
        $this->db->order_by($this->primary_key);
        return $this->db->get($this->database)->result_array();
    }

    function get_by_id($id=null){
        $this->db->where($this->primary_key,$id);
        $this->db->limit(1);
        return $this->db->get($this->database)->row_array();
    }

    public function get_password($usuario=""){
        $this->db->select("password");
        $this->db->where("usuario",$usuario);
        $this->db->limit(1);
        $res=$this->db->get($this->database);
        $array=$res->row_array();
        return $array["password"];
}   
    
    function check_login($user=false,$password=false){
        $this->db->select($this->primary_key);
        $this->db->where("usuario",$user);
        $this->db->where("password",$password);
        $this->db->limit(1);
        $res=$this->db->get($this->database);
        if($res->num_rows()){
            $user=$res->row_array();
            return $user["usuario_id"];
        }else{
            return false;
        }
    }

    function check_user($user=""){
        $this->db->select($this->primary_key);
        $this->db->where("usuario",$user);
        $this->db->limit(1);
        $res=$this->db->get($this->database);
        if($res->num_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function create_user ($usuario="",$password=""){
        $this->db->set("usuario",$usuario);
        $this->db->set("password",$password);
        $this->db->insert($this->database);
    }

    public function delete_user ($id=""){
        $this->db->where($this->primary_key,$id);
        $this->db->limit(1);
        $this->db->delete($this->database);
        return $this->db->affected_rows(); 
    }
        
    public function check_rol($usuario_id=""){
        $this->db->select("rol_id");
        $this->db->where($this->primary_key,$usuario_id);
            $this->db->limit(1);
            $res=$this->db->get($this->database)->row_array();
            if($res["rol_id"]=="1"){
                return true;
            }else{
                return false;
            }
        }

    public function update_login ($id=""){
        $this->db->set("ult_login","now()",false);
        $this->db->where($this->primary_key,$id);
        $this->db->limit(1);
        $this->db->update($this->database);
        return $this->db->affected_rows();
        }

    public function change_password($usuario="",$passwordnew=""){
        $this->db->set("password",$passwordnew);
        $this->db->where("usuario",$usuario);
        $this->db->limit(1);
        $this->db->update($this->database);
        return $this->db->affected_rows();    
    }

    public function update_user($user_id,$user){
        $this->db->set("usuario",$user);
        $this->db->where($this->primary_key,$usuario_id);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_client_user($client_id,$user_id){
        $this->db->set("cliente_id",$client_id);
        $this->db->where($this->primary_key,$user_id);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }
    
}

?>