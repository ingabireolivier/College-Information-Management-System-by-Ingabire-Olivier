<?
session_start();

if (!isset($_SESSION['admin'])){
	echo "<script language=javascript>window.location='login.php?msg=expired';</script>";
}
include("includes/config.php");
include("includes/functions.php");

$id = $_GET['id'];

$empid = $_POST['empid'];
$empname = $_POST['empname'];


//$dob = new datetime($_POST['dob']);
//$dob = date_format($dob,"Y-m-d");

	if ($_POST['dob'] != ""){
		$dt=$_POST['dob'];
		$arr=split("-",$dt);
		$mm=$arr[1];
		$dd=$arr[0];
		$yy=$arr[2];
		
		If(!checkdate($mm,$dd,$yy)){
			$dob = "";
		}else {
			$dob = "$yy-$mm-$dd";
		}	
	}

	

$gender = $_POST['gender'];
$status = $_POST['status'];
$address = $_POST['address'];
$mobile = $_POST['mobile'];
$blood = $_POST['blood'];
$email = $_POST['email'];


$field = $_POST['field'];
$qualif = $_POST['qualif'];
$recog= $_POST['recog'];
$acad = $_POST['acad'];
$days = $_POST['days'];
$hr = $_POST['hr'];
$other = $_POST['other'];

	


if (isset($_POST['Submit'])){
	$errmsg = "";
	$err = "";
	
if ($empname == "" || $dob == "" || $gender == "" || $status == "" || $address == "" || $mobile == "" || $blood == "" || $email == ""){
		$errmsg = "<font color=red><b><u>Sorry! Unable to edit this Student details. Please check the following fields</u></b></font>";
		$err = $errmsg . "<br>";
		
		if ($empname == ""){
			$err = $err . "Staff name is empty<br>";
		}
		if ($dob == ""){
			$err = $err . "Date of Birth field is empty<br>";
		}
		if ($gender == ""){
			$err = $err . "Gender field is empty<br>";
		}
		if ($status == ""){
			$err = $err . "Status field is empty<br>";
		}
		if ($address == ""){
			$err = $err . "Address field is empty<br>";
		}
		if ($mobile == ""){
			$err = $err . "Mobile field is empty<br>";
		}
		if ($blood == ""){
			$err = $err . "Blood Group field is empty<br>";
		}
		if ($email == ""){
			$err = $err . "Staff E-Mail field is empty<br>";
		}
	}
	
	if ($field == "" || $qualif == "" || $recog == "" || $acad == "" || $days == "" || $hr == "" || $other== ""){
		if ($errmsg == ""){
			$err = $err . "<font color=red><b><u>Sorry! Unable to edit this Staff details. Please check the following fields</u></b></font>";
		}
		
		if ($err != "") {
			$err = $err . "<br>";
		}
		
		if ($field == ""){
			$err = $err . "Field is empty<br>";
		}
		if ($qualif == ""){
			$err = $err . "Qualification field is empty<br>";
		}
		if ($recog == ""){
			$err = $err . "Recognation field is empty<br>";
		}
		if ($acad == ""){
			$err = $err . "Academic year Number field is empty<br>";
		}
		if ($days == ""){
			$err = $err . "Working Days Per Week field is empty<br>";
		}
		if ($hr == ""){
			$err = $err . "Working Hours Per week field is empty<br>";
		}
		if ($other == ""){
			$err = $err . "Other infos field is empty<br>";
		}
	}

	
if ($err == ""){
	mysql_query("update staff set stfname='$empname',dob='$dob',gender='$gender',status='$status',address='$address',mobile='$mobile',blood='$blood',email='$email' where ID=$id");
	$query = mysql_query("select ID from staffing where ID=$id");
	$numRows = mysql_num_rows($query);
	if ($numRows == 0){
		mysql_query("insert into staffing values($id,'$sempid','$empname','$field','$qualif','$recog','$acad','$days','$hr','$other')");
	}	else{
		mysql_query("update staffing set stfname='$empname',field='$field',qualif='$qualif', recog='$recog', acad='$acad',days='$days', hr='$hr',other='$other' where ID=$id");
	}
	
	
	
	echo "<script language=javascript>window.location='editstaff.php?id=$id&sucmsg=ok';</script>";
}
	
	
}
else{
	$query = mysql_query("select * from staff where id=$id");
	$numRows = mysql_num_rows($query);
	$res = mysql_fetch_array($query);
	
	if ($numRows !=0){
	     $image= $res['image'];
		$empid = $res['stfid'];
		$empname = $res['stfname'];
		//$dob = $res['dob'];
		$dob = new datetime($res['dob']);
		$dob = date_format($dob,"d-m-Y");
		$gender = $res['gender'];
		$status = $res['status'];
		$address = $res['address'];
		$mobile = $res['mobile'];
		$blood = $res['blood'];
		$email = $res['email'];
	}
	
	$query = mysql_query("select * from staffing where id=$id");
	$numRows = mysql_num_rows($query);
	$res = mysql_fetch_array($query);
	
	if ($numRows != 0){
		$field = $res['field'];
		$qualif = $res['qualif'];
		$recog = $res['recog'];
		$acad = $res['acad'];
		$days = $res['days'];
		$hr = $res['hr'];
		$other = $res['other'];
	}
	
	
}

