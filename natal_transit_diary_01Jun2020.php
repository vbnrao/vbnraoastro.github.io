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
//include ('./accesscontrol.php');
// Include config file
require_once "DbConnection.php";

if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$txt_ayana = "ay1"; 
    $txt_days = trim($_POST["vbnnumberdays"]);
    $sn_days = trim($_POST["vbnnumberdays"]);
    $txt_days = "n" . $txt_days;
    $start_date = trim($_POST["startDate"]);
    $start_date = date_create($start_date);
    $start_date = date_format($start_date, 'Y/m/d');



    $tmpDate_ut = explode('/',$start_date);
    

    $day_ut = $tmpDate_ut[2];
    $month_ut = $tmpDate_ut[1];
    $year_ut = $tmpDate_ut[0];
    $hour_ut = "5";
    $minute_ut = "30";
    $sec_ut = "0";

      $inmonth_ut = $month_ut;
      $inday_ut = $day_ut;
      $inyear_ut = $year_ut;

      $inhours_ut = $hour_ut;
      $inmins_ut = $minute_ut;
      $insecs_ut = "0";


      $intz_ut = "5.50";
      $abs_tz_ut = abs($intz_ut);
      $the_hours_ut = floor($abs_tz_ut);
      $fraction_of_hour_ut = $abs_tz_ut - floor($abs_tz_ut);
      $the_minutes_ut = 60 * $fraction_of_hour_ut;
      $whole_minutes_ut = floor(60 * $fraction_of_hour_ut);
      $fraction_of_minute_ut = $the_minutes_ut -$whole_minutes_ut;
      $whole_seconds_ut = round(60 * $fraction_of_minute_ut);

      if ($intz_ut >= 0)
      {
        $inhours_ut = $inhours_ut - $the_hours_ut;
        $inmins_ut = $inmins_ut - $whole_minutes_ut;
        $insecs_ut =  $insecs_ut - $whole_seconds_ut;
      }
      else
      {
        $inhours_ut = $inhours_ut + $the_hours_ut;
        $inmins_ut = $inmins_ut + $whole_minutes_ut;
        $insecs_ut =  $insecs_ut + $whole_seconds_ut;
      }


    $start_date_ut = strftime("%d.%m.%Y", mktime($inhours_ut, $inmins_ut, $insecs_ut, $inmonth_ut, $inday_ut, $inyear_ut));
    $start_utnow_ut = strftime("%H:%M:%S", mktime($inhours_ut, $inmins_ut, $insecs_ut, $inmonth_ut, $inday_ut, $inyear_ut));

    //$start_date1 = trim($_POST["startDate"]);
    //$start_date1 = date_create($start_date1);
    //$start_date1 = date_format($start_date1, 'm/d/Y');

    }
    else
    {
      //$my_longitude = "78.45000";
      //$my_latitude = "17.38000";

      $txt_ayana = "ay1";
    	$txt_days = "n1";
      $sn_days = "1";
      $start_date = date('Y/m/d');
      //$start_date_ut = date('Y.m.d');

    $tmpDate_ut = explode('/',$start_date);
    

    $day_ut = $tmpDate_ut[2];
    $month_ut = $tmpDate_ut[1];
    $year_ut = $tmpDate_ut[0];
    $hour_ut = "5";
    $minute_ut = "30";
    $sec_ut = "0";

      $inmonth_ut = $month_ut;
      $inday_ut = $day_ut;
      $inyear_ut = $year_ut;

      $inhours_ut = $hour_ut;
      $inmins_ut = $minute_ut;
      $insecs_ut = "0";

      $intz_ut = "5.50";
      $abs_tz_ut = abs($intz_ut);
      $the_hours_ut = floor($abs_tz_ut);
      $fraction_of_hour_ut = $abs_tz_ut - floor($abs_tz_ut);
      $the_minutes_ut = 60 * $fraction_of_hour_ut;
      $whole_minutes_ut = floor(60 * $fraction_of_hour_ut);
      $fraction_of_minute_ut = $the_minutes_ut -$whole_minutes_ut;
      $whole_seconds_ut = round(60 * $fraction_of_minute_ut);

      if ($intz_ut >= 0)
      {
        $inhours_ut = $inhours_ut - $the_hours_ut;
        $inmins_ut = $inmins_ut - $whole_minutes_ut;
        $insecs_ut =  $insecs_ut - $whole_seconds_ut;
      }
      else
      {
        $inhours_ut = $inhours_ut + $the_hours_ut;
        $inmins_ut = $inmins_ut + $whole_minutes_ut;
        $insecs_ut =  $insecs_ut + $whole_seconds_ut;
      }


    $start_date_ut = strftime("%d.%m.%Y", mktime($inhours_ut, $inmins_ut, $insecs_ut, $inmonth_ut, $inday_ut, $inyear_ut));
    $start_utnow_ut = strftime("%H:%M:%S", mktime($inhours_ut, $inmins_ut, $insecs_ut, $inmonth_ut, $inday_ut, $inyear_ut));



      //$start_date1 = date('m/d/Y');
    }

//echo "this is total days for transit diary :" . $sn_days . "<br>";
//echo "this is total days for transit diary :" . $start_date . "<br>";


