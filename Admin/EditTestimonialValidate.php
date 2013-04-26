<? include('include/connect.php');

$title=mysql_real_escape_string(stripslashes(trim($_REQUEST['title'])));
$content=mysql_real_escape_string(stripslashes(trim($_REQUEST['content'])));
$testimonials_id=$_REQUEST['testimonials_id']; 
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

if(($content=="") || (name($content)==false))
{
	$content_label="<font color=red>Check your entry.</font>";
	$set_for_correction=true;
}

if($set_for_correction=="true")
{
	include('EditTestimonials.php');
}
else
{
	include('EditTestimonialsInsert.php');
}
?>