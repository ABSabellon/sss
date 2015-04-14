<?php require_once('modal/request_detail_modal.php');?>
<script type="text/javascript">
	$(document).ready(function(){
		$('.anchor-request').on('click', function(){
			var req = $(this).attr('id');
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
				},
				'error' : function(e){
					console.log(e.responseText);
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
				</div>
			</div>
		</div>
	</div>
</div>