<?php
$con = mysql_connect("localhost","root","");
if($con == false)
{
   echo "Connection Not Established Please Check!";
   exit;
}
$dbselect = mysql_select_db("ankit_csi_online");
if($dbselect == false)
{
	echo "Please Select Database!";
	exit;
}
?>