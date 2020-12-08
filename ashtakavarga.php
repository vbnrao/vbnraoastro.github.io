<?php
// Initialize the session
session_start();
//include ('./accesscontrol.php');

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


$tmp_Rasi_Asc = $_SESSION['tmp_Rasi_Asc'];
$tmp_Rasi_Sun = $_SESSION['tmp_Rasi_Sun'];
$tmp_Rasi_Moon = $_SESSION['tmp_Rasi_Moon'];
$tmp_Rasi_Mar = $_SESSION['tmp_Rasi_Mar'];
$tmp_Rasi_Mer = $_SESSION['tmp_Rasi_Mer'];
$tmp_Rasi_Jup = $_SESSION['tmp_Rasi_Jup'];
$tmp_Rasi_Ven = $_SESSION['tmp_Rasi_Ven'];
$tmp_Rasi_Sat = $_SESSION['tmp_Rasi_Sat'];
$tmp_Rasi_Rah = $_SESSION['tmp_Rasi_Rah'];




?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>vbnrao Astro Software Monitoring System : Admin</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />


	<script src="js/jquery.min.js"></script>

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<link rel="stylesheet" href="assets/css/datepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />

<!-- Drop Down Custom JS styles -->
		<script src="js/custom.js"></script>	

<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->


<script type="text/javascript">
	
 $("#chk1").click(function (){
      if($(this).attr("checked") == "checked"){
         $("#LatDegree").removeAttr("readonly", false);
         $("#LongDegree").removeAttr("readonly", false);
          $("#LatDegree").focus()
      }
       else{
         $("#LatDegree").attr("readonly", "readonly");
       }                   
       
   });
		
</script>

<style>

table  {
  border-collapse: collapse;
   border: 0px solid red;
}

th, td {
  
  border: 1px solid blue;
  padding: 10px;
}
table tr {
	text-align: center;
}
table.a {
	table-layout: fixed;
	width: 30%;
}

table.d {
	table-layout: fixed;
	width: 50%;
	border: 1px;
}
table.d td{
	border: 2px solid blue;
	text-align: center;
}

table.b {
	table-layout: fixed;
	width: 15%;
	border: 1px;

}

table.b td{
	border: 1px solid black;
}

table.bb {
	table-layout: fixed;
	width: 85%;
	border: 1px;

}

table.bb td{
	border: 1px solid black;

}


table.c {
	table-layout: fixed;
	width: 100%;

}

table.c td{
	border: 1px solid black;
}

table.eb {
  border-collapse: collapse;
  margin-top: 0px;
  table-layout: fixed;
  width: 100%;
  /*border: 1px solid blue; */


}



table.eb td{
  /*border: 2px solid red; */
  width: 20%;
  border: 0px;
}

table.eb td dt {
  /*border: 2px solid red; */
  color: white;
}

table.eb tr{
  
  height: 24.5px;
   
}

</style> 

	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.php" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							vbnrao Astro Software Monitoring System - Admin
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="index.php">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="reset-password.php">
										<i class="ace-icon fa fa-user"></i>
										Change Password
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						<a href="index.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

<!--  Menu Starts for Super Administrator -->



  <!-- Start of Manage Masters -->
          <li class="">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-book"></i>
              <span class="menu-text">
                Manage Masters
              </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

              <li class="">
                <a href="Astro_DataEntry.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Natal Data Entry
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="edit_default_city.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Change Default City
                </a>

                <b class="arrow"></b>
              </li>

              
            </ul>
          </li>

<!-- End of Manage Masters -->

	
<!-- Start of View Details -->

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-eye"></i>
							<span class="menu-text"> Manage Views </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="client_details.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Client Details
								</a>

								<b class="arrow"></b>
							</li>



						</ul>
					</li>

<!-- End of View Details  -->
<!-- Start of Manage Natal Data -->
          <li class="active open">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-desktop"></i>
              <span class="menu-text">
                Manage Natal Data
              </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

              <li class="">
                <a href="natal.php?id=<?php echo $_SESSION['natalid']; ?>">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Basic Information
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="vimsottari_dasa.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Vimsottari Dasa
                </a>

                <b class="arrow"></b>
              </li>

              <li class="active">
                <a href="ashtakavarga.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Ashtakavarga
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="shadbala.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Shadbala
                </a>

                <b class="arrow"></b>
              </li>
            </ul>
          </li>

<!-- End of Manage Natal Data -->


<!-- Start of Administration -->

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Administration </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Add User
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Edit User
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Delete User
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>

<!-- End of Administration -->
<!-- Menu Ends for Super Aministrator -->



				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="index.php">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Manage Natal Data
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Ashtakavarga Details 
									<i class="ace-icon fa fa-angle-double-right"></i>
									<?php echo '<strong>' . $_SESSION['name'] . '</strong>'; ?>
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="space-6"></div>
<!--

Body goes here -->


<!-- Ashtakavarga Calculation Starts ---->

<table class="d" align="center">
<tr><td colspan="8" align="center"><strong>Planetary Positions in Rashis</strong></td></tr>
<tr>
<td>Sun</td><td>Moon</td><td>Mars</td><td>Mercury</td><td>Jupiter</td><td>Venus</td><td>Saturn</td><td>Ascendant</td>
</tr>
<tr>
<td><?php echo $tmp_Rasi_Sun ?></td><td><?php echo $tmp_Rasi_Moon ?></td><td><?php echo $tmp_Rasi_Mar ?></td><td><?php echo $tmp_Rasi_Mer ?></td><td><?php echo $tmp_Rasi_Jup ?></td><td><?php echo $tmp_Rasi_Ven ?></td><td><?php echo $tmp_Rasi_Sat ?></td><td><?php echo $tmp_Rasi_Asc ?></td>
</tr>
</table>
<br>


<!-- Matrices for Ashtakavarga Sun start -->
<?php
$Sun_sun_arr = array
	(
	array(1,1,0,1,0,0,1,1,1,1,1,0),
	array(0,1,1,0,1,0,0,1,1,1,1,1),
	array(1,0,1,1,0,1,0,0,1,1,1,1),
	array(1,1,0,1,1,0,1,0,0,1,1,1),
	array(1,1,1,0,1,1,0,1,0,0,1,1),
	array(1,1,1,1,0,1,1,0,1,0,0,1),
	array(1,1,1,1,1,0,1,1,0,1,0,0),
	array(0,1,1,1,1,1,0,1,1,0,1,0),
	array(0,0,1,1,1,1,1,0,1,1,0,1),
	array(1,0,0,1,1,1,1,1,0,1,1,0),
	array(0,1,0,0,1,1,1,1,1,0,1,1),
	array(1,0,1,0,0,1,1,1,1,1,0,1)
	);

$Moon_sun_arr = array
	(
	array(0,0,1,0,0,1,0,0,0,1,1,0),
	array(0,0,0,1,0,0,1,0,0,0,1,1),
	array(1,0,0,0,1,0,0,1,0,0,0,1),
	array(1,1,0,0,0,1,0,0,1,0,0,0),
	array(0,1,1,0,0,0,1,0,0,1,0,0),
	array(0,0,1,1,0,0,0,1,0,0,1,0),
	array(0,0,0,1,1,0,0,0,1,0,0,1),
	array(1,0,0,0,1,1,0,0,0,1,0,0),
	array(0,1,0,0,0,1,1,0,0,0,1,0),
	array(0,0,1,0,0,0,1,1,0,0,0,1),
	array(1,0,0,1,0,0,0,1,1,0,0,0),
	array(0,1,0,0,1,0,0,0,1,1,0,0)
	);


$Mar_sun_arr = array
	(
	array(1,1,0,1,0,0,1,1,1,1,1,0),
	array(0,1,1,0,1,0,0,1,1,1,1,1),
	array(1,0,1,1,0,1,0,0,1,1,1,1),
	array(1,1,0,1,1,0,1,0,0,1,1,1),
	array(1,1,1,0,1,1,0,1,0,0,1,1),
	array(1,1,1,1,0,1,1,0,1,0,0,1),
	array(1,1,1,1,1,0,1,1,0,1,0,0),
	array(0,1,1,1,1,1,0,1,1,0,1,0),
	array(0,0,1,1,1,1,1,0,1,1,0,1),
	array(1,0,0,1,1,1,1,1,0,1,1,0),
	array(0,1,0,0,1,1,1,1,1,0,1,1),
	array(1,0,1,0,0,1,1,1,1,1,0,1)
	);

$Mer_sun_arr = array 
	(
	array(0,0,1,0,1,1,0,0,1,1,1,1),
	array(1,0,0,1,0,1,1,0,0,1,1,1),
	array(1,1,0,0,1,0,1,1,0,0,1,1),
	array(1,1,1,0,0,1,0,1,1,0,0,1),
	array(1,1,1,1,0,0,1,0,1,1,0,0),
	array(0,1,1,1,1,0,0,1,0,1,1,0),
	array(0,0,1,1,1,1,0,0,1,0,1,1),
	array(1,0,0,1,1,1,1,0,0,1,0,1),
	array(1,1,0,0,1,1,1,1,0,0,1,0),
	array(0,1,1,0,0,1,1,1,1,0,0,1),
	array(1,0,1,1,0,0,1,1,1,1,0,0),
	array(0,1,0,1,1,0,0,1,1,1,1,0)
	);

$Jup_sun_arr = array 
	(
	array(0,0,0,0,1,1,0,0,1,0,1,0),
	array(0,0,0,0,0,1,1,0,0,1,0,1),
	array(1,0,0,0,0,0,1,1,0,0,1,0),
	array(0,1,0,0,0,0,0,1,1,0,0,1),
	array(1,0,1,0,0,0,0,0,1,1,0,0),
	array(0,1,0,1,0,0,0,0,0,1,1,0),
	array(0,0,1,0,1,0,0,0,0,0,1,1),
	array(1,0,0,1,0,1,0,0,0,0,0,1),
	array(1,1,0,0,1,0,1,0,0,0,0,0),
	array(0,1,1,0,0,1,0,1,0,0,0,0),
	array(0,0,1,1,0,0,1,0,1,0,0,0),
	array(0,0,0,1,1,0,0,1,0,1,0,0)
	);

$Ven_sun_arr = array 
	(
	array(0,0,0,0,0,1,1,0,0,0,0,1),
	array(1,0,0,0,0,0,1,1,0,0,0,0),
	array(0,1,0,0,0,0,0,1,1,0,0,0),
	array(0,0,1,0,0,0,0,0,1,1,0,0),
	array(0,0,0,1,0,0,0,0,0,1,1,0),
	array(0,0,0,0,1,0,0,0,0,0,1,1),
	array(1,0,0,0,0,1,0,0,0,0,0,1),
	array(1,1,0,0,0,0,1,0,0,0,0,0),
	array(0,1,1,0,0,0,0,1,0,0,0,0),
	array(0,0,1,1,0,0,0,0,1,0,0,0),
	array(0,0,0,1,1,0,0,0,0,1,0,0),
	array(0,0,0,0,1,1,0,0,0,0,1,0)
	);

$Sat_sun_arr = array 
	(
	array(1,1,0,1,0,0,1,1,1,1,1,0),
	array(0,1,1,0,1,0,0,1,1,1,1,1),
	array(1,0,1,1,0,1,0,0,1,1,1,1),
	array(1,1,0,1,1,0,1,0,0,1,1,1),
	array(1,1,1,0,1,1,0,1,0,0,1,1),
	array(1,1,1,1,0,1,1,0,1,0,0,1),
	array(1,1,1,1,1,0,1,1,0,1,0,0),
	array(0,1,1,1,1,1,0,1,1,0,1,0),
	array(0,0,1,1,1,1,1,0,1,1,0,1),
	array(1,0,0,1,1,1,1,1,0,1,1,0),
	array(0,1,0,0,1,1,1,1,1,0,1,1),
	array(1,0,1,0,0,1,1,1,1,1,0,1)
	);

$Lag_sun_arr = array 
	(
	array(0,0,1,1,0,1,0,0,0,1,1,1),
	array(1,0,0,1,1,0,1,0,0,0,1,1),
	array(1,1,0,0,1,1,0,1,0,0,0,1),
	array(1,1,1,0,0,1,1,0,1,0,0,0),
	array(0,1,1,1,0,0,1,1,0,1,0,0),
	array(0,0,1,1,1,0,0,1,1,0,1,0),
	array(0,0,0,1,1,1,0,0,1,1,0,1),
	array(1,0,0,0,1,1,1,0,0,1,1,0),
	array(0,1,0,0,0,1,1,1,0,0,1,1),
	array(1,0,1,0,0,0,1,1,1,0,0,1),
	array(1,1,0,1,0,0,0,1,1,1,0,0),
	array(0,1,1,0,1,0,0,0,1,1,1,0)
	);
?>

<!-- Prastara Ashtakavarga for Sun Matrices -
<table>
<tr>
<td colspan="13">Prastara Ashtakavarga for Sun Matrices </td>
</tr>
<tr>
<td>Planets/Rasi No.</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td>
</tr>

<tr>

<td>Sun</td> -->

<?php
$rows = 1;
$cols = 12;

$sun_ii = $tmp_Rasi_Sun;
$sun_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_tsun[$i] = $Sun_sun_arr[($sun_ii-1)][$sun_xy];	
//// echo '<td>' . $Sun_sun_arr[($sun_ii-1)][$sun_xy] . '</td>';
$Sun_sun_arrtot[$i] = $Sun_sun_arr[($sun_ii-1)][$sun_xy];
$sun_xy = $sun_xy + 1;


}
//// echo '</tr>';
?>

<!-- <tr>
<td>Moon</td> -->

<?php
$moon_ii = $tmp_Rasi_Moon;
$moon_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_tmoon[$i] = $Moon_sun_arr[($moon_ii-1)][$moon_xy];		
//// echo '<td>' . $Moon_sun_arr[($moon_ii-1)][$moon_xy] . '</td>';
$Moon_sun_arrtot[$i] = $Moon_sun_arr[($moon_ii-1)][$moon_xy];
$moon_xy = $moon_xy + 1;

}
//// echo '</tr>';
?>

<!-- <tr>
<td>Mars</td> -->

<?php
$mar_ii = $tmp_Rasi_Mar;
$mar_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_tmar[$i] =	$Mar_sun_arr[($mar_ii-1)][$mar_xy];	
//// echo '<td>' . $Mar_sun_arr[($mar_ii-1)][$mar_xy] . '</td>';
$Mar_sun_arrtot[$i] = $Mar_sun_arr[($mar_ii-1)][$mar_xy];
$mar_xy = $mar_xy + 1;

}
//// echo '</tr>';
?>

<!-- <tr>
<td>Mercury</td> -->

<?php
$mer_ii = $tmp_Rasi_Mer;
$mer_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_tmer[$i] =	$Mer_sun_arr[($mer_ii-1)][$mer_xy];	
//// echo '<td>' . $Mer_sun_arr[($mer_ii-1)][$mer_xy] . '</td>';
$Mer_sun_arrtot[$i] = $Mer_sun_arr[($mer_ii-1)][$mer_xy];
$mer_xy = $mer_xy + 1;

}
//// echo '</tr>';
?>

<!-- <tr>
<td>Jupiter</td> -->

<?php
$jup_ii = $tmp_Rasi_Jup;
$jup_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_tjup[$i] =	$Jup_sun_arr[($jup_ii-1)][$jup_xy];	
//// echo '<td>' . $Jup_sun_arr[($jup_ii-1)][$jup_xy] . '</td>';
$Jup_sun_arrtot[$i] = $Jup_sun_arr[($jup_ii-1)][$jup_xy];
$jup_xy = $jup_xy + 1;

}
//// echo '</tr>';
?>

<!-- <tr>
<td>Venus</td> -->

<?php
$ven_ii = $tmp_Rasi_Ven;
$ven_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_tven[$i] =	$Ven_sun_arr[($ven_ii-1)][$ven_xy];		
//// echo '<td>' . $Ven_sun_arr[($ven_ii-1)][$ven_xy] . '</td>';
$Ven_sun_arrtot[$i] = $Ven_sun_arr[($ven_ii-1)][$ven_xy];
$ven_xy = $ven_xy + 1;

}
//// echo '</tr>';
?>

<!-- <tr>
<td>Saturn</td> -->

<?php
$sat_ii = $tmp_Rasi_Sat;
$sat_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_tsat[$i] = $Sat_sun_arr[($sat_ii-1)][$sat_xy];		
//// echo '<td>' . $Sat_sun_arr[($sat_ii-1)][$sat_xy] . '</td>';
$Sat_sun_arrtot[$i] = $Sat_sun_arr[($sat_ii-1)][$sat_xy];
$sat_xy = $sat_xy + 1;

}
//// echo '</tr>';
?>

<!-- <tr>
<td>Lagna</td> -->

<?php
$lag_ii = $tmp_Rasi_Asc;
$lag_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_tlag[$i] =	$Lag_sun_arr[($lag_ii-1)][$lag_xy];	
//// echo '<td>' . $Lag_sun_arr[($lag_ii-1)][$lag_xy] . '</td>';
$Lag_sun_arrtot[$i] = $Lag_sun_arr[($lag_ii-1)][$lag_xy];
$lag_xy = $lag_xy + 1;

}
//// echo '</tr>';
?>


<!-- <tr>
<td><strong>Total :</strong></td> -->

<?php


For ($i=1; $i<13; $i++)
{
$tmp_totsun[$i] = $Sun_sun_arrtot[$i] + $Moon_sun_arrtot[$i] + $Mar_sun_arrtot[$i] + $Mer_sun_arrtot[$i] + $Jup_sun_arrtot[$i] + $Ven_sun_arrtot[$i] + $Sat_sun_arrtot[$i] + $Lag_sun_arrtot[$i];

	$total_sun[$i] = $Sun_sun_arrtot[$i] + $Moon_sun_arrtot[$i] + $Mar_sun_arrtot[$i] + $Mer_sun_arrtot[$i] + $Jup_sun_arrtot[$i] + $Ven_sun_arrtot[$i] + $Sat_sun_arrtot[$i] + $Lag_sun_arrtot[$i];
	
//	// echo '<td>' . '<strong>' . $total_sun[$i] . '</strong>' . '</td>';
}
//// echo '</tr>';

?>

<!--
</table>



<br>
<br>
<table class="b">
<tr align="center">
-->

<?php
/*
If ($tmp_Rasi_Sun == 12)
{
	echo '<td bgcolor="#008000">' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[11] . '</td><td colspan="2" rowspan="2">Sun</td><td>' . $total_sun[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	// echo '</tr>';

}

If ($tmp_Rasi_Sun == 1)
{
	// echo '<td>' . $total_sun[12] . '</td><td bgcolor="#008000">' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[11] . '</td><td colspan="2" rowspan="2">Sun</td><td>' . $total_sun[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Sun == 2)
{
	// echo '<td>' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td bgcolor="#008000">' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[11] . '</td><td colspan="2" rowspan="2">Sun</td><td>' . $total_sun[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Sun == 3)
{
	// echo '<td>' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td bgcolor="#008000">' . $total_sun[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[11] . '</td><td colspan="2" rowspan="2">Sun</td><td>' . $total_sun[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Sun == 11)
{
	// echo '<td>' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#008000">' . $total_sun[11] . '</td><td colspan="2" rowspan="2">Sun</td><td>' . $total_sun[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Sun == 4)
{
	// echo '<td>' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[11] . '</td><td colspan="2" rowspan="2">Sun</td><td bgcolor="#008000">' . $total_sun[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Sun == 10)
{
	// echo '<td>' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[11] . '</td><td colspan="2" rowspan="2">Sun</td><td>' . $total_sun[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#008000">' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Sun == 5)
{
	// echo '<td>' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[11] . '</td><td colspan="2" rowspan="2">Sun</td><td>' . $total_sun[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[10] . '</td><td bgcolor="#008000">' . $total_sun[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Sun == 9)
{
	// echo '<td>' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[11] . '</td><td colspan="2" rowspan="2">Sun</td><td>' . $total_sun[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	echo '<td bgcolor="#008000">' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Sun == 8)
{
	// echo '<td>' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[11] . '</td><td colspan="2" rowspan="2">Sun</td><td>' . $total_sun[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sun[9] . '</td><td bgcolor="#008000">' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Sun == 7)
{
	// echo '<td>' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[11] . '</td><td colspan="2" rowspan="2">Sun</td><td>' . $total_sun[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td bgcolor="#008000">' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Sun == 6)
{
	// echo '<td>' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[11] . '</td><td colspan="2" rowspan="2">Sun</td><td>' . $total_sun[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td bgcolor="#008000">' . $total_sun[6] . '</td>';

	// echo '</tr>';
}
*/
?>
<!--
</table>
<br>
<br>
-->

<!-- Matrices for Ashtakavarga Sun Ends -->
<!-- Matrices for Ashtakavarga Moon Starts -->


<!-- Matrices for Ashtakavarga Moon start -->
<?php
$Sun_moon_arr = array
	(
	array(0,0,1,0,0,1,1,1,0,1,1,0),
	array(0,0,0,1,0,0,1,1,1,0,1,1),
	array(1,0,0,0,1,0,0,1,1,1,0,1),
	array(1,1,0,0,0,1,0,0,1,1,1,0),
	array(0,1,1,0,0,0,1,0,0,1,1,1),
	array(1,0,1,1,0,0,0,1,0,0,1,1),
	array(1,1,0,1,1,0,0,0,1,0,0,1),
	array(1,1,1,0,1,1,0,0,0,1,0,0),
	array(0,1,1,1,0,1,1,0,0,0,1,0),
	array(0,0,1,1,1,0,1,1,0,0,0,1),
	array(1,0,0,1,1,1,0,1,1,0,0,0),
	array(0,1,0,0,1,1,1,0,1,1,0,0)
	);

$Moon_moon_arr = array
	(
	array(1,0,1,0,0,1,1,0,1,1,1,0),
	array(0,1,0,1,0,0,1,1,0,1,1,1),
	array(1,0,1,0,1,0,0,1,1,0,1,1),
	array(1,1,0,1,0,1,0,0,1,1,0,1),
	array(1,1,1,0,1,0,1,0,0,1,1,0),
	array(0,1,1,1,0,1,0,1,0,0,1,1),
	array(1,0,1,1,1,0,1,0,1,0,0,1),
	array(1,1,0,1,1,1,0,1,0,1,0,0),
	array(0,1,1,0,1,1,1,0,1,0,1,0),
	array(0,0,1,1,0,1,1,1,0,1,0,1),
	array(1,0,0,1,1,0,1,1,1,0,1,0),
	array(0,1,0,0,1,1,0,1,1,1,0,1)

	);


$Mar_moon_arr = array
	(
	array(0,1,1,0,1,1,0,0,0,1,1,0),
	array(0,0,1,1,0,1,1,0,0,0,1,1),
	array(1,0,0,1,1,0,1,1,0,0,0,1),
	array(1,1,0,0,1,1,0,1,1,0,0,0),
	array(0,1,1,0,0,1,1,0,1,1,0,0),
	array(0,0,1,1,0,0,1,1,0,1,1,0),
	array(0,0,0,1,1,0,0,1,1,0,1,1),
	array(1,0,0,0,1,1,0,0,1,1,0,1),
	array(1,1,0,0,0,1,1,0,0,1,1,0),
	array(0,1,1,0,0,0,1,1,0,0,1,1),
	array(1,0,1,1,0,0,0,1,1,0,0,1),
	array(1,1,0,1,1,0,0,0,1,1,0,0)

	);

$Mer_moon_arr = array 
	(
	array(1,0,1,1,1,0,1,1,0,1,1,0),
	array(0,1,0,1,1,1,0,1,1,0,1,1),
	array(1,0,1,0,1,1,1,0,1,1,0,1),
	array(1,1,0,1,0,1,1,1,0,1,1,0),
	array(0,1,1,0,1,0,1,1,1,0,1,1),
	array(1,0,1,1,0,1,0,1,1,1,0,1),
	array(1,1,0,1,1,0,1,0,1,1,1,0),
	array(0,1,1,0,1,1,0,1,0,1,1,1),
	array(1,0,1,1,0,1,1,0,1,0,1,1),
	array(1,1,0,1,1,0,1,1,0,1,0,1),
	array(1,1,1,0,1,1,0,1,1,0,1,0),
	array(0,1,1,1,0,1,1,0,1,1,0,1)
	);

$Jup_moon_arr = array 
	(
	array(1,1,0,1,0,0,1,1,0,1,1,0),
	array(0,1,1,0,1,0,0,1,1,0,1,1),
	array(1,0,1,1,0,1,0,0,1,1,0,1),
	array(1,1,0,1,1,0,1,0,0,1,1,0),
	array(0,1,1,0,1,1,0,1,0,0,1,1),
	array(1,0,1,1,0,1,1,0,1,0,0,1),
	array(1,1,0,1,1,0,1,1,0,1,0,0),
	array(0,1,1,0,1,1,0,1,1,0,1,0),
	array(0,0,1,1,0,1,1,0,1,1,0,1),
	array(1,0,0,1,1,0,1,1,0,1,1,0),
	array(0,1,0,0,1,1,0,1,1,0,1,1),
	array(1,0,1,0,0,1,1,0,1,1,0,1)

	);

$Ven_moon_arr = array 
	(
	array(0,0,1,1,1,0,1,0,1,1,1,0),
	array(0,0,0,1,1,1,0,1,0,1,1,1),
	array(1,0,0,0,1,1,1,0,1,0,1,1),
	array(1,1,0,0,0,1,1,1,0,1,0,1),
	array(1,1,1,0,0,0,1,1,1,0,1,0),
	array(0,1,1,1,0,0,0,1,1,1,0,1),
	array(1,0,1,1,1,0,0,0,1,1,1,0),
	array(0,1,0,1,1,1,0,0,0,1,1,1),
	array(1,0,1,0,1,1,1,0,0,0,1,1),
	array(1,1,0,1,0,1,1,1,0,0,0,1),
	array(1,1,1,0,1,0,1,1,1,0,0,0),
	array(0,1,1,1,0,1,0,1,1,1,0,0)
	);

$Sat_moon_arr = array 
	(
	array(0,0,1,0,1,1,0,0,0,0,1,0),
	array(0,0,0,1,0,1,1,0,0,0,0,1),
	array(1,0,0,0,1,0,1,1,0,0,0,0),
	array(0,1,0,0,0,1,0,1,1,0,0,0),
	array(0,0,1,0,0,0,1,0,1,1,0,0),
	array(0,0,0,1,0,0,0,1,0,1,1,0),
	array(0,0,0,0,1,0,0,0,1,0,1,1),
	array(1,0,0,0,0,1,0,0,0,1,0,1),
	array(1,1,0,0,0,0,1,0,0,0,1,0),
	array(0,1,1,0,0,0,0,1,0,0,0,1),
	array(1,0,1,1,0,0,0,0,1,0,0,0),
	array(0,1,0,1,1,0,0,0,0,1,0,0)
	);

$Lag_moon_arr = array 
	(
	array(0,0,1,0,0,1,0,0,0,1,1,0),
	array(0,0,0,1,0,0,1,0,0,0,1,1),
	array(1,0,0,0,1,0,0,1,0,0,0,1),
	array(1,1,0,0,0,1,0,0,1,0,0,0),
	array(0,1,1,0,0,0,1,0,0,1,0,0),
	array(0,0,1,1,0,0,0,1,0,0,1,0),
	array(0,0,0,1,1,0,0,0,1,0,0,1),
	array(1,0,0,0,1,1,0,0,0,1,0,0),
	array(0,1,0,0,0,1,1,0,0,0,1,0),
	array(0,0,1,0,0,0,1,1,0,0,0,1),
	array(1,0,0,1,0,0,0,1,1,0,0,0),
	array(0,1,0,0,1,0,0,0,1,1,0,0)
	);
?>

<!--
<table>
<tr>
<td colspan="13">Prastara Ashtakavarga for Moon Matrices </td>
</tr>
<tr>
<td>Planets/Rasi No.</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td>
</tr>

<tr>

<td>Sun</td> -->

<?php
$rows = 1;
$cols = 12;

$sun_ii = $tmp_Rasi_Sun;
$sun_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t1sun[$i] = $Sun_moon_arr[($sun_ii-1)][$sun_xy];	
// echo '<td>' . $Sun_moon_arr[($sun_ii-1)][$sun_xy] . '</td>';
$Sun_moon_arrtot[$i] = $Sun_moon_arr[($sun_ii-1)][$sun_xy];
$sun_xy = $sun_xy + 1;


}
// echo '</tr>';
?>

<!-- <tr>
<td>Moon</td> -->

<?php
$moon_ii = $tmp_Rasi_Moon;
$moon_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t1moon[$i] = $Moon_moon_arr[($moon_ii-1)][$moon_xy];	
// echo '<td>' . $Moon_moon_arr[($moon_ii-1)][$moon_xy] . '</td>';
$Moon_moon_arrtot[$i] = $Moon_moon_arr[($moon_ii-1)][$moon_xy];
$moon_xy = $moon_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Mars</td> -->

<?php
$mar_ii = $tmp_Rasi_Mar;
$mar_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t1mar[$i] = $Mar_moon_arr[($mar_ii-1)][$mar_xy];	
// echo '<td>' . $Mar_moon_arr[($mar_ii-1)][$mar_xy] . '</td>';
$Mar_moon_arrtot[$i] = $Mar_moon_arr[($mar_ii-1)][$mar_xy];
$mar_xy = $mar_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Mercury</td> -->

<?php
$mer_ii = $tmp_Rasi_Mer;
$mer_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t1mer[$i] = $Mer_moon_arr[($mer_ii-1)][$mer_xy];	
// echo '<td>' . $Mer_moon_arr[($mer_ii-1)][$mer_xy] . '</td>';
$Mer_moon_arrtot[$i] = $Mer_moon_arr[($mer_ii-1)][$mer_xy];
$mer_xy = $mer_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Jupiter</td> -->

<?php
$jup_ii = $tmp_Rasi_Jup;
$jup_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t1jup[$i] = $Jup_moon_arr[($jup_ii-1)][$jup_xy];	
// echo '<td>' . $Jup_moon_arr[($jup_ii-1)][$jup_xy] . '</td>';
$Jup_moon_arrtot[$i] = $Jup_moon_arr[($jup_ii-1)][$jup_xy];
$jup_xy = $jup_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Venus</td> -->

<?php
$ven_ii = $tmp_Rasi_Ven;
$ven_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t1ven[$i] = $Ven_moon_arr[($ven_ii-1)][$ven_xy];	
// echo '<td>' . $Ven_moon_arr[($ven_ii-1)][$ven_xy] . '</td>';
$Ven_moon_arrtot[$i] = $Ven_moon_arr[($ven_ii-1)][$ven_xy];
$ven_xy = $ven_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Saturn</td> -->

<?php
$sat_ii = $tmp_Rasi_Sat;
$sat_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t1sat[$i] = $Sat_moon_arr[($sat_ii-1)][$sat_xy];	
// echo '<td>' . $Sat_moon_arr[($sat_ii-1)][$sat_xy] . '</td>';
$Sat_moon_arrtot[$i] = $Sat_moon_arr[($sat_ii-1)][$sat_xy];
$sat_xy = $sat_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Lagna</td> -->

<?php
$lag_ii = $tmp_Rasi_Asc;
$lag_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t1lag[$i] = $Lag_moon_arr[($lag_ii-1)][$lag_xy];	
// echo '<td>' . $Lag_moon_arr[($lag_ii-1)][$lag_xy] . '</td>';
$Lag_moon_arrtot[$i] = $Lag_moon_arr[($lag_ii-1)][$lag_xy];
$lag_xy = $lag_xy + 1;

}
// echo '</tr>';
?>


<!-- <tr>
<td><strong>Total :</strong></td> -->
<?php


For ($i=1; $i<13; $i++)
{
	$tmp_tot1moon[$i] = $Sun_moon_arrtot[$i] + $Moon_moon_arrtot[$i] + $Mar_moon_arrtot[$i] + $Mer_moon_arrtot[$i] + $Jup_moon_arrtot[$i] + $Ven_moon_arrtot[$i] + $Sat_moon_arrtot[$i] + $Lag_moon_arrtot[$i];

	$total_moon[$i] = $Sun_moon_arrtot[$i] + $Moon_moon_arrtot[$i] + $Mar_moon_arrtot[$i] + $Mer_moon_arrtot[$i] + $Jup_moon_arrtot[$i] + $Ven_moon_arrtot[$i] + $Sat_moon_arrtot[$i] + $Lag_moon_arrtot[$i];
	
	// echo '<td>' . '<strong>' . $total_moon[$i] . '</strong>' . '</td>';
}
// echo '</tr>';

?>
<!--
</table>


<br>
<br>

<table class="b">
<tr align="center">
-->
<?php
/*
If ($tmp_Rasi_Moon == 12)
{
	echo '<td bgcolor="#008000">' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[11] . '</td><td colspan="2" rowspan="2">Moon</td><td>' . $total_moon[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	// echo '</tr>';

}

If ($tmp_Rasi_Moon == 1)
{
	// echo '<td>' . $total_moon[12] . '</td><td bgcolor="#008000">' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[11] . '</td><td colspan="2" rowspan="2">Moon</td><td>' . $total_moon[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Moon == 2)
{
	// echo '<td>' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td bgcolor="#008000">' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[11] . '</td><td colspan="2" rowspan="2">Moon</td><td>' . $total_moon[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Moon == 3)
{
	// echo '<td>' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td bgcolor="#008000">' . $total_moon[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[11] . '</td><td colspan="2" rowspan="2">Moon</td><td>' . $total_moon[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Moon == 11)
{
	// echo '<td>' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#008000">' . $total_moon[11] . '</td><td colspan="2" rowspan="2">Moon</td><td>' . $total_moon[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Moon == 4)
{
	// echo '<td>' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[11] . '</td><td colspan="2" rowspan="2">Moon</td><td bgcolor="#008000">' . $total_moon[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Moon == 10)
{
	// echo '<td>' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[11] . '</td><td colspan="2" rowspan="2">Moon</td><td>' . $total_moon[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#008000">' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Moon == 5)
{
	// echo '<td>' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[11] . '</td><td colspan="2" rowspan="2">Moon</td><td>' . $total_moon[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[10] . '</td><td bgcolor="#008000">' . $total_moon[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Moon == 9)
{
	// echo '<td>' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[11] . '</td><td colspan="2" rowspan="2">Moon</td><td>' . $total_moon[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	echo '<td bgcolor="#008000">' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Moon == 8)
{
	// echo '<td>' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[11] . '</td><td colspan="2" rowspan="2">Moon</td><td>' . $total_moon[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_moon[9] . '</td><td bgcolor="#008000">' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Moon == 7)
{
	// echo '<td>' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[11] . '</td><td colspan="2" rowspan="2">Moon</td><td>' . $total_moon[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td bgcolor="#008000">' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Moon == 6)
{
	// echo '<td>' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[11] . '</td><td colspan="2" rowspan="2">Moon</td><td>' . $total_moon[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td bgcolor="#008000">' . $total_moon[6] . '</td>';

	// echo '</tr>';
}
*/
?>
<!--
</table>
<br>
<br>

-->


<!-- Matrices for Ashtakavarga Moon Ends -->


<!-- Matrices for Ashtakavarga Mars Starts -->

<?php
$Sun_mar_arr = array
	(
	array(0,0,1,0,1,1,0,0,0,1,1,0),
array(0,0,0,1,0,1,1,0,0,0,1,1),
array(1,0,0,0,1,0,1,1,0,0,0,1),
array(1,1,0,0,0,1,0,1,1,0,0,0),
array(0,1,1,0,0,0,1,0,1,1,0,0),
array(0,0,1,1,0,0,0,1,0,1,1,0),
array(0,0,0,1,1,0,0,0,1,0,1,1),
array(1,0,0,0,1,1,0,0,0,1,0,1),
array(1,1,0,0,0,1,1,0,0,0,1,0),
array(0,1,1,0,0,0,1,1,0,0,0,1),
array(1,0,1,1,0,0,0,1,1,0,0,0),
array(0,1,0,1,1,0,0,0,1,1,0,0)	);

$Moon_mar_arr = array
	(
	array(0,0,1,0,0,1,0,0,0,0,1,0),
array(0,0,0,1,0,0,1,0,0,0,0,1),
array(1,0,0,0,1,0,0,1,0,0,0,0),
array(0,1,0,0,0,1,0,0,1,0,0,0),
array(0,0,1,0,0,0,1,0,0,1,0,0),
array(0,0,0,1,0,0,0,1,0,0,1,0),
array(0,0,0,0,1,0,0,0,1,0,0,1),
array(1,0,0,0,0,1,0,0,0,1,0,0),
array(0,1,0,0,0,0,1,0,0,0,1,0),
array(0,0,1,0,0,0,0,1,0,0,0,1),
array(1,0,0,1,0,0,0,0,1,0,0,0),
array(0,1,0,0,1,0,0,0,0,1,0,0)

	);


$Mar_mar_arr = array
	(
	array(1,1,0,1,0,0,1,1,0,1,1,0),
array(0,1,1,0,1,0,0,1,1,0,1,1),
array(1,0,1,1,0,1,0,0,1,1,0,1),
array(1,1,0,1,1,0,1,0,0,1,1,0),
array(0,1,1,0,1,1,0,1,0,0,1,1),
array(1,0,1,1,0,1,1,0,1,0,0,1),
array(1,1,0,1,1,0,1,1,0,1,0,0),
array(0,1,1,0,1,1,0,1,1,0,1,0),
array(0,0,1,1,0,1,1,0,1,1,0,1),
array(1,0,0,1,1,0,1,1,0,1,1,0),
array(0,1,0,0,1,1,0,1,1,0,1,1),
array(1,0,1,0,0,1,1,0,1,1,0,1)

	);

$Mer_mar_arr = array 
	(
	array(0,0,1,0,1,1,0,0,0,0,1,0),
array(0,0,0,1,0,1,1,0,0,0,0,1),
array(1,0,0,0,1,0,1,1,0,0,0,0),
array(0,1,0,0,0,1,0,1,1,0,0,0),
array(0,0,1,0,0,0,1,0,1,1,0,0),
array(0,0,0,1,0,0,0,1,0,1,1,0),
array(0,0,0,0,1,0,0,0,1,0,1,1),
array(1,0,0,0,0,1,0,0,0,1,0,1),
array(1,1,0,0,0,0,1,0,0,0,1,0),
array(0,1,1,0,0,0,0,1,0,0,0,1),
array(1,0,1,1,0,0,0,0,1,0,0,0),
array(0,1,0,1,1,0,0,0,0,1,0,0)
	);

$Jup_mar_arr = array 
	(
	array(0,0,0,0,0,1,0,0,0,1,1,1),
array(1,0,0,0,0,0,1,0,0,0,1,1),
array(1,1,0,0,0,0,0,1,0,0,0,1),
array(1,1,1,0,0,0,0,0,1,0,0,0),
array(0,1,1,1,0,0,0,0,0,1,0,0),
array(0,0,1,1,1,0,0,0,0,0,1,0),
array(0,0,0,1,1,1,0,0,0,0,0,1),
array(1,0,0,0,1,1,1,0,0,0,0,0),
array(0,1,0,0,0,1,1,1,0,0,0,0),
array(0,0,1,0,0,0,1,1,1,0,0,0),
array(0,0,0,1,0,0,0,1,1,1,0,0),
array(0,0,0,0,1,0,0,0,1,1,1,0)

	);

$Ven_mar_arr = array 
	(
	array(0,0,0,0,0,1,0,1,0,0,1,1),
array(1,0,0,0,0,0,1,0,1,0,0,1),
array(1,1,0,0,0,0,0,1,0,1,0,0),
array(0,1,1,0,0,0,0,0,1,0,1,0),
array(0,0,1,1,0,0,0,0,0,1,0,1),
array(1,0,0,1,1,0,0,0,0,0,1,0),
array(0,1,0,0,1,1,0,0,0,0,0,1),
array(1,0,1,0,0,1,1,0,0,0,0,0),
array(0,1,0,1,0,0,1,1,0,0,0,0),
array(0,0,1,0,1,0,0,1,1,0,0,0),
array(0,0,0,1,0,1,0,0,1,1,0,0),
array(0,0,0,0,1,0,1,0,0,1,1,0)
	);

$Sat_mar_arr = array 
	(
	array(1,0,0,1,0,0,1,1,1,1,1,0),
array(0,1,0,0,1,0,0,1,1,1,1,1),
array(1,0,1,0,0,1,0,0,1,1,1,1),
array(1,1,0,1,0,0,1,0,0,1,1,1),
array(1,1,1,0,1,0,0,1,0,0,1,1),
array(1,1,1,1,0,1,0,0,1,0,0,1),
array(1,1,1,1,1,0,1,0,0,1,0,0),
array(0,1,1,1,1,1,0,1,0,0,1,0),
array(0,0,1,1,1,1,1,0,1,0,0,1),
array(1,0,0,1,1,1,1,1,0,1,0,0),
array(0,1,0,0,1,1,1,1,1,0,1,0),
array(0,0,1,0,0,1,1,1,1,1,0,1)
	);

$Lag_mar_arr = array 
	(
	array(1,0,1,0,0,1,0,0,0,1,1,0),
array(0,1,0,1,0,0,1,0,0,0,1,1),
array(1,0,1,0,1,0,0,1,0,0,0,1),
array(1,1,0,1,0,1,0,0,1,0,0,0),
array(0,1,1,0,1,0,1,0,0,1,0,0),
array(0,0,1,1,0,1,0,1,0,0,1,0),
array(0,0,0,1,1,0,1,0,1,0,0,1),
array(1,0,0,0,1,1,0,1,0,1,0,0),
array(0,1,0,0,0,1,1,0,1,0,1,0),
array(0,0,1,0,0,0,1,1,0,1,0,1),
array(1,0,0,1,0,0,0,1,1,0,1,0),
array(0,1,0,0,1,0,0,0,1,1,0,1)

	);
?>

<!-- 
<table>
<tr>
<td colspan="13">Prastara Ashtakavarga for Mars Matrices </td>
</tr>
<tr>
<td>Planets/Rasi No.</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td>
</tr>

<tr>

<td>Sun</td> -->

<?php
$rows = 1;
$cols = 12;

$sun_ii = $tmp_Rasi_Sun;
$sun_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t2sun[$i] = $Sun_mar_arr[($sun_ii-1)][$sun_xy];	
// echo '<td>' . $Sun_mar_arr[($sun_ii-1)][$sun_xy] . '</td>';
$Sun_mar_arrtot[$i] = $Sun_mar_arr[($sun_ii-1)][$sun_xy];
$sun_xy = $sun_xy + 1;


}
// echo '</tr>';
?>

<!-- <tr>
<td>Moon</td> -->

<?php
$moon_ii = $tmp_Rasi_Moon;
$moon_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t2moon[$i] = $Moon_mar_arr[($moon_ii-1)][$moon_xy];	
// echo '<td>' . $Moon_mar_arr[($moon_ii-1)][$moon_xy] . '</td>';
$Moon_mar_arrtot[$i] = $Moon_mar_arr[($moon_ii-1)][$moon_xy];
$moon_xy = $moon_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Mars</td> -->

<?php
$mar_ii = $tmp_Rasi_Mar;
$mar_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t2mar[$i] = $Mar_mar_arr[($mar_ii-1)][$mar_xy];	
// echo '<td>' . $Mar_mar_arr[($mar_ii-1)][$mar_xy] . '</td>';
$Mar_mar_arrtot[$i] = $Mar_mar_arr[($mar_ii-1)][$mar_xy];
$mar_xy = $mar_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Mercury</td> -->

<?php
$mer_ii = $tmp_Rasi_Mer;
$mer_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t2mer[$i] = $Mer_mar_arr[($mer_ii-1)][$mer_xy];	
// echo '<td>' . $Mer_mar_arr[($mer_ii-1)][$mer_xy] . '</td>';
$Mer_mar_arrtot[$i] = $Mer_mar_arr[($mer_ii-1)][$mer_xy];
$mer_xy = $mer_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Jupiter</td> -->

<?php
$jup_ii = $tmp_Rasi_Jup;
$jup_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t2jup[$i] = $Jup_mar_arr[($jup_ii-1)][$jup_xy];	
// echo '<td>' . $Jup_mar_arr[($jup_ii-1)][$jup_xy] . '</td>';
$Jup_mar_arrtot[$i] = $Jup_mar_arr[($jup_ii-1)][$jup_xy];
$jup_xy = $jup_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Venus</td> -->

<?php
$ven_ii = $tmp_Rasi_Ven;
$ven_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t2ven[$i] = $Ven_mar_arr[($ven_ii-1)][$ven_xy];	
// echo '<td>' . $Ven_mar_arr[($ven_ii-1)][$ven_xy] . '</td>';
$Ven_mar_arrtot[$i] = $Ven_mar_arr[($ven_ii-1)][$ven_xy];
$ven_xy = $ven_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Saturn</td> -->

<?php
$sat_ii = $tmp_Rasi_Sat;
$sat_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t2sat[$i] = $Sat_mar_arr[($sat_ii-1)][$sat_xy];	
// echo '<td>' . $Sat_mar_arr[($sat_ii-1)][$sat_xy] . '</td>';
$Sat_mar_arrtot[$i] = $Sat_mar_arr[($sat_ii-1)][$sat_xy];
$sat_xy = $sat_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Lagna</td> -->

<?php
$lag_ii = $tmp_Rasi_Asc;
$lag_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t2lag[$i] = $Lag_mar_arr[($lag_ii-1)][$lag_xy];	
// echo '<td>' . $Lag_mar_arr[($lag_ii-1)][$lag_xy] . '</td>';
$Lag_mar_arrtot[$i] = $Lag_mar_arr[($lag_ii-1)][$lag_xy];
$lag_xy = $lag_xy + 1;

}
// echo '</tr>';
?>


<!-- <tr>
<td><strong>Total :</strong></td> -->
<?php


For ($i=1; $i<13; $i++)
{
	$tmp_tot2mar[$i] = $Sun_mar_arrtot[$i] + $Moon_mar_arrtot[$i] + $Mar_mar_arrtot[$i] + $Mer_mar_arrtot[$i] + $Jup_mar_arrtot[$i] + $Ven_mar_arrtot[$i] + $Sat_mar_arrtot[$i] + $Lag_mar_arrtot[$i];

	$total_mar[$i] = $Sun_mar_arrtot[$i] + $Moon_mar_arrtot[$i] + $Mar_mar_arrtot[$i] + $Mer_mar_arrtot[$i] + $Jup_mar_arrtot[$i] + $Ven_mar_arrtot[$i] + $Sat_mar_arrtot[$i] + $Lag_mar_arrtot[$i];
	
	// echo '<td>' . '<strong>' . $total_mar[$i] . '</strong>' . '</td>';
}
// echo '</tr>';

?>
<!--
</table>


<br>
<br>
<table class="b">
<tr align="center">
-->
<?php
/*
If ($tmp_Rasi_Mar == 12)
{
	echo '<td bgcolor="#008000">' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[11] . '</td><td colspan="2" rowspan="2">Mar</td><td>' . $total_mar[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	// echo '</tr>';

}

If ($tmp_Rasi_Mar == 1)
{
	// echo '<td>' . $total_mar[12] . '</td><td bgcolor="#008000">' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[11] . '</td><td colspan="2" rowspan="2">Mar</td><td>' . $total_mar[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Mar == 2)
{
	// echo '<td>' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td bgcolor="#008000">' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[11] . '</td><td colspan="2" rowspan="2">Mar</td><td>' . $total_mar[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Mar == 3)
{
	// echo '<td>' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td bgcolor="#008000">' . $total_mar[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[11] . '</td><td colspan="2" rowspan="2">Mar</td><td>' . $total_mar[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Mar == 11)
{
	// echo '<td>' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#008000">' . $total_mar[11] . '</td><td colspan="2" rowspan="2">Mar</td><td>' . $total_mar[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Mar == 4)
{
	// echo '<td>' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[11] . '</td><td colspan="2" rowspan="2">Mar</td><td bgcolor="#008000">' . $total_mar[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Mar == 10)
{
	// echo '<td>' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[11] . '</td><td colspan="2" rowspan="2">Mar</td><td>' . $total_mar[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#008000">' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Mar == 5)
{
	// echo '<td>' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[11] . '</td><td colspan="2" rowspan="2">Mar</td><td>' . $total_mar[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[10] . '</td><td bgcolor="#008000">' . $total_mar[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Mar == 9)
{
	// echo '<td>' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[11] . '</td><td colspan="2" rowspan="2">Mar</td><td>' . $total_mar[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	echo '<td bgcolor="#008000">' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Mar == 8)
{
	// echo '<td>' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[11] . '</td><td colspan="2" rowspan="2">Mar</td><td>' . $total_mar[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mar[9] . '</td><td bgcolor="#008000">' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Mar == 7)
{
	// echo '<td>' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[11] . '</td><td colspan="2" rowspan="2">Mar</td><td>' . $total_mar[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td bgcolor="#008000">' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Mar == 6)
{
	// echo '<td>' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[11] . '</td><td colspan="2" rowspan="2">Mar</td><td>' . $total_mar[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td bgcolor="#008000">' . $total_mar[6] . '</td>';

	// echo '</tr>';
}
*/
?>

<!--
</table>
<br>
<br>

-->


<!-- Matrices for Ashtakavarga Mars Ends -->


<!-- Matrices for Ashtakavarga Mercury Starts -->

<?php
$Sun_mer_arr = array
	(
	array(0,0,0,0,1,1,0,0,1,0,1,1),
	array(1,0,0,0,0,1,1,0,0,1,0,1),
	array(1,1,0,0,0,0,1,1,0,0,1,0),
	array(0,1,1,0,0,0,0,1,1,0,0,1),
	array(1,0,1,1,0,0,0,0,1,1,0,0),
	array(0,1,0,1,1,0,0,0,0,1,1,0),
	array(0,0,1,0,1,1,0,0,0,0,1,1),
	array(1,0,0,1,0,1,1,0,0,0,0,1),
	array(1,1,0,0,1,0,1,1,0,0,0,0),
	array(0,1,1,0,0,1,0,1,1,0,0,0),
	array(0,0,1,1,0,0,1,0,1,1,0,0),
	array(0,0,0,1,1,0,0,1,0,1,1,0)

	);

