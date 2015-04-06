<div class="container">
	<br />
	<!-- Main content -->
	<div class="row-clearfix">
		<div class="col-md-8 col-md-offset-2">			
			<?php
				$form_e1_attributes = array(
					'class' => 'form-horizontal'
				);
				echo form_open('forms/baseFormSubmit', $form_e1_attributes);
			?>	
				<fieldset>					
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
					
					<!-- Text input: sex bday civstat -->
					<div class="row">
						<!-- sex -->
						<div class="col-md-3">
							<div class="row">
								<?php
									$new_sex_label = array(
										'class' => 'col-md-1',
									);
									echo form_label('Sex', 'new_sex', $new_sex_label);
								?>
							</div>
							<!-- Multiple Radios (inline) -->
							<div class="form-group">
								<div class="col-md-12"> 
									<label class="radio-inline" for="new_sex">
										<?php
											echo form_radio('new_sex', 'Male') . 'Male';
										?>
									</label> 
									
									<label class="radio-inline" for="new_sex">
										<?php
											echo form_radio('new_sex', 'Female') . 'Female';
										?>
									</label> 
								</div>
							</div>
						</div>

						<!-- date of birth -->
						<div class="col-md-4">
							<div class="row">
								<?php
									$new_bday_label = array(
										'class' => 'col-md-7',
									);
									echo form_label('Date of Birth', 'new_bday', $new_bday_label);
								?>

								<?php
									$new_bday_input = array(
										'name' => 'new_bday',
										'id' => 'new_bday',
										'class' => 'form-control input-md',
										'value' => $this->session->flashdata('new_bday')
									);
									
									echo "<div class='col-md-12'>" . form_input($new_bday_input) . "</div>";
								?>
								<script type="text/javascript">
									//date picker TODO
									$('#new_bday').datepicker({
										changeMonth: true,
										changeYear: true
									});
								</script>
							</div>
						</div>

						<!-- civil status -->
						<div class="col-md-5">
							<div class="row">
								<?php
									$new_civilstat_label = array(
										'class' => 'col-md-5',
									);
									echo form_label('Civil Status', 'new_civilstat', $new_civilstat_label);
								?>
							</div>
							<!-- Multiple Radios (inline) -->
							<div class="form-group">
								<div class="col-md-12"> 
									<label class="radio-inline" for="new_civilstat">
										<?php
											echo form_radio('new_civilstat', 'Single') . 'Single';
										?>
									</label> 
									
									<label class="radio-inline" for="new_civilstat">
										<?php
											echo form_radio('new_civilstat', 'Married') . 'Married';
										?>
									</label> 

									<label class="radio-inline" for="new_civilstat">
										<?php
											echo form_radio('new_civilstat', 'Widowed') . 'Widowed';
										?>
									</label> 
								</div>
							</div>
						</div>
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

					<!-- form type -->
					<div class="row">
						<?php
							$form_type_label = array(
								'class' => 'col-md-2 col-md-offset-4',
							);
							echo form_label('Form Type', 'form_type', $form_type_label);
						?>
					</div>
					
					<div class="form-group">
						<?php
							$options = array(
								'E-1' => 'E-1',
								'RS-1' => 'RS-1',
								'NW-1' => 'NW-1',
								'OW-1' => 'OW-1'
							);
							echo "<div class='col-md-4 col-md-offset-4'>" . form_dropdown('form_type', $options, 'E-1', 'class=\'form-control\'') . "</div>";
						?>
					</div>	

					<!-- accept terms and conditions -->
					<div class="row">
						<div class="checkbox col-md-offset-4">
							<label for="accept_ToS">
								<?php
									$data = array(
										'name' => 'accept_ToS',
										'id' => 'accept_ToS',
										'value' => 'accept',
									);

									echo form_checkbox($data) . 'I agree to the terms and conditions';
								?>
							</label>
						</div>
					</div>

					<br />
					<?php
						echo form_submit('submit', 'Submit', "class='btn btn-md btn-primary btn-block'");
					?>
				</fieldset>
			<?php
				echo form_close();
			?>
		</div>
	</div>
</div>