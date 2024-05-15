<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grade_subject_model extends CI_model{
	
	public function get_grade_subject(){
        $array = array('g.status' => 1,'gs.is_active' => 1);
        $query = $this->db->select("*")
				->from('grade_subject gs')
				->join('grade g', 'g.grade_id = gs.grade_id')
                ->join('subject_parent_detail spd', 'spd.subject_parent_detail_id = gs.subject_parent_detail_id', 'left')
				->join('subject s', 's.subject_id = spd.subject_id', 'left')
                ->join('subject_parent sp', 'sp.subject_parent_id = spd.subject_parent_id', 'left')
                ->where($array)
                ->order_by('sp.subject_parent_id','asc')
                ->order_by('g.grade_id','asc')
                ->get();    
        return $query;
    }
}