<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Semester_model extends CI_model{
	
	public function get_semester(){
        $query = $this->db->select("*")
				->from('semester')
                ->get();    
        return $query;
    }
}