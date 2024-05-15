<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Learning_objectives_model extends CI_model{

    public function get_learning_objectives(){
		$sql = $this->db->select("*")
				->from('learning_objectives')
				->get();
        return $sql;
    }

    public function get_class_mission_learning_objectives_by_class_mission_id($id){
		$array = array('class_mission_id' => $id);
        $query = $this->db->select("*")
				->from('class_mission_learning_objectives')
				->where($array)
                ->get();    
        return $query;
    }

    public function get_learning_objectives_by_learning_objectives_id($id){
		$array = array('learning_objectives_id' => $id);
        $query = $this->db->select("*")
				->from('learning_objectives')
				->where($array)
                ->get();    
        return $query;
    }

    public function delete_class_mission_learning_objectives($id) {
        $array = array('class_mission_id' => $id,'is_manual' => 1);
		$sql = $this->db->where($array)
					->delete('class_mission_learning_objectives');
		if ($sql) {
			return true;
		}
		return false;
	}

    public function insert_class_mission_learning_objectives($data) {
        $query = $this->db->insert("class_mission_learning_objectives", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function get_class_mission_learning_objectives_by_cmid_loid($class_mission_id,$learning_objectives_id){
		$array = array('class_mission_id' => $class_mission_id,'content' => $learning_objectives_id);
        $query = $this->db->select("*")
				->from('class_mission_learning_objectives')
				->where($array)
                ->get();    
        return $query;
    }

    public function delete_class_mission_learning_objectives_by_cmid_loid($class_mission_id,$learning_objectives_id){
        $sql = $this->get_class_mission_learning_objectives_by_cmid_loid($class_mission_id,$learning_objectives_id);
		if($sql->num_rows() > 0){
			foreach($sql->result() as $res){
				$this->db->where('class_mission_learning_objectives_id', $res->class_mission_learning_objectives_id)
						->delete('class_mission_learning_objectives');
			}
		}
    }
	
}