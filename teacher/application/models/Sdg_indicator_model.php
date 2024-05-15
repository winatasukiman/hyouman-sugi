<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sdg_indicator_model extends CI_model{
	
	public function get_grade_sdg_indicator_by_grade_id($grade_id){
		$array = array('grade_id' => $grade_id);
        $query = $this->db->select("*")
				->from('grade_sdg_indicator gsi')
				->join('sdg_indicator si', 'gsi.sdg_indicator_id = si.sdg_indicator_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_mission_sdg_indicator_by_class_mission_id($class_mission_id){
		$array = array('cmsi.class_mission_id' => $class_mission_id);
        $query = $this->db->select("*")
				->from('class_mission_sdg_indicator cmsi')
				->join('sdg_indicator si', 'cmsi.sdg_indicator_id = si.sdg_indicator_id', 'left')
				->where($array)
                ->get();
        return $query;
    }
	
	public function insert_class_mission_sdg_indicator($data) {
        $query = $this->db->insert("class_mission_sdg_indicator", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function get_class_mission_sdg_indicator_by_class_mission_id_sdg_indicator_id($class_mission_id,$sdg_indicator_id){
		$array = array('class_mission_id' => $class_mission_id,'sdg_indicator_id' => $sdg_indicator_id);
        $query = $this->db->select("*")
				->from('class_mission_sdg_indicator')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function delete_class_mission_sdg_indicator($class_mission_id,$sdg_indicator_id){
        $sql = $this->get_class_mission_sdg_indicator_by_class_mission_id_sdg_indicator_id($class_mission_id,$sdg_indicator_id);
		if($sql->num_rows() > 0){
			foreach($sql->result() as $res){
				$this->db->where('class_mission_sdg_indicator_id', $res->class_mission_sdg_indicator_id)
						->delete('class_mission_sdg_indicator');
			}
			
		}
    }
}