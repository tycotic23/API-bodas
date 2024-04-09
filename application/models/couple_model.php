<?php 
Class Parejas_model extends CI_Model {



    function list_couple (){
        $this->db->order_by("pareja_id");
        return $this->db->get("parejas")->result_array();
    }

    function get_by_id($id=null){
        $this->db->where("couple_id",$id);
        $this->db->limit(1);
        return $this->db->get("parejas")->row_array();
    }

    public function create_couple ($spouse_1="",$spouse_2="",$cvu=""){

        $this->db->set("conyugue_1",$spouse_1);
        $this->db->set("conyugue_2",$spouse_2);
        $this->db->set("cvu_regalos",$cvu);
        $this->db->insert("parejas");
    }
    
}
?>