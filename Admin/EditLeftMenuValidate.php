<? include('include/connect.php');

$PageTitle=mysql_real_escape_string(stripslashes(trim($_REQUEST['PageTitle'])));
$PageContent=mysql_real_escape_string(stripslashes(trim($_REQUEST['PageContent'])));
$MetaKeywords=mysql_real_escape_string(stripslashes(trim($_REQUEST['MetaKeywords'])));
$MetaContent=mysql_real_escape_string(stripslashes(trim($_REQUEST['MetaContent'])));
$MetaDescription=mysql_real_escape_string(stripslashes(trim($_REQUEST['MetaDescription'])));
$PageOrder=$_REQUEST['PageOrder'];
if($PageOrder == '') $PageOrder = '0';
$PageStatus=mysql_real_escape_string(stripslashes(trim($_REQUEST['PageStatus'])));
if($PageStatus == '') $PageStatus = 'Y';

$StaticPageId=$_REQUEST['StaticPageId']; 
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

if(($PageTitle=="") || (name($PageTitle)==false))
{
	$title_label="<font color=red>Check your entry.</font>";
	$set_for_correction=true;
}

if(($PageContent=="") || (name($PageContent)==false))
{
	$content_label="<font color=red>Check your entry.</font>";
	$set_for_correction=true;
}

if($set_for_correction=="true")
{
	include('EditLeftMenu.php');
}
else
{
	include('EditLeftMenuInsert.php');
}
?>