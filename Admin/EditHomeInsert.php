<? 
include('include/adminheader.php');
include('include/connect.php');
$objimg= new img_opt();
$home_id = $_REQUEST['home_id'];


$query="select `image_path` from ".$table['home']." WHERE id=$home_id";
//echo $query;exit;
$result=mysql_query($query);
$res_img = mysql_fetch_array($result);

//============= Picture uplode code =======================
  if($_FILES['images']['name'] == ''){$images = $res_img['image_path'];} else
  {$images = time().$_FILES['images']['name'];}
  
  //echo $_SERVER['DOCUMENT_ROOT']."/Upload/".$GLOBALS['config']['USERIMAGEFOLDER'].$picture;exit;
  
  if($_FILES['images']['name'] != '') { 
  
  copy($_FILES['images']['tmp_name'], $GLOBALS['config']['UPLOAD_PATH']."home/".$images);

  
  $sourcepath       = $GLOBALS['config']['UPLOAD_PATH']."home/".$images;
  $resizedpathhome  = $GLOBALS['config']['UPLOAD_PATH'].'home/resized/'.$images; //generate the destination path
  $resizedpaththumb = $GLOBALS['config']['UPLOAD_PATH'].'home/thumb/'.$images; //generate the destination path
  
  
  
  copy($sourcepath, $resizedpathhome);
  //// set maximum width within wich the image should be resized
  $objimg->max_width($GLOBALS['config']['RESIZEDWIDTH']);
  // set maximum height within wich the image should be resized
  // for example size of the area in which image to be displayed
  $objimg->max_height($GLOBALS['config']['RESIZEDHEIGHT']);
  $objimg->image_path($resizedpathhome);
  // call the functio to resize the image
  $objimg->image_resize();					
  
  copy($sourcepath, $resizedpaththumb);
  // set maximum width within wich the image should be resized
  $objimg->max_width($GLOBALS['config']['THUMBWIDTH']);
  // set maximum height within wich the image should be resized
  // for example size of the area in which image to be displayed
  $objimg->max_height($GLOBALS['config']['THUMBHEIGHT']);
  $objimg->image_path($resizedpaththumb);
  // call the functio to resize the image
  $objimg->image_resize();
  
  @unlink($GLOBALS['config']['UPLOAD_PATH']."site/public/images//".$res_img['image_path']);
  @unlink($GLOBALS['config']['UPLOAD_PATH']."site/public/images/".$res_img['image_path']);
  @unlink($GLOBALS['config']['UPLOAD_PATH']."site/public/images/".$res_img['image_path']);	
  }
//============= end of picture uplode code =======================

$update_query="UPDATE  ".$table['home']."  SET title='".$title."', 
			   content='".$content."',
			   image_path='".$images."' 
			   WHERE id=$home_id";
//echo $update_query;exit;
 
$update_result=mysql_query($update_query);
?>
<h2>Edit Home Page</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">	
<?
if($update_result)
{
	$_SESSION['E_msg'] = "Successfully edited";	
}
else
{
	$_SESSION['E_msg'] = "Not Edited.Try agian";	
}
?>
</table>

<? mysql_close($connect);?>
<? include('include/adminfooter.php');?>