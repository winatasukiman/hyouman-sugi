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
	public function login() {
		
		$email = $this->input->post('email',TRUE);
		$password = $this->input->post('password',TRUE);
		$data = $this->register_model->login($email, md5($password));

		if (is_array($data)) {
			$session_data = array(
				'user_id' => $data['user_id'],
				'email' => $data['email'],
				'user_type' => $data['user_type_id'],
				'phone_number' => $data['phone_number'],
				'user_image' => $data['user_image'],
				'logged_in' => TRUE,
				'is_verified' => $data['is_verified'],
				'full_name' => $data['full_name']
			);
			$this->session->set_userdata($session_data);
			$unique_code = $this->session->userdata('unique_code');
			$mission_index = $this->session->userdata('mission_index');
			if ($unique_code) {
				redirect('user/verify_user_email/'.$unique_code);
			}else if ($mission_index){
				redirect('classes/task/'.$this->session->userdata('class_id').'/'.$this->session->userdata('class_mission_id').'/Mission/'.$mission_index.'');
			}else{
				$this->session->set_flashdata('category_success', 'Login success!');
				redirect('classes/');
			}
		}
		else {
			$this->session->set_flashdata('category_error', 'Oops! The email or password you entered is incorrect. Please try again.');
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
		redirect('login/notif_email');
	}

	public function notif_email() {
		$data = null;
		$this->call_main('notif_email', $data);
	}

	public function verify_forgot_password($unique_code) {	
		$result = $this->user_password_reset_model->check_unique_code($unique_code);
		$data = array(
			"flag" => 2,
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