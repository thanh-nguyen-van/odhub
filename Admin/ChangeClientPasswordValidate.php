<?
$clientid=$_REQUEST['clientid'];
$password=$_REQUEST['password'];
$confirm=$_REQUEST['confirm'];

function password($strg)
{
	$invalid=0;
	$allowed="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	for($i=0; $i<strlen($strg); $i++)
	{
		for($x=0; $x<strlen($allowed); $x++)
		{
			if($strg[$i]==$allowed[$x])
			{	
				$invalid++;
			}
		}
		if($invalid==0)
		{
			return false;break;break;
		}
		$invalid=0;
	}
	return true;
}
// DebugBreak();
if($password==" ")
{
	$password_label="<font color=red>Please make a  entry</font>";
	$set_for_correction=true;
}

if($confirm=="")
{
	$confirm_label="<font color=red>Please make a entry</font>";
	$set_for_correction=true;
}

if($password!="")
{
	if((password($password)==false) || (strlen($password)<4) || (strlen($password)>10))
	{
		$clientpassword_label="<font color=red>Please check the entry</font>";
		$set_for_correction=true;
	}
}

if(strcmp($password, $confirm))
{
	$reenter_label="<font color=red>Your password enteries must match.Please enter them again.</font>";
	$set_for_correction=true;
}
 $set_for_correction = false;
if($set_for_correction=="true")
{
	include('ChangeClientPassword.php');
}
else
{
	include('ChangeClientPasswordInsert.php');
}

?>