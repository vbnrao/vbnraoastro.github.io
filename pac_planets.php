<?php
// Initialize the session
session_start();
//include ('./accesscontrol.php');

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include ('./planet_calculations.php'); /// All functions for Planetary calculations
// Include config file
require_once "DbConnection.php";


$tmp_Rasi_Asc = $_SESSION['tmp_Rasi_Asc'];
$tmp_Rasi_Sun = $_SESSION['tmp_Rasi_Sun'];
$tmp_Rasi_Moon = $_SESSION['tmp_Rasi_Moon'];
$tmp_Rasi_Mar = $_SESSION['tmp_Rasi_Mar'];
$tmp_Rasi_Mer = $_SESSION['tmp_Rasi_Mer'];
$tmp_Rasi_Jup = $_SESSION['tmp_Rasi_Jup'];
$tmp_Rasi_Ven = $_SESSION['tmp_Rasi_Ven'];
$tmp_Rasi_Sat = $_SESSION['tmp_Rasi_Sat'];
$tmp_Rasi_Rah = $_SESSION['tmp_Rasi_Rah'];


$str_Sun = Naks($_SESSION['tmp_Long_Sun']);
$str_Moon = Naks($_SESSION['tmp_Long_Moon']);
$str_Mar = Naks($_SESSION['tmp_Long_Mar']);
$str_Mer = Naks($_SESSION['tmp_Long_Mer']);
$str_Jup = Naks($_SESSION['tmp_Long_Jup']);
$str_Ven = Naks($_SESSION['tmp_Long_Ven']);
$str_Sat = Naks($_SESSION['tmp_Long_Sat']);
$str_Rah = Naks($_SESSION['tmp_Long_Rah']);
$str_Ket = Naks($_SESSION['tmp_Long_Ket']);

echo "This is Sun Nakshatra : " . $str_Sun . "<br>";
echo "This is Moon Nakshatra : " . $str_Moon . "<br>";
echo "This is Mar Nakshatra : " . $str_Mar . "<br>";
echo "This is Mer Nakshatra : " . $str_Mer . "<br>";
echo "This is Jup Nakshatra : " . $str_Jup . "<br>";
echo "This is Ven Nakshatra : " . $str_Ven . "<br>";
echo "This is Sat Nakshatra : " . $str_Sat . "<br>";
echo "This is Rah Nakshatra : " . $str_Rah . "<br>";
echo "This is Ket Nakshatra : " . $str_Ket . "<br>";

echo "SUN LORD : " . RasiLord(BhavaResident($_SESSION['Bhava5'])) . "<br>";

$naks_array = array($str_Sun, $str_Moon, $str_Mar, $str_Mer, $str_Jup, $str_Ven, $str_Sat, $str_Rah, $str_Ket);

//$naks_array = array($str_Sun => "Sun", $str_Moon => "Moon", $str_Mar => "Mar", $str_Mer => "Mer", $str_Jup => "Jup", $str_Ven => "Ven", $str_Sat => "Sat", $str_Rah => "Rah", $str_Ket => "Ket");

echo "vbnrao Lord : " . RasiLord(BhavaResident($_SESSION['Bhava5'])) . "<br>";
//$xy = RasiLord(BhavaResident($_SESSION['Bhava12']));

//echo "vbnrao.." . array_search($xy, $naks_array) . "<br>";




Function BhavaResident($Bhava)
{

$Planet_Resident = array(RasiNum($_SESSION['tmp_Long_Sun']),RasiNum($_SESSION['tmp_Long_Moon']), RasiNum($_SESSION['tmp_Long_Mar']), RasiNum($_SESSION['tmp_Long_Mer']), RasiNum($_SESSION['tmp_Long_Jup']), RasiNum($_SESSION['tmp_Long_Ven']), RasiNum($_SESSION['tmp_Long_Sat']), RasiNum($_SESSION['tmp_Long_Rah']), RasiNum($_SESSION['tmp_Long_Ket']));


If ($Bhava == "Sun")
{
	$Bhava_Resident = $Planet_Resident[0];
}
elseif ($Bhava == "Moon")
{
	$Bhava_Resident = $Planet_Resident[1];
}
elseif ($Bhava == "Mar")
{
	$Bhava_Resident = $Planet_Resident[2];
}
elseif ($Bhava == "Mer")
{
	$Bhava_Resident = $Planet_Resident[3];
}
elseif ($Bhava == "Jup")
{
	$Bhava_Resident = $Planet_Resident[4];
}
elseif ($Bhava == "Ven")
{
	$Bhava_Resident = $Planet_Resident[5];
}
elseif ($Bhava == "Sat")
{
	$Bhava_Resident = $Planet_Resident[6];
}
elseif ($Bhava == "Rah")
{
	$Bhava_Resident = $Planet_Resident[7];
}
elseif ($Bhava == "Ket")
{
	$Bhava_Resident = $Planet_Resident[8];
}

return $Bhava_Resident;
}// End Function




//echo $Planet_Resident[1] . "<br>";
//echo RasiNumName(BhavaResident($_SESSION['Bhava1'])) . "<br>";
//echo "Bhava residing : " . BhavaResident($_SESSION['Bhava1']) . "<br>";

//echo "This is conjunction : " . Planet_Conjunction(BhavaResident($_SESSION['Bhava1']), $_SESSION['Bhava1'], $_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Long_Rah'], $_SESSION['tmp_Long_Ket']);



//echo "This is tmp Rasi Asc : " . $tmp_Rasi_Asc . "<br>";
/*echo "This is Lord -1 : " . $_SESSION['Bhava1'] . "<br>";
echo "This is Lord -2 : " . $_SESSION['Bhava2'] . "<br>";
echo "This is Lord -3 : " . $_SESSION['Bhava3'] . "<br>";
echo "This is Lord -4 : " . $_SESSION['Bhava4'] . "<br>";
echo "This is Lord -5 : " . $_SESSION['Bhava5'] . "<br>";
echo "This is Lord -6: " . $_SESSION['Bhava6'] . "<br>";
echo "This is Lord -7 : " . $_SESSION['Bhava7'] . "<br>";
echo "This is Lord -8 : " . $_SESSION['Bhava8'] . "<br>";
echo "This is Lord -9 : " . $_SESSION['Bhava9'] . "<br>";
echo "This is Lord -10 : " . $_SESSION['Bhava10'] . "<br>";
echo "This is Lord -11 : " . $_SESSION['Bhava11'] . "<br>";
echo "This is Lord -12 : " . $_SESSION['Bhava12'] . "<br>";*/

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

<!-- Chart JS Styles -->
<script src="assets/js/Chart.bundle.js"></script>
        <style type="text/css">
            .container {
                width: 60%;
                margin: 15px auto;
            }
        </style>
