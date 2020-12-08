<?php
// Initialize the session
session_start();
//include ('./accesscontrol.php');

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


include ('./planet_calculations.php'); /// All functions for planet calculations

// Include config file
require_once "DbConnection.php";
 
// Define variables and initialize with empty values
$client_name = $client_dob = $client_tob = $country = $region = $city = $client_long = $client_lat = $client_tz = "";
$client_name_err = $client_dob_err = $client_tob_err = $country_err = $region_err = $city_err = $client_long_err = $client_lat_err = $client_tz_err = "";
$user_id =  $_SESSION["id"];
//echo $user_id . "<br>";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){


 
    // Validate Client Name
    if(empty(trim($_POST["client_name"]))){
        $client_name_err = "Please enter a Client Name.";
	} else{
        $client_name = trim($_POST["client_name"]);
    }
            
    
    // Validate Client Date of Birth
    if(empty(trim($_POST["client_dob"]))){
        $client_dob_err = "Please Select a Date of Birth";     
    } else{
        $client_dob = trim($_POST["client_dob"]);
    }

	// Validate Client Time of Birth
    if(empty(trim($_POST["client_tob"]))){
        $client_tob_err = "Please Select a Time of Birth";     
    } else{
        $client_tob = trim($_POST["client_tob"]);
    }

    // Validate Country
    if(empty(trim($_POST["country"]))){
        $country_err = "Please Select a Country";     
    } else{
         $country = trim($_POST["country"]);
    }

    // Validate State
    if(empty(trim($_POST["region"]))){
        $region_err = "Please Select a State";     
    } else{
         $region = trim($_POST["region"]);
    }

    // Validate City
    if(empty(trim($_POST["city"]))){
        $city_err = "Please Select a City";     
    } else{
         $city = trim($_POST["city"]);
    }



 // Check input errors before inserting in database
    if(empty($client_name_err) && empty($client_dob_err) && empty($client_tob_err) && empty($country_err) && empty($region_err) && empty($city_err)){
    

//*****  Natal data calculation for Ascendant starts here 

// check if the form has been submitted
//  if (isset($_GET['id']))
//{
//$id = $_GET['id'];

//$results = $connection->query("SELECT * FROM natal_data WHERE id = $id");

//foreach ($results as $value)
//{

  //echo "<br> id: ". $value["id"]. " - Name: ". $value["client_name"]. " " . $value["client_dob"]. $value["client_tob"]. " " . $value["client_pob"]. " " .  "<br>";

    // get all variables from database
   // $h_sys = safeEscapeString($_POST["h_sys"]);
    $_SESSION['name'] = $client_name;

    $_SESSION['dob'] = $client_dob;

    $tmpDate = explode('.',$_SESSION['dob']);
    

    $day = $tmpDate[0];
    $month = $tmpDate[1];
    $year = $tmpDate[2];

    $_SESSION['tob'] = $client_tob;
    $tmpTime = explode(':',$_SESSION['tob']);

      $hour = $tmpTime[0];
      $minute = $tmpTime[1];
      $sec = "0";
 

$sql = "SELECT id, name, latitude, longitude, timezone FROM city WHERE id = $city";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<br> id: ". $row["id"]. " - Name: ". $row["name"]. " " . $row["latitude"]. $row["longitude"]. " " . $row["timezone"]. " " .  "<br>";
  
    $param_pob = $row["name"];
    $param_longDeg = $row["longitude"];
    $param_latDeg = $row["latitude"];
    $param_tz = $row["timezone"];


/*
echo "This is client name : " . $client_name . "<br>";
echo "This is client DOB : " . $client_dob . "<br>";
echo "This is client TOB : " . $client_tob . "<br>";
echo "This is client City : " . $city . "<br>";
echo "This is client POB : " . $param_pob . "<br>";
echo "This is client Longitude : " . $param_longDeg . "<br>";
echo "This is client Latitude : " . $param_latDeg . "<br>";
echo "This is client TimeZone : " . $param_tz . "<br>";
*/

  }
} else {
  //echo "0 results";
  
}





 /*  
    
if (isset($value["chk1"]))
  {
    $chk1 = 1;
  }
  else
  {
    $chk1 = 0;
  }

  */ 

    //$_SESSION['country'] = $value["client_country"];
    //$_SESSION['state'] = $value["client_state"];
    //$city = $value["client_city"];

 /*   
        require_once('DbConnection.php');
        
$sql = "SELECT id, name, latitude, longitude, timezone FROM city WHERE id = $city";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "<br> id: ". $row["id"]. " - Name: ". $row["name"]. " " . $row["latitude"]. $row["longitude"]. " " . $row["timezone"]. " " .  "<br>";

*/
    //$_SESSION['tmp_pob'] = $value["client_pob"];
    $_SESSION['long_deg'] = $param_longDeg;
    $_SESSION['lat_deg'] = $param_latDeg;
    $_SESSION['timezone'] = $param_tz;
