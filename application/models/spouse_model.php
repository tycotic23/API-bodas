<?php 
Class Spouse_model extends CI_Model {

    protected $database="conyugues";

    public function default_select (){
        $this->db->select($this->table.".*");
    }

    function list_spouse (){
        $this->db->order_by("conyugue_id");
        return $this->db->get($this->database)->result_array();
    }

    function get_by_id($id=null){
        $this->db->where("spouse_id",$id);
        $this->db->limit(1);
        return $this->db->get($this->database)->row_array();
    }

    public function create_spouse ($name="",$surname="",$birthdate=""){
        $this->db->set("nombre",$name);
        $this->db->set("apellido",$surname);
        $this->db->set("fecha_nacimiento",$birthday);
        $this->db->insert($this->database);
    }

    public function update_spouse_name($spouse_id,$name){
        $this->db->set("nombre",$name);
        $this->db->where("conyugue_id",$spouse_id);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_spouse_surname($spouse_id,$surname){
        $this->db->set("apellido",$surname);
        $this->db->where("conyugue_id",$spouse_id);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_spouse_birthdate($spouse_id,$birthdate){
        $this->db->set("fecha_nacimiento",$birthdate);
        $this->db->where("conyugue_id",$spouse_id);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }


    
    public function delete_spouse($spouse_id=false){
        $this->db->where("conyugue_id",$spouse_id);
        $this->db->limit(1);
        $this->db->delete($this->database);
        return $this->db->affected_rows();
    }
    
}
?>