$Moon_mer_arr = array
	(
	array(0,1,0,1,0,1,0,1,0,1,1,0),
	array(0,0,1,0,1,0,1,0,1,0,1,1),
	array(1,0,0,1,0,1,0,1,0,1,0,1),
	array(1,1,0,0,1,0,1,0,1,0,1,0),
	array(0,1,1,0,0,1,0,1,0,1,0,1),
	array(1,0,1,1,0,0,1,0,1,0,1,0),
	array(0,1,0,1,1,0,0,1,0,1,0,1),
	array(1,0,1,0,1,1,0,0,1,0,1,0),
	array(0,1,0,1,0,1,1,0,0,1,0,1),
	array(1,0,1,0,1,0,1,1,0,0,1,0),
	array(0,1,0,1,0,1,0,1,1,0,0,1),
	array(1,0,1,0,1,0,1,0,1,1,0,0)


	);


$Mar_mer_arr = array
	(
	array(1,1,0,1,0,0,1,1,1,1,1,0),
	array(0,1,1,0,1,0,0,1,1,1,1,1),
	array(1,0,1,1,0,1,0,0,1,1,1,1),
	array(1,1,0,1,1,0,1,0,0,1,1,1),
	array(1,1,1,0,1,1,0,1,0,0,1,1),
	array(1,1,1,1,0,1,1,0,1,0,0,1),
	array(1,1,1,1,1,0,1,1,0,1,0,0),
	array(0,1,1,1,1,1,0,1,1,0,1,0),
	array(0,0,1,1,1,1,1,0,1,1,0,1),
	array(1,0,0,1,1,1,1,1,0,1,1,0),
	array(0,1,0,0,1,1,1,1,1,0,1,1),
	array(1,0,1,0,0,1,1,1,1,1,0,1)


	);

$Mer_mer_arr = array 
	(
	array(1,0,1,0,1,1,0,0,1,1,1,1),
	array(1,1,0,1,0,1,1,0,0,1,1,1),
	array(1,1,1,0,1,0,1,1,0,0,1,1),
	array(1,1,1,1,0,1,0,1,1,0,0,1),
	array(1,1,1,1,1,0,1,0,1,1,0,0),
	array(0,1,1,1,1,1,0,1,0,1,1,0),
	array(0,0,1,1,1,1,1,0,1,0,1,1),
	array(1,0,0,1,1,1,1,1,0,1,0,1),
	array(1,1,0,0,1,1,1,1,1,0,1,0),
	array(0,1,1,0,0,1,1,1,1,1,0,1),
	array(1,0,1,1,0,0,1,1,1,1,1,0),
	array(0,1,0,1,1,0,0,1,1,1,1,1)

	);

$Jup_mer_arr = array 
	(
	array(0,0,0,0,0,1,0,1,0,0,1,1),
	array(1,0,0,0,0,0,1,0,1,0,0,1),
	array(1,1,0,0,0,0,0,1,0,1,0,0),
	array(0,1,1,0,0,0,0,0,1,0,1,0),
	array(0,0,1,1,0,0,0,0,0,1,0,1),
	array(1,0,0,1,1,0,0,0,0,0,1,0),
	array(0,1,0,0,1,1,0,0,0,0,0,1),
	array(1,0,1,0,0,1,1,0,0,0,0,0),
	array(0,1,0,1,0,0,1,1,0,0,0,0),
	array(0,0,1,0,1,0,0,1,1,0,0,0),
	array(0,0,0,1,0,1,0,0,1,1,0,0),
	array(0,0,0,0,1,0,1,0,0,1,1,0)


	);

$Ven_mer_arr = array 
	(
	array(1,1,1,1,1,0,0,1,1,0,1,0),
	array(0,1,1,1,1,1,0,0,1,1,0,1),
	array(1,0,1,1,1,1,1,0,0,1,1,0),
	array(0,1,0,1,1,1,1,1,0,0,1,1),
	array(1,0,1,0,1,1,1,1,1,0,0,1),
	array(1,1,0,1,0,1,1,1,1,1,0,0),
	array(0,1,1,0,1,0,1,1,1,1,1,0),
	array(0,0,1,1,0,1,0,1,1,1,1,1),
	array(1,0,0,1,1,0,1,0,1,1,1,1),
	array(1,1,0,0,1,1,0,1,0,1,1,1),
	array(1,1,1,0,0,1,1,0,1,0,1,1),
	array(1,1,1,1,0,0,1,1,0,1,0,1)

	);

$Sat_mer_arr = array 
	(
	array(1,1,0,1,0,0,1,1,1,1,1,0),
	array(0,1,1,0,1,0,0,1,1,1,1,1),
	array(1,0,1,1,0,1,0,0,1,1,1,1),
	array(1,1,0,1,1,0,1,0,0,1,1,1),
	array(1,1,1,0,1,1,0,1,0,0,1,1),
	array(1,1,1,1,0,1,1,0,1,0,0,1),
	array(1,1,1,1,1,0,1,1,0,1,0,0),
	array(0,1,1,1,1,1,0,1,1,0,1,0),
	array(0,0,1,1,1,1,1,0,1,1,0,1),
	array(1,0,0,1,1,1,1,1,0,1,1,0),
	array(0,1,0,0,1,1,1,1,1,0,1,1),
	array(1,0,1,0,0,1,1,1,1,1,0,1)

	);

$Lag_mer_arr = array 
	(
	array(1,1,0,1,0,1,0,1,0,1,1,0),
	array(0,1,1,0,1,0,1,0,1,0,1,1),
	array(1,0,1,1,0,1,0,1,0,1,0,1),
	array(1,1,0,1,1,0,1,0,1,0,1,0),
	array(0,1,1,0,1,1,0,1,0,1,0,1),
	array(1,0,1,1,0,1,1,0,1,0,1,0),
	array(0,1,0,1,1,0,1,1,0,1,0,1),
	array(1,0,1,0,1,1,0,1,1,0,1,0),
	array(0,1,0,1,0,1,1,0,1,1,0,1),
	array(1,0,1,0,1,0,1,1,0,1,1,0),
	array(0,1,0,1,0,1,0,1,1,0,1,1),
	array(1,0,1,0,1,0,1,0,1,1,0,1)


	);
?>

<!-- 
<table>
<tr>
<td colspan="13">Prastara Ashtakavarga for Mercury Matrices </td>
</tr>
<tr>
<td>Planets/Rasi No.</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td>
</tr>

<tr>

<td>Sun</td> -->

<?php
$rows = 1;
$cols = 12;

$sun_ii = $tmp_Rasi_Sun;
$sun_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t3sun[$i] = $Sun_mer_arr[($sun_ii-1)][$sun_xy];	
// echo '<td>' . $Sun_mer_arr[($sun_ii-1)][$sun_xy] . '</td>';
$Sun_mer_arrtot[$i] = $Sun_mer_arr[($sun_ii-1)][$sun_xy];
$sun_xy = $sun_xy + 1;


}
// echo '</tr>';
?>

<!-- <tr>
<td>Moon</td> -->

<?php
$moon_ii = $tmp_Rasi_Moon;
$moon_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t3moon[$i] = $Moon_mer_arr[($moon_ii-1)][$moon_xy];	
// echo '<td>' . $Moon_mer_arr[($moon_ii-1)][$moon_xy] . '</td>';
$Moon_mer_arrtot[$i] = $Moon_mer_arr[($moon_ii-1)][$moon_xy];
$moon_xy = $moon_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Mars</td> -->

<?php
$mar_ii = $tmp_Rasi_Mar;
$mar_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t3mar[$i] = $Mar_mer_arr[($mar_ii-1)][$mar_xy];	
// echo '<td>' . $Mar_mer_arr[($mar_ii-1)][$mar_xy] . '</td>';
$Mar_mer_arrtot[$i] = $Mar_mer_arr[($mar_ii-1)][$mar_xy];
$mar_xy = $mar_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Mercury</td> -->

<?php
$mer_ii = $tmp_Rasi_Mer;
$mer_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t3mer[$i] = $Mer_mer_arr[($mer_ii-1)][$mer_xy];	
// echo '<td>' . $Mer_mer_arr[($mer_ii-1)][$mer_xy] . '</td>';
$Mer_mer_arrtot[$i] = $Mer_mer_arr[($mer_ii-1)][$mer_xy];
$mer_xy = $mer_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Jupiter</td> -->

<?php
$jup_ii = $tmp_Rasi_Jup;
$jup_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t3jup[$i] = $Jup_mer_arr[($jup_ii-1)][$jup_xy];	
// echo '<td>' . $Jup_mer_arr[($jup_ii-1)][$jup_xy] . '</td>';
$Jup_mer_arrtot[$i] = $Jup_mer_arr[($jup_ii-1)][$jup_xy];
$jup_xy = $jup_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Venus</td> -->

<?php
$ven_ii = $tmp_Rasi_Ven;
$ven_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t3ven[$i] = $Ven_mer_arr[($ven_ii-1)][$ven_xy];	
// echo '<td>' . $Ven_mer_arr[($ven_ii-1)][$ven_xy] . '</td>';
$Ven_mer_arrtot[$i] = $Ven_mer_arr[($ven_ii-1)][$ven_xy];
$ven_xy = $ven_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Saturn</td> -->

<?php
$sat_ii = $tmp_Rasi_Sat;
$sat_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t3sat[$i] = $Sat_mer_arr[($sat_ii-1)][$sat_xy];	
// echo '<td>' . $Sat_mer_arr[($sat_ii-1)][$sat_xy] . '</td>';
$Sat_mer_arrtot[$i] = $Sat_mer_arr[($sat_ii-1)][$sat_xy];
$sat_xy = $sat_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Lagna</td> -->

<?php
$lag_ii = $tmp_Rasi_Asc;
$lag_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t3lag[$i] = $Lag_mer_arr[($lag_ii-1)][$lag_xy];	
// echo '<td>' . $Lag_mer_arr[($lag_ii-1)][$lag_xy] . '</td>';
$Lag_mer_arrtot[$i] = $Lag_mer_arr[($lag_ii-1)][$lag_xy];
$lag_xy = $lag_xy + 1;

}
// echo '</tr>';
?>


<!-- <tr>
<td><strong>Total :</strong></td> -->
<?php


For ($i=1; $i<13; $i++)
{
	$tmp_tot3mer[$i] = $Sun_mer_arrtot[$i] + $Moon_mer_arrtot[$i] + $Mar_mer_arrtot[$i] + $Mer_mer_arrtot[$i] + $Jup_mer_arrtot[$i] + $Ven_mer_arrtot[$i] + $Sat_mer_arrtot[$i] + $Lag_mer_arrtot[$i];

	$total_mer[$i] = $Sun_mer_arrtot[$i] + $Moon_mer_arrtot[$i] + $Mar_mer_arrtot[$i] + $Mer_mer_arrtot[$i] + $Jup_mer_arrtot[$i] + $Ven_mer_arrtot[$i] + $Sat_mer_arrtot[$i] + $Lag_mer_arrtot[$i];
	
	// echo '<td>' . '<strong>' . $total_mer[$i] . '</strong>' . '</td>';
}
// echo '</tr>';

?>
<!--
</table>


<br>
<br>
<table class="b">
<tr align="center">
-->
<?php
/*
If ($tmp_Rasi_Mer == 12)
{
	echo '<td bgcolor="#008000">' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[11] . '</td><td colspan="2" rowspan="2">Mer</td><td>' . $total_mer[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	// echo '</tr>';

}

If ($tmp_Rasi_Mer == 1)
{
	// echo '<td>' . $total_mer[12] . '</td><td bgcolor="#008000">' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[11] . '</td><td colspan="2" rowspan="2">Mer</td><td>' . $total_mer[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Mer == 2)
{
	// echo '<td>' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td bgcolor="#008000">' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[11] . '</td><td colspan="2" rowspan="2">Mer</td><td>' . $total_mer[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Mer == 3)
{
	// echo '<td>' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td bgcolor="#008000">' . $total_mer[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[11] . '</td><td colspan="2" rowspan="2">Mer</td><td>' . $total_mer[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Mer == 11)
{
	// echo '<td>' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#008000">' . $total_mer[11] . '</td><td colspan="2" rowspan="2">Mer</td><td>' . $total_mer[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Mer == 4)
{
	// echo '<td>' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[11] . '</td><td colspan="2" rowspan="2">Mer</td><td bgcolor="#008000">' . $total_mer[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Mer == 10)
{
	// echo '<td>' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[11] . '</td><td colspan="2" rowspan="2">Mer</td><td>' . $total_mer[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#008000">' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Mer == 5)
{
	// echo '<td>' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[11] . '</td><td colspan="2" rowspan="2">Mer</td><td>' . $total_mer[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[10] . '</td><td bgcolor="#008000">' . $total_mer[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Mer == 9)
{
	// echo '<td>' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[11] . '</td><td colspan="2" rowspan="2">Mer</td><td>' . $total_mer[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	echo '<td bgcolor="#008000">' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Mer == 8)
{
	// echo '<td>' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[11] . '</td><td colspan="2" rowspan="2">Mer</td><td>' . $total_mer[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mer[9] . '</td><td bgcolor="#008000">' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Mer == 7)
{
	// echo '<td>' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[11] . '</td><td colspan="2" rowspan="2">Mer</td><td>' . $total_mer[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td bgcolor="#008000">' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Mer == 6)
{
	// echo '<td>' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[11] . '</td><td colspan="2" rowspan="2">Mer</td><td>' . $total_mer[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td bgcolor="#008000">' . $total_mer[6] . '</td>';

	// echo '</tr>';
}
*/
?>

<!--
</table>
<br>
<br>
-->



<!-- Matrices for Ashtakavarga Mercury Ends -->

<!-- Matrices for Ashtakavarga Jupiter Starts -->

<?php
$Sun_jup_arr = array
	(
array(1,1,1,1,0,0,1,1,1,1,1,0),
array(0,1,1,1,1,0,0,1,1,1,1,1),
array(1,0,1,1,1,1,0,0,1,1,1,1),
array(1,1,0,1,1,1,1,0,0,1,1,1),
array(1,1,1,0,1,1,1,1,0,0,1,1),
array(1,1,1,1,0,1,1,1,1,0,0,1),
array(1,1,1,1,1,0,1,1,1,1,0,0),
array(0,1,1,1,1,1,0,1,1,1,1,0),
array(0,0,1,1,1,1,1,0,1,1,1,1),
array(1,0,0,1,1,1,1,1,0,1,1,1),
array(1,1,0,0,1,1,1,1,1,0,1,1),
array(1,1,1,0,0,1,1,1,1,1,0,1)
	);

$Moon_jup_arr = array
	(
array(0,1,0,0,1,0,1,0,1,0,1,0),
array(0,0,1,0,0,1,0,1,0,1,0,1),
array(1,0,0,1,0,0,1,0,1,0,1,0),
array(0,1,0,0,1,0,0,1,0,1,0,1),
array(1,0,1,0,0,1,0,0,1,0,1,0),
array(0,1,0,1,0,0,1,0,0,1,0,1),
array(1,0,1,0,1,0,0,1,0,0,1,0),
array(0,1,0,1,0,1,0,0,1,0,0,1),
array(1,0,1,0,1,0,1,0,0,1,0,0),
array(0,1,0,1,0,1,0,1,0,0,1,0),
array(0,0,1,0,1,0,1,0,1,0,0,1),
array(1,0,0,1,0,1,0,1,0,1,0,0)


	);


$Mar_jup_arr = array
	(
array(1,1,0,1,0,0,1,1,0,1,1,0),
array(0,1,1,0,1,0,0,1,1,0,1,1),
array(1,0,1,1,0,1,0,0,1,1,0,1),
array(1,1,0,1,1,0,1,0,0,1,1,0),
array(0,1,1,0,1,1,0,1,0,0,1,1),
array(1,0,1,1,0,1,1,0,1,0,0,1),
array(1,1,0,1,1,0,1,1,0,1,0,0),
array(0,1,1,0,1,1,0,1,1,0,1,0),
array(0,0,1,1,0,1,1,0,1,1,0,1),
array(1,0,0,1,1,0,1,1,0,1,1,0),
array(0,1,0,0,1,1,0,1,1,0,1,1),
array(1,0,1,0,0,1,1,0,1,1,0,1)


	);

$Mer_jup_arr = array 
	(
array(1,1,0,1,1,1,0,0,1,1,1,0),
array(0,1,1,0,1,1,1,0,0,1,1,1),
array(1,0,1,1,0,1,1,1,0,0,1,1),
array(1,1,0,1,1,0,1,1,1,0,0,1),
array(1,1,1,0,1,1,0,1,1,1,0,0),
array(0,1,1,1,0,1,1,0,1,1,1,0),
array(0,0,1,1,1,0,1,1,0,1,1,1),
array(1,0,0,1,1,1,0,1,1,0,1,1),
array(1,1,0,0,1,1,1,0,1,1,0,1),
array(1,1,1,0,0,1,1,1,0,1,1,0),
array(0,1,1,1,0,0,1,1,1,0,1,1),
array(1,0,1,1,1,0,0,1,1,1,0,1)

	);

$Jup_jup_arr = array 
	(
array(1,1,1,1,0,0,1,1,0,1,1,0),
array(0,1,1,1,1,0,0,1,1,0,1,1),
array(1,0,1,1,1,1,0,0,1,1,0,1),
array(1,1,0,1,1,1,1,0,0,1,1,0),
array(0,1,1,0,1,1,1,1,0,0,1,1),
array(1,0,1,1,0,1,1,1,1,0,0,1),
array(1,1,0,1,1,0,1,1,1,1,0,0),
array(0,1,1,0,1,1,0,1,1,1,1,0),
array(0,0,1,1,0,1,1,0,1,1,1,1),
array(1,0,0,1,1,0,1,1,0,1,1,1),
array(1,1,0,0,1,1,0,1,1,0,1,1),
array(1,1,1,0,0,1,1,0,1,1,0,1)


	);

$Ven_jup_arr = array 
	(
array(0,1,0,0,1,1,0,0,1,1,1,0),
array(0,0,1,0,0,1,1,0,0,1,1,1),
array(1,0,0,1,0,0,1,1,0,0,1,1),
array(1,1,0,0,1,0,0,1,1,0,0,1),
array(1,1,1,0,0,1,0,0,1,1,0,0),
array(0,1,1,1,0,0,1,0,0,1,1,0),
array(0,0,1,1,1,0,0,1,0,0,1,1),
array(1,0,0,1,1,1,0,0,1,0,0,1),
array(1,1,0,0,1,1,1,0,0,1,0,0),
array(0,1,1,0,0,1,1,1,0,0,1,0),
array(0,0,1,1,0,0,1,1,1,0,0,1),
array(1,0,0,1,1,0,0,1,1,1,0,0)

	);

$Sat_jup_arr = array 
	(
array(0,0,1,0,1,1,0,0,0,0,0,1),
array(1,0,0,1,0,1,1,0,0,0,0,0),
array(0,1,0,0,1,0,1,1,0,0,0,0),
array(0,0,1,0,0,1,0,1,1,0,0,0),
array(0,0,0,1,0,0,1,0,1,1,0,0),
array(0,0,0,0,1,0,0,1,0,1,1,0),
array(0,0,0,0,0,1,0,0,1,0,1,1),
array(1,0,0,0,0,0,1,0,0,1,0,1),
array(1,1,0,0,0,0,0,1,0,0,1,0),
array(0,1,1,0,0,0,0,0,1,0,0,1),
array(1,0,1,1,0,0,0,0,0,1,0,0),
array(0,1,0,1,1,0,0,0,0,0,1,0)

	);

$Lag_jup_arr = array 
	(
array(1,1,0,1,1,1,1,0,1,1,1,0),
array(0,1,1,0,1,1,1,1,0,1,1,1),
array(1,0,1,1,0,1,1,1,1,0,1,1),
array(1,1,0,1,1,0,1,1,1,1,0,1),
array(1,1,1,0,1,1,0,1,1,1,1,0),
array(0,1,1,1,0,1,1,0,1,1,1,1),
array(1,0,1,1,1,0,1,1,0,1,1,1),
array(1,1,0,1,1,1,0,1,1,0,1,1),
array(1,1,1,0,1,1,1,0,1,1,0,1),
array(1,1,1,1,0,1,1,1,0,1,1,0),
array(0,1,1,1,1,0,1,1,1,0,1,1),
array(1,0,1,1,1,1,0,1,1,1,0,1)


	);
?>

<!--
<table>
<tr>
<td colspan="13">Prastara Ashtakavarga for Jupiter Matrices </td>
</tr>
<tr>
<td>Planets/Rasi No.</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td>
</tr>

<tr>

<td>Sun</td> -->

<?php
$rows = 1;
$cols = 12;

$sun_ii = $tmp_Rasi_Sun;
$sun_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t4sun[$i] = $Sun_jup_arr[($sun_ii-1)][$sun_xy];	
// echo '<td>' . $Sun_jup_arr[($sun_ii-1)][$sun_xy] . '</td>';
$Sun_jup_arrtot[$i] = $Sun_jup_arr[($sun_ii-1)][$sun_xy];
$sun_xy = $sun_xy + 1;


}
// echo '</tr>';
?>

<!-- <tr>
<td>Moon</td> -->

<?php
$moon_ii = $tmp_Rasi_Moon;
$moon_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t4moon[$i] = $Moon_jup_arr[($moon_ii-1)][$moon_xy];	
// echo '<td>' . $Moon_jup_arr[($moon_ii-1)][$moon_xy] . '</td>';
$Moon_jup_arrtot[$i] = $Moon_jup_arr[($moon_ii-1)][$moon_xy];
$moon_xy = $moon_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Mars</td> -->

<?php
$mar_ii = $tmp_Rasi_Mar;
$mar_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t4mar[$i] = $Mar_jup_arr[($mar_ii-1)][$mar_xy];	
// echo '<td>' . $Mar_jup_arr[($mar_ii-1)][$mar_xy] . '</td>';
$Mar_jup_arrtot[$i] = $Mar_jup_arr[($mar_ii-1)][$mar_xy];
$mar_xy = $mar_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Mercury</td> -->

<?php
$mer_ii = $tmp_Rasi_Mer;
$mer_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t4mer[$i] = $Mer_jup_arr[($mer_ii-1)][$mer_xy];	
// echo '<td>' . $Mer_jup_arr[($mer_ii-1)][$mer_xy] . '</td>';
$Mer_jup_arrtot[$i] = $Mer_jup_arr[($mer_ii-1)][$mer_xy];
$mer_xy = $mer_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Jupiter</td> -->

<?php
$jup_ii = $tmp_Rasi_Jup;
$jup_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t4jup[$i] = $Jup_jup_arr[($jup_ii-1)][$jup_xy]; 	
// echo '<td>' . $Jup_jup_arr[($jup_ii-1)][$jup_xy] . '</td>';
$Jup_jup_arrtot[$i] = $Jup_jup_arr[($jup_ii-1)][$jup_xy];
$jup_xy = $jup_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Venus</td> -->

<?php
$ven_ii = $tmp_Rasi_Ven;
$ven_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t4ven[$i] = $Ven_jup_arr[($ven_ii-1)][$ven_xy];	
// echo '<td>' . $Ven_jup_arr[($ven_ii-1)][$ven_xy] . '</td>';
$Ven_jup_arrtot[$i] = $Ven_jup_arr[($ven_ii-1)][$ven_xy];
$ven_xy = $ven_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Saturn</td> -->

<?php
$sat_ii = $tmp_Rasi_Sat;
$sat_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t4sat[$i] = $Sat_jup_arr[($sat_ii-1)][$sat_xy];	
// echo '<td>' . $Sat_jup_arr[($sat_ii-1)][$sat_xy] . '</td>';
$Sat_jup_arrtot[$i] = $Sat_jup_arr[($sat_ii-1)][$sat_xy];
$sat_xy = $sat_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Lagna</td> -->

<?php
$lag_ii = $tmp_Rasi_Asc;
$lag_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t4lag[$i] = $Lag_jup_arr[($lag_ii-1)][$lag_xy];	
// echo '<td>' . $Lag_jup_arr[($lag_ii-1)][$lag_xy] . '</td>';
$Lag_jup_arrtot[$i] = $Lag_jup_arr[($lag_ii-1)][$lag_xy];
$lag_xy = $lag_xy + 1;

}
// echo '</tr>';
?>


<!-- <tr>
<td><strong>Total :</strong></td> -->
<?php


For ($i=1; $i<13; $i++)
{
	$tmp_tot4jup[$i] = $Sun_jup_arrtot[$i] + $Moon_jup_arrtot[$i] + $Mar_jup_arrtot[$i] + $Mer_jup_arrtot[$i] + $Jup_jup_arrtot[$i] + $Ven_jup_arrtot[$i] + $Sat_jup_arrtot[$i] + $Lag_jup_arrtot[$i];

	$total_jup[$i] = $Sun_jup_arrtot[$i] + $Moon_jup_arrtot[$i] + $Mar_jup_arrtot[$i] + $Mer_jup_arrtot[$i] + $Jup_jup_arrtot[$i] + $Ven_jup_arrtot[$i] + $Sat_jup_arrtot[$i] + $Lag_jup_arrtot[$i];
	
	// echo '<td>' . '<strong>' . $total_jup[$i] . '</strong>' . '</td>';
}
// echo '</tr>';

?>
<!--
</table>


