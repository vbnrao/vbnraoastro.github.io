<?php
// Initialize the session
session_start();
//include ('./accesscontrol.php');

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$userID = $_SESSION["id"];

// Include config file
require_once "DbConnection.php";
include ('./planet_calculations.php'); /// All functions for planet calculations

if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $txt_ayana = trim($_POST["vbn_ayana"]);
    }
    else
    {
      $txt_ayana = "ay1";
    }

//Current Data Chart starts here 

    // get all variables from database
   // $h_sys = safeEscapeString($_POST["h_sys"]);
    //$_SESSION['name'] = $value["client_name"];

date_default_timezone_set("Asia/Calcutta");
//echo date_default_timezone_get() . "<br>"; 
//echo "Today is : " . date("d.m.Y") . "<br>";
//echo "Today Time is : " . date("H:i:s") . "<br>";


    $_SESSION['dob'] = date("d.m.Y");

    $tmpDate = explode('.',$_SESSION['dob']);
    

    $day = $tmpDate[0];
    $month = $tmpDate[1];
    $year = $tmpDate[2];

    $_SESSION['tob'] = date("H:i:s");
    $tmpTime = explode(':',$_SESSION['tob']);

      $hour = $tmpTime[0];
      $minute = $tmpTime[1];
      $sec = $tmpTime[2];
/*
echo "This is the day : " . $day . "<br>";
echo "This is the Month : " . $month . "<br>";
echo "This is the Year : " . $year . "<br>";
echo "This is the HOur : " . $hour . "<br>";
echo "This is the Minute : " . $minute . "<br>";
echo "This is the Second : " . $sec . "<br>";
*/

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
$_SESSION['default_city'] = "Hyderabad";
$default_city_code = 1253;
    //$_SESSION['country'] = $value["client_country"];
    //$_SESSION['state'] = $value["client_state"];
    $city = $default_city_code;

 /*   
        require_once('DbConnection.php');
*/        
$sql = "SELECT id, name, latitude, longitude, timezone FROM city WHERE id = $city";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "<br> id: ". $row["id"]. " - Name: ". $row["name"]. " " . $row["latitude"]. $row["longitude"]. " " . $row["timezone"]. " " .  "<br>";


//    $_SESSION['tmp_pob'] = $value["client_pob"];
    $_SESSION['long_deg'] = $row["longitude"];
    $_SESSION['lat_deg'] = $row["latitude"];
    $_SESSION['timezone'] = $row["timezone"];

/*
    echo "This is the Default City : " . $_SESSION['default_city'] . "<br>";
    echo "This is the Longitude : " . $_SESSION['long_deg'] . "<br>";
    echo "This is the Latitude : " . $_SESSION['lat_deg'] . "<br>";
    echo "This is the TimeZone : " . $_SESSION['timezone'] . "<br>";
*/
  }
} else {
  //echo "0 results";
}

     
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
      

      //putenv("PATH=$PATH:$swephsrc");

      // get LAST_PLANET planets and all house cusps
      //if (strlen($h_sys) != 1) { $h_sys = "p"; }

// For sunrise and sunset calculation start
// Calculation for Sunrise and Sunset

//*****************************

exec ("swetest -rise -hindu -b$utdatenow3 -p0  -geopos$my_longitude,$my_latitude", $sunout);

exec ("swetest -rise -hindu -b$utdatenow4 -p0  -geopos$my_longitude,$my_latitude", $sunout1);



$tmp_sunrise = explode('rise ', $sunout[1]);
$tmp_sunrise = $tmp_sunrise[1];
$tmp_sunrise = explode('set ', $tmp_sunrise);
$txt_sunrise = $tmp_sunrise[0];
$txt_sunset = $tmp_sunrise[1];

$txt_sunrise = strtotime($txt_sunrise);
$txt_sunset = strtotime($txt_sunset);

$txt_sunrise =  date('m/d/Y H:i:s', $txt_sunrise);
$txt_sunset =  date('m/d/Y H:i:s', $txt_sunset);



$sunrise = convertDateFromTimeZone($txt_sunrise, 'UTC', 'Asia/Calcutta','d-m-Y H:i:s');
$sunset = convertDateFromTimeZone($txt_sunset, 'UTC', 'Asia/Calcutta','d-m-Y H:i:s');


// Previous day sunrise details for comparing before sunrise birth


$tmp_sunrise1 = explode('rise ', $sunout1[1]);
$tmp_sunrise1 = $tmp_sunrise1[1];
$tmp_sunrise1 = explode('set ', $tmp_sunrise1);
$txt_sunrise1 = $tmp_sunrise1[0];
$txt_sunset1 = $tmp_sunrise1[1];


$txt_sunrise1 = strtotime($txt_sunrise1);
$txt_sunset1 = strtotime($txt_sunset1);

$txt_sunrise1 =  date('m/d/Y H:i:s', $txt_sunrise1);
$txt_sunset1 =  date('m/d/Y H:i:s', $txt_sunset1);



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


//echo $sunout;
// For sunrise and sunset calculation end

      //exec ("swetest -edir$sweph -b$utdatenow -ut$utnow -p0123456789DAttt -eswe -house$my_longitude,$my_latitude,$h_sys -flsj -g, -head", $out);

       //exec ("swetest -edir$sweph -b$utdatenow -ut$utnow -p0123456mt -eswe -house$my_longitude,$my_latitude,$h_sys -flsj -g, -head", $out);
       
       exec ("swetest -edir$sweph -b$utdatenow -ut$utnow -p0123456mt  -geopos$my_longitude,$my_latitude,$h_sys -fPlsj  -house -g, -head", $out);

       exec ("swetest  -$txt_ayana -b$utdatenow -ut$utnow  -house -g -head", $ayanaout);
    
    echo var_dump($out);   
       //echo shell_exec("swetest  -hindu -b$utdatenow -ut$utnow  -house -g -head") . "<br>";    

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
        $house_pos1[$key] = $row[2];

/*
        echo $key;
        echo "<br>";
        echo $planet1[$key];
        echo "<br>";
        echo $longitude1[$key];
        echo "<br>";
        echo $speed1[$key];
        echo "<br>";
        echo $house_pos1[$key];
        echo "<br>";
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

// Calculation for tabular ephemeris (all planets Sun - Pluto, Chiron, mean node, true node)\n\
// in one horizontal row, tab-separated, for 366 days. For each planet\n\
//  list longitude, latitude and geocentric distance.\n";

//exec ("swetest -edir$sweph -b$utdatenow  -p0123456mt  -geopos$my_longitude,$my_latitude,$h_sys -fTlbR  -house -g, -hor -n366 -roundsec -head", $366dout);
//exec ("swetest -edir$sweph -b$utdatenow -ut$utnow -p0123456mt  -geopos$my_longitude,$my_latitude,$h_sys -fTblR  -g, -n366 -head", $outall);

//echo var_dump($outall);
//swetest -b1.1.2016  -g -fTlbR -p0123456789Dmte -hor -n366 -roundsec


// Calculation for tabular ephemeris for 366 days ends
      
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

$tmp_Long_Ket = $_SESSION['tmp_Long_Rah'] + 180;
If ($tmp_Long_Ket > 360);
  {
    $_SESSION['tmp_Long_Ket'] = fmod($tmp_Long_Ket, 360);
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
$_SESSION['Tithi'] = Tithi($txt_Tithi);
/*echo "This is the Tithi on the day of birth : " . $_Session['Tithi'] . "<br>";*/

//echo DMS($_SESSION['tmp_Asc']);



/*Titithi Calculation Ends  */

$tmp_H2 = $longitude1[10] - $_SESSION['tmp_Ayana'];
$tmp_H3 = $longitude1[11] - $_SESSION['tmp_Ayana'];
$_SESSION['tmp_H4'] = $longitude1[12] - $_SESSION['tmp_Ayana'];
$tmp_H5 = $longitude1[13] - $_SESSION['tmp_Ayana'];
$tmp_H6 = $longitude1[14] - $_SESSION['tmp_Ayana'];
$_SESSION['tmp_H7'] = $longitude1[15] - $_SESSION['tmp_Ayana'];
$tmp_H8 = $longitude1[16] - $_SESSION['tmp_Ayana'];
$tmp_H9 = $longitude1[17] - $_SESSION['tmp_Ayana'];
$tmp_H10 = $longitude1[18] - $_SESSION['tmp_Ayana'];
$tmp_H11 = $longitude1[19] - $_SESSION['tmp_Ayana'];
$tmp_H12 = $longitude1[20] - $_SESSION['tmp_Ayana'];
$tmp_Asdt = $longitude1[21] - $_SESSION['tmp_Ayana'];
$_SESSION['tmp_MC'] = $longitude1[22] - $_SESSION['tmp_Ayana'];
$_SESSION['tmp_ARMC'] = $longitude1[23] - $_SESSION['tmp_Ayana'];
$_SESSION['tmp_Vertex'] = $longitude1[24] - $_SESSION['tmp_Ayana'];

/*
echo "This is Ascendant : " . $tmp_Asdt . "<br>";
echo "This is MC : " . $_SESSION['tmp_MC'] . "<br>";
echo "This is ARMC : " . $_SESSION['tmp_ARMC'] . "<br>";
echo "This is Vertex : " . $_SESSION['tmp_Vertex'] . "<br>";
echo "This is IV House IC : " . $_SESSION['tmp_H4'] . "<br>";
echo "This is Descendant VII House : " . $_SESSION['tmp_H7'] . "<br>";
*/
//*********End of MC Vertex Calculation *****************************

$_SESSION['tmp_Rasi_Asc'] = RasiNum($_SESSION['tmp_Asc']);
$_SESSION['tmp_Rasi_Sun'] = RasiNum($_SESSION['tmp_Long_Sun']);
$_SESSION['tmp_Rasi_Moon'] = RasiNum($_SESSION['tmp_Long_Moon']);
$_SESSION['tmp_Rasi_Mar'] = RasiNum($_SESSION['tmp_Long_Mar']);
$_SESSION['tmp_Rasi_Mer'] = RasiNum($_SESSION['tmp_Long_Mer']);
$_SESSION['tmp_Rasi_Jup'] = RasiNum($_SESSION['tmp_Long_Jup']);
$_SESSION['tmp_Rasi_Ven'] = RasiNum($_SESSION['tmp_Long_Ven']);
$_SESSION['tmp_Rasi_Sat'] = RasiNum($_SESSION['tmp_Long_Sat']);
$_SESSION['tmp_Rasi_Rah'] = RasiNum($_SESSION['tmp_Long_Rah']);
$_SESSION['tmp_Rasi_Ket'] = RasiNum($_SESSION['tmp_Long_Ket']);




// Navamsa Calculation Begins'

$ascNLong = DivPlanetLongitude($_SESSION['tmp_Asc'],9,1);
$_SESSION['ascNLong'] = fmod($ascNLong,360);

$sunNLong = DivPlanetLongitude($_SESSION['tmp_Long_Sun'],9,1);
$_SESSION['sunNLong'] = fmod($sunNLong,360);

$moonNLong = DivPlanetLongitude($_SESSION['tmp_Long_Moon'],9,1);
$_SESSION['moonNLong'] = fmod($moonNLong,360);

$marNLong = DivPlanetLongitude($_SESSION['tmp_Long_Mar'],9,1);
$_SESSION['marNLong'] = fmod($marNLong,360);


$merNLong = DivPlanetLongitude($_SESSION['tmp_Long_Mer'],9,1);
$_SESSION['merNLong'] = fmod($merNLong,360);