// check if the form has been submitted
  if (isset($_GET['id']))
  {
$id = $_GET['id'];

$_SESSION['natalid'] = $_GET['id'];

//echo "This is Test Ayaana : " . $txt_ayana . "<br>";

$results = $connection->query("SELECT * FROM natal_data WHERE id = $id");

foreach ($results as $value)
{

  //echo "<br> id: ". $value["id"]. " - Name: ". $value["client_name"]. " " . $value["client_dob"]. $value["client_tob"]. " " . $value["client_pob"]. " " .  "<br>";

    // get all variables from database
   // $h_sys = safeEscapeString($_POST["h_sys"]);
    $_SESSION['name'] = $value["client_name"];

    $_SESSION['dob'] = $value["client_dob"];

    $tmpDate = explode('.',$_SESSION['dob']);
    

    $day = $tmpDate[0];
    $month = $tmpDate[1];
    $year = $tmpDate[2];

    $_SESSION['tob'] = $value["client_tob"];
    $tmpTime = explode(':',$_SESSION['tob']);

      $hour = $tmpTime[0];
      $minute = $tmpTime[1];
      $sec = "0";


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

    $_SESSION['country'] = $value["client_country"];
    $_SESSION['state'] = $value["client_state"];
    $city = $value["client_city"];

 /*   
        require_once('DbConnection.php');
        
$sql = "SELECT id, name, latitude, longitude, timezone FROM city WHERE id = $city";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "<br> id: ". $row["id"]. " - Name: ". $row["name"]. " " . $row["latitude"]. $row["longitude"]. " " . $row["timezone"]. " " .  "<br>";

*/
    $_SESSION['tmp_pob'] = $value["client_pob"];
    $_SESSION['long_deg'] = $value["client_lon"];
    $_SESSION['lat_deg'] = $value["client_lat"];
    $_SESSION['timezone'] = $value["client_tz"];
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

  
}


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

$utdatenow1 = strftime("%d-%m-%Y %H:%M:%S", mktime($inhours, $inmins, $insecs, $inmonth, $inday, $inyear));
$utdatenow3 = strftime("%d.%m.%Y", mktime($inhours, $inmins, $insecs, $inmonth, $inday, $inyear));

$utdatenow2 = strftime("%d-%m-%Y %H:%M:%S", mktime($inhours, $inmins, $insecs, $inmonth, $inday-1, $inyear));
$utdatenow4 = strftime("%d.%m.%Y", mktime($inhours, $inmins, $insecs, $inmonth, $inday-1, $inyear));
/*
echo $utdatenow;
echo "<br>";
echo $utnow;
echo "<br>";
*/
       $h_sys = "P";
	//$txt_ayana = "ay1";
	//$vbn_ayana = "ay1";

//echo "This is post ayana : " . $_POST["vbn_ayana"] . "<br>";
//$txt_ayana = $_POST["txt_ayana"];
//echo "This is vbnrao ayanamsha : " . $txt_ayana . "<br>";

      //putenv("PATH=$PATH:$swephsrc");

      // get LAST_PLANET planets and all house cusps
      //if (strlen($h_sys) != 1) { $h_sys = "p"; }
// Calculation for Sunrise and Sunset

//*****************************

exec ("swetest -rise -hindu -b$utdatenow3 -p0  -geopos$my_longitude,$my_latitude", $sunout);

exec ("swetest -rise -hindu -b$utdatenow4 -p0  -geopos$my_longitude,$my_latitude", $sunout1);

//echo var_dump($sunout);
//echo "This is array-1 :" . $sunout[1] . "<br>";
//echo "UT Date now 1 : " . $utdatenow1 . "<br>";
//echo "UT Date now 2 : " . $utdatenow2 . "<br>";
//echo "UT Time now : " . $utnow . "<br>";
//echo "UT Time now 1 : " . $utnow1 . "<br>";

$tmp_sunrise = explode('rise ', $sunout[1]);
$tmp_sunrise = $tmp_sunrise[1];
$tmp_sunrise = explode('set ', $tmp_sunrise);
$txt_sunrise = $tmp_sunrise[0];
$txt_sunset = $tmp_sunrise[1];

$txt_sunrise = strtotime($txt_sunrise);
$txt_sunset = strtotime($txt_sunset);

$txt_sunrise =  date('m/d/Y H:i:s', $txt_sunrise);
$txt_sunset =  date('m/d/Y H:i:s', $txt_sunset);

//echo "&*&*&*&*&*" . $txt_sunrise . "<br>";

$sunrise = convertDateFromTimeZone($txt_sunrise, 'UTC', 'Asia/Calcutta','d-m-Y H:i:s');
$sunset = convertDateFromTimeZone($txt_sunset, 'UTC', 'Asia/Calcutta','d-m-Y H:i:s');

//echo "This is sunrise : " . $sunrise . "<br>";
//echo "This is sunset : " . $sunset . "<br>";

// Previous day sunrise details for comparing before sunrise birth


$tmp_sunrise1 = explode('rise ', $sunout1[1]);
$tmp_sunrise1 = $tmp_sunrise1[1];
$tmp_sunrise1 = explode('set ', $tmp_sunrise1);
$txt_sunrise1 = $tmp_sunrise1[0];
$txt_sunset1 = $tmp_sunrise1[1];


//echo "This is xxx tmp sunrise : " . $txt_sunrise . "<br>";
//echo "This is xxx tmp sunset : " . $txt_sunset . "<br>";

$txt_sunrise1 = strtotime($txt_sunrise1);
$txt_sunset1 = strtotime($txt_sunset1);





//$sunrise_date = new DateTime($txt_sunrise, new DateTimeZone('Asia/Calcutta'));
//$sunrise_date->setTimezone(New DateTimeZone('Asia/Calcutta'));
//echo $sunrise_date->format('d/m/Y H:i:sP') . "<br>";

//$txt_sunrise =  date_format($txt_sunrise, 'd/m/Y H:i:s');
$txt_sunrise1 =  date('m/d/Y H:i:s', $txt_sunrise1);
$txt_sunset1 =  date('m/d/Y H:i:s', $txt_sunset1);


//echo "&*&*&*&*&*Next day :" . $txt_sunrise1 . "<br>";
//echo "&*&*&*&*&* Sunset : " . $txt_sunset . "<br>";

//echo "&&&&&&&&&&&&&" . convertDateFromTimeZone($txt_sunrise, 'UTC', 'Asia/Calcutta','d-m-Y H:i:s');
//echo "&&&&&&&&&&&&& Sunset : " . convertDateFromTimeZone($txt_sunset, 'UTC', 'Asia/Calcutta','d-m-Y H:i:s');
//echo "This is vbnrao  tmp timezone : " . $txt_intz . "<br>";
//echo "This is vbnrao  tmp sunrise : " . $txt_sunrise . "<br>";
//echo "This is vbnrao tmp sunset : " . $txt_sunset . "<br>";

//echo "This is tmp sunrise : " . $txt_sunrise . "<br>";
//echo "This is tmp sunset : " . $txt_sunset . "<br>";
$sunrise1 = convertDateFromTimeZone($txt_sunrise1, 'UTC', 'Asia/Calcutta','d-m-Y H:i:s');
$sunset1 = convertDateFromTimeZone($txt_sunset1, 'UTC', 'Asia/Calcutta','d-m-Y H:i:s');

//echo "This is sunrise Previous day : " . $sunrise1 . "<br>";
//echo "This is sunset Previous day : " . $sunset1 . "<br>";

//********************** checking the time of birth with Sunrise starts ***************

If ($sunrise >= $utdatenow1)
{
  $_SESSION['actual_Sunrise'] = $sunrise1;
  $_SESSION['actual_Sunset'] = $sunset1;
}
elseif ($sunrise < $utdatenow1)
{
  $_SESSION['actual_Sunrise'] = $sunrise;
  $_SESSION['actual_Sunset'] = $sunset;
}

//echo "Actual Sunrise at the time of Birth : " . $_SESSION['actual_Sunrise'] . "<br>";
//echo "Actual Sunset at the time of Birth : " . $_SESSION['actual_Sunset'] . "<br>";


//********************** checking the time of birth with Sunrise ends ***************


//echo "This is timezone :" . $intz . "<br>";
      //exec ("swetest -edir$sweph -b$utdatenow -ut$utnow -p0123456789DAttt -eswe -house$my_longitude,$my_latitude,$h_sys -flsj -g, -head", $out);

       //exec ("swetest -edir$sweph -b$utdatenow -ut$utnow -p0123456mt -eswe -house$my_longitude,$my_latitude,$h_sys -flsj -g, -head", $out);
       
       exec ("swetest -edir$sweph -b$utdatenow -ut$utnow -p0123456mt  -geopos$my_longitude,$my_latitude,$h_sys -fPlsj  -house -g, -head", $out);
//echo var_dump($out);
       exec ("swetest  -$txt_ayana -b$utdatenow -ut$utnow  -house -g -head", $ayanaout);
     echo var_dump($ayanaout);   


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
        //echo "This is ayanaout Line1 : " . $line1 . "<br>";
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

// Calculation for tabular ephemeris (all planets Sun - Pluto, Chiron, mean node, true node)\n\
// in one horizontal row, tab-separated, for 366 days. For each planet\n\
//  list longitude, latitude and geocentric distance.\n";

//exec ("swetest -edir$sweph -b$utdatenow  -p0123456mt  -geopos$my_longitude,$my_latitude,$h_sys -fTlbR  -house -g, -hor -n366 -roundsec -head", $366dout);

exec ("swetest  -edir$sweph -b$start_date_ut -ut$utnow -p0123456mt  -geopos$my_longitude,$my_latitude,$h_sys -fTlbR  -g, -$txt_days -head", $outall);

//exec ("swetest  -$txt_ayana -b$start_date_ut -ut$utnow, -$txt_days -head,  -house -g ", $ayana_transit);
exec ("swetest  -$txt_ayana -b$start_date_ut -ut$utnow -geopos$my_longitude,$my_latitude, -$txt_days -head,  -house -g ", $ayana_transit);

echo var_dump($outall) . "<br>";
echo var_dump($ayana_transit) . "<br>";

// Calculation of Transit Diary

foreach ($outall as $key4 => $line4)
      {

        $transitrow = explode(',',$line4);
        $trans_planet1[$key4] = $transitrow[0];       
        $trans_longitude1[$key4] = $transitrow[1];
        $trans_speed1[$key4] = $transitrow[2];
        
        $transit_day = substr($trans_planet1[$key4], 0, -11);
        $transit_day = date_create($transit_day);
        $transit_day = date_format($transit_day, 'd/m/Y');
        $txt_trans_day[$key4] = $transit_day;
        echo $key4 . "****" . $txt_trans_day[$key4] . "<br>";
        echo $key4 . "****" . $trans_longitude1[$key4] . "<br>";

      };


       
foreach ($ayana_transit as $key5 => $line5)
      {
        echo "this is line 5 : ". $line5 . "<br>";
        $trans_ayana_line[$key5] = $line5; 
        $trans_ayana[$key5] = substr($trans_ayana_line[$key5], -14);
        $transit_Ayana[$key5] = DMStoDD($trans_ayana[$key5]);
        
        //$transit_ayanarow = explode('Ayanamsa ', $line5);
        //$firstPart = $transit_ayanarow[0];
        //$secondPart = $transit_ayanarow[1];

        //echo "this is exploded first Part : " . $firstPart . "<br>";
        //echo "this is exploded Second Part : " . $secondPart . "<br>";

        //$trans_Ayana[$key5] = $transit_ayanarow[0];
        //$tmp_trans_Ayana = $trans_Ayana[$key5];
        //$transit_Ayana = str_replace("Ayanamsa ", "", $tmp_trans_Ayana);

        
        //echo "this is transit ayanana row . : " . $transit_Ayana . "<br>";
        //$trans_ayana[$key5] = $transit_ayanarow[0];
        
        //$transit_Ayana =  $trans_ayana[$key5];
        //$trans_Ayana = str_replace("Ayanamsa", "", $transit_Ayana);
        //echo $trans_Ayana[$key5] . "<br>";

     };
/*
echo "^^^^^^^^^^^^^^^^^^^^^^^^" . "<br>";
 echo $key4 . "**vbn**" . $txt_trans_day[0] . "<br>";
        echo $key4 . "**vbn**" . $trans_longitude1[0] . "<br>";
        echo $key4 . "**vbn**" . $trans_longitude1[1] . "<br>";
        echo $key4 . "**vbn**" . $trans_longitude1[2] . "<br>";
        echo $key4 . "**vbn**" . $trans_longitude1[3] . "<br>";
        echo $key4 . "**vbn**" . $trans_longitude1[4] . "<br>";
        echo $key4 . "**vbn**" . $trans_longitude1[5] . "<br>";
        echo $key4 . "**vbn**" . $trans_longitude1[6] . "<br>";
        echo $key4 . "**vbn**" . $trans_longitude1[7] . "<br>";
        echo $key4 . "**vbn**" . $trans_longitude1[8] . "<br>";

echo "^^^^^^^^^^^^^^^^^^^^^^^^" . "<br>";

        echo $key4 . "**vbn**" . $txt_trans_day[9] . "<br>";
        echo $key4 . "**vbn**" . $trans_longitude1[9] . "<br>";
        echo $key4 . "**vbn**" . $trans_longitude1[10] . "<br>";
        echo $key4 . "**vbn**" . $trans_longitude1[11] . "<br>";
        echo $key4 . "**vbn**" . $trans_longitude1[12] . "<br>";
        echo $key4 . "**vbn**" . $trans_longitude1[13] . "<br>";
        echo $key4 . "**vbn**" . $trans_longitude1[14] . "<br>";
echo "^^^^^^^^^^^^^^^^^^^^^^^^" . "<br>";

echo  "**Ayanamsa **" . $transit_Ayana[0] . "<br>";
echo  "**Ayanamsa **" . $transit_Ayana[1] . "<br>";
echo  "**Ayanamsa **" . $transit_Ayana[2] . "<br>";

*/
     /*
        echo $transit_Ayana[0] . "<br>";
        echo "this is Trans Ayanamsa : " . $transit_Ayana[0] . "<br>";
        
        echo $transit_Ayana[1] . "<br>";
        echo "this is Trans Ayanamsa1 : " . $transit_Ayana[1] . "<br>";

        echo $transit_Ayana[2] . "<br>";
        echo "this is Trans Ayanamsa : " . $transit_Ayana[2] . "<br>";
*/

// End of Transit Diary Calculation


//swetest -b1.1.2016  -g -fTlbR -p0123456789Dmte -hor -n366 -roundsec


// Calculation for tabular ephemeris for 366 days ends
      



/*
$_SESSION['trans_Rasi_Asc'] = RasiNum($_SESSION['trans_Asc']);
$_SESSION['trans_Rasi_Sun'] = RasiNum($_SESSION['trans_Long_Sun']);
$_SESSION['trans_Rasi_Moon'] = RasiNum($_SESSION['trans_Long_Moon']);
$_SESSION['trans_Rasi_Mar'] = RasiNum($_SESSION['trans_Long_Mar']);
$_SESSION['trans_Rasi_Mer'] = RasiNum($_SESSION['trans_Long_Mer']);
$_SESSION['trans_Rasi_Jup'] = RasiNum($_SESSION['trans_Long_Jup']);
$_SESSION['trans_Rasi_Ven'] = RasiNum($_SESSION['trans_Long_Ven']);
$_SESSION['trans_Rasi_Sat'] = RasiNum($_SESSION['trans_Long_Sat']);
$_SESSION['trans_Rasi_Rah'] = RasiNum($_SESSION['trans_Long_Rah']);
$_SESSION['trans_Rasi_Ket'] = RasiNum($_SESSION['trans_Long_Ket']);


*/

}


//End of PHP Code 

?>




<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>vbnrao Astro Software Monitoring System : Admin</title>

		<meta name="description" content="Common form elements and layouts" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/vbncustom/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/vbncustom/chosen.min.css" />
		<link rel="stylesheet" href="assets/vbncustom/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="assets/vbncustom/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="assets/vbncustom/daterangepicker.min.css" />
		<link rel="stylesheet" href="assets/vbncustom/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="assets/vbncustom/bootstrap-colorpicker.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/vbncustom/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/vbncustom/ace-rtl.min.css" />

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
                <a href="natal.php">
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
                <a href="natal_transit_diary.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Transit Diary
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


						<div class="page-header">
							<h1>
								Manage Natal Data
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Basic Information
                  <i class="ace-icon fa fa-angle-double-right"></i>
                  <?php echo '<strong>' . $_SESSION['name'] . '</strong>'; ?>
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

									
									<div class="row">
										<div class="col-sm-2"></div>
										<div class="col-sm-8">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Date Picker</h4>

													<span class="widget-toolbar">
														<a href="#" data-action="settings">
															<i class="ace-icon fa fa-cog"></i>
														</a>

														<a href="#" data-action="reload">
															<i class="ace-icon fa fa-refresh"></i>
														</a>

														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>

														<a href="#" data-action="close">
															<i class="ace-icon fa fa-times"></i>
														</a>
													</span>
												</div>

												<div class="widget-body">
													<div class="widget-main">
													
                          <form action="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $_GET['id']; ?>" method="post">	
														
														<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date Range Picker&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Number of days <span class="text-danger">*</span></label>
                            <div class="row">
															<div class="col-xs-6">
																<div class="input-group">
																	<span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>

																	<input class="form-control" type="text" name="date-range-picker" id="id-date-range-picker-1" />
																</div>
															</div>
														  <div class="col-xs-3">
															<div class="input-group">
														
														<input type="text" class="form-control" name="vbnnumberdays" id="vbnnumberdays" readonly="true">
														</div>
                          </div>
														<input type="hidden" class="form-control" name="startDate" id="startDate" readonly="true">

                            <div class="col-xs-1">
														<div class="form-group center">
                    <input type="submit" id="submit" name="Submit" value="Get Transit Diary" class="width-5 pull-center btn btn-sm btn-primary"> 
                  </div>
                </div>

                  </div>
													</div>
													</div>



												</div>
											</div>
										</div>

											</div>
										</div>
<div class="row">
<div class="col-xs-12">

                <div class="hr hr-18 dotted hr-double"></div>

                <div class="row">
                  <div class="col-xs-12">
                    <h3 class="header smaller lighter blue">jQuery dataTables</h3>

                    <div class="clearfix">
                      <div class="pull-right tableTools-container"></div>
                    </div>
                    <div class="table-header">
                      Results for "Latest Registered Domains"
                    </div>

                    <!-- div.table-responsive -->

<!--  Ashtakavarga starts -->

<?php


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

<!-- Ashtakavarga Calculation Starts ---->
<!--
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
-->

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

<!-- Prastara Ashtakavarga for Sun Matrices -->
<!--
<table>
<tr>
<td colspan="13">Prastara Ashtakavarga for Sun Matrices </td>
</tr>
<tr>
<td>Planets/Rasi No.</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td>
</tr>

<tr>

<td>Sun</td>
-->
<?php
$rows = 1;
$cols = 12;

