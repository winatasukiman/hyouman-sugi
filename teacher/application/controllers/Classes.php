<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller {

    public function __construct() {
        parent ::__construct();
        $this->check_isvalidated();

        //load model
        $this->load->model('class_model');
        $this->load->model('subject_model');
        $this->load->model('user_model');
        $this->load->model('strength_model');
		$this->load->model('sdg_indicator_model');
		$this->load->model('learning_objectives_model');
		$this->load->model('academy_year_model');
		$this->load->model('term_model');
		$this->load->model('grade_model');
		$this->load->model('grade_subject_model');
		$this->load->model('semester_model');
		$this->load->model('teacher_specialty_model');
		$this->load->model('curicullum_model');
		$this->load->model('core_skill_model');
		$this->load->model('class_activity_model');
		$this->load->model('pencapaian_tujuan_pembelajaran_model');
		$this->load->model('profil_pembelajaran_pancasila_model');
    }

    private function check_isvalidated(){
        if(! $this->session->userdata('logged_in')){
            redirect('login/');
        }
    }

    public function index() {
        $id = $this->session->userdata('user_id');
		$sql = $this->class_model->get_class_by_user_id($this->session->userdata('user_id'));
		$class = array();
		$new_class = array();
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
			}
			for($i=0;$i<count($class);$i++){
				if($class[$i]->status != 3){
					$new_class[] = $class[$i];
				}
			}
		}
		$sql = $this->class_model->get_class_mission_by_user_id($this->session->userdata('user_id'));
		$class_mission = "";
		if ($sql->num_rows() > 0) {
			$class_mission = $sql->result();
		}
		//Strength
		$grade_teacher = new stdClass();
		$grade_teacher = $this->user_model->get_user_subject_with_order_by($id);
		$student_with_same_grade = array();
		if(!empty($grade_teacher)){
			foreach($grade_teacher as $gt){
				$res = $this->user_model->get_student_by_grade_id($gt);
				if(!empty($res)){
					$res_not_empty = $res;
					foreach($res as $r){
						$student_with_same_grade[] = $r;
					}
				}
			}
		}
		$strength_student = array();
		if(!empty($student_with_same_grade)){
			foreach($student_with_same_grade as $student_id){
				$res = $this->strength_model->get_strength_student_by_user_id($student_id);
				if(!empty($res)){
					$strength_student[] = $this->strength_model->get_strength_student_by_user_id($student_id);
				}
				
				// var_dump($student_id);
				// var_dump($this->strength_model->get_strength_student_by_user_id($student_id));
				// echo "<br><br>";
			}
		}
		// foreach($strength_student as $ss){
			// foreach($ss as $ss1){
				// var_dump($ss1->activity_title);
				// echo "<br><br>";
			// }
		// }
		
		//var_dump($strength_student);
		// term
		$term = new stdClass();
		$sql = $this->term_model->get_term();
		if ($sql->num_rows() > 0) {
			$term = $sql->result();
		}
		// grade
		$grade = new stdClass();
		$sql = $this->grade_model->get_grade();
		if ($sql->num_rows() > 0) {
			$grade = $sql->result();
		}
		// academy year
		$academy_year = new stdClass();
		$sql = $this->academy_year_model->get_academy_year();
		if ($sql->num_rows() > 0) {
			$academy_year = $sql->result();
		}
		// grade subject
		$grade_subject = new stdClass();
		$sql = $this->grade_subject_model->get_grade_subject();
		if ($sql->num_rows() > 0) {
			$grade_subject = $sql->result();
		}
		// semester
		$semester = new stdClass();
		$sql = $this->semester_model->get_semester();
		if ($sql->num_rows() > 0) {
			$semester = $sql->result();
		}
		//teacher specialty
		$teacher_specialty = new stdClass();
		$sql = $this->teacher_specialty_model->get_grade_subject_by_teacher_specialty();
		if ($sql->num_rows() > 0) {
			$teacher_specialty = $sql->result();
		}
		$data = array(
			"class" => $new_class,
			"class_mission" => $class_mission,
			"academy_year" => $academy_year,
			"term" => $term,
			"grade" => $grade,
			"grade_subject" => $grade_subject,
			"semester" => $semester,
			"strength_student" => $strength_student,
			"teacher_specialty" => $teacher_specialty
        );
		
		// Change date format
		if($data['class_mission'] != null){
			for($i=0;$i<count($data['class_mission']);$i++){
				$data['class_mission'][$i]->publish_datetime = $this->change_datetime_format_from_db($data['class_mission'][$i]->publish_datetime);
				
				$data['class_mission'][$i]->deadline_datetime = $this->change_datetime_format_from_db($data['class_mission'][$i]->deadline_datetime);
			}
		}
		
        $this->call_main('classes',$data);
    }
	
	public function add_class() {
		$teacher_specialty = new stdClass();
		$sql = $this->grade_subject_model->get_grade_subject();
		if ($sql->num_rows() > 0) {
			$teacher_specialty = $sql->result();
		}
		$sql2 = $this->class_model->get_class_by_user_id($this->session->userdata('user_id'));
		$class = "";
		if ($sql2->num_rows() > 0) {
			$class = $sql2->result();
		}
		$sql3 = $this->class_model->get_term();
		$term = new stdClass();
		if ($sql3->num_rows() > 0) {
			$term = $sql3->result();
		}
		$academy_year = new stdClass();
		$sql = $this->academy_year_model->get_academy_year();
		if ($sql->num_rows() > 0) {
			$academy_year = $sql->result();
		}
		$semester = new stdClass();
		$sql = $this->semester_model->get_semester();
		if ($sql->num_rows() > 0) {
			$semester = $sql->result();
		}
		// curicullum
		$curicullum = new stdClass();
		$sql = $this->curicullum_model->get_curicullum();
		if ($sql->num_rows() > 0) {
			$curicullum = $sql->result();
		}
		$data = array(
            'title' => 'Create Class',
			"teacher_specialty" => $teacher_specialty,
			"class" => $class,
			"semester" => $semester,
			"term" => $term,
			"academy_year" => $academy_year,
			"curicullum" => $curicullum
        );
        $this->call_main('add_class', $data);
    }
	
	public function save_class(){
		$project_code = str_pad(mt_rand( 1000000000, mt_getrandmax() )*99, 12, "8", STR_PAD_BOTH);
		$semester_id = 1;
		$sql = $this->class_model->get_term_by_id($this->input->post("term"));
		if ($sql->num_rows() > 0) {
			$term = $sql->first_row();
			$semester_id = $term->semester_id;
		}
		$config['upload_path'] = './assets/img/uploads/user';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['file_name'] = $project_code."_".$_FILES["thumbnail"]['name'];
		// Create folder if doesn't exist
		if (!file_exists($config['upload_path'])) {
			mkdir($config['upload_path'], 0775, true);
		}
        $this->load->library('upload', $this->config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('thumbnail')) {
			echo "<script type='text/javascript'>
					alert('Please add an image');
				</script>";
		}else {
			$file = $this->upload->data();
			date_default_timezone_set('Asia/Jakarta'); 
			$now = date('Y-m-d H:i:s');
			$data = array(
				'class_id' => $project_code,
				'curicullum_id' => $this->input->post("curicullum"),
				'class_image' => $file['file_name'],
				'class_start_datetime' => $now,
				'class_finish_datetime' => $now,
				'grade_subject_id' => $this->input->post("grade_subject"),
				'semester_id' => $semester_id,
				'term_id' => $this->input->post("term"),
				'academy_year_id' => $this->input->post("academy_year"),
				'school_name' => $this->input->post("school_name"),
				'class_creator' => $this->session->userdata('user_id'),
				'timestamp' => $now
			);
			$this->class_model->insert_class($data);
			$data = array(
				'class_id' => $project_code,
				'mission_id' => 1
			);
			$insert_id = $this->class_model->insert_class_mission($data);
			$data = array(
				'class_mission_id' => $insert_id
			);
			$this->class_model->insert_class_mission_link($data);
			$this->session->set_flashdata('category_success', 'Class has been successfully added.');
			$data_echo = array(
				'class_id' => $project_code
			);
			//echo json_encode($data_echo);
			redirect('classes/details/'.$project_code.'/2');
		}
	}
	
	public function update_class_thumbnail(){
		$sql = $this->class_model->get_class_by_class_id($this->input->post("class_id"));
		if ($sql->num_rows() > 0) {
			$class_detail = $sql->first_row();
			if (file_exists("./assets/img/uploads/user/".$class_detail->class_image)){
				chown("./assets/img/uploads/user/".$class_detail->class_image, 777);
				unlink("./assets/img/uploads/user/".$class_detail->class_image);
			}
			$config['upload_path'] = './assets/img/uploads/user';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['file_name'] = $class_detail->class_id."_".$_FILES["thumbnail"]['name'];
			$this->load->library('upload', $this->config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('thumbnail')) {
			echo "
					<script type='text/javascript'>
						alert('Please add an image');
					</script>
				";
			} 
			else {
				$file = $this->upload->data();
				$data = array(
					'class_id' => $this->input->post("class_id"),
					'class_image' => $file['file_name']
				);
				$this->class_model->update_class_thumbnail($data);
				$this->session->set_flashdata('category_success', 'Thumbnail has been successfully updated.');
				redirect('classes/details/'.$class_detail->class_id.'/0');
			}
		}
	}
	
	public function details($class_id,$detail,$mission_id = 0) {
		$class_detail = NULL;
		$sql = $this->class_model->get_class_by_class_id($class_id);
		if ($sql->num_rows() > 0) {
			$class_detail = $sql->first_row();
		}
		$class_mission = NULL;
		$sql1 = $this->class_model->get_class_mission_by_class_id($class_detail->class_id);
		if ($sql1->num_rows() > 0) {
			$class_mission = $sql1->result();
		}
		$grade_government_checklist = NULL;
		$sql2 = $this->class_model->get_grade_government_checklist($class_detail->grade_id);
		if ($sql2->num_rows() > 0) {
			$grade_government_checklist = $sql2->result();
		}
		$class_government_checklist = NULL;
		$sql3 = $this->class_model->get_class_government_checklist($class_id);
		if ($sql3->num_rows() > 0) {
			$class_government_checklist = $sql3->result();
		}
		$grade_sdg_indicator = NULL;
		$sql4 = $this->sdg_indicator_model->get_grade_sdg_indicator_by_grade_id($class_detail->grade_id);
		if ($sql4->num_rows() > 0) {
			$grade_sdg_indicator = $sql4->result();
		}
		$class_sdg_indicator = NULL;
		$sql4 = $this->class_model->get_class_sdg_indicator($class_id);
		if ($sql4->num_rows() > 0) {
			$class_sdg_indicator = $sql4->result();
		}
		$learning_objectives = NULL;
		$sql4 = $this->learning_objectives_model->get_learning_objectives();
		if ($sql4->num_rows() > 0) {
			$learning_objectives = $sql4->result();
		}
		
		$class_mission_link_arr = array();
		$class_mission_lesson_activities_arr = array();
		$class_mission_learning_objectives_arr = array();
		$class_mission_res_arr = array();
		foreach($class_mission as $cm){
			$cm->class_mission_sdg_indicator = $this->sdg_indicator_model->get_class_mission_sdg_indicator_by_class_mission_id($cm->class_mission_id)->result();
			$cm->class_mission_learning_objectives = $this->learning_objectives_model->get_class_mission_learning_objectives_by_class_mission_id($cm->class_mission_id)->result();
			foreach($cm->class_mission_learning_objectives as $cmlo){
				if($cmlo->is_manual == 0){
					$cmlo->name = $this->learning_objectives_model->get_learning_objectives_by_learning_objectives_id($cmlo->content)->first_row()->learning_objectives_name;
				}else{
					$cmlo->name = $cmlo->content;
				}
			}
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
			$sql7 = $this->class_model->get_status_mission($cm->class_mission_id);
			if ($sql7->num_rows() > 0) {
				$status = $sql7->first_row();
				$cm->status = $status->status_mission_id;
			}else{
				$cm->status = 0;
			}
			$sql8 = $this->learning_objectives_model->get_class_mission_learning_objectives_by_class_mission_id($cm->class_mission_id);
			if ($sql8->num_rows() > 0) {
				$class_mission_learning_objectives = $sql8->result();
				array_push($class_mission_learning_objectives_arr,$class_mission_learning_objectives);
			}
			$sql = $this->class_model->get_class_mission_res($cm->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_res = $sql->result();
				array_push($class_mission_res_arr,$class_mission_res);
			}
			$cm->class_mission_core_skill = new stdClass();
			$sql = $this->class_model->get_class_mission_core_skill($cm->class_mission_id);
			if ($sql->num_rows() > 0) {
				$cm->class_mission_core_skill = $sql->result();
			}
			$cm->class_mission_class_activity = new stdClass();
			$sql = $this->class_model->get_class_mission_class_activity($cm->class_mission_id);
			if ($sql->num_rows() > 0) {
				$cm->class_mission_class_activity = $sql->result();
			}
			$cm->class_mission_core_concept = new stdClass();
			$sql = $this->class_model->get_class_mission_core_concept($cm->class_mission_id);
			if ($sql->num_rows() > 0) {
				$cm->class_mission_core_concept = $sql->result();
			}
		}
		
		$class_mission_participants = NULL;
		$sql2 = $this->class_model->get_class_mission_participants_by_class_id($class_id);
		if ($sql2->num_rows() > 0) {
			$class_mission_participants = $sql2->result();
		}
		if(! empty ($class_mission_participants)){
			for($i=0;$i<count($class_mission_participants);$i++){
				$sql5 = $this->class_model->get_status_task_class_mission_participants($class_mission_participants[$i]->class_mission_participants_id);
				if ($sql5->num_rows() > 0) {
					$status = $sql5->first_row();
					$class_mission_participants[$i]->status_task = $status->status_task_id;
				}else{
					$class_mission_participants[$i]->status_task = 0;
				}
			}
		}
		
		$sql6 = $this->class_model->get_status_class($class_id);
		if ($sql6->num_rows() > 0) {
			$status = $sql6->first_row();
			$class_detail->status = $status->status_class_id;
		}else{
			$class_detail->status = 0;
		}

		$term = new stdClass();
		$sql = $this->class_model->get_term();
		if ($sql->num_rows() > 0) {
			$term = $sql->result();
		}
		$academy_year = new stdClass();
		$sql = $this->academy_year_model->get_academy_year();
		if ($sql->num_rows() > 0) {
			$academy_year = $sql->result();
		}
		$semester = new stdClass();
		$sql = $this->semester_model->get_semester();
		if ($sql->num_rows() > 0) {
			$semester = $sql->result();
		}
		$curicullum = new stdClass();
		$sql = $this->curicullum_model->get_curicullum();
		if ($sql->num_rows() > 0) {
			$curicullum = $sql->result();
		}
		$grade_subject = new stdClass();
		$sql = $this->grade_subject_model->get_grade_subject();
		if ($sql->num_rows() > 0) {
			$grade_subject = $sql->result();
		}
		$core_skill = new stdClass();
		$sql = $this->core_skill_model->get_core_skill();
		//$sql = $this->core_skill_model->get_core_skill_by_subject_id($class_detail->subject_id);
		if ($sql->num_rows() > 0) {
			$core_skill = $sql->result();
		}
		$class_activity = new stdClass();
		$sql = $this->class_activity_model->get_class_activity();
		//$sql = $this->class_activity_model->get_class_activity_by_subject_id($class_detail->subject_id);
		if ($sql->num_rows() > 0) {
			$class_activity = $sql->result();
		}
		
		$data = array(
			"detail" => $class_detail,
			"class_mission" => $class_mission,
			"class_mission_link" => $class_mission_link_arr,
			"class_mission_lesson_activities" => $class_mission_lesson_activities_arr,
			"class_mission_learning_objectives" => $class_mission_learning_objectives_arr,
			"class_mission_res" => $class_mission_res_arr,
			"grade_government_checklist" => $grade_government_checklist,
			"class_government_checklist" => $class_government_checklist,
			"grade_sdg_indicator" => $grade_sdg_indicator,
			"class_sdg_indicator" => $class_sdg_indicator,
			"class_mission_participants" => $class_mission_participants,
			"learning_objectives" => $learning_objectives,
			"semester" => $semester,
			"term" => $term,
			"academy_year" => $academy_year,
			"grade_subject" => $grade_subject,
			"curicullum" => $curicullum,
			"core_skill" => $core_skill,
			"class_activity" => $class_activity,
			"mission_id" => $mission_id,
			"mode" => $detail
		);
		// Change date time format Class Start for datetimepicker
		$datetime = $this->change_datetime_format_from_db_for_datetimepicker($data['detail']->class_start_datetime);
        $params = explode(" - ", $datetime);
        $new_date = $params[0];
		$new_time = $params[1];

        $data['detail']->class_start_date = $new_date;
        $data['detail']->class_start_time = $new_time;

		// Change date time format Class Finish for datetimepicker
		$datetime = $this->change_datetime_format_from_db_for_datetimepicker($data['detail']->class_finish_datetime);
        $params = explode(" - ", $datetime);
        $new_date = $params[0];
		$new_time = $params[1];

        $data['detail']->class_finish_date = $new_date;
        $data['detail']->class_finish_time = $new_time;
		
		// Change date format for datetimepicker
		for($i=0;$i<count($data['class_mission']);$i++){
			$datetime = $this->change_datetime_format_from_db_for_datetimepicker($data['class_mission'][$i]->publish_datetime);
			$params = explode(" - ", $datetime);
			$new_date = $params[0];
			$new_time = $params[1];

			$data['class_mission'][$i]->publish_date = $new_date;
			$data['class_mission'][$i]->publish_time = $new_time;
			
			$datetime = $this->change_datetime_format_from_db_for_datetimepicker($data['class_mission'][$i]->deadline_datetime);
			$params = explode(" - ", $datetime);
			$new_date = $params[0];
			$new_time = $params[1];

			$data['class_mission'][$i]->deadline_date = $new_date;
			$data['class_mission'][$i]->deadline_time = $new_time;
		}
		
		// Change date time format Class Start
		$data['detail']->class_start_datetime = $this->change_datetime_format_from_db($data['detail']->class_start_datetime);
		
		// Change date time format Class Finish
		$data['detail']->class_finish_datetime = $this->change_datetime_format_from_db($data['detail']->class_finish_datetime);
		
		// Change date format
		for($i=0;$i<count($data['class_mission']);$i++){
			$data['class_mission'][$i]->publish_datetime = $this->change_datetime_format_from_db($data['class_mission'][$i]->publish_datetime);
			
			$data['class_mission'][$i]->deadline_datetime = $this->change_datetime_format_from_db($data['class_mission'][$i]->deadline_datetime);
		}
		if($detail == 1  || $detail == 2){
			$this->call_main('detail_class_view', $data);
		}else if($detail == 0){
			$this->call_main('edit_class', $data);
		}
	}

	public function copy_class(){
		$class_detail = NULL;
		$sql = $this->class_model->get_class_by_class_id($this->input->post("class_id"));
		if ($sql->num_rows() > 0) {
			$class_detail = $sql->first_row();
		}
		$class_mission = NULL;
		$sql = $this->class_model->get_class_mission_by_class_id($class_detail->class_id);
		if ($sql->num_rows() > 0) {
			$class_mission = $sql->result();
		}
		$project_code = str_pad(mt_rand( 1000000000, mt_getrandmax() )*99, 12, "8", STR_PAD_BOTH);
		date_default_timezone_set('Asia/Jakarta'); 
		$now = date('Y-m-d H:i:s');
		$data = array(
			'class_id' => $project_code,
			'curicullum_id' => $class_detail->curicullum_id,
			'class_image' => $class_detail->class_image,
			'grade_subject_id' => $class_detail->grade_subject_id,
			'semester_id' => $class_detail->semester_id,
			'term_id' => $class_detail->term_id,
			'academy_year_id' => $this->input->post("academy_year"),
			'school_name' => $class_detail->school_name,
			'class_creator' => $class_detail->class_creator,
			'timestamp' => $now
		);
		$this->class_model->insert_class($data);
		foreach($class_mission as $cm){
			$data = array(
				'class_id' => $project_code,
				'mission_id' => $cm->mission_id,
				'mission_title' => $cm->mission_title,
				'sub_topic' => $cm->sub_topic,
				'mission_description' => $cm->mission_description,
				'task_description' => $cm->task_description,
				'profil_pembelajaran_pancasila' => $cm->profil_pembelajaran_pancasila,	
				'google_meet_password' => $cm->google_meet_password,
				'google_meet_link' => $cm->google_meet_link,
				'face_to_face' => $cm->face_to_face,
				'meeting_location' => $cm->meeting_location,
				'resource' => $cm->resource,
				'time_allocation_a' => $cm->time_allocation_a,
				'time_allocation_b' => $cm->time_allocation_b,
				'week' => $cm->week,
				'bank_of_competencies' => $cm->bank_of_competencies,
				'publish_datetime' => $cm->publish_datetime,
				'deadline_datetime' => $cm->deadline_datetime
			);
			$insert_id = $this->class_model->insert_class_mission($data);
			// class mission link
			$sql = $this->class_model->get_class_mission_link($cm->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_link = $sql->result();
				foreach($class_mission_link as $cml){
					$data = array(
						'class_mission_id' => $insert_id,
						'name' => $cml->name,
						'link' => $cml->link
					);
					$this->class_model->insert_class_mission_link($data);
				}
			}
			// class mission pencapaian tujuan pembelajaran
			$sql = $this->class_model->get_class_mission_pencapaian_tujuan_pembelajaran($cm->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_pencapaian_tujuan_pembelajaran = $sql->result();
				foreach($class_mission_pencapaian_tujuan_pembelajaran as $tp){
					$data = array(
						'class_mission_id' => $insert_id,
						'pencapaian_tujuan_pembelajaran_id' => $tp->pencapaian_tujuan_pembelajaran_id,
					);
					$this->class_model->insert_class_mission_pencapaian_tujuan_pembelajaran($data);
				}
			}
			// class mission lesson activities
			$sql = $this->class_model->get_count_class_mission_lesson_activities_by_class_mission_id($cm->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_lesson_activities = $sql->result();
				foreach($class_mission_lesson_activities as $cmla){
					$data = array(
						'class_mission_id' => $insert_id,
						'title' => $cmla->title,
						'description' => $cmla->description,
						'description_2' => $cmla->description_2
					);
					$this->class_model->insert_class_mission_lesson_activities($data);
				}
			}
			// class mission learning objectives
			$sql = $this->class_model->get_class_mission_learning_objectives_by_class_mission_id($cm->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_learning_objectives = $sql->result();
				foreach($class_mission_learning_objectives as $cmlo){
					$data = array(
						'class_mission_id' => $insert_id,
						'content' => $cmlo->content,
						'is_manual' => $cmlo->is_manual
					);
					$this->learning_objectives_model->insert_class_mission_learning_objectives($data);
				}
			}
			// class mission resource
			$sql = $this->class_model->get_class_mission_res($cm->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_res = $sql->result();
				foreach($class_mission_res as $cmr){
					$data = array(
						'class_mission_id' => $insert_id,
						'name' => $cmr->name,
						'link' => $cmr->link
					);
					$this->class_model->insert_class_mission_res($data);
				}
			}
			// class mission competencies cambridge
			$sql = $this->class_model->get_class_mission_competencies_cambridge_by_class_mission_id($cm->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_competencies_cambridge = $sql->result();
				foreach($class_mission_competencies_cambridge as $cc){
					$data = array(
						'class_mission_id' => $insert_id,
						'competencies_cambridge_id' => $cc->competencies_cambridge_id,
						'is_true' => 1
					);
					$this->class_model->insert_class_mission_competencies_cambridge($data);
				}
			}
			// class mission competencies k13
			$sql = $this->class_model->get_class_mission_competencies_k13_by_class_mission_id($cm->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_competencies_k13 = $sql->result();
				foreach($class_mission_competencies_k13 as $cmk){
					$data = array(
						'class_mission_id' => $insert_id,
						'competencies_k13_id' => $cmk->competencies_k13_id,
						'is_true' => 1
					);
					$this->class_model->insert_class_mission_competencies_k13($data);
				}
			}
			// class mission competencies merdeka
			$sql = $this->class_model->get_class_mission_competencies_merdeka_by_class_mission_id($cm->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_competencies_merdeka = $sql->result();
				foreach($class_mission_competencies_merdeka as $cm){
					$data = array(
						'class_mission_id' => $insert_id,
						'competencies_merdeka_id' => $cm->competencies_merdeka_id,
						'is_true' => 1
					);
					$this->class_model->insert_class_mission_competencies_merdeka($data);
				}
			}
			//core skills
			$sql = $this->class_model->get_class_mission_core_skill($cm->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_core_skill = $sql->result();
				foreach($class_mission_core_skill as $cc){
					$data = array(
						'class_mission_id' => $insert_id,
						'core_skill_id' => $cc->core_skill_id,
					);
					$this->class_model->insert_class_mission_core_skill($data);
				}
			}
			//core concepts
			$sql = $this->class_model->get_class_mission_core_concept($cm->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_core_concept = $sql->result();
				foreach($class_mission_core_concept as $cc){
					$data = array(
						'class_mission_id' => $insert_id,
						'content' => $cc->content,
					);
					$this->class_model->insert_class_mission_core_concept($data);
				}
			}
			//class activity
			$sql = $this->class_model->get_class_mission_class_activity($cm->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_class_activity = $sql->result();
				foreach($class_mission_class_activity as $cc){
					$data = array(
						'class_mission_id' => $insert_id,
						'class_activity_id' => $cc->class_activity_id,
					);
					$this->class_model->insert_class_mission_class_activity($data);
				}
			}
		}
		echo $project_code;
	}

	public function copy_meeting(){
		$class_id = $this->input->post("class_id");
		$sql = $this->class_model->get_class_mission_by_class_id($class_id);
		if ($sql->num_rows() > 0) {
			$class_mission = $sql->last_row();
			//echo $class_mission->mission_id;return;
			$mission_id = $class_mission->mission_id+1;
		}
		$old_cm_id = $this->input->post("mission_id");
		$cm_id = $this->input->post("mission_id");
		$cm = new stdClass();
		$sql = $this->class_model->get_class_mission_by_class_mission_id($cm_id);
		if ($sql->num_rows() > 0) {
			$cm = $sql->first_row();
			$data = array(
				'class_id' => $cm->class_id,
				'mission_id' => $mission_id,
				'mission_title' => "Copy of ".$cm->mission_title,
				'sub_topic' => $cm->sub_topic,
				'mission_description' => $cm->mission_description,
				'task_description' => $cm->task_description,
				'profil_pembelajaran_pancasila' => $cm->profil_pembelajaran_pancasila,	
				'google_meet_password' => $cm->google_meet_password,
				'google_meet_link' => $cm->google_meet_link,
				'face_to_face' => $cm->face_to_face,
				'meeting_location' => $cm->meeting_location,
				'resource' => $cm->resource,
				'time_allocation_a' => $cm->time_allocation_a,
				'time_allocation_b' => $cm->time_allocation_b,
				'week' => $cm->week,
				'bank_of_competencies' => $cm->bank_of_competencies,
				'publish_datetime' => $cm->publish_datetime,
				'deadline_datetime' => $cm->deadline_datetime
			);
			$insert_id = $this->class_model->insert_class_mission($data);
			$cm_id = $insert_id;
			// class mission link
			$sql = $this->class_model->get_class_mission_link($old_cm_id);
			if ($sql->num_rows() > 0) {
				//echo "ada";return;
				$class_mission_link = $sql->result();
				foreach($class_mission_link as $cml){
					$data = array(
						'class_mission_id' => $cm_id,
						'name' => $cml->name,
						'link' => $cml->link
					);
					$this->class_model->insert_class_mission_link($data);
				}
			}
			// class mission pencapaian tujuan pembelajaran
			$sql = $this->class_model->get_class_mission_pencapaian_tujuan_pembelajaran($old_cm_id);
			if ($sql->num_rows() > 0) {
				$class_mission_pencapaian_tujuan_pembelajaran = $sql->result();
				foreach($class_mission_pencapaian_tujuan_pembelajaran as $tp){
					$data = array(
						'class_mission_id' => $cm_id,
						'pencapaian_tujuan_pembelajaran_id' => $tp->pencapaian_tujuan_pembelajaran_id,
					);
					$this->class_model->insert_class_mission_pencapaian_tujuan_pembelajaran($data);
				}
			}
			// class mission lesson activities
			$sql = $this->class_model->get_count_class_mission_lesson_activities_by_class_mission_id($old_cm_id);
			if ($sql->num_rows() > 0) {
				$class_mission_lesson_activities = $sql->result();
				foreach($class_mission_lesson_activities as $cmla){
					$data = array(
						'class_mission_id' => $cm_id,
						'title' => $cmla->title,
						'description' => $cmla->description,
						'description_2' => $cmla->description_2
					);
					$this->class_model->insert_class_mission_lesson_activities($data);
				}
			}
			// class mission learning objectives
			$sql = $this->class_model->get_class_mission_learning_objectives_by_class_mission_id($old_cm_id);
			if ($sql->num_rows() > 0) {
				//echo "Ada";return;
				$class_mission_learning_objectives = $sql->result();
				foreach($class_mission_learning_objectives as $cmlo){
					$data = array(
						'class_mission_id' => $cm_id,
						'content' => $cmlo->content,
						'is_manual' => $cmlo->is_manual
					);
					$this->learning_objectives_model->insert_class_mission_learning_objectives($data);
				}
			}
			// class mission resource
			$sql = $this->class_model->get_class_mission_res($old_cm_id);
			if ($sql->num_rows() > 0) {
				$class_mission_res = $sql->result();
				foreach($class_mission_res as $cmr){
					$data = array(
						'class_mission_id' => $cm_id,
						'name' => $cmr->name,
						'link' => $cmr->link
					);
					$this->class_model->insert_class_mission_res($data);
				}
			}
			$sql = $this->class_model->get_class_mission_competencies_cambridge_by_class_mission_id($old_cm_id);
			if ($sql->num_rows() > 0) {
				$class_mission_competencies_cambridge = $sql->result();
				foreach($class_mission_competencies_cambridge as $cc){
					$data = array(
						'class_mission_id' => $cm_id,
						'competencies_cambridge_id' => $cc->competencies_cambridge_id,
						'is_true' => 1
					);
					$this->class_model->insert_class_mission_competencies_cambridge($data);
				}
			}

			$sql = $this->class_model->get_class_mission_competencies_k13_by_class_mission_id($old_cm_id);
			if ($sql->num_rows() > 0) {
				$class_mission_competencies_k13 = $sql->result();
				foreach($class_mission_competencies_k13 as $cmk){
					$data = array(
						'class_mission_id' => $cm_id,
						'competencies_k13_id' => $cmk->competencies_k13_id,
						'is_true' => 1
					);
					$this->class_model->insert_class_mission_competencies_k13($data);
				}
			}

			$sql = $this->class_model->get_class_mission_competencies_merdeka_by_class_mission_id($old_cm_id);
			if ($sql->num_rows() > 0) {
				$class_mission_competencies_merdeka = $sql->result();
				foreach($class_mission_competencies_merdeka as $cm){
					$data = array(
						'class_mission_id' => $cm_id,
						'competencies_merdeka_id' => $cm->competencies_merdeka_id,
						'is_true' => 1
					);
					$this->class_model->insert_class_mission_competencies_merdeka($data);
				}
			}
			//core skills
			$sql = $this->class_model->get_class_mission_core_skill($old_cm_id);
			if ($sql->num_rows() > 0) {
				$class_mission_core_skill = $sql->result();
				foreach($class_mission_core_skill as $cc){
					$data = array(
						'class_mission_id' => $cm_id,
						'core_skill_id' => $cc->core_skill_id,
					);
					$this->class_model->insert_class_mission_core_skill($data);
				}
			}
			//core concepts
			$sql = $this->class_model->get_class_mission_core_concept($old_cm_id);
			if ($sql->num_rows() > 0) {
				$class_mission_core_concept = $sql->result();
				foreach($class_mission_core_concept as $cc){
					$data = array(
						'class_mission_id' => $cm_id,
						'content' => $cc->content,
					);
					$this->class_model->insert_class_mission_core_concept($data);
				}
			}
			//class activity
			$sql = $this->class_model->get_class_mission_class_activity($old_cm_id);
			if ($sql->num_rows() > 0) {
				$class_mission_class_activity = $sql->result();
				foreach($class_mission_class_activity as $cc){
					$data = array(
						'class_mission_id' => $cm_id,
						'class_activity_id' => $cc->class_activity_id,
					);
					$this->class_model->insert_class_mission_class_activity($data);
				}
			}
		}
		echo $cm_id;
	}
	
	public function attendance($class_id,$index,$cmi) {
		$class_detail = NULL;
		$sql = $this->class_model->get_class_by_class_id($class_id);
		if ($sql->num_rows() > 0) {
			$class_detail = $sql->first_row();
		}
		$class_mission = NULL;
		$sql1 = $this->class_model->get_class_mission_by_class_id($class_id);
		if ($sql1->num_rows() > 0) {
			$class_mission = $sql1->result();
		}
		$class_mission_first_row = NULL;
		$sql1 = $this->class_model->get_class_mission_by_class_id($class_id);
		if ($sql1->num_rows() > 0) {
			$class_mission_first_row = $sql1->first_row();
		}
		$class_mission_participants = NULL;
		$sql2 = $this->class_model->get_class_mission_participants_by_class_id($class_id);
		if ($sql2->num_rows() > 0) {
			$class_mission_participants = $sql2->result();
		}
		$class_mission_participants_arr = array();
		foreach($class_mission as $cm){
			$sql5 = $this->class_model->get_class_mission_participants($cm->class_mission_id);
			if ($sql5->num_rows() > 0) {
				$class_mission_participants_for_arr = $sql5->result();
				array_push($class_mission_participants_arr,$class_mission_participants_for_arr);
			}
		}
		
		$participants = new stdClass();
		$sql2 = $this->class_model->get_class_mission_participants($class_mission[0]->class_mission_id);
		if ($sql2->num_rows() > 0) {
			$participants = $sql2->result();
			foreach($participants as $p){
				$p->bank_of_competencies_detail = $bank_of_competencies_detail;
			}
		}
		foreach($participants as $p){
			$user_id = "total".$p->participant_id;
			foreach($p->bank_of_competencies_detail as $pbocd){
				$pbocd->$user_id = 0;
				
				foreach($class_mission_participants as $cmp){
					foreach($cmp->class_mission_participants_bank_of_competencies as $cmpboc){
						if($cmpboc->participant_id == $p->participant_id && $pbocd->bank_of_competencies_detail_id == $cmpboc->bank_of_competencies_detail_id){
							$pbocd->$user_id++;
						}
					}
				}
			}
		}
		
		$data = array(
			"detail" => $class_detail,
			"class_mission" => $class_mission,
			"cmi" => $cmi,
			"class_mission_first_row" => $class_mission_first_row,
			"class_mission_participants" => $class_mission_participants,
			"class_mission_participants_arr" => $class_mission_participants_arr,
			"bank_of_competencies" => $bank_of_competencies,
			"bank_of_competencies_detail" => $bank_of_competencies_detail,
			"participants" => $participants,
			"curicullum" => $curicullum
		);
		
		// Change date format
		for($i=0;$i<count($data['class_mission']);$i++){
			$data['class_mission'][$i]->publish_datetime = $this->change_datetime_format_from_db($data['class_mission'][$i]->publish_datetime);
		}

		if(! empty ($data['class_mission_participants'])){
			for($i=0;$i<count($data['class_mission_participants']);$i++){
				$data['class_mission_participants'][$i]->status_task = 0;
				$sql5 = $this->class_model->get_status_task_class_mission_participants($data['class_mission_participants'][$i]->class_mission_participants_id);
				if ($sql5->num_rows() > 0) {
					$status = $sql5->first_row();
					$data['class_mission_participants'][$i]->status_task = $status->status_task_id;
				}
			}
		}
		if($index == 0){
			$this->call_main('attendance', $data);
		}else if($index == 1){
			$this->call_main('overall_view', $data);
		}
		
	}
	
	public function task($class_id,$class_mission_id,$mission,$mission_index) {
		$user_id = $this->session->userdata("user_id");
		if($user_id == null){
			$session_data = array(
				'class_id' => $class_id,
				'class_mission_id' => $class_mission_id,
				'mission_index' => $mission_index
			);
			$this->session->set_userdata($session_data);
			redirect('login/');
		}else{
			$class_detail = NULL;
			$sql = $this->class_model->get_class_by_class_id($class_id);
			if ($sql->num_rows() > 0) {
				$class_detail = $sql->first_row();
			}
			$class_mission = NULL;
			$sql1 = $this->class_model->get_class_mission_by_class_mission_id($class_mission_id);
			if ($sql1->num_rows() > 0) {
				$class_mission = $sql1->first_row();
			}
			$class_mission_participants = NULL;
			$class_mission_participants_first_row = NULL;
			$sql2 = $this->class_model->get_class_mission_participants($class_mission_id);
			if ($sql2->num_rows() > 0) {
				$class_mission_participants_first_row = $sql2->first_row();
			}
			
			
			$data = array(
				"detail" => $class_detail,
				"mission_index" => $mission." ".$mission_index,
				"class_mission" => $class_mission,
				"class_mission_participants" => $class_mission_participants,
				"class_mission_participants_first_row" => $class_mission_participants_first_row,
			);
			
			// Change date format
			$data['class_mission']->publish_datetime = $this->change_datetime_format_from_db($data['class_mission']->publish_datetime);

			$data['class_mission']->deadline_datetime = $this->change_datetime_format_from_db($data['class_mission']->deadline_datetime);

			if (! empty ($data['class_mission_participants'])){
				# Get date time of last task status
				for($i=0;$i<count($data['class_mission_participants']);$i++){
					$sql5 = $this->class_model->get_status_task_class_mission_participants($data['class_mission_participants'][$i]->class_mission_participants_id);
					if ($sql5->num_rows() > 0) {
						$status = $sql5->first_row();
						$data['class_mission_participants'][$i]->status_task = $status->status_task_id;
						$data['class_mission_participants'][$i]->status_datetime = $this->change_datetime_format_from_db($status->datetime);
						$params = explode(" - ", $datetime);
					}else{
						$data['class_mission_participants'][$i]->status_task = 0;
						$data['class_mission_participants'][$i]->status_date = "-";
						$data['class_mission_participants'][$i]->status_time = "-";
					}
				}
				# Get date time of all task status
				for($i=0;$i<count($data['class_mission_participants']);$i++){
					$sql5 = $this->class_model->get_status_task_class_mission_participants($data['class_mission_participants'][$i]->class_mission_participants_id);
					$data['class_mission_participants'][$i]->status_task2 = 0;
					$data['class_mission_participants'][$i]->status_task3 = 0;
					if ($sql5->num_rows() > 0) {
						$status = $sql5->result();
						for($j=0;$j<count($status);$j++){
							$status_task = "status_task".$status[$j]->status_task_id;
							$status_date = "status_date".$status[$j]->status_task_id;
							$status_time = "status_time".$status[$j]->status_task_id;
							$data['class_mission_participants'][$i]->$status_task = $status[$j]->status_task_id;
							$data['class_mission_participants'][$i]->$status_datetime = $this->change_datetime_format_from_db($status[$j]->datetime);
						}
					}
				}
				# To get class mission participants detail (File list)
				for($i=0;$i<count($data['class_mission_participants']);$i++){
					$id = $data['class_mission_participants'][$i]->class_mission_participants_id;
					$query = $this->class_model->get_class_mission_participants_detail($id)->result();
					$data['class_mission_participants'][$i]->file_details = $query;
				}
			}
			
			$this->call_main('task', $data);
		}
	}
	
	public function progress_report($class_id) {
		$class_detail = NULL;
		$sql = $this->class_model->get_class_by_class_id($class_id);
		if ($sql->num_rows() > 0) {
			$class_detail = $sql->first_row();
		}
		$class_strength_capture_teacher = NULL;
		$sql = $this->class_model->get_class_strength_capture_teacher_by_class_id($class_id);
		if ($sql->num_rows() > 0) {
			$class_strength_capture_teacher = $sql->result();
		}
		$class_strength_capture_teacher_first_row = NULL;
		$sql = $this->class_model->get_class_strength_capture_teacher_by_class_id($class_id);
		if ($sql->num_rows() > 0) {
			$class_strength_capture_teacher_first_row = $sql->first_row();
		}
		$data = array(
			"detail" => $class_detail,
			"class_strength_capture_teacher" => $class_strength_capture_teacher,
			"class_strength_capture_teacher_first_row" => $class_strength_capture_teacher_first_row
		);
		
		$this->call_main('progressreport', $data);
	}
	
	public function bsteams_teacher($class_id) {
		$class_detail = NULL;
		$sql = $this->class_model->get_class_by_class_id($class_id);
		if ($sql->num_rows() > 0) {
			$class_detail = $sql->first_row();
		}
		$class_strength_capture = NULL;
		$sql = $this->class_model->get_class_strength_capture_by_class_id($class_id);
		if ($sql->num_rows() > 0) {
			$class_strength_capture = $sql->result();
		}
		$class_strength_capture_first_row = NULL;
		$sql = $this->class_model->get_class_strength_capture_by_class_id($class_id);
		if ($sql->num_rows() > 0) {
			$class_strength_capture_first_row = $sql->first_row();
		}
		$data = array(
			"detail" => $class_detail,
			"class_strength_capture" => $class_strength_capture,
			"class_strength_capture_first_row" => $class_strength_capture_first_row
		);
		$this->call_main('bsteams_teacher', $data);
	}
	
	// public function insert_into_class_strength_capture_temporary($class_id) {
		// $class_detail = NULL;
		// $sql = $this->class_model->get_class_by_class_id($class_id);
		// if ($sql->num_rows() > 0) {
			// $class_detail = $sql->first_row();
		// }
		// $class_mission = NULL;
		// $sql1 = $this->class_model->get_class_mission_by_class_id($class_id);
		// if ($sql1->num_rows() > 0) {
			// $class_mission = $sql1->first_row();
		// }
		// $class_mission_participants = NULL;
		// $sql2 = $this->class_model->get_class_mission_participants($class_mission->class_mission_id);
		// if ($sql2->num_rows() > 0) {
			// $class_mission_participants = $sql2->result();
		// }
		
		// for($i=0;$i<count($class_mission_participants);$i++){
			// $data = array(
				// "class_id" => $class_id,
				// "participant_id" => $class_mission_participants[$i]->participant_id
			// );
			// $this->class_model->insert_class_strength_capture($data);
		// }
	// }
	
	public function update_class(){
		$class_start_time = $this->change_datetime_format($this->input->post("class_start_time"));
		$class_finish_time = $this->change_datetime_format($this->input->post("class_finish_time"));
		if($class_start_time > $class_finish_time){
			$this->session->set_flashdata('category_error', 'Start time more than finish time');
			redirect('classes/details/'.$this->input->post("class_id").'/0');
		}
		$semester_id = 1;
		$sql = $this->class_model->get_term_by_id($this->input->post("term"));
		if ($sql->num_rows() > 0) {
			$term = $sql->first_row();
			$semester_id = $term->semester_id;
		}
		$data = array(
			'school_name' => $this->input->post("school_name"),
			'teacher_name' => $this->input->post("teacher_name"),
			'class_description' => $this->input->post("description"),
			'project_style' => $this->input->post("project_style"),
			'project_user' => $this->input->post("project_user"),
			'project_member' => $this->input->post("project_member"),
			'meeting_period' => $this->input->post("meeting_period"),
			'virtual_world' => $this->input->post("virtual_world"),
			'semester_id' => $semester_id,
			'term_id' => $this->input->post("term"),
			'curicullum_id' => $this->input->post("curicullum"),
			'academy_year_id' => $this->input->post("academy_year"),
			'grade_subject_id' => $this->input->post("grade_subject"),
			'class_start_datetime' => $class_start_time,
			'class_finish_datetime' => $class_finish_time
		);
		$update = $this->class_model->update_class($data,$this->input->post("class_id"));
		
		$config['upload_path'] = './assets/img/uploads/user';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['file_name'] = $this->input->post("class_id")."_".$_FILES["thumbnail"]['name'];
		$this->load->library('upload', $this->config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('thumbnail')) {
			$sql = $this->class_model->get_class_by_class_id($this->input->post("class_id"));
			if ($sql->num_rows() > 0) {
				$class_detail = $sql->first_row();
				if (file_exists("./assets/img/uploads/user/".$class_detail->class_image)){
					chown("./assets/img/uploads/user/".$class_detail->class_image, 777);
					unlink("./assets/img/uploads/user/".$class_detail->class_image);
				}
			}
			$file = $this->upload->data();
			$data = array(
				'class_id' => $this->input->post("class_id"),
				'class_image' => $file['file_name']
			);
			$this->class_model->update_class_thumbnail($data);
		}
		if($update == 1){
			$this->session->set_flashdata('category_success', 'Class has been successfully updated.');
		}else{
			$this->session->set_flashdata('category_error', 'Class failed updated.');
		}
		redirect('classes/details/'.$this->input->post("class_id").'/1');
	}
	
	public function update_class_goal_checklist(){
		$this->class_model->delete_class_gc_sdg($this->input->post("class_id"));
		$government_checklist_id = $this->input->post("gci");
		if($government_checklist_id !=null){
			foreach($government_checklist_id as $res) {
				$data = array(
					'class_id' => $this->input->post("class_id"),
					'government_checklist_id' => $res
				);
				$this->class_model->insert_class_gci($data,$this->input->post("class_id"));
			}
		}
		$sdg_indicator_id = $this->input->post("sii");
		if($sdg_indicator_id !=null){
			foreach($sdg_indicator_id as $res) {
				$data = array(
					'class_id' => $this->input->post("class_id"),
					'sdg_indicator_id' => $res
				);
				$this->class_model->insert_class_sii($data,$this->input->post("class_id"));
			}
		}
		echo "sukses";
	}
	
	public function change_datetime_format_from_db($datetime) {
        // $new_Date = substr_replace($datetime,"",10);
        $new_Date = date("l, M d, Y, g:ia", strtotime($datetime)); //20 February 2020
        return $new_Date;
    }

	public function change_datetime_format_from_db_for_datetimepicker($datetime) {
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
	
	public function insert_class_mission_id(){
		$data = array(
			'class_id' => $this->input->post("class_id"),
			'mission_id' => $this->input->post("mission_id")
		);
		$insert_id = $this->class_model->insert_class_mission($data);
		
		$sql = $this->class_model->get_class_strength_capture_by_class_id($this->input->post("class_id"));
		if ($sql->num_rows() > 0) {
			$class_strength_capture = $sql->result();
			foreach($class_strength_capture as $csc){
				$data = array(
					'class_mission_id' => $insert_id,
					'participant_id' => $csc->participant_id
				);
				$this->class_model->insert_class_mission_participants($data);
			}
		}
	}
	
	public function update_class_mission(){
		$new_date_time = $this->change_datetime_format($this->input->post("publish_datetime"));
		$new_date_time2 = $this->change_datetime_format($this->input->post("deadline_datetime"));
		
		// if($new_date_time2 < $new_date_time){
		// 	echo "Deadline date time less than publish date time";
		// }else{
			$data = array(
				'mission_title' => $this->input->post("mission_title"),
				'sub_topic' => $this->input->post("sub_topic"),
				'mission_description' => $this->input->post("mission_description"),
				'task_description' => $this->input->post("task_description"),
				'google_meet_password' => $this->input->post("google_meet_password"),
				'google_meet_link' => prep_url($this->input->post("google_meet_link")),
				'face_to_face' => $this->input->post("face_to_face"),
				'meeting_location' => $this->input->post("meeting_location"),
				'resource' => $this->input->post("resource"),
				'time_allocation_a' => $this->input->post("time_allocation_a"),
				'time_allocation_b' => $this->input->post("time_allocation_b"),
				'week' => $this->input->post("week"),
				'bank_of_competencies' => $this->input->post("boc_editor"),
				'publish_datetime' => $new_date_time,
				'deadline_datetime' => $new_date_time2,
				'phase_id' => $this->input->post("phase"),
				'target_peserta_didik_id' => $this->input->post("target_peserta_didik"),
				'jumlah_peserta_didik' => $this->input->post("jumlah_peserta_didik"),
				'metode_pembelajaran_id' => $this->input->post("metode_pembelajaran"),
				'kata_kunci' => $this->input->post("kata_kunci"),
				'keterampilan' => $this->input->post("keterampilan"),
				'pertanyaan_esensial' => $this->input->post("pertanyaan_esensial"),
				'refleksi_guru' => $this->input->post("refleksi_guru"),
				'daftar_pustaka' => $this->input->post("daftar_pustaka"),
			);
			$this->class_model->update_class_mission($data,$this->input->post("class_mission_id"));
			//update class start & finish time
			// $data = array(
			// 	'class_start_datetime' => $class_start_time,
			// 	'class_finish_datetime' => $class_finish_time
			// );
			// $update = $this->class_model->update_class($data,$this->input->post("class_id"));

			$core_skill = $this->input->post("core_skill");
			if(! empty ($core_skill)){
				$this->class_model->delete_class_mission_core_skill($this->input->post("class_mission_id"));
				for ($i = 0; $i < count($core_skill); $i++) {
					$data = array(
						'class_mission_id' => $this->input->post("class_mission_id"),
						'core_skill_id' => $core_skill[$i],
					);
					$this->class_model->insert_class_mission_core_skill($data);
				}
			}else{
				$this->class_model->delete_class_mission_core_skill($this->input->post("class_mission_id"));
			}

			$class_activity = $this->input->post("class_activity");
			if(! empty ($class_activity)){
				$this->class_model->delete_class_mission_class_activity($this->input->post("class_mission_id"));
				for ($i = 0; $i < count($class_activity); $i++) {
					$data = array(
						'class_mission_id' => $this->input->post("class_mission_id"),
						'class_activity_id' => $class_activity[$i],
					);
					$this->class_model->insert_class_mission_class_activity($data);
				}
			}else{
				$this->class_model->delete_class_mission_class_activity($this->input->post("class_mission_id"));
			}

			$pencapaian_tujuan_pembelajaran = $this->input->post("pencapaian_tujuan_pembelajaran");
			if(! empty ($pencapaian_tujuan_pembelajaran)){
				$this->class_model->delete_class_mission_pencapaian_tujuan_pembelajaran($this->input->post("class_mission_id"));
				for ($i = 0; $i < count($pencapaian_tujuan_pembelajaran); $i++) {
					$data = array(
						'class_mission_id' => $this->input->post("class_mission_id"),
						'pencapaian_tujuan_pembelajaran_id' => $pencapaian_tujuan_pembelajaran[$i],
					);
					$this->class_model->insert_class_mission_pencapaian_tujuan_pembelajaran($data);
				}
			}else{
				$this->class_model->delete_class_mission_pencapaian_tujuan_pembelajaran($this->input->post("class_mission_id"));
			}

			$profil_pembelajaran_pancasila = $this->input->post("profil_pembelajaran_pancasila");
			if(! empty ($profil_pembelajaran_pancasila)){
				$this->class_model->delete_class_mission_profil_pembelajaran_pancasila($this->input->post("class_mission_id"));
				for ($i = 0; $i < count($profil_pembelajaran_pancasila); $i++) {
					$data = array(
						'class_mission_id' => $this->input->post("class_mission_id"),
						'profil_pembelajaran_pancasila_id' => $profil_pembelajaran_pancasila[$i],
					);
					$this->class_model->insert_class_mission_profil_pembelajaran_pancasila($data);
				}
			}else{
				$this->class_model->delete_class_mission_profil_pembelajaran_pancasila($this->input->post("class_mission_id"));
			}
			
			$this->class_model->delete_class_mission_link($this->input->post("class_mission_id"));
			$link_name = $this->input->post("linkname");
			if(! empty ($link_name)){
				for ($i = 0; $i < count($link_name); $i++) {
					$data = array(
						'class_mission_id' => $this->input->post("class_mission_id"),
						'name' => $this->input->post("linkname")[$i],
						'link' => $this->input->post("linkvideo")[$i]
					);
					$this->class_model->insert_class_mission_link($data);
				}
			}

			$this->class_model->delete_class_mission_lesson_activities($this->input->post("class_mission_id"));
			$title = $this->input->post("title");
			if(! empty ($title)){
				for ($i = 0; $i < count($title); $i++) {
					$data = array(
						'class_mission_id' => $this->input->post("class_mission_id"),
						'title' => $this->input->post("title")[$i],
						'description' => $this->input->post("desc")[$i],
						'description_2' => $this->input->post("desc_2")[$i]
					);
					$this->class_model->insert_class_mission_lesson_activities($data);
				}
			}

			$this->learning_objectives_model->delete_class_mission_learning_objectives($this->input->post("class_mission_id"));
			$content = $this->input->post("content");
			if(! empty ($content)){
				for ($i = 0; $i < count($content); $i++) {
					$data = array(
						'class_mission_id' => $this->input->post("class_mission_id"),
						'content' => $this->input->post("content")[$i],
						'is_manual' => 1
					);
					$this->learning_objectives_model->insert_class_mission_learning_objectives($data);
				}
			}
			$this->class_model->delete_class_mission_res($this->input->post("class_mission_id"));
			$link_name = $this->input->post("linkname_res");
			if(! empty ($link_name)){
			for ($i = 0; $i < count($link_name); $i++) {
				$data = array(
					'class_mission_id' => $this->input->post("class_mission_id"),
					'name' => $this->input->post("linkname_res")[$i],
					'link' => $this->input->post("linkvideo_res")[$i]
				);
				$this->class_model->insert_class_mission_res($data);
			}
			}
			//core concept
			$core_concept = $this->input->post("contentcc");
			if(! empty ($core_concept)){
				$this->class_model->delete_class_mission_core_concept($this->input->post("class_mission_id"));
				for ($i = 0; $i < count($core_concept); $i++) {
					$data = array(
						'class_mission_id' => $this->input->post("class_mission_id"),
						'content' => $core_concept[$i],
					);
					$this->class_model->insert_class_mission_core_concept($data);
				}
			}else{
				$this->class_model->delete_class_mission_core_concept($this->input->post("class_mission_id"));
			}
			$sql = $this->class_model->get_class_mission_by_class_mission_id($this->input->post("class_mission_id"));
			if($sql->num_rows() > 0){
				$cm = $sql->first_row();
			}
			
			echo "{'message': 'Update meeting data success','mission_id': '".$cm->mission_id."'}";
		
	}
	
	public function update_class_mission_link(){
		$delete = $this->class_model->delete_class_mission_link($this->input->post("class_mission_id"));
		$link_name = $this->input->post("linkname");
		for ($i = 0; $i < count($link_name); $i++) {
			$data = array(
				'class_mission_id' => $this->input->post("class_mission_id"),
				'name' => $this->input->post("linkname")[$i],
				'link' => $this->input->post("linkvideo")[$i]
			);
			$this->class_model->insert_class_mission_link($data);
		}
		//echo $delete;
	}

	public function update_class_mission_resource(){
		$delete = $this->class_model->delete_class_mission_res($this->input->post("class_mission_id"));
		$link_name = $this->input->post("linkname");
		for ($i = 0; $i < count($link_name); $i++) {
			$data = array(
				'class_mission_id' => $this->input->post("class_mission_id"),
				'name' => $this->input->post("linkname")[$i],
				'link' => $this->input->post("linkvideo")[$i]
			);
			$this->class_model->insert_class_mission_res($data);
		}
		//echo $delete;
	}

	public function update_class_mission_lesson_activities(){
		$delete = $this->class_model->delete_class_mission_lesson_activities($this->input->post("class_mission_id"));
		$title = $this->input->post("title");
		for ($i = 0; $i < count($title); $i++) {
			$data = array(
				'class_mission_id' => $this->input->post("class_mission_id"),
				'title' => $this->input->post("title")[$i],
				'description' => $this->input->post("desc")[$i],
				'description_2' => $this->input->post("desc_2")[$i],
			);
			$this->class_model->insert_class_mission_lesson_activities($data);
		}
		//echo $delete;
	}

	public function update_class_mission_learning_objectives_manual(){
		$delete = $this->learning_objectives_model->delete_class_mission_learning_objectives($this->input->post("class_mission_id"));
		$content = $this->input->post("content");
		for ($i = 0; $i < count($content); $i++) {
			$data = array(
				'class_mission_id' => $this->input->post("class_mission_id"),
				'content' => $this->input->post("content")[$i],
				'is_manual' => 1
			);
			$this->learning_objectives_model->insert_class_mission_learning_objectives($data);
		}
		//echo $delete;
	}

	public function update_class_mission_core_concept(){
		$delete = $this->class_model->delete_class_mission_core_concept($this->input->post("class_mission_id"));
		$content = $this->input->post("content");
		for ($i = 0; $i < count($content); $i++) {
			$data = array(
				'class_mission_id' => $this->input->post("class_mission_id"),
				'content' => $this->input->post("content")[$i]
			);
			$this->class_model->insert_class_mission_core_concept($data);
		}
		//echo $delete;
	}

	public function update_class_mission_learning_objectives_not_manual(){
		$delete = $this->learning_objectives_model->delete_class_mission_learning_objectives($this->input->post("class_mission_id"));
		$content = $this->input->post("content");
		for ($i = 0; $i < count($content); $i++) {
			$data = array(
				'class_mission_id' => $this->input->post("class_mission_id"),
				'content' => $this->input->post("content")[$i],
				'is_manual' => 0
			);
			$this->learning_objectives_model->insert_class_mission_learning_objectives($data);
		}
		//echo $delete;
	}
	
	public function delete_class_mission(){
		$sql = $this->class_model->get_class_mission_by_class_mission_id($this->input->post("class_mission_id"));
		if ($sql->num_rows() > 0) {
			$class_mission = $sql->first_row();
		}
		$class_id = $class_mission->class_id;
		$sql = $this->class_model->get_class_mission_participants($this->input->post("class_mission_id"));
		if ($sql->num_rows() > 0) {
			$this->class_model->delete_class_mission_participants($this->input->post("class_mission_id"));
		}
		
		$this->class_model->delete_class_mission_sdg_indicator($this->input->post("class_mission_id"));
		$this->class_model->delete_class_mission_lesson_activities($this->input->post("class_mission_id"));
		$this->learning_objectives_model->delete_class_mission_learning_objectives($this->input->post("class_mission_id"));
		$this->class_model->delete_class_mission_res($this->input->post("class_mission_id"));
		$this->class_model->delete_class_mission($this->input->post("class_mission_id"));
		
		echo $class_id;
	}
	
	public function insert_class_mission_link(){
		$data = array(
			'class_mission_id' => $this->input->post("class_mission_id")
		);
		$this->class_model->insert_class_mission_link($data);
	}

	public function insert_class_mission_resource(){
		$data = array(
			'class_mission_id' => $this->input->post("class_mission_id")
		);
		$this->class_model->insert_class_mission_res($data);
	}

	public function insert_class_mission_lesson_activities(){
		$data = array(
			'class_mission_id' => $this->input->post("class_mission_id")
		);
		$this->class_model->insert_class_mission_lesson_activities($data);
	}

	public function insert_class_mission_learning_objectives(){
		$data = array(
			'class_mission_id' => $this->input->post("class_mission_id"),
			'is_manual' => 1
		);
		$this->learning_objectives_model->insert_class_mission_learning_objectives($data);
	}

	public function insert_class_mission_core_concept(){
		$data = array(
			'class_mission_id' => $this->input->post("class_mission_id")
		);
		$this->class_model->insert_class_mission_core_concept($data);
	}
	
	public function get_count_class_mission_link_by_class_mission_id(){
		$sql5 = $this->class_model->get_class_mission_link($this->input->post("class_mission_id"));
		echo $sql5->num_rows();
	}

	public function get_count_class_mission_res_by_class_mission_id(){
		$sql5 = $this->class_model->get_class_mission_res($this->input->post("class_mission_id"));
		echo $sql5->num_rows();
	}

	public function get_count_class_mission_lesson_activities_by_class_mission_id(){
		$sql5 = $this->class_model->get_count_class_mission_lesson_activities_by_class_mission_id($this->input->post("class_mission_id"));
		echo $sql5->num_rows();
	}

	public function get_count_class_mission_learning_objectives_by_class_mission_id(){
		$sql5 = $this->learning_objectives_model->get_class_mission_learning_objectives_by_class_mission_id($this->input->post("class_mission_id"));
		echo $sql5->num_rows();
	}

	public function get_count_class_mission_core_concept_by_class_mission_id(){
		$sql = $this->class_model->get_class_mission_core_concept($this->input->post("class_mission_id"));
		echo $sql->num_rows();
	}
	
	public function update_attendance(){
		$attendance = 0;
		if($this->input->post("checked") == "true"){
			$attendance = 1;
		}else if($this->input->post("checked") == "false"){
			$attendance = 0;
		}
		date_default_timezone_set('Asia/Jakarta'); 
		$now = date('Y-m-d H:i:s');
		$data = array(
			'attendance' => $attendance,
			'attendance_datetime' => $now
		);
		$update = $this->class_model->update_attendance($data,$this->input->post("class_mission_participants_id"));
		if($update == 1){
			echo $attendance;
		}
	}
	
	public function update_task_review(){
		$data = array(
			'task_review' => $this->input->post("task_review")
		);
		$this->class_model->update_class_mission_participants_task_review($data,$this->input->post("class_mission_participants_id"));
		date_default_timezone_set('Asia/Jakarta'); 
		$now = date('Y-m-d H:i:s');
		$data = array(
			"class_mission_participants_id" => $this->input->post("class_mission_participants_id"),
			"status_task_id" => 3,
			"datetime" => $now
		);
		$this->class_model->insert_status_task_class_mission_participants($data);
		echo "Task Uploaded";
	}
	
	public function update_progress_report(){
		$data = array(
			"progress_report" => $this->input->post('progress_report')
		);
		$this->class_model->update_class_strength_capture($data,$this->input->post('class_strength_capture_teacher_id'));
	}
	
	public function update_status_class(){
		if($this->input->post("status_class_id") == 1){
			$class_mission = NULL;
			$sql1 = $this->class_model->get_class_mission_by_class_id($this->input->post("class_id"));
			if ($sql1->num_rows() > 0) {
				$class_mission = $sql1->result();
				foreach($class_mission as $cm){
					if($cm->mission_title == ""){
						echo "failed";
						return;
					}else if($cm->task_description == ""){
						echo "failed";
						return;
					}else if($cm->face_to_face == 1){
						if($cm->meeting_location == ""){
							echo "failed";
							return;
						}
					}else if($cm->face_to_face == 0){
						if($cm->google_meet_link == ""){
							echo "failed";
							return;
						}
					}
				}
				$data = array(
					"class_id" => $this->input->post("class_id"),
					"status_class_id" => $this->input->post("status_class_id")
				);
				$this->class_model->insert_status_class($data);
				date_default_timezone_set('Asia/Jakarta'); 
				$now = date('Y-m-d H:i:s');
				$data = array(
					'class_start_datetime' => $now
				);
				$update = $this->class_model->update_class_start_datetime($data,$this->input->post("class_id"));
				echo "sukses";
			}
		}else if($this->input->post("status_class_id") == 2){
			$data = array(
				"class_id" => $this->input->post("class_id"),
				"status_class_id" => $this->input->post("status_class_id")
			);
			$this->class_model->insert_status_class($data);
			date_default_timezone_set('Asia/Jakarta'); 
			$now = date('Y-m-d H:i:s');
			$data = array(
				'class_finish_datetime' => $now
			);
			$update = $this->class_model->update_class_finish_datetime($data,$this->input->post("class_id"));
			echo "sukses";
		}
		else if($this->input->post("status_class_id") == 3){
			$data = array(
				"class_id" => $this->input->post("class_id"),
				"status_class_id" => $this->input->post("status_class_id")
			);
			$this->class_model->insert_status_class($data);
			echo "sukses";
		} 
	}
	
	public function insert_status_mission(){
		if($this->input->post("status_mission_id") == 1){
			$class_mission = NULL;
			$sql1 = $this->class_model->get_class_mission_by_class_mission_id($this->input->post("class_mission_id"));
			if ($sql1->num_rows() > 0) {
				$class_mission = $sql1->first_row();
				if($class_mission->mission_title == ""){
					echo "failed";
					return;
				}else if($class_mission->mission_description == ""){
					echo "failed";
					return;
				}else if($class_mission->task_description == ""){
					echo "failed";
					return;
				}
				$data = array(
					"class_mission_id" => $this->input->post("class_mission_id"),
					"status_mission_id" => $this->input->post("status_mission_id")
				);
				$sql = $this->class_model->get_class_mission_by_class_id($this->input->post("class_id"));
				if ($sql->num_rows() > 0) {
					if ($sql->result()[0]->class_mission_id == $this->input->post("class_mission_id")) {
						//check status class
						$status_class = 0;
						$sql = $this->class_model->get_status_class($this->input->post("class_id"));
						if ($sql->num_rows() > 0) {
							//if first mission can start
							$this->class_model->insert_status_mission($data);
						}else{
							//if first mission can start
							$this->class_model->insert_status_mission($data);
							//Start class
							$data = array(
								"class_id" => $this->input->post("class_id"),
								"status_class_id" => 1
							);
							$this->class_model->insert_status_class($data);
						}
						echo "sukses";
					}else {
						//Check status mission before already finish
						for($i=0;$i<count($sql->result());$i++){
							if($sql->result()[$i]->class_mission_id == $this->input->post("class_mission_id")){
								$sql2 = $this->class_model->get_status_mission($sql->result()[$i-1]->class_mission_id);
								if ($sql2->num_rows() > 0) {
									if($sql2->first_row()->status_mission_id == 2){ // if status mission before finish can start next mission
										$this->class_model->insert_status_mission($data);
										echo "sukses";
									}else{
										echo "Finish the previous mission before starting this mission";
									}
								}else{
									echo "Finish the previous mission before starting this mission";
								}
							}
						}
					}
				}
				
			}
		}else if($this->input->post("status_mission_id") == 2){
			$data = array(
				"class_mission_id" => $this->input->post("class_mission_id"),
				"status_mission_id" => $this->input->post("status_mission_id")
			);
			$this->class_model->insert_status_mission($data);
			echo "sukses";
		}
		
	}
	
	public function insert_bsteams(){
		$id = $this->input->post('user_id');
		$sql = $this->class_model->get_class_strength_capture_teacher_by_class_id_user_id($this->input->post('class_id'),$id);
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
			$this->class_model->update_class_strength_capture_teacher($data,$class_strength_capture->class_strength_capture_teacher_id);
		}else{
			$this->class_model->insert_class_strength_capture_teacher($data);
		}
	}
	
	public function insert_strength(){
		$id = $this->input->post('user_id');
		$sql = $this->class_model->get_class_strength_capture_teacher_by_class_id_user_id($this->input->post('class_id'),$id);
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
			$this->class_model->update_strength_teacher($data,$class_strength_capture->class_strength_capture_teacher_id);
		}else{
			$this->class_model->insert_class_strength_capture_teacher($data);
		}
	}

	public function get_class_mission_files() {
		$id = $this->input->post('class_mission_participants_id');
		$query = $this->class_model->get_class_mission_participants_detail($id)->result();
		echo json_encode($query);
		return;
	}

	public function replace_class_mission_sdg_indicator() {
		if($this->input->post("is_true") == 1){
			$data = array(
				"class_mission_id" => $this->input->post("class_mission_id"),
				"sdg_indicator_id" => $this->input->post("sdg_indicator_id"),
				"is_true" => $this->input->post("is_true")
			);
			$this->sdg_indicator_model->insert_class_mission_sdg_indicator($data);
		}else{
			$this->sdg_indicator_model->delete_class_mission_sdg_indicator($this->input->post("class_mission_id"),$this->input->post("sdg_indicator_id"));
		}
    }
	
	public function replace_class_mission_learning_objectives() {
		if($this->input->post("is_true") == 1){
			$data = array(
				"class_mission_id" => $this->input->post("class_mission_id"),
				"content" => $this->input->post("learning_objectives_id"),
				"is_manual" => 0
			);
			$this->learning_objectives_model->insert_class_mission_learning_objectives($data);
		}else{
			$this->learning_objectives_model->delete_class_mission_learning_objectives_by_cmid_loid($this->input->post("class_mission_id"),$this->input->post("learning_objectives_id"));
		}
    }

	public function delete_class($class_id) {
		$this->class_model->delete_class($class_id);
		redirect("classes/");
    }

    public function call_main($view, $data = NULL) {
        $this->load->view('main/header');
        $this->load->view('main/navbar');
        $this->load->view('class/'.$view, $data);
		$this->load->view('main/footer');
    }

}