$jupNLong = DivPlanetLongitude($_SESSION['tmp_Long_Jup'],9,1);
$_SESSION['jupNLong'] = fmod($jupNLong,360);


$venNLong = DivPlanetLongitude($_SESSION['tmp_Long_Ven'],9,1);
$_SESSION['venNLong'] = fmod($venNLong,360);


$satNLong = DivPlanetLongitude($_SESSION['tmp_Long_Sat'],9,1);
$_SESSION['satNLong'] = fmod($satNLong,360);


$rahNLong = DivPlanetLongitude($_SESSION['tmp_Long_Rah'],9,1);
$_SESSION['rahNLong'] = fmod($rahNLong,360);


$ketNLong = DivPlanetLongitude($_SESSION['tmp_Long_Ket'],9,1);
$_SESSION['ketNLong'] = fmod($ketNLong,360);

// Rasi Number of Navamsa Longitudes

$tmp_Nava_Asc = RasiNum($_SESSION['ascNLong']);
$tmp_Nava_Sun = RasiNum($_SESSION['sunNLong']);
$tmp_Nava_Moon = RasiNum($_SESSION['moonNLong']);
$tmp_Nava_Mar = RasiNum($_SESSION['marNLong']);
$tmp_Nava_Mer = RasiNum($_SESSION['merNLong']);
$tmp_Nava_Jup = RasiNum($_SESSION['jupNLong']);
$tmp_Nava_Ven = RasiNum($_SESSION['venNLong']);
$tmp_Nava_Sat = RasiNum($_SESSION['satNLong']);
$tmp_Nava_Rah = RasiNum($_SESSION['rahNLong']);
$tmp_Nava_Ket = RasiNum($_SESSION['ketNLong']);

//End Navamsa Calculation '

/*
echo "This is Rahu : " . $_SESSION['tmp_Long_Rah'];
echo "<br>";
echo "This is Ketu : " . $_SESSION['tmp_Long_Ket'];
echo "<br>";
echo "This is Rahu Rasi No. : " . $_SESSION['tmp_Rasi_Rah'];
echo "<br>";
echo "This is Ketu Rasi No. : " . $_SESSION['tmp_Rasi_Ket'];
echo "<br>";
echo "This is Ketu Navamsa : " . $tmp_Nava_Ket;
echo "<br>";

echo "This is Speed Planet - Sun : " .$tmp_Speed_Sun;
echo "<br>";
echo "This is Speed Planet - Moon : " .$tmp_Speed_Moon;
 echo "<br>";
 echo "This is Speed Planet - Mer : " .$tmp_Speed_Mer;
 echo "<br>";
 echo "This is Speed Planet - Ven : " .$tmp_Speed_Ven;
 echo "<br>";
 echo "This is Speed Planet - Mar : " .$tmp_Speed_Mar;
 echo "<br>";
 echo "This is Speed Planet - Jup : " .$tmp_Speed_Jup;
 echo "<br>";
 echo "This is Speed Planet - Sat : " .$tmp_Speed_Sat;
 echo "<br>";
 echo "This is Speed Planet - Rah : " .$tmp_Speed_Rah;
 echo "<br>";


echo "This is Planet - Sun : " .$tmp_Long_Sun;
echo "<br>";
echo "This is Planet - Moon : " .$tmp_Long_Moon;
 echo "<br>";
 echo "This is Planet - Mer : " .$tmp_Long_Mer;
 echo "<br>";
 echo "This is Planet - Ven : " .$tmp_Long_Ven;
 echo "<br>";
 echo "This is Planet - Mar : " .$tmp_Long_Mar;
 echo "<br>";
 echo "This is Planet - Jup : " .$tmp_Long_Jup;
 echo "<br>";
 echo "This is Planet - Sat : " .$tmp_Long_Sat;
 echo "<br>";
 echo "This is Planet - Rah : " .$tmp_Long_Rah;
 echo "<br>";
 echo "This is Planet - Asc : " .$tmp_Asc;
 echo "<br>";


echo "<br>";echo "<br>";
echo "This is Rasi Number of Ascendant : " .$_SESSION['tmp_Rasi_Asc'];
echo "<br>";
echo "This is Rasi Number of Sun : " .$_SESSION['tmp_Rasi_Sun'];
echo "<br>";
echo "This is Rasi Number of Moon : " .$_SESSION['tmp_Rasi_Moon'];
echo "<br>";
echo "This is Rasi Number of Mar : " .$_SESSION['tmp_Rasi_Mar'];
echo "<br>";
echo "This is Rasi Number of Mer : " .$_SESSION['tmp_Rasi_Mer'];
echo "<br>";
echo "This is Rasi Number of Jup : " .$_SESSION['tmp_Rasi_Jup'];
echo "<br>";
echo "This is Rasi Number of Ven : " .$_SESSION['tmp_Rasi_Ven'];
echo "<br>";
echo "This is Rasi Number of Sat : " .$_SESSION['tmp_Rasi_Sat'];
echo "<br>";
echo "This is Rasi Number of Rah : " .$_SESSION['tmp_Rasi_Rah'];
echo "<br>";


echo "This is Namasa Planet - Sun : " .$sunNLong;
echo "<br>";
echo "This is Namasa Planet - Moon : " .$moonNLong;
 echo "<br>";
 echo "This is Namasa Planet - Mer : " .$merNLong;
 echo "<br>";
 echo "This is Namasa Planet - Ven : " .$venNLong;
 echo "<br>";
 echo "This is Namasa Planet - Mar : " .$marNLong;
 echo "<br>";
 echo "This is Namasa Planet - Jup : " .$jupNLong;
 echo "<br>";
 echo "This is Namasa Planet - Sat : " .$satNLong;
 echo "<br>";
 echo "This is Namasa Planet - Rah : " .$rahNLong;
 echo "<br>";
 echo "This is Namasa Planet - Ascendant : " .$ascNLong;
 echo "<br>";



echo "<br>";echo "<br>";
echo "This is Navamsa  Number of Ascendant : " .$tmp_Nava_Asc;
echo "<br>";
echo "This is Navamsa Number of Sun : " .$tmp_Nava_Sun;
echo "<br>";
echo "This is Navamsa Number of Moon : " .$tmp_Nava_Moon;
echo "<br>";
echo "This is Navamsa Number of Mar : " .$tmp_Nava_Mar;
echo "<br>";
echo "This is Navamsa Number of Mer : " .$tmp_Nava_Mer;
echo "<br>";
echo "This is Navamsa Number of Jup : " .$tmp_Nava_Jup;
echo "<br>";
echo "This is Navamsa Number of Ven : " .$tmp_Nava_Ven;
echo "<br>";
echo "This is Navamsa Number of Sat : " .$tmp_Nava_Sat;
echo "<br>";
echo "This is Navamsa Number of Rah : " .$tmp_Nava_Rah;
echo "<br>";
// Calculating Planet Longitudes substracting Ayanamsa Ends here.

*/
//Current Data Chart ends here

//**** }


//End of PHP Code 


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
		<!--<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />-->
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

table  {
  
  border-collapse: collapse;
   border: 0px solid red;
}

th, td {
  
  border: 1px solid blue;
  
}

table.a {
	table-layout: fixed;
	width: 30%;
}

table.d {
	table-layout: fixed;
	width: 70%;
}
table.d td{
	text-align: center;
}

table.b {
	table-layout: fixed;
	width: 100%;
	border: 0px;

}

table.b td{
	border: 0px;
}

table.c {
	table-layout: fixed;
	width: 100%;

}

table.c td{
	border: 1px solid black;
}


table.ctab {
  table-layout: fixed;
  width: 50%;

}

table.ctab td{
  width: 20%;
  border: 1px solid red;
  word-wrap:normal;

}
table.ctab tr{
  
  height: 70px;
   
}

table.dtab {
  table-layout: fixed;
  width: 70%;


}

table.dtab td{
  width: 15%;
  border: 1px solid blue;
  word-wrap:break-word;
}

table.etab {
  table-layout: fixed;
  width: 100%;


}

table.etab td{
  width: 20%;
  border: 1px solid blue;
}

table.ftab {
  table-layout: fixed;
  width: 70%;


}

table.ftab td{
  width: 20%;
  border: 1px solid blue;
}

