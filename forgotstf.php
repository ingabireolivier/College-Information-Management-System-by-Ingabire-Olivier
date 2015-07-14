<?
session_start();

include("includes/config.php");
include("includes/functions.php");
require_once('includes/phpgmailer/class.phpgmailer.php');

if (isset($_POST['Submit'])){
	$err = "";

	$empid = $_POST['stfid'];
	$email = $_POST['email'];
		
	if ($_POST['stfid'] == "" || $_POST['email'] == ""){
		if ($_POST['stfid'] == ""){
			$err = $err . "Invalid Staff ID";
		}
		if ($_POST['email'] == ""){
			$err = $err . "<br>Invalid E-Mail ID";
		}
}
		
if ($err != ""){
	
}
else{
    $stfid = $_POST['stfid'];
    $query = mysql_query("select * from staff where stfid='$stfid' and email='$email'");
    $numRows = mysql_num_rows($query);
	if ($numRows != 0){

		$res = mysql_fetch_array($query);
		$pass = $res['password'];
		
		$mail = new PHPGMailer();
		$mail->Username = 'tctwbims@gmail.com';
		$mail->Password = 'gift2020';
		$mail->From = 'tctwbims@gmail.com';
		$mail->FromName = 'tct wbims';
		$mail->Subject = 'Student Details';
		$mail->AddAddress($email);
		$mail->Body = 'Hi ' . $stfid . ', your password is ' . $pass;
		$mail->Send();
	}
	else{
		$err = "Wrong Staff ID or E-Mail";
	}

}

}	
?>
<html>
<head>
<title>TCTWBIMS | RECOVER PASSWORD </title>
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
.style3 {color: #FFFFFF; font-weight: bold; }
-->
</style></head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="javascript:document.LoginForm.uName.focus();">
<form name="personal" method="post" action="forgotstf.php">
<table width="760" height="761" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
<tr>
	  <td height="207" colspan="8" align="left" valign="top" background="images/index_01.gif">&nbsp;</td>
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
     <li><a href="index.php" title="Home">Home </a></li>
     <li><a href="login.php" title="Login">Login </a></li>
	<li><a href="contact.php" title="Contact Us">Contact Us</a></li>
	
    </li> 
    <li><a href="other.php">:: TCTWBIMS Related Links</a> 
       <ul> 
        <a href="other.php" title="#">Online TCT Registration </a></li>
	<li><a href="other.php" title="#">TCT Library Management System </a></li>
	<li><a href="other.php" title="#">Online TCT Clinic </a></li>
	<li><a href="other.php" title="#">TCT Hostels Management System</a></li>
	<li><a href="other.php" title="#">TCT Attendance System</a></li>
	<li><a href="other.php" title="#">TCT Leaves Management System</a></li>
	<li><a href="other.php" title="#">TCT Online Exams System</a></li>
      </ul> 
    </li>
    </li>
    
    
  </td>
          </tr>

        </table>
        
        
		  <br>
	    <br></td>
<td height="423" colspan="5" align="left" valign="top" bgcolor="#EDEDED">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="1">
          <tr>
            <td height="20" bgcolor="#8C8989"><span class="style1"><strong>Forgot Password</strong></span></td>
          </tr>
      </table>
        <? if ($err != ""){ ?>
        <div align="left" style=" padding:10px; background-color:#FFCCFF; border: solid 1px #0000FF; border-width:medium; border-color:#666666;"><? if ($err != ""){	echo $err;	}?></div>
        <? }
		
		elseif ($err == "" & isset($_POST['Submit'])){ ?>
        <div align="left" style=" padding:10px; background-color:#6699FF; border: solid 1px #0000FF; border-width:medium; border-color:#666666; color:#FFFFFF;">Your Password is sent to <?=$email?></div>
		<? }?>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="19%" height="30" style="padding:4px;">Staff ID</td>
            <td width="81%" height="30" style="padding:4px;"><input name="stfid" type="text" id="stfid" size="30"></td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">E-Mail</td>
            <td height="30" style="padding:4px;"><input type="text" size="30" name="email" id="email"></td>
          </tr>
          <tr>
            <td height="30" colspan="2" style="padding-left:140px;"><input type="submit" name="Submit" id="Submit" value="Get Password"></td>
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
</form>
</body>
</html>