<?
session_start();
if (!isset($_SESSION['admin'])){
	echo "<script language=javascript>window.location='login.php?msg=expired';</script>";
}

include("includes/config.php");
include("includes/functions.php");

$id = $_GET['id'];

$utype = $_SESSION['utype'];
$admin = $_SESSION['admin'];
$id1 = $_SESSION['id'];

?>
<html>
<head>
<title>TCTWBIMS | STUDENT HOME</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
<!--
@import url(styles.css);

body {
	background-color: #C2C0C0;
}
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style1 {color: #FFFFFF}
.style2 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style></head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<table width="760" height="761" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
<tr>
		<td height="207" colspan="8" align="left" valign="top" background="images/index_01.gif">

		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="40%" height="30">&nbsp;</td>
              <td width="48%" height="30" align="right">Welcome <font color="#993366"><b><?=$_SESSION['admin']?></b></font></td>
              <td width="12%" height="30">&nbsp; &nbsp;<a href="logout.php">Logout</a></td>
            </tr>
          </table>
        </td>
  </tr>
	<tr>
		
		<td colspan="8"  height="24" width="104" style="background:url(images/webmenu.gif);></td>
		<td  width="104" height="24" style="background:url(images/webmenu.gif) ">
			</td>
		
	</tr>
	<tr>
		<td height="423" colspan="3" align="left" valign="top" background="images/index_09.gif">
        
        <table width="99%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="20" bordercolor="1" bgcolor="#8C8989"> <span class="style1">&nbsp;&nbsp;TCTWBIMS</span></td>
          </tr>
        </table>
       
         <table width="99%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            
  <td class="left">
     <ul>
        <li><a href="student_home.php" title="Home">Student Home</a></li>
        <li><a href="viewstudent1.php?id=<?=$_SESSION['id']?>" title="Home">Your Profile</a></li>

     <li><a href="viewall.php" title="Viewall">View All Staff | Students </a></li>
	 <li><a href="change_pass1.php" title="Change">Change Password</a></li>
     <li><a href="stdmsg1.php" title="Messages">Compose Messages</a></li>
	<li><a href="#">Search</a> 
      <ul> 
        <li><a href="searchstaff1.php">Staff</a></li> 
        <li><a href="searchstudent1.php">Student</a></li> 
       
      </ul> 
    </li>
	
	</li> 
    <li><a href="other2.php">:: TCTWBIMS Related Links</a> 
     <ul> 
         <ul> 
        <a href="other2.php" title="#">Online TCT Registration </a></li>
	<li><a href="other2.php" title="#">TCT Library Management System </a></li>
	<li><a href="other2.php" title="#">Online TCT Clinic </a></li>
	<li><a href="other2.php" title="#">TCT Hostels Management System</a></li>
	<li><a href="other2.php" title="#">TCT Attendance System</a></li>
	<li><a href="other2.php" title="#">TCT Leaves Management System</a></li>
	<li><a href="other2.php" title="#">TCT Online Exams System</a></li>
      </ul> 
    </li>
   </td>  
  </td>
            
          </tr>

        </table>
        
        
        
		  <br>
	    <br></td>
<td height="423" colspan="5" align="left" valign="top" bgcolor="#EDEDED">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="1">
          <tr>
            <td height="20" bgcolor="#8C8989"><span class="style1"><strong> &nbsp;&nbsp;Student</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style1"> &nbsp;&nbsp;Today is on&nbsp;&nbsp;</span><?php


echo date("l, F d, Y " ,time());


?></td>
          </tr>
      </table>
        
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="20" style="padding:10px;"><img src="images/student_area.jpg" align="right"> <p align="left">&nbsp;&nbsp;&nbsp;&nbsp;                                                       Welcome to <strong>TCTWBIMS.&nbsp; </strong>As Student you dont have all rights in this system.  You are only able to <strong>Search & View</strong> any student or staff but You are <strong>not able to edit, delete or add </strong> their information. </p>
         You are able to <strong>send message to admin</strong> and email to others. Use your password that you can change anytime and login as Student. Enjoy</p></td>
          </tr>

        </table>
        



</td>
  </tr>
	<tr>
		<td height="40" colspan="8" background="images/index_11.gif" align="right" style="padding-right:10px; color:#FFFFFF;"><? include "footer.php";?></td>
  </tr>
	<tr>
		<td>
			<img src="images/spacer.gif" width="96" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="93" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="18" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="91" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="127" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="103" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="110" height="1" alt=""></td>
		<td>
			<img src="images/spacer.gif" width="122" height="1" alt=""></td>
	</tr>
</table>
<!-- End ImageReady Slices -->
</body>
</html>