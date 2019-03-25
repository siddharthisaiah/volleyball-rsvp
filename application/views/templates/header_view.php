<!DOCTYPE html>
<html>

    <head>

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

    </head>

    <body>
	<div id="wrapper">
            <nav class="navbar-default navbar-static-side" role="navigation">
		<div class="sidebar-collapse">
                    <ul class="nav metismenu" id="side-menu">
			<li class="nav-header">
                            <div class="dropdown profile-element"> <span>
				<img alt="image" class="img-circle" src="static/img/profile_small.jpg" />
                            </span>
                            </div>
                            <div class="logo-element">
				FU
                            </div>
			</li>
			<li class="active">
                            <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></span></a>
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
			    <form role="search" class="navbar-form-custom" action="search_results.html">
				<div class="form-group">
				    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
				</div>
			    </form>
			</div>
			<ul class="nav navbar-top-links navbar-right">
			    <li>
				<span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
			    </li>
			    
			    

                            <li>
				<div class="dropdown profile-element"> <span>
				    <img alt="image" class="img-circle" src="static/img/profile_small.jpg" />
				</span>
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">
				    <b class="caret"></b>
				</a>
				<ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <li><a href="profile.html">Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a href="login.html">Logout</a></li>
				</ul>
				</div>
			    </li>
			</ul>

		    </nav>
		</div>
                <div class="row  border-bottom white-bg dashboard-header">

                    <div class="col-md-3">
                        <h2>Welcome Amelia</h2>
                        <small>You have 42 messages and 6 notifications.</small>
                        <ul class="list-group clear-list m-t">
                            <li class="list-group-item fist-item">
                                <span class="pull-right">
                                    09:00 pm
                                </span>
                                <span class="label label-success">1</span> Please contact me
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
                                    10:16 am
                                </span>
                                <span class="label label-info">2</span> Sign a contract
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
                                    08:22 pm
                                </span>
                                <span class="label label-primary">3</span> Open new shop
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
                                    11:06 pm
                                </span>
                                <span class="label label-default">4</span> Call back to Sylvia
                            </li>
                            <li class="list-group-item">
                                <span class="pull-right">
                                    12:00 am
                                </span>
                                <span class="label label-primary">5</span> Write a letter to Sandra
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="flot-chart dashboard-chart">
                            <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                        </div>
                        <div class="row text-left">
                            <div class="col-xs-4">
                                <div class=" m-l-md">
                                    <span class="h4 font-bold m-t block">$ 406,100</span>
                                    <small class="text-muted m-b block">Sales marketing report</small>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <span class="h4 font-bold m-t block">$ 150,401</span>
                                <small class="text-muted m-b block">Annual sales revenue</small>
                            </div>
                            <div class="col-xs-4">
                                <span class="h4 font-bold m-t block">$ 16,822</span>
                                <small class="text-muted m-b block">Half-year revenue margin</small>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="statistic-box">
                            <h4>
				Project Beta progress
                            </h4>
                            <p>
				You have two project with not compleated task.
                            </p>
                            <div class="row text-center">
                                <div class="col-lg-6">
                                    <canvas id="doughnutChart2" width="80" height="80" style="margin: 18px auto 0"></canvas>
                                    <h5 >Kolter</h5>
                                </div>
                                <div class="col-lg-6">
                                    <canvas id="doughnutChart" width="80" height="80" style="margin: 18px auto 0"></canvas>
                                    <h5 >Maxtor</h5>
                                </div>
                            </div>
                            <div class="m-t">
                                <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                            </div>

                        </div>
                    </div>

		</div>
            </div>
            
	</div>

	<!-- Mainly scripts -->
	<script src="static/js/jquery-3.1.1.min.js"></script>
	<script src="static/js/bootstrap.min.js"></script>
	<script src="static/js/plugins/metisMenu/jquery.metisMenu.js"></script>
	<script src="static/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

	<!-- Flot -->
	<script src="static/js/plugins/flot/jquery.flot.js"></script>
	<script src="static/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
	<script src="static/js/plugins/flot/jquery.flot.spline.js"></script>
	<script src="static/js/plugins/flot/jquery.flot.resize.js"></script>
	<script src="static/js/plugins/flot/jquery.flot.pie.js"></script>

	<!-- Peity -->
	<script src="static/js/plugins/peity/jquery.peity.min.js"></script>
	<script src="static/js/demo/peity-demo.js"></script>

	<!-- Custom and plugin javascript -->
	<script src="static/js/inspinia.js"></script>
	<script src="static/js/plugins/pace/pace.min.js"></script>

	<!-- jQuery UI -->
	<script src="static/js/plugins/jquery-ui/jquery-ui.min.js"></script>

	<!-- GITTER -->
	<script src="static/js/plugins/gritter/jquery.gritter.min.js"></script>

	<!-- Sparkline -->
	<script src="static/js/plugins/sparkline/jquery.sparkline.min.js"></script>

	<!-- Sparkline demo data  -->
	<script src="static/js/demo/sparkline-demo.js"></script>

	<!-- ChartJS-->
	<script src="static/js/plugins/chartJs/Chart.min.js"></script>

	<!-- Toastr -->
	<script src="static/js/plugins/toastr/toastr.min.js"></script>
	
    </body>
</html>
