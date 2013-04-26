<? 
include('include/adminheader.php');
include('include/connect.php');
//include('../include/tiny.php');

$StaticPageId = $_REQUEST['StaticPageId'];
$leftmenu_query="SELECT * FROM ".$table['staticpage']." WHERE StaticPageId=$StaticPageId";
//echo $leftmenu_query; exit;
$leftmenu_result=mysql_query($leftmenu_query);
?>
<script src="<?php echo $siteURL;?>public/ckeditor/ckeditor.js" type="application/javascript" ></script>
<table width="100%">
<tr>
	<td colspan="5"><h3>Edit Left Menu</h3></td>
</tr>
<?
if(mysql_num_rows($leftmenu_result))
{
	$leftmenu=mysql_fetch_array($leftmenu_result);
	?>
	
		<form action="EditLeftMenuValidate.php" method="post" enctype="multipart/form-data">
			<tr>
			<td class="tdhead"><font color="red">*</font>Page Title:</td>
			<td><input type="text" name="PageTitle" value="<?=$leftmenu['StaticPageName'] ?>" ></td>
			<td><? echo $title_label;?><? //echo $error_label;?></td>
		</tr>
		<tr>
			<td class="tdhead"><font color="red">*</font>Page Content:</td>
			<td><TEXTAREA NAME="PageContent" ID="editor1"  ROWS="15" COLS="90"><?=$leftmenu['StaticPageText'] ?></TEXTAREA></td>
			<td><? echo $content_label;?></td>
		</tr>
		
		<tr>
			<td class="tdhead">Meta Keywords:</td>
			<td><input type="text" name="MetaKeywords" value="<?=$leftmenu['MetaKeywords'] ?>" ></td>
			<td></td>
		</tr>
        
        <tr>
			<td class="tdhead">Meta Content:</td>
            <td><textarea name="MetaContent" rows="5" cols="50"><?=$leftmenu['MetaContent'] ?></textarea></td>
			<td></td>
		</tr>
        
        <tr>
			<td class="tdhead">Meta Description:</td>
            <td><textarea name="MetaDescription" rows="5" cols="50"><?=$leftmenu['MetaDescription'] ?></textarea></td>
			<td></td>
		</tr>
        
        <tr>
			<td class="tdhead">Page Order:</td>
			<td><input type="text" name="PageOrder" value="<?=$leftmenu['SortOrder'] ?>" ></td>
			<td></td>
		</tr>
        
        <tr>
			<td class="tdhead">Page Status:</td>
            <td>Active : <input type="radio" name="PageStatus" value="Y" <? if($leftmenu['Status'] == 'Y') echo 'checked'; ?>  /></td>
			<td>Inactive : <input type="radio" name="PageStatus" value="N" <? if($leftmenu['Status'] == 'N') echo 'checked'; ?>  /></td>
			<td></td>
		</tr>
            
            
			<tr>
				<input type="hidden" name="StaticPageId" value="<? echo $StaticPageId;?>">
				<td align="center" colspan="2"><input type="submit" name="submit" value="Edit"></td>
			</tr>
		</form>
	<?
}
else
{
	?>
	<tr>
		<td>Invalid left menu.</td>
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