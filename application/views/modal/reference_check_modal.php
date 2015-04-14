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
				<div class="row">
					<div class="form-group">
										
							<?php
								//first name
								$new_refno_input = array(
									'name' => 'new_refno',
									'id' => 'new_refno',
									'class' => 'form-control',
									'placeholder' => 'Reference Number',
								);
								echo "<div class='col-xs-4 col-md-4'>" . form_input($new_refno_input) . "</div>";
							?>
					</div>
				</div>
				<br /><br />
				<div id="ref-response"></div>
			</div>
		
			<div class="modal-footer">
				 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> <button type="button" class="btn btn-primary" id="ref-submit">Check Reference</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#ref-submit').click(function(){
			var ref_no = $('#new_refno').val();
			$.ajax({
				'type': 'POST',
				'url': 'forms/checkRef',
				'data': {'r' : ref_no},
				'success' : function(data){
					$('#ref-response').html(data);
				},
				'error' : function(e){
					console.log(e.responseText);
				}
			});
		});
	});
</script>