table.ftab tr{
  height: 70px;
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

table.ef {
  border-collapse: collapse;
  margin-top: 0px;
  table-layout: fixed;
  width: 76%;
  /*border: 1px solid blue; */


}



table.ef td{
  /*border: 2px solid red; */
  /*width: 100px;*/
  border: 0px solid red;
}

table.ef td dt {
  /*border: 2px solid red; */
  color: white;
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
					<li class="active">
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
					<li class="">
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
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Basic Information
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Vimsottari Dasa
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									Ashtakavarga
								</a>

								<b class="arrow"></b>
							</li>

            <li class="">
                <a href="#">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Transit Diary
                </a>

                <b class="arrow"></b>
              </li>

							<li class="">
								<a href="#">
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
								Dashboard
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									overview &amp; Basic Information
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon fa fa-check green"></i>

									Welcome to
									<strong class="green">
										vbnrao Astro World
										
									</strong>
									<!--,
	лёгкий, многофункциональный и простой в использовании шаблон для админки на bootstrap 3.3.6. Загрузить исходники с <a href="https://github.com/bopoda/ace">github</a> (with minified ace js/css files).
-->
								</div>



<!-- Current Data Chart Display starts -->
<!--
						<div class="page-header">
							<h1>
								Natal Data
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Basic Information
								</small>
							</h1>
						</div><!-- /.page-header -->

<!--<TABLE class="a"> -->

<!-- Option for Ayanamsha starts here -->
<div class="row">
<div class="col-xs-4" align="right">
        <h4 class="pink">
                  Select here to change Ayanamsha
                  <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
                </h4>
</div>
<div class="col-xs-2">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <select class="chosen-select form-control" id="vbn_ayana" data-placeholder="Choose an Ayanamsha..." name="vbn_ayana" size="1">
          <?php
          
          echo "<option value='ay1' ";
          if ($txt_ayana == "ay1"){ echo " selected"; }
          echo "> Lahiri </option>";

          echo "<option value='ay3' ";
          if ($txt_ayana == "ay3"){ echo " selected"; }
          echo "> Raman </option>";

          echo "<option value='ay5' ";
          if ($txt_ayana == "ay5"){ echo " selected"; }
          echo "> Krishna Moorthy (KP) </option>";
          ?>
        </select>


</div>
<div class="col-xs-6">
        <input type="hidden" name="txt_ayana_submitted" value="TRUE">
        <div class="form-group right">
      <input type="submit" id="submit" name="Submit" value="Select" class="width-5 pull-center btn btn-sm btn-primary"> 
    </div>
      </form>
</INPUT>
</div>

</div>

<!-- Option for Ayanamsha ends here -->

<!--<table id="simple-table" class="table  table-bordered table-hover" width="50%">-->
<div class="row">
<div class="col-xs-12 col-sm-2"></div>	
<div class="col-xs-12 col-sm-6 widget-container-col" id="widget-container-col-2">
											<div class="widget-box widget-color-blue" id="widget-box-2">
												<div class="widget-header">
													<h5 class="widget-title bigger lighter">
														<i class="ace-icon fa fa-table"></i>
														Basic Information of Current Time Chart
													</h5>
													
													<div class="widget-toolbar widget-toolbar-light no-border">
														<select id="simple-colorpicker-1" class="hide">
															<option selected="" data-class="blue" value="#307ECC">#307ECC</option>
															<option data-class="blue2" value="#5090C1">#5090C1</option>
															<option data-class="blue3" value="#6379AA">#6379AA</option>
															<option data-class="green" value="#82AF6F">#82AF6F</option>
															<option data-class="green2" value="#2E8965">#2E8965</option>
															<option data-class="green3" value="#5FBC47">#5FBC47</option>
															<option data-class="red" value="#E2755F">#E2755F</option>
															<option data-class="red2" value="#E04141">#E04141</option>
															<option data-class="red3" value="#D15B47">#D15B47</option>
															<option data-class="orange" value="#FFC657">#FFC657</option>
															<option data-class="purple" value="#7E6EB0">#7E6EB0</option>
															<option data-class="pink" value="#CE6F9E">#CE6F9E</option>
															<option data-class="dark" value="#404040">#404040</option>
															<option data-class="grey" value="#848484">#848484</option>
															<option data-class="default" value="#EEE">#EEE</option>
														</select>
													</div>
												</div>

												<div class="widget-body">
													<div class="widget-main no-padding">
														<table class="table table-striped table-bordered table-hover">

<tbody>
<tr>
<td>Today's Date : </td><td><?php echo $_SESSION['dob'] ?></td>
</tr>
<tr>
<td>Current Time : </td><td><?php echo $_SESSION['tob'] ?></td>
</tr>
<tr>
<td>Today's Tithi : </td><td><?php echo $_SESSION['Tithi'] ?></td>
</tr>
<tr>
<td>Default City : </td><td><?php echo $_SESSION['default_city'] ?></td>
</tr>
<tr>
<td>Longitude : </td><td><?php echo $_SESSION['long_deg'] ?></td>
</tr>
<tr>
<td>Latitude : </td><td><?php echo $_SESSION['lat_deg'] ?></td>
</tr>
<tr>
<td>Time Zone : </td><td><?php echo $_SESSION['timezone'] ?></td>
</tr>
<tr>
<td>Ayanamsha : </td><td><?php echo $_SESSION['tmpAyana'] ?></td>
</tr>
<tr>
<td>Sunrise : </td><td><?php echo $_SESSION['actual_Sunrise'] ?></td>
</tr>
<tr>
<td>Sunset : </td><td><?php echo $_SESSION['actual_Sunset'] ?></td>
</tr>

</tbody>
</TABLE>
					</div>
				</div>
			</div>
		</div><!-- /.span -->
	<div class="col-xs-12 col-sm-4"></div>	
	</div><!-- /.row -->

<br>
<br>
****************

****************
<br>
<br>
<table class="ctab" align="center">
<tr>
<td bgcolor="green">Transit-1
<table class="dtab" align="right">
<tr>
<td bgcolor="white">Natal-1
</td>
</tr>
</table>
</td>
<td bgcolor="green">Transit-2
<table class="etab">
<tr>
<td width="auto" bgcolor="white">Natal-2
</td>
</tr>
</table>
</td>
<td bgcolor="green">Transit-3
<table class="etab">
<tr>
<td width="auto" bgcolor="white">Natal-3
</td>
</tr>
</table>
</td>
<td bgcolor="green">Transit-4 mercury 
<table class="dtab" align="left">
<tr>
<td bgcolor="white">Natal-4
</tr>
</table>

</td>
</tr>
<tr>
<td bgcolor="green">Transit-5 mercury 
<table class="ftab" align="right">
<tr>
<td bgcolor="white">Natal-5
</tr>
</table>

<td colspan="2" rowspan="2"><td>8</td>
</tr>
<tr>
<td>9</td><td>12</td>
</tr>
<tr>
<td>13</td><td>14</td><td>15</td><td>16</td>
</tr>

</table>

<br>
<br>

<table class="b" align="center">
<tr align="center">
<td>
<!-- Rasi Chart display start -->

<table class="c"  align="center">
<tr align="center">
<?php
If ($_SESSION['tmp_Rasi_Asc'] == 1)
{
  $bhava1 = 1;
  $bhava2 = 2;
  $bhava3 = 3;
  $bhava4 = 4;
  $bhava5 = 5;
  $bhava6 = 6;
  $bhava7 = 7;
  $bhava8 = 8;
  $bhava9 = 9;
  $bhava10= 10;
  $bhava11= 11;
  $bhava12= 12;
}

If ($_SESSION['tmp_Rasi_Asc'] == 2)
{
  $bhava1 = 12;
  $bhava2 = 1;
  $bhava3 = 2;
  $bhava4 = 3;
  $bhava5 = 4;
  $bhava6 = 5;
  $bhava7 = 6;
  $bhava8 = 7;
  $bhava9 = 8;
  $bhava10= 9;
  $bhava11= 10;
  $bhava12= 11;
}
If ($_SESSION['tmp_Rasi_Asc'] == 3)
{
  $bhava1 = 11;
  $bhava2 = 12;
  $bhava3 = 1;
  $bhava4 = 2;
  $bhava5 = 3;
  $bhava6 = 4;
  $bhava7 = 5;
  $bhava8 = 6;
  $bhava9 = 7;
  $bhava10= 8;
  $bhava11= 9;
  $bhava12= 10;
}
If ($_SESSION['tmp_Rasi_Asc'] == 4)
{
  $bhava1 = 10;
  $bhava2 = 11;
  $bhava3 = 12;
  $bhava4 = 1;
  $bhava5 = 2;
  $bhava6 = 3;
  $bhava7 = 4;
  $bhava8 = 5;
  $bhava9 = 6;
  $bhava10= 7;
  $bhava11= 8;
  $bhava12= 9;
}
If ($_SESSION['tmp_Rasi_Asc'] == 5)
{
  $bhava1 = 9;
  $bhava2 = 10;
  $bhava3 = 11;
  $bhava4 = 12;
  $bhava5 = 1;
  $bhava6 = 2;
  $bhava7 = 3;
  $bhava8 = 4;
  $bhava9 = 5;
  $bhava10= 6;
  $bhava11= 7;
  $bhava12= 8;
}
If ($_SESSION['tmp_Rasi_Asc'] == 6)
{
  $bhava1 = 8;
  $bhava2 = 9;
  $bhava3 = 10;
  $bhava4 = 11;
  $bhava5 = 12;
  $bhava6 = 1;
  $bhava7 = 2;
  $bhava8 = 3;
  $bhava9 = 4;
  $bhava10= 5;
  $bhava11= 6;
  $bhava12= 7;
}
If ($_SESSION['tmp_Rasi_Asc'] == 7)
{
  $bhava1 = 7;
  $bhava2 = 8;
  $bhava3 = 9;
  $bhava4 = 10;
  $bhava5 = 11;
  $bhava6 = 12;
  $bhava7 = 1;
  $bhava8 = 2;
  $bhava9 = 3;
  $bhava10= 4;
  $bhava11= 5;
  $bhava12= 6;
}
If ($_SESSION['tmp_Rasi_Asc'] == 8)
{
  $bhava1 = 6;
  $bhava2 = 7;
  $bhava3 = 8;
  $bhava4 = 9;
  $bhava5 = 10;
  $bhava6 = 11;
  $bhava7 = 12;
  $bhava8 = 1;
  $bhava9 = 2;
  $bhava10= 3;
  $bhava11= 4;
  $bhava12= 5;
}
If ($_SESSION['tmp_Rasi_Asc'] == 9)
{
  $bhava1 = 5;
  $bhava2 = 6;
  $bhava3 = 7;
  $bhava4 = 8;
  $bhava5 = 9;
  $bhava6 = 10;
  $bhava7 = 11;
  $bhava8 = 12;
  $bhava9 = 1;
  $bhava10= 2;
  $bhava11= 3;
  $bhava12= 4;
}
If ($_SESSION['tmp_Rasi_Asc'] == 10)
{
  $bhava1 = 4;
  $bhava2 = 5;
  $bhava3 = 6;
  $bhava4 = 7;
  $bhava5 = 8;
  $bhava6 = 9;
  $bhava7 = 10;
  $bhava8 = 11;
  $bhava9 = 12;
  $bhava10= 1;
  $bhava11= 2;
  $bhava12= 3;
}
If ($_SESSION['tmp_Rasi_Asc'] == 11)
{
  $bhava1 = 3;
  $bhava2 = 4;
  $bhava3 = 5;
  $bhava4 = 6;
  $bhava5 = 7;
  $bhava6 = 8;
  $bhava7 = 9;
  $bhava8 = 10;
  $bhava9 = 11;
  $bhava10= 12;
  $bhava11= 1;
  $bhava12= 2;
}
If ($_SESSION['tmp_Rasi_Asc'] == 12)
{
  $bhava1 = 2;
  $bhava2 = 3;
  $bhava3 = 4;
  $bhava4 = 5;
  $bhava5 = 6;
  $bhava6 = 7;
  $bhava7 = 8;
  $bhava8 = 9;
  $bhava9 = 10;
  $bhava10= 11;
  $bhava11= 12;
  $bhava12= 1;
}

?>
<!-- programming of bhava starts here --->




<?php

$txt12= " ";

If ($_SESSION['tmp_Rasi_Asc'] == 12)
{
  $txt12= $txt12."Asc ";
}
If ($_SESSION['tmp_Rasi_Sun'] == 12)
{
  $txt12= $txt12."Sun ";
}
If ($_SESSION['tmp_Rasi_Moon'] == 12)
{
  $txt12= $txt12."Moon ";
}

If ($_SESSION['tmp_Rasi_Mar'] == 12)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txt12= $txt12."Mar ";
      }
    else
    {
      $txt12= $txt12."Mar(R)";
    }
}

If ($_SESSION['tmp_Rasi_Mer'] == 12)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txt12= $txt12."Mer ";
      }
    else
    {
      $txt12= $txt12."Mer(R)";
    }
}

If ($_SESSION['tmp_Rasi_Jup'] == 12)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txt12= $txt12."Jup ";
      }
    else
    {
      $txt12= $txt12."Jup(R)";
    }
}

If ($_SESSION['tmp_Rasi_Ven'] == 12)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txt12= $txt12."Ven ";
      }
    else
    {
      $txt12= $txt12."Ven(R)";
    }
}

If ($_SESSION['tmp_Rasi_Sat'] == 12)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txt12= $txt12."Sat ";
      }
    else
    {
      $txt12= $txt12."Sat(R)";
    }
}

If ($_SESSION['tmp_Rasi_Rah'] == 12)
{
  $txt12= $txt12."Rah ";
}

If ($_SESSION['tmp_Rasi_Ket'] == 12)
{
  $txt12= $txt12."Ket ";
}


If ($_SESSION['tmp_Rasi_Asc'] == 12 or $_SESSION['tmp_Rasi_Asc'] == 3 or $_SESSION['tmp_Rasi_Asc'] == 6 or $_SESSION['tmp_Rasi_Asc'] == 9)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava12;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt12;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 4 or $_SESSION['tmp_Rasi_Asc'] == 8)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava12;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt12;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 2 or $_SESSION['tmp_Rasi_Asc'] == 7 or $_SESSION['tmp_Rasi_Asc'] == 10)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava12;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt12;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava12;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt12;
    echo '</td></tr><tr></tr><tr></tr></table>';

  }
echo '</td>';
?>


<?php

$txt1= " ";

If ($_SESSION['tmp_Rasi_Asc'] == 1)
{
  $txt1= $txt1."Asc ";
}
If ($_SESSION['tmp_Rasi_Sun'] == 1)
{
  $txt1= $txt1."Sun ";
}
If ($_SESSION['tmp_Rasi_Moon'] == 1)
{
  $txt1= $txt1."Moon ";
}

If ($_SESSION['tmp_Rasi_Mar'] == 1)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txt1= $txt1."Mar ";
      }
    else
    {
      $txt1= $txt1."Mar(R)";
    }
}

