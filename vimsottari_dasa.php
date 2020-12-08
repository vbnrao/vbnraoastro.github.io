<?php
// Initialize the session
session_start();


// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}





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


table.ab  {

 width: 600px;
 margin-left: 0px;
  border-collapse: collapse;
  background-color: #01579b;


}

table.ab td {

	margin: 20px;
	border: 1px solid white;
	width: 200px;
	height: 30px;
	color: white;
	/*font-weight: bold; font-family: tahoma; font-size: 12px;
  	color: #009;
  	*/
}


table.ab, td, th {
    text-align: left;
    padding-left: 20PX;
}

/* second table styling */

table.abc  {

 
  border-collapse: separate;
  border-spacing: 0 5px;
  
}

table.abc td {
	border-right: hidden;
	margin: 20px;
	border: 1px solid black;
	width: 200px;
	height: 30px;
	color: blue;
	background-color: #4391DF;
	/*font-weight: bold; font-family: tahoma; font-size: 12px;
  	color: #009;
  	*/
}


table.abc, td, th {
    text-align: left;
    padding-left: 0PX;
}



/* second table styling ends */

/* Third table styling */

table.abd  {

 
  border-collapse: separate;
  border-spacing: 0 5px;
  
}

table.abd td {
	border-right: hidden;
	margin: 20px;
	border: 1px solid black;
	width: 200px;
	height: 30px;
	color:blue;
	background-color: #90C7FF;

	/*font-weight: bold; font-family: tahoma; font-size: 12px;
  	color: #009;
  	*/
}


table.abd, td, th {
    text-align: left;
    padding-left: 0PX;
}



/* Third table styling ends */

/* Fourth table styling */

table.abe  {

 
  border-collapse: collapse;
  background-color: #ddf;
}

table.abe td {

	margin: 20px;
	border: 1px solid red;
	width: 200px;
	height: 30px;

	/*font-weight: bold; font-family: tahoma; font-size: 12px;
  	color: #009;
  	*/
}


table.abe, td, th {
    text-align: left;
    padding-left: 20PX;

}


.gfg {
	border-collapse: separate;
	border-spacing: 0 15px;
}
/* Fourth table styling ends */

#center,
table td + td,
table th + th
{
    text-align: center;
}

ul {
	list-style-type: none;
	text-decoration-line: none;

}
</style>
		<script type="text/javascript" language="javascript" src="assets/js/listCollapse2.js"></script>
		<!--<script type="text/javascript" language="javascript" src="./cookie.js"></script>-->
		<script type="text/javascript" language="javascript"><!--
		function doOnLoad() {
			compactMenu('odo',true, oPl);
			selfLink('odo','samePage',true);
			stateToFromStr('odo',retrieveCookie('menuState'));
		}
		function notA() {
			window.alert('This is not a real link ;-)');
		}
		//--></script>

<style type="text/css"><!--
		/* list styles */


		/*div { width: 700px; background-color: #4391DF;   } */
		
		/*div { width: 700px; background-color: #92cc58;  padding-bottom: 20px; padding-top: 10px;  } */

		#odo { 
			border-left: 0px; 
			border-right: 4px; 
			margin-bottom: 10px; 
			margin-left: 0px; 

			}
		




		
		</style>




	</head>

	<body class="no-skin" onload="doOnLoad();">
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
                <a href="vimsottari_dasa.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Vimsottari Dasa
                </a>

                <b class="arrow"></b>
              </li>

              <li class="">
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
								<a href="#">Home</a>
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
									Vimsottari Dasa Details 
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
<!-- Body goes here -->
<div class="col-xs-2"></div>
<div class="col-xs-6">
<div>


	<table class="ab"><tr><td><strong>Dasa Planet</strong></td><td><strong>Starts From</strong></td><td><strong>Ends on</strong></td></tr></table>

<ul id="odo" class="list">
<!-- Dasa Sequence 1  -->

<?php

include ('./planet_calculations.php'); /// All functions for planet calculations

// Vimsottari Dasa Calculations
/*
echo "<br>";
echo "<br>";

echo  $_SESSION['tmp_Long_Moon'];
echo "<br>";

echo $_SESSION['dob'];
echo "<br>";
*/
//$dob = $_SESSION['dob'];
$vbn = $_SESSION['dob'];

//echo "This is vbn Date of Birth : " . $vbn . "<br>";

