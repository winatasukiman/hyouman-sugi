<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Competencies_cambridge_model extends CI_model{
	
	public function get_competencies_cambridge_by_grade_id($grade_id){
       $array = array('cc.grade_id' => $grade_id);
       $query = $this->db->select("*")
				->from('competencies_cambridge cc')
                ->join('grade g', 'g.grade_id = cc.grade_id', 'left')
				->join('subject s', 's.subject_id = cc.subject_id', 'left')
				->where($array)
                ->get();      
        return $query;
    }

    public function get_competencies_cambridge_by_id($id){
        $array = array('competencies_cambridge_id' => $id);
        $query = $this->db->select("*")
                 ->from('competencies_cambridge')
                 ->where($array)
                 ->get();      
         return $query;
     }
    
}