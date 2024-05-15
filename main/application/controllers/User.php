<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent ::__construct();

        //load model
        $this->load->model('user_model'); 
        $this->load->model('class_model'); 
		$this->load->model('register_model');
		$this->load->model('user_email_verify_model');
		$this->load->model('strength_model');
		$this->load->helper('email');
		$this->load->library('parser');
		$this->check_isvalidated();
    }
	
	private function check_isvalidated(){
        if(! $this->session->userdata('logged_in')){
            redirect('/login');
        }
    }

    public function index() {
        $id = $this->session->userdata('user_id');
		$sql = $this->user_model->get_user($id);
		if ($sql->num_rows() > 0) {
			$user_detail = $sql->first_row();
		}
		$sql2 = $this->user_model->get_children($id);
		$children = "";
		if ($sql2->num_rows() > 0) {
			$children = $sql2->result();
		}
		$children_class_arr = array();
		$strength_student = new stdClass();
		if(!empty ($children)){
			foreach($children as $c){
				$sql3 = $this->class_model->get_class_strength_capture_by_user_id($c->user_id);
				if ($sql3->num_rows() > 0) {
					$children_class = $sql3->result();
					array_push($children_class_arr,$children_class);
				}
				$sql3 = $this->user_model->get_grade_user($c->user_id);
				$c->grade = null;
				if ($sql3->num_rows() > 0) {
					$c->grade = $sql3->first_row()->grade_name;
				}
				
				$strength_student = $this->strength_model->get_strength_student_by_user_id($c->user_id);
			}
		}
		$sql3 = $this->user_model->get_user_history($id);
		$user_history = "";
		if ($sql3->num_rows() > 0) {
			$user_history = $sql3->result();
			if( ! empty ($user_history)){
				for($i=0;$i<count($user_history);$i++){
					$datetime = $this->change_datetime_format_from_db($user_history[$i]->datetime);
					$params = explode(" - ", $datetime);
					$new_date = $params[0];
					$new_time = $params[1];

					$user_history[$i]->date = $new_date;
					$user_history[$i]->time = $new_time;
				}
			}
		}
		$sql4 = $this->user_model->get_user_history_all();
		$user_history_all = "";
		if ($sql4->num_rows() > 0) {
			$user_history_all = $sql4->result();
			if( ! empty ($user_history_all)){
				for($i=0;$i<count($user_history_all);$i++){
					$datetime = $this->change_datetime_format_from_db($user_history_all[$i]->datetime);
					$params = explode(" - ", $datetime);
					$new_date = $params[0];
					$new_time = $params[1];

					$user_history_all[$i]->date = $new_date;
					$user_history_all[$i]->time = $new_time;
					$sql5 = $this->class_model->get_class_by_class_id($user_history_all[$i]->class_id);
					$full_name = "";
					if ($sql5->num_rows() > 0) {
						$full_name = $sql5->first_row();
						$user_history_all[$i]->teacher_name = $full_name->full_name;
					}
				}
			}
		}
		
		$data = array(
			"user_detail" => $user_detail,
			"children" => $children,
			"children_class_arr" => $children_class_arr,
			"user_history" => $user_history,
			"user_history_all" => $user_history_all,
			"strength_student" => $strength_student
		);
        $this->call_main('profile', $data);
    }
	
	public function change_datetime_format_from_db($datetime) {
        // $new_Date = substr_replace($datetime,"",10);
        $new_Date = date("F jS,Y - H:i", strtotime($datetime)); //20 February 2020
        return $new_Date;
    }
	
	public function edit_profile() {
        $data = array(
            'title' => 'Edit Profile',
            'data_array' => $this->user_model->get_user($this->session->userdata('user_id'))->first_row(),
            'data_institution' => $this->user_model->get_institution()->result(),
            'grade' => $this->user_model->get_grade()->result(),
            'grade_user' => $this->user_model->get_grade_user($this->session->userdata('user_id'))->first_row()
        );
		$sql = $this->class_model->get_class_mission_participants_by_user_id($this->session->userdata('user_id'));
		$class = "";
		$data['data_array']->status_class_joined = 2;
		if ($sql->num_rows() > 0) {
			$class = $sql->result();
			$temp = 0;
			$status = 0;
			$data['data_array']->status_class_joined = 0;
			foreach($class as $c){
				if($temp != $c->class_id){
					$sql = $this->class_model->get_status_class($c->class_id);
					if ($sql->num_rows() > 0) {
						$status = $sql->first_row();
						if ($status->status_class_id != 2){
							$data['data_array']->status_class_joined = 0;
							break;
						}else{
							$data['data_array']->status_class_joined = $status->status_class_id;
						}
					}
				}$temp = $c->class_id;
			}
		}
		
		$new_dob = $this->change_date_format_from_db($data['data_array']->date_of_birth);
        //$new_dob = date("d F Y", strtotime($temp_dob));
        $data['data_array']->date_of_birth =  $new_dob;
        $this->call_main('edit_profile', $data);
    }
	public function change_date_format_from_db($datetime) {
        // $new_Date = substr_replace($datetime,"",10);
        $new_Date = date("j F Y", strtotime($datetime)); //20 February 2020
        return $new_Date;
    }
	public function change_date_format($date) {
        $new_date = date("Y-m-d", strtotime($date));
        return $new_date;
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
	public function add_user() {
		$check_phone_number_edit_profile_2 = $this->user_model->check_phone_number_edit_profile_2($this->input->post("countryCode"),$this->input->post("phone_number"),$this->session->userdata('user_id'));
		$check_phone_number_edit_profile_3 = $this->user_model->check_phone_number_edit_profile_3($this->input->post("countryCode"),$this->input->post("phone_number"),$this->session->userdata('user_id'));
		$check_email_edit_profile_2 = $this->user_model->check_email_edit_profile_2($this->input->post("email"),$this->session->userdata('user_id'));
		$check_email_edit_profile_3 = $this->user_model->check_email_edit_profile_3($this->input->post("email"),$this->session->userdata('user_id'));

		if($check_phone_number_edit_profile_2->num_rows() > 0){
			$this->session->set_flashdata('category_error', 'Phone Number Already Registered');
			redirect('user/edit_profile/');
		}else if($check_email_edit_profile_2->num_rows() > 0){
			$this->session->set_flashdata('category_error', 'Email Already Registered');
			redirect('user/edit_profile/');
		}else if($check_phone_number_edit_profile_3->num_rows() > 0){
			$this->session->set_flashdata('category_error', 'Phone Number Already Registered');
			redirect('user/edit_profile/');
		}else if($check_email_edit_profile_3->num_rows() > 0){
			$this->session->set_flashdata('category_error', 'Email Already Registered');
			redirect('user/edit_profile/');
		}else{
			$data_user = $this->user_model->get_user($this->session->userdata('user_id'));
			$new_format_date = $this->change_date_format( $this->input->post("date_of_birth"));
			$old_image = $this->input->post("old_image");

			$email_changed = filter_var($this->input->post("email_changed"), FILTER_VALIDATE_BOOLEAN);
			if ($email_changed == true) {
				$unique_code = generate_token();
				$email = $this->input->post("email");
				$link = base_url("user/signup/mail/".$unique_code);
				date_default_timezone_set('Asia/Jakarta'); 
				$now = date('Y-m-d H:i:s');
				$data = array(
					'user_id' => $this->session->userdata('user_id'),
					'unique_code' => $unique_code, 
					'email' => $this->input->post("email"),
					'is_valid' => 1,
					'created_at' => $now,
				);
				$this->user_email_verify_model->insert($data);
				$this->resend_user_email();

				$this->session->set_userdata('is_verified',0);
			}

			$config['upload_path'] = './assets/img/uploads/user';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			if (!file_exists($config['upload_path'])) {
				mkdir($config['upload_path'], 0775, true);
			}
			$this->load->library('upload', $this->config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('user_input_image')) {
				//$error = array('error' => $this->upload->display_errors());
				// $this->session->set_flashdata('category_error',$error['error']);
				// redirect('user');
				$data = array(
					'full_name' =>  $this->input->post("full_name"),
					'country_code' => $this->input->post("countryCode"),
					'phone_number' => $this->input->post("phone_number"),
					'email' => $this->input->post("email"),
					'gender' =>$this->input->post("user_gender"),
					'date_of_birth' => $new_format_date,
					'institution_id' => $this->input->post("institution"),
					'short_profile' => $this->input->post("short_profile"),
					'address' => $this->input->post("address"),
					'rt' => $this->input->post("rt"),
					'rw' => $this->input->post("rw"),
					'postcode' => $this->input->post("postcode"),
					'city' => $this->input->post("city"),
					'district' => $this->input->post("district"),
					'province' => $this->input->post("province")
				);
				if ($email_changed == true) {
					$data['is_verified'] = 0;
				}
				$id['user_id'] = $this->session->userdata('user_id');
				$this->user_model->update_user_data($data, $id);
			} else {
				if (file_exists("./assets/img/uploads/user/".$old_image)){
					chown("./assets/img/uploads/user/".$old_image, 777);
					unlink("./assets/img/uploads/user/".$old_image);
				}
				$file = $this->upload->data();
				$data = array(
					'user_image' => $file['file_name'],
					'full_name' => $this->input->post("full_name"),
					'country_code' => $this->input->post("countryCode"),
					'phone_number' => $this->input->post("phone_number"),
					'email' => $this->input->post("email"),
					'gender' =>$this->input->post("user_gender"),
					'date_of_birth' => $new_format_date,
					'institution_id' => $this->input->post("institution"),
					'short_profile' => $this->input->post("short_profile"),
					'address' => $this->input->post("address"),
					'rt' => $this->input->post("rt"),
					'rw' => $this->input->post("rw"),
					'postcode' => $this->input->post("postcode"),
					'city' => $this->input->post("city"),
					'district' => $this->input->post("district"),
					'province' => $this->input->post("province")
				);
				$this->user_model->insert_user_grade($data);
				$this->session->set_flashdata('category_success', 'Data saved successfully!');
				redirect('user');
			}
			date_default_timezone_set('Asia/Jakarta'); 
			$now = date('Y-m-d H:i:s');
			$data = array(
				'user_id' =>  $this->session->userdata('user_id'),
				'grade_id' =>  $this->input->post("grade"),
				'datetime' => $now
			);
			$this->user_model->insert_user_grade($data);
			$this->session->set_flashdata('category_success', 'Data saved successfully!');
			redirect('user');
		}
    }
	// User edit password
	public function add_user_password() {
		$data = array(
			'password' => md5($this->input->post("user_change_password"))
		);
		$update = $this->user_model->update_user_password_data($data, $this->session->userdata('user_id'));
		if($update == 1){
			echo "sukses";
		}
		else{
		}
    }
	
	public function invitation_url() {
		// Check if team owner.
		$user_id = $this->session->userdata("user_id");

		$response_data = new stdClass();
		$response_data->url = base_url()."user/open_recruitment/".$user_id;
		$response_data->message = "Using open recruitment link. Anyone can use this url and join to you parent!";
		echo json_encode($response_data);
		return;
	}
	
	public function open_recruitment($parent_id) {
		$user_id = $this->session->userdata("user_id");
		
		if($user_id == null){
			$session_data = array(
				'parent_id' => $parent_id
			);
			$this->session->set_userdata($session_data);
			// $this->session->unset_userdata('parent_id');
			// echo($this->session->userdata('parent_id'));
			
			// return;
			redirect('login/');
		}
		
		// If user already have team in game.
		$has_parent = $this->user_model->is_child_has_in_parent($user_id, $parent_id);
		// If user already joined in parent, Fail.
		if ($has_parent == true) {
			$this->session->set_flashdata('category_error', 'Already registered in parent');
			redirect('user/');
			return;
		}
		
		if ($parent_id == $user_id) {
			$this->session->set_flashdata('category_error', 'Your account is parent');
			redirect('user/');
			return;
		}

		$member_data = array(
			'parent_id' => $parent_id,
			'child_id' => $user_id
		);
		$this->user_model->insert_parent_child($member_data);

		date_default_timezone_set('Asia/Jakarta'); 
		$now = date('Y-m-d H:i:s');
		$activity_description = 'Child '.$user_id.' telah join Parent.';
		$activity_data = array(
			'parent_id' => $parent_id,
			'parent_child_activity_description' => $activity_description,
			'parent_child_activity_time' => $now
		);
		$this->user_model->insert_parent_child_activity($activity_data);

		$this->session->set_flashdata('category_success', 'Success Join to Parent');
		redirect("user/");
	}
	// Verify registered email 
	public function verify_user_email($unique_code) {
		$user_id = $this->session->userdata("user_id");
		
		if($user_id == null){
			$session_data = array(
				'unique_code' => $unique_code
			);
			$this->session->set_userdata($session_data);
			redirect('login/');
		}else{
			$result = $this->user_email_verify_model->check_unique_code($this->session->userdata('user_id'), $unique_code);
			if($result == 1) {
				$this->session->set_userdata('is_verified',1);
				$this->session->set_flashdata('category_success', "Email verified successfully! Welcome to Hyouman, ".$this->session->userdata('full_name')."!");
			}
			else {
				$this->session->set_flashdata('category_error', 'Aww, sorry the link given is not correct. Please check the correct link in your email or request a new link!');
			}
			redirect('user');
		}
		
	}
	// Resend valid email
	public function resend_user_email() {
		$user_id = $this->session->userdata('user_id');
		$result = $this->user_email_verify_model->get_token($user_id);
		if ($result->num_rows() > 0) {
			$token_data = $result->first_row();
			$unique_code = $token_data->unique_code;
			$email = $token_data->email;
			$link = base_url("user/signup/mail/".$unique_code);
			$as_a = "";
			if($this->session->userdata('user_type') == 2){
				$as_a = "parent";
			}else if($this->session->userdata('user_type') == 3){
				$as_a = "student";
			}else if($this->session->userdata('user_type') == 1){
				$as_a = "teacher";
			}
			$template_data = array(
				'role' => $as_a,
				'email_link' => $link,
				'user_email' => $email,
			);
			send_email($email, "Welcome to Hyouman!", $this->parser->parse('email_template/verif_email_template', $template_data, TRUE));
			return;
		}
		else {
			$unique_code = generate_token();
			$email = $this->user_model->get_user($user_id)->first_row()->email;
			$link = base_url("user/signup/mail/".$unique_code);
			date_default_timezone_set('Asia/Jakarta'); 
			$now = date('Y-m-d H:i:s');
			$data = array(
				'user_id' => $user_id,
				'unique_code' => $unique_code, 
				'email' => $email,
				'is_valid' => 1,
				'created_at' => $now,
			);
			$this->user_email_verify_model->insert($data);
			$this->resend_user_email();
		}
	}

    public function call_main($view, $data = NULL) {
        $this->load->view('main/header');
        $this->load->view('main/navbar');
        $this->load->view('user/'.$view, $data);
    }
}