<!-- Chart JS Styles -->

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
	border: 0px solid blue;
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
	width: 100%;
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

              <li class="active">
                <a href="pac_planets.php?id=<?php echo $_SESSION['natalid']; ?>">
                  <i class="menu-icon fa fa-caret-right"></i>
                  PAC of Planets
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="division_chart.php?id=<?php echo $_SESSION['natalid']; ?>">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Divisional Charts
                </a>

                <b class="arrow"></b>
              </li>


              <li class="">
                <a href="vimsottari_dasa.php?id=<?php echo $_SESSION['natalid']; ?>">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Vimsottari Dasa
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="ashtakavarga.php?id=<?php echo $_SESSION['natalid']; ?>">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Ashtakavarga
                </a>

                <b class="arrow"></b>
              </li>

            <li class="">
                <a href="natal_transit_diary.php?id=<?php echo $_SESSION['natalid']; ?>">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Transit Diary
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="shadbala.php?id=<?php echo $_SESSION['natalid']; ?>">
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
									PAC Details 
									<i class="ace-icon fa fa-angle-double-right"></i>
									<?php echo '<strong>' . $_SESSION['name'] . '</strong>'; ?>
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
<!--                  -->

							<div class="row">
									<div class="col-sm-12">
										<div class="tabbable">
											<ul class="nav nav-tabs" id="myTab">
												<li  class="active">
													<a data-toggle="tab" href="#bhava1">
														Bhava-1
														<span class="badge badge-pink"></span>
													</a>
												</li>

												<li>
													<a data-toggle="tab" href="#bhava2">
														Bhava-2
														<span class="badge badge-inverse"></span>
													</a>
												</li>

												<li>
													<a data-toggle="tab" href="#bhava3">
														Bhava-3
														<span class="badge badge-warning"></span>
													</a>
												</li>

												<li>
													<a data-toggle="tab" href="#bhava4">
														Bhava-4
														<span class="badge badge-grey"></span>
													</a>
												</li>

												<li>
													<a data-toggle="tab" href="#bhava5">
														Bhava-5
														<span class="badge badge-danger"></span>
													</a>
												</li>
												
												<li>
													<a data-toggle="tab" href="#bhava6">
														Bhava-6
														<span class="badge badge-success"></span>
													</a>
												</li>

												<li>
													<a data-toggle="tab" href="#bhava7">
														Bhava-7
														<span class="badge badge-primary"></span>
													</a>
												</li>

												<li>
													<a data-toggle="tab" href="#bhava8">
														Bhava-8
														<span class="badge badge-purple"></span>
													</a>
												</li>

												<li>
													<a data-toggle="tab" href="#bhava9">
														Bhava-9
														<span class="badge badge-purple"></span>
													</a>
												</li>

												<li>
													<a data-toggle="tab" href="#bhava10">
														Bhava-10
														<span class="badge badge-purple"></span>
													</a>
												</li>

												<li>
													<a data-toggle="tab" href="#bhava11">
														Bhava-11
														<span class="badge badge-purple"></span>
													</a>
												</li>

												<li>
													<a data-toggle="tab" href="#bhava12">
														Bhava-12
														<span class="badge badge-purple"></span>
													</a>
												</li>


											</ul>

<div class="tab-content">
<div id="bhava1" class="tab-pane fade in active">
<!-- Display for Tanu Bhava, Bhava 1 Starts -->
<div class="row">
<div class="col-xs-12">
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert"></button>
		<strong>Tanu Bhava (Body)</strong>
		<br />
		The Self (Atman), psychology, physiology, constitution, innate nature, personality, character, temperament, ego, the empirical self, sense of self worth, dignity, fame, splendour, general welfare, happiness, status in society, health, complexion, vitality, longevity, victory over enemies, strength, vigour, place of birth. 

	</div>
</div> <!-- Col End -->
</div> <!-- Row End -->
<div class="row">
	<div class="col-xs-6">
		<div class="well">
			<h4 class="blue smaller lighter">Family members:</h4>
			Father's mother, Mother's father.
		</div>
	</div>
	<div class="col-xs-6">
		<div class="well">
			<h4 class="blue smaller lighter">Body Parts:</h4>
			Head, Brain.
		</div>
	</div>
</div><!-- Row End -->
<div class="row">

