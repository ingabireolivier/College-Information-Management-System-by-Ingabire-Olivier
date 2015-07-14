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
		$query = mysql_query("select id,stfid,stfname from staff where id=$id");
		
		$numRows = mysql_num_rows($query);
		if ($numRows != 0){
			$res = mysql_fetch_array($query);
			$id=$res['id'];
			$empid = $res['stfid'];
			$empname = $res['stfname'];
		}
	}
	

if (isset($_POST['Submit'])){
	$err = "";
	
	$empid = $_POST['empid'];
	$empname = $_POST['empname'];
	$field = $_POST['field'];
	$qualif = $_POST['qualif'];
	$recog = $_POST['recog'];
	$acad = $_POST['acad'];
	$days = $_POST['days'];
	$hr = $_POST['hr'];
	$other = $_POST['other'];
	
	
	if (ereg('[^0-9-]', $acad)) {

    $err = "<font color=red><b>Unable to proceed next step.</b><br>------------------------------------------------</font><br>Invalid Academic Year.";

}

else {

  $acad="$acad";    

}
		
	
	if ($_POST['empid'] == "" || $_POST['empname'] == "" || $_POST['field'] == "" || $_POST['qualif'] == "" || $_POST['recog'] == "" || $_POST['acad'] == "" || $_POST['days'] == "" || $_POST['hr'] == ""|| $_POST['other'] == ""){
	
	$err = "<font color=red><b>Unable to proceed next step.</b><br> Please Check the following field(s)<br>------------------------------------------------</font>";

	if ($_POST['empid'] == ""){
		$err = $err . "<br>Staff ID is empty !";
	}
	
	if ($_POST['empname'] == ""){
		$err = $err . "<br>Staff Name is empty";
	}
	
	if ($_POST['field'] == ""){
		$err = $err . "<br> Field is empty";
	}
	
	if ($_POST['qualif'] == ""){
		$err = $err . "<br> Qualification field is empty";
	}
	
	if ($_POST['recog'] == ""){
		$err = $err . "<br> Recognation field is empty";
	}
	if ($_POST['acad'] == ""){
		$err = $err . "<br> Academic Year field is empty";
	}
	
	if ($_POST['days'] == ""){
		$err = $err . "<br> Working days per weeek field is empty";
	}
	
	if ($_POST['hr'] == ""){
		$err = $err . "<br> Working Hours per day field is empty";
	}
	if ($_POST['other'] == ""){
		$err = $err . "<br> Other infos field is empty";
	}
}
		
if ($err != ""){
	
}
else{
    $query = mysql_query("select * from staffing where id=$id");
    $numRows = mysql_num_rows($query);
    
    if ($numRows == 0){

		mysql_query("insert into staffing(id,stfid,stfname,field,qualif,recog,acad,days,hr,other) values($id,'$empid','$empname','$field','$qualif','$recog','$acad','$days','$hr','$other')");
		
       // $lastid = mysql_insert_id();
        echo "<script language=javascript>window.location='upload1.php';</script>";

    } else{
    	$err = "<font color=red>User ID Already Exists!!</font>";
    }
}

}	
?>
<html>
<head>
<title>TCTWBIMS | NEW STAFF</title>
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
<form name="personal" method="post" action="staffing.php?id=<?=$_GET['id']?>">
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
            <td height="20" bgcolor="#8C8989"><span class="style1"><strong>Staff College Details</strong></span></td>
          </tr>
      </table>
        <? if ($err != ""){ ?>
        <br><div align="left" style="width:300px; padding:10px; background-color:#FFCCFF; border: outset 2px #0000FF; border-width:medium; border-color:#666666;">
		<? if ($err != ""){	echo $err;	}?></div><br>
        <? }?>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="28%" height="30" style="padding:4px;">Staff ID</td>
            <td width="72%" height="30" style="padding:4px;">
            <input type="text" name="empid" value="<?=$empid?>" id="empid">            </td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">Staff Name</td>
            <td height="30" style="padding:4px;">
              <input type="text" name="empname" value="<?=$empname?>" id="empname">            </td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">Field</td>
            <td height="30" style="padding:4px;"><input type="text" name="field" value="<?=$field?>" id="field"><b><i>  (eg : Software,Networking,Mathematic...)</i></b></td>
          </tr>
          <tr>
            <td height="30" style="padding:4px;">Qualification Level</td>
            <td height="30" style="padding:4px;"><input type="text" name="qualif" value="<?=$qualif?>" id="qualif"><b><i> (eg : A1,Master in Law,CCNP Certified...)</i></b></td>
          </tr>
		  
		  <tr>
            <td height="30" style="padding:4px;">Recognation</td>
            <td height="30" style="padding:4px;"><input type="text" name="recog" value="<?=$recog?>" id="$recog"><b><i> (eg : CCNA Teacher,HOD,Dean,...)</i></b></td>
          </tr>
		  
          <tr>
            <td height="30" align="left" valign="top" style="padding:4px;">Academic Year</td>
            <td height="30" style="padding:4px;"><input type="text" name="acad" value="<?=$acad?>" id="acad"></td>
          </tr>
		  
		  
		   <tr>
            <td height="30" style="padding:4px;">Working Days Per Week</td>
            <td height="30" style="padding:4px;"><select name="days" id="days">
              <? if ($_POST['days'] == "Select" || $_POST['days'] == ""){?>
              <option selected>Select</option>
              <option value="1 to 3 days">1 to 3 days</option>
              <option value="3 to 5 days">3 to 5 days</option>
			  <option value="5 to 7 days">5 to 7 days</option>
			  
              <? }
			  elseif($_POST['days'] == "1 to 3 days"){
			  ?>
              
             <option value="1 to 3 days" selected>1 to 3 days</option>
              <option value="3 to 5 days">3 to 5 days</option>
			  <option value="5 to 7 days">5 to 7 days</option>
              <? }
			  elseif($_POST['days'] == "3 to 5 days"){
			  ?>
              <option value="1 to 3 days" >1 to 3 days</option>
              <option value="3 to 5 days" selected>3 to 5 days</option>
			  <option value="5 to 7 days">5 to 7 days</option>
              <? }
			  elseif($_POST['days'] == "5 to 7 days"){
			  ?>
              <option value="1 to 3 days" >1 to 3 days</option>
              <option value="3 to 5 days" >3 to 5 days</option>
			  <option value="5 to 7 days" selected>5 to 7 days</option>
              <? }
			
			  
			  ?>
              
			  
			  
            </select>            </td>
          </tr>
		  
		     
		   <tr>
            <td height="30" style="padding:4px;">Working Hours Per week</td>
            <td height="30" style="padding:4px;"><select name="hr" id="hr">
              <? if ($_POST['hr'] == "Select" || $_POST['hr'] == ""){?>
              <option selected>Select</option>
              <option value="1 to 3 hours">1 to 3 hours</option>
              <option value="4 to 10 hours">4 to 10 hours</option>
			  <option value="11 to 30 hours">11 to 30 hours</option>
			  <option value="Over 30 hours">Over 30 hours</option>
			  
              <? }
			  elseif($_POST['hr'] == "1 to 3 hours"){
			  ?>
              
             <option value="1 to 3 hours" selected>1 to 3 hours</option>
              <option value="4 to 10 hours">4 to 10 hours</option>
			  <option value="11 to 30 hours">11 to 30 hours</option>
			  <option value="Over 30 hours">Over 30 hours</option>
              <? }
			  elseif($_POST['hr'] == "4 to 10 hours "){
			  ?>
               <option value="1 to 3 hours" >1 to 3 hours</option>
              <option value="4 to 10 hours" selected>4 to 10 hours</option>
			  <option value="11 to 30 hours">11 to 30 hours</option>
			  <option value="Over 30 hours">Over 30 hours</option>
              <? }
			  elseif($_POST['hr'] == "11 to 30 hours "){
			  ?>
               <option value="1 to 3 hours" >1 to 3 hours</option>
              <option value="4 to 10 hours">4 to 10 hours</option>
			  <option value="11 to 30 hours"selected>11 to 30 hours</option>
			  <option value="Over 30 hours">Over 30 hours</option>
              <? }
			 elseif($_POST['hr'] == "30 and over "){
			  ?>
               <option value="1 to 3 hours" >1 to 3 hours</option>
              <option value="4 to 10 hours">4 to 10 hours</option>
			  <option value="11 to 30 hours">11 to 30 hours</option>
			  <option value="Over 30 hours" selected>Over 30 hours</option>
              <? }
			  
			  ?>
              
			  
			  
            </select>            </td>
          </tr>
		  
		
		  <tr>
            <td height="30" align="left" valign="top" style="padding:4px;">Other infos</td>
            <td height="30" style="padding:4px;"><textarea name="other" id="other" cols="30" rows="5"><?=$_POST['other']?></textarea></td>
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