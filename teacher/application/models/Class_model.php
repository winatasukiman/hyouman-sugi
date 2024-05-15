<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class class_model extends CI_model{
	
	public function get_grade_by_subject($subject){
        $query = $this->db->select("*")
				->from('grade_subject gs')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
                ->join('subject_parent_detail spd', 'spd.subject_parent_detail_id = gs.subject_parent_detail_id', 'left')
				->join('subject s', 's.subject_id = spd.subject_id', 'left')
				->where('s.subject_id',$subject)
                ->get();    
        return $query;
    }
	
	public function get_grade_by_subject_id($user_id,$id){
		$array = array('ts.user_id' => $user_id,'s.subject_id' => $id);
        $query = $this->db->select("*")
				->from('teacher_specialty ts')
				->join('grade_subject gs', 'gs.grade_subject_id = ts.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject_parent_detail spd', 'spd.subject_parent_detail_id = gs.subject_parent_detail_id', 'left')
				->join('subject s', 's.subject_id = spd.subject_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_by_user_id($user_id){
		$array = array('c.class_creator' => $user_id);
        $query = $this->db->select("*")
				->from('class c')
                ->join('academy_year ay', 'ay.academy_year_id = c.academy_year_id', 'left')
				->join('user u', 'c.class_creator = u.user_id', 'left')
				->join('grade_subject gs', 'c.grade_subject_id = gs.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject_parent_detail spd', 'spd.subject_parent_detail_id = gs.subject_parent_detail_id', 'left')
                ->join('subject_parent sp', 'sp.subject_parent_id = spd.subject_parent_id', 'left')
				->join('subject s', 's.subject_id = spd.subject_id', 'left')
                ->join('semester smt', 'smt.semester_id = c.semester_id', 'left')
                ->join('term t', 't.term_id = c.term_id', 'left')
				->order_by("g.grade_id asc,c.term_id asc")
				->where($array)
                ->get();    
        return $query;
    }

    public function get_class(){
        $query = $this->db->select("*")
				->from('class c')
                ->join('academy_year ay', 'ay.academy_year_id = c.academy_year_id', 'left')
				->join('user u', 'c.class_creator = u.user_id', 'left')
				->join('grade_subject gs', 'c.grade_subject_id = gs.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject_parent_detail spd', 'spd.subject_parent_detail_id = gs.subject_parent_detail_id', 'left')
                ->join('subject_parent sp', 'sp.subject_parent_id = spd.subject_parent_id', 'left')
				->join('subject s', 's.subject_id = spd.subject_id', 'left')
                ->join('semester smt', 'smt.semester_id = c.semester_id', 'left')
                ->join('term t', 't.term_id = c.term_id', 'left')
				->order_by("g.grade_id asc")
                ->get();    
        return $query;
    }
	
	public function get_class_mission_by_user_id($user_id){
		$array = array('c.class_creator' => $user_id);
        $query = $this->db->select("*")
				->from('class_mission cm')
				->join('class c', 'cm.class_id = c.class_id', 'left')
				->join('user u', 'c.class_creator = u.user_id', 'left')
				->join('grade_subject gs', 'c.grade_subject_id = gs.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject_parent_detail spd', 'spd.subject_parent_detail_id = gs.subject_parent_detail_id', 'left')
				->join('subject s', 's.subject_id = spd.subject_id', 'left')
				->join('term t', 't.term_id = c.term_id', 'left')
				->order_by('c.class_id', 'asc')
				->order_by('mission_id', 'asc')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_by_class_id($id){
		$array = array('c.class_id' => $id);
        $query = $this->db->select("*")
				->from('class c')
                ->join('academy_year ay', 'ay.academy_year_id = c.academy_year_id', 'left')
				->join('user u', 'c.class_creator = u.user_id', 'left')
				->join('grade_subject gs', 'c.grade_subject_id = gs.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
                ->join('phase p', 'p.phase_id = g.phase_id', 'left')
				->join('subject_parent_detail spd', 'spd.subject_parent_detail_id = gs.subject_parent_detail_id', 'left')
                ->join('subject_parent sp', 'sp.subject_parent_id = spd.subject_parent_id', 'left')
				->join('subject s', 's.subject_id = spd.subject_id', 'left')
                ->join('semester smt', 'smt.semester_id = c.semester_id', 'left')
				->join('term t', 't.term_id = c.term_id', 'left')
                ->order_by("c.class_start_datetime DESC")
				->where($array)
                ->get();    
        return $query;
    }

    public function get_class_for_learning_guide($academy_year,$grade,$term){
        $array = array('c.academy_year_id' => $academy_year,'g.grade_id' => $grade,'c.term_id' => $term);
        $array1 = array('sp.subject_parent_id' => 1);
        $array2 = array('sp.subject_parent_id' => 3);
        $query = $this->db->select("c.class_id,s.subject_id,s.subject_name,smt.semester_name,t.term_name,ay.academy_year_name,g.grade_name")
				->from('class c')
                ->join('academy_year ay', 'ay.academy_year_id = c.academy_year_id', 'left')
				->join('user u', 'c.class_creator = u.user_id', 'left')
				->join('grade_subject gs', 'c.grade_subject_id = gs.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject_parent_detail spd', 'spd.subject_parent_detail_id = gs.subject_parent_detail_id', 'left')
                ->join('subject_parent sp', 'sp.subject_parent_id = spd.subject_parent_id', 'left')
				->join('subject s', 's.subject_id = spd.subject_id', 'left')
                ->join('semester smt', 'smt.semester_id = c.semester_id', 'left')
				->join('term t', 't.term_id = c.term_id', 'left')
                ->order_by("c.class_start_datetime ASC")
				->where($array)
                ->group_start()
                    ->where($array1)
                    ->or_where($array2)
                ->group_end()
                ->get();    
        return $query;
    }
    public function get_class_id_where_not_in_status($status_id){
        $sql = $this->db->distinct()->select('*')
                ->from('status_class_class_detail')
                ->where('status_class_id !=',$status_id)
                ->get();
        return $sql;
    }


    public function get_class_for_download($academy_year,$grade_subject,$semester = null){
        if($semester != null){
            $array = array('c.academy_year_id' => $academy_year,'c.grade_subject_id' => $grade_subject,'c.semester_id' => $semester);
        }else{
            $array = array('c.academy_year_id' => $academy_year,'c.grade_subject_id' => $grade_subject);
        }
        // $sql = $this->class_model->get_class_id_where_not_in_status(3)->result();
        // $class_id_not_3 = [];
        // foreach($sql as $res){
        //     array_push($class_id_not_3,$res->class_id);
        // }

        $query = $this->db->select("*")
				->from('class c')
                ->join('academy_year ay', 'ay.academy_year_id = c.academy_year_id', 'left')
				->join('user u', 'c.class_creator = u.user_id', 'left')
				->join('grade_subject gs', 'c.grade_subject_id = gs.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject_parent_detail spd', 'spd.subject_parent_detail_id = gs.subject_parent_detail_id', 'left')
				->join('subject s', 's.subject_id = spd.subject_id', 'left')
                ->join('semester smt', 'smt.semester_id = c.semester_id', 'left')
				->join('term t', 't.term_id = c.term_id', 'left')
                //->order_by("c.class_start_datetime ASC")
                ->order_by("c.term_id ASC")
				->where($array)
                //->where_in('c.class_id',$class_id_status_not_3)
                ->get();
        
        return $query;
    }
	
	public function get_class_mission_by_class_id($id){
		$array = array('class_id' => $id);
        $query = $this->db->select("*")
				->from('class_mission')
				->order_by('publish_datetime', 'asc')
				->where($array)
                ->get();
        return $query;
    }
	
	public function get_class_mission_by_class_mission_id($id){
		$array = array('class_mission_id' => $id);
        $query = $this->db->select("*")
				->from('class_mission')
				->order_by('mission_id', 'asc')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function insert_class($data) {
        $query = $this->db->insert("class", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function insert_class_mission($data) {
        $query = $this->db->insert("class_mission", $data);
		$insert_id = $this->db->insert_id();
        if ($query) {
            return $insert_id;
        } else {
            return false;
        }
    }
	
	public function update_class($data,$id) {
        $query = $this->db->where('class_id', $id)
                            ->update('class', $data); 
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function update_class_start_datetime($data,$id) {
        $query = $this->db->where('class_id', $id)
                            ->update('class', array(
							'class_start_datetime' => $data['class_start_datetime'])); 
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function update_class_finish_datetime($data,$id) {
        $query = $this->db->where('class_id', $id)
                            ->update('class', array(
							'class_finish_datetime' => $data['class_finish_datetime'])); 
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function update_class_thumbnail($data) {
        $query = $this->db->where('class_id', $data['class_id'])
                            ->update('class', array(
							'class_image' => $data['class_image'])); 
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function get_term(){
        $array = array('t.status' => 1);
        $query = $this->db->select("*")
				->from('term t')
                ->join('semester s', 't.semester_id = s.semester_id', 'left')
                ->where($array)
                ->get();    
        return $query;
    }

    public function get_term_by_id($id){
        $array = array('term_id' => $id);
        $query = $this->db->select("*")
				->from('term')
                ->where($array)
                ->get();    
        return $query;
    }
	
	public function get_grade_government_checklist($id){
		$array = array('grade_id' => $id);
        $query = $this->db->select("*")
				->from('grade_government_checklist ggc')
				->join('government_checklist gc', 'ggc.government_checklist_id = gc.government_checklist_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_government_checklist($id){
		$array = array('cgc.class_id' => $id);
        $query = $this->db->select("*")
				->from('class_government_checklist cgc')
				->join('government_checklist gc', 'cgc.government_checklist_id = gc.government_checklist_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_grade_sdg_indicator($id){
		$array = array('grade_id' => $id);
        $query = $this->db->select("*")
				->from('grade_sdg_indicator gsi')
				->join('sdg_indicator si', 'gsi.sdg_indicator_id = si.sdg_indicator_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_sdg_indicator($id){
		$array = array('class_id' => $id);
        $query = $this->db->select("*")
				->from('class_sdg_indicator csi')
				->join('sdg_indicator si', 'csi.sdg_indicator_id = si.sdg_indicator_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_mission_link($id){
		$array = array('class_mission_id' => $id);
        $query = $this->db->select("*")
				->from('class_mission_link')
				->where($array)
                ->get();    
        return $query;
    }

    public function get_class_mission_res($id){
		$array = array('class_mission_id' => $id);
        $query = $this->db->select("*")
				->from('class_mission_resource')
				->where($array)
                ->get();    
        return $query;
    }

    public function get_count_class_mission_lesson_activities_by_class_mission_id($id){
		$array = array('class_mission_id' => $id);
        $query = $this->db->select("*")
				->from('class_mission_lesson_activities')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_mission_participants($id){
		$array = array('cmp.class_mission_id' => $id);
        $query = $this->db->select("*")
				->from('class_mission_participants cmp')
				->join('user u', 'cmp.participant_id = u.user_id', 'left')
				->join('class_mission cm', 'cm.class_mission_id = cmp.class_mission_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_mission_participants_by_class_id($id){
		$array = array('c.class_id' => $id);
        $query = $this->db->select("*")
				->from('class_mission_participants cmp')
				->join('user u', 'cmp.participant_id = u.user_id', 'left')
				->join('class_mission cm', 'cmp.class_mission_id = cm.class_mission_id', 'left')
				->join('class c', 'cm.class_id = c.class_id', 'left')
				->order_by('cmp.participant_id', 'asc')
				->order_by('cmp.class_mission_id', 'asc')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function delete_class_gc_sdg($id) {
		$sql = $this->db->where('class_id', $id)
						->delete('class_government_checklist');
		if ($sql) {
			$sql2 = $this->db->where('class_id', $id)
						->delete('class_sdg_indicator');
			if ($sql2) {
				return true;
			}
			return false;
		}
		return false;
	}
	
	public function insert_class_gci($data) {
        $query = $this->db->insert("class_government_checklist", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function insert_class_sii($data) {
        $query = $this->db->insert("class_sdg_indicator", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function update_class_mission($data, $id) {
        $query = $this->db->where('class_mission_id', $id)
                            ->update('class_mission', $data); 
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function delete_class_mission($id) {
		$sql = $this->db->where('class_mission_id', $id)
					->delete('class_mission_link');
		if ($sql) {
			$sql = $this->db->where('class_mission_id', $id)
						->delete('class_mission');
			if ($sql) {
				return true;
			}
			return false;
		}
		return false;
	}

    public function delete_class_mission_lesson_activities($id) {
		$sql = $this->db->where('class_mission_id', $id)
					->delete('class_mission_lesson_activities');
		if ($sql) {
			return true;
		}
		return false;
	}

    public function delete_class_mission_lesson_activities_by_id($id) {
		$sql = $this->db->where('class_mission_lesson_activities_id', $id)
					->delete('class_mission_lesson_activities');
		if ($sql) {
			return true;
		}
		return false;
	}
	
	public function delete_class_mission_participants($id) {
		$sql = $this->db->where('class_mission_id', $id)
					->delete('class_mission_participants');
		if ($sql) {
			return true;
		}
		return false;
	}
	
	public function delete_class_mission_link($id) {
		$sql = $this->db->where('class_mission_id', $id)
						->delete('class_mission_link');
		if ($sql) {
			return true;
		}
		return false;
	}

    public function delete_class_mission_link_by_id($id) {
		$sql = $this->db->where('class_mission_link_id', $id)
						->delete('class_mission_link');
		if ($sql) {
			return true;
		}
		return false;
	}

    public function delete_class_mission_res($id) {
		$sql = $this->db->where('class_mission_id', $id)
						->delete('class_mission_resource');
		if ($sql) {
			return true;
		}
		return false;
	}

    public function delete_class_mission_res_by_id($id) {
		$sql = $this->db->where('class_mission_resource_id', $id)
						->delete('class_mission_resource');
		if ($sql) {
			return true;
		}
		return false;
	}
	
	public function insert_class_mission_link($data) {
        $query = $this->db->insert("class_mission_link", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_class_mission_res($data) {
        $query = $this->db->insert("class_mission_resource", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_class_mission_lesson_activities($data) {
        $query = $this->db->insert("class_mission_lesson_activities", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function update_attendance($data,$id) {
        $query = $this->db->where('class_mission_participants_id', $id)
                            ->update('class_mission_participants', array(
							'attendance' => $data['attendance'],
							'attendance_datetime' => $data['attendance_datetime'])); 
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function get_status_task_class_mission_participants($id){
		$array = array('class_mission_participants_id' => $id);
        $query = $this->db->select("*")
				->from('status_task_class_mission_participants_detail')
				->order_by('datetime', 'desc')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function update_class_mission_participants_task_review($data, $id) {
        $query = $this->db->where('class_mission_participants_id', $id)
                            ->update('class_mission_participants', array('task_review' => $data['task_review'])); 
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function insert_status_task_class_mission_participants($data) {
        $query = $this->db->insert("status_task_class_mission_participants_detail", $data);
        if ($query){
            return true;
        } else {
            return false;
        }
    }
	
	public function insert_class_strength_capture($data) {
        $query = $this->db->insert("class_strength_capture_student", $data);
        if ($query){
            return true;
        } else {
            return false;
        }
    }
	
	public function get_class_strength_capture_by_class_id($id){
		$array = array('csc.class_id' => $id);
        $query = $this->db->select("*")
				->from('class_strength_capture_student csc')
				->join('user u', 'csc.participant_id = u.user_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_class_strength_capture_teacher_by_class_id($id){
		$array = array('csct.class_id' => $id);
        $query = $this->db->select("*")
				->from('class_strength_capture_teacher csct')
				->join('user u', 'csct.participant_id = u.user_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function update_class_strength_capture($data, $id) {
        $query = $this->db->where('class_strength_capture_teacher_id', $id)
                            ->update('class_strength_capture_teacher', array(
							"progress_report" => $data['progress_report']));
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function get_status_class($id){
		$array = array('class_id' => $id);
        $query = $this->db->select("*")
				->from('status_class_class_detail')
				->order_by('datetime', 'desc')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function insert_status_class($data) {
        $query = $this->db->insert("status_class_class_detail", $data);
        if ($query){
            return true;
        } else {
            return false;
        }
    }
	
	public function insert_class_mission_participants($data) {
        $query = $this->db->insert("class_mission_participants", $data);
        if ($query){
            return true;
        } else {
            return false;
        }
    }
	
	public function insert_status_mission($data) {
        $query = $this->db->insert("status_class_mission_detail", $data);
        if ($query){
            return true;
        } else {
            return false;
        }
    }
	
	public function get_status_mission($id){
		$array = array('class_mission_id' => $id);
        $query = $this->db->select("*")
				->from('status_class_mission_detail')
				->order_by('datetime', 'desc')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function insert_class_strength_capture_teacher($data) {
        $query = $this->db->insert("class_strength_capture_teacher", $data);
        if ($query){
            return true;
        } else {
            return false;
        }
    }
	
	public function update_class_strength_capture_teacher($data, $id) {
        $query = $this->db->where('class_strength_capture_teacher_id', $id)
                            ->update('class_strength_capture_teacher', array(
							"b_reflection" => $data['b_reflection'],
							"b_rating" => $data['b_rating'],
							"s1_reflection" => $data['s1_reflection'],
							"s1_rating" => $data['s1_rating'],
							"t_reflection" => $data['t_reflection'],
							"t_rating" => $data['t_rating'],
							"e_reflection" => $data['e_reflection'],
							"e_rating" => $data['e_rating'],
							"a_reflection" => $data['a_reflection'],
							"a_rating" => $data['a_rating'],
							"m_reflection" => $data['m_reflection'],
							"m_rating" => $data['m_rating'],
							"s2_reflection" => $data['s2_reflection'],
							"s2_rating" => $data['s2_rating']));
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function update_strength_teacher($data, $id) {
        $query = $this->db->where('class_strength_capture_teacher_id', $id)
                            ->update('class_strength_capture_teacher', array(
							"s_strength" => $data['s_strength'],
							"s_strength_rating" => $data['s_strength_rating'],
							"t1_strength" => $data['t1_strength'],
							"t1_strength_rating" => $data['t1_strength_rating'],
							"r_strength" => $data['r_strength'],
							"r_strength_rating" => $data['r_strength_rating'],
							"e_strength" => $data['e_strength'],
							"e_strength_rating" => $data['e_strength_rating'],
							"n_strength" => $data['n_strength'],
							"n_strength_rating" => $data['n_strength_rating'],
							"g_strength" => $data['g_strength'],
							"g_strength_rating" => $data['g_strength_rating'],
							"t2_strength" => $data['t2_strength'],
							"t2_strength_rating" => $data['t2_strength_rating'],
							"h_strength" => $data['h_strength'],
							"h_strength_rating" => $data['h_strength_rating']));
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
	
	public function get_class_strength_capture_teacher_by_class_id_user_id($class_id,$id){
		$array = array('csc.class_id' => $class_id,'csc.participant_id' => $id);
        $query = $this->db->select("*")
				->from('class_strength_capture_teacher csc')
				->join('class c', 'c.class_id = csc.class_id', 'left')
				->join('user u', 'c.class_creator = u.user_id', 'left')
				->join('grade_subject gs', 'c.grade_subject_id = gs.grade_subject_id', 'left')
				->join('grade g', 'g.grade_id = gs.grade_id', 'left')
				->join('subject_parent_detail spd', 'spd.subject_parent_detail_id = gs.subject_parent_detail_id', 'left')
				->join('subject s', 's.subject_id = spd.subject_id', 'left')
				->join('term t', 't.term_id = c.term_id', 'left')
				->where($array)
                ->get();    
        return $query;
    }

    public function get_class_mission_participants_detail($class_mission_participants_id) {
		$array = array('class_mission_participants_id' => $class_mission_participants_id);
        $query = $this->db->select("*")
				->from('class_mission_participants_detail')
				->where($array)
                ->get();    
        return $query;
	}
	
	public function get_class_mission_sdg_indicator($class_mission_id){
        $array = array('cmsi.class_mission_id' => $class_mission_id);
        $query = $this->db->select("*")
				->from('class_mission_sdg_indicator cmsi')
				->join('sdg_indicator si', 'si.sdg_indicator_id = cmsi.sdg_indicator_id')
				->where($array)
                ->get();    
        return $query;
    }
	
	public function get_sdg_indicator(){
        $query = $this->db->select("*")
				->from('sdg_indicator')
                ->get();    
        return $query;
    }
	
	public function insert_class_mission_sdg_indicator($data) {
        $query = $this->db->insert("class_mission_sdg_indicator", $data);
        if ($query){
            return true;
        } else {
            return false;
        }
    }
	
	public function delete_class_mission_sdg_indicator($id) {
		$sql = $this->db->where('class_mission_id', $id)
						->delete('class_mission_sdg_indicator');
		if ($sql) {
			return true;
		}
		return false;
	}
	
	public function update_class_mission_sdg_indicator($id, $data) {
		$query = $this->db->where('class_mission_sdg_indicator_id', $id)
							->update('class_mission_sdg_indicator', $data); 
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

    public function delete_class_bank_of_competencies($id) {
		$sql = $this->db->where('class_mission_id', $id)
						->delete('class_mission_bank_of_competencies');
		if ($sql) {
			return true;
		}
		return false;
	}

    public function get_class_mission_participants_by_class_mission_id($class_mission_id){
        $array = array('class_mission_id' => $class_mission_id);
        $query = $this->db->select("*")
				->from('class_mission_participants')
				->where($array)
                ->get();    
        return $query;
    }

    public function get_class_mission_learning_objectives_by_class_mission_id($class_mission_id){
        $array = array('class_mission_id' => $class_mission_id);
        $query = $this->db->select("*")
				->from('class_mission_learning_objectives')
				->where($array)
                ->get();    
        return $query;
    }

    public function delete_class($class_id) {
		$cm = $this->get_class_mission_by_class_id($class_id)->result();
        foreach($cm as $m){
            $cmp = $this->get_class_mission_participants_by_class_mission_id($m->class_mission_id)->result();
            foreach($cmp as $p){
                $sql = $this->db->where('class_mission_participants_id', $p->class_mission_participants_id)
                                    ->delete('class_mission_participants_detail');
                $sql = $this->db->where('class_mission_participants_id', $p->class_mission_participants_id)
                                    ->delete('class_mission_participants_bank_of_competencies');
                $sql = $this->db->where('class_mission_participants_id', $p->class_mission_participants_id)
                                    ->delete('status_task_class_mission_participants_detail');
            }
            $sql = $this->db->where('class_mission_id', $m->class_mission_id)
						->delete('class_mission_sdg_indicator');
            $sql = $this->db->where('class_mission_id', $m->class_mission_id)
						->delete('class_mission_participants');
            $sql = $this->db->where('class_mission_id', $m->class_mission_id)
						->delete('class_mission_link');
            $sql = $this->db->where('class_mission_id', $m->class_mission_id)
						->delete('class_mission_resource');
            $sql = $this->db->where('class_mission_id', $m->class_mission_id)
						->delete('class_mission_lesson_activities');
            $sql = $this->db->where('class_mission_id', $m->class_mission_id)
						->delete('class_mission_learning_objectives');
            $sql = $this->db->where('class_mission_id', $m->class_mission_id)
						->delete('class_mission_bank_of_competencies');
            $sql = $this->db->where('class_mission_id', $m->class_mission_id)
						->delete('status_class_mission_detail');
            $sql = $this->db->where('class_mission_id', $m->class_mission_id)
						->delete('class_mission');
        }
        $sql = $this->db->where('class_id', $class_id)
                                ->delete('class_strength_capture_student');
        $sql = $this->db->where('class_id', $class_id)
                                ->delete('class_sdg_indicator');
        $sql = $this->db->where('class_id', $class_id)
                                ->delete('class_government_checklist');
        $sql = $this->db->where('class_id', $class_id)
                                ->delete('class_strength_capture_teacher');
        $sql = $this->db->where('class_id', $class_id)
                                ->delete('status_class_class_detail');
        $sql = $this->db->where('class_id', $class_id)
                                ->delete('class');
	}

    public function get_class_mission_core_skill($class_mission_id){
        $array = array('cmcs.class_mission_id' => $class_mission_id);
        $query = $this->db->select("*")
				->from('class_mission_core_skill cmcs')
                ->join('core_skills cs', 'cs.core_skill_id = cmcs.core_skill_id')
				->where($array)
                ->get();    
        return $query;
    }

    public function get_class_mission_pencapaian_tujuan_pembelajaran($class_mission_id){
        $array = array('cmptp.class_mission_id' => $class_mission_id);
        $query = $this->db->select("*")
				->from('class_mission_pencapaian_tujuan_pembelajaran cmptp')
                ->join('pencapaian_tujuan_pembelajaran ptp', 'ptp.pencapaian_tujuan_pembelajaran_id = cmptp.pencapaian_tujuan_pembelajaran_id')
				->where($array)
                ->get();    
        return $query;
    }

    public function get_class_mission_profil_pembelajaran_pancasila($class_mission_id){
        $array = array('cmppp.class_mission_id' => $class_mission_id);
        $query = $this->db->select("*")
				->from('class_mission_profil_pembelajaran_pancasila cmppp')
                ->join('profil_pembelajaran_pancasila ppp', 'ppp.profil_pembelajaran_pancasila_id = cmppp.profil_pembelajaran_pancasila_id')
				->where($array)
                ->get();    
        return $query;
    }

    public function get_class_mission_class_activity($class_mission_id){
        $array = array('cmca.class_mission_id' => $class_mission_id);
        $query = $this->db->select("*")
				->from('class_mission_class_activity cmca')
                ->join('class_activities ca', 'ca.class_activity_id = cmca.class_activity_id')
				->where($array)
                ->get();    
        return $query;
    }

    public function delete_class_mission_core_concept($id) {
		$sql = $this->db->where('class_mission_id', $id)
						->delete('class_mission_core_concept');
		if ($sql) {
			return true;
		}
		return false;
	}

    public function delete_class_mission_core_skill($id) {
		$sql = $this->db->where('class_mission_id', $id)
						->delete('class_mission_core_skill');
		if ($sql) {
			return true;
		}
		return false;
	}

    public function insert_class_mission_core_skill($data) {
        $query = $this->db->insert("class_mission_core_skill", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_class_mission_pencapaian_tujuan_pembelajaran($id) {
		$sql = $this->db->where('class_mission_id', $id)
						->delete('class_mission_pencapaian_tujuan_pembelajaran');
		if ($sql) {
			return true;
		}
		return false;
	}

    public function insert_class_mission_pencapaian_tujuan_pembelajaran($data) {
        $query = $this->db->insert("class_mission_pencapaian_tujuan_pembelajaran", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_class_mission_profil_pembelajaran_pancasila($id) {
		$sql = $this->db->where('class_mission_id', $id)
						->delete('class_mission_profil_pembelajaran_pancasila');
		if ($sql) {
			return true;
		}
		return false;
	}

    public function insert_class_mission_profil_pembelajaran_pancasila($data) {
        $query = $this->db->insert("class_mission_profil_pembelajaran_pancasila", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_class_mission_core_concept($data) {
        $query = $this->db->insert("class_mission_core_concept", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_class_mission_class_activity($id) {
		$sql = $this->db->where('class_mission_id', $id)
						->delete('class_mission_class_activity');
		if ($sql) {
			return true;
		}
		return false;
	}

    public function insert_class_mission_class_activity($data) {
        $query = $this->db->insert("class_mission_class_activity", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function get_class_mission_core_concept($class_mission_id){
        $array = array('class_mission_id' => $class_mission_id);
        $query = $this->db->select("*")
				->from('class_mission_core_concept')
				->where($array)
                ->get();    
        return $query;
    }

    // competencies cambridge
    public function get_class_mission_competencies_cambridge_by_class_mission_id($class_mission_id){
        $array = array('cmcc.class_mission_id' => $class_mission_id);
        $query = $this->db->select("*")
				->from('class_mission_competencies_cambridge cmcc')
                ->join('competencies_cambridge cc', 'cc.competencies_cambridge_id = cmcc.competencies_cambridge_id', 'left')
                ->join('subject s', 's.subject_id = cc.subject_id', 'left')
                ->order_by("cc.subject_id asc")
				->where($array)
                ->get();    
        return $query;
    }

    public function get_class_mission_competencies_cambridge_by_class_mission_id_competencies_cambridge_id($class_mission_id,$competencies_cambridge_id){
        $array = array('class_mission_id' => $class_mission_id,'competencies_cambridge_id' => $competencies_cambridge_id);
        $query = $this->db->select("*")
				->from('class_mission_competencies_cambridge')
				->where($array)
                ->get();    
        return $query;
    }

    public function insert_class_mission_competencies_cambridge($data) {
        $query = $this->db->insert("class_mission_competencies_cambridge", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function update_class_mission_competencies_cambridge($id, $data) {
		$query = $this->db->where('class_mission_competencies_cambridge_id', $id)
							->update('class_mission_competencies_cambridge', $data); 
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

    public function delete_class_mission_competencies_cambridge($id) {
		$sql = $this->db->where('class_mission_competencies_cambridge_id', $id)
						->delete('class_mission_competencies_cambridge');
	}
    // end of competencies cambridge

    // competencies k13
    public function get_class_mission_competencies_k13_by_class_mission_id($class_mission_id){
        $array = array('cmck.class_mission_id' => $class_mission_id);
        $query = $this->db->select("*")
				->from('class_mission_competencies_k13 cmck')
                ->join('competencies_k13 ck', 'ck.competencies_k13_id = cmck.competencies_k13_id', 'left')
                ->join('subject s', 's.subject_id = ck.subject_id', 'left')
                ->order_by("ck.subject_id asc")
				->where($array)
                ->get();    
        return $query;
    }

    public function get_class_mission_competencies_k13_by_class_mission_id_competencies_k13_id($class_mission_id,$competencies_k13_id){
        $array = array('class_mission_id' => $class_mission_id,'competencies_k13_id' => $competencies_k13_id);
        $query = $this->db->select("*")
				->from('class_mission_competencies_k13')
				->where($array)
                ->get();    
        return $query;
    }

    public function insert_class_mission_competencies_k13($data) {
        $query = $this->db->insert("class_mission_competencies_k13", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function update_class_mission_competencies_k13($id, $data) {
		$query = $this->db->where('class_mission_competencies_k13_id', $id)
							->update('class_mission_competencies_k13', $data); 
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

    public function delete_class_mission_competencies_k13($id) {
		$sql = $this->db->where('class_mission_competencies_k13_id', $id)
						->delete('class_mission_competencies_k13');
	}
    // end of competencies k13

    // competencies merdeka
    public function get_class_mission_competencies_merdeka_by_class_mission_id($class_mission_id){
        $array = array('cmcm.class_mission_id' => $class_mission_id);
        $query = $this->db->select("*")
				->from('class_mission_competencies_merdeka cmcm')
                ->join('competencies_merdeka cm', 'cm.competencies_merdeka_id = cmcm.competencies_merdeka_id', 'left')
                ->join('subject s', 's.subject_id = cm.subject_id', 'left')
                ->order_by("cm.subject_id asc")
				->where($array)
                ->get();    
        return $query;
    }

    public function get_class_mission_competencies_merdeka_by_class_mission_id_competencies_merdeka_id($class_mission_id,$competencies_merdeka_id){
        $array = array('class_mission_id' => $class_mission_id,'competencies_merdeka_id' => $competencies_merdeka_id);
        $query = $this->db->select("*")
				->from('class_mission_competencies_merdeka')
				->where($array)
                ->get();    
        return $query;
    }

    public function insert_class_mission_competencies_merdeka($data) {
        $query = $this->db->insert("class_mission_competencies_merdeka", $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function update_class_mission_competencies_merdeka($id, $data) {
		$query = $this->db->where('class_mission_competencies_merdeka_id', $id)
							->update('class_mission_competencies_merdeka', $data); 
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

    public function delete_class_mission_competencies_merdeka($id) {
		$sql = $this->db->where('class_mission_competencies_merdeka_id', $id)
						->delete('class_mission_competencies_merdeka');
	}
    // end of competencies merdeka
}