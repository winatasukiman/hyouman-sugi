<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Term_model extends CI_model{

    public function get_term(){
        $query = $this->db->select("*")
				->from('term')
                ->where('status', 1)
                ->get();
        return $query;
    }
	
}