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
    function get_by_url($url=null){
        $this->db->where("url",$url);
        $this->db->limit(1);
        return $this->db->get("parejas")->row_array();
    }

    public function create_couple ($spouse_1="",$spouse_2="",$cvu=""){

        $this->db->set("conyugue_1",$spouse_1);
        $this->db->set("conyugue_2",$spouse_2);
        $this->db->set("cvu_regalos",$cvu);
        $this->db->insert("parejas");
    }

    public function update_couple_user($cuple_id="",$user_id=""){
        $this->db->set("usuario_id",$user_id);
        $this->db->where("couple_id"=$couple_id);
        $this->db->limit(1);
        $this->db->update("parejas");
        return $this->db->affected_rows();
    }

    public function update_couple_spouse_1($couple_id="",$spouse_1){
        $this->db->set("conyugue_1",$spouse_1);
        $this->db->where("couple_id",$couple_id);
        $this->db->limit(1);
        $this->db->update("parejas");
        return $this->db->affected_rows();
    }

    public function update_couple_spouse_2($couple_id="",$spouse_2=""){
        $this->db->set("conyugue_2",$spouse_2);
        $this->db->where("couple_id",$couple_id);
        $this->db->limit(1);
        $this->db->update("parejas");
        return $this->db->affected_rows();
    }

    public function update_couple_cvu_gift($couple_id,$cvu_gift){
        $this->db->set->("cvu_regalo",$cvu_gift);
        $this->db->where("pareja_id",$couple_id);
        $this->db->limit(1);
        $this->db->update("parejas");
        return $this->db->affected_rows();
    }

    public function update_couple_url($couple_id,$url){
        $this->db->set("url",$url);
        $this->db->where("pareja_id",$couple_id);
        $this->db->limit(1);
        $this->db->update("parejas");
        return $this->db->affected_rows();
    }


    public function delete_couple($couple_id=""){
        $this->db->where("pareja_id",$couple_id);
        $this->db->limit(1);
        $this->db->delete("parejas");
        return $this->db->affected_rows();
    }
    
}
?>