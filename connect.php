<?php
/*$db = mysql_connect( "localhost","96593","parabola" ) or die("incorrect host user or passowrd" ); 

mysql_select_db( "96593" , $db) or die("incorrect database"); 

mysql_query( "SET NAMES 'utf8' "); 
*/

$connect=mysql_connect("localhost","niko82","paroli") or die();
mysql_select_db("tutors",$connect) or die();
mysql_query("SET NAMES 'utf8' ");
?>