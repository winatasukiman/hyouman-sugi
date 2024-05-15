<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_model extends CI_model{

    public function get_class_by_grade_id($id,$now){
		$array = array('g.grade_id' => $id);
        $query = $this->db->select("*")
				->from('class c')
				->join('user u', 'c.class_creator = u.user_id', 'left')
				->join('grade_subject gs', 'c.grade_subject_id = gs.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject s', 's.subject_id = gs.subject_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_by_class_id($id){
		$array = array('c.class_id' => $id);
        $query = $this->db->select("*")
				->from('class c')
				->join('user u', 'c.class_creator = u.user_id', 'left')
				->join('grade_subject gs', 'c.grade_subject_id = gs.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject s', 's.subject_id = gs.subject_id', 'left')
				->join('term t', 't.term_id = c.term_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_mission_by_class_id($id){
		$array = array('cm.class_id' => $id);
        $query = $this->db->select("*")
				->from('class_mission cm')
				->order_by('mission_id', 'asc')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_mission_participants_by_user_id_class_mission_id($user_id,$class_mission_id){
		$array = array('participant_id'=>$user_id,'class_mission_id' => $class_mission_id);
        $query = $this->db->select("*")
				->from('class_mission_participants')
				->where($array)
                ->get();    
        return $query;
    }
	
    public function get_class_status($class_id) {
        $array = array('class_id'=>$class_id, 'datetime !='=>NULL);
        $query = $this->db->select("*")
				->from('status_class_class_detail')
				->where($array)
                ->order_by('datetime', 'asc')
                ->get();
        return $query->first_row();
    }

	public function insert_class_mission_participants($data) {
        $query = $this->db->insert("class_mission_participants", $data);
        if ($query){
            return true;
        } else {
            return false;
        }
    }
	
	public function insert_class_strength_capture($data) {
        $query = $this->db->insert("class_strength_capture_student", $data);
        if ($query){
            return true;
        } else {
            return false;
        }
    }
	
	public function insert_class_strength_capture_teacher($data) {
        $query = $this->db->insert("class_strength_capture_teacher", $data);
        if ($query){
            return true;
        } else {
            return false;
        }
    }
}