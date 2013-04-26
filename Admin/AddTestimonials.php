<? 
include('include/adminheader.php');
include('include/connect.php');
?>
<script src="<?php echo $siteURL;?>public/ckeditor/ckeditor.js" type="application/javascript" ></script>

<table width="100%">
	<tr>
		<td colspan="5"><h3>Add Testimonials Detail </h3></td>
	</tr>
	<form action="AddTestimonialsValidate.php" method="post" enctype="multipart/form-data" >
		<tr>
			<td class="tdhead"><font color="red">*</font>Testimonial Title:</td>
			<td><input type="text" name="title" ></td>
			<td><? echo $title_label;?><? //echo $error_label;?></td>
		</tr>
		<tr>
			<td class="tdhead"><font color="red">*</font>Testimonial Content:</td>
			<td><TEXTAREA NAME="content" ID="editor1"  ROWS="15" COLS="90"><? if(!empty($pagedata)){echo $pagedata;}else{echo $data;} ?></TEXTAREA></td>
			<td><? echo $content_label;?></td>
		</tr>
		<tr>
			<td class="tdhead"><font color="red">* </font>Images:</td>
			<td><input type="file" name="images" ></td>
			<td><? echo $images_label;?></td>
		</tr>
		
        
		<tr>
			<td align="center" colspan="3"><input type="submit" name="submit" value="Add"></td>
		</tr>
	</form>
</table>
<script>

	CKEDITOR.replace( 'editor1',
    {
        filebrowserUploadUrl : './uploader/upload.php',
        filebrowserWindowWidth : '640',
        filebrowserWindowHeight : '480'
    });

</script>

<? include('include/adminfooter.php');?>