$sun_ii = $tmp_Rasi_Sun;
$sun_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_tsun[$i] = $Sun_sun_arr[($sun_ii-1)][$sun_xy]; 
//echo '<td>' . $Sun_sun_arr[($sun_ii-1)][$sun_xy] . '</td>';
$Sun_sun_arrtot[$i] = $Sun_sun_arr[($sun_ii-1)][$sun_xy];
$sun_xy = $sun_xy + 1;


}
//echo '</tr>';
?>
<!--
<tr>
<td>Moon</td>
-->
<?php
$moon_ii = $tmp_Rasi_Moon;
$moon_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_tmoon[$i] = $Moon_sun_arr[($moon_ii-1)][$moon_xy];   
//echo '<td>' . $Moon_sun_arr[($moon_ii-1)][$moon_xy] . '</td>';
$Moon_sun_arrtot[$i] = $Moon_sun_arr[($moon_ii-1)][$moon_xy];
$moon_xy = $moon_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Mars</td>
-->
<?php
$mar_ii = $tmp_Rasi_Mar;
$mar_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_tmar[$i] = $Mar_sun_arr[($mar_ii-1)][$mar_xy]; 
//echo '<td>' . $Mar_sun_arr[($mar_ii-1)][$mar_xy] . '</td>';
$Mar_sun_arrtot[$i] = $Mar_sun_arr[($mar_ii-1)][$mar_xy];
$mar_xy = $mar_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Mercury</td>
-->
<?php
$mer_ii = $tmp_Rasi_Mer;
$mer_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_tmer[$i] = $Mer_sun_arr[($mer_ii-1)][$mer_xy]; 
//echo '<td>' . $Mer_sun_arr[($mer_ii-1)][$mer_xy] . '</td>';
$Mer_sun_arrtot[$i] = $Mer_sun_arr[($mer_ii-1)][$mer_xy];
$mer_xy = $mer_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Jupiter</td>
-->
<?php
$jup_ii = $tmp_Rasi_Jup;
$jup_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_tjup[$i] = $Jup_sun_arr[($jup_ii-1)][$jup_xy]; 
//echo '<td>' . $Jup_sun_arr[($jup_ii-1)][$jup_xy] . '</td>';
$Jup_sun_arrtot[$i] = $Jup_sun_arr[($jup_ii-1)][$jup_xy];
$jup_xy = $jup_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Venus</td>
-->
<?php
$ven_ii = $tmp_Rasi_Ven;
$ven_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_tven[$i] = $Ven_sun_arr[($ven_ii-1)][$ven_xy];   
//echo '<td>' . $Ven_sun_arr[($ven_ii-1)][$ven_xy] . '</td>';
$Ven_sun_arrtot[$i] = $Ven_sun_arr[($ven_ii-1)][$ven_xy];
$ven_xy = $ven_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Saturn</td>
-->
<?php
$sat_ii = $tmp_Rasi_Sat;
$sat_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_tsat[$i] = $Sat_sun_arr[($sat_ii-1)][$sat_xy];   
//echo '<td>' . $Sat_sun_arr[($sat_ii-1)][$sat_xy] . '</td>';
$Sat_sun_arrtot[$i] = $Sat_sun_arr[($sat_ii-1)][$sat_xy];
$sat_xy = $sat_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Lagna</td>
-->
<?php
$lag_ii = $tmp_Rasi_Asc;
$lag_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_tlag[$i] = $Lag_sun_arr[($lag_ii-1)][$lag_xy]; 
//echo '<td>' . $Lag_sun_arr[($lag_ii-1)][$lag_xy] . '</td>';
$Lag_sun_arrtot[$i] = $Lag_sun_arr[($lag_ii-1)][$lag_xy];
$lag_xy = $lag_xy + 1;

}
//echo '</tr>';
?>

<!--
<tr>
<td><strong>Total :</strong></td>
-->
<?php


For ($i=1; $i<13; $i++)
{
$tmp_totsun[$i] = $Sun_sun_arrtot[$i] + $Moon_sun_arrtot[$i] + $Mar_sun_arrtot[$i] + $Mer_sun_arrtot[$i] + $Jup_sun_arrtot[$i] + $Ven_sun_arrtot[$i] + $Sat_sun_arrtot[$i] + $Lag_sun_arrtot[$i];

  $total_sun[$i] = $Sun_sun_arrtot[$i] + $Moon_sun_arrtot[$i] + $Mar_sun_arrtot[$i] + $Mer_sun_arrtot[$i] + $Jup_sun_arrtot[$i] + $Ven_sun_arrtot[$i] + $Sat_sun_arrtot[$i] + $Lag_sun_arrtot[$i];
  
//echo '<td>' . '<strong>' . $total_sun[$i] . '</strong>' . '</td>';
}
//echo '</tr>';

?>


<!--
</table>
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

<td>Sun</td>
-->
<?php
$rows = 1;
$cols = 12;

$sun_ii = $tmp_Rasi_Sun;
$sun_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t1sun[$i] = $Sun_moon_arr[($sun_ii-1)][$sun_xy]; 
//echo '<td>' . $Sun_moon_arr[($sun_ii-1)][$sun_xy] . '</td>';
$Sun_moon_arrtot[$i] = $Sun_moon_arr[($sun_ii-1)][$sun_xy];
$sun_xy = $sun_xy + 1;


}
//echo '</tr>';
?>
<!--
<tr>
<td>Moon</td>
-->
<?php
$moon_ii = $tmp_Rasi_Moon;
$moon_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t1moon[$i] = $Moon_moon_arr[($moon_ii-1)][$moon_xy]; 
//echo '<td>' . $Moon_moon_arr[($moon_ii-1)][$moon_xy] . '</td>';
$Moon_moon_arrtot[$i] = $Moon_moon_arr[($moon_ii-1)][$moon_xy];
$moon_xy = $moon_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Mars</td>
-->
<?php
$mar_ii = $tmp_Rasi_Mar;
$mar_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t1mar[$i] = $Mar_moon_arr[($mar_ii-1)][$mar_xy]; 
//echo '<td>' . $Mar_moon_arr[($mar_ii-1)][$mar_xy] . '</td>';
$Mar_moon_arrtot[$i] = $Mar_moon_arr[($mar_ii-1)][$mar_xy];
$mar_xy = $mar_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Mercury</td>
-->
<?php
$mer_ii = $tmp_Rasi_Mer;
$mer_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t1mer[$i] = $Mer_moon_arr[($mer_ii-1)][$mer_xy]; 
//echo '<td>' . $Mer_moon_arr[($mer_ii-1)][$mer_xy] . '</td>';
$Mer_moon_arrtot[$i] = $Mer_moon_arr[($mer_ii-1)][$mer_xy];
$mer_xy = $mer_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Jupiter</td>
-->
<?php
$jup_ii = $tmp_Rasi_Jup;
$jup_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t1jup[$i] = $Jup_moon_arr[($jup_ii-1)][$jup_xy]; 
//echo '<td>' . $Jup_moon_arr[($jup_ii-1)][$jup_xy] . '</td>';
$Jup_moon_arrtot[$i] = $Jup_moon_arr[($jup_ii-1)][$jup_xy];
$jup_xy = $jup_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Venus</td>
-->
<?php
$ven_ii = $tmp_Rasi_Ven;
$ven_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t1ven[$i] = $Ven_moon_arr[($ven_ii-1)][$ven_xy]; 
//echo '<td>' . $Ven_moon_arr[($ven_ii-1)][$ven_xy] . '</td>';
$Ven_moon_arrtot[$i] = $Ven_moon_arr[($ven_ii-1)][$ven_xy];
$ven_xy = $ven_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Saturn</td>
-->
<?php
$sat_ii = $tmp_Rasi_Sat;
$sat_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t1sat[$i] = $Sat_moon_arr[($sat_ii-1)][$sat_xy]; 
//echo '<td>' . $Sat_moon_arr[($sat_ii-1)][$sat_xy] . '</td>';
$Sat_moon_arrtot[$i] = $Sat_moon_arr[($sat_ii-1)][$sat_xy];
$sat_xy = $sat_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Lagna</td>
-->
<?php
$lag_ii = $tmp_Rasi_Asc;
$lag_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t1lag[$i] = $Lag_moon_arr[($lag_ii-1)][$lag_xy]; 
//echo '<td>' . $Lag_moon_arr[($lag_ii-1)][$lag_xy] . '</td>';
$Lag_moon_arrtot[$i] = $Lag_moon_arr[($lag_ii-1)][$lag_xy];
$lag_xy = $lag_xy + 1;

}
//echo '</tr>';
?>

<!--
<tr>
<td><strong>Total :</strong></td>

-->

<?php


For ($i=1; $i<13; $i++)
{
  $tmp_tot1moon[$i] = $Sun_moon_arrtot[$i] + $Moon_moon_arrtot[$i] + $Mar_moon_arrtot[$i] + $Mer_moon_arrtot[$i] + $Jup_moon_arrtot[$i] + $Ven_moon_arrtot[$i] + $Sat_moon_arrtot[$i] + $Lag_moon_arrtot[$i];

  $total_moon[$i] = $Sun_moon_arrtot[$i] + $Moon_moon_arrtot[$i] + $Mar_moon_arrtot[$i] + $Mer_moon_arrtot[$i] + $Jup_moon_arrtot[$i] + $Ven_moon_arrtot[$i] + $Sat_moon_arrtot[$i] + $Lag_moon_arrtot[$i];
  
// echo '<td>' . '<strong>' . $total_moon[$i] . '</strong>' . '</td>';
}
//echo '</tr>';

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
array(0,1,0,1,1,0,0,0,1,1,0,0)  );

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

<td>Sun</td>
-->
<?php
$rows = 1;
$cols = 12;

$sun_ii = $tmp_Rasi_Sun;
$sun_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t2sun[$i] = $Sun_mar_arr[($sun_ii-1)][$sun_xy];  
//echo '<td>' . $Sun_mar_arr[($sun_ii-1)][$sun_xy] . '</td>';
$Sun_mar_arrtot[$i] = $Sun_mar_arr[($sun_ii-1)][$sun_xy];
$sun_xy = $sun_xy + 1;


}
//echo '</tr>';
?>
<!--
<tr>
<td>Moon</td>
-->
<?php
$moon_ii = $tmp_Rasi_Moon;
$moon_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t2moon[$i] = $Moon_mar_arr[($moon_ii-1)][$moon_xy];  
//echo '<td>' . $Moon_mar_arr[($moon_ii-1)][$moon_xy] . '</td>';
$Moon_mar_arrtot[$i] = $Moon_mar_arr[($moon_ii-1)][$moon_xy];
$moon_xy = $moon_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Mars</td>
-->
<?php
$mar_ii = $tmp_Rasi_Mar;
$mar_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t2mar[$i] = $Mar_mar_arr[($mar_ii-1)][$mar_xy];  
//echo '<td>' . $Mar_mar_arr[($mar_ii-1)][$mar_xy] . '</td>';
$Mar_mar_arrtot[$i] = $Mar_mar_arr[($mar_ii-1)][$mar_xy];
$mar_xy = $mar_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Mercury</td>
-->
<?php
$mer_ii = $tmp_Rasi_Mer;
$mer_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t2mer[$i] = $Mer_mar_arr[($mer_ii-1)][$mer_xy];  
//echo '<td>' . $Mer_mar_arr[($mer_ii-1)][$mer_xy] . '</td>';
$Mer_mar_arrtot[$i] = $Mer_mar_arr[($mer_ii-1)][$mer_xy];
$mer_xy = $mer_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Jupiter</td>
-->
<?php
$jup_ii = $tmp_Rasi_Jup;
$jup_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t2jup[$i] = $Jup_mar_arr[($jup_ii-1)][$jup_xy];  
//echo '<td>' . $Jup_mar_arr[($jup_ii-1)][$jup_xy] . '</td>';
$Jup_mar_arrtot[$i] = $Jup_mar_arr[($jup_ii-1)][$jup_xy];
$jup_xy = $jup_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Venus</td>
-->
<?php
$ven_ii = $tmp_Rasi_Ven;
$ven_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t2ven[$i] = $Ven_mar_arr[($ven_ii-1)][$ven_xy];  
//echo '<td>' . $Ven_mar_arr[($ven_ii-1)][$ven_xy] . '</td>';
$Ven_mar_arrtot[$i] = $Ven_mar_arr[($ven_ii-1)][$ven_xy];
$ven_xy = $ven_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Saturn</td>
-->
<?php
$sat_ii = $tmp_Rasi_Sat;
$sat_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t2sat[$i] = $Sat_mar_arr[($sat_ii-1)][$sat_xy];  
//echo '<td>' . $Sat_mar_arr[($sat_ii-1)][$sat_xy] . '</td>';
$Sat_mar_arrtot[$i] = $Sat_mar_arr[($sat_ii-1)][$sat_xy];
$sat_xy = $sat_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Lagna</td>
-->
<?php
$lag_ii = $tmp_Rasi_Asc;
$lag_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t2lag[$i] = $Lag_mar_arr[($lag_ii-1)][$lag_xy];  
//echo '<td>' . $Lag_mar_arr[($lag_ii-1)][$lag_xy] . '</td>';
$Lag_mar_arrtot[$i] = $Lag_mar_arr[($lag_ii-1)][$lag_xy];
$lag_xy = $lag_xy + 1;

}
//echo '</tr>';
?>

