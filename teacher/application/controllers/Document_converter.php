<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class document_converter extends CI_Controller {

    public function __construct() {
        parent ::__construct();
		$this->check_isvalidated();
        
        //load model
        $this->load->model('term_model');
		$this->load->model('class_model');
		$this->load->model('grade_model');
		$this->load->model('academy_year_model');
		$this->load->model('grade_subject_model');
		$this->load->model('semester_model');
		$this->load->model('grade_subject_model');
    }
	
	private function check_isvalidated(){
        if(! $this->session->userdata('logged_in')){
            redirect('/login');
        }
    }
	
	// public function index() {
    //     // term
	// 	$term = new stdClass();
	// 	$sql = $this->term_model->get_term();
	// 	if ($sql->num_rows() > 0) {
	// 		$term = $sql->result();
	// 	}
	// 	// grade
	// 	$grade = new stdClass();
	// 	$sql = $this->grade_model->get_grade();
	// 	if ($sql->num_rows() > 0) {
	// 		$grade = $sql->result();
	// 	}
	// 	// academy year
	// 	$academy_year = new stdClass();
	// 	$grade_subject = new stdClass();
	// 	$teacher_specialty = new stdClass();
	// 	$sql = $this->class_model->get_class();
	// 	$class = array();
	// 	$class_new = array();
	// 	if ($sql->num_rows() > 0) {
	// 		$class = $sql->result();
	// 		//status class
	// 		for($i=0;$i<count($class);$i++){
	// 			$sql = $this->class_model->get_status_class($class[$i]->class_id);
	// 			if ($sql->num_rows() > 0) {
	// 				$status = $sql->first_row();
	// 				$class[$i]->status = $status->status_class_id;
	// 			}else{
	// 				$class[$i]->status = 0;
	// 			}
	// 		}
	// 		for($i=0;$i<count($class);$i++){
	// 			if($class[$i]->status != 3){
	// 				$class_new[] = $class[$i];
	// 			}
	// 		}
	// 		$academy_year = $this->orderBy($class_new,"academy_year_id","asc");
	// 		$teacher_specialty = $this->multi_unique_array($class_new,"grade_subject_id");
	// 		function subject_parent_id($a, $b) {
	// 			return strcmp($a->subject_parent_id, $b->subject_parent_id);
	// 		}
	// 		usort($teacher_specialty, "subject_parent_id");
			
	// 		//echo json_encode($teacher_specialty);return;
	// 	}
	// 	// $academy_year = new stdClass();
	// 	// $sql = $this->class_model->get_class_available();
	// 	// if ($sql->num_rows() > 0) {
	// 	// 	$academy_year = $sql->result();
	// 	// }
	// 	// grade subject
	// 	// $grade_subject = new stdClass();
	// 	// $sql = $this->grade_subject_model->get_grade_subject();
	// 	// if ($sql->num_rows() > 0) {
	// 	// 	$grade_subject = $sql->result();
	// 	// }
	// 	// semester
	// 	$semester = new stdClass();
	// 	$sql = $this->semester_model->get_semester();
	// 	if ($sql->num_rows() > 0) {
	// 		$semester = $sql->result();
	// 	}
	// 	//teacher specialty
	// 	// $teacher_specialty = new stdClass();
	// 	// $sql = $this->grade_subject_model->get_grade_subject();
	// 	// if ($sql->num_rows() > 0) {
	// 	// 	$teacher_specialty = $sql->result();
	// 	// }
	// 	$data = array(
	// 		"academy_year" => $academy_year,
	// 		"term" => $term,
	// 		"grade_ori" => $grade,
	// 		"grade_subject" => $grade_subject,
	// 		"semester" => $semester,
	// 		"teacher_specialty" => $teacher_specialty
    //     );

	// 	$this->call_main('index',$data);
    // }

	public function index() {
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
		$sql = $this->grade_subject_model->get_grade_subject();
		if ($sql->num_rows() > 0) {
			$teacher_specialty = $sql->result();
		}
		$data = array(
			"academy_year" => $academy_year,
			"term" => $term,
			"grade_ori" => $grade,
			"grade_subject" => $grade_subject,
			"semester" => $semester,
			"teacher_specialty" => $teacher_specialty
        );

		$this->call_main('index',$data);
    }

	function multi_unique_array($arr, $key) {
		$Myarray = array();
		$i = 0;
		$array_of_keys = array();
		foreach($arr as $val) {
		if (!in_array($val->$key, $array_of_keys)) {
			$array_of_keys[$i] = $val->$key;
			$Myarray[$i] = $val;
		}
		$i++;
		}
		return $Myarray;
	}

	function orderBy($items, $attr, $order){
		$sortedItems = [];
		foreach ($items as $item) {
			$key = is_object($item) ? $item->{$attr} : $item[$attr];
			$sortedItems[$key] = $item;
		}
		if ($order === 'desc') {
			krsort($sortedItems);
		} else {
			ksort($sortedItems);
		}

		return array_values($sortedItems);
	}

    public function call_main($view, $data = NULL) {
        $this->load->view('main/header');
        $this->load->view('main/navbar');
        $this->load->view('document/'.$view, $data);
		$this->load->view('main/footer');
    }
}