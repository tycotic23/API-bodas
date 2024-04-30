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

    function get_by_email($email=null){
        $this->db->where("mail",$email);
        $this->db->limit(1);
        return $this->db->get("invitados")->row_array();
    }

    function check_mail($email=null){
        $this->db->select("invitado_id");
        $this->db->where("mail",$email);
        $this->db->limit(1);
        $res=$this->db->get("invitados");
        if($res->num_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function create_guest ($name="",$surname="",$email="",$phone_number="",$attached="",$couple_id=""){

        $this->db->set("nombre",$name);
        $this->db->set("apellido",$surname);
        $this->db->set("mail"$email);
        $this->db->set("telefono",$phone_number);
        $this->db->set("extras",$attached);
        $this->db->set("pareja_id",$couple_id);
        $this->db->insert("invitados");
    }

    public function update_name_guest($guest_id,$name){
        $this->db->set("nombre",$name);
        $this->db->where("invitado_id",$guest_id);
        $this->db->update("invitados");
        return $this->db->affected_rows();
    }

    public function update_surname_guest($guest_id,$surname){
        $this->db->set("apellido",$surname);
        $this->db->where("invitado_id",$guest_id);
        $this->db->update("invitados");
        return $this->db->affected_rows();
    }

    public function update_email_guest($guest_id,$email){
        $this->db->set("mail",$email);
        $this->db->where("invitado_id",$guest_id);
        $this->db->update("invitados");
        return $this->db->affected_rows();
    }

    public function update_phone_number_guest($guest_id,$phone_number){
        $this->db->set("telefono",$phone_number);
        $this->db->where("invitado_id",$guest_id);
        $this->db->update("invitados");
        return $this->db->affected_rows();
    }

    public function update_attached_guest($guest_id,$attached){
        $this->db->set("extras",$attached);
        $this->db->where("invitado_id",$guest_id);
        $this->db->update("invitados");
        return $this->db->affected_rows();
    }

    public function update_couple_id_guest($guest_id,$couple_id){
        $this->db->set("pareja_id",$couple_id);
        $this->db->where("invitado_id",$guest_id);
        $this->db->update("invitados");
        return $this->db->affected_rows();
    }

    public function delete_guest($guest_id=false){
        $this->db->where("guest_id",$guest_id);
        $this->db->limit(1);
        $this->db->delete("invitados");
        return $this->db->affected_rows();
    }
    
}
?>