<!--
<tr>
<td><strong>Total :</strong></td>
-->
<?php


For ($i=1; $i<13; $i++)
{
  $tmp_tot2mar[$i] = $Sun_mar_arrtot[$i] + $Moon_mar_arrtot[$i] + $Mar_mar_arrtot[$i] + $Mer_mar_arrtot[$i] + $Jup_mar_arrtot[$i] + $Ven_mar_arrtot[$i] + $Sat_mar_arrtot[$i] + $Lag_mar_arrtot[$i];

  $total_mar[$i] = $Sun_mar_arrtot[$i] + $Moon_mar_arrtot[$i] + $Mar_mar_arrtot[$i] + $Mer_mar_arrtot[$i] + $Jup_mar_arrtot[$i] + $Ven_mar_arrtot[$i] + $Sat_mar_arrtot[$i] + $Lag_mar_arrtot[$i];
  
//echo '<td>' . '<strong>' . $total_mar[$i] . '</strong>' . '</td>';
}
//echo '</tr>';

?>
<!--
</table>
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

<td>Sun</td>
-->
<?php
$rows = 1;
$cols = 12;

$sun_ii = $tmp_Rasi_Sun;
$sun_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t3sun[$i] = $Sun_mer_arr[($sun_ii-1)][$sun_xy];  
//echo '<td>' . $Sun_mer_arr[($sun_ii-1)][$sun_xy] . '</td>';
$Sun_mer_arrtot[$i] = $Sun_mer_arr[($sun_ii-1)][$sun_xy];
$sun_xy = $sun_xy + 1;


}
//echo '</tr>';
?>
<!--
<tr>
<td>Moon</td>
-->
<?php
$moon_ii = $tmp_Rasi_Moon;
$moon_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t3moon[$i] = $Moon_mer_arr[($moon_ii-1)][$moon_xy];  
//echo '<td>' . $Moon_mer_arr[($moon_ii-1)][$moon_xy] . '</td>';
$Moon_mer_arrtot[$i] = $Moon_mer_arr[($moon_ii-1)][$moon_xy];
$moon_xy = $moon_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Mars</td>
-->
<?php
$mar_ii = $tmp_Rasi_Mar;
$mar_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t3mar[$i] = $Mar_mer_arr[($mar_ii-1)][$mar_xy];  
//echo '<td>' . $Mar_mer_arr[($mar_ii-1)][$mar_xy] . '</td>';
$Mar_mer_arrtot[$i] = $Mar_mer_arr[($mar_ii-1)][$mar_xy];
$mar_xy = $mar_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Mercury</td>
-->
<?php
$mer_ii = $tmp_Rasi_Mer;
$mer_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t3mer[$i] = $Mer_mer_arr[($mer_ii-1)][$mer_xy];  
//echo '<td>' . $Mer_mer_arr[($mer_ii-1)][$mer_xy] . '</td>';
$Mer_mer_arrtot[$i] = $Mer_mer_arr[($mer_ii-1)][$mer_xy];
$mer_xy = $mer_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Jupiter</td>
-->
<?php
$jup_ii = $tmp_Rasi_Jup;
$jup_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t3jup[$i] = $Jup_mer_arr[($jup_ii-1)][$jup_xy];  
//echo '<td>' . $Jup_mer_arr[($jup_ii-1)][$jup_xy] . '</td>';
$Jup_mer_arrtot[$i] = $Jup_mer_arr[($jup_ii-1)][$jup_xy];
$jup_xy = $jup_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Venus</td>
-->
<?php
$ven_ii = $tmp_Rasi_Ven;
$ven_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t3ven[$i] = $Ven_mer_arr[($ven_ii-1)][$ven_xy];  
//echo '<td>' . $Ven_mer_arr[($ven_ii-1)][$ven_xy] . '</td>';
$Ven_mer_arrtot[$i] = $Ven_mer_arr[($ven_ii-1)][$ven_xy];
$ven_xy = $ven_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Saturn</td>
-->
<?php
$sat_ii = $tmp_Rasi_Sat;
$sat_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t3sat[$i] = $Sat_mer_arr[($sat_ii-1)][$sat_xy];  
//echo '<td>' . $Sat_mer_arr[($sat_ii-1)][$sat_xy] . '</td>';
$Sat_mer_arrtot[$i] = $Sat_mer_arr[($sat_ii-1)][$sat_xy];
$sat_xy = $sat_xy + 1;

}
//echo '</tr>';
?>
<!--
<tr>
<td>Lagna</td>
-->
<?php
$lag_ii = $tmp_Rasi_Asc;
$lag_xy = 0;

For ($i=1; $i<13; $i++) 
{
$tmp_t3lag[$i] = $Lag_mer_arr[($lag_ii-1)][$lag_xy];  
//echo '<td>' . $Lag_mer_arr[($lag_ii-1)][$lag_xy] . '</td>';
$Lag_mer_arrtot[$i] = $Lag_mer_arr[($lag_ii-1)][$lag_xy];
$lag_xy = $lag_xy + 1;

}
//echo '</tr>';
?>

<!--
<tr>
<td><strong>Total :</strong></td> -->

<?php


For ($i=1; $i<13; $i++)
{
  $tmp_tot3mer[$i] = $Sun_mer_arrtot[$i] + $Moon_mer_arrtot[$i] + $Mar_mer_arrtot[$i] + $Mer_mer_arrtot[$i] + $Jup_mer_arrtot[$i] + $Ven_mer_arrtot[$i] + $Sat_mer_arrtot[$i] + $Lag_mer_arrtot[$i];

  $total_mer[$i] = $Sun_mer_arrtot[$i] + $Moon_mer_arrtot[$i] + $Mar_mer_arrtot[$i] + $Mer_mer_arrtot[$i] + $Jup_mer_arrtot[$i] + $Ven_mer_arrtot[$i] + $Sat_mer_arrtot[$i] + $Lag_mer_arrtot[$i];
  
//echo '<td>' . '<strong>' . $total_mer[$i] . '</strong>' . '</td>';
}
//echo '</tr>';

?>
<!--
</table>
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
-->
<!--
<br>

<table>
<tr>
<td>Planet</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td>
</tr>
<tr>
<td>Sat</td>
-->

<?php

$rows = 1;
$cols = 12;

$kak_sun_ii = $tmp_Rasi_Sun;
$kak_moon_ii = $tmp_Rasi_Moon;
$kak_mar_ii = $tmp_Rasi_Mar;
$kak_mer_ii = $tmp_Rasi_Mer;
$kak_jup_ii = $tmp_Rasi_Jup;
$kak_ven_ii = $tmp_Rasi_Ven;
$kak_sat_ii = $tmp_Rasi_Sat;
$kak_asc_ii = $tmp_Rasi_Asc;


//$Sat_moon_arr[($sat_ii-1)][$sat_xy]
// Saturn Kakshya Begins
$kak_sat_xy = 0;


For ($i=1; $i<13; $i++) 
{

//echo '<td>' . ($Sat_sun_arr[($kak_sat_ii-1)][$kak_sat_xy] + $Sat_moon_arr[($kak_sat_ii-1)][$kak_sat_xy] + $Sat_mar_arr[($kak_sat_ii-1)][$kak_sat_xy] + $Sat_mer_arr[($kak_sat_ii-1)][$kak_sat_xy] + $Sat_jup_arr[($kak_sat_ii-1)][$kak_sat_xy] + $Sat_ven_arr[($kak_sat_ii-1)][$kak_sat_xy] + $Sat_sat_arr[($kak_sat_ii-1)][$kak_sat_xy]) . '</td>';

$Sat_kak[$i] = ($Sat_sun_arr[($kak_sat_ii-1)][$kak_sat_xy] + $Sat_moon_arr[($kak_sat_ii-1)][$kak_sat_xy] + $Sat_mar_arr[($kak_sat_ii-1)][$kak_sat_xy] + $Sat_mer_arr[($kak_sat_ii-1)][$kak_sat_xy] + $Sat_jup_arr[($kak_sat_ii-1)][$kak_sat_xy] + $Sat_ven_arr[($kak_sat_ii-1)][$kak_sat_xy] + $Sat_sat_arr[($kak_sat_ii-1)][$kak_sat_xy]);

//$Sun_sat_arrtot[$i] = $Sun_sat_arr[($sun_ii-1)][$sun_xy];
$kak_sat_xy = $kak_sat_xy + 1;
}
// Saturn Kakshya Ends
?>
<!--
</tr>
<tr>
<td>Jup</td>
-->
<?php
// Jupiter Kakshya Begins
$kak_jup_xy = 0;

For ($i=1; $i<13; $i++) 
{

//echo '<td>' . ($Jup_sun_arr[($kak_jup_ii-1)][$kak_jup_xy] + $Jup_moon_arr[($kak_jup_ii-1)][$kak_jup_xy] + $Jup_mar_arr[($kak_jup_ii-1)][$kak_jup_xy] + $Jup_mer_arr[($kak_jup_ii-1)][$kak_jup_xy] + $Jup_jup_arr[($kak_jup_ii-1)][$kak_jup_xy] + $Jup_ven_arr[($kak_jup_ii-1)][$kak_jup_xy] + $Jup_sat_arr[($kak_jup_ii-1)][$kak_jup_xy]) . '</td>';

$Jup_kak[$i] = ($Jup_sun_arr[($kak_jup_ii-1)][$kak_jup_xy] + $Jup_moon_arr[($kak_jup_ii-1)][$kak_jup_xy] + $Jup_mar_arr[($kak_jup_ii-1)][$kak_jup_xy] + $Jup_mer_arr[($kak_jup_ii-1)][$kak_jup_xy] + $Jup_jup_arr[($kak_jup_ii-1)][$kak_jup_xy] + $Jup_ven_arr[($kak_jup_ii-1)][$kak_jup_xy] + $Jup_sat_arr[($kak_jup_ii-1)][$kak_jup_xy]);

$kak_jup_xy = $kak_jup_xy + 1;
}
// Jupiter Kakshya Ends
?>
<!--
</tr>
<tr>
<td>Mar</td>
-->
<?php
// Mars Kakshya Begins
$kak_mar_xy = 0;

For ($i=1; $i<13; $i++) 
{

//echo '<td>' . ($Mar_sun_arr[($kak_mar_ii-1)][$kak_mar_xy] + $Mar_moon_arr[($kak_mar_ii-1)][$kak_mar_xy] + $Mar_mar_arr[($kak_mar_ii-1)][$kak_mar_xy] + $Mar_mer_arr[($kak_mar_ii-1)][$kak_mar_xy] + $Mar_jup_arr[($kak_mar_ii-1)][$kak_mar_xy] + $Mar_ven_arr[($kak_mar_ii-1)][$kak_mar_xy] + $Mar_sat_arr[($kak_mar_ii-1)][$kak_mar_xy]) . '</td>';

$Mar_kak[$i] = ($Mar_sun_arr[($kak_mar_ii-1)][$kak_mar_xy] + $Mar_moon_arr[($kak_mar_ii-1)][$kak_mar_xy] + $Mar_mar_arr[($kak_mar_ii-1)][$kak_mar_xy] + $Mar_mer_arr[($kak_mar_ii-1)][$kak_mar_xy] + $Mar_jup_arr[($kak_mar_ii-1)][$kak_mar_xy] + $Mar_ven_arr[($kak_mar_ii-1)][$kak_mar_xy] + $Mar_sat_arr[($kak_mar_ii-1)][$kak_mar_xy]);

$kak_mar_xy = $kak_mar_xy + 1;
}
// Mars Kakshya Ends
?>
<!--
</tr>
<tr>
<td>Sun</td>
-->
<?php
// Sun Kakshya Begins
$kak_sun_xy = 0;

