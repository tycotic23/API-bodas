<?php 
Class Events_model extends CI_Model {

    $db="eventos";

    function list_events (){
        $this->db->order_by("evento_id");
        $res=$this->db->get($this->db);
        return $res->result_array();
    }

    function get_by_id($id=null){
        $this->db->where("evento_id",$id);
        $this->db->limit(1);
        return $this->db->get($this->db)->row_array();
    }

    public function create_event ($couple_id="",$location="",$direction_street="",$direction_number="",$location_id="",$event_name="",$date_time=""){

        $this->db->set("pareja_id",$couple_id);
        $this->db->set("locacion",$location);
        $this->db->set("direccion_calle",$direction_street);
        $this->db->set("direccion_numero",$direction_number);
        $this->db->set("localidad_id",$location_id);
        $this->db->set("nombre",$event_name);
        $this->db->set("horario",$date_time);
        $this->db->insert();
    }

    public function update_event_couple($event_id="",$couple_id=""){
        $this->db->set("pareja_id",$cuople_id);
        $this->db->where("evento_id",$event_id);
        $this->db->limit(1);
        return $this->db->affected_rows();
    }
    public function update_event_location($event_id="",$location=""){
        $this->db->set("locacion",$location);
        $this->db->where("evento_id",$event_id);
        $this->db->limit(1);
        return $this->db->affected_rows();
    }
    public function update_event_name_street($event_id="",$direction_street){
        $this->db->set("direccion_calle",$direction_street);
        $this->db->where("evento_id",$event_id);
        $this->db->limit(1);
        return $this->db->affected_rows();
    }
    public function update_event_numer_street($event_id="",$direction_number=""){
        $this->db->set("direccion_numero",$direction_number);
        $this->db->where("evento_id",$event_id);
        $this->db->limit(1);
        return $this->db->affected_rows();
    }

    public function update_event_localities($event_id="",$location_id){
        $this->db->set("localidad_id",$location_id);
        $this->db->where("evento_id",$event_id);
        $this->db->limit(1);
        return $this->db->affected_rows();
    }
    public function update_event_name($event_id="",$event_name){
        $this->db->set("nombre",$event_name);
        $this->db->where("evento_id",$event_id);
        $this->db->limit(1);
        return $this->db->affected_rows();

    }
    public function update_event_date_time($event_id="",$date_time){
        $this->db->set("horario",$date_time);
        $this->db->where("evento_id",$event_id);
        $this->db->limit(1);
        return $this->db->affected_rows();
    }

    public function delete_event($event_id=""){
        $this->db->where("evento_id",$event_id);
        $this->db->limit(1);
        $this->db->delete("eventos");
        return $this->db->affected_rows();
    }
}
?>