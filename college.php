<?
session_start();
if (!isset($_SESSION['admin'])){
	echo "<script language=javascript>window.location='login.php?msg=expired';</script>";
}

include("includes/config.php");
include("includes/functions.php");

//$password = createRandomPassword();

	$id = $_GET['id'];
	if ($id != ""){
		$query = mysql_query("select id,stdid,stdname from student where id=$id");
		
		$numRows = mysql_num_rows($query);
		if ($numRows != 0){
			$res = mysql_fetch_array($query);
			$id=$res['id'];
			$empid = $res['stdid'];
			$empname = $res['stdname'];
		}
	}
	

if (isset($_POST['Submit'])){
	$err = "";
	
	$empid = $_POST['empid'];
	$empname = $_POST['empname'];
	$dept = $_POST['dept'];
	$designation = $_POST['designation'];
	$RegNO = $_POST['RegNO'];
	$role = $_POST['role'];
	$semt = $_POST['semt'];
	$acom = $_POST['acom'];
	
	if (ereg('[^0-9-]', $role)) {

    $err = "<font color=red><b>Unable to proceed next step.</b><br>------------------------------------------------</font><br>Invalid Academic Year.";

}

else {

  $role="$role";    

}

if (ereg('[^0-9]', $semt)) {

    $err = "<font color=red><b>Unable to proceed next step.</b><br>------------------------------------------------</font><br>Invalid Semester. Write in Number only";

}

else {

  $semt="$semt";    

}
		
	
	if ($_POST['empid'] == "" || $_POST['empname'] == "" || $_POST['dept'] == "" || $_POST['designation'] == "" || $_POST['RegNO'] == "" || $_POST['role'] == "" || $_POST['semt'] == "" || $_POST['acom']== ""){
	
	$err = "<font color=red><b>Unable to proceed next step.</b><br> Please Check the following field(s)<br>------------------------------------------------</font>";

	if ($_POST['empid'] == ""){
		$err = $err . "<br>Student ID is empty !";
	}
	
	if ($_POST['empname'] == ""){
		$err = $err . "<br>Student Name is empty";
	}
	
	if ($_POST['dept'] == ""){
		$err = $err . "<br> Department field is empty";
	}
	
	if ($_POST['designation'] == ""){
		$err = $err . "<br> Faculity field is empty";
	}
	
	if ($_POST['RegNO'] == ""){
		$err = $err . "<br> Registration number field is empty";
	}
	
	if ($_POST['role'] == ""){
		$err = $err . "<br> Academic year field is empty";
	}
	
	if ($_POST['semt'] == ""){
		$err = $err . "<br> Semester field is empty";
	}
	if ($_POST['acom'] == ""){
		$err = $err . "<br> Accomodation field is empty";
	}
	
}
		
if ($err != ""){
	
}
else{
    $query = mysql_query("select * from college where id=$id");
    $numRows = mysql_num_rows($query);
    
    if ($numRows == 0){

		mysql_query("insert into college(id,stdid,stdname,dept,fac,RegNO,acd,semt,acom) values($id,'$empid','$empname','$dept','$designation','$RegNO','$role','$semt','$acom')");
		
       // $lastid = mysql_insert_id();
        echo "<script language=javascript>window.location='lesson.php?id=$id';</script>";

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
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="javascript:document.personal.empname.focus();">
<form name="personal" method="post" action="college.php?id=<?=$_GET['id']?>">
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
            <td height="20" bgcolor="#8C8989"><span class="style1"><strong>Student College Details</strong></span></td>
          </tr>
      </table>
        <? if ($err != ""){ ?>
        <br><div align="left" style="width:300px; padding:10px; background-color:#FFCCFF; border: outset 2px #0000FF; border-width:medium; border-color:#666666;">
		<? if ($err != ""){	echo $err;	}?></div><br>
        <? }?>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="28%" height="30" style="padding:4px;">Student ID</td>
            <td width="72%" height="30" style="padding:4px;">
            <input type="text" name="empid" value="<?=$empid?>" id="empid">            </td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">Student Name</td>
            <td height="30" style="padding:4px;">
              <input type="text" name="empname" value="<?=$empname?>" id="empname">            </td>
          </tr>
             <tr>
            <td height="30" style="padding:4px;">Departement</td>
            <td height="30" style="padding:4px;"><select name="dept" id="dept">
              <? if ($_POST['dept'] == "Select" || $_POST['dept'] == ""){?>
              <option selected>Select</option>
              <option value="Alternative  Energy">Alternative  Energy</option>
              <option value="Electronic and Telecomunication">Electronic and Telecomunication</option>
			  <option value="Information and Technology">Information and Technology</option>
              <? }
			  elseif($_POST['dept'] == "Alternative  Energy"){
			  ?>
              <option value="Alternative  Energy" selected>Alternative  Energy</option>
              <option value="Electronic and Telecomunication">Electronic and Telecomunication</option>
			  <option value="Information and Technology">Information and Technology</option>
              <? }
			  elseif($_POST['dept'] == "Electronic and Telecomunication"){
			  ?>
              <option value="Alternative  Energy">Alternative  Energy</option>
              <option value="Electronic and Telecomunication" selected>Electronic and Telecomunication</option>
			  <option value="Information and Technology">Information and Technology</option>
              <? }
			  elseif($_POST['dept'] == "Information and Technology"){
			  ?>
              <option value="Alternative  Energy">Alternative  Energy</option>
              <option value="Electronic and Telecomunication">Electronic and Telecomunication</option>
			  <option value="Information and Technology" selected>Information and Technology</option>
              <? }?>
              
			  
			  
            </select>            </td>
          </tr>
		 
          <tr>
            <td height="30" style="padding:4px;">Faculty</td>
            <td height="30" style="padding:4px;"><input type="text" name="designation" value="Technology" id="designation"></td>
          </tr>
		  
		  <tr>
            <td height="30" style="padding:4px;">Registration Number</td>
            <td height="30" style="padding:4px;"><input type="text" name="RegNO" value="<?=$RegNO?>" id="$RegNO"></td>
          </tr>
		  
          <tr>
            <td height="30" align="left" valign="top" style="padding:4px;">Academic Year</td>
            <td height="30" style="padding:4px;"><input type="text" name="role" value="<?=$role?>" id="role"></td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">Semester</td>
            <td height="30" style="padding:4px;"><input type="text" name="semt" value="<?=$semt?>" id="semt"></td>
          </tr>
		  <tr>
            <td height="30" style="padding:4px;">Accomodation</td>
            <td height="30" style="padding:4px;"><select name="acom" id="acom">
              <? if ($_POST['acom'] == "Select" || $_POST['acom'] == ""){?>
              <option selected>Select</option>
              <option value="External">External</option>
              <option value="Internal">Internal</option>
              <? }
			  elseif($_POST['acom'] == "acom"){
			  ?>
             <option value="External" selected>External</option>
              <option value="Internal">Internal</option>
              <? }
			  elseif($_POST['acom'] == "acom"){
			  ?>
             <option value="External">External</option>
              <option value="Internal" selected>Internal</option>
              <? }?>
              
            </select>            </td>
          </tr>
		  
		  
          <tr>
            <td height="30" style="padding:4px;">&nbsp;</td>
            <td height="30" style="padding:4px;"><input type="submit" name="Submit" onClick="javascript:document.personal.empid.disabled=false;" id="Submit" value="Next Step"></td>
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
<script language="javascript">
document.personal.empid.disabled=true;
</script>

</body>
</html>