For ($i=1; $i<13; $i++) 
{

//echo '<td>' . ($Sun_sun_arr[($kak_sun_ii-1)][$kak_sun_xy] + $Sun_moon_arr[($kak_sun_ii-1)][$kak_sun_xy] + $Sun_mar_arr[($kak_sun_ii-1)][$kak_sun_xy] + $Sun_mer_arr[($kak_sun_ii-1)][$kak_sun_xy] + $Sun_jup_arr[($kak_sun_ii-1)][$kak_sun_xy] + $Sun_ven_arr[($kak_sun_ii-1)][$kak_sun_xy] + $Sun_sat_arr[($kak_sun_ii-1)][$kak_sun_xy]) . '</td>';

$Sun_kak[$i] = ($Sun_sun_arr[($kak_sun_ii-1)][$kak_sun_xy] + $Sun_moon_arr[($kak_sun_ii-1)][$kak_sun_xy] + $Sun_mar_arr[($kak_sun_ii-1)][$kak_sun_xy] + $Sun_mer_arr[($kak_sun_ii-1)][$kak_sun_xy] + $Sun_jup_arr[($kak_sun_ii-1)][$kak_sun_xy] + $Sun_ven_arr[($kak_sun_ii-1)][$kak_sun_xy] + $Sun_sat_arr[($kak_sun_ii-1)][$kak_sun_xy]);

$kak_sun_xy = $kak_sun_xy + 1;
}
// Sun Kakshya Ends
?>
<!--
</tr>
<tr>
<td>Ven</td>
-->
<?php
// Venus Kakshya Begins
$kak_ven_xy = 0;

For ($i=1; $i<13; $i++) 
{

//echo '<td>' . ($Ven_sun_arr[($kak_ven_ii-1)][$kak_ven_xy] + $Ven_moon_arr[($kak_ven_ii-1)][$kak_ven_xy] + $Ven_mar_arr[($kak_ven_ii-1)][$kak_ven_xy] + $Ven_mer_arr[($kak_ven_ii-1)][$kak_ven_xy] + $Ven_jup_arr[($kak_ven_ii-1)][$kak_ven_xy] + $Ven_ven_arr[($kak_ven_ii-1)][$kak_ven_xy] + $Ven_sat_arr[($kak_ven_ii-1)][$kak_ven_xy]) . '</td>';

$Ven_kak[$i] = ($Ven_sun_arr[($kak_ven_ii-1)][$kak_ven_xy] + $Ven_moon_arr[($kak_ven_ii-1)][$kak_ven_xy] + $Ven_mar_arr[($kak_ven_ii-1)][$kak_ven_xy] + $Ven_mer_arr[($kak_ven_ii-1)][$kak_ven_xy] + $Ven_jup_arr[($kak_ven_ii-1)][$kak_ven_xy] + $Ven_ven_arr[($kak_ven_ii-1)][$kak_ven_xy] + $Ven_sat_arr[($kak_ven_ii-1)][$kak_ven_xy]);

$kak_ven_xy = $kak_ven_xy + 1;
}
// Venus Kakshya Ends
?>
<!--
</tr>
<tr>
<td>Mer</td>
-->
<?php
// Mercury Kakshya Begins
$kak_mer_xy = 0;

For ($i=1; $i<13; $i++) 
{

//echo '<td>' . ($Mer_sun_arr[($kak_mer_ii-1)][$kak_mer_xy] + $Mer_moon_arr[($kak_mer_ii-1)][$kak_mer_xy] + $Mer_mar_arr[($kak_mer_ii-1)][$kak_mer_xy] + $Mer_mer_arr[($kak_mer_ii-1)][$kak_mer_xy] + $Mer_jup_arr[($kak_mer_ii-1)][$kak_mer_xy] + $Mer_ven_arr[($kak_mer_ii-1)][$kak_mer_xy] + $Mer_sat_arr[($kak_mer_ii-1)][$kak_mer_xy]) . '</td>';

$Mer_kak[$i] = ($Mer_sun_arr[($kak_mer_ii-1)][$kak_mer_xy] + $Mer_moon_arr[($kak_mer_ii-1)][$kak_mer_xy] + $Mer_mar_arr[($kak_mer_ii-1)][$kak_mer_xy] + $Mer_mer_arr[($kak_mer_ii-1)][$kak_mer_xy] + $Mer_jup_arr[($kak_mer_ii-1)][$kak_mer_xy] + $Mer_ven_arr[($kak_mer_ii-1)][$kak_mer_xy] + $Mer_sat_arr[($kak_mer_ii-1)][$kak_mer_xy]);

$kak_mer_xy = $kak_mer_xy + 1;
}
// Mercury Kakshya Ends
?>
<!--
</tr>
<tr>
<td>Moon</td>
-->
<?php
// Moon Kakshya Begins
$kak_moon_xy = 0;

For ($i=1; $i<13; $i++) 
{

//echo '<td>' . ($Moon_sun_arr[($kak_moon_ii-1)][$kak_moon_xy] + $Moon_moon_arr[($kak_moon_ii-1)][$kak_moon_xy] + $Moon_mar_arr[($kak_moon_ii-1)][$kak_moon_xy] + $Moon_mer_arr[($kak_moon_ii-1)][$kak_moon_xy] + $Moon_jup_arr[($kak_moon_ii-1)][$kak_moon_xy] + $Moon_ven_arr[($kak_moon_ii-1)][$kak_moon_xy] + $Moon_sat_arr[($kak_moon_ii-1)][$kak_moon_xy]) . '</td>';

$Moon_kak[$i] = ($Moon_sun_arr[($kak_moon_ii-1)][$kak_moon_xy] + $Moon_moon_arr[($kak_moon_ii-1)][$kak_moon_xy] + $Moon_mar_arr[($kak_moon_ii-1)][$kak_moon_xy] + $Moon_mer_arr[($kak_moon_ii-1)][$kak_moon_xy] + $Moon_jup_arr[($kak_moon_ii-1)][$kak_moon_xy] + $Moon_ven_arr[($kak_moon_ii-1)][$kak_moon_xy] + $Moon_sat_arr[($kak_moon_ii-1)][$kak_moon_xy]);

$kak_moon_xy = $kak_moon_xy + 1;
}
// Moon Kakshya Ends
?>
<!--
</tr>
<tr>
<td>Asc</td>
-->
<?php
// Ascendant Kakshya Begins
$kak_asc_xy = 0;

For ($i=1; $i<13; $i++) 
{

//echo '<td>' . ($Lag_sun_arr[($kak_asc_ii-1)][$kak_asc_xy] + $Lag_moon_arr[($kak_asc_ii-1)][$kak_asc_xy] + $Lag_mar_arr[($kak_asc_ii-1)][$kak_asc_xy] + $Lag_mer_arr[($kak_asc_ii-1)][$kak_asc_xy] + $Lag_jup_arr[($kak_asc_ii-1)][$kak_asc_xy] + $Lag_ven_arr[($kak_asc_ii-1)][$kak_asc_xy] + $Lag_sat_arr[($kak_asc_ii-1)][$kak_asc_xy]) . '</td>';

$Lag_kak[$i] = ($Lag_sun_arr[($kak_asc_ii-1)][$kak_asc_xy] + $Lag_moon_arr[($kak_asc_ii-1)][$kak_asc_xy] + $Lag_mar_arr[($kak_asc_ii-1)][$kak_asc_xy] + $Lag_mer_arr[($kak_asc_ii-1)][$kak_asc_xy] + $Lag_jup_arr[($kak_asc_ii-1)][$kak_asc_xy] + $Lag_ven_arr[($kak_asc_ii-1)][$kak_asc_xy] + $Lag_sat_arr[($kak_asc_ii-1)][$kak_asc_xy]);

$kak_asc_xy = $kak_asc_xy + 1;
}
// Ascendant Kakshya Ends
?>
<!--
</tr>
<tr>
<td>**********</td>
</tr>
<tr>
<td>Sat</td>
<td><?php echo $Sat_kak[1]; ?></td>
<td><?php echo $Sat_kak[2]; ?></td>
<td><?php echo $Sat_kak[3]; ?></td>
<td><?php echo $Sat_kak[4]; ?></td>
<td><?php echo $Sat_kak[5]; ?></td>
<td><?php echo $Sat_kak[6]; ?></td>
<td><?php echo $Sat_kak[7]; ?></td>
<td><?php echo $Sat_kak[8]; ?></td>
<td><?php echo $Sat_kak[9]; ?></td>
<td><?php echo $Sat_kak[10]; ?></td>
<td><?php echo $Sat_kak[11]; ?></td>
<td><?php echo $Sat_kak[12]; ?></td>
</tr>
<tr>
-->
<?php

$Sat_kak_arr = array(
$Sat_kak[1], 
$Sat_kak[2], 
$Sat_kak[3], 
$Sat_kak[4], 
$Sat_kak[5], 
$Sat_kak[6], 
$Sat_kak[7], 
$Sat_kak[8], 
$Sat_kak[9], 
$Sat_kak[10], 
$Sat_kak[11], 
$Sat_kak[12]
); 

?>
<!--
</tr>
-->
<!--Jupiter -->
<!--
<tr>
<td>Jup</td>
<td><?php echo $Jup_kak[1]; ?></td>
<td><?php echo $Jup_kak[2]; ?></td>
<td><?php echo $Jup_kak[3]; ?></td>
<td><?php echo $Jup_kak[4]; ?></td>
<td><?php echo $Jup_kak[5]; ?></td>
<td><?php echo $Jup_kak[6]; ?></td>
<td><?php echo $Jup_kak[7]; ?></td>
<td><?php echo $Jup_kak[8]; ?></td>
<td><?php echo $Jup_kak[9]; ?></td>
<td><?php echo $Jup_kak[10]; ?></td>
<td><?php echo $Jup_kak[11]; ?></td>
<td><?php echo $Jup_kak[12]; ?></td>
</tr>
<tr>
-->
<?php

$Jup_kak_arr = array(
$Jup_kak[1], 
$Jup_kak[2], 
$Jup_kak[3], 
$Jup_kak[4], 
$Jup_kak[5], 
$Jup_kak[6], 
$Jup_kak[7], 
$Jup_kak[8], 
$Jup_kak[9], 
$Jup_kak[10], 
$Jup_kak[11], 
$Jup_kak[12]
); 

?>
<!--
</tr> 
-->
<!-- Mars -->
<!--
<tr>
<td>Mar</td>
<td><?php echo $Mar_kak[1]; ?></td>
<td><?php echo $Mar_kak[2]; ?></td>
<td><?php echo $Mar_kak[3]; ?></td>
<td><?php echo $Mar_kak[4]; ?></td>
<td><?php echo $Mar_kak[5]; ?></td>
<td><?php echo $Mar_kak[6]; ?></td>
<td><?php echo $Mar_kak[7]; ?></td>
<td><?php echo $Mar_kak[8]; ?></td>
<td><?php echo $Mar_kak[9]; ?></td>
<td><?php echo $Mar_kak[10]; ?></td>
<td><?php echo $Mar_kak[11]; ?></td>
<td><?php echo $Mar_kak[12]; ?></td>
</tr>
<tr>
-->
<?php

$Mar_kak_arr = array(
$Mar_kak[1], 
$Mar_kak[2], 
$Mar_kak[3], 
$Mar_kak[4], 
$Mar_kak[5], 
$Mar_kak[6], 
$Mar_kak[7], 
$Mar_kak[8], 
$Mar_kak[9], 
$Mar_kak[10], 
$Mar_kak[11], 
$Mar_kak[12]
); 

?>
<!--
</tr>
-->
<!-- Sun -->
<!--
<tr>
<td>Sun</td>
<td><?php echo $Sun_kak[1]; ?></td>
<td><?php echo $Sun_kak[2]; ?></td>
<td><?php echo $Sun_kak[3]; ?></td>
<td><?php echo $Sun_kak[4]; ?></td>
<td><?php echo $Sun_kak[5]; ?></td>
<td><?php echo $Sun_kak[6]; ?></td>
<td><?php echo $Sun_kak[7]; ?></td>
<td><?php echo $Sun_kak[8]; ?></td>
<td><?php echo $Sun_kak[9]; ?></td>
<td><?php echo $Sun_kak[10]; ?></td>
<td><?php echo $Sun_kak[11]; ?></td>
<td><?php echo $Sun_kak[12]; ?></td>
</tr>
<tr>
-->
<?php

$Sun_kak_arr = array(
$Sun_kak[1], 
$Sun_kak[2], 
$Sun_kak[3], 
$Sun_kak[4], 
$Sun_kak[5], 
$Sun_kak[6], 
$Sun_kak[7], 
$Sun_kak[8], 
$Sun_kak[9], 
$Sun_kak[10], 
$Sun_kak[11], 
$Sun_kak[12]
); 

