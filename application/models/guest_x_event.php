<?php 
Class Guest_x_event extends CI_Model {



    function list_guest_X_events (){
        $this->db->order_by("invitado_x_evendo_id");
        return $this->db->get("invitado_x_evento")->result_array();
    }

    function get_by_id($id=null){
        $this->db->where("invitado_x_evento_id",$id);
        $this->db->limit(1);
        return $this->db->get("invitado_x_evento")->row_array();
    }

    public function create_guest_x_event ($event_id="",$guest_id="",$asist="",$coments=""){

        $this->db->set("evento_id",$name);
        $this->db->set("invitado_id",$guest_id);
        $this->db->set("asistencia",$asist);
        $this->db->set("comentario",$coments);
        $this->db->insert("invitado_x_evento");
    }

    public function update_event_guest_x_event($guest_x_event_id,$event_id){
        $this->db->set("evento_id",$event_id);
        $this->db->where("invitado_x_evento_id",$guest_x_event_id);
        $this->db->update("invitado_x_evento");
        return $this->db->affected_rows();
    }

    public function update_guest_guest_x_event($guest_id,$guest_x_event_id){
        $this->db->set("invitado_id",$guest_id);
        $this->db->where("invitado_x_evento_id",$guest_x_event_id);
        $this->db->update("invitado_x_evento");
        return $this->db->affected_rows();
    }

    public function update_asist_guest_x_event($guest_x_event_id,$asist){
        $this->db->set("asistencia",$asist);
        $this->db->where("invitado__evento_id",$guest_x_event_id);
        $this->db->update("invitado_x_evento");
        return $this->db->affected_rows();
    }

    public function update_coments_guest_x_event($guest_x_event_id,$coments){
        $this->db->set("coments",$coments);
        $this->db->where("invitado_x_event_id",$guest_x_event_id);
        $this->db->update("invitado_x_evento");
        return $this->db->affected_rows();
    }

    public function delete_guest_x_event($guest_x_event_id=false){
        $this->db->where("guest_x_event_id",$guest_x_event_id);
        $this->db->limit(1);
        $this->db->delete("invitado_x_evento");
        return $this->db->affected_rows();
    }
    
}
?>