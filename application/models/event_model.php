<?php 
Class Event_model extends CI_Model {

    protected $database="eventos";
    protected $primary_key="evento_id";

    public function default_select (){
        $this->db->select($this->table.".*");
    }
    
    function get_by_id($id=null){
        $this->db->where($this->primary_key,$id);
        $this->db->limit(1);
        return $this->db->get($this->database)->result_array();
    }

    function list_event (){
        $this->db->order_by($this->primary_key);
        $res=$this->db->get($this->database);
        return $res->result_array();
    }

    function get_by_couple($couple_id=null){
        $this->db->order_by($this->primary_key);
        $this->db->where("pareja_id",$couple_id);
        $res=$this->db->get($this->database);
        return $res->result_array();
    }


    public function create_event ($couple_id=null,$location=null,$direction_street=null,$direction_number=null,$location_id=null,$event_name=null,$date_time=null){
        $this->db->set("pareja_id",$couple_id);
        $this->db->set("locacion",$location);
        $this->db->set("direccion_calle",$direction_street);
        $this->db->set("direccion_numero",$direction_number);
        $this->db->set("localidad_id",$location_id);
        $this->db->set("nombre",$event_name);
        $this->db->set("horario",$date_time);
        $this->db->insert($this->database);
    }

    public function update_event_couple($event_id="",$couple_id=""){
        $this->db->set("pareja_id",$cuople_id);
        $this->db->where($this->primary_key,$event_id);
        $this->db->limit(1);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }
    public function update_event_location($event_id="",$location=""){
        $this->db->set("locacion",$location);
        $this->db->where($this->primary_key,$event_id);
        $this->db->limit(1);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }
    public function update_event_name_street($event_id="",$direction_street){
        $this->db->set("direccion_calle",$direction_street);
        $this->db->where($this->primary_key,$event_id);
        $this->db->limit(1);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }
    public function update_event_number_street($event_id="",$direction_number=""){
        $this->db->set("direccion_numero",$direction_number);
        $this->db->where($this->primary_key,$event_id);
        $this->db->limit(1);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_event_localities($event_id="",$location_id=""){
        $this->db->set("localidad_id",$location_id);
        $this->db->where($this->primary_key,$event_id);
        $this->db->limit(1);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_event_name($event_id="",$event_name=""){
        $this->db->set("nombre",$event_name);
        $this->db->where($this->primary_key,$event_id);
        $this->db->limit(1);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_event_date_time($event_id="",$date_time=""){
        $this->db->set("horario","'$date_time'",false);
        $this->db->where($this->primary_key,$event_id);
        $this->db->limit(1);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_event_status($event_id=null,$status){
        $this->db->set("estado",$status);
        $this->db->where($this->primary_key,$event_id);
        $this->db->limit(1);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function delete_event($event_id=""){
        $this->db->where($this->primary_key,$event_id);
        $this->db->limit(1);
        $this->db->delete($this->database);
        return $this->db->affected_rows();
    }

}
?>