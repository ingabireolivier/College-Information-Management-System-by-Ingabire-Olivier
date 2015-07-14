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
<title>TCTWBIMS | VIEW STUDENT</title>
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
<form name="personal" method="post" action="lesson.php?id=<?=$_GET['id']?>">
<table width="760" height="761" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
<tr>
		<td height="207" colspan="8" align="left" valign="top" background="images/index_01.gif">

		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="40%" height="30">&nbsp;</td>
              <td width="48%" height="30" align="right">&nbsp;Welcome <font color="#993366"><b><?=$_SESSION['admin']?></b></font></td>
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
            <td height="20" bgcolor="#8C8989"><span class="style1"><strong>Student DETAILS</strong></span></td>
          </tr>
      </table>
		
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="1">
          <tr>
            <td>

				<? 
                $query = mysql_query("select * from student where id=$id");
                $numRows = mysql_num_rows($query);
                if ($numRows !=0){
                $res = mysql_fetch_array($query);
                
                ?>
                    <table width="100%" border="1" cellpadding="0" cellspacing="0" align="left" style="border-collapse:collapse; width:99.95%; border-color:#009999;">
                      <tr>
                        <td height="30" colspan="2" style="padding-left:10px; font-weight:bold; background-color:#9AB9DC;">Student Details</td>
                      </tr>
					  <tr>
                        <td width="28%" height="30" style="padding-left:10px;">Profile Picture</td>
                        <td width="72%" height="30" style="padding:4px; font-weight:bold; color:#CC0033;"><? $val6=$res['image'];
						echo  "<img src = '$val6' height = 100 width = 100>    "; ?></td>
                      <tr>
                        <td width="28%" height="30" style="padding-left:10px;">Student ID</td>
                        <td width="72%" height="30" style="padding:4px; font-weight:bold; color:#CC0033;"><?=$res['stdid']?></td>
                      </tr>
                      <? if ($_SESSION['utype']=="Administrator"){?>
                      <tr>
                        <td width="28%" height="30" style="padding-left:10px;">Password</td>
                        <td width="72%" height="30" style="padding:4px; font-weight:bold; color:#CC0033;"><?=$res['password']?></td>
                      </tr>
                      <? }?>
                      <tr>
                        <td width="28%" height="30" style="padding-left:10px;">Student Name</td>
                        <td width="72%" height="30" style="padding:4px;"><?=$res['stdname']?></td>
                      </tr>
                      <tr>
                        <td width="28%" height="30" style="padding-left:10px;">Date of Birth</td>
                        <td width="72%" height="30" style="padding:4px;"><?=$res['dob']?></td>
                      </tr>
                      <tr>
                        <td width="28%" height="30" style="padding-left:10px;">Gender</td>
                        <td width="72%" height="30" style="padding:4px;"><?=$res['gender']?></td>
                      </tr>
		      
		       <tr>
                        <td width="28%" height="30" style="padding-left:10px;">Martial Status</td>
                        <td width="72%" height="30" style="padding:4px;"><?=$res['status']?></td>
                      </tr>
		      
                      <tr>
                        <td width="28%" height="30" valign="top" style="padding-left:10px; padding-top:13px;">Address</td>
                        <td width="72%" height="30" style="padding:1px;"><pre style="width:320px; font-family:Arial, Helvetica, sans-serif;"><?=$res['address']?></pre></td>
                      </tr>
                      <tr>
                        <td width="28%" height="30" style="padding-left:10px;">Mobile</td>
                        <td width="72%" height="30" style="padding:4px;"><?=$res['mobile']?> | Click to this number and start calling |</td>
                      </tr>  
                      <tr>
                        <td width="28%" height="30" style="padding-left:10px;">Blood</td>
                        <td width="72%" height="30" style="padding:4px;"><?=$res['blood']?></td>
                      </tr>
                      <tr>
                        <td width="28%" height="30" style="padding-left:10px;">E-Mail</td>
                        <td width="72%" height="30" style="padding:4px;"><a style="Text-Decoration:none" href="mailto: <? echo $res["email"] ?> "><? echo $res["email"] ?> </a>| Click to this email and contact <? echo $res["stdname"] ?> |</td>
                      </tr>
                    </table>
                 <? }?>
         
            </td>
          </tr>
          
          <tr>
            <td>

				<? 
                $query = mysql_query("select * from college where id=$id");
                $numRows = mysql_num_rows($query);
                if ($numRows !=0){
                $res = mysql_fetch_array($query);
                
                ?>
                    <table width="100%" border="1" cellpadding="0" cellspacing="0" align="left" style="border-collapse:collapse; width:99.95%; border-color:#009999;">
                      <tr>
                        <td height="30" colspan="2" style="padding-left:10px; font-weight:bold; background-color:#9AB9DC;">College Student Details</td>
                      </tr>
                      <tr>
                        <td width="28%" height="30" style="padding-left:10px;">Department</td>
                        <td width="72%" height="30" style="padding:4px;"><?=$res['dept']?></td>
                      </tr>
                      <tr>
                        <td width="28%" height="30" style="padding-left:10px;">Faculity</td>
                        <td width="72%" height="30" style="padding:4px;"><?=$res['fac']?></td>
                      </tr>
					  <tr>
                        <td width="28%" height="30" style="padding-left:10px;">Registration Number</td>
                        <td width="72%" height="30" style="padding:4px;"><?=$res['RegNO']?></td>
                      </tr>
                      <tr>
                        <td width="28%" height="30" valign="top" style="padding-left:10px; padding-top:13px;">Academic Year</td>
                        <td width="72%" height="30" style="padding:2px;"><?=$res['acd']?></td>
                      </tr>
                      <tr>
                        <td width="28%" height="30" style="padding-left:10px;">Semester</td>
                        <td width="72%" height="30" style="padding:4px;"><?=$res['semt']?></td>
                      </tr>
		       <tr>
                        <td width="28%" height="30" style="padding-left:10px;">Accomodation</td>
                        <td width="72%" height="30" style="padding:4px;"><?=$res['acom']?></td>
                      </tr>
		      
                    </table>
                 <? }?>
         
            </td>
          </tr>
          
          <tr>
            <td>

				<? 
                $query = mysql_query("select * from lesson where id=$id");
                $numRows = mysql_num_rows($query);
                if ($numRows !=0){
                $res = mysql_fetch_array($query);
                
                ?>
                    <table width="100%" border="1" cellpadding="0" cellspacing="0" align="left" style="border-collapse:collapse; width:99.95%; border-color:#009999;">
                      <tr>
                        <td height="30" colspan="2" style="padding-left:10px; font-weight:bold; background-color:#9AB9DC;">Student Lessons Details</td>
                      </tr>
                      <tr>
                        <td width="28%" height="30" style="padding-left:10px;">Studying Days Per Week</td>
                        <td width="72%" height="30" style="padding:4px;"><?=$res['workdays']?></td>
                      </tr>
                      <tr>
                        <td width="28%" height="30" style="padding-left:10px;">Studying Hours Per week</td>
                        <td width="72%" height="30" style="padding:4px;"><?=$res['numb']?></td>
                      </tr>
                      <tr>
                        <td width="28%" height="30" style="padding-left:10px;">Student Sponsorship</td>
                        <td width="72%" height="30" style="padding:4px;"><?=$res['basicpay']?></td>
                      </tr>
                      <tr>
                        <td width="28%" height="30" style="padding-left:10px;">Other Infos</td>
                        <td width="72%" height="30" style="padding:4px;"><?=$res['other']?></td>
                      </tr>
                    </table>
                 <? }?>
         
            </td>
          </tr>
          <tr><td align="center" height="40">
			<? if ($_SESSION['utype'] == "Administrator"){?>
          <a href="student.php"><strong>Create New</strong></a>&nbsp;|&nbsp;<a href="editstudent.php?id=<?=$id?>"><strong>Edit</strong></a>&nbsp;|&nbsp;<a href="deletestudent.php?id=<?=$id?>" onClick="return confirm('Sure! You want to delete?');"><strong>Delete</strong></a>&nbsp;|&nbsp;<? }?><a href="viewallstudent1.php"><strong>View All Registered Students</strong></a></td>
          </tr>
      </table>
<A HREF="javascript:window.print()">
<IMG SRC="images/print_image.png" Width="100px" Height="74px" BORDER="0"</A>
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
</body>
</html>