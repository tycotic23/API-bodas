<?php 
Class Couple_model extends CI_Model {

    protected $database="parejas";
    protected $primary_key="pareja_id";

    public function default_select (){
        $this->db->select($this->table.".*");
    }

    function list_couple (){
        $this->db->order_by($this->primary_key);
        return $this->db->get($this->database)->result_array();
    }

    function get_by_id($id=null){
        $this->db->where($this->primary_key,$id);
        $this->db->limit(1);
        return $this->db->get($this->database)->row_array();
    }

    function get_by_url($url=null){
        $this->db->where("url",$url);
        $this->db->limit(1);
        return $this->db->get($this->database)->row_array();
    }

    function check_url($url=""){
        $this->db->select($this->primary_key);
        $this->db->where("url",$url);
        $this->db->limit(1);
        $res=$this->db->get($this->database);
        if($res->num_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function create_couple ($spouse_1="",$spouse_2="",$cvu=""){

        $this->db->set("conyugue_1",$spouse_1);
        $this->db->set("conyugue_2",$spouse_2);
        $this->db->set("cvu_regalos",$cvu);
        $this->db->insert($this->database);
    }

    public function update_couple_user($couple_id="",$user_id=""){
        $this->db->set("usuario_id",$user_id);
        $this->db->where($this->primary_key,$couple_id);
        $this->db->limit(1);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_couple_spouse_1($couple_id="",$spouse_1){
        $this->db->set("conyugue_1",$spouse_1);
        $this->db->where($this->primary_key,$couple_id);
        $this->db->limit(1);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_couple_spouse_2($couple_id="",$spouse_2=""){
        $this->db->set("conyugue_2",$spouse_2);
        $this->db->where($this->primary_key,$couple_id);
        $this->db->limit(1);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_couple_cvu_gift($couple_id,$cvu_gift){
        $this->db->set("cvu_regalo",$cvu_gift);
        $this->db->where($this->primary_key,$couple_id);
        $this->db->limit(1);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }

    public function update_couple_url($couple_id,$url){
        $this->db->set("url",$url);
        $this->db->where($this->primary_key,$couple_id);
        $this->db->limit(1);
        $this->db->update($this->database);
        return $this->db->affected_rows();
    }


    public function delete_couple($couple_id=""){
        $this->db->where($this->primary_key,$couple_id);
        $this->db->limit(1);
        $this->db->delete($this->database);
        return $this->db->affected_rows();
    }
    
}
?>