<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beneficiaries_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function add_beneficiaries($beneficiaries, $applicant_id){ //recieves array of beneficiaries and applicant id
		$benef_ids = array();
		foreach($beneficiaries as $x){
			//prepare values
			$n = $x['name'];
			$r = $x['relation'];
			if(isset($x['bday'])){
				$b = $x['bday'];
			}
			else{
				$b = null;
			}

			//insert
			$insert_data = array(
				'name' => $n,
				'relationship' => $r,
				'benef_dateofbirth' => $b
			);
			$this->db->insert('benef', $insert_data);

			//gather benef ids
			array_push($benef_ids, $this->db->insert_id());
		}

		foreach($benef_ids as $benef_id){
			$this->db->insert('benef_rel', array('applicant_id' => $applicant_id, 'benef_id' => $benef_id));
		}
	}
}