/*
  }
} else {
  //echo "0 results";
}

  */    
/*
    if ($chk1 == "1")
        {
            $_SESSION['pob'] = $value["POB"];
            $_SESSION['long_deg'] = $value["LongDegree"];
            $_SESSION['lat_deg'] = $value["LatDegree"];
            $_SESSION['timezone'] = $value["TimeZone"];

        }
    else
            {
            $_SESSION['pob'] = $_SESSION['tmp_pob'];
            $_SESSION['long_deg'] = $_SESSION['tmp_longDeg'];
            $_SESSION['lat_deg'] = $_SESSION['tmp_latDeg'];
            $_SESSION['timezone'] = $_SESSION['tmp_tz'];

            }
*/

  
//}

/*
echo $name;
echo "<br>";
echo $dob;
echo "<br>";
echo $tob;
echo "<br>";
echo $pob;
echo "<br>";
echo $long_deg;
echo "<br>";
echo $lat_deg;
echo "<br>";
echo $timezone;
echo "<br>";
*/

      // no errors in filling out form, so process form
      // calculate astronomic data
      $swephsrc = './sweph';    //sweph MUST be in a folder no less than at this level
      $sweph = './sweph';

      // Unset any variables not initialized elsewhere in the program
      unset($PATH,$out,$pl_name,$longitude1,$house_pos);

      //assign data from database to local variables
      $inmonth = $month;
      $inday = $day;
      $inyear = $year;

      $inhours = $hour;
      $inmins = $minute;
      $insecs = "0";

/*


*/

      $intz = $_SESSION['timezone'];

      $my_longitude = $_SESSION['long_deg'];
      $my_latitude = $_SESSION['lat_deg'];

      $abs_tz = abs($intz);
      $the_hours = floor($abs_tz);
      $fraction_of_hour = $abs_tz - floor($abs_tz);
      $the_minutes = 60 * $fraction_of_hour;
      $whole_minutes = floor(60 * $fraction_of_hour);
      $fraction_of_minute = $the_minutes -$whole_minutes;
      $whole_seconds = round(60 * $fraction_of_minute);

      if ($intz >= 0)
      {
        $inhours = $inhours - $the_hours;
        $inmins = $inmins - $whole_minutes;
        $insecs =  $insecs - $whole_seconds;
      }
      else
      {
        $inhours = $inhours + $the_hours;
        $inmins = $inmins + $whole_minutes;
        $insecs =  $insecs + $whole_seconds;
      }

/*
      $str_ut = (($tob - $timezone)/60);
      $str_ut_hr = abs($tr_ut);
      $str_ut_min = (($str_ut - floor($str_ut_hr)) * 60);
      $tzut = $str_ut_hr &"."&$str_ut_min&"00"
*/

//echo $tzut;

      // adjust date and time for minus hour due to time zone taking the hour negative
       $utdatenow = strftime("%d.%m.%Y", mktime($inhours, $inmins, $insecs, $inmonth, $inday, $inyear));
       $utnow = strftime("%H:%M:%S", mktime($inhours, $inmins, $insecs, $inmonth, $inday, $inyear));
