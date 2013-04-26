<? include('include/connect.php');

$type=mysql_real_escape_string(stripslashes(trim($_REQUEST['type'])));
$duration=mysql_real_escape_string(stripslashes(trim($_REQUEST['duration'])));
$bids=mysql_real_escape_string(stripslashes(trim($_REQUEST['bids'])));
$amount=mysql_real_escape_string(stripslashes(trim($_REQUEST['amount'])));
$subscriptionid=mysql_real_escape_string(stripslashes(trim($_REQUEST['subscriptionid'])));
$country=mysql_real_escape_string(stripslashes(trim($_REQUEST['country'])));
function name($strg)
{
	/*$invalid=0;
	$allowed=" abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
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
	}*/
	return true;
}

function numeric($strg)
{
	$invalid=0;
	$allowed="0123456789";
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

if(($type=="") || (name($type)==false))
{
	$type_label="<font color=red>Check your entry.</font>";
	$set_for_correction=true;
}

if(($bids=="") || (numeric($bids)==false))
{
	$bids_label="<font color=red>Check your enterd value.</font>";
	$set_for_correction=true;
}

if(($duration=="") || (numeric($duration)==false))
{
	$duration_label="<font color=red>Check your enterd value.</font>";
	$set_for_correction=true;
}

if(($amount=="") || (numeric($amount)==false))
{
	$amount_label="<font color=red>Check yourenterd value.</font>";
	$set_for_correction=true;
}
/*if($country=='')
{
	$country_label="<font color=red>Check your enterd value.</font>";
	$set_for_correction=true;
}*/
if($set_for_correction=="true")
{
	include('EditSubscription.php');
}
else
{
	include('EditSubscriptionInsert.php');
}
?>