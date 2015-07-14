<?
session_start();
if (!isset($_SESSION['admin'])){
	echo "<script language=javascript>window.location='login.php?msg=expired';</script>";
}

include("includes/config.php");
include("includes/functions.php");

$id = $_GET['id'];

mysql_query("delete from staffmsg where id=$id");
echo "<script language=javascript>window.location='stfmsg.php?msg=delete+success';</script>";


?>