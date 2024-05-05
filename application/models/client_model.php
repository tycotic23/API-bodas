<?php 
Class Client_model extends CI_Model {

    protected $database="clientes";
    protected $primary_key="cliente_id";

    public function default_select (){
        $this->db->select($this->table.".*");
    }

    function list_client (){
        $this->db->order_by($this->primary_key);
        return $this->db->get($this->database)->result_array();
    }

    function get_by_id($id=null){
        $this->db->where($this->primary_key,$id);
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

    public function create_client ($couple_id="",$name="",$surname="",$direction_street="",$direction_number="",$localitie_id="",$email=""){

        $this->db->set("pareja_id",$couple_id);
        $this->db->set("nombre",$name);
        $this->db->set("apellido",$surname);
        $this->db->set("direccion_calle",$direction_street);
        $this->db->set("direccion_numero",$direction_number);
        $this->db->set("localidad_id",$localitie_id);
        $this->db->set("mail",$email);
        $this->db->insert($this->database);
    }

    public function update_client_name($client_id="",$name=""){
        $this->db->set("nombre",$name);
        $this->db->where($this->primary_key,$client_id);
        $this->db->limit(1);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_client_surname($client_id="",$surname=""){
        $this->db->set("apellido",$surname);
        $this->db->where($this->primary_key,$client_id);
        $this->db->limit(1);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_client_direction_street($client_id="",$direction_street=""){
        $this->db->set("direccion_calle",$direction_street);
        $this->db->where($this->primary_key,$client_id);
        $this->db->limit(1);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_client_direction_number($client_id="",$direction_number=""){
        $this->db->set("direccion_numero",$direction_number);
        $this->db->where($this->primary_key,$client_id);
        $this->db->limit(1);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_client_localitie($client_id="",$localitie_id=""){
        $this->db->set("localidad_id",$localitie_id);
        $this->db->where($this->primary_key,$client_id);
        $this->db->limit(1);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }


    public function delete_client($client_id=""){
        $this->db->where($this->primary_key,$client_id);
        $this->db->limit(1);
        $this->db->delete($this->database);
        return $this->db->affected_rows();
    }
    
}
?>