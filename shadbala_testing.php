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

// Calculations of Shadbala
echo "This is Ascendant Longitude : " . $_SESSION['tmp_Asc'] . "<br>";
echo "This is Sun Longitude : " . $_SESSION['tmp_Long_Sun'] . "<br>";
echo "This is Moon Longitude : " . $_SESSION['tmp_Long_Moon'] . "<br>";
echo "This is Mar Longitude : " . $_SESSION['tmp_Long_Mar'] . "<br>";
echo "This is Mer Longitude : " . $_SESSION['tmp_Long_Mer'] . "<br>";
echo "This is Jup Longitude : " . $_SESSION['tmp_Long_Jup'] . "<br>";
echo "This is Ven Longitude : " . $_SESSION['tmp_Long_Ven'] . "<br>";
echo "This is Sat Longitude : " . $_SESSION['tmp_Long_Sat'] . "<br>";




$uchabala_sun = UchchaBala($_SESSION['tmp_Long_Sun'], "Sun");
echo "This is Uchcha Bala of Sun : " . $uchabala_sun . "<br>";
$uchabala_moon = UchchaBala($_SESSION['tmp_Long_Moon'], "Moon");
echo "This is Uchcha Bala of Moon : " . $uchabala_moon . "<br>";
$uchabala_mar = UchchaBala($_SESSION['tmp_Long_Mar'], "Mar");
echo "This is Uchcha Bala of Mar : " . $uchabala_mar . "<br>";
$uchabala_mer = UchchaBala($_SESSION['tmp_Long_Mer'], "Mer");
echo "This is Uchcha Bala of Mer : " . $uchabala_mer . "<br>";
$uchabala_jup = UchchaBala($_SESSION['tmp_Long_Jup'], "Jup");
echo "This is Uchcha Bala of Jup : " . $uchabala_jup . "<br>";
$uchabala_ven = UchchaBala($_SESSION['tmp_Long_Ven'], "Ven");
echo "This is Uchcha Bala of Ven : " . $uchabala_ven . "<br>";
$uchabala_sat = UchchaBala($_SESSION['tmp_Long_Sat'], "Sat");
echo "This is Uchcha Bala of Sat : " . $uchabala_sat . "<br>";

echo "**********" . "<br>";

