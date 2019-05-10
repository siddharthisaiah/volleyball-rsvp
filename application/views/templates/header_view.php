<!DOCTYPE html>
<html>

    <head>

        <base href="<?php echo base_url(); ?>"/>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>
	    <?php echo ($title == '' ? 'Volleyball' : $title); ?>
	</title>

	<link href="static/css/bootstrap.min.css" rel="stylesheet">
	<link href="static/font-awesome/css/font-awesome.css" rel="stylesheet">

	<!-- Toastr style -->
	<link href="static/css/plugins/toastr/toastr.min.css" rel="stylesheet">

	<!-- Gritter -->
	<link href="static/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

	<link href="static/css/animate.css" rel="stylesheet">
	<link href="static/css/style.css" rel="stylesheet">

	<script src="static/js/jquery-3.1.1.min.js"></script>
        <script>
	 var base_url = "<?php echo base_url(); ?>";
        </script>

    </head>

    <body>
	<div id="wrapper">
            <nav class="navbar-default navbar-static-side" role="navigation">
		<div class="sidebar-collapse">
                    <ul class="nav metismenu" id="side-menu">
			<li class="nav-header">
                            <div class="dropdown profile-element"> <span>
				<img alt="image" class="img-circle" src="static/img/vb.jpg" height="100" widht="100" />
                            </span>
                            </div>
                            <div class="logo-element">
                                <i class="fa fa-trophy"></i>
                            </div>
			</li>
			<li class="active">
                            <a href="home"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></span></a>
			</li>
			<li >
                            <a href="events"><i class="fa fa-calendar"></i> <span class="nav-label">Events</span></span></a>
			</li>
                    </ul>

		</div>
            </nav>

            <div id="page-wrapper" class="gray-bg dashbard-1">
		<div class="row border-bottom">
		    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
			    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

			    <!--  hide the search bar for now - theres nothing to search!
			    <form role="search" class="navbar-form-custom" action="search_results.html">
				<div class="form-group">
				    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
				</div>
			    </form>

			    -->
			</div>
			<ul class="nav navbar-top-links navbar-right">
			    <li>
				<span class="m-r-sm text-muted welcome-message">
				    <!-- you can display a welcome message here. its annoying though. -->
				</span>
			    </li>
			    
			    

                            <li>
				<div class="dropdown profile-element"> <span>
				    <img alt="image" class="img-circle" src="<?php echo $this->session->userdata('pic_url'); ?>" />
				</span>
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">
				    <b class="caret"></b>
				</a>
				<ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <!--
				    <li><a href="profile.html">Profile</a></li>
                                    <li class="divider"></li>
				    -->
                                    <li><a href="logout">Logout</a></li>
				</ul>
				</div>
			    </li>
			</ul>

		    </nav>
		</div>
                
            
