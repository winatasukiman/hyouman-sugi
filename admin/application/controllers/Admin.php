<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent ::__construct();
        $this->check_isvalidated();

        //load model
        $this->load->model('admin_model');
        $this->load->model('user_model');
        $this->load->model('class_model');
    }

    private function check_isvalidated(){
        if(! $this->session->userdata('logged_in')){
            redirect('login/');
        }
    }

    public function index() {
		$sql = $this->admin_model->get_user();
		$student = "";
		if ($sql->num_rows() > 0) {
			$student = $sql->result();
			foreach($student as $s){
				$sql2 = $this->admin_model->get_user_payment($s->user_id);
				$student_payment = "";
				if ($sql2->num_rows() > 0) {
					$student_payment = $sql2->result();
					foreach($student_payment as $sp){
						if($sp->datetime_check_2 != null){
							$s->status_payment = 1;
							break;
						}else{
							$s->status_payment = 0;
						}
					}
				}else{
					$s->status_payment = 0;
				}
			}
		}
		$sql = $this->admin_model->get_all_user_payment();
		$user_payment = "";
		if ($sql->num_rows() > 0) {
			$user_payment = $sql->result();
			foreach($user_payment as $us){
				$sql = $this->admin_model->get_parent_by_child_id($us->user_id);
				$parent = "";
				if ($sql->num_rows() > 0) {
					$parent = $sql->first_row();
					$us->parent_name = $parent->full_name;
				}else{
					$us->parent_name = "Null";
				}
				if($us->datetime_check_1 != null){
					$datetime_check_1 = $this->change_datetime_format_from_db($us->datetime_check_1);
					$params_check_1 = explode(" - ", $datetime_check_1);
					$new_date_check_1 = $params_check_1[0];
					$new_time_check_1 = $params_check_1[1];
					$us->date_check_1 = $new_date_check_1;
					$us->time_check_1 = $new_time_check_1;
				}else{
					$us->date_check_1 = "";
					$us->time_check_1 = "";
				}
				
				if($us->datetime_check_2 != null){
					$datetime_check_2 = $this->change_datetime_format_from_db($us->datetime_check_2);
					$params_check_2 = explode(" - ", $datetime_check_2);
					$new_date_check_2= $params_check_2[0];
					$new_time_check_2 = $params_check_2[1];
					$us->date_check_2 = $new_date_check_2;
					$us->time_check_2 = $new_time_check_2;
				}else{
					$us->date_check_2 = "";
					$us->time_check_2 = "";
				}
			}
		}
		
		$data = array(
			"student" => $student,
			"user_payment" => $user_payment
        );
        $this->call_main('admin',$data);
    }
	
	public function update_nisn(){
		$data = array(
			"user_id" => $this->input->post('user_id'),
			"nisn" => $this->input->post('nisn')
        );
		$this->admin_model->update_nisn($data);
		$sql = $this->admin_model->get_user();
		$student = "";
		if ($sql->num_rows() > 0) {
			$student = $sql->result();
			foreach($student as $s){
				$sql2 = $this->admin_model->get_user_payment($s->user_id);
				$student_payment = "";
				if ($sql2->num_rows() > 0) {
					$student_payment = $sql2->result();
					foreach($student_payment as $sp){
						if($sp->datetime_check_2 != null){
							$s->status_payment = 1;
							break;
						}else{
							$s->status_payment = 0;
						}
					}
				}else{
					$s->status_payment = 0;
				}
			}
		}
		echo json_encode($student);
	}
	
	public function update_user_payment_1(){
		$new_format_date = $this->change_datetime_format( $this->input->post("payment_date_time_1"));
		$data = array(
			"user_payment_id" => $this->input->post('user_payment_id_1'),
			"user_id_check_1" => $this->session->userdata('user_id'),
			"datetime_check_1" => $new_format_date
        );
		$this->admin_model->update_user_payment_1($data);
	}
	
	public function update_user_payment_2(){
		$sql = $this->admin_model->get_user_payment_by_user_payment_id($this->input->post('user_payment_id_2'));
		$user_payment = "";
		if ($sql->num_rows() > 0) {
			$user_payment = $sql->first_row();
			if($this->session->userdata('user_id') == $user_payment->user_id_check_1){
				echo "false";
			}else{
				echo "true";
				$new_format_date = $this->change_datetime_format( $this->input->post("payment_date_time_2"));
				$data = array(
					"user_payment_id" => $this->input->post('user_payment_id_2'),
					"user_id_check_2" => $this->session->userdata('user_id'),
					"datetime_check_2" => $new_format_date
				);
				$this->admin_model->update_user_payment_2($data);
				$sql = $this->admin_model->get_user_by_user_id($user_payment->user_id);
				$user = "";
				$email_child = "";
				$full_name_child = "";
				if ($sql->num_rows() > 0) {
					$user = $sql->first_row();
					$email_child = $user->email;
					$full_name_child = $user->full_name;
				}
				$datetime = $this->change_datetime_format_from_db($new_format_date);
				$params = explode(" - ", $datetime);
				$new_date = $params[0];
				$new_time = $params[1];
				$data = "<html> 
						<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
						<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
						<link href='https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&display=swap' rel='stylesheet'>
						<style>
							body {
								font-family: 'Quicksand';
								background-image: url('https://www.hyouman.varena.id/assets/img/bgisi2.png');
								background-position: center;
								background-repeat: no-repeat;
								background-size: cover;
							}
							p{ color:#28557B; }
						</style>
						<body>
							<div style='height:100%;margin:0;padding:20px 0 20px 0;background-color:#f2f4f6;color:#28557B;width:100%!important'>
								<table style='width:570px;margin:0 auto;padding:20px 50px 20px 50px;background-color:#fff' align='center' width='570' cellpadding='0' cellspacing='0' role='presentation'>
									<tbody>
										<tr>
											<td align='center'><img src='https://www.hyouman.varena.id/assets/img/navbar/logokecil.png' alt='Creating Email Magic' style='display: block;' /></td>
										</tr>
										<tr>
											<td align='center'><p>Payment Invoice</td>
										</tr>
										<tr>
											<td><p>Thank you Mr. / Mrs. ".$full_name_child." for buying class at Hyouman on ".$new_date.", ".$new_time."</p></td>
										</tr>
										<tr>
											<td><p>Here are the details of your order :</p></td>
										</tr>
										<tr>
											<table border='1' cellpadding='0' cellspacing='0' width='100%'>
												<tr>
													<td align='right'>
														<img src='https://www.hyouman.varena.id/assets/img/icon/iconoren.png'/>
													</td>
													<td>
														<a style='color: #28557B !important;
															background-color: white !important;
															border: 2px solid #28557B !important;
															padding: 10px 20px;
															border-radius: 10px;box-shadow: none !important;
															outline: none !important;text-decoration:none;' href=".$link."><b>Download Invoice</b></a>
													</td>
												</tr>
											</table>
										</tr>
										<tr>
											<td><p>Happy Learning,<br><b>Hyouman Team</b></p></td>
										</tr>
										<tr>
											<td><p>Please ignore this email if you did not register an account through Hyouman</p></td>
										</tr>
									</tbody>
								</table>
								<table style='width:570px;margin:0 auto;padding:20px 50px 20px 50px;background-color:#f2f4f6;' align='center' width='570' cellpadding='0' cellspacing='0' role='presentation'>
									<tbody>
										<tr>
											<td align='center'>
												<a href='https://www.instagram.com' style='text-decoration:none;'>
												<img border='0' src='https://www.hyouman.varena.id/assets/img/icon/instagram.png' width='50' height='50'>
												<a href='https://www.instagram.com' style='text-decoration:none;'>
												<img border='0' src='https://www.hyouman.varena.id/assets/img/icon/facebook.png' width='50' height='50'>
												<a href='https://www.instagram.com' style='text-decoration:none;'>
												<img border='0' src='https://www.hyouman.varena.id/assets/img/icon/instagram.png' width='50' height='50'>
												<a href='https://www.youtube.com' style='text-decoration:none;'>
												<img border='0' src='https://www.hyouman.varena.id/assets/img/icon/linkedin.png' width='50' height='50'>
											</td>
										</tr>
										<tr>
											<td align='center'><p>Kindly follow our social media to get more information about Hyouman</p></td>
										</tr>
										<tr>
											<td align='center'><p>This message was sent to <b>".$email_child."</b> at your request.<br>The Hyouman, Jl. Mayjen HR. Muhammad No.371, Pradahkalikendal, Kec. Dukuhpakis, Kota SBY, Jawa Timur 60189, Indonesia</p></td>
										</tr>
									</tbody>
								</table>
							</div>
						</body> 
						</html>";
						send_email($email_child, "Welcome to Hyouman!", $data);
						
				$sql = $this->admin_model->get_parent_by_child_id($user_payment->user_id);
				$parent = "";
				$email_parent = "";
				if ($sql->num_rows() > 0) {
					$parent = $sql->first_row();
					$email_parent = $parent->email;
					$data = "<html> 
						<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
						<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
						<link href='https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&display=swap' rel='stylesheet'>
						<style>
							body {
								font-family: 'Quicksand';
								background-image: url('https://www.hyouman.varena.id/assets/img/bgisi2.png');
								background-position: center;
								background-repeat: no-repeat;
								background-size: cover;
							}
							p{ color:#28557B; }
						</style>
						<body>
							<div style='height:100%;margin:0;padding:20px 0 20px 0;background-color:#f2f4f6;color:#28557B;width:100%!important'>
								<table style='width:570px;margin:0 auto;padding:20px 50px 20px 50px;background-color:#fff' align='center' width='570' cellpadding='0' cellspacing='0' role='presentation'>
									<tbody>
										<tr>
											<td align='center'><img src='https://www.hyouman.varena.id/assets/img/navbar/logokecil.png' alt='Creating Email Magic' style='display: block;' /></td>
										</tr>
										<tr>
											<td align='center'><p>Please <b>Verify</b> your email</td>
										</tr>
										<tr>
											<td><p>You have requested to register as ".$as_a." in <b>Hyouman</b> to activate, please verify this email by click this button below</p></td>
										</tr>
										<tr>
											<table cellpadding='0' cellspacing='0' width='100%'>
												<tr>
													<td align='right'>
														<img src='https://www.hyouman.varena.id/assets/img/icon/iconoren.png'/>
													</td>
													<td>
														<a style='color: #28557B !important;
															background-color: white !important;
															border: 2px solid #28557B !important;
															padding: 10px 20px;
															border-radius: 10px;box-shadow: none !important;
															outline: none !important;text-decoration:none;' href=".$link."><b>Verify Email</b></a>
													</td>
												</tr>
											</table>
										</tr>
										<tr>
											<td><p>Happy Learning,<br><b>Hyouman Team</b></p></td>
										</tr>
										<tr>
											<td><p>Please ignore this email if you did not register an account through Hyouman</p></td>
										</tr>
									</tbody>
								</table>
								<table style='width:570px;margin:0 auto;padding:20px 50px 20px 50px;background-color:#f2f4f6;' align='center' width='570' cellpadding='0' cellspacing='0' role='presentation'>
									<tbody>
										<tr>
											<td align='center'>
												<a href='https://www.instagram.com' style='text-decoration:none;'>
												<img border='0' src='https://www.hyouman.varena.id/assets/img/icon/instagram.png' width='50' height='50'>
												<a href='https://www.instagram.com' style='text-decoration:none;'>
												<img border='0' src='https://www.hyouman.varena.id/assets/img/icon/facebook.png' width='50' height='50'>
												<a href='https://www.instagram.com' style='text-decoration:none;'>
												<img border='0' src='https://www.hyouman.varena.id/assets/img/icon/instagram.png' width='50' height='50'>
												<a href='https://www.youtube.com' style='text-decoration:none;'>
												<img border='0' src='https://www.hyouman.varena.id/assets/img/icon/linkedin.png' width='50' height='50'>
											</td>
										</tr>
										<tr>
											<td align='center'><p>Kindly follow our social media to get more information about Hyouman</p></td>
										</tr>
										<tr>
											<td align='center'><p>This message was sent to <b>".$email_parent."</b> at your request.<br>The Hyouman, Jl. Mayjen HR. Muhammad No.371, Pradahkalikendal, Kec. Dukuhpakis, Kota SBY, Jawa Timur 60189, Indonesia</p></td>
										</tr>
									</tbody>
								</table>
							</div>
						</body> 
						</html>";
						send_email($email_parent, "Welcome to Hyouman!", $data);
				}
				
			}
		}
		
	}
	
	public function update_user_payment_multiple_1() {
		$new_format_date = $this->change_datetime_format( $this->input->post("payment_date_time_multiple_1") );
		$user_payment_id_1 = json_decode(stripslashes($this->input->post("user_payment_id_1")));	
		// Get data from user token history
		foreach($user_payment_id_1 as $up1){
			$data = array(
				"user_payment_id" => $up1,
				"user_id_check_1" => $this->session->userdata('user_id'),
				"datetime_check_1" => $new_format_date
			);
			$this->admin_model->update_user_payment_1($data);
		}
    }
	
	public function update_user_payment_multiple_2() {
		$new_format_date = $this->change_datetime_format( $this->input->post("payment_date_time_multiple_2") );
		$user_payment_id_2 = json_decode(stripslashes($this->input->post("user_payment_id_2")));	
		// Get data from user token history
		foreach($user_payment_id_2 as $up2){
			$sql = $this->admin_model->get_user_payment_by_user_payment_id($up2);
			$user_payment = "";
			if ($sql->num_rows() > 0) {
				$user_payment = $sql->first_row();
				if($this->session->userdata('user_id') == $user_payment->user_id_check_1){
					echo "false";
					return;
				}else{
					$data = array(
						"user_payment_id" => $up2,
						"user_id_check_2" => $this->session->userdata('user_id'),
						"datetime_check_2" => $new_format_date
					);
					$this->admin_model->update_user_payment_2($data);
				}
			}
		}
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
	
	public function change_datetime_format_from_db($datetime) {
        // $new_Date = substr_replace($datetime,"",10);
        $new_Date = date("j F Y - H:i", strtotime($datetime)); //20 February 2020
        return $new_Date;
    }
	
	public function join_class_after_register($user_id){
		$id = $user_id;
		$sql = $this->user_model->get_user($id);
		if ($sql->num_rows() > 0) {
			$user_detail = $sql->first_row();
		}
		$user_detail->grade_id = $this->user_model->get_grade_user($id)->first_row()->grade_id;
		date_default_timezone_set('Asia/Jakarta'); 
		$now = date('Y-m-d H:i:s');
		$sql2 = $this->class_model->get_class_by_grade_id($user_detail->grade_id,$now);
		$all_class = "";
		if ($sql2->num_rows() > 0) {
			$all_class = $sql2->result();
			foreach($all_class as $ac){
				$class_status = $this->class_model->get_class_status($ac->class_id);
				if(isset($class_status)) {
					continue;
				}
				$class_mission = NULL;
				$sql4 = $this->class_model->get_class_mission_by_class_id($ac->class_id);
				if ($sql4->num_rows() > 0) {
					$class_mission = $sql4->result();
					foreach($class_mission as $res) {
						$sql5 = $this->class_model->get_class_mission_participants_by_user_id_class_mission_id($id,$res->class_mission_id);
						if ($sql5->num_rows() > 0) {
							echo "Already Join This Class";
						}else{
							$class_mission = NULL;
							$sql4 = $this->class_model->get_class_mission_by_class_id($ac->class_id);
							if ($sql4->num_rows() > 0) {
								$class_mission = $sql4->result();
							}
							if($class_mission !=null){
								foreach($class_mission as $res) {
									$data = array(
										'class_mission_id' => $res->class_mission_id,
										'participant_id' => $id
									);
									$this->class_model->insert_class_mission_participants($data);
								}
							}
							//insert user points history
							date_default_timezone_set('Asia/Jakarta'); 
							$now = date('Y-m-d H:i:s');
							$data = array(
								"user_id" => $id,
								"remark" => "Join Class",
								"class_id" => $ac->class_id,
								"points" =>  $ac->class_points,
								"datetime" => $now
							);
							$this->user_model->insert_user_points_history($data);
							$data = array(
								"class_id" => $ac->class_id,
								"participant_id" => $id
							);
							$this->class_model->insert_class_strength_capture($data);
							$this->class_model->insert_class_strength_capture_teacher($data);
							echo "success buy class";
							//return;
						}
					}
				}
			}
		}
	}
	
	public function join_class_left($user_id,$class_id){
		$id = $user_id;
		$sql = $this->user_model->get_user($id);
		if ($sql->num_rows() > 0) {
			$user_detail = $sql->first_row();
		}
		$user_detail->grade_id = $this->user_model->get_grade_user($id)->first_row()->grade_id;
		date_default_timezone_set('Asia/Jakarta'); 
		$now = date('Y-m-d H:i:s');
		
		$class_mission = NULL;
		$sql4 = $this->class_model->get_class_mission_by_class_id($class_id);
		if ($sql4->num_rows() > 0) {
			$class_mission = $sql4->result();
			foreach($class_mission as $res) {
				$data = array(
					'class_mission_id' => $res->class_mission_id,
					'participant_id' => $id
				);
				$this->class_model->insert_class_mission_participants($data);
			}
		}
		//insert user points history
		date_default_timezone_set('Asia/Jakarta'); 
		$now = date('Y-m-d H:i:s');
		$data = array(
			"user_id" => $id,
			"remark" => "Join Class",
			"class_id" => $class_id,
			"points" =>  $ac->class_points,
			"datetime" => $now
		);
		$this->user_model->insert_user_points_history($data);
		$data = array(
			"class_id" => $class_id,
			"participant_id" => $id
		);
		$this->class_model->insert_class_strength_capture($data);
		$this->class_model->insert_class_strength_capture_teacher($data);
		echo "success buy class";
		//return;
	}

    public function call_main($view, $data = NULL) {
        $this->load->view('main/header');
        $this->load->view('main/navbar');
        $this->load->view('admin/'.$view, $data);
    }

}