If ($_SESSION['tmp_Rasi_Mer'] == 1)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txt1= $txt1."Mer ";
      }
    else
    {
      $txt1= $txt1."Mer(R)";
    }
}

If ($_SESSION['tmp_Rasi_Jup'] == 1)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txt1= $txt1."Jup ";
      }
    else
    {
      $txt1= $txt1."Jup(R)";
    }
}

If ($_SESSION['tmp_Rasi_Ven'] == 1)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txt1= $txt1."Ven ";
      }
    else
    {
      $txt1= $txt1."Ven(R)";
    }
}

If ($_SESSION['tmp_Rasi_Sat'] == 1)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txt1= $txt1."Sat ";
      }
    else
    {
      $txt1= $txt1."Sat(R)";
    }
}

If ($_SESSION['tmp_Rasi_Rah'] == 1)
{
  $txt1= $txt1."Rah ";
}

If ($_SESSION['tmp_Rasi_Ket'] == 1)
{
  $txt1= $txt1."Ket ";
}


If ($_SESSION['tmp_Rasi_Asc'] == 1 or $_SESSION['tmp_Rasi_Asc'] == 4 or $_SESSION['tmp_Rasi_Asc'] == 7 or $_SESSION['tmp_Rasi_Asc'] == 10)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava1;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt1;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 5 or $_SESSION['tmp_Rasi_Asc'] == 9)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava1;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt1;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 3 or $_SESSION['tmp_Rasi_Asc'] == 8 or $_SESSION['tmp_Rasi_Asc'] == 11)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava1;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt1;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava1;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt1;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }

echo '</td>';
?>


<?php

$txt2= " ";

If ($_SESSION['tmp_Rasi_Asc'] == 2)
{
  $txt2= $txt2."Asc ";
}
If ($_SESSION['tmp_Rasi_Sun'] == 2)
{
  $txt2= $txt2."Sun ";
}
If ($_SESSION['tmp_Rasi_Moon'] == 2)
{
  $txt2= $txt2."Moon ";
}

If ($_SESSION['tmp_Rasi_Mar'] == 2)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txt2= $txt2."Mar ";
      }
    else
    {
      $txt2= $txt2."Mar(R)";
    }
}

If ($_SESSION['tmp_Rasi_Mer'] == 2)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txt2= $txt2."Mer ";
      }
    else
    {
      $txt2= $txt2."Mer(R)";
    }
}

If ($_SESSION['tmp_Rasi_Jup'] == 2)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txt2= $txt2."Jup ";
      }
    else
    {
      $txt2= $txt2."Jup(R)";
    }
}

If ($_SESSION['tmp_Rasi_Ven'] == 2)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txt2= $txt2."Ven ";
      }
    else
    {
      $txt2= $txt2."Ven(R)";
    }
}

If ($_SESSION['tmp_Rasi_Sat'] == 2)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txt2= $txt2."Sat ";
      }
    else
    {
      $txt2= $txt2."Sat(R)";
    }
}

If ($_SESSION['tmp_Rasi_Rah'] == 2)
{
  $txt2= $txt2."Rah ";
}

If ($_SESSION['tmp_Rasi_Ket'] == 2)
{
  $txt2= $txt2."Ket ";
}


If ($_SESSION['tmp_Rasi_Asc'] == 2 or $_SESSION['tmp_Rasi_Asc'] == 5 or $_SESSION['tmp_Rasi_Asc'] == 8 or $_SESSION['tmp_Rasi_Asc'] == 11)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava2;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt2;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 6 or $_SESSION['tmp_Rasi_Asc'] == 10)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava2;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt2;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 4 or $_SESSION['tmp_Rasi_Asc'] == 9 or $_SESSION['tmp_Rasi_Asc'] == 12)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava2;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt2;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava2;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt2;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }

echo '</td>';
?>



<?php

$txt3= " ";

If ($_SESSION['tmp_Rasi_Asc'] == 3)
{
  $txt3= $txt3."Asc ";
}
If ($_SESSION['tmp_Rasi_Sun'] == 3)
{
  $txt3= $txt3."Sun ";
}
If ($_SESSION['tmp_Rasi_Moon'] == 3)
{
  $txt3= $txt3."Moon ";
}

If ($_SESSION['tmp_Rasi_Mar'] == 3)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txt3= $txt3."Mar ";
      }
    else
    {
      $txt3= $txt3."Mar(R)";
    }
}

If ($_SESSION['tmp_Rasi_Mer'] == 3)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txt3= $txt3."Mer ";
      }
    else
    {
      $txt3= $txt3."Mer(R)";
    }
}

If ($_SESSION['tmp_Rasi_Jup'] == 3)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txt3= $txt3."Jup ";
      }
    else
    {
      $txt3= $txt3."Jup(R)";
    }
}

If ($_SESSION['tmp_Rasi_Ven'] == 3)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txt3= $txt3."Ven ";
      }
    else
    {
      $txt3= $txt3."Ven(R)";
    }
}

If ($_SESSION['tmp_Rasi_Sat'] == 3)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txt3= $txt3."Sat ";
      }
    else
    {
      $txt3= $txt3."Sat(R)";
    }
}

If ($_SESSION['tmp_Rasi_Rah'] == 3)
{
  $txt3= $txt3."Rah ";
}

If ($_SESSION['tmp_Rasi_Ket'] == 3)
{
  $txt3= $txt3."Ket ";
}

//<?php
If ($_SESSION['tmp_Rasi_Asc'] == 3 or $_SESSION['tmp_Rasi_Asc'] == 6 or $_SESSION['tmp_Rasi_Asc'] == 9 or $_SESSION['tmp_Rasi_Asc'] == 12)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava3;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt3;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 7 or $_SESSION['tmp_Rasi_Asc'] == 11)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava3;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt3;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 5 or $_SESSION['tmp_Rasi_Asc'] == 10 or $_SESSION['tmp_Rasi_Asc'] == 1)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava3;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt3;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava3;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt3;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }

echo '</td>';

?>



</tr>
<!-- 2nd Row starts -->

<tr align="center">

<?php

$txt11= " ";

If ($_SESSION['tmp_Rasi_Asc'] == 11)
{
  $txt11= $txt11."Asc ";
}
If ($_SESSION['tmp_Rasi_Sun'] == 11)
{
  $txt11= $txt11."Sun ";
}
If ($_SESSION['tmp_Rasi_Moon'] == 11)
{
  $txt11= $txt11."Moon ";
}

If ($_SESSION['tmp_Rasi_Mar'] == 11)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txt11= $txt11."Mar ";
      }
    else
    {
      $txt11= $txt11."Mar(R)";
    }
}

If ($_SESSION['tmp_Rasi_Mer'] == 11)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txt11= $txt11."Mer ";
      }
    else
    {
      $txt11= $txt11."Mer(R)";
    }
}

If ($_SESSION['tmp_Rasi_Jup'] == 11)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txt11= $txt11."Jup ";
      }
    else
    {
      $txt11= $txt11."Jup(R)";
    }
}

If ($_SESSION['tmp_Rasi_Ven'] == 11)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txt11= $txt11."Ven ";
      }
    else
    {
      $txt11= $txt11."Ven(R)";
    }
}

If ($_SESSION['tmp_Rasi_Sat'] == 11)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txt11= $txt11."Sat ";
      }
    else
    {
      $txt11= $txt11."Sat(R)";
    }
}

If ($_SESSION['tmp_Rasi_Rah'] == 11)
{
  $txt11= $txt11."Rah ";
}

If ($_SESSION['tmp_Rasi_Ket'] == 11)
{
  $txt11= $txt11."Ket ";
}

If ($_SESSION['tmp_Rasi_Asc'] == 2 or $_SESSION['tmp_Rasi_Asc'] == 5 or $_SESSION['tmp_Rasi_Asc'] == 8 or $_SESSION['tmp_Rasi_Asc'] == 11)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava11;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt11;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 3 or $_SESSION['tmp_Rasi_Asc'] == 7)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava11;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt11;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 1 or $_SESSION['tmp_Rasi_Asc'] == 6 or $_SESSION['tmp_Rasi_Asc'] == 9)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava11;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt11;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava11;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt11;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }

echo '</td>';


echo '<td colspan="2" rowspan="2" bgcolor="#99DDFF">Current Chart<br>';
//echo $_SESSION['name'];
//echo '<br>';
echo $_SESSION['dob'];
echo '<br>';
echo $_SESSION['tob'];
echo '<br>';
echo $_SESSION['tmpAyana'];
echo '<br>';

echo '</td>';

//<?php

?>

<?php

$txt4= " ";

If ($_SESSION['tmp_Rasi_Asc'] == 4)
{
  $txt4= $txt4."Asc ";
}
If ($_SESSION['tmp_Rasi_Sun'] == 4)
{
  $txt4= $txt4."Sun ";
}
If ($_SESSION['tmp_Rasi_Moon'] == 4)
{
  $txt4= $txt4."Moon ";
}

If ($_SESSION['tmp_Rasi_Mar'] == 4)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txt4= $txt4."Mar ";
      }
    else
    {
      $txt4= $txt4."Mar(R)";
    }
}

If ($_SESSION['tmp_Rasi_Mer'] == 4)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txt4= $txt4."Mer ";
      }
    else
    {
      $txt4= $txt4."Mer(R)";
    }
}

If ($_SESSION['tmp_Rasi_Jup'] == 4)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txt4= $txt4."Jup ";
      }
    else
    {
      $txt4= $txt4."Jup(R)";
    }
}

If ($_SESSION['tmp_Rasi_Ven'] == 4)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txt4= $txt4."Ven ";
      }
    else
    {
      $txt4= $txt4."Ven(R)";
    }
}

If ($_SESSION['tmp_Rasi_Sat'] == 4)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txt4= $txt4."Sat ";
      }
    else
    {
      $txt4= $txt4."Sat(R)";
    }
}

If ($_SESSION['tmp_Rasi_Rah'] == 4)
{
  $txt4= $txt4."Rah ";
}

If ($_SESSION['tmp_Rasi_Ket'] == 4)
{
  $txt4= $txt4."Ket ";
}

If ($_SESSION['tmp_Rasi_Asc'] == 1 or $_SESSION['tmp_Rasi_Asc'] == 4 or $_SESSION['tmp_Rasi_Asc'] == 7 or $_SESSION['tmp_Rasi_Asc'] == 10)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava4;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt4;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 12 or $_SESSION['tmp_Rasi_Asc'] == 8)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava4;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt4;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 11 or $_SESSION['tmp_Rasi_Asc'] == 6 or $_SESSION['tmp_Rasi_Asc'] == 2)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava4;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt4;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava4;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt4;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }

?>
</td>
</tr>
<!-- 3rd row starts -->

<tr align="center">


<?php

$txt10= " ";

If ($_SESSION['tmp_Rasi_Asc'] == 10)
{
  $txt10= $txt10."Asc ";
}
If ($_SESSION['tmp_Rasi_Sun'] == 10)
{
  $txt10= $txt10."Sun ";
}
If ($_SESSION['tmp_Rasi_Moon'] == 10)
{
  $txt10= $txt10."Moon ";
}

If ($_SESSION['tmp_Rasi_Mar'] == 10)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txt10= $txt10."Mar ";
      }
    else
    {
      $txt10= $txt10."Mar(R)";
    }
}

If ($_SESSION['tmp_Rasi_Mer'] == 10)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txt10= $txt10."Mer ";
      }
    else
    {
      $txt10= $txt10."Mer(R)";
    }
}

