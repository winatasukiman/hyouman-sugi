<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank_of_competencies_model extends CI_model{
	
	public function get_bank_of_competencies(){
		$bank_of_competencies = new stdClass();
		$sql = $this->db->select("*")
				->from('bank_of_competencies')
				->get();
		if($sql->num_rows() > 0){
			$bank_of_competencies = $sql->result();
			foreach($bank_of_competencies as $boc){
				$boc->bank_of_competencies_detail = $this->get_bank_of_competencies_detail_by_bank_of_competencies_id($boc->bank_of_competencies_id)->result();
			}
		}
        return $bank_of_competencies;
    }
	
	public function get_bank_of_competencies_detail(){
		$sql = $this->db->select("*")
				->from('bank_of_competencies_detail')
				->get();
        return $sql->result();
    }
	
	public function get_bank_of_competencies_detail_by_bank_of_competencies_id($bank_of_competencies_id){
		$array = array('bank_of_competencies_id' => $bank_of_competencies_id);
        $query = $this->db->select("*")
				->from('bank_of_competencies_detail')
				->where($array)
                ->get();
        return $query;
    }
	
	public function get_class_mission_bank_of_competencies_by_class_mission_id($class_mission_id){
		$array = array('cmboc.class_mission_id' => $class_mission_id);
        $query = $this->db->select("*")
				->from('class_mission_bank_of_competencies cmboc')
				->join('bank_of_competencies_detail bocd', 'bocd.bank_of_competencies_detail_id = cmboc.bank_of_competencies_detail_id')
				->join('subject s', 's.subject_id = bocd.subject_id')
				->join('bank_of_competencies boc', 'boc.bank_of_competencies_id = bocd.bank_of_competencies_id')
				->where($array)
                ->get();
        return $query;
    }
	
	public function get_class_mission_participants_bank_of_competencies_by_class_mission_participants_id($class_mission_participants_id){
		$array = array('cmpboc.class_mission_participants_id' => $class_mission_participants_id);
        $query = $this->db->select("*")
				->from('class_mission_participants_bank_of_competencies cmpboc')
				->join('bank_of_competencies_detail bocd', 'bocd.bank_of_competencies_detail_id = cmpboc.bank_of_competencies_detail_id')
				->join('bank_of_competencies boc', 'boc.bank_of_competencies_id = bocd.bank_of_competencies_id')
				->join('class_mission_participants cmp', 'cmp.class_mission_participants_id = cmpboc.class_mission_participants_id')
				->where($array)
                ->get();
        return $query;
    }
	
	public function insert_class_mission_bank_of_competencies($data) {
        $query = $this->db->insert("class_mission_bank_of_competencies", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function insert_class_mission_participants_bank_of_competencies($data) {
        $query = $this->db->insert("class_mission_participants_bank_of_competencies", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function get_class_mission_bank_of_competencies_by_class_mission_id_bank_of_competencies_detail_id($class_mission_id,$bank_of_competencies_detail_id){
		$array = array('class_mission_id' => $class_mission_id,'bank_of_competencies_detail_id' => $bank_of_competencies_detail_id);
        $query = $this->db->select("*")
				->from('class_mission_bank_of_competencies')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_mission_partipants_bank_of_competencies_by_class_mission_participants_id_bank_of_competencies_detail_id($class_mission_participants_id,$bank_of_competencies_detail_id){
		$array = array('class_mission_participants_id' => $class_mission_participants_id,'bank_of_competencies_detail_id' => $bank_of_competencies_detail_id);
        $query = $this->db->select("*")
				->from('class_mission_participants_bank_of_competencies')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function delete_class_mission_bank_of_competencies($class_mission_id,$bank_of_competencies_detail_id){
        $sql = $this->get_class_mission_bank_of_competencies_by_class_mission_id_bank_of_competencies_detail_id($class_mission_id,$bank_of_competencies_detail_id);
		if($sql->num_rows() > 0){
			foreach($sql->result() as $res){
				$this->db->where('class_mission_bank_of_competencies_id', $res->class_mission_bank_of_competencies_id)
						->delete('class_mission_bank_of_competencies');
			}
			
		}
    }

	public function delete_class_mission_bank_of_competencies_by_class_mission_id($class_mission_id){
        $this->db->where('class_mission_id', $class_mission_id)
						->delete('class_mission_bank_of_competencies');
    }
	
	public function delete_class_mission_participants_bank_of_competencies($class_mission_participants_id,$bank_of_competencies_detail_id){
        $sql = $this->get_class_mission_partipants_bank_of_competencies_by_class_mission_participants_id_bank_of_competencies_detail_id($class_mission_participants_id,$bank_of_competencies_detail_id);
		if($sql->num_rows() > 0){
			foreach($sql->result() as $res){
				$this->db->where('class_mission_participants_bank_of_competencies_id', $res->class_mission_participants_bank_of_competencies_id)
						->delete('class_mission_participants_bank_of_competencies');
			}
		}
    }
}