/*
echo $utdatenow;
echo "<br>";
echo $utnow;
echo "<br>";
*/
       $h_sys = "P";
      

      //putenv("PATH=$PATH:$swephsrc");

      // get LAST_PLANET planets and all house cusps
      //if (strlen($h_sys) != 1) { $h_sys = "p"; }


      //exec ("swetest -edir$sweph -b$utdatenow -ut$utnow -p0123456789DAttt -eswe -house$my_longitude,$my_latitude,$h_sys -flsj -g, -head", $out);

       //exec ("swetest -edir$sweph -b$utdatenow -ut$utnow -p0123456mt -eswe -house$my_longitude,$my_latitude,$h_sys -flsj -g, -head", $out);
       
       exec ("swetest -edir$sweph -b$utdatenow -ut$utnow -p0123456mt  -geopos$my_longitude,$my_latitude,$h_sys -fPlsj  -house -g, -head", $out);

       exec ("swetest  -ay1 -b$utdatenow -ut$utnow  -house -g -head", $ayanaout);
           


      // Each line of output data from swetest is exploded into array $row, giving these elements:
      // 0 = longitude
      // 1 = speed
      // 2 = house position
      // planets are index 0 - index (LAST_PLANET), house cusps are index (LAST_PLANET + 1) - (LAST_PLANET + 12)
      foreach ($out as $key => $line)
      {

        $row = explode(',',$line);
        $planet1[$key] = $row[0];       
        $longitude1[$key] = $row[1];
        $speed1[$key] = $row[2];
        //$house_pos1[$key] = $row[2];

 /*       echo $key;
        echo "<br>";
        echo $planet1[$key];
        echo "<br>";
        echo $longitude1[$key];
        echo "<br>";
        echo $speed1[$key];
        echo "<br>";
        //echo $house_pos1[$key];
        //echo "<br>";

*/
};

// Calculation of Ayanamsa 

foreach ($ayanaout as $key1 => $line1)
      {

        $ayanarow = explode(',',$line1);
        $ayana[$key1] = $ayanarow[0];
        
        $tmpAyana =  $ayana[$key1];
        $_SESSION['tmpAyana'] = str_replace("Ayanamsa", "", $tmpAyana);

        //$house_pos1[$key] = $row[2];

/*        
        echo $ayana[$key1];
        echo "<br>";
        echo $tmpAyana;
echo "<br>";
        echo DMStoDD($tmpAyana);
        echo "<br>";
       
        //echo $house_pos1[$key];
        //echo "<br>";
*/
      };

// End of Ayanamsa Calculation
      
// Calculating Planet Longitudes substracting Ayanamsa

$_SESSION['tmp_Ayana'] = DMStoDD($_SESSION['tmpAyana']);

$_SESSION['tmp_Speed_Sun'] = $speed1[0];
$_SESSION['tmp_Speed_Moon'] = $speed1[1];
$_SESSION['tmp_Speed_Mer'] = $speed1[2];
$_SESSION['tmp_Speed_Ven'] = $speed1[3];
$_SESSION['tmp_Speed_Mar'] = $speed1[4];
$_SESSION['tmp_Speed_Jup'] = $speed1[5];
$_SESSION['tmp_Speed_Sat'] = $speed1[6];
$_SESSION['tmp_Speed_Rah'] = $speed1[8];



$tmp_Long_Sun = $longitude1[0] - $_SESSION['tmp_Ayana'];
If ($tmp_Long_Sun < 0);
  {
    $tmp_Long_Sun = ($tmp_Long_Sun + 360);
    $_SESSION['tmp_Long_Sun'] = fmod($tmp_Long_Sun, 360);

  }

$tmp_Long_Moon = $longitude1[1] - $_SESSION['tmp_Ayana'];
If ($tmp_Long_Moon < 0);
  {
    $tmp_Long_Moon = ($tmp_Long_Moon + 360);
    $_SESSION['tmp_Long_Moon'] = fmod($tmp_Long_Moon, 360);
  }

