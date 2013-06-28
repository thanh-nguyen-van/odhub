<?php
include('include/adminheader.php');
include('include/connect.php');
$msg = '';

if($_REQUEST['delid'] > 0){
	$str_delete = "SELECT * FROM ".$table['video']." WHERE VideoId=".$_REQUEST['delid'];
	$sel_delete = mysql_query($str_delete);
	if(mysql_num_rows($sel_delete) > 0){
		$arr_delete = mysql_fetch_array($sel_delete);
		@unlink("../video/".$arr_delete['VideoFile']);
		
		$delete_query="DELETE FROM ".$table['video']." WHERE VideoId=".$_REQUEST['delid'];
		$delete_result=mysql_query($delete_query);
	}
    ?><meta http-equiv="REFRESH" content="0;url=AddVideo.php"><?
}

if($_REQUEST['editid'] > 0){
		$str_old = "SELECT * FROM ".$table['video']." WHERE VideoId=".$_REQUEST['editid'];
		$sel_old = mysql_query($str_old);
		if(mysql_num_rows($sel_old) > 0){
			$arr_old = mysql_fetch_array($sel_old);	
		}
	
		if(isset($_REQUEST['btnsubmit'])){
			
			$videotitle = mysql_real_escape_string(stripslashes(trim($_REQUEST['txttitle'])));
			$videofile = $_FILES["filevideo"]["name"];
			
			if($videotitle == ''){
				$title_label="<font color='red'>Please enter video title.</font>";
			}
			
			if($videotitle != '' && $videofile != ""){
				/*$str_chk = "SELECT * FROM ".$table['video']." WHERE VideoTitle='".$videotitle."' AND VideoId <>".$_REQUEST['editid'];
				$sel_chk = mysql_query($str_chk);
				if(mysql_num_rows($sel_chk) > 0){
					$msg = "<font color='red'>Video title already exists!</font>";	
				}else{*/
					
					if($videofile!='' && $videotitle!=''){
						
							$FileTypes["flv"]="video";
							$FileTypes["mp4"]="video";
							$FileTypes["mov"]="video";
							$FileTypes["swf"]="video";
							
							$ext=explode(".",$videofile);
							$file_ext=$ext[count($ext)-1];
							
							if($arr_old['VideoFile']!=''){
								@unlink("../video/".$arr_old['VideoFile']);
							}
							if($_FILES["filevideo"]["name"]!=''){
								if(array_key_exists($file_ext, $FileTypes)) {
									$fileType = $FileTypes[$file_ext];
									$uploaddir = "../video/";
									move_uploaded_file($_FILES["filevideo"]["tmp_name"], $uploaddir.$videofile);
									
								}else{
									$msg = "<font class=error color='red'>Please check file extension. Only flv, swf, mp4 and mov can be uploaded.</font>";
								}
							}
					}
					
					if($videofile=='' && $videotitle!=''){
						$videofile = $arr_old['VideoFile'];
						
					}
					$update_query = "UPDATE ".$table['video']." SET VideoTitle='".$videotitle."', VideoFile='".$videofile."' WHERE VideoId=".$_REQUEST['editid'];
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
		
		$videotitle = mysql_real_escape_string(stripslashes(trim($_REQUEST['txttitle'])));
		$videofile = $_FILES["filevideo"]["name"];
		
		if($videotitle == ''){
			$title_label="<font color='red'>Please enter video title.</font>";
		}
		if($videofile == ""){
			$video_label="<font color='red'>Please upload video.</font>";
			
		}
		
		if($videotitle != '' && $videofile != ""){
			$str_chk = "SELECT * FROM ".$table['video']." WHERE VideoTitle='".$videotitle."'";
			$sel_chk = mysql_query($str_chk);
			if(mysql_num_rows($sel_chk) > 0){
				$msg = "<font color='red'>Video title already exists!</font>";
			}else{
			
				if($videofile!='' && $videotitle!=''){
					
						$FileTypes["flv"]="video";
						$FileTypes["mp4"]="video";
						$FileTypes["mov"]="video";
						
						$ext=explode(".",$videofile);
						$file_ext=$ext[count($ext)-1];
					
						if($_FILES["filevideo"]["name"]!=''){
							if(array_key_exists($file_ext, $FileTypes)) {
								$fileType = $FileTypes[$file_ext];
								$uploaddir = "../video/";
								move_uploaded_file($_FILES["filevideo"]["tmp_name"], $uploaddir.$videofile);
								
								$insert_query = "INSERT INTO ".$table['video']." (VideoTitle, VideoFile) VALUE ('".$videotitle."', '".$videofile."')";
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

$str_video = "SELECT * FROM ".$table['video']."";
$sel_video = mysql_query($str_video);
?>
<h2>Video Entry</h2>
<div class="wht-bg">
<table width="100%" class="td-bor" style="border-left:1px solid #6d6d6d; padding:14px; margin-bottom:10px;">
	<form name="frmvideo" action="" method="post" enctype="multipart/form-data">
    <?php
    if(isset($msg) && $msg!=''){
	?>
    <tr>
		<td colspan="5"><?php echo $msg;?></td>
	</tr>
	<?php	
	}
	?>
    	<tr>
			<td class="tdhead">Video Title:</td>
			<td><input type="text" name="txttitle" value="<?php echo (isset($_REQUEST['txttitle']) ? $_REQUEST['txttitle'] : $arr_old['VideoTitle'])?>" <?php if(isset($_REQUEST['editid']) && $_REQUEST['editid'] > 0){ echo "readonly";} ?> class="input12"></td>
			<td><?php echo $title_label;?></td>
		</tr>
        
		<tr>
			<td class="tdhead">Upload video:</td>
			<td><input type="file" name="filevideo" id="filevideo" class="input12"/></td>
			<td><?php echo $video_label;?></td>
		</tr>
		
		<tr>
			<td colspan="2"><input type="submit" name="btnsubmit" value="Submit" class="buttn"></td>
		</tr>
	</form>
</table>
<?php
	if(mysql_num_rows($sel_video) > 0){
?>
	<table cellpadding="0" cellspacing="0" width="100%" class="td-bor" style="border-left:1px solid #6d6d6d; padding:14px; margin-bottom:10px;">
    	<tr>
        	<td width="5%"><b>&nbsp;#</b></td>
            <td width="40%"><b>Video Title</b></td>
            <td width="30%"><b>File</b></td>
            <td width="15%"><b>Action</b></td>
        </tr>
    
<?php
		while($arr_video = mysql_fetch_array($sel_video)){
		
?>
		<tr>
        	<td width="5%">&nbsp;#</td>
            <td width="40%"><?php echo $arr_video['VideoTitle'];?></td>
            <td width="30%"><?php echo $arr_video['VideoFile'];?></td>
            <td width="15%"><a href="AddVideo.php?editid=<?php echo $arr_video['VideoId'];?>" class="edit">Edit</a> | <a href="AddVideo.php?delid=<?php echo $arr_video['VideoId'];?>"  onclick="return confirm('Are you sure you want to remove it?')" class="edit">Delete</a></td>
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