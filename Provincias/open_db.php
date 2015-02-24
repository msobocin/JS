<?php
$conn = mysql_connect("localhost", "root", "secret");
if (!$conn) {
    $log->error('Could not connect: ' . mysql_error());
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("provincias", $conn) or die('Could not select jbalmes database.');
mysql_set_charset('utf8',$conn);
?>

