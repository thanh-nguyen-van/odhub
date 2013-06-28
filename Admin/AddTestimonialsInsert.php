<? 
include('include/adminheader.php');
$objimg= new img_opt();


//============= Picture uplode code =======================
  if($_FILES['images']['name'] == ''){$images = '';} else
  {$images = time().$_FILES['images']['name'];}
  
  //echo $_SERVER['DOCUMENT_ROOT']."/Upload/".$GLOBALS['config']['USERIMAGEFOLDER'].$picture;exit;
  
  if($_FILES['images']['name'] != '') {
  
  copy($_FILES['images']['tmp_name'], $GLOBALS['config']['UPLOAD_PATH']."testimonials/".$images);
  
  ///-----------------Resizing------------------
  $sourcepath       = $GLOBALS['config']['UPLOAD_PATH']."testimonials/".$images;
  
  $resizedpathhome  = $GLOBALS['config']['UPLOAD_PATH'].'testimonials/resized/'.$images; //generate the destination path
  $resizedpaththumb = $GLOBALS['config']['UPLOAD_PATH'].'testimonials/thumb/'.$images; //generate the destination path
  
  
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
  }
//============= end of picture uplode code =======================

$insert_query="INSERT INTO ".$table['testimonials']." (title, content, image_path, status) VALUES('".$title."', '".$content."', '".$images."', 'Y')";
//echo $insert_query; exit;
$insert_result=mysql_query($insert_query);

?>
<h2>Add Testimonial Detail</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">	
<?
if($insert_result)
{
	
	$_SESSION['T_msg'] = "Testimonial successfully added";	
	
}
else
{
	$_SESSION['T_msg'] = "Testimonial is not added.Try Again";
	
}

?>
</table>
</div>

<? mysql_close($connect);?>
<? include('include/adminfooter.php');?>