<?
include('include/connect.php');
$expertise=$_REQUEST['expertise'];
$expertiseid=$_REQUEST['expertiseid'];
$lawyercategory=$_REQUEST['lawyercategory'];

function expertise($strg)
{
	$invalid=0;
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
	}
	return true;
}

if(trim($expertise)=="" || (expertise($expertise)==false))
{
	$expertise_label="<font color=red>Please check your entry</font>";
	$set_for_correction=true;
}
if(($lawyercategory=="") || $lawyercategory<=0)
{
	$expertise_label="<font color=red>Please select a category</font>";
	$set_for_correction=true;
}
if(trim($expertise!="") && $lawyercategory!="")
{
	$select_query="select * from ".$table['expertise']." where ExpertiseName='". $expertise."' and LawyerCategoryId=".$lawyercategory." and ExpertiseId<>".$expertiseid;
	$select_result=mysql_query($select_query);
	if($select_result && mysql_num_rows($select_result)>0)
	{
		$err="<font color=red>This expertise already exists.</font>";
		$set_for_correction=true;
	}
}


if($set_for_correction=="true")
{
	include("ExpertiseViewEdit.php");
}
else
{
	include("ExpertiseViewEditUpdate.php");
}
?>