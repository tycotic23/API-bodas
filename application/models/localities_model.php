<?php 
Class localities_model extends CI_Model {

    protected $database="lalidades";

    public function default_select (){
        $this->db->select($this->table.".*");
    }

    function list_localities (){
        $this->db->order_by("localidad_id");
        return $this->db->get($this->database)->result_array();
    }

    function get_by_id($id=null){
        $this->db->where("localidad_id",$id);
        $this->db->limit(1);
        return $this->db->get($this->database)->row_array();
    }
    function check_postal_code($postal_code=""){
        $this->db->select("localitie_id");
        $this->db->where("postal_code",$postal_code);
        $this->db->limit(1);
        $res=$this->db->get($this->database);
        if($res->num_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function create_localities ($localitie,$postal_code){
        $this->db->set("localidad",$localitie);
        $this->db->set("codigo_postal",$postal_code);
        $this->db->insert($this->database);
        
    }

    public function update_localitie($localitie_id,$localitie){
        $this->db->set("localidad",$localitie);
        $this->db->where("localidad_id",$localitie_id);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_postal_code($localitie_id,$postal_code){
        $this->db->set("codigo_postal",$postal_code);
        $this->db->where("localidad_id",$localitie_id);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function delete_localitie($localitie_id=""){
        $this->db->where("localidad_id",$localitie_id);
        $this->db->limit(1);
        $this->db->delete($this->database);
        return $this->db->affected_rows();
    }
    
}
    ?>