?>
<html>
<head>
<title>TCTWBIMS | EDIT STAFF</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

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
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="javascript:document.personal.empname.focus();document.personal.empid.disabled=true;document.personal.image.disabled=true;">
<form name="personal" method="post" action="editstaff.php?id=<?=$id?>">
<table width="760" height="761" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
<tr>
		<td height="207" colspan="8" align="left" valign="top" background="images/index_01.gif">

		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="40%" height="30">&nbsp;</td>
              <td width="48%" height="30" align="right">Welcome <font color="#993366"><b><?=$_SESSION['utype']?></b></font></td>
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
            <td height="20" bgcolor="#8C8989" class="style1" style="padding-left:4px;"><b>Edit Staff Details</b></td>
          </tr>
      </table>
<? if ($_SESSION['utype'] == "Administrator"){?>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="1">
          <tr>
            <td>


        <? if ($err != ""){ ?>
        <div align="center" style="padding:2px;"><div align="left" style=" padding:10px; background-color:#FFCCFF; border: outset 2px #0000FF; border-width:medium; border-color:#666666;"<? if ($err != ""){	echo $err;	}?>></div></div>
        <? }
		elseif($_GET['sucmsg'] != ""){
		?>
        <div align="center" style="padding:2px;"><div align="center" style=" padding:10px; color:#FFFFFF; font-weight:bold; background-color:#0099FF; border: outset 2px #0000FF; border-width:medium; border-color:#003399;">UPDATED SUCCESSFULLY!</div></div>
        <? }?>
        <table width="100%" border="1" cellpadding="0" cellspacing="0" style=" border-collapse:collapse; border-color:#009999">
          <tr style="background-color:#9AB9DC">
            <td height="30" colspan="2" style="padding:4px;"><strong>Staff Details</strong></td>
          </tr>
		  <tr>
            <td width="28%" height="30" style="padding:4px;">Profile Picture</td>
            <td width="72%" height="30" style="padding:4px;">
            <input type="text" name="image" value="<?=image?>" id="image">            </td>
          </tr>
          <tr>
            <td width="28%" height="30" style="padding:4px;">Staff ID</td>
            <td width="72%" height="30" style="padding:4px;">
            <input type="text" name="empid" value="<?=stfid?>" id="empid">            </td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">Student Name</td>
            <td height="30" style="padding:4px;">
              <input type="text" name="empname" value="<?=$empname?>" id="empname">            </td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">Date of Birth</td>
            <td height="30" style="padding:4px;">
            <?
			$dob = new datetime($dob);
            $dob = date_format($dob,"d-m-Y");
			
			?>
            <input type="text" name="dob" id="dob" value="<?=$dob?>">
            <a href="javascript:NewCal('dob','ddmmyyyy')">
            <img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>&nbsp;&nbsp;<strong>(DD-MM-YYYY)</strong>            </td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">Gender</td>
            <td height="30" style="padding:4px;"><select name="gender" id="gender">
              <? if ($gender == "Select" || $gender == ""){?>
              <option selected>Select</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <? }
			  elseif($gender == "Male"){
			  ?>
              <option value="Male" selected>Male</option>
              <option value="Female">Female</option>
              <? }
			  elseif($gender == "Female"){
			  ?>
              <option value="Male">Male</option>
              <option value="Female" selected>Female</option>
              <? }?>
              
            </select>            </td>
          </tr>
		   <tr>
            <td height="30" style="padding:4px;">Martial Status</td>
            <td height="30" style="padding:4px;"><select name="status" id="status">
              <? if ($status == "Select" || $status == ""){?>
              <option selected>Select</option>
              <option value="single">Single</option>
              <option value="maried">Maried</option>
			  <option value="widowed">Widowed</option>
              <? }
			  elseif($status == "single"){
			  ?>
              <option value="single" selected>Single</option>
              <option value="maried">Maried</option>
			  <option value="widowed">Widowed</option>
              <? }
			  elseif($status == "maried"){
			  ?>
              <option value="single" selected>Single</option>
              <option value="maried">Maried</option>
			  <option value="widowed">Widowed</option>
              <? }
			  elseif($status == "widowed"){
			  ?>
              <option value="single">Single</option>
              <option value="maried" selected>Maried</option>
			  <option value="widowed">Widowed</option>
              <? }?>
              
			  
			  
            </select>            </td>
          </tr>
          <tr>
            <td height="30" align="left" valign="top" style="padding:4px;">Address</td>
            <td height="30" style="padding:4px;"><textarea name="address" id="address" cols="30" rows="3"><?=$address?></textarea></td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">Mobile No</td>
            <td height="30" style="padding:4px;"><input type="text" name="mobile" value="<?=$mobile?>" id="mobile"></td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">Blood Group</td>
            <td height="30" style="padding:4px;"><input type="text" size="10" value="<?=$blood?>" name="blood" id="blood"></td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">E-Mail</td>
            <td height="30" style="padding:4px;"><input type="text" size="20" name="email" value="<?=$email?>" id="email"></td>
          </tr>
        </table>
    </td>
    </tr>
    
    <tr><td>
        <table width="100%" border="1" cellpadding="0" cellspacing="0" style=" border-collapse:collapse; border-color:#009999">
          
          <tr  style="background-color:#9AB9DC">
            <td height="30" colspan="2" style="padding:4px;"><strong>Staff college Details</strong></td>
            </tr>
         <tr>
            <td height="30" style="padding:4px;">Field</td>
            <td height="30" style="padding:4px;"><input type="text" name="field" value="<?=$field?>" id="field"></td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">Qualification Level</td>
            <td height="30" style="padding:4px;"><input type="text" name="qualif" value="<?=$qualif?>" id="qualif"></td>
          </tr

		  
		  <tr>
            <td height="30" style="padding:4px;">Recognation</td>
            <td height="30" style="padding:4px;"><input type="text" name="recog" value="<?=$recog?>" id="$recog"></td>
          </tr>
		  
          <tr>
            <td height="30" align="left" valign="top" style="padding:4px;">Academic Year</td>
            <td height="30" style="padding:4px;"><input type="text" name="acad" value="<?=$acad?>" id="acad"></td>
          </tr>
           <tr>
            <td height="30" style="padding:4px;">Working Days Per Week</td>
            <td height="30" style="padding:4px;"><input type="text" name="days" value="<?=$days?>" id="days"></td> 
          </tr>
		  <tr>
            <td height="30" style="padding:4px;">Working Hours Per week</td>
            <td height="30" style="padding:4px;"><input type="text" name="hr" value="<?=$hr?>" id="hr"></td> 
          </tr>
		  <tr>
            <td height="30" align="left" valign="top" style="padding:4px;">Other infos</td>
            <td height="30" style="padding:4px;"><textarea name="other" id="other" cols="30" rows="5"><?=$other?></textarea></td>
          </tr>
	
          <tr>
            <td height="30" style="padding:4px;">&nbsp;</td>
            <td height="30" style="padding:4px;"><input type="submit" name="Submit" onClick="javascript:document.personal.empid.disabled=false;" id="Submit" value="SAVE">&nbsp;|&nbsp;<a href="viewstaff.php?id=<?=$id?>" onClick="return confirm('Sure?! You are about to leave this page!');"><strong>VIEW THIS PROFILE</strong></a></td>
          </tr>
        </table>
        

	</td></tr> 
    
    </table>



<? }	else{	echo "<br><br><b><font color=red> Sorry! Only Administrator can create</font></b>";	}?>

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