$vbn = date_create($vbn);
$vbn1 = $vbn;
$vbn = date_format($vbn, 'd/m/Y');
$vbnmdy = date_format($vbn1, 'm/d/Y');


//echo "this is vbn date dob : " . $vbn . "<br>";
//echo "this is vbn (m-d-y) date dob : " . $vbn1 . "<br>";




$Moon_Long = $_SESSION['tmp_Long_Moon'];
$Remain_Moon_Long = round(fmod($Moon_Long, 13.333333),4);
$Starting_Dasa_No = fmod(NaksNum($Moon_Long),9);
$Consumed = round(($Remain_Moon_Long * FullDasa($Starting_Dasa_No))/13.3333);
$Consumed_tmp = 'P' . ($Consumed - 1) . 'D';
$First_Full_Dasa = FullDasaYears($Starting_Dasa_No);
$First_Full_Dasa_tmp = 'P' . $First_Full_Dasa . 'Y';


//echo "This is consumed Days : " . $Consumed_tmp . "<br>";



$start_date_sub = new DateTime($vbnmdy);
$start_date_sub->sub(new DateInterval($Consumed_tmp));
$start_date_dmy = $start_date_sub->format('d/m/Y');
$start_date_mdy = $start_date_sub->format('m/d/Y');
$start_dasa_dob = $start_date_dmy;

//echo "This is vbnrao First Start Dasa period : " . $vbn . "<br>";

$date1 = new DateTime($start_date_mdy);
$date1->add(new DateInterval($First_Full_Dasa_tmp));
$vbnend1 = $date1->format('d/m/Y');

//echo "This is vbn 1year ending : " . $vbnend1 . "<br>";
//echo "<br>";

$tmp_DSeq = $Starting_Dasa_No;
$tmp_StartDasa = $start_dasa_dob;
$tmp_EndDasa = $vbnend1;

$i = 1;
$vbnendmdy[$i] = $date1->format('m/d/Y');

for ($i=1; $i < 10; $i++)
{
	$txt_DSeq[$i] = $tmp_DSeq;
	$txt_StartDasa[$i] = $tmp_StartDasa;
	$txt_EndDasa[$i] = $tmp_EndDasa;




	//echo "This is Dasa Sequence No. " . $i . " = " . $txt_DSeq[$i] . " ---- " . DasaName($txt_DSeq[$i]) . " Start Dasa --- " . $txt_StartDasa[$i] . " End Dasa --- " . $txt_EndDasa[$i] . " <br>";
	
		$tmp_DSeq = $tmp_DSeq + 1;
		$tmp_StartDasa = $txt_EndDasa[$i];

If ($tmp_DSeq > 9)
{
	$tmp_DSeq = 1;
}

		$Next_Full_Dasa[$i] = FullDasaYears($tmp_DSeq);
		$Next_Full_Dasa_tmp[$i] = 'P' . $Next_Full_Dasa[$i] . 'Y';
		
		$date[$i+1] = new DateTime($vbnendmdy[$i]);
		$date[$i+1]->add(new DateInterval($Next_Full_Dasa_tmp[$i]));
		$tmp_EndDasa = $date[$i+1]->format('d/m/Y');
		$vbnendmdy[$i+1] = $date[$i+1]->format('m/d/Y');


//End of for Loop Calculations
}

// start for here for extra printings

//'dasa1' : {text: 'For Sale  --- starts on   28/12/2019  --- Ends on --- 29/10/2030', type: 'folder'}	,




$_SESSION['dasaseq_1'] = $txt_DSeq[1];

$_SESSION['dasa_start_seq_1'] = $txt_StartDasa[1];
$_SESSION['dasa_start_seq_2'] = $txt_StartDasa[2];
$_SESSION['dasa_start_seq_3'] = $txt_StartDasa[3];
$_SESSION['dasa_start_seq_4'] = $txt_StartDasa[4];
$_SESSION['dasa_start_seq_5'] = $txt_StartDasa[5];
$_SESSION['dasa_start_seq_6'] = $txt_StartDasa[6];
$_SESSION['dasa_start_seq_7'] = $txt_StartDasa[7];
$_SESSION['dasa_start_seq_8'] = $txt_StartDasa[8];
$_SESSION['dasa_start_seq_9'] = $txt_StartDasa[9];

