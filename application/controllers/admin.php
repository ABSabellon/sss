<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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

	public function __construct(){
		parent::__construct();
		$this->load->model('e1_model');
		$this->load->model('nw1_model');
		$this->load->model('ow1_model');
		$this->load->model('rs1_model');
		$this->load->model('appointment_model');
	}

	public function index()	{
		$data['main_content'] = 'admin_view';
		$data['e1_data'] = $this->e1_model->getAll();
		$data['rs1_data'] = $this->rs1_model->getAll();
		$data['nw1_data'] = $this->nw1_model->getAll();
		$data['ow1_data'] = $this->ow1_model->getAll();
		$data['appointment_data'] = $this->appointment_model->getAll();
		$this->load->view('includes/template', $data);
	}

	public function getRequest(){
		$fat_array = array();

		$sql = "SELECT * FROM `request_rel` WHERE `req_id` = ?";
		$q = $this->db->query($sql, $_POST['r']);
		$app_id = $q->row()->applicant_id;
		$form_id = $q->row()->form_id;

		$sql = "SELECT `form_type` FROM `form_table` WHERE `form_id` = ?";
		$q = $this->db->query($sql, $form_id);
		$form_type = $q->row()->form_type;

		//applicant
		$this->load->model('applicant_model');
		$applicant_data = $this->applicant_model->get_applicant($app_id);

		array_push($fat_array, $applicant_data);

		//form
		$form_data;
		$isE1 = false;
		switch($form_type){
			case 'rs1' : 
				$sql = 'SELECT * FROM `rs1` WHERE `rs1_id` = ?';
				$form_data = $this->db->query($sql, $form_id)->row();			
				array_push($fat_array, array('form_type' => 'rs1'));
				break;
			
			case 'nw1' : 
				$sql = 'SELECT * FROM `nw1` WHERE `nw1_id` = ?';
				$form_data = $this->db->query($sql, $form_id)->row();
				array_push($fat_array, array('form_type' => 'nw1'));
				break;
			
			case 'ow1' : 
				$sql = 'SELECT * FROM `ow1` WHERE `ow1_id` = ?';
				$form_data = $this->db->query($sql, $form_id)->row();
				array_push($fat_array, array('form_type' => 'ow1'));
				break;
			
			default :
				$isE1 = true;
				array_push($fat_array, array('form_type' => 'e1'));
				break;
		}
		
		if(!$isE1)
			array_push($fat_array, $form_data); //insert form data to json array

		//flatten array
		$flatten = array();
		foreach($fat_array as $x){
			foreach($x as $key => $val){
				array_push($flatten, array($key => $val));
			}
		}

		echo json_encode($flatten);
	}

	function answerRequest(){
		if($_POST['appt'] != "" && $_POST['response'] == 'approved'){
			$this->appointment_model->new_appointment($_POST['r'], $_POST['appt']);
		}
		$update = array(
			'req_status' => $_POST['response']
		);
		$req_id = $_POST['r'];
		$this->db->where('req_id', $req_id);
		$this->db->update('request_rel', $update);

		$this->db->where('req_id', $req_id);
		$this->db->delete('appointment_rel');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */