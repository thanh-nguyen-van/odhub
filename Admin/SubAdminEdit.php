<? 
  include('include/adminheader.php');
  include('include/connect.php');
  $AdminId = $_REQUEST['AdminId'];
  $query="SELECT * FROM ".$table['adminaccount']." WHERE `AdminId`='".$AdminId."'";
  //die($query);
	$result=mysql_query($query);
	$admin_list = mysql_fetch_array($result);
?>

<h2>Edit Sub Admin</h2>
<div class="wht-bg">
<form action="SubmitPages/SubAdminProcess.php" method="post" name="stuForm" id="stuForm" enctype="multipart/form-data">
<input type="hidden" name="todo" id="todo" value="edit"/>
<input type="hidden" name="AdminId" id="AdminId" value="<?=$AdminId?>"/>
<input type="hidden" name="Idemail" id="Idemail" value="<?=base64_encode($admin_list['AdminEmail'])?>"/>
  <table width="96%" cellspacing="0" cellpadding="0" border="0" class="td-bor td-bor12">
    <tr>
      <td width="25%" valign="middle" align="left" class="name"><font color="red">*</font> First Name :</td>
      <td colspan="2" align="left" valign="middle"><input type="text" class="input12" id="loginEmail" value="<?=$admin_list['FirstName']?>" name="fname"><br />
      <span style="color:#F00;"><? echo $_SESSION['fname']; unset($_SESSION['fname']);?></span>
      </td>
      
    </tr>
    <tr>
      <td width="25%" valign="middle" align="left" class="name"><font color="red">*</font> Last Name :</td>
      <td colspan="2" align="left" valign="middle"><input type="text" class="input12" id="loginEmail" value="<?=$admin_list['LastName']?>" name="lname"><br />
	  <span style="color:#F00;"><? echo $_SESSION['lname']; unset($_SESSION['lname']);?></span></td>
      
    </tr>
    <tr>
      <td valign="middle" align="left" class="name"><font color="red">*</font> Email :</td>
      <td colspan="2" align="left" valign="middle"><input type="text" class="input12" id="loginEmail" value="<?=$admin_list['AdminEmail']?>" name="email"><br />
	  <span style="color:#F00;"><? echo $_SESSION['email']; unset($_SESSION['email']);?></span>
      </td>
    </tr>
    <tr>
      <td valign="middle" align="left" class="name">Status :</td>
      <td colspan="2" align="left" valign="middle"><table width="50%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="11%" align="left" valign="middle" class="lft-b"><input type="radio" name="status" id="radio" <? if($admin_list['Status']=='A') echo 'checked'; ?> value="A" /></td>
            <td width="17%" align="left" valign="middle" class="lft-b">Active</td>
            <td width="12%" align="left" valign="middle" class="lft-b"><input type="radio" name="status" id="radio" <? if($admin_list['Status']=='I') echo 'checked'; ?> value="I" /></td>
            <td width="60%" align="left" valign="middle" class="lft-b">Inactive</td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td valign="middle" align="right">&nbsp;</td>
      <td colspan="2" align="left" valign="middle" class="forget">&nbsp;</td>
    </tr>
    <tr>
      <td valign="middle" align="left">&nbsp;</td>
      <td width="50%" align="left" valign="middle"><input type="submit" name="submit" value="submit" class="buttn"></td>
      <td width="" align="left" valign="middle"><a href="SubAdminList.php" style="color:#000;">Back</a></td>
      <td width="25%" align="right" valign="middle" class="login-txt"></td>
    </tr>
  </table>
  </form>
</div>
<?php mysql_close($connect);?>
<?php include('include/adminfooter.php');?>