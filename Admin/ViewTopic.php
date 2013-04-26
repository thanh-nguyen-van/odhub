<?include('include/adminheader.php');
include('include/connect.php');

$topicid_list='';
$topictext_list='';
$topicid='';
$topictext='';
$deleteid='';

if(!empty($_REQUEST['deleteid']))
{
	$deleteid=$_REQUEST['deleteid'];
}

//for deleting and topic

if($deleteid!="")
{
	$delete_query="UPDATE ".$table['topic']." SET TopicStatus=0  where TopicId=$deleteid";
	$delete_result=mysql_query($delete_query);
	if($delete_result)
	{
		?><meta http-equiv="REFRESH" content="0;url=ViewTopic.php"><?
	}
}


// for getting the list of all topics

$topic_query="SELECT * FROM ".$table['topic']." WHERE TopicStatus=1 ORDER BY TopicDate DESC";
$topic_result=mysql_query($topic_query);
if(mysql_num_rows($topic_result)>0)
{
	while($topiclist=mysql_fetch_array($topic_result))
	{
		$topicid_list.=$topiclist['TopicId'].",";
		$topictext_list.=$topiclist['TopicText'].",";
	}
}

$topicid=explode(",",$topicid_list);
$topictext=explode(",",$topictext_list);

?>
<h2>Topic List</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
	<TR>
		<TD></TD>
	</TR>
	<TR>
		<TD><b>#</b></TD>
		<TD><b>Topic Name</b></TD>
		<TD><b>Actions</b></TD>
	</TR>
	<TR>
		<?
			for($i=0;$topicid[$i]!="";$i++)
			{
				?>
					<TR>
						<TD><?echo ($i+1);?></TD>
						<TD><?echo $topictext[$i];?></TD>
						<TD>
							<a href="../TopicDetail.php?topicid=<?echo $topicid[$i];?>" target="_blank">View</a> | <a href="ViewTopic.php?deleteid=<?echo $topicid[$i];?>" onclick="return confirm('Are you sure you wanna to remove it?')">Delete</a> 
						</TD>
					</TR>
				<?
			}
		?>
	</TR>
</TABLE>
</div>

<?include('include/adminfooter.php');