<br>
<br>
<table class="b">
<tr align="center">
-->
<?php
/*
If ($tmp_Rasi_Jup == 12)
{
	echo '<td bgcolor="#008000">' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[11] . '</td><td colspan="2" rowspan="2">Jup</td><td>' . $total_jup[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	// echo '</tr>';

}

If ($tmp_Rasi_Jup == 1)
{
	// echo '<td>' . $total_jup[12] . '</td><td bgcolor="#008000">' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[11] . '</td><td colspan="2" rowspan="2">Jup</td><td>' . $total_jup[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Jup == 2)
{
	// echo '<td>' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td bgcolor="#008000">' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[11] . '</td><td colspan="2" rowspan="2">Jup</td><td>' . $total_jup[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Jup == 3)
{
	// echo '<td>' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td bgcolor="#008000">' . $total_jup[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[11] . '</td><td colspan="2" rowspan="2">Jup</td><td>' . $total_jup[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Jup == 11)
{
	// echo '<td>' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#008000">' . $total_jup[11] . '</td><td colspan="2" rowspan="2">Jup</td><td>' . $total_jup[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Jup == 4)
{
	// echo '<td>' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[11] . '</td><td colspan="2" rowspan="2">Jup</td><td bgcolor="#008000">' . $total_jup[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Jup == 10)
{
	// echo '<td>' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[11] . '</td><td colspan="2" rowspan="2">Jup</td><td>' . $total_jup[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#008000">' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Jup == 5)
{
	// echo '<td>' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[11] . '</td><td colspan="2" rowspan="2">Jup</td><td>' . $total_jup[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[10] . '</td><td bgcolor="#008000">' . $total_jup[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Jup == 9)
{
	// echo '<td>' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[11] . '</td><td colspan="2" rowspan="2">Jup</td><td>' . $total_jup[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	echo '<td bgcolor="#008000">' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Jup == 8)
{
	// echo '<td>' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[11] . '</td><td colspan="2" rowspan="2">Jup</td><td>' . $total_jup[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_jup[9] . '</td><td bgcolor="#008000">' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Jup == 7)
{
	// echo '<td>' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[11] . '</td><td colspan="2" rowspan="2">Jup</td><td>' . $total_jup[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td bgcolor="#008000">' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Jup == 6)
{
	// echo '<td>' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[11] . '</td><td colspan="2" rowspan="2">Jup</td><td>' . $total_jup[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td bgcolor="#008000">' . $total_jup[6] . '</td>';

	// echo '</tr>';
}
*/
?>

<!--
</table>
<br>
<br>

-->


<!-- Matrices for Ashtakavarga Jupiter Ends -->

<!-- Matrices for Ashtakavarga Venus Starts -->

<?php
$Sun_ven_arr = array
	(
array(0,0,0,0,0,0,0,1,0,0,1,1),
array(1,0,0,0,0,0,0,0,1,0,0,1),
array(1,1,0,0,0,0,0,0,0,1,0,0),
array(0,1,1,0,0,0,0,0,0,0,1,0),
array(0,0,1,1,0,0,0,0,0,0,0,1),
array(1,0,0,1,1,0,0,0,0,0,0,0),
array(0,1,0,0,1,1,0,0,0,0,0,0),
array(0,0,1,0,0,1,1,0,0,0,0,0),
array(0,0,0,1,0,0,1,1,0,0,0,0),
array(0,0,0,0,1,0,0,1,1,0,0,0),
array(0,0,0,0,0,1,0,0,1,1,0,0),
array(0,0,0,0,0,0,1,0,0,1,1,0)

	);

$Moon_ven_arr = array
	(
array(1,1,1,1,1,0,0,1,1,0,1,1),
array(1,1,1,1,1,1,0,0,1,1,0,1),
array(1,1,1,1,1,1,1,0,0,1,1,0),
array(0,1,1,1,1,1,1,1,0,0,1,1),
array(1,0,1,1,1,1,1,1,1,0,0,1),
array(1,1,0,1,1,1,1,1,1,1,0,0),
array(0,1,1,0,1,1,1,1,1,1,1,0),
array(0,0,1,1,0,1,1,1,1,1,1,1),
array(1,0,0,1,1,0,1,1,1,1,1,1),
array(1,1,0,0,1,1,0,1,1,1,1,1),
array(1,1,1,0,0,1,1,0,1,1,1,1),
array(1,1,1,1,0,0,1,1,0,1,1,1)



	);


$Mar_ven_arr = array
	(
array(0,0,1,1,0,1,0,0,1,0,1,1),
array(1,0,0,1,1,0,1,0,0,1,0,1),
array(1,1,0,0,1,1,0,1,0,0,1,0),
array(0,1,1,0,0,1,1,0,1,0,0,1),
array(1,0,1,1,0,0,1,1,0,1,0,0),
array(0,1,0,1,1,0,0,1,1,0,1,0),
array(0,0,1,0,1,1,0,0,1,1,0,1),
array(1,0,0,1,0,1,1,0,0,1,1,0),
array(0,1,0,0,1,0,1,1,0,0,1,1),
array(1,0,1,0,0,1,0,1,1,0,0,1),
array(1,1,0,1,0,0,1,0,1,1,0,0),
array(0,1,1,0,1,0,0,1,0,1,1,0)



	);

$Mer_ven_arr = array 
	(
array(0,0,1,0,1,1,0,0,1,0,1,0),
array(0,0,0,1,0,1,1,0,0,1,0,1),
array(1,0,0,0,1,0,1,1,0,0,1,0),
array(0,1,0,0,0,1,0,1,1,0,0,1),
array(1,0,1,0,0,0,1,0,1,1,0,0),
array(0,1,0,1,0,0,0,1,0,1,1,0),
array(0,0,1,0,1,0,0,0,1,0,1,1),
array(1,0,0,1,0,1,0,0,0,1,0,1),
array(1,1,0,0,1,0,1,0,0,0,1,0),
array(0,1,1,0,0,1,0,1,0,0,0,1),
array(1,0,1,1,0,0,1,0,1,0,0,0),
array(0,1,0,1,1,0,0,1,0,1,0,0)


	);

$Jup_ven_arr = array 
	(
array(0,0,0,0,1,0,0,1,1,1,1,0),
array(0,0,0,0,0,1,0,0,1,1,1,1),
array(1,0,0,0,0,0,1,0,0,1,1,1),
array(1,1,0,0,0,0,0,1,0,0,1,1),
array(1,1,1,0,0,0,0,0,1,0,0,1),
array(1,1,1,1,0,0,0,0,0,1,0,0),
array(0,1,1,1,1,0,0,0,0,0,1,0),
array(0,0,1,1,1,1,0,0,0,0,0,1),
array(1,0,0,1,1,1,1,0,0,0,0,0),
array(0,1,0,0,1,1,1,1,0,0,0,0),
array(0,0,1,0,0,1,1,1,1,0,0,0),
array(0,0,0,1,0,0,1,1,1,1,0,0)



	);

$Ven_ven_arr = array 
	(
array(1,1,1,1,1,0,0,1,1,1,1,0),
array(0,1,1,1,1,1,0,0,1,1,1,1),
array(1,0,1,1,1,1,1,0,0,1,1,1),
array(1,1,0,1,1,1,1,1,0,0,1,1),
array(1,1,1,0,1,1,1,1,1,0,0,1),
array(1,1,1,1,0,1,1,1,1,1,0,0),
array(0,1,1,1,1,0,1,1,1,1,1,0),
array(0,0,1,1,1,1,0,1,1,1,1,1),
array(1,0,0,1,1,1,1,0,1,1,1,1),
array(1,1,0,0,1,1,1,1,0,1,1,1),
array(1,1,1,0,0,1,1,1,1,0,1,1),
array(1,1,1,1,0,0,1,1,1,1,0,1)


	);

$Sat_ven_arr = array 
	(
array(0,0,1,1,1,0,0,1,1,1,1,0),
array(0,0,0,1,1,1,0,0,1,1,1,1),
array(1,0,0,0,1,1,1,0,0,1,1,1),
array(1,1,0,0,0,1,1,1,0,0,1,1),
array(1,1,1,0,0,0,1,1,1,0,0,1),
array(1,1,1,1,0,0,0,1,1,1,0,0),
array(0,1,1,1,1,0,0,0,1,1,1,0),
array(0,0,1,1,1,1,0,0,0,1,1,1),
array(1,0,0,1,1,1,1,0,0,0,1,1),
array(1,1,0,0,1,1,1,1,0,0,0,1),
array(1,1,1,0,0,1,1,1,1,0,0,0),
array(0,1,1,1,0,0,1,1,1,1,0,0)


	);

$Lag_ven_arr = array 
	(
array(1,1,1,1,1,0,0,1,1,0,1,0),
array(0,1,1,1,1,1,0,0,1,1,0,1),
array(1,0,1,1,1,1,1,0,0,1,1,0),
array(0,1,0,1,1,1,1,1,0,0,1,1),
array(1,0,1,0,1,1,1,1,1,0,0,1),
array(1,1,0,1,0,1,1,1,1,1,0,0),
array(0,1,1,0,1,0,1,1,1,1,1,0),
array(0,0,1,1,0,1,0,1,1,1,1,1),
array(1,0,0,1,1,0,1,0,1,1,1,1),
array(1,1,0,0,1,1,0,1,0,1,1,1),
array(1,1,1,0,0,1,1,0,1,0,1,1),
array(1,1,1,1,0,0,1,1,0,1,0,1)



	);
?>

<!--
<table>
<tr>
<td colspan="13">Prastara Ashtakavarga for Venus Matrices </td>
</tr>
<tr>
<td>Planets/Rasi No.</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td>
</tr>

<tr>

<td>Sun</td> -->

<?php
$rows = 1;
$cols = 12;

$sun_ii = $tmp_Rasi_Sun;
$sun_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t5sun[$i] = $Sun_ven_arr[($sun_ii-1)][$sun_xy];	
// echo '<td>' . $Sun_ven_arr[($sun_ii-1)][$sun_xy] . '</td>';
$Sun_ven_arrtot[$i] = $Sun_ven_arr[($sun_ii-1)][$sun_xy];
$sun_xy = $sun_xy + 1;


}
// echo '</tr>';
?>

<!-- <tr>
<td>Moon</td> -->

<?php
$moon_ii = $tmp_Rasi_Moon;
$moon_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t5moon[$i] = $Moon_ven_arr[($moon_ii-1)][$moon_xy];	
// echo '<td>' . $Moon_ven_arr[($moon_ii-1)][$moon_xy] . '</td>';
$Moon_ven_arrtot[$i] = $Moon_ven_arr[($moon_ii-1)][$moon_xy];
$moon_xy = $moon_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Mars</td> -->

<?php
$mar_ii = $tmp_Rasi_Mar;
$mar_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t5mar[$i] = $Mar_ven_arr[($mar_ii-1)][$mar_xy];	
// echo '<td>' . $Mar_ven_arr[($mar_ii-1)][$mar_xy] . '</td>';
$Mar_ven_arrtot[$i] = $Mar_ven_arr[($mar_ii-1)][$mar_xy];
$mar_xy = $mar_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Mercury</td> -->

<?php
$mer_ii = $tmp_Rasi_Mer;
$mer_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t5mer[$i] = $Mer_ven_arr[($mer_ii-1)][$mer_xy];	
// echo '<td>' . $Mer_ven_arr[($mer_ii-1)][$mer_xy] . '</td>';
$Mer_ven_arrtot[$i] = $Mer_ven_arr[($mer_ii-1)][$mer_xy];
$mer_xy = $mer_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Jupiter</td> -->

<?php
$jup_ii = $tmp_Rasi_Jup;
$jup_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t5jup[$i] = $Jup_ven_arr[($jup_ii-1)][$jup_xy];	
// echo '<td>' . $Jup_ven_arr[($jup_ii-1)][$jup_xy] . '</td>';
$Jup_ven_arrtot[$i] = $Jup_ven_arr[($jup_ii-1)][$jup_xy];
$jup_xy = $jup_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Venus</td> -->

<?php
$ven_ii = $tmp_Rasi_Ven;
$ven_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t5ven[$i] = $Ven_ven_arr[($ven_ii-1)][$ven_xy];	
// echo '<td>' . $Ven_ven_arr[($ven_ii-1)][$ven_xy] . '</td>';
$Ven_ven_arrtot[$i] = $Ven_ven_arr[($ven_ii-1)][$ven_xy];
$ven_xy = $ven_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Saturn</td> -->

<?php
$sat_ii = $tmp_Rasi_Sat;
$sat_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t5sat[$i] = $Sat_ven_arr[($sat_ii-1)][$sat_xy];	
// echo '<td>' . $Sat_ven_arr[($sat_ii-1)][$sat_xy] . '</td>';
$Sat_ven_arrtot[$i] = $Sat_ven_arr[($sat_ii-1)][$sat_xy];
$sat_xy = $sat_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Lagna</td> -->

<?php
$lag_ii = $tmp_Rasi_Asc;
$lag_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t5lag[$i] = $Lag_ven_arr[($lag_ii-1)][$lag_xy];	
// echo '<td>' . $Lag_ven_arr[($lag_ii-1)][$lag_xy] . '</td>';
$Lag_ven_arrtot[$i] = $Lag_ven_arr[($lag_ii-1)][$lag_xy];
$lag_xy = $lag_xy + 1;

}
// echo '</tr>';
?>


<!-- <tr>
<td><strong>Total :</strong></td> -->
<?php


For ($i=1; $i<13; $i++)
{
	$tmp_tot5ven[$i] = $Sun_ven_arrtot[$i] + $Moon_ven_arrtot[$i] + $Mar_ven_arrtot[$i] + $Mer_ven_arrtot[$i] + $Jup_ven_arrtot[$i] + $Ven_ven_arrtot[$i] + $Sat_ven_arrtot[$i] + $Lag_ven_arrtot[$i];

	$total_ven[$i] = $Sun_ven_arrtot[$i] + $Moon_ven_arrtot[$i] + $Mar_ven_arrtot[$i] + $Mer_ven_arrtot[$i] + $Jup_ven_arrtot[$i] + $Ven_ven_arrtot[$i] + $Sat_ven_arrtot[$i] + $Lag_ven_arrtot[$i];
	
	// echo '<td>' . '<strong>' . $total_ven[$i] . '</strong>' . '</td>';
}
// echo '</tr>';

?>
<!--
</table>


<br>
<br>
<table class="b">
<tr align="center">
-->
<?php
/*
If ($tmp_Rasi_Ven == 12)
{
	echo '<td bgcolor="#008000">' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[11] . '</td><td colspan="2" rowspan="2">Ven</td><td>' . $total_ven[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	// echo '</tr>';

}

If ($tmp_Rasi_Ven == 1)
{
	// echo '<td>' . $total_ven[12] . '</td><td bgcolor="#008000">' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[11] . '</td><td colspan="2" rowspan="2">Ven</td><td>' . $total_ven[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Ven == 2)
{
	// echo '<td>' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td bgcolor="#008000">' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[11] . '</td><td colspan="2" rowspan="2">Ven</td><td>' . $total_ven[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Ven == 3)
{
	// echo '<td>' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td bgcolor="#008000">' . $total_ven[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[11] . '</td><td colspan="2" rowspan="2">Ven</td><td>' . $total_ven[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Ven == 11)
{
	// echo '<td>' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#008000">' . $total_ven[11] . '</td><td colspan="2" rowspan="2">Ven</td><td>' . $total_ven[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Ven == 4)
{
	// echo '<td>' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[11] . '</td><td colspan="2" rowspan="2">Ven</td><td bgcolor="#008000">' . $total_ven[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Ven == 10)
{
	// echo '<td>' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[11] . '</td><td colspan="2" rowspan="2">Ven</td><td>' . $total_ven[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#008000">' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Ven == 5)
{
	// echo '<td>' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[11] . '</td><td colspan="2" rowspan="2">Ven</td><td>' . $total_ven[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[10] . '</td><td bgcolor="#008000">' . $total_ven[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Ven == 9)
{
	// echo '<td>' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[11] . '</td><td colspan="2" rowspan="2">Ven</td><td>' . $total_ven[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	echo '<td bgcolor="#008000">' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Ven == 8)
{
	// echo '<td>' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[11] . '</td><td colspan="2" rowspan="2">Ven</td><td>' . $total_ven[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_ven[9] . '</td><td bgcolor="#008000">' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Ven == 7)
{
	// echo '<td>' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[11] . '</td><td colspan="2" rowspan="2">Ven</td><td>' . $total_ven[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td bgcolor="#008000">' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Ven == 6)
{
	// echo '<td>' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[11] . '</td><td colspan="2" rowspan="2">Ven</td><td>' . $total_ven[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td bgcolor="#008000">' . $total_ven[6] . '</td>';

	// echo '</tr>';
}
*/
?>

<!--
</table>
<br>
<br>
-->
<!-- Matrices for Ashtakavarga Venus Ends -->

<!-- Matrices for Ashtakavarga Saturn Starts -->

<?php
$Sun_sat_arr = array
	(
array(1,1,0,1,0,0,1,1,0,1,1,0),
array(0,1,1,0,1,0,0,1,1,0,1,1),
array(1,0,1,1,0,1,0,0,1,1,0,1),
array(1,1,0,1,1,0,1,0,0,1,1,0),
array(0,1,1,0,1,1,0,1,0,0,1,1),
array(1,0,1,1,0,1,1,0,1,0,0,1),
array(1,1,0,1,1,0,1,1,0,1,0,0),
array(0,1,1,0,1,1,0,1,1,0,1,0),
array(0,0,1,1,0,1,1,0,1,1,0,1),
array(1,0,0,1,1,0,1,1,0,1,1,0),
array(0,1,0,0,1,1,0,1,1,0,1,1),
array(1,0,1,0,0,1,1,0,1,1,0,1)


	);

$Moon_sat_arr = array
	(
array(0,0,1,0,0,1,0,0,0,0,1,0),
array(0,0,0,1,0,0,1,0,0,0,0,1),
array(1,0,0,0,1,0,0,1,0,0,0,0),
array(0,1,0,0,0,1,0,0,1,0,0,0),
array(0,0,1,0,0,0,1,0,0,1,0,0),
array(0,0,0,1,0,0,0,1,0,0,1,0),
array(0,0,0,0,1,0,0,0,1,0,0,1),
array(1,0,0,0,0,1,0,0,0,1,0,0),
array(0,1,0,0,0,0,1,0,0,0,1,0),
array(0,0,1,0,0,0,0,1,0,0,0,1),
array(1,0,0,1,0,0,0,0,1,0,0,0),
array(0,1,0,0,1,0,0,0,0,1,0,0)




	);


$Mar_sat_arr = array
	(
array(0,0,1,0,1,1,0,0,0,1,1,1),
array(1,0,0,1,0,1,1,0,0,0,1,1),
array(1,1,0,0,1,0,1,1,0,0,0,1),
array(1,1,1,0,0,1,0,1,1,0,0,0),
array(0,1,1,1,0,0,1,0,1,1,0,0),
array(0,0,1,1,1,0,0,1,0,1,1,0),
array(0,0,0,1,1,1,0,0,1,0,1,1),
array(1,0,0,0,1,1,1,0,0,1,0,1),
array(1,1,0,0,0,1,1,1,0,0,1,0),
array(0,1,1,0,0,0,1,1,1,0,0,1),
array(1,0,1,1,0,0,0,1,1,1,0,0),
array(0,1,0,1,1,0,0,0,1,1,1,0)




	);

$Mer_sat_arr = array 
	(
array(0,0,0,0,0,1,0,1,1,1,1,1),
array(1,0,0,0,0,0,1,0,1,1,1,1),
array(1,1,0,0,0,0,0,1,0,1,1,1),
array(1,1,1,0,0,0,0,0,1,0,1,1),
array(1,1,1,1,0,0,0,0,0,1,0,1),
array(1,1,1,1,1,0,0,0,0,0,1,0),
array(0,1,1,1,1,1,0,0,0,0,0,1),
array(1,0,1,1,1,1,1,0,0,0,0,0),
array(0,1,0,1,1,1,1,1,0,0,0,0),
array(0,0,1,0,1,1,1,1,1,0,0,0),
array(0,0,0,1,0,1,1,1,1,1,0,0),
array(0,0,0,0,1,0,1,1,1,1,1,0)



	);

$Jup_sat_arr = array 
	(
array(0,0,0,0,1,1,0,0,0,0,1,1),
array(1,0,0,0,0,1,1,0,0,0,0,1),
array(1,1,0,0,0,0,1,1,0,0,0,0),
array(0,1,1,0,0,0,0,1,1,0,0,0),
array(0,0,1,1,0,0,0,0,1,1,0,0),
array(0,0,0,1,1,0,0,0,0,1,1,0),
array(0,0,0,0,1,1,0,0,0,0,1,1),
array(1,0,0,0,0,1,1,0,0,0,0,1),
array(1,1,0,0,0,0,1,1,0,0,0,0),
array(0,1,1,0,0,0,0,1,1,0,0,0),
array(0,0,1,1,0,0,0,0,1,1,0,0),
array(0,0,0,1,1,0,0,0,0,1,1,0)




	);

$Ven_sat_arr = array 
	(
array(0,0,0,0,0,1,0,0,0,0,1,1),
array(1,0,0,0,0,0,1,0,0,0,0,1),
array(1,1,0,0,0,0,0,1,0,0,0,0),
array(0,1,1,0,0,0,0,0,1,0,0,0),
array(0,0,1,1,0,0,0,0,0,1,0,0),
array(0,0,0,1,1,0,0,0,0,0,1,0),
array(0,0,0,0,1,1,0,0,0,0,0,1),
array(1,0,0,0,0,1,1,0,0,0,0,0),
array(0,1,0,0,0,0,1,1,0,0,0,0),
array(0,0,1,0,0,0,0,1,1,0,0,0),
array(0,0,0,1,0,0,0,0,1,1,0,0),
array(0,0,0,0,1,0,0,0,0,1,1,0)



	);

$Sat_sat_arr = array 
	(
array(0,0,1,0,1,1,0,0,0,0,1,0),
array(0,0,0,1,0,1,1,0,0,0,0,1),
array(1,0,0,0,1,0,1,1,0,0,0,0),
array(0,1,0,0,0,1,0,1,1,0,0,0),
array(0,0,1,0,0,0,1,0,1,1,0,0),
array(0,0,0,1,0,0,0,1,0,1,1,0),
array(0,0,0,0,1,0,0,0,1,0,1,1),
array(1,0,0,0,0,1,0,0,0,1,0,1),
array(1,1,0,0,0,0,1,0,0,0,1,0),
array(0,1,1,0,0,0,0,1,0,0,0,1),
array(1,0,1,1,0,0,0,0,1,0,0,0),
array(0,1,0,1,1,0,0,0,0,1,0,0)



	);

$Lag_sat_arr = array 
	(
array(1,0,1,1,0,1,0,0,0,1,1,0),
array(0,1,0,1,1,0,1,0,0,0,1,1),
array(1,0,1,0,1,1,0,1,0,0,0,1),
array(1,1,0,1,0,1,1,0,1,0,0,0),
array(0,1,1,0,1,0,1,1,0,1,0,0),
array(0,0,1,1,0,1,0,1,1,0,1,0),
array(0,0,0,1,1,0,1,0,1,1,0,1),
array(1,0,0,0,1,1,0,1,0,1,1,0),
array(0,1,0,0,0,1,1,0,1,0,1,1),
array(1,0,1,0,0,0,1,1,0,1,0,1),
array(1,1,0,1,0,0,0,1,1,0,1,0),
array(0,1,1,0,1,0,0,0,1,1,0,1)




	);
?>

<!--
<table>
<tr>
<td colspan="13">Prastara Ashtakavarga for Saturn Matrices </td>
</tr>
<tr>
<td>Planets/Rasi No.</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td>
</tr>

<tr>

<td>Sun</td> -->

<?php
$rows = 1;
$cols = 12;

$sun_ii = $tmp_Rasi_Sun;
$sun_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t6sun[$i] = $Sun_sat_arr[($sun_ii-1)][$sun_xy];	
// echo '<td>' . $Sun_sat_arr[($sun_ii-1)][$sun_xy] . '</td>';
$Sun_sat_arrtot[$i] = $Sun_sat_arr[($sun_ii-1)][$sun_xy];
$sun_xy = $sun_xy + 1;


}
// echo '</tr>';
?>

<!-- <tr>
<td>Moon</td> -->

<?php
$moon_ii = $tmp_Rasi_Moon;
$moon_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t6moon[$i] = $Moon_sat_arr[($moon_ii-1)][$moon_xy];	
// echo '<td>' . $Moon_sat_arr[($moon_ii-1)][$moon_xy] . '</td>';
$Moon_sat_arrtot[$i] = $Moon_sat_arr[($moon_ii-1)][$moon_xy];
$moon_xy = $moon_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Mars</td> -->

<?php
$mar_ii = $tmp_Rasi_Mar;
$mar_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t6mar[$i] = $Mar_sat_arr[($mar_ii-1)][$mar_xy];	
// echo '<td>' . $Mar_sat_arr[($mar_ii-1)][$mar_xy] . '</td>';
$Mar_sat_arrtot[$i] = $Mar_sat_arr[($mar_ii-1)][$mar_xy];
$mar_xy = $mar_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Mercury</td> -->

