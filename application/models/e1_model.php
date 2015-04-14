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
		$this->beneficiaries_model->add_beneficiaries($applicant_beneficiaries, $applicant_id, 'e1');

		//insert form
		$this->db->insert('form_table', array('form_type' => 'e1'));
		$form_id = $this->db->insert_id();
		$this->db->insert('e1', array('e1_id' => $form_id));

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
		$query = "SELECT * FROM `request_rel` WHERE `form_id` IN (SELECT `e1_id` FROM `e1`)";
		$q = $this->db->query($query);
		return $q->result();
	}

	function find($id){
		$this->db->where('e1_id', $id);
		return $this->db->get('e1')->row();
	}
}