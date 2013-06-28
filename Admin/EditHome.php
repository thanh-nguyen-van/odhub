<? 
include('include/adminheader.php');
include('include/connect.php');

$home_id = $_REQUEST['home_id'];



$home_query="SELECT * FROM ".$table['home']." WHERE id=$home_id";
$home_result=mysql_query($home_query);
?>
<script src="<?php echo $siteURL;?>public/ckeditor/ckeditor.js" type="application/javascript" ></script>
<table width="100%" class="whitetable">
<tr>
	<td colspan="5"> <font color="#FF0000"> <?php if((isset($_SESSION['E_msg']))) { echo $_SESSION['E_msg']; unset($_SESSION['E_msg']); } ?></font></td>
</tr>
	<tr>
	<td colspan="5"><h3>Edit Home</h3></td>
</tr>
<?
if(mysql_num_rows($home_result))
{
	$home=mysql_fetch_array($home_result);
	?>
	
		<form action="EditHomeValidate.php" method="post" enctype="multipart/form-data">
			<tr>
				<td class="tdhead"><font color="red">*</font>Title:</td>
				<td><input type="text" name="title" value="<? echo $home['title'];?>"></td>
				<td><? echo $title_label;?></td>
			</tr>
            
            <tr>
                <td class="tdhead"><font color="red">*</font>Testimonial Content:</td>
                <td><TEXTAREA NAME="content" ID="editor1"  ROWS="15" COLS="90"><? echo $home['content']; ?></TEXTAREA></td>
                <td><? echo $content_label;?></td>
		    </tr>
            
			<tr>
				<td class="tdhead">Images:</td>
                <td><img src="../upload/home/thumb/<? echo $home['image_path'];?>"  /></td>
			</tr>
            
			<tr>
			<td class="tdhead">Uplode Images:</td>
			<td><input type="file" name="images" ></td>
		    </tr>
            
            
			<tr>
				<input type="hidden" name="home_id" value="<? echo $home_id;?>">
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