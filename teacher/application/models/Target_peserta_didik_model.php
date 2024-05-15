<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Target_peserta_didik_model extends CI_model{
	
	public function get_target_peserta_didik(){
        $query = $this->db->select("*")
				->from('target_peserta_didik')
                ->get();    
        return $query;
    }
	
	public function get_target_peserta_didik_by_id($id){
       $array = array('target_peserta_didik_id' => $id);
       $query = $this->db->select("*")
				->from('target_peserta_didik')
				->where($array)
                ->get();      
        return $query;
    }
	
}