<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_model{
	
	public function check_phone_number_2($ccd,$phone_number) {
		$array = array('country_code' => $ccd,'phone_number' => $phone_number,'user_type_id' => 2);
		return $this->db->select('*')
                ->from('user')
                ->where($array)
                ->get();
	}
	
	public function check_email_2($email) {
		$array = array('email' => $email,'user_type_id' => 2);
		return $this->db->select('*')
                ->from('user')
                ->where($array)
                ->get();
	}
	
	public function check_phone_number_3($ccd,$phone_number) {
		$array = array('country_code' => $ccd,'phone_number' => $phone_number,'user_type_id' => 3);
		return $this->db->select('*')
                ->from('user')
                ->where($array)
                ->get();
	}
	
	public function check_email_3($email) {
		$array = array('email' => $email,'user_type_id' => 3);
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
	
	public function insert_user_payment ($data) {
        $query = $this->db->insert("user_payment", $data);
        if ($query){
            return true;
        } else {
            return false;
        }
    }
	
	public function get_term(){
        $query = $this->db->select("*")
				->from('term')
                ->get();    
        return $query;
    }
	
	public function get_user(){
        $query = $this->db->select("*")
				->from('user')
                ->get();    
        return $query;
    }
	
	public function login($email, $pass) {
        $where_array = array('email'=> $email, 'password'=> $pass);
        $query = $this->db->select('*')
                    ->from('user')
                    ->where_in("user_type_id", array(2,3))
                    ->where($where_array)
                    ->get();
        return $query->row_array();
    }
	
	public function get_user_type() {
		return $this->db->select('*')
                ->from('user_type')
                ->get();
	}

    public function find_user_by_email ($email) {
        $query = $this->db->select('user_id, email, full_name')
                    ->from('user')
                    ->where('email', $email)
                    ->where('(user_type_id=2 or user_type_id=3)')
                    ->get();
        return $query->row_array();
    }
}