<? include('include/adminheader.php');
include('include/connect.php');

$arr_allow_content_type = array("'about_us'","'howit_works'","'terms_of_service'","'thank_you'","'for_client'","'for_professional'","'need_help'");
$allow_content_type_str = implode(',',$arr_allow_content_type);

 $dataQuery="SELECT `StaticPageText`,`StaticPageType` FROM ".$table['staticpage']." WHERE StaticPageType in (".$allow_content_type_str.")";
 	
	$dataResult=mysql_query($dataQuery);
	while($row=mysql_fetch_assoc($dataResult)){
		$data[$row['StaticPageType']] = $row['StaticPageText'];	
	}

?>
<h2>Content List</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0"  class="td-bor td-bor12">

<tr>
	<td colspan="5"> <font color="#FF0000"> <?php if((isset($_SESSION['T_msg']))) { echo $_SESSION['T_msg']; unset($_SESSION['T_msg']); } ?></font></td>
</tr>

<tr>
	<td colspan="5"></td>
</tr>
<tr>
	<td align="center" valign="middle" class="td-hd" style="text-indent:8px;">No.</td>
	<td align="left" valign="middle" class="td-hd">Title</td>
    <td align="left" valign="middle" class="td-hd">Content</td>
	
	<td align="left" valign="middle" class="td-hd">Action</td>
</tr>
<!--<tr><td align="left" valign="middle" class="td-hd">Add</td></tr>-->

	<tr>
		<td align="center" valign="middle">1 . </td>
		<td align="left" valign="middle">About Us</td>
        <td align="left" valign="middle"><? echo substr($data['about_us'],0,75)."...";?></td>
        <td align="left" valign="middle"><a href="<?php echo $siteURL;?>Cms.php?page=about_us" class="edit">Edit</a> 
    </tr>
    <tr>
		<td align="center" valign="middle">2 . </td>
		<td align="left" valign="middle">How it Works</td>
        <td align="left" valign="middle"><? echo substr($data['howit_works'],0,75)."...";?></td>
        <td align="left" valign="middle"><a href="<?php echo $siteURL;?>Cms.php?page=howit_works" class="edit">Edit</a> 
     </tr>   
      <tr>
		<td align="center" valign="middle">3 . </td>
		<td align="left" valign="middle">Terms of Service</td>
        <td align="left" valign="middle"><? echo substr($data['terms_of_service'],0,75)."...";?></td>
        <td align="left" valign="middle"><a href="<?php echo $siteURL;?>Cms.php?page=terms_of_service" class="edit">Edit</a> 
     </tr> 
     
      <tr>
		<td align="center" valign="middle">4 . </td>
		<td align="left" valign="middle">Thank You</td>
        <td align="left" valign="middle"><? echo substr($data['thank_you'],0,75)."...";?></td>
        <td align="left" valign="middle"><a href="<?php echo $siteURL;?>Cms.php?page=thank_you" class="edit">Edit</a> 
     </tr>
	 <tr>
		<td align="center" valign="middle">5 . </td>
		<td align="left" valign="middle">For Clients</td>
        <td align="left" valign="middle"><? echo substr($data['for_client'],0,75)."...";?></td>
        <td align="left" valign="middle"><a href="<?php echo $siteURL;?>Cms.php?page=for_client" class="edit">Edit</a> 
     </tr>
	 <tr>
		<td align="center" valign="middle">6 . </td>
		<td align="left" valign="middle">For Professionals</td>
        <td align="left" valign="middle"><? echo substr($data['for_professional'],0,75)."...";?></td>
        <td align="left" valign="middle"><a href="<?php echo $siteURL;?>Cms.php?page=for_professional" class="edit">Edit</a> 
     </tr>
	 <tr>
		<td align="center" valign="middle">7 . </td>
		<td align="left" valign="middle">Need Help</td>
        <td align="left" valign="middle"><? echo substr($data['need_help'],0,75)."...";?></td>
        <td align="left" valign="middle"><a href="<?php echo $siteURL;?>Cms.php?page=need_help" class="edit">Edit</a> 
     </tr> 
	   
	

</table>
</div>

<? mysql_close($connect);?>
<? include('include/adminfooter.php');?>