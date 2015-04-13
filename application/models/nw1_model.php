<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NW1_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function new_application($data){
		
		//add beneficiaries
		$applicant_id = $data['sss_number'];
		$working_spouse_id = $data['sss_working_spouse'];

		//process name of working spouse
		$this->load->model('applicant_model');
		$a = $this->applicant_model->get_applicant($working_spouse_id);
		$wrk_name = $a->first_name . ' ' . $a->middle_name . ' ' . $a->last_name;

		$applicant_beneficiaries = $data['beneficiaries'];
		$this->load->model('beneficiaries_model');
		$this->beneficiaries_model->add_beneficiaries($applicant_beneficiaries, $applicant_id, 'nw1');

		//insert form
		$this->db->insert('form_table', array('form_type' => 'nw1'));
		$form_id = $this->db->insert_id();

		$nw1_data_insert = array(
			'nw1_id' => $form_id,
			'wrk_spouse_fullname' => $wrk_name,
			'wrk_spouse_ss_no' => $working_spouse_id,
			'nwrk_spouse_monthsalarycredit' => $data['non_working_salary_credit'],
			'dateapprove' => $data['date_approved'],
			'startpaying_amnt' => $data['start_paying_amount'],
			'startpaying_date' => $data['start_paying_amount_on']
		);

		$this->db->insert('nw1', $nw1_data_insert);

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