<? 
include('include/adminheader.php');

$insert_query="INSERT INTO ".$table['staticpage']." (StaticPageType, StaticPageName, StaticPageText, MetaKeywords, MetaContent, MetaDescription, SortOrder, Status)
 VALUES('left_menu', '".$PageTitle."', '".$PageContent."', '".$MetaKeywords."', '".$MetaContent."', '".$MetaDescription."', '".$PageOrder."', '".$PageStatus."')";
//echo $insert_query; exit;
$insert_result=mysql_query($insert_query);

?>
<h2>Add Left Menu Detail</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">	
<?
if($insert_result)
{
	?>
	<tr>
		<td>Left Menu successfully added.</td>
	</tr>
	<?
}
else
{
	?>
	<tr>
		<td>Left Menu is not added.Try Again</td>
	</tr>
	<?
}
?>
</table>
</div>

<? mysql_close($connect);?>
<? include('include/adminfooter.php');?>