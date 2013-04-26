<?
include('include/connect.php');

$categoryid=$_REQUEST['categoryid'];
$LawyerCategoryName=$_REQUEST['LawyerCategoryName'];
$msg="";

if(trim($LawyerCategoryName==""))
{
	$category_label="<font color=red>Please check your entry</font>";
	$set_for_correction=true;
}
else {
	if($categoryid=="") {
		$select_query="select * from ".$table['lawyercategory']." where LawyerCategoryName='" .$LawyerCategoryName. "'";
		$select_result=mysql_query($select_query);
		if($select_result && mysql_num_rows($select_result)>0) {
			$category_label="<font color=red>This Lawyer Category already exists.</font>";
			$set_for_correction=true;
		}
		else {
			$insert_query="INSERT INTO ".$table['lawyercategory']." (LawyerCategoryName) value('".$LawyerCategoryName."')" ;
			$insert_result=mysql_query($insert_query);
			if(!$insert_result) {
				$msg="<font color=red>Could not create Lawyer Category.</font>";
			}
			else {
				$msg="Lawyer Category added successfully.";
			}
		}
	}
	else {
		$select_query="select * from ".$table['lawyercategory']." where LawyerCategoryName='" .$LawyerCategoryName. "' and LawyerCategoryId<>".$categoryid;
		$select_result=mysql_query($select_query);
		if($select_result && mysql_num_rows($select_result)>0) {
			$category_label="<font color=red>This Lawyer Category already exists.</font>";
			$set_for_correction=true;
		}
		else {
			$update_query="Update ".$table['lawyercategory']." set LawyerCategoryName='".$LawyerCategoryName."'  where LawyerCategoryId=".$categoryid."" ;
			$update_result=mysql_query($update_query);
			if(!$update_result) {
				$msg="<font color=red>Could not update Lawyer Category.</font>";
			}
			else {
				$msg="Lawyer Category updated successfully.";
			}
		}
	}
}


if($set_for_correction=="true")
{
	include("LawyerCategoryAddEdit.php");
}
else
{
	include("LawyerCategoryAddEditUpdate.php");
}
?>