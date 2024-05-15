<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Competencies_k13_model extends CI_model{
	
	public function get_competencies_k13_by_grade_id($grade_id){
       $array = array('ck.grade_id' => $grade_id,'is_active' => 1);
       $query = $this->db->select("*")
				->from('competencies_k13 ck')
                ->join('grade g', 'g.grade_id = ck.grade_id', 'left')
				->join('subject s', 's.subject_id = ck.subject_id', 'left')
				->where($array)
                ->get();      
        return $query;
    }

    public function get_competencies_k13_by_id($id){
        $array = array('competencies_k13_id' => $id,'is_active' => 1);
        $query = $this->db->select("*")
                 ->from('competencies_k13')
                 ->where($array)
                 ->get();      
         return $query;
     }
    
}