<?php
$mer_ii = $tmp_Rasi_Mer;
$mer_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t6mer[$i] = $Mer_sat_arr[($mer_ii-1)][$mer_xy];	
// echo '<td>' . $Mer_sat_arr[($mer_ii-1)][$mer_xy] . '</td>';
$Mer_sat_arrtot[$i] = $Mer_sat_arr[($mer_ii-1)][$mer_xy];
$mer_xy = $mer_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Jupiter</td> -->

<?php
$jup_ii = $tmp_Rasi_Jup;
$jup_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t6jup[$i] = $Jup_sat_arr[($jup_ii-1)][$jup_xy];	
// echo '<td>' . $Jup_sat_arr[($jup_ii-1)][$jup_xy] . '</td>';
$Jup_sat_arrtot[$i] = $Jup_sat_arr[($jup_ii-1)][$jup_xy];
$jup_xy = $jup_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Venus</td> -->

<?php
$ven_ii = $tmp_Rasi_Ven;
$ven_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t6ven[$i] = $Ven_sat_arr[($ven_ii-1)][$ven_xy];	
// echo '<td>' . $Ven_sat_arr[($ven_ii-1)][$ven_xy] . '</td>';
$Ven_sat_arrtot[$i] = $Ven_sat_arr[($ven_ii-1)][$ven_xy];
$ven_xy = $ven_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Saturn</td> -->

<?php
$sat_ii = $tmp_Rasi_Sat;
$sat_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t6sat[$i] = $Sat_sat_arr[($sat_ii-1)][$sat_xy];	
// echo '<td>' . $Sat_sat_arr[($sat_ii-1)][$sat_xy] . '</td>';
$Sat_sat_arrtot[$i] = $Sat_sat_arr[($sat_ii-1)][$sat_xy];
$sat_xy = $sat_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Lagna</td> -->

<?php
$lag_ii = $tmp_Rasi_Asc;
$lag_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t6lag[$i] = $Lag_sat_arr[($lag_ii-1)][$lag_xy];	
// echo '<td>' . $Lag_sat_arr[($lag_ii-1)][$lag_xy] . '</td>';
$Lag_sat_arrtot[$i] = $Lag_sat_arr[($lag_ii-1)][$lag_xy];
$lag_xy = $lag_xy + 1;

}
// echo '</tr>';
?>


<!-- <tr>
<td><strong>Total :</strong></td> -->
<?php


For ($i=1; $i<13; $i++)
{
	$tmp_tot6sat[$i] = $Sun_sat_arrtot[$i] + $Moon_sat_arrtot[$i] + $Mar_sat_arrtot[$i] + $Mer_sat_arrtot[$i] + $Jup_sat_arrtot[$i] + $Ven_sat_arrtot[$i] + $Sat_sat_arrtot[$i] + $Lag_sat_arrtot[$i];

	$total_sat[$i] = $Sun_sat_arrtot[$i] + $Moon_sat_arrtot[$i] + $Mar_sat_arrtot[$i] + $Mer_sat_arrtot[$i] + $Jup_sat_arrtot[$i] + $Ven_sat_arrtot[$i] + $Sat_sat_arrtot[$i] + $Lag_sat_arrtot[$i];
	
	// echo '<td>' . '<strong>' . $total_sat[$i] . '</strong>' . '</td>';
}
// echo '</tr>';

?>
<!--
</table>


<br>
<br>
<table class="b">
<tr align="center">
-->
<?php
/*
If ($tmp_Rasi_Sat == 12)
{
	echo '<td bgcolor="#008000">' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[11] . '</td><td colspan="2" rowspan="2">Sat</td><td>' . $total_sat[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	// echo '</tr>';

}

If ($tmp_Rasi_Sat == 1)
{
	// echo '<td>' . $total_sat[12] . '</td><td bgcolor="#008000">' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[11] . '</td><td colspan="2" rowspan="2">Sat</td><td>' . $total_sat[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Sat == 2)
{
	// echo '<td>' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td bgcolor="#008000">' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[11] . '</td><td colspan="2" rowspan="2">Sat</td><td>' . $total_sat[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Sat == 3)
{
	// echo '<td>' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td bgcolor="#008000">' . $total_sat[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[11] . '</td><td colspan="2" rowspan="2">Sat</td><td>' . $total_sat[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Sat == 11)
{
	// echo '<td>' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#008000">' . $total_sat[11] . '</td><td colspan="2" rowspan="2">Sat</td><td>' . $total_sat[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Sat == 4)
{
	// echo '<td>' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[11] . '</td><td colspan="2" rowspan="2">Sat</td><td bgcolor="#008000">' . $total_sat[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Sat == 10)
{
	// echo '<td>' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[11] . '</td><td colspan="2" rowspan="2">Sat</td><td>' . $total_sat[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#008000">' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Sat == 5)
{
	// echo '<td>' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[11] . '</td><td colspan="2" rowspan="2">Sat</td><td>' . $total_sat[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[10] . '</td><td bgcolor="#008000">' . $total_sat[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Sat == 9)
{
	// echo '<td>' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[11] . '</td><td colspan="2" rowspan="2">Sat</td><td>' . $total_sat[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	echo '<td bgcolor="#008000">' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Sat == 8)
{
	// echo '<td>' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[11] . '</td><td colspan="2" rowspan="2">Sat</td><td>' . $total_sat[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sat[9] . '</td><td bgcolor="#008000">' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Sat == 7)
{
	// echo '<td>' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[11] . '</td><td colspan="2" rowspan="2">Sat</td><td>' . $total_sat[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td bgcolor="#008000">' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Sat == 6)
{
	// echo '<td>' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[11] . '</td><td colspan="2" rowspan="2">Sat</td><td>' . $total_sat[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td bgcolor="#008000">' . $total_sat[6] . '</td>';

	// echo '</tr>';
}
*/
?>
<!--

</table>
<br>
<br>
-->
<!-- Matrices for Ashtakavarga Saturn Ends -->


<!-- Matrices for Ashtakavarga Lagna Starts -->

<?php
$Sun_asc_arr = array
	(
array(0,0,1,1,0,1,0,0,0,1,1,1),
array(1,0,0,1,1,0,1,0,0,0,1,1),
array(1,1,0,0,1,1,0,1,0,0,0,1),
array(1,1,1,0,0,1,1,0,1,0,0,0),
array(0,1,1,1,0,0,1,1,0,1,0,0),
array(0,0,1,1,1,0,0,1,1,0,1,0),
array(0,0,0,1,1,1,0,0,1,1,0,1),
array(1,0,0,0,1,1,1,0,0,1,1,0),
array(0,1,0,0,0,1,1,1,0,0,1,1),
array(1,0,1,0,0,0,1,1,1,0,0,1),
array(1,1,0,1,0,0,0,1,1,1,0,0),
array(0,1,1,0,1,0,0,0,1,1,1,0)



	);

$Moon_asc_arr = array
	(
array(0,0,1,0,0,1,0,0,0,1,1,1),
array(1,0,0,1,0,0,1,0,0,0,1,1),
array(1,1,0,0,1,0,0,1,0,0,0,1),
array(1,1,1,0,0,1,0,0,1,0,0,0),
array(0,1,1,1,0,0,1,0,0,1,0,0),
array(0,0,1,1,1,0,0,1,0,0,1,0),
array(0,0,0,1,1,1,0,0,1,0,0,1),
array(1,0,0,0,1,1,1,0,0,1,0,0),
array(0,1,0,0,0,1,1,1,0,0,1,0),
array(0,0,1,0,0,0,1,1,1,0,0,1),
array(1,0,0,1,0,0,0,1,1,1,0,0),
array(0,1,0,0,1,0,0,0,1,1,1,0)





	);


$Mar_asc_arr = array
	(
array(1,0,1,0,0,1,0,0,0,1,1,0),
array(0,1,0,1,0,0,1,0,0,0,1,1),
array(1,0,1,0,1,0,0,1,0,0,0,1),
array(1,1,0,1,0,1,0,0,1,0,0,0),
array(0,1,1,0,1,0,1,0,0,1,0,0),
array(0,0,1,1,0,1,0,1,0,0,1,0),
array(0,0,0,1,1,0,1,0,1,0,0,1),
array(1,0,0,0,1,1,0,1,0,1,0,0),
array(0,1,0,0,0,1,1,0,1,0,1,0),
array(0,0,1,0,0,0,1,1,0,1,0,1),
array(1,0,0,1,0,0,0,1,1,0,1,0),
array(0,1,0,0,1,0,0,0,1,1,0,1)





	);

$Mer_asc_arr = array 
	(
array(1,1,0,1,0,1,0,1,0,1,1,0),
array(0,1,1,0,1,0,1,0,1,0,1,1),
array(1,0,1,1,0,1,0,1,0,1,0,1),
array(1,1,0,1,1,0,1,0,1,0,1,0),
array(0,1,1,0,1,1,0,1,0,1,0,1),
array(1,0,1,1,0,1,1,0,1,0,1,0),
array(0,1,0,1,1,0,1,1,0,1,0,1),
array(1,0,1,0,1,1,0,1,1,0,1,0),
array(0,1,0,1,0,1,1,0,1,1,0,1),
array(1,0,1,0,1,0,1,1,0,1,1,0),
array(0,1,0,1,0,1,0,1,1,0,1,1),
array(1,0,1,0,1,0,1,0,1,1,0,1)




	);

$Jup_asc_arr = array 
	(
array(1,1,0,1,1,1,1,0,1,1,1,0),
array(0,1,1,0,1,1,1,1,0,1,1,1),
array(1,0,1,1,0,1,1,1,1,0,1,1),
array(1,1,0,1,1,0,1,1,1,1,0,1),
array(1,1,1,0,1,1,0,1,1,1,1,0),
array(0,1,1,1,0,1,1,0,1,1,1,1),
array(1,0,1,1,1,0,1,1,0,1,1,1),
array(1,1,0,1,1,1,0,1,1,0,1,1),
array(1,1,1,0,1,1,1,0,1,1,0,1),
array(1,1,1,1,0,1,1,1,0,1,1,0),
array(0,1,1,1,1,0,1,1,1,0,1,1),
array(1,0,1,1,1,1,0,1,1,1,0,1)





	);

$Ven_asc_arr = array 
	(
array(1,1,1,1,1,0,0,1,1,0,0,0),
array(0,1,1,1,1,1,0,0,1,1,0,0),
array(0,0,1,1,1,1,1,0,0,1,1,0),
array(0,0,0,1,1,1,1,1,0,0,1,1),
array(1,0,0,0,1,1,1,1,1,0,0,1),
array(1,1,0,0,0,1,1,1,1,1,0,0),
array(0,1,1,0,0,0,1,1,1,1,1,0),
array(0,0,1,1,0,0,0,1,1,1,1,1),
array(1,0,0,1,1,0,0,0,1,1,1,1),
array(1,1,0,0,1,1,0,0,0,1,1,1),
array(1,1,1,0,0,1,1,0,0,0,1,1),
array(1,1,1,1,0,0,1,1,0,0,0,1)




	);

$Sat_asc_arr = array 
	(
array(1,0,1,1,0,1,0,0,0,1,1,0),
array(0,1,0,1,1,0,1,0,0,0,1,1),
array(1,0,1,0,1,1,0,1,0,0,0,1),
array(1,1,0,1,0,1,1,0,1,0,0,0),
array(0,1,1,0,1,0,1,1,0,1,0,0),
array(0,0,1,1,0,1,0,1,1,0,1,0),
array(0,0,0,1,1,0,1,0,1,1,0,1),
array(1,0,0,0,1,1,0,1,0,1,1,0),
array(0,1,0,0,0,1,1,0,1,0,1,1),
array(1,0,1,0,0,0,1,1,0,1,0,1),
array(1,1,0,1,0,0,0,1,1,0,1,0),
array(0,1,1,0,1,0,0,0,1,1,0,1)




	);

$Lag_asc_arr = array 
	(
array(0,0,1,0,0,1,0,0,0,1,1,0),
array(0,0,0,1,0,0,1,0,0,0,1,1),
array(1,0,0,0,1,0,0,1,0,0,0,1),
array(1,1,0,0,0,1,0,0,1,0,0,0),
array(0,1,1,0,0,0,1,0,0,1,0,0),
array(0,0,1,1,0,0,0,1,0,0,1,0),
array(0,0,0,1,1,0,0,0,1,0,0,1),
array(1,0,0,0,1,1,0,0,0,1,0,0),
array(0,1,0,0,0,1,1,0,0,0,1,0),
array(0,0,1,0,0,0,1,1,0,0,0,1),
array(1,0,0,1,0,0,0,1,1,0,0,0),
array(0,1,0,0,1,0,0,0,1,1,0,0)





	);
?>

<!--
<table>
<tr>
<td colspan="13">Prastara Ashtakavarga for Ascendant Matrices </td>
</tr>
<tr>
<td>Planets/Rasi No.</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td>
</tr>

<tr>

<td>Sun</td> -->

<?php
$rows = 1;
$cols = 12;

$sun_ii = $tmp_Rasi_Sun;
$sun_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t7sun[$i] = $Sun_asc_arr[($sun_ii-1)][$sun_xy];	
// echo '<td>' . $Sun_asc_arr[($sun_ii-1)][$sun_xy] . '</td>';
$Sun_asc_arrtot[$i] = $Sun_asc_arr[($sun_ii-1)][$sun_xy];
$sun_xy = $sun_xy + 1;


}
// echo '</tr>';
?>

<!-- <tr>
<td>Moon</td> -->

<?php
$moon_ii = $tmp_Rasi_Moon;
$moon_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t7moon[$i] = $Moon_asc_arr[($moon_ii-1)][$moon_xy];
// echo '<td>' . $Moon_asc_arr[($moon_ii-1)][$moon_xy] . '</td>';
$Moon_asc_arrtot[$i] = $Moon_asc_arr[($moon_ii-1)][$moon_xy];
$moon_xy = $moon_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Mars</td> -->

<?php
$mar_ii = $tmp_Rasi_Mar;
$mar_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t7mar[$i] = $Mar_asc_arr[($mar_ii-1)][$mar_xy];	
// echo '<td>' . $Mar_asc_arr[($mar_ii-1)][$mar_xy] . '</td>';
$Mar_asc_arrtot[$i] = $Mar_asc_arr[($mar_ii-1)][$mar_xy];
$mar_xy = $mar_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Mercury</td> -->

<?php
$mer_ii = $tmp_Rasi_Mer;
$mer_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t7mer[$i] = $Mer_asc_arr[($mer_ii-1)][$mer_xy];	
// echo '<td>' . $Mer_asc_arr[($mer_ii-1)][$mer_xy] . '</td>';
$Mer_asc_arrtot[$i] = $Mer_asc_arr[($mer_ii-1)][$mer_xy];
$mer_xy = $mer_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Jupiter</td> -->

<?php
$jup_ii = $tmp_Rasi_Jup;
$jup_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t7jup[$i] = $Jup_asc_arr[($jup_ii-1)][$jup_xy];	
// echo '<td>' . $Jup_asc_arr[($jup_ii-1)][$jup_xy] . '</td>';
$Jup_asc_arrtot[$i] = $Jup_asc_arr[($jup_ii-1)][$jup_xy];
$jup_xy = $jup_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Venus</td> -->

<?php
$ven_ii = $tmp_Rasi_Ven;
$ven_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t7ven[$i] = $Ven_asc_arr[($ven_ii-1)][$ven_xy];	
// echo '<td>' . $Ven_asc_arr[($ven_ii-1)][$ven_xy] . '</td>';
$Ven_asc_arrtot[$i] = $Ven_asc_arr[($ven_ii-1)][$ven_xy];
$ven_xy = $ven_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Saturn</td> -->

<?php
$sat_ii = $tmp_Rasi_Sat;
$sat_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t7sat[$i] = $Sat_asc_arr[($sat_ii-1)][$sat_xy];	
// echo '<td>' . $Sat_asc_arr[($sat_ii-1)][$sat_xy] . '</td>';
$Sat_asc_arrtot[$i] = $Sat_asc_arr[($sat_ii-1)][$sat_xy];
$sat_xy = $sat_xy + 1;

}
// echo '</tr>';
?>

<!-- <tr>
<td>Lagna</td> -->

<?php
$lag_ii = $tmp_Rasi_Asc;
$lag_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t7lag[$i] = $Lag_asc_arr[($lag_ii-1)][$lag_xy];	
// echo '<td>' . $Lag_asc_arr[($lag_ii-1)][$lag_xy] . '</td>';
$Lag_asc_arrtot[$i] = $Lag_asc_arr[($lag_ii-1)][$lag_xy];
$lag_xy = $lag_xy + 1;

}
// echo '</tr>';
?>


<!-- <tr>
<td><strong>Total :</strong></td> -->
<?php


For ($i=1; $i<13; $i++)
{
	$tmp_tot7asc[$i] = $Sun_asc_arrtot[$i] + $Moon_asc_arrtot[$i] + $Mar_asc_arrtot[$i] + $Mer_asc_arrtot[$i] + $Jup_asc_arrtot[$i] + $Ven_asc_arrtot[$i] + $Sat_asc_arrtot[$i] + $Lag_asc_arrtot[$i];

	$total_asc[$i] = $Sun_asc_arrtot[$i] + $Moon_asc_arrtot[$i] + $Mar_asc_arrtot[$i] + $Mer_asc_arrtot[$i] + $Jup_asc_arrtot[$i] + $Ven_asc_arrtot[$i] + $Sat_asc_arrtot[$i] + $Lag_asc_arrtot[$i];
	
	// echo '<td>' . '<strong>' . $total_asc[$i] . '</strong>' . '</td>';
}
// echo '</tr>';

?>
<!--
</table>


<br>
<br>
<table class="b">
<tr align="center">
-->
<?php
/*
If ($tmp_Rasi_Asc == 12)
{
	echo '<td bgcolor="#008000">' . $total_asc[12] . '</td><td>' . $total_asc[1] . '</td><td>' . $total_asc[2] . '</td><td>' . $total_asc[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[11] . '</td><td colspan="2" rowspan="2">Asc</td><td>' . $total_asc[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[10] . '</td><td>' . $total_asc[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_asc[9] . '</td><td>' . $total_asc[8] . '</td><td>' . $total_asc[7] . '</td><td>' . $total_asc[6] . '</td>';

	// echo '</tr>';

}

If ($tmp_Rasi_Asc == 1)
{
	// echo '<td>' . $total_asc[12] . '</td><td bgcolor="#008000">' . $total_asc[1] . '</td><td>' . $total_asc[2] . '</td><td>' . $total_asc[3] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[11] . '</td><td colspan="2" rowspan="2">Asc</td><td>' . $total_asc[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[10] . '</td><td>' . $total_asc[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_asc[9] . '</td><td>' . $total_asc[8] . '</td><td>' . $total_asc[7] . '</td><td>' . $total_asc[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Asc == 2)
{
	// echo '<td>' . $total_asc[12] . '</td><td>' . $total_asc[1] . '</td><td bgcolor="#008000">' . $total_asc[2] . '</td><td>' . $total_asc[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[11] . '</td><td colspan="2" rowspan="2">Asc</td><td>' . $total_asc[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[10] . '</td><td>' . $total_asc[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_asc[9] . '</td><td>' . $total_asc[8] . '</td><td>' . $total_asc[7] . '</td><td>' . $total_asc[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Asc == 3)
{
	// echo '<td>' . $total_asc[12] . '</td><td>' . $total_asc[1] . '</td><td>' . $total_asc[2] . '</td><td bgcolor="#008000">' . $total_asc[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[11] . '</td><td colspan="2" rowspan="2">Asc</td><td>' . $total_asc[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[10] . '</td><td>' . $total_asc[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_asc[9] . '</td><td>' . $total_asc[8] . '</td><td>' . $total_asc[7] . '</td><td>' . $total_asc[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Asc == 11)
{
	// echo '<td>' . $total_asc[12] . '</td><td>' . $total_asc[1] . '</td><td>' . $total_asc[2] . '</td><td>' . $total_asc[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#008000">' . $total_asc[11] . '</td><td colspan="2" rowspan="2">Asc</td><td>' . $total_asc[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[10] . '</td><td>' . $total_asc[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_asc[9] . '</td><td>' . $total_asc[8] . '</td><td>' . $total_asc[7] . '</td><td>' . $total_asc[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Asc == 4)
{
	// echo '<td>' . $total_asc[12] . '</td><td>' . $total_asc[1] . '</td><td>' . $total_asc[2] . '</td><td>' . $total_asc[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[11] . '</td><td colspan="2" rowspan="2">Asc</td><td bgcolor="#008000">' . $total_asc[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[10] . '</td><td>' . $total_asc[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_asc[9] . '</td><td>' . $total_asc[8] . '</td><td>' . $total_asc[7] . '</td><td>' . $total_asc[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Asc == 10)
{
	// echo '<td>' . $total_asc[12] . '</td><td>' . $total_asc[1] . '</td><td>' . $total_asc[2] . '</td><td>' . $total_asc[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[11] . '</td><td colspan="2" rowspan="2">Asc</td><td>' . $total_asc[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#008000">' . $total_asc[10] . '</td><td>' . $total_asc[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_asc[9] . '</td><td>' . $total_asc[8] . '</td><td>' . $total_asc[7] . '</td><td>' . $total_asc[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Asc == 5)
{
	// echo '<td>' . $total_asc[12] . '</td><td>' . $total_asc[1] . '</td><td>' . $total_asc[2] . '</td><td>' . $total_asc[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[11] . '</td><td colspan="2" rowspan="2">Asc</td><td>' . $total_asc[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[10] . '</td><td bgcolor="#008000">' . $total_asc[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_asc[9] . '</td><td>' . $total_asc[8] . '</td><td>' . $total_asc[7] . '</td><td>' . $total_asc[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Asc == 9)
{
	// echo '<td>' . $total_asc[12] . '</td><td>' . $total_asc[1] . '</td><td>' . $total_asc[2] . '</td><td>' . $total_asc[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[11] . '</td><td colspan="2" rowspan="2">Asc</td><td>' . $total_asc[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[10] . '</td><td>' . $total_asc[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	echo '<td bgcolor="#008000">' . $total_asc[9] . '</td><td>' . $total_asc[8] . '</td><td>' . $total_asc[7] . '</td><td>' . $total_asc[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Asc == 8)
{
	// echo '<td>' . $total_asc[12] . '</td><td>' . $total_asc[1] . '</td><td>' . $total_asc[2] . '</td><td>' . $total_asc[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[11] . '</td><td colspan="2" rowspan="2">Asc</td><td>' . $total_asc[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[10] . '</td><td>' . $total_asc[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_asc[9] . '</td><td bgcolor="#008000">' . $total_asc[8] . '</td><td>' . $total_asc[7] . '</td><td>' . $total_asc[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Asc == 7)
{
	// echo '<td>' . $total_asc[12] . '</td><td>' . $total_asc[1] . '</td><td>' . $total_asc[2] . '</td><td>' . $total_asc[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[11] . '</td><td colspan="2" rowspan="2">Asc</td><td>' . $total_asc[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[10] . '</td><td>' . $total_asc[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_asc[9] . '</td><td>' . $total_asc[8] . '</td><td bgcolor="#008000">' . $total_asc[7] . '</td><td>' . $total_asc[6] . '</td>';

	// echo '</tr>';
}

If ($tmp_Rasi_Asc == 6)
{
	// echo '<td>' . $total_asc[12] . '</td><td>' . $total_asc[1] . '</td><td>' . $total_asc[2] . '</td><td>' . $total_asc[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[11] . '</td><td colspan="2" rowspan="2">Asc</td><td>' . $total_asc[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $total_asc[10] . '</td><td>' . $total_asc[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $total_asc[9] . '</td><td>' . $total_asc[8] . '</td><td>' . $total_asc[7] . '</td><td bgcolor="#008000">' . $total_asc[6] . '</td>';

	// echo '</tr>';
}
*/
?>
<!--

</table>
<br>
<br>
-->



<!-- Matrices for Ashtakavarga Lagna Ends -->

<!-- Matrices for Ashtakavarga SAV Starts -->

<?php
/*
For ($i=1; $i<13; $i++)
	{
	$SAV[$i] = ($total_sun[$i] + $total_moon[$i] + $total_mar[$i] + $total_mer[$i] + $total_jup[$i] + $total_ven[$i] + $total_sat[$i]); 
	}
?>

<table class="b">
<tr align="center">

<?php

	// echo '<td>' . $SAV[12] . '</td><td>' . $SAV[1] . '</td><td>' . $SAV[2] . '</td><td>' . $SAV[3] . '</td>';
	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $SAV[11] . '</td><td colspan="2" rowspan="2">SAV</td><td>' . $SAV[4] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';

	// echo '<td>' . $SAV[10] . '</td><td>' . $SAV[5] . '</td>';

	// echo '</tr>';
	echo '<tr align="center">';
	// echo '<td>' . $SAV[9] . '</td><td>' . $SAV[8] . '</td><td>' . $SAV[7] . '</td><td>' . $SAV[6] . '</td>';

	// echo '</tr>';
*/
?>
<!--
</table>
<br>
<br>
-->
<!-- Matrices for Ashtakavarga SAV Ends -->
<!-- combined Ashtakavarga details start here -->


<!-- Ashtakavarga Calculation Ends  ---->


<br>
<table class="d" align="center">
<tr>
<td  align="center">
<!-- Matrices for Ashtakavarga SAV Starts -->

