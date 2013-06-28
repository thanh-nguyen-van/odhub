<? include('include/connect.php');
ob_start();
$title=mysql_real_escape_string(stripslashes(trim($_REQUEST['title'])));
$content=mysql_real_escape_string(addslashes(trim($_REQUEST['content'])));
//$images=mysql_real_escape_string(stripslashes(trim($_REQUEST['images'])));
//$amount=mysql_real_escape_string(stripslashes(trim($_REQUEST['amount'])));
//$country=mysql_real_escape_string(stripslashes(trim($_REQUEST['country'])));
if(($title==""))
{
	$title_label="<font color=red>Check your enterd value.</font>";
	$set_for_correction=true;
}
else
{
	$set_for_correction=false;
}


if(($content==""))
{
	$content_label="<font color=red>Check your enterd value.</font>";
	$set_for_correction=true;
}
else
{
	$set_for_correction=false;
}
if( $_FILES['images']['name'] == '')
{
	$images_label="<font color=red>Please browse image.</font>";
	$set_for_correction=true;
}

else
{
	$set_for_correction=false;
}
	
if($set_for_correction=="true")
{
	include('AddClient_home.php');
}
else
{
	include('AddHomeInsert.php');
	header("Location:Client_home.php");	
	exit;
}
?>