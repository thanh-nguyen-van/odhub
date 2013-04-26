<?include('include/adminheader.php');
include('include/connect.php');?>

<?
$msg='';

//to delete a forum topic

if(isset($_REQUEST['rempost']) && $_REQUEST['rempost'] > 0)
{
	$delete_post="DELETE  FROM ".$table['forumpost']." WHERE ForumPostId=".$_REQUEST['rempost'];
	$delete_post_result=mysql_query($delete_post);
	if($delete_post_result)
	{
		?><meta http-equiv="REFRESH" content="0;url=ViewForum.php"><?
	}else{
		$msg = "Error in forum content deletion!";	
	}
}


//Select forum topics
$forum_query="SELECT * FROM ".$table['forumtopic']." ORDER BY ForumTopicDate DESC";
$forum_result=mysql_query($forum_query);
?>
<h2>Forum List</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
	<TR>
		<TD colspan="2" align="left"></TD>
	</TR>
	<TR>
		<TD align="left" height="5px">&nbsp;</TD>
	</TR>
    <?php
    if(isset($msg) && $msg!=''){
	?>
    <TR>
		<TD align="left" ><?php echo $msg;?></TD>
	</TR>
    <TR>
		<TD align="left" height="5px">&nbsp;</TD>
	</TR>
    <?php
	}
	?>
	<TR>
		<TD width="4%" align="center" valign="middle"><b>#</b></TD>
		<TD colspan="2"><b>Forum topic</b></TD>
    </TR>
    <?php
    if(mysql_num_rows($forum_result)>0){
		$i=1;
		while($arr_forum = mysql_fetch_array($forum_result)){
	?>
    <TR>
    	<TD align="center" valign="top" width="4%"><?echo $i++;?>.</TD>
      <TD align="left" valign="top" width="16%"><a href="<?php echo $siteURL;?>/AddSubForum.php" style="texr-decoration: none;"><strong style="color:#000;"><? echo $arr_forum['ForumTopic'];?></strong></a><br/><span align="justify"></span></TD>
        <td width="80%" align="left" valign="middle" style="padding-top:50px;">
		<?php
        
			$str_fpost = "SELECT * FROM ".$table['forumpost']." WHERE ForumTopicId=".$arr_forum['ForumTopicId'];
			//echo $str_fpost;
			$sel_fpost = mysql_query($str_fpost);
			if(mysql_num_rows($sel_fpost) > 0){
        ?>
    
			<table cellpadding="0" cellspacing="0" border="0" width="100%">	
            <?php
				while($arr_fpost = mysql_fetch_array($sel_fpost)){
					if($arr_fpost['ClientId'] > 0){
						$str_postedby = "SELECT CONCAT_WS(' ', ClientFirstname, ClientLastname) AS NAME FROM ".$table['clientdetail']." WHERE ClientId=".$arr_fpost['ClientId'];	
					}else if($arr_fpost['LawyerId'] > 0){
						$str_postedby = "SELECT CONCAT_WS(' ', LawyerFirstname, LawyerLastname) AS NAME FROM ".$table['professional_detail']." WHERE LawyerId=".$arr_fpost['LawyerId'];	
					}
					$sel_postedby = mysql_query($str_postedby);
					if(mysql_num_rows($sel_postedby) > 0){
						$arr_postedby = mysql_fetch_array($sel_postedby);	
					}else{
						$arr_postedby['NAME'] = "unknown user";
					}
			?>
                <tr>
                	<TD width="75%" align="justify"><? echo (substr($arr_fpost['PostContent'], 0, 200)."... <font color='red'>Posted on ".date('M d,Y',strtotime($arr_fpost['PostDate']))." by ".$arr_postedby['NAME']."</font><br/>");?></TD>
                
                	<TD align="right" valign="top" width="25%" style="padding-right: 10px;">                                    
                
                	<a href="ViewForumContent.php?postid=<? echo $arr_fpost['ForumPostId'];?>">Detail</a> | <a href="ViewForum.php?rempost=<? echo $arr_fpost['ForumPostId'];?>" onclick="return confirm('Confirming this forum post removal?')">Delete</a>                                    
                
                	</TD>
                
                </tr>
                <?php
                	}
                ?>
          </table>
                <?php
                }else{
					echo "Nothing has been posted under this topic.";
				}
                ?>
      </td>
			   <?
                }
               ?>
    </tr>
              <?

              }else {

              ?>
              <TR>

                <TD colspan="4">No posted forum is available.</a>

                 </TD>

               </TR>

				<?
                
                }
                
                ?>
                </TABLE> 
                
</div>

<?include('include/adminfooter.php');?>