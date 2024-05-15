<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Core_skill_model extends CI_model{

    public function get_core_skill_by_subject_id($subject_id){
        $array = array('subject_id' => $subject_id);
        $query = $this->db->select("*")
				->from('subject_core_skill scs')
                ->join('core_skills cs', 'cs.core_skill_id = scs.core_skill_id')
                ->where($array)
                ->get();
        return $query;
    }

    public function get_core_skill(){
        $query = $this->db->select("*")
				->from('core_skills')
                ->get();
        return $query;
    }
	
}