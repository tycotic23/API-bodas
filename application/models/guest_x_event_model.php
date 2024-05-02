<?php 
Class Guest_x_event_model extends CI_Model {

    protected $database="invitado_x_evento";
    protected $primary_key="invitado_x_evento_id";

    public function default_select (){
        $this->db->select($this->table.".*");
    }

    function list_guest_X_events (){
        $this->db->order_by($this->primary_key);
        return $this->db->get($this->database)->result_array();
    }

    function get_by_id($id=null){
        $this->db->where($this->primary_key,$id);
        $this->db->limit(1);
        return $this->db->get($this->database)->row_array();
    }

    public function create_guest_x_event ($event_id="",$guest_id="",$asist="",$coments=""){

        $this->db->set("evento_id",$name);
        $this->db->set("invitado_id",$guest_id);
        $this->db->set("asistencia",$asist);
        $this->db->set("comentario",$coments);
        $this->db->insert($this->database);
    }

    public function update_event_guest_x_event($guest_x_event_id,$event_id){
        $this->db->set("evento_id",$event_id);
        $this->db->where($this->primary_key,$guest_x_event_id);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_guest_guest_x_event($guest_id,$guest_x_event_id){
        $this->db->set("invitado_id",$guest_id);
        $this->db->where($this->primary_key,$guest_x_event_id);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_asist_guest_x_event_confirm($guest_x_event_id){
        $asist="1";
        $this->db->set("asistencia",$asist);
        $this->db->where($this->primary_key,$guest_x_event_id);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_coments_guest_x_event($guest_x_event_id,$coments){
        $this->db->set("coments",$coments);
        $this->db->where($this->primary_key,$guest_x_event_id);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function delete_guest_x_event($guest_x_event_id=false){
        $this->db->where($this->primary_key,$guest_x_event_id);
        $this->db->limit(1);
        $this->db->delete($this->database);
        return $this->db->affected_rows();
    }
    
}
?>