<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curicullum_model extends CI_model{

    public function get_curicullum(){
        $query = $this->db->select("*")
				->from('curicullum')
                ->get();
        return $query;
    }
	
}