<script type="text/javascript">
	$(document).ready(function(){
		//sibling benef section
		var next_sibling = 1;
		$(".add-more-sibling").click(function(e){
			e.preventDefault();
			//get current id/iteration
			var addto_sibling = "#new_sibling" + next_sibling;
			var addRemove_sibling = "#new_sibling" + (next_sibling);
			next_sibling = next_sibling + 1; //create next id
			
			var newIn_sibling = 
			'<div id="new_sibling' + next_sibling + '">' //div with id
			+ '<div class=\'col-md-8\'>' //form input name
			+ '<input  class="form-control input-md" placeholder="Sibling (Last Name, First Name, Middle Name)" id="new_sibling[]" name="new_sibling[]" type="text">'
			+ '</div>'
			+ '<div class=\'col-md-3\'>' //form input bday
			+ '<input  class="form-control input-md sibling-bday" placeholder="mm/dd/yyyy" id="new_sibling[]" name="new_sibling_bday[]" type="text">'
			+ '</div>';

			//add the remove button
			var newInput_sibling = $(newIn_sibling);
			var removeBtn_sibling = '<div class"col-md-1"><button id="remove_sibling' + (next_sibling - 1) + '" class="btn btn-danger remove-me-sibling" >-</button></div>';
			var removeButton_sibling = $(removeBtn_sibling);
			
			//add created html tags from above
			$(addto_sibling).after(newInput_sibling);
			$(addRemove_sibling).after(removeButton_sibling);

			//remove function of newly created button
			$('.remove-me-sibling').click(function(e){
				e.preventDefault();
				var fieldNum = this.id.charAt(this.id.length-1);
				var fieldID = "#new_sibling" + fieldNum;
				$(this).remove();
				$(fieldID).remove();
			});

			//enable date picker
			$('.sibling-bday').datepicker({
				changeMonth: true,
				changeYear: true,
				yearRange: '-100:+0'
			});
		});
		//end sibling benef section

		//other benef
		var next_other = 1;
		$(".add-more-other").click(function(e){
			e.preventDefault();
			
			var addto_other = "#new_other" + next_other;
			var addRemove_other = "#new_other" + (next_other);
			next_other = next_other + 1;
			
			var newIn_other = 
			'<div id="new_other' + next_other + '">'
			+ '<div class=\'col-md-8\'>'
			+ '<input  class="form-control input-md" placeholder="Name (Last Name, First Name, Middle Name)" id="new_other[]" name="new_other[]" type="text">'
			+ '</div>'
			+ '<div class=\'col-md-3\'>'
			+ '<input  class="form-control input-md" placeholder="Relationship" id="new_other[]" name="new_other_rel[]" type="text">'
			+ '</div>';

			var newInput_other = $(newIn_other);
			var removeBtn_other = '<div class"col-md-1"><button id="remove_other' + (next_other - 1) + '" class="btn btn-danger remove-me-other" >-</button></div>';
			var removeButton_other = $(removeBtn_other);
			
			$(addto_other).after(newInput_other);
			$(addRemove_other).after(removeButton_other);
			
			$("#new_other" + next_other).attr('data-source',$(addto_other).attr('data-source'));	

			$('.remove-me-other').click(function(e){
				e.preventDefault();
				var fieldNum = this.id.charAt(this.id.length-1);
				var fieldID = "#new_other" + fieldNum;
				$(this).remove();
				$(fieldID).remove();
			});
		});
		//end other benef section

		$('.sibling-bday').datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: '-100:+0'
		});
	});
