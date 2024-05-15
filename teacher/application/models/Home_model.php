<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_model{
    public function get_new_tourn($now) {
        $query = $this->db->select("*")
                 ->from('tournament')
                 ->where('tourn_datetime >=', $now)
                 ->order_by('tourn_datetime', 'DESC')
                 ->get();
        return $query->result();
    }

    public function get_total_data_participants($id) {
        $query = $this->db->select("*")
                ->from("tourn_result")
                ->where('tourn_id', $id)
                ->get();
        return $query->num_rows();
    }

    public function get_max_players($game_type_id) {
        $query = $this->db->select('max_players')
                 ->from('game_type')
                 ->where('game_type_id', $game_type_id)
                 ->get();   
        if ($query->num_rows() > 0) {
            return $query->first_row()->max_players;
        }
    }

    public function get_game_id_by_tourn_type($tourn_type) {
        $query = $this->db->select('gt.game_id')
                    ->from('game_type gt')
                    ->join('tournament t', 't.tourn_type =  gt.game_type_id', 'left')
                    ->where('t.tourn_type', $tourn_type)
                    ->get();   
        if ($query->num_rows() > 0) {
            return $query->first_row()->game_id;
        }
    }

    public function get_game_name_by_id($id) {
        $query = $this->db->select('game_name')
                 ->from('game')
                 ->where('game_id', $id)
                 ->get();   
        if ($query->num_rows() > 0) {
            return $query->first_row()->game_name;
        }
    }

    public function get_game_type_name_by_tourn_type($tourn_type) {
        $query = $this->db->select('gt.game_type_name')
                    ->from('game_type gt')
                    ->join('tournament t', 't.tourn_type =  gt.game_type_id', 'left')
                    ->where('t.tourn_type', $tourn_type)
                    ->get();   
        if ($query->num_rows() > 0) {
            return $query->first_row()->game_type_name;
        }
    }
}