If ($_SESSION['tmp_Rasi_Jup'] == 10)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txt10= $txt10."Jup ";
      }
    else
    {
      $txt10= $txt10."Jup(R)";
    }
}

If ($_SESSION['tmp_Rasi_Ven'] == 10)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txt10= $txt10."Ven ";
      }
    else
    {
      $txt10= $txt10."Ven(R)";
    }
}

If ($_SESSION['tmp_Rasi_Sat'] == 10)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txt10= $txt10."Sat ";
      }
    else
    {
      $txt10= $txt10."Sat(R)";
    }
}

If ($_SESSION['tmp_Rasi_Rah'] == 10)
{
  $txt10= $txt10."Rah ";
}

If ($_SESSION['tmp_Rasi_Ket'] == 10)
{
  $txt10= $txt10."Ket ";
}

If ($_SESSION['tmp_Rasi_Asc'] == 1 or $_SESSION['tmp_Rasi_Asc'] == 4 or $_SESSION['tmp_Rasi_Asc'] == 7 or $_SESSION['tmp_Rasi_Asc'] == 10)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava10;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt10;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 2 or $_SESSION['tmp_Rasi_Asc'] == 6)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava10;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt10;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 8 or $_SESSION['tmp_Rasi_Asc'] == 12 or $_SESSION['tmp_Rasi_Asc'] == 5)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava10;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt10;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava10;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt10;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }

echo '</td>';
?>




<?php

$txt5= " ";

If ($_SESSION['tmp_Rasi_Asc'] == 5)
{
  $txt5= $txt5."Asc ";
}
If ($_SESSION['tmp_Rasi_Sun'] == 5)
{
  $txt5= $txt5."Sun ";
}
If ($_SESSION['tmp_Rasi_Moon'] == 5)
{
  $txt5= $txt5."Moon ";
}

If ($_SESSION['tmp_Rasi_Mar'] == 5)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txt5= $txt5."Mar ";
      }
    else
    {
      $txt5= $txt5."Mar(R)";
    }
}

If ($_SESSION['tmp_Rasi_Mer'] == 5)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txt5= $txt5."Mer ";
      }
    else
    {
      $txt5= $txt5."Mer(R)";
    }
}

If ($_SESSION['tmp_Rasi_Jup'] == 5)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txt5= $txt5."Jup ";
      }
    else
    {
      $txt5= $txt5."Jup(R)";
    }
}

If ($_SESSION['tmp_Rasi_Ven'] == 5)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txt5= $txt5."Ven ";
      }
    else
    {
      $txt5= $txt5."Ven(R)";
    }
}

If ($_SESSION['tmp_Rasi_Sat'] == 5)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txt5= $txt5."Sat ";
      }
    else
    {
      $txt5= $txt5."Sat(R)";
    }
}

If ($_SESSION['tmp_Rasi_Rah'] == 5)
{
  $txt5= $txt5."Rah ";
}

If ($_SESSION['tmp_Rasi_Ket'] == 5)
{
  $txt5= $txt5."Ket ";
}

If ($_SESSION['tmp_Rasi_Asc'] == 2 or $_SESSION['tmp_Rasi_Asc'] == 5 or $_SESSION['tmp_Rasi_Asc'] == 8 or $_SESSION['tmp_Rasi_Asc'] == 11)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava5;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt5;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 1 or $_SESSION['tmp_Rasi_Asc'] == 9)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava5;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt5;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 7 or $_SESSION['tmp_Rasi_Asc'] == 12 or $_SESSION['tmp_Rasi_Asc'] == 3)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava5;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt5;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava5;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
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

$txt9= " ";

If ($_SESSION['tmp_Rasi_Asc'] == 9)
{
  $txt9= $txt9."Asc ";
}
If ($_SESSION['tmp_Rasi_Sun'] == 9)
{
  $txt9= $txt9."Sun ";
}
If ($_SESSION['tmp_Rasi_Moon'] == 9)
{
  $txt9= $txt9."Moon ";
}

If ($_SESSION['tmp_Rasi_Mar'] == 9)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txt9= $txt9."Mar ";
      }
    else
    {
      $txt9= $txt9."Mar(R)";
    }
}

If ($_SESSION['tmp_Rasi_Mer'] == 9)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txt9= $txt9."Mer ";
      }
    else
    {
      $txt9= $txt9."Mer(R)";
    }
}

If ($_SESSION['tmp_Rasi_Jup'] == 9)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txt9= $txt9."Jup ";
      }
    else
    {
      $txt9= $txt9."Jup(R)";
    }
}

If ($_SESSION['tmp_Rasi_Ven'] == 9)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txt9= $txt9."Ven ";
      }
    else
    {
      $txt9= $txt9."Ven(R)";
    }
}

If ($_SESSION['tmp_Rasi_Sat'] == 9)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txt9= $txt9."Sat ";
      }
    else
    {
      $txt9= $txt9."Sat(R)";
    }
}

If ($_SESSION['tmp_Rasi_Rah'] == 9)
{
  $txt9= $txt9."Rah ";
}

If ($_SESSION['tmp_Rasi_Ket'] == 9)
{
  $txt9= $txt9."Ket ";
}

If ($_SESSION['tmp_Rasi_Asc'] == 12 or $_SESSION['tmp_Rasi_Asc'] == 3 or $_SESSION['tmp_Rasi_Asc'] == 6 or $_SESSION['tmp_Rasi_Asc'] == 9)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava9;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt9;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 1 or $_SESSION['tmp_Rasi_Asc'] == 5)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava9;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt9;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 11 or $_SESSION['tmp_Rasi_Asc'] == 4 or $_SESSION['tmp_Rasi_Asc'] == 7)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava9;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt9;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava9;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt9;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }

echo '</td>';
?>


<?php

$txt8= " ";

If ($_SESSION['tmp_Rasi_Asc'] == 8)
{
  $txt8= $txt8."Asc ";
}
If ($_SESSION['tmp_Rasi_Sun'] == 8)
{
  $txt8= $txt8."Sun ";
}
If ($_SESSION['tmp_Rasi_Moon'] == 8)
{
  $txt8= $txt8."Moon ";
}

If ($_SESSION['tmp_Rasi_Mar'] == 8)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txt8= $txt8."Mar ";
      }
    else
    {
      $txt8= $txt8."Mar(R)";
    }
}

If ($_SESSION['tmp_Rasi_Mer'] == 8)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txt8= $txt8."Mer ";
      }
    else
    {
      $txt8= $txt8."Mer(R)";
    }
}

If ($_SESSION['tmp_Rasi_Jup'] == 8)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txt8= $txt8."Jup ";
      }
    else
    {
      $txt8= $txt8."Jup(R)";
    }
}

If ($_SESSION['tmp_Rasi_Ven'] == 8)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txt8= $txt8."Ven ";
      }
    else
    {
      $txt8= $txt8."Ven(R)";
    }
}

If ($_SESSION['tmp_Rasi_Sat'] == 8)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txt8= $txt8."Sat ";
      }
    else
    {
      $txt8= $txt8."Sat(R)";
    }
}

If ($_SESSION['tmp_Rasi_Rah'] == 8)
{
  $txt8= $txt8."Rah ";
}

If ($_SESSION['tmp_Rasi_Ket'] == 8)
{
  $txt8= $txt8."Ket ";
}

If ($_SESSION['tmp_Rasi_Asc'] == 2 or $_SESSION['tmp_Rasi_Asc'] == 5 or $_SESSION['tmp_Rasi_Asc'] == 8 or $_SESSION['tmp_Rasi_Asc'] == 11)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava8;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt8;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 12 or $_SESSION['tmp_Rasi_Asc'] == 4)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava8;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt8;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 10 or $_SESSION['tmp_Rasi_Asc'] == 3 or $_SESSION['tmp_Rasi_Asc'] == 6)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava8;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt8;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava8;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt8;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }

echo '</td>';
?>


<?php

$txt7= " ";

If ($_SESSION['tmp_Rasi_Asc'] == 7)
{
  $txt7= $txt7."Asc ";
}
If ($_SESSION['tmp_Rasi_Sun'] == 7)
{
  $txt7= $txt7."Sun ";
}
If ($_SESSION['tmp_Rasi_Moon'] == 7)
{
  $txt7= $txt7."Moon ";
}

If ($_SESSION['tmp_Rasi_Mar'] == 7)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txt7= $txt7."Mar ";
      }
    else
    {
      $txt7= $txt7."Mar(R)";
    }
}

If ($_SESSION['tmp_Rasi_Mer'] == 7)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txt7= $txt7."Mer ";
      }
    else
    {
      $txt7= $txt7."Mer(R)";
    }
}

If ($_SESSION['tmp_Rasi_Jup'] == 7)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txt7= $txt7."Jup ";
      }
    else
    {
      $txt7= $txt7."Jup(R)";
    }
}

If ($_SESSION['tmp_Rasi_Ven'] == 7)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txt7= $txt7."Ven ";
      }
    else
    {
      $txt7= $txt7."Ven(R)";
    }
}

If ($_SESSION['tmp_Rasi_Sat'] == 7)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txt7= $txt7."Sat ";
      }
    else
    {
      $txt7= $txt7."Sat(R)";
    }
}

If ($_SESSION['tmp_Rasi_Rah'] == 7)
{
  $txt7= $txt7."Rah ";
}

If ($_SESSION['tmp_Rasi_Ket'] == 7)
{
  $txt7= $txt7."Ket ";
}

If ($_SESSION['tmp_Rasi_Asc'] == 1 or $_SESSION['tmp_Rasi_Asc'] == 4 or $_SESSION['tmp_Rasi_Asc'] == 7 or $_SESSION['tmp_Rasi_Asc'] == 10)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava7;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt7;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 3 or $_SESSION['tmp_Rasi_Asc'] == 11)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava7;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt7;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 9 or $_SESSION['tmp_Rasi_Asc'] == 2 or $_SESSION['tmp_Rasi_Asc'] == 5)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava7;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt7;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava7;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt7;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }

echo '</td>';
?>


<?php

$txt6= " ";

If ($_SESSION['tmp_Rasi_Asc'] == 6)
{
  $txt6= $txt6."Asc ";
}
If ($_SESSION['tmp_Rasi_Sun'] == 6)
{
  $txt6= $txt6."Sun ";
}
If ($_SESSION['tmp_Rasi_Moon'] == 6)
{
  $txt6= $txt6."Moon ";
}

If ($_SESSION['tmp_Rasi_Mar'] == 6)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txt6= $txt6."Mar ";
      }
    else
    {
      $txt6= $txt6."Mar(R)";
    }
}

If ($_SESSION['tmp_Rasi_Mer'] == 6)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txt6= $txt6."Mer ";
      }
    else
    {
      $txt6= $txt6."Mer(R)";
    }
}

If ($_SESSION['tmp_Rasi_Jup'] == 6)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txt6= $txt6."Jup ";
      }
    else
    {
      $txt6= $txt6."Jup(R)";
    }
}

If ($_SESSION['tmp_Rasi_Ven'] == 6)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txt6= $txt6."Ven ";
      }
    else
    {
      $txt6= $txt6."Ven(R)";
    }
}

If ($_SESSION['tmp_Rasi_Sat'] == 6)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txt6= $txt6."Sat ";
      }
    else
    {
      $txt6= $txt6."Sat(R)";
    }
}

If ($_SESSION['tmp_Rasi_Rah'] == 6)
{
  $txt6= $txt6."Rah ";
}

If ($_SESSION['tmp_Rasi_Ket'] == 6)
{
  $txt6= $txt6."Ket ";
}

