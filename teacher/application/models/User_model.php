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
	public function get_user_subject($id) {
        $query = $this->db->select("*")
				->from('teacher_specialty ts')
				->join('grade_subject gs', 'ts.grade_subject_id = gs.grade_subject_id', 'left')
				->join('grade g', 'gs.grade_id = g.grade_id', 'left')
				->join('subject_parent_detail spd', 'spd.subject_parent_detail_id = gs.subject_parent_detail_id', 'left')
				->join('subject s', 's.subject_id = spd.subject_id', 'left')
                ->join('subject_parent sp', 'sp.subject_parent_id = spd.subject_parent_id', 'left')
				->order_by('g.grade_id','asc')
				->where('ts.user_id', $id)
                ->get();    
        return $query;
    }
	public function get_user_subject_with_order_by($id) {
        $query = $this->db->select("*")
				->from('teacher_specialty ts')
				->join('grade_subject gs', 'ts.grade_subject_id = gs.grade_subject_id', 'left')
				->join('grade g', 'gs.grade_id = g.grade_id', 'left')
				->join('subject_parent_detail spd', 'spd.subject_parent_detail_id = gs.subject_parent_detail_id', 'left')
				->join('subject s', 's.subject_id = spd.subject_id', 'left')
				->join('subject_parent sp', 'sp.subject_parent_id = spd.subject_parent_id', 'left')
				->where('ts.user_id', $id)
				->order_by('g.grade_id','asc')
                ->get();
		$grade_teacher = array();
		if ($query->num_rows() > 0) {
			$temp = 0;
			foreach($query->result() as $q){
				if($temp != $q->grade_id){
					$grade_teacher[] =$q->grade_id;
				}$temp = $q->grade_id;
			}
		}
        return $grade_teacher;
    }
	
	public function get_student_by_grade_id($grade_id) {
		$array = array('user_type_id' => 3);
        $sql = $this->db->select("*")
				->from('user')
				->where($array)
                ->get();
		$student = array();
		if ($sql->num_rows() > 0) {
			foreach($sql->result() as $u){
				$sql = $this->get_grade_user($u->user_id);
				if ($sql->num_rows() > 0) {
					$grade_user = $sql->first_row()->grade_id;
					if($grade_id == $grade_user){
						$student[] = $sql->first_row()->user_id;
					}
				}
			}
		}
        return $student;
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
}