?>
<!--
</tr>
-->
<!-- Venus -->
<!--
<tr>
<td>Ven</td>
<td><?php echo $Ven_kak[1]; ?></td>
<td><?php echo $Ven_kak[2]; ?></td>
<td><?php echo $Ven_kak[3]; ?></td>
<td><?php echo $Ven_kak[4]; ?></td>
<td><?php echo $Ven_kak[5]; ?></td>
<td><?php echo $Ven_kak[6]; ?></td>
<td><?php echo $Ven_kak[7]; ?></td>
<td><?php echo $Ven_kak[8]; ?></td>
<td><?php echo $Ven_kak[9]; ?></td>
<td><?php echo $Ven_kak[10]; ?></td>
<td><?php echo $Ven_kak[11]; ?></td>
<td><?php echo $Ven_kak[12]; ?></td>
</tr>
<tr>
-->

<?php

$Ven_kak_arr = array(
$Ven_kak[1], 
$Ven_kak[2], 
$Ven_kak[3], 
$Ven_kak[4], 
$Ven_kak[5], 
$Ven_kak[6], 
$Ven_kak[7], 
$Ven_kak[8], 
$Ven_kak[9], 
$Ven_kak[10], 
$Ven_kak[11], 
$Ven_kak[12]
); 

?>
<!--
</tr>
-->
<!-- Mercury -->
<!--
<tr>
<td>Mer</td>
<td><?php echo $Mer_kak[1]; ?></td>
<td><?php echo $Mer_kak[2]; ?></td>
<td><?php echo $Mer_kak[3]; ?></td>
<td><?php echo $Mer_kak[4]; ?></td>
<td><?php echo $Mer_kak[5]; ?></td>
<td><?php echo $Mer_kak[6]; ?></td>
<td><?php echo $Mer_kak[7]; ?></td>
<td><?php echo $Mer_kak[8]; ?></td>
<td><?php echo $Mer_kak[9]; ?></td>
<td><?php echo $Mer_kak[10]; ?></td>
<td><?php echo $Mer_kak[11]; ?></td>
<td><?php echo $Mer_kak[12]; ?></td>
</tr>
<tr>
-->
<?php

$Mer_kak_arr = array(
$Mer_kak[1], 
$Mer_kak[2], 
$Mer_kak[3], 
$Mer_kak[4], 
$Mer_kak[5], 
$Mer_kak[6], 
$Mer_kak[7], 
$Mer_kak[8], 
$Mer_kak[9], 
$Mer_kak[10], 
$Mer_kak[11], 
$Mer_kak[12]
); 

?>
<!--
</tr>
-->
<!-- Moon -->
<!--
<tr>
<td>Moon</td>
<td><?php echo $Moon_kak[1]; ?></td>
<td><?php echo $Moon_kak[2]; ?></td>
<td><?php echo $Moon_kak[3]; ?></td>
<td><?php echo $Moon_kak[4]; ?></td>
<td><?php echo $Moon_kak[5]; ?></td>
<td><?php echo $Moon_kak[6]; ?></td>
<td><?php echo $Moon_kak[7]; ?></td>
<td><?php echo $Moon_kak[8]; ?></td>
<td><?php echo $Moon_kak[9]; ?></td>
<td><?php echo $Moon_kak[10]; ?></td>
<td><?php echo $Moon_kak[11]; ?></td>
<td><?php echo $Moon_kak[12]; ?></td>
</tr>
<tr>
-->
<?php

$Moon_kak_arr = array(
$Moon_kak[1], 
$Moon_kak[2], 
$Moon_kak[3], 
$Moon_kak[4], 
$Moon_kak[5], 
$Moon_kak[6], 
$Moon_kak[7], 
$Moon_kak[8], 
$Moon_kak[9], 
$Moon_kak[10], 
$Moon_kak[11], 
$Moon_kak[12]
); 
?>
<!--
</tr>
-->
<!-- Ascendant -->
<!--
<tr>
<td>Asc</td>
<td><?php echo $Lag_kak[1]; ?></td>
<td><?php echo $Lag_kak[2]; ?></td>
<td><?php echo $Lag_kak[3]; ?></td>
<td><?php echo $Lag_kak[4]; ?></td>
<td><?php echo $Lag_kak[5]; ?></td>
<td><?php echo $Lag_kak[6]; ?></td>
<td><?php echo $Lag_kak[7]; ?></td>
<td><?php echo $Lag_kak[8]; ?></td>
<td><?php echo $Lag_kak[9]; ?></td>
<td><?php echo $Lag_kak[10]; ?></td>
<td><?php echo $Lag_kak[11]; ?></td>
<td><?php echo $Lag_kak[12]; ?></td>
</tr>
<tr>
-->
<?php

$Lag_kak_arr = array(
$Lag_kak[1], 
$Lag_kak[2], 
$Lag_kak[3], 
$Lag_kak[4], 
$Lag_kak[5], 
$Lag_kak[6], 
$Lag_kak[7], 
$Lag_kak[8], 
$Lag_kak[9], 
$Lag_kak[10], 
$Lag_kak[11], 
$Lag_kak[12]
); 

?>
<!--
</tr>

</table>
-->
<!--

</table>
<br>
<br>
-->



<!-- Matrices for Ashtakavarga Lagna Ends -->

<!-- Ashtakavarga Ends -->

                    <!-- div.dataTables_borderWrap -->
                    <div>
                      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                          
                          <tr>
                            <!--
                            <th class="center">
                              <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                              </label>
                            </th>
                          -->
                            <th>Date</th>
                            <th class="hidden-480">Sun</th>
                            <th class="hidden-480">Moon</th>
                            <th class="hidden-480">Mar</th>
                            <th class="hidden-480">Mer</th>
                            <th class="hidden-480">Jup</th>
                            <th class="hidden-480">Ven</th>
                            <th class="hidden-480">Sat</th>
                            <th class="hidden-480">Rah</th>
                            <th class="hidden-480">Ketu</th>
                            <th class="hidden-480">Status</th>

                            <!--<th></th>-->
                          </tr>
                        </thead>

                        <tbody>

<?php
// Calculating Planet Longitudes substracting Ayanamsa


$xyn = 0;
$str_Kakshya_sun = 0;

