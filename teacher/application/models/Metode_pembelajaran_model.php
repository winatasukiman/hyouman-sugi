<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metode_pembelajaran_model extends CI_model{
	
	public function get_metode_pembelajaran(){
        $query = $this->db->select("*")
				->from('metode_pembelajaran')
                ->get();    
        return $query;
    }
	
	public function get_metode_pembelajaran_by_id($id){
       $array = array('metode_pembelajaran_id' => $id);
       $query = $this->db->select("*")
				->from('metode_pembelajaran')
				->where($array)
                ->get();      
        return $query;
    }
	
}