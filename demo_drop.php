<!DOCTYPE html>
<html>
<body>
<form id="vbn" name="vbn">

<p>Select a new car from the list.</p>

<select id="mySelect" onchange="myFunction()">
  <option value="9">D-9 Navamsa Chart</option>
  <option value="3">D-3 Trimsamsa Chart</option>
  <option value="2">D-2 Hora Chart</option>
  <option value="12">D-12 Dwasdasamsa Chart</option>
</select>

<p>When you select a new car, a function is triggered which outputs the value of the selected car.</p>

<p id="demo"></p>
<input id="ChartNo" type="text" name="ChartNo" size="60" readonly/>
<?php
$tmpNo = 'document.getElementById("ChartNo").value';

echo "This is TempNo: " . $tmpNo . "<br>";
?>

</form> 
<script>
function myFunction() {
	
  var x = document.getElementById("mySelect").value;

  document.getElementById("ChartNo").setAttribute("value", x); 

  document.getElementById("demo").innerHTML = "You selected: " + x;
}
</script>

</body>
</html>