$_SESSION['dasa_end_seq_1'] = $txt_EndDasa[1];
$_SESSION['dasa_end_seq_2'] = $txt_EndDasa[2];
$_SESSION['dasa_end_seq_3'] = $txt_EndDasa[3];
$_SESSION['dasa_end_seq_4'] = $txt_EndDasa[4];
$_SESSION['dasa_end_seq_5'] = $txt_EndDasa[5];
$_SESSION['dasa_end_seq_6'] = $txt_EndDasa[6];
$_SESSION['dasa_end_seq_7'] = $txt_EndDasa[7];
$_SESSION['dasa_end_seq_8'] = $txt_EndDasa[8];
$_SESSION['dasa_end_seq_9'] = $txt_EndDasa[9];



/*

echo "This Starting Dasa seq_1 : " . $_SESSION['dasa_start_seq_1'] . "This is Ending Dasa seq_1" . $_SESSION['dasa_end_seq_1'] . "<br>";
echo "This Starting Dasa seq_2 : " . $_SESSION['dasa_start_seq_2'] . "This is Ending Dasa seq_2" . $_SESSION['dasa_end_seq_2'] . "<br>";
echo "This Starting Dasa seq_3 : " . $_SESSION['dasa_start_seq_3'] . "This is Ending Dasa seq_3" . $_SESSION['dasa_end_seq_3'] . "<br>";
echo "This Starting Dasa seq_4 : " . $_SESSION['dasa_start_seq_4'] . "This is Ending Dasa seq_4" . $_SESSION['dasa_end_seq_4'] . "<br>";
echo "This Starting Dasa seq_5 : " . $_SESSION['dasa_start_seq_5'] . "This is Ending Dasa seq_5" . $_SESSION['dasa_end_seq_5'] . "<br>";
echo "This Starting Dasa seq_6 : " . $_SESSION['dasa_start_seq_6'] . "This is Ending Dasa seq_6" . $_SESSION['dasa_end_seq_6'] . "<br>";
echo "This Starting Dasa seq_7 : " . $_SESSION['dasa_start_seq_7'] . "This is Ending Dasa seq_7" . $_SESSION['dasa_end_seq_7'] . "<br>";
echo "This Starting Dasa seq_8 : " . $_SESSION['dasa_start_seq_8'] . "This is Ending Dasa seq_8" . $_SESSION['dasa_end_seq_8'] . "<br>";
echo "This Starting Dasa seq_9 : " . $_SESSION['dasa_start_seq_9'] . "This is Ending Dasa seq_9" . $_SESSION['dasa_end_seq_9'] . "<br>";

*/


