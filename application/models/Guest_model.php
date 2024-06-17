<?php 
Class Guest_model extends CI_Model {

    protected $database="invitados";
    protected $primary_key="invitado_id";

    public function default_select (){
        $this->db->select($this->table.".*");
    }

    function list_guest (){
        $this->db->order_by($this->primary_key);
        return $this->db->get($this->database)->result_array();
    }

    function get_by_id($id=null){
        $this->db->where($this->primary_key,$id);
        $this->db->limit(1);
        return $this->db->get($this->database)->result_array();
    }

    function get_by_email($email=null){
        $this->db->where("mail",$email);
        $this->db->limit(1);
        return $this->db->get($this->database)->row_array();
    }

    function get_by_couple($couple_id=null){
        $this->db->where("pareja_id",$couple_id);
        return $this->db->get($this->database)->result_array();
    }

    function get_id_by_email($email=null){
        $this->db->select($this->primary_key);
        $this->db->where("mail",$email);
        $this->db->limit(1);
        return $this->db->get($this->database)->row_array();
    }

    function check_mail($email=null){
        $this->db->select($this->primary_key);
        $this->db->where("mail",$email);
        $this->db->limit(1);
        $res=$this->db->get($this->database);
        if($res->num_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function create_guest ($name="",$surname="",$email="",$phone_number="",$couple_id=""){

        $this->db->set("nombre",$name);
        $this->db->set("apellido",$surname);
        $this->db->set("mail",$email);
        $this->db->set("telefono",$phone_number);
        $this->db->set("pareja_id",$couple_id);
        $this->db->insert($this->database);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update_guest_name($guest_id,$name){
        $this->db->set("nombre",$name);
        $this->db->where($this->primary_key,$guest_id);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_guest_surname($guest_id,$surname){
        $this->db->set("apellido",$surname);
        $this->db->where($this->primary_key,$guest_id);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_guest_mail($guest_id,$email){
        $this->db->set("mail",$email);
        $this->db->where($this->primary_key,$guest_id);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_guest_phone_number($guest_id,$phone_number){
        $this->db->set("telefono",$phone_number);
        $this->db->where($this->primary_key,$guest_id);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_guest_couple_id($guest_id,$couple_id){
        $this->db->set("pareja_id",$couple_id);
        $this->db->where($this->primary_key,$guest_id);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function delete_guest($guest_id=false){
        $this->db->where($this->primary_key,$guest_id);
        $this->db->limit(1);
        $this->db->delete($this->database);
        return $this->db->affected_rows();
    }
    
}
?>