<!--   1st column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-blue" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-table"></i>
                            Position
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<?php
If ($_SESSION['Bhava1'] == "Sun" or $_SESSION['Bhava2'] == "Sun" or $_SESSION['Bhava3'] == "Sun" or $_SESSION['Bhava4'] == "Sun" or $_SESSION['Bhava5'] == "Sun" or $_SESSION['Bhava6'] == "Sun" or $_SESSION['Bhava7'] == "Sun" or $_SESSION['Bhava8'] == "Sun" or $_SESSION['Bhava9'] == "Sun" or $_SESSION['Bhava10'] == "Sun" or $_SESSION['Bhava11'] == "Sun" or $_SESSION['Bhava12'] == "Sun")
{ $nak_b1_no = 0;}
If ($_SESSION['Bhava1'] == "Moon" or $_SESSION['Bhava2'] == "Moon" or $_SESSION['Bhava3'] == "Moon" or $_SESSION['Bhava4'] == "Moon" or $_SESSION['Bhava5'] == "Moon" or $_SESSION['Bhava6'] == "Moon" or $_SESSION['Bhava7'] == "Moon" or $_SESSION['Bhava8'] == "Moon" or $_SESSION['Bhava9'] == "Moon" or $_SESSION['Bhava10'] == "Moon" or $_SESSION['Bhava11'] == "Moon" or $_SESSION['Bhava12'] == "Moon")
{ $nak_b2_no = 1;}
If ($_SESSION['Bhava1'] == "Mar" or $_SESSION['Bhava2'] == "Mar" or $_SESSION['Bhava3'] == "Mar" or $_SESSION['Bhava4'] == "Mar" or $_SESSION['Bhava5'] == "Mar" or $_SESSION['Bhava6'] == "Mar" or $_SESSION['Bhava7'] == "Mar" or $_SESSION['Bhava8'] == "Mar" or $_SESSION['Bhava9'] == "Mar" or $_SESSION['Bhava10'] == "Mar" or $_SESSION['Bhava11'] == "Mar" or $_SESSION['Bhava12'] == "Mar")
{ $nak_b3_no = 2;}
If ($_SESSION['Bhava1'] == "Mer" or $_SESSION['Bhava2'] == "Mer" or $_SESSION['Bhava3'] == "Mer" or $_SESSION['Bhava4'] == "Mer" or $_SESSION['Bhava5'] == "Mer" or $_SESSION['Bhava6'] == "Mer" or $_SESSION['Bhava7'] == "Mer" or $_SESSION['Bhava8'] == "Mer" or $_SESSION['Bhava9'] == "Mer" or $_SESSION['Bhava10'] == "Mer" or $_SESSION['Bhava11'] == "Mer" or $_SESSION['Bhava12'] == "Mer")
{ $nak_b4_no = 3;}
If ($_SESSION['Bhava1'] == "Jup" or $_SESSION['Bhava2'] == "Jup" or $_SESSION['Bhava3'] == "Jup" or $_SESSION['Bhava4'] == "Jup" or $_SESSION['Bhava5'] == "Jup" or $_SESSION['Bhava6'] == "Jup" or $_SESSION['Bhava7'] == "Jup" or $_SESSION['Bhava8'] == "Jup" or $_SESSION['Bhava9'] == "Jup" or $_SESSION['Bhava10'] == "Jup" or $_SESSION['Bhava11'] == "Jup" or $_SESSION['Bhava12'] == "Jup")
{ $nak_b5_no = 4;}
If ($_SESSION['Bhava1'] == "Ven" or $_SESSION['Bhava2'] == "Ven" or $_SESSION['Bhava3'] == "Ven" or $_SESSION['Bhava4'] == "Ven" or $_SESSION['Bhava5'] == "Ven" or $_SESSION['Bhava6'] == "Ven" or $_SESSION['Bhava7'] == "Ven" or $_SESSION['Bhava8'] == "Ven" or $_SESSION['Bhava9'] == "Ven" or $_SESSION['Bhava10'] == "Ven" or $_SESSION['Bhava11'] == "Ven" or $_SESSION['Bhava12'] == "Ven")
{ $nak_b6_no = 5;}
If ($_SESSION['Bhava1'] == "Sat" or $_SESSION['Bhava2'] == "Sat" or $_SESSION['Bhava3'] == "Sat" or $_SESSION['Bhava4'] == "Sat" or $_SESSION['Bhava5'] == "Sat" or $_SESSION['Bhava6'] == "Sat" or $_SESSION['Bhava7'] == "Sat" or $_SESSION['Bhava8'] == "Sat" or $_SESSION['Bhava9'] == "Sat" or $_SESSION['Bhava10'] == "Sat" or $_SESSION['Bhava11'] == "Sat" or $_SESSION['Bhava12'] == "Sat")
{ $nak_b7_no = 6;}
If ($_SESSION['Bhava1'] == "Rah" or $_SESSION['Bhava2'] == "Rah" or $_SESSION['Bhava3'] == "Rah" or $_SESSION['Bhava4'] == "Rah" or $_SESSION['Bhava5'] == "Rah" or $_SESSION['Bhava6'] == "Rah" or $_SESSION['Bhava7'] == "Rah" or $_SESSION['Bhava8'] == "Rah" or $_SESSION['Bhava9'] == "Rah" or $_SESSION['Bhava10'] == "Rah" or $_SESSION['Bhava11'] == "Rah" or $_SESSION['Bhava12'] == "Rah")
{ $nak_b8_no = 7;}
If ($_SESSION['Bhava1'] == "Ket" or $_SESSION['Bhava2'] == "Ket" or $_SESSION['Bhava3'] == "Ket" or $_SESSION['Bhava4'] == "Ket" or $_SESSION['Bhava5'] == "Ket" or $_SESSION['Bhava6'] == "Ket" or $_SESSION['Bhava7'] == "Ket" or $_SESSION['Bhava8'] == "Ket" or $_SESSION['Bhava9'] == "Ket" or $_SESSION['Bhava10'] == "Ket" or $_SESSION['Bhava11'] == "Ket" or $_SESSION['Bhava12'] == "Ket")
{ $nak_b9_no = 8;}
//*********
If (RasiLord(BhavaResident($_SESSION['Bhava1'])) == "Sun" or RasiLord(BhavaResident($_SESSION['Bhava2'])) == "Sun" or RasiLord(BhavaResident($_SESSION['Bhava3'])) == "Sun" or RasiLord(BhavaResident($_SESSION['Bhava4'])) == "Sun" or RasiLord(BhavaResident($_SESSION['Bhava5'])) == "Sun" or RasiLord(BhavaResident($_SESSION['Bhava6'])) == "Sun" or RasiLord(BhavaResident($_SESSION['Bhava7'])) == "Sun" or RasiLord(BhavaResident($_SESSION['Bhava8'])) == "Sun" or RasiLord(BhavaResident($_SESSION['Bhava9'])) == "Sun" or RasiLord(BhavaResident($_SESSION['Bhava10'])) == "Sun" or RasiLord(BhavaResident($_SESSION['Bhava11'])) == "Sun" or RasiLord(BhavaResident($_SESSION['Bhava12'])) == "Sun")
{ $nak1_no = 0;}
If (RasiLord(BhavaResident($_SESSION['Bhava1'])) == "Moon"  or RasiLord(BhavaResident($_SESSION['Bhava2'])) == "Moon" or RasiLord(BhavaResident($_SESSION['Bhava3'])) == "Moon" or RasiLord(BhavaResident($_SESSION['Bhava4'])) == "Moon" or RasiLord(BhavaResident($_SESSION['Bhava5'])) == "Moon" or RasiLord(BhavaResident($_SESSION['Bhava6'])) == "Moon" or RasiLord(BhavaResident($_SESSION['Bhava7'])) == "Moon" or RasiLord(BhavaResident($_SESSION['Bhava8'])) == "Moon" or RasiLord(BhavaResident($_SESSION['Bhava9'])) == "Moon" or RasiLord(BhavaResident($_SESSION['Bhava10'])) == "Moon" or RasiLord(BhavaResident($_SESSION['Bhava11'])) == "Moon" or RasiLord(BhavaResident($_SESSION['Bhava12'])) == "Moon")
{ $nak1_no = 1;}
If (RasiLord(BhavaResident($_SESSION['Bhava1'])) == "Mar" or RasiLord(BhavaResident($_SESSION['Bhava2'])) == "Mar" or RasiLord(BhavaResident($_SESSION['Bhava3'])) == "Mar" or RasiLord(BhavaResident($_SESSION['Bhava4'])) == "Mar" or RasiLord(BhavaResident($_SESSION['Bhava5'])) == "Mar" or RasiLord(BhavaResident($_SESSION['Bhava6'])) == "Mar" or RasiLord(BhavaResident($_SESSION['Bhava7'])) == "Mar" or RasiLord(BhavaResident($_SESSION['Bhava8'])) == "Mar" or RasiLord(BhavaResident($_SESSION['Bhava9'])) == "Mar" or RasiLord(BhavaResident($_SESSION['Bhava10'])) == "Mar" or RasiLord(BhavaResident($_SESSION['Bhava11'])) == "Mar" or RasiLord(BhavaResident($_SESSION['Bhava12'])) == "Mar")
{ $nak1_no = 2;}
If (RasiLord(BhavaResident($_SESSION['Bhava1'])) == "Mer" or RasiLord(BhavaResident($_SESSION['Bhava2'])) == "Mer" or RasiLord(BhavaResident($_SESSION['Bhava3'])) == "Mer" or RasiLord(BhavaResident($_SESSION['Bhava4'])) == "Mer" or RasiLord(BhavaResident($_SESSION['Bhava5'])) == "Mer" or RasiLord(BhavaResident($_SESSION['Bhava6'])) == "Mer" or RasiLord(BhavaResident($_SESSION['Bhava7'])) == "Mer" or RasiLord(BhavaResident($_SESSION['Bhava8'])) == "Mer" or RasiLord(BhavaResident($_SESSION['Bhava9'])) == "Mer" or RasiLord(BhavaResident($_SESSION['Bhava10'])) == "Mer" or RasiLord(BhavaResident($_SESSION['Bhava11'])) == "Mer" or RasiLord(BhavaResident($_SESSION['Bhava12'])) == "Mer")
{ $nak1_no = 3;}
If (RasiLord(BhavaResident($_SESSION['Bhava1'])) == "Jup" or RasiLord(BhavaResident($_SESSION['Bhava2'])) == "Jup" or RasiLord(BhavaResident($_SESSION['Bhava3'])) == "Jup" or RasiLord(BhavaResident($_SESSION['Bhava4'])) == "Jup" or RasiLord(BhavaResident($_SESSION['Bhava5'])) == "Jup" or RasiLord(BhavaResident($_SESSION['Bhava6'])) == "Jup" or RasiLord(BhavaResident($_SESSION['Bhava7'])) == "Jup" or RasiLord(BhavaResident($_SESSION['Bhava8'])) == "Jup" or RasiLord(BhavaResident($_SESSION['Bhava9'])) == "Jup" or RasiLord(BhavaResident($_SESSION['Bhava10'])) == "Jup" or RasiLord(BhavaResident($_SESSION['Bhava11'])) == "Jup" or RasiLord(BhavaResident($_SESSION['Bhava12'])) == "Jup")
{ $nak1_no = 4;}
If (RasiLord(BhavaResident($_SESSION['Bhava1'])) == "Ven" or RasiLord(BhavaResident($_SESSION['Bhava2'])) == "Ven" or RasiLord(BhavaResident($_SESSION['Bhava3'])) == "Ven" or RasiLord(BhavaResident($_SESSION['Bhava4'])) == "Ven" or RasiLord(BhavaResident($_SESSION['Bhava5'])) == "Ven" or RasiLord(BhavaResident($_SESSION['Bhava6'])) == "Ven" or RasiLord(BhavaResident($_SESSION['Bhava7'])) == "Ven" or RasiLord(BhavaResident($_SESSION['Bhava8'])) == "Ven" or RasiLord(BhavaResident($_SESSION['Bhava9'])) == "Ven" or RasiLord(BhavaResident($_SESSION['Bhava10'])) == "Ven" or RasiLord(BhavaResident($_SESSION['Bhava11'])) == "Ven" or RasiLord(BhavaResident($_SESSION['Bhava12'])) == "Ven")
{ $nak1_no = 5;}
If (RasiLord(BhavaResident($_SESSION['Bhava1'])) == "Sat" or RasiLord(BhavaResident($_SESSION['Bhava2'])) == "Sat" or RasiLord(BhavaResident($_SESSION['Bhava3'])) == "Sat" or RasiLord(BhavaResident($_SESSION['Bhava4'])) == "Sat" or RasiLord(BhavaResident($_SESSION['Bhava5'])) == "Sat" or RasiLord(BhavaResident($_SESSION['Bhava6'])) == "Sat" or RasiLord(BhavaResident($_SESSION['Bhava7'])) == "Sat" or RasiLord(BhavaResident($_SESSION['Bhava8'])) == "Sat" or RasiLord(BhavaResident($_SESSION['Bhava9'])) == "Sat" or RasiLord(BhavaResident($_SESSION['Bhava10'])) == "Sat" or RasiLord(BhavaResident($_SESSION['Bhava11'])) == "Sat" or RasiLord(BhavaResident($_SESSION['Bhava12'])) == "Sat")
{ $nak1_no = 6;}
If (RasiLord(BhavaResident($_SESSION['Bhava1'])) == "Rah" or RasiLord(BhavaResident($_SESSION['Bhava2'])) == "Rah" or RasiLord(BhavaResident($_SESSION['Bhava3'])) == "Rah" or RasiLord(BhavaResident($_SESSION['Bhava4'])) == "Rah" or RasiLord(BhavaResident($_SESSION['Bhava5'])) == "Rah" or RasiLord(BhavaResident($_SESSION['Bhava6'])) == "Rah" or RasiLord(BhavaResident($_SESSION['Bhava7'])) == "Rah" or RasiLord(BhavaResident($_SESSION['Bhava8'])) == "Rah" or RasiLord(BhavaResident($_SESSION['Bhava9'])) == "Rah" or RasiLord(BhavaResident($_SESSION['Bhava10'])) == "Rah" or RasiLord(BhavaResident($_SESSION['Bhava11'])) == "Rah" or RasiLord(BhavaResident($_SESSION['Bhava12'])) == "Rah")
{ $nak1_no = 7;}
If (RasiLord(BhavaResident($_SESSION['Bhava1'])) == "Ket" or RasiLord(BhavaResident($_SESSION['Bhava2'])) == "Ket" or RasiLord(BhavaResident($_SESSION['Bhava3'])) == "Ket" or RasiLord(BhavaResident($_SESSION['Bhava4'])) == "Ket" or RasiLord(BhavaResident($_SESSION['Bhava5'])) == "Ket" or RasiLord(BhavaResident($_SESSION['Bhava6'])) == "Ket" or RasiLord(BhavaResident($_SESSION['Bhava7'])) == "Ket" or RasiLord(BhavaResident($_SESSION['Bhava8'])) == "Ket" or RasiLord(BhavaResident($_SESSION['Bhava9'])) == "Ket" or RasiLord(BhavaResident($_SESSION['Bhava10'])) == "Ket" or RasiLord(BhavaResident($_SESSION['Bhava11'])) == "Ket" or RasiLord(BhavaResident($_SESSION['Bhava12'])) == "Ket")
{ $nak1_no = 8;}



