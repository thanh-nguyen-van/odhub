<?
$question=$_REQUEST['question'];
$answer=$_REQUEST['answer'];
$ans=ereg_replace("\r\n\r\n|\r\r|\n\n","<p>",$answer);
$ans=stripcslashes(ereg_replace("\r\n|\r|\n","<br/>",$ans));

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

if(($question=="") || (alphanumeric($question)==false))
{
	$question_label="<font color=red>Check your entered value.</font>";
	$set_for_correction=true;
}

if(($ans=="") || (alphanumeric($ans)==false))
{
	$answer_label="<font color=red>Check your entry again</font>";
	$set_for_correction=true;
}

if($set_for_correction=="true")
{
	include('AddFaq.php');
}
else
{
	include('AddFaqInsert.php');
}

?>