$tmp_Long_Mer = $longitude1[2] - $_SESSION['tmp_Ayana'];
If ($tmp_Long_Mer < 0);
  {
    $tmp_Long_Mer = ($tmp_Long_Mer + 360);
    $_SESSION['tmp_Long_Mer'] = fmod($tmp_Long_Mer, 360);
  }

$tmp_Long_Ven = $longitude1[3] - $_SESSION['tmp_Ayana'];
If ($tmp_Long_Ven < 0);
  {
    $tmp_Long_Ven = ($tmp_Long_Ven + 360);
    $_SESSION['tmp_Long_Ven'] = fmod($tmp_Long_Ven, 360);
  }

$tmp_Long_Mar = $longitude1[4] - $_SESSION['tmp_Ayana'];
If ($tmp_Long_Mar < 0);
  {
    $tmp_Long_Mar = ($tmp_Long_Mar + 360);
    $_SESSION['tmp_Long_Mar'] = fmod($tmp_Long_Mar, 360);
  }

$tmp_Long_Jup = $longitude1[5] - $_SESSION['tmp_Ayana'];
If ($tmp_Long_Jup < 0);
  {
    $tmp_Long_Jup = ($tmp_Long_Jup + 360);
    $_SESSION['tmp_Long_Jup'] = fmod($tmp_Long_Jup, 360); 
  }

$tmp_Long_Sat = $longitude1[6] - $_SESSION['tmp_Ayana'];
If ($tmp_Long_Sat < 0);
  {
    $tmp_Long_Sat = ($tmp_Long_Sat + 360);
    $_SESSION['tmp_Long_Sat'] = fmod($tmp_Long_Sat, 360);
  }

$tmp_Long_Rah = $longitude1[8] - $_SESSION['tmp_Ayana'];
If ($tmp_Long_Rah < 0);
  {
    $tmp_Long_Rah = ($tmp_Long_Rah + 360);
    $_SESSION['tmp_Long_Rah'] = fmod($tmp_Long_Rah, 360);
  }



$tmp_Asc = $longitude1[9] - $_SESSION['tmp_Ayana'];
If ($tmp_Asc < 0);
  {
    $tmp_Asc = ($tmp_Asc + 360);
    $_SESSION['tmp_Asc'] = fmod($tmp_Asc, 360);
  }


/* Tithi Calculation Starts */
$tmp_tithi_Moon = $_SESSION['tmp_Long_Moon'];
$tmp_tithi_Sun =  $_SESSION['tmp_Long_Sun'];
If ($tmp_tithi_Moon < $tmp_tithi_Sun)
{
  $tmp_tithi_Moon = $tmp_tithi_Moon + 360;
}

$tmp_Tithi = ($tmp_tithi_Moon - $tmp_tithi_Sun);
$txt_Tithi = ($tmp_Tithi / 12);
$txt_Tithi = ceil($txt_Tithi);
$_Session['Tithi'] = Tithi($txt_Tithi);
/*echo "This is the Tithi on the day of birth : " . $_Session['Tithi'] . "<br>";*/






/*Titithi Calculation Ends  */

$tmp_H2 = $longitude1[10] - $_SESSION['tmp_Ayana'];
$tmp_H3 = $longitude1[11] - $_SESSION['tmp_Ayana'];
$tmp_H4 = $longitude1[12] - $_SESSION['tmp_Ayana'];
$tmp_H5 = $longitude1[13] - $_SESSION['tmp_Ayana'];
$tmp_H6 = $longitude1[14] - $_SESSION['tmp_Ayana'];
$tmp_H7 = $longitude1[15] - $_SESSION['tmp_Ayana'];
$tmp_H8 = $longitude1[16] - $_SESSION['tmp_Ayana'];
$tmp_H9 = $longitude1[17] - $_SESSION['tmp_Ayana'];
$tmp_H10 = $longitude1[18] - $_SESSION['tmp_Ayana'];
$tmp_H11 = $longitude1[19] - $_SESSION['tmp_Ayana'];
$tmp_H12 = $longitude1[20] - $_SESSION['tmp_Ayana'];