echo "This is vbn rasi : " . RasiLord(BhavaResident($_SESSION['Bhava1'])) . "<br>";
echo "This is Nahs1 : ". $nak1_no . "<br>";

?>
<tbody>
<tr>
<td colspan="2" align="left">Lagna Bhava is : <strong><?php echo RasiNumName(RasiNum($_SESSION['tmp_Asdt'])); ?></strong></td>
</tr>
<tr>
<td colspan="2" align="left">Lagna Lord is : <?php echo $_SESSION['Bhava1'] . " who is in the star of " . $naks_array[$nak_b1_no]; ?></td>
</tr>
<tr>
<td colspan="2" align="left">Lagna Lord <strong><?php echo $_SESSION['Bhava1']; ?></strong> is posited in [<?php echo RasiNumName(BhavaResident($_SESSION['Bhava1'])); ?>], whose Lord is <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava1'])); ?></strong>. This <?php echo RasiLord(BhavaResident($_SESSION['Bhava1'])); ?> is in the Star of <strong> <?php echo $naks_array[$nak1_no]; ?></strong></td>
</tr>

<tr>
<td align="left">Bhava Lord <strong><?php echo $_SESSION['Bhava1']; ?></strong> is posited in <br>[Enemy/Friend/Neutral] : </td><td><?php echo SignLord(BhavaResident($_SESSION['Bhava1'])); ?></td>
</tr>
<td align="left">Bhava Lord <strong><?php echo $_SESSION['Bhava1']; ?></strong> is posited in [Own] : </td><td><?php echo SignLord(BhavaResident($_SESSION['Bhava1'])); ?></td>
</tr>
<td align="left">Bhava Lord <strong><?php echo $_SESSION['Bhava1']; ?></strong> is posited in [Exalted/Debilitated] : </td><td><?php echo SignLord(BhavaResident($_SESSION['Bhava1'])); ?></td>
</tr>
</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   1st column ends  -->

<!--   2nd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-green" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-tachometer"></i>
                            Aspect
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td>First Bhava Lord is : </td><td><?php echo $_SESSION['Bhava1']; ?></td>
</tr>
<tr>
<td>Bhava Lord posited in : </td><td><?php echo $_SESSION['Bhava1']; ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   2nd column ends  -->

