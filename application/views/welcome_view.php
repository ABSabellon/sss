<div class="container">
	<!-- logo before main content after nav. SSS logo and social media buttons sa sss webpage-->
	<div class="row-clearfix" style="height: 5em; border: solid 1px red;"> <!-- defined height dapat REMOVE border when done layouting-->
		<div class="col-md-9">
			<a href="#">
				SSS logo image
			</a>
		</div>
		<div class="col-md-3 ">
			<a href="#">
				<img src="<?php echo _img_url() . 'social_media_icons.png';?>" class="pull-right"/>
			</a>
		</div>
	</div>

	<div class="row-clearfix" style="height: 415px; border: solid 1px blue;"> <!-- defined height dapat REMOVE and height border when done layouting-->
		<div class="col-md-9">
			<img src="<?php echo _img_url() . '57thBanner.jpg';?>" />
		</div>

		<div class="col-md-3">
			<div class="panel-group" id="login_accordion">
				<div class="panel panel-default">
					<div class="panel-heading" data-toggle="collapse" data-parent="#login_accordion" href="#employee_form">
					 	Employee Login
					</div>
					<div id="employee_form" class="panel-collapse collapse in">
						<div class="panel-body">
							<form class="form-horizontal">
								<fieldset>
									<!-- Text input-->
									<div class="form-group">
										<label class="col-md-4 control-label" for="user_id">User ID</label>  
										<div class="col-md-12">
											<input id="user_id" name="user_id" type="text" placeholder="" class="form-control input-md">
										</div>
									</div>

									<!-- Password input-->
									<div class="form-group">
										<label class="col-md-4 control-label" for="password">Password</label>
										<div class="col-md-12">
											<input id="password" name="password" type="password" placeholder="" class="form-control input-md">
										</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
				
				<div class="panel panel-default">
					<div class="panel-heading" data-toggle="collapse" data-parent="#login_accordion" href="#employer_form">
					 	Employer Login	
					</div>
					<div id="employer_form" class="panel-collapse collapse">
						<div class="panel-body">
							<form class="form-horizontal">
								<fieldset>
									<!-- Text input-->
									<div class="form-group">
										<label class="col-md-4 control-label" for="user_id">User ID</label>  
										<div class="col-md-12">
											<input id="user_id" name="user_id" type="text" placeholder="" class="form-control input-md">
										</div>
									</div>

									<!-- Password input-->
									<div class="form-group">
										<label class="col-md-4 control-label" for="password">Password</label>
										<div class="col-md-12">
											<input id="password" name="password" type="password" placeholder="" class="form-control input-md">
										</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>