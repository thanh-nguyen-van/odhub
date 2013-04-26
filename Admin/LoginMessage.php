<?php
session_start();
include('include/connect.php');
include('include/setting.php');

$usertype=  my_addslashes($_REQUEST['usertype']);
$username=  my_addslashes($_REQUEST['username']);
$password=  my_addslashes($_REQUEST['password']);
$login_attempts = $_SESSION['login_attempts'] == "" ? 0 : (int)$_SESSION['login_attempts'];


	$select_query="SELECT * FROM ".$table['adminaccount']." WHERE AdminUsername='$username' AND AdminPassword='$password'";
	$select_result=mysql_query($select_query);
	if(mysql_num_rows($select_result)>0)
	{
		while($rc=mysql_fetch_array($select_result))
		{
			 $_SESSION['AdminId']=$rc['AdminId'];
			 $_SESSION['Usertype']='Admin';
			 $_SESSION['Username']=$rc['AdminUsername'];
/*			 if($_SESSION['ClientMsg']!="")
			{
				 ?><meta http-equiv="refresh" content="0;url=<?php echo $siteURL;?>/Client/Msg.php?caseid=<?php echo $_SESSION['MsgCaseId'];?>&lawyerid=<?php echo $_SESSION['MsgLawyerId'];?>"> <?php
			}
			else
			{
*/				header('location:index.php');
			//}
		}
	}
	else
	{
		$err_label="<font class=error color='red'>Invalid Username or password</font>";
		include('AdminLogin.php');
	}

?>