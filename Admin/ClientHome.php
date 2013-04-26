<?
include('include/adminheader.php');
include('include/connect.php');
include('../include/tiny.php');

$data='';
if((!empty($_POST))&&(isset($_POST['submit'])))
{
    $pagedata=$_REQUEST['pagetext'];
    $query="UPDATE ".$table['staticpage']." SET StaticPageText='".$pagedata."' WHERE StaticPageName='client-home'";
    $result=mysql_query($query);
    $msg="<font color=red>Successfully Updated</font>";
 }
 else
{
    $dataQuery="SELECT * FROM ".$table['staticpage']." WHERE StaticPageName='client-home'";
    $dataResult=mysql_query($dataQuery);
     $row=mysql_fetch_array($dataResult);
     $data=$row['StaticPageText'];


}
?>
<FORM METHOD="post" ACTION="ClientHome.php">
<h2>News Edit</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <TR>
        <TD style="height:5px"><?php if(!empty($msg)){echo $msg;}?></TD>
    </TR>
    <TR>
      <TD><TEXTAREA NAME="pagetext" ID="textarea1"  ROWS="15" COLS="90"><?if(!empty($pagedata)){echo $pagedata;}else{echo $data;}?></TEXTAREA></TD>
    </TR>
  </TABLE>
  </div>
</FORM>




<?include('include/adminfooter.php');?>
