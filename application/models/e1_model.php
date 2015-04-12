<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class E1_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function new_application($data){
		
		$insert_applicant_data = array(
			'first_name' => $data['first_name'],
			'last_name' => $data['last_name'],
			'middle_name' => $data['middle_name'],
			'address' => $data['address'],
			'postal_code' => $data['postal'],
			'sex' => $data['sex'],
			'dateofbirth' => $data['birthday'],//strtotime('Y-m-d', $data['birthday']),
			'civilstatus' => $data['civilstatus']
		);

		//insert new applicant
		$this->db->insert('applicant', $insert_applicant_data);
		
		//add beneficiaries
		$applicant_id = $this->db->insert_id();
		$applicant_beneficiaries = $data['beneficiaries'];
		$this->load->model('beneficiaries_model');
		$this->beneficiaries_model->add_beneficiaries($applicant_beneficiaries, $applicant_id);

		//insert form
		$this->db->insert('form_table', array('form_type' => 'e1'));
		$form_id = $this->db->insert_id();
		$this->db->insert('e1', array('e1_id' => $form_id));

		//insert into relationship
		$req_insert_data = array(
			'form_id' => $form_id,
			'applicant_id' => $applicant_id,
			'req_date' => date('Y-m-d'),
			'req_status' => 'pending',
			'admin_id' => '1' //update on approval/for interview/etc MAY MALI DITO TODO
		);

		$this->db->insert('request_rel', $req_insert_data);

		return $this->db->insert_id();
	}

}