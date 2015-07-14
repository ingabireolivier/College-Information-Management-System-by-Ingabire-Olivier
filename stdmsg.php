<?
session_start();
if (!isset($_SESSION['admin'])){
	echo "<script language=javascript>window.location='login.php?msg=expired';</script>";
}

$id = $_SESSION['id'];

include("includes/config.php");
include("includes/functions.php");

$query = mysql_query("select stdid,stdname,email from student where id=$id ");
$numRows = mysql_num_rows($query);
if ($numRows !=0){
	$res = mysql_fetch_row($query);
	$stdid = $res[0];
	$stdname = $res[1];
	$email = $res[2];
}

if ($_SESSION['utype'] == "student") {

	if (isset($_POST['Submit'])){
		$subject = $_POST['subject'];
		$content = $_POST['content'];
		
		if ($subject == "" || $content == ""){
			$err = "Subject or body is empty";
		}
		else{
			mysql_query("insert into studentmsg(stdid,stdname,email,subject,content,hit) values('$stdid','$stdname','$email','$subject','$content',0)");
			$subject = "";
			$content = "";
		}
		
	}
}

?>
<html>
<head>
<title>TCTWBIMS | MESSAGES</title>
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
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form name="feedback" method="post" action="stdmsg.php">
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
     <li><a href="admin_home.php" title="Home">Admin Home </a></li>
	  <li><a href="#">Add New</a> 
      <ul> 
        <li><a href="staff.php">Staff</a></li> 
        <li><a href="student.php">Student</a></li> 
       
      </ul> 
    </li>
<li><a href="adminall.php" title="Adminall">View All | Edit | Delete</a></li>
<li><a href="upload1.php" title="Upload">Upload Profile Pictures</a></li>
<li><a href="change_pass.php" title="Change">Change Password</a></li>
    
	 <li><a href="#">Messages</a> 
     <ul> 
        <li><a href="stfmsg.php">From Staff</a></li> 
        <li><a href="stdmsg.php">From Student</a></li> 
       
      </ul>  
    </li>
	<li><a href="#">Search</a> 
      <ul> 
        <li><a href="searchstaff.php">Staff</a></li> 
        <li><a href="searchstudent.php">Student</a></li> 
       
      </ul> 
    </li>
	
	
	
    </li> 
    <li><a href="other1.php">:: TCTWBIMS Related Links</a> 
     <ul> 
        <a href="other1.php" title="#">Online TCT Registration </a></li>
	<li><a href="other1.php" title="#">TCT Library Management System </a></li>
	<li><a href="other1.php" title="#">Online TCT Clinic </a></li>
	<li><a href="other1.php" title="#">TCT Hostels Management System</a></li>
	<li><a href="other1.php" title="#">TCT Attendance System</a></li>
	<li><a href="other1.php" title="#">TCT Leaves Management System</a></li>
	<li><a href="other1.php" title="#">TCT Online Exams System</a></li>
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
            <td height="20" bgcolor="#8C8989" style="padding-left:6px; color:#FFFFFF; font-family:Arial; font-weight:bold;">Messages</td>
          </tr>
      </table>
      
      <? if($_SESSION['utype'] == "student") {?>
      
      
        <? if ($err != ""){ ?>
        <br><div align="left" style="width:370px; padding:10px; background-color:#FFCCFF; border: outset 2px #0000FF; border-width:medium; border-color:#666666;"><? if ($err != ""){	echo $err;	}?></div><br>
        <? }
		elseif ($err == "" & isset($_POST['Submit'])) {
		?>
        <div align="center" style="padding:2px;">
          <div align="center" style=" padding:10px; color:#FFFFFF; font-weight:bold; background-color:#0099FF; border: outset 2px #0000FF; border-width:medium; border-color:#003399;">FEEDBACK SENT SUCCESSFULLY! <BR>CHECK YOUR EMAIL INBOX SOON. YOU WILL FIND OUR FEEDBACK!</div>
        </div>
        <? }?>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="28%" height="30" style="padding:4px;">Student ID</td>
            <td width="72%" height="30" style="padding:4px; font-family:Arial, Helvetica, sans-serif; font-weight:bold; color:#FF0000;"><?=$stdid?><input type="hidden" value="<?=$stdid?>" name="stdid" id="stdid"></td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">Student Name</td><td height="30" style="padding:4px; font-family:Arial, Helvetica, sans-serif; font-weight:bold; color:#FF0000;"><?=$stdname?><input type="hidden" value="<?=$stdname?>" name="stdname" id="stdname"></td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">E-Mail ID</td><td height="30" style="padding:4px; font-family:Arial, Helvetica, sans-serif; font-weight:bold; color:#FF0000;"><?=$email?><input type="hidden" value="<?=$email?>" name="email" id="email""></td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">Subject</td>
            <td height="30" style="padding:4px;"><input name="subject" type="text" id="subject" value="<?=$subject?>" size="51" ></td>
          </tr>
          <tr>
            <td height="30" valign="top" style="padding:4px;">Message </td>
            <td height="30" style="padding:4px;"><textarea name="content" id="content" cols="38" rows="10"><?=$content?></textarea></td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">&nbsp;</td>
            <td height="30" style="padding:4px;"><input type="submit" name="Submit" id="Submit" value="Send"></td>
          </tr>
        </table>
        
        <? }
		elseif ($_SESSION['utype'] == "Administrator"){
		
		$query = mysql_query("select * from studentmsg order by ID Desc");
		$numRows = mysql_num_rows($query);
		
		if ($numRows !=0){
		
		?>
        
    <table width="100%"  border="1" cellpadding="0" cellspacing="0" style=" border-collapse:collapse; border-color:#009999">
              <tr style="font-weight:bold;background-color:#9AB9DC">
                <td width="15%" height="25" align="center" valign="middle" style="padding:4px;">Student ID</td>
                <td width="30%" height="25" align="center" valign="middle">Student Name</td>
                <td width="55%" height="25" align="center" valign="middle">Subject</td>
              </tr>
              <? while($res = mysql_fetch_array($query)){ ?>
              <tr>
                <td height="20" align="left" valign="middle" style="padding:4px;"><?=$res['stdid']?></td>
                <td height="20" align="left" valign="middle" style="padding:4px;"><?=$res['stdname']?></td>
                <td height="20" align="left" valign="middle" style="padding:4px;">
				<? if ($res['hit'] == 0){ ?>
					<a href="viewstdmsg.php?id=<?=$res['ID']?>"><b><?=$res['subject']?></b></a>
				<? } else{?>
					<a href="viewstdmsg.php?id=<?=$res['ID']?>"><?=$res['subject']?></a>
                <? }?>
                </td>
              </tr>
              <? }?>
            </table>   
            
            
        <? }
		else{
			echo "<br><br><b><font color=red>There is no message</font></b>";
		}
		}
		?>     
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