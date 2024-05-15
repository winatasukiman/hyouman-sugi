<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Observation_result_model extends CI_model{
	
	public function get_observation_result(){
        $query = $this->db->select("*")
				->from('observation_result')
                ->get();    
        return $query;
    }
	
	public function get_observation_result_by_id($observation_result_id){
       $array = array('observation_result_id' => $observation_result_id);
       $query = $this->db->select("*")
				->from('observation_result')
				->where($array)
                ->get();      
        return $query;
    }
	
}