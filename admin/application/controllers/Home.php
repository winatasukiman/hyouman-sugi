<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent ::__construct();

        //load model
        $this->load->model('home_model');
    }

	public function index() {
		date_default_timezone_set('Asia/Jakarta'); 
		$now = date('Y-m-d H:i:s');
			
        $data = array(
            'data_tourn' => $this->home_model->get_new_tourn($now)
		);
		// Change date format
        for ($i=0; $i < count($data['data_tourn']); $i++) { 
        	$new_datetime = $this->change_datetime_format_from_db($data['data_tourn'][$i]->tourn_datetime);
        	$data['data_tourn'][$i]->tourn_datetime = $new_datetime;
        }

        // Get total participants for each tourn
        for ($i=0; $i < count($data['data_tourn']); $i++) {
            $data['data_tourn'][$i]->tot_participants = $this->home_model->get_total_data_participants($data['data_tourn'][$i]->tourn_id);
            $data['data_tourn'][$i]->tourn_max_participants = $this->home_model->get_max_players($data['data_tourn'][$i]->tourn_type);
        }

        // Get game_name by tourn_type
        for ($i=0; $i < count($data['data_tourn']); $i++) {
            $game_id = $this->home_model->get_game_id_by_tourn_type($data['data_tourn'][$i]->tourn_type);
            $data['data_tourn'][$i]->game_name = $this->home_model->get_game_name_by_id($game_id);
        }

        // Get game_type_name from tourn_type
        for ($i=0; $i < count($data['data_tourn']); $i++) {
            $data['data_tourn'][$i]->game_type_name = $this->home_model->get_game_type_name_by_tourn_type($data['data_tourn'][$i]->tourn_type);
		}
		// echo '<pre>';
		// print_r($data);
		
		//$this->call_main('indexMaintenance.php', $data);
		$this->call_main('index.php', $data);
	}

    public function change_datetime_format_from_db($datetime) {
        $new_Date = substr_replace($datetime,"",10);
        $new_Date = date("j F Y", strtotime($new_Date)); //20 February 2020
        return $new_Date;
    }

	public function call_main($view, $data = NULL) {
		$this->load->view('main/header');
		$this->load->view('main/navbar');
		$this->load->view($view, $data);
		$footer = array(
            'footer_home' => 'footer_home'
		);
		$this->load->view('main/footer_design', $footer);
	}
}
