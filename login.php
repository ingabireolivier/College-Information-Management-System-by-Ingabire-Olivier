<?
session_start();
include("includes/config.php");

if (isset($_SESSION['admin'])){
	echo "<script language=javascript>window.location='admin_home.php';</script>";
}


if (isset($_POST['Submit'])){
	if ($_POST['uName']=="" || $_POST['Pass']==""){
		$errMsg = "Require field cannot be left blank";
		unset($_SESSION['admin']);
		unset($_SESSION['id']);
		unset($_SESSION['utype']);
		
	}
	else{
		$usrName=$_POST['uName'];
		$usrPass=$_POST['Pass'];
		
		$query = mysql_query("select * from admin where uname='$usrName' and pass='$usrPass'");
		
		$numRows = mysql_num_rows($query);
		
		if ($numRows == 0){
			$errMsg = "User Name and Password does not match";
		}
		else{
			$res = mysql_fetch_row($query);
			
			$_SESSION['id']= $res[0];
			$_SESSION['admin']= $res[1];
			$_SESSION['utype']= $res[3];
			
			$id = $res[0];
			$admin = $res[1];
			$utype = $res[3];
			echo("<script language=javascript>window.location='admin_home.php';</script>");
		}
        
        
		$query = mysql_query("select id,stdid from student where stdid='$usrName' and password='$usrPass'");
		
		$numRows = mysql_num_rows($query);
		
		if ($numRows == 0){
			$errMsg = "User Name and Password does not match";
		}
		else{
			$res = mysql_fetch_row($query);
			
			$_SESSION['id']= $res[0];
			$_SESSION['admin']= $res[1];
			$_SESSION['utype']= "student";
			
			$id = $res[0];
			$admin = $res[1];
			$utype = "student";
			
			echo "<script language=javascript>window.location='student_home.php';</script>";
		}
		
		
		$query = mysql_query("select id,stfid from staff where stfid='$usrName' and password='$usrPass'");
		
		$numRows = mysql_num_rows($query);
		
		if ($numRows == 0){
			$errMsg = "User Name and Password does not match";
		}
		else{
			$res = mysql_fetch_row($query);
			
			$_SESSION['id']= $res[0];
			$_SESSION['admin']= $res[1];
			$_SESSION['utype']= "staff";
			
			$id = $res[0];
			$admin = $res[1];
			$utype = "staff";
			
			echo "<script language=javascript>window.location='staff_home.php';</script>";
		}
	}
}
	

?>
<html>
<head>
<title>TCTWBIMS | LOGIN</title>
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
-->
</style></head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="javascript:document.LoginForm.uName.focus();">
<form name="LoginForm" method="post" action="login.php">
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
            <td height="20" bgcolor="#8C8989"><span class="style1"><strong> &nbsp;&nbsp;Login as Administrator / Student / Staff</strong></span></td>
          </tr>
      </table>
        
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="20" align="left" valign="top" style="padding:10px;"><table width="53%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="30" colspan="2" align="center"><strong>Login ....</strong></td>
              </tr>
              <? if($errMsg != ""){ ?>
              <tr>
                <td height="30" colspan="2" align="center" style="color:#FF0000; font-weight:bold;"><?=$errMsg?></td>
                </tr>
              <? } 
			  elseif ($_GET['msg']!=""){
			  ?>
              <tr>
                <td height="30" colspan="2" align="center" style="color:#FF0000; font-weight:bold;">Login session Destroyed! Please Login Again</td>
                </tr>
              <tr>
              <? }?>
                <td width="48%" height="30" align="right">USER NAME</td>
                <td width="52%" height="30" align="left">&nbsp;&nbsp;&nbsp;&nbsp;<input name="uName" type="text" id="uName" maxlength="15" style="font-size:9px; width:100px;"></td>
                </tr>
              <tr>
                <td height="30" align="right">PASSWORD</td>
                <td height="30" align="left">&nbsp;&nbsp;&nbsp;&nbsp;<input name="Pass" type="password" id="Pass" maxlength="15" style="font-size:9px; width:100px;"></td>
                </tr>
              <tr>
                <td height="30">&nbsp;</td>
                <td height="30" align="center"><input type="submit" name="Submit" id="Submit" value="Login" style="font-size:9px; width:50px;"></td>
                </tr>
              <tr>
                <td height="30">&nbsp;</td>
                <td height="30" align="center">&nbsp;</td>
              </tr>
              <tr>
                <td height="30" colspan="2" align="center">Forgot Password? <a href="forgotstd.php">Student</a> | <a href="forgotstf.php">Staff</a></td>
                </tr>
            </table>            
            <p align="left">&nbsp;</p>
            </td>
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