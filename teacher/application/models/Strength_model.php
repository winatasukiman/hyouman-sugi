<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Strength_model extends CI_model{
	
	public function insert_strength_student($data) {
        $query = $this->db->insert("strength_student", $data);
		$insert_id = $this->db->insert_id();
        if ($query) {
			$strength_capture = new stdClass();
			$sql = $this->get_strength_capture();
			if ($sql->num_rows() > 0) {
				$strength_capture = $sql->result();
				foreach($strength_capture as $sc){
					$data = array(
						'strength_student_id' => $insert_id,
						'strength_capture_id' => $sc->strength_capture_id
					);
					$this->insert_strength_student_detail($data);
				}
			}
            return $insert_id;
        } else {
            return false;
        }
    }
	
	public function insert_strength_student_file($data) {
        $query = $this->db->insert("strength_student_file", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function get_strength_capture(){
        $query = $this->db->select("*")
				->from('strength_capture')
                ->get();
        return $query;
    }
	
	public function insert_strength_student_detail($data) {
        $query = $this->db->insert("strength_student_detail", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function get_strength_student_by_user_id($user_id){
		$strength_student = new stdClass();
		$array = array('user_id' => $user_id);
        $sql = $this->db->select("*")
				->from('strength_student')
				->where($array)
                ->get();
		if($sql->num_rows() > 0){
			$strength_student = $sql->result();
			$this->load->model('user_model');
			foreach($strength_student as $ss){
				$ss->strength_student_file = $this->get_strength_student_file_by_strength_student_id($ss->strength_student_id)->result();
				$ss->student_name = "";
				$sql = $this->user_model->get_user($user_id);
				if ($sql->num_rows() > 0) {
					$student = $sql->first_row();
					$ss->student_name = $student->full_name;
				}
			}
			return $strength_student;
		}
        return null;
    }
	
	public function get_strength_student_file_by_strength_student_id($strength_student_id){
		$array = array('strength_student_id' => $strength_student_id);
        $query = $this->db->select("*")
				->from('strength_student_file')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_strength_student_by_strength_student_id($strength_student_id){
		$strength_student = new stdClass();
		$array = array('strength_student_id' => $strength_student_id);
        $sql = $this->db->select("*")
				->from('strength_student')
				->where($array)
                ->get();
		if($sql->num_rows() > 0){
			$strength_student = $sql->first_row();
			$datetime = $this->change_datetime_format_from_db($strength_student->date);
			$params = explode(" - ", $datetime);
			$new_date = $params[0];
			$new_time = $params[1];

			$strength_student->new_date = $new_date;
			$strength_student->new_time = $new_time;
			$strength_student->strength_student_detail = $this->get_strength_student_detail_by_strength_student_id($strength_student->strength_student_id)->result();
			foreach($strength_student->strength_student_detail as $ss){
				$strength_student->strength_student_detail_file = $this->get_strength_student_detail_file_by_strength_student_detail_id($ss->strength_student_detail_id)->result();
			}
			return $strength_student;
		}
        return null;
    }
	
	public function get_strength_student_detail_by_strength_student_id($strength_student_id){
		$array = array('strength_student_id' => $strength_student_id);
        $query = $this->db->select("*")
				->from('strength_student_detail')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_strength_student_detail_file_by_strength_student_detail_id($strength_student_detail_id){
		$array = array('strength_student_detail_id' => $strength_student_detail_id);
        $query = $this->db->select("*")
				->from('strength_student_detail_file')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_strength_student_detail($user_id,$strength_student_id){
		 $this->load->model('observation_result_model');
		$array = array('ss.strength_student_id' => $strength_student_id);
		$strength_student = new stdClass();
        $sql = $this->db->select("*")
				->from('strength_student_detail ss')
				->join('strength_capture sc', 'sc.strength_capture_id = ss.strength_capture_id')
				->where($array)
                ->get();
		if($sql->num_rows() > 0){
			$strength_student = $sql->result();
			//$ss->strength_student_detail_file = new stdClass();
			
			foreach($strength_student as $ss){
				$ss->strength_student_detail_name = null;
				if($ss->strength_capture_detail_id != NULL){
					$ss->strength_student_detail_name = $this->get_strength_capture_detail_by_strength_capture_detail_id($ss->strength_capture_detail_id)->first_row()->strength_capture_detail_name;
				}
				$ss->observation_result_name = null;
				if($ss->observation_result_id != NULL){
					$ss->observation_result_name = $this->observation_result_model->get_observation_result_by_id($ss->observation_result_id)->first_row()->observation_result_name;
				}
				$ss->strength_capture_detail = $this->get_strength_capture_detail_by_strength_capture_id($ss->strength_capture_id)->result();
				$ss->strength_student_detail_file = $this->get_strength_student_detail_file_by_strength_capture_detail_id($ss->strength_student_detail_id)->result();
				$ss->strength_student_detail_review = $this->get_strength_student_detail_review_by_strength_student_detail_id($user_id,$ss->strength_student_detail_id)->result();
				foreach($ss->strength_student_detail_review as $ssdr){
					$ssdr->strength_student_detail_review_file = $this->get_strength_student_detail_review_file_by_strength_student_detail_review_id($ssdr->strength_student_detail_review_id)->result();
				}
			}
			return $strength_student;
		}
        return null;
    }
	
	public function get_strength_capture_by_strength_capture_id($strength_capture_id){
		$array = array('strength_capture_id' => $strength_capture_id);
        $query = $this->db->select("*")
				->from('strength_capture')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_strength_student_detail_review_by_strength_student_detail_id($user_id,$strength_student_detail_id){
		$array = array('ssdr.user_id' => $user_id,'ssdr.strength_student_detail_id' => $strength_student_detail_id);
        $query = $this->db->select("*")
				->from('strength_student_detail_review ssdr')
				->join('strength_capture_detail scd', 'scd.strength_capture_detail_id = ssdr.strength_capture_detail_id')
				->join('observation_result or', 'or.observation_result_id = ssdr.observation_result_id')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_strength_student_detail_review_file_by_strength_student_detail_review_id($strength_student_detail_review_id){
		$array = array('strength_student_detail_review_id' => $strength_student_detail_review_id);
        $query = $this->db->select("*")
				->from('strength_student_detail_review_file')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_strength_capture_detail_by_strength_capture_detail_id($strength_capture_detail_id){
		$array = array('strength_capture_detail_id' => $strength_capture_detail_id);
        $query = $this->db->select("*")
				->from('strength_capture_detail')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_strength_capture_detail_by_strength_capture_id($strength_capture_id){
		$array = array('strength_capture_id' => $strength_capture_id);
        $query = $this->db->select("*")
				->from('strength_capture_detail')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_strength_student_detail_file_by_strength_capture_detail_id($strength_student_detail_id){
		$array = array('strength_student_detail_id' => $strength_student_detail_id);
        $query = $this->db->select("*")
				->from('strength_student_detail_file')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function update_strength_student_detail($data, $id) {
       $query = $this->db->where('strength_student_detail_id', $id)
							->update('strength_student_detail', $data); 
		if ($query) {
			return true;
		} else {
			return false;
		}
    }
	
	public function insert_strength_student_detail_file($data) {
        $query = $this->db->insert("strength_student_detail_file", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function delete_strength_student_detail_file_by_strength_student_detail_id($strength_student_detail_id) {
        $sql = $this->get_strength_student_detail_file_by_strength_student_detail_id($strength_student_detail_id);
		if($sql->num_rows() > 0){
			$this->db->where('strength_student_detail_id', $strength_student_detail_id)
						->delete('strength_student_detail_file');
		}
    }
	
	public function get_strength_student_detail_review_by_user_id_strength_student_detail_id($uid,$ssdid) {
		$array = array('user_id' => $uid,'strength_student_detail_id' => $ssdid);
        $query = $this->db->select("*")
				->from('strength_student_detail_review')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function insert_strength_student_detail_review($data) {
		$sql = $this->get_strength_student_detail_review_by_user_id_strength_student_detail_id($data['user_id'],$data['strength_student_detail_id']);
		if($sql->num_rows() > 0){
			$this->db->where('strength_student_detail_review_id', $sql->first_row()->strength_student_detail_review_id)
						->delete('strength_student_detail_review');
			$this->db->where('strength_student_detail_review_id', $sql->first_row()->strength_student_detail_review_id)
						->delete('strength_student_detail_review_file');
		}
		
        $query = $this->db->insert("strength_student_detail_review", $data);
        $insert_id = $this->db->insert_id();
        if ($query) {
            return $insert_id;
        }  else {
            return false;
        }
    }
	
	public function insert_strength_student_detail_review_file($data) {
        $query = $this->db->insert("strength_student_detail_review_file", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function change_datetime_format_from_db($datetime) {
        // $new_Date = substr_replace($datetime,"",10);
        $new_Date = date("j F Y - H:i", strtotime($datetime)); //20 February 2020
        return $new_Date;
    }
	
	public function get_strength_capture_detail(){
		$sql = $this->db->select("*")
				->from('strength_capture_detail scd')
				->join('strength_capture sc', 'sc.strength_capture_id = scd.strength_capture_id')
				->get();
        return $sql;
    }
	
}