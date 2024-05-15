<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller {

    public function __construct() {
        parent ::__construct();

        //load model
        $this->load->model('subject_model'); 
    }

    public function index() {
		$sql = $this->subject_model->get_grade();
		if ($sql->num_rows() > 0) {
			$grade = $sql->result();
		}
		$sql = $this->subject_model->get_subject();
		if ($sql->num_rows() > 0) {
			$subject = $sql->result();
		}
		
		$data = array(
			"title" => "Add Subject",
			"grade" => $grade,
			"subject" => $subject
		);
        $this->call_main('add_subject', $data);
    }
	
	public function add_subject() {
		$sql = $this->subject_model->get_grade();
		if ($sql->num_rows() > 0) {
			$grade = $sql->result();
		}
		$sql2 = $this->subject_model->get_subject();
		if ($sql2->num_rows() > 0) {
			$subject = $sql2->result();
		}
		$sql = $this->subject_model->get_subject_parent();
		if ($sql->num_rows() > 0) {
			$subject_parent = $sql->result();
		}
		$data = array(
			"title" => "Qualification",
			"grade" => $grade,
			"subject" => $subject,
			"subject_parent" => $subject_parent
		);
        $this->call_main('add_subject', $data);
    }
	public function get_grade_subject() {
		$subject_parent_id = $this->input->post("subject_parent_id");
		$sql = $this->subject_model->get_subject_parent_detail_by_subject_parent_id($subject_parent_id);
		if ($sql->num_rows() > 0) {
			$subject_parent_detail = $sql->result();
		}
		$output = '';
		$output .='<select class="browser-default custom-select input" style="color: black;" id="grade_subject" name="grade_subject">';
		$output .='<option disabled selected>Choose Grade Subject</option>';
		foreach($subject_parent_detail as $res){
			$output .='<option value="'.$res->grade_subject_id.'">'.$res->subject_parent_name.'-'.$res->grade_name.'-'.$res->subject_name.'</option>';
		}
		$output .='</select>';
		echo $output;
    }

	public function get_grade() {
		$subject_id = $this->input->post("subject_id");
		$sql = $this->subject_model->get_grade_by_subject($subject_id);
		if ($sql->num_rows() > 0) {
			$grade = $sql->result();
		}
		$output = '';
		$output .='<select class="browser-default custom-select input" style="color: black;" id="grade" name="grade">';
		$output .='<option disabled selected>Choose Grade</option>';
		foreach($grade as $res){
			$output .='<option value="'.$res->grade_id.'">'.$res->grade_name.'</option>';
		}
		$output .='</select>';
		echo $output;
    }
	public function get_teacher_specialty_by_subject_id() {
		$subject_id = $this->input->post("subject_id");
		$sql = $this->subject_model->get_teacher_specialty_by_subject_id($this->session->userdata('user_id'),$subject_id);
		if ($sql->num_rows() > 0) {
			$grade = $sql->result();
		}
		
		$output = '';
		$output .='<select class="browser-default custom-select input" style="color: black;" id="grade" name="grade">';
		$output .='<option disabled selected>Choose Grade</option>';
		for($i = 0; $i < count($grade); $i++) {
			// if($i == 0){
				// $output .='<option value="'.$grade[$i]->grade_id.'">'.$grade[$i]->grade_name.'</option>';
			// }else{
				// if( $grade[$i]->grade_name != $grade[$i-1]->grade_name ){
					// $output .='<option value="'.$grade[$i]->grade_id.'">'.$grade[$i]->grade_id.'</option>';
				// }
			// }
			$output .='<option value="'.$grade[$i]->grade_id.'">'.$grade[$i]->grade_name.'</option>';
		}
		$output .='</select>';
		echo $output;
    }
	public function get_grade_subject_by_grade_id_and_subject_id() {
		$subject_id = $this->input->post("subject_id");
		$grade_id = $this->input->post("grade_id");
		$sql = $this->subject_model->get_grade_subject_by_grade_id_and_subject_id($subject_id,$grade_id);
		if ($sql->num_rows() > 0) {
			$grade_subject = $sql->result();
		}
		echo json_encode($grade_subject);
    }
	public function get_grade_subject_by_user_id() {
		$sql = $this->subject_model->get_grade_subject_by_user_id($this->session->userdata('user_id'));
		if ($sql->num_rows() > 0) {
			$grade_subject = $sql->result();
		}
		echo json_encode($grade_subject);
    }
	public function get_grade_subject_by_id() {
		$grade_subject_id = $this->input->post("grade_subject_id");
		$output = '';
		
		// if($grade_subject_id !=null){
			// $output .='<ul>';
			// for($i = 0; $i < count($grade_subject_id); $i++) {
				// $sql = $this->subject_model->get_grade_subject_by_id($grade_subject_id[$i]);
				// if ($sql->num_rows() > 0) {
					// $grade_subject = $sql->result();
					// for($j = 0; $j < count($grade_subject); $j++) {
						// $output .='<li>'.$grade_subject[$j]->grade_name.'-'.$grade_subject[$j]->subject_name.'&nbsp;&nbsp;<span class="badge badge-danger badge-pill" style="padding-top:-10px;" onClick="deleteArray('.$i.')">X</span></li>';
					// }
				// }
			// }
			// $output .='</ul>';
		// }
		if($grade_subject_id !=null){
			
			for($i = 0; $i < count($grade_subject_id); $i++) {
				$sql = $this->subject_model->get_grade_subject_by_id($grade_subject_id[$i]);
				if ($sql->num_rows() > 0) {
					$grade_subject = $sql->result();
					for($j = 0; $j < count($grade_subject); $j++) {
						$output .='<div class="card col-md-3" style="padding-top:10px;margin:10px 2px 0px 10px;">';
							$output .='<div class="row">';
								$output .='<div class="col-md-4 col-2 d-flex flex-column align-items-stretch justify-content-center" style="padding-right:0;">';
									$output .='<img src="'.base_url().'assets/img/icon/class.png" alt="Responsive image" style="max-width:100%;height:auto;">';
								$output .='</div>';
								$output .='<div class="col-md-8 col-10 d-flex align-items-center">';
									$output .='<p style=""><b class="label float-left">'.$grade_subject[$j]->grade_name.'</b><br>';
									$output .='<span class="isi">'.$grade_subject[$j]->subject_name.'('.$grade_subject[$j]->subject_parent_name.')</span></p>';
								$output .='</div>';
								$output .='<span class="position-absolute float-right badge badge-danger badge-pill" style="top:0;right:0;margin-top:-10px;margin-right:-10px;" onClick="deleteArray('.$i.')">X</span>';
							$output .='</div>';
						$output .='</div>';
					}
				}
			}
		
		}
		echo $output;
    }
	public function insert_grade_subject() {
		$this->subject_model->delete_grade_subject_by_user_id($this->session->userdata('user_id'));
		$grade_subject_id = $this->input->post("grade_subject_id");
		if($grade_subject_id !=null){
			foreach($grade_subject_id as $res) {
				$data = array(
					'user_id' => $this->session->userdata('user_id'),
					'grade_subject_id' => $res
				);
				$this->subject_model->insert_grade_subject($data);
			}
		}
		echo "{'category': 'category_success', 'message': 'Success add subject', 'redirect': 'user/'}";
		return;
    }
	
	// public function edit_profile() {
        // $data = array(
            // 'title' => 'Edit Profile',
            // 'data_array' => $this->user_model->get_user($this->session->userdata('user_id'))->first_row(),
            // 'data_institution' => $this->user_model->get_institution()->result()
        // );
		
		// $new_dob = $this->change_date_format_from_db($data['data_array']->date_of_birth);
        // //$new_dob = date("d F Y", strtotime($temp_dob));
        // $data['data_array']->date_of_birth =  $new_dob;
        // $this->call_main('edit_profile', $data);
    // }
	// public function add_user() {
        // $data = array(
			// 'full_name' =>  $this->input->post("full_name"),
			// 'phone_number' => $this->input->post("phone_number"),
			// 'email' => $this->input->post("email"),
			// 'password' => md5($this->input->post("password")),
			// 'gender' =>$this->input->post("user_gender"),
			// 'date_of_birth' => $new_format_date,
			// 'institution_id' => $this->input->post("institution"),
			// 'address' => $this->input->post("address"),
			// 'rt' => $this->input->post("rt"),
			// 'rw' => $this->input->post("rw"),
			// 'postcode' => $this->input->post("postcode"),
			// 'city' => $this->input->post("city"),
			// 'district' => $this->input->post("district"),
			// 'province' => $this->input->post("province")
		// );
		// $id['user_id'] = $this->session->userdata('user_id');
		// $this->user_model->update_user_data($data, $id);
		// $this->session->set_flashdata('category_success', 'Save data success!');
		// redirect('user');
    // }

    public function call_main($view, $data = NULL) {
        $this->load->view('main/header');
        $this->load->view('main/navbar');
        $this->load->view('subject/'.$view, $data);
    }

}