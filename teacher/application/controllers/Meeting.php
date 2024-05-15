<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meeting extends CI_Controller {

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
		$this->load->model('target_peserta_didik_model');
		$this->load->model('metode_pembelajaran_model');
		$this->load->model('phase_model');
		$this->load->model('pencapaian_tujuan_pembelajaran_model');
		$this->load->model('profil_pembelajaran_pancasila_model');
		$this->load->model('competencies_cambridge_model');
		$this->load->model('competencies_k13_model');
		$this->load->model('competencies_merdeka_model');
    }
	
	private function check_isvalidated(){
        if(! $this->session->userdata('logged_in')){
            redirect('login/');
        }
    }

	public function details($id) {
		$class_mission 						= new stdClass();
		$class_mission_lesson_activities 	= new stdClass();
		$class_mission_link 				= new stdClass();
		$class_mission_resource 			= new stdClass();
		$class_mission_learning_objectives 	= new stdClass();
		$class_mission_core_skill 			= new stdClass();
		$class_mission_class_activity 		= new stdClass();
		$class_mission_core_concept 		= new stdClass();
		$class_detail 						= new stdClass();
		$class_mission_pencapaian_tujuan_pembelajaran 	= new stdClass();
		$class_mission_profil_pembelajaran_pancasila 	= new stdClass();
		$class_mission_competencies_cambridge 			= new stdClass();
		$class_mission_competencies_k13 				= new stdClass();
		$class_mission_competencies_merdeka 			= new stdClass();
		$sql = $this->class_model->get_class_mission_by_class_mission_id($id);
		if ($sql->num_rows() > 0) {
			$class_mission = $sql->first_row();
			$sql = $this->class_model->get_class_by_class_id($class_mission->class_id);
			if($sql->num_rows() > 0){
				$class_detail = $sql->first_row();
			}
			// Change date format
			// Publish date time
			$class_mission->publish_datetime = $this->change_datetime_format_from_db($class_mission->publish_datetime);

			// Deadline date time
			$class_mission->deadline_datetime = $this->change_datetime_format_from_db($class_mission->deadline_datetime);

			// Assessment
			$sql = $this->class_model->get_class_mission_link($class_mission->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_link = $sql->result();
			}

			// Lesson Activities
			$sql = $this->class_model->get_count_class_mission_lesson_activities_by_class_mission_id($class_mission->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_lesson_activities = $sql->result();
			}

			// Resource
			$sql = $this->class_model->get_class_mission_res($class_mission->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_resource = $sql->result();
			}

			// Learning Objectives
			$sql = $this->learning_objectives_model->get_class_mission_learning_objectives_by_class_mission_id($class_mission->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_learning_objectives = $sql->result();
			}

			// Core Skill
			$sql = $this->class_model->get_class_mission_core_skill($class_mission->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_core_skill = $sql->result();
			}
			
			// Class Activity
			$sql = $this->class_model->get_class_mission_class_activity($class_mission->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_class_activity = $sql->result();
			}

			//Core Concept
			$sql = $this->class_model->get_class_mission_core_concept($class_mission->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_core_concept = $sql->result();
			}
			// phase
			$class_mission->phase = new stdClass();
			$sql = $this->phase_model->get_phase_by_id($class_mission->phase_id);
			if ($sql->num_rows() > 0) {
				$class_mission->phase = $sql->first_row();
			}
			// target peserta didik
			$class_mission->target_peserta_didik = new stdClass();
			$sql = $this->target_peserta_didik_model->get_target_peserta_didik_by_id($class_mission->target_peserta_didik_id);
			if ($sql->num_rows() > 0) {
				$class_mission->target_peserta_didik = $sql->first_row();
			}
			// metode pembelajaran
			$class_mission->metode_pembelajaran = new stdClass();
			$sql = $this->metode_pembelajaran_model->get_metode_pembelajaran_by_id($class_mission->metode_pembelajaran_id);
			if ($sql->num_rows() > 0) {
				$class_mission->metode_pembelajaran = $sql->first_row();
			}
			// pencapaian tujuan pembelajaran
			$sql = $this->class_model->get_class_mission_pencapaian_tujuan_pembelajaran($class_mission->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_pencapaian_tujuan_pembelajaran = $sql->result();
			}
			// profil_pembelajaran_pancasila
			$sql = $this->class_model->get_class_mission_profil_pembelajaran_pancasila($class_mission->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_profil_pembelajaran_pancasila = $sql->result();
				//echo json_encode($class_mission_profil_pembelajaran_pancasila);return;
			}

			$sql = $this->class_model->get_class_mission_competencies_cambridge_by_class_mission_id($class_mission->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_competencies_cambridge = $sql->result();
			}

			$sql = $this->class_model->get_class_mission_competencies_k13_by_class_mission_id($class_mission->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_competencies_k13 = $sql->result();
			}

			$sql = $this->class_model->get_class_mission_competencies_merdeka_by_class_mission_id($class_mission->class_mission_id);
			if ($sql->num_rows() > 0) {
				$class_mission_competencies_merdeka = $sql->result();
			}
		}
		
		$data = array(
			"class_detail" => $class_detail,
			"class_mission" => $class_mission,
			"class_mission_link" => $class_mission_link,
			"class_mission_lesson_activities" => $class_mission_lesson_activities,
			"class_mission_resource" => $class_mission_resource,
			"class_mission_learning_objectives" => $class_mission_learning_objectives,
			"class_mission_core_concept" => $class_mission_core_concept,
			"class_mission_class_activity" => $class_mission_class_activity,
			"class_mission_core_skill" => $class_mission_core_skill,
			"class_mission_pencapaian_tujuan_pembelajaran" => $class_mission_pencapaian_tujuan_pembelajaran,
			"class_mission_profil_pembelajaran_pancasila" => $class_mission_profil_pembelajaran_pancasila,
			"class_mission_competencies_cambridge" => $class_mission_competencies_cambridge,
			"class_mission_competencies_k13" => $class_mission_competencies_k13,
			"class_mission_competencies_merdeka" => $class_mission_competencies_merdeka,
		);
		$this->call_main('detail_meeting', $data);
		
		// if($mode == 0){
		// 	$this->call_main('detail_meeting', $data);
		// }else if($mode == 1){
		// 	$this->call_main('edit_meeting', $data);
		// }
	}

	public function edit($id = 0,$class_id = 0) {
		if($id == 0){
			$class_mission = new stdClass();
			$sql = $this->class_model->get_class_mission_by_class_id($class_id);
			if ($sql->num_rows() > 0) {
				$class_mission = $sql->last_row();
			}
			date_default_timezone_set('Asia/Jakarta'); 
			$now = date('Y-m-d H:i:s');
			$data = array(
				'class_id' => $class_id,
				'mission_id' => $class_mission->mission_id+1,
				'publish_datetime' => $now,
				'deadline_datetime' => $now,
			);
			$id = $this->class_model->insert_class_mission($data);
			redirect("meeting/edit/".$id."");
		}
		$sql = $this->class_model->get_class_mission_by_class_mission_id($id);
		if ($sql->num_rows() > 0) {
			$class_mission = $sql->first_row();
		}
		$class_id = $class_mission->class_id;
		$mission_id = $id;
		$class_detail = NULL;
		$sql = $this->class_model->get_class_by_class_id($class_id);
		if ($sql->num_rows() > 0) {
			$class_detail = $sql->first_row();
		}
		$class_mission = NULL;
		$sql1 = $this->class_model->get_class_mission_by_class_mission_id($id);
		if ($sql1->num_rows() > 0) {
			$class_mission = $sql1->result();
			//	echo json_encode($class_mission);return;
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
		$class_mission_competencies_cambridge = new stdClass();
		$class_mission_competencies_k13 = new stdClass();
		$class_mission_competencies_merdeka = new stdClass();
		$sql = $this->class_model->get_class_mission_competencies_cambridge_by_class_mission_id($mission_id);
		if ($sql->num_rows() > 0) {
			$class_mission_competencies_cambridge = $sql->result();
		}

		$sql = $this->class_model->get_class_mission_competencies_k13_by_class_mission_id($mission_id);
		if ($sql->num_rows() > 0) {
			$class_mission_competencies_k13 = $sql->result();
		}

		$sql = $this->class_model->get_class_mission_competencies_merdeka_by_class_mission_id($mission_id);
		if ($sql->num_rows() > 0) {
			$class_mission_competencies_merdeka = $sql->result();
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
			$cm->phase = new stdClass();
			$sql = $this->phase_model->get_phase_by_id($cm->phase_id);
			if ($sql->num_rows() > 0) {
				$cm->phase = $sql->first_row();
			}
			$cm->target_peserta_didik = new stdClass();
			$sql = $this->target_peserta_didik_model->get_target_peserta_didik_by_id($cm->target_peserta_didik_id);
			if ($sql->num_rows() > 0) {
				$cm->target_peserta_didik = $sql->first_row();
			}
			$cm->metode_pembelajaran = new stdClass();
			$sql = $this->metode_pembelajaran_model->get_metode_pembelajaran_by_id($cm->metode_pembelajaran_id);
			if ($sql->num_rows() > 0) {
				$cm->metode_pembelajaran = $sql->first_row();
			}
			$cm->class_mission_pencapaian_tujuan_pembelajaran = new stdClass();
			$sql = $this->class_model->get_class_mission_pencapaian_tujuan_pembelajaran($cm->class_mission_id);
			if ($sql->num_rows() > 0) {
				$cm->class_mission_pencapaian_tujuan_pembelajaran = $sql->result();
			}
			$cm->class_mission_profil_pembelajaran_pancasila = new stdClass();
			$sql = $this->class_model->get_class_mission_profil_pembelajaran_pancasila($cm->class_mission_id);
			if ($sql->num_rows() > 0) {
				$cm->class_mission_profil_pembelajaran_pancasila = $sql->result();
			}
			$cm->class_mission_competencies_cambridge = new stdClass();
			$sql = $this->class_model->get_class_mission_competencies_cambridge_by_class_mission_id($cm->class_mission_id);
			if ($sql->num_rows() > 0) {
				$cm->class_mission_competencies_cambridge = $sql->result();
			}
			$cm->class_mission_competencies_k13 = new stdClass();
			$sql = $this->class_model->get_class_mission_competencies_k13_by_class_mission_id($cm->class_mission_id);
			if ($sql->num_rows() > 0) {
				$cm->class_mission_competencies_k13 = $sql->result();
			}
			$cm->class_mission_competencies_merdeka = new stdClass();
			$sql = $this->class_model->get_class_mission_competencies_merdeka_by_class_mission_id($cm->class_mission_id);
			if ($sql->num_rows() > 0) {
				$cm->class_mission_competencies_merdeka = $sql->result();
			}
		}
		
		$class_mission_participants = NULL;
		$sql2 = $this->class_model->get_class_mission_participants_by_class_id($class_id);
		if ($sql2->num_rows() > 0) {
			$class_mission_participants = $sql2->result();
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

		//echo json_encode($class_detail->grade_subject_id);return;
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
		$sql = $this->teacher_specialty_model->get_grade_subject_by_teacher_specialty();
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
		$phase = new stdClass();
		$sql = $this->phase_model->get_phase();
		if ($sql->num_rows() > 0) {
			$phase = $sql->result();
		}
		$target_peserta_didik = new stdClass();
		$sql = $this->target_peserta_didik_model->get_target_peserta_didik();
		if ($sql->num_rows() > 0) {
			$target_peserta_didik = $sql->result();
		}
		$metode_pembelajaran = new stdClass();
		$sql = $this->metode_pembelajaran_model->get_metode_pembelajaran();
		if ($sql->num_rows() > 0) {
			$metode_pembelajaran = $sql->result();
		}
		$pencapaian_tujuan_pembelajaran = new stdClass();
		$sql = $this->pencapaian_tujuan_pembelajaran_model->get_pencapaian_tujuan_pembelajaran();
		if ($sql->num_rows() > 0) {
			$pencapaian_tujuan_pembelajaran = $sql->result();
		}
		$profil_pembelajaran_pancasila = new stdClass();
		$sql = $this->profil_pembelajaran_pancasila_model->get_profil_pembelajaran_pancasila();
		if ($sql->num_rows() > 0) {
			$profil_pembelajaran_pancasila = $sql->result();
		}
		$competencies_cambridge = new stdClass();
		$sql = $this->competencies_cambridge_model->get_competencies_cambridge_by_grade_id($class_detail->grade_id);
		if ($sql->num_rows() > 0) {
			$competencies_cambridge = $sql->result();
		}
		$competencies_k13 = new stdClass();
		$sql = $this->competencies_k13_model->get_competencies_k13_by_grade_id($class_detail->grade_id);
		if ($sql->num_rows() > 0) {
			$competencies_k13 = $sql->result();
		}
		$competencies_merdeka = new stdClass();
		$sql = $this->competencies_merdeka_model->get_competencies_merdeka_by_grade_id($class_detail->grade_id);
		if ($sql->num_rows() > 0) {
			$competencies_merdeka = $sql->result();
		}
		//echo json_encode($competencies_cambridge);return;
		
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
			"phase" => $phase,
			"target_peserta_didik" => $target_peserta_didik,
			"metode_pembelajaran" => $metode_pembelajaran,
			"pencapaian_tujuan_pembelajaran" => $pencapaian_tujuan_pembelajaran,
			"profil_pembelajaran_pancasila" => $profil_pembelajaran_pancasila,
			"competencies_cambridge" => $competencies_cambridge,
			"competencies_k13" => $competencies_k13,
			"competencies_merdeka" => $competencies_merdeka,
			"class_mission_competencies_cambridge" => $class_mission_competencies_cambridge,
			"class_mission_competencies_k13" => $class_mission_competencies_k13,
			"class_mission_competencies_merdeka" => $class_mission_competencies_merdeka,
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
		$this->call_main('add_meeting', $data);
	}

	public function save_competencies_cambridge(){
		$class_mission_id = $this->input->post("cmid");
		$competencies_cambridge_id = $this->input->post("ccid");
		$class_mission_competencies_cambridge = new stdClass();
        $sql = $this->class_model->get_class_mission_competencies_cambridge_by_class_mission_id_competencies_cambridge_id($class_mission_id,$competencies_cambridge_id);
        if($sql->num_rows() > 0){//delete
			$class_mission_competencies_cambridge = $sql->first_row();
			$this->class_model->delete_class_mission_competencies_cambridge($class_mission_competencies_cambridge->class_mission_competencies_cambridge_id);
            // $is_true = 1;
            // $class_mission_competencies_cambridge = $sql->first_row();
            // if($class_mission_competencies_cambridge->is_true == 1){
            //     $is_true = 0;
            // }
			// $data = array(
            //     'is_true' => $is_true,
            // );
			// $this->class_model->update_class_mission_competencies_cambridge($class_mission_competencies_cambridge->class_mission_competencies_cambridge_id,$data);
        }else{//insert
			$data = array(
				'class_mission_id' => $class_mission_id,
				'competencies_cambridge_id' => $competencies_cambridge_id,
				'is_true' => 1
			);
			$this->class_model->insert_class_mission_competencies_cambridge($data);
        }
    }

	public function save_competencies_k13(){
		$class_mission_id = $this->input->post("cmid");
		$competencies_k13_id = $this->input->post("ckid");
		$class_mission_competencies_k13 = new stdClass();
        $sql = $this->class_model->get_class_mission_competencies_k13_by_class_mission_id_competencies_k13_id($class_mission_id,$competencies_k13_id);
        if($sql->num_rows() > 0){//delete
			$class_mission_competencies_k13 = $sql->first_row();
			$this->class_model->delete_class_mission_competencies_k13($class_mission_competencies_k13->class_mission_competencies_k13_id);
        }else{//insert
			$data = array(
				'class_mission_id' => $class_mission_id,
				'competencies_k13_id' => $competencies_k13_id,
				'is_true' => 1
			);
			$this->class_model->insert_class_mission_competencies_k13($data);
        }
    }

	public function save_competencies_merdeka(){
		$class_mission_id = $this->input->post("cmid");
		$competencies_merdeka_id = $this->input->post("ccmid");
		$class_mission_competencies_merdeka = new stdClass();
        $sql = $this->class_model->get_class_mission_competencies_merdeka_by_class_mission_id_competencies_merdeka_id($class_mission_id,$competencies_merdeka_id);
        if($sql->num_rows() > 0){//delete
			$class_mission_competencies_merdeka = $sql->first_row();
			$this->class_model->delete_class_mission_competencies_merdeka($class_mission_competencies_merdeka->class_mission_competencies_merdeka_id);
        }else{//insert
			$data = array(
				'class_mission_id' => $class_mission_id,
				'competencies_merdeka_id' => $competencies_merdeka_id,
				'is_true' => 1
			);
			$this->class_model->insert_class_mission_competencies_merdeka($data);
        }
    }

	public function delete_class_mission_learning_objectives(){
		$this->learning_objectives_model->delete_class_mission_learning_objectives_by_id($this->input->post("class_mission_learning_objectives_id"));
    }

	public function delete_class_mission_lesson_activity(){
		$this->class_model->delete_class_mission_lesson_activities_by_id($this->input->post("class_mission_lesson_activities_id"));
    }

	public function delete_class_mission_link(){
		$this->class_model->delete_class_mission_link_by_id($this->input->post("class_mission_link_id"));
    }

	public function delete_class_mission_res(){
		$this->class_model->delete_class_mission_res_by_id($this->input->post("class_mission_resource_id"));
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

    public function call_main($view, $data = NULL) {
        $this->load->view('main/header');
        $this->load->view('main/navbar');
        $this->load->view('meeting/'.$view, $data);
		$this->load->view('main/footer');
    }

}