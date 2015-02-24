<?php
//sleep(1);
include("open_db.php");
	
$id_com = $_GET["id_com"];
//echo $id_com;

$sql = "SELECT * FROM provincies where id_com=$id_com order by id_prov";

$result = mysql_query($sql);

if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    die($message);
}

$i = 0;	
$txt = "<select name=\"provincia\" onchange=\"canvi_provincia(this.value)\">";
while ($row = mysql_fetch_assoc($result)) {
	if ($i == 0) echo $row['id_prov']."*";
	$txt .= "<option value=".$row['id_prov'].">".$row['provincia']."</option>";
	$i++;
}
$txt .= "</select>";
echo $txt;
include("close_db.php");
?>
