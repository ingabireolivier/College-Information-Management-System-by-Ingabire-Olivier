<?
session_start();
if (!isset($_SESSION['admin'])){
	echo "<script language=javascript>window.location='login.php?msg=expired';</script>";
}

include("includes/config.php");
include("includes/functions.php");

$id = $_GET['id'];

mysql_query("delete from staff where id=$id");
mysql_query("delete from staffing where id=$id");

echo "<script language=javascript>window.location='viewallstaff.php';</script>";

?>