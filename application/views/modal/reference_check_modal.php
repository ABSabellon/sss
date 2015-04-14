<div class="modal fade" id="modal-container-ref-check" role="dialog" aria-labelledby="ref_checkModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">
					ENTER YOUR REFERENCE NUMBER HERE
				</h4>
			</div>
			<div class="modal-body">
				<div class="row form-group">
						
									
						<?php
							//first name
							$new_refno_input = array(
								'name' => 'new_refno',
								'id' => 'new_refno',
								'class' => 'form-control',
								'placeholder' => 'Reference Number',
								'required' => 'true',
								'readonly' => 'readyonly',
								'value' => $new_refno
							);
							echo "<div class='col-xs-4 col-md-4'>" . form_input($new_refno_input) . "</div>";
							?>
							</div>
			</div>
			<div class="modal-footer">
				 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> <button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>