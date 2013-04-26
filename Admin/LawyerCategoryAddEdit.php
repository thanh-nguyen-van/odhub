<?include('include/adminheader.php');
include('include/connect.php');
$categoryid="";
$re="";
if(isset($_REQUEST['categoryid']) && $_REQUEST['categoryid']!="") {
	$categoryid=$_REQUEST['categoryid'];
}
if($categoryid!="") {
	$select_query="select * from ".$table['lawyercategory']." where LawyerCategoryId=" .$categoryid. "";
	$select_result=mysql_query($select_query);
    if($select_result && mysql_num_rows($select_result)>0) {
    	$re=mysql_fetch_array($select_result);
    }
}
?>
<h2>Lawyer Category Name</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
<tr>
	<td colspan="4" align="left" valign="middle"><h3><?php if($categoryid!="") { echo "Edit"; } else { echo "Add"; } ?> Lawyer Category</h3></td>
</tr>
	<form  method="post" action="LawyerCategoryAddEditPerform.php">
	    <tr>
        	<?php if($re!="") { ?><input type="hidden" name="categoryid" value="<?echo $re['LawyerCategoryId'];?>"><?php } ?>
            <td width="59%" align="left" valign="middle"><input type="text" name="LawyerCategoryName" value="<? if($re!="") { echo $re['LawyerCategoryName']; } ?>" class="input12"><?echo $err;?><?echo $category_label;?></td>
          <td width="41%" align="left" valign="middle"><input type="submit" name="submit" value="submit" class="buttn"></td>
        </tr>
    </form>
</table>
</div>
<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>