<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Academy_year_model extends CI_model{

    public function get_academy_year(){
        $array = array('is_active' => 1);
        $query = $this->db->select("*")
				->from('academy_year')
                ->where($array)
                ->get();
        return $query;
    }
	
}