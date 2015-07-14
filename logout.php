<?
session_start();
$_SESSION['admin']="";
$_SESSION['id'] = "";
$_SESSION['utype'] = "";

unset($_SESSION['admin']);
unset($_SESSION['id']);
unset($_SESSION['utype']);

echo("<script language=javascript>window.location='login.php?id=$id&msg=logout';</script>");

?>

