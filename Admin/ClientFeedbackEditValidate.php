<?
$rate=$_REQUEST['rate'];
$message=$_REQUEST['message'];
$msg=ereg_replace("\r\n\r\n|\n\n|\r\r","<p>",$message);
$msg=stripcslashes(ereg_replace("\r\n|\n|\r","<br/>",$msg));
$feedbackid=$_REQUEST['feedbackid'];

function message($strg)
{
	$invalid=0;
	$allowed=" abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789~`!@#$%^&*()_-+=|\[]{}:;?/>.<,";
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
if($rate=="")
{
	$rate_label="<font color=red>It cannot be null</font>";
	$set_for_correction=true;
}

if(($msg=="") || (message($msg)==false))
{
	$message_label="<font color=red>Check your entered value.</font>";
	$set_for_correction=true;
}

if($set_for_correction=="true")
{
	include('ClientFeedbackEdit.php');
}
else
{
	include('ClientFeedbackEditInsert.php');
}

?>