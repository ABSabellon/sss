<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forms extends CI_Controller {

	public function index()	{
		$data['main_content'] = 'first_form_view';
		$this->load->view('includes/template', $data);
	}

	public function baseFormSubmit(){
		//form validation
		$this->_baseFormValidation();

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
		else{
			echo 'base form validation fail';
		}
	}

	function e1FormSubmit(){

		$this->_baseFormValidation();
		$this->form_validation->set_rules('new_mom', 'Mother', 'trim|xss_clean');
		$this->form_validation->set_rules('new_dad', 'Father', 'trim|xss_clean');
		$this->form_validation->set_rules('new_sibling[]', 'Sibling Beneficiaries', 'trim|xss_clean');
		$this->form_validation->set_rules('new_other[]', 'Other Beneficiaries', 'trim|xss_clean');

		if($this->form_validation->run()){
			$e1_data = array(
				'first_name' => $this->input->post('new_fname'),
				'middle_name' => $this->input->post('new_mname'),
				'last_name' => $this->input->post('new_lname'),
				'address' => $this->input->post('new_address'),
				'postal' => $this->input->post('new_postal'),
				'sex' => $this->input->post('new_sex'),
				'birthday' => $this->input->post('new_bday'),
				'civilstatus' => $this->input->post('new_civilstat'),
				
				//parseBeneficiaries($parent, $siblings, $other)
				'beneficiaries' => $this->_parseBeneficiaries(
					//parents
					array($this->input->post('new_mom'), $this->input->post('new_dad')),  
					//siblings
					array(
						'name' => $this->input->post('new_sibling'), 
						'bday' => $this->input->post('new_sibling_bday')
					), 
					//others
					array(
						'name' => $this->input->post('new_other'), 
						'rel' => $this->input->post('new_other_rel')
					) 
				)
			);
			//echo json_encode($e1_data); die();
			$this->load->model('e1_model');
			$reference_number = $this->e1_model->new_application($e1_data);
			echo $reference_number;
		}
		else{
			echo "form e1 validation errors" . validation_errors();
		}
	}

	function rs1FormSubmit(){
		$this->_baseFormValidation();
		$this->form_validation->set_rules('new_mom', 'Mother', 'trim|xss_clean');
		$this->form_validation->set_rules('new_dad', 'Father', 'trim|xss_clean');
		$this->form_validation->set_rules('new_sibling[]', 'Sibling Beneficiaries', 'trim|xss_clean');
		$this->form_validation->set_rules('new_other[]', 'Other Beneficiaries', 'trim|xss_clean');
		//rs1 fields
		$this->form_validation->set_rules('sss_number', 'SSS number', 'trim|required|xss_clean');
		$this->form_validation->set_rules('sss_number_prev', 'Previously Given SSS number', 'trim|xss_clean');
		$this->form_validation->set_rules('tax_acc_num', 'Tax Account Number', 'trim|xss_clean');
		$this->form_validation->set_rules('office_tel', 'Office Telephone', 'trim|xss_clean');
		$this->form_validation->set_rules('residence_tel', 'Residence Telephone', 'trim|xss_clean');
		$this->form_validation->set_rules('prof_bussiness_code', 'Professional Business Code', 'trim|required|xss_clean');
		$this->form_validation->set_rules('yearly_net_earnings', 'Yearly net Earnings', 'trim|required|xss_clean');
		$this->form_validation->set_rules('monthly_net_earnings', 'Monthly net Earnings', 'trim|required|xss_clean');
		$this->form_validation->set_rules('begin_date_coverage', 'Begin date of coverage', 'trim|required|xss_clean');
		$this->form_validation->set_rules('end_date_coverage', 'End date of coverage', 'trim|required|xss_clean');
		$this->form_validation->set_rules('year_profession', 'Years of Profession', 'trim|required|xss_clean');

		if($this->form_validation->run()){
			$rs1_data = array(
				'first_name' => $this->input->post('new_fname'),
				'middle_name' => $this->input->post('new_mname'),
				'last_name' => $this->input->post('new_lname'),
				'address' => $this->input->post('new_address'),
				'postal' => $this->input->post('new_postal'),
				'sex' => $this->input->post('new_sex'),
				'birthday' => $this->input->post('new_bday'),
				'civilstatus' => $this->input->post('new_civilstat'),
				
				//rs1 fields
				'sss_number' => $this->input->post('sss_number'),
				'sss_number_prev' => $this->input->post('sss_number_prev'),
				'tax_acc_num' => $this->input->post('tax_acc_num'),
				'office_tel' => $this->input->post('office_tel'),
				'residence_tel' => $this->input->post('residence_tel'),
				'prof_bussiness_code' => $this->input->post('prof_bussiness_code'),
				'yearly_net_earnings' => $this->input->post('yearly_net_earnings'),
				'monthly_net_earnings' => $this->input->post('monthly_net_earnings'),
				'begin_date_coverage' => $this->input->post('begin_date_coverage'),
				'end_date_coverage' => $this->input->post('end_date_coverage'),
				'year_profession' => $this->input->post('year_profession'),

				//parseBeneficiaries($parent, $siblings, $other)
				'beneficiaries' => $this->_parseBeneficiaries(
					//parents
					array($this->input->post('new_mom'), $this->input->post('new_dad')),  
					//siblings
					array(
						'name' => $this->input->post('new_sibling'), 
						'bday' => $this->input->post('new_sibling_bday')
					), 
					//others
					array(
						'name' => $this->input->post('new_other'), 
						'rel' => $this->input->post('new_other_rel')
					) 
				)
			);

			echo json_encode($rs1_data); die();
		}
		else{
			echo "form rs1 validation errors" . validation_errors();
		}
	}

	function nw1FormSubmit(){
		$this->_baseFormValidation();
		$this->form_validation->set_rules('new_mom', 'Mother', 'trim|xss_clean');
		$this->form_validation->set_rules('new_dad', 'Father', 'trim|xss_clean');
		$this->form_validation->set_rules('new_sibling[]', 'Sibling Beneficiaries', 'trim|xss_clean');
		$this->form_validation->set_rules('new_other[]', 'Other Beneficiaries', 'trim|xss_clean');
		//nw fields
		$this->form_validation->set_rules('sss_number', 'SSS number', 'trim|required|xss_clean');
		$this->form_validation->set_rules('sss_number_spouse', 'SSS number of working spouse', 'trim|required|xss_clean');
		$this->form_validation->set_rules('non_working_salary_credit', 'Non working salary credit', 'trim|required|xss_clean');
		$this->form_validation->set_rules('date_approved', 'date approved of salary creadit', 'trim|reqiured|xss_clean');
		$this->form_validation->set_rules('start_paying_amount', 'start payment amout', 'trim|xss_clean');
		$this->form_validation->set_rules('start_paying_amount_on', 'start payment date', 'trim|xss_clean');


		if($this->form_validation->run()){
			$nw1_data = array(
				'first_name' => $this->input->post('new_fname'),
				'middle_name' => $this->input->post('new_mname'),
				'last_name' => $this->input->post('new_lname'),
				'address' => $this->input->post('new_address'),
				'postal' => $this->input->post('new_postal'),
				'sex' => $this->input->post('new_sex'),
				'birthday' => $this->input->post('new_bday'),
				'civilstatus' => $this->input->post('new_civilstat'),

				//nw1 fields
				'sss_number' => $this->input->post('sss_number'),
				'sss_working_spouse' => $this->input->post('sss_working_spouse'),
				'non_working_salary_credit' => $this->input->post('non_working_salary_credit'),
				'date_approved' => $this->input->post('date_approved'),
				'start_paying_amount' => $this->input->post('start_paying_amount'),
				'start_paying_amount_on' => $this->input->post('start_paying_amount_on'),

				//parseBeneficiaries($parent, $siblings, $other)
				'beneficiaries' => $this->_parseBeneficiaries(
					//parents
					array($this->input->post('new_mom'), $this->input->post('new_dad')),  
					//siblings
					array(
						'name' => $this->input->post('new_sibling'), 
						'bday' => $this->input->post('new_sibling_bday')
					), 
					//others
					array(
						'name' => $this->input->post('new_other'), 
						'rel' => $this->input->post('new_other_rel')
					) 
				)
			);

			echo json_encode($nw1_data); die();
		}
		else{
			echo "form nw1 validation errors" . validation_errors();
		}
	}

	function ow1FormSubmit(){
		$this->_baseFormValidation();
		$this->form_validation->set_rules('new_mom', 'Mother', 'trim|xss_clean');
		$this->form_validation->set_rules('new_dad', 'Father', 'trim|xss_clean');
		$this->form_validation->set_rules('new_sibling[]', 'Sibling Beneficiaries', 'trim|xss_clean');
		$this->form_validation->set_rules('new_other[]', 'Other Beneficiaries', 'trim|xss_clean');
		//ow fields
		$this->form_validation->set_rules('sss_number', 'SSS number', 'trim|required|xss_clean');
		$this->form_validation->set_rules('monthly_salary', 'Monthly Salary', 'trim|required|xss_clean');
		$this->form_validation->set_rules('foreign_address', 'Foreign Address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('country_code', 'Country Code', 'trim|required|xss_clean');
		$this->form_validation->set_rules('place_of_birth', 'Place of Birth', 'trim|required|xss_clean');
		$this->form_validation->set_rules('office_tel', 'Office Telephone', 'trim|xss_clean');
		$this->form_validation->set_rules('residence_tel', 'Residence Telephone', 'trim|xss_clean');
		$this->form_validation->set_rules('religion', 'Religion', 'trim|xss_clean');
		$this->form_validation->set_rules('start_paying_amount', 'start payment amount', 'trim|xss_clean');
		$this->form_validation->set_rules('start_paying_amount_on', 'start payment date', 'trim|xss_clean');

		if($this->form_validation->run()){
			$ow1_data = array(
				'first_name' => $this->input->post('new_fname'),
				'middle_name' => $this->input->post('new_mname'),
				'last_name' => $this->input->post('new_lname'),
				'address' => $this->input->post('new_address'),
				'postal' => $this->input->post('new_postal'),
				'sex' => $this->input->post('new_sex'),
				'birthday' => $this->input->post('new_bday'),
				'civilstatus' => $this->input->post('new_civilstat'),

				//ow1 fields
				'sss_number' => $this->input->post('sss_number'),
				'monthly_salary' => $this->input->post('monthly_salary'),
				'foreign_address' => $this->input->post('foreign_address'),
				'country_code' => $this->input->post('country_code'),
				'place_of_birth' => $this->input->post('place_of_birth'),
				'office_tel' => $this->input->post('office_tel'),
				'residence_tel' => $this->input->post('residence_tel'),
				'religion' => $this->input->post('religion'),
				'member_apply_type' => $this->input->post('member_apply_type'),
				'start_paying_amount' => $this->input->post('start_paying_amount'),
				'start_paying_amount_on' => $this->input->post('start_paying_amount_on'),
				'member_apply_type_approve' => $this->input->post('member_apply_type_approve'),

				//parseBeneficiaries($parent, $siblings, $other)
				'beneficiaries' => $this->_parseBeneficiaries(
					//parents
					array($this->input->post('new_mom'), $this->input->post('new_dad')),  
					//siblings
					array(
						'name' => $this->input->post('new_sibling'), 
						'bday' => $this->input->post('new_sibling_bday')
					), 
					//others
					array(
						'name' => $this->input->post('new_other'), 
						'rel' => $this->input->post('new_other_rel')
					) 
				)
			);

			echo json_encode($ow1_data); die();
		}
		else{
			echo "ow1 form validation errors" . validation_errors();
		}
	}

	function _baseFormValidation(){
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
	}

	function _parseBeneficiaries($parents, $siblings, $others){
		$final = array();

		//parents
		foreach($parents as $x){
			if($x != "" && isset($x)){
				$arr = array(
					'name'=> $x,
					'relation' => 'parent'
				);

				array_push($final, $arr);
			}
		}

		//siblings
		if(count($siblings['name']) == count($siblings['bday'])){ //error handling
			$len = count($siblings['name']);

			for($c=0; $c < $len; $c++){ //associate name to bday in siblings array
				if( ($siblings['name'][$c] != "" && isset($siblings['name'][$c])) && ($siblings['bday'][$c] != "" && isset($siblings['bday'][$c]))){
					$arr = array(
						'name'=> $siblings['name'][$c],
						'bday' => $siblings['bday'][$c],
						'relation' => 'sibling'
					);
					array_push($final, $arr);	
				}
			}
		}
		else{
			echo 'Sibling Beneficiary data count mismatch'; die();
		}

		//other
		if(count($others['name']) == count($others['rel'])){ //error handling
			$len = count($others['name']);

			for($c=0; $c < $len; $c++){ //associate name to relation in others array
				if( ($others['name'][$c] != "" && isset($others['name'][$c])) && ($others['rel'][$c] != "" && isset($others['rel'][$c]))){
					$arr = array(
						'name'=> $others['name'][$c],
						'relation' => $others['rel'][$c],
					);
					array_push($final, $arr);	
				}
			}
		}
		else{
			echo 'Other Beneficiary data count mismatch'; die();
		}
		
		return $final;
	}
}