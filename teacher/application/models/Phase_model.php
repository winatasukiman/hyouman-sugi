<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phase_model extends CI_model{
	
	public function get_phase(){
        $query = $this->db->select("*")
				->from('phase')
                ->get();    
        return $query;
    }
	
	public function get_phase_by_id($id){
       $array = array('phase_id' => $id);
       $query = $this->db->select("*")
				->from('phase')
				->where($array)
                ->get();      
        return $query;
    }
	
}