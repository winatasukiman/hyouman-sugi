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
	public function get_children($id) {
        $query = $this->db->select("*")
				->from('parent_child pc')
				->join('user u', 'u.user_id = pc.child_id', 'left')
				->where('pc.parent_id', $id)
                ->get();    
        return $query;
    }
	public function get_institution() {
        $query = $this->db->select("*")
				->from('institution')
                ->get();    
        return $query;
    }
	public function get_grade() {
        $query = $this->db->select("*")
				->from('grade')
                ->get();    
        return $query;
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
	public function update_user_data($data, $id) {
        $query = $this->db->update("user", $data, $id);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function insert_user_grade($data) {
		$query = $this->db->insert("user_grade_detail", $data);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
	
	public function update_user_password_data($data, $id) {
        $query = $this->db->where('user_id', $id)
                            ->update('user', $data); 
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function insert_parent_child($data) {
		$query = $this->db->insert("parent_child", $data);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}
	
	public function insert_parent_child_activity($data) {
        $query = $this->db->insert("parent_child_activity", $data);
		if ($query) {
			return true;
		} else {
			return false;
		}
    }
	
	public function is_child_has_in_parent($child_id, $parent_id) {
		$array = array('child_id' => $child_id,'parent_id' => $parent_id);
		return $this->db->select("*")
						->from('parent_child')
						->where($array)
						->get()
						->num_rows() > 0;
	}
	
	public function get_parent_by_child_id($user_id){
		$array = array('child_id' => $user_id);
        $query = $this->db->select("*")
				->from('parent_child pc')
				->join('user u', 'u.user_id = pc.parent_id', 'left')
				->where($array)
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
	
	public function update_user_points($data, $id) {
        $query = $this->db->where('user_id', $id)
                            ->update('user', array('user_points' => $data['points'])); 
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function check_phone_number_edit_profile_2($ccd,$phone_number,$user_id) {
		$array = array('country_code' => $ccd,'phone_number' => $phone_number,'user_type_id' => 2,'user_id !=' =>$user_id);
		return $this->db->select('*')
                ->from('user')
                ->where($array)
                ->get();
	}
	
	public function check_phone_number_edit_profile_3($ccd,$phone_number,$user_id) {
		$array = array('country_code' => $ccd,'phone_number' => $phone_number,'user_type_id' => 3,'user_id !=' =>$user_id);
		return $this->db->select('*')
                ->from('user')
                ->where($array)
                ->get();
	}
	
	public function check_email_edit_profile_2($email,$user_id) {
		$array = array('email' => $email,'user_type_id' => 2,'user_id !=' =>$user_id);
		return $this->db->select('*')
                ->from('user')
                ->where($array)
                ->get();
	}
	
	public function check_email_edit_profile_3($email,$user_id) {
		$array = array('email' => $email,'user_type_id' => 3,'user_id !=' =>$user_id);
		return $this->db->select('*')
                ->from('user')
                ->where($array)
                ->get();
	}
	
	public function get_user_history($user_id) {
		$array = array('uph.user_id' => $user_id);
		return $this->db->select('*')
                ->from('user_points_history uph')
				->join('class c', 'c.class_id = uph.class_id', 'left')
				->join('term t', 't.term_id = c.term_id', 'left')
				->join('user u', 'c.class_creator = u.user_id', 'left')
				->join('grade_subject gs', 'c.grade_subject_id = gs.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject s', 's.subject_id = gs.subject_id', 'left')
                ->where($array)
                ->get();
	}
	
	public function get_user_history_all() {
		return $this->db->select('*')
                ->from('user_points_history uph')
				->join('class c', 'c.class_id = uph.class_id', 'left')
				->join('term t', 't.term_id = c.term_id', 'left')
				->join('grade_subject gs', 'c.grade_subject_id = gs.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject s', 's.subject_id = gs.subject_id', 'left')
                ->get();
	}

}