<?php 

$selected = '';
function get_options($select)
{
	$Countries = array(India=>"1",USA=>"2")
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<script language="javascript" type="text/javascript">
function doReload(catid){
	document.location = 'demo.php?catid=' + catid;
	
	/* But if you want to submit the form just comment above line and uncomment following lines*/
	//document.frm1.action = 'samepage.php';
	//document.frm1.method = 'post';
	//document.frm1.submit();
}
</script>
</head>
<body>
<form name="frm1" id="frm1">
    <select name="catid" id="catid" onChange="doReload(this.value);">
        <option value="" selected="selected">---All Category---</option>
        <option value="1">Category One</option>
        <option value="2">Category Two</option>
    </select>
</form>
</body>
</html>