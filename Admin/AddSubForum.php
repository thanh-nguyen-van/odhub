<?include('include/adminheader.php');
include('include/connect.php');?>

<?
$msg='';

//to delete a forum topic

if(isset($_REQUEST['rem']) && $_REQUEST['rem'] > 0)
{
	$delete_post="DELETE  FROM ".$table['forumpost']." WHERE ForumTopicId=".$_REQUEST['rem'];
	$delete_post_result=mysql_query($delete_post);
	if($delete_post_result){
		$delete_query="DELETE  FROM ".$table['forumtopic']." WHERE ForumTopicId=".$_REQUEST['rem'];
		$delete_result=mysql_query($delete_query);
	}
	if($delete_post_result && $delete_result)
	{
		?><meta http-equiv="REFRESH" content="0;url=AddSubForum.php"><?
	}else{
		$msg = "Error in forum deletion!";	
	}
}
//to update a forum topic

if(isset($_REQUEST['change']) && $_REQUEST['change'] > 0)
{
	if(isset($_REQUEST['btnsubmit'])){
		$str_topic = "SELECT * FROM ".$table['forumtopic']." WHERE ForumTopic='".mysql_real_escape_string(stripslashes(trim($_REQUEST['txttopic'])))."' AND ForumTopicId <> ".$_REQUEST['change'];
		$sel_topic = mysql_query($str_topic);
		if(mysql_num_rows($sel_topic) > 0){
			$msg = "This forum topic title already exists! Please try some other title.";
		}else{
			$update_topic = "UPDATE ".$table['forumtopic']." SET ForumTopic='".mysql_real_escape_string(stripslashes(trim($_REQUEST['txttopic'])))."', ForumTopicContent='".mysql_real_escape_string(stripslashes(trim($_REQUEST['txtcontent'])))."' WHERE ForumTopicId=".$_REQUEST['change'];
			$update_result = mysql_query($update_topic);
			if($update_result){
				$msg = "Forum topic has been updated.";		
			}
		}
	}
	$str_ftopic = "SELECT * FROM ".$table['forumtopic']." WHERE ForumTopicId=".$_REQUEST['change'];
	$sel_ftopic = mysql_query($str_ftopic);
	if(mysql_num_rows($sel_ftopic) > 0){
		$arr_ftopic = mysql_fetch_array($sel_ftopic);	
	}
}

//to insert a forum topic
if((!isset($_REQUEST['change'])) && ($_REQUEST['change'] <= 0) && (!isset($_REQUEST['rem'])) && ($_REQUEST['rem'] <= 0)){
	if(isset($_REQUEST['btnsubmit'])){
			$str_topic = "SELECT * FROM ".$table['forumtopic']." WHERE ForumTopic='".mysql_real_escape_string(stripslashes(trim($_REQUEST['txttopic'])))."'";
			$sel_topic = mysql_query($str_topic);
			if(mysql_num_rows($sel_topic) > 0){
				$msg = "This forum topic title already exists! Please try some other title.";
			}else{
				$insert_topic = "INSERT INTO ".$table['forumtopic']." (ForumTopic, ForumTopicContent) VALUE ('".mysql_real_escape_string(stripslashes(trim($_REQUEST['txttopic'])))."', '".mysql_real_escape_string(stripslashes(trim($_REQUEST['txtcontent'])))."')";
				$insert_result = mysql_query($insert_topic);
				if($insert_result){
					$msg = "Forum topic has been inserted.";		
				}
			}
	}
}

//Select forum topics
$forum_query="SELECT * FROM ".$table['forumtopic']." ORDER BY ForumTopicDate DESC";
$forum_result=mysql_query($forum_query);
?>
<h2></h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
	<FORM ACTION="" METHOD="post">
        <?php
        if(isset($msg) && $msg!=''){
		?>
		<TR>
			<TD align="left" colspan="2"><?php echo $msg;?></TD>
		</TR>
        <?php
		}
		?>
		<TR>
			<TD>Forum Topic : </TD>
			<TD><INPUT TYPE="input" NAME="txttopic" VALUE="<?php echo($_REQUEST['txttopic']!='' ? $_REQUEST['txttopic'] : $arr_ftopic['ForumTopic']);?>" class="input12"></TD>
		</TR>
        <TR>
			<TD>Forum Topic Content: </TD>
			<TD><textarea class="input12" style="height:80px;" name="txtcontent" id="txtcontent"><?php echo($_REQUEST['txtcontent']!='' ? $_REQUEST['txtcontent'] : $arr_ftopic['ForumTopicContent']);?></textarea></TD>
		</TR>
        <TR>
        	<TD align="left" colspan="2"><INPUT TYPE="submit" NAME="btnsubmit" value="Submit" class="buttn"></TD>
        </TR>
	</FORM>
</TABLE>
</div>
<BR/>
<BR/>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
	<TR>
		<TD colspan="4" align="left"><b>Forum Topic List</b></TD>
	</TR>
	<TR>
		<TD></TD>
	</TR>
	<TR>
		<TD width="5%" align="left"><b>#</b></TD>
		<TD width="20%" align="left"><b>Forum topic</b></TD>
        <TD width="60%" align="left"><b>Content</b></TD>
         <TD width="15%" align="center"><b>Action</b></TD>
	</TR>
    <?php
    if(mysql_num_rows($forum_result)>0){
		$i=1;
		while($arr_forum = mysql_fetch_array($forum_result)){
	?>
		
    <TR>
        <TD align="left" valign="top"><?echo $i;?>.</TD>
        <TD align="left" valign="top"><? echo $arr_forum['ForumTopic'];?></TD>
        <TD align="left" valign="top"><? echo $arr_forum['ForumTopicContent'];?></TD>
        <TD align="center" valign="top"><a href="AddSubForum.php?change=<? echo $arr_forum['ForumTopicId'];?>" class="edit">Edit</a> | <a href="AddSubForum.php?rem=<? echo $arr_forum['ForumTopicId'];?>" onclick="return confirm('Are you sure you wanna remove this topic?')" class="edit">Delete</a></TD>
    </TR>
    <?php
			$i++;
		}
	}
	?>
</TABLE> 
</div>


<?include('include/adminfooter.php');?>