<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class class_model extends CI_model{
	
	public function get_class_by_user_id($user_id){
		$array = array('c.class_creator' => $user_id);
        $query = $this->db->select("*")
				->from('class c')
				->join('user u', 'c.class_creator = u.user_id', 'left')
				->join('grade_subject gs', 'c.grade_subject_id = gs.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject s', 's.subject_id = gs.subject_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_mission_by_user_id($user_id){
		$array = array('cmp.participant_id' => $user_id);
        $query = $this->db->select("*")
				->from('class_mission_participants cmp')
				->join('class_mission cm', 'cmp.class_mission_id = cm.class_mission_id', 'left')
				->join('class c', 'cm.class_id = c.class_id', 'left')
				->join('user u', 'c.class_creator = u.user_id', 'left')
				->join('grade_subject gs', 'c.grade_subject_id = gs.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject s', 's.subject_id = gs.subject_id', 'left')
				->join('term t', 't.term_id = c.term_id', 'left')
				->order_by('c.class_id', 'asc')
				->order_by('mission_id', 'asc')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_mission_participants_id_by_class_mission_id_and_participants_id($cmid,$user_id){
		$array = array('cmp.participant_id' => $user_id,'cmp.class_mission_id' => $cmid);
        $query = $this->db->select("*")
				->from('class_mission_participants cmp')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_by_grade_id($id,$now){
		$array = array('g.grade_id' => $id);
        $query = $this->db->select("*")
				->from('class c')
				->join('user u', 'c.class_creator = u.user_id', 'left')
				->join('grade_subject gs', 'c.grade_subject_id = gs.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject s', 's.subject_id = gs.subject_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_by_class_id($id){
		$array = array('c.class_id' => $id);
        $query = $this->db->select("*")
				->from('class c')
				->join('user u', 'c.class_creator = u.user_id', 'left')
				->join('grade_subject gs', 'c.grade_subject_id = gs.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject s', 's.subject_id = gs.subject_id', 'left')
				->join('term t', 't.term_id = c.term_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_strength_capture_by_class_id_user_id($class_id,$id){
		$array = array('csc.class_id' => $class_id,'csc.participant_id' => $id);
        $query = $this->db->select("*")
				->from('class_strength_capture_student csc')
				->join('class c', 'c.class_id = csc.class_id', 'left')
				->join('user u', 'c.class_creator = u.user_id', 'left')
				->join('grade_subject gs', 'c.grade_subject_id = gs.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject s', 's.subject_id = gs.subject_id', 'left')
				->join('term t', 't.term_id = c.term_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_strength_capture_teacher_by_class_id_user_id($class_id,$id){
		$array = array('csc.class_id' => $class_id,'csc.participant_id' => $id);
        $query = $this->db->select("*")
				->from('class_strength_capture_teacher csc')
				->join('class c', 'c.class_id = csc.class_id', 'left')
				->join('user u', 'c.class_creator = u.user_id', 'left')
				->join('grade_subject gs', 'c.grade_subject_id = gs.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject s', 's.subject_id = gs.subject_id', 'left')
				->join('term t', 't.term_id = c.term_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_mission_participants_by_user_id($user_id){
		$array = array('cmp.participant_id'=>$user_id);
        $query = $this->db->select("*")
				->from('class_mission_participants cmp')
				->join('class_mission cm', 'cm.class_mission_id = cmp.class_mission_id', 'left')
				->join('class c', 'c.class_id = cm.class_id', 'left')
				->join('user u', 'c.class_creator = u.user_id', 'left')
				->join('grade_subject gs', 'gs.grade_subject_id = c.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject s', 's.subject_id = gs.subject_id', 'left')
				->join('term t', 't.term_id = c.term_id', 'left')
				->order_by('c.class_id', 'asc')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_mission_participants_by_class_mission_participants_id($id){
		$array = array('cmp.class_mission_participants_id'=>$id);
        $query = $this->db->select("*")
				->from('class_mission_participants cmp')
				->join('class_mission cm', 'cm.class_mission_id = cmp.class_mission_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_mission_participants_by_user_id_term_id($user_id,$grade_subject_id,$term_id){
		$array = array('cmp.participant_id'=>$user_id,'gs.grade_subject_id' => $grade_subject_id,'t.term_id' => $term_id);
        $query = $this->db->select("*")
				->from('class_mission_participants cmp')
				->join('class_mission cm', 'cm.class_mission_id = cmp.class_mission_id', 'left')
				->join('class c', 'c.class_id = cm.class_id', 'left')
				->join('grade_subject gs', 'gs.grade_subject_id = c.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject s', 's.subject_id = gs.subject_id', 'left')
				->join('term t', 't.term_id = c.term_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_mission_participants_by_user_id_class_mission_id($user_id,$class_mission_id){
		$array = array('participant_id'=>$user_id,'class_mission_id' => $class_mission_id);
        $query = $this->db->select("*")
				->from('class_mission_participants')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_government_checklist($id){
		$array = array('cgc.class_id' => $id);
        $query = $this->db->select("*")
				->from('class_government_checklist cgc')
				->join('government_checklist gc', 'cgc.government_checklist_id = gc.government_checklist_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_sdg_indicator($id){
		$array = array('class_id' => $id);
        $query = $this->db->select("*")
				->from('class_sdg_indicator csi')
				->join('sdg_indicator si', 'csi.sdg_indicator_id = si.sdg_indicator_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function insert_class_mission_participants($data) {
        $query = $this->db->insert("class_mission_participants", $data);
        if ($query){
            return true;
        } else {
            return false;
        }
    }
	public function get_class_mission_by_class_id($id){
		$array = array('cm.class_id' => $id);
        $query = $this->db->select("*")
				->from('class_mission cm')
				->order_by('mission_id', 'asc')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_mission_participant_by_class_id_user_id($class_id,$id){
		$array = array('cm.class_id' => $class_id,'cmp.participant_id' => $id);
        $query = $this->db->select("*")
				->from('class_mission_participants cmp')
				->join('class_mission cm', 'cm.class_mission_id = cmp.class_mission_id', 'left')
				->order_by('mission_id', 'asc')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_mission_link($id){
		$array = array('class_mission_id' => $id);
        $query = $this->db->select("*")
				->from('class_mission_link')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_status_task_class_mission_participants($id){
		$array = array('class_mission_participants_id' => $id);
        $query = $this->db->select("*")
				->from('status_task_class_mission_participants_detail')
				->order_by('datetime', 'desc')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_mission_participants($id,$class_mission_id){
		$array = array('participant_id' => $id,'class_mission_id' => $class_mission_id);
        $query = $this->db->select("*")
				->from('class_mission_participants')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function update_class_mission_participants_task($data, $id) {
        $query = $this->db->where('class_mission_participants_id', $id)
                            ->update('class_mission_participants', array('task' => $data['task'],'rating' => $data['rating'])); 
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function insert_status_task_class_mission_participants($data) {
        $query = $this->db->insert("status_task_class_mission_participants_detail", $data);
        if ($query){
            return true;
        } else {
            return false;
        }
    }
	
	public function insert_class_strength_capture($data) {
        $query = $this->db->insert("class_strength_capture_student", $data);
        if ($query){
            return true;
        } else {
            return false;
        }
    }
	
	public function insert_class_strength_capture_teacher($data) {
        $query = $this->db->insert("class_strength_capture_teacher", $data);
        if ($query){
            return true;
        } else {
            return false;
        }
    }
	
	public function update_class_strength_capture($data, $id) {
        $query = $this->db->where('class_strength_capture_student_id', $id)
                            ->update('class_strength_capture_student', array(
							"b_reflection" => $data['b_reflection'],
							"b_rating" => $data['b_rating'],
							"s1_reflection" => $data['s1_reflection'],
							"s1_rating" => $data['s1_rating'],
							"t_reflection" => $data['t_reflection'],
							"t_rating" => $data['t_rating'],
							"e_reflection" => $data['e_reflection'],
							"e_rating" => $data['e_rating'],
							"a_reflection" => $data['a_reflection'],
							"a_rating" => $data['a_rating'],
							"m_reflection" => $data['m_reflection'],
							"m_rating" => $data['m_rating'],
							"s2_reflection" => $data['s2_reflection'],
							"s2_rating" => $data['s2_rating']));
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function update_strength($data, $id) {
        $query = $this->db->where('class_strength_capture_student_id', $id)
                            ->update('class_strength_capture_student', array(
							"s_strength" => $data['s_strength'],
							"s_strength_rating" => $data['s_strength_rating'],
							"t1_strength" => $data['t1_strength'],
							"t1_strength_rating" => $data['t1_strength_rating'],
							"r_strength" => $data['r_strength'],
							"r_strength_rating" => $data['r_strength_rating'],
							"e_strength" => $data['e_strength'],
							"e_strength_rating" => $data['e_strength_rating'],
							"n_strength" => $data['n_strength'],
							"n_strength_rating" => $data['n_strength_rating'],
							"g_strength" => $data['g_strength'],
							"g_strength_rating" => $data['g_strength_rating'],
							"t2_strength" => $data['t2_strength'],
							"t2_strength_rating" => $data['t2_strength_rating'],
							"h_strength" => $data['h_strength'],
							"h_strength_rating" => $data['h_strength_rating']));
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function get_class_strength_capture_by_user_id($user_id){
		$array = array('csc.participant_id'=>$user_id);
        $query = $this->db->select("*")
				->from('class_strength_capture_student csc')
				->join('class c', 'csc.class_id = c.class_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_status_class($id){
		$array = array('class_id' => $id);
        $query = $this->db->select("*")
				->from('status_class_class_detail')
				->order_by('datetime', 'desc')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_status_mission($id){
		$array = array('class_mission_id' => $id);
        $query = $this->db->select("*")
				->from('status_class_mission_detail')
				->order_by('datetime', 'desc')
				->where($array)
                ->get();    
        return $query;
    }

	public function get_class_mission_participants_detail($class_mission_participants_id) {
		$array = array('class_mission_participants_id' => $class_mission_participants_id);
        $query = $this->db->select("*")
				->from('class_mission_participants_detail')
				->where($array)
                ->get();    
        return $query;
	}

	public function upload_task_file($data){
		$participant_id = $data['participant_id'];
		$class_mission_participants_id = $data['class_mission_participants_id'];
		$class_mission_id = $data['class_mission_id'];
		$response = new \stdClass();
		$config['upload_path'] = './assets/uploads/'.$participant_id."/".$class_mission_id;
		$config['allowed_types'] = '*';
		$config['max_size'] = '10240';

		if (!file_exists($config['upload_path'])) {
			mkdir($config['upload_path'], 0775, true);
		} 
		$this->load->helper('date');
		date_default_timezone_set('Asia/Jakarta'); 
		$now = date('Y-m-d H:i:s');
		$config['file_name'] = $_FILES["files"]['name'];

		$this->load->library('upload', $this->config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('files')) {
			$response->message = $this->upload->display_errors('','');
			$response->success = false;
			echo json_encode($response);
			return;
		} else {
			$detail_data = array(
				"class_mission_participants_id" => $class_mission_participants_id,
				"type" => 1,
				"task_content" => ltrim($config['upload_path']."/".$this->upload->data("file_name"), "."),
				"file_name" => $this->upload->data("file_name")
			);
			$query = $this->db->insert("class_mission_participants_detail", $detail_data);
			$response->success = true;
			$response->message = "Success upload!";
			echo json_encode($response);
			return;
		}	
	}
	public function get_class_mission_sdg_indicator($class_mission_id){
        $array = array('cmsi.class_mission_id' => $class_mission_id);
        $query = $this->db->select("*")
				->from('class_mission_sdg_indicator cmsi')
				->join('sdg_indicator si', 'si.sdg_indicator_id = cmsi.sdg_indicator_id')
				->where($array)
                ->get();    
        return $query;
    }

	public function get_count_class_mission_lesson_activities_by_class_mission_id($id){
		$array = array('class_mission_id' => $id);
        $query = $this->db->select("*")
				->from('class_mission_lesson_activities')
				->where($array)
                ->get();    
        return $query;
    }
}