<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class download_pdf extends CI_Controller {

    public function __construct() {
        parent ::__construct();
        //load model
		$this->check_isvalidated();
		//load model
        $this->load->model('class_model');
        $this->load->model('subject_model');
        $this->load->model('user_model');
        $this->load->model('strength_model');
		$this->load->model('learning_objectives_model');
		$this->load->model('core_skill_model');
		$this->load->model('class_activity_model');
		$this->load->model('target_peserta_didik_model');
		$this->load->model('metode_pembelajaran_model');
		$this->load->model('phase_model');
		$this->load->model('pencapaian_tujuan_pembelajaran_model');
		$this->load->model('profil_pembelajaran_pancasila_model');
    }
	
	private function check_isvalidated(){
        if(! $this->session->userdata('logged_in')){
            redirect('/login');
        }
    }
	
	public function index() {
		$data = null;
		$this->call_main('index',$data);
    }
	
	public function lesson_plan($class_id,$class_mission_id) {
		$class_detail = new stdClass();
		$sql = $this->class_model->get_class_by_class_id($class_id);
		if ($sql->num_rows() > 0) {
			$class_detail = $sql->first_row();
		}
		$class_mission = new stdClass();
		$sql1 = $this->class_model->get_class_mission_by_class_mission_id($class_mission_id);
		if ($sql1->num_rows() > 0) {
			$class_mission = $sql1->first_row();
		}
		$class_mission->class_mission_sdg_indicator = $this->class_model->get_class_mission_sdg_indicator($class_mission_id)->result();

		$class_mission->class_mission_learning_objectives = $this->learning_objectives_model->get_class_mission_learning_objectives_by_class_mission_id($class_mission_id)->result();
		foreach($class_mission->class_mission_learning_objectives as $cmlo){
			if($cmlo->is_manual == 0){
				$cmlo->name = $this->learning_objectives_model->get_learning_objectives_by_learning_objectives_id($cmlo->content)->first_row()->learning_objectives_name;
			}else{
				$cmlo->name = $cmlo->content;
			}
		}

		//CLASS MISSION LINK
		$class_mission_link_arr = array();
		$sql5 = $this->class_model->get_class_mission_link($class_mission_id);
		if ($sql5->num_rows() > 0) {
			$class_mission_link = $sql5->result();
			array_push($class_mission_link_arr,$class_mission_link);
		}

		//CLASS MISSION LESSON ACTIVITIES
		$class_mission_lesson_activities_arr = array();
		$sql6 = $this->class_model->get_count_class_mission_lesson_activities_by_class_mission_id($class_mission->class_mission_id);
		if ($sql6->num_rows() > 0) {
			$class_mission_lesson_activities = $sql6->result();
			array_push($class_mission_lesson_activities_arr,$class_mission_lesson_activities);
		}
		$class_mission_core_skill 			= new stdClass();
		$class_mission_class_activity 		= new stdClass();
		$class_mission_core_concept 		= new stdClass();
		$class_mission_pencapaian_tujuan_pembelajaran = new stdClass();
		$class_mission_profil_pembelajaran_pancasila = new stdClass();

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
		$class_mission_competencies_cambridge = new stdClass();
		$class_mission_competencies_k13 = new stdClass();
		$class_mission_competencies_merdeka = new stdClass();
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
		
		$data = array(
			"detail" => $class_detail,
			"title"=> $class_detail->subject_name." ".$class_detail->grade_name." ".$class_detail->academy_year_name." Week ".$class_mission->week,
			"cm" => $class_mission,
			"class_mission_link" => $class_mission_link_arr,
			"class_mission_lesson_activities" => $class_mission_lesson_activities_arr,
			"class_mission_core_concept" => $class_mission_core_concept,
			"class_mission_class_activity" => $class_mission_class_activity,
			"class_mission_core_skill" => $class_mission_core_skill,
			"class_mission_pencapaian_tujuan_pembelajaran" => $class_mission_pencapaian_tujuan_pembelajaran,
			"class_mission_profil_pembelajaran_pancasila" => $class_mission_profil_pembelajaran_pancasila,
			"class_mission_competencies_cambridge" => $class_mission_competencies_cambridge,
			"class_mission_competencies_k13" => $class_mission_competencies_k13,
			"class_mission_competencies_merdeka" => $class_mission_competencies_merdeka,
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

		// Get Day from Datetime MySQL
		$timestamp = strtotime($data['cm']->publish_datetime);
		$data['cm']->week_number = date('W', $timestamp); // week number from 1 year
		$data['cm']->day = date('D', $timestamp); // thu
		//$data['cm']->day = date('l', $timestamp); // thurdsay
		
		// Change date format
		$datetime = $this->change_datetime_format_from_db($data['cm']->publish_datetime);
		$params = explode(" - ", $datetime);
		$new_date = $params[0];
		$new_time = $params[1];

		$data['cm']->publish_date = $new_date;
		$data['cm']->publish_time = $new_time;
		
		$datetime = $this->change_datetime_format_from_db($data['cm']->deadline_datetime);
		$params = explode(" - ", $datetime);
		$new_date = $params[0];
		$new_time = $params[1];

		$data['cm']->deadline_date = $new_date;
		$data['cm']->deadline_time = $new_time;
		
		$this->call_main('lesson_plan', $data);
    }

	public function check_class_available() {
		$academy_year = $this->input->post("academy_year");
		$grade_subject = $this->input->post("grade_subject");
		$semester = null;
		if($this->input->post("semester")){
			$semester = $this->input->post("semester");
		}
		$class_detail = array();
		$sql = $this->class_model->get_class_for_download($academy_year,$grade_subject,$semester);
		if ($sql->num_rows() > 0) {
			$class_detail = $sql->result();
			foreach($class_detail as $key => $c){
				//status class
				$sql = $this->class_model->get_status_class($c->class_id);
				if ($sql->num_rows() > 0) {
					$status = $sql->first_row();
					$c->status = $status->status_class_id;
				}else{
					$c->status = 0;
				}
				if($c->status == 3){
					unset($class_detail[$key]);
				}
			}
			if( empty($class_detail)){
				echo "null";
				return;
			}
			echo "not null";
			return;
		}else{
			echo "null";
			return;
		}
	}

	public function promes($academy_year,$grade_subject,$semester) {
		$class_detail = array();
		$sql = $this->class_model->get_class_for_download($academy_year,$grade_subject,$semester);
		if ($sql->num_rows() > 0) {
			$class_detail = $sql->result();
			foreach($class_detail as $key => $c){
				//status class
				$sql = $this->class_model->get_status_class($c->class_id);
				if ($sql->num_rows() > 0) {
					$status = $sql->first_row();
					$c->status = $status->status_class_id;
				}else{
					$c->status = 0;
				}
				if($c->status == 3){
					unset($class_detail[$key]);
				}
			}
			foreach($class_detail as $c){
				$sql = $this->class_model->get_class_mission_by_class_id($c->class_id);
				if ($sql->num_rows() > 0) {
					$c->class_mission = $sql->result();
					foreach($c->class_mission as $cm){
						// $cm->mission_title_trim_lwr = trim($cm->mission_title);
						// $cm->mission_title_trim_lwr = strtolower($cm->mission_title_trim_lwr);
						// Class mission date in month
						$month = date('F', strtotime($cm->publish_datetime));
						$cm->mission_month = $month;
	
						// Learning objectives
						$cm->class_mission_learning_objectives = new stdClass();
						$cm->class_mission_learning_objectives = $this->learning_objectives_model->get_class_mission_learning_objectives_by_class_mission_id($cm->class_mission_id)->result();
						foreach($cm->class_mission_learning_objectives as $cmlo){
							if($cmlo->is_manual == 0){
								$cmlo->name = $this->learning_objectives_model->get_learning_objectives_by_learning_objectives_id($cmlo->content)->first_row()->learning_objectives_name;
							}else{
								$cmlo->name = $cmlo->content;
							}
						}
	
						//CLASS MISSION LINK
						$cm->class_mission_link = new stdClass();
						$sql = $this->class_model->get_class_mission_link($cm->class_mission_id);
						if ($sql->num_rows() > 0) {
							$cm->class_mission_link = $sql->result();
						}
	
						//CLASS MISSION RESOURCES
						$cm->class_mission_res = new stdClass();
						$sql = $this->class_model->get_class_mission_res($cm->class_mission_id);
						if ($sql->num_rows() > 0) {
							$cm->class_mission_res = $sql->result();
						}
	
						//CLASS MISSION LESSON ACTIVITIES
						$cm->class_mission_lesson_activities = new stdClass();
						$sql = $this->class_model->get_count_class_mission_lesson_activities_by_class_mission_id($cm->class_mission_id);
						if ($sql->num_rows() > 0) {
							$cm->class_mission_lesson_activities = $sql->result();
						}
	
						// profil_pembelajaran_pancasila
						$cm->class_mission_profil_pembelajaran_pancasila_arr = new stdClass();
						$sql = $this->class_model->get_class_mission_profil_pembelajaran_pancasila($cm->class_mission_id);
						if ($sql->num_rows() > 0) {
							$cm->class_mission_profil_pembelajaran_pancasila_arr = $sql->result();
							//echo json_encode($class_mission_profil_pembelajaran_pancasila);return;
						}
	
						$cm->class_mission_competencies_cambridge = new stdClass();
						$cm->class_mission_competencies_k13 = new stdClass();
						$cm->class_mission_competencies_merdeka = new stdClass();
						$sql = $this->class_model->get_class_mission_competencies_cambridge_by_class_mission_id($cm->class_mission_id);
						if ($sql->num_rows() > 0) {
							$cm->class_mission_competencies_cambridge = $sql->result();
						}
	
						$sql = $this->class_model->get_class_mission_competencies_k13_by_class_mission_id($cm->class_mission_id);
						if ($sql->num_rows() > 0) {
							$cm->class_mission_competencies_k13 = $sql->result();
						}
	
						$sql = $this->class_model->get_class_mission_competencies_merdeka_by_class_mission_id($cm->class_mission_id);
						if ($sql->num_rows() > 0) {
							$cm->class_mission_competencies_merdeka = $sql->result();
						}
					}
					$total_jp = 0;
					foreach($c->class_mission as $cm){
						$total_jp = $cm->time_allocation_a + $total_jp;
					}
					foreach($c->class_mission as $cm){
						$cm->total_jp = $total_jp;
					}
				}
			}
		}else{
			$this->session->set_flashdata('category_error', 'Data not found');
			redirect('classes');
		}
		
		$data = array(
			"detail" => $class_detail,
			"title"=> $class_detail[0]->subject_name." ".$class_detail[0]->grade_name." ".$class_detail[0]->academy_year_name." ".$class_detail[0]->semester_name,
		);
		
		$this->call_main('promes', $data);
    }

	public function prota($academy_year,$grade_subject) {
		// $academy_year = $this->input->post("academy_year_prota");
		// $grade_subject = $this->input->post("grade_subject_prota");
		$class_detail = array();
		$sql = $this->class_model->get_class_for_download($academy_year,$grade_subject);
		if ($sql->num_rows() > 0) {
			$class_detail = $sql->result();
			foreach($class_detail as $key => $c){
				//status class
				$sql = $this->class_model->get_status_class($c->class_id);
				if ($sql->num_rows() > 0) {
					$status = $sql->first_row();
					$c->status = $status->status_class_id;
				}else{
					$c->status = 0;
				}
				if($c->status == 3){
					unset($class_detail[$key]);
				}
			}
			$quantities = [];
			foreach($class_detail as $c){
				$sql = $this->class_model->get_class_mission_by_class_id($c->class_id);
				if ($sql->num_rows() > 0) {
					$c->class_mission = $sql->result();
				}
				foreach($c->class_mission as $cm){
					$cm->mission_title_trim_lwr = trim($cm->mission_title);
					$cm->mission_title_trim_lwr = strtolower($cm->mission_title_trim_lwr);
					
					$key = $cm->mission_title_trim_lwr; // fields you want to compare
					if ( !isset($quantities[$key]) ) {
						$quantities[$key] = $cm;
					} else {
						$quantities[$key]->time_allocation_a += $cm->time_allocation_a;
					}
					$quantities[$key]->semester_name = $c->semester_name;
					$quantities[$key]->term_name = $c->term_name;
					$quantities[$key]->semester_order = $c->semester_order;
				}
			}
			$products = array_values($quantities);
			// $columns = array_column($products, 'semester_order');
			// array_multisort($columns, SORT_ASC, $products);
		}else{
			$this->session->set_flashdata('category_error', 'Data not found');
			redirect('classes');
		}
		
		$data = array(
			"class_detail" => $class_detail,
			"detail" => $products,
			"title"=> $class_detail[0]->subject_name." ".$class_detail[0]->grade_name." ".$class_detail[0]->academy_year_name,
		);
		
		$this->call_main('prota', $data);
    }

	public function syllabus($academy_year,$grade_subject,$semester) {
		$class_detail = array();
		$sql = $this->class_model->get_class_for_download($academy_year,$grade_subject,$semester);
		if ($sql->num_rows() > 0) {
			$class_detail = $sql->result();
			foreach($class_detail as $key => $c){
				//status class
				$sql = $this->class_model->get_status_class($c->class_id);
				if ($sql->num_rows() > 0) {
					$status = $sql->first_row();
					$c->status = $status->status_class_id;
				}else{
					$c->status = 0;
				}
				if($c->status == 3){
					unset($class_detail[$key]);
				}
			}
			foreach($class_detail as $c){
				$sql = $this->class_model->get_class_mission_by_class_id($c->class_id);
				if ($sql->num_rows() > 0) {
					$c->class_mission = $sql->result();
					foreach($c->class_mission as $cm){
						// Class mission date in month
						$month = date('F', strtotime($cm->publish_datetime));
						$cm->mission_month = $month;
	
						// Learning objectives
						$cm->class_mission_learning_objectives = new stdClass();
						$cm->class_mission_learning_objectives = $this->learning_objectives_model->get_class_mission_learning_objectives_by_class_mission_id($cm->class_mission_id)->result();
						foreach($cm->class_mission_learning_objectives as $cmlo){
							if($cmlo->is_manual == 0){
								$cmlo->name = $this->learning_objectives_model->get_learning_objectives_by_learning_objectives_id($cmlo->content)->first_row()->learning_objectives_name;
							}else{
								$cmlo->name = $cmlo->content;
							}
						}
	
						//CLASS MISSION LINK
						$cm->class_mission_link = new stdClass();
						$sql = $this->class_model->get_class_mission_link($cm->class_mission_id);
						if ($sql->num_rows() > 0) {
							$cm->class_mission_link = $sql->result();
						}
	
						//CLASS MISSION RESOURCES
						$cm->class_mission_res = new stdClass();
						$sql = $this->class_model->get_class_mission_res($cm->class_mission_id);
						if ($sql->num_rows() > 0) {
							$cm->class_mission_res = $sql->result();
						}
	
						//CLASS MISSION LESSON ACTIVITIES
						$cm->class_mission_lesson_activities = new stdClass();
						$sql = $this->class_model->get_count_class_mission_lesson_activities_by_class_mission_id($cm->class_mission_id);
						if ($sql->num_rows() > 0) {
							$cm->class_mission_lesson_activities = $sql->result();
						}
	
						// profil_pembelajaran_pancasila
						$cm->class_mission_profil_pembelajaran_pancasila_arr = new stdClass();
						$sql = $this->class_model->get_class_mission_profil_pembelajaran_pancasila($cm->class_mission_id);
						if ($sql->num_rows() > 0) {
							$cm->class_mission_profil_pembelajaran_pancasila_arr = $sql->result();
							//echo json_encode($class_mission_profil_pembelajaran_pancasila);return;
						}
	
						$cm->class_mission_competencies_cambridge = new stdClass();
						$cm->class_mission_competencies_k13 = new stdClass();
						$cm->class_mission_competencies_merdeka = new stdClass();
						$sql = $this->class_model->get_class_mission_competencies_cambridge_by_class_mission_id($cm->class_mission_id);
						if ($sql->num_rows() > 0) {
							$cm->class_mission_competencies_cambridge = $sql->result();
						}
	
						$sql = $this->class_model->get_class_mission_competencies_k13_by_class_mission_id($cm->class_mission_id);
						if ($sql->num_rows() > 0) {
							$cm->class_mission_competencies_k13 = $sql->result();
						}
	
						$sql = $this->class_model->get_class_mission_competencies_merdeka_by_class_mission_id($cm->class_mission_id);
						if ($sql->num_rows() > 0) {
							$cm->class_mission_competencies_merdeka = $sql->result();
						}
					}
					$total_jp = 0;
					foreach($c->class_mission as $cm){
						$total_jp = $cm->time_allocation_a + $total_jp;
					}
					foreach($c->class_mission as $cm){
						$cm->total_jp = $total_jp;
					}
				}
			}
		}else{
			$this->session->set_flashdata('category_error', 'Data not found');
			redirect('classes');
		}
		
		$data = array(
			"detail" => $class_detail,
			"title"=> $class_detail[0]->subject_name." ".$class_detail[0]->grade_name." ".$class_detail[0]->academy_year_name." Syllabus ".$class_detail[0]->semester_name,
		);
		
		$this->call_main('syllabus', $data);
    }

	public function check_class_available_for_learning_guide() {
		// $this->input->post("academy_year_promes");
		$academy_year = $this->input->post("academy_year");
		$grade = $this->input->post("grade");
		$term = $this->input->post("term");
		$class = array();
		$sql = $this->class_model->get_class_for_learning_guide($academy_year,$grade,$term);
		if ($sql->num_rows() > 0) {
			$class = $sql->result();
			foreach($class as $key => $c){
				//status class
				$sql = $this->class_model->get_status_class($c->class_id);
				if ($sql->num_rows() > 0) {
					$status = $sql->first_row();
					$c->status = $status->status_class_id;
				}else{
					$c->status = 0;
				}
				if($c->status == 3){
					unset($class[$key]);
				}
			}
			if( empty($class)){
				echo "null";
				return;
			}
			echo "not null";
			return;
		}else{
			echo "null";
			return;
		}
	}

	public function learning_guide($academy_year,$grade,$term,$week) {
		$class = array();
		$sql = $this->class_model->get_class_for_learning_guide($academy_year,$grade,$term);
		if ($sql->num_rows() > 0) {
			$class = $sql->result();
			foreach($class as $key => $c){
				//status class
				$sql = $this->class_model->get_status_class($c->class_id);
				if ($sql->num_rows() > 0) {
					$status = $sql->first_row();
					$c->status = $status->status_class_id;
				}else{
					$c->status = 0;
				}
				if($c->status == 3){
					unset($class[$key]);
				}
			}
			foreach ( $class as $c ) {
				$sql = $this->class_model->get_class_mission_by_class_id($c->class_id);
				if ($sql->num_rows() > 0) {
					$class_mission = $sql->result();
					$c->core_skill 		= array();
					$c->class_activity 	= array();
					$c->core_concept 	= array();
					foreach ( $class_mission as $cm ) {
						if($cm->week == $week){
							$cm->subject_id = $c->subject_id;
							$sql = $this->class_model->get_class_mission_core_skill($cm->class_mission_id);
							if ($sql->num_rows() > 0) {
								array_push($c->core_skill ,$sql->result());
							}
							$sql = $this->class_model->get_class_mission_class_activity($cm->class_mission_id);
							if ($sql->num_rows() > 0) {
								array_push($c->class_activity ,$sql->result());
							}
							$sql = $this->class_model->get_class_mission_core_concept($cm->class_mission_id);
							if ($sql->num_rows() > 0) {
								array_push($c->core_concept ,$sql->result());
							}
						}
					}
				}
			}
		}else{
			$this->session->set_flashdata('category_error', 'Data not found');
			redirect('classes');
		}
		
		$data = array(
			"detail" => $class,
			"week" => $week,
			"title"=> $class[0]->subject_name." ".$class[0]->grade_name." ".$class[0]->academy_year_name." Week ".$week." ".$class[0]->term_name,
		);
		
		$this->call_main('learning_guide', $data);
    }

	public function change_datetime_format_from_db($datetime) {
        // $new_Date = substr_replace($datetime,"",10);
        $new_Date = date("j F Y - H:i", strtotime($datetime)); //20 February 2020
        return $new_Date;
    }

    public function call_main($view, $data = NULL) {
        $this->load->view('main/header',$data);
		$this->load->view('download/'.$view, $data);
    }
}