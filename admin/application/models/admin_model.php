<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_model{
	
	public function get_user(){
		$array = array('user_type_id' => 3);
        $query = $this->db->select("user_id,full_name,nisn")
				->from('user')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_user_by_user_id($user_id){
		$array = array('user_id' => $user_id);
        $query = $this->db->select("email,full_name")
				->from('user')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_user_payment($user_id){
		$array = array('user_id' => $user_id);
        $query = $this->db->select("*")
				->from('user_payment')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_all_user_payment(){
        $query = $this->db->select("*")
				->from('user_payment up')
				->join('user u', 'u.user_id = up.user_id', 'left')
				->join('term t', 't.term_id = up.term_id', 'left')
                ->get();    
        return $query;
    }
	
	public function get_user_payment_by_user_payment_id($user_payment_id){
		$array = array('user_payment_id' => $user_payment_id);
        $query = $this->db->select("*")
				->from('user_payment')
				->where($array)
                ->get();    
        return $query;
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
	
	public function update_nisn($data) {
        $query = $this->db->where('user_id', $data['user_id'])
                            ->update('user', array(
							'nisn' => $data['nisn'])); 
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function update_user_payment_1($data) {
        $query = $this->db->where('user_payment_id', $data['user_payment_id'])
                            ->update('user_payment', array(
							'user_id_check_1' => $data['user_id_check_1'],
							'datetime_check_1' => $data['datetime_check_1'])); 
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function update_user_payment_2($data) {
        $query = $this->db->where('user_payment_id', $data['user_payment_id'])
                            ->update('user_payment', array(
							'user_id_check_2' => $data['user_id_check_2'],
							'datetime_check_2' => $data['datetime_check_2'], 
							'status_payment_id' => 1)); 
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    public function join_class_after_register($user_id){
		$id = $user_id;
		$sql = $this->user_model->get_user($id);
		if ($sql->num_rows() > 0) {
			$user_detail = $sql->first_row();
		}
		$user_detail->grade_id = $this->user_model->get_grade_user($id)->first_row()->grade_id;
		date_default_timezone_set('Asia/Jakarta'); 
		$now = date('Y-m-d H:i:s');
		$sql2 = $this->class_model->get_class_by_grade_id($user_detail->grade_id,$now);
		$all_class = "";
		if ($sql2->num_rows() > 0) {
			$all_class = $sql2->result();
			foreach($all_class as $ac){
				$class_status = $this->class_model->get_class_status($ac->class_id);
				if(isset($class_status)) {
					continue;
				}
				$class_mission = NULL;
				$sql4 = $this->class_model->get_class_mission_by_class_id($ac->class_id);
				if ($sql4->num_rows() > 0) {
					$class_mission = $sql4->result();
					foreach($class_mission as $res) {
						$sql5 = $this->class_model->get_class_mission_participants_by_user_id_class_mission_id($id,$res->class_mission_id);
						if ($sql5->num_rows() > 0) {
							//echo "Already Join This Class";
						}else{
							$class_mission = NULL;
							$sql4 = $this->class_model->get_class_mission_by_class_id($ac->class_id);
							if ($sql4->num_rows() > 0) {
								$class_mission = $sql4->result();
							}
							if($class_mission !=null){
								foreach($class_mission as $res) {
									$data = array(
										'class_mission_id' => $res->class_mission_id,
										'participant_id' => $id
									);
									$this->class_model->insert_class_mission_participants($data);
								}
							}
							//insert user points history
							date_default_timezone_set('Asia/Jakarta'); 
							$now = date('Y-m-d H:i:s');
							$data = array(
								"user_id" => $id,
								"remark" => "Join Class",
								"class_id" => $ac->class_id,
								"points" =>  $ac->class_points,
								"datetime" => $now
							);
							$this->user_model->insert_user_points_history($data);
							$data = array(
								"class_id" => $ac->class_id,
								"participant_id" => $id
							);
							$this->class_model->insert_class_strength_capture($data);
							$this->class_model->insert_class_strength_capture_teacher($data);
							//echo "success buy class";
							//return;
						}
					}
				}
			}
		}
	}
}