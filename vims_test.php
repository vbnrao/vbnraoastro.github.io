<?php
// Initialize the session
session_start();


// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


include ('./planet_calculations.php'); /// All functions for planet calculations

echo "This is Sun Long : " . $_SESSION['tmp_Long_Sun'] . "<br>";
echo "This is Moon Long : " . $_SESSION['tmp_Long_Moon'] . "<br>";
echo "This is Mar Long : " . $_SESSION['tmp_Long_Mar'] . "<br>";
echo "This is Mer Long : " . $_SESSION['tmp_Long_Mer'] . "<br>";
echo "This is Jup Long : " . $_SESSION['tmp_Long_Jup'] . "<br>";
echo "This is Ven Long : " . $_SESSION['tmp_Long_Ven'] . "<br>";
echo "This is Sat Long : " . $_SESSION['tmp_Long_Sat'] . "<br>";
echo "This is Rah Long : " . $_SESSION['tmp_Long_Rah'] . "<br>";
echo "This is Ket Long : " . $_SESSION['tmp_Long_Ket'] . "<br>";
echo "**********" . "<br>";
echo "This is Sun Naks : " . Naks($_SESSION['tmp_Long_Sun']) . "<br>";
echo "This is Moon Naks : " . Naks($_SESSION['tmp_Long_Moon']) . "<br>";
echo "This is Mar Naks : " . Naks($_SESSION['tmp_Long_Mar']) . "<br>";
echo "This is Mer Naks : " . Naks($_SESSION['tmp_Long_Mer']) . "<br>";
echo "This is Jup Naks : " . Naks($_SESSION['tmp_Long_Jup']) . "<br>";
echo "This is Ven Naks : " . Naks($_SESSION['tmp_Long_Ven']) . "<br>";
echo "This is Sat Naks : " . Naks($_SESSION['tmp_Long_Sat']) . "<br>";
echo "This is Rah Naks : " . Naks($_SESSION['tmp_Long_Rah']) . "<br>";
echo "This is Ket Naks : " . Naks($_SESSION['tmp_Long_Ket']) . "<br>";
echo "&&&&&&&&&&&&" . "<br>";
$tmp_naks_Sun = Naks($_SESSION['tmp_Long_Sun'])."-".NaksPad($_SESSION['tmp_Long_Sun']);
$tmp_naks_Moon = Naks($_SESSION['tmp_Long_Moon'])."-".NaksPad($_SESSION['tmp_Long_Moon']);
$tmp_naks_Mar = Naks($_SESSION['tmp_Long_Mar'])."-".NaksPad($_SESSION['tmp_Long_Mar']);
$tmp_naks_Mer = Naks($_SESSION['tmp_Long_Mer'])."-".NaksPad($_SESSION['tmp_Long_Mer']);
$tmp_naks_Jup = Naks($_SESSION['tmp_Long_Jup'])."-".NaksPad($_SESSION['tmp_Long_Jup']);
$tmp_naks_Ven = Naks($_SESSION['tmp_Long_Ven'])."-".NaksPad($_SESSION['tmp_Long_Ven']);
$tmp_naks_Sat = Naks($_SESSION['tmp_Long_Sat'])."-".NaksPad($_SESSION['tmp_Long_Sat']);
$tmp_naks_Rah = Naks($_SESSION['tmp_Long_Rah'])."-".NaksPad($_SESSION['tmp_Long_Rah']);
$tmp_naks_Ket = Naks($_SESSION['tmp_Long_Ket'])."-".NaksPad($_SESSION['tmp_Long_Ket']);
echo "This is Sun Naks : " . $tmp_naks_Sun . "<br>";
echo "This is Moon Naks : " . $tmp_naks_Moon . "<br>";
echo "This is Mar Naks : " . $tmp_naks_Mar . "<br>";
echo "This is Mer Naks : " . $tmp_naks_Mer . "<br>";
echo "This is Jup Naks : " . $tmp_naks_Jup . "<br>";
echo "This is Ven Naks : " . $tmp_naks_Ven . "<br>";
echo "This is Sat Naks : " . $tmp_naks_Sat . "<br>";
echo "This is Rah Naks : " . $tmp_naks_Rah . "<br>";
echo "This is Ket Naks : " . $tmp_naks_Ket . "<br>";
echo "&&&&&&&&&&&&" . "<br>";

$naks_array = array($tmp_naks_Ket => 1,  $tmp_naks_Moon => 2, $tmp_naks_Mar => 3, $tmp_naks_Mer => 4, $tmp_naks_Jup => 5, $tmp_naks_Rah => 6, $tmp_naks_Sat => 7, $tmp_naks_Sun => 8, $tmp_naks_Ven => 9);

echo array_duplicates($naks_array). "<br>";




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

echo "This is vbn Date of Birth : " . $vbn . "<br>";

$vbn = date_create($vbn);
$vbn1 = $vbn;
$vbn = date_format($vbn, 'd-m-Y');
$vbnmdy = date_format($vbn1, 'm/d/Y');


echo "this is vbn date dob : " . $vbn . "<br>";
//echo "this is vbn (m-d-y) date dob : " . $vbn1 . "<br>";




$Moon_Long = $_SESSION['tmp_Long_Moon'];
$Remain_Moon_Long = round(fmod($Moon_Long, 13.333333),4);
$Starting_Dasa_No = fmod(NaksNum($Moon_Long),9);
$Consumed = round(($Remain_Moon_Long * FullDasa($Starting_Dasa_No))/13.3333);
$Consumed_tmp = 'P' . ($Consumed - 1) . 'D';
$First_Full_Dasa = FullDasaYears($Starting_Dasa_No);
$First_Full_Dasa_tmp = 'P' . $First_Full_Dasa . 'Y';

echo "This is consumed Days : " . $Consumed_tmp . "<br>";
$start_date_sub = new DateTime($vbn);
$start_date_sub->sub(new DateInterval($Consumed_tmp));
$start_date_dmy = $start_date_sub->format('d-m-Y');
echo "This is vbnrao First Start Dasa period : " . $start_date_dmy . "<br>";

$date1 = new DateTime($start_date_dmy);
$date1->add(new DateInterval($First_Full_Dasa_tmp));
$vbnend1 = $date1->format('d-m-Y');
echo "This is vbnrao First Start Dasa Years period : " . $vbnend1 . "<br>";

//***********************************************************************

$tmp_DSeq = $Starting_Dasa_No;
$tmp_DStart = $start_date_dmy;
$tmp_DEnd = $vbnend1;

for ($i= 1; $i<10; $i++)  // Loop for Maha Dasa
{
	$txt_DSeq[$i] = $tmp_DSeq;
	$txt_DStart[$i] = $tmp_DStart;
	$txt_DEnd[$i] = $tmp_DEnd;
	
	$MD_Name[$i] =  DasaName($txt_DSeq[$i]);
	echo "Maha Dasa : " . DasaName($txt_DSeq[$i]) . "*******" . $txt_DStart[$i] . "^^^^^^" . $txt_DEnd[$i] . "<br>";
	
	// Looping of Dasa Sequence start
		$tmp_DSeq = $tmp_DSeq + 1;
		If ($tmp_DSeq > 9)
		{
			$tmp_DSeq = 1;
		}
	// Looping of Dasa Sequence Ends

	// Looping of Dasa Start Date Starts

		$tmp_DStart = $txt_DEnd[$i];
		$First_Full_Dasa = FullDasaYears($tmp_DSeq);
		$First_Full_Dasa_tmp = 'P' . $First_Full_Dasa . 'Y';
		echo "This is full dasa period : " . $First_Full_Dasa_tmp . "<br>";
		$date1 = new DateTime($tmp_DEnd);
		echo "This is date1 period : " . $tmp_DEnd . "<br>";

		$date1->add(new DateInterval($First_Full_Dasa_tmp));
		$tmp_DEnd = $date1->format('d-m-Y');


	// Looping of Dasa Start Date Ends




$tmp_MDSeq = $txt_DSeq[$i];
$tmp_MD_Seq = $txt_DSeq[$i];

$tmp_ADStart = $txt_DStart[$i];
$tmp_ADEnd = $txt_DEnd[$i];
for ($j=1; $j<10; $j++)
{
	$txt_ADSeq[$j] = $tmp_MDSeq;
	$txt_ADStart[$j] = $tmp_ADStart;
	$txt_ADEnd[$j] = $tmp_ADEnd;


	$AD_Name[$j] =  DasaName($txt_ADSeq[$j]);
	echo "****   Antar Dasa : " . DasaName($txt_ADSeq[$j]) . "*******" . $txt_ADStart[$j] . "^^^^^^" . $txt_ADEnd[$j] . "<br>";
	
	

	// Looping of Antar Dasa Start Date Starts

		$tmp_ADStart = $txt_ADEnd[$j];
		$First_Full_Dasa = round(FullDasa($tmp_MD_Seq) * BhuktiDasa($txt_ADSeq[$j]),0);
		$First_Full_Dasa_tmp = 'P' . $First_Full_Dasa . 'D';
		echo "This is full Antar dasa period : " . $First_Full_Dasa_tmp . "<br>";
		$date1 = new DateTime($tmp_ADEnd);
		echo "This is date1 period : " . $tmp_ADEnd . "<br>";

		$date1->add(new DateInterval($First_Full_Dasa_tmp));
		$tmp_ADEnd = $date1->format('d-m-Y');


	// Looping of Antar Dasa Start Date Ends

	// Looping for Antar Dasa Starts
		$tmp_MDSeq = $tmp_MDSeq + 1;
		If ($tmp_MDSeq > 9)
		{
			$tmp_MDSeq = 1;
		}
	// Looping for Antar Dasa Ends






$tmp_PDSeq = $txt_ADSeq[$j];
for ($k=1; $k<10; $k++)
{
	$txt_PDSeq[$k] = $tmp_PDSeq;

	$PD_Name[$k] =  DasaName($txt_PDSeq[$k]);
	echo "****$$$$$*****   Pratyantar Dasa : " . DasaName($txt_PDSeq[$k]) . "<br>";
	
	$tmp_PDSeq = $tmp_PDSeq + 1;
	If ($tmp_PDSeq > 9)
	{
		$tmp_PDSeq = 1;
	}

} // End for Pratyantar dasa $k

echo "***Pratyantar Dasa End ********" . "<br>";

} // End for Antar dasa $j

echo "***Antar Dasa End ********" . "<br>";


} // End for Maha Dasa $i




echo "This is Maha Dasa - 1 :" .  $MD_Name[1] . "<br>";
echo "This is Maha Dasa - 2 :" .  $MD_Name[2] . "<br>";
echo "This is Maha Dasa - 3 :" .  $MD_Name[3] . "<br>";
echo "This is Maha Dasa - 4 :" .  $MD_Name[4] . "<br>";
echo "This is Maha Dasa - 5 :" .  $MD_Name[5] . "<br>";
echo "This is Maha Dasa - 6 :" .  $MD_Name[6] . "<br>";
echo "This is Maha Dasa - 7 :" .  $MD_Name[7] . "<br>";
echo "This is Maha Dasa - 8 :" .  $MD_Name[8] . "<br>";
echo "This is Maha Dasa - 9 :" .  $MD_Name[9] . "<br>";



?>