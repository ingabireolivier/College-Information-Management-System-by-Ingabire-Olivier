<?
session_start();
if (!isset($_SESSION['admin'])){
	echo "<script language=javascript>window.location='login.php?msg=expired';</script>";
}

include("includes/config.php");
include("includes/functions.php");

$password = createRandomPassword();

if (isset($_POST['Submit'])){
	$err = "";

	$empid = $_POST['empid'];
	$empname = $_POST['empname'];
	$gender = $_POST['gender'];
	$status = $_POST['status'];
	$address = $_POST['address'];
	$mobile = $_POST['mobile'];
	$blood = $_POST['blood'];
	$email = $_POST['email'];
	$image = $_POST['image'];

	if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {

 $email="$email";

}

else {

  $err = "<font color=red><b>Unable to proceed next step.</b><br>------------------------------------------------</font><br>Invalid email address.";

}


if (ereg('[^+0-9]', $mobile)) {

    $err = "<font color=red><b>Unable to proceed next step.</b><br>------------------------------------------------</font><br>Invalid Mobile Number.";

}

else {

  $mobile="$mobile";    

}





	if ($_POST['dob'] != ""){
		//$dob = new datetime($_POST['dob']);
		//$dob = date_format($dob,"Y-m-d");
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

	echo $dob;
	
	if ($_POST['empid'] == "" || $_POST['empname'] == "" || $dob == "" || $_POST['gender'] == "" || $_POST['status'] == "" || $_POST['address'] == "" || $_POST['mobile'] == "" || $_POST['blood'] == "" || $_POST['email'] == "" || $_POST['image'] == ""){
	
	$err = "<font color=red><b>Unable to proceed next step.</b><br> Please Check the following field(s)<br>------------------------------------------------</font>";

	if ($_POST['empid'] == ""){
		$err = $err . "<br>Student ID is Null !";
	}
	
	if ($empname == ""){
		$err = $err . "<br>Student Name is Null";
	}
	
	if ($dob == ""){
		$err = $err . "<br> Check Date of Birth";
	}
	
	if ($_POST['gender'] == "Select"){
		$err = $err . "<br> Please select Gender";
	}
	if ($_POST['status'] == "Select"){
		$err = $err . "<br> Please select Status";
	}
	
	if ($_POST['address'] == ""){
		$err = $err . "<br> Address field is empty";
	}
	
	if ($_POST['mobile'] == ""){
		$err = $err . "<br> Mobile Number is Null";
	}
	
	if ($_POST['blood'] == ""){
		$err = $err . "<br> Blood group is Empty";
	}
	
	if ($_POST['email'] == ""){
		$err = $err . "<br> E-Mail is Null";
	}
if ($_POST['image'] == ""){
		$err = $err . "<br> Image ID field is Null";
	}
}
		
if ($err != ""){
	
}
else{
    $empid = $_POST['empid'];
    $query = mysql_query("select * from student where stdid='$empid'");
    $numRows = mysql_num_rows($query);
    
    if ($numRows == 0){

		mysql_query("insert into student(stdid,stdname,dob,gender,status,address,mobile,blood,email,password,image) values('$empid','$empname','$dob','$gender','$status','$address','$mobile','$blood','$email','$password','$image')");
		
        $lastid = mysql_insert_id();
        echo "<script language=javascript>window.location='college.php?id=$lastid';</script>";

    } else{
    	$err = "<font color=red>User ID Already Exists!!</font>";
    }
}

}	
?>


<html>
<head>
<title>TCTWBIMS | NEW STUDENT</title>
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
</style>

<SCRIPT LANGUAGE="JavaScript">

function put() 
{
var x, y, z,e,f;
x = document.personal['empid'].value;
e='.jpg';
z='Images/';
document.personal['image'].value =  z+x+e;

}

</script>


</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="javascript:document.personal.empid.focus();">
<form name="personal" method="post" action="student.php">
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
            <td height="20" bgcolor="#8C8989"><span class="style1"><strong>Student Personal Details</strong></span></td>
          </tr>
      </table>
<? if ($_SESSION['utype'] == "Administrator"){?>
        <? if ($err != ""){ ?>
        <br><div align="left" style="width:300px; padding:10px; background-color:#FFCCFF; border: outset 2px #0000FF; border-width:medium; border-color:#666666;"><? if ($err != ""){	echo $err;	}?></div><br>
        <? }?>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="28%" height="30" style="padding:4px;">Student ID | Username</td>
            <td width="72%" height="30" style="padding:4px;">
            <input type="text" name="empid" onchange = "put();" value="<?=$_POST['empid']?>" id="empid"  >            </td>
          </tr>
		
          <tr>
            <td height="30" style="padding:4px;">Student Name</td>
            <td height="30" style="padding:4px;">
              <input type="text" name="empname" value="<?=$_POST['empname']?>" id="empname">            </td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">Date of Birth</td>
            <td height="30" style="padding:4px;"><input type="text" name="dob" id="dob" value="<?=$_POST['dob']?>">            <a href="javascript:NewCal('dob','ddmmyyyy')">
            <img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>&nbsp;&nbsp;<strong>(DD-MM-YYYY)</strong>
            </td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">Gender</td>
            <td height="30" style="padding:4px;"><select name="gender" id="gender">
              <? if ($_POST['gender'] == "Select" || $_POST['gender'] == ""){?>
              <option selected>Select</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <? }
			  elseif($_POST['gender'] == "Male"){
			  ?>
              <option value="Male" selected>Male</option>
              <option value="Female">Female</option>
              <? }
			  elseif($_POST['gender'] == "Female"){
			  ?>
              <option value="Male">Male</option>
              <option value="Female" selected>Female</option>
              <? }?>
              
            </select>            </td>
          </tr>
		  
		  <tr>
            <td height="30" style="padding:4px;">Martial Status</td>
            <td height="30" style="padding:4px;"><select name="status" id="status">
              <? if ($_POST['status'] == "Select" || $_POST['status'] == ""){?>
              <option selected>Select</option>
              <option value="single">Single</option>
              <option value="maried">Maried</option>
			  <option value="widowed">Widowed</option>
              <? }
			  elseif($_POST['status'] == "single"){
			  ?>
              <option value="single" selected>Single</option>
              <option value="maried">Maried</option>
			  <option value="widowed">Widowed</option>
              <? }
			  elseif($_POST['status'] == "maried"){
			  ?>
              <option value="single" selected>Single</option>
              <option value="maried">Maried</option>
			  <option value="widowed">Widowed</option>
              <? }
			  elseif($_POST['status'] == "widowed"){
			  ?>
              <option value="single">Single</option>
              <option value="maried" selected>Maried</option>
			  <option value="widowed">Widowed</option>
              <? }?>
              
			  
			  
            </select>            </td>
          </tr>
		  
          <tr>
            <td height="30" align="left" valign="top" style="padding:4px;">Address</td>
            <td height="30" style="padding:4px;"><textarea name="address" id="address" cols="30" rows="3"><?=$_POST['address']?></textarea></td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">Mobile No</td>
            <td height="30" style="padding:4px;"><input type="text" name="mobile" value="<?=$_POST['mobile']?>" id="mobile"></td>
          </tr>
		     
         <tr>
            <td height="30" style="padding:4px;">Blood Group</td>
            <td height="30" style="padding:4px;"><select name="blood" id="blood">
              <? if ($_POST['blood'] == "Select" || $_POST['blood'] == ""){?>
              <option selected>Select</option>
              <option value="A">A</option>
              <option value="B">B</option>
			  <option value="AB">AB</option>
			  <option value="O">O</option>
			  <option value="O">Don't Know</option>
              <? }
			  elseif($_POST['blood'] == "A"){
			  ?>
              <option value="single" selected>A</option>
              <option value="maried">B</option>
			  <option value="widowed">AB</option>
			   <option value="widowed">O</option>
              <? }
			  elseif($_POST['blood'] == "B"){
			  ?>
              <option value="A" selected>A</option>
              <option value="B">B</option>
			  <option value="AB">AB</option>
			   <option value="O">O</option>
              <? }
			  elseif($_POST['blood'] == "AB"){
			  ?>
              <option value="A" >A</option>
              <option value="B" selected>B</option>
			  <option value="AB">AB</option>
			   <option value="O">O</option>
              <? }
			  elseif($_POST['blood'] == "O"){
			  ?>
              <option value="A" >A</option>
              <option value="B" >B</option>
			  <option value="AB" selected>AB</option>
			   <option value="O">O</option>
              <? }
			  
			  ?>
              
			  
			  
            </select>            </td>
          </tr>
		  
		  
          <tr>
            <td height="30" style="padding:4px;">E-Mail</td>
            <td height="30" style="padding:4px;"><input type="text" size="20" name="email" value="<?=$_POST['email']?>" id="email"></td>
          </tr>
		  <tr>
            <td height="30" style="padding:4px;">Image</td>
            <td height="30" style="padding:4px;"><input type="text" size="20" name="image" readonly="true"  value="<?php echo $image; ?>" id="image"></td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">&nbsp;</td>
            <td height="30" style="padding:4px;"><input type="submit" name="Submit" id="Submit" value="Next Step"></td>
          </tr>
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