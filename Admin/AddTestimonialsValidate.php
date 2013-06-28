<? include('include/connect.php');
ob_start();
$title=mysql_real_escape_string(stripslashes(trim($_REQUEST['title'])));
$content=mysql_real_escape_string(addslashes(trim($_REQUEST['content'])));




if(($title==""))
{
	$title_label="<font color=red>Please Enter value.</font>";
	$set_for_correction=true;
}

else
{
	$set_for_correction=false;
}

if(($content==""))
{
	$content_label="<font color=red>Please Enter value.</font>";
	$set_for_correction=true;
}

else
{
	$set_for_correction=false;
}

if($_FILES['images']['name'] == '')
{
	$images_label="<font color=red>Please Browse Image.</font>";
	$set_for_correction=true;
}

else
{
	$set_for_correction=false;
}

if($set_for_correction=="true")
{
	include('AddTestimonials.php');
}
else
{
	include('AddTestimonialsInsert.php');
	header("Location: ViewTestimonials.php");	
	exit;
}
?>