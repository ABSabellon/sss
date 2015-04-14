<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RS1_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function new_application($data){
		
		//add beneficiaries
		$applicant_id = $data['sss_number'];
		
		$applicant_beneficiaries = $data['beneficiaries'];
		$this->load->model('beneficiaries_model');
		$this->beneficiaries_model->add_beneficiaries($applicant_beneficiaries, $applicant_id, 'rs1');

		//insert form
		$this->db->insert('form_table', array('form_type' => 'rs1'));
		$form_id = $this->db->insert_id();
		
		//process prev ss num
		if( !isset($data['prev_ss_no']) ){
			$prev_ss_no = null;
		}
		else{
			$prev_ss_no = $data['prev_ss_no'];
		}

		$rs1_data_insert = array(
			'rs1_id' => $form_id,
			'residence_telno' => $data['residence_tel'],
			'office_telno' => $data['office_tel'],
			'prof_business_code' => $data['prof_bussiness_code'],
			'year_prof_business_started' => $data['year_profession'],
			'begin_date_coverage' => $data['begin_date_coverage'],
			'end_date_coverage' => $data['end_date_coverage'],
			'prev_ss_no' => $prev_ss_no,
			'tax_acc_no' => $data['tax_acc_num'],
			'yearly_net_earnings' => $data['yearly_net_earnings']
		);

		$this->db->insert('rs1', $rs1_data_insert);

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

	function getAll(){
		$query = "SELECT * FROM `request_rel` WHERE `form_id` IN (SELECT `rs1_id` FROM `rs1`)";
		$q = $this->db->query($query);
		return $q->result();
	}

}