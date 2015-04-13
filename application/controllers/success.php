<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Success extends CI_Controller {

	public function index(){
		if( $this->session->flashdata('reference_number') != null ){
			$success_data['ref_num'] = $this->session->flashdata('reference_number');
			//refresh flash
			$this->session->set_flashdata('reference_number', $this->session->flashdata('reference_number')); 
		}
		$success_data['main_content'] = 'success_view';
		$this->load->view('includes/template', $success_data);
	}
}