$_SESSION['tmp_Rasi_Asc'] = RasiNum($_SESSION['tmp_Asc']);
$_SESSION['tmp_Rasi_Sun'] = RasiNum($_SESSION['tmp_Long_Sun']);
$_SESSION['tmp_Rasi_Moon'] = RasiNum($_SESSION['tmp_Long_Moon']);
$_SESSION['tmp_Rasi_Mar'] = RasiNum($_SESSION['tmp_Long_Mar']);
$_SESSION['tmp_Rasi_Mer'] = RasiNum($_SESSION['tmp_Long_Mer']);
$_SESSION['tmp_Rasi_Jup'] = RasiNum($_SESSION['tmp_Long_Jup']);
$_SESSION['tmp_Rasi_Ven'] = RasiNum($_SESSION['tmp_Long_Ven']);
$_SESSION['tmp_Rasi_Sat'] = RasiNum($_SESSION['tmp_Long_Sat']);
$_SESSION['tmp_Rasi_Rah'] = RasiNum($_SESSION['tmp_Long_Rah']);




// Natal data calculation for Ascendant ends here 


    // Check input errors before inserting in database
  //  if(empty($client_name_err) && empty($client_dob_err) && empty($client_tob_err) && empty($country_err) && empty($region_err) && empty($city_err)){
    


        // Prepare an insert statement
        $sql = "INSERT INTO natal_data (client_name, client_dob, client_tob, client_country, client_state, client_city, client_pob, client_lon, client_lat, client_tz, client_asc, client_moon, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssssss", $param_client_name, $param_client_dob, $param_client_tob, $param_country, $param_region, $param_city, $param_pob, $param_longDeg, $param_latDeg, $param_tz, $param_Asc, $param_MoonNaks, $param_userid);
            
            // Set parameters
            $param_client_name = $client_name;
            $param_client_dob = $client_dob;
			$param_client_tob = $client_tob;
			$param_country = $country;
			$param_region = $region;
			$param_city = $city;
			$param_Asc = Rasi($_SESSION['tmp_Asc']);
			$param_MoonNaks = Naks($_SESSION['tmp_Long_Moon']);
			$param_userid = $user_id;

			
			//$param_client_lon = $client_lon;
			//$param_client_lat = $client_lat;
			//$param_client_tz = $client_tz;



            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
//    mysqli_close($connection);
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
					<li class="active open">
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

              <li class="">
                <a href="ashtakavarga.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Ashtakavarga
                </a>

                <b class="arrow"></b>
              </li>

              <li class="active">
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
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

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
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="error-container">
                  <div class="well">
                    <h1 class="grey lighter smaller">
                      <span class="blue bigger-125">
                        <i class="ace-icon fa fa-random"></i>
                        500
                      </span>
                      Something Went Wrong
                    </h1>

                    <hr />
                    <h3 class="lighter smaller">
                      But we are working
                      <i class="ace-icon fa fa-wrench icon-animated-wrench bigger-125"></i>
                      on it!
                    </h3>

                    <div class="space"></div>

                    <div>
                      <h4 class="lighter smaller">Meanwhile, try one of the following:</h4>

                      <ul class="list-unstyled spaced inline bigger-110 margin-15">
                        <li>
                          <i class="ace-icon fa fa-hand-o-right blue"></i>
                          Read the faq
                        </li>

                        <li>
                          <i class="ace-icon fa fa-hand-o-right blue"></i>
                          Give us more info on how this specific error occurred!
                        </li>
                      </ul>
                    </div>

                    <hr />
                    <div class="space"></div>

                    <div class="center">
                      <a href="javascript:history.back()" class="btn btn-grey">
                        <i class="ace-icon fa fa-arrow-left"></i>
                        Go Back
                      </a>

                      <a href="index.php" class="btn btn-primary">
                        <i class="ace-icon fa fa-tachometer"></i>
                        Dashboard
                      </a>
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


			$('.time-picker').timepicker({
					autoclose: true,
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
