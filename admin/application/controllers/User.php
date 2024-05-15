<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent ::__construct();

        //load model
        $this->load->model('user_model'); 
		$this->load->model('user_email_verify_model');
		$this->load->helper('email');
		$this->load->model('admin_model');
        $this->load->model('class_model');
		$this->load->library('parser');
    }

    public function index() {
        $id = $this->session->userdata('user_id');
		$sql = $this->user_model->get_user($id);
		if ($sql->num_rows() > 0) {
			$user_detail = $sql->first_row();
		}
		$sql2 = $this->user_model->get_user_subject($id);
		$user_subject = "";
		if ($sql2->num_rows() > 0) {
			$user_subject = $sql2->result();
		}
		$data = array(
			"user_detail" => $user_detail,
			"user_subject" => $user_subject,
		);
        $this->call_main('profile', $data);
    }
	
	public function edit_profile() {
        $data = array(
            'title' => 'Edit Profile',
            'data_array' => $this->user_model->get_user($this->session->userdata('user_id'))->first_row(),
            'data_institution' => $this->user_model->get_institution()->result()
        );

        // Edit date of birth (dob) data from database to be display in view
        // $temp_dob = $data['data_array']->date_of_birth;
        // $new_dob = date("d F Y", strtotime($temp_dob));
        // $data['data_array']->user_date_of_birth =  $new_dob;
		
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
		$check_phone_number_edit_profile = $this->user_model->check_phone_number_edit_profile($this->input->post("countryCode"),$this->input->post("phone_number"),$this->session->userdata('user_id'));
		$check_email_edit_profile = $this->user_model->check_email_edit_profile($this->input->post("email"),$this->session->userdata('user_id'));
		if($check_phone_number_edit_profile->num_rows() > 0){
			$this->session->set_flashdata('category_error', 'Phone Number Already Registered');
			redirect('user/edit_profile/');
		}else if($check_email_edit_profile->num_rows() > 0){
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
			// $config['max_size'] = 2000;
			// $config['max_width'] = 1500;
			// $config['max_height'] = 1500;

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
				$this->session->set_flashdata('category_success', 'Save data success!');
				redirect('user');
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
				if ($email_changed == true) {
					$data['is_verified'] = 0;
				}
				$this->session->set_userdata('user_image', $file['file_name']);
				$id['user_id'] = $this->session->userdata('user_id');
				$this->user_model->update_user_data($data, $id);
				$this->session->set_flashdata('category_success', 'Save data success!');
				redirect('user');
			}
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

	public function add_batch_student() {
		$response = new \stdClass();
		$config['upload_path'] = './assets/uploads';
		$config['allowed_types'] = 'csv|txt';

		if (!file_exists($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, true);
		} 
		$this->load->helper('date');
		$now = now();
		$config['file_name'] = $now."_".$_FILES["files"]['name'];

		$this->load->library('upload', $this->config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('files')) {
			$response->error = $this->upload->display_errors('','');
			$response->success = false;
			echo json_encode($response);
		} else {
			# Parse CSV with header
			$user_data = array_map('str_getcsv', file($config['upload_path']."/".$config['file_name']));

			$header = array_shift($user_data);
			
			array_walk($user_data, array($this, '_combine_array'), $header);
			$student_ids = $this->user_model->insert_student_batch($user_data);
			$response->success = true;
			echo json_encode($response);
		}	
	}

	function _combine_array(&$row, $key, $header) {
		$row = array_combine($header, $row);
	}

    public function call_main($view, $data = NULL) {
        $this->load->view('main/header');
        $this->load->view('main/navbar');
        $this->load->view('user/'.$view, $data);
    }

}