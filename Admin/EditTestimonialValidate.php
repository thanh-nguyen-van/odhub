<? include('include/connect.php');
ob_start();
$title=mysql_real_escape_string(stripslashes(trim($_REQUEST['title'])));
$content=mysql_real_escape_string(stripslashes(trim($_REQUEST['content'])));
$testimonials_id=$_REQUEST['testimonials_id']; 



if(($content==""))
{
	$content_label="<font color=red>Please Enter Value.</font>";
	$set_for_correction=true;
}

else
{
  $set_for_correction=false;	
}
if($set_for_correction=="true")
{
	include('EditTestimonials.php');
}
else
{
	include('EditTestimonialsInsert.php');
	header("Location: EditTestimonials.php?testimonials_id=$testimonials_id");	
	exit;
}
?>