<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Layang Sworo</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<script type='text/javascript' src="<?php echo base_url(); ?>js/jquery-3.1.0.min.js"></script>		
	<script type='text/javascript' src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>		
</head>
<body>
    <nav class="navbar navbar-inverse no-margin">
		<div class="navbar-header fixed-brand">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"  id="menu-toggle">
			  <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
			</button>
			<a class="navbar-brand" href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <b>LAYANG SWORO</b></a>
		</div><!-- navbar-header-->

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
	<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
	<li><a href="#">Link</a></li>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="#">Action</a></li>
			<li><a href="#">Another action</a></li>
			<li><a href="#">Something else here</a></li>
			<li role="separator" class="divider"></li>
			<li><a href="#">Separated link</a></li>
			<li role="separator" class="divider"></li>
			<li><a href="#">One more separated link</a></li>
		</ul>
	</li>
</ul>		
			<ul class="nav navbar-nav navbar-right">
				<li class="active" >
					<button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2"> 
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</li>
			</ul>
		</div>
    </nav>
	
	
	
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
                <li class="active">
                    <a href="#"><span class="glyphicon glyphicon-envelope"></span> Dashboard</a>
                    <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="#">link1</a></li>
                        <li><a href="#">link2</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="glyphicon glyphicon-envelope"></span> Shortcut </span></a>
                    <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> link1</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> link2</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="glyphicon glyphicon-envelope"></span> Overview</a>
                    <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> link1</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> link2</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid xyz">
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
				
                <div class="row">
                    <div class="col-lg-6">
						<div class="panel panel-info">
						  <div class="panel-heading">Panel heading without title</div>
						  <div class="panel-body">
							Panel content
						  </div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="panel panel-success">
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
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
	
	<script>
$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
     $("#menu-toggle-2").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled-2");
        $('#menu ul').hide();
    });
 
     function initMenu() {
      $('#menu ul').hide();
      $('#menu ul').children('.current').parent().show();
      //$('#menu ul:first').show();
      $('#menu li a').click(
        function() {
          var checkElement = $(this).next();
          if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
            return false;
            }
          if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
            $('#menu ul:visible').slideUp('normal');
            checkElement.slideDown('normal');
            return false;
            }
          }
        );
      }
    $(document).ready(function() {initMenu();});	
	</script>
</body>
</html>