$xx=0;
$kak_tot = 0;
for ($xy=0; $xy< $sn_days; $xy++)
{


// Calculation of Sun Longitude
$tmp_Long_Sun[$xx] = ($trans_longitude1[$xx] - $transit_Ayana[$xy]);
If ($tmp_Long_Sun[$xx] < 0)
  {
    $tmp_Long_Sun[$xx] = ($tmp_Long_Sun[$xx] + 360);
    $tmp_Long_Sun[$xx] = fmod($tmp_Long_Sun[$xx], 360);
        //$tmp_Long_Sun[$xx] = round($tmp_Long_Sun[$xx],2);
  }

// Calculation of Moon Longitude
$tmp_Long_Moon[$xx] = ($trans_longitude1[$xx+1] - $transit_Ayana[$xy]);
If ($tmp_Long_Moon[$xx] < 0)
  {
    $tmp_Long_Moon[$xx] = ($tmp_Long_Moon[$xx] + 360);
    $tmp_Long_Moon[$xx] = fmod($tmp_Long_Moon[$xx], 360);
    //$tmp_Long_Moon[$xx] = round($tmp_Long_Moon[$xx],2);
  }

// Calculation of Mar Longitude
$tmp_Long_Mar[$xx] = ($trans_longitude1[$xx+2] - $transit_Ayana[$xy]);
If ($tmp_Long_Mar[$xx] < 0)
  {
    $tmp_Long_Mar[$xx] = ($tmp_Long_Mar[$xx] + 360);
    $tmp_Long_Mar[$xx] = fmod($tmp_Long_Mar[$xx], 360);
    //$tmp_Long_Mar[$xx] = round($tmp_Long_Mar[$xx],2);
  }

// Calculation of Mer Longitude
$tmp_Long_Mer[$xx] = ($trans_longitude1[$xx+3] - $transit_Ayana[$xy]);
If ($tmp_Long_Mer[$xx] < 0)
  {
    $tmp_Long_Mer[$xx] = ($tmp_Long_Mer[$xx] + 360);
    $tmp_Long_Mer[$xx] = fmod($tmp_Long_Mer[$xx], 360);
    //$tmp_Long_Mer[$xx] = round($tmp_Long_Mer[$xx],2);
  }

// Calculation of Jup Longitude
$tmp_Long_Jup[$xx] = ($trans_longitude1[$xx+4] - $transit_Ayana[$xy]);
If ($tmp_Long_Jup[$xx] < 0)
  {
    $tmp_Long_Jup[$xx] = ($tmp_Long_Jup[$xx] + 360);
    $tmp_Long_Jup[$xx] = fmod($tmp_Long_Jup[$xx], 360);
    //$tmp_Long_Jup[$xx] = round($tmp_Long_Jup[$xx],2);
  }

// Calculation of Ven Longitude
$tmp_Long_Ven[$xx] = ($trans_longitude1[$xx+5] - $transit_Ayana[$xy]);
If ($tmp_Long_Ven[$xx] < 0)
  {
    $tmp_Long_Ven[$xx] = ($tmp_Long_Ven[$xx] + 360);
    $tmp_Long_Ven[$xx] = fmod($tmp_Long_Ven[$xx], 360);
    //$tmp_Long_Ven[$xx] = round($tmp_Long_Ven[$xx],2);
  }

// Calculation of Sat Longitude
$tmp_Long_Sat[$xx] = ($trans_longitude1[$xx+6] - $transit_Ayana[$xy]);
If ($tmp_Long_Sat[$xx] < 0)
  {
    $tmp_Long_Sat[$xx] = ($tmp_Long_Sat[$xx] + 360);
    $tmp_Long_Sat[$xx] = fmod($tmp_Long_Sat[$xx], 360);
    //$tmp_Long_Sat[$xx] = round($tmp_Long_Sat[$xx],2);
  }

// Calculation of Rah Longitude
$tmp_Long_Rah[$xx] = ($trans_longitude1[$xx+8] - $transit_Ayana[$xy]);
If ($tmp_Long_Rah[$xx] < 0)
  {
    $tmp_Long_Rah[$xx] = ($tmp_Long_Rah[$xx] + 360);
    $tmp_Long_Rah[$xx] = fmod($tmp_Long_Rah[$xx], 360);
    //$tmp_Long_Rah[$xx] = round($tmp_Long_Rah[$xx],2);
  }

// Calculation of Ket Longitude
$tmp_Long_Ket[$xx] = $tmp_Long_Rah[$xx] + 180;
If ($tmp_Long_Ket[$xx] > 360);
  {
    $tmp_Long_Ket[$xx] = fmod($tmp_Long_Ket[$xx], 360);
  }


// Rasi No. calculation

$tmmp_Rasi_Sun[$xx] = RasiNum($tmp_Long_Sun[$xx]);
$tmmp_Rasi_Moon[$xx] = RasiNum($tmp_Long_Moon[$xx]);
$tmmp_Rasi_Mar[$xx] = RasiNum($tmp_Long_Mar[$xx]);
$tmmp_Rasi_Mer[$xx] = RasiNum($tmp_Long_Mer[$xx]);
$tmmp_Rasi_Jup[$xx] = RasiNum($tmp_Long_Jup[$xx]);
$tmmp_Rasi_Ven[$xx] = RasiNum($tmp_Long_Ven[$xx]);
$tmmp_Rasi_Sat[$xx] = RasiNum($tmp_Long_Sat[$xx]);
$tmmp_Rasi_Rah[$xx] = RasiNum($tmp_Long_Rah[$xx]);
$tmmp_Rasi_Ket[$xx] = RasiNum($tmp_Long_Ket[$xx]);

// Kakshya Calculation

$tmp_Kakshya_Sun[$xx] = Kakshya($tmp_Long_Sun[$xx]);
$tmp_Kakshya_Moon[$xx] = Kakshya($tmp_Long_Moon[$xx]);
$tmp_Kakshya_Mar[$xx] = Kakshya($tmp_Long_Mar[$xx]);
$tmp_Kakshya_Mer[$xx] = Kakshya($tmp_Long_Mer[$xx]);
$tmp_Kakshya_Jup[$xx] = Kakshya($tmp_Long_Jup[$xx]);
$tmp_Kakshya_Ven[$xx] = Kakshya($tmp_Long_Ven[$xx]);
$tmp_Kakshya_Sat[$xx] = Kakshya($tmp_Long_Sat[$xx]);
$tmp_Kakshya_Rah[$xx] = Kakshya($tmp_Long_Rah[$xx]);
$tmp_Kakshya_Ket[$xx] = Kakshya($tmp_Long_Ket[$xx]);


// Sun Samudayaka Points calculation Starts here
If ($tmp_Kakshya_Sun[$xx] == "Sun")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Sun_kak_arr[($tmmp_Rasi_Sun[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Sun[$xx] == "Moon")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Moon_kak_arr[($tmmp_Rasi_Sun[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Sun[$xx] == "Mar")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Mar_kak_arr[($tmmp_Rasi_Sun[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Sun[$xx] == "Mer")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Mer_kak_arr[($tmmp_Rasi_Sun[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Sun[$xx] == "Jup")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Jup_kak_arr[($tmmp_Rasi_Sun[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Sun[$xx] == "Ven")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Ven_kak_arr[($tmmp_Rasi_Sun[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Sun[$xx] == "Sat")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Sat_kak_arr[($tmmp_Rasi_Sun[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Sun[$xx] == "Asc")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Lag_kak_arr[($tmmp_Rasi_Sun[$xx]-1)]; 
}

// Sun Samudayaka Points calculation ends here

// Moon Samudayaka Points calculation Starts here
If ($tmp_Kakshya_Moon[$xx] == "Sun")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Sun_kak_arr[($tmmp_Rasi_Moon[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Moon[$xx] == "Moon")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Moon_kak_arr[($tmmp_Rasi_Moon[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Moon[$xx] == "Mar")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Mar_kak_arr[($tmmp_Rasi_Moon[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Moon[$xx] == "Mer")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Mer_kak_arr[($tmmp_Rasi_Moon[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Moon[$xx] == "Jup")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Jup_kak_arr[($tmmp_Rasi_Moon[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Moon[$xx] == "Ven")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Ven_kak_arr[($tmmp_Rasi_Moon[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Moon[$xx] == "Sat")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Sat_kak_arr[($tmmp_Rasi_Moon[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Moon[$xx] == "Asc")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Lag_kak_arr[($tmmp_Rasi_Moon[$xx]-1)]; 
}

// Moon Samudayaka Points calculation ends here

// Mar Samudayaka Points calculation Starts here
If ($tmp_Kakshya_Mar[$xx] == "Sun")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Sun_kak_arr[($tmmp_Rasi_Mar[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Mar[$xx] == "Moon")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Moon_kak_arr[($tmmp_Rasi_Mar[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Mar[$xx] == "Mar")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Mar_kak_arr[($tmmp_Rasi_Mar[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Mar[$xx] == "Mer")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Mer_kak_arr[($tmmp_Rasi_Mar[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Mar[$xx] == "Jup")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Jup_kak_arr[($tmmp_Rasi_Mar[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Mar[$xx] == "Ven")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Ven_kak_arr[($tmmp_Rasi_Mar[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Mar[$xx] == "Sat")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Sat_kak_arr[($tmmp_Rasi_Mar[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Mar[$xx] == "Asc")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Lag_kak_arr[($tmmp_Rasi_Mar[$xx]-1)]; 
}

// Mar Samudayaka Points calculation ends here

// Mer Samudayaka Points calculation Starts here
If ($tmp_Kakshya_Mer[$xx] == "Sun")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Sun_kak_arr[($tmmp_Rasi_Mer[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Mer[$xx] == "Moon")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Moon_kak_arr[($tmmp_Rasi_Mer[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Mer[$xx] == "Mar")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Mar_kak_arr[($tmmp_Rasi_Mer[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Mer[$xx] == "Mer")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Mer_kak_arr[($tmmp_Rasi_Mer[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Mer[$xx] == "Jup")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Jup_kak_arr[($tmmp_Rasi_Mer[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Mer[$xx] == "Ven")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Ven_kak_arr[($tmmp_Rasi_Mer[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Mer[$xx] == "Sat")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Sat_kak_arr[($tmmp_Rasi_Mer[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Mer[$xx] == "Asc")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Lag_kak_arr[($tmmp_Rasi_Mer[$xx]-1)]; 
}

// Mer Samudayaka Points calculation ends here

// Jup Samudayaka Points calculation Starts here
If ($tmp_Kakshya_Jup[$xx] == "Sun")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Sun_kak_arr[($tmmp_Rasi_Jup[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Jup[$xx] == "Moon")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Moon_kak_arr[($tmmp_Rasi_Jup[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Jup[$xx] == "Mar")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Mar_kak_arr[($tmmp_Rasi_Jup[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Jup[$xx] == "Mer")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Mer_kak_arr[($tmmp_Rasi_Jup[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Jup[$xx] == "Jup")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Jup_kak_arr[($tmmp_Rasi_Jup[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Jup[$xx] == "Ven")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Ven_kak_arr[($tmmp_Rasi_Jup[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Jup[$xx] == "Sat")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Sat_kak_arr[($tmmp_Rasi_Jup[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Jup[$xx] == "Asc")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Lag_kak_arr[($tmmp_Rasi_Jup[$xx]-1)]; 
}

// Jup Samudayaka Points calculation ends here

// Ven Samudayaka Points calculation Starts here
If ($tmp_Kakshya_Ven[$xx] == "Sun")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Sun_kak_arr[($tmmp_Rasi_Ven[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Ven[$xx] == "Moon")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Moon_kak_arr[($tmmp_Rasi_Ven[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Ven[$xx] == "Mar")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Mar_kak_arr[($tmmp_Rasi_Ven[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Ven[$xx] == "Mer")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Mer_kak_arr[($tmmp_Rasi_Ven[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Ven[$xx] == "Jup")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Jup_kak_arr[($tmmp_Rasi_Ven[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Ven[$xx] == "Ven")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Ven_kak_arr[($tmmp_Rasi_Ven[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Ven[$xx] == "Sat")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Sat_kak_arr[($tmmp_Rasi_Ven[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Ven[$xx] == "Asc")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Lag_kak_arr[($tmmp_Rasi_Ven[$xx]-1)]; 
}

// Ven Samudayaka Points calculation ends here

// Sat Samudayaka Points calculation Starts here
If ($tmp_Kakshya_Sat[$xx] == "Sun")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Sun_kak_arr[($tmmp_Rasi_Sat[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Sat[$xx] == "Moon")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Moon_kak_arr[($tmmp_Rasi_Sat[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Sat[$xx] == "Mar")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Mar_kak_arr[($tmmp_Rasi_Sat[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Sat[$xx] == "Mer")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Mer_kak_arr[($tmmp_Rasi_Sat[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Sat[$xx] == "Jup")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Jup_kak_arr[($tmmp_Rasi_Sat[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Sat[$xx] == "Ven")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Ven_kak_arr[($tmmp_Rasi_Sat[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Sat[$xx] == "Sat")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Sat_kak_arr[($tmmp_Rasi_Sat[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Sat[$xx] == "Asc")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Lag_kak_arr[($tmmp_Rasi_Sat[$xx]-1)]; 
}

// Sat Samudayaka Points calculation ends here

// Rah Samudayaka Points calculation Starts here
If ($tmp_Kakshya_Rah[$xx] == "Sun")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Sun_kak_arr[($tmmp_Rasi_Rah[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Rah[$xx] == "Moon")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Moon_kak_arr[($tmmp_Rasi_Rah[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Rah[$xx] == "Mar")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Mar_kak_arr[($tmmp_Rasi_Rah[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Rah[$xx] == "Mer")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Mer_kak_arr[($tmmp_Rasi_Rah[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Rah[$xx] == "Jup")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Jup_kak_arr[($tmmp_Rasi_Rah[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Rah[$xx] == "Ven")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Ven_kak_arr[($tmmp_Rasi_Rah[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Rah[$xx] == "Sat")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Sat_kak_arr[($tmmp_Rasi_Rah[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Rah[$xx] == "Asc")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Lag_kak_arr[($tmmp_Rasi_Rah[$xx]-1)]; 
}

// Rah Samudayaka Points calculation ends here

// Ket Samudayaka Points calculation Starts here
If ($tmp_Kakshya_Ket[$xx] == "Sun")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Sun_kak_arr[($tmmp_Rasi_Ket[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Ket[$xx] == "Moon")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Moon_kak_arr[($tmmp_Rasi_Ket[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Ket[$xx] == "Mar")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Mar_kak_arr[($tmmp_Rasi_Ket[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Ket[$xx] == "Mer")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Mer_kak_arr[($tmmp_Rasi_Ket[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Ket[$xx] == "Jup")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Jup_kak_arr[($tmmp_Rasi_Ket[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Ket[$xx] == "Ven")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Ven_kak_arr[($tmmp_Rasi_Ket[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Ket[$xx] == "Sat")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Sat_kak_arr[($tmmp_Rasi_Ket[$xx]-1)]; 
}
elseif ($tmp_Kakshya_Ket[$xx] == "Asc")
{
 $str_Kakshya_sun = $str_Kakshya_sun + $Lag_kak_arr[($tmmp_Rasi_Ket[$xx]-1)]; 
}

// Ket Samudayaka Points calculation ends here




//echo "This is Moon : " . $Moon_kak_arr[10] . "<br>";


/*
echo $vbn_x . "###### " . $transit_day . "~~~~~" . $trans_longitude1[$zx] . "*****" . $transit_Ayana[$zx][$xyn] . "%%%%%%----" . $trans_degrees[0] . "<br>";

echo $vbn_x . "###### " . $transit_day . "~~~~~" . $trans_longitude1[$zx] . "*****" . $transit_Ayana[$zx][$xyn] . "%%%%%%----" . $trans_degrees[1] . "<br>";

echo $vbn_x . "###### " . $transit_day . "~~~~~" . $trans_longitude1[$zx] . "*****" . $transit_Ayana[$zx][$xyn] . "%%%%%%----" . $trans_degrees[2] . "<br>";
echo $vbn_x . "###### " . $transit_day . "~~~~~" . $trans_longitude1[$zx] . "*****" . $transit_Ayana[$zx][$xyn] . "%%%%%%----" . $trans_degrees[3] . "<br>";
echo $vbn_x . "###### " . $transit_day . "~~~~~" . $trans_longitude1[$zx] . "*****" . $transit_Ayana[$zx][$xyn] . "%%%%%%----" . $trans_degrees[4] . "<br>";
echo $vbn_x . "###### " . $transit_day . "~~~~~" . $trans_longitude1[$zx] . "*****" . $transit_Ayana[$zx][$xyn] . "%%%%%%----" . $trans_degrees[5] . "<br>";
echo $vbn_x . "###### " . $transit_day . "~~~~~" . $trans_longitude1[$zx] . "*****" . $transit_Ayana[$zx][$xyn] . "%%%%%%----" . $trans_degrees[6] . "<br>";
echo $vbn_x . "###### " . $transit_day . "~~~~~" . $trans_longitude1[$zx] . "*****" . $transit_Ayana[$zx][$xyn] . "%%%%%%----" . $trans_degrees[7] . "<br>";
echo $vbn_x . "###### " . $transit_day . "~~~~~" . $trans_longitude1[$zx] . "*****" . $transit_Ayana[$zx][$xyn] . "%%%%%%----" . $trans_degrees[8] . "<br>";


//$trans_degrees_moon = $trans_degrees1;
//$trans_degrees_mar = $trans_degrees2;
*/

?>
                          <tr>
                            <!--
                            <td class="center">
                              <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                              </label>
                            </td>
                            -->
                            <td>

                              <a href="#"><?php echo $txt_trans_day[$xx]; ?></a>

                            </td>

<!--

                            <td class="hidden-480"><?php echo round($tmp_Long_Sun[$xx],2) . "***" . $tmmp_Rasi_Sun[$xx] . "^^" . $tmp_Kakshya_Sun[$xx] . "$$$" . $str_Kakshya_sun[$xx]; ?></td>
                            <td class="hidden-480"><?php echo round($tmp_Long_Moon[$xx],2) . "***" . $tmmp_Rasi_Moon[$xx]. "^^" . $tmp_Kakshya_Moon[$xx] . "$$$" . $str_Kakshya_moon[$xx]; ?></td>
                            <td class="hidden-480"><?php echo round($tmp_Long_Jup[$xx],2) . "***" . $tmmp_Rasi_Jup[$xx]. "^^" . $tmp_Kakshya_Jup[$xx] . "$$$" . $str_Kakshya_jup[$xx]; ?></td>
                            <td class="hidden-480"><?php echo round($tmp_Long_Mar[$xx],2) . "***" . $tmmp_Rasi_Mar[$xx]. "^^" . $tmp_Kakshya_Mar[$xx] . "$$$" . $str_Kakshya_mar[$xx]; ?></td>
                            <td class="hidden-480"><?php echo round($tmp_Long_Ven[$xx],2) . "***" . $tmmp_Rasi_Ven[$xx]. "^^" . $tmp_Kakshya_Ven[$xx] . "$$$" . $str_Kakshya_ven[$xx]; ?></td>
                            <td class="hidden-480"><?php echo round($tmp_Long_Mer[$xx],2) . "***" . $tmmp_Rasi_Mer[$xx]. "^^" . $tmp_Kakshya_Mer[$xx] . "$$$" . $str_Kakshya_mer[$xx]; ?></td>
                            <td class="hidden-480"><?php echo round($tmp_Long_Sat[$xx],2) . "***" . $tmmp_Rasi_Sat[$xx]. "^^" . $tmp_Kakshya_Sat[$xx] . "$$$" . $str_Kakshya_sat[$xx]; ?></td>
                            <td class="hidden-480"><?php echo round($tmp_Long_Rah[$xx],2) . "***" . $tmmp_Rasi_Rah[$xx]. "^^" . $tmp_Kakshya_Rah[$xx] . "$$$" . $str_Kakshya_rah[$xx]; ?></td>
                            <td class="hidden-480"><?php echo round($tmp_Long_Ket[$xx],2) . "***" . $tmmp_Rasi_Ket[$xx]. "^^" . $tmp_Kakshya_Ket[$xx] . "$$$" . $str_Kakshya_ket[$xx]; ?></td>


-->

                            <td class="hidden-480"><?php echo round($tmp_Long_Sun[$xx],2); ?></td>
                            <td class="hidden-480"><?php echo round($tmp_Long_Moon[$xx],2); ?></td>
                            <td class="hidden-480"><?php echo round($tmp_Long_Jup[$xx],2); ?></td>
                            <td class="hidden-480"><?php echo round($tmp_Long_Mar[$xx],2); ?></td>
                            <td class="hidden-480"><?php echo round($tmp_Long_Ven[$xx],2); ?></td>
                            <td class="hidden-480"><?php echo round($tmp_Long_Mer[$xx],2); ?></td>
                            <td class="hidden-480"><?php echo round($tmp_Long_Sat[$xx],2); ?></td>
                            <td class="hidden-480"><?php echo round($tmp_Long_Rah[$xx],2); ?></td>
                            <td class="hidden-480"><?php echo round($tmp_Long_Ket[$xx],2); ?></td>
                            <td class="hidden-480">
                              <span class="label label-sm label-warning"><?php echo $str_Kakshya_sun; ?></span>
                            </td>

                            <!--
                            <td>
                              <div class="hidden-sm hidden-xs action-buttons">
                                <a class="blue" href="#">
                                  <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                </a>

                                <a class="green" href="#">
                                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>

                                <a class="red" href="#">
                                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                              </div>

                              <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                  <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                  </button>

                                  <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                    <li>
                                      <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                        <span class="blue">
                                          <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                        </span>
                                      </a>
                                    </li>

                                    <li>
                                      <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                        <span class="green">
                                          <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                        </span>
                                      </a>
                                    </li>

                                    <li>
                                      <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                        <span class="red">
                                          <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                        </span>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </td>
                          -->
                          </tr>

<?php

$xx = $xx + 9;
$str_Kakshya_sun = 0;
//$xy = $xy + 1;

}// End of Looping of planets for no of days for 9 planets



?>
<!--

                          <tr>
                            <td class="center">
                              <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                              </label>
                            </td>

                            <td>
                              <a href="#">base.com</a>
                            </td>
                            <td>$35</td>
                            <td class="hidden-480">2,595</td>
                            <td>Feb 18</td>

                            <td class="hidden-480">
                              <span class="label label-sm label-success">Registered</span>
                            </td>

                            <td>
                              <div class="hidden-sm hidden-xs action-buttons">
                                <a class="blue" href="#">
                                  <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                </a>

                                <a class="green" href="#">
                                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>

                                <a class="red" href="#">
                                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                              </div>

                              <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                  <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                  </button>

                                  <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                    <li>
                                      <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                        <span class="blue">
                                          <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                        </span>
                                      </a>
                                    </li>

                                    <li>
                                      <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                        <span class="green">
                                          <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                        </span>
                                      </a>
                                    </li>

                                    <li>
                                      <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                        <span class="red">
                                          <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                        </span>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="center">
                              <label class="pos-rel">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                              </label>
                            </td>

                            <td>
                              <a href="#">max.com</a>
                            </td>
                            <td>$60</td>
                            <td class="hidden-480">4,400</td>
                            <td>Mar 11</td>

                            <td class="hidden-480">
                              <span class="label label-sm label-warning">Expiring</span>
                            </td>

                            <td>
                              <div class="hidden-sm hidden-xs action-buttons">
                                <a class="blue" href="#">
                                  <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                </a>

                                <a class="green" href="#">
                                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>

                                <a class="red" href="#">
                                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                              </div>

                              <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                  <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                  </button>

                                  <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                    <li>
                                      <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                        <span class="blue">
                                          <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                        </span>
                                      </a>
                                    </li>

                                    <li>
                                      <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                        <span class="green">
                                          <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                        </span>
                                      </a>
                                    </li>

                                    <li>
                                      <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                        <span class="red">
                                          <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                        </span>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </td>
                          </tr>
-->

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>



</div>
</div>



									</div>

								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->



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
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/vbncustom/js/jquery-ui.custom.min.js"></script>
		<script src="assets/vbncustom/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/vbncustom/js/chosen.jquery.min.js"></script>
		<script src="assets/vbncustom/js/spinbox.min.js"></script>
		<script src="assets/vbncustom/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/vbncustom/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/vbncustom/js/moment.min.js"></script>
		<script src="assets/vbncustom/js/daterangepicker.min.js"></script>
		<script src="assets/vbncustom/js/bootstrap-datetimepicker.min.js"></script>
		<script src="assets/vbncustom/js/bootstrap-colorpicker.min.js"></script>
		<script src="assets/vbncustom/js/jquery.knob.min.js"></script>
		<script src="assets/vbncustom/js/autosize.min.js"></script>
		<script src="assets/vbncustom/js/jquery.inputlimiter.min.js"></script>
		<script src="assets/vbncustom/js/jquery.maskedinput.min.js"></script>
		<script src="assets/vbncustom/js/bootstrap-tag.min.js"></script>

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
		<script src="assets/vbncustom/js/ace-elements.min.js"></script>
		<script src="assets/vbncustom/js/ace.min.js"></script>

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
			
				autosize($('textarea[class*=autosize]'));
				
				$('textarea.limited').inputlimiter({
					remText: '%n character%s remaining...',
					limitText: 'max allowed : %n.'
				});
			
				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');
				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
			
			
			
				$( "#input-size-slider" ).css('width','200px').slider({
					value:1,
					range: "min",
					min: 1,
					max: 8,
					step: 1,
					slide: function( event, ui ) {
						var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
						var val = parseInt(ui.value);
						$('#form-field-4').attr('class', sizing[val]).attr('placeholder', '.'+sizing[val]);
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
					style: 'well',
					btn_choose: 'Drop files here or click to choose',
					btn_change: null,
					no_icon: 'ace-icon fa fa-cloud-upload',
					droppable: true,
					thumbnail: 'small'//large | fit
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
			
				//*****************************************
        //initiate dataTables plugin
        var myTable = 
        $('#dynamic-table')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
          bAutoWidth: false,
          "aoColumns": [
            //{ "bSortable": false },
            null, null,null, null, null, null, null, null,null, null, null,
            //{ "bSortable": false }
          ],
          "aaSorting": [],
          
          
          //"bProcessing": true,
              //"bServerSide": true,
              //"sAjaxSource": "http://127.0.0.1/table.php" ,
      
          //,
          //"sScrollY": "200px",
          //"bPaginate": false,
      
          //"sScrollX": "100%",
          //"sScrollXInner": "120%",
          //"bScrollCollapse": true,
          //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
          //you may want to wrap the table inside a "div.dataTables_borderWrap" element
      
          //"iDisplayLength": 50
      
      
          select: {
            style: 'multi'
          }
          } );
      
        
        
        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
        
        new $.fn.dataTable.Buttons( myTable, {
          buttons: [
            {
            "extend": "colvis",
            "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
            "className": "btn btn-white btn-primary btn-bold",
            columns: ':not(:first):not(:last)'
            },
            {
            "extend": "copy",
            "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {
            "extend": "csv",
            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {
            "extend": "excel",
            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {
            "extend": "pdf",
            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
            "className": "btn btn-white btn-primary btn-bold"
            },
            {
            "extend": "print",
            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
            "className": "btn btn-white btn-primary btn-bold",
            autoPrint: false,
            message: 'This print was produced using the Print button for DataTables'
            }     
          ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container') );
        
        //style the message box
        var defaultCopyAction = myTable.button(1).action();
        myTable.button(1).action(function (e, dt, button, config) {
          defaultCopyAction(e, dt, button, config);
          $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
        });
        
        
        var defaultColvisAction = myTable.button(0).action();
        myTable.button(0).action(function (e, dt, button, config) {
          
          defaultColvisAction(e, dt, button, config);
          
          
          if($('.dt-button-collection > .dropdown-menu').length == 0) {
            $('.dt-button-collection')
            .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
            .find('a').attr('href', '#').wrap("<li />")
          }
          $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
        });
      
        ////
      
        setTimeout(function() {
          $($('.tableTools-container')).find('a.dt-button').each(function() {
            var div = $(this).find(' > div').first();
            if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
            else $(this).tooltip({container: 'body', title: $(this).text()});
          });
        }, 500);
        
        
        
        
        
        myTable.on( 'select', function ( e, dt, type, index ) {
          if ( type === 'row' ) {
            $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
          }
        } );
        myTable.on( 'deselect', function ( e, dt, type, index ) {
          if ( type === 'row' ) {
            $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
          }
        } );
      
      
      
      
        /////////////////////////////////
        //table checkboxes
        $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
        
        //select/deselect all rows according to table header checkbox
        $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
          var th_checked = this.checked;//checkbox inside "TH" table header
          
          $('#dynamic-table').find('tbody > tr').each(function(){
            var row = this;
            if(th_checked) myTable.row(row).select();
            else  myTable.row(row).deselect();
          });
        });
        
        //select/deselect a row when the checkbox is checked/unchecked
        $('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
          var row = $(this).closest('tr').get(0);
          if(this.checked) myTable.row(row).deselect();
          else myTable.row(row).select();
        });
      
      
      
        $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
          e.stopImmediatePropagation();
          e.stopPropagation();
          e.preventDefault();
        });
        
        



        //****************************************
				
			
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
					
					
					/**
					file_input
					.off('file.preview.ace')
					.on('file.preview.ace', function(e, info) {
						console.log(info.file.width);
						console.log(info.file.height);
						e.preventDefault();//to prevent preview
					});
					*/
				
				});
			
				$('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				.closest('.ace-spinner')
				.on('changed.fu.spinbox', function(){
					//console.log($('#spinner1').val())
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

	$('#id-date-range-picker-1').daterangepicker();

	$('#id-date-range-picker-1').on('apply.daterangepicker', function(ev, picker) {
		$('#vbnnumberdays').val(picker.endDate.diff(picker.startDate, "days")+1);
    $('#startDate').val(picker.startDate);
    
	});			



				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false,
					disableFocus: true,
					icons: {
						up: 'fa fa-chevron-up',
						down: 'fa fa-chevron-down'
					}
				}).on('focus', function() {
					$('#timepicker1').timepicker('showWidget');
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				
			
				
				if(!ace.vars['old_ie']) $('#date-timepicker1').datetimepicker({
				 //format: 'MM/DD/YYYY h:mm:ss A',//use this option to display seconds
				 icons: {
					time: 'fa fa-clock-o',
					date: 'fa fa-calendar',
					up: 'fa fa-chevron-up',
					down: 'fa fa-chevron-down',
					previous: 'fa fa-chevron-left',
					next: 'fa fa-chevron-right',
					today: 'fa fa-arrows ',
					clear: 'fa fa-trash',
					close: 'fa fa-times'
				 }
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
			
				$('#colorpicker1').colorpicker();
				//$('.colorpicker').last().css('z-index', 2000);//if colorpicker is inside a modal, its z-index should be higher than modal'safe
			
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
			
					//programmatically add/remove a tag
					var $tag_obj = $('#form-field-tags').data('tag');
					$tag_obj.add('Programmatically Added');
					
					var index = $tag_obj.inValues('some tag');
					$tag_obj.remove(index);
				}
				catch(e) {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//autosize($('#form-field-tags'));
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
					autosize.destroy('textarea[class*=autosize]')
					
					$('.limiterBox,.autosizejs').remove();
					$('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
				});
			
			});
		</script>
	</body>
</html>
