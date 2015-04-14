<?php require_once('modal/request_detail_modal.php');?>
<script type="text/javascript">
	$(document).ready(function(){
		var req;

		$('.anchor-request').on('click', function(){
			req = $(this).attr('id');
			$.ajax({
				'type': 'POST',
				'url': 'admin/getRequest',
				'data': {'r' : req},
				'success' : function(data){
					var parsed = $.parseJSON(data);
					$.each(parsed, function(key, val){
						var value;
						var displaykey;
						for(var w in val){
							displaykey = w;
							value = val[w];
						}
						var htmlString;
						htmlString = "<div class='row'>"
						+ "<label class='col-md-6'>" + displaykey + "</label>"
						+ "<label class='col-md-6'>" + value + "</label>"
						+ "</div><br />";
						$('#fill-this').append(htmlString);
					});
					htmlString = "<div class='row'>"
						+ "<label class='col-md-6'>Appointment Date</label>"
						+ "<input type='text' id='appt' class='input-md' />"
						+ "</div>";
					$('#fill-this').append(htmlString);
					$('#appt').datepicker();
				},
				'error' : function(e){
					console.log(e.responseText);
				}
			});
		});

		$('#req-approve').click(function(){
			$.ajax({
				'type': 'POST',
				'url': 'admin/answerRequest',
				'data': {
					'r' : req,
					'response' : 'approved',
					'appt' : $('#appt').val()
				},
				'success' : function(data){
					alert("Successfully Approved Request");
					location.href = location.href; //refresh
				},
				'error' : function(e){
					console.log(e.responseText);
				},
				'complete' : function(e){
					console.log(e);
				}
			});
		});

		$('#req-reject').click(function(){
			$.ajax({
				'type': 'POST',
				'url': 'admin/answerRequest',
				'data': {
					'r' : req,
					'response' : 'rejected'
				},
				'success' : function(data){
					alert("Successfully Rejected Request" + data);
					location.href = location.href; //refresh
				},
				'error' : function(e){
					console.log(e.responseText);
				},
				'complete' : function(e){
					console.log(e);
				}
			});
		});
	})
</script>

<br />

