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

    public function update_name_guest($localitie_id,$postal_code){
        $this->db->set("codigo_postal",$postal_code);
        $this->db->where("localidad_id",$localitie_id);
        $this->db->update("localidades");
        return $this->db->affected_rows();
    }

}
    ?>