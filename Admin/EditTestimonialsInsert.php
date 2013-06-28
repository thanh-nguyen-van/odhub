<? 
include('include/adminheader.php');
include('include/connect.php');
$objimg= new img_opt();

$query="select `image_path` from ".$table['testimonials']." WHERE testimonials_id=$testimonials_id";
//echo $query;exit;
$result=mysql_query($query);
$res_img = mysql_fetch_array($result);

//============= Picture uplode code =======================
  if($_FILES['images']['name'] == ''){$images = $res_img['image_path'];} else
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
  
  @unlink($GLOBALS['config']['UPLOAD_PATH']."testimonials/".$res_img['image_path']);
  @unlink($GLOBALS['config']['UPLOAD_PATH']."testimonials/resized/".$res_img['image_path']);
  @unlink($GLOBALS['config']['UPLOAD_PATH']."testimonials/thumb/".$res_img['image_path']);	
  }
//============= end of picture uplode code =======================

$update_query="UPDATE  ".$table['testimonials']."  SET title='".$title."', 
			   content='".$content."',
			   image_path='".$images."' 
			   WHERE testimonials_id=$testimonials_id";
//echo $update_query;exit;
 
$update_result=mysql_query($update_query);
?>

<?
if($update_result)
{
	$_SESSION['M_msg'] = "Testimonial successfully edited";	
}
else
{
	$_SESSION['M_msg'] = "Testimonial successfully edited";	
}
?>

<tr>
	<td><a href="ViewTestimonials.php" class="back-btn">Back</a></td>
</tr>
</table>

<? mysql_close($connect);?>
<? include('include/adminfooter.php');?>