<? 
include('include/adminheader.php');
include('include/connect.php');


$update_query="UPDATE  ".$table['staticpage']."  SET 
               StaticPageName='".$PageTitle."', 
			   StaticPageText='".$PageContent."',
			   MetaKeywords='".$MetaKeywords."',
			   MetaContent='".$MetaContent."', 
			   MetaDescription='".$MetaDescription."',
			   SortOrder='".$PageOrder."',
			   Status   = '".$PageStatus."'
			   WHERE StaticPageId=$StaticPageId";
//echo $update_query;exit;
 
$update_result=mysql_query($update_query);
?>
<table width="100%">
<tr>
	<td colspan="5"><h3>Edit Left Menu</h3></td>
</tr>
<?
if($update_result)
{
	?>
	<tr>
		<td>Left Menu successfully edited.</td>
	</tr>
	<?
}
else
{
	?>
	<tr>
		<td>Left Menu is not edited.Try Again</td>
	</tr>
	<?
}
?>
</table>

<? mysql_close($connect);?>
<? include('include/adminfooter.php');?>