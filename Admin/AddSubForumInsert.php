<?include('include/connect.php');

$subforum_query="INSERT INTO ".$table['subforum']."(SubForumHeading)VALUES('$subforum')";
$subforum_result=mysql_query($subforum_query);
if($subforum_result)
{
	$result=1;
	header('location:AddSubForum.php?result='.$result);
}
else
{
	$result=0;
	header('location:AddSubForum.php?result='.$result);
}
	