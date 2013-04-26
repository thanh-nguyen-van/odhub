<?
include('include/connect.php');
$msg = '';
$category=mysql_real_escape_string(stripslashes(trim($_REQUEST['blogcategory'])));

$str_blogcat = "SELECT * FROM ".$table['blogcategory']." WHERE BlogCategory='".$category."'";
$sel_blogcat = mysql_query($str_blogcat);

if(mysql_num_rows($sel_blogcat) > 0){
	$blogcategory_label="<font color=red>This blog category already exists!</font>";
	$set_for_correction=true;
}

if(($category=="") || ($category==" "))
{
	$blogcategory_label="<font color=red>Check your entered value.</font>";
	$set_for_correction=true;
}

if($set_for_correction=="true")
{
	include('AddBlogCategory.php');
}
else
{
	$insert_query="INSERT INTO ".$table['blogcategory']." (BlogCategory) VALUES ('$category')";
	$insert_result=mysql_query($insert_query);
	if($insert_result){
		$msg = "Blog Category is added successfully.";
	}else{
		$msg = "Blog Category is not added.";
	}
	include('AddBlogCategory.php');
}

?>