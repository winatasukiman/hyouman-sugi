<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller {

    public function __construct() {
        parent ::__construct();
        $this->check_isvalidated();

        //load model
        $this->load->model('class_model');
        $this->load->model('strength_model');
        $this->load->model('subject_model');
        $this->load->model('Bank_of_competencies_model');
		$this->load->model('learning_objectives_model');
        $this->load->model('user_model');
		$this->load->helper('email');
		$this->load->library('parser');
    }

    private function check_isvalidated(){
        if(! $this->session->userdata('logged_in')){
            //redirect('login/');
        }
    }
	
	public function index() {//my class
        $id = $this->session->userdata('user_id');
		$sql = $this->class_model->get_class_mission_participants_by_user_id($this->session->userdata('user_id'));
		$class = "";
		if ($sql->num_rows() > 0) {
			$class = $sql->result();
			//status class
			for($i=0;$i<count($class);$i++){
				$sql = $this->class_model->get_status_class($class[$i]->class_id);
				if ($sql->num_rows() > 0) {
					$status = $sql->first_row();
					$class[$i]->status = $status->status_class_id;
				}else{
					$class[$i]->status = 0;
				}
				if($class[$i]->status == 3){
					unset($class[$i]);
				}
			}
			$class = array_values($class);
		}
		//var_dump(json_encode($class));return;
		$grade_user = null;
		$grade_name_user = null;
		$sql = $this->user_model->get_grade_user($this->session->userdata('user_id'));
		if ($sql->num_rows() > 0) {
			$grade_user = $sql->first_row()->grade_id;
			$grade_name_user = $sql->first_row()->grade_name;
		}
		date_default_timezone_set('Asia/Jakarta'); 
		$now = date('Y-m-d H:i:s');
		$sql2 = $this->class_model->get_class_by_grade_id($grade_user,$now);
		$all_class = "";
		if ($sql2->num_rows() > 0) {
			$all_class = $sql2->result();
			foreach($all_class as $ac){
				$sql6 = $this->class_model->get_status_class($ac->class_id);
				if ($sql6->num_rows() > 0) {
					$status = $sql6->first_row();
					$ac->status = $status->status_class_id;
				}else{
					$ac->status = 0;
				}
			}
		}
		
		
		$sql = $this->class_model->get_class_mission_by_user_id($this->session->userdata('user_id'));
		$class_mission = "";
		$new_class_mission = array();
		if ($sql->num_rows() > 0) {
			$class_mission = $sql->result();
		}
		if(!empty ($class_mission)){
			for($i=0;$i<count($class_mission);$i++){
				$sql = $this->class_model->get_status_mission($class_mission[$i]->class_mission_id);
				if ($sql->num_rows() > 0) {
					$class_mission[$i]->status_mission = $sql->first_row()->status_mission_id;
				}else{
					$class_mission[$i]->status_mission = 0;
				}
			}
			for($i=0;$i<count($class_mission);$i++){
				if($class_mission[$i]->status_mission != 0){
					$new_class_mission[] = $class_mission[$i];
				}
			}
		}
		
		$strength_student = new stdClass();
		$strength_student = $this->strength_model->get_strength_student_by_user_id($id);
		$data = array(
			"class" => $class,
			"all_class" => $all_class,
			"class_mission" => $new_class_mission,
			"grade_name_user" => $grade_name_user,
			"strength_student" => $strength_student
        );
		
		// Change date format
		if($data['class_mission']!=null){
			for($i=0;$i<count($data['class_mission']);$i++){
				//Publish date time
				$data['class_mission'][$i]->publish_date = "";
				$data['class_mission'][$i]->publish_time = "";
				if($data['class_mission'][$i]->publish_datetime != "0000-00-00 00:00:00"){
					$datetime = $this->change_datetime_format_from_db($data['class_mission'][$i]->publish_datetime);
					$params = explode(" - ", $datetime);
					$new_date = $params[0];
					$new_time = $params[1];

					$data['class_mission'][$i]->publish_date = $new_date;
					$data['class_mission'][$i]->publish_time = $new_time;
				}
				
				//Deadline date time
				$data['class_mission'][$i]->deadline_date = "";
				$data['class_mission'][$i]->deadline_time = "";
				if($data['class_mission'][$i]->deadline_datetime != "0000-00-00 00:00:00"){
					$datetime = $this->change_datetime_format_from_db($data['class_mission'][$i]->deadline_datetime);
					$params = explode(" - ", $datetime);
					$new_date = $params[0];
					$new_time = $params[1];

					$data['class_mission'][$i]->deadline_date = $new_date;
					$data['class_mission'][$i]->deadline_time = $new_time;
				}
				
				//Get class attendance date time
				$cmp = array();
				$data['class_mission'][$i]->attendance_date = "";
				$data['class_mission'][$i]->attendance_time = "";
				$sql1 = $this->class_model->get_class_mission_participant_by_class_id_user_id($data['class_mission'][$i]->class_id,$this->session->userdata("user_id"));
				if ($sql1->num_rows() > 0) {
					$cmp = $sql1->result();
					foreach($cmp as $c){
						if($c->attendance_datetime != "0000-00-00 00:00:00"){
							$datetime = $this->change_datetime_format_from_db($c->attendance_datetime);
							$params = explode(" - ", $datetime);
							$new_date = $params[0];
							$new_time = $params[1];

							$data['class_mission'][$i]->attendance_date = $new_date;
							$data['class_mission'][$i]->attendance_time = $new_time;
						}
					}
				}
			}
		}
		//var_dump(json_encode($class_mission));return;
		if(!empty ($data['all_class'])){
			foreach($data['all_class'] as $ac){
				$sql = $this->class_model->get_class_strength_capture_by_class_id_user_id($ac->class_id,$this->session->userdata('user_id'));
				$my_class = 0;
				if ($sql->num_rows() > 0) {
					$my_class = 1;
				}
				$ac->my_class = $my_class;
			}
		}
		
        $this->call_main('classes',$data);
    }
	
	public function details($class_id,$index,$uid) {
		if($uid == 0){
			$id = $this->session->userdata('user_id');
		}else{
			$id = $uid;
		}
		
		$class_detail = NULL;
		$sql = $this->class_model->get_class_by_class_id($class_id);
		if ($sql->num_rows() > 0) {
			$class_detail = $sql->first_row();
		}
		$class_mission = NULL;
		$sql1 = $this->class_model->get_class_mission_participant_by_class_id_user_id($class_detail->class_id,$id);
		if ($sql1->num_rows() > 0) {
			$class_mission = $sql1->result();
		}
		$class_government_checklist = NULL;
		$sql3 = $this->class_model->get_class_government_checklist($class_id);
		if ($sql3->num_rows() > 0) {
			$class_government_checklist = $sql3->result();
		}
		$class_sdg_indicator = NULL;
		$sql4 = $this->class_model->get_class_sdg_indicator($class_id);
		if ($sql4->num_rows() > 0) {
			$class_sdg_indicator = $sql4->result();
		}
		
		$sql5 = $this->user_model->get_user($id);
		if ($sql5->num_rows() > 0) {
			$user_detail = $sql5->first_row();
		}
		$class_strength_capture = NULL;
		$sql6 = $this->class_model->get_class_strength_capture_by_class_id_user_id($class_id,$id);
		if ($sql6->num_rows() > 0) {
			$class_strength_capture = $sql6->first_row();
		}
		$class_strength_capture_teacher = NULL;
		$sql7 = $this->class_model->get_class_strength_capture_teacher_by_class_id_user_id($class_id,$id);
		if ($sql7->num_rows() > 0) {
			$class_strength_capture_teacher = $sql7->first_row();
		}
		$bank_of_competencies = $this->Bank_of_competencies_model->get_bank_of_competencies();
		$bank_of_competencies_detail = $this->Bank_of_competencies_model->get_bank_of_competencies_detail();
		$class_mission_link_arr = array();
		$class_mission_lesson_activities_arr = array();
		$new_class_mission = array();
		if(!empty ($class_mission)){
			foreach($class_mission as $cm){
				$cm->class_mission_sdg_indicator = $this->class_model->get_class_mission_sdg_indicator($cm->class_mission_id)->result();
				$cm->class_mission_bank_of_competencies = $this->Bank_of_competencies_model->get_class_mission_bank_of_competencies_by_class_mission_id($cm->class_mission_id)->result();
				$cmpid = $this->class_model->get_class_mission_participants_id_by_class_mission_id_and_participants_id($cm->class_mission_id,$this->session->userdata('user_id'))->first_row()->class_mission_participants_id;
				
				$cm->class_mission_participants_bank_of_competencies = $this->Bank_of_competencies_model->get_class_mission_participants_bank_of_competencies_by_class_mission_participants_id($cmpid)->result();
				
				$sql5 = $this->class_model->get_class_mission_link($cm->class_mission_id);
				if ($sql5->num_rows() > 0) {
					$class_mission_link = $sql5->result();
					array_push($class_mission_link_arr,$class_mission_link);
				}

				$sql6 = $this->class_model->get_count_class_mission_lesson_activities_by_class_mission_id($cm->class_mission_id);
				if ($sql6->num_rows() > 0) {
					$class_mission_lesson_activities = $sql6->result();
					array_push($class_mission_lesson_activities_arr,$class_mission_lesson_activities);
				}
				$cm->class_mission_learning_objectives = $this->learning_objectives_model->get_class_mission_learning_objectives_by_class_mission_id($cm->class_mission_id)->result();
				foreach($cm->class_mission_learning_objectives as $cmlo){
					if($cmlo->is_manual == 0){
						$cmlo->name = $this->learning_objectives_model->get_learning_objectives_by_learning_objectives_id($cmlo->content)->first_row()->learning_objectives_name;
					}else{
						$cmlo->name = $cmlo->content;
					}
				}
			}
			for($i=0;$i<count($class_mission);$i++){
				$sql = $this->class_model->get_status_mission($class_mission[$i]->class_mission_id);
				if ($sql->num_rows() > 0) {
					$class_mission[$i]->status_mission = $sql->first_row()->status_mission_id;
				}else{
					$class_mission[$i]->status_mission = 0;
				}
			}
			for($i=0;$i<count($class_mission);$i++){
				if($class_mission[$i]->status_mission != 0){
					$new_class_mission[] = $class_mission[$i];
				}
			}
			//get count how many true each bocd
			foreach($bank_of_competencies_detail as $bocd){
				$bocd->total = 0;
			}
			// Class mission participant bank of competencies
			// foreach($bank_of_competencies_detail as $bocd){
				// foreach($class_mission as $cm){
					// foreach($cm->class_mission_participants_bank_of_competencies as $cmpboc){
						// if($bocd->bank_of_competencies_detail_id == $cmpboc->bank_of_competencies_detail_id){
							// $bocd->total++;
						// }
					// }
				// }
			// }
			// Class mission bank of competencies
			foreach($bank_of_competencies_detail as $bocd){
				foreach($class_mission as $cm){
					foreach($cm->class_mission_bank_of_competencies as $cmpboc){
						if($bocd->bank_of_competencies_detail_id == $cmpboc->bank_of_competencies_detail_id){
							$bocd->total++;
						}
					}
				}
			}

			foreach($bank_of_competencies as $boc){
				$boc->total = 0;
			}
			foreach($bank_of_competencies as $boc){
				foreach($bank_of_competencies_detail as $bocd){
					if($bocd->bank_of_competencies_id == $boc->bank_of_competencies_id){
						$boc->total = $boc->total + $bocd->total;
					}
				}
			}
			 
		}
		
		$data = array(
			"detail" => $class_detail,
			"class_mission" => $new_class_mission,
			"class_mission_link" => $class_mission_link_arr,
			"class_mission_lesson_activities" => $class_mission_lesson_activities_arr,
			"class_government_checklist" => $class_government_checklist,
			"class_sdg_indicator" => $class_sdg_indicator,
			"user_detail" => $user_detail,
			"class_strength_capture" => $class_strength_capture,
			"class_strength_capture_teacher" => $class_strength_capture_teacher,
			"bank_of_competencies" => $bank_of_competencies,
			"bank_of_competencies_detail" => $bank_of_competencies_detail
		);
		
		// Change date time format Class Start
		$datetime = $this->change_datetime_format_from_db($data['detail']->class_start_datetime);
        $params = explode(" - ", $datetime);
        $new_date = $params[0];
		$new_time = $params[1];

        $data['detail']->class_start_date = $new_date;
        $data['detail']->class_start_time = $new_time;
		
		// Change date time format Class Finish
		$datetime = $this->change_datetime_format_from_db($data['detail']->class_finish_datetime);
        $params = explode(" - ", $datetime);
        $new_date = $params[0];
		$new_time = $params[1];

        $data['detail']->class_finish_date = $new_date;
        $data['detail']->class_finish_time = $new_time;
		
		// Change date format
		if(!empty ($data['class_mission'])){
			for($i=0;$i<count($data['class_mission']);$i++){
				$datetime = $this->change_datetime_format_from_db($data['class_mission'][$i]->publish_datetime);
				$params = explode(" - ", $datetime);
				$new_date = $params[0];
				$new_time = $params[1];

				$data['class_mission'][$i]->publish_date = $new_date;
				$data['class_mission'][$i]->publish_time = $new_time;
				$sql5 = $this->class_model->get_status_task_class_mission_participants($data['class_mission'][$i]->class_mission_participants_id);
				if ($sql5->num_rows() > 0) {
					$status = $sql5->first_row();
					$data['class_mission'][$i]->status_task = $status->status_task_id;
					$data['class_mission'][$i]->status_task_2 = null;
					$data['class_mission'][$i]->status_task_3 = null;
					$datetime = $this->change_datetime_format_from_db($status->datetime);
					$params = explode(" - ", $datetime);
					$new_date = $params[0];
					$new_time = $params[1];
					$data['class_mission'][$i]->status_date = $new_date;
					$data['class_mission'][$i]->status_time = $new_time;
				}else{
					$data['class_mission'][$i]->status_task = 0;
				}
				
				$datetime = $this->change_datetime_format_from_db($data['class_mission'][$i]->deadline_datetime);
				$params = explode(" - ", $datetime);
				$new_date = $params[0];
				$new_time = $params[1];

				$data['class_mission'][$i]->deadline_date = $new_date;
				$data['class_mission'][$i]->deadline_time = $new_time;
			}
			
			for($i=0;$i<count($data['class_mission']);$i++){
				$sql5 = $this->class_model->get_status_task_class_mission_participants($data['class_mission'][$i]->class_mission_participants_id);
				$data['class_mission'][$i]->status_task2 = 0;
				$data['class_mission'][$i]->status_task3 = 0;
				if ($sql5->num_rows() > 0) {
					$status = $sql5->result();
					for($j=0;$j<count($status);$j++){
						$status_task = "status_task".$status[$j]->status_task_id;
						$status_date = "status_date".$status[$j]->status_task_id;
						$status_time = "status_time".$status[$j]->status_task_id;
						$data['class_mission'][$i]->$status_task = $status[$j]->status_task_id;
						$datetime = $this->change_datetime_format_from_db($status[$j]->datetime);
						$params = explode(" - ", $datetime);
						$new_date = $params[0];
						$new_time = $params[1];
						$data['class_mission'][$i]->$status_date = $new_date;
						$data['class_mission'][$i]->$status_time = $new_time;
					}
				}
			}
		}
		
		if($index == 0){// if 0 , view detail class for buy class
			$this->call_main('detail_class_view', $data);
		}else if($index == 1){// if 1 , view detail class after buy class
			$this->call_main('detail_my_class_view', $data);
		}
	}
	
	
	
	public function buy_class() {
		$id = $this->session->userdata('user_id');
		$sql = $this->user_model->get_user($id);
		if ($sql->num_rows() > 0) {
			$user_detail = $sql->first_row();
		}
		$user_detail->grade_id = $this->user_model->get_grade_user($this->session->userdata('user_id'))->first_row()->grade_id;
		$sql2 = $this->class_model->get_class_by_class_id($this->input->post('class_id'));
		
		// Calculate student's remaining points and get class status
		$remaining_pts = 0;	
		$class_detail= new \stdClass();
		if ($sql2->num_rows() > 0) {
			$class_detail = $sql2->first_row();
			$sql3 = $this->class_model->get_status_class($class_detail->class_id);
			if ($sql3->num_rows() > 0) {
				$status = $sql3->first_row();
				$class_detail->status = $status->status_class_id;
			}else{
				$class_detail->status = 0;
			}
			$remaining_pts = $user_detail->user_points - $class_detail->class_points;
		}else{
			$remaining_pts = $user_detail->user_points - 0;
		}

		// Student have insufficient points to join class
		if($remaining_pts < 0){
			echo "Insufficient point";
			return;
		} // User's grade not equal to Class's grade
		else if($class_detail->grade_id != $user_detail->grade_id){ 
			echo "Sorry, but please check that the class grade matches your grade!";
			return;
		} // If term not equal 1 and not special term, check user already buy previous term classes from the same grade subject id
		else if($class_detail->term_id > 1 && $class_detail->term_id <=4){
			$sql3 = $this->class_model->get_class_mission_participants_by_user_id_term_id($id,$class_detail->grade_subject_id,$class_detail->term_id-1);
			if (!$sql3->num_rows() > 0) {
				echo "Sorry, You must join previous term classes to join this class!";
				return;
			}
		}

		// Check passed
		// Insert Student to class mission participant
		$class_mission = NULL;
		$sql4 = $this->class_model->get_class_mission_by_class_id($class_detail->class_id);
		if ($sql4->num_rows() > 0) {
			$class_mission = $sql4->result();
			foreach($class_mission as $res) {
				// Check user already join class by mission participant
				$sql5 = $this->class_model->get_class_mission_participants_by_user_id_class_mission_id($id,$res->class_mission_id);
				if ($sql5->num_rows() > 0) {
					echo "Sorry, but you're already in this class!";
					return;
				}
				else{
					$data = array(
						'class_mission_id' => $res->class_mission_id,
						'participant_id' => $id
					);
					$this->class_model->insert_class_mission_participants($data);
				}
			}
		}
		// Update user points
		$data = array(
			"points" => $remaining_pts
		);
		$this->user_model->update_user_points($data,$id);
		// Insert user points history
		date_default_timezone_set('Asia/Jakarta'); 
		$now = date('Y-m-d H:i:s');
		$data = array(
			"user_id" => $id,
			"remark" => "Join Class",
			"class_id" => $class_detail->class_id,
			"points" => $class_detail->class_points,
			"datetime" => $now
		);
		$this->user_model->insert_user_points_history($data);
		// Insert student to class strength capture and strength capture teacher table
		$data = array(
			"class_id" => $class_detail->class_id,
			"participant_id" => $id
		);
		$this->class_model->insert_class_strength_capture($data);
		$this->class_model->insert_class_strength_capture_teacher($data);
		echo "Welcome to ".$class_detail->class_name."!";
		return;
	}
	
	public function upload_task_file(){
		$participant_id = $this->session->userdata('user_id');
		$class_mission_participants_id = $this->input->post("class_mission_participants_id");
		$class_mission_id = $this->class_model->get_class_mission_participants_by_class_mission_participants_id($class_mission_participants_id)->first_row()->class_mission_id;
		$data = array(
			"participant_id" => $participant_id,
			"class_mission_participants_id" => $class_mission_participants_id,
			"class_mission_id" => $class_mission_id
		);
		$response = new \stdClass();
		$response = $this->class_model->upload_task_file($data);
		return;
	}

	public function get_class_mission_files() {
		$id = $this->input->post('class_mission_participants_id');
		$query = $this->class_model->get_class_mission_participants_detail($id)->result();
		echo json_encode($query);
		return;
	}

	public function update_class_mission_participants_task(){
		$id = $this->input->post('class_mission_participants_id');
		$class_mission_participants = NULL;
		$sql = $this->class_model->get_class_mission_participants_by_class_mission_participants_id($id);
		if ($sql->num_rows() > 0) {
			$class_mission_participants = $sql->first_row();
		}
		$data = array(
			"task" => $this->input->post('task'),
			"rating" => $this->input->post('rating')
		);
		$this->class_model->update_class_mission_participants_task($data,$id);
		$sql = $this->class_model->get_class_by_class_id($this->input->post('class_id'));
		$class = "";
		if ($sql->num_rows() > 0) {
			$class = $sql->first_row();
			$email = $class->email;
			$class_name = $class->class_name;
			$sql2 = $this->class_model->get_class_mission_by_class_id($this->input->post('class_id'));
			$class_mission = "";
			$index = 0;
			if ($sql2->num_rows() > 0) {
				$class_mission = $sql2->result();
				for($i=0;$i<count($class_mission);$i++){
					if($class_mission[$i]->class_mission_id == $this->input->post('class_mission_id')){
						$index = $i;
					}
				}
			}
			$index = $index+1;
			$link = $this->config->item('teacher_url')."/classes/task/".$this->input->post('class_id')."/".$this->input->post('class_mission_id')."/mission/".$index."";
			$sql3 = $this->user_model->get_user($this->session->userdata('user_id'));
			$user = "";
			$full_name = "";
			$nisn = "";
			$grade = "";
			if ($sql3->num_rows() > 0) {
				$user = $sql3->first_row();
				$full_name = $user->full_name;
				$nisn = $user->nisn;
				$sql4 = $this->user_model->get_grade_user($this->session->userdata('user_id'));
				$user_grade = "";
				if ($sql4->num_rows() > 0) {
					$user_grade = $sql4->first_row();
					$grade = $user_grade->grade_name;
				}
			}
			date_default_timezone_set('Asia/Jakarta'); 
			$now = date('Y-m-d H:i:s');
			$datetime = $this->change_datetime_format_from_db($now);
			$params = explode(" - ", $datetime);
			$new_date = $params[0];
			$new_time = $params[1];
			$template_data = array(
				'full_name' => $full_name,
				'nisn' => $nisn,
				'grade' => $grade,
				'class_name' => $class_name,
				'new_date' => $new_date,
				'new_time' => $new_time,
				'link' => $link,
				'user_email' => $email
			);
			send_email($email, "Task Submitted!", $this->parser->parse('email_template/task_submit_teacher_template', $template_data, TRUE));
			$link_parent = base_url()."classes/details/".$this->input->post('class_id')."/1/".$this->session->userdata('user_id');
			$sql = $this->user_model->get_parent_by_child_id($this->session->userdata('user_id'));
			$parent = "";
			$email_parent = "";
			if ($sql->num_rows() > 0) {
				$parent = $sql->first_row();
				$email_parent = $parent->email;
				$template_data = array(
					'full_name' => $full_name,
					'nisn' => $nisn,
					'grade' => $grade,
					'class_name' => $class_name,
					'new_date' => $new_date,
					'new_time' => $new_time,
					'link' => $link_parent,
					'user_email' => $email_parent
				);
				send_email($email_parent, "Task Submitted!", $this->parser->parse('email_template/task_submit_parent_template', $template_data, TRUE));
			}
		}
		date_default_timezone_set('Asia/Jakarta'); 
		$now = date('Y-m-d H:i:s');
		if($class_mission_participants->deadline_datetime != $class_mission_participants->publish_datetime){
			if($now > $class_mission_participants->deadline_datetime){
				$data = array(
					"class_mission_participants_id" => $id,
					"status_task_id" => 2,
					"datetime" => $now,
					"note" => "Late to collect"
				);
				$this->class_model->insert_status_task_class_mission_participants($data);
				echo "Late to collect your task";
			}
		}
		else{
			$data = array(
				"class_mission_participants_id" => $id,
				"status_task_id" => 2,
				"datetime" => $now
			);
			$this->class_model->insert_status_task_class_mission_participants($data);
			echo "Task Uploaded";
		}
	}
	
	public function change_datetime_format_from_db($datetime) {
        // $new_Date = substr_replace($datetime,"",10);
        $new_Date = date("j F Y - H:i", strtotime($datetime)); //20 February 2020
        return $new_Date;
    }
	
	public function change_datetime_format($datetime) { // view to database
		$params = explode("-", $datetime);
             
		$new_Date = date("Y-m-d", strtotime($params[0]));
		$new_Date2 = $params[1];

		$string = $new_Date . " " . $new_Date2;

		$sec = strtotime($string); //converts date and time to seconds  
		$new = date ("Y-m-d H:i", $sec); //converts seconds into a specific format
		$new = $new . ":00"; //Appends seconds with the time 

		return $new;
	}
	
	public function insert_bsteams(){
		$id = $this->session->userdata('user_id');
		$sql = $this->class_model->get_class_strength_capture_by_class_id_user_id($this->input->post('class_id'),$id);
		$data = array(
			"class_id" => $this->input->post('class_id'),
			"participant_id" => $id,
			"b_reflection" => $this->input->post('reflection_b'),
			"b_rating" => $this->input->post('rating_b'),
			"s1_reflection" => $this->input->post('reflection_s1'),
			"s1_rating" => $this->input->post('rating_s1'),
			"t_reflection" => $this->input->post('reflection_t'),
			"t_rating" => $this->input->post('rating_t'),
			"e_reflection" => $this->input->post('reflection_e'),
			"e_rating" => $this->input->post('rating_e'),
			"a_reflection" => $this->input->post('reflection_a'),
			"a_rating" => $this->input->post('rating_a'),
			"m_reflection" => $this->input->post('reflection_m'),
			"m_rating" => $this->input->post('rating_m'),
			"s2_reflection" => $this->input->post('reflection_s2'),
			"s2_rating" => $this->input->post('rating_s2')
		);
		if ($sql->num_rows() > 0) {
			$class_strength_capture = $sql->first_row();
			$this->class_model->update_class_strength_capture($data,$class_strength_capture->class_strength_capture_id);
		}else{
			$this->class_model->insert_class_strength_capture($data);
		}
	}
	
	public function insert_strength(){
		$id = $this->session->userdata('user_id');
		$sql = $this->class_model->get_class_strength_capture_by_class_id_user_id($this->input->post('class_id'),$id);
		$data = array(
			"class_id" => $this->input->post('class_id'),
			"participant_id" => $id,
			"s_strength" => $this->input->post('s_strength'),
			"s_strength_rating" => $this->input->post('s_strength_rating'),
			"t1_strength" => $this->input->post('t1_strength'),
			"t1_strength_rating" => $this->input->post('t1_strength_rating'),
			"r_strength" => $this->input->post('r_strength'),
			"r_strength_rating" => $this->input->post('r_strength_rating'),
			"e_strength" => $this->input->post('e_strength'),
			"e_strength_rating" => $this->input->post('e_strength_rating'),
			"n_strength" => $this->input->post('n_strength'),
			"n_strength_rating" => $this->input->post('n_strength_rating'),
			"g_strength" => $this->input->post('g_strength'),
			"g_strength_rating" => $this->input->post('g_strength_rating'),
			"t2_strength" => $this->input->post('t2_strength'),
			"t2_strength_rating" => $this->input->post('t2_strength_rating'),
			"h_strength" => $this->input->post('h_strength'),
			"h_strength_rating" => $this->input->post('h_strength_rating')
		);
		if ($sql->num_rows() > 0) {
			$class_strength_capture = $sql->first_row();
			$this->class_model->update_strength($data,$class_strength_capture->class_strength_capture_student_id);
		}else{
			$this->class_model->insert_class_strength_capture($data);
		}
	}

    public function call_main($view, $data = NULL) {
        $this->load->view('main/header');
        $this->load->view('main/navbar');
        $this->load->view('class/'.$view, $data);
    }

}