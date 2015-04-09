<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forms extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()	{
		$data['main_content'] = 'first_form_view';
		$this->load->view('includes/template', $data);
	}

	public function baseFormSubmit(){
		//form validation
		//name
		$this->form_validation->set_rules('new_fname', 'First Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('new_mname', 'Middle Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('new_lname', 'Last Name', 'trim|required|xss_clean');
		//address
		$this->form_validation->set_rules('new_address', 'Address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('new_postal', 'Postal Code', 'trim|required|xss_clean');
		//others
		$this->form_validation->set_rules('new_sex', 'Sex', 'required');
		$this->form_validation->set_rules('new_bday', 'Birthdate', 'trim|required|xss_clean');
		$this->form_validation->set_rules('new_civilstat', 'Civil Status', 'required');

		if($this->form_validation->run() == TRUE){
			//save data for form repopulation
			//name
			$new_data['new_fname'] = $this->input->post('new_fname');
			$new_data['new_mname'] = $this->input->post('new_mname');
			$new_data['new_lname'] = $this->input->post('new_lname');
			//address
			$new_data['new_address'] = $this->input->post('new_address');
			$new_data['new_postal'] = $this->input->post('new_postal');
			//others
			$new_data['new_sex'] = $this->input->post('new_sex');
			$new_data['new_bday'] = $this->input->post('new_bday');
			$new_data['new_civilstat'] = $this->input->post('new_civilstat');

			switch($this->input->post('form_type')){
				case 'E-1' : 
					$new_data['main_content'] = 'e1_form_view';
					$this->load->view('includes/template', $new_data);
					break;
				case 'RS-1' : 
					$new_data['main_content'] = 'rs1_form_view';
					$this->load->view('includes/template', $new_data);
					break;
				case 'NW-1' : 
					$new_data['main_content'] = 'nw1_form_view';
					$this->load->view('includes/template', $new_data);
					break;
				case 'OW-1' : 
					$new_data['main_content'] = 'ow1_form_view';
					$this->load->view('includes/template', $new_data);
					break;
			}
		}
	}

	function e1FormSubmit(){
		return;
	}

	function rs1FormSubmit(){
		return;
	}

	function nw1FormSubmit(){
		return;
	}

	function ow1FormSubmit(){
		return;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */