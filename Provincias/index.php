<?php include("open_db.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<title>Comunitats, províncies, municipis</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html charset=utf-8" />
<script>
function canvi_comunitat(id_com)
{
	//alert(id_com);
	var xmlhttp;
	var txt,x,xx,i;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			txt=xmlhttp.responseText;
			//alert(txt);
			var res = txt.split("*"); 
			document.getElementById('provincia').innerHTML=res[1];
			canvi_provincia(res[0]);
		} else {
			document.getElementById('provincia').innerHTML = "<img src=\"img/ajax_wait.gif\" />";
		}
	}
	xmlhttp.open("GET","cercar_provincies.php?id_com="+id_com,true);
	xmlhttp.send();

}

function canvi_provincia(id_prov)
{
	//alert(id_prov);
	var xmlhttp;
	var txt,x,xx,i;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			txt=xmlhttp.responseText;
			document.getElementById('municipi').innerHTML=txt;
		} else {
			document.getElementById('municipi').innerHTML = "<img src=\"img/ajax_wait.gif\" />";
		}
	}
	xmlhttp.open("GET","cercar_municipis.php?id_prov="+id_prov,true);
	xmlhttp.send();

}
</script>
</head>
<body onload="canvi_comunitat(1)">
<h1>Navega per les províncies</h1>
<div id="comunitat">
	<select name="comunitat" onclick="canvi_comunitat(this.value)">
<?php
$sql = "SELECT * FROM comunitats order by id_com";
$result = mysql_query($sql);

if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    die($message);
}

while ($row = mysql_fetch_assoc($result)) {
	echo "<option value=".$row['id_com'].">".$row['comunitat']."</option>";
}

?>
	</select>
</div>
<div id="provincia">
</div>
<div id="municipi">
</div>
<div id="info">
</div>
</body>
</html>
<?php include("close_db.php"); ?>
