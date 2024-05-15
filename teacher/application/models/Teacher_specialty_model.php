<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_specialty_model extends CI_model{
	
	public function get_grade_subject_by_teacher_specialty(){
        $array = array('ts.user_id' => $this->session->userdata("user_id"));
        $query = $this->db->select("*")
				->from('teacher_specialty ts')
                ->join('grade_subject gs', 'gs.grade_subject_id = ts.grade_subject_id')
				->join('grade g', 'g.grade_id = gs.grade_id')
                ->join('subject_parent_detail spd', 'spd.subject_parent_detail_id = gs.subject_parent_detail_id', 'left')
				->join('subject s', 's.subject_id = spd.subject_id', 'left')
                ->join('subject_parent sp', 'sp.subject_parent_id = spd.subject_parent_id', 'left')
                ->where($array)
                ->order_by('g.grade_id','asc')
                ->get();    
        return $query;
    }
}