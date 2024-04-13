<?php 
Class localities_model extends CI_Model {



    function list_localities (){
        $this->db->order_by("localidad_id");
        return $this->db->get("localidades")->result_array();
    }

    function get_by_id($id=null){
        $this->db->where("localidad_id",$id);
        $this->db->limit(1);
        return $this->db->get("localidades")->row_array();
    }
    function check_postal_code($postal_code=""){
        $this->db->select("localitie_id");
        $this->db->where("postal_code",$postal_code);
        $this->db->limit(1);
        $res=$this->db->get("localidades");
        if($res->num_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function create_localities ($localitie,$postal_code){
        $this->db->set("localidad",$localitie);
        $this->db->set("codigo_postal",$postal_code);
        $this->db->insert("localidades");
        
    }

    public function update_localitie($localitie_id,$localitie){
        $this->db->set("localidad",$localitie);
        $this->db->where("localidad_id",$localitie_id);
        $this->db->update("localidades");
        return $this->db->affected_rows();
    }

    public function update_postal_code($localitie_id,$postal_code){
        $this->db->set("codigo_postal",$postal_code);
        $this->db->where("localidad_id",$localitie_id);
        $this->db->update("localidades");
        return $this->db->affected_rows();
    }

    public function delete_localitie($localitie_id=""){
        $this->db->where("localidad_id",$localitie_id);
        $this->db->limit(1);
        $this->db->delete("localidades");
        return $this->db->affected_rows();
    }
    
}
    ?>