$kendrabala_sun = KendraBala($_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Asc']);
echo "This is kendra Bala of Sun : " . $kendrabala_sun . "<br>";
$kendrabala_moon = KendraBala($_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Asc']);
echo "This is kendra Bala of Moon : " . $kendrabala_moon . "<br>";
$kendrabala_mar = KendraBala($_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Asc']);
echo "This is kendra Bala of Mar : " . $kendrabala_mar . "<br>";
$kendrabala_mer = KendraBala($_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Asc']);
echo "This is kendra Bala of Mer : " . $kendrabala_mer . "<br>";
$kendrabala_jup = KendraBala($_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Asc']);
echo "This is kendra Bala of Jup : " . $kendrabala_jup . "<br>";
$kendrabala_ven = KendraBala($_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Asc']);
echo "This is kendra Bala of Ven : " . $kendrabala_ven . "<br>";
$kendrabala_sat = KendraBala($_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Asc']);
echo "This is kendra Bala of Sat : " . $kendrabala_sat . "<br>";
echo "**********" . "<br>";
echo "**********" . "<br>";
$drekkanabala_sun = DrekkanaBala($_SESSION['tmp_Long_Sun'], "Sun");
echo "This is Drekkana Bala of Sun : " . $drekkanabala_sun . "<br>";
$drekkanabala_moon = DrekkanaBala($_SESSION['tmp_Long_Moon'], "Moon");
echo "This is Drekkana Bala of Moon : " . $drekkanabala_moon . "<br>";
$drekkanabala_mar = DrekkanaBala($_SESSION['tmp_Long_Mar'], "Mar");
echo "This is Drekkana Bala of Mar : " . $drekkanabala_mar . "<br>";
$drekkanabala_mer = DrekkanaBala($_SESSION['tmp_Long_Mer'], "Mer");
echo "This is Drekkana Bala of Mer : " . $drekkanabala_mer . "<br>";
$drekkanabala_jup = DrekkanaBala($_SESSION['tmp_Long_Jup'], "Jup");
echo "This is Drekkana Bala of Jup : " . $drekkanabala_jup . "<br>";
$drekkanabala_ven = DrekkanaBala($_SESSION['tmp_Long_Ven'], "Ven");
echo "This is Drekkana Bala of Ven : " . $drekkanabala_ven . "<br>";
$drekkanabala_sat = DrekkanaBala($_SESSION['tmp_Long_Sat'], "Sat");
echo "This is Drekkana Bala of Sat : " . $drekkanabala_sat . "<br>";
echo "**********" . "<br>";
echo "**********" . "<br>";

$ojayugmabala_sun = OjaYugmaBala($_SESSION['tmp_Long_Sun'], "Sun");
echo "This is OjaYugma Bala of Sun : " . $ojayugmabala_sun . "<br>";
$ojayugmabala_moon = OjaYugmaBala($_SESSION['tmp_Long_Moon'], "Moon");
echo "This is OjaYugma Bala of Moon : " . $ojayugmabala_moon . "<br>";
$ojayugmabala_mar = OjaYugmaBala($_SESSION['tmp_Long_Mar'], "Mar");
echo "This is OjaYugma Bala of Mar : " . $ojayugmabala_mar . "<br>";
$ojayugmabala_mer = OjaYugmaBala($_SESSION['tmp_Long_Mer'], "Mer");
echo "This is OjaYugma Bala of Mer : " . $ojayugmabala_mer . "<br>";
$ojayugmabala_jup = OjaYugmaBala($_SESSION['tmp_Long_Jup'], "Jup");
echo "This is OjaYugma Bala of Jup : " . $ojayugmabala_jup . "<br>";
$ojayugmabala_ven = OjaYugmaBala($_SESSION['tmp_Long_Ven'], "Ven");
echo "This is OjaYugma Bala of Ven : " . $ojayugmabala_ven . "<br>";
$ojayugmabala_sat = OjaYugmaBala($_SESSION['tmp_Long_Sat'], "Sat");
echo "This is OjaYugma Bala of Sat : " . $ojayugmabala_sat . "<br>";
echo "**********" . "<br>";
echo "**********" . "<br>";
// Calculation of Panchada Maitri for D-1


$tf_sun = PanchadaMaitri($_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Asc'], "Sun");

$tf_moon = PanchadaMaitri($_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Asc'], "Moon");

$tf_mer = PanchadaMaitri($_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Asc'], "Mer");

$tf_ven = PanchadaMaitri($_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Asc'], "Ven");

$tf_mar = PanchadaMaitri($_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Asc'], "Mar");

$tf_jup = PanchadaMaitri($_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Asc'], "Jup");

$tf_sat = PanchadaMaitri($_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Asc'], "Sat");

//echo "This is Panchadamaitri of Sun : " . $tf_sun . "<br>";
/*
echo "This is value of D-1 => Sun-Sun : " . $tf_sun[0] . "<br>";
echo "This is value of D-1 => Sun-Moon : " . $tf_sun[1] . "<br>";
echo "This is value of D-1 => Sun-Mar : " . $tf_sun[2] . "<br>";
echo "This is value of D-1 => Sun-Mer : " . $tf_sun[3] . "<br>";
echo "This is value of D-1 => Sun-Jup : " . $tf_sun[4] . "<br>";
echo "This is value of D-1 => Sun-Ven : " . $tf_sun[5] . "<br>";
echo "This is value of D-1 => Sun-Sat : " . $tf_sun[6] . "<br>";

echo "******************" . "<br>";

echo "This is value of D-1 => Moon-Sun : " . $tf_moon[0] . "<br>";
echo "This is value of D-1 => Moon-Moon : " . $tf_moon[1] . "<br>";
echo "This is value of D-1 => Moon-Mar : " . $tf_moon[2] . "<br>";
echo "This is value of D-1 => Moon-Mer : " . $tf_moon[3] . "<br>";
echo "This is value of D-1 => Moon-Jup : " . $tf_moon[4] . "<br>";
echo "This is value of D-1 => Moon-Ven : " . $tf_moon[5] . "<br>";
echo "This is value of D-1 => Moon-Sat : " . $tf_moon[6] . "<br>";

echo "******************" . "<br>";

echo "This is value of D-1 => Mar-Sun : " . $tf_mar[0] . "<br>";
echo "This is value of D-1 => Mar-Moon : " . $tf_mar[1] . "<br>";
echo "This is value of D-1 => Mar-Mar : " . $tf_mar[2] . "<br>";
echo "This is value of D-1 => Mar-Mer : " . $tf_mar[3] . "<br>";
echo "This is value of D-1 => Mar-Jup : " . $tf_mar[4] . "<br>";
echo "This is value of D-1 => Mar-Ven : " . $tf_mar[5] . "<br>";
echo "This is value of D-1 => Mar-Sat : " . $tf_mar[6] . "<br>";

echo "******************" . "<br>";

echo "This is value of D-1 => Mer-Sun : " . $tf_mer[0] . "<br>";
echo "This is value of D-1 => Mer-Moon : " . $tf_mer[1] . "<br>";
echo "This is value of D-1 => Mer-Mar : " . $tf_mer[2] . "<br>";
echo "This is value of D-1 => Mer-Mer : " . $tf_mer[3] . "<br>";
echo "This is value of D-1 => Mer-Jup : " . $tf_mer[4] . "<br>";
echo "This is value of D-1 => Mer-Ven : " . $tf_mer[5] . "<br>";
echo "This is value of D-1 => Mer-Sat : " . $tf_mer[6] . "<br>";

echo "******************" . "<br>";

echo "This is value of D-1 => Jup-Sun : " . $tf_jup[0] . "<br>";
echo "This is value of D-1 => Jup-Moon : " . $tf_jup[1] . "<br>";
echo "This is value of D-1 => Jup-Mar : " . $tf_jup[2] . "<br>";
echo "This is value of D-1 => Jup-Mer : " . $tf_jup[3] . "<br>";
echo "This is value of D-1 => Jup-Jup : " . $tf_jup[4] . "<br>";
echo "This is value of D-1 => Jup-Ven : " . $tf_jup[5] . "<br>";
echo "This is value of D-1 => Jup-Sat : " . $tf_jup[6] . "<br>";

echo "******************" . "<br>";

echo "This is value of D-1 => Ven-Sun : " . $tf_ven[0] . "<br>";
echo "This is value of D-1 => Ven-Moon : " . $tf_ven[1] . "<br>";
echo "This is value of D-1 => Ven-Mar : " . $tf_ven[2] . "<br>";
echo "This is value of D-1 => Ven-Mer : " . $tf_ven[3] . "<br>";
echo "This is value of D-1 => Ven-Jup : " . $tf_ven[4] . "<br>";
echo "This is value of D-1 => Ven-Ven : " . $tf_ven[5] . "<br>";
echo "This is value of D-1 => Ven-Sat : " . $tf_ven[6] . "<br>";

echo "******************" . "<br>";

echo "This is value of D-1 => Sat-Sun : " . $tf_sat[0] . "<br>";
echo "This is value of D-1 => Sat-Moon : " . $tf_sat[1] . "<br>";
echo "This is value of D-1 => Sat-Mar : " . $tf_sat[2] . "<br>";
echo "This is value of D-1 => Sat-Mer : " . $tf_sat[3] . "<br>";
echo "This is value of D-1 => Sat-Jup : " . $tf_sat[4] . "<br>";
echo "This is value of D-1 => Sat-Ven : " . $tf_sat[5] . "<br>";
echo "This is value of D-1 => Sat-Sat : " . $tf_sat[6] . "<br>";

echo "******************" . "<br>";
*/
?>
<br>
<table>
<tr>
<td colspan="8">D-1 Panchadamaitri</td>
</tr>

<tr>
<td>Planet</td><td>Sun</td><td>Moon</td><td>Mars</td><td>Mercury</td><td>Jupiter</td><td>Venus</td><td>Saturn</td>
</tr>
<tr>
<td>Sun</td><td><?php echo $tf_sun[0] ?></td><td><?php echo $tf_sun[1] ?></td><td><?php echo $tf_sun[2] ?></td><td><?php echo $tf_sun[3] ?></td><td><?php echo $tf_sun[4] ?></td><td><?php echo $tf_sun[5] ?></td><td><?php echo $tf_sun[6] ?></td>
</tr>
<tr>
<td>Moon</td><td><?php echo $tf_moon[0] ?></td><td><?php echo $tf_moon[1] ?></td><td><?php echo $tf_moon[2] ?></td><td><?php echo $tf_moon[3] ?></td><td><?php echo $tf_moon[4] ?></td><td><?php echo $tf_moon[5] ?></td><td><?php echo $tf_moon[6] ?></td>
</tr>

<tr>
<td>Mars</td><td><?php echo $tf_mar[0] ?></td><td><?php echo $tf_mar[1] ?></td><td><?php echo $tf_mar[2] ?></td><td><?php echo $tf_mar[3] ?></td><td><?php echo $tf_mar[4] ?></td><td><?php echo $tf_mar[5] ?></td><td><?php echo $tf_mar[6] ?></td>
</tr>

<tr>
<td>Mercury</td><td><?php echo $tf_mer[0] ?></td><td><?php echo $tf_mer[1] ?></td><td><?php echo $tf_mer[2] ?></td><td><?php echo $tf_mer[3] ?></td><td><?php echo $tf_mer[4] ?></td><td><?php echo $tf_mer[5] ?></td><td><?php echo $tf_mer[6] ?></td>
</tr>

<tr>
<td>Jupiter</td><td><?php echo $tf_jup[0] ?></td><td><?php echo $tf_jup[1] ?></td><td><?php echo $tf_jup[2] ?></td><td><?php echo $tf_jup[3] ?></td><td><?php echo $tf_jup[4] ?></td><td><?php echo $tf_jup[5] ?></td><td><?php echo $tf_jup[6] ?></td>
</tr>

<tr>
<td>Venus</td><td><?php echo $tf_ven[0] ?></td><td><?php echo $tf_ven[1] ?></td><td><?php echo $tf_ven[2] ?></td><td><?php echo $tf_ven[3] ?></td><td><?php echo $tf_ven[4] ?></td><td><?php echo $tf_ven[5] ?></td><td><?php echo $tf_ven[6] ?></td>
</tr>

<tr>
<td>Saturn</td><td><?php echo $tf_sat[0] ?></td><td><?php echo $tf_sat[1] ?></td><td><?php echo $tf_sat[2] ?></td><td><?php echo $tf_sat[3] ?></td><td><?php echo $tf_sat[4] ?></td><td><?php echo $tf_sat[5] ?></td><td><?php echo $tf_sat[6] ?></td>
</tr>

</table>
<br>
<br>

<?php




// Calculation of Panchada Maitri for D-1 Ends 

// Calculation of Panchada Maitri for D-9 Starts

$D9_tf_sun = PanchadaMaitri($_SESSION['sunNLong'], $_SESSION['moonNLong'], $_SESSION['marNLong'], $_SESSION['merNLong'], $_SESSION['jupNLong'], $_SESSION['venNLong'], $_SESSION['satNLong'], $_SESSION['ascNLong'], "Sun");

$D9_tf_moon = PanchadaMaitri($_SESSION['sunNLong'], $_SESSION['moonNLong'], $_SESSION['marNLong'], $_SESSION['merNLong'], $_SESSION['jupNLong'], $_SESSION['venNLong'], $_SESSION['satNLong'], $_SESSION['ascNLong'], "Moon");

$D9_tf_mer = PanchadaMaitri($_SESSION['sunNLong'], $_SESSION['moonNLong'], $_SESSION['marNLong'], $_SESSION['merNLong'], $_SESSION['jupNLong'], $_SESSION['venNLong'], $_SESSION['satNLong'], $_SESSION['ascNLong'], "Mer");

$D9_tf_ven = PanchadaMaitri($_SESSION['sunNLong'], $_SESSION['moonNLong'], $_SESSION['marNLong'], $_SESSION['merNLong'], $_SESSION['jupNLong'], $_SESSION['venNLong'], $_SESSION['satNLong'], $_SESSION['ascNLong'], "Ven");

$D9_tf_mar = PanchadaMaitri($_SESSION['sunNLong'], $_SESSION['moonNLong'], $_SESSION['marNLong'], $_SESSION['merNLong'], $_SESSION['jupNLong'], $_SESSION['venNLong'], $_SESSION['satNLong'], $_SESSION['ascNLong'], "Mar");

$D9_tf_jup = PanchadaMaitri($_SESSION['sunNLong'], $_SESSION['moonNLong'], $_SESSION['marNLong'], $_SESSION['merNLong'], $_SESSION['jupNLong'], $_SESSION['venNLong'], $_SESSION['satNLong'], $_SESSION['ascNLong'], "Jup");

$D9_tf_sat = PanchadaMaitri($_SESSION['sunNLong'], $_SESSION['moonNLong'], $_SESSION['marNLong'], $_SESSION['merNLong'], $_SESSION['jupNLong'], $_SESSION['venNLong'], $_SESSION['satNLong'], $_SESSION['ascNLong'], "Sat");

//echo "This is Panchadamaitri of Sun : " . $D9_tf_sun . "<br>";


/*
echo "@@@@@@@@@@@@@@@@@@@@@@@" . "<br>";

echo "This is value of D-9 =>  Sun-Sun : " . $D9_tf_sun[0] . "<br>";
echo "This is value of D-9 =>  Sun-Moon : " . $D9_tf_sun[1] . "<br>";
echo "This is value of D-9 =>  Sun-Mar : " . $D9_tf_sun[2] . "<br>";
echo "This is value of D-9 =>  Sun-Mer : " . $D9_tf_sun[3] . "<br>";
echo "This is value of D-9 =>  Sun-Jup : " . $D9_tf_sun[4] . "<br>";
echo "This is value of D-9 =>  Sun-Ven : " . $D9_tf_sun[5] . "<br>";
echo "This is value of D-9 =>  Sun-Sat : " . $D9_tf_sun[6] . "<br>";

echo "******************" . "<br>";

echo "This is value of D-9 =>  Moon-Sun : " . $D9_tf_moon[0] . "<br>";
echo "This is value of D-9 =>  Moon-Moon : " . $D9_tf_moon[1] . "<br>";
echo "This is value of D-9 =>  Moon-Mar : " . $D9_tf_moon[2] . "<br>";
echo "This is value of D-9 =>  Moon-Mer : " . $D9_tf_moon[3] . "<br>";
echo "This is value of D-9 =>  Moon-Jup : " . $D9_tf_moon[4] . "<br>";
echo "This is value of D-9 =>  Moon-Ven : " . $D9_tf_moon[5] . "<br>";
echo "This is value of D-9 =>  Moon-Sat : " . $D9_tf_moon[6] . "<br>";

echo "******************" . "<br>";

echo "This is value of D-9 =>  Mar-Sun : " . $D9_tf_mar[0] . "<br>";
echo "This is value of D-9 =>  Mar-Moon : " . $D9_tf_mar[1] . "<br>";
echo "This is value of D-9 =>  Mar-Mar : " . $D9_tf_mar[2] . "<br>";
echo "This is value of D-9 =>  Mar-Mer : " . $D9_tf_mar[3] . "<br>";
echo "This is value of D-9 =>  Mar-Jup : " . $D9_tf_mar[4] . "<br>";
echo "This is value of D-9 =>  Mar-Ven : " . $D9_tf_mar[5] . "<br>";
echo "This is value of D-9 =>  Mar-Sat : " . $D9_tf_mar[6] . "<br>";

echo "******************" . "<br>";

echo "This is value of D-9 =>  Mer-Sun : " . $D9_tf_mer[0] . "<br>";
echo "This is value of D-9 =>  Mer-Moon : " . $D9_tf_mer[1] . "<br>";
echo "This is value of D-9 =>  Mer-Mar : " . $D9_tf_mer[2] . "<br>";
echo "This is value of D-9 =>  Mer-Mer : " . $D9_tf_mer[3] . "<br>";
echo "This is value of D-9 =>  Mer-Jup : " . $D9_tf_mer[4] . "<br>";
echo "This is value of D-9 =>  Mer-Ven : " . $D9_tf_mer[5] . "<br>";
echo "This is value of D-9 =>  Mer-Sat : " . $D9_tf_mer[6] . "<br>";

echo "******************" . "<br>";

echo "This is value of D-9 =>  Jup-Sun : " . $D9_tf_jup[0] . "<br>";
echo "This is value of D-9 =>  Jup-Moon : " . $D9_tf_jup[1] . "<br>";
echo "This is value of D-9 =>  Jup-Mar : " . $D9_tf_jup[2] . "<br>";
echo "This is value of D-9 =>  Jup-Mer : " . $D9_tf_jup[3] . "<br>";
echo "This is value of D-9 =>  Jup-Jup : " . $D9_tf_jup[4] . "<br>";
echo "This is value of D-9 =>  Jup-Ven : " . $D9_tf_jup[5] . "<br>";
echo "This is value of D-9 =>  Jup-Sat : " . $D9_tf_jup[6] . "<br>";

echo "******************" . "<br>";

echo "This is value of D-9 =>  Ven-Sun : " . $D9_tf_ven[0] . "<br>";
echo "This is value of D-9 =>  Ven-Moon : " . $D9_tf_ven[1] . "<br>";
echo "This is value of D-9 =>  Ven-Mar : " . $D9_tf_ven[2] . "<br>";
echo "This is value of D-9 =>  Ven-Mer : " . $D9_tf_ven[3] . "<br>";
echo "This is value of D-9 =>  Ven-Jup : " . $D9_tf_ven[4] . "<br>";
echo "This is value of D-9 =>  Ven-Ven : " . $D9_tf_ven[5] . "<br>";
echo "This is value of D-9 =>  Ven-Sat : " . $D9_tf_ven[6] . "<br>";

echo "******************" . "<br>";

echo "This is value of D-9 =>  Sat-Sun : " . $D9_tf_sat[0] . "<br>";
echo "This is value of D-9 =>  Sat-Moon : " . $D9_tf_sat[1] . "<br>";
echo "This is value of D-9 =>  Sat-Mar : " . $D9_tf_sat[2] . "<br>";
echo "This is value of D-9 =>  Sat-Mer : " . $D9_tf_sat[3] . "<br>";
echo "This is value of D-9 =>  Sat-Jup : " . $D9_tf_sat[4] . "<br>";
echo "This is value of D-9 =>  Sat-Ven : " . $D9_tf_sat[5] . "<br>";
echo "This is value of D-9 =>  Sat-Sat : " . $D9_tf_sat[6] . "<br>";
echo "******************" . "<br>";
*/
?>

<br>
<table>
<tr>
<td colspan="8">D-9 Panchadamaitri</td>
</tr>
<tr>
<td>Planet</td><td>Sun</td><td>Moon</td><td>Mars</td><td>Mercury</td><td>Jupiter</td><td>Venus</td><td>Saturn</td>
</tr>
<tr>
<td>Sun</td><td><?php echo $D9_tf_sun[0] ?></td><td><?php echo $D9_tf_sun[1] ?></td><td><?php echo $D9_tf_sun[2] ?></td><td><?php echo $D9_tf_sun[3] ?></td><td><?php echo $D9_tf_sun[4] ?></td><td><?php echo $D9_tf_sun[5] ?></td><td><?php echo $D9_tf_sun[6] ?></td>
</tr>
<tr>
<td>Moon</td><td><?php echo $D9_tf_moon[0] ?></td><td><?php echo $D9_tf_moon[1] ?></td><td><?php echo $D9_tf_moon[2] ?></td><td><?php echo $D9_tf_moon[3] ?></td><td><?php echo $D9_tf_moon[4] ?></td><td><?php echo $D9_tf_moon[5] ?></td><td><?php echo $D9_tf_moon[6] ?></td>
</tr>

<tr>
<td>Mars</td><td><?php echo $D9_tf_mar[0] ?></td><td><?php echo $D9_tf_mar[1] ?></td><td><?php echo $D9_tf_mar[2] ?></td><td><?php echo $D9_tf_mar[3] ?></td><td><?php echo $D9_tf_mar[4] ?></td><td><?php echo $D9_tf_mar[5] ?></td><td><?php echo $D9_tf_mar[6] ?></td>
</tr>

<tr>
<td>Mercury</td><td><?php echo $D9_tf_mer[0] ?></td><td><?php echo $D9_tf_mer[1] ?></td><td><?php echo $D9_tf_mer[2] ?></td><td><?php echo $D9_tf_mer[3] ?></td><td><?php echo $D9_tf_mer[4] ?></td><td><?php echo $D9_tf_mer[5] ?></td><td><?php echo $D9_tf_mer[6] ?></td>
</tr>

<tr>
<td>Jupiter</td><td><?php echo $D9_tf_jup[0] ?></td><td><?php echo $D9_tf_jup[1] ?></td><td><?php echo $D9_tf_jup[2] ?></td><td><?php echo $D9_tf_jup[3] ?></td><td><?php echo $D9_tf_jup[4] ?></td><td><?php echo $D9_tf_jup[5] ?></td><td><?php echo $D9_tf_jup[6] ?></td>
</tr>

<tr>
<td>Venus</td><td><?php echo $D9_tf_ven[0] ?></td><td><?php echo $D9_tf_ven[1] ?></td><td><?php echo $D9_tf_ven[2] ?></td><td><?php echo $D9_tf_ven[3] ?></td><td><?php echo $D9_tf_ven[4] ?></td><td><?php echo $D9_tf_ven[5] ?></td><td><?php echo $D9_tf_ven[6] ?></td>
</tr>

<tr>
<td>Saturn</td><td><?php echo $D9_tf_sat[0] ?></td><td><?php echo $D9_tf_sat[1] ?></td><td><?php echo $D9_tf_sat[2] ?></td><td><?php echo $D9_tf_sat[3] ?></td><td><?php echo $D9_tf_sat[4] ?></td><td><?php echo $D9_tf_sat[5] ?></td><td><?php echo $D9_tf_sat[6] ?></td>
</tr>

</table>
<br>
<br>
<?php

// Calculation of Panchada Maitri for D-2 Starts

// D-2 Hora chart Calculation Begins'

$ascD2Long = DivPlanetLongitude($_SESSION['tmp_Asc'],2,1);
$_SESSION['ascD2Long'] = fmod($ascD2Long,360);

$sunD2Long = DivPlanetLongitude($_SESSION['tmp_Long_Sun'],2,1);
$_SESSION['sunD2Long'] = fmod($sunD2Long,360);

$moonD2Long = DivPlanetLongitude($_SESSION['tmp_Long_Moon'],2,1);
$_SESSION['moonD2Long'] = fmod($moonD2Long,360);

$marD2Long = DivPlanetLongitude($_SESSION['tmp_Long_Mar'],2,1);
$_SESSION['marD2Long'] = fmod($marD2Long,360);


$merD2Long = DivPlanetLongitude($_SESSION['tmp_Long_Mer'],2,1);
$_SESSION['merD2Long'] = fmod($merD2Long,360);


$jupD2Long = DivPlanetLongitude($_SESSION['tmp_Long_Jup'],2,1);
$_SESSION['jupD2Long'] = fmod($jupD2Long,360);


$venD2Long = DivPlanetLongitude($_SESSION['tmp_Long_Ven'],2,1);
$_SESSION['venD2Long'] = fmod($venD2Long,360);


$satD2Long = DivPlanetLongitude($_SESSION['tmp_Long_Sat'],2,1);
$_SESSION['satD2Long'] = fmod($satD2Long,360);


$rahD2Long = DivPlanetLongitude($_SESSION['tmp_Long_Rah'],2,1);
$_SESSION['rahD2Long'] = fmod($rahD2Long,360);


$ketD2Long = DivPlanetLongitude($_SESSION['tmp_Long_Ket'],2,1);
$_SESSION['ketD2Long'] = fmod($ketD2Long,360);



$D2_tf_sun = PanchadaMaitri($_SESSION['sunD2Long'], $_SESSION['moonD2Long'], $_SESSION['marD2Long'], $_SESSION['merD2Long'], $_SESSION['jupD2Long'], $_SESSION['venD2Long'], $_SESSION['satD2Long'], $_SESSION['ascD2Long'], "Sun");

$D2_tf_moon = PanchadaMaitri($_SESSION['sunD2Long'], $_SESSION['moonD2Long'], $_SESSION['marD2Long'], $_SESSION['merD2Long'], $_SESSION['jupD2Long'], $_SESSION['venD2Long'], $_SESSION['satD2Long'], $_SESSION['ascD2Long'], "Moon");

$D2_tf_mer = PanchadaMaitri($_SESSION['sunD2Long'], $_SESSION['moonD2Long'], $_SESSION['marD2Long'], $_SESSION['merD2Long'], $_SESSION['jupD2Long'], $_SESSION['venD2Long'], $_SESSION['satD2Long'], $_SESSION['ascD2Long'], "Mer");

$D2_tf_ven = PanchadaMaitri($_SESSION['sunD2Long'], $_SESSION['moonD2Long'], $_SESSION['marD2Long'], $_SESSION['merD2Long'], $_SESSION['jupD2Long'], $_SESSION['venD2Long'], $_SESSION['satD2Long'], $_SESSION['ascD2Long'], "Ven");

$D2_tf_mar = PanchadaMaitri($_SESSION['sunD2Long'], $_SESSION['moonD2Long'], $_SESSION['marD2Long'], $_SESSION['merD2Long'], $_SESSION['jupD2Long'], $_SESSION['venD2Long'], $_SESSION['satD2Long'], $_SESSION['ascD2Long'], "Mar");

$D2_tf_jup = PanchadaMaitri($_SESSION['sunD2Long'], $_SESSION['moonD2Long'], $_SESSION['marD2Long'], $_SESSION['merD2Long'], $_SESSION['jupD2Long'], $_SESSION['venD2Long'], $_SESSION['satD2Long'], $_SESSION['ascD2Long'], "Jup");

$D2_tf_sat = PanchadaMaitri($_SESSION['sunD2Long'], $_SESSION['moonD2Long'], $_SESSION['marD2Long'], $_SESSION['merD2Long'], $_SESSION['jupD2Long'], $_SESSION['venD2Long'], $_SESSION['satD2Long'], $_SESSION['ascD2Long'], "Sat");

//echo "This is Panchadamaitri of Sun : " . $D2_tf_sun . "<br>";

/*

echo "@@@@@@@@@@@@@@@@@@@@@@@" . "<br>";

echo "This is value of D-2 =>  Sun-Sun : " . $D2_tf_sun[0] . "<br>";
echo "This is value of D-2 =>  Sun-Moon : " . $D2_tf_sun[1] . "<br>";
echo "This is value of D-2 =>  Sun-Mar : " . $D2_tf_sun[2] . "<br>";
echo "This is value of D-2 =>  Sun-Mer : " . $D2_tf_sun[3] . "<br>";
echo "This is value of D-2 =>  Sun-Jup : " . $D2_tf_sun[4] . "<br>";
echo "This is value of D-2 =>  Sun-Ven : " . $D2_tf_sun[5] . "<br>";
echo "This is value of D-2 =>  Sun-Sat : " . $D2_tf_sun[6] . "<br>";

echo "******************" . "<br>";
*/
?>
<br>
<table>
<tr>
<td colspan="8">D-2 Panchadamaitri</td>
</tr>
<tr>
<td>Planet</td><td>Sun</td><td>Moon</td><td>Mars</td><td>Mercury</td><td>Jupiter</td><td>Venus</td><td>Saturn</td>
</tr>
<tr>
<td>Sun</td><td><?php echo $D2_tf_sun[0] ?></td><td><?php echo $D2_tf_sun[1] ?></td><td><?php echo $D2_tf_sun[2] ?></td><td><?php echo $D2_tf_sun[3] ?></td><td><?php echo $D2_tf_sun[4] ?></td><td><?php echo $D2_tf_sun[5] ?></td><td><?php echo $D2_tf_sun[6] ?></td>
</tr>
<tr>
<td>Moon</td><td><?php echo $D2_tf_moon[0] ?></td><td><?php echo $D2_tf_moon[1] ?></td><td><?php echo $D2_tf_moon[2] ?></td><td><?php echo $D2_tf_moon[3] ?></td><td><?php echo $D2_tf_moon[4] ?></td><td><?php echo $D2_tf_moon[5] ?></td><td><?php echo $D2_tf_moon[6] ?></td>
</tr>

<tr>
<td>Mars</td><td><?php echo $D2_tf_mar[0] ?></td><td><?php echo $D2_tf_mar[1] ?></td><td><?php echo $D2_tf_mar[2] ?></td><td><?php echo $D2_tf_mar[3] ?></td><td><?php echo $D2_tf_mar[4] ?></td><td><?php echo $D2_tf_mar[5] ?></td><td><?php echo $D2_tf_mar[6] ?></td>
</tr>

<tr>
<td>Mercury</td><td><?php echo $D2_tf_mer[0] ?></td><td><?php echo $D2_tf_mer[1] ?></td><td><?php echo $D2_tf_mer[2] ?></td><td><?php echo $D2_tf_mer[3] ?></td><td><?php echo $D2_tf_mer[4] ?></td><td><?php echo $D2_tf_mer[5] ?></td><td><?php echo $D2_tf_mer[6] ?></td>
</tr>

<tr>
<td>Jupiter</td><td><?php echo $D2_tf_jup[0] ?></td><td><?php echo $D2_tf_jup[1] ?></td><td><?php echo $D2_tf_jup[2] ?></td><td><?php echo $D2_tf_jup[3] ?></td><td><?php echo $D2_tf_jup[4] ?></td><td><?php echo $D2_tf_jup[5] ?></td><td><?php echo $D2_tf_jup[6] ?></td>
</tr>

<tr>
<td>Venus</td><td><?php echo $D2_tf_ven[0] ?></td><td><?php echo $D2_tf_ven[1] ?></td><td><?php echo $D2_tf_ven[2] ?></td><td><?php echo $D2_tf_ven[3] ?></td><td><?php echo $D2_tf_ven[4] ?></td><td><?php echo $D2_tf_ven[5] ?></td><td><?php echo $D2_tf_ven[6] ?></td>
</tr>

<tr>
<td>Saturn</td><td><?php echo $D2_tf_sat[0] ?></td><td><?php echo $D2_tf_sat[1] ?></td><td><?php echo $D2_tf_sat[2] ?></td><td><?php echo $D2_tf_sat[3] ?></td><td><?php echo $D2_tf_sat[4] ?></td><td><?php echo $D2_tf_sat[5] ?></td><td><?php echo $D2_tf_sat[6] ?></td>
</tr>

</table>
<br>
<br>


<!--Calculation of Panchada Maitri for D-2 Hora Ends -->

<br>
<?php

// Calculation of Panchada Maitri for D-3 Starts

// D-3 Hora chart Calculation Begins'

$ascD3Long = DivPlanetLongitude($_SESSION['tmp_Asc'],3,1);
$_SESSION['ascD3Long'] = fmod($ascD3Long,360);

$sunD3Long = DivPlanetLongitude($_SESSION['tmp_Long_Sun'],3,1);
$_SESSION['sunD3Long'] = fmod($sunD3Long,360);

$moonD3Long = DivPlanetLongitude($_SESSION['tmp_Long_Moon'],3,1);
$_SESSION['moonD3Long'] = fmod($moonD3Long,360);

$marD3Long = DivPlanetLongitude($_SESSION['tmp_Long_Mar'],3,1);
$_SESSION['marD3Long'] = fmod($marD3Long,360);


$merD3Long = DivPlanetLongitude($_SESSION['tmp_Long_Mer'],3,1);
$_SESSION['merD3Long'] = fmod($merD3Long,360);


$jupD3Long = DivPlanetLongitude($_SESSION['tmp_Long_Jup'],3,1);
$_SESSION['jupD3Long'] = fmod($jupD3Long,360);


$venD3Long = DivPlanetLongitude($_SESSION['tmp_Long_Ven'],3,1);
$_SESSION['venD3Long'] = fmod($venD3Long,360);


$satD3Long = DivPlanetLongitude($_SESSION['tmp_Long_Sat'],3,1);
$_SESSION['satD3Long'] = fmod($satD3Long,360);


$rahD3Long = DivPlanetLongitude($_SESSION['tmp_Long_Rah'],3,1);
$_SESSION['rahD3Long'] = fmod($rahD3Long,360);


$ketD3Long = DivPlanetLongitude($_SESSION['tmp_Long_Ket'],3,1);
$_SESSION['ketD3Long'] = fmod($ketD3Long,360);



$D3_tf_sun = PanchadaMaitri($_SESSION['sunD3Long'], $_SESSION['moonD3Long'], $_SESSION['marD3Long'], $_SESSION['merD3Long'], $_SESSION['jupD3Long'], $_SESSION['venD3Long'], $_SESSION['satD3Long'], $_SESSION['ascD3Long'], "Sun");

$D3_tf_moon = PanchadaMaitri($_SESSION['sunD3Long'], $_SESSION['moonD3Long'], $_SESSION['marD3Long'], $_SESSION['merD3Long'], $_SESSION['jupD3Long'], $_SESSION['venD3Long'], $_SESSION['satD3Long'], $_SESSION['ascD3Long'], "Moon");

$D3_tf_mer = PanchadaMaitri($_SESSION['sunD3Long'], $_SESSION['moonD3Long'], $_SESSION['marD3Long'], $_SESSION['merD3Long'], $_SESSION['jupD3Long'], $_SESSION['venD3Long'], $_SESSION['satD3Long'], $_SESSION['ascD3Long'], "Mer");

$D3_tf_ven = PanchadaMaitri($_SESSION['sunD3Long'], $_SESSION['moonD3Long'], $_SESSION['marD3Long'], $_SESSION['merD3Long'], $_SESSION['jupD3Long'], $_SESSION['venD3Long'], $_SESSION['satD3Long'], $_SESSION['ascD3Long'], "Ven");

$D3_tf_mar = PanchadaMaitri($_SESSION['sunD3Long'], $_SESSION['moonD3Long'], $_SESSION['marD3Long'], $_SESSION['merD3Long'], $_SESSION['jupD3Long'], $_SESSION['venD3Long'], $_SESSION['satD3Long'], $_SESSION['ascD3Long'], "Mar");

$D3_tf_jup = PanchadaMaitri($_SESSION['sunD3Long'], $_SESSION['moonD3Long'], $_SESSION['marD3Long'], $_SESSION['merD3Long'], $_SESSION['jupD3Long'], $_SESSION['venD3Long'], $_SESSION['satD3Long'], $_SESSION['ascD3Long'], "Jup");

$D3_tf_sat = PanchadaMaitri($_SESSION['sunD3Long'], $_SESSION['moonD3Long'], $_SESSION['marD3Long'], $_SESSION['merD3Long'], $_SESSION['jupD3Long'], $_SESSION['venD3Long'], $_SESSION['satD3Long'], $_SESSION['ascD3Long'], "Sat");

//echo "This is Panchadamaitri of Sun : " . $D3_tf_sun . "<br>";

/*

echo "@@@@@@@@@@@@@@@@@@@@@@@" . "<br>";

echo "This is value of D-2 =>  Sun-Sun : " . $D3_tf_sun[0] . "<br>";
echo "This is value of D-2 =>  Sun-Moon : " . $D3_tf_sun[1] . "<br>";
echo "This is value of D-2 =>  Sun-Mar : " . $D3_tf_sun[2] . "<br>";
echo "This is value of D-2 =>  Sun-Mer : " . $D3_tf_sun[3] . "<br>";
echo "This is value of D-2 =>  Sun-Jup : " . $D3_tf_sun[4] . "<br>";
echo "This is value of D-2 =>  Sun-Ven : " . $D3_tf_sun[5] . "<br>";
echo "This is value of D-2 =>  Sun-Sat : " . $D3_tf_sun[6] . "<br>";

echo "******************" . "<br>";
*/
?>
<br>
<table>
<tr>
<td colspan="8">D-3 Panchadamaitri</td>
</tr>
<tr>
<td>Planet</td><td>Sun</td><td>Moon</td><td>Mars</td><td>Mercury</td><td>Jupiter</td><td>Venus</td><td>Saturn</td>
</tr>
<tr>
<td>Sun</td><td><?php echo $D3_tf_sun[0] ?></td><td><?php echo $D3_tf_sun[1] ?></td><td><?php echo $D3_tf_sun[2] ?></td><td><?php echo $D3_tf_sun[3] ?></td><td><?php echo $D3_tf_sun[4] ?></td><td><?php echo $D3_tf_sun[5] ?></td><td><?php echo $D3_tf_sun[6] ?></td>
</tr>
<tr>
<td>Moon</td><td><?php echo $D3_tf_moon[0] ?></td><td><?php echo $D3_tf_moon[1] ?></td><td><?php echo $D3_tf_moon[2] ?></td><td><?php echo $D3_tf_moon[3] ?></td><td><?php echo $D3_tf_moon[4] ?></td><td><?php echo $D3_tf_moon[5] ?></td><td><?php echo $D3_tf_moon[6] ?></td>
</tr>

<tr>
<td>Mars</td><td><?php echo $D3_tf_mar[0] ?></td><td><?php echo $D3_tf_mar[1] ?></td><td><?php echo $D3_tf_mar[2] ?></td><td><?php echo $D3_tf_mar[3] ?></td><td><?php echo $D3_tf_mar[4] ?></td><td><?php echo $D3_tf_mar[5] ?></td><td><?php echo $D3_tf_mar[6] ?></td>
</tr>

<tr>
<td>Mercury</td><td><?php echo $D3_tf_mer[0] ?></td><td><?php echo $D3_tf_mer[1] ?></td><td><?php echo $D3_tf_mer[2] ?></td><td><?php echo $D3_tf_mer[3] ?></td><td><?php echo $D3_tf_mer[4] ?></td><td><?php echo $D3_tf_mer[5] ?></td><td><?php echo $D3_tf_mer[6] ?></td>
</tr>

<tr>
<td>Jupiter</td><td><?php echo $D3_tf_jup[0] ?></td><td><?php echo $D3_tf_jup[1] ?></td><td><?php echo $D3_tf_jup[2] ?></td><td><?php echo $D3_tf_jup[3] ?></td><td><?php echo $D3_tf_jup[4] ?></td><td><?php echo $D3_tf_jup[5] ?></td><td><?php echo $D3_tf_jup[6] ?></td>
</tr>

<tr>
<td>Venus</td><td><?php echo $D3_tf_ven[0] ?></td><td><?php echo $D3_tf_ven[1] ?></td><td><?php echo $D3_tf_ven[2] ?></td><td><?php echo $D3_tf_ven[3] ?></td><td><?php echo $D3_tf_ven[4] ?></td><td><?php echo $D3_tf_ven[5] ?></td><td><?php echo $D3_tf_ven[6] ?></td>
</tr>

<tr>
<td>Saturn</td><td><?php echo $D3_tf_sat[0] ?></td><td><?php echo $D3_tf_sat[1] ?></td><td><?php echo $D3_tf_sat[2] ?></td><td><?php echo $D3_tf_sat[3] ?></td><td><?php echo $D3_tf_sat[4] ?></td><td><?php echo $D3_tf_sat[5] ?></td><td><?php echo $D3_tf_sat[6] ?></td>
</tr>

</table>
<br>
<br>

<!--Calculation of Panchada Maitri for D-3 Hora Ends -->

<br>
<?php

// Calculation of Panchada Maitri for D-7 Starts

// D-7 Saptamsa chart Calculation Begins'

$ascD7Long = DivPlanetLongitude($_SESSION['tmp_Asc'],7,1);
$_SESSION['ascD7Long'] = fmod($ascD7Long,360);

$sunD7Long = DivPlanetLongitude($_SESSION['tmp_Long_Sun'],7,1);
$_SESSION['sunD7Long'] = fmod($sunD7Long,360);

$moonD7Long = DivPlanetLongitude($_SESSION['tmp_Long_Moon'],7,1);
$_SESSION['moonD7Long'] = fmod($moonD7Long,360);

$marD7Long = DivPlanetLongitude($_SESSION['tmp_Long_Mar'],7,1);
$_SESSION['marD7Long'] = fmod($marD7Long,360);


$merD7Long = DivPlanetLongitude($_SESSION['tmp_Long_Mer'],7,1);
$_SESSION['merD7Long'] = fmod($merD7Long,360);


$jupD7Long = DivPlanetLongitude($_SESSION['tmp_Long_Jup'],7,1);
$_SESSION['jupD7Long'] = fmod($jupD7Long,360);


$venD7Long = DivPlanetLongitude($_SESSION['tmp_Long_Ven'],7,1);
$_SESSION['venD7Long'] = fmod($venD7Long,360);


$satD7Long = DivPlanetLongitude($_SESSION['tmp_Long_Sat'],7,1);
$_SESSION['satD7Long'] = fmod($satD7Long,360);


$rahD7Long = DivPlanetLongitude($_SESSION['tmp_Long_Rah'],7,1);
$_SESSION['rahD7Long'] = fmod($rahD7Long,360);


$ketD7Long = DivPlanetLongitude($_SESSION['tmp_Long_Ket'],7,1);
$_SESSION['ketD7Long'] = fmod($ketD7Long,360);



$D7_tf_sun = PanchadaMaitri($_SESSION['sunD7Long'], $_SESSION['moonD7Long'], $_SESSION['marD7Long'], $_SESSION['merD7Long'], $_SESSION['jupD7Long'], $_SESSION['venD7Long'], $_SESSION['satD7Long'], $_SESSION['ascD7Long'], "Sun");

$D7_tf_moon = PanchadaMaitri($_SESSION['sunD7Long'], $_SESSION['moonD7Long'], $_SESSION['marD7Long'], $_SESSION['merD7Long'], $_SESSION['jupD7Long'], $_SESSION['venD7Long'], $_SESSION['satD7Long'], $_SESSION['ascD7Long'], "Moon");

$D7_tf_mer = PanchadaMaitri($_SESSION['sunD7Long'], $_SESSION['moonD7Long'], $_SESSION['marD7Long'], $_SESSION['merD7Long'], $_SESSION['jupD7Long'], $_SESSION['venD7Long'], $_SESSION['satD7Long'], $_SESSION['ascD7Long'], "Mer");

$D7_tf_ven = PanchadaMaitri($_SESSION['sunD7Long'], $_SESSION['moonD7Long'], $_SESSION['marD7Long'], $_SESSION['merD7Long'], $_SESSION['jupD7Long'], $_SESSION['venD7Long'], $_SESSION['satD7Long'], $_SESSION['ascD7Long'], "Ven");

$D7_tf_mar = PanchadaMaitri($_SESSION['sunD7Long'], $_SESSION['moonD7Long'], $_SESSION['marD7Long'], $_SESSION['merD7Long'], $_SESSION['jupD7Long'], $_SESSION['venD7Long'], $_SESSION['satD7Long'], $_SESSION['ascD7Long'], "Mar");

$D7_tf_jup = PanchadaMaitri($_SESSION['sunD7Long'], $_SESSION['moonD7Long'], $_SESSION['marD7Long'], $_SESSION['merD7Long'], $_SESSION['jupD7Long'], $_SESSION['venD7Long'], $_SESSION['satD7Long'], $_SESSION['ascD7Long'], "Jup");

$D7_tf_sat = PanchadaMaitri($_SESSION['sunD7Long'], $_SESSION['moonD7Long'], $_SESSION['marD7Long'], $_SESSION['merD7Long'], $_SESSION['jupD7Long'], $_SESSION['venD7Long'], $_SESSION['satD7Long'], $_SESSION['ascD7Long'], "Sat");


//echo "This is value of D-7 =>  Sat-Sat : " . $_SESSION['satD7Long'] . "<br>";
//echo "This is Panchadamaitri of Sun : " . $D7_tf_sun . "<br>";

/*

echo "@@@@@@@@@@@@@@@@@@@@@@@" . "<br>";

echo "This is value of D-2 =>  Sun-Sun : " . $D7_tf_sun[0] . "<br>";
echo "This is value of D-2 =>  Sun-Moon : " . $D7_tf_sun[1] . "<br>";
echo "This is value of D-2 =>  Sun-Mar : " . $D7_tf_sun[2] . "<br>";
echo "This is value of D-2 =>  Sun-Mer : " . $D7_tf_sun[3] . "<br>";
echo "This is value of D-2 =>  Sun-Jup : " . $D7_tf_sun[4] . "<br>";
echo "This is value of D-2 =>  Sun-Ven : " . $D7_tf_sun[5] . "<br>";
echo "This is value of D-2 =>  Sun-Sat : " . $D7_tf_sun[6] . "<br>";

echo "******************" . "<br>";
*/
?>
<br>
<table>
<tr>
<td colspan="8">D-7 Panchadamaitri</td>
</tr>
<tr>
<td>Planet</td><td>Sun</td><td>Moon</td><td>Mars</td><td>Mercury</td><td>Jupiter</td><td>Venus</td><td>Saturn</td>
</tr>
<tr>
<td>Sun</td><td><?php echo $D7_tf_sun[0] ?></td><td><?php echo $D7_tf_sun[1] ?></td><td><?php echo $D7_tf_sun[2] ?></td><td><?php echo $D7_tf_sun[3] ?></td><td><?php echo $D7_tf_sun[4] ?></td><td><?php echo $D7_tf_sun[5] ?></td><td><?php echo $D7_tf_sun[6] ?></td>
</tr>
<tr>
<td>Moon</td><td><?php echo $D7_tf_moon[0] ?></td><td><?php echo $D7_tf_moon[1] ?></td><td><?php echo $D7_tf_moon[2] ?></td><td><?php echo $D7_tf_moon[3] ?></td><td><?php echo $D7_tf_moon[4] ?></td><td><?php echo $D7_tf_moon[5] ?></td><td><?php echo $D7_tf_moon[6] ?></td>
</tr>

<tr>
<td>Mars</td><td><?php echo $D7_tf_mar[0] ?></td><td><?php echo $D7_tf_mar[1] ?></td><td><?php echo $D7_tf_mar[2] ?></td><td><?php echo $D7_tf_mar[3] ?></td><td><?php echo $D7_tf_mar[4] ?></td><td><?php echo $D7_tf_mar[5] ?></td><td><?php echo $D7_tf_mar[6] ?></td>
</tr>

<tr>
<td>Mercury</td><td><?php echo $D7_tf_mer[0] ?></td><td><?php echo $D7_tf_mer[1] ?></td><td><?php echo $D7_tf_mer[2] ?></td><td><?php echo $D7_tf_mer[3] ?></td><td><?php echo $D7_tf_mer[4] ?></td><td><?php echo $D7_tf_mer[5] ?></td><td><?php echo $D7_tf_mer[6] ?></td>
</tr>

<tr>
<td>Jupiter</td><td><?php echo $D7_tf_jup[0] ?></td><td><?php echo $D7_tf_jup[1] ?></td><td><?php echo $D7_tf_jup[2] ?></td><td><?php echo $D7_tf_jup[3] ?></td><td><?php echo $D7_tf_jup[4] ?></td><td><?php echo $D7_tf_jup[5] ?></td><td><?php echo $D7_tf_jup[6] ?></td>
</tr>

<tr>
<td>Venus</td><td><?php echo $D7_tf_ven[0] ?></td><td><?php echo $D7_tf_ven[1] ?></td><td><?php echo $D7_tf_ven[2] ?></td><td><?php echo $D7_tf_ven[3] ?></td><td><?php echo $D7_tf_ven[4] ?></td><td><?php echo $D7_tf_ven[5] ?></td><td><?php echo $D7_tf_ven[6] ?></td>
</tr>

<tr>
<td>Saturn</td><td><?php echo $D7_tf_sat[0] ?></td><td><?php echo $D7_tf_sat[1] ?></td><td><?php echo $D7_tf_sat[2] ?></td><td><?php echo $D7_tf_sat[3] ?></td><td><?php echo $D7_tf_sat[4] ?></td><td><?php echo $D7_tf_sat[5] ?></td><td><?php echo $D7_tf_sat[6] ?></td>
</tr>

</table>
<br>
<br>
<!--Calculation of Panchada Maitri for D-7 Hora Ends -->

<br>
<?php

// Calculation of Panchada Maitri for D-12 Starts

// D-12 Dwadasamsa chart Calculation Begins'

$ascD12Long = DivPlanetLongitude($_SESSION['tmp_Asc'],12,1);
$_SESSION['ascD12Long'] = fmod($ascD12Long,360);

$sunD12Long = DivPlanetLongitude($_SESSION['tmp_Long_Sun'],12,1);
$_SESSION['sunD12Long'] = fmod($sunD12Long,360);

$moonD12Long = DivPlanetLongitude($_SESSION['tmp_Long_Moon'],12,1);
$_SESSION['moonD12Long'] = fmod($moonD12Long,360);

$marD12Long = DivPlanetLongitude($_SESSION['tmp_Long_Mar'],12,1);
$_SESSION['marD12Long'] = fmod($marD12Long,360);


$merD12Long = DivPlanetLongitude($_SESSION['tmp_Long_Mer'],12,1);
$_SESSION['merD12Long'] = fmod($merD12Long,360);


$jupD12Long = DivPlanetLongitude($_SESSION['tmp_Long_Jup'],12,1);
$_SESSION['jupD12Long'] = fmod($jupD12Long,360);


$venD12Long = DivPlanetLongitude($_SESSION['tmp_Long_Ven'],12,1);
$_SESSION['venD12Long'] = fmod($venD12Long,360);


$satD12Long = DivPlanetLongitude($_SESSION['tmp_Long_Sat'],12,1);
$_SESSION['satD12Long'] = fmod($satD12Long,360);


$rahD12Long = DivPlanetLongitude($_SESSION['tmp_Long_Rah'],12,1);
$_SESSION['rahD12Long'] = fmod($rahD12Long,360);


$ketD12Long = DivPlanetLongitude($_SESSION['tmp_Long_Ket'],12,1);
$_SESSION['ketD12Long'] = fmod($ketD12Long,360);



$D12_tf_sun = PanchadaMaitri($_SESSION['sunD12Long'], $_SESSION['moonD12Long'], $_SESSION['marD12Long'], $_SESSION['merD12Long'], $_SESSION['jupD12Long'], $_SESSION['venD12Long'], $_SESSION['satD12Long'], $_SESSION['ascD12Long'], "Sun");

$D12_tf_moon = PanchadaMaitri($_SESSION['sunD12Long'], $_SESSION['moonD12Long'], $_SESSION['marD12Long'], $_SESSION['merD12Long'], $_SESSION['jupD12Long'], $_SESSION['venD12Long'], $_SESSION['satD12Long'], $_SESSION['ascD12Long'], "Moon");

$D12_tf_mer = PanchadaMaitri($_SESSION['sunD12Long'], $_SESSION['moonD12Long'], $_SESSION['marD12Long'], $_SESSION['merD12Long'], $_SESSION['jupD12Long'], $_SESSION['venD12Long'], $_SESSION['satD12Long'], $_SESSION['ascD12Long'], "Mer");

$D12_tf_ven = PanchadaMaitri($_SESSION['sunD12Long'], $_SESSION['moonD12Long'], $_SESSION['marD12Long'], $_SESSION['merD12Long'], $_SESSION['jupD12Long'], $_SESSION['venD12Long'], $_SESSION['satD12Long'], $_SESSION['ascD12Long'], "Ven");

$D12_tf_mar = PanchadaMaitri($_SESSION['sunD12Long'], $_SESSION['moonD12Long'], $_SESSION['marD12Long'], $_SESSION['merD12Long'], $_SESSION['jupD12Long'], $_SESSION['venD12Long'], $_SESSION['satD12Long'], $_SESSION['ascD12Long'], "Mar");

$D12_tf_jup = PanchadaMaitri($_SESSION['sunD12Long'], $_SESSION['moonD12Long'], $_SESSION['marD12Long'], $_SESSION['merD12Long'], $_SESSION['jupD12Long'], $_SESSION['venD12Long'], $_SESSION['satD12Long'], $_SESSION['ascD12Long'], "Jup");

$D12_tf_sat = PanchadaMaitri($_SESSION['sunD12Long'], $_SESSION['moonD12Long'], $_SESSION['marD12Long'], $_SESSION['merD12Long'], $_SESSION['jupD12Long'], $_SESSION['venD12Long'], $_SESSION['satD12Long'], $_SESSION['ascD12Long'], "Sat");

//echo "This is Panchadamaitri of Sun : " . $D12_tf_sun . "<br>";

/*

echo "@@@@@@@@@@@@@@@@@@@@@@@" . "<br>";

echo "This is value of D-2 =>  Sun-Sun : " . $D12_tf_sun[0] . "<br>";
echo "This is value of D-2 =>  Sun-Moon : " . $D12_tf_sun[1] . "<br>";
echo "This is value of D-2 =>  Sun-Mar : " . $D12_tf_sun[2] . "<br>";
echo "This is value of D-2 =>  Sun-Mer : " . $D12_tf_sun[3] . "<br>";
echo "This is value of D-2 =>  Sun-Jup : " . $D12_tf_sun[4] . "<br>";
echo "This is value of D-2 =>  Sun-Ven : " . $D12_tf_sun[5] . "<br>";
echo "This is value of D-2 =>  Sun-Sat : " . $D12_tf_sun[6] . "<br>";

echo "******************" . "<br>";
*/
?>
<br>
<table>
<tr>
<td colspan="8">D-12 Panchadamaitri</td>
</tr>
<tr>
<td>Planet</td><td>Sun</td><td>Moon</td><td>Mars</td><td>Mercury</td><td>Jupiter</td><td>Venus</td><td>Saturn</td>
</tr>
<tr>
<td>Sun</td><td><?php echo $D12_tf_sun[0] ?></td><td><?php echo $D12_tf_sun[1] ?></td><td><?php echo $D12_tf_sun[2] ?></td><td><?php echo $D12_tf_sun[3] ?></td><td><?php echo $D12_tf_sun[4] ?></td><td><?php echo $D12_tf_sun[5] ?></td><td><?php echo $D12_tf_sun[6] ?></td>
</tr>
<tr>
<td>Moon</td><td><?php echo $D12_tf_moon[0] ?></td><td><?php echo $D12_tf_moon[1] ?></td><td><?php echo $D12_tf_moon[2] ?></td><td><?php echo $D12_tf_moon[3] ?></td><td><?php echo $D12_tf_moon[4] ?></td><td><?php echo $D12_tf_moon[5] ?></td><td><?php echo $D12_tf_moon[6] ?></td>
</tr>

<tr>
<td>Mars</td><td><?php echo $D12_tf_mar[0] ?></td><td><?php echo $D12_tf_mar[1] ?></td><td><?php echo $D12_tf_mar[2] ?></td><td><?php echo $D12_tf_mar[3] ?></td><td><?php echo $D12_tf_mar[4] ?></td><td><?php echo $D12_tf_mar[5] ?></td><td><?php echo $D12_tf_mar[6] ?></td>
</tr>

<tr>
<td>Mercury</td><td><?php echo $D12_tf_mer[0] ?></td><td><?php echo $D12_tf_mer[1] ?></td><td><?php echo $D12_tf_mer[2] ?></td><td><?php echo $D12_tf_mer[3] ?></td><td><?php echo $D12_tf_mer[4] ?></td><td><?php echo $D12_tf_mer[5] ?></td><td><?php echo $D12_tf_mer[6] ?></td>
</tr>

<tr>
<td>Jupiter</td><td><?php echo $D12_tf_jup[0] ?></td><td><?php echo $D12_tf_jup[1] ?></td><td><?php echo $D12_tf_jup[2] ?></td><td><?php echo $D12_tf_jup[3] ?></td><td><?php echo $D12_tf_jup[4] ?></td><td><?php echo $D12_tf_jup[5] ?></td><td><?php echo $D12_tf_jup[6] ?></td>
</tr>

<tr>
<td>Venus</td><td><?php echo $D12_tf_ven[0] ?></td><td><?php echo $D12_tf_ven[1] ?></td><td><?php echo $D12_tf_ven[2] ?></td><td><?php echo $D12_tf_ven[3] ?></td><td><?php echo $D12_tf_ven[4] ?></td><td><?php echo $D12_tf_ven[5] ?></td><td><?php echo $D12_tf_ven[6] ?></td>
</tr>

<tr>
<td>Saturn</td><td><?php echo $D12_tf_sat[0] ?></td><td><?php echo $D12_tf_sat[1] ?></td><td><?php echo $D12_tf_sat[2] ?></td><td><?php echo $D12_tf_sat[3] ?></td><td><?php echo $D12_tf_sat[4] ?></td><td><?php echo $D12_tf_sat[5] ?></td><td><?php echo $D12_tf_sat[6] ?></td>
</tr>

</table>
<br>
<br>

<!--Calculation of Panchada Maitri for D-12  Dwadasamsa Ends -->

<br>
<?php

// Calculation of Panchada Maitri for D-30 Starts

// D-30 Trisamsa chart Calculation Begins'

$ascD30Long = DivPlanetLongitude($_SESSION['tmp_Asc'],30,1);
$_SESSION['ascD30Long'] = fmod($ascD30Long,360);

$sunD30Long = DivPlanetLongitude($_SESSION['tmp_Long_Sun'],30,1);
$_SESSION['sunD30Long'] = fmod($sunD30Long,360);

$moonD30Long = DivPlanetLongitude($_SESSION['tmp_Long_Moon'],30,1);
$_SESSION['moonD30Long'] = fmod($moonD30Long,360);

$marD30Long = DivPlanetLongitude($_SESSION['tmp_Long_Mar'],30,1);
$_SESSION['marD30Long'] = fmod($marD30Long,360);


$merD30Long = DivPlanetLongitude($_SESSION['tmp_Long_Mer'],30,1);
$_SESSION['merD30Long'] = fmod($merD30Long,360);


$jupD30Long = DivPlanetLongitude($_SESSION['tmp_Long_Jup'],30,1);
$_SESSION['jupD30Long'] = fmod($jupD30Long,360);


$venD30Long = DivPlanetLongitude($_SESSION['tmp_Long_Ven'],30,1);
$_SESSION['venD30Long'] = fmod($venD30Long,360);


$satD30Long = DivPlanetLongitude($_SESSION['tmp_Long_Sat'],30,1);
$_SESSION['satD30Long'] = fmod($satD30Long,360);


$rahD30Long = DivPlanetLongitude($_SESSION['tmp_Long_Rah'],30,1);
$_SESSION['rahD30Long'] = fmod($rahD30Long,360);


$ketD30Long = DivPlanetLongitude($_SESSION['tmp_Long_Ket'],30,1);
$_SESSION['ketD30Long'] = fmod($ketD30Long,360);



$D30_tf_sun = PanchadaMaitri($_SESSION['sunD30Long'], $_SESSION['moonD30Long'], $_SESSION['marD30Long'], $_SESSION['merD30Long'], $_SESSION['jupD30Long'], $_SESSION['venD30Long'], $_SESSION['satD30Long'], $_SESSION['ascD30Long'], "Sun");

$D30_tf_moon = PanchadaMaitri($_SESSION['sunD30Long'], $_SESSION['moonD30Long'], $_SESSION['marD30Long'], $_SESSION['merD30Long'], $_SESSION['jupD30Long'], $_SESSION['venD30Long'], $_SESSION['satD30Long'], $_SESSION['ascD30Long'], "Moon");

$D30_tf_mer = PanchadaMaitri($_SESSION['sunD30Long'], $_SESSION['moonD30Long'], $_SESSION['marD30Long'], $_SESSION['merD30Long'], $_SESSION['jupD30Long'], $_SESSION['venD30Long'], $_SESSION['satD30Long'], $_SESSION['ascD30Long'], "Mer");

$D30_tf_ven = PanchadaMaitri($_SESSION['sunD30Long'], $_SESSION['moonD30Long'], $_SESSION['marD30Long'], $_SESSION['merD30Long'], $_SESSION['jupD30Long'], $_SESSION['venD30Long'], $_SESSION['satD30Long'], $_SESSION['ascD30Long'], "Ven");

$D30_tf_mar = PanchadaMaitri($_SESSION['sunD30Long'], $_SESSION['moonD30Long'], $_SESSION['marD30Long'], $_SESSION['merD30Long'], $_SESSION['jupD30Long'], $_SESSION['venD30Long'], $_SESSION['satD30Long'], $_SESSION['ascD30Long'], "Mar");

$D30_tf_jup = PanchadaMaitri($_SESSION['sunD30Long'], $_SESSION['moonD30Long'], $_SESSION['marD30Long'], $_SESSION['merD30Long'], $_SESSION['jupD30Long'], $_SESSION['venD30Long'], $_SESSION['satD30Long'], $_SESSION['ascD30Long'], "Jup");

$D30_tf_sat = PanchadaMaitri($_SESSION['sunD30Long'], $_SESSION['moonD30Long'], $_SESSION['marD30Long'], $_SESSION['merD30Long'], $_SESSION['jupD30Long'], $_SESSION['venD30Long'], $_SESSION['satD30Long'], $_SESSION['ascD30Long'], "Sat");

//echo "This is Panchadamaitri of Sun : " . $D30_tf_sun . "<br>";

/*

echo "@@@@@@@@@@@@@@@@@@@@@@@" . "<br>";

echo "This is value of D-2 =>  Sun-Sun : " . $D30_tf_sun[0] . "<br>";
echo "This is value of D-2 =>  Sun-Moon : " . $D30_tf_sun[1] . "<br>";
echo "This is value of D-2 =>  Sun-Mar : " . $D30_tf_sun[2] . "<br>";
echo "This is value of D-2 =>  Sun-Mer : " . $D30_tf_sun[3] . "<br>";
echo "This is value of D-2 =>  Sun-Jup : " . $D30_tf_sun[4] . "<br>";
echo "This is value of D-2 =>  Sun-Ven : " . $D30_tf_sun[5] . "<br>";
echo "This is value of D-2 =>  Sun-Sat : " . $D30_tf_sun[6] . "<br>";

echo "******************" . "<br>";
*/
?>
<br>
<table>
<tr>
<td colspan="8">D-30 Panchadamaitri</td>
</tr>
<tr>
<td>Planet</td><td>Sun</td><td>Moon</td><td>Mars</td><td>Mercury</td><td>Jupiter</td><td>Venus</td><td>Saturn</td>
</tr>
<tr>
<td>Sun</td><td><?php echo $D30_tf_sun[0] ?></td><td><?php echo $D30_tf_sun[1] ?></td><td><?php echo $D30_tf_sun[2] ?></td><td><?php echo $D30_tf_sun[3] ?></td><td><?php echo $D30_tf_sun[4] ?></td><td><?php echo $D30_tf_sun[5] ?></td><td><?php echo $D30_tf_sun[6] ?></td>
</tr>
<tr>
<td>Moon</td><td><?php echo $D30_tf_moon[0] ?></td><td><?php echo $D30_tf_moon[1] ?></td><td><?php echo $D30_tf_moon[2] ?></td><td><?php echo $D30_tf_moon[3] ?></td><td><?php echo $D30_tf_moon[4] ?></td><td><?php echo $D30_tf_moon[5] ?></td><td><?php echo $D30_tf_moon[6] ?></td>
</tr>

<tr>
<td>Mars</td><td><?php echo $D30_tf_mar[0] ?></td><td><?php echo $D30_tf_mar[1] ?></td><td><?php echo $D30_tf_mar[2] ?></td><td><?php echo $D30_tf_mar[3] ?></td><td><?php echo $D30_tf_mar[4] ?></td><td><?php echo $D30_tf_mar[5] ?></td><td><?php echo $D30_tf_mar[6] ?></td>
</tr>

<tr>
<td>Mercury</td><td><?php echo $D30_tf_mer[0] ?></td><td><?php echo $D30_tf_mer[1] ?></td><td><?php echo $D30_tf_mer[2] ?></td><td><?php echo $D30_tf_mer[3] ?></td><td><?php echo $D30_tf_mer[4] ?></td><td><?php echo $D30_tf_mer[5] ?></td><td><?php echo $D30_tf_mer[6] ?></td>
</tr>

<tr>
<td>Jupiter</td><td><?php echo $D30_tf_jup[0] ?></td><td><?php echo $D30_tf_jup[1] ?></td><td><?php echo $D30_tf_jup[2] ?></td><td><?php echo $D30_tf_jup[3] ?></td><td><?php echo $D30_tf_jup[4] ?></td><td><?php echo $D30_tf_jup[5] ?></td><td><?php echo $D30_tf_jup[6] ?></td>
</tr>

<tr>
<td>Venus</td><td><?php echo $D30_tf_ven[0] ?></td><td><?php echo $D30_tf_ven[1] ?></td><td><?php echo $D30_tf_ven[2] ?></td><td><?php echo $D30_tf_ven[3] ?></td><td><?php echo $D30_tf_ven[4] ?></td><td><?php echo $D30_tf_ven[5] ?></td><td><?php echo $D30_tf_ven[6] ?></td>
</tr>

<tr>
<td>Saturn</td><td><?php echo $D30_tf_sat[0] ?></td><td><?php echo $D30_tf_sat[1] ?></td><td><?php echo $D30_tf_sat[2] ?></td><td><?php echo $D30_tf_sat[3] ?></td><td><?php echo $D30_tf_sat[4] ?></td><td><?php echo $D30_tf_sat[5] ?></td><td><?php echo $D30_tf_sat[6] ?></td>
</tr>

</table>
<!--Calculation of Panchada Maitri for D-30  Trimsamsa Ends -->
<br>
<br>
<!-- Calculation of Saptavargeeya Bala starts -->
<?php

$saptavargabala_D1 = SaptavargaBala($_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Asc'], "D1");

$saptavargabala_D2 = SaptavargaBala($_SESSION['sunD2Long'], $_SESSION['moonD2Long'], $_SESSION['marD2Long'], $_SESSION['merD2Long'], $_SESSION['jupD2Long'], $_SESSION['venD2Long'], $_SESSION['satD2Long'], $_SESSION['ascD2Long'], "D2");

$saptavargabala_D3 = SaptavargaBala($_SESSION['sunD3Long'], $_SESSION['moonD3Long'], $_SESSION['marD3Long'], $_SESSION['merD3Long'], $_SESSION['jupD3Long'], $_SESSION['venD3Long'], $_SESSION['satD3Long'], $_SESSION['ascD3Long'], "D3");

$saptavargabala_D7 = SaptavargaBala($_SESSION['sunD7Long'], $_SESSION['moonD7Long'], $_SESSION['marD7Long'], $_SESSION['merD7Long'], $_SESSION['jupD7Long'], $_SESSION['venD7Long'], $_SESSION['satD7Long'], $_SESSION['ascD7Long'], "D7");

$saptavargabala_D9 = SaptavargaBala($_SESSION['sunNLong'], $_SESSION['moonNLong'], $_SESSION['marNLong'], $_SESSION['merNLong'], $_SESSION['jupNLong'], $_SESSION['venNLong'], $_SESSION['satNLong'], $_SESSION['ascNLong'], "D9");

$saptavargabala_D12 = SaptavargaBala($_SESSION['sunD12Long'], $_SESSION['moonD12Long'], $_SESSION['marD12Long'], $_SESSION['merD12Long'], $_SESSION['jupD12Long'], $_SESSION['venD12Long'], $_SESSION['satD12Long'], $_SESSION['ascD12Long'], "D12");

$saptavargabala_D30 = SaptavargaBala($_SESSION['sunD30Long'], $_SESSION['moonD30Long'], $_SESSION['marD30Long'], $_SESSION['merD30Long'], $_SESSION['jupD30Long'], $_SESSION['venD30Long'], $_SESSION['satD30Long'], $_SESSION['ascD30Long'], "D30");


// Total of Saptavargeya of Planets calculation starts

$saptavargabala_sun = $saptavargabala_D1[0] + $saptavargabala_D2[0] + $saptavargabala_D3[0] + $saptavargabala_D7[0] + $saptavargabala_D9[0] + $saptavargabala_D12[0] + $saptavargabala_D30[0];

$saptavargabala_moon = $saptavargabala_D1[1] + $saptavargabala_D2[1] + $saptavargabala_D3[1] + $saptavargabala_D7[1] + $saptavargabala_D9[1] + $saptavargabala_D12[1] + $saptavargabala_D30[1];

$saptavargabala_mar = $saptavargabala_D1[2] + $saptavargabala_D2[2] + $saptavargabala_D3[2] + $saptavargabala_D7[2] + $saptavargabala_D9[2] + $saptavargabala_D12[2] + $saptavargabala_D30[2];

$saptavargabala_mer = $saptavargabala_D1[3] + $saptavargabala_D2[3] + $saptavargabala_D3[3] + $saptavargabala_D7[3] + $saptavargabala_D9[3] + $saptavargabala_D12[3] + $saptavargabala_D30[3];

$saptavargabala_jup = $saptavargabala_D1[4] + $saptavargabala_D2[4] + $saptavargabala_D3[4] + $saptavargabala_D7[4] + $saptavargabala_D9[4] + $saptavargabala_D12[4] + $saptavargabala_D30[4];

$saptavargabala_ven = $saptavargabala_D1[5] + $saptavargabala_D2[5] + $saptavargabala_D3[5] + $saptavargabala_D7[5] + $saptavargabala_D9[5] + $saptavargabala_D12[5] + $saptavargabala_D30[5];

$saptavargabala_sat = $saptavargabala_D1[6] + $saptavargabala_D2[6] + $saptavargabala_D3[6] + $saptavargabala_D7[6] + $saptavargabala_D9[6] + $saptavargabala_D12[6] + $saptavargabala_D30[6];
// Total of Saptavargeya of Planets calculation ends



// Calculation of Sthana Bala Summary starts

$sthana_bala_sun = $uchabala_sun + $kendrabala_sun + $drekkanabala_sun + $ojayugmabala_sun + $saptavargabala_sun; 
$sthana_bala_moon = $uchabala_moon + $kendrabala_moon + $drekkanabala_moon + $ojayugmabala_moon + $saptavargabala_moon; 
$sthana_bala_mar = $uchabala_mar + $kendrabala_mar + $drekkanabala_mar + $ojayugmabala_mar + $saptavargabala_mar; 
$sthana_bala_mer = $uchabala_mer + $kendrabala_mer + $drekkanabala_mer + $ojayugmabala_mer + $saptavargabala_mer; 
$sthana_bala_jup = $uchabala_jup + $kendrabala_jup + $drekkanabala_jup + $ojayugmabala_jup + $saptavargabala_jup; 
$sthana_bala_ven = $uchabala_ven + $kendrabala_ven + $drekkanabala_ven + $ojayugmabala_ven + $saptavargabala_ven;
$sthana_bala_sat = $uchabala_sat + $kendrabala_sat + $drekkanabala_sat + $ojayugmabala_sat + $saptavargabala_sat; 



// Calculation of Sthana Bala Summary ends



echo "@@@@@@@@@@@@@@@@@@@@@@@" . "<br>";

echo "This is Saptavargeeya Bala of D-1 : =>  Sun-Sun : " . $saptavargabala_D1[0] . "<br>";
echo "This is Saptavargeeya Bala of D-1 : =>  Sun-Moon : " . $saptavargabala_D1[1] . "<br>";
echo "This is Saptavargeeya Bala of D-1 : =>  Sun-Mar : " . $saptavargabala_D1[2] . "<br>";
echo "This is Saptavargeeya Bala of D-1 : =>  Sun-Mer : " . $saptavargabala_D1[3] . "<br>";
echo "This is Saptavargeeya Bala of D-1 : =>  Sun-Jup : " . $saptavargabala_D1[4] . "<br>";
echo "This is Saptavargeeya Bala of D-1 : =>  Sun-Ven : " . $saptavargabala_D1[5] . "<br>";
echo "This is Saptavargeeya Bala of D-1 : =>  Sun-Sat : " . $saptavargabala_D1[6] . "<br>";

echo "******************" . "<br>";

echo "@@@@@@@@@@@@@@@@@@@@@@@" . "<br>";

echo "This is Saptavargeeya Bala of D-2 : =>  Sun-Sun : " . $saptavargabala_D2[0] . "<br>";
echo "This is Saptavargeeya Bala of D-2 : =>  Sun-Moon : " . $saptavargabala_D2[1] . "<br>";
echo "This is Saptavargeeya Bala of D-2 : =>  Sun-Mar : " . $saptavargabala_D2[2] . "<br>";
echo "This is Saptavargeeya Bala of D-2 : =>  Sun-Mer : " . $saptavargabala_D2[3] . "<br>";
echo "This is Saptavargeeya Bala of D-2 : =>  Sun-Jup : " . $saptavargabala_D2[4] . "<br>";
echo "This is Saptavargeeya Bala of D-2 : =>  Sun-Ven : " . $saptavargabala_D2[5] . "<br>";
echo "This is Saptavargeeya Bala of D-2 : =>  Sun-Sat : " . $saptavargabala_D2[6] . "<br>";

echo "******************" . "<br>";

echo "@@@@@@@@@@@@@@@@@@@@@@@" . "<br>";

echo "This is Saptavargeeya Bala of D-3 : =>  Sun-Sun : " . $saptavargabala_D3[0] . "<br>";
echo "This is Saptavargeeya Bala of D-3 : =>  Sun-Moon : " . $saptavargabala_D3[1] . "<br>";
echo "This is Saptavargeeya Bala of D-3 : =>  Sun-Mar : " . $saptavargabala_D3[2] . "<br>";
echo "This is Saptavargeeya Bala of D-3 : =>  Sun-Mer : " . $saptavargabala_D3[3] . "<br>";
echo "This is Saptavargeeya Bala of D-3 : =>  Sun-Jup : " . $saptavargabala_D3[4] . "<br>";
echo "This is Saptavargeeya Bala of D-3 : =>  Sun-Ven : " . $saptavargabala_D3[5] . "<br>";
echo "This is Saptavargeeya Bala of D-3 : =>  Sun-Sat : " . $saptavargabala_D3[6] . "<br>";

echo "******************" . "<br>";

echo "@@@@@@@@@@@@@@@@@@@@@@@" . "<br>";

echo "This is Saptavargeeya Bala of D-7 : =>  Sun-Sun : " . $saptavargabala_D7[0] . "<br>";
echo "This is Saptavargeeya Bala of D-7 : =>  Sun-Moon : " . $saptavargabala_D7[1] . "<br>";
echo "This is Saptavargeeya Bala of D-7 : =>  Sun-Mar : " . $saptavargabala_D7[2] . "<br>";
echo "This is Saptavargeeya Bala of D-7 : =>  Sun-Mer : " . $saptavargabala_D7[3] . "<br>";
echo "This is Saptavargeeya Bala of D-7 : =>  Sun-Jup : " . $saptavargabala_D7[4] . "<br>";
echo "This is Saptavargeeya Bala of D-7 : =>  Sun-Ven : " . $saptavargabala_D7[5] . "<br>";
echo "This is Saptavargeeya Bala of D-7 : =>  Sun-Sat : " . $saptavargabala_D7[6] . "<br>";

echo "******************" . "<br>";

echo "@@@@@@@@@@@@@@@@@@@@@@@" . "<br>";

echo "This is Saptavargeeya Bala of D-9 : =>  Sun-Sun : " . $saptavargabala_D9[0] . "<br>";
echo "This is Saptavargeeya Bala of D-9 : =>  Sun-Moon : " . $saptavargabala_D9[1] . "<br>";
echo "This is Saptavargeeya Bala of D-9 : =>  Sun-Mar : " . $saptavargabala_D9[2] . "<br>";
echo "This is Saptavargeeya Bala of D-9 : =>  Sun-Mer : " . $saptavargabala_D9[3] . "<br>";
echo "This is Saptavargeeya Bala of D-9 : =>  Sun-Jup : " . $saptavargabala_D9[4] . "<br>";
echo "This is Saptavargeeya Bala of D-9 : =>  Sun-Ven : " . $saptavargabala_D9[5] . "<br>";
echo "This is Saptavargeeya Bala of D-9 : =>  Sun-Sat : " . $saptavargabala_D9[6] . "<br>";

echo "******************" . "<br>";

echo "@@@@@@@@@@@@@@@@@@@@@@@" . "<br>";

echo "This is Saptavargeeya Bala of D-12 : =>  Sun-Sun : " . $saptavargabala_D12[0] . "<br>";
echo "This is Saptavargeeya Bala of D-12 : =>  Sun-Moon : " . $saptavargabala_D12[1] . "<br>";
echo "This is Saptavargeeya Bala of D-12 : =>  Sun-Mar : " . $saptavargabala_D12[2] . "<br>";
echo "This is Saptavargeeya Bala of D-12 : =>  Sun-Mer : " . $saptavargabala_D12[3] . "<br>";
echo "This is Saptavargeeya Bala of D-12 : =>  Sun-Jup : " . $saptavargabala_D12[4] . "<br>";
echo "This is Saptavargeeya Bala of D-12 : =>  Sun-Ven : " . $saptavargabala_D12[5] . "<br>";
echo "This is Saptavargeeya Bala of D-12 : =>  Sun-Sat : " . $saptavargabala_D12[6] . "<br>";

echo "******************" . "<br>";

echo "@@@@@@@@@@@@@@@@@@@@@@@" . "<br>";

echo "This is Saptavargeeya Bala of D-30 : =>  Sun-Sun : " . $saptavargabala_D30[0] . "<br>";
echo "This is Saptavargeeya Bala of D-30 : =>  Sun-Moon : " . $saptavargabala_D30[1] . "<br>";
echo "This is Saptavargeeya Bala of D-30 : =>  Sun-Mar : " . $saptavargabala_D30[2] . "<br>";
echo "This is Saptavargeeya Bala of D-30 : =>  Sun-Mer : " . $saptavargabala_D30[3] . "<br>";
echo "This is Saptavargeeya Bala of D-30 : =>  Sun-Jup : " . $saptavargabala_D30[4] . "<br>";
echo "This is Saptavargeeya Bala of D-30 : =>  Sun-Ven : " . $saptavargabala_D30[5] . "<br>";
echo "This is Saptavargeeya Bala of D-30 : =>  Sun-Sat : " . $saptavargabala_D30[6] . "<br>";

echo "******************" . "<br>";

echo "@@@@@@@@@@@@@@@@@@@@@@@" . "<br>";

echo "This is Saptavargeeya Bala of Sun : " . $saptavargabala_sun . "<br>";
echo "This is Saptavargeeya Bala of Moon : " . $saptavargabala_moon . "<br>";
echo "This is Saptavargeeya Bala of Mar : " . $saptavargabala_mar . "<br>";
echo "This is Saptavargeeya Bala of Mer : " . $saptavargabala_mer . "<br>";
echo "This is Saptavargeeya Bala of Jup : " . $saptavargabala_jup . "<br>";
echo "This is Saptavargeeya Bala of Ven : " . $saptavargabala_ven . "<br>";
echo "This is Saptavargeeya Bala of Sat : " . $saptavargabala_sat . "<br>";

echo "******************" . "<br>";
echo "@@@ STHANA BALA @@@@@@@@@@@@@@@@@@@@" . "<br>";

echo "This is Saptavargeeya Bala of Sun : " . $sthana_bala_sun . "<br>";
echo "This is Saptavargeeya Bala of Moon : " . $sthana_bala_moon . "<br>";
echo "This is Saptavargeeya Bala of Mar : " . $sthana_bala_mar . "<br>";
echo "This is Saptavargeeya Bala of Mer : " . $sthana_bala_mer . "<br>";
echo "This is Saptavargeeya Bala of Jup : " . $sthana_bala_jup . "<br>";
echo "This is Saptavargeeya Bala of Ven : " . $sthana_bala_ven . "<br>";
echo "This is Saptavargeeya Bala of Sat : " . $sthana_bala_sat . "<br>";

echo "******************" . "<br>";
// Calculation of Paksha Bala

	// pakshabala
if ($_SESSION['tmp_Long_Moon'] > $_SESSION['tmp_Long_Sun'])
{
$paksha_value = ($_SESSION['tmp_Long_Moon'] - $_SESSION['tmp_Long_Sun'])/3;
}
else
{
$paksha_value = (($_SESSION['tmp_Long_Moon'] - $_SESSION['tmp_Long_Sun'])/3) * -1;
}

if ($paksha_value > 60)
{
	$paksha_value = 120 - $paksha_value;
}
else
{
	$paksha_value = $paksha_value;
}

echo "This is Paksha Value :" . $paksha_value . "<br>";

//planetDistance( horoscope->getVedicLongitude( OSUN ), horoscope->getVedicLongitude( OMOON ) ) / 3;

$pakshabala_sun = 60 - $paksha_value;
$pakshabala_moon = 2 * $paksha_value;
/*
If ($_SESSION['tmp_Long_Moon'] = $_SESSION['tmp_Long_Sun'])
{
$pakshabala_moon = 2 * $paskha_value;
}
else
{
$pakshabala_moon = 2 * $paskha_value;
}
*/
$pakshabala_mar = 60 - $paksha_value;
//$pakshabala_mer = ( horoscope->isBenefic( OMERCURY ) ? paskha_value : 60 - paskha_value );;
$pakshabala_jup = $paksha_value;
$pakshabala_ven = $paksha_value;
$pakshabala_sat = 60 - $paksha_value;

echo "This is Paksha Bala of Sun :" . $pakshabala_sun . "<br>";
echo "This is Paksha Bala of Moon :" . $pakshabala_moon . "<br>";
echo "This is Paksha Bala of Mar :" . $pakshabala_mar . "<br>";
echo "This is Paksha Bala of Jup :" . $pakshabala_jup . "<br>";
echo "This is Paksha Bala of Ven :" . $pakshabala_ven . "<br>";
echo "This is Paksha Bala of Sat :" . $pakshabala_sat . "<br>";

// Tribaghi Bala starts


// Tribaghi bala Ends


// Calculation of Drika Bala Starts

$dk_sun = calcDrikBala($_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Long_Rah'], $_SESSION['tmp_Long_Ket'], "Sun");

$dk_moon = calcDrikBala($_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Long_Rah'], $_SESSION['tmp_Long_Ket'], "Moon");

$dk_mar = calcDrikBala($_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Long_Rah'], $_SESSION['tmp_Long_Ket'], "Mar");

$dk_mer = calcDrikBala($_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Long_Rah'], $_SESSION['tmp_Long_Ket'], "Mer");

$dk_jup = calcDrikBala($_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Long_Rah'], $_SESSION['tmp_Long_Ket'], "Jup");

$dk_ven = calcDrikBala($_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Long_Rah'], $_SESSION['tmp_Long_Ket'], "Ven");

$dk_sat = calcDrikBala($_SESSION['tmp_Long_Sun'], $_SESSION['tmp_Long_Moon'], $_SESSION['tmp_Long_Mar'], $_SESSION['tmp_Long_Mer'], $_SESSION['tmp_Long_Jup'], $_SESSION['tmp_Long_Ven'], $_SESSION['tmp_Long_Sat'], $_SESSION['tmp_Long_Rah'], $_SESSION['tmp_Long_Ket'], "Sat");


$dk_sun_tot = $dk_moon_tot = $dk_mar_tot = $dk_mer_tot = $dk_jup_tot = $dk_ven_tot = $dk_sat_tot = 0;

for ($i=0; $i<=6; $i++)
{
$dk_sun_tot = $dk_sun[$i] + $dk_sun_tot;
$dk_moon_tot = $dk_moon[$i] + $dk_moon_tot;
$dk_mar_tot = $dk_mar[$i] + $dk_mar_tot;
$dk_mer_tot = $dk_mer[$i] + $dk_mer_tot;
$dk_jup_tot = $dk_jup[$i] + $dk_jup_tot;
$dk_ven_tot = $dk_ven[$i] + $dk_ven_tot;
$dk_sat_tot = $dk_sat[$i] + $dk_sat_tot;


}
echo "This is aspecting planets : " . $dk_sun[0] . "*" . $dk_sun[1] . "*" . $dk_sun[2] . "*" . $dk_sun[3] . "*" . $dk_sun[4] . "*" . $dk_sun[5] . "*" . $dk_sun[6] . "*" . "<br>"; 

?>
<br>
<table>
<tr>
<td colspan="8">Drik Bala Position</td>
</tr>

<tr>
<td>Planet</td><td>Sun</td><td>Moon</td><td>Mars</td><td>Mercury</td><td>Jupiter</td><td>Venus</td><td>Saturn</td>
</tr><td>***********</td><td>Total</td>
<tr>
<td>Sun</td><td><?php echo $dk_sun[0] ?></td><td><?php echo $dk_sun[1] ?></td><td><?php echo $dk_sun[2] ?></td><td><?php echo $dk_sun[3] ?></td><td><?php echo $dk_sun[4] ?></td><td><?php echo $dk_sun[5] ?></td><td><?php echo $dk_sun[6] ?></td><td>***********</td><td><?php echo $dk_sun_tot ?></td>
</tr>
<tr>
<td>Moon</td><td><?php echo $dk_moon[0] ?></td><td><?php echo $dk_moon[1] ?></td><td><?php echo $dk_moon[2] ?></td><td><?php echo $dk_moon[3] ?></td><td><?php echo $dk_moon[4] ?></td><td><?php echo $dk_moon[5] ?></td><td><?php echo $dk_moon[6] ?></td><td>***********</td><td><?php echo $dk_moon_tot ?></td>
</tr>

<tr>
<td>Mars</td><td><?php echo $dk_mar[0] ?></td><td><?php echo $dk_mar[1] ?></td><td><?php echo $dk_mar[2] ?></td><td><?php echo $dk_mar[3] ?></td><td><?php echo $dk_mar[4] ?></td><td><?php echo $dk_mar[5] ?></td><td><?php echo $dk_mar[6] ?></td><td>***********</td><td><?php echo $dk_mar_tot ?></td>
</tr>

<tr>
<td>Mercury</td><td><?php echo $dk_mer[0] ?></td><td><?php echo $dk_mer[1] ?></td><td><?php echo $dk_mer[2] ?></td><td><?php echo $dk_mer[3] ?></td><td><?php echo $dk_mer[4] ?></td><td><?php echo $dk_mer[5] ?></td><td><?php echo $dk_mer[6] ?></td><td>***********</td><td><?php echo $dk_mer_tot ?></td>
</tr>

<tr>
<td>Jupiter</td><td><?php echo $dk_jup[0] ?></td><td><?php echo $dk_jup[1] ?></td><td><?php echo $dk_jup[2] ?></td><td><?php echo $dk_jup[3] ?></td><td><?php echo $dk_jup[4] ?></td><td><?php echo $dk_jup[5] ?></td><td><?php echo $dk_jup[6] ?></td><td>***********</td><td><?php echo $dk_jup_tot ?></td>
</tr>

<tr>
<td>Venus</td><td><?php echo $dk_ven[0] ?></td><td><?php echo $dk_ven[1] ?></td><td><?php echo $dk_ven[2] ?></td><td><?php echo $dk_ven[3] ?></td><td><?php echo $dk_ven[4] ?></td><td><?php echo $dk_ven[5] ?></td><td><?php echo $dk_ven[6] ?></td><td>***********</td><td><?php echo $dk_ven_tot ?></td>
</tr>

<tr>
<td>Saturn</td><td><?php echo $dk_sat[0] ?></td><td><?php echo $dk_sat[1] ?></td><td><?php echo $dk_sat[2] ?></td><td><?php echo $dk_sat[3] ?></td><td><?php echo $dk_sat[4] ?></td><td><?php echo $dk_sat[5] ?></td><td><?php echo $dk_sat[6] ?></td><td>***********</td><td><?php echo $dk_sat_tot ?></td>
</tr>

</table>
<br>
<br>




<?php 


// Calculation of Drik Bala Ends
?>



