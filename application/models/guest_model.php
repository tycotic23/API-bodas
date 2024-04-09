<?php 
Class Guest_model extends CI_Model {



    function list_guest (){
        $this->db->order_by("invitado_id");
        return $this->db->get("invitados")->result_array();
    }

    function get_by_id($id=null){
        $this->db->where("invitado_id",$id);
        $this->db->limit(1);
        return $this->db->get("invitados")->row_array();
    }

    public function create_guest ($name="",$surname="",$attached="",$couple_id=""){

        $this->db->set("nombre",$name);
        $this->db->set("apellido",$surname);
        $this->db->set("extras",$attached);
        $this->db->set("pareja_id",$couple_id);
        $this->db->insert("invitados");
    }
    
}
?>