<div class="container">
	<!-- Main content -->
	<div class="row-clearfix">
		<div class="col-md-8 col-md-offset-2">			
			<?php
				$form_e1_attributes = array(
					'class' => 'form-horizontal'
				);
				echo form_open('apply/e1Submit', $form_e1_attributes);
			?>	
				<fieldset>
					<!-- Form name -->
					<legend>Form E1</legend>
					
					<!-- Text input: Name-->
					<div class='row'>
						<?php
							$new_name_label = array(
								'class' => 'col-md-1 control-label',
							);
							echo form_label('Name', '', $new_name_label);
						?>
					</div>
					<div class="row form-group">
						<?php
							//first name
							$new_fname_input = array(
								'name' => 'new_fname',
								'id' => 'new_fname',
								'class' => 'form-control',
								'placeholder' => 'First Name',
								'value' => $this->session->flashdata('new_fname')
							);
							//middle name
							$new_mname_input = array(
								'name' => 'new_mname',
								'id' => 'new_mname',
								'class' => 'form-control',
								'placeholder' => 'Middle Name',
								'value' => $this->session->flashdata('new_mname')
							);
							//last name
							$new_lname_input = array(
								'name' => 'new_lname',
								'id' => 'new_lname',
								'class' => 'form-control',
								'placeholder' => 'Last Name',
								'value' => $this->session->flashdata('new_lname')
							);
							
							echo "<div class='col-xs-4 col-md-4'>" . form_input($new_fname_input) . "</div>";
							echo "<div class='col-xs-4 col-md-4'>" . form_input($new_mname_input) . "</div>";
							echo "<div class='col-xs-4 col-md-4'>" . form_input($new_lname_input) . "</div>"; 
						?>
					</div>
					
					<!-- Text input: Address-->
					<div class='row'>
						<?php
							$new_address_label = array(
								'class' => 'col-md-1 control-label',
							);
							echo form_label('Address', 'new_address', $new_address_label);
						?>
					</div>
					<div class="form-group">
						<?php
							
							$new_address_input = array(
								'name' => 'new_address',
								'id' => 'new_address',
								'placeholder' => 'address',
								'class' => 'form-control input-md',
								'value' => $this->session->flashdata('new_address')
							);

							$new_postal_input = array(
								'name' => 'new_postal',
								'id' => 'new_postal',
								'placeholder' => 'postal code',
								'class' => 'form-control input-md',
								'value' => $this->session->flashdata('new_postal')
							);
							
							echo "<div class='col-md-9'>" . form_input($new_address_input) . "</div>";
							echo "<div class='col-md-3'>" . form_input($new_postal_input) . "</div>";
						?>
					</div>
				<!-- Text input: Gender, Date of Birth & civil Status -->
				
				<div class='row'>
						<?php
							$new_items_label = array(
								'class' => 'col-md-1 control-label',
							);
							echo form_label('', 'new_items', $new_items_label);
						?>
					</div>
					<div class="row form-group">
						<?php
							//Sex
							$new_sex_input = array(
								/*'name' => 'new_sex',
								'id' => 'new_sex',
								'class' => 'form-control',
								'placeholder' => 'Sex',
								'value' => $this->session->flashdata('new_sex')*/
								'title' => ' Sex',
								'female' => ' Female',
								'male' => 'Male',                     //Pahelp nlang kung pano aayusin design nito :3
							);
							$shirts_on_sale = array('title', 'male');
							//Date of Birth
							$new_dob_input = array(
								'name' => 'new_dob',
								'id' => 'new_dob',
								'class' => 'form-control',
								'placeholder' => 'Date of Birth',
								'value' => $this->session->flashdata('new_dob')
							);
							//Civil Status
							$new_civilstat_input = array(
								'name' => 'civilstat',
								'id' => 'civilstat',
								'class' => 'form-control',
								'placeholder' => 'Civil Status',
								'value' => $this->session->flashdata('new_civilstat')
							);
							
							echo "<div class='col-xs-4 col-md-4'>" . form_dropdown('title',$new_sex_input,'sex') . "</div>";  
							echo "<div class='col-xs-4 col-md-4'>" . form_input($new_dob_input) . "</div>";
							echo "<div class='col-xs-4 col-md-4'>" . form_input($new_civilstat_input) . "</div>"; 
						?>
					</div>
					<!-- Text input: Beneficiaries -->
				
				<div class='row'>
						<?php
							$new_items_label = array(
								'class' => 'col-md-1 control-label',
							);
							echo form_label('BENEFICIARIES', 'new_items', $new_items_label);
						?>
					</div>
					<div class="form-group">
						<?php
							//Mother name
							$new_mom_input = array(
								'name' => 'new_mom',
								'id' => 'new_mom',
								'placeholder' => 'Mother (Last Name, First Name, Middle Name)',
								'class' => 'form-control input-md',
								'value' => $this->session->flashdata('new_mom')
							);
							//Father name
							$new_dad_input = array(
								'name' => 'new_dad',
								'id' => 'new_dad',
								'placeholder' => 'Father (Last Name, First Name, Middle Name)',
								'class' => 'form-control input-md',
								'value' => $this->session->flashdata('new_dad')
							);
							
							echo "<div class='col-md-6'>" . form_input($new_mom_input) . "</div>";
							echo "<div class='col-md-6'>" . form_input($new_dad_input) . "</div>";
						?>
					</div>
					<?php
						echo form_submit('submit', 'Apply For SSS', "class='btn btn-lg btn-primary btn-block'");
					?>
				</fieldset>
			<?php
				echo form_close();
			?>
		</div>
	</div>
</div>