<?php
/**
 * Custom country management module from admin section
 * 
 * @author Somak Kanjilal
 * @date 26/06/2013
 */
session_start();
error_reporting(false);
include('include/connect.php');

$msg='';
if(isset($_POST['page_action'])){
     
    if(isset($_POST['c_country_name'])) {
        $c_country_name = trim($_POST['c_country_name']);
        
        if(empty($c_country_name)){
            $msg ='<div style="color:red;padding:2px;margin:2px;">Please provide country name</div>';
        }
        else {
            $c_country_name = addslashes(strip_tags($c_country_name));
            $c_country_name = mysql_real_escape_string($c_country_name);
            $checkSQL = "SELECT * FROM lm_custom_country WHERE c_country_name LIKE '%".$c_country_name."%'";
            $checkDuplicateRS = mysql_query($checkSQL);
            if(mysql_num_rows($checkDuplicateRS)>0){
                $msg = '<div style="color:red;padding:2px;margin:2px;">'. stripslashes($c_country_name).' already added previously</div>';
            }
            else {
                $insertSQL = "INSERT INTO lm_custom_country (c_country_name) VALUES('".$c_country_name."')";
                $insertQuery = mysql_query($insertSQL);
                $insertedId = mysql_insert_id();
                if($insertedId>0){
                    $_SESSION['flash_msg'] = 'inserted';
                    header('location:CustomCountryListing.php');
                    exit();
                }
            }//end of else
            
        }//end of first else
    }
}
include('include/adminheader.php');
?>

<h2>Add Country</h2> 
<div style="text-align:right; margin-bottom:5px;"><input type="button" name="button" value="Back To Listing" class="buttn" onclick="location.href='CustomCountryListing.php';" /></div>
<div class="wht-bg">
     
    <form action="" method="POST" name="frmAddCountry">
        <input type="hidden" name="page_action" value="add" />
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
            <tr>
                <td colspan="2" align="center">&nbsp;<?php echo $msg;?></td>
                
            </tr>
            <tr>
                <td>Country Name :</td>
                <td><input type="text" name="c_country_name" value="<?php if(isset($_POST['c_country_name'])) echo stripslashes($_POST['c_country_name']);else echo '';?>" ></td>
            </tr>
            <tr>
                <td style="padding:10px 0px;">
                   <input type="submit" name="submit" value="Add" class="buttn">&nbsp;&nbsp;&nbsp; 
                   <input type="button" name="cancel" value="Cancel" class="buttn" onclick="location.href='CustomCountryListing.php';" />
                </td>
            </tr>
        </table>
    </form>
</div>

 
<?php include('include/adminfooter.php'); ?>