<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_model{
	
	public function check_phone_number($ccd,$phone_number) {
		$array = array('country_code' => $ccd,'phone_number' => $phone_number,'user_type_id' => 1);
		return $this->db->select('*')
                ->from('user')
                ->where($array)
                ->get();
	}
	
	public function check_email($email) {
		$array = array('email' => $email,'user_type_id' => 1);
		return $this->db->select('*')
                ->from('user')
                ->where($array)
                ->get();
	}

    public function insert_user ($data) {
        $query = $this->db->insert("user", $data);
        if ($query){
            return true;
        } else {
            return false;
        }
    }
	
	
	public function login($email, $pass) {
        $where_array = array('email'=> $email, 'password'=> $pass, 'user_type_id'=> 1);
        $query = $this->db->select('*')
                    ->from('user')
                    ->where($where_array)
                    ->get();
        return $query->row_array();
    }

    public function find_user_by_email ($email) {
        $query = $this->db->select('user_id, email,full_name')
                    ->from('user')
                    ->where('email', $email)
                    ->where('user_type_id', 1)
                    ->get();
        return $query->row_array();
    }
}