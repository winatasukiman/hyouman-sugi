<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_activity_model extends CI_model{

    public function get_class_activity_by_subject_id($subject_id){
        $array = array('subject_id' => $subject_id);
        $query = $this->db->select("*")
				->from('subject_class_activity sca')
                ->join('class_activities ca', 'ca.class_activity_id = sca.class_activity_id')
                ->where($array)
                ->get();
        return $query;
    }

    public function get_class_activity(){
        $query = $this->db->select("*")
				->from('class_activities')
                ->get();
        return $query;
    }
	
}