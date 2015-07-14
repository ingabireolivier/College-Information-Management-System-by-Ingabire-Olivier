<?
session_start();
if (!isset($_SESSION['admin'])){
	echo "<script language=javascript>window.location='login.php?msg=expired';</script>";
}

include("includes/config.php");

?>
<html>
<head>
<title>TCTWBIMS | SEARCH STAFF</title>
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
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="document.search.keyword.focus();">
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
<td height="423" colspan="5" align="left" valign="top" bgcolor="#EDEDED">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="1">
          <tr>
            <td height="20" bgcolor="#8C8989"><span class="style1"><strong>Search staff</strong></span></td>
          </tr>
      </table>
      <form name="search" method="post" action="searchstaff.php" style="margin-top:0px; margin-bottom:3px;">
      <div align="right" style=" vertical-align:middle;padding:2px; background-color:#9AB9DC; border:solid #0099FF 1px;">Use Staff Name or Staff ID&nbsp;&nbsp;<input type="text" name="keyword" value="<?=$_POST['keyword']?>" style="font-family:Arial; font-size:11px; width:200px;">&nbsp;<input type="submit" name="Submit" value="Search" style=" font-family:Arial; font-size:12px;"></div>
      </form>
    <?
	
		if (isset($_POST['Submit'])){
			
		  $keyword = $_POST['keyword'];
		  $query = mysql_query("select stfid, stfname,id from staff where stfid like '$keyword%' OR stfname like '$keyword%'order by stfname");
		  
		  $numRows = mysql_num_rows($query);
		  if ($numRows != 0){
		  ?>
		  
        <div align="center" style=" padding:10px; color:#000000; font-weight:bold; background-color:#FFCCFF; border: outset 2px #0000FF; border-width:medium; border-color:#003399;">RESULT FOUND SUCCESSFULL. NOW, YOU CAN VIEW,  EDIT OR DELETE.</div><br> 
        <table width="100%" border="1" cellpadding="0" cellspacing="0" style=" border-collapse:collapse; border-color:#009999">
          <tr style="background-color:#9AB9DC">
            <td width="9%" height="20" align="center" valign="middle"><strong>No</strong></td>
            <td width="18%" align="center" valign="middle" ><strong>Staff ID</strong></td>
            <td width="50%" align="center" valign="middle"><strong>Staff Name</strong></td>
            <td width="23%" align="center" valign="middle"><strong>Action</strong></td>
          </tr>
          <?
		  $no = 1;
		  while($res = mysql_fetch_array($query)){
		  ?>
          <tr>
            <td height="20" align="center" valign="middle" ><?=$no?></td>
            <td align="center" valign="middle" ><?=$res['stfid']?></td>
            <td valign="middle" style="padding-left:4px;"><?=$res['stfname']?></td>
            <td align="center" valign="middle"><a href="viewstaff.php?id=<?=$res['id']?>">View</a> 
			<? if ($_SESSION['utype']=="Administrator"){?>
            <a href="editstaff.php?id=<?=$res['id']?>">Edit</a>
            <a href="deletestaff.php?id=<?=$res['id']?>" onClick="return confirm('Sure! You want to delete?');">Delete</a>
            <? }?>            </td>
          </tr>
          
        <?
		 $no = $no + 1;
		 } ?>
        </table>
        
        <? }
		else{
			echo ' <div align="center" style="padding:2px;">
          <div align="center" style=" padding:10px; color:#000000; font-weight:bold; background-color:#FFCCFF; border: outset 2px #0000FF; border-width:medium; border-color:#003399;">NO RESULT FOUND!</div><br><br><br>   <a href="searchstaff.php">TRY AGAIN</a> ';
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
<?
if ($_GET['msg'] != ""){
	echo("<script langiage=javascript>alert('Deleted successfully');</script>");
}
?>
</body>
</html>