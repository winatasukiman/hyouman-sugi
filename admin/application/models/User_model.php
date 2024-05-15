<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_model{

    public function get_user($id) {
        $query = $this->db->select("*")
				->from('user u')
				->join('institution i', 'i.institution_id =  u.institution_id', 'left')
				->where('u.user_id', $id)
                ->get();    
        return $query;
    }
    public function get_student($email) {
        $query = $this->db->select("user_id")
            ->from('user')
            ->where('email', $email)
            ->where('user_type_id', 3)
            ->get();    
        return $query;  
    }
	public function get_user_subject($id) {
        $query = $this->db->select("*")
				->from('teacher_specialty ts')
				->join('grade_subject gs', 'ts.grade_subject_id = gs.grade_subject_id', 'left')
				->join('grade g', 'gs.grade_id = g.grade_id', 'left')
				->join('subject s', 'gs.subject_id = s.subject_id', 'left')
				->where('ts.user_id', $id)
                ->get();    
        return $query;
    }
	public function get_institution() {
        $query = $this->db->select("*")
				->from('institution')
                ->get();    
        return $query;
    }
	public function update_user_data($data, $id) {
        $query = $this->db->update("user", $data, $id);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	public function update_user_password_data($data, $id) {
        $query = $this->db->where('user_id', $id)
                            ->update('user', array('password' => $data['password'])); 
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function check_phone_number_edit_profile($ccd,$phone_number,$user_id) {
		$array = array('country_code' => $ccd,'phone_number' => $phone_number,'user_type_id' => 1,'user_id !=' =>$user_id);
		return $this->db->select('*')
                ->from('user')
                ->where($array)
                ->get();
	}
	
	public function check_email_edit_profile($email, $user_id) {
		$array = array('email' => $email,'user_type_id' => 1,'user_id !=' => $user_id);
		$result = $this->db->select('*')
                ->from('user')
                ->where($array)
                ->get();
		return $result;
	}

    public function insert_student_batch($data) {
        $this->load->model('register_model');
        $this->load->model('admin_model');
        $student_ids = array();
        date_default_timezone_set('Asia/Jakarta'); 
		$now = date('Y-m-d H:i:s');
        foreach($data as $student) {
            # Insert into user
            $check_email_3 = $this->register_model->check_email_3($student['email']);
            if(!$check_email_3->num_rows() > 0) {
                $userid = mt_rand(100000, 999999);
                $qry_data = array(
                    'user_id' => $userid,
                    "user_type_id"=>3,
                    "password"=>md5(123456),
                    "email"=>$student['email'],
                    "gender"=>$student['gender'],
                    "is_verified"=>0,
                    "full_name"=>$student['full_name'],
                    "is_change_password"=>1,
                    'user_points' => "1000",
                    'date_of_birth' => "1990-01-01",
                    'datetime' => $now,
                );
                $query = $this->db->insert("user", $qry_data);
                $user_id = $this->db->insert_id();
                $student_ids[] = $user_id;
                # Insert student's grade
                $qry_data = array(
                    'user_id' => $userid,
                    "grade_id"=>$student['grade'],
                    'datetime' => $now,
                    'is_active' => 1,
                );
                $query = $this->db->insert("user_grade_detail", $qry_data);
                $this->admin_model->join_class_after_register($user_id);
            } else { // Update user data
                $user_id = $this->get_student($student['email'])->first_row()->user_id;
                $qry_data = array(
                    "password"=>md5(123456),
                    "email"=>$student['email'],
                    "gender"=>$student['gender'],
                    "is_verified"=>0,
                    "full_name"=>$student['full_name'],
                    "is_change_password"=>1,
                    'datetime' => $now,
                );
                $query = $this->db->where('user_id', $user_id)
                            ->update('user', $qry_data); 
            }
        }
        return $student_ids;
    }
	
	public function get_grade_user($id) {
        $query = $this->db->select("*")
				->from('user_grade_detail ug')
				->join('grade g', 'ug.grade_id = g.grade_id', 'left')
				->order_by('datetime','desc')
				->where('ug.user_id', $id)
                ->get();    
        return $query;
    }
	
	public function insert_user_points_history($data) {
        $query = $this->db->insert("user_points_history", $data);
        if ($query){
            return true;
        } else {
            return false;
        }
    }
}