for ($j=1; $j<10; $j++)
{
$timezone = "Asia/Calcutta";
date_default_timezone_set($timezone);


$don = $j;
//echo "This is DON : " . $don . "<br>";
//echo "<br>";

$vbntmp[$j] = $txt_StartDasa[$j];


$dasano_AD[$j] = $txt_DSeq[$j];
$start_AD[$j] = $vbntmp[$j];
$tmpStart[$j] = str_replace("/", "-", $start_AD[$j]);
//echo "this is replaced string : " . $tmpStart[$j] . "<br>";



//echo "This is starting VBNRAO ANtar Dasha *** Starting Year : " . $start_AD[$j] . "<br>";


$str_AD[$j] = round(FullDasa($dasano_AD[$j]) * BhuktiDasa($dasano_AD[$j]));
$str_AD_tmp[$j] = 'P' . $str_AD[$j] . 'D';

$start_AD_mdy_tmp[$j] = new DateTime($tmpStart[$j]);
$start_AD_mdy[$j] = $start_AD_mdy_tmp[$j]->format('d-m-Y');




$ADdate[$j] = new DateTime($start_AD_mdy[$j]);
$ADdate[$j]->add(new DateInterval($str_AD_tmp[$j]));
$ADvbnend[$j] = $ADdate[$j]->format('d/m/Y');


//echo "<br>";

$tmp_AntDSeq[$j] = $dasano_AD[$j];
$tmp_StartAntDasa[$j] = $start_AD[$j];
$tmp_EndAntDasa = $ADvbnend[$j];

$i = 1;
$ADvbnendmdy[$i] = $ADdate[$j]->format('m/d/Y');


//echo DasaName($txt_DSeq[$j]) . " Maha Dasa Starts on --- " . $txt_StartDasa[$j] . " --- Ends on --- " . $txt_EndDasa[$j] . "<br>";

//  Dasa Sequence 1 -->
?>
<li><table class="abc"><tr><td>
<?php

echo DasaName($txt_DSeq[$j]) . " Maha Dasa</td><td>" . $txt_StartDasa[$j] . "</td><td>" . $txt_EndDasa[$j] . "</td></tr></table>";
echo "<ul>";



//echo '<li><span class="caret">' . DasaName($txt_DSeq[$j]) . " Maha Dasa Starts on --- " . $txt_StartDasa[$j] . " --- Ends on --- " . $txt_EndDasa[$j] . '</span>';

//echo '<ul class="nested">';
//echo "<br>";


//echo "vbnrao *** This is Dasa Sequence No. " . $j . " = " . $txt_DSeq[$j] . " ---- " . DasaName($txt_DSeq[$j]) . " Start Dasa --- " . $txt_StartDasa[$j] . " End Dasa --- " . $txt_EndDasa[$j] . " <br>";

for ($i=1; $i < 10; $i++)
{



	$txt_ADSeq[$i] = $dasano_AD[$j];
	$txt_StartAntDasa[$i] = $tmp_StartAntDasa[$j];
	
	If ($i == 9)
	{
		
		$txt_EndAntDasa[$i] = $txt_EndDasa[$j];
	}
	Else
	{
		$txt_EndAntDasa[$i] = $tmp_EndAntDasa;
	}
	

//echo DasaName($txt_ADSeq[$i]) . " Antar Dasa in this MD Starts on --- " . $txt_StartAntDasa[$i] . " --- Ends on --- " . $txt_EndAntDasa[$i] . "<br>";

//<li><table><tr><td>Moon Antaradasa</td>-->
?>

<li><table class="abd"><tr><td> 

<?php
echo DasaName($txt_ADSeq[$i]) . " Antaradasa </td><td>" . $txt_StartAntDasa[$i] . "</td><td>" . $txt_EndAntDasa[$i] . "</td></tr></table>";
echo "<ul>";


//echo '<li><span class="caret">' . DasaName($txt_ADSeq[$i]) . " Antar Dasa in this MD Starts on --- " . $txt_StartAntDasa[$i] . " --- Ends on --- " . $txt_EndAntDasa[$i] . '</span>';

//echo '<ul class="nested">';
//echo "<br>";

	//echo "This is Dasa Sequence No. " . $i . " = " . $txt_ADSeq[$i] . " ---- " . DasaName($txt_ADSeq[$i]) . " ----- Start Antar Dasa -------- " . $txt_StartAntDasa[$i] . " ------ End Antar Dasa ------- " . $txt_EndAntDasa[$i] . " <br>";

//$xy = 1;


//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

//$donkey = $i;

//echo "This is DONKEY : " . $donkey . "<br>";
//echo "<br>";

$vbntmpBD[$i] = $txt_StartAntDasa[$i];



$dasano_BD[$i] = $txt_ADSeq[$i];
$start_BD[$i] = $vbntmpBD[$i];


$tmpStartBD[$i] = str_replace("/", "-", $start_BD[$i]);

/*
echo "this is replaced BD string : " . $tmpStartBD[$i] . "<br>";

echo "This is vbntmpBD Start_BD[$i] : " . $vbntmpBD[$i] . "<br>";
echo "<br>";
echo "This is Start_BD[$i] : " . $start_BD[$i] . "<br>";
echo "<br>";

echo "This is Bhukti Full Dasa DASA No*** " . $txt_DSeq[$j] . "<br>";
echo "This is Bhukti Full Dasa Antara DASA No*** : " . $txt_ADSeq[$j] . "<br>";
echo "This is Bhukti Full Dasa Bhikti DASA No*** : " . $dasano_BD[$j] . "<br>";

echo "This is Bhukti Full Dasa DASA : " . round(FullDasa($txt_DSeq[$j])) . "<br>";
echo "This is Bhukti Full Dasa Antara DASA : " . BhuktiDasa($txt_ADSeq[$j]) . "<br>";
echo "This is Bhukti Full Dasa Bhikti DASA : " . BhuktiDasa($dasano_BD[$j]) . "<br>";
*/
echo "This is full dasa [1] : " .  FullDasa($txt_ADSeq[$i]) . "<br>";
echo "This is full antar dasa [1] : " .  BhuktiDasa($txt_ADSeq[$i]) . "<br>";
echo "This is full pratyantar dasa [1] : " .  BhuktiDasa($dasano_BD[$i]) . "<br>";


$str_BD[$i] = round(FullDasa($txt_ADSeq[$i]) * BhuktiDasa($txt_ADSeq[$i]) * BhuktiDasa($dasano_BD[$i]));
$str_BD_tmp[$i] = 'P' . $str_BD[$i] . 'D';
echo "This is starting Pratyantar Dasha [1] Starting Year : " . $str_BD_tmp[$i] . "<br>";

$start_BD_mdy_tmp[$i] = new DateTime($tmpStartBD[$i]);

$start_BD_mdy[$i] = $start_BD_mdy_tmp[$i]->format('d-m-Y');



$BDdate[$i] = new DateTime($start_BD_mdy[$i]);

$BDdate[$i]->add(new DateInterval($str_BD_tmp[$i]));
$BDvbnend[$i] = $BDdate[$i]->format('d/M/Y');


$tmp_BukDSeq[$i] = $dasano_BD[$i];
$tmp_StartBukDasa[$i] = $start_BD[$i];
$tmp_EndBukDasa = $BDvbnend[$i];

$iy = 1;
$BDvbnendmdy[$iy] = $BDdate[$i]->format('m/d/Y');






//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
$k = 0;
$jj = 1;
$m = 1;
$txt_MDSeq[$k] = $dasano_BD[$i];


for ($jj=1; $jj<10; $jj++)
{
$txt_BDSeq[$jj] = $dasano_BD[$i];

	$txt_StartBukDasa[$jj] = $tmp_StartBukDasa[$m];
echo "VBNRAO TMP START BUKDASA : " . $tmp_StartBukDasa[$i] . "<br>";

	//echo "Text Start Bhukti Dasa 1 :" . $txt_StartBukDasa[$jj] . "<br>";
	If ($jj == 9)
	{
		//echo "vbn";
		$txt_EndBukDasa[$jj] = $txt_EndAntDasa[$i];
	}
	Else
	{
		$txt_EndBukDasa[$jj] = $tmp_EndBukDasa;
	}


echo "Maha Dasa : " . DasaName($txt_MDSeq[$k]) . "<br>";
echo "Antar Dasa : " .  DasaName($txt_MDSeq[$k]) . "<br>";
echo "Pratyantar Dasa : " . DasaName($txt_BDSeq[$jj]) . "<br>";

echo "START BHUK DASA : " . $txt_StartBukDasa[$jj] . "<br>";


echo DasaName($txt_BDSeq[$jj]) . "  Pratyantara Dasa</td><td>" . $txt_StartBukDasa[$jj] . "</td><td>" . $txt_EndBukDasa[$jj] . "</td></tr></table></a></li>"; 

$m = $m + 1;
if ($m > 9)
{
	$m = 1;
}

$tmp_StartBukDasa[$m] = $txt_EndBukDasa[$jj];
 
	


		$Next_Full_BukDasa[$jj] = round(FullDasa($txt_MDSeq[$k]) * BhuktiDasa($txt_MDSeq[$k]) * BhuktiDasa($txt_BDSeq[$jj]));
		//$Next_Full_BukDasa[$jj] = round(FullDasa($txt_DSeq[$j]) * BhuktiDasa($tmp_BukDSeq[$j]) * BhuktiDasa($dasano_BD[$i]));
		$Next_Full_BukDasa_tmp[$jj] = 'P' . $Next_Full_BukDasa[$jj] . 'D';
		
		//echo "This is starting *%*%*%*%*% Bhukti Dasha Period : " . $Next_Full_BukDasa_tmp[$jj] . "<br>";
		
		
		$BDdate[$jj+1] = new DateTime($BDvbnendmdy[$jj]);
		$BDdate[$jj+1]->add(new DateInterval($Next_Full_BukDasa_tmp[$jj]));
		
		$tmp_EndBukDasa = $BDdate[$jj+1]->format('d/M/Y');
		$BDvbnendmdy[$jj+1] = $BDdate[$jj+1]->format('m/d/Y');





$dasano_BD[$i] = $dasano_BD[$i] + 1;
if ($dasano_BD[$i] > 9)
{
	$dasano_BD[$i] = 1;
}


} // End For $jj

//**************************************************


echo "</ul>";
echo "</li>";

//echo "</ul>";
//echo "</li>";

//echo '</ul>'; // treview  
//echo '</li>'; //treview

//*****************************************************



$dasano_BD[$don] = $dasano_BD[$don] + 1;
	If ($dasano_BD[$don] > 9)
	{
		$dasano_BD[$don] = 1;
	}

		//$xy = $xy + 1;
		//$dasano_AD[$xy] = $dasano_AD[$xy] + 1;
		
		$dasano_AD[$j] = $dasano_AD[$j] + 1;
		$tmp_StartAntDasa[$j] = $txt_EndAntDasa[$i];

If ($dasano_AD[$j] > 9)
{
	$dasano_AD[$j] = 1;
}

//echo "This is Antardasha : " . $dasano_AD[$j] . "<br>";

		$Next_Full_AntDasa[$i] = round(FullDasa($tmp_AntDSeq[$j]) * BhuktiDasa($dasano_AD[$j]));
		$Next_Full_AntDasa_tmp[$i] = 'P' . $Next_Full_AntDasa[$i] . 'D';
		


		$ADdate[$i+1] = new DateTime($ADvbnendmdy[$i]);
		$ADdate[$i+1]->add(new DateInterval($Next_Full_AntDasa_tmp[$i]));
		
		$tmp_EndAntDasa = $ADdate[$i+1]->format('d/m/Y');
		$ADvbnendmdy[$i+1] = $ADdate[$i+1]->format('m/d/Y');


//End of for Loop Calculations



}
echo "</ul>"; 
echo "</li>"; 

//echo '</ul>'; // tree view 
//echo '</li>'; // tree view



}
echo '</ul>'; 


