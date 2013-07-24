<? 
include('include/adminheader.php');
include('include/connect.php');
$objimg= new img_opt();
$for_client_id = $_REQUEST['id'];
if($_POST['submit']=='Save'){
	$title=mysql_real_escape_string(stripslashes(trim($_REQUEST['title'])));
	$content=mysql_real_escape_string(stripslashes(trim($_REQUEST['content'])));
		if(($title=="")){
				$title_label="<font color=red>Check your entry.</font>";
				$set_for_correction=true; 
		}else{
				$set_for_correction=false;  
		}
		if(($content=="")){
				$content_label="<font color=red>Check your entry.</font>";
				$set_for_correction=true;
		}else{
				$set_for_correction=false;  
		}
		
	
	//============= end of picture uplode code =======================

	$update_query="UPDATE  ".$table['for_client']."  SET title='".$title."', 
				   content='".$content."'
				   WHERE id=$for_client_id";
	//echo $update_query;exit;
	 
	$update_result=mysql_query($update_query);

		
	}

	$forclient_query="SELECT * FROM ".$table['for_client']." WHERE id=$for_client_id";
	$forclient_result=mysql_query($forclient_query);
?>
<script src="<?php echo $siteURL;?>public/ckeditor/ckeditor.js" type="application/javascript" ></script>
<table width="100%" class="whitetable">
<tr>
	<td colspan="5"> <font color="#FF0000"> <?php if((isset($_SESSION['E_msg']))) { echo $_SESSION['E_msg']; unset($_SESSION['E_msg']); } ?></font></td>
</tr>
	<tr>
	<td colspan="5"><h3>Edit For Client</h3></td>
</tr>
<?
if(mysql_num_rows($forclient_result))
{
	$forclient=mysql_fetch_array($forclient_result);
	?>
	
		<form action="EditForClient.php" method="post" enctype="multipart/form-data">
			<tr>
				<td class="tdhead"><font color="red">*</font>Title:</td>
				<td><input type="text" name="title" value="<? echo $forclient['title'];?>" size="135"></td>
				
			</tr>
			<tr><td><? echo $title_label;?></td></tr>
            
            <tr>
                <td class="tdhead"><font color="red">*</font>Testimonial Content:</td>
                <td><TEXTAREA NAME="content" ID="editor1"  ROWS="15" COLS="90"><? echo $forclient['content']; ?></TEXTAREA></td>
               
		    </tr>
			<tr> <td><? echo $content_label;?></td></tr>
            
			
            
            
            
			<tr>
				<input type="hidden" name="id" value="<? echo $for_client_id;?>">
				<td align="center" colspan="2"><input type="submit" name="submit" value="Save"></td>
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

<? 
mysql_close($connect);?>
<? include('include/adminfooter.php');?>