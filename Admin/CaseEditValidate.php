<?

DebugBreak();

$title=$_REQUEST['title'];
$arealaw=$_REQUEST['arealaw'];
/*$city=$_REQUEST['city'];
$state=$_REQUEST['state'];
$zip=$_REQUEST['zip'];*/
$description=$_REQUEST['description'];
$clientdescription=ereg_replace("\r\n\r\n|\n\n|\r\r","<p>",$description);
$clientdescription=stripcslashes(ereg_replace("\r\n|\n|\r","<br/>",$clientdescription));
 $attachment=$_FILES['attachment']['name'];
/*$casetype=$_REQUEST['casetype'];
$definedusers=$_REQUEST['definedusers'];*/
$caseid=$_REQUEST['caseid'];
$budget=$_REQUEST['budget'];
$days=$_REQUEST['days'];
$feature=$_REQUEST['featured'];
$nonpublic=$_REQUEST['nonpublic'];
$fulltime=$_REQUEST['fulltime'];


function title($strg)
{
	$invalid=0;
	$allowed=" abcdefghijklmnopqurstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789~`!@#$%^&*()_+|-=\/<>,.?:;{}[]";
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

function city($strg)
{
	$invalid=0;
	$allowed=" abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.";
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

function zip($strg)
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

if(($title=="") || (title($title)==false))
{
	$title_label="<font color=red>Please check the entry.</font>";
	$set_for_correction=true;
}

if($arealaw!="")
{
	foreach($arealaw as $value)
	{
		$lawlist.=$value.",";
	}
	$lawarea=",".$lawlist;
}

/*if(($city=="") || (city($city)==false) || (strlen($city)<4))
{
	$city_label="<font color=red>Please check the entry.</font>";
	$set_for_correction=true;
}

if(($state=="") || (city($state)==false) || (strlen($state)<2))
{
	$state_label="<font color=red>Please check the entry of state.</font>";
	$set_for_correction=true;
}

if(($zip=="") || (zip($zip)==false) || (strlen($zip)<5) || (strlen($zip)>5))
{
	$zip_label="<font color=red>Please check the zip entry.</font>";
	$set_for_correction=true;
}*/

if($clientdescription!="")
{
	if(title($clientdescription)==false)
	{
		$description_label="<font color=red>plaese check the entry of description.</font>";
		$set_for_correction=true;
	}
}

if($attachment!="")
{
	$allowed_filetypes = array('.jpg','.gif','.png','.jpeg','.ico','.zip','.pdf','.rtf','.doc');
	//$attach_ext=explode(".",$attachment);
	//echo $ext1=$attach_ext[1];
	 $ext = substr($attachment, strpos($attachment,'.'), strlen($attachment)-1);
	if(!in_array($ext,$allowed_filetypes))
	{
		$file_label="<font color=red>Invalid file extension.</font>";
		$set_for_correction=true;
	}
}

if(($budget=="") || (zip($budget)==false))
{
	$budget_label="<font color=red>Cannot be null and only integer values are allowed .</font>";
	$set_for_correction=true;
}

if(($days=="") || (zip($days)==false))
{
	$days_label="<font color=red>check the entry.</font>";
	$set_for_correction=true;
}

if($days>60)
{
	$dayslimit_label="<font color=red>Days cannot be more than 60 days</font>";
	$set_for_correction=true;
}
/* if($definedusers!="")
{
	if(title($definedusers)==false)
	{
		$definedusers_label="<font color=red>please check the entry.</font>";
		$set_for_correction=true;
	}
} */

if($set_for_correction=="true")
{
	include('CaseEdit.php');
}
else
{
	include('CaseEditUpdate.php');
}

?>