//echo '</ul>'; // tree view


//echo "This is counting DON : " . $don . "<br>";

/*
echo "<br>";
echo "<br>";

echo "'Dasa1' : {text: " . DasaName($txt_DSeq[1]) . "  &nbsp; &nbsp;Maha Dasa Starts from :  " . $txt_StartDasa[1] . "  --- Ends on ---  " . $txt_EndDasa[1] . "<br>";
echo "'Dasa2' : {text: " . DasaName($txt_DSeq[2]) . "  &nbsp; &nbsp;Maha Dasa Starts from :  " . $txt_StartDasa[2] . "  --- Ends on ---  " . $txt_EndDasa[2] . "<br>";
echo "'Dasa3' : {text: " . DasaName($txt_DSeq[3]) . "  &nbsp; &nbsp;Maha Dasa Starts from :  " . $txt_StartDasa[3] . "  --- Ends on ---  " . $txt_EndDasa[3] . "<br>";
echo "'Dasa4' : {text: " . DasaName($txt_DSeq[4]) . "  &nbsp; &nbsp;Maha Dasa Starts from :  " . $txt_StartDasa[4] . "  --- Ends on ---  " . $txt_EndDasa[4] . "<br>";
echo "'Dasa5' : {text: " . DasaName($txt_DSeq[5]) . "  &nbsp; &nbsp;Maha Dasa Starts from :  " . $txt_StartDasa[5] . "  --- Ends on ---  " . $txt_EndDasa[5] . "<br>";
echo "'Dasa6' : {text: " . DasaName($txt_DSeq[6]) . "  &nbsp; &nbsp;Maha Dasa Starts from :  " . $txt_StartDasa[6] . "  --- Ends on ---  " . $txt_EndDasa[6] . "<br>";
echo "'Dasa7' : {text: " . DasaName($txt_DSeq[7]) . "  &nbsp; &nbsp;Maha Dasa Starts from :  " . $txt_StartDasa[7] . "  --- Ends on ---  " . $txt_EndDasa[7] . "<br>";
echo "'Dasa8' : {text: " . DasaName($txt_DSeq[8]) . "  &nbsp; &nbsp;Maha Dasa Starts from :  " . $txt_StartDasa[8] . "  --- Ends on ---  " . $txt_EndDasa[8] . "<br>";
echo "'Dasa9' : {text: " . DasaName($txt_DSeq[9]) . "  &nbsp; &nbsp;Maha Dasa Starts from :  " . $txt_StartDasa[9] . "  --- Ends on ---  " . $txt_EndDasa[9] . "<br>";
echo "<br>";
echo "<br>";

echo DasaName($txt_ADSeq[1]) . " Antar Dasa in this MD Starts on --- " . $txt_StartAntDasa[1] . " --- Ends on --- " . $txt_EndAntDasa[1] . "<br>";
echo DasaName($txt_ADSeq[2]) . " Antar Dasa in this MD Starts on --- " . $txt_StartAntDasa[2] . " --- Ends on --- " . $txt_EndAntDasa[2] . "<br>";
echo DasaName($txt_ADSeq[3]) . " Antar Dasa in this MD Starts on --- " . $txt_StartAntDasa[3] . " --- Ends on --- " . $txt_EndAntDasa[3] . "<br>";
echo DasaName($txt_ADSeq[4]) . " Antar Dasa in this MD Starts on --- " . $txt_StartAntDasa[4] . " --- Ends on --- " . $txt_EndAntDasa[4] . "<br>";
echo DasaName($txt_ADSeq[5]) . " Antar Dasa in this MD Starts on --- " . $txt_StartAntDasa[5] . " --- Ends on --- " . $txt_EndAntDasa[5] . "<br>";
echo DasaName($txt_ADSeq[6]) . " Antar Dasa in this MD Starts on --- " . $txt_StartAntDasa[6] . " --- Ends on --- " . $txt_EndAntDasa[6] . "<br>";
echo DasaName($txt_ADSeq[7]) . " Antar Dasa in this MD Starts on --- " . $txt_StartAntDasa[7] . " --- Ends on --- " . $txt_EndAntDasa[7] . "<br>";
echo DasaName($txt_ADSeq[8]) . " Antar Dasa in this MD Starts on --- " . $txt_StartAntDasa[8] . " --- Ends on --- " . $txt_EndAntDasa[8] . "<br>";
echo DasaName($txt_ADSeq[9]) . " Antar Dasa in this MD Starts on --- " . $txt_StartAntDasa[9] . " --- Ends on --- " . $txt_EndAntDasa[9] . "<br>";

echo "<br>";
echo "<br>";
*/
//}
?>

