<?
$username=$_REQUEST['username'];
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

if($password==" ")
{
	$password_label="<font color=red>Plaese make a  entry</font>";
	$set_for_correction=true;
}

if($confirm=="")
{
	$confirm_label="<font color=red>Please make a entry</font>";
	$set_for_correction=true;
}

if($password!=" ")
{
	if((password($password)==false) || (strlen($password)<4) || (strlen($password)>10))
	{
		$password_label="<font color=red>Please check the entry</font>";
		$set_for_correction=true;
	}
}

if(strcmp($password, $confirm))
{
	$confirm_label="<font color=red>Your password enteries must match.Please enter them again.</font>";
	$set_for_correction=true;
}

if($set_for_correction=="true")
{
	include('ChangePassword.php');
}
else
{
	include('ChangePasswordUpdate.php');
}







?>