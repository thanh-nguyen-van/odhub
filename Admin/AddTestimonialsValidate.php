<? include('include/connect.php');

$title=mysql_real_escape_string(stripslashes(trim($_REQUEST['title'])));
$content=mysql_real_escape_string(addslashes(trim($_REQUEST['content'])));
//$images=mysql_real_escape_string(stripslashes(trim($_REQUEST['images'])));
//$amount=mysql_real_escape_string(stripslashes(trim($_REQUEST['amount'])));
//$country=mysql_real_escape_string(stripslashes(trim($_REQUEST['country'])));

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

if(($title=="") || (name($title)==false))
{
	$title_label="<font color=red>Check your entry.</font>";
	$set_for_correction=true;
}

/*if($type!="")
{
	$query="SELECT * FROM ".$table['subscription']." WHERE SubscriptionType='$type'";
	$result=mysql_query($query);
	if(mysql_num_rows($result))
	{
		$error_label="<font color=red>This type already exists.</font>";
		$set_for_correction=true;
	}
}*/

if(($content==""))
{
	$content_label="<font color=red>Check your enterd value.</font>";
	$set_for_correction=true;
}

if( $_FILES['images']['name'] == '')
{
	$images_label="<font color=red>Check your enterd value.</font>";
	$set_for_correction=true;
}

/*if(($amount=="") || (numeric($amount)==false))
{
	$amount_label="<font color=red>Check yourenterd value.</font>";
	$set_for_correction=true;
}*/
/*if($country=='')
{
	$country_label="<font color=red>Check your enterd value.</font>";
	$set_for_correction=true;
}*/
if($set_for_correction=="true")
{
	include('AddTestimonials.php');
}
else
{
	include('AddTestimonialsInsert.php');
}
?>