</ul>
</div>



<!-- Body ends here -->

</div>
</div>
</div>
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
		<script src="assets/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->



		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/fuelux.spinner.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/daterangepicker.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="assets/js/jquery.knob.min.js"></script>
		<script src="assets/js/jquery.autosize.min.js"></script>
		<script src="assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/bootstrap-tag.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->




	<script type="text/javascript">
			jQuery(function($) {
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});

				$('#chk1').on('click', function() {
					var inp = $('#POB').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.removeAttribute('disabled');
						inp.placeholder="Enter Place of Birth Manually !";
						inp.value="";						
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.value="This text field is disabled!";
						
					}
				});


				$('#chk1').on('click', function() {
					var inp = $('#LatDegree').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.removeAttribute('disabled');
						inp.placeholder="Enter Latitude Manually !";
						inp.value="";						
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.value="This text field is disabled!";
						
					}
				});

				$('#chk1').on('click', function() {
					var inp1 = $('#LongDegree').get(0);
					if(inp1.hasAttribute('disabled')) {
						inp1.removeAttribute('disabled');
						inp1.placeholder="Enter Longitude Manually !";
						inp1.value="";
					}
					else {
						inp1.setAttribute('disabled' , 'disabled');
						inp1.value="This text field is disabled!";
					}
				});

				$('#chk1').on('click', function() {
					var inp2 = $('#TimeZone').get(0);
					if(inp2.hasAttribute('disabled')) {
						inp2.removeAttribute('disabled');
						inp2.placeholder="Enter Time Zone Manually !";
						inp2.value="";
					}
					else {
						inp2.setAttribute('disabled' , 'disabled');
						inp2.value="This text field is disabled!";
					}
				});

				$('#chk1').change(function() {
       				$(this).is(":checked")?$('#showCountry').hide():$('#showCountry').show()
       				$(this).is(":checked")?$('#showRegion').hide():$('#showRegion').show()
       				$(this).is(":checked")?$('#showCity').hide():$('#showCity').show()
       				$(this).is(":checked")?$('#showLabel').hide():$('#showLabel').show()
       				$(this).is(":checked")?$('#showLatLong').show():$('#showLatLong').hide()
 				});


		
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
