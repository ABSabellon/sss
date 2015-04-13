<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OW1_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function new_application($data){
		
		//add beneficiaries
		$applicant_id = $data['sss_number'];

		$applicant_beneficiaries = $data['beneficiaries'];
		$this->load->model('beneficiaries_model');
		$this->beneficiaries_model->add_beneficiaries($applicant_beneficiaries, $applicant_id, 'ow1');

		//insert form
		$this->db->insert('form_table', array('form_type' => 'ow1'));
		$form_id = $this->db->insert_id();

		$ow1_data_insert = array(
			'ow1_id' => $form_id,
			'foreign_add' => $data['foreign_address'],
			'foreign_postal_code' => $data['country_code'],
			'place_of_birth' => $data['place_of_birth'],
			'religion' => $data['religion'],
			'monthly_salary' => $data['monthly_salary'],
			'mem_applied_for' => $data['member_apply_type'],
			'monthly_ss_cont' => $data['start_paying_amount'],
			'start_of_payment' => $data['start_paying_amount_on'],
			'flexifund_application' => $data['member_apply_type_approve']
		);

		$this->db->insert('ow1', $ow1_data_insert);

		//insert into relationship
		$req_insert_data = array(
			'form_id' => $form_id,
			'applicant_id' => $applicant_id,
			'req_date' => date('Y-m-d'),
			'req_status' => 'pending'
		);

		$this->db->insert('request_rel', $req_insert_data);

		return $this->db->insert_id();
	}

}