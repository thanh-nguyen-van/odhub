<?include('include/adminheader.php');
include('include/connect.php');?>

<?
$msg='';
$postid = $_REQUEST['postid'];
//to delete a forum topic

if(isset($_REQUEST['rempost']) && $_REQUEST['rempost'] > 0)
{
	$delete_post="DELETE  FROM ".$table['forumpost']." WHERE ForumPostId=".$_REQUEST['rempost'];
	$delete_post_result=mysql_query($delete_post);
	if($delete_post_result)
	{
		?><meta http-equiv="REFRESH" content="0;url=ViewForum.php"><?
	}else{
		$msg = "Error in deletion!";	
	}
}


//Select forum topics
$forum_query="SELECT * FROM ".$table['forumpost']." WHERE ForumPostId=".$postid;
$forum_result=mysql_query($forum_query);
if(mysql_num_rows($forum_result)>0){
	$arr_forum = mysql_fetch_array($forum_result);	
}else{
	$arr_forum['PostContent'] = "Not available";
}
?>
<h2></h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
	<TR>
		<TD align="left" colspan="2" height="5px">&nbsp;</TD>
	</TR>
	<?php
    if(isset($msg) && $msg!=''){
	?>
    <TR>
		<TD align="left" colspan="2"><?php echo $msg;?></TD>
	</TR>
    <TR>
		<TD align="left" height="5px" colspan="2">&nbsp;</TD>
	</TR>
    <?php
	}
	?>
    <TR>
		<TD width="84%" align="left" valign="middle"><b>Post Content</b></TD>
        <TD width="16%" align="center" valign="middle"><b>Action</b></TD>
    </TR>
    
    <TR>
        <TD align="left" valign="middle"><?php echo $arr_forum['PostContent'];?></TD>
        <TD width="16%" align="center" valign="middle"><a href="ViewForumContent.php?rempost=<? echo $arr_forum['ForumPostId'];?>" onclick="return confirm('Confirming this forum post removal?')" class="edit">Delete</a></TD>
	</TR>
  </TABLE>
</div> 


<?include('include/adminfooter.php');?>