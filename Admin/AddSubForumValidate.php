<?

$subforum='';
$subforum_label='';
$set_for_correction=false;

if(!empty($_REQUEST['subforumname']))
{
	$subforum=$_REQUEST['subforumname'];
}

function subforum($strg)
{
	$invalid=0;
	$allowed=" abcdefghijklmnopqurstuvwxyzABCDEFGHIJKLMNOPQURSTUVWXYZ0123456789~`!@#$%^&*()_+|-=\[]{}:;?/><,./";
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

if($subforum=="")
{
	$subforum_label="<font color=red>Please enter subforum name.</font>";
	$set_for_correction=true;
}

if($subforum!="")
{
	if(subforum($subforum)==false)
	{
		$subforum_label="<font color=red>Only alphanumeric  and few symbols are allowed.</font>";
		$set_for_correction=true;
	}
}

if($set_for_correction=="true")
{
	include('AddSubForum.php');
}
else
{
	include('AddSubForumInsert.php');
}
?>