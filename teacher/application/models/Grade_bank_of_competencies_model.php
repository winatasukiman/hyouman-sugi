<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grade_bank_of_competencies_model extends CI_model{
	
	public function get_bank_of_competencies_detail_by_grade_id($grade_id){
		$array = array('gboc.grade_id' => $grade_id);
        $query = $this->db->select("*")
				->from('grade_bank_of_competencies gboc')
                ->join('grade g', 'g.grade_id = gboc.grade_id')
                ->join('bank_of_competencies_detail bocd', 'bocd.bank_of_competencies_detail_id = gboc.bank_of_competencies_detail_id')
                ->join('subject s', 's.subject_id = bocd.subject_id')
                ->join('bank_of_competencies boc', 'boc.bank_of_competencies_id = bocd.bank_of_competencies_id')
				->where($array)
                ->get();
        return $query;
    }

    public function get_bank_of_competencies_detail(){
        $query = $this->db->select("*")
				->from('grade_bank_of_competencies gboc')
                ->join('grade g', 'g.grade_id = gboc.grade_id')
                ->get();
        return $query;
    }

    public function get_bank_of_competencies_detail_by_bocid($id){
        $array = array('bank_of_competencies_detail_id' => $id);
        $query = $this->db->select("*")
				->from('bank_of_competencies_detail')
                ->where($array)
                ->get();
        return $query;
    }

    public function delete_gboc_by_gbocid($id) {
		$sql = $this->db->where('grade_bank_of_competencies_id', $id)
						->delete('grade_bank_of_competencies');
		if ($sql) {
            return true;
		}
		return false;
	}
	
}