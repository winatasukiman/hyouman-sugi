<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Strength extends CI_Controller {

    public function __construct() {
        parent ::__construct();
        $this->check_isvalidated();

        //load model
        $this->load->model('strength_model');
        $this->load->model('observation_result_model');
    }

    private function check_isvalidated(){
        if(! $this->session->userdata('logged_in')){
            redirect('login/');
        }
    }
	
	public function index() {
        $this->call_main('classes',$data);
    }
	
	public function add_strength() {
        $this->call_main('add_strength');
    }
	
	public function save_strength(){
		$user_id = $this->session->userdata('user_id');
		$date = $this->change_datetime_format($this->input->post("date"));
		$data = array(
			'user_id' => $user_id,
			'activity_title' => $this->input->post("activity_title"),
			'date' => $date,
			'general_description' => $this->input->post("general_description")
		);
		$strength_student_id = $this->strength_model->insert_strength_student($data);
		// UPLOAD FILE
		$files = $_FILES;
		$cpt = count($_FILES['reference']['name']);
		for($i=0; $i<$cpt; $i++){
			$_FILES['reference']['name']= $files['reference']['name'][$i];
			$_FILES['reference']['type']= $files['reference']['type'][$i];
			$_FILES['reference']['tmp_name']= $files['reference']['tmp_name'][$i];
			$_FILES['reference']['error']= $files['reference']['error'][$i];
			$_FILES['reference']['size']= $files['reference']['size'][$i];
			
			$config['upload_path'] = './assets/uploads/user';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['file_name'] = $user_id."_".$strength_student_id."_".$_FILES["reference"]['name'];
			// Create folder if doesn't exist
			if (!file_exists($config['upload_path'])) {
				mkdir($config['upload_path'], 0775, true);
			}
			$this->load->library('upload', $this->config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('reference')) {
				echo "
					<script type='text/javascript'>
						alert('Please add an image');
					</script>
				";
			} 
			else {
				$file = $this->upload->data();
				$data = array(
					'strength_student_id' => $strength_student_id,
					'file_path' => "assets/uploads/user/".$file['file_name']
				);
				$this->strength_model->insert_strength_student_file($data);
			}
		}
		$this->session->set_flashdata('category_success', 'Add Strength Capture Success');
		redirect('classes');
		// END OF UPLOAD FILE
	}
	
	public function details($strength_student_id) {
		$user_id = $this->session->userdata('user_id');
		$strength_student = new stdClass();
		$strength_student = $this->strength_model->get_strength_student_by_strength_student_id($strength_student_id);
		$strength_student_detail = new stdClass();
		$strength_student_detail = $this->strength_model->get_strength_student_detail($user_id,$strength_student_id);
		//var_dump($strength_student_detail);
		$observation_result = new stdClass();
		$sql = $this->observation_result_model->get_observation_result();
		if ($sql->num_rows() > 0) {
			$observation_result = $sql->result();
		}
		$strength_capture_detail = new stdClass();
		$sql = $this->strength_model->get_strength_capture_detail();
		if ($sql->num_rows() > 0) {
			$strength_capture_detail = $sql->result();
		}
		//get count how many true each bocd
		foreach($strength_capture_detail as $scd){
			$scd->total = 0;
		}
		foreach($strength_capture_detail as $scd){
			foreach($strength_student_detail as $ssd){
				if($ssd->strength_capture_detail_id == $scd->strength_capture_detail_id){
					$scd->total = $ssd->observation_result_id;
				}
			}
		}
		//echo json_encode($strength_capture_detail);return;
		$data = array(
			"strength_student" => $strength_student,
			"strength_student_detail" => $strength_student_detail,
			"observation_result" => $observation_result,
			"strength_capture_detail" => $strength_capture_detail
		);
		$this->call_main('detail_strength', $data);
	}
	
	public function get_servicing_item() {
		$strength_capture_id = $this->input->post("strength_capture_id");
		$strength_capture_detail = new stdClass();
		$sql = $this->strength_model->get_strength_capture_detail_by_strength_capture_id($strength_capture_id);
		if ($sql->num_rows() > 0) {
			$strength_capture_detail = $sql->result();
		}
		$output = '';
		$output .='<select class="browser-default custom-select input" style="color: black;" id="servicing_item" name="servicing_item">';
		$output .='<option disabled selected>Choose Servicing Item</option>';
		foreach($strength_capture_detail as $res){
			$output .='<option value="'.$res->strength_capture_detail_id.'">'.$res->strength_capture_detail_name.'</option>';
		}
		$output .='</select>';
		echo $output;
    }
	
	public function save_strength_student_detail(){
		$user_id = $this->session->userdata("user_id");
		$data = array(
			'user_id' => $user_id,
			'strength_student_detail_id' => $this->input->post("strength_student_detail_id"),
			'strength_capture_detail_id' => $this->input->post("servicing_item"),
			'servicing_item_description' => $this->input->post("servicing_item_description"),
			'observation_result_id' => $this->input->post("observation_result"),
			'link_file' => $this->input->post("link_file")
		);
		$strength_student_detail_review_id = $this->strength_model->insert_strength_student_detail_review($data);
		// UPLOAD FILE
		$files = $_FILES;
		$cpt = count($_FILES['reference']['name']);
		for($i=0; $i<$cpt; $i++){
			$_FILES['reference']['name']= $files['reference']['name'][$i];
			$_FILES['reference']['type']= $files['reference']['type'][$i];
			$_FILES['reference']['tmp_name']= $files['reference']['tmp_name'][$i];
			$_FILES['reference']['error']= $files['reference']['error'][$i];
			$_FILES['reference']['size']= $files['reference']['size'][$i];
			
			$config['upload_path'] = './assets/uploads/user';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['file_name'] = $user_id."_".$this->input->post("strength_student_detail_id")."_".$_FILES["reference"]['name'];
			// Create folder if doesn't exist
			if (!file_exists($config['upload_path'])) {
				mkdir($config['upload_path'], 0775, true);
			}
			$this->load->library('upload', $this->config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('reference')) {
				echo "
					<script type='text/javascript'>
						alert('Please add an image');
					</script>
				";
			} 
			else {
				$file = $this->upload->data();
				$data = array(
					'strength_student_detail_review_id' => $strength_student_detail_review_id,
					'file_path' => "assets/uploads/user/".$file['file_name']
				);
				$this->strength_model->insert_strength_student_detail_review_file($data);
			}
		}
		$this->session->set_flashdata('category_success', 'Insert Strength Capture Detail Success');
		redirect('strength/details/'.$this->input->post("strength_student_id").'');
		// END OF UPLOAD FILE
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

    public function call_main($view, $data = NULL) {
        $this->load->view('main/header');
        $this->load->view('main/navbar');
        $this->load->view('strength/'.$view, $data);
    }

}