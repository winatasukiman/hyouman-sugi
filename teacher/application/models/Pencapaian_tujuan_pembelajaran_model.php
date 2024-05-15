<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencapaian_tujuan_pembelajaran_model extends CI_model{
	
	public function get_pencapaian_tujuan_pembelajaran(){
        $query = $this->db->select("*")
				->from('pencapaian_tujuan_pembelajaran')
                ->get();    
        return $query;
    }
	
	public function get_pencapaian_tujuan_pembelajaran_by_id($id){
       $array = array('pencapaian_tujuan_pembelajaran_id' => $id);
       $query = $this->db->select("*")
				->from('pencapaian_tujuan_pembelajaran')
				->where($array)
                ->get();      
        return $query;
    }
}