<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Republic of the Philippines Social Security System</title>

	<link href="<?php echo _css_url() . 'bootstrap.min.css'; ?>" rel="stylesheet">
	<link href="<?php echo _css_url() . 'jquery-ui.css'; ?>" rel="stylesheet">
	<link href="<?php echo _css_url() . 'style.css'; ?>" rel="stylesheet">
		
	<!-- js -->
	<script type="text/javascript" src="<?php echo _js_url() . 'jquery.min.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo _js_url() . 'jquery-ui.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo _js_url() . 'bootstrap.min.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo _js_url() . 'moment.min.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo _js_url() . 'scripts.js'; ?>"></script>
</head>
<body>

<nav class="navbar navbar-default navbar-static-top">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a class="navbar-brand" href="#">
				SSS LOGO
			</a>
		</div>

		<ul class="nav navbar-nav navbar-left">
			<li class="dropdown ">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					My.SSS
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">
					<li class=""><a href="#">Registration</a></li>
					<li class=""><a href="#">E Services</a></li>
					<li class=""><a href="#">About MySSS</a></li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav navbar-left">
			<li class="dropdown ">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					Corporate Profile
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">
					<li class=""><a href="#">The SSS Mandate</a></li>
					<li class=""><a href="#">SS Commission</a></li>
					<li class=""><a href="#">Management Directory</a></li>
					<li class=""><a href="#">SSS Quality</a></li>
					<li class=""><a href="#">Management System Certificate</a></li>
					<li class=""><a href="#">Quality Policy Statement</a></li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav navbar-left">
			<li class="dropdown ">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					Membership
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">
					<li class=""><a href="#">Coverage and Registration</a></li>
					<li class=""><a href="#">Schedule of Contribution</a></li>
					<li class=""><a href="#">FAQs</a></li>
					<li class=""><a href="#">Glossary of Terms</a></li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav navbar-left">
			<li class="dropdown ">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					Benefits
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">
					<li class=""><a href="#">Social Security Benefits</a></li>
					<li class=""><a href="#">Employee's Compensation</a></li>
					<li class=""><a href="#">Summary of Benefits</a></li>
					<li class=""><a href="#">Underground Mineworkers (PDF)</a></li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav navbar-left">
			<li class="dropdown ">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					Loans
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">
					<li class=""><a href="#">Member Loans</a></li>
					<li class=""><a href="#">Business Loans</a></li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav navbar-left">
			<li class="dropdown ">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					Publications
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">
					<li class=""><a href="#">Published Print Ads</a></li>
					<li class=""><a href="#">Video Material</a></li>
					<li class=""><a href="#">Facts and Figures</a></li>
					<li class=""><a href="#">Annual Report</a></li>
					<li class=""><a href="#">Downloadable Brochures</a></li>
					<li class=""><a href="#">SSS Newsletters</a></li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav navbar-left">
			<li class="dropdown ">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					Other Services
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">
					<li class=""><a href="#">Calamity Relief Package</a></li>
				</ul>
			</li>
		</ul>

		<ul class="nav navbar-nav navbar-right">
			<li style="padding: 15px 15px 10px 25px;  line-height: 20px;" id="dateToday"></li>
		</ul>
	</div><!-- /.container-fluid -->
</nav>

<body>

<!-- Logo and stuff -->
<div class="container">
	<!-- logo before main content after nav. SSS logo and social media buttons sa sss webpage-->
	<div class="row-clearfix"> 
		<div class="col-md-9">
			<a href="#">
				<img src="<?php echo _img_url() . 'logo.png';?>" class="pull-left"/>
			</a>
		</div>
		<div class="col-md-3 ">
			<a href="#">
				<img src="<?php echo _img_url() . 'social_media_icons.png';?>" class="pull-right"/>
			</a>
		</div>
	</div>
	<!-- end logos and stuff -->
</div>