</script>
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
					<button name="" value="" class="btn btn-md btn-primary btn-block" style="white-space:normal;"> 
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
				echo form_open('forms/ow1FormSubmit', $form_e1_attributes);
			?>	
				<fieldset>
					<legend>Form OW-1</legend>	

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
								'readonly' => 'readyonly',
								'value' => $new_fname
							);
							//middle name
							$new_mname_input = array(
								'name' => 'new_mname',
								'id' => 'new_mname',
								'class' => 'form-control',
								'placeholder' => 'Middle Name',
								'required' => 'true',
								'readonly' => 'readyonly',
								'value' => $new_mname
							);
							//last name
							$new_lname_input = array(
								'name' => 'new_lname',
								'id' => 'new_lname',
								'class' => 'form-control',
								'placeholder' => 'Last Name',
								'required' => 'true',
								'readonly' => 'readyonly',
								'value' => $new_lname
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
								'required' => 'true',
								'readonly' => 'readyonly',
								'class' => 'form-control input-md',
								'value' => $new_address
							);

							$new_postal_input = array(
								'name' => 'new_postal',
								'id' => 'new_postal',
								'placeholder' => 'postal code',
								'required' => 'true',
								'readonly' => 'readyonly',
								'class' => 'form-control input-md',
								'value' => $new_postal
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
							
							<!-- Sex of user-->
							<div class="form-group">
								<div class="col-md-12"> 
									<label class="radio-inline" for="new_sex">
										<?php
											if($new_sex == 'Male'){
												$male_radio = array(
													'name' => 'new_sex',
													'value' => 'Male',
													'required' => 'true',
													'readonly' => 'readyonly',
													'checked' => 'checked'
												);
											}
											else{
												$male_radio = array(
													'name' => 'new_sex',
													'value' => 'Male',
													'required' => 'true',
													'readonly' => 'readyonly'
												);
											}
											echo form_radio($male_radio) . 'Male';
										?>
									</label> 
									
									<label class="radio-inline" for="new_sex">
										<?php
											if($new_sex == 'Female'){
												$female_radio = array(
													'name' => 'new_sex',
													'value' => 'Female',
													'required' => 'true',
													'readonly' => 'readyonly',
													'checked' => 'checked'
												);
											}
											else{
												$female_radio = array(
													'name' => 'new_sex',
													'value' => 'Female',
													'required' => 'true',
													'readonly' => 'readyonly'
												);
											}
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

								<?php
									$new_bday_input = array(
										'name' => 'new_bday',
										'id' => 'new_bday',
										'class' => 'form-control input-md',
										'placeholder' => 'mm/dd/yyyy',
										'required' => 'true',
										'readonly' => 'readyonly',
										'value' => $new_bday
									);
									
									echo "<div class='col-md-12'>" . form_input($new_bday_input) . "</div>";
								?>
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
											if($new_civilstat == 'Single'){
												$single_radio = array(
													'name' => 'new_civilstat',
													'value' => 'Single',
													'readonly' => 'readyonly',
													'required' => 'true',
													'checked' => 'checked'
												);
											}
											else{
												$single_radio = array(
													'name' => 'new_civilstat',
													'value' => 'Single',
													'readonly' => 'readyonly',
													'required' => 'true'
												);
											}
											echo form_radio($single_radio) . 'Single';
										?>
									</label> 
									
									<label class="radio-inline" for="new_civilstat">
										<?php
											if($new_civilstat == 'Married'){
												$married_radio = array(
													'name' => 'new_civilstat',
													'value' => 'Married',
													'readonly' => 'readyonly',
													'required' => 'true',
													'checked' => 'checked'
												);
											}
											else{
												$married_radio = array(
													'name' => 'new_civilstat',
													'value' => 'Married',
													'readonly' => 'readyonly',
													'required' => 'true'
												);
											}
											echo form_radio($married_radio) . 'Married';
										?>
									</label> 

									<label class="radio-inline" for="new_civilstat">
										<?php
											if($new_civilstat == 'Widowed'){
												$widowed_radio = array(
													'name' => 'new_civilstat',
													'value' => 'Widowed',
													'readonly' => 'readyonly',
													'required' => 'true',
													'checked' => 'checked'
												);
											}
											else{
												$widowed_radio = array(
													'name' => 'new_civilstat',
													'value' => 'Widowed',
													'readonly' => 'readyonly',
													'required' => 'true'
												);
											}
											
											echo form_radio($widowed_radio) . 'Widowed';
										?>
									</label> 
								</div>
							</div>
						</div>
					</div>

					<hr />
					
					<!-- Text input: Additional Details -->
					<div class='row'>
						<?php
							$additional_details_label = array(
								'class' => 'col-md-6',
							);
							echo form_label('Additional Details Form OW-1', 'sss_number', $additional_details_label);
						?>
					</div>

					<div class="form-group">
						<?php
							$sss_number = array(
								'name' => 'sss_number',
								'id' => 'sss_number',
								'placeholder' => 'SSS Number',
								'class' => 'form-control input-md',
								'required' => 'required'
							);

							$monthly_salary = array(
								'name' => 'monthly_salary',
								'id' => 'monthly_salary',
								'placeholder' => 'Monthly Salary',
								'class' => 'form-control input-md',
								'required' => 'required'
							);
							
							echo "<div class='col-md-8'>" . form_input($sss_number) . "</div>";
							echo "<div class='col-md-4'>" . form_input($monthly_salary) . "</div>";
						?>
					</div>

					<div class="form-group">
						<?php
							$foreign_address = array(
								'name' => 'foreign_address',
								'id' => 'foreign_address',
								'placeholder' => 'Foreign Address',
								'class' => 'form-control input-md',
								'required' => 'required'
							);

							$country_code = array(
								'name' => 'country_code',
								'id' => 'country_code',
								'placeholder' => 'Country Code',
								'class' => 'form-control input-md',
								'required' => 'required'
							);

							echo "<div class='col-md-9'>" . form_input($foreign_address) . "</div>";
							echo "<div class='col-md-3'>" . form_input($country_code) . "</div>";
						?>
					</div>

					<div class="form-group">
						<?php
							$place_of_birth = array(
								'name' => 'place_of_birth',
								'id' => 'place_of_birth',
								'placeholder' => 'Place of Birth',
								'class' => 'form-control input-md',
								'required' => 'required'
							);

							$office_tel = array(
								'name' => 'office_tel',
								'id' => 'office_tel',
								'placeholder' => 'Office Telephone #',
								'class' => 'form-control input-md'
							);

							$residence_tel = array(
								'name' => 'residence_tel',
								'id' => 'residence_tel',
								'placeholder' => 'Residence Telephone #',
								'class' => 'form-control input-md'
							);
							
							echo "<div class='col-md-6'>" . form_input($place_of_birth) . "</div>";
							echo "<div class='col-md-3'>" . form_input($office_tel) . "</div>";
							echo "<div class='col-md-3'>" . form_input($residence_tel) . "</div>";
						?>
					</div>

					<hr />

					<div class="form-group">
						<?php
							$religion = array(
								'name' => 'religion',
								'id' => 'religion',
								'placeholder' => 'Religion',
								'class' => 'form-control input-md'
							);

							$member_apply_type_options = array(
								'REGULAR' => 'Regular',
								'FF-NEW' => 'Flexi-Fund New',
								'FF-RENEW' => 'Flexi-Fund Renewal',
							);

							echo "<div class='col-md-4'>" . form_input($religion) . "</div>";
							echo "<div class='col-md-8'>" . form_dropdown('member_apply_type', $member_apply_type_options, 'regular', 'id=\'\' class=\'form-control\'') . "</div>";
						?>
					</div>

					<div class="form-group">
						<?php
							$start_paying_amount = array(
								'name' => 'start_paying_amount',
								'id' => 'start_paying_amount',
								'placeholder' => 'Start Paying the Amount of',
								'class' => 'form-control input-md'
							);

							$start_paying_amount_on = array(
								'name' => 'start_paying_amount_on',
								'id' => 'start_paying_amount_on',
								'placeholder' => 'Start Paying the Amount on',
								'class' => 'form-control input-md date-input'
							);

							$member_apply_type_approve_options = array(
								'REGULAR' => 'Regular',
								'FF-NEW' => 'Flexi-Fund New',
								'FF-RENEW' => 'Flexi-Fund Renewal',
							);
							
							echo "<div class='col-md-4'>" . form_input($start_paying_amount) . "</div>";
							echo "<div class='col-md-4'>" . form_input($start_paying_amount_on) . "</div>";
							echo "<div class='col-md-4'>" . form_dropdown('member_apply_type_approve', $member_apply_type_approve_options, 'regular', 'id=\'\' class=\'form-control\'') . "</div>";
						?>
						<script type="text/javascript">
							$('.date-input').datepicker({
								changeMonth: true,
								changeYear: true,
								yearRange: '-100:+0'
							});
						</script>
					</div>

					<hr />
					
					<!-- Text input: Beneficiaries -->
					<div class='row'>
						<?php
							$new_items_label = array(
								'class' => 'col-md-4',
							);
							echo form_label('BENEFICIARIES - Parents', 'new_mom', $new_items_label);
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

					<div class='row'>
						<?php
							$new_items_label = array(
								'class' => 'col-md-4',
							);
							echo form_label('BENEFICIARIES - Siblings', 'new_sibling1', $new_items_label);
						?>
					</div>
						
					<div class="form-group" id="input-append">
						<div id="new_sibling1">
							<?php
								//Sibling input type
								$new_sibling = array(
									'name' => 'new_sibling[]',
									'id' => 'new_sibling[]',
									'placeholder' => 'Sibling (Last Name, First Name, Middle Name)',
									'class' => 'form-control input-md',
								);

								$new_sibling_bday = array(
									'name' => 'new_sibling_bday[]',
									'id' => 'new_sibling_bday[]',
									'placeholder' => 'mm/dd/yyyy',
									'class' => 'form-control input-md sibling-bday',
								);
								echo "<div class='col-md-8'>" . form_input($new_sibling) . "</div>";
								echo "<div class='col-md-3'>" . form_input($new_sibling_bday) . "</div>";
								
							?>
							</div>
						<div class="col-md-12" style="top:1em;">
							<button id="b1" class="btn add-more-sibling" type="button">Add Sibling Beneficiaries</button>
						</div>
					</div>

					<div class='row'>
						<?php
							$new_items_label = array(
								'class' => 'col-md-4',
							);
							echo form_label('BENEFICIARIES - Others', 'new_benef1', $new_items_label);
						?>
					</div>
						
					<div class="form-group">
						<div id="new_other1">
							<?php
								//Other Beneficiaries
								$new_other = array(
									'name' => 'new_other[]',
									'id' => 'new_benef[]',
									'placeholder' => 'Name (Last Name, First Name, Middle Name)',
									'class' => 'form-control input-md'
								);

								$new_other_rel = array(
									'name' => 'new_other_rel[]',
									'id' => 'new_other_rel[]',
									'placeholder' => 'Relationship',
									'class' => 'form-control input-md'
								);
								echo "<div class='col-md-8'>" . form_input($new_other) . "</div>";
								echo "<div class='col-md-3'>" . form_input($new_other_rel) . "</div>";
							?>
						</div>
						<div class="col-md-12" style="top:1em;">
							<button id="b1" class="btn add-more-other" type="button">Add Other Beneficiaries</button>
						</div>
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
						echo form_submit('submit', 'Submit', "class='btn btn-md btn-primary btn-block'");
					?>
				</fieldset>
			<?php
				echo form_close();
			?>
		</div>
	</div>
</div>