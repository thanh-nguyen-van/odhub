<?
$newsid=$_REQUEST['newsid'];
$title=$_REQUEST['title'];
$details=$_REQUEST['details'];
$det=ereg_replace("\r\n\r\n|\r\r|\n\n","<p>",$details);
$det=stripcslashes(ereg_replace("\r\n|\r|\n","<br/>",$det));

function alphanumeric($strg)
{
	$invalid=0;
	$allowed=" abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789~`!@#$%^&*()_-+=|\[]{};:?/>.<,";
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

if(($title=="") || (alphanumeric($title)==false))
{
	$title_label="<font color=red>Check your entered value.</font>";
	$set_for_correction=true;
}

if(($det=="") || (alphanumeric($det)==false))
{
	$det_label="<font color=red>Check your entry again</font>";
	$set_for_correction=true;
}

if($set_for_correction=="true")
{
	include('ViewNewsEdit.php');
}
else
{
	include('ViewNewsEditInsert.php');
}

?>