<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="tabbable" id="tabs-admin">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-e1" data-toggle="tab">E-1</a>
					</li>
					<li>
						<a href="#panel-rs1" data-toggle="tab">RS-1</a>
					</li>
					<li>
						<a href="#panel-ow1" data-toggle="tab">OW-1</a>
					</li>
					<li>
						<a href="#panel-nw1" data-toggle="tab">NW-1</a>
					</li>
					<li>
						<a href="#panel-appointment" data-toggle="tab">Appointment</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-e1">
						<table class="table">
							<thead>
								<tr>
									<th>
										Reference Number
									</th>
									<th>
										Applicant ID (SSS ID)
									</th>
									<th>
										Request Date
									</th>
									<th>
										Status
									</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($e1_data as $data) : ?>
									<!-- <tr> -->
									<?php
										$status = $data->req_status;
										switch($status){
											case 'pending' : 
												echo "<tr class='warning'>";
												break;
											case 'approved' : 
												echo "<tr class='success'>";
												break;
											case 'rejected' :
												echo "<tr class='danger'>";
												break;
											default :
												echo "<tr>";
												break;
										}
									?>
										<td>
											<a id='<?php echo $data->req_id ?>' href="#modal-container-req-data" role="button" class="btn anchor-request" data-toggle="modal"><?php echo $data->req_id; ?></a>
										</td>
										<td><?php echo $data->applicant_id; ?></td>
										<td><?php echo $data->req_date; ?></td>
										<td><?php echo $data->req_status; ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="panel-rs1">
						<table class="table">
							<thead>
								<tr>
									<th>
										Reference Number
									</th>
									<th>
										Applicant ID (SSS ID)
									</th>
									<th>
										Request Date
									</th>
									<th>
										Status
									</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($rs1_data as $data) : ?>
									<!-- <tr> -->
									<?php
										$status = $data->req_status;
										switch($status){
											case 'pending' : 
												echo "<tr class='warning'>";
												break;
											case 'approved' : 
												echo "<tr class='success'>";
												break;
											case 'rejected' :
												echo "<tr class='danger'>";
												break;
											default :
												echo "<tr>";
												break;
										}
									?>
										<td>
											<a id='<?php echo $data->req_id ?>' href="#modal-container-req-data" role="button" class="btn anchor-request" data-toggle="modal"><?php echo $data->req_id; ?></a>
										</td>
										<td><?php echo $data->applicant_id; ?></td>
										<td><?php echo $data->req_date; ?></td>
										<td><?php echo $data->req_status; ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>

					<div class="tab-pane" id="panel-ow1">
						<table class="table">
							<thead>
								<tr>
									<th>
										Reference Number
									</th>
									<th>
										Applicant ID (SSS ID)
									</th>
									<th>
										Request Date
									</th>
									<th>
										Status
									</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($ow1_data as $data) : ?>
									<!-- <tr> -->
									<?php
										$status = $data->req_status;
										switch($status){
											case 'pending' : 
												echo "<tr class='warning'>";
												break;
											case 'approved' : 
												echo "<tr class='success'>";
												break;
											case 'rejected' :
												echo "<tr class='danger'>";
												break;
											default :
												echo "<tr>";
												break;
										}
									?>
										<td>
											<a id='<?php echo $data->req_id ?>' href="#modal-container-req-data" role="button" class="btn anchor-request" data-toggle="modal"><?php echo $data->req_id; ?></a>
										</td>
										<td><?php echo $data->applicant_id; ?></td>
										<td><?php echo $data->req_date; ?></td>
										<td><?php echo $data->req_status; ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>

					<div class="tab-pane" id="panel-nw1">
						<table class="table">
							<thead>
								<tr>
									<th>
										Reference Number
									</th>
									<th>
										Applicant ID (SSS ID)
									</th>
									<th>
										Request Date
									</th>
									<th>
										Status
									</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($nw1_data as $data) : ?>
									<!-- <tr> -->
									<?php
										$status = $data->req_status;
										switch($status){
											case 'pending' : 
												echo "<tr class='warning'>";
												break;
											case 'approved' : 
												echo "<tr class='success'>";
												break;
											case 'rejected' :
												echo "<tr class='danger'>";
												break;
											default :
												echo "<tr>";
												break;
										}
									?>
										<td>
											<a id='<?php echo $data->req_id ?>' href="#modal-container-req-data" role="button" class="btn anchor-request" data-toggle="modal"><?php echo $data->req_id; ?></a>
										</td>
										<td><?php echo $data->applicant_id; ?></td>
										<td><?php echo $data->req_date; ?></td>
										<td><?php echo $data->req_status; ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="panel-appointment">
						<table class="table">
							<thead>
								<tr>
									<th>
										Appointment Number
									</th>
									<th>
										Applicant ID (SSS ID)
									</th>
									<th>
										Appointment Date
									</th>
									<th>
										Status
									</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($appointment_data as $data) : ?>
									<!-- <tr> -->
									<?php
										$status = $data->status;
										switch($status){
											case 'pending' : 
												echo "<tr class='warning'>";
												break;
											case 'approved' : 
												echo "<tr class='success'>";
												break;
											case 'rejected' :
												echo "<tr class='danger'>";
												break;
											default :
												echo "<tr>";
												break;
										}
									?>
										<td>
											<a id='<?php echo $data->req_id ?>' href="#modal-container-req-data" role="button" class="btn anchor-request" data-toggle="modal"><?php echo $data->req_id; ?></a>
										</td>
										<td><?php echo $data->app_id; ?></td>
										<td><?php echo $data->appt_time; ?></td>
										<td><?php echo $data->status; ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
