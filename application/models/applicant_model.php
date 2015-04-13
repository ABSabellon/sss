<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Applicant_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	//gets applicant with the $id
	function get_applicant($id){
		//Select * from `applicant` where `applicant_id` = $id
		$this->db->where('applicant_id', $id);
		$q = $this->db->get('applicant');
		
		return $q->row();
	}

}