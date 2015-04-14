<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appointment_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function new_appointment($req_id, $time){
		
		$insert_appointment_data = array(
			'admin_id' => '1',
			'req_id' => $req_id,
			'appt_time' => $time,
			'appt_venue' => '',
			'status' => 'pending',
		);

		//insert new applicant
		$this->db->insert('appointment_rel', $insert_appointment_data);
		
		return $this->db->insert_id();
	}

	function getAll(){
		$q = $this->db->get('appointment_rel');
		return $q->result();
	}

	function find($id){
		$this->db->where('app_id', $id);
		return $this->db->get('appointment_rel')->row();
	}
}