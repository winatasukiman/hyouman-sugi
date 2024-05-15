<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
        parent ::__construct();

        //load model
		$this->load->model('register_model'); 
		$this->load->model('user_model'); 
		$this->load->model('user_password_reset_model'); 
		$this->load->helper('email');
		$this->load->library('parser');
    }

	public function index() {
		if($this->session->userdata('user_id') != NULL){
			redirect('Classes/');	
		}else{
			$this->call_main('login');
		}
	}
	public function home($link_vertu = null) {
		if($this->session->userdata('user_id') != NULL){
			redirect('Classes/');	
		}else{
			$data = array(
				"link_vertu" => $link_vertu,
			);
			$this->call_main('login', $data);
		}
	}
	
	public function login() {
		//echo $this->session->userdata('parent_id');return;
		$email = $this->input->post('email',TRUE);
		$password = $this->input->post('password',TRUE);
		$data = $this->register_model->login($email, md5($password));
		$grade_user = 0;
		if (is_array($data)) {
			$session_data = array(
				'user_id' => $data['user_id'],
				'email' => $data['email'],
				'user_type' => $data['user_type_id'],
				'phone_number' => $data['phone_number'],
				'logged_in' => TRUE,
				'is_verified' => $data['is_verified'],
				'full_name' => $data['full_name']
			);
			$this->session->set_userdata($session_data);
			
			if($data['is_change_password'] == 1){
				$user_id = $data['user_id'];
				$full_name = $$data['full_name'];
				$unique_code = generate_token();
				$link = base_url("login/reset_password/".$unique_code);
				date_default_timezone_set('Asia/Jakarta'); 
				$now = date('Y-m-d H:i:s');
				$expired = date('Y-m-d H:i:s', strtotime("+1 hours"));
				$data = array(
					'user_id' => $user_id,
					'unique_code' => $unique_code, 
					'created_at' => $now,
					'expired_at' => $expired,
					'is_valid' => 1,
				);
				$this->user_password_reset_model->insert($data);
				redirect($link);
			}
			
			$parent_id = $this->session->userdata('parent_id');
			if ($parent_id) {
				redirect('user/open_recruitment/'.$parent_id);
			}
			
			$unique_code = $this->session->userdata('unique_code');
			if ($unique_code) {
				redirect('user/verify_user_email/'.$unique_code);
			}else{
				$this->session->set_flashdata('category_success', 'Login success!');
				if ($this->session->userdata('user_type') == 2){
					redirect('User/');
				}else{
					redirect('Classes/');
				}
				
			}
		}
		else {
			$this->session->set_flashdata('category_error', 'Email or Password Incorrect!');
			redirect('login/');	
		}
		
	
	}
	// new
	public function loginAfterRegister() {
		$phone = $this->input->post('login_phone_number',TRUE);
		$password = $this->input->post('register_password',TRUE);
		$data = $this->register_model->login($phone, md5($password));

		if (is_array($data)) {
			$session_data = array(
				'user_id' => $data['user_id'],
				'user_name' => $data['user_name'],
				'badge_id' => $data['badge_id'],
				'user_type' => $data['user_type'],
				'user_phone' => $data['user_phone'],
				'user_image' => $data['user_image'],
				'phone' => $phone,
				'password' => $password,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($session_data);
		}
		echo "sukses";
	}
	
	public function forgot_password(){
		$data = array(
			"flag" => 1,
		);
		$this->call_main('forgot_password_view', $data);
	}

	public function request_forgot_password() {
		$user_email = $this->input->post('email');      
		$find_email = $this->register_model->find_user_by_email($user_email);  
		if ($find_email) {
			$user_id = $find_email['user_id'];
			$full_name = $find_email['full_name'];
			$unique_code = generate_token();
			$link = base_url("login/reset_password/".$unique_code);
			date_default_timezone_set('Asia/Jakarta'); 
			$now = date('Y-m-d H:i:s');
			$expired = date('Y-m-d H:i:s', strtotime("+1 hours"));
			$data = array(
				'user_id' => $user_id,
				'unique_code' => $unique_code, 
				'created_at' => $now,
				'expired_at' => $expired,
				'is_valid' => 1,
			);
			$this->user_password_reset_model->insert($data);
			$template_data = array(
				'full_name' => $full_name,
				'email_link' => $link,
				'user_email' => $user_email
			);
			send_email($user_email, "Hyouman Password Reset", $this->parser->parse('email_template/reset_password_template', $template_data, TRUE));
		}
		$this->session->set_flashdata('category_success', "We've sent you an email with a link to reset your password. Please check your inbox."); // Default behaviour to ensure hacker unable to enumerate emails
		redirect('login/forgot_password');
	}

	public function verify_forgot_password($unique_code) {	
		$result = $this->user_password_reset_model->check_unique_code($unique_code);
		$data = array(
			"flag" => 2,
			"title" => "Change Password",
		);
		if($result == 1) {
			$data['unique_code'] = $unique_code;
		}
		else {
			$this->session->set_flashdata('category_error', 'Invalid link! Please try again or request a new link.');
		}
		$this->call_main('forgot_password_view', $data);
	}

	public function change_password() {
		$unique_code = $this->input->post('unique_code');      
		$result = $this->user_password_reset_model->check_unique_code($unique_code);
		if ($result == 1) {
			$user_id = $this->user_password_reset_model->get_user_id_by_unique_code($unique_code);
			$password = $this->input->post('password'); 
			$data = array(
				'is_change_password'=> 0,
				'password' => md5($this->input->post("password"))
			);
			$temp = $this->user_model->update_user_password_data($data, $user_id);
	    	// echo '<pre>';
	    	// print_r($temp);
	    	if ($temp) {
				$id["user_id"] = $user_id;
				$this->session->set_flashdata('category_success', 'Change password success!');
				$this->user_password_reset_model->deactivate_unique_code_by_user_id($id);
				redirect('login');
			}
			else {
				$this->session->set_flashdata('category_error', 'Change password error, please try again!');
			}
		}
		else {
			redirect('login/reset_password/'.$unique_code);
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login/');
	}

	public function call_main($view, $data = NULL) {
        $this->load->view('main/header');
        $this->load->view($view, $data);
    }
}