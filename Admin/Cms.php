<?
include('include/adminheader.php');
include('include/connect.php');

$data='';

if((!empty($_POST))&&(isset($_POST['submit'])))
{
    $pagedata=$_REQUEST['pagetext'];
    $query="UPDATE ".$table['staticpage']." SET StaticPageText='".$pagedata."' WHERE StaticPageType='".$_REQUEST['page']."'";
    $result=mysql_query($query);
    $msg="<font color=red>Successfully Updated</font>";
    
 }
 else
 {
    $dataQuery="SELECT * FROM ".$table['staticpage']." WHERE StaticPageType='".$_REQUEST['page']."'";
    $dataResult=mysql_query($dataQuery);
     $row=mysql_fetch_array($dataResult);
     $data=$row['StaticPageText'];
 }

     
     

?>
<script src="<?php echo $siteURL;?>public/ckeditor/ckeditor.js" type="application/javascript" ></script>
<FORM METHOD="post" ACTION="Cms.php?page=<?php echo $_REQUEST['page'] ?>">
<h2>News Edit</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <TR>
        <TD style="height:5px"><?php if(!empty($msg)){echo $msg;}?></TD>
    </TR>
    <TR>
      <TD><TEXTAREA NAME="pagetext" ID="editor1"  ROWS="15" COLS="90"><? if(!empty($pagedata)){echo $pagedata;}else{echo $data;} ?></TEXTAREA></TD>
    </TR>
    <TR>

        <TD><INPUT TYPE="submit" NAME="submit" VALUE="Update"></TD>
    </TR>
    </TABLE>
</div>
</FORM>
<script>

	CKEDITOR.replace( 'editor1',
    {
        filebrowserUploadUrl : './uploader/upload.php',
        filebrowserWindowWidth : '640',
        filebrowserWindowHeight : '480'
    });

</script>




<? include('include/adminfooter.php');?>