<!--   3rd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-orange" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-cogs"></i>
                            Conjunction
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td colspan="2">First Bhava Lord <strong><?php echo $_SESSION['Bhava1']; ?></strong> is conjunct with :</td>
</tr>
<tr>
<td><?php echo Planet_Conjunction(BhavaResident($_SESSION['Bhava1']), $_SESSION['Bhava1'], $_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Long_Rah'], $_SESSION['tmp_Long_Ket']); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   3rd column ends  -->

</div> <!-- Row End -->

<!-- Tanu Bhava, Bhava 1 Ends -->
</div>
<!-- Display for Bhava 1  ends -->

											
<div id="bhava2" class="tab-pane fade">
<!-- Display for Dhana Bhava, Bhava 2 Starts -->
<div class="row">
<div class="col-xs-12">
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert"></button>
		<strong>Dhana Bhava (Wealth)</strong>
		<br />
		Wealth, food, drink, speech, parental family, self-created family, movable property, ornaments, jewels, precious metals, clothes, vision, creative imagination, self-confidence, cheerfulness, learning, education, memory, fixity of mind, oral expression of knowledge, sources of income, maintenance of others. 

	</div>
</div> <!-- Col End -->
</div> <!-- Row End -->
<div class="row">
<div class="col-xs-6">

	<div class="well">
		<h4 class="brown smaller lighter">Family members:</h4>
		Parental family and Self-created family.
	</div>
	</div>
	<div class="col-xs-6">
		<div class="well">
			<h4 class="brown smaller lighter">Body Parts:</h4>
			Eyes, Right Eye, Face, Mouth, Tongue.
		</div>
	</div>
</div><!-- Row End -->

<div class="row">

<!--   1st column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-blue" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-table"></i>
                            Position
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td colspan="2" align="left">Second Bhava is : <strong><?php echo RasiNumName(RasiNum($_SESSION['tmp_H2'])); ?></strong></td>
</tr>
<tr>
<td colspan="2" align="left">Second Lord is : <?php echo $_SESSION['Bhava2'] . " who is in the star of " . $naks_array[$nak_b2_no]; ?></td>
</tr>
<tr>
<td colspan="2" align="left">Second Lord <strong><?php echo $_SESSION['Bhava2']; ?></strong> is posited in [<?php echo RasiNumName(BhavaResident($_SESSION['Bhava2'])); ?>], whose Lord is <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava2'])); ?></strong>. This <?php echo RasiLord(BhavaResident($_SESSION['Bhava2'])); ?> is in the Star of <strong> <?php echo $naks_array[$nak1_no]; ?></strong></td>
</tr>
<tr>
<td align="left">This <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava2'])); ?></strong> is in the Star of : </td><td><?php echo array_search($tmp_Naks_b2, $naks_array); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   1st column ends  -->

<!--   2nd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-green" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-tachometer"></i>
                            Aspect
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td>First Bhava Lord is : </td><td><?php echo $_SESSION['Bhava1']; ?></td>
</tr>
<tr>
<td>Bhava Lord posited in : </td><td><?php echo $_SESSION['Bhava1']; ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   2nd column ends  -->

<!--   3rd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-orange" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-cogs"></i>
                            Conjunction
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td colspan="2">Second Bhava Lord <strong><?php echo $_SESSION['Bhava2']; ?></strong> is conjunct with :</td>
</tr>
<tr>
<td><?php echo Planet_Conjunction(BhavaResident($_SESSION['Bhava2']), $_SESSION['Bhava2'], $_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Long_Rah'], $_SESSION['tmp_Long_Ket']); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   3rd column ends  -->

</div> <!-- Row End -->


<!-- Dhana Bhava, Bhava 2 details ends -->
</div>
<!-- Display for Bhava 2 ends -->

<div id="bhava3" class="tab-pane fade">
<!-- Display for Sahaja, Bhava 3 Starts -->
<div class="row">
<div class="col-xs-12">
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert"></button>
		<strong>Sahaja Bhava (Coborn)</strong>
		<br />
		Deliberate actions, motivation, interests, hobbies, sports, pleasures, assistance, servants, neighbours, short-term desires, short trips, short contacts, telephonic contacts, correspondence, writing, strength, valour, courage, stamina, initiation into spiritual practices, things heard, earrings, singing, acting talent, playing on musical instruments, manual skills, computer skills, death of parents. 
	</div>
</div> <!-- Col End -->
</div> <!-- Row End -->
<div class="row">
<div class="col-xs-6">
	<div class="well">
		<h4 class="red smaller lighter">Family members:</h4>
		Brothers and Sisters, Mother's Father's brother, First younger brother or sister.
	</div>
	</div>
	<div class="col-xs-6">
		<div class="well">
			<h4 class="red smaller lighter">Body Parts:</h4>
			Throat, Neck, Shoulders, Arms, Hands, Upper part of Chest, Right Ear.
		</div>
	</div>
</div><!-- Row End -->

<div class="row">

<!--   1st column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-blue" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-table"></i>
                            Position
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td colspan="2" align="left">Third Bhava is : <strong><?php echo RasiNumName(RasiNum($_SESSION['tmp_H3'])); ?></strong></td>
</tr>
<tr>
<td colspan="2" align="left">Third Lord is : <?php echo $_SESSION['Bhava3'] . " who is in the star of " . $naks_array[$nak_b3_no]; ?></td>
</tr>
<tr>
<td colspan="2" align="left">Third Lord <strong><?php echo $_SESSION['Bhava3']; ?></strong> is posited in [<?php echo RasiNumName(BhavaResident($_SESSION['Bhava3'])); ?>], whose Lord is <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava3'])); ?></strong>. This <?php echo RasiLord(BhavaResident($_SESSION['Bhava3'])); ?> is in the Star of <strong> <?php echo $naks_array[$nak1_no]; ?></strong></td>
</tr>
<tr>
<td align="left">This <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava3'])); ?></strong> is in the Star of : </td><td><?php echo array_search($tmp_Naks_b3, $naks_array); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   1st column ends  -->

<!--   2nd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-green" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-tachometer"></i>
                            Aspect
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td>Third Bhava Lord is : </td><td><?php echo $_SESSION['Bhava3']; ?></td>
</tr>
<tr>
<td>Bhava Lord posited in : </td><td><?php echo $_SESSION['Bhava3']; ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   2nd column ends  -->

<!--   3rd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-orange" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-cogs"></i>
                            Conjunction
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td colspan="2">Third Bhava Lord <strong><?php echo $_SESSION['Bhava3']; ?></strong> is conjunct with :</td>
</tr>
<tr>
<td><?php echo Planet_Conjunction(BhavaResident($_SESSION['Bhava3']), $_SESSION['Bhava3'], $_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Long_Rah'], $_SESSION['tmp_Long_Ket']); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   3rd column ends  -->

</div> <!-- Row End -->

</div>
<!-- Display for Sahaja, Bhava 3 ends -->

<div id="bhava4" class="tab-pane fade">
<!-- Bandhu, Bhava 4 Starts -->
<div class="row">
<div class="col-xs-12">
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert"></button>
		<strong>Bandhu Bhava (Relative)</strong>
		<br />
		Mind, heart, feelings, happiness, close friends, all family members, the mother, all well-wishers, home, comforts, home country, landed property, houses, gardens, underground treasures, wells, agricultural products, vehicles, horses, elephants, cows, buffaloes, goats and sheep, holy places, moral virtues, devotion to God, piety, righteous conduct, character, good name and reputation, education, erudition, ultimate results. 
	</div>
</div> <!-- Col End -->
</div> <!-- Row End -->
<div class="row">
<div class="col-xs-6">
	<div class="well">
		<h4 class="green smaller lighter">Family members:</h4>
		Mother, Parents, all Family members.
	</div>
	</div>
	<div class="col-xs-6">
		<div class="well">
			<h4 class="green smaller lighter">Body Parts:</h4>
			Chest, Lungs, Heart.
		</div>
	</div>
</div><!-- Row End -->
<div class="row">

<!--   1st column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-blue" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-table"></i>
                            Position
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td align="left">Fourth Bhava is : </td><td><?php echo RasiNumName(RasiNum($_SESSION['tmp_H4'])); ?></td>
</tr>
<tr>
<td align="left">Fourth Bhava Lord is : </td><td><?php echo $_SESSION['Bhava4']; ?></td>
</tr>
<tr>
<td colspan="2" align="left">Bhava Lord <strong><?php echo $_SESSION['Bhava4']; ?></strong> is posited in [<?php echo RasiNumName(BhavaResident($_SESSION['Bhava4'])); ?>], whose Lord is : <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava4'])); ?></strong></td>
</tr>
<tr>
<td align="left">This <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava4'])); ?></strong> is in the Star of : </td><td><?php echo array_search($tmp_Naks_b4, $naks_array); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   1st column ends  -->

<!--   2nd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-green" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-tachometer"></i>
                            Aspect
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td>Fourth Bhava Lord is : </td><td><?php echo $_SESSION['Bhava4']; ?></td>
</tr>
<tr>
<td>Bhava Lord posited in : </td><td><?php echo $_SESSION['Bhava4']; ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   2nd column ends  -->

<!--   3rd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-orange" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-cogs"></i>
                            Conjunction
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td colspan="2">Fourth Bhava Lord <strong><?php echo $_SESSION['Bhava4']; ?></strong> is conjunct with :</td>
</tr>
<tr>
<td><?php echo Planet_Conjunction(BhavaResident($_SESSION['Bhava4']), $_SESSION['Bhava4'], $_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Long_Rah'], $_SESSION['tmp_Long_Ket']); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   3rd column ends  -->

</div> <!-- Row End -->

</div>
<!-- Display for Bhava 4 ends -->

<div id="bhava5" class="tab-pane fade">
<!-- Display for Putra, Bhava 5 Starts -->
<div class="row">
<div class="col-xs-12">
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert"></button>
		<strong>Putra Bhava (Son)</strong>
		<br />
		Creative Intelligence, knowledge, education, memory, talents, judgement, discretion, advice, merits from past life, devotion to gods and brahmins, deity of one's choice, knowledge of mantras, tantras and yantras, virtues, ruling powers, royalty, authority, fall from position, literary works, amusements, romance, children, disciples, wealth, prosperity, nature of spouse. 
	</div>
</div> <!-- Col End -->
</div> <!-- Row End -->
<div class="row">
<div class="col-xs-6">
	<div class="well">
		<h4 class="blue smaller lighter">Family members:</h4>
		Children, Second younger brother or sister.
	</div>
	</div>
	<div class="col-xs-6">
		<div class="well">
			<h4 class="blue smaller lighter">Body Parts:</h4>
			Stomach area, Heart.
		</div>
	</div>
</div><!-- Row End -->

<div class="row">

<!--   1st column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-blue" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-table"></i>
                            Position
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td align="left">Fifth Bhava is : </td><td><?php echo RasiNumName(RasiNum($_SESSION['tmp_H5'])); ?></td>
</tr>
<tr>
<td align="left">Fifth Bhava Lord is : </td><td><?php echo $_SESSION['Bhava5']; ?></td>
</tr>
<tr>
<td colspan="2" align="left">Bhava Lord <strong><?php echo $_SESSION['Bhava5']; ?></strong> is posited in [<?php echo RasiNumName(BhavaResident($_SESSION['Bhava5'])); ?>], whose Lord is : <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava5'])); ?></strong></td>
</tr>
<tr>
<td align="left">This <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava5'])); ?></strong> is in the Star of : </td><td><?php echo array_search($tmp_Naks_b5, $naks_array); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   1st column ends  -->

<!--   2nd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-green" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-tachometer"></i>
                            Aspect
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td>Fifth Bhava Lord is : </td><td><?php echo $_SESSION['Bhava5']; ?></td>
</tr>
<tr>
<td>Bhava Lord posited in : </td><td><?php echo $_SESSION['Bhava5']; ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   2nd column ends  -->

<!--   3rd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-orange" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-cogs"></i>
                            Conjunction
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td colspan="2">Fifth Bhava Lord <strong><?php echo $_SESSION['Bhava5']; ?></strong> is conjunct with :</td>
</tr>
<tr>
<td><?php echo Planet_Conjunction(BhavaResident($_SESSION['Bhava5']), $_SESSION['Bhava5'], $_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Long_Rah'], $_SESSION['tmp_Long_Ket']); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   3rd column ends  -->

</div> <!-- Row End -->


</div>
<!-- Display for Bhava 5 ends -->

<div id="bhava6" class="tab-pane fade">
<!-- Display for Ari, Bhava 6 Starts -->
<div class="row">
<div class="col-xs-12">
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert"></button>
		<strong>Ari Bhava (Enemy)</strong>
		<br />
		Worries, anxieties, obstacles, enemies, thieves, vices, challenges, tests, urge for perfection, self-improvement techniques, competitive power, turning obstacles into opportunities, difference of opinion, conflicts, debts, diseases, suffering, wounds, service, daily job, imprisonment, quadrupeds, pet animals. receiving charity. 
	</div>
</div> <!-- Col End -->
</div> <!-- Row End -->
<div class="row">
<div class="col-xs-6">
	<div class="well">
		<h4 class="brown smaller lighter">Family members:</h4>
		Mother's brother (maternal uncle), Step-Mother.
	</div>
	</div>
	<div class="col-xs-6">
		<div class="well">
			<h4 class="brown smaller lighter">Body Parts:</h4>
			Navel area, Intestines, Digestive tract.
		</div>
	</div>
</div><!-- Row End -->

<div class="row">

<!--   1st column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-blue" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-table"></i>
                            Position
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td align="left">Sixth Bhava is : </td><td><?php echo RasiNumName(RasiNum($_SESSION['tmp_H6'])); ?></td>
</tr>
<tr>
<td align="left">Sixth Bhava Lord is : </td><td><?php echo $_SESSION['Bhava6']; ?></td>
</tr>
<tr>
<td colspan="2" align="left">Bhava Lord <strong><?php echo $_SESSION['Bhava6']; ?></strong> is posited in [<?php echo RasiNumName(BhavaResident($_SESSION['Bhava6'])); ?>], whose Lord is : <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava6'])); ?></strong></td>
</tr>
<tr>
<td align="left">This <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava6'])); ?></strong> is in the Star of : </td><td><?php echo array_search($tmp_Naks_b6, $naks_array); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   1st column ends  -->

<!--   2nd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-green" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-tachometer"></i>
                            Aspect
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td>Sixth Bhava Lord is : </td><td><?php echo $_SESSION['Bhava6']; ?></td>
</tr>
<tr>
<td>Bhava Lord posited in : </td><td><?php echo $_SESSION['Bhava6']; ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   2nd column ends  -->

<!--   3rd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-orange" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-cogs"></i>
                            Conjunction
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td colspan="2">Sixth Bhava Lord <strong><?php echo $_SESSION['Bhava6']; ?></strong> is conjunct with :</td>
</tr>
<tr>
<td><?php echo Planet_Conjunction(BhavaResident($_SESSION['Bhava6']), $_SESSION['Bhava6'], $_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Long_Rah'], $_SESSION['tmp_Long_Ket']); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   3rd column ends  -->

</div> <!-- Row End -->

</div>
<!-- Display for Bhava 6 ends -->

<div id="bhava7" class="tab-pane fade">
<!-- Display for Spouse, Bhava 7 Starts -->
<div class="row">
<div class="col-xs-12">
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert"></button>
		<strong>Yuvati Bhava (Spouse)</strong>
		<br />
		Husband, wife, partner, lover, marriage, partnership, sexual affairs, medium-term desires, business partner, co-operation, trade, commerce, travel, journeys, litigation, living abroad, nature of spouse, relationship with all others, the world at large as seen by the native, happiness from children.
	</div>
</div> <!-- Col End -->
</div> <!-- Row End -->
<div class="row">
<div class="col-xs-6">
	<div class="well">
		<h4 class="green smaller lighter">Family members:</h4>
		Husband, Wife, Second child, Third younger brother or sister.
	</div>
	</div>
	<div class="col-xs-6">
		<div class="well">
			<h4 class="green smaller lighter">Body Parts:</h4>
			Basti area, Colon, Internal Sexual organs.
		</div>
	</div>
</div><!-- Row End -->

<div class="row">

<!--   1st column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-blue" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-table"></i>
                            Position
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td align="left">Seventh Bhava is : </td><td><?php echo RasiNumName(RasiNum($_SESSION['tmp_H7'])); ?></td>
</tr>
<tr>
<td align="left">Seventh Bhava Lord is : </td><td><?php echo $_SESSION['Bhava7']; ?></td>
</tr>
<tr>
<td colspan="2" align="left">Bhava Lord <strong><?php echo $_SESSION['Bhava7']; ?></strong> is posited in [<?php echo RasiNumName(BhavaResident($_SESSION['Bhava7'])); ?>], whose Lord is : <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava7'])); ?></strong></td>
</tr>
<tr>
<td align="left">This <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava7'])); ?></strong> is in the Star of : </td><td><?php echo array_search($tmp_Naks_b7, $naks_array); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   1st column ends  -->

<!--   2nd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-green" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-tachometer"></i>
                            Aspect
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td>Seventh Bhava Lord is : </td><td><?php echo $_SESSION['Bhava7']; ?></td>
</tr>
<tr>
<td>Bhava Lord posited in : </td><td><?php echo $_SESSION['Bhava7']; ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   2nd column ends  -->

<!--   3rd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-orange" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-cogs"></i>
                            Conjunction
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td colspan="2">Seventh Bhava Lord <strong><?php echo $_SESSION['Bhava7']; ?></strong> is conjunct with :</td>
</tr>
<tr>
<td><?php echo Planet_Conjunction(BhavaResident($_SESSION['Bhava7']), $_SESSION['Bhava7'], $_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Long_Rah'], $_SESSION['tmp_Long_Ket']); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   3rd column ends  -->

</div> <!-- Row End -->

</div>
<!-- Display for Bhava 7 ends -->

<div id="bhava8" class="tab-pane fade">
<!-- Display for Randhra, Bhava 8 Starts -->
<div class="row">
<div class="col-xs-12">
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert"></button>
		<strong>Randhra Bhava (Vulnerable Point)</strong>
		<br />
		Longevity, transformation, the gap, the mechanics of nature, the cognition of the structuring dynamics of consciousness,, the experience of the constitution of the universe, knowledge of past, present and future, transcendence, siddhis, regeneration, rebirth, discontinuation, dangers, chronic ailments, agonies, accidents, enemies, mode of death, wealth of the spouse, unearned wealth, inheritance, underground places, hidden treasures, everything hidden, mysteries of life and "death," overseas journeys. 
	</div>
</div> <!-- Col End -->
</div> <!-- Row End -->
<div class="row">
<div class="col-xs-6">
	<div class="well">
		<h4 class="red smaller lighter">Family members:</h4>
		Family of the spouse.
	</div>
	</div>
	<div class="col-xs-6">
		<div class="well">
			<h4 class="red smaller lighter">Body Parts:</h4>
			External Sexual organs.
		</div>
	</div>
</div><!-- Row End -->

<div class="row">

<!--   1st column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-blue" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-table"></i>
                            Position
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td align="left">Eigth Bhava is : </td><td><?php echo RasiNumName(RasiNum($_SESSION['tmp_H8'])); ?></td>
</tr>
<tr>
<td align="left">Eigth Bhava Lord is : </td><td><?php echo $_SESSION['Bhava8']; ?></td>
</tr>
<tr>
<td colspan="2" align="left">Bhava Lord <strong><?php echo $_SESSION['Bhava8']; ?></strong> is posited in [<?php echo RasiNumName(BhavaResident($_SESSION['Bhava8'])); ?>], whose Lord is : <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava8'])); ?></strong></td>
</tr>
<tr>
<td align="left">This <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava8'])); ?></strong> is in the Star of : </td><td><?php echo array_search($tmp_Naks_b8, $naks_array); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   1st column ends  -->

<!--   2nd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-green" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-tachometer"></i>
                            Aspect
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td>Eigth Bhava Lord is : </td><td><?php echo $_SESSION['Bhava8']; ?></td>
</tr>
<tr>
<td>Bhava Lord posited in : </td><td><?php echo $_SESSION['Bhava8']; ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   2nd column ends  -->

<!--   3rd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-orange" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-cogs"></i>
                            Conjunction
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td colspan="2">Eigth Bhava Lord <strong><?php echo $_SESSION['Bhava8']; ?></strong> is conjunct with :</td>
</tr>
<tr>
<td><?php echo Planet_Conjunction(BhavaResident($_SESSION['Bhava8']), $_SESSION['Bhava8'], $_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Long_Rah'], $_SESSION['tmp_Long_Ket']); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   3rd column ends  -->

</div> <!-- Row End -->

</div>
<!-- Display for Bhava 8 ends -->

<div id="bhava9" class="tab-pane fade">
<!-- Display for Dharma, Bhava 9 Starts -->
<div class="row">
<div class="col-xs-12">
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert"></button>
		<strong>Dharma Bhava (Spitituallity)</strong>
		<br />
		Dharma, support of nature, merits from past lives, fortunes, wisdom, Vedic Science, meditation, yagya, tapas, life philosophy, world view, faith, religion, worship, piety, morality, ethics, higher education, professional training, children, solution to problems, visits to shrines, pilgrimages, foreign travels, air travels, the guru. 
	</div>
</div> <!-- Col End -->
</div> <!-- Row End -->
<div class="row">
<div class="col-xs-6">
	<div class="well">
		<h4 class="blue smaller lighter">Family members:</h4>
		Brother's wife, Wife's brother, Children, Grand Children, 4th younger brother or sister.
	</div>
	</div>
	<div class="col-xs-6">
		<div class="well">
			<h4 class="blue smaller lighter">Body Parts:</h4>
			Thighs, Hips.
		</div>
	</div>
</div><!-- Row End -->

<div class="row">

<!--   1st column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-blue" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-table"></i>
                            Position
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td align="left">Ninth Bhava is : </td><td><?php echo RasiNumName(RasiNum($_SESSION['tmp_H9'])); ?></td>
</tr>
<tr>
<td align="left">Ninth Bhava Lord is : </td><td><?php echo $_SESSION['Bhava9']; ?></td>
</tr>
<tr>
<td colspan="2" align="left">Bhava Lord <strong><?php echo $_SESSION['Bhava9']; ?></strong> is posited in [<?php echo RasiNumName(BhavaResident($_SESSION['Bhava9'])); ?>], whose Lord is : <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava9'])); ?></strong></td>
</tr>
<tr>
<td align="left">This <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava9'])); ?></strong> is in the Star of : </td><td><?php echo array_search($tmp_Naks_b9, $naks_array); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   1st column ends  -->

<!--   2nd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-green" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-tachometer"></i>
                            Aspect
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td>Ninth Bhava Lord is : </td><td><?php echo $_SESSION['Bhava9']; ?></td>
</tr>
<tr>
<td>Bhava Lord posited in : </td><td><?php echo $_SESSION['Bhava9']; ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   2nd column ends  -->

<!--   3rd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-orange" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-cogs"></i>
                            Conjunction
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td colspan="2">Ninth Bhava Lord <strong><?php echo $_SESSION['Bhava9']; ?></strong> is conjunct with :</td>
</tr>
<tr>
<td><?php echo Planet_Conjunction(BhavaResident($_SESSION['Bhava9']), $_SESSION['Bhava9'], $_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Long_Rah'], $_SESSION['tmp_Long_Ket']); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   3rd column ends  -->

</div> <!-- Row End -->


</div>
<!-- Display for Bhava 9 ends -->

<div id="bhava10" class="tab-pane fade">
<!-- Display for Karma, Bhava 10 Starts -->
<div class="row">
<div class="col-xs-12">
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert"></button>
		<strong>Karma Bhava (Activity)</strong>
		<br />
		Activity, occupation, profession, career, reputation, prestige, success and status in society, honour from government, , promotion, rank, renown, fame, ambition, happiness, authority, royalty, ruling power, sense of importance, dignity, living in foreign lands, commerce, trade, clothing. 
	</div>
</div> <!-- Col End -->
</div> <!-- Row End -->
<div class="row">
<div class="col-xs-6">
	<div class="well">
		<h4 class="brown smaller lighter">Family members:</h4>
		Father.
	</div>
	</div>
	<div class="col-xs-6">
		<div class="well">
			<h4 class="brown smaller lighter">Body Parts:</h4>
			Knees, Spine.
		</div>
	</div>
</div><!-- Row End -->

<div class="row">

<!--   1st column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-blue" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-table"></i>
                            Position
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td align="left">Tenth Bhava is : </td><td><?php echo RasiNumName(RasiNum($_SESSION['tmp_H10'])); ?></td>
</tr>
<tr>
<td align="left">Tenth Bhava Lord is : </td><td><?php echo $_SESSION['Bhava10']; ?></td>
</tr>
<tr>
<td colspan="2" align="left">Bhava Lord <strong><?php echo $_SESSION['Bhava10']; ?></strong> is posited in [<?php echo RasiNumName(BhavaResident($_SESSION['Bhava10'])); ?>], whose Lord is : <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava10'])); ?></strong></td>
</tr>
<tr>
<td align="left">This <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava10'])); ?></strong> is in the Star of : </td><td><?php echo array_search($tmp_Naks_b10, $naks_array); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   1st column ends  -->

<!--   2nd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-green" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-tachometer"></i>
                            Aspect
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td>Tenth Bhava Lord is : </td><td><?php echo $_SESSION['Bhava10']; ?></td>
</tr>
<tr>
<td>Bhava Lord posited in : </td><td><?php echo $_SESSION['Bhava10']; ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   2nd column ends  -->

<!--   3rd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-orange" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-cogs"></i>
                            Conjunction
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td colspan="2">Tenth Bhava Lord <strong><?php echo $_SESSION['Bhava10']; ?></strong> is conjunct with :</td>
</tr>
<tr>
<td><?php echo Planet_Conjunction(BhavaResident($_SESSION['Bhava10']), $_SESSION['Bhava10'], $_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Long_Rah'], $_SESSION['tmp_Long_Ket']); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   3rd column ends  -->

</div> <!-- Row End -->

</div>
<!-- Display for Bhava 10 ends -->

<div id="bhava11" class="tab-pane fade">
<!-- Display for Income, Bhava 11 Starts -->
<div class="row">
<div class="col-xs-12">
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert"></button>
		<strong>Labha Bhava (Income)</strong>
		<br />
		Income, gains, profits, all articles, prosperity, long-term desires, fulfilment of desires, fulfilment of dreams and ambitions in life, good news, auspicious events, elder brothers and sisters, air travel, favourites, circle of friends, community, club-life, quadrupeds; the lord of the eleventh house stands for difficulties and diseases. 
	</div>
</div> <!-- Col End -->
</div> <!-- Row End -->
<div class="row">
<div class="col-xs-6">
	<div class="well">
		<h4 class="green smaller lighter">Family members:</h4>
		Elder brothers and sisters, Elder brother or sister directly above the Native, Son's wife, 5th younger brother or sister.
	</div>
	</div>
	<div class="col-xs-6">
		<div class="well">
			<h4 class="green smaller lighter">Body Parts:</h4>
			Calves, Ankles, Left Ear.
		</div>
	</div>
</div><!-- Row End -->

<div class="row">

<!--   1st column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-blue" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-table"></i>
                            Position
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td align="left">Eleventh Bhava is : </td><td><?php echo RasiNumName(RasiNum($_SESSION['tmp_H11'])); ?></td>
</tr>
<tr>
<td align="left">Eleventh Bhava Lord is : </td><td><?php echo $_SESSION['Bhava11']; ?></td>
</tr>
<tr>
<td colspan="2" align="left">Bhava Lord <strong><?php echo $_SESSION['Bhava11']; ?></strong> is posited in [<?php echo RasiNumName(BhavaResident($_SESSION['Bhava11'])); ?>], whose Lord is : <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava11'])); ?></strong></td>
</tr>
<tr>
<td align="left">This <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava11'])); ?></strong> is in the Star of : </td><td><?php echo array_search($tmp_Naks_b11, $naks_array); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   1st column ends  -->

<!--   2nd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-green" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-tachometer"></i>
                            Aspect
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td>Eleventh Bhava Lord is : </td><td><?php echo $_SESSION['Bhava11']; ?></td>
</tr>
<tr>
<td>Bhava Lord posited in : </td><td><?php echo $_SESSION['Bhava11']; ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   2nd column ends  -->

<!--   3rd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-orange" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-cogs"></i>
                            Conjunction
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td colspan="2">Eleventh Bhava Lord <strong><?php echo $_SESSION['Bhava11']; ?></strong> is conjunct with :</td>
</tr>
<tr>
<td><?php echo Planet_Conjunction(BhavaResident($_SESSION['Bhava11']), $_SESSION['Bhava11'], $_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Long_Rah'], $_SESSION['tmp_Long_Ket']); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   3rd column ends  -->

</div> <!-- Row End -->


</div>
<!-- Display for Bhava 11 ends -->

<div id="bhava12" class="tab-pane fade">
<!-- Display for Vyaya, Bhava 12 Starts -->
<div class="row">
<div class="col-xs-12">
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert"></button>
		<strong>Vyaya Bhava (Loss)</strong>
		<br />
		Expenses, losses, wastes, loss of relativity, gain of spirituality, enlightenment, moksha, renunciation, loss of attachment, loss of identification, donations, charity, journey to far off distant lands, lonely places, confinement in prison, hospital or monastery, pleasures of the bed, secret enemies, spies, fall.
	</div>
</div> <!-- Col End -->
</div> <!-- Row End -->
<div class="row">
<div class="col-xs-6">
	<div class="well">
		<h4 class="red smaller lighter">Family members:</h4>
		Father's Brother (Paternal uncle).
	</div>
	</div>
	<div class="col-xs-6">
		<div class="well">
			<h4 class="red smaller lighter">Body Parts:</h4>
			Feet, Left eye.
		</div>
	</div>
</div><!-- Row End -->

<div class="row">

<!--   1st column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-blue" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-table"></i>
                            Position
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td align="left">Twelth Bhava is : </td><td><?php echo RasiNumName(RasiNum($_SESSION['tmp_H12'])); ?></td>
</tr>
<tr>
<td align="left">Twelth Bhava Lord is : </td><td><?php echo $_SESSION['Bhava12']; ?></td>
</tr>
<tr>
<td colspan="2" align="left">Bhava Lord <strong><?php echo $_SESSION['Bhava12']; ?></strong> is posited in [<?php echo RasiNumName(BhavaResident($_SESSION['Bhava12'])); ?>], whose Lord is : <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava12'])); ?></strong></td>
</tr>
<tr>
<td align="left">This <strong><?php echo RasiLord(BhavaResident($_SESSION['Bhava12'])); ?></strong> is in the Star of : </td><td><?php echo array_search($tmp_Naks_b12, $naks_array); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   1st column ends  -->

<!--   2nd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-green" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-tachometer"></i>
                            Aspect
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td>Twelth Bhava Lord is : </td><td><?php echo $_SESSION['Bhava12']; ?></td>
</tr>
<tr>
<td>Bhava Lord posited in : </td><td><?php echo $_SESSION['Bhava12']; ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   2nd column ends  -->

<!--   3rd column starts  -->
<div class="col-xs-4 widget-container-col" id="widget-container-col-2">
                      <div class="widget-box widget-color-orange" id="widget-box-2">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-cogs"></i>
                            Conjunction
                          </h5>
                          
                        </div><!-- widget header end -->
                        <div class="widget-body">
                          <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td colspan="2">Twelth Bhava Lord <strong><?php echo $_SESSION['Bhava12']; ?></strong> is conjunct with :</td>
</tr>
<tr>
<td><?php echo Planet_Conjunction(BhavaResident($_SESSION['Bhava12']), $_SESSION['Bhava12'], $_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Long_Rah'], $_SESSION['tmp_Long_Ket']); ?></td>
</tr>

</tbody>
</table>
          </div>
        </div><!-- widget body end -->
      </div><!-- widget box end -->
    </div><!-- col /.span end -->
<!--   3rd column ends  -->

</div> <!-- Row End -->


</div>
<!-- Display for Bhava 12 ends -->



</div> <!-- Shadbala Tab Content Ends -->

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
