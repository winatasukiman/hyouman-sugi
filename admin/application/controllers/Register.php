<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct(){
        parent ::__construct();

        //load model
		$this->load->model('register_model');
		$this->load->model('user_email_verify_model');
		$this->load->helper('email');
		$this->load->library('parser');
    }

	public function index() {
		//redirect('login');
        $this->call_main('register');
	}
	// new
	public function add_user() {
		$check_phone_number = $this->register_model->check_phone_number($this->input->post("countryCode"),$this->input->post("phone_number"));
		$check_email = $this->register_model->check_email($this->input->post("email"));
		if($check_phone_number->num_rows() > 0){
			$this->session->set_flashdata('category_error', 'Phone Number Already Registered');
			redirect('register/');
		}else if($check_email->num_rows() > 0){
			$this->session->set_flashdata('category_error', 'Email Already Registered');
			redirect('register/');
		}else{
			date_default_timezone_set('Asia/Jakarta'); 
			$now = date('Y-m-d H:i:s');
			$userid = mt_rand(100000, 999999);
			$data = array(
				'user_id' => $userid,
				'country_code' => $this->input->post("countryCode"),
				'phone_number' => $this->input->post("phone_number"),
				'email' => $this->input->post("email"),
				'full_name' => $this->input->post("full_name"),
				'password' => md5($this->input->post("password")),
				'date_of_birth' => "1990-01-01",
				'user_type_id' => "4",
				'datetime' => $now,
				'user_points' => "1000"
			);
			$this->register_model->insert_user($data);
			
			//Direct to edit profile page after register
			$email = $this->input->post('email',TRUE);
			$password = $this->input->post('password',TRUE);
			$data = $this->register_model->login($email, md5($password));

			//Verify email
			$unique_code = generate_token();
			$email = $this->input->post("email");
			$link = base_url("user/signup/mail/".$unique_code);
			$data = array(
				'user_id' => $userid,
				'unique_code' => $unique_code, 
				'email' => $this->input->post("email"),
				'is_valid' => 1,
				'created_at' => $now,
			);
			$this->user_email_verify_model->insert($data);
			$as_a = "admin";
			$template_data = array(
				'role' => $as_a,
				'email_link' => $link,
				'user_email' => $email,
			);
			send_email($email, "Welcome to Hyouman!", $this->parser->parse('email_template/verif_email_template', $template_data, TRUE));

			$this->session->set_userdata('is_verified',0);

			//Direct to edit profile page after register
			$email = $this->input->post('email',TRUE);
			$password = $this->input->post('password',TRUE);
			$data = $this->register_model->login($email, md5($password));

			if (is_array($data)) {
				$session_data = array(
					'full_name' => $data['full_name'],
					'user_id' => $data['user_id'],
					'email' => $data['email'],
					'user_type' => $data['user_type_id'],
					'phone_number' => $data['phone_number'],
					'logged_in' => TRUE
				);
				$this->session->set_userdata($session_data);

				$this->session->set_flashdata('category_success', 'Register success!');
				redirect('user/edit_profile');
			}
		}
	}
    public function call_main($view, $data = NULL) {
        $this->load->view('main/header');
        $this->load->view($view, $data);
    }
}