If ($_SESSION['tmp_Rasi_Asc'] == 3 or $_SESSION['tmp_Rasi_Asc'] == 6 or $_SESSION['tmp_Rasi_Asc'] == 9 or $_SESSION['tmp_Rasi_Asc'] == 12)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava6;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt6;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 2 or $_SESSION['tmp_Rasi_Asc'] == 10)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava6;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt6;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }
    elseif ($_SESSION['tmp_Rasi_Asc'] == 8 or $_SESSION['tmp_Rasi_Asc'] == 1 or $_SESSION['tmp_Rasi_Asc'] == 4)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava6;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt6;
    echo '</td></tr><tr></tr><tr></tr></table>';
    
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
    echo '<table class="eb"><tr align="center"><td colspan="2"></td><td></td><td bgcolor="fff">';
    echo $bhava6;
    echo '</td></tr><tr align="center"><td colspan="4" rowspan="3">';
    echo $txt6;
    echo '</td></tr><tr></tr><tr></tr></table>';
  }

echo '</td>';
?>

</tr>
</table>
</td>
<!-- Rasi Chart display end -->


<td width="15%"></td>
<!--  gap between 2 charts -->



<td>
<!-- Navamsa Chart display start -->

<table class="c" align="center">
<tr align="center">


<?php
If ($tmp_Nava_Asc == 12 or $tmp_Nava_Asc == 3 or $tmp_Nava_Asc == 6 or $tmp_Nava_Asc == 9)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
  }
    elseif ($tmp_Nava_Asc == 4 or $tmp_Nava_Asc == 8)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
  }
    elseif ($tmp_Nava_Asc == 2 or $tmp_Nava_Asc == 7 or $tmp_Nava_Asc == 10)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
  }


?>


<?php

$txtN12= " ";

If ($tmp_Nava_Asc == 12)
{
  $txtN12= $txtN12."Asc ";
}
If ($tmp_Nava_Sun == 12)
{
  $txtN12= $txtN12."Sun ";
}
If ($tmp_Nava_Moon == 12)
{
  $txtN12= $txtN12."Moon ";
}

If ($tmp_Nava_Mar == 12)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txtN12= $txtN12."Mar ";
      }
    else
    {
      $txtN12= $txtN12."Mar(R)";
    }
}

If ($tmp_Nava_Mer == 12)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txtN12= $txtN12."Mer ";
      }
    else
    {
      $txtN12= $txtN12."Mer(R)";
    }
}

If ($tmp_Nava_Jup == 12)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txtN12= $txtN12."Jup ";
      }
    else
    {
      $txtN12= $txtN12."Jup(R)";
    }
}

If ($tmp_Nava_Ven == 12)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txtN12= $txtN12."Ven ";
      }
    else
    {
      $txtN12= $txtN12."Ven(R)";
    }
}

If ($tmp_Nava_Sat == 12)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txtN12= $txtN12."Sat ";
      }
    else
    {
      $txtN12= $txtN12."Sat(R)";
    }
}

If ($tmp_Nava_Rah == 12)
{
  $txtN12= $txtN12."Rah ";
}

If ($tmp_Nava_Ket == 12)
{
  $txtN12= $txtN12."Ket ";
}
echo $txtN12;
echo '</td>';
?>






<?php
If ($tmp_Nava_Asc == 1 or $tmp_Nava_Asc == 4 or $tmp_Nava_Asc == 7 or $tmp_Nava_Asc == 10)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
  }
    elseif ($tmp_Nava_Asc == 5 or $tmp_Nava_Asc == 9)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
  }
    elseif ($tmp_Nava_Asc == 3 or $tmp_Nava_Asc == 8 or $tmp_Nava_Asc == 11)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
  }


?>

<?php

$txtN1= " ";

If ($tmp_Nava_Asc == 1)
{
  $txtN1= $txtN1."Asc ";
}
If ($tmp_Nava_Sun == 1)
{
  $txtN1= $txtN1."Sun ";
}
If ($tmp_Nava_Moon == 1)
{
  $txtN1= $txtN1."Moon ";
}

If ($tmp_Nava_Mar == 1)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txtN1= $txtN1."Mar ";
      }
    else
    {
      $txtN1= $txtN1."Mar(R)";
    }
}

If ($tmp_Nava_Mer == 1)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txtN1= $txtN1."Mer ";
      }
    else
    {
      $txtN1= $txtN1."Mer(R)";
    }
}

If ($tmp_Nava_Jup == 1)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txtN1= $txtN1."Jup ";
      }
    else
    {
      $txtN1= $txtN1."Jup(R)";
    }
}

If ($tmp_Nava_Ven == 1)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txtN1= $txtN1."Ven ";
      }
    else
    {
      $txtN1= $txtN1."Ven(R)";
    }
}

If ($tmp_Nava_Sat == 1)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txtN1= $txtN1."Sat ";
      }
    else
    {
      $txtN1= $txtN1."Sat(R)";
    }
}

If ($tmp_Nava_Rah == 1)
{
  $txtN1= $txtN1."Rah ";
}

If ($tmp_Nava_Ket == 1)
{
  $txtN1= $txtN1."Ket ";
}

echo $txtN1;
echo '</td>';
?>





<?php
If ($tmp_Nava_Asc == 2 or $tmp_Nava_Asc == 5 or $tmp_Nava_Asc == 8 or $tmp_Nava_Asc == 11)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
  }
    elseif ($tmp_Nava_Asc == 6 or $tmp_Nava_Asc == 10)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
  }
    elseif ($tmp_Nava_Asc == 4 or $tmp_Nava_Asc == 9 or $tmp_Nava_Asc == 12)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
  }


?>
<?php

$txtN2= " ";

If ($tmp_Nava_Asc == 2)
{
  $txtN2= $txtN2."Asc ";
}
If ($tmp_Nava_Sun == 2)
{
  $txtN2= $txtN2."Sun ";
}
If ($tmp_Nava_Moon == 2)
{
  $txtN2= $txtN2."Moon ";
}

If ($tmp_Nava_Mar == 2)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txtN2= $txtN2."Mar ";
      }
    else
    {
      $txtN2= $txtN2."Mar(R)";
    }
}

If ($tmp_Nava_Mer == 2)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txtN2= $txtN2."Mer ";
      }
    else
    {
      $txtN2= $txtN2."Mer(R)";
    }
}

If ($tmp_Nava_Jup == 2)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txtN2= $txtN2."Jup ";
      }
    else
    {
      $txtN2= $txtN2."Jup(R)";
    }
}

If ($tmp_Nava_Ven == 2)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txtN2= $txtN2."Ven ";
      }
    else
    {
      $txtN2= $txtN2."Ven(R)";
    }
}

If ($tmp_Nava_Sat == 2)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txtN2= $txtN2."Sat ";
      }
    else
    {
      $txtN2= $txtN2."Sat(R)";
    }
}

If ($tmp_Nava_Rah == 2)
{
  $txtN2= $txtN2."Rah ";
}

If ($tmp_Nava_Ket == 2)
{
  $txtN2= $txtN2."Ket ";
}

echo $txtN2;
echo '</td>';
?>


<?php
If ($tmp_Nava_Asc == 3 or $tmp_Nava_Asc == 6 or $tmp_Nava_Asc == 9 or $tmp_Nava_Asc == 12)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
  }
    elseif ($tmp_Nava_Asc == 7 or $tmp_Nava_Asc == 11)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
  }
    elseif ($tmp_Nava_Asc == 5 or $tmp_Nava_Asc == 10 or $tmp_Nava_Asc == 1)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
  }


?>
<?php

$txtN3= " ";

If ($tmp_Nava_Asc == 3)
{
  $txtN3= $txtN3."Asc ";
}
If ($tmp_Nava_Sun == 3)
{
  $txtN3= $txtN3."Sun ";
}
If ($tmp_Nava_Moon == 3)
{
  $txtN3= $txtN3."Moon ";
}

If ($tmp_Nava_Mar == 3)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txtN3= $txtN3."Mar ";
      }
    else
    {
      $txtN3= $txtN3."Mar(R)";
    }
}

If ($tmp_Nava_Mer == 3)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txtN3= $txtN3."Mer ";
      }
    else
    {
      $txtN3= $txtN3."Mer(R)";
    }
}

If ($tmp_Nava_Jup == 3)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txtN3= $txtN3."Jup ";
      }
    else
    {
      $txtN3= $txtN3."Jup(R)";
    }
}

If ($tmp_Nava_Ven == 3)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txtN3= $txtN3."Ven ";
      }
    else
    {
      $txtN3= $txtN3."Ven(R)";
    }
}

If ($tmp_Nava_Sat == 3)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txtN3= $txtN3."Sat ";
      }
    else
    {
      $txtN3= $txtN3."Sat(R)";
    }
}

If ($tmp_Nava_Rah == 3)
{
  $txtN3= $txtN3."Rah ";
}

If ($tmp_Nava_Ket == 3)
{
  $txtN3= $txtN3."Ket ";
}

echo $txtN3;
echo '</td>';

?>



</tr>
<!-- 2nd Row starts -->

<tr align="center">
<?php
If ($tmp_Nava_Asc == 2 or $tmp_Nava_Asc == 5 or $tmp_Nava_Asc == 8 or $tmp_Nava_Asc == 11)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
  }
    elseif ($tmp_Nava_Asc == 3 or $tmp_Nava_Asc == 7)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
  }
    elseif ($tmp_Nava_Asc == 1 or $tmp_Nava_Asc == 6 or $tmp_Nava_Asc == 9)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
  }


?>
<?php

$txtN11= " ";

If ($tmp_Nava_Asc == 11)
{
  $txtN11= $txtN11."Asc ";
}
If ($tmp_Nava_Sun == 11)
{
  $txtN11= $txtN11."Sun ";
}
If ($tmp_Nava_Moon == 11)
{
  $txtN11= $txtN11."Moon ";
}

If ($tmp_Nava_Mar == 11)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txtN11= $txtN11."Mar ";
      }
    else
    {
      $txtN11= $txtN11."Mar(R)";
    }
}

If ($tmp_Nava_Mer == 11)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txtN11= $txtN11."Mer ";
      }
    else
    {
      $txtN11= $txtN11."Mer(R)";
    }
}

If ($tmp_Nava_Jup == 11)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txtN11= $txtN11."Jup ";
      }
    else
    {
      $txtN11= $txtN11."Jup(R)";
    }
}

If ($tmp_Nava_Ven == 11)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txtN11= $txtN11."Ven ";
      }
    else
    {
      $txtN11= $txtN11."Ven(R)";
    }
}

If ($tmp_Nava_Sat == 11)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txtN11= $txtN11."Sat ";
      }
    else
    {
      $txtN11= $txtN11."Sat(R)";
    }
}

If ($tmp_Nava_Rah == 11)
{
  $txtN11= $txtN11."Rah ";
}

If ($tmp_Nava_Ket == 11)
{
  $txtN11= $txtN11."Ket ";
}

echo $txtN11;
echo '</td>';
?>

<td colspan="2" rowspan="2" bgcolor="#99DDFF">Navamsa Chart<br>
D-9 Chart<br>

</td>

<?php
If ($tmp_Nava_Asc == 1 or $tmp_Nava_Asc == 4 or $tmp_Nava_Asc == 7 or $tmp_Nava_Asc == 10)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
  }
    elseif ($tmp_Nava_Asc == 12 or $tmp_Nava_Asc == 8)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
  }
    elseif ($tmp_Nava_Asc == 2 or $tmp_Nava_Asc == 6 or $tmp_Nava_Asc == 11)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
  }


?>
<?php

$txtN4= " ";

