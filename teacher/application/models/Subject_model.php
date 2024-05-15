<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject_model extends CI_model{

    public function get_grade() {
        $query = $this->db->select("*")
				->from('grade')
                ->get();    
        return $query;
    }
	
	public function get_subject() {
        $query = $this->db->select("*")
				->from('subject')
                ->get();    
        return $query;
    }

	public function get_subject_parent() {
        $query = $this->db->select("*")
				->from('subject_parent')
                ->get();    
        return $query;
    }

	public function get_subject_parent_detail_by_subject_parent_id($id){
		$array = array('spd.subject_parent_id' => $id,'g.status' => 1);
        $query = $this->db->select("*")
				->from('subject_parent_detail spd')
				->join('subject_parent sp', 'sp.subject_parent_id = spd.subject_parent_id', 'left')
				->join('subject s', 's.subject_id = spd.subject_id', 'left')
				->join('grade_subject gs', 'gs.subject_parent_detail_id = spd.subject_parent_detail_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->where('spd.subject_parent_id',$id)
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_grade_by_subject($subject){
        $query = $this->db->select("*")
				->from('grade_subject gs')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject_parent_detail spd', 'spd.subject_parent_detail_id = gs.subject_parent_detail_id', 'left')
				->join('subject s', 's.subject_id = spd.subject_id', 'left')
				->where('s.subject_id',$subject)
                ->get();    
        return $query;
    }
	
	public function get_teacher_specialty_by_subject_id($user_id,$subject){
		$array = array('ts.user_id' => $user_id,'s.subject_id' => $subject);
        $query = $this->db->select("*")
				->from('teacher_specialty ts')
				->join('grade_subject gs', 'gs.grade_subject_id = ts.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject_parent_detail spd', 'spd.subject_parent_detail_id = gs.subject_parent_detail_id', 'left')
				->join('subject s', 's.subject_id = spd.subject_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_grade_subject_by_grade_id_and_subject_id($subject_id,$grade_id){
		$array = array('gs.grade_id' => $grade_id,'s.subject_id' => $subject_id);
        $query = $this->db->select("*")
				->from('grade_subject gs')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject_parent_detail spd', 'spd.subject_parent_detail_id = gs.subject_parent_detail_id', 'left')
				->join('subject s', 's.subject_id = spd.subject_id', 'left')
				->join('subject_parent sp', 'sp.subject_parent_id = spd.subject_parent_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	public function get_grade_subject_by_id($id){
		$array = array('gs.grade_subject_id' => $id);
        $query = $this->db->select("*")
				->from('grade_subject gs')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject_parent_detail spd', 'spd.subject_parent_detail_id = gs.subject_parent_detail_id', 'left')
				->join('subject s', 's.subject_id = spd.subject_id', 'left')
				->join('subject_parent sp', 'sp.subject_parent_id = spd.subject_parent_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	public function get_grade_subject_by_user_id($id){
		$array = array('ts.user_id' => $id);
        $query = $this->db->select("*")
				->from('teacher_specialty ts')
				->join('grade_subject gs', 'gs.grade_subject_id = ts.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject_parent_detail spd', 'spd.subject_parent_detail_id = gs.subject_parent_detail_id', 'left')
				->join('subject s', 's.subject_id = spd.subject_id', 'left')
				->where($array)
				->order_by('g.grade_id', 'asc')
                ->get();    
        return $query;
    }
	public function insert_grade_subject($data) {
        $query = $this->db->insert("teacher_specialty", $data);
        if ($query){
            return true;
        } else {
            return false;
        }
    }
	public function delete_grade_subject_by_user_id($id) {
		$sql = $this->db->where('user_id', $id)
						->delete('teacher_specialty');
		if ($sql) {
			return true;
		}
		return false;
	}
}