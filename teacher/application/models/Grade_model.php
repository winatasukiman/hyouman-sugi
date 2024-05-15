<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grade_model extends CI_model{

    public function get_grade(){
        $query = $this->db->select("*")
				->from('grade')
                ->where('status', 1)
                ->get();
        return $query;
    }
	
}