If ($tmp_Nava_Asc == 4)
{
  $txtN4= $txtN4."Asc ";
}
If ($tmp_Nava_Sun == 4)
{
  $txtN4= $txtN4."Sun ";
}
If ($tmp_Nava_Moon == 4)
{
  $txtN4= $txtN4."Moon ";
}

If ($tmp_Nava_Mar == 4)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txtN4= $txtN4."Mar ";
      }
    else
    {
      $txtN4= $txtN4."Mar(R)";
    }
}

If ($tmp_Nava_Mer == 4)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txtN4= $txtN4."Mer ";
      }
    else
    {
      $txtN4= $txtN4."Mer(R)";
    }
}

If ($tmp_Nava_Jup == 4)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txtN4= $txtN4."Jup ";
      }
    else
    {
      $txtN4= $txtN4."Jup(R)";
    }
}

If ($tmp_Nava_Ven == 4)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txtN4= $txtN4."Ven ";
      }
    else
    {
      $txtN4= $txtN4."Ven(R)";
    }
}

If ($tmp_Nava_Sat == 4)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txtN4= $txtN4."Sat ";
      }
    else
    {
      $txtN4= $txtN4."Sat(R)";
    }
}

If ($tmp_Nava_Rah == 4)
{
  $txtN4= $txtN4."Rah ";
}

If ($tmp_Nava_Ket == 4)
{
  $txtN4= $txtN4."Ket ";
}

echo $txtN4;
?>
</td>
</tr>
<!-- 3rd row starts -->

<tr align="center">

<?php
If ($tmp_Nava_Asc == 1 or $tmp_Nava_Asc == 4 or $tmp_Nava_Asc == 7 or $tmp_Nava_Asc == 10)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
  }
    elseif ($tmp_Nava_Asc == 2 or $tmp_Nava_Asc == 6)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
  }
    elseif ($tmp_Nava_Asc == 12 or $tmp_Nava_Asc == 5 or $tmp_Nava_Asc == 8)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
  }


?>
<?php

$txtN10= " ";

If ($tmp_Nava_Asc == 10)
{
  $txtN10= $txtN10."Asc ";
}
If ($tmp_Nava_Sun == 10)
{
  $txtN10= $txtN10."Sun ";
}
If ($tmp_Nava_Moon == 10)
{
  $txtN10= $txtN10."Moon ";
}

If ($tmp_Nava_Mar == 10)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txtN10= $txtN10."Mar ";
      }
    else
    {
      $txtN10= $txtN10."Mar(R)";
    }
}

If ($tmp_Nava_Mer == 10)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txtN10= $txtN10."Mer ";
      }
    else
    {
      $txtN10= $txtN10."Mer(R)";
    }
}

If ($tmp_Nava_Jup == 10)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txtN10= $txtN10."Jup ";
      }
    else
    {
      $txtN10= $txtN10."Jup(R)";
    }
}

If ($tmp_Nava_Ven == 10)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txtN10= $txtN10."Ven ";
      }
    else
    {
      $txtN10= $txtN10."Ven(R)";
    }
}

If ($tmp_Nava_Sat == 10)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txtN10= $txtN10."Sat ";
      }
    else
    {
      $txtN10= $txtN10."Sat(R)";
    }
}

If ($tmp_Nava_Rah == 10)
{
  $txtN10= $txtN10."Rah ";
}

If ($tmp_Nava_Ket == 10)
{
  $txtN10= $txtN10."Ket ";
}

echo $txtN10;
echo '</td>';
?>



<?php
If ($tmp_Nava_Asc == 2 or $tmp_Nava_Asc == 5 or $tmp_Nava_Asc == 8 or $tmp_Nava_Asc == 11)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
  }
    elseif ($tmp_Nava_Asc == 1 or $tmp_Nava_Asc == 9)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
  }
    elseif ($tmp_Nava_Asc == 7 or $tmp_Nava_Asc == 3 or $tmp_Nava_Asc == 12)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
  }


?>
<?php

$txtN5= " ";

If ($tmp_Nava_Asc == 5)
{
  $txtN5= $txtN5."Asc ";
}
If ($tmp_Nava_Sun == 5)
{
  $txtN5= $txtN5."Sun ";
}
If ($tmp_Nava_Moon == 5)
{
  $txtN5= $txtN5."Moon ";
}

If ($tmp_Nava_Mar == 5)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txtN5= $txtN5."Mar ";
      }
    else
    {
      $txtN5= $txtN5."Mar(R)";
    }
}

If ($tmp_Nava_Mer == 5)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txtN5= $txtN5."Mer ";
      }
    else
    {
      $txtN5= $txtN5."Mer(R)";
    }
}

If ($tmp_Nava_Jup == 5)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txtN5= $txtN5."Jup ";
      }
    else
    {
      $txtN5= $txtN5."Jup(R)";
    }
}

If ($tmp_Nava_Ven == 5)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txtN5= $txtN5."Ven ";
      }
    else
    {
      $txtN5= $txtN5."Ven(R)";
    }
}

If ($tmp_Nava_Sat == 5)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txtN5= $txtN5."Sat ";
      }
    else
    {
      $txtN5= $txtN5."Sat(R)";
    }
}

If ($tmp_Nava_Rah == 5)
{
  $txtN5= $txtN5."Rah ";
}

If ($tmp_Nava_Ket == 5)
{
  $txtN5= $txtN5."Ket ";
}

echo $txtN5;
echo '</td>';
?>
</tr>
<!-- 4th row starts -->

<tr align="center">

<?php
If ($tmp_Nava_Asc == 12 or $tmp_Nava_Asc == 3 or $tmp_Nava_Asc == 6 or $tmp_Nava_Asc == 9)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
  }
    elseif ($tmp_Nava_Asc == 1 or $tmp_Nava_Asc == 5)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
  }
    elseif ($tmp_Nava_Asc == 4 or $tmp_Nava_Asc == 11 or $tmp_Nava_Asc == 7)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
  }


?>
<?php

$txtN9= " ";

If ($tmp_Nava_Asc == 9)
{
  $txtN9= $txtN9."Asc ";
}
If ($tmp_Nava_Sun == 9)
{
  $txtN9= $txtN9."Sun ";
}
If ($tmp_Nava_Moon == 9)
{
  $txtN9= $txtN9."Moon ";
}

If ($tmp_Nava_Mar == 9)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txtN9= $txtN9."Mar ";
      }
    else
    {
      $txtN9= $txtN9."Mar(R)";
    }
}

If ($tmp_Nava_Mer == 9)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txtN9= $txtN9."Mer ";
      }
    else
    {
      $txtN9= $txtN9."Mer(R)";
    }
}

If ($tmp_Nava_Jup == 9)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txtN9= $txtN9."Jup ";
      }
    else
    {
      $txtN9= $txtN9."Jup(R)";
    }
}

If ($tmp_Nava_Ven == 9)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txtN9= $txtN9."Ven ";
      }
    else
    {
      $txtN9= $txtN9."Ven(R)";
    }
}

If ($tmp_Nava_Sat == 9)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txtN9= $txtN9."Sat ";
      }
    else
    {
      $txtN9= $txtN9."Sat(R)";
    }
}

If ($tmp_Nava_Rah == 9)
{
  $txtN9= $txtN9."Rah ";
}

If ($tmp_Nava_Ket == 9)
{
  $txtN9= $txtN9."Ket ";
}

echo $txtN9;
echo '</td>';
?>

<?php
If ($tmp_Nava_Asc == 2 or $tmp_Nava_Asc == 5 or $tmp_Nava_Asc == 8 or $tmp_Nava_Asc == 11)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
  }
    elseif ($tmp_Nava_Asc == 12 or $tmp_Nava_Asc == 4)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
  }
    elseif ($tmp_Nava_Asc == 3 or $tmp_Nava_Asc == 6 or $tmp_Nava_Asc == 10)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
  }


?>
<?php

$txtN8= " ";

If ($tmp_Nava_Asc == 8)
{
  $txtN8= $txtN8."Asc ";
}
If ($tmp_Nava_Sun == 8)
{
  $txtN8= $txtN8."Sun ";
}
If ($tmp_Nava_Moon == 8)
{
  $txtN8= $txtN8."Moon ";
}

If ($tmp_Nava_Mar == 8)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txtN8= $txtN8."Mar ";
      }
    else
    {
      $txtN8= $txtN8."Mar(R)";
    }
}

If ($tmp_Nava_Mer == 8)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txtN8= $txtN8."Mer ";
      }
    else
    {
      $txtN8= $txtN8."Mer(R)";
    }
}

If ($tmp_Nava_Jup == 8)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txtN8= $txtN8."Jup ";
      }
    else
    {
      $txtN8= $txtN8."Jup(R)";
    }
}

If ($tmp_Nava_Ven == 8)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txtN8= $txtN8."Ven ";
      }
    else
    {
      $txtN8= $txtN8."Ven(R)";
    }
}

If ($tmp_Nava_Sat == 8)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txtN8= $txtN8."Sat ";
      }
    else
    {
      $txtN8= $txtN8."Sat(R)";
    }
}

If ($tmp_Nava_Rah == 8)
{
  $txtN8= $txtN8."Rah ";
}

If ($tmp_Nava_Ket == 8)
{
  $txtN8= $txtN8."Ket ";
}

echo $txtN8;
echo '</td>';
?>

<?php
If ($tmp_Nava_Asc == 1 or $tmp_Nava_Asc == 4 or $tmp_Nava_Asc == 7 or $tmp_Nava_Asc == 10)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
  }
    elseif ($tmp_Nava_Asc == 3 or $tmp_Nava_Asc == 11)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
  }
    elseif ($tmp_Nava_Asc == 9 or $tmp_Nava_Asc == 5 or $tmp_Nava_Asc == 2)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
  }


?>
<?php

$txtN7= " ";

If ($tmp_Nava_Asc == 7)
{
  $txtN7 = $txtN7."Asc ";
}
If ($tmp_Nava_Sun == 7)
{
  $txtN7 = $txtN7."Sun ";
}
If ($tmp_Nava_Moon == 7)
{
  $txtN7 = $txtN7."Moon ";
}

If ($tmp_Nava_Mar == 7)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txtN7 = $txtN7."Mar ";
      }
    else
    {
      $txtN7 = $txtN7."Mar(R)";
    }
}

If ($tmp_Nava_Mer == 7)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txtN7 = $txtN7."Mer ";
      }
    else
    {
      $txtN7 = $txtN7."Mer(R)";
    }
}

If ($tmp_Nava_Jup == 7)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txtN7 = $txtN7."Jup ";
      }
    else
    {
      $txtN7 = $txtN7."Jup(R)";
    }
}

If ($tmp_Nava_Ven == 7)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txtN7 = $txtN7."Ven ";
      }
    else
    {
      $txtN7 = $txtN7."Ven(R)";
    }
}

If ($tmp_Nava_Sat == 7)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txtN7 = $txtN7."Sat ";
      }
    else
    {
      $txtN7 = $txtN7."Sat(R)";
    }
}

If ($tmp_Nava_Rah == 7)
{
  $txtN7 = $txtN7."Rah ";
}

If ($tmp_Nava_Ket == 7)
{
  $txtN7= $txtN7."Ket ";
}

echo $txtN7;
echo '</td>';
?>

