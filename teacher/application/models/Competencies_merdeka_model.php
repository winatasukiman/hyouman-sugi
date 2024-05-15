<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Competencies_merdeka_model extends CI_model{
	
	public function get_competencies_merdeka_by_grade_id($grade_id){
       $array = array('cm.grade_id' => $grade_id);
       $query = $this->db->select("*")
				->from('competencies_merdeka cm')
                ->join('grade g', 'g.grade_id = cm.grade_id', 'left')
				->join('subject s', 's.subject_id = cm.subject_id', 'left')
				->where($array)
                ->get();      
        return $query;
    }

    public function get_competencies_merdeka_by_id($id){
        $array = array('competencies_merdeka_id' => $id);
        $query = $this->db->select("*")
                 ->from('competencies_merdeka')
                 ->where($array)
                 ->get();      
         return $query;
     }
    
}