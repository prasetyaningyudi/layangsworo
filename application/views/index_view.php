<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<title>Tes Index Theme</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
	<script type='text/javascript' src="<?php echo base_url(); ?>js/jquery-3.1.0.min.js"></script>	
	<script type='text/javascript' src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>	
</head>
<body>
<div id="header" class="no-margin">
	<nav class="navbar navbar-default my-navbar">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed menu-toggle" data-toggle="collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				 </button>		
				<a class="navbar-brand my-title" href="#">
					<span class="glyphicon glyphicon-envelope"></span> <b>LAYANGSWORO</b>
				</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<button class="navbar-toggle collapse in menu-toggle" data-toggle="collapse"> 
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</li>
				</ul>
			</div>
		</div>
	</nav>	
</div>
<div id="container" class="no-margin">
	<div id="sidebar">
	<div id="sidebar-up">
		<div class="my-profile">
			<img src="<?php echo base_url(); ?>images/foto.jpg" width="25px" alt="Photo" class="img-circle"/> Yudi Prasetyo
		</div>
		<div class="my-menu">
            <ul class="sidebar-nav" id="menu" style="list-style-type:none;">
                <li>
                    <a href="#"><span class="glyphicon glyphicon-picture"></span> Dashboard</a>
                    <ul class="" style="list-style-type:none;">
                        <li><a href="#">- &nbsp;&nbsp;<span class="glyphicon glyphicon-picture"></span> link1</a></li>
                        <li><a href="#">- &nbsp;&nbsp;link1</a></li>
                        <li><a href="#">- &nbsp;&nbsp;link1</a></li>
                        <li><a href="#">- &nbsp;&nbsp;link1</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="glyphicon glyphicon-fire"></span> Shortcut </span></a>
                    <ul class="" style="list-style-type:none;">
                        <li><a href="#">- &nbsp;&nbsp;link1</a></li>
                        <li><a href="#">- &nbsp;&nbsp;link1</a></li>
                        <li><a href="#">- &nbsp;&nbsp;link1</a></li>
                        <li><a href="#">- &nbsp;&nbsp;link1</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="glyphicon glyphicon-random"></span> Overview</a>
                    <ul class="" style="list-style-type:none;">
                        <li><a href="#">- &nbsp;&nbsp;link1</a></li>
                        <li><a href="#">- &nbsp;&nbsp;link1</a></li>
                        <li><a href="#">- &nbsp;&nbsp;link1</a></li>
                        <li><a href="#">- &nbsp;&nbsp;link1</a></li>
                    </ul>
                </li>
            </ul>		
		</div>
	</div>
	</div>
	<div id="content">
		<div class="my-breadcurm">
			<div class="col-xs-6 no-margin">Home / Page</div>
			<div class="col-xs-6 text-right no-margin">logout</div>
		</div>
		<div class="my-content">
			<div class="row">
				<div class="col-lg-6">
					<div class="panel panel-default">
					  <div class="panel-heading">Panel heading without title</div>
					  <div class="panel-body">
						Panel content
					  </div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="panel panel-primary">
					  <div class="panel-heading">
						<h3 class="panel-title">Panel title</h3>
					  </div>
					  <div class="panel-body">
						Panel content
					  </div>
					</div>                    
				</div>
			</div>				
		</div>		
	</div>
</div>
<script type='text/javascript' src="<?php echo base_url(); ?>js/custom.js"></script>
</body>
</html>