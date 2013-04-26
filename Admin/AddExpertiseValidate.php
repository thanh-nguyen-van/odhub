<?
include('include/connect.php');
$expertise=$_REQUEST['expertise'];
$lawyercategory=$_REQUEST['lawyercategory'];

function expertise($strg)
{
	$invalid=0;
	$allowed=" abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ/";
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

if(($expertise=="") || (expertise($expertise)==false))
{
	$expertise_label="<font color=red>Please check your entry</font>";
	$set_for_correction=true;
}
if(($lawyercategory=="") || $lawyercategory<=0)
{
	$expertise_label="<font color=red>Please select a category</font>";
	$set_for_correction=true;
}
if($expertise!="" && $lawyercategory!="")
{
	$select_query="select * from ".$table['expertise']." where ExpertiseName='". $expertise."' and LawyerCategoryId=".$lawyercategory;
	$select_result=mysql_query($select_query);
	if(mysql_num_rows($select_result)>0)
	{
		$err="<font color=red>This expertise already exists.</font>";
		$set_for_correction=true;
	}
}


if($set_for_correction=="true")
{
	include("AddExpertise.php");
}
else
{
	include('AddExpertiseInsert.php');
}
?>