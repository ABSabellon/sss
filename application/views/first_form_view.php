<?php require_once('modal/reference_check_modal.php'); ?>

<div class="container">
	<br />
	<!-- Main content -->
	<div class="row-clearfix">
		<div class="col-md-5">
			<div class="row">
				<div class="col-md-12">
					<img src="<?php echo _img_url() . 'instructions.jpg';?>" style="width:100%;">
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<button id="modal-ref-check" href="#modal-container-ref-check" role="button" data-toggle="modal" class="btn btn-md btn-primary btn-block" style="white-space:normal;"> 
						SSS Online Verification
					</button>
				</div>
				<div class="col-md-4">
					<button name="" value="" class="btn btn-md btn-primary btn-block" style="white-space:normal;">
						Concerns? <br /> Contact Us
					</button>
				</div>
				<div class="col-md-4">
					<button name="" value="" class="btn btn-md btn-primary btn-block" style="white-space:normal;"> 
						View <br /> instructions
					</button>
				</div>
			</div>
		</div>

		<div class="col-md-7">			
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
								'required' => 'true',
								'value' => $this->session->flashdata('new_fname')
							);
							//middle name
							$new_mname_input = array(
								'name' => 'new_mname',
								'id' => 'new_mname',
								'class' => 'form-control',
								'placeholder' => 'Middle Name',
								'required' => 'true',
								'value' => $this->session->flashdata('new_mname')
							);
							//last name
							$new_lname_input = array(
								'name' => 'new_lname',
								'id' => 'new_lname',
								'class' => 'form-control',
								'placeholder' => 'Last Name',
								'required' => 'true',
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
								'required' => 'true',
								'value' => $this->session->flashdata('new_address')
							);

							$new_postal_input = array(
								'name' => 'new_postal',
								'id' => 'new_postal',
								'placeholder' => 'postal code',
								'class' => 'form-control input-md',
								'required' => 'true',
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
											$male_radio = array(
												'name' => 'new_sex',
												'value' => 'Male',
												'required' => 'true'
											);
											echo form_radio($male_radio) . 'Male';
										?>
									</label> 
									
									<label class="radio-inline" for="new_sex">
										<?php
											$female_radio = array(
												'name' => 'new_sex',
												'value' => 'Female',
												'required' => 'true'
											);
											echo form_radio($female_radio) . 'Female';
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
							</div>
							<div class="row">
								<?php
									$new_bday_input = array(
										'name' => 'new_bday',
										'id' => 'new_bday',
										'class' => 'form-control input-md',
										'placeholder' => 'mm/dd/yyyy',
										'required' => 'true',
										'value' => $this->session->flashdata('new_bday')
									);
									
									echo "<div class='col-md-12'>" . form_input($new_bday_input) . "</div>";
								?>
								<!-- date picker script -->
								<script type="text/javascript">
									//date picker TODO
									$('#new_bday').datepicker({
										changeMonth: true,
										changeYear: true,
										yearRange: '-100:+0'
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
											$single_radio = array(
												'name' => 'new_civilstat',
												'value' => 'Single',
												'required' => 'true'
											);
											echo form_radio($single_radio) . 'Single';
										?>
									</label> 
									
									<label class="radio-inline" for="new_civilstat">
										<?php
											$married_radio = array(
												'name' => 'new_civilstat',
												'value' => 'Married',
												'required' => 'true'
											);
											echo form_radio($married_radio) . 'Married';
										?>
									</label> 

									<label class="radio-inline" for="new_civilstat">
										<?php
											$widowed_radio = array(
												'name' => 'new_civilstat',
												'value' => 'Widowed',
												'required' => 'true'
											);
											echo form_radio($widowed_radio) . 'Widowed';
										?>
									</label> 
								</div>
							</div>
						</div>
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
								'E-1' => 'New SSS Applicant',
								'RS-1' => 'Self Employed',
								'NW-1' => 'Non Working Spouse Record',
								'OW-1' => 'Overseas Worker'
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
										'required' => 'true'
									);

									echo form_checkbox($data) . 'I accept the Terms of Service';
								?>
							</label>
						</div>
					</div>

					<br />
					<?php
						echo form_submit('submit', 'Continue', "class='btn btn-md btn-primary btn-block'");
					?>
				</fieldset>
			<?php
				echo form_close();
			?>
		</div>
	</div>
</div>