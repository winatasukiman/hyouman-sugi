<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_password_reset_model extends CI_model{
    public function insert($data) {
        $user_id["user_id"] = $data['user_id'];
        $this->deactivate_unique_code_by_user_id($user_id);
        return $query = $this->db->insert("user_password_reset", $data);
    }
    public function deactivate_unique_code_by_user_id($user_id) {
        $data = array(
            'is_valid' => 0,
            'unique_code' => '' //scrap the used token
        );
        $result = $this->db->update("user_password_reset",$data ,$user_id);
        return $result;
    }
    public function check_unique_code($unique_code) {
        date_default_timezone_set('Asia/Jakarta'); 
		$now = date('Y-m-d H:i:s');
        $query = $this->db->select("*")
                            ->from('user_password_reset')
                            ->where('unique_code', $unique_code)
                            ->where('is_valid', 1)
                            ->where('expired_at >= ', $now)
                            ->get();
        if ($query->num_rows() > 0 ) {  
            return 1;
        } else {
            return 0;
        }
    }
    public function get_user_id_by_unique_code($unique_code) {
        $query = $this->db->select("unique_code, user_id")
                            ->from('user_password_reset')
                            ->where('unique_code', $unique_code)
                            ->get();
        $data = $query->first_row();
        return $data->user_id;
    }
}