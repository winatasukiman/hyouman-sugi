<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_pembelajaran_pancasila_model extends CI_model{
	
	public function get_profil_pembelajaran_pancasila(){
        $query = $this->db->select("*")
				->from('profil_pembelajaran_pancasila')
                ->get();    
        return $query;
    }
	
	public function get_profil_pembelajaran_pancasila_by_id($id){
       $array = array('profil_pembelajaran_pancasila_id' => $id);
       $query = $this->db->select("*")
				->from('profil_pembelajaran_pancasila')
				->where($array)
                ->get();      
        return $query;
    }
}