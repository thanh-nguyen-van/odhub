<? 
include('include/adminheader.php');
include('include/connect.php');

$testimonials_id = $_REQUEST['testimonials_id'];
$testimonials_query="SELECT * FROM ".$table['testimonials']." WHERE testimonials_id=$testimonials_id";
$testimonials_result=mysql_query($testimonials_query);
?>
<script src="<?php echo $siteURL;?>public/ckeditor/ckeditor.js" type="application/javascript" ></script>
<table width="100%">
<tr>
	<td colspan="5"><h3>Edit Testimonial</h3></td>
</tr>
<?
if(mysql_num_rows($testimonials_result))
{
	$testimonials=mysql_fetch_array($testimonials_result);
	?>
	
		<form action="EditTestimonialValidate.php" method="post" enctype="multipart/form-data">
			<tr>
				<td class="tdhead"><font color="red">*</font>Title:</td>
				<td><input type="text" name="title" value="<? echo $testimonials['title'];?>"></td>
				<td><? echo $title_label;?></td>
			</tr>
            
            <tr>
                <td class="tdhead"><font color="red">*</font>Testimonial Content:</td>
                <td><TEXTAREA NAME="content" ID="editor1"  ROWS="15" COLS="90"><? echo $testimonials['content']; ?></TEXTAREA></td>
                <td><? echo $content_label;?></td>
		    </tr>
            
			<tr>
				<td class="tdhead">Images:</td>
                <td><img src="../Upload/testimonials/thumb/<? echo $testimonials['image_path'];?>"  /></td>
			</tr>
            
			<tr>
			<td class="tdhead">Uplode Images:</td>
			<td><input type="file" name="images" ></td>
		    </tr>
            
            
			<tr>
				<input type="hidden" name="testimonials_id" value="<? echo $testimonials_id;?>">
				<td align="center" colspan="2"><input type="submit" name="submit" value="Edit"></td>
			</tr>
		</form>
	<?
}
else
{
	?>
	<tr>
		<td>Invalid subscription.</td>
	</tr>
	<?
}
?>
</table>
<script>

	CKEDITOR.replace( 'editor1',
    {
        filebrowserUploadUrl : './uploader/upload.php',
        filebrowserWindowWidth : '640',
        filebrowserWindowHeight : '480'
    });

</script>
<? mysql_close($connect);?>
<? include('include/adminfooter.php');?>