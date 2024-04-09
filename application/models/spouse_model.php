<?php 
Class Spouse_model extends CI_Model {



    function list_spouse (){
        $this->db->order_by("conyugue_id");
        return $this->db->get("conyugues")->result_array();
    }

    function get_by_id($id=null){
        $this->db->where("spouse_id",$id);
        $this->db->limit(1);
        return $this->db->get("conyugues")->row_array();
    }

    public function create_spouse ($name="",$surname="",$birthdate=""){

        $this->db->set("nombre",$name);
        $this->db->set("apellido",$surname);
        $this->db->set("fecha_nacimiento",$birthday);
        $this->db->insert("conyugues");
    }
    
}
?>