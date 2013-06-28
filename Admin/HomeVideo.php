<?php
include('include/adminheader.php');
include('include/connect.php');
$msg = '';

if($_REQUEST['delid'] > 0){
	$str_delete = "SELECT * FROM ".$table['homevideo']." WHERE Id=".$_REQUEST['delid'];
	$sel_delete = mysql_query($str_delete);
	if(mysql_num_rows($sel_delete) > 0){
		$arr_delete = mysql_fetch_array($sel_delete);
		@unlink("../video/".$arr_delete['VideoFile']);
		
		$delete_query="DELETE FROM ".$table['homevideo']." WHERE Id=".$_REQUEST['delid'];
		$delete_result=mysql_query($delete_query);
	}
    ?><meta http-equiv="REFRESH" content="0;url=HomeVideo.php"><?
}

if($_REQUEST['editid'] > 0){
		$str_old = "SELECT * FROM ".$table['homevideo']." WHERE Id=".$_REQUEST['editid'];
		$sel_old = mysql_query($str_old);
		if(mysql_num_rows($sel_old) > 0){
			$arr_old = mysql_fetch_array($sel_old);	
		}
	
		if(isset($_REQUEST['btnsubmit'])){
			
			$videofile = $_FILES["filevideo"]["name"];
			if($videofile != ""){
				/*$str_chk = "SELECT * FROM ".$table['video']." WHERE VideoTitle='".$videotitle."' AND VideoId <>".$_REQUEST['editid'];
				$sel_chk = mysql_query($str_chk);
				if(mysql_num_rows($sel_chk) > 0){
					$msg = "<font color='red'>Video title already exists!</font>";	
				}else{*/
					
					if($videofile!=''){
						
							$FileTypes["flv"]="video";
							$FileTypes["mp4"]="video";
							$FileTypes["mp3"]="video";
							$FileTypes["mov"]="video";
							$FileTypes["swf"]="video";
							
							$ext=explode(".",$videofile);
							$file_ext=$ext[count($ext)-1];
							
							
							if($_FILES["filevideo"]["name"]!=''){
								if(array_key_exists($file_ext, $FileTypes)) {
									$fileType = $FileTypes[$file_ext];
									copy($_FILES['filevideo']['tmp_name'], $GLOBALS['config']['UPLOAD_PATH']."video/".$videofile);
								
									
								}else{
									$msg = "<font class=error color='red'>Please check file extension. Only flv, swf, mp4 and mov can be uploaded.</font>";
								}
							}
					}
					
					if($videofile==''){
						$videofile = $arr_old['VideoFile'];
						
					}
					$update_query = "UPDATE ".$table['homevideo']." SET  video_file='".$videofile."' WHERE Id=".$_REQUEST['editid'];
					$update_result = mysql_query($update_query);
					if($update_result){
						$msg = "Video has been updated.";	
					}
					
				}
				
				
			//}
			
			
		}
}

if(!isset($_REQUEST['editid'])){
	if(isset($_REQUEST['btnsubmit'])){
		
		
		$videofile = $_FILES["filevideo"]["name"];
			
		
		if($videofile == ""){
			$video_label="<font color='red'>Please upload video.</font>";
			
		}
		
		if($videofile != ""){
			$str_chk = "SELECT * FROM ".$table['homevideo']." WHERE video_file='".$videofile."'";
			$sel_chk = mysql_query($str_chk);
			if(mysql_num_rows($sel_chk) > 0){
				$msg = "<font color='red'>Video  already exists!</font>";
			}else{
			
				if($videofile!=''){
					
						$FileTypes["flv"]="video";
						$FileTypes["mp4"]="video";
						$FileTypes["mp3"]="video";
						$FileTypes["mov"]="video";
						
						$ext=explode(".",$videofile);
						$file_ext=$ext[count($ext)-1];
					
						if($_FILES["filevideo"]["name"]!=''){
							if(array_key_exists($file_ext, $FileTypes)) {
								$fileType = $FileTypes[$file_ext];
								
								
								 copy($_FILES['filevideo']['tmp_name'], $GLOBALS['config']['UPLOAD_PATH']."video/".$videofile);
								
							
								
								$insert_query = "INSERT INTO ".$table['homevideo']." (video_file) VALUE ('".$videofile."')";
								$insert_result = mysql_query($insert_query);
								if($insert_result){
									$msg = "Video has been added.";	
								}
							}else{
								$msg = "<font class=error color='red'>Please check file extension. Only flv, mp4 and mov can be uploaded.</font>";
							}
						}
				}
			}
			
			
		}
	
	}
}

$str_video = "SELECT * FROM ".$table['homevideo']."";
$sel_video = mysql_query($str_video);
?>
<h2>Home Video </h2>
<div class="wht-bg">

<?php
    if(isset($msg) && $msg!=''){
	?>
 <table width="100%" class="td-bor" style="border-left:1px solid #6d6d6d; padding:15px;  margin-bottom:10px;">
   <tr>
		<td colspan="5" style="color:#FF0000;" ><?php echo $msg;?></td>
	</tr>
    </table>
    
<?php } ?>

<?php if(isset($_GET['editid']) && $msg =='')
{
?>
<table width="100%" class="td-bor" style="border-left:1px solid #6d6d6d; padding:14px; margin-bottom:10px;">
	<form name="frmvideo" action="" method="post" enctype="multipart/form-data">
    
    	
        
	  <tr>
			<td class="tdhead">Upload video:</td>
			<td colspan="2"><input type="file" name="filevideo" id="filevideo" class="input12"/>			  <?php echo $video_label;?></td>
		</tr>
		
		<tr>
			<td colspan="2"><input type="submit" name="btnsubmit" value="Submit" class="buttn"></td>
		</tr>
	</form>
    </table>
    <?php
}
?>

<?php
	if(mysql_num_rows($sel_video) > 0){
?>
	<table cellpadding="0" cellspacing="0" width="100%" class="td-bor" style="border-left:1px solid #6d6d6d; padding:14px; margin-bottom:10px;">
    	<tr>
        	<td width="5%"><b>Srl</b></td>
            <td width="30%"><b>Video File</b></td>
            <td width="15%"><b>Action</b></td>
        </tr>
    
<?php

		$i=1;
		while($arr_video = mysql_fetch_array($sel_video)){
		
		$z=$i++;
		
?>
		<tr>
        	<td width="5%"><?php echo $z ?></td>
            <td width="30%"><?php echo $arr_video['video_file'];?></td>
            <td width="15%"><a href="HomeVideo.php?editid=<?php echo $arr_video['Id'];?>" class="edit"> &nbsp; Edit</a> </td>
        </tr>

<?php
		}
?>
	</table>
<?php
	}
?>
</div>



<?include('include/adminfooter.php');?>