<?php
If ($tmp_Nava_Asc == 3 or $tmp_Nava_Asc == 6 or $tmp_Nava_Asc == 9 or $tmp_Nava_Asc == 12)
  {
    echo '<td width="100" height="100" bgcolor="#008000">';
  }
    elseif ($tmp_Nava_Asc == 2 or $tmp_Nava_Asc == 10)
  {
    echo '<td width="100" height="100" bgcolor="#C46210">';
  }
    elseif ($tmp_Nava_Asc == 8 or $tmp_Nava_Asc == 1 or $tmp_Nava_Asc == 4)
  {
    echo '<td width="100" height="100" bgcolor="#FF99CC">';
  }
  else
  {
    echo '<td width="100" height="100" bgcolor="#FFF2B2">';
  }


?>
<?php

$txtN6= " ";

If ($tmp_Nava_Asc == 6)
{
  $txtN6= $txtN6."Asc ";
}
If ($tmp_Nava_Sun == 6)
{
  $txtN6= $txtN6."Sun ";
}
If ($tmp_Nava_Moon == 6)
{
  $txtN6= $txtN6."Moon ";
}

If ($tmp_Nava_Mar == 6)
{
  If ($_SESSION['tmp_Speed_Mar'] > 0)
      {
        $txtN6= $txtN6."Mar ";
      }
    else
    {
      $txtN6= $txtN6."Mar(R)";
    }
}

If ($tmp_Nava_Mer == 6)
{
  If ($_SESSION['tmp_Speed_Mer'] > 0)
      {
        $txtN6= $txtN6."Mer ";
      }
    else
    {
      $txtN6= $txtN6."Mer(R)";
    }
}

If ($tmp_Nava_Jup == 6)
{
  If ($_SESSION['tmp_Speed_Jup'] > 0)
      {
        $txtN6= $txtN6."Jup ";
      }
    else
    {
      $txtN6= $txtN6."Jup(R)";
    }
}

If ($tmp_Nava_Ven == 6)
{
  If ($_SESSION['tmp_Speed_Ven'] > 0)
      {
        $txtN6= $txtN6."Ven ";
      }
    else
    {
      $txtN6= $txtN6."Ven(R)";
    }
}

If ($tmp_Nava_Sat == 6)
{
  If ($_SESSION['tmp_Speed_Sat'] > 0)
      {
        $txtN6= $txtN6."Sat ";
      }
    else
    {
      $txtN6= $txtN6."Sat(R)";
    }
}

If ($tmp_Nava_Rah == 6)
{
  $txtN6= $txtN6."Rah ";
}

If ($tmp_Nava_Ket == 6)
{
  $txtN6= $txtN6."Ket ";
}

echo $txtN6;
echo '</td>';
?>

</tr>
</table>

<!-- Navamsa Chart display end -->
</td>
<td width=25%></td>
</tr>

</table>

<br>
<table class="ef" width="76%">
<tr>
<td width= "100px" bgcolor="#008000" align="center"><strong><dt>Kendra</dt></strong></td>
<td width= "20px"></td>
<td width= "100px" bgcolor="#C46210" align="center"><strong><dt>Kona</dt></strong></td>
<td width= "20px"></td>
<td width= "100px" bgcolor="#FF99CC" align="center"><strong><dt>Trishadaya</dt></strong></td>
<td width= "20px"></td>
<td width= "100px" bgcolor="fff" align="center"><strong><dt>House/Bhava No</dt></strong></td>
</tr>
</table>
<br>
<!-- Current Dat Chart Display End -->

<!--<table class="d">  -->
<div class="row">
	
	<div class="col-xs-12 col-sm-10 widget-container-col" id="widget-container-col-2">
		<div class="widget-box widget-color-blue" id="widget-box-2">
			<div class="widget-header">
				<h5 class="widget-title bigger lighter">
					<i class="ace-icon fa fa-cogs"></i>
							Planetary Information
													</h5>

													<div class="widget-toolbar widget-toolbar-light no-border">
														<select id="simple-colorpicker-2" class="hide">
															<option selected="" data-class="blue" value="#307ECC">#307ECC</option>
															<option data-class="blue2" value="#5090C1">#5090C1</option>
															<option data-class="blue3" value="#6379AA">#6379AA</option>
															<option data-class="green" value="#82AF6F">#82AF6F</option>
															<option data-class="green2" value="#2E8965">#2E8965</option>
															<option data-class="green3" value="#5FBC47">#5FBC47</option>
															<option data-class="red" value="#E2755F">#E2755F</option>
															<option data-class="red2" value="#E04141">#E04141</option>
															<option data-class="red3" value="#D15B47">#D15B47</option>
															<option data-class="orange" value="#FFC657">#FFC657</option>
															<option data-class="purple" value="#7E6EB0">#7E6EB0</option>
															<option data-class="pink" value="#CE6F9E">#CE6F9E</option>
															<option data-class="dark" value="#404040">#404040</option>
															<option data-class="grey" value="#848484">#848484</option>
															<option data-class="default" value="#EEE">#EEE</option>
														</select>
													</div>
												</div>

												<div class="widget-body">
													<div class="widget-main no-padding">
														<table class="table table-striped table-bordered table-hover">
															<thead class="thin-border-bottom">
																<tr>
																	<th>
																		Planet
																	</th>

																	
																	<th class="text-center" colspan="2" >
																		Planet Longitude
																	</th>
																	<th>
																		Nakshatra - Pada
																	</th>
																	<th>
																		House No.
																	</th>
																	<th>
																		Navamsa Longitude
																	</th>

																</tr>
															</thead>

															<tbody>

  <!--<tr>
  <td><strong>Planet</strong></td><td><strong>Planet Speed</strong></td><td><strong>Planet Longitude</strong></td><td><strong>Nakshatra - Pada</strong></td><td><strong>House No.</strong></td><td><strong>Navamsa Long.</strong></td>
  </tr>
-->
  <tr>
  <td>Asc</td><td align="center"><?php echo DMS($_SESSION['tmp_Asc']) ?></td><td align="center"><?php echo round($_SESSION['tmp_Asc'],4) ?> Deg</td><td><?php echo Naks($_SESSION['tmp_Asc']) ?> - <?php echo NaksPad($_SESSION['tmp_Asc']) ?></td><td>$$$</td><td><?php echo $_SESSION['ascNLong'] ?> Deg</td>
  </tr>

  <tr>
  <td>Sun</td><td align="center"><?php echo DMS($_SESSION['tmp_Long_Sun']) ?></td><td align="center"><?php echo round($_SESSION['tmp_Long_Sun'],4) ?> Deg</td><td><?php echo Naks($_SESSION['tmp_Long_Sun']) ?> - <?php echo NaksPad($_SESSION['tmp_Long_Sun']) ?></td><td>$$$</td><td><?php echo $_SESSION['sunNLong'] ?> Deg</td>
  </tr>

  <tr>
  <td>Moon </td><td align="center"><?php echo DMS($_SESSION['tmp_Long_Moon']) ?></td><td align="center"><?php echo round($_SESSION['tmp_Long_Moon'],4) ?> Deg</td><td><?php echo Naks($_SESSION['tmp_Long_Moon']) ?> - <?php echo NaksPad($_SESSION['tmp_Long_Moon']) ?></td><td>$$$</td><td><?php echo $_SESSION['moonNLong'] ?> Deg</td>
  </tr>
  <tr>
  <td>Mars</td><td align="center"><?php echo DMS($_SESSION['tmp_Long_Mar']) ?></td><td align="center"><?php echo round($_SESSION['tmp_Long_Mar'],4) ?> Deg</td><td><?php echo Naks($_SESSION['tmp_Long_Mar']) ?> - <?php echo NaksPad($_SESSION['tmp_Long_Mar']) ?></td><td>$$$</td><td><?php echo $_SESSION['marNLong'] ?> Deg</td>
  </tr>

  <tr>
  <td>Mercury</td><td align="center"><?php echo DMS($_SESSION['tmp_Long_Mer']) ?></td><td align="center"><?php echo round($_SESSION['tmp_Long_Mer'],4) ?> Deg</td><td><?php echo Naks($_SESSION['tmp_Long_Mer']) ?> - <?php echo NaksPad($_SESSION['tmp_Long_Mer']) ?></td><td>$$$</td><td><?php echo $_SESSION['merNLong'] ?> Deg</td>
  </tr>

  <tr>
  <td>Jupiter</td><td align="center"><?php echo DMS($_SESSION['tmp_Long_Jup']) ?></td><td align="center"><?php echo round($_SESSION['tmp_Long_Jup'],4) ?> Deg</td><td><?php echo Naks($_SESSION['tmp_Long_Jup']) ?> - <?php echo NaksPad($_SESSION['tmp_Long_Jup']) ?></td><td>$$$</td><td><?php echo $_SESSION['jupNLong'] ?> Deg</td>
  </tr>


  <tr>
  <td>Venus</td><td align="center"><?php echo DMS($_SESSION['tmp_Long_Ven']) ?></td><td align="center"><?php echo round($_SESSION['tmp_Long_Ven'],4) ?> Deg</td><td><?php echo Naks($_SESSION['tmp_Long_Ven']) ?> - <?php echo NaksPad($_SESSION['tmp_Long_Ven']) ?></td><td>$$$</td><td><?php echo $_SESSION['venNLong'] ?> Deg</td>
  </tr>

  <tr>
  <td>Saturn</td><td align="center"><?php echo DMS($_SESSION['tmp_Long_Sat']) ?></td><td align="center"><?php echo round($_SESSION['tmp_Long_Sat'],4) ?> Deg</td><td><?php echo Naks($_SESSION['tmp_Long_Sat']) ?> - <?php echo NaksPad($_SESSION['tmp_Long_Sat']) ?></td><td>$$$</td><td><?php echo $_SESSION['satNLong'] ?> Deg</td>
  </tr>

  <tr>
  <td>Rahu</td><td align="center"><?php echo DMS($_SESSION['tmp_Long_Rah']) ?></td><td align="center"><?php echo round($_SESSION['tmp_Long_Rah'],4) ?> Deg</td><td><?php echo Naks($_SESSION['tmp_Long_Rah']) ?> - <?php echo NaksPad($_SESSION['tmp_Long_Rah']) ?></td><td>$$$</td><td><?php echo $_SESSION['rahNLong'] ?> Deg</td>
  </tr>

  <tr>
  <td>Ketu</td><td align="center"><?php echo DMS($_SESSION['tmp_Long_Ket']) ?></td><td align="center"><?php echo round($_SESSION['tmp_Long_Ket'],4) ?> Deg</td><td><?php echo Naks($_SESSION['tmp_Long_Ket']) ?> - <?php echo NaksPad($_SESSION['tmp_Long_Ket']) ?></td><td>$$$</td><td><?php echo $_SESSION['ketNLong'] ?> Deg</td>
  </tr>
</tbody>
</table>
</div>
</div>
</div>
</div><!-- /.span -->
</div><!-- /.row -->

<br>
<br>


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

		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="assets/js/dataTables.buttons.min.js"></script>
    
		<script src="assets/js/buttons.flash.min.js"></script>
		<script src="assets/js/buttons.html5.min.js"></script>
		<script src="assets/js/buttons.print.min.js"></script>
		<script src="assets/js/buttons.colVis.min.js"></script>
		<script src="assets/js/dataTables.select.min.js"></script>



		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/fuelux.spinner.min.js"></script>
    <script src="assets/js/chosen.jquery.min.js"></script>
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

	<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
					
					
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
			
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
						"className": "btn btn-white btn-primary btn-bold", columns: ':not(:first):not(:last)'
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
				
				
				
				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				
				
				
				
				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/
				
				
				
				
				
				/**
				//add horizontal scrollbars to a simple table
				$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
				  {
					horizontal: true,
					styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
					size: 2000,
					mouseWheelLock: true
				  }
				).css('padding-top', '12px');
				*/
			
			
			})
		</script>


<!--

-->
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