<?php
For ($i=1; $i<13; $i++)
	{
	$SAV[$i] = ($total_sun[$i] + $total_moon[$i] + $total_mar[$i] + $total_mer[$i] + $total_jup[$i] + $total_ven[$i] + $total_sat[$i]); 
	}
?>

<table class="bb" align="center">
<tr align="center">

<?php
/*
	echo '<td>' . $SAV[12] . '</td><td>' . $SAV[1] . '</td><td>' . $SAV[2] . '</td><td>' . $SAV[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[11] . '</td><td colspan="2" rowspan="2">SAV</td><td>' . $SAV[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[10] . '</td><td>' . $SAV[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $SAV[9] . '</td><td>' . $SAV[8] . '</td><td>' . $SAV[7] . '</td><td>' . $SAV[6] . '</td>';

	echo '</tr>';
*/



If ($tmp_Rasi_Asc == 12)
{
	echo '<td bgcolor="#CCFFFF">' . $SAV[12] . '</td><td>' . $SAV[1] . '</td><td>' . $SAV[2] . '</td><td>' . $SAV[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[11] . '</td><td bgcolor="#CCFFFF" colspan="2" rowspan="2"><strong>SAV</strong></td><td>' . $SAV[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[10] . '</td><td>' . $SAV[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $SAV[9] . '</td><td>' . $SAV[8] . '</td><td>' . $SAV[7] . '</td><td>' . $SAV[6] . '</td>';

	echo '</tr>';

}

If ($tmp_Rasi_Asc == 1)
{
	echo '<td>' . $SAV[12] . '</td><td bgcolor="#CCFFFF">' . $SAV[1] . '</td><td>' . $SAV[2] . '</td><td>' . $SAV[3] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[11] . '</td><td bgcolor="#CCFFFF" colspan="2" rowspan="2"><strong>SAV</strong></td><td>' . $SAV[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[10] . '</td><td>' . $SAV[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $SAV[9] . '</td><td>' . $SAV[8] . '</td><td>' . $SAV[7] . '</td><td>' . $SAV[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Asc == 2)
{
	echo '<td>' . $SAV[12] . '</td><td>' . $SAV[1] . '</td><td bgcolor="#CCFFFF">' . $SAV[2] . '</td><td>' . $SAV[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[11] . '</td><td bgcolor="#CCFFFF" colspan="2" rowspan="2"><strong>SAV</strong></td><td>' . $SAV[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[10] . '</td><td>' . $SAV[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $SAV[9] . '</td><td>' . $SAV[8] . '</td><td>' . $SAV[7] . '</td><td>' . $SAV[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Asc == 3)
{
	echo '<td>' . $SAV[12] . '</td><td>' . $SAV[1] . '</td><td>' . $SAV[2] . '</td><td bgcolor="#CCFFFF">' . $SAV[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[11] . '</td><td bgcolor="#CCFFFF" colspan="2" rowspan="2"><strong>SAV</strong></td><td>' . $SAV[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[10] . '</td><td>' . $SAV[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $SAV[9] . '</td><td>' . $SAV[8] . '</td><td>' . $SAV[7] . '</td><td>' . $SAV[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Asc == 11)
{
	echo '<td>' . $SAV[12] . '</td><td>' . $SAV[1] . '</td><td>' . $SAV[2] . '</td><td>' . $SAV[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#CCFFFF">' . $SAV[11] . '</td><td bgcolor="#CCFFFF" colspan="2" rowspan="2"><strong>SAV</strong></td><td>' . $SAV[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[10] . '</td><td>' . $SAV[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $SAV[9] . '</td><td>' . $SAV[8] . '</td><td>' . $SAV[7] . '</td><td>' . $SAV[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Asc == 4)
{
	echo '<td>' . $SAV[12] . '</td><td>' . $SAV[1] . '</td><td>' . $SAV[2] . '</td><td>' . $SAV[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[11] . '</td><td bgcolor="#CCFFFF" colspan="2" rowspan="2"><strong>SAV</strong></td><td bgcolor="#CCFFFF">' . $SAV[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[10] . '</td><td>' . $SAV[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $SAV[9] . '</td><td>' . $SAV[8] . '</td><td>' . $SAV[7] . '</td><td>' . $SAV[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Asc == 10)
{
	echo '<td>' . $SAV[12] . '</td><td>' . $SAV[1] . '</td><td>' . $SAV[2] . '</td><td>' . $SAV[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[11] . '</td><td bgcolor="#CCFFFF" colspan="2" rowspan="2"><strong>SAV</strong></td><td>' . $SAV[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#CCFFFF">' . $SAV[10] . '</td><td>' . $SAV[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $SAV[9] . '</td><td>' . $SAV[8] . '</td><td>' . $SAV[7] . '</td><td>' . $SAV[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Asc == 5)
{
	echo '<td>' . $SAV[12] . '</td><td>' . $SAV[1] . '</td><td>' . $SAV[2] . '</td><td>' . $SAV[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[11] . '</td><td bgcolor="#CCFFFF" colspan="2" rowspan="2"><strong>SAV</strong></td><td>' . $SAV[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[10] . '</td><td bgcolor="#CCFFFF">' . $SAV[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $SAV[9] . '</td><td>' . $SAV[8] . '</td><td>' . $SAV[7] . '</td><td>' . $SAV[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Asc == 9)
{
	echo '<td>' . $SAV[12] . '</td><td>' . $SAV[1] . '</td><td>' . $SAV[2] . '</td><td>' . $SAV[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[11] . '</td><td bgcolor="#CCFFFF" colspan="2" rowspan="2"><strong>SAV</strong></td><td>' . $SAV[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[10] . '</td><td>' . $SAV[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td bgcolor="#CCFFFF">' . $SAV[9] . '</td><td>' . $SAV[8] . '</td><td>' . $SAV[7] . '</td><td>' . $SAV[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Asc == 8)
{
	echo '<td>' . $SAV[12] . '</td><td>' . $SAV[1] . '</td><td>' . $SAV[2] . '</td><td>' . $SAV[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[11] . '</td><td bgcolor="#CCFFFF" colspan="2" rowspan="2"><strong>SAV</strong></td><td>' . $SAV[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[10] . '</td><td>' . $SAV[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $SAV[9] . '</td><td bgcolor="#CCFFFF">' . $SAV[8] . '</td><td>' . $SAV[7] . '</td><td>' . $SAV[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Asc == 7)
{
	echo '<td>' . $SAV[12] . '</td><td>' . $SAV[1] . '</td><td>' . $SAV[2] . '</td><td>' . $SAV[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[11] . '</td><td bgcolor="#CCFFFF" colspan="2" rowspan="2"><strong>SAV</strong></td><td>' . $SAV[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[10] . '</td><td>' . $SAV[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $SAV[9] . '</td><td>' . $SAV[8] . '</td><td bgcolor="#CCFFFF">' . $SAV[7] . '</td><td>' . $SAV[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Asc == 6)
{
	echo '<td>' . $SAV[12] . '</td><td>' . $SAV[1] . '</td><td>' . $SAV[2] . '</td><td>' . $SAV[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[11] . '</td><td bgcolor="#CCFFFF" colspan="2" rowspan="2"><strong>SAV</strong></td><td>' . $SAV[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $SAV[10] . '</td><td>' . $SAV[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $SAV[9] . '</td><td>' . $SAV[8] . '</td><td>' . $SAV[7] . '</td><td bgcolor="#CCFFFF">' . $SAV[6] . '</td>';

	echo '</tr>';
}






?>
</table>

<!-- Matrices for Ashtakavarga SAV Ends -->

</td>

<td>

<table class="bb" align="center">
<tr align="center">
<?php
If ($tmp_Rasi_Sun == 12)
{
	echo '<td bgcolor="#FFFF00">' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[11] . '</td><td bgcolor="#FFFF00" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option" href="#modal-table-sun" title="View Sun PAV" role="button" class="green" data-toggle="modal"> Sun </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sun[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	echo '</tr>';

}

If ($tmp_Rasi_Sun == 1)
{
	echo '<td>' . $total_sun[12] . '</td><td bgcolor="#FFFF00">' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[11] . '</td><td bgcolor="#FFFF00" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option" href="#modal-table-sun" title="View Sun PAV" role="button" class="green" data-toggle="modal"> Sun </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sun[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Sun == 2)
{
	echo '<td>' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td bgcolor="#FFFF00">' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[11] . '</td><td bgcolor="#FFFF00" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option" href="#modal-table-sun" title="View Sun PAV" role="button" class="green" data-toggle="modal"> Sun </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sun[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Sun == 3)
{
	echo '<td>' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td bgcolor="#FFFF00">' . $total_sun[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[11] . '</td><td bgcolor="#FFFF00" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option" href="#modal-table-sun" title="View Sun PAV" role="button" class="green" data-toggle="modal"> Sun </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sun[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Sun == 11)
{
	echo '<td>' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#FFFF00">' . $total_sun[11] . '</td><td bgcolor="#FFFF00" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option" href="#modal-table-sun" title="View Sun PAV" role="button" class="green" data-toggle="modal"> Sun </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sun[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Sun == 4)
{
	echo '<td>' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[11] . '</td><td bgcolor="#FFFF00" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option" href="#modal-table-sun" title="View Sun PAV" role="button" class="green" data-toggle="modal"> Sun </a>
	</h4>
	
	<?php
	echo '</td><td bgcolor="#FFFF00">' . $total_sun[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Sun == 10)
{
	echo '<td>' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[11] . '</td><td bgcolor="#FFFF00" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option" href="#modal-table-sun" title="View Sun PAV" role="button" class="green" data-toggle="modal"> Sun </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sun[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#FFFF00">' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Sun == 5)
{
	echo '<td>' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[11] . '</td><td bgcolor="#FFFF00" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option" href="#modal-table-sun" title="View Sun PAV" role="button" class="green" data-toggle="modal"> Sun </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sun[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[10] . '</td><td bgcolor="#FFFF00">' . $total_sun[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Sun == 9)
{
	echo '<td>' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[11] . '</td><td bgcolor="#FFFF00" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option" href="#modal-table-sun" title="View Sun PAV" role="button" class="green" data-toggle="modal"> Sun </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sun[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td bgcolor="#FFFF00">' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Sun == 8)
{
	echo '<td>' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[11] . '</td><td bgcolor="#FFFF00" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option" href="#modal-table-sun" title="View Sun PAV" role="button" class="green" data-toggle="modal"> Sun </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sun[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sun[9] . '</td><td bgcolor="#FFFF00">' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Sun == 7)
{
	echo '<td>' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[11] . '</td><td bgcolor="#FFFF00" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option" href="#modal-table-sun" title="View Sun PAV" role="button" class="green" data-toggle="modal"> Sun </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sun[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td bgcolor="#FFFF00">' . $total_sun[7] . '</td><td>' . $total_sun[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Sun == 6)
{
	echo '<td>' . $total_sun[12] . '</td><td>' . $total_sun[1] . '</td><td>' . $total_sun[2] . '</td><td>' . $total_sun[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[11] . '</td><td bgcolor="#FFFF00" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option" href="#modal-table-sun" title="View Sun PAV" role="button" class="green" data-toggle="modal"> Sun </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sun[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sun[10] . '</td><td>' . $total_sun[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sun[9] . '</td><td>' . $total_sun[8] . '</td><td>' . $total_sun[7] . '</td><td bgcolor="#FFFF00">' . $total_sun[6] . '</td>';

	echo '</tr>';
}



?>
</table>


<!-- Matrices for Ashtakavarga Sun Ends -->
</td>

<td>
	<table class="bb" align="center">
<tr align="center">
<?php
If ($tmp_Rasi_Moon == 12)
{
	echo '<td bgcolor="#FF99CC">' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[11] . '</td><td bgcolor="#FF99CC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option2" href="#modal-table-moon" title="View Moon PAV" role="button" class="green" data-toggle="modal"> Moon </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_moon[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	echo '</tr>';

}

If ($tmp_Rasi_Moon == 1)
{
	echo '<td>' . $total_moon[12] . '</td><td bgcolor="#FF99CC">' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[11] . '</td><td bgcolor="#FF99CC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option2" href="#modal-table-moon" title="View Moon PAV" role="button" class="green" data-toggle="modal"> Moon </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_moon[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Moon == 2)
{
	echo '<td>' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td bgcolor="#FF99CC">' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[11] . '</td><td bgcolor="#FF99CC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option2" href="#modal-table-moon" title="View Moon PAV" role="button" class="green" data-toggle="modal"> Moon </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_moon[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Moon == 3)
{
	echo '<td>' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td bgcolor="#FF99CC">' . $total_moon[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[11] . '</td><td bgcolor="#FF99CC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option2" href="#modal-table-moon" title="View Moon PAV" role="button" class="green" data-toggle="modal"> Moon </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_moon[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Moon == 11)
{
	echo '<td>' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#FF99CC">' . $total_moon[11] . '</td><td bgcolor="#FF99CC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option2" href="#modal-table-moon" title="View Moon PAV" role="button" class="green" data-toggle="modal"> Moon </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_moon[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Moon == 4)
{
	echo '<td>' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[11] . '</td><td bgcolor="#FF99CC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option2" href="#modal-table-moon" title="View Moon PAV" role="button" class="green" data-toggle="modal"> Moon </a>
	</h4>
	
	<?php
	echo '</td><td bgcolor="#FF99CC">' . $total_moon[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Moon == 10)
{
	echo '<td>' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[11] . '</td><td bgcolor="#FF99CC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option2" href="#modal-table-moon" title="View Moon PAV" role="button" class="green" data-toggle="modal"> Moon </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_moon[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#FF99CC">' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Moon == 5)
{
	echo '<td>' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[11] . '</td><td bgcolor="#FF99CC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option2" href="#modal-table-moon" title="View Moon PAV" role="button" class="green" data-toggle="modal"> Moon </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_moon[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[10] . '</td><td bgcolor="#FF99CC">' . $total_moon[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Moon == 9)
{
	echo '<td>' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[11] . '</td><td bgcolor="#FF99CC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option2" href="#modal-table-moon" title="View Moon PAV" role="button" class="green" data-toggle="modal"> Moon </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_moon[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td bgcolor="#FF99CC">' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Moon == 8)
{
	echo '<td>' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[11] . '</td><td bgcolor="#FF99CC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option2" href="#modal-table-moon" title="View Moon PAV" role="button" class="green" data-toggle="modal"> Moon </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_moon[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_moon[9] . '</td><td bgcolor="#FF99CC">' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Moon == 7)
{
	echo '<td>' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[11] . '</td><td bgcolor="#FF99CC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option2" href="#modal-table-moon" title="View Moon PAV" role="button" class="green" data-toggle="modal"> Moon </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_moon[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td bgcolor="#FF99CC">' . $total_moon[7] . '</td><td>' . $total_moon[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Moon == 6)
{
	echo '<td>' . $total_moon[12] . '</td><td>' . $total_moon[1] . '</td><td>' . $total_moon[2] . '</td><td>' . $total_moon[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[11] . '</td><td bgcolor="#FF99CC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option2" href="#modal-table-moon" title="View Moon PAV" role="button" class="green" data-toggle="modal"> Moon </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_moon[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_moon[10] . '</td><td>' . $total_moon[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_moon[9] . '</td><td>' . $total_moon[8] . '</td><td>' . $total_moon[7] . '</td><td bgcolor="#FF99CC">' . $total_moon[6] . '</td>';

	echo '</tr>';
}

?>
</table>

<!-- Matrices for Ashtakavarga Moon Ends -->
</td>

</tr>

<tr>
<td>
<table class="bb" align="center">
<tr align="center">

<?php
If ($tmp_Rasi_Mar == 12)
{
	echo '<td bgcolor="#FF0000">' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[11] . '</td><td bgcolor="#FF0000" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option3" href="#modal-table-mar" title="View Mars PAV" role="button" class="green" data-toggle="modal"> Mar </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mar[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	echo '</tr>';

}

If ($tmp_Rasi_Mar == 1)
{
	echo '<td>' . $total_mar[12] . '</td><td bgcolor="#FF0000">' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[11] . '</td><td bgcolor="#FF0000" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option3" href="#modal-table-mar" title="View Mars PAV" role="button" class="green" data-toggle="modal"> Mar </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mar[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Mar == 2)
{
	echo '<td>' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td bgcolor="#FF0000">' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[11] . '</td><td bgcolor="#FF0000" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option3" href="#modal-table-mar" title="View Mars PAV" role="button" class="green" data-toggle="modal"> Mar </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mar[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Mar == 3)
{
	echo '<td>' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td bgcolor="#FF0000">' . $total_mar[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[11] . '</td><td bgcolor="#FF0000" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option3" href="#modal-table-mar" title="View Mars PAV" role="button" class="green" data-toggle="modal"> Mar </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mar[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Mar == 11)
{
	echo '<td>' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#FF0000">' . $total_mar[11] . '</td><td bgcolor="#FF0000" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option3" href="#modal-table-mar" title="View Mars PAV" role="button" class="green" data-toggle="modal"> Mar </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mar[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Mar == 4)
{
	echo '<td>' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[11] . '</td><td bgcolor="#FF0000" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option3" href="#modal-table-mar" title="View Mars PAV" role="button" class="green" data-toggle="modal"> Mar </a>
	</h4>
	
	<?php
	echo '</td><td bgcolor="#FF0000">' . $total_mar[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Mar == 10)
{
	echo '<td>' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[11] . '</td><td bgcolor="#FF0000" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option3" href="#modal-table-mar" title="View Mars PAV" role="button" class="green" data-toggle="modal"> Mar </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mar[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#FF0000">' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Mar == 5)
{
	echo '<td>' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[11] . '</td><td bgcolor="#FF0000" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option3" href="#modal-table-mar" title="View Mars PAV" role="button" class="green" data-toggle="modal"> Mar </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mar[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[10] . '</td><td bgcolor="#FF0000">' . $total_mar[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Mar == 9)
{
	echo '<td>' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[11] . '</td><td bgcolor="#FF0000" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option3" href="#modal-table-mar" title="View Mars PAV" role="button" class="green" data-toggle="modal"> Mar </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mar[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td bgcolor="#FF0000">' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Mar == 8)
{
	echo '<td>' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[11] . '</td><td bgcolor="#FF0000" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option3" href="#modal-table-mar" title="View Mars PAV" role="button" class="green" data-toggle="modal"> Mar </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mar[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mar[9] . '</td><td bgcolor="#FF0000">' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Mar == 7)
{
	echo '<td>' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[11] . '</td><td bgcolor="#FF0000" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option3" href="#modal-table-mar" title="View Mars PAV" role="button" class="green" data-toggle="modal"> Mar </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mar[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td bgcolor="#FF0000">' . $total_mar[7] . '</td><td>' . $total_mar[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Mar == 6)
{
	echo '<td>' . $total_mar[12] . '</td><td>' . $total_mar[1] . '</td><td>' . $total_mar[2] . '</td><td>' . $total_mar[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[11] . '</td><td bgcolor="#FF0000" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option3" href="#modal-table-mar" title="View Mars PAV" role="button" class="green" data-toggle="modal"> Mar </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mar[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mar[10] . '</td><td>' . $total_mar[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mar[9] . '</td><td>' . $total_mar[8] . '</td><td>' . $total_mar[7] . '</td><td bgcolor="#FF0000">' . $total_mar[6] . '</td>';

	echo '</tr>';
}

?>


</table>

<!-- Matrices for Ashtakavarga Mars Ends -->

</td>

<td bgcolor="#66CC00">
<strong>(BAV) <br>
Bhinna Ashtakavarga of :<br>
<?php
echo $_SESSION['name'];
?>
</strong>
</td>

<td>
<table class="bb" align="center">
<tr align="center">

<?php
If ($tmp_Rasi_Mer == 12)
{
	echo '<td bgcolor="#CCFFCC">' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[11] . '</td><td bgcolor="#CCFFCC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option4" href="#modal-table-mer" title="View Mercury PAV" role="button" class="green" data-toggle="modal"> Mer </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mer[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	echo '</tr>';

}

If ($tmp_Rasi_Mer == 1)
{
	echo '<td>' . $total_mer[12] . '</td><td bgcolor="#CCFFCC">' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[11] . '</td><td bgcolor="#CCFFCC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option4" href="#modal-table-mer" title="View Mercury PAV" role="button" class="green" data-toggle="modal"> Mer </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mer[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Mer == 2)
{
	echo '<td>' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td bgcolor="#CCFFCC">' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[11] . '</td><td bgcolor="#CCFFCC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option4" href="#modal-table-mer" title="View Mercury PAV" role="button" class="green" data-toggle="modal"> Mer </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mer[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Mer == 3)
{
	echo '<td>' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td bgcolor="#CCFFCC">' . $total_mer[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[11] . '</td><td bgcolor="#CCFFCC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option4" href="#modal-table-mer" title="View Mercury PAV" role="button" class="green" data-toggle="modal"> Mer </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mer[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Mer == 11)
{
	echo '<td>' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#CCFFCC">' . $total_mer[11] . '</td><td bgcolor="#CCFFCC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option4" href="#modal-table-mer" title="View Mercury PAV" role="button" class="green" data-toggle="modal"> Mer </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mer[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Mer == 4)
{
	echo '<td>' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[11] . '</td><td bgcolor="#CCFFCC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option4" href="#modal-table-mer" title="View Mercury PAV" role="button" class="green" data-toggle="modal"> Mer </a>
	</h4>
	
	<?php
	echo '</td><td bgcolor="#CCFFCC">' . $total_mer[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Mer == 10)
{
	echo '<td>' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[11] . '</td><td bgcolor="#CCFFCC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option4" href="#modal-table-mer" title="View Mercury PAV" role="button" class="green" data-toggle="modal"> Mer </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mer[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#CCFFCC">' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Mer == 5)
{
	echo '<td>' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[11] . '</td><td bgcolor="#CCFFCC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option4" href="#modal-table-mer" title="View Mercury PAV" role="button" class="green" data-toggle="modal"> Mer </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mer[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[10] . '</td><td bgcolor="#CCFFCC">' . $total_mer[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Mer == 9)
{
	echo '<td>' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[11] . '</td><td bgcolor="#CCFFCC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option4" href="#modal-table-mer" title="View Mercury PAV" role="button" class="green" data-toggle="modal"> Mer </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mer[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td bgcolor="#CCFFCC">' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Mer == 8)
{
	echo '<td>' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[11] . '</td><td bgcolor="#CCFFCC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option4" href="#modal-table-mer" title="View Mercury PAV" role="button" class="green" data-toggle="modal"> Mer </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mer[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mer[9] . '</td><td bgcolor="#CCFFCC">' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Mer == 7)
{
	echo '<td>' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[11] . '</td><td bgcolor="#CCFFCC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option4" href="#modal-table-mer" title="View Mercury PAV" role="button" class="green" data-toggle="modal"> Mer </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mer[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td bgcolor="#CCFFCC">' . $total_mer[7] . '</td><td>' . $total_mer[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Mer == 6)
{
	echo '<td>' . $total_mer[12] . '</td><td>' . $total_mer[1] . '</td><td>' . $total_mer[2] . '</td><td>' . $total_mer[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[11] . '</td><td bgcolor="#CCFFCC" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option4" href="#modal-table-mer" title="View Mercury PAV" role="button" class="green" data-toggle="modal"> Mer </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_mer[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_mer[10] . '</td><td>' . $total_mer[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_mer[9] . '</td><td>' . $total_mer[8] . '</td><td>' . $total_mer[7] . '</td><td bgcolor="#CCFFCC">' . $total_mer[6] . '</td>';

	echo '</tr>';
}

?>


</table>

<!-- Matrices for Ashtakavarga Mercury Ends -->
</td>
</tr>

<tr>
<td>
<table class="bb" align="center">
<tr align="center">

<?php
If ($tmp_Rasi_Jup == 12)
{
	echo '<td bgcolor="#00FFFF">' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[11] . '</td><td bgcolor="#00FFFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option5" href="#modal-table-jup" title="View Jupiter PAV" role="button" class="green" data-toggle="modal"> Jup </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_jup[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	echo '</tr>';

}

If ($tmp_Rasi_Jup == 1)
{
	echo '<td>' . $total_jup[12] . '</td><td bgcolor="#00FFFF">' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[11] . '</td><td bgcolor="#00FFFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option5" href="#modal-table-jup" title="View Jupiter PAV" role="button" class="green" data-toggle="modal"> Jup </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_jup[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Jup == 2)
{
	echo '<td>' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td bgcolor="#00FFFF">' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[11] . '</td><td bgcolor="#00FFFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option5" href="#modal-table-jup" title="View Jupiter PAV" role="button" class="green" data-toggle="modal"> Jup </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_jup[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Jup == 3)
{
	echo '<td>' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td bgcolor="#00FFFF">' . $total_jup[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[11] . '</td><td bgcolor="#00FFFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option5" href="#modal-table-jup" title="View Jupiter PAV" role="button" class="green" data-toggle="modal"> Jup </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_jup[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Jup == 11)
{
	echo '<td>' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#00FFFF">' . $total_jup[11] . '</td><td bgcolor="#00FFFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option5" href="#modal-table-jup" title="View Jupiter PAV" role="button" class="green" data-toggle="modal"> Jup </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_jup[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Jup == 4)
{
	echo '<td>' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[11] . '</td><td bgcolor="#00FFFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option5" href="#modal-table-jup" title="View Jupiter PAV" role="button" class="green" data-toggle="modal"> Jup </a>
	</h4>
	
	<?php
	echo '</td><td bgcolor="#00FFFF">' . $total_jup[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Jup == 10)
{
	echo '<td>' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[11] . '</td><td bgcolor="#00FFFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option5" href="#modal-table-jup" title="View Jupiter PAV" role="button" class="green" data-toggle="modal"> Jup </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_jup[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#00FFFF">' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Jup == 5)
{
	echo '<td>' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[11] . '</td><td bgcolor="#00FFFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option5" href="#modal-table-jup" title="View Jupiter PAV" role="button" class="green" data-toggle="modal"> Jup </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_jup[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[10] . '</td><td bgcolor="#00FFFF">' . $total_jup[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Jup == 9)
{
	echo '<td>' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[11] . '</td><td bgcolor="#00FFFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option5" href="#modal-table-jup" title="View Jupiter PAV" role="button" class="green" data-toggle="modal"> Jup </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_jup[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td bgcolor="#00FFFF">' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Jup == 8)
{
	echo '<td>' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[11] . '</td><td bgcolor="#00FFFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option5" href="#modal-table-jup" title="View Jupiter PAV" role="button" class="green" data-toggle="modal"> Jup </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_jup[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_jup[9] . '</td><td bgcolor="#00FFFF">' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Jup == 7)
{
	echo '<td>' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[11] . '</td><td bgcolor="#00FFFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option5" href="#modal-table-jup" title="View Jupiter PAV" role="button" class="green" data-toggle="modal"> Jup </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_jup[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td bgcolor="#00FFFF">' . $total_jup[7] . '</td><td>' . $total_jup[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Jup == 6)
{
	echo '<td>' . $total_jup[12] . '</td><td>' . $total_jup[1] . '</td><td>' . $total_jup[2] . '</td><td>' . $total_jup[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[11] . '</td><td bgcolor="#00FFFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option5" href="#modal-table-jup" title="View Jupiter PAV" role="button" class="green" data-toggle="modal"> Jup </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_jup[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_jup[10] . '</td><td>' . $total_jup[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_jup[9] . '</td><td>' . $total_jup[8] . '</td><td>' . $total_jup[7] . '</td><td bgcolor="#00FFFF">' . $total_jup[6] . '</td>';

	echo '</tr>';
}

?>


</table>

<!-- Matrices for Ashtakavarga Jupiter Ends -->

</td>
<td>
<table class="bb" align="center">
<tr align="center">

<?php
If ($tmp_Rasi_Ven == 12)
{
	echo '<td bgcolor="#99CCFF">' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[11] . '</td><td bgcolor="#99CCFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option6" href="#modal-table-ven" title="View Venus PAV" role="button" class="green" data-toggle="modal"> Ven </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_ven[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	echo '</tr>';

}

If ($tmp_Rasi_Ven == 1)
{
	echo '<td>' . $total_ven[12] . '</td><td bgcolor="#99CCFF">' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[11] . '</td><td bgcolor="#99CCFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option6" href="#modal-table-ven" title="View Venus PAV" role="button" class="green" data-toggle="modal"> Ven </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_ven[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Ven == 2)
{
	echo '<td>' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td bgcolor="#99CCFF">' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[11] . '</td><td bgcolor="#99CCFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option6" href="#modal-table-ven" title="View Venus PAV" role="button" class="green" data-toggle="modal"> Ven </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_ven[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Ven == 3)
{
	echo '<td>' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td bgcolor="#99CCFF">' . $total_ven[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[11] . '</td><td bgcolor="#99CCFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option6" href="#modal-table-ven" title="View Venus PAV" role="button" class="green" data-toggle="modal"> Ven </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_ven[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Ven == 11)
{
	echo '<td>' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#99CCFF">' . $total_ven[11] . '</td><td bgcolor="#99CCFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option6" href="#modal-table-ven" title="View Venus PAV" role="button" class="green" data-toggle="modal"> Ven </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_ven[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Ven == 4)
{
	echo '<td>' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[11] . '</td><td bgcolor="#99CCFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option6" href="#modal-table-ven" title="View Venus PAV" role="button" class="green" data-toggle="modal"> Ven </a>
	</h4>
	
	<?php
	echo '</td><td bgcolor="#99CCFF">' . $total_ven[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Ven == 10)
{
	echo '<td>' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[11] . '</td><td bgcolor="#99CCFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option6" href="#modal-table-ven" title="View Venus PAV" role="button" class="green" data-toggle="modal"> Ven </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_ven[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#99CCFF">' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Ven == 5)
{
	echo '<td>' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[11] . '</td><td bgcolor="#99CCFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option6" href="#modal-table-ven" title="View Venus PAV" role="button" class="green" data-toggle="modal"> Ven </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_ven[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[10] . '</td><td bgcolor="#99CCFF">' . $total_ven[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Ven == 9)
{
	echo '<td>' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[11] . '</td><td bgcolor="#99CCFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option6" href="#modal-table-ven" title="View Venus PAV" role="button" class="green" data-toggle="modal"> Ven </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_ven[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td bgcolor="#99CCFF">' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Ven == 8)
{
	echo '<td>' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[11] . '</td><td bgcolor="#99CCFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option6" href="#modal-table-ven" title="View Venus PAV" role="button" class="green" data-toggle="modal"> Ven </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_ven[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_ven[9] . '</td><td bgcolor="#99CCFF">' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Ven == 7)
{
	echo '<td>' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[11] . '</td><td bgcolor="#99CCFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option6" href="#modal-table-ven" title="View Venus PAV" role="button" class="green" data-toggle="modal"> Ven </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_ven[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td bgcolor="#99CCFF">' . $total_ven[7] . '</td><td>' . $total_ven[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Ven == 6)
{
	echo '<td>' . $total_ven[12] . '</td><td>' . $total_ven[1] . '</td><td>' . $total_ven[2] . '</td><td>' . $total_ven[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[11] . '</td><td bgcolor="#99CCFF" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option6" href="#modal-table-ven" title="View Venus PAV" role="button" class="green" data-toggle="modal"> Ven </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_ven[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_ven[10] . '</td><td>' . $total_ven[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_ven[9] . '</td><td>' . $total_ven[8] . '</td><td>' . $total_ven[7] . '</td><td bgcolor="#99CCFF">' . $total_ven[6] . '</td>';

	echo '</tr>';
}

?>
</table>


<!-- Matrices for Ashtakavarga Venus Ends -->
</td>
<td>
<table class="bb" align="center">
<tr align="center">

<?php

If ($tmp_Rasi_Sat == 12)
{
	echo '<td bgcolor="#FFCC99">' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[11] . '</td><td bgcolor="#FFCC99" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option7" href="#modal-table-sat" title="View Saturn PAV" role="button" class="green" data-toggle="modal"> Sat </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sat[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	echo '</tr>';

}

If ($tmp_Rasi_Sat == 1)
{
	echo '<td>' . $total_sat[12] . '</td><td bgcolor="#FFCC99">' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[11] . '</td><td bgcolor="#FFCC99" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option7" href="#modal-table-sat" title="View Saturn PAV" role="button" class="green" data-toggle="modal"> Sat </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sat[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Sat == 2)
{
	echo '<td>' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td bgcolor="#FFCC99">' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[11] . '</td><td bgcolor="#FFCC99" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option7" href="#modal-table-sat" title="View Saturn PAV" role="button" class="green" data-toggle="modal"> Sat </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sat[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Sat == 3)
{
	echo '<td>' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td bgcolor="#FFCC99">' . $total_sat[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[11] . '</td><td bgcolor="#FFCC99" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option7" href="#modal-table-sat" title="View Saturn PAV" role="button" class="green" data-toggle="modal"> Sat </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sat[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Sat == 11)
{
	echo '<td>' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#FFCC99">' . $total_sat[11] . '</td><td bgcolor="#FFCC99" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option7" href="#modal-table-sat" title="View Saturn PAV" role="button" class="green" data-toggle="modal"> Sat </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sat[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Sat == 4)
{
	echo '<td>' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[11] . '</td><td bgcolor="#FFCC99" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option7" href="#modal-table-sat" title="View Saturn PAV" role="button" class="green" data-toggle="modal"> Sat </a>
	</h4>
	
	<?php
	echo '</td><td bgcolor="#FFCC99">' . $total_sat[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Sat == 10)
{
	echo '<td>' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[11] . '</td><td bgcolor="#FFCC99" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option7" href="#modal-table-sat" title="View Saturn PAV" role="button" class="green" data-toggle="modal"> Sat </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sat[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td bgcolor="#FFCC99">' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Sat == 5)
{
	echo '<td>' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[11] . '</td><td bgcolor="#FFCC99" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option7" href="#modal-table-sat" title="View Saturn PAV" role="button" class="green" data-toggle="modal"> Sat </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sat[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[10] . '</td><td bgcolor="#FFCC99">' . $total_sat[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Sat == 9)
{
	echo '<td>' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[11] . '</td><td bgcolor="#FFCC99" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option7" href="#modal-table-sat" title="View Saturn PAV" role="button" class="green" data-toggle="modal"> Sat </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sat[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td bgcolor="#FFCC99">' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Sat == 8)
{
	echo '<td>' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[11] . '</td><td bgcolor="#FFCC99" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option7" href="#modal-table-sat" title="View Saturn PAV" role="button" class="green" data-toggle="modal"> Sat </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sat[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sat[9] . '</td><td bgcolor="#FFCC99">' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Sat == 7)
{
	echo '<td>' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[11] . '</td><td bgcolor="#FFCC99" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option7" href="#modal-table-sat" title="View Saturn PAV" role="button" class="green" data-toggle="modal"> Sat </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sat[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td bgcolor="#FFCC99">' . $total_sat[7] . '</td><td>' . $total_sat[6] . '</td>';

	echo '</tr>';
}

If ($tmp_Rasi_Sat == 6)
{
	echo '<td>' . $total_sat[12] . '</td><td>' . $total_sat[1] . '</td><td>' . $total_sat[2] . '</td><td>' . $total_sat[3] . '</td>';
	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[11] . '</td><td bgcolor="#FFCC99" colspan="2" rowspan="2">';
	?>
	<h4 class="pink">

		<a id="hide-option7" href="#modal-table-sat" title="View Saturn PAV" role="button" class="green" data-toggle="modal"> Sat </a>
	</h4>
	
	<?php
	echo '</td><td>' . $total_sat[4] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';

	echo '<td>' . $total_sat[10] . '</td><td>' . $total_sat[5] . '</td>';

	echo '</tr>';
	echo '<tr align="center">';
	echo '<td>' . $total_sat[9] . '</td><td>' . $total_sat[8] . '</td><td>' . $total_sat[7] . '</td><td bgcolor="#FFCC99">' . $total_sat[6] . '</td>';

	echo '</tr>';
}


?>
</table>


<!-- Matrices for Ashtakavarga Saturn Ends -->
</td>
</tr>
</table>
<br>
<br>

<!-- Combined Ashtakavarga details ends here -->

<!-- Body ends here -->

<!-- Modal Table for Sun starts here -->

								<div id="modal-table-sun" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header" align="center">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													Prastara Ashtakavarga for Sun
												</div>
											</div>

											<div class="modal-body no-padding">

<!--   -->

<!-- PAV Sun Ashtakavarga Rasi Chart display start -->

<table class="c"  align="center">
<tr align="center">
<?php

$txt12= " ";

If ($tmp_tlag[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_tsun[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_tmoon[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_tmar[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_tmer[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_tjup[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_tven[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_tsat[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-inverse">Sat </span>';
}

//Display for (PAV) Prashtara Ashtakavarga of SUN start -

If ($tmp_Rasi_Sun == 12)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[12];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt12;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[12];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt12;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';

// Aries Sign


$txt1= " ";

If ($tmp_tlag[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_tsun[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_tmoon[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_tmar[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_tmer[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_tjup[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_tven[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_tsat[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sun == 1)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[1];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt1;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[1];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt1;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Taurus sign

$txt2= " ";

If ($tmp_tlag[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_tsun[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_tmoon[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_tmar[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_tmer[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_tjup[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_tven[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_tsat[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sun == 2)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[2];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt2;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[2];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt2;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Gemini Sign



$txt3= " ";

If ($tmp_tlag[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_tsun[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_tmoon[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_tmar[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_tmer[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_tjup[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_tven[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_tsat[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sun == 3)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[3];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt3;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[3];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt3;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>
</tr>
<!-- 2nd Row starts -->

<tr align="center">

<?php
//Aquarius sign


$txt11= " ";

If ($tmp_tlag[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_tsun[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_tmoon[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_tmar[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_tmer[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_tjup[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_tven[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_tsat[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sun == 11)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[11];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt11;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[11];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt11;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';

echo '<td colspan="2" rowspan="2" bgcolor="#99DDFF">Prastara Ashtakavarga<br>';
echo "PAV of Sun";
echo '<br>';


echo '</td>';

// Cancer Sign


$txt4= " ";

If ($tmp_tlag[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_tsun[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_tmoon[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_tmar[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_tmer[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_tjup[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_tven[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_tsat[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sun == 4)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[4];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt4;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[4];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt4;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>
</tr>
<!-- 3rd row starts -->

<tr align="center">
<?php
//Capricorn sign


$txt10= " ";

If ($tmp_tlag[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_tsun[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_tmoon[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_tmar[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_tmer[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_tjup[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_tven[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_tsat[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sun == 10)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[10];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt10;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[10];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt10;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Leo sign


$txt5= " ";

If ($tmp_tlag[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_tsun[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_tmoon[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_tmar[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_tmer[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_tjup[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_tven[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_tsat[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sun == 5)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[5];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt5;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[5];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt5;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
  echo '</span>';
echo '</td>';
?>
</tr>
<!-- 4th row starts -->

<tr align="center">
<?php
// Sagittarius sign


$txt9= " ";

If ($tmp_tlag[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_tsun[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_tmoon[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_tmar[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_tmer[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_tjup[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_tven[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_tsat[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sun == 9)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[9];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt9;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[9];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt9;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Scorpio Sign


$txt8= " ";

If ($tmp_tlag[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_tsun[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_tmoon[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_tmar[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_tmer[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_tjup[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_tven[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_tsat[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sun == 8)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[8];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt8;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[8];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt8;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Libra Sign

$txt7= " ";

If ($tmp_tlag[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_tsun[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_tmoon[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_tmar[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_tmer[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_tjup[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_tven[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_tsat[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sun == 7)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[7];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt7;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[7];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt7;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Virgo Sign


$txt6= " ";

If ($tmp_tlag[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_tsun[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_tmoon[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_tmar[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_tmer[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_tjup[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_tven[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_tsat[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sun == 6)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[6];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt6;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_totsun[6];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt6;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>

</tr>
</table>


<!-- Rasi Chart display end -->
<!-- Display for (PAV) Prashtara Ashtakavarga of SUN ends -->


<!--   -->

											</div>

											<div class="modal-footer no-margin-top">
												<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Close
												</button>

												
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>

<!-- Modal Table for Sun Ends here -->

<!-- Modal Table for Moon starts here -->

								<div id="modal-table-moon" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header" align="center">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													Prastara Ashtakavarga for Moon
												</div>
											</div>

											<div class="modal-body no-padding">

<!--   -->
<!-- PAV Moon Ashtakavarga Rasi Chart display start -->

<table class="c"  align="center">
<tr align="center">
<?php

$txt12= " ";

If ($tmp_t1lag[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t1sun[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t1moon[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t1mar[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t1mer[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t1jup[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t1ven[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t1sat[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-inverse">Sat </span>';
}

//Display for (PAV) Prashtara Ashtakavarga of Moon start -

If ($tmp_Rasi_Moon == 12)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[12];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt12;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[12];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt12;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';

// Aries Sign


$txt1= " ";

If ($tmp_t1lag[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t1sun[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t1moon[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t1mar[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t1mer[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t1jup[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t1ven[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t1sat[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Moon == 1)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[1];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt1;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[1];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt1;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Taurus sign

$txt2= " ";

If ($tmp_t1lag[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t1sun[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t1moon[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t1mar[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t1mer[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t1jup[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t1ven[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t1sat[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Moon == 2)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[2];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt2;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[2];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt2;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Gemini Sign



$txt3= " ";

If ($tmp_t1lag[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t1sun[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t1moon[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t1mar[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t1mer[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t1jup[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t1ven[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t1sat[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Moon == 3)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[3];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt3;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[3];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt3;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>

</tr>
<!-- 2nd Row starts -->

<tr align="center">

<?php
//Aquarius sign


$txt11= " ";

If ($tmp_t1lag[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t1sun[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t1moon[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t1mar[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t1mer[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t1jup[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t1ven[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t1sat[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Moon == 11)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[11];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt11;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[11];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt11;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';

echo '<td colspan="2" rowspan="2" bgcolor="#99DDFF">Prastara Ashtakavarga<br>';
echo "PAV of Moon";
echo '<br>';


echo '</td>';

// Cancer Sign


$txt4= " ";

If ($tmp_t1lag[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t1sun[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t1moon[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t1mar[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t1mer[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t1jup[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t1ven[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t1sat[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Moon == 4)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[4];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt4;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[4];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt4;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>
</tr>
<!-- 3rd row starts -->

<tr align="center">
<?php
//Capricorn sign


$txt10= " ";

If ($tmp_t1lag[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t1sun[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t1moon[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t1mar[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t1mer[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t1jup[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t1ven[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t1sat[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Moon == 10)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[10];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt10;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[10];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt10;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Leo sign


$txt5= " ";

If ($tmp_t1lag[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t1sun[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t1moon[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t1mar[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t1mer[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t1jup[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t1ven[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t1sat[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Moon == 5)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[5];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt5;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[5];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt5;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
  echo '</span>';
echo '</td>';
?>
</tr>
<!-- 4th row starts -->

<tr align="center">
<?php
// Sagittarius sign


$txt9= " ";

If ($tmp_t1lag[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t1sun[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t1moon[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t1mar[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t1mer[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t1jup[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t1ven[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t1sat[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Moon == 9)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[9];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt9;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[9];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt9;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Scorpio Sign


$txt8= " ";

If ($tmp_t1lag[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t1sun[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t1moon[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t1mar[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t1mer[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t1jup[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t1ven[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t1sat[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Moon == 8)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[8];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt8;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[8];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt8;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Libra Sign

$txt7= " ";

If ($tmp_t1lag[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t1sun[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t1moon[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t1mar[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t1mer[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t1jup[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t1ven[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t1sat[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Moon == 7)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[7];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt7;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[7];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt7;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Virgo Sign


$txt6= " ";

If ($tmp_t1lag[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t1sun[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t1moon[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t1mar[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t1mer[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t1jup[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t1ven[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t1sat[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Moon == 6)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[6];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt6;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot1moon[6];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt6;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>
</tr>
</table>

<!-- Rasi Chart display end -->
<!-- Display for (PAV) Prashtara Ashtakavarga of Moon ends -->




<!--   -->

											</div>

											<div class="modal-footer no-margin-top">
												<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Close
												</button>

												
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>

<!-- Modal Table for Moon Ends here -->
<!-- Modal Table for Mars starts here -->

								<div id="modal-table-mar" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header" align="center">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													Prastara Ashtakavarga for Mars
												</div>
											</div>

											<div class="modal-body no-padding">

<!--   -->

<!-- PAV Mars Ashtakavarga Rasi Chart display start -->

<table class="c"  align="center">
<tr align="center">
<?php

$txt12= " ";

If ($tmp_t2lag[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t2sun[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t2moon[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t2mar[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t2mer[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t2jup[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t2ven[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t2sat[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-inverse">Sat </span>';
}

//Display for (PAV) Prashtara Ashtakavarga of Mars start -

If ($tmp_Rasi_Mar == 12)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[12];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt12;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[12];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt12;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';

// Aries Sign


$txt1= " ";

If ($tmp_t2lag[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t2sun[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t2moon[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t2mar[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t2mer[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t2jup[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t2ven[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t2sat[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mar == 1)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[1];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt1;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[1];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt1;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Taurus sign

$txt2= " ";

If ($tmp_t2lag[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t2sun[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t2moon[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t2mar[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t2mer[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t2jup[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t2ven[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t2sat[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mar == 2)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[2];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt2;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[2];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt2;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Gemini Sign



$txt3= " ";

If ($tmp_t2lag[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t2sun[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t2moon[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t2mar[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t2mer[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t2jup[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t2ven[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t2sat[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mar == 3)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[3];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt3;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[3];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt3;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>
</tr>
<!-- 2nd Row starts -->

<tr align="center">

<?php
//Aquarius sign


$txt11= " ";

If ($tmp_t2lag[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t2sun[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t2moon[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t2mar[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t2mer[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t2jup[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t2ven[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t2sat[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mar == 11)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[11];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt11;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[11];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt11;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';

echo '<td colspan="2" rowspan="2" bgcolor="#99DDFF">Prastara Ashtakavarga<br>';
echo "PAV of Mars";
echo '<br>';


echo '</td>';

// Cancer Sign


$txt4= " ";

If ($tmp_t2lag[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t2sun[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t2moon[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t2mar[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t2mer[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t2jup[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t2ven[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t2sat[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mar == 4)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[4];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt4;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[4];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt4;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>
</tr>
<!-- 3rd row starts -->

<tr align="center">
<?php
//Capricorn sign


$txt10= " ";

If ($tmp_t2lag[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t2sun[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t2moon[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t2mar[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t2mer[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t2jup[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t2ven[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t2sat[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mar == 10)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[10];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt10;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[10];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt10;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Leo sign


$txt5= " ";

If ($tmp_t2lag[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t2sun[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t2moon[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t2mar[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t2mer[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t2jup[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t2ven[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t2sat[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mar == 5)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[5];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt5;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[5];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt5;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
  echo '</span>';
echo '</td>';
?>
</tr>
<!-- 4th row starts -->

<tr align="center">
<?php
// Sagittarius sign


$txt9= " ";

If ($tmp_t2lag[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t2sun[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t2moon[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t2mar[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t2mer[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t2jup[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t2ven[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t2sat[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mar == 9)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[9];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt9;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[9];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt9;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Scorpio Sign


$txt8= " ";

If ($tmp_t2lag[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t2sun[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t2moon[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t2mar[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t2mer[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t2jup[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t2ven[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t2sat[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mar == 8)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[8];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt8;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[8];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt8;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Libra Sign

$txt7= " ";

If ($tmp_t2lag[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t2sun[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t2moon[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t2mar[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t2mer[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t2jup[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t2ven[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t2sat[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mar == 7)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[7];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt7;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[7];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt7;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Virgo Sign


$txt6= " ";

If ($tmp_t2lag[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t2sun[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t2moon[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t2mar[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t2mer[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t2jup[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t2ven[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t2sat[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mar == 6)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[6];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt6;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot2mar[6];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt6;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>
</tr>
</table>
</td>
<!-- Rasi Chart display end -->
<!-- Display for (PAV) Prashtara Ashtakavarga of Mars ends -->



<!--   -->

											</div>

											<div class="modal-footer no-margin-top">
												<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Close
												</button>

												
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>

<!-- Modal Table for Mars Ends here -->
<!-- Modal Table for Mer starts here -->

								<div id="modal-table-mer" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header" align="center">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													Prastara Ashtakavarga for Mercury
												</div>
											</div>

											<div class="modal-body no-padding">

<!--   -->

<!-- PAV Mer Ashtakavarga Rasi Chart display start -->

<table class="c"  align="center">
<tr align="center">
<?php

$txt12= " ";

If ($tmp_t3lag[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t3sun[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t3moon[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t3mar[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t3mer[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t3jup[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t3ven[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t3sat[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-inverse">Sat </span>';
}

//Display for (PAV) Prashtara Ashtakavarga of SUN start -

If ($tmp_Rasi_Mer == 12)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[12];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt12;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[12];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt12;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';

// Aries Sign


$txt1= " ";

If ($tmp_t3lag[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t3sun[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t3moon[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t3mar[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t3mer[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t3jup[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t3ven[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t3sat[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mer == 1)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[1];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt1;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[1];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt1;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Taurus sign

$txt2= " ";

If ($tmp_t3lag[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t3sun[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t3moon[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t3mar[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t3mer[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t3jup[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t3ven[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t3sat[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mer == 2)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[2];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt2;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[2];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt2;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Gemini Sign



$txt3= " ";

If ($tmp_t3lag[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t3sun[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t3moon[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t3mar[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t3mer[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t3jup[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t3ven[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t3sat[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mer == 3)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[3];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt3;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[3];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt3;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>
</tr>
<!-- 2nd Row starts -->

<tr align="center">

<?php
//Aquarius sign


$txt11= " ";

If ($tmp_t3lag[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t3sun[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t3moon[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t3mar[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t3mer[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t3jup[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t3ven[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t3sat[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mer == 11)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[11];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt11;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[11];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt11;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';

echo '<td colspan="2" rowspan="2" bgcolor="#99DDFF">Prastara Ashtakavarga<br>';
echo "PAV of Mercury";
echo '<br>';


echo '</td>';

// Cancer Sign


$txt4= " ";

If ($tmp_t3lag[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t3sun[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t3moon[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t3mar[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t3mer[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t3jup[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t3ven[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t3sat[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mer == 4)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[4];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt4;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[4];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt4;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>
</tr>
<!-- 3rd row starts -->

<tr align="center">
<?php
//Capricorn sign


$txt10= " ";

If ($tmp_t3lag[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t3sun[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t3moon[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t3mar[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t3mer[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t3jup[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t3ven[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t3sat[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mer == 10)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[10];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt10;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[10];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt10;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Leo sign


$txt5= " ";

If ($tmp_t3lag[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t3sun[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t3moon[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t3mar[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t3mer[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t3jup[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t3ven[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t3sat[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mer == 5)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[5];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt5;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[5];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt5;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
  echo '</span>';
echo '</td>';
?>
</tr>
<!-- 4th row starts -->

<tr align="center">
<?php
// Sagittarius sign


$txt9= " ";

If ($tmp_t3lag[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t3sun[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t3moon[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t3mar[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t3mer[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t3jup[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t3ven[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t3sat[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mer == 9)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[9];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt9;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[9];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt9;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Scorpio Sign


$txt8= " ";

If ($tmp_t3lag[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t3sun[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t3moon[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t3mar[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t3mer[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t3jup[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t3ven[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t3sat[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mer == 8)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[8];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt8;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[8];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt8;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Libra Sign

$txt7= " ";

If ($tmp_t3lag[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t3sun[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t3moon[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t3mar[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t3mer[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t3jup[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t3ven[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t3sat[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mer == 7)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[7];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt7;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[7];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt7;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Virgo Sign


$txt6= " ";

If ($tmp_t3lag[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t3sun[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t3moon[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t3mar[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t3mer[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t3jup[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t3ven[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t3sat[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Mer == 6)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[6];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt6;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot3mer[6];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt6;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>
</tr>
</table>
</td>
<!-- Rasi Chart display end -->
<!-- Display for (PAV) Prashtara Ashtakavarga of Mer ends -->





<!--   -->

											</div>

											<div class="modal-footer no-margin-top">
												<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Close
												</button>

												
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>

<!-- Modal Table for Mer Ends here -->
<!-- Modal Table for Jup starts here -->

								<div id="modal-table-jup" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header" align="center">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													Prastara Ashtakavarga for Jupiter
												</div>
											</div>

											<div class="modal-body no-padding">

<!--   -->

<!-- PAV Jup Ashtakavarga Rasi Chart display start -->

<table class="c"  align="center">
<tr align="center">
<?php

$txt12= " ";

If ($tmp_t4lag[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t4sun[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t4moon[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t4mar[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t4mer[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t4jup[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t4ven[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t4sat[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-inverse">Sat </span>';
}

//Display for (PAV) Prashtara Ashtakavarga of SUN start -

If ($tmp_Rasi_Jup == 12)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[12];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt12;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[12];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt12;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';

// Aries Sign


$txt1= " ";

If ($tmp_t4lag[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t4sun[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t4moon[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t4mar[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t4mer[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t4jup[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t4ven[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t4sat[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Jup == 1)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[1];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt1;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[1];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt1;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Taurus sign

$txt2= " ";

If ($tmp_t4lag[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t4sun[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t4moon[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t4mar[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t4mer[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t4jup[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t4ven[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t4sat[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Jup == 2)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[2];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt2;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[2];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt2;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Gemini Sign



$txt3= " ";

If ($tmp_t4lag[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t4sun[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t4moon[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t4mar[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t4mer[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t4jup[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t4ven[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t4sat[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Jup == 3)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[3];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt3;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[3];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt3;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>
</tr>
<!-- 2nd Row starts -->

<tr align="center">

<?php
//Aquarius sign


$txt11= " ";

If ($tmp_t4lag[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t4sun[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t4moon[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t4mar[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t4mer[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t4jup[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t4ven[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t4sat[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Jup == 11)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[11];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt11;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[11];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt11;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';

echo '<td colspan="2" rowspan="2" bgcolor="#99DDFF">Prastara Ashtakavarga<br>';
echo "PAV of Jupiter";
echo '<br>';


echo '</td>';

// Cancer Sign


$txt4= " ";

If ($tmp_t4lag[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t4sun[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t4moon[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t4mar[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t4mer[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t4jup[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t4ven[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t4sat[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Jup == 4)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[4];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt4;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[4];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt4;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>
</tr>
<!-- 3rd row starts -->

<tr align="center">
<?php
//Capricorn sign


$txt10= " ";

If ($tmp_t4lag[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t4sun[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t4moon[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t4mar[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t4mer[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t4jup[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t4ven[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t4sat[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Jup == 10)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[10];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt10;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[10];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt10;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Leo sign


$txt5= " ";

If ($tmp_t4lag[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t4sun[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t4moon[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t4mar[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t4mer[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t4jup[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t4ven[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t4sat[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Jup == 5)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[5];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt5;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[5];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt5;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
  echo '</span>';
echo '</td>';
?>
</tr>
<!-- 4th row starts -->

<tr align="center">
<?php
// Sagittarius sign


$txt9= " ";

If ($tmp_t4lag[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t4sun[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t4moon[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t4mar[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t4mer[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t4jup[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t4ven[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t4sat[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Jup == 9)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[9];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt9;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[9];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt9;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Scorpio Sign


$txt8= " ";

If ($tmp_t4lag[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t4sun[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t4moon[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t4mar[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t4mer[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t4jup[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t4ven[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t4sat[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Jup == 8)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[8];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt8;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[8];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt8;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Libra Sign

$txt7= " ";

If ($tmp_t4lag[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t4sun[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t4moon[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t4mar[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t4mer[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t4jup[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t4ven[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t4sat[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Jup == 7)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[7];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt7;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[7];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt7;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Virgo Sign


$txt6= " ";

If ($tmp_t4lag[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t4sun[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t4moon[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t4mar[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t4mer[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t4jup[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t4ven[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t4sat[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Jup == 6)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[6];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt6;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot4jup[6];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt6;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>
</tr>
</table>
</td>
<!-- Rasi Chart display end -->
<!-- Display for (PAV) Prashtara Ashtakavarga of Jup ends -->




<!--   -->

											</div>

											<div class="modal-footer no-margin-top">
												<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Close
												</button>

												
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>

<!-- Modal Table for Jup Ends here -->
<!-- Modal Table for Ven starts here -->

								<div id="modal-table-ven" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header" align="center">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													Prastara Ashtakavarga for Venus
												</div>
											</div>

											<div class="modal-body no-padding">

<!--   -->

<!-- PAV Ven Ashtakavarga Rasi Chart display start -->

<table class="c"  align="center">
<tr align="center">
<?php

$txt12= " ";

If ($tmp_t5lag[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t5sun[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t5moon[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t5mar[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t5mer[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t5jup[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t5ven[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t5sat[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-inverse">Sat </span>';
}

//Display for (PAV) Prashtara Ashtakavarga of SUN start -

If ($tmp_Rasi_Ven == 12)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[12];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt12;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[12];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt12;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';

// Aries Sign


$txt1= " ";

If ($tmp_t5lag[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t5sun[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t5moon[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t5mar[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t5mer[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t5jup[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t5ven[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t5sat[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Ven == 1)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[1];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt1;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[1];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt1;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Taurus sign

$txt2= " ";

If ($tmp_t5lag[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t5sun[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t5moon[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t5mar[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t5mer[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t5jup[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t5ven[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t5sat[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Ven == 2)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[2];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt2;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[2];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt2;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Gemini Sign



$txt3= " ";

If ($tmp_t5lag[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t5sun[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t5moon[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t5mar[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t5mer[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t5jup[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t5ven[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t5sat[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Ven == 3)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[3];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt3;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[3];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt3;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>
</tr>
<!-- 2nd Row starts -->

<tr align="center">

<?php
//Aquarius sign


$txt11= " ";

If ($tmp_t5lag[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t5sun[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t5moon[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t5mar[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t5mer[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t5jup[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t5ven[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t5sat[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Ven == 11)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[11];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt11;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[11];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt11;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';

echo '<td colspan="2" rowspan="2" bgcolor="#99DDFF">Prastara Ashtakavarga<br>';
echo "PAV of Venus";
echo '<br>';


echo '</td>';

// Cancer Sign


$txt4= " ";

If ($tmp_t5lag[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t5sun[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t5moon[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t5mar[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t5mer[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t5jup[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t5ven[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t5sat[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Ven == 4)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[4];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt4;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[4];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt4;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>
</tr>
<!-- 3rd row starts -->

<tr align="center">
<?php
//Capricorn sign


$txt10= " ";

If ($tmp_t5lag[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t5sun[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t5moon[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t5mar[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t5mer[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t5jup[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t5ven[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t5sat[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Ven == 10)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[10];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt10;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[10];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt10;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Leo sign


$txt5= " ";

If ($tmp_t5lag[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t5sun[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t5moon[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t5mar[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t5mer[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t5jup[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t5ven[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t5sat[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Ven == 5)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[5];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt5;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[5];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt5;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
  echo '</span>';
echo '</td>';
?>
</tr>
<!-- 4th row starts -->

<tr align="center">
<?php
// Sagittarius sign


$txt9= " ";

If ($tmp_t5lag[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t5sun[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t5moon[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t5mar[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t5mer[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t5jup[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t5ven[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t5sat[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Ven == 9)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[9];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt9;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[9];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt9;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Scorpio Sign


$txt8= " ";

If ($tmp_t5lag[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t5sun[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t5moon[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t5mar[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t5mer[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t5jup[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t5ven[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t5sat[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Ven == 8)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[8];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt8;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[8];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt8;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Libra Sign

$txt7= " ";

If ($tmp_t5lag[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t5sun[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t5moon[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t5mar[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t5mer[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t5jup[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t5ven[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t5sat[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Ven == 7)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[7];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt7;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[7];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt7;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Virgo Sign


$txt6= " ";

If ($tmp_t5lag[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t5sun[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t5moon[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t5mar[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t5mer[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t5jup[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t5ven[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t5sat[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Ven == 6)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[6];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt6;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot5ven[6];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt6;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>
</tr>
</table>
</td>
<!-- Rasi Chart display end -->
<!-- Display for (PAV) Prashtara Ashtakavarga of Ven ends -->



<!--   -->

											</div>

											<div class="modal-footer no-margin-top">
												<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Close
												</button>

												
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>

<!-- Modal Table for Ven Ends here -->
<!-- Modal Table for Sat starts here -->

								<div id="modal-table-sat" class="modal fade" tabindex="-1">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header" align="center">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													Prastara Ashtakavarga for Saturn
												</div>
											</div>

											<div class="modal-body no-padding">

<!--   -->

<!-- PAV Sat Ashtakavarga Rasi Chart display start -->

<table class="c"  align="center">
<tr align="center">
<?php

$txt12= " ";

If ($tmp_t6lag[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t6sun[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t6moon[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t6mar[12] == 1)
{
  $txt12= $txt12. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t6mer[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t6jup[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t6ven[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t6sat[12] == 1)
{
    $txt12= $txt12. '<span class="badge badge-inverse">Sat </span>';
}

//Display for (PAV) Prashtara Ashtakavarga of SUN start -

If ($tmp_Rasi_Sat == 12)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[12];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt12;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[12];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt12;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';

// Aries Sign


$txt1= " ";

If ($tmp_t6lag[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t6sun[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t6moon[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t6mar[1] == 1)
{
  $txt1= $txt1. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t6mer[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t6jup[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t6ven[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t6sat[1] == 1)
{
    $txt1= $txt1. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sat == 1)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[1];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt1;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[1];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt1;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Taurus sign

$txt2= " ";

If ($tmp_t6lag[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t6sun[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t6moon[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t6mar[2] == 1)
{
  $txt2= $txt2. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t6mer[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t6jup[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t6ven[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t6sat[2] == 1)
{
    $txt2= $txt2. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sat == 2)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[2];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt2;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[2];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt2;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Gemini Sign



$txt3= " ";

If ($tmp_t6lag[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t6sun[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t6moon[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t6mar[3] == 1)
{
  $txt3= $txt3. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t6mer[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t6jup[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t6ven[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t6sat[3] == 1)
{
    $txt3= $txt3. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sat == 3)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[3];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt3;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[3];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt3;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>
</tr>
<!-- 2nd Row starts -->

<tr align="center">

<?php
//Aquarius sign


$txt11= " ";

If ($tmp_t6lag[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t6sun[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t6moon[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t6mar[11] == 1)
{
  $txt11= $txt11. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t6mer[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t6jup[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t6ven[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t6sat[11] == 1)
{
    $txt11= $txt11. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sat == 11)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[11];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt11;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[11];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt11;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';

echo '<td colspan="2" rowspan="2" bgcolor="#99DDFF">Prastara Ashtakavarga<br>';
echo "PAV of Saturn";
echo '<br>';


echo '</td>';

// Cancer Sign


$txt4= " ";

If ($tmp_t6lag[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t6sun[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t6moon[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t6mar[4] == 1)
{
  $txt4= $txt4. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t6mer[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t6jup[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t6ven[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t6sat[4] == 1)
{
    $txt4= $txt4. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sat == 4)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[4];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt4;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[4];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt4;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>
</tr>
<!-- 3rd row starts -->

<tr align="center">
<?php
//Capricorn sign


$txt10= " ";

If ($tmp_t6lag[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t6sun[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t6moon[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t6mar[10] == 1)
{
  $txt10= $txt10. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t6mer[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t6jup[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t6ven[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t6sat[10] == 1)
{
    $txt10= $txt10. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sat == 10)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[10];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt10;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[10];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt10;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Leo sign


$txt5= " ";

If ($tmp_t6lag[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t6sun[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t6moon[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t6mar[5] == 1)
{
  $txt5= $txt5. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t6mer[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t6jup[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t6ven[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t6sat[5] == 1)
{
    $txt5= $txt5. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sat == 5)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[5];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt5;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[5];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt5;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
  echo '</span>';
echo '</td>';
?>
</tr>
<!-- 4th row starts -->

<tr align="center">
<?php
// Sagittarius sign


$txt9= " ";

If ($tmp_t6lag[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t6sun[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t6moon[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t6mar[9] == 1)
{
  $txt9= $txt9. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t6mer[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t6jup[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t6ven[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t6sat[9] == 1)
{
    $txt9= $txt9. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sat == 9)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[9];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt9;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[9];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt9;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Scorpio Sign


$txt8= " ";

If ($tmp_t6lag[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t6sun[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t6moon[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t6mar[8] == 1)
{
  $txt8= $txt8. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t6mer[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t6jup[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t6ven[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t6sat[8] == 1)
{
    $txt8= $txt8. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sat == 8)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[8];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt8;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[8];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt8;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Libra Sign

$txt7= " ";

If ($tmp_t6lag[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t6sun[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t6moon[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t6mar[7] == 1)
{
  $txt7= $txt7. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t6mer[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t6jup[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t6ven[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t6sat[7] == 1)
{
    $txt7= $txt7. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sat == 7)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[7];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt7;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[7];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt7;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
// Virgo Sign


$txt6= " ";

If ($tmp_t6lag[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-pink">Asc </span>';
}
If ($tmp_t6sun[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-primary">Sun </span>';
}
If ($tmp_t6moon[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-grey">Moon </span>';
}

If ($tmp_t6mar[6] == 1)
{
  $txt6= $txt6. '<span class="badge badge-danger">Mar </span>';
}

If ($tmp_t6mer[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-success">Mer </span>';
}


If ($tmp_t6jup[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-warning">Jup </span>';
}

If ($tmp_t6ven[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-purple">Ven </span>';
}

If ($tmp_t6sat[6] == 1)
{
    $txt6= $txt6. '<span class="badge badge-inverse">Sat </span>';
}



If ($tmp_Rasi_Sat == 6)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[6];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt6;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td><span class="badge badge-primary">';
    echo $tmp_tot6sat[6];
    echo '</span></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt6;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>
</tr>
</table>
</td>
<!-- Rasi Chart display end -->
<!-- Display for (PAV) Prashtara Ashtakavarga of Sat ends -->




<!--   -->

											</div>

											<div class="modal-footer no-margin-top">
												<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Close
												</button>


												
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>

<!-- Modal Table for Sat Ends here -->


<!-- Modal Table for SAV starts here 

								<div id="modal-table-sav" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header" align="center">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													Sarvashtakavarga
												</div>
											</div>

											<div class="modal-body no-padding">



<table align="center">

<tr>
<td><strong>Planets/Rasi No.</strong></td><td><strong>1</strong></td><td><strong>2</strong></td><td><strong>3</strong></td><td><strong>4</strong></td><td><strong>5</strong></td><td><strong>6</strong></td><td><strong>7</strong></td><td><strong>8</strong></td><td><strong>9</strong></td><td><strong>10</strong></td><td><strong>11</strong></td><td><strong>12</strong></td>
</strong></tr>



   -->
<!--
											</div>

											<div class="modal-footer no-margin-top">
												<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Close
												</button>

												
											</div>
										</div><!-- /.modal-content -->
								<!--	</div><!-- /.modal-dialog -->
							<!--	</div>

<!-- Modal Table for SAV Ends here -->


								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">vbnrao Astro Software Monitoring System</span>
               					&copy; 2020. Designed and Developed by V. Bala Nageswara Rao
            				</span>

					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="assets/js/dataTables.buttons.min.js"></script>
		<script src="assets/js/buttons.flash.min.js"></script>
		<script src="assets/js/buttons.html5.min.js"></script>
		<script src="assets/js/buttons.print.min.js"></script>
		<script src="assets/js/buttons.colVis.min.js"></script>
		<script src="assets/js/dataTables.select.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
	<script type="text/javascript">
			jQuery(function($) {
				
		
					if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			

					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});


		
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}
			
			
				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});
				
				$('textarea[class*=autosize]').autosize({append: "\n"});
				$('textarea.limited').inputlimiter({
					remText: '%n character%s remaining...',
					limitText: 'max allowed : %n.'
				});
			
				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');
				$('.input-mask-eyescript').mask('~999.9999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
			    $(".input-mask-latlong").mask("a999.9999");
			
			
				$( "#input-size-slider" ).css('width','200px').slider({
					value:1,
					range: "min",
					min: 1,
					max: 8,
					step: 1,
					slide: function( event, ui ) {
						var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
						var val = parseInt(ui.value);
						$('#form-field-4').attr('class', sizing[val]).val('.'+sizing[val]);
					}
				});
			
				$( "#input-span-slider" ).slider({
					value:1,
					range: "min",
					min: 1,
					max: 12,
					step: 1,
					slide: function( event, ui ) {
						var val = parseInt(ui.value);
						$('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
					}
				});
			
			
				
				//"jQuery UI Slider"
				//range slider tooltip example
				$( "#slider-range" ).css('height','200px').slider({
					orientation: "vertical",
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1] + "";
			
						if( !ui.handle.firstChild ) {
							$("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
							.prependTo(ui.handle);
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('span.ui-slider-handle').on('blur', function(){
					$(this.firstChild).hide();
				});
				
				//tooltips
				$( "#show-option" ).tooltip({
					show: {
						effect: "slideDown",
						delay: 250
					}
				});
			
				$( "#hide-option" ).tooltip({
					hide: {
						effect: "explode",
						delay: 250
					}
				});
				
				$( "#hide-option2" ).tooltip({
					hide: {
						effect: "explode",
						delay: 250
					}
				});

				$( "#hide-option3" ).tooltip({
					hide: {
						effect: "explode",
						delay: 250
					}
				});

				$( "#hide-option4" ).tooltip({
					hide: {
						effect: "explode",
						delay: 250
					}
				});

				$( "#hide-option5" ).tooltip({
					hide: {
						effect: "explode",
						delay: 250
					}
				});

				$( "#hide-option6" ).tooltip({
					hide: {
						effect: "explode",
						delay: 250
					}
				});

				$( "#hide-option7" ).tooltip({
					hide: {
						effect: "explode",
						delay: 250
					}
				});

				$( "#hide-option8" ).tooltip({
					hide: {
						effect: "explode",
						delay: 250
					}
				});

				$( "#open-event" ).tooltip({
					show: null,
					position: {
						my: "left top",
						at: "left bottom"
					},
					open: function( event, ui ) {
						ui.tooltip.animate({ top: ui.tooltip.position().top + 10 }, "fast" );
					}
				});

				$( "#slider-range-max" ).slider({
					range: "max",
					min: 1,
					max: 10,
					value: 2
				});
				
				$( "#slider-eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
					// read initial values from markup and remove that
					var value = parseInt( $( this ).text(), 10 );
					$( this ).empty().slider({
						value: value,
						range: "min",
						animate: true
						
					});
				});
				
				$("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item
			
				
				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				//pre-show a file name, for example a previously selected file
				//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
			
			
				$('#id-input-file-3').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}
			
				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});
				
				
				//$('#id-input-file-3')
				//.ace_file_input('show_file_list', [
					//{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
					//{type: 'file', name: 'hello.txt'}
				//]);
			
				
				
			
				//dynamically change allowed formats by changing allowExt && allowMime function
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var whitelist_ext, whitelist_mime;
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "ace-icon fa fa-picture-o";
			
						whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
						whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "ace-icon fa fa-cloud-upload";
						
						whitelist_ext = null;//all extensions are acceptable
						whitelist_mime = null;//all mimes are acceptable
					}
					var file_input = $('#id-input-file-3');
					file_input
					.ace_file_input('update_settings',
					{
						'btn_choose': btn_choose,
						'no_icon': no_icon,
						'allowExt': whitelist_ext,
						'allowMime': whitelist_mime
					})
					file_input.ace_file_input('reset_input');
					
					file_input
					.off('file.error.ace')
					.on('file.error.ace', function(e, info) {
						//console.log(info.file_count);//number of selected files
						//console.log(info.invalid_count);//number of invalid files
						//console.log(info.error_list);//a list of errors in the following format
						
						//info.error_count['ext']
						//info.error_count['mime']
						//info.error_count['size']
						
						//info.error_list['ext']  = [list of file names with invalid extension]
						//info.error_list['mime'] = [list of file names with invalid mimetype]
						//info.error_list['size'] = [list of file names with invalid size]
						
						
						/**
						if( !info.dropped ) {
							//perhapse reset file field if files have been selected, and there are invalid files among them
							//when files are dropped, only valid files will be added to our file array
							e.preventDefault();//it will rest input
						}
						*/
						
						
						//if files have been selected (not dropped), you can choose to reset input
						//because browser keeps all selected files anyway and this cannot be changed
						//we can only reset file field to become empty again
						//on any case you still should check files with your server side script
						//because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
					});
				
				});
			
				$('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				.closest('.ace-spinner')
				.on('changed.fu.spinbox', function(){
					//alert($('#spinner1').val())
				}); 
				$('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});
				$('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
				$('#spinner4').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});
			
				//$('#spinner1').ace_spinner('disable').ace_spinner('value', 11);
				//or
				//$('#spinner1').closest('.ace-spinner').spinner('disable').spinner('enable').spinner('value', 11);//disable, enable or change value
				//$('#spinner1').closest('.ace-spinner').spinner('value', 0);//reset to 0
			
			
				//datepicker plugin
				//link
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});


			$('#tob').timepicker({
					minuteStep: 1,
					showSeconds: false,
					showMeridian: false
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				//or change it into a date range picker
				$('.input-daterange').datepicker({autoclose:true});
			
			
				//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
				$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					locale: {
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
					$(this).next().focus();
				});
			
			
				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				$('#tz').timepicker({
					minuteStep: 15,
					showSeconds: false,
					defaultTime : '5:30 AM',
					showMeridian: false
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});

				$('#date-timepicker1').datetimepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
			
				$('#colorpicker1').colorpicker();
			
				$('#simple-colorpicker-1').ace_colorpicker();
				//$('#simple-colorpicker-1').ace_colorpicker('pick', 2);//select 2nd color
				//$('#simple-colorpicker-1').ace_colorpicker('pick', '#fbe983');//select #fbe983 color
				//var picker = $('#simple-colorpicker-1').data('ace_colorpicker')
				//picker.pick('red', true);//insert the color if it doesn't exist
			
			
				$(".knob").knob();
				
				
				var tag_input = $('#form-field-tags');
				try{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder'),
						//enable typeahead by specifying the source array
						source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
						/**
						//or fetch data from database, fetch those that match "query"
						source: function(query, process) {
						  $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
						  .done(function(result_items){
							process(result_items);
						  });
						}
						*/
					  }
					)
			
					//programmatically add a new
					var $tag_obj = $('#form-field-tags').data('tag');
					$tag_obj.add('Programmatically Added');
				}
				catch(e) {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//$('#form-field-tags').autosize({append: "\n"});
				}
				
				
				/////////
				$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})
				
				//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				$('#modal-form').on('shown.bs.modal', function () {
					if(!ace.vars['touch']) {
						$(this).find('.chosen-container').each(function(){
							$(this).find('a:first-child').css('width' , '210px');
							$(this).find('.chosen-drop').css('width' , '210px');
							$(this).find('.chosen-search input').css('width' , '200px');
						});
					}
				})
				/**
				//or you can activate the chosen plugin after modal is shown
				//this way select element becomes visible with dimensions and chosen works as expected
				$('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
				*/

			
				
				
				$(document).one('ajaxloadstart.page', function(e) {
					$('textarea[class*=autosize]').trigger('autosize.destroy');
					$('.limiterBox,.autosizejs').remove();
					$('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
				});
			
			});
		</script>

 


      
       
	</body>
</html>
