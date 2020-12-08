<?php
/** Search city based on country
* @author : Prem Tiwair <www.freewebmentor.com>
*/

#include database configuration file
require_once('DbConnection.php');
$country_id = $_GET['country_id'];
$regions_data=mysqli_query($connection,"SELECT * FROM states where country_id = $country_id ORDER BY name");
$regions = array();
while($region = mysqli_fetch_assoc($regions_data)){
	array_push($regions, $region);
}
print_r(json_encode($regions));

?>