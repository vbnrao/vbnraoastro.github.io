<?php
//Converting UTC DateTime to Timezone DateTime starts


function convertDateFromTimeZone($date, $timezone, $timezone_to, $format){
  $date = new DateTime($date, new DateTimeZone($timezone));
  $date->setTimezone( new DateTimeZone($timezone_to));
  return $date->format($format);
}
//Converting UTC DateTime to Timezone DateTime ends

// Findig the Rasi No.

Function RasiNum($PlanetLongitude)

{
$PL = $PlanetLongitude;
$PL = ($PL / 30);
$PL = Floor($PL);

$RasiNum = ($PL + 1);
return $RasiNum;
}

// Function for Rasi

Function Rasi($PlanetLongitude)
{

$PL = $PlanetLongitude;
$PL = ($PL / 30);
$PL = Floor($PL);

$SignPL = ($PL + 1);

//$Sign[12];
$Sign[1] = "Aries";
$Sign[2] = "Taurus";
$Sign[3] = "Gemini";
$Sign[4] = "Cancer";
$Sign[5] = "Leo";
$Sign[6] = "Virgo";
$Sign[7] = "Libra";
$Sign[8] = "Scorpio";
$Sign[9] = "Sagittarius";
$Sign[10] = "Capricorn";
$Sign[11] = "Aquarius";
$Sign[12] = "Pisces";

$Rasi = $Sign[$SignPL];
//print "This is Rasi :".$Rasi;
return $Rasi;

}
// Rasi Abbrevations
Function RasiAbr($PlanetLongitude)
{

$RAPL = $PlanetLongitude;
$RAPL = ($RAPL / 30);
$RAPL = Floor($RAPL);

$RASignPL = ($RAPL + 1);

//$Sign[12];
$Sign[1] = "Ar";
$Sign[2] = "Ta";
$Sign[3] = "Ge";
$Sign[4] = "Cn";
$Sign[5] = "Le";
$Sign[6] = "Vi";
$Sign[7] = "Li";
$Sign[8] = "Sc";
$Sign[9] = "Sg";
$Sign[10] = "Cp";
$Sign[11] = "Aq";
$Sign[12] = "Pi";

$RasiAbr = $Sign[$RASignPL];
//print "This is Rasi :".$Rasi;
return $RasiAbr;

}

// Finding DivDeg

Function DivDeg($RasiLongitude,$Division)
{
//Dim N, Div As Double

$Division = (30 / $Division);
$N = ($RasiLongitude / $Division);
$Div = Floor($N);
$N = $N - $Div;
$N = $N * 30;

$DivDeg = $N;
return $DivDeg;
}

// Finding Navamsa Longitude
Function DivPlanetLongitude($PlanetLongitude,$Division,$Var)
{

// Calculation for Hora

If ($Division == 2)
{
 //Dim Hora21 As Long, Hora22 As String, Startpoint22 As Double

//Case 1
//    ' Hora based on Standard Parashara's Interpretation
If ($Var == 1)
{
$Hora212 = RasiDeg($PlanetLongitude) / 15;    
$Hora21 = ceil(RasiDeg($PlanetLongitude) / 15);
$Hora22 = Oddity(RasiNum($PlanetLongitude));

//echo "This is HORA 212 : " . $Hora212 . "<br>";
//echo "This is HORA 21 : " . $Hora21 . "<br>";
//echo "This is HORA 22 : " . $Hora22 . "<br>";

            If ($Hora21 == 1 and $Hora22 == "O")
            {
              $Startpoint22 = 120;
              //echo "This is Startpoint22 (120-1 O) : " . $Startpoint22 . "<br>";
            }
            elseif ($Hora21 == 2 and $Hora22 == "O")
            {
              $Startpoint22 = 90;
              //echo "This is Startpoint22 (90-2 O): " . $Startpoint22 . "<br>";
            }
            elseif ($Hora21 == 1 and $Hora22 == "E")
            {
              $Startpoint22 = 90;
              //echo "This is Startpoint22 (90-1 E) : " . $Startpoint22 . "<br>";
            }
            elseif ($Hora21 == 2 and $Hora22 == "E")
            {
              $Startpoint22 = 120;
              //echo "This is Startpoint22 (120-2 E): " . $Startpoint22 . "<br>";
            }
        
$DivPlanetLongitude = DegRnd($Startpoint22 + DivDeg(RasiDeg($PlanetLongitude), 2));
}

//Case 2
//    'Hora based on the the planet to be placed in the 1st/7th, based on the planet in 1st/ 2nd Hora
elseif ($Var == 2)
{
        $Hora1 = ceil(RasiDeg($PlanetLongitude) / 15);

            If ($Hora1 == 1)
                {
                  $StartPoint21 = 0;
                }
            elseif ($Hora1 == 2)
              {
                $StartPoint21 = 180;
              }
            

$DivPlanetLongitude = DegRnd($StartPoint21 + RasiNum($PlanetLongitude) * 30 - 30 + DivDeg(RasiDeg($PlanetLongitude), 2));

}

} // Close Hora Calculations

// Division 3 Drekanna Calculations starts
If ($Division == 3)
{

If ($Var == 1)
{
   //Case 1
    //'Parasara Drekkana
        
        $Drek1 = ceil(RasiDeg($PlanetLongitude) / 10);
                
                If ($Drek1 == 1)
                  {
                    $StartPoint31 = 0;
                  }
                elseif ($Drek1 == 2)
                    {
                      $StartPoint31 = 120;
                    }
                elseif ($Drek1 = 3)
                    {
                      $StartPoint31 = 240;
                    }
              
$DivPlanetLongitude = DegRnd($StartPoint31 + RasiNum($PlanetLongitude) * 30 - 30 + DivDeg(RasiDeg($PlanetLongitude), 3));

}
elseif ($Var == 2)
  {
   //Case 2
  }    
}// Division 3 Calculation Ends

// Division 7 Calculation Starts

//Case 7
//' Saptamsa Chart

If ($Division == 7)
{
      
        $Sapt = Oddity(RasiNum($PlanetLongitude));
        
            If ($Sapt == "O")
                {
                  $Startpoint7 = 0;
                }
            elseif ($Sapt == "E")
                {
                  $Startpoint7 = 180;
                }
$DivPlanetLongitude = DegRnd((RasiNum($PlanetLongitude) - 1) * 30 + $Startpoint7 + RasiDeg($PlanetLongitude) * 7);

}

// Division 7 Calculation Ends

// Calculation for Navamsa
If ($Division == 9)
{
//Dim M, Startpoint9
$M = MFD(RasiNum($PlanetLongitude));

    If ($M == "M")
    	{
       		$Startpoint9 = 0;
       	}
    elseif ($M == "F")
       {
       $Startpoint9 = 240;
   		}
   	elseif ($M == "D")
       {
	       $Startpoint9 = 120;
	    }

    

$DivPlanetLongitude = DegRnd((RasiNum($PlanetLongitude) - 1) * 30 + $Startpoint9 + RasiDeg($PlanetLongitude) * 9);
}
// Calculation of Navamsa Chart Ends

// Calculation of Dwadasamsa D-12 Starts
If ($Division == 12)
{
//Case 12
//' Dwadasamsa Chart

$DivPlanetLongitude = DegRnd((RasiNum($PlanetLongitude) - 1) * 30 + RasiDeg($PlanetLongitude) * 12);
}   

// Calculation of Dwadasamsa D-12 Ends

// Calculation of D-30 Starts
If ($Division == 30)
{
//Case 30
//' Tattva based Trimsamsa Chart

//Select Case Var
IF ($Var == 1)
{    
    //Case 1
    
   
    $Trims = Oddity(RasiNum($PlanetLongitude));
    $Trims2 = RasiDeg($PlanetLongitude);
    
    If ($Trims == "O")
    {
        If ($Trims2 > 0 and $Trims2 <= 5)
          {
            $StartPoint30 = 0;
          }
        elseif ($Trims2 > 5 and $Trims2 <= 10)
          {
            $StartPoint30 = 300;
          }
        elseif ($Trims2 > 10 and $Trims2 <= 18)
          {
            $StartPoint30 = 240;
          }
        elseif ($Trims2 > 18 and $Trims2 <= 25)
          {
            $StartPoint30 = 60;
          }
        elseif ($Trims2 > 25 and $Trims2 <= 30)
          {
            $StartPoint30 = 180;
          }
     }
    elseif ($Trims == "E")
    {
        If ($Trims2 > 30 and $Trims2 <= 5)
          {
            $StartPoint30 = 0;
          }
        elseif ($Trims2 > 5 and $Trims2 <= 12)
          {
            $StartPoint30 = 150;
          }
        elseif ($Trims2 > 12 and $Trims2 <= 20)
          {
          $StartPoint30 = 330;
          }
        elseif ($Trims2 > 20 and $Trims2 <= 25)
          {
            $StartPoint30 = 270;
          }
        elseif ($Trims2 > 25 and $Trims2 <= 30)
          {
            $StartPoint30 = 210;
          }
    }
    
$DivPlanetLongitude = DegRnd($StartPoint30 + DivDeg(RasiDeg($PlanetLongitude), 30));
    
} // Case-1 Ends

} // Calculation of D-30 Ends


return $DivPlanetLongitude;

}
// Calculation of Sign Lord
Function SignLord($PlanetLongitude)
{

$R[0] = "Mar";
$R[1] = "Ven";
$R[2] = "Mer";
$R[3] = "Moon";
$R[4] = "Sun";
$R[5] = "Mer";
$R[6] = "Ven";
$R[7] = "Mar";
$R[8] = "Jup";
$R[9] = "Sat";
$R[10] = "Sat";
$R[11] = "Jup";

$N = ceil($PlanetLongitude / 30);

$SignLord = $R[$N - 1];
return $SignLord;
}
// SignLord ends
// Calculation of Sign Lord No
Function SignLordNo($PlanetLongitude)
{

$R[0] = 2;
$R[1] = 5;
$R[2] = 3;
$R[3] = 1;
$R[4] = 0;
$R[5] = 3;
$R[6] = 5;
$R[7] = 2;
$R[8] = 4;
$R[9] = 6;
$R[10] = 6;
$R[11] = 4;

$N = ceil($PlanetLongitude / 30);

$SignLordNo = $R[$N - 1];
return $SignLordNo;
}
// SignLordNo ends
// Function for MFD

Function MFD($SignIndex)
{
//$Sign[12];
$Sign[1] = "M";
$Sign[2] = "F";
$Sign[3] = "D";
$Sign[4] = "M";
$Sign[5] = "F";
$Sign[6] = "D";
$Sign[7] = "M";
$Sign[8] = "F";
$Sign[9] = "D";
$Sign[10] = "M";
$Sign[11] = "F";
$Sign[12] = "D";

$MFD = $Sign[$SignIndex];
//print "This is MFD :".$MFD;
return $MFD;

}

// Function for Degree Round
Function DegRnd($Degree)
{    
	If ($Degree < 0)
    {	
    	do 
    	{
    	$Degree = $Degree + 360;
    	} while ($Degree < 0);
    	
    	$DegRnd = $Degree;
    }
	elseif ($Degree > 0)
	{
    	$DegRnd = fmod($Degree, 360);
    }
return $DegRnd;
}

// Function for Rasi Degree

Function RasiDeg($PlanetLongitude)
{

//Finding the Longitude of a Planet in a Rasi
 
$PL = $PlanetLongitude;
$PL = ($PL / 30);
$PL = ($PL - Floor($PL));
$PL = ($PL * 30);

$RasiDeg = $PL;
return $RasiDeg;

}


//Finding the DMS of Planet in a Rasi
Function DMS($PlanetLongitude)
{
$PL = round($PlanetLongitude,4);
$Deg = Floor(RasiDeg($PL));
$Min = Floor((RasiDeg($PL) - Floor(RasiDeg($PL))) * 60);
$Sec = Round((RasiDeg($PL) - $Deg - $Min/60) * 3600, 2);

$DMS = $Deg . " " . RasiAbr($PL) . " " . $Min . "' " . $Sec . '"' ;
return $DMS; 

}

// Function Converting from Degree Minutes to Direct Degree 

function DMStoDD($input)
{

$deg = " " ;
$min = " " ;
$sec = " " ;
$inputM = " " ;

//print "<br> Input is ".$input." <br>";

for ($i=0; $i < strlen($input); $i++)
{
    $tempD = $input[$i];
     //print "<br> TempD[$i] is :  $tempD";

     if ($tempD == iconv("UTF-8", "ISO-8859-1//TRANSLIT", '°'))
     {
      $newI = $i + 1 ;
      //print "<br> newI[$i] is :  $newI";
      $inputM = substr($input, $newI, -1);
      break;
     }  // Close if degree

     $deg .= $tempD ;
  } // Close for Degree

//print "<br> InputM is ".$inputM." <br>";
for ($j=0; $j < strlen($inputM); $j++)
{
      $tempM = $inputM[$j];
      //print "<br> TempM[$j] is :  $tempM";

      if ($tempM == "'")
      {

        $newI = $j + 1 ;
         //print "<br> newI is :  $newI";
         $sec = substr($inputM, $newI, -1);
         break;
      } // close if minute
      $min .= $tempM ;
    } //Close for Minute
//print "<br> Seconds is ".$sec." <br>";
    
    //$result = $deg + ((($min*60) + ($sec))/3600);

    //print "<br> Degree is ". $deg*1;
    //print "<br> Minute is ". $min;
    //print "<br> Seconds is ". $sec;
    //print "<br> Result is ". $result;

return (float)$deg + (float)($min/60) + (float)($sec/3600);
}

// Finding Nakshatra Name --

Function Naks($PlanetLongitude)

{ 
$A[0] = "Aswini ";
$A[1] = "Bharani ";
$A[2] = "Krittika ";
$A[3] = "Rohini ";
$A[4] = "Mrigashira ";
$A[5] = "Ardra ";
$A[6] = "Punarvasu ";
$A[7] = "Pushya ";
$A[8] = "Aslesha ";
$A[9] = "Makha ";
$A[10] = "Purva Phalguni ";
$A[11] = "Uttara Phalguni ";
$A[12] = "Hasta ";
$A[13] = "Chitra ";
$A[14] = "Swati ";
$A[15] = "Visakha ";
$A[16] = "Anuradha ";
$A[17] = "Jyestha ";
$A[18] = "Moola ";
$A[19] = "Purva Asadha ";
$A[20] = "Uttara Asadha ";
$A[21] = "Sravana ";
$A[22] = "Dhanistha ";
$A[23] = "Satabhisa ";
$A[24] = "Purva Bhadrapada ";
$A[25] = "Uttara Bhadrapada ";
$A[26] = "Revati ";

$N = ($PlanetLongitude / 13.3333);

$N = ceil($N);
$Naks = $A[$N - 1];

return $Naks;
}

// Nakshatra Number Calculation

Function NaksNum($PlanetLongitude)

{ 
$A[0] = "1";
$A[1] = "2";
$A[2] = "3";
$A[3] = "4";
$A[4] = "5";
$A[5] = "6";
$A[6] = "7";
$A[7] = "8";
$A[8] = "9";
$A[9] = "10";
$A[10] = "11";
$A[11] = "12";
$A[12] = "13";
$A[13] = "14";
$A[14] = "15";
$A[15] = "16";
$A[16] = "17";
$A[17] = "18";
$A[18] = "19";
$A[19] = "20";
$A[20] = "21";
$A[21] = "22";
$A[22] = "23";
$A[23] = "24";
$A[24] = "25";
$A[25] = "26";
$A[26] = "27";

$N = ($PlanetLongitude / 13.3333);

$N = ceil($N);
$NaksNum = $A[$N - 1];

return $NaksNum;
}

// Nakshatra Pada Calculation

Function NaksPad($PlanetLongitude)

{
$tmp = ($PlanetLongitude / 13.3333);
$tmp = ceil($tmp);
$tmp = ($tmp - 1);
$tmp = ($tmp * 13.3333);
$tmp = ($PlanetLongitude - $tmp);

If ($tmp == 0 Or $tmp <= 3.3333)
    {
      $N = 1;
    }
elseif ($tmp == 3.35 Or $tmp <= 6.6666)
    {
      $N = 2;
    }
elseif ($tmp == 6.6833 Or $tmp <= 10)
    {
      $N = 3;
    }
elseif ($tmp == 10.0166 Or $tmp <= 13.3333)
    {
      $N = 4;
    }


$NaksPad = $N;

return $NaksPad;
}

// Full Dasa Periods

Function DasaName($NaksNo)
{

$A[0] = "Ketu";
$A[1] = "Venus";
$A[2] = "Sun";
$A[3] = "Moon";
$A[4] = "Mars";
$A[5] = "Rahu";
$A[6] = "Jupiter";
$A[7] = "Saturn";
$A[8] = "Mercury";


$DasaName = $A[$NaksNo - 1];
return $DasaName;
}


// Full Dasa Periods

Function FullDasa($NaksNo)
{



$A[0] = "2556.75";
$A[1] = "7305";
$A[2] = "2191.50";
$A[3] = "3652.50";
$A[4] = "2556.75";
$A[5] = "6574.50";
$A[6] = "5844";
$A[7] = "6939.75";
$A[8] = "6209.25";


$FullDasa = $A[$NaksNo - 1];
return $FullDasa;
}

// Full Dasa Years 

Function FullDasaYears($NaksNo)
{

$A[0] = "7";
$A[1] = "20";
$A[2] = "6";
$A[3] = "10";
$A[4] = "7";
$A[5] = "18";
$A[6] = "16";
$A[7] = "19";
$A[8] = "17";


$FullDasaYears = $A[$NaksNo - 1];
return $FullDasaYears;
}

//*****Bhukthi period starts *************
Function BhuktiDasa($NaksNo)
{

$A[0] = "0.06";
$A[1] = "0.17";
$A[2] = "0.05";
$A[3] = "0.08";
$A[4] = "0.06";
$A[5] = "0.15";
$A[6] = "0.13";
$A[7] = "0.16";
$A[8] = "0.14";

$BhuktiDasa = $A[$NaksNo - 1];
return $BhuktiDasa;
}

//******Bhukthi Period Ends **************


Function Tithi($txt_Tithi)
{
$T[1] = "Shukla Paksha Padyami";
$T[2] = "Shukla Paksha Vidiya";
$T[3] = "Shukla Paksha Trithiya";
$T[4] = "Shukla Paksha Chavithi";
$T[5] = "Shukla Paksha Panchami";
$T[6] = "Shukla Paksha Sashthi";
$T[7] = "Shukla Paksha Sapthami";
$T[8] = "Shukla Paksha Ashtami";
$T[9] = "Shukla Paksha Navami";
$T[10] = "Shukla Paksha Dashami";
$T[11] = "Shukla Paksha Ekadasi";
$T[12] = "Shukla Paksha Dwadasi";
$T[13] = "Shukla Paksha Triyodasi";
$T[14] = "Shukla Paksha Chaturdasi";
$T[15] = "Poornima";
$T[16] = "Krishna Paksha Padyami";
$T[17] = "Krishna Paksha Vidiya";
$T[18] = "Krishna Paksha Trithiya";
$T[19] = "Krishna Paksha Chavithi";
$T[20] = "Krishna Paksha Panchami";
$T[21] = "Krishna Paksha Sashthi";
$T[22] = "Krishna Paksha Sapthami";
$T[23] = "Krishna Paksha Ashtami";
$T[24] = "Krishna Paksha Navami";
$T[25] = "Krishna Paksha Dashami";
$T[26] = "Krishna Paksha Ekadasi";
$T[27] = "Krishna Paksha Dwadasi";
$T[28] = "Krishna Paksha Triyodasi";
$T[29] = "Krishna Paksha Chaturdasi";
$T[30] = "Amavasya";

$Tithi = $T[$txt_Tithi];
return $Tithi;

}

// Calculations for Uchcha Bala

Function UchchaBala($PlanetLongitude, $PlanetName) 
{
If ($PlanetName == "Sun")
  {
    $DeblitationPoint = 190;
  }
If ($PlanetName == "Moon")
  {
    $DeblitationPoint = 213;
  }
  If ($PlanetName == "Mar")
  {
    $DeblitationPoint = 118;
  }
If ($PlanetName == "Mer")
  {
    $DeblitationPoint = 345;
  }
If ($PlanetName == "Jup")
  {
    $DeblitationPoint = 275;
  }
If ($PlanetName == "Ven")
  {
    $DeblitationPoint = 177;
  }
If ($PlanetName == "Sat")
  {
    $DeblitationPoint = 20;
  }

$diff = fmod(($PlanetLongitude - $DeblitationPoint), 180);
  If ($diff <0)
  {
    $diff = fmod(($DeblitationPoint - $PlanetLongitude), 180);
  }

$UchchaBala = ($diff / 3);

return $UchchaBala;

}

//Calculations of Kendra Bala 

Function KendraBala($PlanetLongitude, $AscLongitude)
{
  $KendraBala = 0;
$kpa = HouseNo($PlanetLongitude, $AscLongitude);

echo "This is vbnrao Rasi No. of planet : " . $kpa . "<br>";



If ($kpa == 1 or $kpa == 4 or $kpa== 7 or $kpa == 10)
  {
    $KenBala = 60;
  }

elseif ($kpa == 2 or $kpa == 5 or $kpa == 8 or $kpa == 11)
  {
    $KenBala = 30;
  }
elseif ($kpa == 3 or $kpa == 6 or $kpa == 9 or $kpa == 12)
  {
    $KenBala = 15;
  }


$KendraBala = $KenBala;


return $KendraBala;

}

//Calculations of House No.
Function HouseNo($PlanetLongitude, $AscLongitude)
{

$ascNo = RasiNum($AscLongitude);
$planetNo = RasiNum($PlanetLongitude);

$House = ($planetNo - $ascNo + 1);

If ($House < 1)
  {
    $HouseNo = ($House + 12);
  }
else
{
  $HouseNo = $House;
}

return $HouseNo;
}

// Calculation of Drekknna Bala
Function DrekkanaBala($PlanetLongitude, $Planet)
{

$Drek = fmod(($PlanetLongitude),30);
$Drek1 = ceil($Drek/10);

If ($Planet == "Sun" or $Planet== "Mar" or $Planet == "Jup")
  {
    If ($Drek1 == 1)
    {
      $DrekkanaBala = 15;
    }
    else
      $DrekkanaBala = 0;
  }

If ($Planet == "Moon" or $Planet== "Ven")
  {
    If ($Drek1 == 3)
    {
      $DrekkanaBala = 15;
    }
    else
      $DrekkanaBala = 0;
  }

If ($Planet == "Mer" or $Planet== "Sat")
  {
    If ($Drek1 == 2)
    {
      $DrekkanaBala = 15;
    }
    else
      $DrekkanaBala = 0;
  }

return $DrekkanaBala;
}

// Calculation of OjaYugma Bala

Function OjaYugmaBala($PlanetLongitude, $Planet)
{

$RasiNo = RasiNum($PlanetLongitude);
$NavamsaNo = RasiNum(DivPlanetLongitude($PlanetLongitude,9,1));
$RasiOddity = Oddity($RasiNo);
$NavamsaOddity = Oddity($NavamsaNo);


If ($Planet == "Sun" or $Planet == "Mar" or $Planet == "Mer" or $Planet == "Jup" or $Planet == "Sat")
  {
    If ($RasiOddity == "O" and $NavamsaOddity == "O")
    {
      $OjaYugma = 30;
    }
    elseif ($RasiOddity == "O" or $NavamsaOddity == "O")
    {
      $OjaYugma = 15;
    }
    else
      $OjaYugma = 0;
   }

If ($Planet == "Moon" or $Planet == "Ven")
  {
    If ($RasiOddity == "E" and $NavamsaOddity == "E")
    {
      $OjaYugma = 30;
    }
    elseif ($RasiOddity == "E" or $NavamsaOddity == "E")
    {
      $OjaYugma = 15;
    }
    else
      $OjaYugma = 0;
   } 

$OjaYugmaBala = $OjaYugma;

return $OjaYugmaBala;
}

// Calculation of Oddity

Function Oddity($SignIndex)
{

$Sign[0] = "O";
$Sign[1] = "E";
$Sign[2] = "O";
$Sign[3] = "E";
$Sign[4] = "O";
$Sign[5] = "E";
$Sign[6] = "O";
$Sign[7] = "E";
$Sign[8] = "O";
$Sign[9] = "E";
$Sign[10] = "O";
$Sign[11] = "E";

$Oddity = $Sign[$SignIndex - 1];
return $Oddity;
}


//Calculation of Combined Relationship Panchadamaitri
Function Relation($RelIndex)
{

$RI[25] = "Best Friend";
$RI[26] = "Neutral";
$RI[27] = "Bitter Enemy";
$RI[30] = "Friend";
$RI[31] = "Enemy";
$RI[0] = "-----";

$Relation = $RI[$RelIndex];
return $Relation;
}

// Panchadamaitri Calculations starts

Function Panchadamaitri($PL1, $PL2, $PL3, $PL4, $PL5, $PL6,$PL7, $AscLong, $Planet)
// start
{
// start

/*
IF ($Planet == "Sun")
	{
		$pf_tmp_array =	"array(0,11,16,12,11,11,12)";	
	}
IF ($Planet == "Moon")
	{
		$pf_tmp_array =	"array(11,0,11,16,16,16,16)";	
	}
IF ($Planet == "Mar")
	{
		$pf_tmp_array =	"array(11,11,12,16,0,11,16)";	
	}
IF ($Planet == "Mer")
	{
		$pf_tmp_array =	"array(11,12,0,11,16,16,16)";	
	}
IF ($Planet == "Jup")
	{
		$pf_tmp_array =	"array(11,11,12,12,11,0,16)";	
	}
IF ($Planet == "Ven")
	{
		$pf_tmp_array =	"array(12,12,11,0,16,16,11)";	
	}
IF ($Planet == "Sat")
	{
		$pf_tmp_array =	"array(12,12,11,11,12,16,0)";	
	}
*/

$pf_array = array(
	array(0,11,16,12,11,11,12),
	array(11,0,11,16,16,16,16),
	array(11,11,12,16,0,11,16),
	array(11,12,0,11,16,16,16),
	array(11,11,12,12,11,0,16),
	array(12,12,11,0,16,16,11),
	array(12,12,11,11,12,16,0)
	);


$sun_house = HouseNo($PL1,$AscLong);
$moon_house = HouseNo($PL2,$AscLong);
$mar_house = HouseNo($PL3,$AscLong);
$mer_house = HouseNo($PL4,$AscLong);
$jup_house = HouseNo($PL5,$AscLong);
$ven_house = HouseNo($PL6,$AscLong);
$sat_house = HouseNo($PL7,$AscLong);

/*
echo " This is Planet : %%%%%%%%%%%%%%%%%" . $Planet . "<br>";

echo "This is Sun House vbn : " . $sun_house . "<br>";
echo "This is Moon House : " . $moon_house . "<br>";
echo "This is Mar House : " . $mar_house . "<br>";
echo "This is Mer House : " . $mer_house . "<br>";
echo "This is Jup House : " . $jup_house . "<br>";
echo "This is Ven House : " . $ven_house . "<br>";
echo "This is Sat House : " . $sat_house . "<br>";
echo "%%%%%%%%%%%%%%%%%" . "<br>";
*/


If ($Planet == "Sun")
	{
		$tmpFriend_house = $sun_house;
		
	}
elseif ($Planet == "Moon")
	{
		$tmpFriend_house = $moon_house;
	}
elseif ($Planet == "Mar")
	{
		$tmpFriend_house = $mar_house;
	}
elseif ($Planet == "Mer")
	{
		$tmpFriend_house = $mer_house;
	}
elseif ($Planet == "Jup")
	{
		$tmpFriend_house = $jup_house;
	}
elseif ($Planet == "Ven")
	{
		$tmpFriend_house = $ven_house;
	}
elseif ($Planet == "Sat")
	{
		$tmpFriend_house = $sat_house;
	}

$x = 1;

// Temporary Friend/Enemy of Sun   

IF ($Planet == "Sun")
	{
    	$tf_sun = 0;
    	$pf_array =	array(0,11,16,12,11,11,12);
	}
	else
	{

    If ($sun_house < $tmpFriend_house)
        {
          $tmp_sun = (12 + $sun_house - $tmpFriend_house) + 1;
          If ($tmp_sun == 2 or $tmp_sun == 3 or $tmp_sun == 4 or $tmp_sun == 10 or $tmp_sun == 11 or $tmp_sun == 12)
            {
            $tf_sun = 14;
            }
          else
            {
              $tf_sun = 15;
            }
        }
      else
          {
            $tmp_sun = ($sun_house - $tmpFriend_house) + 1;
            If ($tmp_sun == 2 or $tmp_sun == 3 or $tmp_sun == 4 or $tmp_sun == 10 or $tmp_sun == 11 or $tmp_sun == 12)
            {
            $tf_sun = 14;
            }
          else
            {
              $tf_sun = 15;
            }
        }
	}


// Temporary Friend/Enemy of Moon
IF ($Planet == "Moon")

	{
		$tf_moon = 0;
		$pf_array =	array(11,0,11,16,16,16,16);	
	}
	else
	{
    If ($moon_house < $tmpFriend_house)
        {
          $tmp_moon = (12 + $moon_house - $tmpFriend_house) + 1;
          If ($tmp_moon == 2 or $tmp_moon == 3 or $tmp_moon == 4 or $tmp_moon == 10 or $tmp_moon == 11 or $tmp_moon == 12)
            {
            $tf_moon = 14;
            }
          else
            {
              $tf_moon = 15;
            }
        }
      else
          {
            $tmp_moon = ($moon_house - $tmpFriend_house) + 1;
            If ($tmp_moon == 2 or $tmp_moon == 3 or $tmp_moon == 4 or $tmp_moon == 10 or $tmp_moon == 11 or $tmp_moon == 12)
            {
            $tf_moon = 14;
            }
          else
            {
            $tf_moon = 15;
            }
          }
    }
// Temporary Friend/Enemy of Mar

IF ($Planet == "Mar")
	{
		$tf_mar = 0;
		$pf_array =	array(11,11,12,16,0,11,16);
	}
	else
	{    
    If ($mar_house < $tmpFriend_house)
        {
          $tmp_mar = (12 + $mar_house - $tmpFriend_house) + 1;
          If ($tmp_mar == 2 or $tmp_mar == 3 or $tmp_mar == 4 or $tmp_mar == 10 or $tmp_mar == 11 or $tmp_mar == 12)
            {
            $tf_mar = 14;
            }
          else
            {
              $tf_mar = 15;
            }
        }
      else
        {
          $tmp_mar = ($mar_house - $tmpFriend_house) + 1;
          If ($tmp_mar == 2 or $tmp_mar == 3 or $tmp_mar == 4 or $tmp_mar == 10 or $tmp_mar == 11 or $tmp_mar == 12)
            {
            $tf_mar = 14;
            }
          else
            {
              $tf_mar = 15;
            }
          }
    }
// Temporary Friend/Enemy of Mer
IF ($Planet == "Mer")
	{
		$tf_mer = 0;
		$pf_array =	array(11,12,0,11,16,16,16);
	}
	else
	{    
    If ($mer_house < $tmpFriend_house)
        {
          $tmp_mer = (12 + $mer_house - $tmpFriend_house) + 1;
            If ($tmp_mer == 2 or $tmp_mer == 3 or $tmp_mer == 4 or $tmp_mer == 10 or $tmp_mer == 11 or $tmp_mer == 12)
            {
            $tf_mer = 14;
            }
          else
            {
              $tf_mer = 15;
            }
        }
      else
        {
          $tmp_mer = ($mer_house - $tmpFriend_house) + 1;
          If ($tmp_mer == 2 or $tmp_mer == 3 or $tmp_mer == 4 or $tmp_mer == 10 or $tmp_mer == 11 or $tmp_mer == 12)
            {
            $tf_mer = 14;
            }
          else
            {
              $tf_mer = 15;
            }
          }
    }

// Temporary Friend/Enemy of Jup

IF ($Planet == "Jup")
	{
		$tf_jup = 0;
		$pf_array =	array(11,11,12,12,11,0,16);
	}
	else
	{    
    If ($jup_house < $tmpFriend_house)
        {
          $tmp_jup = (12 + $jup_house - $tmpFriend_house) + 1;
          If ($tmp_jup == 2 or $tmp_jup == 3 or $tmp_jup == 4 or $tmp_jup == 10 or $tmp_jup == 11 or $tmp_jup == 12)
            {
            $tf_jup = 14;
            }
          else
            {
              $tf_jup = 15;
            }
        }
      else
        {
          $tmp_jup = ($jup_house - $tmpFriend_house) + 1;
          If ($tmp_jup == 2 or $tmp_jup == 3 or $tmp_jup == 4 or $tmp_jup == 10 or $tmp_jup == 11 or $tmp_jup == 12)
            {
            $tf_jup = 14;
            }
          else
            {
              $tf_jup = 15;
            }
          }
    }
// Temporary Friend/Enemy of Ven

IF ($Planet == "Ven")
	{
		$tf_ven = 0;
		$pf_array =	array(12,12,11,0,16,16,11);
	}
	else
	{    
    If ($ven_house < $tmpFriend_house)
        {
          $tmp_ven = (12 + $ven_house - $tmpFriend_house) + 1;
          If ($tmp_ven == 2 or $tmp_ven == 3 or $tmp_ven == 4 or $tmp_ven == 10 or $tmp_ven == 11 or $tmp_ven == 12)
            {
            $tf_ven = 14;
            }
          else
            {
              $tf_ven = 15;
            }
          }
      else
        {
          $tmp_ven = ($ven_house - $tmpFriend_house) + 1;
          If ($tmp_ven == 2 or $tmp_ven == 3 or $tmp_ven == 4 or $tmp_ven == 10 or $tmp_ven == 11 or $tmp_ven == 12)
            {
            $tf_ven = 14;
            }
          else
            {
              $tf_ven = 15;
            }
          }

    }

// Temporary Friend/Enemy of Sat

IF ($Planet == "Sat")
	{
		$tf_sat = 0;
		$pf_array =	array(12,12,11,11,12,16,0);
	}
	else
	{    
    If ($sat_house < $tmpFriend_house)
        {
          $tmp_sat = (12 + $sat_house - $tmpFriend_house) + 1;
          If ($tmp_sat == 2 or $tmp_sat == 3 or $tmp_sat == 4 or $tmp_sat == 10 or $tmp_sat == 11 or $tmp_sat == 12)
            {
            $tf_sat = 14;
            }
          else
            {
              $tf_sat = 15;
            }
          }
      else
        {
          $tmp_sat = ($sat_house - $tmpFriend_house) + 1;
          If ($tmp_sat == 2 or $tmp_sat == 3 or $tmp_sat == 4 or $tmp_sat == 10 or $tmp_sat == 11 or $tmp_sat == 12)
            {
            $tf_sat = 14;
            }
          else
            {
            $tf_sat = 15;
            }
          }
    }
//Temporary Friend/Enemy ends



/*
echo "This is Temporary Friend of Sun in Sun : " . $tf_sun . "<br>";
echo "This is Temporary Friend of Moon in Sun : " . $tf_moon . "<br>";
echo "This is Temporary Friend of Mar in Sun : " . $tf_mar . "<br>";
echo "This is Temporary Friend of Mer in Sun : " . $tf_mer . "<br>";
echo "This is Temporary Friend of Jup in Sun : " . $tf_jup . "<br>";
echo "This is Temporary Friend of Ven in Sun : " . $tf_ven . "<br>";
echo "This is Temporary Friend of Sat in Sun : " . $tf_sat . "<br>";



echo "This is Sun PF : " . $pf_array[0] . "<br>";
echo "This is Moon PF : " . $pf_array[1] . "<br>";
echo "This is Mer PF : " . $pf_array[2] . "<br>";
echo "This is Ven PF : " . $pf_array[3] . "<br>";
echo "This is Mar PF : " . $pf_array[4] . "<br>";
echo "This is Jup PF : " . $pf_array[5] . "<br>";
echo "This is Sat PF : " . $pf_array[6] . "<br>";
echo "###############" . "<br>";
*/

$sun[$x] = $pf_array[0] + $tf_sun;
$moon[$x] = $pf_array[1] + $tf_moon;
$mar[$x] = $pf_array[4] + $tf_mar;
$mer[$x] = $pf_array[2] + $tf_mer;
$jup[$x] = $pf_array[5] + $tf_jup;
$ven[$x] = $pf_array[3] + $tf_ven;
$sat[$x] = $pf_array[6] + $tf_sat;

/*
echo "This is Sun total PF : " . $sun[$x] . "<br>";
echo "This is Moon total PF : " . $moon[$x] . "<br>";
echo "This is Mer total PF : " . $mer[$x] . "<br>";
echo "This is Ven total PF : " . $ven[$x] . "<br>";
echo "This is Mar total PF : " . $mar[$x] . "<br>";
echo "This is Jup total PF : " . $jup[$x] . "<br>";
echo "This is Sat total PF : " . $sat[$x] . "<br>";
echo "###############" . "<br>";
*/



$PM_sun[$x] = Relation($sun[$x]);
$PM_moon[$x] = Relation($moon[$x]);
$PM_mar[$x] = Relation($mar[$x]);
$PM_mer[$x] = Relation($mer[$x]);
$PM_jup[$x] = Relation($jup[$x]);
$PM_ven[$x] = Relation($ven[$x]);
$PM_sat[$x] = Relation($sat[$x]);


/*
echo "This is the Panchadamaitri of Sun : " . $PM_sun[$x] . "<br>";
echo "This is the Panchadamaitri of Moon : " . $PM_moon[$x] . "<br>";
echo "This is the Panchadamaitri of Mar : " . $PM_mar[$x] . "<br>";
echo "This is the Panchadamaitri of Mer : " . $PM_mer[$x] . "<br>";
echo "This is the Panchadamaitri of Jup : " . $PM_jup[$x] . "<br>";
echo "This is the Panchadamaitri of Ven : " . $PM_ven[$x] . "<br>";
echo "This is the Panchadamaitri of Sat : " . $PM_sat[$x] . "<br>";
*/

// Sun Ends

//}  // For close Bracket

return array($PM_sun[$x], $PM_moon[$x], $PM_mar[$x], $PM_mer[$x], $PM_jup[$x], $PM_ven[$x], $PM_sat[$x]);

} // Function Close Bracket

//Panchadamaitri calculations ends

// Calculation of Saptavargeeya Bala Starts
Function SaptavargaBala($PL1, $PL2, $PL3, $PL4, $PL5, $PL6, $PL7, $Asdt, $Type)
{
$D1_sun_SL = SignLordNo($PL1);
$D1_moon_SL = SignLordNo($PL2);
$D1_mar_SL = SignLordNo($PL3);
$D1_mer_SL = SignLordNo($PL4);
$D1_jup_SL = SignLordNo($PL5);
$D1_ven_SL = SignLordNo($PL6);
$D1_sat_SL = SignLordNo($PL7);


/*
$D2_sun_SL = SignLordNo($$DL2);
$D3_sun_SL = SignLordNo($$DL3);
$D7_sun_SL = SignLordNo($$DL4);
$D9_sun_SL = SignLordNo($$DL5);
$D12_sun_SL = SignLordNo($$DL6);
$D30_sun_SL = SignLordNo($$DL7);
*/


/*
$D1_sun_SL = SignLordNo($_SESSION['tmp_Long_Sun']);
$D2_sun_SL = SignLordNo($_SESSION['sunD2Long']);
$D3_sun_SL = SignLordNo($_SESSION['sunD3Long']);
$D7_sun_SL = SignLordNo($_SESSION['sunD7Long']);
$D9_sun_SL = SignLordNo($_SESSION['sunNLong']);
$D12_sun_SL = SignLordNo($_SESSION['sunD12Long']);
$D30_sun_SL = SignLordNo($_SESSION['sunD30Long']);
*/
/*
echo "This is D-1 Sun Sign Lord : " . $D1_sun_SL . "<br>";
echo "This is D-1 Moon Sign Lord : " . $D1_moon_SL . "<br>";
echo "This is D-1 Mar Sign Lord : " . $D1_mar_SL . "<br>";
echo "This is D-1 Mer Sign Lord : " . $D1_mer_SL . "<br>";
echo "This is D-1 Jup Sign Lord : " . $D1_jup_SL . "<br>";
echo "This is D-1 Ven Sign Lord : " . $D1_ven_SL . "<br>";
echo "This is D-1 Sat Sign Lord : " . $D1_sat_SL . "<br>";
echo "&&&&&&&&&&&" . "<br>";
//echo "This is Sun D-2 Longitude : " . $_SESSION['sunD2Long'] . "<br>";
*/

$D1Type = $Type;
//echo " THis is D1 Type : " . $D1Type .  "<br>";

$D1_sun_Long = $PL1; // D1 Sun Longitude
$D1_moon_Long = $PL2; // D1 Moon Longitude
$D1_mar_Long = $PL3; // D1 Mar Longitude
$D1_mer_Long = $PL4; // D1 Mer Longitude
$D1_jup_Long = $PL5; // D1 Jup Longitude
$D1_ven_Long = $PL6; // D1 Ven Longitude
$D1_sat_Long = $PL7; // D1 Sat Longitude

$tf_sun = PanchadaMaitri($PL1, $PL2, $PL3, $PL4, $PL5, $PL6, $PL7, $Asdt, "Sun");
$tf_moon = PanchadaMaitri($PL1, $PL2, $PL3, $PL4, $PL5, $PL6, $PL7, $Asdt, "Moon");
$tf_mar = PanchadaMaitri($PL1, $PL2, $PL3, $PL4, $PL5, $PL6, $PL7, $Asdt, "Mar");
$tf_mer = PanchadaMaitri($PL1, $PL2, $PL3, $PL4, $PL5, $PL6, $PL7, $Asdt, "Mer");
$tf_jup = PanchadaMaitri($PL1, $PL2, $PL3, $PL4, $PL5, $PL6, $PL7, $Asdt, "Jup");
$tf_ven = PanchadaMaitri($PL1, $PL2, $PL3, $PL4, $PL5, $PL6, $PL7, $Asdt, "Ven");
$tf_sat = PanchadaMaitri($PL1, $PL2, $PL3, $PL4, $PL5, $PL6, $PL7, $Asdt, "Sat");




$D1_sun_bala = 0;
$D1_moon_bala = 0;
$D1_mar_bala = 0;
$D1_mer_bala = 0;
$D1_jup_bala = 0;
$D1_ven_bala = 0;
$D1_sat_bala = 0;

$x = 1;


// Start of D1 Varga Bala Calculation for Sun

If ($D1Type == "D1")
{

If ($D1_sun_Long > 120 and $D1_sat_Long <= 140)
  
  {
    $D1_sun_bala = $D1_sun_bala + 45;
  }

else
  {
    $D1_sun_bala = $D1_sun_bala + 0;
  }
}
If ($D1_sun_Long > 120 and $D1_sun_Long<=150)
  {
    $D1_sun_bala = $D1_sun_bala + 30; 
  }
elseif ($tf_sun[$D1_sun_SL] == "Best Friend")
  {
    $D1_sun_bala = $D1_sun_bala + 22.5;
  }
elseif ($tf_sun[$D1_sun_SL] == "Friend")
  {
    $D1_sun_bala = $D1_sun_bala + 15;
  }
elseif ($tf_sun[$D1_sun_SL] == "Neutral")
  {
    $D1_sun_bala = $D1_sun_bala + 7.5;
  }
elseif ($tf_sun[$D1_sun_SL] == "Enemy")
  {
    $D1_sun_bala = $D1_sun_bala + 3.75;
  }
elseif ($tf_sun[$D1_sun_SL] == "Bitter Enemy")
  {
    $D1_sun_bala = $D1_sun_bala + 1.875;
  }
else
  {
    $D1_sun_bala = $D1_sun_bala + 0;
  }
// End of D1 Varga Bala Calculation for Sun

// Start of D1 Varga Bala Calculation for Moon

If ($D1Type == "D1")
{

If ($D1_moon_Long > 33 and $D1_sat_Long <= 60)
  
  {
    $D1_moon_bala = $D1_moon_bala + 45;
  }

else
  {
    $D1_moon_bala = $D1_moon_bala + 0;
  }
}
If ($D1_moon_Long > 90 and $D1_moon_Long<=120)
  {
    $D1_moon_bala = $D1_moon_bala + 30; 
  }
elseif ($tf_moon[$D1_moon_SL] == "Best Friend")
  {
    $D1_moon_bala = $D1_moon_bala + 22.5;
  }
elseif ($tf_moon[$D1_moon_SL] == "Friend")
  {
    $D1_moon_bala = $D1_moon_bala + 15;
  }
elseif ($tf_moon[$D1_moon_SL] == "Neutral")
  {
    $D1_moon_bala = $D1_moon_bala + 7.5;
  }
elseif ($tf_moon[$D1_moon_SL] == "Enemy")
  {
    $D1_moon_bala = $D1_moon_bala + 3.75;
  }
elseif ($tf_moon[$D1_moon_SL] == "Bitter Enemy")
  {
    $D1_moon_bala = $D1_moon_bala + 1.875;
  }
else
  {
    $D1_moon_bala = $D1_moon_bala + 0;
  }
// End of D1 Varga Bala Calculation for Moon

// Start of D1 Varga Bala Calculation for Mars

If ($D1Type == "D1")
{

If ($D1_mar_Long > 0 and $D1_sat_Long <= 12)
  
  {
    $D1_mar_bala = $D1_mar_bala + 45;
  }

else
  {
    $D1_mar_bala = $D1_mar_bala + 0;
  }
}
If ($D1_mar_Long > 0 and $D1_mar_Long<=30)
  {
    $D1_mar_bala = $D1_mar_bala + 30; 
  }
elseif ($D1_mar_Long > 210 and $D1_mar_Long<=240)
  {
    $D1_mar_bala = $D1_mar_bala + 30; 
  }
elseif ($tf_mar[$D1_mar_SL] == "Best Friend")
  {
    $D1_mar_bala = $D1_mar_bala + 22.5;
  }
elseif ($tf_mar[$D1_mar_SL] == "Friend")
  {
    $D1_mar_bala = $D1_mar_bala + 15;
  }
elseif ($tf_mar[$D1_mar_SL] == "Neutral")
  {
    $D1_mar_bala = $D1_mar_bala + 7.5;
  }
elseif ($tf_mar[$D1_mar_SL] == "Enemy")
  {
    $D1_mar_bala = $D1_mar_bala + 3.75;
  }
elseif ($tf_mar[$D1_mar_SL] == "Bitter Enemy")
  {
    $D1_mar_bala = $D1_mar_bala + 1.875;
  }
else
  {
    $D1_mar_bala = $D1_mar_bala + 0;
  }
// End of D1 Varga Bala Calculation for Mars

// Start of D1 Varga Bala Calculation for Mer

If ($D1Type == "D1")
{

If ($D1_mer_Long > 165 and $D1_sat_Long <= 170)
  
  {
    $D1_mer_bala = $D1_mer_bala + 45;
  }

else
  {
    $D1_mer_bala = $D1_mer_bala + 0;
  }
}
If ($D1_mer_Long > 60 and $D1_mer_Long<=90)
  {
    $D1_mer_bala = $D1_mer_bala + 30; 
  }
elseif ($D1_mer_Long > 150 and $D1_mer_Long<= 180)
  {
    $D1_mer_bala = $D1_mer_bala + 30; 
  }
elseif ($tf_mer[$D1_mer_SL] == "Best Friend")
  {
    $D1_mer_bala = $D1_mer_bala + 22.5;
  }
elseif ($tf_mer[$D1_mer_SL] == "Friend")
  {
    $D1_mer_bala = $D1_mer_bala + 15;
  }
elseif ($tf_mer[$D1_mer_SL] == "Neutral")
  {
    $D1_mer_bala = $D1_mer_bala + 7.5;
  }
elseif ($tf_mer[$D1_mer_SL] == "Enemy")
  {
    $D1_mer_bala = $D1_mer_bala + 3.75;
  }
elseif ($tf_mer[$D1_mer_SL] == "Bitter Enemy")
  {
    $D1_mer_bala = $D1_mer_bala + 1.875;
  }
else
  {
    $D1_mer_bala = $D1_mer_bala + 0;
  }
// End of D1 Varga Bala Calculation for Mer

// Start of D1 Varga Bala Calculation for Jup

If ($D1Type == "D1")
{

If ($D1_jup_Long > 240 and $D1_sat_Long <= 250)
  
  {
    $D1_jup_bala = $D1_jup_bala + 45;
  }

else
  {
    $D1_jup_bala = $D1_jup_bala + 0;
  }
}
If ($D1_jup_Long > 240 and $D1_jup_Long<= 270)
  {
    $D1_jup_bala = $D1_jup_bala + 30; 
  }
elseif ($D1_jup_Long > 330 and $D1_jup_Long<= 360)
  {
    $D1_jup_bala = $D1_jup_bala + 30; 
  }
elseif ($tf_jup[$D1_jup_SL] == "Best Friend")
  {
    $D1_jup_bala = $D1_jup_bala + 22.5;
  }
elseif ($tf_jup[$D1_jup_SL] == "Friend")
  {
    $D1_jup_bala = $D1_jup_bala + 15;
  }
elseif ($tf_jup[$D1_jup_SL] == "Neutral")
  {
    $D1_jup_bala = $D1_jup_bala + 7.5;
  }
elseif ($tf_jup[$D1_jup_SL] == "Enemy")
  {
    $D1_jup_bala = $D1_jup_bala + 3.75;
  }
elseif ($tf_jup[$D1_jup_SL] == "Bitter Enemy")
  {
    $D1_jup_bala = $D1_jup_bala + 1.875;
  }
else
  {
    $D1_jup_bala = $D1_jup_bala + 0;
  }
// End of D1 Varga Bala Calculation for Jup

// Start of D1 Varga Bala Calculation for Ven

If ($D1Type == "D1")
{

If ($D1_ven_Long > 180 and $D1_sat_Long <= 195)
  
  {
    $D1_ven_bala = $D1_ven_bala + 45;
  }
else
  {
    $D1_ven_bala = $D1_ven_bala + 0;
  }
}
If ($D1_ven_Long > 30 and $D1_ven_Long<= 60)
  {
    $D1_ven_bala = $D1_ven_bala + 30; 
  }
elseif ($D1_ven_Long > 180 and $D1_ven_Long<= 210)
  {
    $D1_ven_bala = $D1_ven_bala + 30; 
  }
elseif ($tf_ven[$D1_ven_SL] == "Best Friend")
  {
    $D1_ven_bala = $D1_ven_bala + 22.5;
  }
elseif ($tf_ven[$D1_ven_SL] == "Friend")
  {
    $D1_ven_bala = $D1_ven_bala + 15;
  }
elseif ($tf_ven[$D1_ven_SL] == "Neutral")
  {
    $D1_ven_bala = $D1_ven_bala + 7.5;
  }
elseif ($tf_ven[$D1_ven_SL] == "Enemy")
  {
    $D1_ven_bala = $D1_ven_bala + 3.75;
  }
elseif ($tf_ven[$D1_ven_SL] == "Bitter Enemy")
  {
    $D1_ven_bala = $D1_ven_bala + 1.875;
  }
else
  {
    $D1_ven_bala = $D1_ven_bala + 0;
  }
// End of D1 Varga Bala Calculation for Ven
  
// Start of D1 Varga Bala Calculation for Sat

//echo "This is D1 Sat Longitude : " . $$D1_sat_Long . "<br>";
If ($D1Type == "D1")
{

If ($D1_sat_Long > 300 and $D1_sat_Long <= 320)
  
  {
    $D1_sat_bala = $D1_sat_bala + 45;
  }

else
  {
    $D1_sat_bala = $D1_sat_bala + 0;
  }
}


If ($D1_sat_Long > 300 and $D1_sat_Long<= 330)
  {
    $D1_sat_bala = $D1_sat_bala + 30; 
  }
elseif ($D1_sat_Long > 270 and $D1_sat_Long<= 300)
  {
    $D1_sat_bala = $D1_sat_bala + 30; 
  }
elseif ($tf_sat[$D1_sat_SL] == "Best Friend")
  {
    $D1_sat_bala = $D1_sat_bala + 22.5;
  }
elseif ($tf_sat[$D1_sat_SL] == "Friend")
  {
    $D1_sat_bala = $D1_sat_bala + 15;
  }
elseif ($tf_sat[$D1_sat_SL] == "Neutral")
  {
    $D1_sat_bala = $D1_sat_bala + 7.5;
  }
elseif ($tf_sat[$D1_sat_SL] == "Enemy")
  {
    $D1_sat_bala = $D1_sat_bala + 3.75;
  }
elseif ($tf_sat[$D1_sat_SL] == "Bitter Enemy")
  {
    $D1_sat_bala = $D1_sat_bala + 1.875;
  }
else
  {
    $D1_sat_bala = $D1_sat_bala + 0;
  }

// End of D1 Varga Bala Calculation for Sat

/*
echo "This is tfsun of Jupiter for sun : " . $tf_sun[$D1_sun_SL] . "<br>";
echo "This is tfsun of Moon for sun : " . $tf_moon[$D1_moon_SL] . "<br>";
echo "This is tfsun of Mar for sun : " . $tf_mar[$D1_mar_SL] . "<br>";
echo "This is tfsun of Mer for sun : " . $tf_mer[$D1_mer_SL] . "<br>";
echo "This is tfsun of Jupiter for sun : " . $tf_jup[$D1_jup_SL] . "<br>";
echo "This is tfsun of Ven for sun : " . $tf_ven[$D1_ven_SL] . "<br>";
echo "This is tfsun of Sat for sun : " . $tf_sat[$D1_sat_SL] . "<br>";


echo "This is D-1 Bala  for sun-Sun : " . $D1_sun_bala . "<br>";
echo "This is D-1 Bala  for sun-Moon : " . $D1_moon_bala . "<br>";
echo "This is D-1 Bala  for sun-Mar : " . $D1_mar_bala . "<br>";
echo "This is D-1 Bala  for sun-Mer : " . $D1_mer_bala . "<br>";
echo "This is D-1 Bala  for sun-Jup : " . $D1_jup_bala . "<br>";
echo "This is D-1 Bala  for sun-Ven : " . $D1_ven_bala . "<br>";
echo "This is D-1 Bala  for sun-Sat : " . $D1_sat_bala . "<br>";
*/

$SV_sun_bala[$x] = $D1_sun_bala;
$SV_moon_bala[$x] = $D1_moon_bala;
$SV_mar_bala[$x] = $D1_mar_bala;
$SV_mer_bala[$x] = $D1_mer_bala;
$SV_jup_bala[$x] = $D1_jup_bala;
$SV_ven_bala[$x] = $D1_ven_bala;
$SV_sat_bala[$x] = $D1_sat_bala;

//echo "This is Saptavargeeya Bala  ********* : " . $saptvarg_bala_sun . "<br>";

return array($SV_sun_bala[$x], $SV_moon_bala[$x], $SV_mar_bala[$x], $SV_mer_bala[$x], $SV_jup_bala[$x], $SV_ven_bala[$x], $SV_sat_bala[$x]);

}

// Calculation of Saptavargeeya Bala Ends


//}  //Very Last End 


// Calculations for Uchcha Bala

Function DigBala($PlanetLongitude, $CuspLong) 
{

$diff = fmod(($PlanetLongitude - $CuspLong), 180);
  If ($diff <0)
  {
    $diff = fmod(($CuspLong - $PlanetLongitude), 180);
  }

$DigBala = ($diff / 3);

return $DigBala;

}

// Calculating Kakshya of a Planet
Function Kakshya($PlanetLongitude)
{
  $PL = fmod($PlanetLongitude,30);
  //echo "This is mod of PL : " . $PL . "<br>";
  $PL = ceil($PL*8/30);
  //echo "This is round of PL : " . $PL . "<br>";

  If ($PL == 1)
  {$Kakshya = "Sat";}
  elseif ($PL == 2)
  {$Kakshya = "Jup";}
  elseif ($PL == 3)
    {$Kakshya = "Mar";}
  elseif ($PL == 4)
    {$Kakshya = "Sun";}
  elseif ($PL == 5)
    {$Kakshya = "Ven";}
  elseif ($PL == 6)
    {$Kakshya = "Mer";}
  elseif ($PL == 7)
    {$Kakshya = "Mon";}
  else
    {$Kakshya = "Asc";}

  return $Kakshya;

}


//convert JD Date Time to Local Time

Function ConvertJDtoDateandTime($Result_JD, $current_tz)
{
  //returns date and time in local time, e.g. 9/3/2007 4:59 am
  //get calendar day - must adjust for the way the PHP function works by adding 0.5 days to the JD of interest
  $jd_to_use = $Result_JD + $current_tz / 24;

  $JDDate = jdtogregorian($jd_to_use + 0.5);

  $fraction = $jd_to_use - floor($jd_to_use);

  if ($fraction < 0.5)
  {
    $am_pm = "pm";
  }
  else
  {
    $fraction = $fraction - 0.5;
    $am_pm = "am";
  }

  $hh = $fraction * 24;
  if ($hh < 1)
  {
    $hh = $hh + 12;
  }

  $mm = $hh - floor($hh);
  $mins = floor($mm * 60);

  $secs = floor(($mm * 60 - floor($mm * 60)) * 60);
  if ($secs == 30)
  {
    $secs = "30";
  }
  else
  {
    $secs = "00";
  }

  if ($mins < 10)
  {
    return $JDDate . " " . floor($hh) . ":0" . floor($mm * 60) . ":" . $secs . " " . $am_pm;
  }
  else
  {
    return $JDDate . " " . floor($hh) . ":" . floor($mm * 60) . ":" . $secs . " " . $am_pm;
  }
}

// Calculation of Drik Bala Starts
function calcDrikBala($pl1, $pl2, $pl3, $pl4, $pl5, $pl6, $pl7, $pl8, $pl9, $planet)
{
  
$dkp[1] = $pl1;
$dkp[2] = $pl2;
$dkp[3] = $pl3;
$dkp[4] = $pl4;
$dkp[5] = $pl5;
$dkp[6] = $pl6;
$dkp[7] = $pl7;
$dkp[8] = $pl8;
$dkp[9] = $pl9;

If ($planet == "Sun")
{
  $asp_planet = $dkp[1];
  $k = 1;
}
elseif ($planet == "Moon")
{
  $asp_planet = $dkp[2];
  $k = 2;
}
elseif ($planet == "Mar")
{
  $asp_planet = $dkp[3];
  $k = 3;
}
elseif ($planet == "Mer")
{
  $asp_planet = $dkp[4];
  $k = 4;
}
elseif ($planet == "Jup")
{
  $asp_planet = $dkp[5];
  $k = 5;
}
elseif ($planet == "Ven")
{
  $asp_planet = $dkp[6];
  $k = 6;
}
elseif ($planet == "Sat")
{
  $asp_planet = $dkp[7];
  $k = 7;
}


for ($i=1; $i<=7; $i++)
{
  echo "This is Planet : " . $dkp[$i] . "<br>";

  If ($dkp[$i] < $asp_planet)
  {
    $dk[$i] = $asp_planet - $dkp[$i];
    //$dirshti[$i] = findDrishtiValue($dk[$i]);
  }
  elseif ($dkp[$i] > $asp_planet)
  {
    $dk[$i] = 360 + $asp_planet - $dkp[$i];
    //$dirshti[$i] = findDrishtiValue($dk[$i]);
  }
  else
  {
    $dk[$i] = 0;
    //$drishti[$i] = 0;
  } 

}// For ends

for ($j=1; $j<=7; $j++)
{
  
  $drishti[$j] = findDrishtiValue($dk[$j]);

  If ($j == 1 or $j == 3 or $j == 4 or $j == 7)
  {
    $drishti[$j] = $drishti[$j] * -1;
  }
  else
  {
    $drishti[$j] = $drishti[$j] * 1;
  }
  //$drishti_tot[$j] = $drishti_tot[$j] + $drishti[$j];
}



//return array($dk[1], $dk[2], $dk[3], $dk[4], $dk[5], $dk[6], $dk[7], $drishti[1], $drishti[2], $drishti[3], $drishti[4], $drishti[5], $drishti[6], $drishti[7]);

return array($drishti[1], $drishti[2], $drishti[3], $drishti[4], $drishti[5], $drishti[6], $drishti[7]);


}

// Calculatin of Drik Bala Ends

function findDrishtiValue($dk)
{
  

  IF ($dk > 0 and $dk < 30)
  {
    $drishti = 0;
  }
  elseif ($dk >= 30 and $dk <= 60)
  {
    $drishti = ($dk - 30)/2;
  }
  elseif ($dk >=60 and $dk <= 90)
  {
    $drishti = ($dk - 60) + 15;
  }
  elseif ($dk >= 90 and $dk <= 120)
  {
      $drishti = ((120 - $dk)/2) + 30;
  }
  elseif ($dk >= 120 and $dk <=150)
  {
    $drishti = (150-$dk);
  }
  elseif ($dk >= 150 and $dk <=180)
  {
    $drishti = (($dk - 150)*2);
  }
  elseif ($dk >= 180 and $dk <= 300)
  {
    $drishti = ((300-$dk)/2);
  }
  else
  {
    $drishti = 0;
  }

return $drishti;

}// Function Ends

// Yoga Karana and Tithi Start and End Function Starts

Function Yoga($PlanetLongitude)
{

$a[0] = "Vishkambha";
$a[1] = "Preeti";
$a[2] = "Ayushman";
$a[3] = "Sowbhagya";
$a[4] = "Sobhana";
$a[5] = "Atiganda";
$a[6] = "Sukarma";
$a[7] = "Dhriti";
$a[8] = "Shoola";
$a[9] = "Ganda";
$a[10] = "Vriddhi";
$a[11] = "Dhruva";
$a[12] = "Vyaghata";
$a[13] = "Harshana";
$a[14] = "Vajra";
$a[15] = "Siddhi";
$a[16] = "Vyathipatha";
$a[17] = "Variyan";
$a[18] = "Parigha";
$a[19] = "Shiva";
$a[20] = "Sidha";
$a[21] = "Sadhya";
$a[22] = "Subha";
$a[23] = "Sukla";
$a[24] = "Brahman";
$a[25] = "Indra";
$a[26] = "Vaidhriti";

If ($PlanetLongitude > 360)
{
$PlanetLongitude = ($PlanetLongitude - 360);
}

$N = Round($PlanetLongitude / 13.3333, 0);
$Yoga = $a[N - 1];

return $Yoga;
}
// End Tithi Calculation Starts
Function End_Tithi($Sun, $Moon, $nxtSun, $nxtMoon)
{
$R1 = ($nxtMoon - $Moon);
$R2 = ($nxtSun - $Sun);

$DlyMotion = ($R1 - $R2);

    If ($Moon < $Sun)
{
  $Moon = $Moon + 360;
    }
$strBal = ($Moon - $Sun);
$txnBal = $strBal / 12;
$txnBal = Floor($txnBal, 1);
$txnBal = ($strBal - ($txnBal * 12));
$Bal_Tithi = (12 - $txnBal);
$Bal_Tithi = ($Bal_Tithi / $DlyMotion);
$End_Tithi = $Bal_Tithi;

return $End_Tithi;
}
// End Tithi Calculation Ends




// Yoga Karana and Tithi start and End Function Ends

?>
