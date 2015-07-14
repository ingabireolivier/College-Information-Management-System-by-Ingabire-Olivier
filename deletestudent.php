<?
session_start();
if (!isset($_SESSION['admin'])){
	echo "<script language=javascript>window.location='login.php?msg=expired';</script>";
}

include("includes/config.php");
include("includes/functions.php");

$id = $_GET['id'];

mysql_query("delete from student where id=$id");
mysql_query("delete from college where id=$id");
mysql_query("delete from lesson where id=$id");

echo "<script language=javascript>window.location='adminall.php';</script>";

?>