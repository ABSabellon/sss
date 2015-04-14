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
	}

	public function index()	{
		$data['main_content'] = 'admin_view';
		$data['e1_data'] = $this->e1_model->getAll();
		$data['rs1_data'] = $this->rs1_model->getAll();
		$data['nw1_data'] = $this->nw1_model->getAll();
		$data['ow1_data'] = $this->ow1_model->getAll();
		$this->load->view('includes/template', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */