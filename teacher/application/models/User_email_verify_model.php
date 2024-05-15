<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_email_verify_model extends CI_model{
    public function get_token($user_id) {
        $query = $this->db->select("*")
                            ->from('user_email_verify')
                            ->where('user_id', $user_id)
                            ->where('is_valid', 1)
                            ->get();
        return $query;
    }
    public function insert($data) {
        $user_id["user_id"] = $data['user_id'];
        $this->deactivate_unique_code_by_user_id($user_id);
        return $query = $this->db->insert("user_email_verify", $data);
    }
    public function deactivate_unique_code_by_user_id($user_id) {
        $data = array(
            'is_valid' => 0,
            'unique_code' => '' //scrap the used token
        );
        return $this->db->update("user_email_verify",$data ,$user_id);
    }
    public function check_unique_code($user_id, $unique_code) {
        $query = $this->db->select("*")
                            ->from('user_email_verify')
                            ->where('unique_code', $unique_code)
                            ->where('user_id', $user_id)
                            ->where('is_valid', 1)
                            ->get();
        if ($query->num_rows() > 0 ) {
            $id["user_id"] = $user_id;
            $data = array(
                'is_verified' => 1,
            );
            $this->load->model('user_model', 'user_model');
            $result = $this->user_model->update_user_data($data, $id);
            $this->deactivate_unique_code_by_user_id($id);
            return 1;
        } else {
            return 0;
        }
    }
}