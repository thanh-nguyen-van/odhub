<? 
include('include/adminheader.php');
include('include/connect.php');
?>
<script src="<?php echo $siteURL;?>public/ckeditor/ckeditor.js" type="application/javascript" ></script>

<table width="100%">
	<tr>
		<td colspan="5"><h3>Add Left Menu Detail </h3></td>
	</tr>
	<form action="AddLeftMenuValidate.php" method="post" enctype="multipart/form-data" >
		<tr>
			<td class="tdhead"><font color="red">*</font>Page Title:</td>
			<td><input type="text" name="PageTitle" ></td>
			<td><? echo $title_label;?><? //echo $error_label;?></td>
		</tr>
		<tr>
			<td class="tdhead"><font color="red">*</font>Page Content:</td>
			<td><TEXTAREA NAME="PageContent" ID="editor1"  ROWS="15" COLS="90"><? if(!empty($pagedata)){echo $pagedata;}else{echo $data;} ?></TEXTAREA></td>
			<td><? echo $content_label;?></td>
		</tr>
		
		<tr>
			<td class="tdhead">Meta Keywords:</td>
			<td><input type="text" name="MetaKeywords" ></td>
			<td></td>
		</tr>
        
        <tr>
			<td class="tdhead">Meta Content:</td>
            <td><textarea name="MetaContent" rows="5" cols="50"></textarea></td>
			<td></td>
		</tr>
        
        <tr>
			<td class="tdhead">Meta Description:</td>
            <td><textarea name="MetaDescription" rows="5" cols="50"></textarea></td>
			<td></td>
		</tr>
        
        <tr>
			<td class="tdhead">Page Order:</td>
			<td><input type="text" name="PageOrder" ></td>
			<td></td>
		</tr>
        
        <tr>
			<td class="tdhead">Page Status:</td>
            <td>Active : <input type="radio" name="PageStatus" value="Y"  /></td>
			<td>Inactive : <input type="radio" name="PageStatus" value="N"  /></td>
			<td></td>
		</tr>
        
		<tr>
			<td align="center" colspan="3"><input type="submit" name="submit" value="Add"></td>
		</tr>
	</form>
</table>
<img src="192.168.1.61/odhub/upload/13651509534410add639520ad8956eb1.L._SX80_.jpg"  />
<script>

			// This call can be placed at any point after the
			// <textarea>, or inside a <head><script> in a
			// window.onload event handler.

			// Replace the <textarea id="editor"> with an CKEditor
			// instance, using default configurations.

			CKEDITOR.replace( 'editor1',
    {
        filebrowserUploadUrl : './uploader/upload.php',
        filebrowserWindowWidth : '640',
        filebrowserWindowHeight : '480'
    });

</script>


<? include('include/adminfooter.php');?>