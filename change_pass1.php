<?
session_start();
if (!isset($_SESSION['admin'])){
	echo "<script language=javascript>window.location='login.php?msg=expired';</script>";
}

$id = $_SESSION['id'];
$sucmsg = "";

include("includes/config.php");
include("includes/functions.php");

if (isset($_POST['Submit'])){
	$err = "";

	$curpass = $_POST['curpass'];
	$newpass = $_POST['newpass'];
	$retypepass = $_POST['retypepass'];
	
	
	if ($curpass == "" || $newpass == "" || $retypepass == ""){
		//$err = "<font color=red><b><u>Unable to proceed next step.Please check the following...</u></b></font>";
		$err = $err . "Required fields can not be left empty!";
	}
	else{
	
		if ($_SESSION['utype'] == "Administrator"){
			$sql = "select pass from users where id=$id and pass='$curpass'";
		}
		elseif ($_SESSION['utype'] == "student"){
			$sql = "select password from student where id=$id and password='$curpass'";
		}
		elseif ($_SESSION['utype'] == "staff"){
			$sql = "select password from staff where id=$id and password='$curpass'";
		}
		
		$query = mysql_query($sql);
		$numRows = mysql_num_rows($query);
		
		if ($numRows == 0){
			$err = $err . "Wrong current password<br>";
		}
		
		if ($newpass != $retypepass){
			$err = $err . "New Password and Confirmation password not the same<br>";
		}
		
		if (strlen($newpass)<5){
			$err = $err . "Password must have at least 5 characters<br>";
		}
		
		
	}

if ($err == ""){
	if ($_SESSION['utype'] == "Administrator"){
		$sql = "update users set pass='$newpass' where id=$id";
	}
	elseif ($_SESSION['utype'] == "student"){
		$sql = "update student set password='$newpass' where id=$id";
	}
	elseif ($_SESSION['utype'] == "staff"){
		$sql = "update staff set password='$newpass' where id=$id";
	}
	
	mysql_query($sql);
	
	$sucmsg = "success";
	
}	}	

?>
<html>
<head>
<title>TCTWBIMS | CHANGE PASSWORD</title>
<script language="javascript" type="text/javascript" src="script/datetimepicker.js"></script>

<style type="text/css">
<!--
@import url(styles.css);
@import url(calendar.css);

body {
	background-color: #C2C0C0;
}
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style1 {color: #FFFFFF}
-->
</style></head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="javascript:document.personal.curpass.focus();">
<form name="personal" method="post" action="change_pass1.php">
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
            
          </tr>

        </table>
        <br>
	    <br></td>
<td height="423" colspan="5" align="center" valign="top" bgcolor="#EDEDED">

        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="1">
          <tr>
            <td height="20" bgcolor="#8C8989" style="padding-left:6px; color:#FFFFFF; font-family:Arial; font-weight:bold;">Change Your Password</td>
          </tr>
      </table>
        <? if ($err != ""){ ?>
        <br><div align="left" style="width:370px; padding:10px; background-color:#FFCCFF; border: outset 2px #0000FF; border-width:medium; border-color:#666666;"><? if ($err != ""){	echo $err;	}?></div><br>
        <? }
		if ($sucmsg != ""){
		?>
        <div align="center" style="padding:2px;"><div align="center" style=" padding:10px; color:#FFFFFF; font-weight:bold; background-color:#0099FF; border: outset 2px #0000FF; border-width:medium; border-color:#003399;">PASSWORD CHANGED SUCCESSFULLY!</div></div>
        <? }?>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="28%" height="30" style="padding:4px;">Current Password</td>
            <td width="72%" height="30" style="padding:4px;">
            <input type="password" name="curpass" id="curpass">            </td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">New Password</td><td height="30" style="padding:4px;"><input type="password" name="newpass" id="newpass"></td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">Confirm Password</td><td height="30" style="padding:4px;"><input type="password" name="retypepass" id="retypepass""></td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">&nbsp;</td>
            <td height="30" style="padding:4px;"><input type="submit" name="Submit" id="Submit" value="Change Password"></td>
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
</form>
<iframe style="position: absolute; width: 0pt; height: 0pt; top: 320px; left: 143px; z-index: 9999; visibility: hidden; display: none;" src="javascript:false;" id="datepickeriframe" frameborder="0" scrolling="no"></iframe>
</body>
</html>